<?php 
	/**
	*	Classe desenvolvida para gerenciar área restrita do usuário
	*	Author: Gabriel Azuaga Barbosa <gabrielbarbosaweb7@gmail.com>
	*	Github: https://github.com/gabrielweb7
	*	Site pessoal: http://gabrieldaluz.com.br
	*	Version: 1.0.0
	*/
	class areaRestrita {

		/**
		*	Variavel que define nome da sessão de Status
		*/
		private static $nameSession = "statusLogged"; 

		/**
		*	Variavel que define valor positivo da sessão de Status
		*/
		private static $positiveStatus = "0x1"; 

		/**
		*	Função criada retornar status do login do usuario
		*	Return: True ou False
		*/
		public static function getStatusLogged() {
			/**
			*	Se a sessão existe e ela contem o valor de 0x1
			*	retorna true.. caso contrario retorna false
			*/
			if(isset($_SESSION[self::$nameSession]) and $_SESSION[self::$nameSession] = self::$positiveStatus) { 
				return true;
			}
			return false;
		}

		/**
		*	Função criada retornar status do login do usuario
		*	Return: True ou False
		*/
		public static function setLogged($v = false) {
			if($v) {
				/**
				*	Atribuir valor positivo para sessão de status de login
				*/
				$_SESSION[self::$nameSession] = self::$positiveStatus;
			} else { 
				/**
				*	Destruir sessão
				*/
				unset($_SESSION[self::$nameSession]);
			}
		}

		/**
		*	Função criada para proteger pagina de acessos sem estar logado
		*	Return: Em caso de false.. redirecionando para pagina de login!
		*/
		public static function isProtectedPage($urlRedirect) {
		    /**
	        *	Verifica Status de Loggin
	        */
	        if(!self::getStatusLogged()) {
	            /**
	            *   Redirecionar para pagina de login
	            */
	            jsTools::redirecionar($urlRedirect);
	        } 
		}


	}

?>