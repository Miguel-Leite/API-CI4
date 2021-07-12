<?php

namespace App\Controllers\API;

use App\Models\TokenModel;
use App\Models\UserModel;
use CodeIgniter\RESTful\ResourceController;

class Users extends ResourceController
{

    private $tokenModel;

    public function __construct()
    {
        $this->model = $this->setModel(new UserModel());
        $this->tokenModel = new TokenModel();
    }

    public function index()
    {
        try {
            $user = $this->model->userWithToken();

            return $this->respond($user);
        } catch (\Exception $e) {
            return $this->failServerError('Desculpa! Ocorreu um erro no servidor.');
        }
    }

    public function edit($id = null)
    {
        try {

            $requestToken = $this->request->getJSON('vToken');


            if (empty($requestToken)) {
                return $this->failValidationErrors("Desculpa! Não foi passado um token.");
                exit;
            }

            if ($this->tokenModel->verifyAuthorizedToken($requestToken) != true) {
                return $this->failValidationErrors("Não foi passado um token válido!");
                exit;
            }

            if (is_null($id) || $id == null) {
                return $this->failValidationErrors("Desculpa! Não foi passado um ID.");
                exit;
            }

            $user = $this->model->userWithToken($id);

            if ($user == null)
                return $this->failValidationErrors('Não foi encontrado um usuário com id: ' . $id . ' passado!');

            return $this->respond($user);
        } catch (\Exception $e) {
            return $this->failServerError('Desculpa! Ocorreu um erro no servidor.');
        }
    }

    public function create()
    {
        try {
            $user = $this->request->getJSON();

            if ($this->tokenModel->insert($this->request->getJSON('token'))) {
                $user->id_autorizid_tokens = $this->tokenModel->insertID();
            } else {
                return $this->failValidationErrors($this->model->validation->listErrors());
                exit;
            }

            if ($this->model->insert($user)) :
                $user->id = $this->model->insertID();
                return $this->respondCreated($user);
            else :
                $this->tokenModel->delete($user->id_autorizid_tokens);
                $this->tokenModel->alterTableAutoIncrement();
                return $this->failValidationErrors($this->model->validation->listErrors());
            endif;
        } catch (\Exception $e) {
            return $this->failServerError('Desculpa! Ocorreu um erro no servidor.');
        }
    }

    public function update($id = null)
    {
        try {

            if (is_null($id) || $id == null) {
                return $this->failValidationErrors("Desculpa! Não foi passado um ID.");
                exit;
            }

            $verifyUser = $this->model->find($id);

            if ($verifyUser == null)
                return $this->failValidationErrors('Não foi encontrado um usuário com id: ' . $id . ' passado!');


            $data = [
                'name' => $this->request->getJsonVar('name'),
                'lastName' => $this->request->getJsonVar('lastName'),
                'bi' => $this->request->getJsonVar('bi'),
                'phone' => $this->request->getJsonVar('phone'),
                'email' => $this->request->getJsonVar('email'),
                'password' => $this->request->getJsonVar('password')
            ];
            
            if ($this->model->update($id, $data)) {
                $data['id'] = $id;
                return $this->respondUpdated($data);
            } else {
                return $this->failValidationErrors($this->model->validation->listErrors());
            }
        } catch (\Exception $e) {
            return $this->failServerError('Desculpa! Ocorreu um erro no servidor.');
        }
    }

    public function delete($id = null)
    {
        try {

            if (is_null($id) || $id == null) {
                return $this->failValidationErrors("Desculpa! Não foi passado um ID.");
                exit;
            }

            $user = $this->model->find($id);

            if ($user == null)
                return $this->failValidationErrors('Não foi encontrado um usuário com id: ' . $id . ' passado!');


            if ($this->model->delete($id)) {
                return $this->respondDeleted($user);
            } else {
                return $this->failServerError('Não foi possivel eliminar o usuário!');
            }
        } catch (\Exception $e) {
            return $this->failServerError('Desculpa! Ocorreu um erro no servidor.');
        }
    }

    public function loginUser()
    {
        try {
            //code...

            $email = $this->request->getJsonVar('email');
            $password = $this->request->getJsonVar('password');

            if((empty($email)) || (is_null($email)))
                return $this->failValidationErrors('Por favor, preencha o campo email do formulário!');

            if((empty($password)) || (is_null($password)))
                return $this->failValidationErrors('Por favor, preencha o campo senha do formulário!');

            $verifyEmail = $this->model->getColum('email',$email); 

            if(empty($verifyEmail))
                return $this->failValidationErrors('O email informado não esta cadastrado no sistema!');

            $verifyLogin = $this->model->getColums('email','password',$email, $password);
            
            if($verifyLogin){
                return $this->respond($verifyLogin);
            } else {
                return $this->failValidationErrors('Não foi possível fazer o login, os dados informado estão incorretos!');
            }

        } catch (\Exception $e) {
            return $this->failServerError('Desculpa! Ocorreu um erro no servidor.');
        }
    }
}
