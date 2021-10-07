<?php
 function conectarMyStop(){
    
    	/* Heroku
        $host = "us-cdbr-iron-east-05.cleardb.net";
        $dbname = "heroku_63a3468900c5497";
        $user = "b11196e4e07169";
        $password = "53eab41c";
        */
        
        /* 000webhost
        $host = "localhost";
        $dbname = "id12882445_mystopslz";
        $user = "id12882445_gustavo";
        $password = "l33t.m4st3r";
        */

        /* Hostinger */
        $host = "localhost";
        $dbname = "u891197946_mystop";
        $user = "u891197946_gustavo";
        $password = "l33t.m4st3r";
        
     
        try{
 
            $dsn = 'mysql:host='.$host.';dbname='.$dbname.';charset=utf8';
     
            $conn = new PDO($dsn, $user, $password, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            //$conn->setAttribute(PDO::MYSQL_ATTR_INIT_COMMAND = "SET NAMES utf8");
         
     
        }catch(PDOException $exception){
     
          die("<br><br>Não foi possível se conectar com a base de dados - ".$dbname);
     
        }
         
        return $conn;
     
     
    }

?>