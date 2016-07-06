<?php
namespace App\Controller\Api;

use App\Controller\Api\AppController;
use App\BusinessLogic\SessionManager;
use Cake\Network\Exception\BadRequestException;
use Cake\Network\Exception\UnauthorizedException;

/**
 * Sessions Controller
 *
 */
class SessionsController extends AppController
{
    public function initialize()
    {
        parent::initialize();
        $this->Auth->allow(['create', 'createCompanySession', 'destroy']);
    }

    /**
     * Crea la sesión del usuario
     * @return \Cake\Network\Response|null
     */
    public function create()
    {
        $data = $this->request->input('json_decode');
        $session = SessionManager::authenticateUser($data);
        if (!$session)
            throw new UnauthorizedException('El usuario o password proporcionados no son válidos, ' .
                'por favor revise los datos e inténtelo nuevamente');
        if(!SessionManager::startSession($session))
            return $this->errorSavingSessionResponse($session->errors());
        $this->response->body(json_encode($session->jsonSerialize()));
        return $this->response;
    }

    /**
     * Crea la sesión del usuario de una empresa
     * @return \Cake\Network\Response|null
     */
    public function createCompanySession()
    {
        $data = $this->request->input('json_decode');
        $session = SessionManager::authenticateCompany($data);
        if (!$session)
            throw new UnauthorizedException('El nombre de la empresa o el token de registro proporcionados '.
            'no son válidos, por favor revise los datos e inténtelo nuevamente');
        if(!SessionManager::startSession($session))
            return $this->errorSavingSessionResponse($session->errors());
        $this->response->body(json_encode($session->jsonSerialize()));
        return $this->response;
    }

    /**
     * No se utiliza este método
     * @param $id string
     * @return \Cake\Network\Response|null
     */
    public function destroy($id)
    {
        $res = SessionManager::closeSession($id);
        if(!$res)
            return $this->badRequestResponse();
        if(!empty($res->errors()))
            return $this->errorSavingSessionResponse($res->errors());
        $this->response->statusCode(204);
        return $this->response;
    }

    private function errorSavingSessionResponse($errors)
    {
        $this->response->statusCode(400);
        $this->response->body(json_encode((object)['message' =>
            $errors, 'code' => 400]));
        return $this->response;
    }
}
