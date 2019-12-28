<?php

require_once "github.com/xiclonn/php/etp/err/v1/error.php";
use github_com\xiclonn\php\etp\err as err;

function processor () {
	$data = file_get_contents ("db/data");
	if ($data === false) {
		return new err\Error ("Bug detected: possibly broken dependency; ref: 0.",
			err\Error ("Unable to load data."));
	}

	$data = trim ($data);

	$data = explode ("\n", $data);

	if (count ($data) == 0) {
		return new err\Error ("Data unavailable.");
	}

	if ((count ($data) % 2) != 0) {
		$data [count ($data)] = $data [0];
	}

	$doneX = shuffle ($data);

	if ($doneX === false) {
		return new err\Error ("Bug detected: possibly broken dependency; ref: 1.",
			err\Error ("Unable to shuffle array."));
	}

	$doneY = file_put_contents ("db/result", "");
	if ($doneY === false) {
		return new err\Error ("Bug detected: possibly broken dependency; ref: 2.",
			err\Error ("Unable to clear result file."));
	}

	foreach ($data as $word) {
		$output = $word . "\n";
		$doneZ = file_put_contents ("db/result", $output, FILE_APPEND);
		if ($doneZ === false) {
			return new err\Error ("Bug detected: possibly broken " .
				"dependency; ref: 3.",
				err\Error ("Unable to write word to file."));
		}
	}

	return err\Error::Nil ();
}
