<!doctype html>
<html lang="en">
	<head>
		<meta charset="UTF-8"</meta>
		<title>KaartaScriptServer</title>
		<link rel="stylesheet" href="kaarta.css">
	</head>
	<body class="bodyClass">
		<div class="content">
			<div class="container">
				<form action="submitValues.php" method="post">
					<label> PointCloud File </label> <input type="file"  class="file" name="pointCloudFile" />
					<label> Output File Name </label> <input type="text"  class="text" name="outputFileNamePC" /> <br>
				 	<label> Trajectory File </label> <input type="file"  class="file" name="trajectoryFile" />
					<label> Output File Name </label> <input type="text"  class="text" name="outputFileNameTF" /> <br>
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
				 <p>Script 1 <input type="image" src="IMG/play-button.ico" class="button" name="FireScript1" value="FireScript1" /> </p>
				 <p>Script 2 <input type="image" src="IMG/play-button.ico" class="button" name="FireScript2" value="FireScript2" /> </p>
				 <p>Script 3 <input type="image" src="IMG/play-button.ico" class="button" name="FireScript3" value="FireScript3" /> </p>
				 <p>Script 4 <input type="image" src="IMG/play-button.ico" class="button" name="FireScript4" value="FireScript4" /> </p>
				</form>
			</div>

		</div>
	</body>
</html>
