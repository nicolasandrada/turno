<?php
$a = json_decode( file_get_contents("php://input"),true );

echo json_encode("Esta todo ok $a[f]");
//echo "Esta todo ok";