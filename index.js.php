<script type="text/javascript">
	var homeInterface = "http://192.168.43.116/dev";
	var time = <?php echo $time; ?>;
	var counting = true;
	var timeEditInterface = "<?php echo str_replace ("\n", "", "
<section id='timeUpdateSubinterface'>
	<p id='interfaceCaption'>Update display time!</p>

	<div id='timeDetails'>
		<div class='part someTime' id='second1'><p>{$time}<sup class='second'>seconds</sup></p>
			</div>
		<div class='part' id='to'>to</div>
		<div class='part someTime' id='second2'>
			<p><form action='time.php' method='GET' id='timeUpdateForm'>
				<input name='time' type='text' />
			</form><sup class='second'>seconds</sup></p>
			</div>
	</div>

	<div>
		<button class='updateButton' type='button' onclick='cancel ();'>Cancel</button>
		<button class='updateButton' type='submit' form='timeUpdateForm'>Update</button>
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
		oldInterface = document.getElementById ("main").innerHTML;
		document.getElementById ("main").innerHTML = timeEditInterface;
	}

	function cancel () {
		window.location.replace (homeInterface);
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

	function next () {
		window.location.replace (window.location.href);
	}	

	function go () {
		document.getElementById ("goButton").innerHTML = "...";
		next ();
	}

	document.getElementById ("time").innerHTML = time;

	function getUrlVars() {
 	   	var vars = {};
    		var parts = window.location.href.replace(/[?&]+([^=&]+)=([^&]*)/gi, function(m,key,value) {
        	vars[key] = value;
    		});
    		return vars;
	}
	function getUrlParam(parameter, defaultvalue){
 		var urlparameter = defaultvalue;
	    	if (window.location.href.indexOf(parameter) > -1){
        		urlparameter = getUrlVars()[parameter];
        	}
    		return urlparameter;
	}

	function countingActvity () {
		if (time == 0) {
			go ();
			return
		}

		if (counting == false) {
			setTimeout (countingActvity, 400);
		} else {
			time = time - 1;
			document.getElementById ("time").innerHTML = time;
			setTimeout (countingActvity, 1000);
		}
	}

	if (getUrlParam ("response", "") != "") {
		loadTimeEditInterface ();
	} else {
		setTimeout (countingActvity, 1000);
	}
</script>
