<?php

namespace App\Controllers\API;

use App\Models\TokenModel;
use CodeIgniter\RESTful\ResourceController;

class Tokens extends ResourceController{

    public function __construct()
    {
        $this->model = $this->setModel(new TokenModel());
    }

    public function index()
    {

        try {
            $token = $this->model->findAll();
            return $this->respond($token);

        } catch (\Exception $e) {
            return $this->failServerError('Desculpa! Ocorreu um erro no servidor.');
        }   
    }

    public function create()
    {
        try {

            $token = $this->request->getJSON();

            if($this->model->insert($token)):
                $token->id = $this->model->insertID();
                return $this->respondCreated($token);
            else:
                return $this->failValidationErrors($this->model->validation->listErrors());
            endif;

        } catch (\Exception $e) {
            return $this->failServerError('Desculpa! Ocorreu um erro no servidor.');
        }     
    }

    public function edit($id = null)
    {
        try {

            if(is_null($id) || $id == null)
            {
                return $this->failValidationErrors("Desculpa! Não foi passado um ID.");
                exit;
            }

            $token = $this->model->find($id);

            if($token == null)
                return $this->failValidationErrors('Não foi encontrado um token com id: '.$id.' passado!');

            return $this->respond($token);

        } catch (\Exception $e) {
            return $this->failServerError('Desculpa! Ocorreu um erro no servidor.');
        }
    }

    public function update($id = null)
    {
        try {

            if(is_null($id) || $id == null)
            {
                return $this->failValidationErrors("Desculpa! Não foi passado um ID.");
                exit;
            }

            $verifyToken = $this->model->find($id);

            if($verifyToken == null)
                return $this->failValidationErrors('Não foi encontrado um token com id: '.$id.' passado!');


            $token = $this->request->getJSON();

            if($this->model->update($id, $token))
            {
                $token->id = $id;
                return $this->respondUpdated($token);
            } else {
                return $this->failServerError('Não foi possivel actualizar o token com ID: '.$id.'!');
            }

        } catch (\Exception $e) {
            return $this->failServerError('Desculpa! Ocorreu um erro no servidor.');
        }
    }

    public function delete($id = null)
    {
        try {

            if(is_null($id) || $id == null)
            {
                return $this->failValidationErrors("Desculpa! Não foi passado um ID.");
                exit;
            }

            $token = $this->model->find($id);

            if($token == null)
                return $this->failValidationErrors('Não foi encontrado um token com id: '.$id.' passado!');


            if($this->model->delete($id))
            {
                return $this->respondDeleted($token);
            } else {
                return $this->failServerError('Não foi possivel eliminar o token!');
            }

        } catch (\Exception $e) {
            return $this->failServerError('Desculpa! Ocorreu um erro no servidor.');
        }
    }

}