<?php

require_once "processor.php";

require_once "github.com/xiclonn/php/etp/err/v1/error.php";
use github_com\xiclonn\php\etp\err as err;

if (! file_exists ("result")) {
	$respX = processor ()
	if ($respX != err\Error::Nil ()) {
		return err\Error ("Dependency failure. ")