<!doctype html>
<html lang="en">
	<head>
		<meta charset="utf-8">
	  <meta http-equiv="X-UA-Compatible" content="IE=edge">
	  <meta name="viewport" content="width=device-width, initial-scale=1">
		<title>KaartaScriptServer</title>
		<link href="kaarta.css" rel="stylesheet" type="text/css" media="screen" />
		<script src="jquery.js" type="text/javascript"></script>
		<script src="jquery.easing.js" type="text/javascript"></script>
		<script src="jqueryFileTree.js" type="text/javascript"></script>
		<script src="fileTree.js"></script>
	</head>
		<body class="bodyClass">
			<div class="content">
				<div class="changeModes">
					<hr>
					<h3>Change Modes</h3>
					<hr>
					<form class="modes" action="runScripts.php" method="post">
						<input type="submit" class="valuesSubmit" name="switch_to_localizationRun" value="switch_to_localizationRun" /> <br><br>
						<input type="submit" class="valuesSubmit" name="switch_to_localization_from_lastRun" value="switch_to_localization_from_lastRun" /> <br><br>

						<input type="submit" class="valuesSubmit" name="switch_to_localization_with_cameraRun" value="switch_to_localization_with_cameraRun" /> <br><br>
						<input type="submit" class="valuesSubmit" name="switch_to_localization_with_camera_from_lastRun" value="switch_to_localization_with_camera_from_lastRun" /> <br><br>


						<input type="submit"  class="valuesSubmit" name="switch_to_mappingRun" value="switch_to_mappingRun" /> <br><br>
						<input type="submit" class="valuesSubmit" name="switch_to_mapping_with_cameraRun" value="switch_to_mapping_with_cameraRun" />
					</form>
				</div>

				<div class="localizationMapSelection">
					<hr>
					<h3>Localization Map Selection</h3>
					<hr>

					<div class="example">
						<h3>Pick A Point Cloud File</h3>
						<div id="pointCloudTree" class="demo"></div>
					</div>

					<br><br><br><br><br><br><br><br><br>
					<!-- <form class="localizationMapForm" method="post"> -->
						<label>Localization Map Selected: </label> <label id="pointCloudFileOutput"></label> <br><br>
						<input type="submit" class="valuesSubmit" id="localizationBtn" name="choose_map_for_localizationRun" value="choose_map_for_localizationRun"/>
					<!-- </form> -->

				</div>

				<div class="poseSelection">
					<hr>
					<h3>Pose Selection</h3>
					<hr>
					<form class="modes" action="runScripts.php" method="post">
						<input type="submit" class="valuesSubmit" name="save_last_poseRun" value="save_last_poseRun" /> <br><br>
						<input type="submit" class="valuesSubmit" name="restore_last_poseRun" value="restore_last_poseRun" /> <br><br>
					</form>


					<div class="example">
						<h3>Pick A Pose *.txt File</h3>
						<div id="poseTree" class="demo"></div>
					</div>

					<br><br><br><br><br><br><br><br><br>

					<form class="poseSelectionForm" action="index.html" method="post">
						<label>Pose File Selected: </label> <label id="poseFileOutput"></label> <br> <br>
					</form>

					<input type="submit" class="valuesSubmit" id="lastPoseBtn" name="choose_last_poseRun" value="choose_last_poseRun" />

				</div>

				<div class="loopClosure">
					<hr>
					<h3>Loop Closure</h3>
					<hr>

					<div class="example">
						<h3>Pick A Point Cloud File</h3>
						<div id="pointCloudTree1" class="demo"></div>
					</div>

					<br><br><br><br><br><br><br><br><br>

					<div class="example">
						<h3>Pick A Trajectory File</h3>
						<div id="trajectoryTree1" class="demo"></div>
					</div>

					<br><br><br><br><br><br><br><br><br><br>

					<form id="loopClosureForm" action="/" method="post">
						<label class="varLabel">PointCloud Output File Name: </label> 	<label id="pointCloudFileOutput1">pointcloud.ply</label> <br>
						<label class="varLabel">Trajectory Output File Name: </label> 	<label id="trajectoryFileOutput1">trajectory.ply</label> <br>
					 	<label class="varLabel">Match Distance: </label> <input type="text"  class="text" name="matchDis" placeHolder="4.0(Default)"/> <br/>
					 	<label class="varLabel">Match Regin Horizontal: </label> <input type="text"  class="text" name="matchReginHori" placeHolder="15.0(Default)"/> <br>
						<label class="varLabel">Match Regin Vertical: </label> <input type="text"  class="text" name="matchReginVert" placeHolder="10.0(Default)"/> <br>
						<label class="varLabel">Pose Stack Number: </label> <input type="text"  class="text" name="poseStackNum" placeHolder="20(Default)"/> <br> <br>
						<input type="submit" class="valuesSubmit" id="loopClosureBtn" name="start_loop_closingRun" value="start_loop_closingRun" />
					</form>
				</div>

				<div class="cloudThinning">
					<hr>
					<h3>Cloud Thinning</h3>
					<hr>

					<div class="example">
						<h3>Pick A Point Cloud File</h3>
						<div id="pointCloudTree2" class="demo"></div>
					</div>

					<br><br><br><br><br><br><br><br><br><br>
					<form id="cloudThinningForm" action="/" method="post">
						<label class="varLabel">Pointcloud File Selected: </label> <label id="pointCloudFileOutput2"></label> <br>
						<label class="varLabel">Output File Name: </label> <label id="outputFileName"></label> <br>
						<label class="varLabel">Point Search Radius: </label> <input type="text"  class="text" name="pointSearchRad" placeHolder="0.1(Default)"/> <br> <br>
						<input type="submit" class="valuesSubmit" id="cloudThinningBtn" name="start_thinningRun" value="start_thinningRun" />
					</form>
				</div>

				<!-- <div class="restoreDefault">
					<hr>
					<h3>Restore Default Parameters</h3>
					<hr>

					Restore Default Paramaters <input type="image" src="images/play-button.ico" class="button" name="restore_default_paramatersRun" value="restore_default_paramatersRun" /> </p>

				</div> -->

<?php
			// echo "------------------Current Variables------------------";
			// echo "<br>";
			//
			// $last_pose_in = "NOT SET";
			// $pointcloud_in = "NOT SET";
			// $pointcloud_out = "NOT SET";
			// $trajectory_in = "NOT SET";
			// $trajectory_out = "NOT SET";
			// $matchDis = "4.0";
			// $matchReginHori = "15.0";
			// $matchReginVert = "10.0";
			// $poseStackNum = "20";
			// $pointSearchRad = "0.1";
			//
			//     if (isset($_POST['matchDis'])) {
			//       if (empty($_POST['matchDis'])) {
			//         echo "matchDis(Default): " . $matchDis;
			//       } else {
			//         echo "matchDis: " . htmlspecialchars($_POST['matchDis']);
			//       }
			//     }
			//
			//     echo "<br>";
			//
			//     if (isset($_POST['matchReginHori'])) {
			//       if (empty($_POST['matchReginHori'])) {
			//         echo "matchReginHori(Default): " . $matchReginHori;
			//       } else {
			//         echo "matchReginHori: " . htmlspecialchars($_POST['matchReginHori']);
			//       }
			//     }
			//
			//     echo "<br>";
			//
			//     if (isset($_POST['matchReginVert'])) {
			//       if (empty($_POST['matchReginVert'])) {
			//         echo "matchReginVert(Default): " . $matchReginVert;
			//       } else {
			//         echo "matchReginVert: " . htmlspecialchars($_POST['matchReginVert']);
			//       }
			//     }
			//
			//     echo "<br>";
			//
			//     if (isset($_POST['poseStackNum'])) {
			//       if (empty($_POST['poseStackNum'])) {
			//         echo "poseStackNum(Default): " . $poseStackNum;
			//       } else {
			//         echo "poseStackNum: " . htmlspecialchars($_POST['poseStackNum']);
			//       }
			//     }
			//
			//     echo "<br>";
			//
			//     if (isset($_POST['pointSearchRad'])) {
			//       if (empty($_POST['pointSearchRad'])) {
			//         echo "pointSearchRad(Default): " . $pointSearchRad;
			//       } else {
			//         echo "pointSearchRad: " . htmlspecialchars($_POST['pointSearchRad']);
			//       }
			//     }
			// 		echo"<br>";
			// 		echo "--------------------------------------------------------";
?>


		</div>
		</body>
</html>
