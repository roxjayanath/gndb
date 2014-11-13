<?php
require_once("includes/initialize.php");

header('Content-Type: application/json');

$ref1 = $_REQUEST['ref1'];
$ref2 = $_REQUEST['ref2'];

$max = Product::getLastDocNumber($ref1, $ref2);

$data = array("max_doc" => ++$max);

echo json_encode($data);