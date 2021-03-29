<?php

$host='localhost';
$user='root';
$pass='root';
$dbname='test_encomage_db';


$cs='mysql:host='.$host.';dbname='.$dbname.';charset=utf8;';

$options=array(
	PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION,
	PDO::ATTR_DEFAULT_FETCH_MODE=>PDO::FETCH_ASSOC,
	PDO::MYSQL_ATTR_INIT_COMMAND=>'SET NAMES UTF8');
try
	{
		$connection=new PDO($cs,$user,$pass,$options);		
		
	}
catch(PDOException $e)
	{
		echo $e->getMessage();		
	}


?>