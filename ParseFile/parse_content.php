<?php
include_once "parseFileController.php";

$filepath = "../files/parse_files/Ajax_note.txt";

$controller = new parseFileController();
$controller->readfile($filepath);


?>
