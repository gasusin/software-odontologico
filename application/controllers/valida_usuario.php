<?php 
/* esse bloco de código em php verifica se existe a sessão, pois o usuário pode simplesmente 
não fazer o login e digitar na barra de endereço do seu navegador o caminho para a página 
principal do site (sistema), burlando assim a obrigação de fazer um login, com isso se ele
não estiver feito o login não será criado a session, então ao verificar que a session não 
existe a página redireciona o mesmo para o login.*/
// var_dump($this->session->userdata("usuario_logado"));die;
if(!$this->session->userdata("usuario_logado")) {
	redirect("/usuarios");die;
}

?>