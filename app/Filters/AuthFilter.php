<?php

namespace App\Filters;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\API\ResponseTrait;
use Config\Services;
use App\Models\TokenModel;
use CodeIgniter\RESTful\ResourceController;

class AuthFilter implements FilterInterface
{
    use ResponseTrait;
    
    public function before(RequestInterface $request, $arguments = null)
    {
        // Do something here
        try {
            //code...

            $tokenModel = new TokenModel();
            $requestToken = $request->getJsonVar('vToken');
            
            if (empty($requestToken) || $requestToken == null || is_null($requestToken)) {
                return Services::response()->setStatusCode(ResponseInterface::HTTP_UNAUTHORIZED,'Não foi passado um token, por favor informe um token!');
                exit;
            }

            if ($tokenModel->verifyAuthorizedToken($requestToken) != true) {
                return Services::response()->setStatusCode(ResponseInterface::HTTP_UNAUTHORIZED,'Não foi passado um token válido!');
                exit;
            }


        } catch (\Exception $e) {
            return Services::response()->setStatusCode(ResponseInterface::HTTP_INTERNAL_SERVER_ERROR,'Desculpa! Ocorreu um erro no servidor.');
        }
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // Do something here
    }
}