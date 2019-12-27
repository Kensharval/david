<?php

if ($_GET ["time"] == "") {
	header ("Location: index.php?response=e1"); // No time provided.
	exit;
}

if (! is_numeric ($_GET ["time"])) {
	header ("Location: index.php?response=e2"); // Invalid time.
	exit;
}

$respX = file_put_contents ("db/time", $_GET ["time"])
if ($respX === false) {
	header ("Location: index.php?response=e3"); // Unable to update time.
	exit;
}

header ("Location: index.php?response=success");
