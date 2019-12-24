<?php

require_once "processor.php";

require_once "github.com/xiclonn/php/etp/err/v1/error.php";
use github_com\xiclonn\php\etp\err as err;

function fetchWord () {
	if (! file_exists ("result")) {
		$respX = processor ();
		if ($respX != err\Error::Nil ()) {
			return ["", "", err\Error ("Dependency failure; ref: 0.", $respX)];
		}
	}

	$size = filesize ("result")
	if ($size === false) {
		return ["", "", err\Error ("Dependency failure; ref: 1.")];
	}

	if ($size == 0) {
		$respY = processor ();
		if ($respY != err\Error::Nil ()) {
			return ["", "", err\Error ("Dependency failure; ref: 2.", $respY)];
		}
	}
