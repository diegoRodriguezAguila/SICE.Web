<?php
/**
 * Created by PhpStorm.
 * User: drodriguez
 * Date: 19/01/2016
 * Time: 14:49
 */

namespace App\Security\Auth;
use Cake\Auth\BaseAuthenticate;
//use Cake\Log\Log;
use Cake\Network\Request;
use Cake\Network\Response;
use Symfony\Component\Console\Logger\ConsoleLogger;

class SiceTokenAuthenticate extends BaseAuthenticate
{

    /**
     * Authenticate a user based on the request information.
     *
     * @param \Cake\Network\Request $request Request to get authentication information from.
     * @param \Cake\Network\Response $response A response object that can have headers added.
     * @return mixed Either false on failure, or an array of user data on success.
     */
    public function authenticate(Request $request, Response $response)
    {
        return false;
    }

    /**
     * Handle unauthenticated access attempt. In implementation valid return values
     * can be:
     *
     * - Null - No action taken, AuthComponent should return appropriate response.
     * - Cake\Network\Response - A response object, which will cause AuthComponent to
     *   simply return that response.
     *
     * @param \Cake\Network\Request $request A request object.
     * @param \Cake\Network\Response $response A response object.
     * @return \Cake\Network\Response|bool
     */
    public function unauthenticated(Request $request, Response $response)
    {
        $response->type('json');

        $username = $request->header($this->config('headerUsername'));
        $token = $request->header($this->config('headerToken'));
        if($username==null || $token==null)
            return $this->unauthorizedResponse($response);
        //Log::debug("CREATED TOKEN: ".$generatedToken);
        //Log::debug("SENT TOKEN: ".$token);)
        return true;
    }

    /**
     * Generates the unauthorized response
     * @param \Cake\Network\Response $response A response object.
     * @return \Cake\Network\Response
     */
    private function unauthorizedResponse($response){
        $response->statusCode(401);
        $response->body(json_encode((object)['message' =>
            'Error al verificar el token de autorización, no tiene permiso para acceder a la aplicación', 'code' => 403]));
        return $response;
    }

}