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
					multiFolder: true
				}, function(file) {
					fileArr = file.split("/");
					file1 = fileArr[fileArr.length-1];
					file1 = file1.substr(0, file1.lastIndexOf('.'));
					var element = document.getElementById("pointCloudFileOutput");
					element.innerHTML = file1 + "_temp_loop_close.ply";
				});

				$('#trajectoryTree').fileTree({
					root: '/home/eksheen/evan-sheen.com/Kaarta/',
					script: 'connectors/jqueryFileTree.php',
					folderEvent: 'click',
					multiFolder: true
				}, function(file) {
					fileArr = file.split("/");
					file1 = fileArr[fileArr.length-1];
				  file1 = file1.substr(0, file1.lastIndexOf('.'));
					var element = document.getElementById("trajectoryFileOutput");
					element.innerHTML = file1 + "_temp_loop_close.ply";
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
				</div>

				<div class="example">
					<h3>Pick A Trajectory File</h3>
					<div id="trajectoryTree" class="demo"></div>
				</div>

				<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>

				<form id="varForm" action="submitValues.php" method="post">
					<label class="varLabel">PointCloud Output File Name: </label> 	<label id="pointCloudFileOutput">pointcloud.ply</label> <br>
					<label class="varLabel">Trajectory Output File Name: </label> 	<label id="trajectoryFileOutput">trajectory.ply</label> <br>
				 	<label class="varLabel"> matchDis: </label> <input type="text"  class="text" name="matchDis" placeHolder="4.0(Default)"/> <br/>
				 	<label class="varLabel"> matchReginHori: </label> <input type="text"  class="text" name="matchReginHori" placeHolder="15.0(Default)"/> <br>
					<label class="varLabel"> matchReginVert: </label> <input type="text"  class="text" name="matchReginVert" placeHolder="10.0(Default)"/> <br>
					<label class="varLabel"> poseStackNum: </label> <input type="text"  class="text" name="poseStackNum" placeHolder="20(Default)"/> <br>
				 	<label class="varLabel"> pointSearchRad: </label> <input type="text"  class="text" name="pointSearchRad" placeHolder="0.1(Default)"/> <br> <br>
					<input id="valuesSubmit" type="submit"  class="submit" /> <br>
				</form>
			</div>

			<h1>Press the play button to fire a script</h1>
			<!-- We use form submissions to send the data to the server to be rtrieved with our php code. -->
			<div class="container1">
				<form action="runScripts.php" method="post">
				 <p>choose_last_poseRun <input type="image" src="images/play-button.ico" class="button" name="choose_last_poseRun" value="choose_last_poseRun" /> </p>
				 <p>choose_map_for_localizationRun <input type="image" src="images/play-button.ico" class="button" name="choose_map_for_localizationRun" value="choose_map_for_localizationRun" /> </p>
				 <p>restore_default_paramatersRun <input type="image" src="images/play-button.ico" class="button" name="restore_default_paramatersRun" value="restore_default_paramatersRun" /> </p>
				 <p>restore_last_poseRun <input type="image" src="images/play-button.ico" class="button" name="restore_last_poseRun" value="restore_last_poseRun" /> </p>
				 <p>save_last_poseRun <input type="image" src="images/play-button.ico" class="button" name="save_last_poseRun" value="save_last_poseRun" /> </p>
				 <p>start_loop_closingRun <input type="image" src="images/play-button.ico" class="button" name="start_loop_closingRun" value="start_loop_closingRun" /> </p>
				 <p>start_thinningRun <input type="image" src="images/play-button.ico" class="button" name="start_thinningRun" value="start_thinningRun" /> </p>
				 <p>switch_to_localization_from_lastRun <input type="image" src="images/play-button.ico" class="button" name="switch_to_localization_from_lastRun" value="switch_to_localization_from_lastRun" /> </p>
				 <p>switch_to_localization_with_camera_from_lastRun <input type="image" src="images/play-button.ico" class="button" name="switch_to_localization_with_camera_from_lastRun" value="switch_to_localization_with_camera_from_lastRun" /> </p>
				 <p>switch_to_localization_with_cameraRun <input type="image" src="images/play-button.ico" class="button" name="switch_to_localization_with_cameraRun" value="switch_to_localization_with_cameraRun" /> </p>
				 <p>switch_to_localizationRun <input type="image" src="images/play-button.ico" class="button" name="switch_to_localizationRun" value="switch_to_localizationRun" /> </p>
				 <p>switch_to_mapping_with_cameraRun <input type="image" src="images/play-button.ico" class="button" name="switch_to_mapping_with_cameraRun" value="switch_to_mapping_with_cameraRun" /> </p>
				 <p>switch_to_mappingRun <input type="image" src="images/play-button.ico" class="button" name="switch_to_mappingRun" value="switch_to_mappingRun" /> </p>

				</form>
			</div>

		</div>

		<!--	================================================== -->
		<!-- Placed at the end of the document so the pages load faster -->
		</body>
</html>
