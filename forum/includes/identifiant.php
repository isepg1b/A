<?php

try
{

$db = new PDO('mysql:host=localhost;dbname=Poupipou', 'root', '');
}
catch (Exception $e)
{
        die('Erreur : ' . $e->getMessage());
}
?>
