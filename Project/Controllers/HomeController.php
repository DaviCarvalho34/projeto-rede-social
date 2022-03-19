<?php
	
	namespace Project\Controllers;

	class HomeController
	{
		public function index()
		{
			if(isset($_SESSION['login'])){
				//renderiza a home
				$loader = new \Twig\Loader\FilesystemLoader('Project/Views/pages');
				$twig = new \Twig\Environment($loader);
				$template = $twig->load('home.html');

				$parametros = array();
				$parametros['nome'] = 'davi';

				$conteudo = $template->render($parametros);
				echo $conteudo;
				//\Project\Views\MainView::render('home');
			}else{
				//renderizar para criar conta
				
				$loader = new \Twig\Loader\FilesystemLoader('Project/Views/pages');
				$twig = new \Twig\Environment($loader);
				$template = $twig->load('login.html');

				$parametros = array();
				$parametros['nome'] = 'davi';

				$conteudo = $template->render($parametros);
				echo $conteudo;

				if(isset($_POST['registrar'])){
					$nome_cadastro = $_POST['nome_cadastro'];
					$email_cadastro = $_POST['email_cadastro'];
					$senha_cadastro = $_POST['senha_cadastro'];
					
					if(!filter_var($email_cadastro,FILTER_VALIDATE_EMAIL)){
						\Project\Utilidades::alerta('E-mail inválido');
						\Project\Utilidades::redirect(INCLUDE_PATH.'registrar');
					}
				}
				
			//\Project\Views\MainView::render('login');
			}
		}

	}

?>