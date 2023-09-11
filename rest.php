<?php
$BDD = new PDO('mysql:host=127.0.0.1;dbname=benjamin;charset=utf8', 'root', '');
$req_typ = $_SERVER['REQUEST_METHOD'];
switch($req_typ)
{
case 'GET':
$instant = $_GET['date_heure'];
//print_r($instant." \r \n");
$req = "SELECT * FROM combine WHERE InstantMesureBDD='".$instant."'";
//print_r($req." \r \n");
$res=$BDD->prepare($req, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
$res->execute(NULL);
$data = $res->fetchAll(PDO::FETCH_ASSOC);
$data_json = json_encode($data);
print_r($data_json);
break;
case 'POST':
$data_json = json_decode(file_get_contents("php://input"), true);
print_r($data_json);
$req = "INSERT INTO combine VALUES (NULL,'".$data_json['date_heure']."', '".$data_json['Vitesse']."',
'".$data_json['Regime']."')";
$res=$BDD->prepare($req, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
print_r($req);
$res->execute(NULL);
break;
}
?>
