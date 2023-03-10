<?php

namespace App\Models;

use CodeIgniter\Model;

class UsuarioModel extends Model
{
    
    protected $table            = 'usuarios';
    protected $returnType       = 'App\Entities\Usuario';
    protected $allowedFields    = ['nome','email','telefone'];
    protected $useTimestamps    = true;
    protected $useSoftDeletes   = true;        
    protected $createdField     = 'criado_em';
    protected $updatedField     = 'atualizado_em'; 
    protected $deletedField     = 'deletado_em'; 

    protected $validationRules = [
        'nome' => 'required|min_length[4]|max_length[120]',
        'email' => 'required|valid_email|is_unique[usuarios.email]',
        'cpf' => 'required|is_unique[usuarios.cpf]|exact_length[14]',
        'password' => 'required|min_length[6]',
        'password_confirm' => 'required_with[password] | matches[password]'

    ];
    protected $validationMesages = [
            'nome' => [
                'required' => 'O campo nome é obrigatório',
            ],
            'cpf' => [
                'required' => 'O campo CPF é obrigatório',
                'is_unique' => 'Este cpf já está vinculado a uma conta.'
            ],
            'telefone' => [
                'required' => 'O campo Telefone é obrigatório',
            ],
            'email' => [
                'required' => 'O campo E-mail é obrigatório',
                'is_unique' => 'Este e-mail já está vinculado a uma conta.'
            ],
            
    ];
    


    public function procurar($term){
        
        if ($term === null){
            return [];
        }

        return $this->select('*')
                    ->like('nome', $term)
                    ->get()
                    ->getResult();
        
        
    }
    public function desabilitaValidacaoSenha(){
        unset($this->validationRules['password']);
        unset($this->validationRules['password_confirmation']);
    }

 }
