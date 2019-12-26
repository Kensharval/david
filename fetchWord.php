<?php

require_once "processor.php";

require_once "github.com/xiclonn/php/etp/err/v1/error.php";
use github_com\xiclonn\php\etp\err as err;

function fetchWord () {
	beginning:

	$fileContent = file_get_contents ("result");
	if ($fileContent === false) {
		return ["", err\Error ("Unable to load result file.", $respX)];
	}

	if ($fileContent == "") {
		$respY = processor ();
		if ($respY != err\Error::Nil ()) {
			return ["", err\Error ("Dependency failure; ref: 2.", $respY)];
		}

		goto beginning;
	}

	$result = explode ("\n", $fileContent, 2);

	$respZ = file_put_contents ("result", $result [1]);
	if ($respZ === false) {
		return ["", err\Error ("Unable to save the remaining result.", $respZ)];
	}

	return [$result [0], err\Error::Nil ()];
}
