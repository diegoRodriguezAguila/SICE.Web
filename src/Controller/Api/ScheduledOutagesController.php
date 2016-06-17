<?php
namespace App\Controller\Api;

use App\Controller\Api\AppController;

/**
 * ScheduledOutages Controller
 *
 * @property \App\Model\Table\ScheduledOutagesTable $ScheduledOutages
 */
class ScheduledOutagesController extends AppController
{
    public $paginate = [
        'limit' => 25,
        'order' => [
            'ScheduledOutages.start_date' => 'asc'
        ]
    ];

    public function initialize()
    {
        parent::initialize();
        $this->loadComponent('Paginator');
        $this->loadComponent('BryanCrowe/ApiPagination.ApiPagination');
    }

    /**
     * Index method
     *
     * @return void
     */
    public function index()
    {
        $this->set('scheduled_outages', $this->paginate($this->ScheduledOutages));
        $this->set('_serialize', ['scheduled_outages']);
    }

    /**
     * View method
     *
     * @param string|null $id Scheduled Outage id.
     * @return \Cake\Network\Response|null
     */
    public function view($id = null)
    {
        $scheduledOutage = $this->ScheduledOutages->get($id, [
            'contain' => []
        ]);
        $this->response->body(json_encode($scheduledOutage->jsonSerialize()));
        return $this->response;
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|null
     */
    public function add()
    {
        $scheduledOutage = $this->ScheduledOutages->newEntity();
        if ($this->request->is('post')) {
            $scheduledOutage = $this->ScheduledOutages->patchEntity($scheduledOutage, $this->request->data);
            if ($this->ScheduledOutages->save($scheduledOutage)) {
                return $this->redirect(['action' => 'index']);
            } else {
            }
        }
        $this->set(compact('scheduledOutage'));
        $this->set('_serialize', ['scheduledOutage']);
        $this->response->statusCode(404);
        return $this->response;
    }
}
