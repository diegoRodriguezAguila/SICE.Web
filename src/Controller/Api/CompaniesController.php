<?php
namespace App\Controller\Api;

use App\Controller\Api\AppController;

/**
 * Companies Controller
 *
 * @property \App\Model\Table\CompaniesTable $Companies
 */
class CompaniesController extends AppController
{
    /**
     * Add method
     *
     * @return \Cake\Network\Response|null
     */
    public function add()
    {
        $company = $this->Companies->newEntity();
        $company = $this->Companies->patchEntity($company, $this->request->data);
        if (!$this->Companies->save($company))
            return $this->errorSavingCompany($company->errors());
        $this->response->body(json_encode($company->jsonSerialize()));
        return $this->response;
    }

    private function errorSavingCompany($errors)
    {
        $this->response->statusCode(400);
        $this->response->body(json_encode((object)['message' =>
            $errors, 'code' => 400]));
        return $this->response;
    }
}
