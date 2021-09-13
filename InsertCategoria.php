<?php
//Ruta de la clase econea/nusoap
require_once "vendor/econea/nusoap/src/nusoap.php";
//Nombre del servicio
$namespace = "InsertCategoriaSOAP";
$server = new soap_server();
$server->configureWSDL("InsertCategoria",$namespace);
$server->wsdl->schemaTargetNamespace = $namespace;

//Estructura del servicio
$server->wsdl->addComplexType(
    'InsertCategoria',
    'complexType',
    'struct',
    'all',
    '',
    array(
        'usu_nom' => array('name' => 'usu_nom', 'type' => 'xsd:string'),
        'usu_ape' => array('name' => 'usu_ape', 'type' => 'xsd:string'),
        'usu_correo' => array('name' => 'usu_correo', 'type' => 'xsd:string'),
    )
);

//Estructura de la Respuesta del Servicio
$server->wsdl->addComplexType(
    'response',
    'complexType',
    'struct',
    'all',
    '',
    array(
        'Resultado' => array('name' => 'Resultado', 'type' => 'xsd:boolean'),
    )
);

$server->register(
    "InsertCategoriaService",
    array("InsertCategoria" => "tns:InsertCategoria"),
    array("InsertCategoria" => "tns:response"),
    $namespace,
    false,
    "rpc",
    "encoded",
    "Inserta una categoria"
);

function InsertCategoriaService($request){
    require_once "config/conexion.php";
    require_once "models/Usuario.php";

    $usuario = new Usuario();
    $usuario->insert_usuario($request["usu_nom"],$request["usu_ape"],$request["usu_correo"]);

    return array(
        "Resultado" => true
    );
}

$POST_DATA = file_get_contents("php://input");
$server->service($POST_DATA);
exit();
?>