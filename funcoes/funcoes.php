<?php

require_once('api.php');
require_once('../consultas/TBESTACAO.php');

function getArrayParadas($paradas){

	foreach ($paradas as $key => $parada) {
		$row = array();

		array_push($row, $parada->getID());
		array_push($row, $parada->getDescricao());
		array_push($row, $parada->getLatitude());
		array_push($row, $parada->getLongitude());

		$array[$key] = $row;

	}

	return $array;
}

function erro_print($erro, $mensagem){

	$error  = array('erro' => $erro, 'mensagem' => $mensagem);
	

	$json = json_encode($error);

	print_r($json);
}


function getEstacaoMaisProximaPorLatitude($lat_inicial, $long_inicial){
	$bairro  = getBairroFromLatLong($lat_inicial, $long_inicial);
	$estacoesProximas = buscaEstacoesPorBairro($bairro);

	return calcEstacaoMaisProxima($lat_inicial, $long_inicial, $estacoesProximas);

}

function getEstacaoMaisProximaPorDescricao($lugar){

    $placeID = getPlaceIDPorDescricao($lugar);
    $location = getPlaceLocationByID($placeID);
    $bairro  = getBairroFromLatLong($location->lat, $location->lng);
    $estacoesProximas = buscaEstacoesPorBairro($bairro);

    return calcEstacaoMaisProxima($location->lat, $location->lng, $estacoesProximas);
    
}


function calcEstacaoMaisProxima($lat_inicial, $long_inicial, $estacoesProximas){

	$estacoes = array();
	foreach ($estacoesProximas as $estacao) {
		array_push($estacoes, array('id' => $estacao['IDESTACAO'], 
           'distacia' => calcDistancia($lat_inicial, $long_inicial, $estacao['LATITUDE'], $estacao['LONGITUDE'], 'K')));
	}

    $columm = array_column($estacoes, 'distacia');
    array_multisort($columm, SORT_ASC, $estacoes);
	return $estacoes[0];
}


/*::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::*/
/*::                                                                         :*/
/*::  This routine calculates the distance between two points (given the     :*/
/*::  latitude/longitude of those points). It is being used to calculate     :*/
/*::  the distance between two locations using GeoDataSource(TM) Products    :*/
/*::                                                                         :*/
/*::  Definitions:                                                           :*/
/*::    South latitudes are negative, east longitudes are positive           :*/
/*::                                                                         :*/
/*::  Passed to function:                                                    :*/
/*::    lat1, lon1 = Latitude and Longitude of point 1 (in decimal degrees)  :*/
/*::    lat2, lon2 = Latitude and Longitude of point 2 (in decimal degrees)  :*/
/*::    unit = the unit you desire for results                               :*/
/*::           where: 'M' is statute miles (default)                         :*/
/*::                  'K' is kilometers                                      :*/
/*::                  'N' is nautical miles                                  :*/
/*::  Worldwide cities and other features databases with latitude longitude  :*/
/*::  are available at https://www.geodatasource.com                          :*/
/*::                                                                         :*/
/*::  For enquiries, please contact sales@geodatasource.com                  :*/
/*::                                                                         :*/
/*::  Official Web site: https://www.geodatasource.com                        :*/
/*::                                                                         :*/
/*::         GeoDataSource.com (C) All Rights Reserved 2018                  :*/
/*::                                                                         :*/
/*::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::*/
function calcDistancia($lat1, $lon1, $lat2, $lon2, $unit)
{
    if (($lat1 == $lat2) && ($lon1 == $lon2)) {
        return 0;
    }
    else {
        $theta = $lon1 - $lon2;
        $dist = sin(deg2rad($lat1)) * sin(deg2rad($lat2)) +  cos(deg2rad($lat1)) * cos(deg2rad($lat2)) * cos(deg2rad($theta));
        $dist = acos($dist);
        $dist = rad2deg($dist);
        $miles = $dist * 60 * 1.1515;
        $unit = strtoupper($unit);

        if ($unit == "K") {
          return ($miles * 1.609344);
      } else if ($unit == "N") {
          return ($miles * 0.8684);
      } else {
          return $miles;
      }
    }
}

?>