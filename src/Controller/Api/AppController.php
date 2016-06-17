<?php
/**
 * Created by PhpStorm.
 * User: drodriguez
 * Date: 24/12/15
 * Time: 13:38
 */

namespace App\Controller\Api;

use Cake\Controller\Controller;
use Cake\Event\Event;

class AppController extends Controller
{
    /**
     * Initialization hook method.
     *
     * Use this method to add common initialization code like loading components.
     *
     * e.g. `$this->loadComponent('Security');`
     *
     * @return void
     */
    public function initialize()
    {
        parent::initialize();

        $this->loadComponent('RequestHandler');
        $this->loadComponent('Flash');
        $this->loadComponent('Auth', ['authenticate' =>
            ['ADmad/JwtAuth.Jwt' => [
                'parameter' => 'token',
                'userModel' => 'Sessions',
                'fields' => [
                    'username' => 'username'
                ],
                'scope' => ['Sessions.status' => 1],
                'queryDatasource' => true
            ]
            ],'storage' => 'Memory',
            'checkAuthIn' => 'Controller.initialize',
            'loginAction' => false,
            'unauthorizedRedirect' => false]);
    }

    /**
     * Before render callback.
     *
     * @param \Cake\Event\Event $event The beforeRender event.
     * @return void
     */
    public function beforeRender(Event $event)
    {
        if (!array_key_exists('_serialize', $this->viewVars) &&
            in_array($this->response->type(), ['application/json', 'application/xml'])
        ) {
            $this->set('_serialize', true);
        }
    }

    /**
     * Returns an empty response with 400 bad request
     * status code
     * @return \Cake\Network\Response|null
     */
    public function badRequestResponse(){
        $this->response->statusCode(400);
        return $this->response;
    }
}