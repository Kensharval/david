<?php
require_once "fetchWord.php";

require_once "github.com/xiclonn/php/etp/err/v1/error.php";
use github_com\xiclonn\php\etp\err as err;
?>

<!DOCTYPE html>
<head>
	<title>Qupie</title>
</head>
<body>
	<header>
		<section>qupie</section>
		<section></section>
	</header>

	<main><?php
		// ..1.. {
		$time = file_get_contents ("db/time");
		if ($time === false) {
			echo "
<section>Error: <span>Unable to fetch the display time.</span></section>
			";
		}
		// ..1.. }

		// ..1.. {
		$word1 = fetchWord ();
		$word2 = fetchWord ();

		if ($word [1] != err\Error::Nil () || $word2 [1] != err\Error::Nil ()) {
			$word = 1;
			if ($word2 [1] != nil) {
				$word = 2;
			}
			echo "
<section>Error: <span>{$word [$word]->Descrp ()}</span></section>
			";
		} else {
			echo "
<section>
	<div>{$word1}</div>
	<div>{$word2}</div>
</section>

<section>
	<a>Wait</a>
	<a>Go</a>
</section>
			";
		}
		// ..1.. }

		mainEnd:
	?></main>
</body>
</html>

<script type="text/javascript">
	var counting = true;
	var timeEditInterface = "<?php echo "
<section>
	<p>Update display time</p>
	<div>
		<p>{$}<br />
			<span>seconds</span></p>
		<p>to</p>
		<p><form action='model/time.php' method='GET'>
			<input name='time' type='number' /></form><br />
			<span>seconds</span></p>
	</div>
	<div>
		<button>Cancel</button>
		<button>Update</button>
	</div>
</section>
	";?>";

	function loadTimeEditInterface () {}
	function pauseCounting () {}
	function resumeCounting () {}
	function go () {}
</script>
