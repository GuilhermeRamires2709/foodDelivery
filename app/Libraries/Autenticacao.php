<?php

/*
*@descricao essa biblioteca / classe cuidará da parte de autenticação na nossa aplicação
*/

class Autenticacao{
    private $usuario;

    public function login(string $email, string $password){

        $usuarioModel = new App\Models\UsuarioModel();

        $usuario = $usuarioModel->buscaUsuarioPorEmail($email);

        /* Se não encontrar o usuário por e-mail, retorna false */

        if($usuario === null){

            return false;
        }

       /* Se a senha combinar com o password_hash, retorna false */ 
        if(!$usuario->verificaPassword($password)){
            return false;
        }

        /** Só permetiremos o login de usuários ativos */

        if(!$usuario->ativo){
            return false;
        }

        /* Nesse ponto está tudo certo e podemos logar o usuário na aplicação invocando o método abaixo */
        $this->logaUsuario($usuario);

        return true;

    }

    private function logaUsuario(object $usuario){

        $session = session();
        $session->regenerate();
        $session->set('usuario_id', $usuario->id);


    }
}


?>