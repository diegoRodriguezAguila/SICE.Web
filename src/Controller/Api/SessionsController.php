<?php
namespace App\Controller\Api;

use App\Controller\Api\AppController;

/**
 * Sessions Controller
 *
 */
class SessionsController extends AppController
{
    public function initialize()
    {
        parent::initialize();
        $this->Auth->allow(['create', 'destroy']);
    }

    /**
     * Crea la sesión del usuario
     * @return \Cake\Network\Response|null
     */
    public function create()
    {
        $this->response->type('json');
        $data = $this->request->input('json_decode');
        $this->response->statusCode(404);
        return $this->response;
    }

    /**
     * No se utiliza este método
     * @param $id
     * @return \Cake\Network\Response|null
     */
    public function destroy($id)
    {
        $this->response->statusCode(404);
        return $this->response;
    }
}
