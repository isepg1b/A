<?php

try
{

$db = new PDO('mysql:host=localhost;dbname=poupipou', 'root', 'root');
}
catch (Exception $e)
{
        die('Erreur : ' . $e->getMessage());
}
?>
