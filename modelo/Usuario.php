<?php 

	/**
	 * 
	 */
	class Usuario 
	{
		

		private $id;
		private $nome;
		private $sexo;
		private $email;

		function __construct($id, $nome, $sexo, $email)
		{
			$this->id = $id;
			$this->nome = $nome;
			$this->sexo = $sexo;
			$this->email = $email;
		}

		public function getID(){
			return $this->id;
		}

		public function setID($id){
			$this->id = $id;
		}

		public function getNome(){
			return $this->nome;
		}

		public function setNome($nome){
			$this->nome = $nome;
		}

		public function getSexo(){
			return $this->sexo;
		}

		public function setSexo($sexo){
			$this->sexo = $sexo;
		}

		public function getEmail(){
			return $this->email;
		}

		public function setEmail($email){
			$this->email = $email;
		}

		public function getArray(){
			return $this;
		}

		public function jsonSerialize()
		{
			$vars = get_object_vars($this);

			return $vars;
		}
	}

	?>