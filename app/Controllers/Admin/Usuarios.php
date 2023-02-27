<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

class Usuarios extends BaseController
{
    private $usuarioModel;

    public function __construct()
    {
        $this->usuarioModel = new \App\Models\UsuarioModel();    
    }
    

    

    public function index()
    {
        $usuarios = $this->usuarioModel->findAll();

        dd($usuarios);
    }
}
