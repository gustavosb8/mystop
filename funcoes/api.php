<?php 

function getBairroFromLatLong($latitude, $longitude){
	$json = file_get_contents('https://maps.googleapis.com/maps/api/geocode/json?latlng='.$latitude.','.$longitude.'&key=AIzaSyA8cRaydnZrHSlR1EPYG4mZqbEVgTEokFc');
	$resultado = json_decode($json);
	return $resultado->results[0]->address_components[2]->long_name;
}

function getPlaceIDPorDescricao($lugar){
	
	$json = file_get_contents("https://maps.googleapis.com/maps/api/place/autocomplete/json?input=".urlencode($lugar).'&key=AIzaSyA8cRaydnZrHSlR1EPYG4mZqbEVgTEokFc');

	$resultado = json_decode($json);

	return $resultado->predictions[0]->place_id;
}

function getPlaceLocationByID($id){

	$json = file_get_contents('https://maps.googleapis.com/maps/api/place/details/json?place_id='.urlencode($id).'&key=AIzaSyA8cRaydnZrHSlR1EPYG4mZqbEVgTEokFc');

	$resultado = json_decode($json);

	return $resultado->result->geometry->location;

}

 ?>