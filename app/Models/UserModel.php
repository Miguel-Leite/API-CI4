<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{

    protected $table                           = 'user';
    protected $primaryKey                      = 'id';

    protected $returnType                      = 'object';
    protected $allowedFields                   = ['name', 'lastName', 'bi', 'phone', 'email', 'password', 'id_autorizid_tokens'];

    protected $useSoftDeletes                  = false;

    protected $useTimestamps                   = true;
    protected $createdField                    = 'created_at';
    protected $updatedField                    = 'updated_at';
    protected $deletedField                    = 'deleted_at';

    protected $validationRules                 = [
        'name' => 'required|min_length[3]|max_length[75]',
        'lastName' => 'required|min_length[3]|max_length[75]',
        'bi' => 'required|is_bi_valid|is_unique[user.bi]',
        'phone' => 'required|is_phone_valid|is_unique[user.phone]',
        'email' => 'valid_email|is_unique[user.email]',
        'password' => 'required|min_length[6]|max_length[12]',
        'id_autorizid_tokens' => 'required'
    ];

    protected $validationMessages              = [
        'name' => [
            'required' => 'Estimado usuário, é obrigatório informar o nome!',
            'min_length' => 'Estimado usuário, o nome deve conter no minimo 3 caracteres!',
            'max_length' => 'Estimado usuário, o nome deve conter no máximo 75 caracteres!'
        ],
        'lastName' => [
            'required' => 'Estimado usuário, é obrigatório informar o sobre nome!',
            'min_length' => 'Estimado usuário, o sobre nome deve conter no minimo 3 caracteres!',
            'max_length' => 'Estimado usuário, o sobre nome deve conter no máximo 75 caracteres!'
        ],
        'email' => [
            'valid_email' => 'Estimado usuário, deves informar um email válido!',
            'is_unique' => 'Estimado usuário, o email informado já esta cadastro no sistema'
        ],
        'bi' => [
            'required' => 'Estimado usuário, é obrigatório informar o numero do BI!',
            'is_bi_valid' => 'Estimado usuário, o numero do BI informado não é válido!',
            'is_unique' => 'Estimado usuário, o numero do BI informado já esta cadastro no sistema!'
        ],
        'phone' => [
            'required' => 'Estimado usuário, é obrigatório informar o numero do telefone!',
            'is_phone_valid' => 'Estimado usuário, o numero de telefone informado não é válido!',
            'is_unique' => 'Estimado usuário, o numero do telefone informado já esta cadastro no sistema'
        ],
        'password' => [
            'max_length' => 'Estimado usuário, a senha deve ter no máximo 12 caracteres!',
            'min_length' => 'Estimado usuário, a senha deve ter no minimo 6 caracteres!',
            'required' => 'Estimado usuário, é obrigatório informar uma senha'
        ],
        'id_autorizid_tokens' => ['required' => 'Estimado usuário, é obrigatório obter um token do sistema. Falha!']
    ];

    protected $skipValidation               = false;


    public function userWithToken($id = null)
    {
        $builder = $this->db->table($this->table);
        $builder->select('*');
        $builder->select('autorizid_tokens.token, autorizid_tokens.status');
        $builder->join('autorizid_tokens', 'autorizid_tokens.id = user.id_autorizid_tokens');
        if (!(empty($id)) || !(is_null($id))) {
            $builder->where('user.id', $id);
        }

        $query = $builder->get();
        return $query->getResult();
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

        $builder = $this->db->query('ALTER TABLE ' . $this->table . ' AUTO_INCREMENT = ' . $id);

        if ($builder) {
            return true;
        } else {
            return false;
        }
    }

    public function getColum($column_name, $email)
    {
        $builder = $this->db->table($this->table);
        $builder->select($column_name);
        $builder->where($column_name,$email);
        $query = $builder->get();

        if($query)
        {
            return $query->getResult();
        } else {
            return false;
        }
    }

    public function getColums($column_name1, $column_name2, $column1, $column2)
    {

        $builder = $this->db->table($this->table);
        $builder->select('*');
        $builder->where($column_name1,$column1);
        $builder->where($column_name2,$column2);
        $get = $builder->get();

        if($get)
        {
            return $get->getResult();
        } else {
            return false;
        }

    }

}
