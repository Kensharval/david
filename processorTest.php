<?php

include "processor.php";

$respX = processor ();
if ($respX->Descrp () != "") {
	echo $respX->Descrp ();
	exit;
}
echo "done!";
