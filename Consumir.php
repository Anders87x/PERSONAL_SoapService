<?php
$location = "http://127.0.0.1:8080/SoapService/InsertCategoria.php?wsdl";

$request= "
<soapenv:Envelope xmlns:xsi=\"http://www.w3.org/2001/XMLSchema-instance\" xmlns:xsd=\"http://www.w3.org/2001/XMLSchema\" xmlns:soapenv=\"http://schemas.xmlsoap.org/soap/envelope/\" xmlns:ins=\"InsertCategoriaSOAP\">
   <soapenv:Header/>
   <soapenv:Body>
      <ins:InsertCategoriaService soapenv:encodingStyle=\"http://schemas.xmlsoap.org/soap/encoding/\">
         <InsertCategoria xsi:type=\"ins:InsertCategoria\">
            <!--You may enter the following 3 items in any order-->
            <usu_nom xsi:type=\"xsd:string\">dd</usu_nom>
            <usu_ape xsi:type=\"xsd:string\">dd</usu_ape>
            <usu_correo xsi:type=\"xsd:string\">dd@andercode.com</usu_correo>
         </InsertCategoria>
      </ins:InsertCategoriaService>
   </soapenv:Body>
</soapenv:Envelope>
";

print("Resquest : <br>");
print("<pre>".htmlentities($request)."</pre>");

$action = "InsertCategoriaService";
$headers = [
    'Method: POST',
    'Connection: Keep-Alive',
    'User-Agent: PHP-SOAP-CURL',
    'Content-Type: text/xml; charset=utf-8',
    'SOAPAction: InsertCategoriaService',
];

//Segun Documentacion
$ch = curl_init($location);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, $request);
curl_setopt($ch, CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_1_1);

$response = curl_exec($ch);
$err_status = curl_errno($ch);

print("Resquest : <br>");
print("<pre>".$response."</pre>");

?>