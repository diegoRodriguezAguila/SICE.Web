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

    /**
     * Index method
     *
     * @return void
     */
    public function index()
    {
        $this->set('data', $this->paginate($this->PowerPoles));
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
