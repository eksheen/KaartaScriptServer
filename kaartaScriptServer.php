<!doctype html>
<html lang="en">
	<head>
		<meta charset="utf-8">
	  <meta http-equiv="X-UA-Compatible" content="IE=edge">
	  <meta name="viewport" content="width=device-width, initial-scale=1">
		<title>KaartaScriptServer</title>
		<!-- <link rel="stylesheet" href="kaarta.css"> -->
		<link href="kaarta.css" rel="stylesheet" type="text/css" media="screen" />
		<script src="jquery.js" type="text/javascript"></script>
		<script src="jquery.easing.js" type="text/javascript"></script>
		<script src="jqueryFileTree.js" type="text/javascript"></script>

		<script type="text/javascript">

			$(document).ready( function() {

				$('#pointCloudTree').fileTree({
//	need to set the proper root location for the files. 
//	comment out the original
//					root: '/home/eksheen/evan-sheen.com/Kaarta/', 	
//	stencil's data files are here:
					root: '/home/realearth/recordings/',
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
//					root: '/home/eksheen/evan-sheen.com/Kaarta/',
					root: '/home/realearth/recordings/',
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

			<div class="left">
				<div class="example">
					<h3>Pick A Point Cloud File</h3>
					<div id="pointCloudTree" class="demo"></div>
				</div>

				<div class="example">
					<h3>Pick A Trajectory File</h3>
					<div id="trajectoryTree" class="demo"></div>
				</div>

				<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>

				<form id="varForm"  method="post">
					<label class="varLabel">PointCloud Output File Name: </label> 	<label id="pointCloudFileOutput">pointcloud.ply</label> <br>
					<label class="varLabel">Trajectory Output File Name: </label> 	<label id="trajectoryFileOutput">trajectory.ply</label> <br>
				 	<label class="varLabel">Match Distance: </label> <input type="text"  class="text" name="matchDis" placeHolder="4.0(Default)"/> <br/>
				 	<label class="varLabel">Match Regin Horizontal: </label> <input type="text"  class="text" name="matchReginHori" placeHolder="15.0(Default)"/> <br>
					<label class="varLabel">Match Regin Vertical: </label> <input type="text"  class="text" name="matchReginVert" placeHolder="10.0(Default)"/> <br>
					<label class="varLabel">Pose Stack Number: </label> <input type="text"  class="text" name="poseStackNum" placeHolder="20(Default)"/> <br>
				 	<label class="varLabel">Point Search Radius: </label> <input type="text"  class="text" name="pointSearchRad" placeHolder="0.1(Default)"/> <br> <br>
					<input id="valuesSubmit" type="submit"  class="submit" onclick="changeValues()"/> <br>
				</form>

			</div>

			<div class="right">
				<h3>Press the play button to fire a script</h3>
				<!-- We use form submissions to send the data to the server to be rtrieved with our php code. -->
				<div class="container1">
					<form action="runScripts.php" method="post">
					 <p>Choose Last Pose <input type="image" src="images/play-button.ico" class="button" name="choose_last_poseRun" value="choose_last_poseRun" /> </p>
					 <p>Choose Map for Localization <input type="image" src="images/play-button.ico" class="button" name="choose_map_for_localizationRun" value="choose_map_for_localizationRun" /> </p>
					 <p>Restore Default Paramaters <input type="image" src="images/play-button.ico" class="button" name="restore_default_paramatersRun" value="restore_default_paramatersRun" /> </p>
					 <p>Restore Last Pose <input type="image" src="images/play-button.ico" class="button" name="restore_last_poseRun" value="restore_last_poseRun" /> </p>
					 <p>Save Last Pose <input type="image" src="images/play-button.ico" class="button" name="save_last_poseRun" value="save_last_poseRun" /> </p>
					 <p>Start Loop Closure <input type="image" src="images/play-button.ico" class="button" name="start_loop_closingRun" value="start_loop_closingRun" /> </p>
					 <p>Start Thinning <input type="image" src="images/play-button.ico" class="button" name="start_thinningRun" value="start_thinningRun" /> </p>
					 <p>Switch to Localization from Last <input type="image" src="images/play-button.ico" class="button" name="switch_to_localization_from_lastRun" value="switch_to_localization_from_lastRun" /> </p>
					 <p>Switch to Localization with Camera from Last <input type="image" src="images/play-button.ico" class="button" name="switch_to_localization_with_camera_from_lastRun" value="switch_to_localization_with_camera_from_lastRun" /> </p>
					 <p>Switch to Localization with Camera <input type="image" src="images/play-button.ico" class="button" name="switch_to_localization_with_cameraRun" value="switch_to_localization_with_cameraRun" /> </p>
					 <p>Switch to Localization <input type="image" src="images/play-button.ico" class="button" name="switch_to_localizationRun" value="switch_to_localizationRun" /> </p>
					 <p>Switch to Mapping with Camera <input type="image" src="images/play-button.ico" class="button" name="switch_to_mapping_with_cameraRun" value="switch_to_mapping_with_cameraRun" /> </p>
					 <p>Switch to Mapping <input type="image" src="images/play-button.ico" class="button" name="switch_to_mappingRun" value="switch_to_mappingRun" /> </p>
					</form>
				</div>
			</div>

<?php
			echo "------------------Current Variables------------------";
			echo "<br>";

			$last_pose_in = "NOT SET";
			$pointcloud_in = "NOT SET";
			$pointcloud_out = "NOT SET";
			$trajectory_in = "NOT SET";
			$trajectory_out = "NOT SET";
			$matchDis = "4.0";
			$matchReginHori = "15.0";
			$matchReginVert = "10.0";
			$poseStackNum = "20";
			$pointSearchRad = "0.1";

			    if (isset($_POST['matchDis'])) {
			      if (empty($_POST['matchDis'])) {
			        echo "matchDis(Default): " . $matchDis;
			      } else {
			        echo "matchDis: " . htmlspecialchars($_POST['matchDis']);
			      }
			    }

			    echo "<br>";

			    if (isset($_POST['matchReginHori'])) {
			      if (empty($_POST['matchReginHori'])) {
			        echo "matchReginHori(Default): " . $matchReginHori;
			      } else {
			        echo "matchReginHori: " . htmlspecialchars($_POST['matchReginHori']);
			      }
			    }

			    echo "<br>";

			    if (isset($_POST['matchReginVert'])) {
			      if (empty($_POST['matchReginVert'])) {
			        echo "matchReginVert(Default): " . $matchReginVert;
			      } else {
			        echo "matchReginVert: " . htmlspecialchars($_POST['matchReginVert']);
			      }
			    }

			    echo "<br>";

			    if (isset($_POST['poseStackNum'])) {
			      if (empty($_POST['poseStackNum'])) {
			        echo "poseStackNum(Default): " . $poseStackNum;
			      } else {
			        echo "poseStackNum: " . htmlspecialchars($_POST['poseStackNum']);
			      }
			    }

			    echo "<br>";

			    if (isset($_POST['pointSearchRad'])) {
			      if (empty($_POST['pointSearchRad'])) {
			        echo "pointSearchRad(Default): " . $pointSearchRad;
			      } else {
			        echo "pointSearchRad: " . htmlspecialchars($_POST['pointSearchRad']);
			      }
			    }
					echo"<br>";
					echo "--------------------------------------------------------";


?>


		</div>
		</body>
</html>
