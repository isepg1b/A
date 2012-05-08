<?php
try
{
    $pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
    $bdd = new PDO('mysql:host=localhost;dbname=Poupipou', 'root', '', $pdo_options);
    
   }
catch(Exception $e)
{
    die('Erreur : '.$e->getMessage());
}
?>
<?php

if ( isset( $_POST ) )
	$postArray = &$_POST ;			// 4.1.0 or later, use $_POST
else
	$postArray = &$HTTP_POST_VARS ;	// prior to 4.1.0, use HTTP_POST_VARS

foreach ( $postArray as $sForm => $value )
{
	if ( get_magic_quotes_gpc() )
		$postedValue = ( stripslashes( $value ) ) ;
	else
		$postedValue = ( $value ) ;

?>
		<?php/* echo /*htmlspecialchars($sForm; */?> 
<html>	<?php echo $postedValue?> </html>
	<?php
}
?>
