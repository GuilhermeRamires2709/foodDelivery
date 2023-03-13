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
        'nome' => 'required|min_lenght[4]|max_lenght[120]',
        'email' => 'required|valid_email|is_unique[usuarios.email]',
        'cpf' => 'required|is_unique[usuarios.cpf]|exact_lenght[14]',
        'password' => 'required|min_lenght[6]',
        'password_confirm' => 'required_with[password] | matches[password]'

    ];
    protected $validationMesages = [
            'nome' => [
                'required' => 'Esse campo é obrigatório',
            ],
            'cpf' => [
                'required' => 'Esse campo é obrigatório',
                'is_unique' => 'Este cpf já está vinculado a uma conta.'
            ],
            'cpf' => [
                'required' => 'Esse campo é obrigatório',
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

 }
