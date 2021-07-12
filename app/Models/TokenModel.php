<?php

namespace App\Models;

use CodeIgniter\Model;

class TokenModel extends Model
{

    protected $table                        = 'autorizid_tokens';
    protected $primaryKey                   = 'id';

    protected $returnType                   = 'object';
    protected $allowedFields                = ['token', 'status'];

    protected $useSoftDeletes                  = false;

    protected $useTimestamps                   = true;
    protected $createdField                    = 'created_at';
    protected $updatedField                    = 'updated_at';
    protected $deletedField                    = 'deleted_at';

    protected $validationRules               = [
        'token' => 'required|is_unique[autorizid_tokens.token]',
        'status' => 'permit_empty'
    ];

    protected $validationMessages           = [
        'token' => [
            'required' => 'Estimado usuário, é obrigatório informar um token!',
            'is_unique' => 'Estimado usuário, o token informado já está registrado no sistema!'
        ]
    ];
    

    protected $skipValidation               = false;



    public function verifyAuthorizedToken($token)
    {
        $results = $this->db->table('autorizid_tokens')->where('token', $token)->where('status', 'S')->countAllResults();

        if ($results > 0) {
            return true;
        } else {
            return false;
        }
    }

    public function getLastId()
    {
        $builder = $this->db->query('SELECT ' . $this->primaryKey . ' FROM ' . $this->table . ' ORDER BY ' . $this->primaryKey . ' DESC LIMIT 1');

        foreach ($builder->getResult() as $row) {
            return $row->id;
        }
    }

    public function alterTableAutoIncrement()
    {
        $id = (int) $this->getLastId() - 1;

        $builder = $this->db->query('ALTER TABLE '.$this->table.' AUTO_INCREMENT = '.$id);

        if($builder){
            return true;
        } else {
            return false;
        }
    }
}
