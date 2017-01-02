<!doctype html>
<html lang="en">
	<head>
		<meta charset="UTF-8"</meta>
		<title>KaartaScriptServer</title>
		<!-- <link rel="stylesheet" href="kaarta.css"> -->
		<link href="kaarta.css" rel="stylesheet" type="text/css" media="screen" />
		<script src="jquery.js" type="text/javascript"></script>
		<script src="jquery.easing.js" type="text/javascript"></script>
		<script src="jqueryFileTree.js" type="text/javascript"></script>

		<script type="text/javascript">

			$(document).ready( function() {

				$('#pointCloudTree').fileTree({
					root: '/home/eksheen/evan-sheen.com/Kaarta/',
					script: 'connectors/jqueryFileTree.php',
					multiFolder: false
				}, function(file) {
					alert(file);
				});

				$('#trajectoryTree').fileTree({
					root: '/home/eksheen/evan-sheen.com/Kaarta/',
					script: 'connectors/jqueryFileTree.php',
					folderEvent: 'click',
					multiFolder: false
				}, function(file) {
					alert(file);
				});

			});
		</script>

	</head>

	<body class="bodyClass">
		<div class="content">
			<div class="container">
				<div class="example">
					<h3>Pick A Point Cloud File</h3>
					<div id="pointCloudTree" class="demo"></div>
					<label> Output File Name: </label>
				</div>

				<div class="example">
					<h3>Pick A Trajectory File</h3>
					<div id="trajectoryTree" class="demo"></div>
					<label> Output File Name: </label>
				</div>

				<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>

				<form action="submitValues.php" method="post">
				 	<label> mathcDis </label> <input type="text"  class="text" name="matchDis" /> <br/>
				 	<label> matchReginHori </label> <input type="text"  class="text" name="matchReginHori" /> <br>
					<label> matchReginVert </label> <input type="text"  class="text" name="matchReginVert" /> <br>
				 	<label> poseStackNum </label> <input type="text"  class="text" name="poseStackNum" /> <br> <br>
					<input id="valuesSubmit" type="submit"  class="submit" /> <br>
				</form>
			</div>

			<h1>Press the play button to fire a script</h1>
			<!-- We use form submissions to send the data to the server to be rtrieved with
			our php code. -->
			<div class="container1">
				<form action="runScripts.php" method="post">
				 <p>Script 1 <input type="image" src="images/play-button.ico" class="button" name="FireScript1" value="FireScript1" /> </p>
				 <p>Script 2 <input type="image" src="images/play-button.ico" class="button" name="FireScript2" value="FireScript2" /> </p>
				 <p>Script 3 <input type="image" src="images/play-button.ico" class="button" name="FireScript3" value="FireScript3" /> </p>
				 <p>Script 4 <input type="image" src="images/play-button.ico" class="button" name="FireScript4" value="FireScript4" /> </p>
				</form>
			</div>

		</div>

		<!--	================================================== -->
			<!-- Placed at the end of the document so the pages load faster -->
		</body>
</html>
