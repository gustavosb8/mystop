<?php

class Linha{

	private $id;
	private $descricao;

	function __construct($id, $descricao){
		$this->id = $id;
		$this->descricao = $descricao;
	}

	public function getID(){
		return $this->id;
	}

	public function setID($id){
		$this->id = $id;
	}

	public function getDescricao(){
		return $this->descricao;
	}

	public function setDescricao($descricao){
		$this->descricao = $descricao;
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