<?php
require_once "fetchWord.php";

require_once "github.com/xiclonn/php/etp/err/v1/error.php";
use github_com\xiclonn\php\etp\err as err;
?>

<!DOCTYPE html>
<html lang='en-GB'>
<head>
	<title>Qupie | A pet project</title>
	<link rel="stylesheet" href="index.css" />
</head>
<body>
	<header>
		<span id="title">Qupie</span>
		<span id="time" onclick='loadTimeEditInterface ()'></span>
	</header>

	<main id='main'><?php
		// ..1.. {
		$time = file_get_contents ("db/time");
		if ($time === false) {
			echo "
<section>Error: <span>Unable to fetch the display time.</span></section>
			";
			goto mainEnd;
		}
		// ..1.. }

		// ..1.. {
		$word1 = fetchWord ();
		$word2 = fetchWord ();

		if ($word1 [1] != err\Error::Nil () || $word2 [1] != err\Error::Nil ()) {
			$wordX = $word1;
			if ($word2 [1] != nil) {
				$wordX = $word2;
			}
			echo "
<section>Error: <span>{$wordX [1]->Descrp ()}</span></section>
			";
		} else {
			if (mb_strlen ($word2 [0]) > mb_strlen ($word1 [0])) {
				$tempWord = $word1 [0];
				$word1 [0] = $word2 [0];
				$word2 [0] = $tempWord;
			}

			echo "
<section id='word'>
	<span class='word' id='word1'>{$word1 [0]}</span>
	
	<span class='word' id='word2'>{$word2 [0]}</span>
</section>

<section id='button'>
	<button class='button' type='button' onclick='wait ();' id='waitButton'>Wait</a>
	<button class='button' type='button' onclick='go ();' id='goButton'>Go</a>
</section>
			";
		}
		// ..1.. }

		mainEnd:
	?></main>
</body>
</html>

<?php require_once 'index.js.php'; ?>
