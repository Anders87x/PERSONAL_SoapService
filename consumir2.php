<?php 

$url = 'http://127.0.0.1:8080/SoapService/InsertCategoria.php?wsdl';
$client = new SoapClient($url,["trace" => 1,'exceptions' => 1, 'cache_wsdl' => 1]);

$sol = [
    'usu_nom'=>'dromed',
    'usu_ape'=>'dromed',
    'usu_correo'=>'email@email.com'
];

$result = $client->InsertCategoriaService($sol);

echo "<pre>";
print_r($result);
echo "</pre>";


?>