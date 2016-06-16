<?php
/**
 * Created by PhpStorm.
 * User: drodriguez
 * Date: 15/06/2016
 * Time: 11:44
 */

namespace App\BusinessLogic;

use App\Model\Entity\Session;
use Cake\Network\Http\Client;
use Cake\ORM\TableRegistry;
use Cake\Utility\Security;
use Firebase\JWT\JWT;

class SessionManager
{
    const AD_WS_SERVER = 'http://192.168.50.56:3000/api/sessions/';

    /**
     * Calls the AD api for user autentication
     * @param $data string of the request
     * @return mixed App\Model\Entity\Session or false if there was an error on authentication
     */
    public static function authenticateUser($data)
    {
        $http = new Client();
        // Simple get with query string
        $response = $http->post(self::AD_WS_SERVER, json_encode($data),
            ['headers' => ['Content-Type' => 'application/json',
                'Accept' => 'application/json']]);
        if ($response->statusCode() == 422)
            return false;
        $user_data['authentication_token'] = $response->json['authentication_token'];
        $user_data['sub'] = $response->json['username'];
        $user_data['exp'] = time() + 604800;
        $session = new Session(['username' => $user_data['sub'],
            'authentication_token' =>
                JWT::encode($user_data, Security::salt())]);
        return $session;
    }

    /**
     * Saves a session, if a session already existed, it becomes updated
     * @param $session Session
     * @return boolean
     */
    public static function startSession($session)
    {
        $sessions = TableRegistry::get('Sessions');
        $last_session = $sessions->find()->where(['username' => $session->username])->first();
        if ($last_session != null) {
            $last_session->authentication_token = $session->authentication_token;
            $last_session->status = 1;
            $session = $last_session;
        }
        $session->last_sign_in_at = time();
        return $sessions->save($session);
    }
}