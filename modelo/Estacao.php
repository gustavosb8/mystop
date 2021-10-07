<?php

class Estacao{

	private $id;
	private $descricao;
	private $latitude;
	private $longitude;
	private $bairro;
	private $referencia;
	private $ativo;


	function __construct($id, $descricao, $lat, $long, $bairro, $referencia, $ativo){
		$this->id = $id;
		$this->descricao = $descricao;
		$this->longitude = $long;
		$this->latitude = $lat;
		$this->bairro = $bairro;
		$this->referencia = $referencia;
		$this->ativo = $ativo;
	}

	//function __construct(){}


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

	public function getLatitude(){
		return $this->latitude;
	}

	public function setLatitude($latitude){
		$this->latitude = $latitude;
	}

	public function getLongitude(){
		return $this->longitude;
	}

	public function setLongitude($longitude){
		$this->longitude = $longitude;
	}

	public function getBairro(){
		return $this->bairro;
	}

	public function setBairro($bairro){
		$this->bairro = $bairro;
	}

	public function getReferencia(){
		return $this->referencia;
	}

	public function setRefencia($referencia){
		$this->referencia = $referencia;
	}

	public function getAtivo(){
		return $this->ativo;
	}

	public function setAtivo($ativo){
		$this->ativo = $ativo;
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