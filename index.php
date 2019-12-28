<?php
require_once "fetchWord.php";

require_once "github.com/xiclonn/php/etp/err/v1/error.php";
use github_com\xiclonn\php\etp\err as err;
?>

<!DOCTYPE html>
<html lang='en-GB'>
<head>
	<title>Qupie</title>
</head>
<body>
	<header>
		<span>qupie</span>
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
			echo "
<section>
	<div>{$word1 [0]}</div>
	<div>{$word2 [0]}</div>
</section>

<section>
	<button type='button' onclick='wait ();' id='waitButton'>Wait</a>
	<button type='button' onclick='go ();'>Go</a>
</section>
			";
		}
		// ..1.. }

		mainEnd:
	?></main>
</body>
</html>

<script type="text/javascript">
	var time = <?php echo $time; ?>;
	var counting = true;
	var timeEditInterface = "<?php echo str_replace ("\n", "", "
<section>
	<p>Update display time</p>

	<div>
		<p>{$time}<br />
			<span>seconds</span></p>
		<p>to</p>
		<p><form action='time.php' method='GET' id='timeUpdateForm'>
			<input name='time' type='number' /></form><br />
			<span>seconds</span></p>
	</div>

	<div>
		<button type='button' onclick='go ();'>Cancel</button>
		<button type='submit' form='timeUpdateForm'>Update</button>
	</div>
</section>
	"); ?> ";

	function pauseCounting () {
		counting = false;
	}

	function resmeCounting () {
		counting = true;
	}

	function loadTimeEditInterface () {
		pauseCounting ();
		document.getElementById ("main").innerHTML = timeEditInterface;
	}

	function wait () {
		pauseCounting ();
		document.getElementById ("waitButton").innerHTML = "Resume";
		document.getElementById ("waitButton").setAttribute ("onclick", "cntu ();");
	}

	function cntu () {
		resmeCounting ();
		document.getElementById ("waitButton").innerHTML = "Wait";
		document.getElementById ("waitButton").setAttribute ("onclick", "wait ();");
	}

	function go () {
		window.location.replace (window.location.href);
	}

	document.getElementById ("time").innerHTML = time;

	//document.write (time);

	function countingActvity () {
	//	document.write (time)
	//	document.write (counting)
		//while (true) {
			if (time == 0) {
				go ();
				return
				//break;
			}

			if (counting == false) {
				setTimeout (countingActvity, 400);
				//continue;
			} else {
				time = time - 1;
				document.getElementById ("time").innerHTML = time;
				setTimeout (countingActvity, 1000);
			}
		
		//}
	}
	setTimeout (countingActvity, 1000);
</script>
