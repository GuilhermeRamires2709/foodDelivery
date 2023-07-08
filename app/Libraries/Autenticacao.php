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

    public function logout(){

        session()->destroy();

    }



    public function pegaUsuariologado(){


        if($this->usuario === null){

            $this->usuario = $this->pegaUsuariodaSessao();

        }

        /* Retornamos o usuario que foi definido no inicio da classe */
        return $this->usuario;

    }
    /**
     * @descrição: o método só permite ficar logado na aplicação aquele que ainda existir na base e que esteja ativo, do contrario, será feito o logout do mesmo, caso haja uma mudança na sua conta durante a sessão.
     * @return type boolean
     * @uso: no filtro LoginFilter
     */
    public function estalogado(){

        return $this->pegaUsuariologado() !== null;

    }

    private function pegaUsuariodaSessao(){
        if(!session()->has('usuario_id')){
            return null;
        }

        /* Instanciamos o Model Usuario */

        $usuarioModel = new \App\Models\UsuarioModel();

        /* Recupero o usuario de acordo com a chave da sessao 'usuario_id' */

        $usuario = $usuarioModel->find(session()->get('usuario_id'));


        /* Só retorno o objecto usuario se for encontrado e ativo */

        if ($usuario && $usuario->ativo) {

            return $usuario;

        }


    }

    private function logaUsuario(object $usuario){

        $session = session();
        $session->regenerate();
        $session->set('usuario_id', $usuario->id);


    }
}


?>