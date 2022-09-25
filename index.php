<?php 

require "AccessClass.php";

$acesso = new Access();

echo "<pre>";
print_r($acesso->getInfo());
echo "</pre>";

?>
