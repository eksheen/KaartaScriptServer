<?php
$last_pose_in = "trajectory.ply";
$pointcloud_in = "pointcloud.ply";
$pointcloud_out = "pointcloud_temp_loop_close.ply";
$trajectory_in = "trajectory_temp.ply";
$trajectory_out = "trajectory_temp_loop_close.ply";
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

    // if (isset($_POST['matchReginHori'])){}
    // if (isset($_POST['matchReginVert'])){}
    // if (isset($_POST['poseStackNum'])){}
    // if (isset($_POST['pointSearchRad'])){}
// header("Location: kaartaScriptServer.php");
?>
