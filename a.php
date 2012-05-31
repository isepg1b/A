<?php

if($_SERVER['HTTP_REFERER'] != "http://localhost/a/A/")
{
echo 'Accés interdit !';
}
else {

echo '<SCRIPT language=javascript>  alert("aaa")</SCRIPT>';
}

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<a href="a.php">Aj</a>