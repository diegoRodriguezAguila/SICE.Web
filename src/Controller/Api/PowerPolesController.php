<?php
namespace App\Controller\Api;

use App\Controller\Api\AppController;
use App\Model\Table\SupportedCompaniesTable;

/**
 * PowerPoles Controller
 *
 * @property \App\Model\Table\PowerPolesTable $PowerPoles
 */
class PowerPolesController extends AppController
{
    public $paginate = [
        'limit' => 25,
        'order' => [
            'ScheduledOutages.start_date' => 'asc'
        ],
        'contain' => ['SupportedCompanies']
    ];

    /**
     * Index method
     *
     * @return void
     */
    public function index()
    {
        $powerPoles = $this->PowerPoles;
        $poleCode = $this->request->query('pole_code');
        if ($poleCode != null) {
            $powerPoles = $powerPoles->find()->where(['pole_code LIKE' => "$poleCode%"]);
        }
        $this->set('data', $this->paginate($powerPoles));
        $this->set('_serialize', ['data']);
    }

    /**
     * View method
     *
     * @param string|null $id power Pole id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {
        $powerPole = $this->PowerPoles->get($id, [
            'contain' => ['SupportedCompanies']
        ]);
        $this->response->body(json_encode($powerPole->jsonSerialize()));
        return $this->response;
    }
}
