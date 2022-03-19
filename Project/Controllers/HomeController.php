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
				\Project\Controllers\RegistrarController::index();
				
			//\Project\Views\MainView::render('login');
			}
		}

	}

?>