<?php

if ($_GET ["time"] == "") {
	header ("Location: index.php?response=e1"); // No time provided.
	exit;
}

if (! is_numeric ($_GET ["time"])) {
	header ("Location: index.php?response=e2"); // Invalid time.
	exit;
}

if (floor ($_GET ["time"]) < 2) {
	header ("Location: index.php?response=e3"); // Time too short.
	exit;
}

$respX = file_put_contents ("db/time", floor ($_GET ["time"]));
if ($respX === false) {
	header ("Location: index.php?response=e4"); // Unable to update time.
	exit;
}

header ("Location: index.php");
