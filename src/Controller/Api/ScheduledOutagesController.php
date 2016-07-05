<?php
namespace App\Controller\Api;

use App\Controller\Api\AppController;
use App\Model\Table\PowerPolesTable;
use Cake\Error\Debugger;
use Cake\ORM\TableRegistry;

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
        ],
        'contain' => ['PowerPoles']
    ];

    /**
     * Index method
     *
     * @return void
     */
    public function index()
    {
        $this->set('data', $this->paginate($this->ScheduledOutages));
        $this->set('_serialize', ['data']);
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
            'contain' => ['PowerPoles']
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
        $scheduledOutage = $this->ScheduledOutages->patchEntity($scheduledOutage, $this->request->data);
        $data = $this->request->input('json_decode');
        if (isset($data->power_poles)) {
            $powerPoles = TableRegistry::get('PowerPoles')->find()
                ->where(['id IN' => $data->power_poles]);
            $scheduledOutage->power_poles = $powerPoles->toArray();
        }
        if (!$this->ScheduledOutages->save($scheduledOutage)) {
            return $this->errorSavingScheduledOutage($scheduledOutage->errors());
        }
        $this->response->body(json_encode($scheduledOutage->jsonSerialize()));
        return $this->response;
    }

    private function errorSavingScheduledOutage($errors)
    {
        $this->response->statusCode(400);
        $this->response->body(json_encode((object)['message' =>
            $errors, 'code' => 400]));
        return $this->response;
    }
}
