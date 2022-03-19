<?php
	namespace Project;
	class Application
	{
		private $controller;

		private function setApp(){

			//armazena o caminho do arquivo controloador na variavel loadname
			$loadName = 'Project\Controllers\\';
			//Irá receber o retorno da função url, e através de uma condição ternária se não existir irá receber um array de valor 0
			$url = $this->url() ? $this->url():[0];
			var_dump($url);
			//Verifica se o primeiro item do array está vazio, ou seja não foi digitado nada na url
			if($url[0] == ''){
				//Se estiver vazio a variável loadName ira concatenar com o nome do controller
				$loadName.='Home';
			}else{
				/*Se algo foi digitado, utilizamos a função ucfirst para transformar a primeira letra em maílscula já que
				é o padrão para nomenclatura dos controllers, e da mesma forma a variável loadName irá concatenar com o que
				foi digitado na url
				*/
				$loadName.=ucfirst(strtolower($url[0]));
			}

			//Concatena a variável loadName ao resto do nome do arquivo do controlador
			$loadName.='Controller';

			/*Verifica se o arquivo cujo caminho foi armazenado na variável loadName existe 
			ex: Project\Controllers\HomeController.php
			*/
			if(file_exists($loadName.'.php')){
				/*Se o arquivo existir o atributo privado "controller" irá receber um novo objeto,
				que é o caminho armazenado na variável loadName
				*/
				$this->controller = new $loadName();
			}else{
				//Se o arquivo não existir irá ser exibida uma tela de erro
				include('Views/pages/erro.html');
				die();
			}
		}
		
		public function run(){
			$this->setApp();
			$this->controller->index();
		}

		public function url()
  	{
    $url = filter_input(INPUT_GET, 'url', FILTER_SANITIZE_URL);

    if(isset($url)){

      $url = trim(rtrim($url,"/"));
      $url = explode("/",$url);
      return $url;
    	}
  	}		
	}

?>