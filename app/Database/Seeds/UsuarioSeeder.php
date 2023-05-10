<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class UsuarioSeeder extends Seeder
{
    public function run()
    {
        $usuario_model = new \App\Models\UsuarioModel;

        $usuario = [
            'nome' => 'José das Dores',
            'email' => 'zedores@outlook.com',
            'cpf' => '966.625.890-04',
            'telefone' => '(51) 17248-5913'
            

        ]; 

        $usuario_model->protect(false)->insert($usuario);

        $usuario2 = [
            'nome' => 'Maria Antonieta',
            'email' => 'g.ramires2709@outlook.com',
            'cpf' => '215.185.660-73',
            'telefone' => '(51) 29344-4292'
            


        ];

        $usuario_model->protect(false)->insert($usuario2);

        dd($usuario_model->errors());


    }
}
