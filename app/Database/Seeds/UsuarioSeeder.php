<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class UsuarioSeeder extends Seeder
{
    public function run()
    {
        $usuario_model= new \App\Models\UsuarioModel;
    
    $usuario = [
        'nome' => 'Guilherme',
        'email' => 'g.ramires2709@outlook.com',
        'telefone' => '51998164196' 
    ];

    $usuario_model->protect(false)->insert($usuario);

    dd($usuario_model->errors());

    }
}
