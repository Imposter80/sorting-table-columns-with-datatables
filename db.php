<?php

$dbHost='localhost';
$dbUser='root';
$dbPass='root';
$dbName='test_encomage_db';


$cs='mysql:host='.$dbHost.';dbname='.$dbName.';charset=utf8;';

$options=array(
	PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION,
	PDO::ATTR_DEFAULT_FETCH_MODE=>PDO::FETCH_ASSOC,
	PDO::MYSQL_ATTR_INIT_COMMAND=>'SET NAMES UTF8');
try
	{
		$connection=new PDO($cs,$dbUser,$dbPass,$options);		
		
	}
catch(PDOException $e)
	{
		echo $e->getMessage();		
	}


?>
