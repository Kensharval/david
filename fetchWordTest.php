<?php

require_once "fetchWord.php";

for ($x = 1; $x <= 18; $x ++) {
	print_r (fetchWord ());
	if (($x % 4) == 0) {
		echo "<p></p>";
	}
	echo "<br />";
}
