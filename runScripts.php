<?php include 'header.php'; ?>
<?php
echo "=============================================";
echo "<br>";

$last_pose_in = "trajectory.ply";
$pointcloud_in = "pointcloud.ply";
$pointcloud_out = "pointcloud_temp_loop_close.ply";
$trajectory_in = "trajectory_temp.ply";
$trajectory_out = "trajectory_temp_loop_close.ply";
$matchDis = "4.0";
$matchReignHori = "15.0";
$matchReginVert = "10.0";
$poseStackNum = "20";
$pointSearchRad = "0.1";


//We use forms to submit data to the server
//We then check which value was sent with (isset($_POST['...']))
//We can run as many scripts as we need to by adding buttons above
//and checking ~ if(isset($_POST['...'])) ~ it is set then
//adding the function to correspond for the script.
//Should essentially be lots of copying and pasting.
if (!empty($_POST)){
    if(isset($_POST['choose_last_poseRun'])){
      choose_last_poseRun($last_pose_in);
    }elseif(isset($_POST['choose_map_for_localizationRun'])){
      choose_map_for_localizationRun($pointcloud_in);
    }elseif(isset($_POST['restore_default_paramatersRun'])){
      restore_default_paramatersRun();
    }elseif(isset($_POST['restore_last_poseRun'])){
      restore_last_poseRun();
    }elseif(isset($_POST['save_last_poseRun'])){
        save_last_poseRun();
    }elseif(isset($_POST['start_loop_closingRun'])){
      start_loop_closingRun($pointcloud_in, $pointcloud_out, $trajectory_in, $trajectory_out, $matchDis, $matchReignHori, $matchReignVert, $poseStackNum);
    }elseif(isset($_POST['start_thinningRun'])){
      start_thinningRun($pointcloud_in, $pointcloud_out, $pointSearchRad);
    }elseif(isset($_POST['switch_to_localization_from_lastRun'])){
        switch_to_localization_from_lastRun();
    }elseif(isset($_POST['switch_to_localization_with_camera_from_lastRun'])){
        switch_to_localization_with_camera_from_lastRun();
    }elseif(isset($_POST['switch_to_localization_with_cameraRun'])){
        switch_to_localization_with_cameraRun();
    }elseif(isset($_POST['switch_to_localizationRun'])){
        switch_to_localizationRun();
    }elseif(isset($_POST['switch_to_mapping_with_cameraRun'])){
        switch_to_mapping_with_cameraRun();
    }elseif(isset($_POST['switch_to_mappingRun'])){
        switch_to_mappingRun();
    }
}


function choose_last_poseRun($last_pose_in) {
  echo nl2br("Choose Last Pose: ".PHP_EOL.PHP_EOL);

##	#!/bin/bash
##	echo ""
##	echo "Choose Last Pose."
##	echo ""
##	rosrun clay_launch choose_last_pose.sh

#	shell_exec('rosrun clay_launch choose_last_pose.sh');
#    echo nl2br("rosrun clay_launch choose_last_pose.sh" . PHP_EOL);
  choose_last_poseSh($last_pose_in);

##	echo ""
##	echo "The window will close automatically in 2 seconds."
##	sleep 2

##	exit 0
  echo nl2br(PHP_EOL);
  return (0);
}

function choose_last_poseSh($last_pose_in) {
  echo nl2br("choose_last_pose.sh".PHP_EOL);

##	#!/bin/bash

##	read -p "last_pose_in: " last_pose_in
##	last_pose_in="${last_pose_in//[\'\ ]/}"
##	cp ~/.data/last_pose.txt ~/.data/last_pose.txt.bak
##	cp $last_pose_in ~/.data/last_pose.txt

  shell_exec ('cp ~/.data/last_pose.txt ~/.data/last_pose.txt.bak');
  echo nl2br("cp ~/.data/last_pose.txt ~/.data/last_pose.txt.bak".PHP_EOL);

  shell_exec ('cp '.$last_pose_in.' ~/.data/last_pose.txt');
  echo nl2br("cp ".$last_pose_in." ~/.data/last_pose.txt".PHP_EOL);

  echo nl2br(PHP_EOL);
  return(0);
}


function choose_map_for_localizationRun($pointcloud_in) {
  echo nl2br("Choose Map for Localization" . PHP_EOL.PHP_EOL);

##	#!/bin/bash
##	echo ""
##	echo "Choose map for localization."
##	echo ""

##	rosrun clay_launch choose_map_for_localization.sh

#	shell_exec('rosrun clay_launch choose_map_for_localization.sh');

#  echo nl2br("rosrun clay_launch choose_map_for_localization.sh" . PHP_EOL);
  choose_map_for_localizationSH($pointcloud_in);

##	echo ""
##	echo "The window will close automatically in 2 seconds."
##	sleep 2

##	exit 0

  echo nl2br(PHP_EOL);
  return(0);
}

function choose_map_for_localizationSh($pointcloud_in) {
  echo nl2br("Choose Map For Localization cmd shell execution" . PHP_EOL. PHP_EOL);

##	#!/bin/bash

##	read -p "pointcloud_in: " pointcloud_in
##	pointcloud_in="${pointcloud_in//[\'\ ]/}"

##	echo ""
##	echo "Converting map file."
##	echo ""

##	rosrun point_cloud_receiver ply_to_bin.py $pointcloud_in

  shell_exec('rosrun point_cloud_receiver ply_to_bin.py '.$pointcloud_in);
  echo nl2br("rosrun point_cloud_receiver ply_to_bin.py ".$pointcloud_in.PHP_EOL);

##	echo ""
##	echo "Preparing map for localization."
##	echo ""

##	rosrun clay_launch prepare_map_for_localization.sh

#	shell_exec('rosrun clay_launch prepare_map_for_localization.sh');
#   echo nl2br("rosrun clay_launch prepare_map_for_localization.sh" . PHP_EOL);
  
    prepare_map_for_localizationSh();

  echo nl2br(PHP_EOL);
  return(0);
}

function prepare_map_for_localizationRun() {
  echo nl2br("Prepare Map for Localization:" . PHP_EOL.PHP_EOL);

##	#!/bin/bash
##	echo ""
##	echo "Preparing map for localization."
##	echo ""

##	rosrun clay_launch prepare_map_for_localization.sh

#	shell_exec ('rosrun clay_launch prepare_map_for_localization.sh');
#   echo nl2br("rosrun clay_launch prepare_map_for_localization.sh" . PHP_EOL);
    
  prepare_map_for_localizationSh();

##	echo ""
##	echo "The window will close automatically in 2 seconds."
##	sleep 2

##	exit 0

  echo nl2br(PHP_EOL);
  return (0);
}

function prepare_map_for_localizationSh() {
  echo nl2br("Prepare Map for Localization cmd shell" . PHP_EOL);

##	#!/bin/bash

##	rosrun realearth_notification notify_user.bash -p

##	rm ~/.data/map_files/index.txt ~/.data/map_files/*.pcd
##	roslaunch clay_launch prepare_map_for_localization.launch

  shell_exec('rm ~/.data/map_files/index.txt ~/.data/map_files/*.pcd');
  echo nl2br("rm ~/.data/map_files/index.txt ~/.data/map_files/*.pcd" . PHP_EOL);

  shell_exec('roslaunch clay_launch prepare_map_for_localization.launch');
  echo nl2br("roslaunch clay_launch prepare_map_for_localization.launch" . PHP_EOL);

##	rosrun realearth_notification notify_user.bash -r

  echo nl2br(PHP_EOL);
  return(0);
}



function restore_default_paramatersRun(){
  echo nl2br("Restore Default Paramaters:" . PHP_EOL . PHP_EOL);

##	#!/bin/bash
##	echo ""
##	echo "Restore default parameters."
##	echo ""

##	rosrun clay_launch restore_default_paramaters.sh

#	shell_exec('rosrun clay_launch restore_default_paramaters.sh');
#   echo nl2br("rosrun clay_launch restore_default_paramaters.sh" . PHP_EOL);
    
  restore_default_paramatersSH();

##	echo "The window will close automatically in 2 seconds."
##	sleep 2

##	exit 0

  echo nl2br(PHP_EOL);
  return(0);
}

function restore_default_paramatersSh() {
  echo nl2br("Restore Default Paramaters cmd shell:" . PHP_EOL.PHP_EOL);

##	#!/bin/bash

##	[ -z "$STENCIL_DEFAULT" ] && STENCIL_DEFAULT="abc"
##	if env | grep -q ^STENCIL_DEFAULT=
##	then
##	  export STENCIL=$STENCIL_DEFAULT
##	  echo "Will use default location for stencil code: $STENCIL"
##	else
##	  export STENCIL=$HOME/realearth/stencil
##	fi

  $STENCIL = "/home/realearth/stencil";

##	cp $STENCIL/install/share/clay_launch/params/default.yaml.bak $STENCIL/install/share/clay_launch/params/default.yaml
  shell_exec('cp '.$STENCIL.'/install/share/clay_launch/params/default.yaml.bak '.$STENCIL.'/install/share/clay_launch/params/default.yaml');

##	rm $STENCIL/configuration.yaml
  shell_exec('rm '.$STENCIL.'/config.yaml');

##	ln -s $STENCIL/install/share/clay_launch/params/default.yaml $STENCIL/configuration.yaml
  shell_exec('ln -s '.$STENCIL.'/install/share/clay_launch/params/default.yaml '.$STENCIL.'/congiguration.yaml');

  echo nl2br("This function needs to be tested carefully." . PHP_EOL);

  echo nl2br(PHP_EOL);
  return(0);
}

function restore_last_poseRun(){
  echo nl2br("Restore Last Pose:" . PHP_EOL.PHP_EOL);
##	#!/bin/bash
##	echo ""
##	echo "Restoring Last Pose."
##	echo ""

##	rosrun clay_launch restore_last_pose.sh

#	shell_exec('rosrun clay_launch restore_last_pose.sh');
#   echo nl2br("rosrun clay_launch restore_last_pose.sh" . PHP_EOL);
    
  restore_last_poseSH();

##	echo "The window will close automatically in 2 seconds."
##	sleep 2

##	exit 0

  echo nl2br(PHP_EOL);
  return(0);
}

function restore_last_poseSh() {
  echo nl2br("Restore Last Pose cmd shell:" . PHP_EOL.PHP_EOL);

##	#!/bin/bash

##	cp ~/.data/last_pose.txt.bak ~/.data/last_pose.txt

  shell_exec('cp ~/.data/last_pose.txt.bak ~/.data/last_pose.txt');
  echo nl2br("cp ~/.data/last_pose.txt.bak ~/.data/last_pose.txt" . PHP_EOL);
  return(0);
}

function save_last_poseRun(){
  echo nl2br("Save Last Pose:" . PHP_EOL.PHP_EOL);
##	#!/bin/bash
##	echo ""
##	echo "Saving Last Pose."
##	echo ""

##	rosrun clay_launch save_last_pose.sh

##	shell_exec('rosrun clay_launch save_last_pose.sh');

#   echo nl2br("rosrun clay_launch save_last_pose.sh" . PHP_EOL);
    
  save_last_poseSh();

##	echo "The window will close automatically in 2 seconds."
##	sleep 2

##	exit 0

  echo nl2br(PHP_EOL);
  return(0);
}

function save_last_poseSh() {
  echo nl2br("Save Last Pose cmd shell:" . PHP_EOL.PHP_EOL);

##	#!/bin/bash

##	time_string=$(rosrun point_cloud_receiver printLastTime.py)

  $time_string = shell_exec('rosrun point_cloud_receiver printLastTime.py');
  echo nl2br("time_string=$(rosrun point_cloud_receiver printLastTime.py)" . PHP_EOL);

##	cp ~/.data/last_pose.txt $MAPS/last_pose_$time_string.txt

  shell_exec('cp ~/.data/last_pose.txt $MAPS/last_pose_'.$time_string.'.txt');
  echo nl2br("cp ~/.data/last_pose.txt $MAPS/last_pose_".$time_string.".txt" . PHP_EOL);

  echo nl2br("This function needs testing." . PHP_EOL);

  echo nl2br(PHP_EOL);
  return(0);
}

function start_loop_closingRun($pointcloud_in, $pointcloud_out, $trajectory_in, $trajectory_out, $matchDis, $matchReignHori, $matchReignVert, $poseStackNum){
  echo nl2br("start_loop_closing.run" . PHP_EOL);
##	#!/bin/bash
##	echo ""
##	echo "Launching loop closing (beta version)"
##	echo ""

##	rosrun clay_launch start_loop_closing.sh

#	shell_exec('rosrun clay_launch start_loop_closing.sh')'
  echo nl2br("rosrun clay_launch start_loop_closing.sh" . PHP_EOL);
  start_loop_closingSh($pointcloud_in, $pointcloud_out, $trajectory_in, $trajectory_out, $matchDis, $matchReignHori, $matchReignVert, $poseStackNum);

##	echo ""
##	echo "The window will close automatically in 2 seconds."
##	sleep 2

##	exit 0

  echo nl2br(PHP_EOL);
  return(0);
}

function start_loop_closingSh($pointcloud_in, $pointcloud_out, $trajectory_in, $trajectory_out, $matchDis, $matchReignHori, $matchReignVert, $poseStackNum) {
  echo nl2br("start_loop_closing.sh" . PHP_EOL);

##	#!/bin/bash

##	echo "The processing utilizes Incremental Smoothing and Mapping (iSAM) library by Michael Kaess, Hordur Johannsson, David Rosen, John Leonard, 2012"
##	echo ""

##

  shell_exec('cp $(rospack find pose_graph)/pose_graph.rviz.bak $(rospack find pose_graph)/pose_graph.rviz');
  echo nl2br("cp $(rospack find pose_graph)/pose_graph.rviz.bak $(rospack find pose_graph)/pose_graph.rviz" . PHP_EOL);

##	read -p "pointcloud_in: " pointcloud_in
##	pointcloud_in="${pointcloud_in//[\'\ ]/}"
##	pointcloud_out="${pointcloud_in//"pointcloud"/"pointcloud_loop_closed"}"

##	echo ""
##	read -p "trajectory_in: " trajectory_in
##	trajectory_in="${trajectory_in//[\'\ ]/}"
##	trajectory_out="${trajectory_in//"trajectory"/"trajectory_loop_closed"}"

##	echo ""
##	read -p "matchDis (4.0): " matchDis
##	if [ -z "$matchDis" ]; then
##	  matchDis="4.0"
##	fi

##	read -p "matchReignHori (15.0): " matchReignHori
##	if [ -z "$matchReignHori" ]; then
##	  matchReignHori="15.0"
##	fi

##	read -p "matchReignVert (10.0): " matchReignVert
##	if [ -z "$matchReignVert" ]; then
##	  matchReignVert="10.0"
##	fi

##	read -p "poseStackNum (20): " poseStackNum
##	if [ -z "$poseStackNum" ]; then
##	  poseStackNum="20"
##	fi
##	echo ""

##	roslaunch pose_graph pose_graph.launch pointcloud_in:=$pointcloud_in trajectory_in:=$trajectory_in pointcloud_out:=$pointcloud_out trajectory_out:=$trajectory_out matchDis:=$matchDis matchReignHori:=$matchReignHori matchReignVert:=$matchReignVert poseStackNum:=$poseStackNum

  shell_exec('roslaunch pose_graph pose_graph.launch pointcloud_in:='.$pointcloud_in.' trajectory_in:='.$trajectory_in.' pointcloud_out:='.$pointcloud_out.' trajectory_out:='.$trajectory_out.' matchDis:='.$matchDis.' matchReignHori:='.$matchReignHori.' matchReignVert:='.$matchReignVert.' poseStackNum:='.$poseStackNum);
  echo nl2br("roslaunch pose_graph pose_graph.launch pointcloud_in:=" . $pointcloud_in ." trajectory_in:=".$trajectory_in." pointcloud_out:=".$pointcloud_out." trajectory_out:=".$trajectory_out." matchDis:=".$matchDis." matchReignHori:=".$matchReignHori." matchReignVert:=".$matchReignVert." poseStackNum:=".$poseStackNum . PHP_EOL);

  echo nl2br("this function may not be working properly and needs to be tested." . PHP_EOL);

}

function start_thinningRun($pointcloud_in, $pointcloud_out, $pointSearchRad){
  echo nl2br("start_thinning.run" . PHP_EOL);
##	#!/bin/bash
##	echo ""
##	echo "Launching thinning (beta version)"
##	echo ""

##	rosrun clay_launch start_thinning.sh

#	shell_exec('rosrun clay_launch start_thinning.sh');
#   echo nl2br("rosrun clay_launch start_thinning.sh" . PHP_EOL);
  start_thinningSh($pointcloud_in, $pointcloud_out, $pointSearchRad);

##	echo ""
##	echo "The window will close automatically in 2 seconds."
##	sleep 2

##	exit 0

  echo nl2br(PHP_EOL);
  return (0);
}

function start_thinningSh($pointcloud_in, $pointcloud_out, $pointSearchRad) {
  echo nl2br("start_thinning.sh" . PHP_EOL);
##	#!/bin/bash

##	read -p "pointcloud_in: " pointcloud_in
##	pointcloud_in="${pointcloud_in//[\'\ ]/}"
##	pointcloud_out="${pointcloud_in//"pointcloud"/"pointcloud_thinned"}"

##	echo ""
##	read -p "pointSearchRad (0.1): " pointSearchRad
##	if [ -z "$pointSearchRad" ]; then
##	  pointSearchRad="0.1"
##	fi
##	echo ""

##	roslaunch plane_line_refiner plane_line_refiner.launch pointcloud_in:=$pointcloud_in pointcloud_out:=$pointcloud_out pointSearchRad:=$pointSearchRad

  shell_exec('roslaunch plane_line_refiner plane_line_refiner.launch pointcloud_in:='.$pointcloud_in.' pointcloud_out:='.$pointcloud_out.' pointSearchRad:='.$pointSearchRad);
  echo nl2br("roslaunch plane_line_refiner plane_line_refiner.launch pointcloud_in:=".$pointcloud_in." pointcloud_out:=".$pointcloud_out." pointSearchRad:=".$pointSearchRad . PHP_EOL);

  echo nl2br(PHP_EOL);
  return(0);
}

function switch_to_localization_from_lastRun(){
  echo nl2br("switch_to_localization_from_last.run" . PHP_EOL);
##	#!/bin/bash
##	echo ""
##	echo "Switching to localization from last."
##	echo ""

##	[ -z "$STENCIL_DEFAULT" ] && STENCIL_DEFAULT="abc"
##	if env | grep -q ^STENCIL_DEFAULT=
##	then
##	  export STENCIL=$STENCIL_DEFAULT
##	 echo "Will use default location for stencil code: $STENCIL"
##	else
##	  export STENCIL=$HOME/realearth/stencil
##	fi

##	cp $STENCIL/install/lib/clay_launch/scripts/start_localization_from_last.sh $STENCIL/install/lib/clay_launch/scripts/start.sh
##	cp $STENCIL/install/lib/clay_launch/scripts/stop_localization.sh $STENCIL/install/lib/clay_launch/scripts/stop.sh

    $STENCIL = "/home/realearth/stencil"
  shell_exec('cp '.$STENCIL.'/install/lib/clay_launch/scripts/start_localization_from_last.sh '.$STENCIL.'/install/lib/clay_launch/scripts/start.sh');
  echo nl2br("cp ".$STENCIL."/install/lib/clay_launch/scripts/start_localization_from_last.sh ".$STENCIL."/install/lib/clay_launch/scripts/start.sh" . PHP_EOL);

  shell_exec('cp '.$STENCIL.'/install/lib/clay_launch/scripts/stop_localization.sh '.$STENCIL.'/install/lib/clay_launch/scripts/stop.sh');
  echo nl2br("cp $STENCIL/install/lib/clay_launch/scripts/stop_localization.sh $STENCIL/install/lib/clay_launch/scripts/stop.sh" . PHP_EOL);

##	echo "The update was completed. The window will close automatically in 2 seconds."
##	sleep 2

##	exit 0

  echo nl2br(PHP_EOL);
  return(0);
}

function switch_to_localization_with_camera_from_lastRun(){
  echo nl2br("switch_to_localization_with_camera_from_last.run" . PHP_EOL);

##	#!/bin/bash
##	echo ""
##	echo "Switching to localization with camera from last."
##	echo ""

##	[ -z "$STENCIL_DEFAULT" ] && STENCIL_DEFAULT="abc"
##	if env | grep -q ^STENCIL_DEFAULT=
##	then
##	  export STENCIL=$STENCIL_DEFAULT
##	  echo "Will use default location for stencil code: $STENCIL"
##	else
##	  export STENCIL=$HOME/realearth/stencil
##	fi

##	cp $STENCIL/install/lib/clay_launch/scripts/start_localization_with_camera_from_last.sh $STENCIL/install/lib/clay_launch/scripts/start.sh
##	cp $STENCIL/install/lib/clay_launch/scripts/stop_localization_with_camera.sh $STENCIL/install/lib/clay_launch/scripts/stop.sh

  shell_exec('cp '.$STENCIL.'/install/lib/clay_launch/scripts/start_localization_with_camera_from_last.sh '.$STENCIL.'/install/lib/clay_launch/scripts/start.sh');
  echo nl2br("cp $STENCIL/install/lib/clay_launch/scripts/start_localization_eith_camera_from_last.sh $STENCIL/install/lib/clay_launch/scripts/start.sh" . PHP_EOL);

  shell_exec('cp '.$STENCIL.'/install/lib/clay_launch/scripts/stop_localization_with_camera.sh '.$STENCIL.'/install/lib/clay_launch/scripts/stop.sh');
  echo nl2br("cp $STENCIL/install/lib/clay_launch/scripts/stop_localization_with_camera.sh $STENCIL/install/lib/clay_launch/scripts/stop.sh" . PHP_EOL);

##	echo "The update was completed. The window will close automatically in 2 seconds."
##	sleep 2

##	exit 0

  echo nl2br(PHP_EOL);
  return(0);
}

function switch_to_localization_with_cameraRun(){
  echo nl2br("switch_to_localization_with_camera.run" . PHP_EOL);
##	#!/bin/bash
##	echo ""
##	echo "Switching to localization with camera."
##	echo ""

##	[ -z "$STENCIL_DEFAULT" ] && STENCIL_DEFAULT="abc"
##	if env | grep -q ^STENCIL_DEFAULT=
##	then
##	  export STENCIL=$STENCIL_DEFAULT
##	  echo "Will use default location for stencil code: $STENCIL"
##	else
##	  export STENCIL=$HOME/realearth/stencil
##	fi

##	cp $STENCIL/install/lib/clay_launch/scripts/start_localization_with_camera.sh $STENCIL/install/lib/clay_launch/scripts/start.sh
##	cp $STENCIL/install/lib/clay_launch/scripts/stop_localization_with_camera.sh $STENCIL/install/lib/clay_launch/scripts/stop.sh

  shell_exec('cp '.$STENCIL.'/install/lib/clay_launch/scripts/start_localization_with_camera.sh '.$STENCIL.'/install/lib/clay_launch/scripts/start.sh');
  echo nl2br("cp $STENCIL/install/lib/clay_launch/scripts/start_localization_with_camera.sh $STENCIL/install/lib/clay_launch/scripts/start.sh" . PHP_EOL);

  shell_exec('cp '.$STENCIL.'/install/lib/clay_launch/scripts/stop_localization_with_camera.sh '.$STENCIL.'/install/lib/clay_launch/scripts/stop.sh');
  echo nl2br("cp $STENCIL/install/lib/clay_launch/scripts/stop_localization_with_camera.sh $STENCIL/install/lib/clay_launch/scripts/stop.sh" . PHP_EOL);

##	echo "The update was completed. The window will close automatically in 2 seconds."
##	sleep 2

##	exit 0

  echo nl2br(PHP_EOL);
  return(0);
}

function switch_to_localizationRun(){
  echo nl2br("switch_to_localization.run" . PHP_EOL);

##	#!/bin/bash
##	echo ""
##	echo "Switching to localization."
##	echo ""

##	[ -z "$STENCIL_DEFAULT" ] && STENCIL_DEFAULT="abc"
##	if env | grep -q ^STENCIL_DEFAULT=
##	then
##	  export STENCIL=$STENCIL_DEFAULT
##	  echo "Will use default location for stencil code: $STENCIL"
##	else
##	  export STENCIL=$HOME/realearth/stencil
##	fi

##	cp $STENCIL/install/lib/clay_launch/scripts/start_localization.sh $STENCIL/install/lib/clay_launch/scripts/start.sh
##	cp $STENCIL/install/lib/clay_launch/scripts/stop_localization.sh $STENCIL/install/lib/clay_launch/scripts/stop.sh

  shell_exec('cp '.$STENCIL.'/install/lib/clay_launch/scripts/start_localization.sh '.$STENCIL.'/install/lib/clay_launch/scripts/start.sh');
  echo nl2br("cp $STENCIL/install/lib/clay_launch/scripts/start_localization.sh $STENCIL/install/lib/clay_launch/scripts/start.sh" . PHP_EOL);

  shell_exec('cp '.$STENCIL.'/install/lib/clay_launch/scripts/stop_localization.sh '.$STENCIL.'/install/lib/clay_launch/scripts/stop.sh');
  echo nl2br("cp $STENCIL/install/lib/clay_launch/scripts/stop_localization.sh $STENCIL/install/lib/clay_launch/scripts/stop.sh" . PHP_EOL);

##	echo "The update was completed. The window will close automatically in 2 seconds."
##	sleep 2

##	exit 0

  echo nl2br(PHP_EOL);
  return(0);
}

function switch_to_mapping_with_cameraRun(){
  echo nl2br("switch_to_mapping_with_camera.run" . PHP_EOL);
##	#!/bin/bash
##	echo ""
##	echo "Switching to mapping with camera."
##	echo ""

##	[ -z "$STENCIL_DEFAULT" ] && STENCIL_DEFAULT="abc"
##	if env | grep -q ^STENCIL_DEFAULT=
##	then
##	  export STENCIL=$STENCIL_DEFAULT
##	  echo "Will use default location for stencil code: $STENCIL"
##	else
##	  export STENCIL=$HOME/realearth/stencil
##	fi

##	cp $STENCIL/install/lib/clay_launch/scripts/start_mapping_with_camera.sh $STENCIL/install/lib/clay_launch/scripts/start.sh
##	cp $STENCIL/install/lib/clay_launch/scripts/stop_mapping_with_camera.sh $STENCIL/install/lib/clay_launch/scripts/stop.sh

  shell_exec('cp '.$STENCIL.'/install/lib/clay_launch/scripts/start_mapping_with_camera.sh '.$STENCIL.'/install/lib/clay_launch/scripts/start.sh');
  echo nl2br("cp $STENCIL/install/lib/clay_launch/scripts/start_mapping_with_camera.sh $STENCIL/install/lib/clay_launch/scripts/start.sh" . PHP_EOL);

  shell_exec('cp '.$STENCIL.'/install/lib/clay_launch/scripts/stop_mapping_with_camera.sh '.$STENCIL.'/install/lib/clay_launch/scripts/stop.sh');
  echo nl2br("cp $STENCIL/install/lib/clay_launch/scripts/stop_mapping_with_camera.sh $STENCIL/install/lib/clay_launch/scripts/stop.sh" . PHP_EOL);

##	echo "The update was completed. The window will close automatically in 2 seconds."
##	sleep 2

##	exit 0

  echo nl2br(PHP_EOL);
  return(0);
}

function switch_to_mappingRun(){
  echo nl2br("switch_to_mapping.run" . PHP_EOL);

##	#!/bin/bash
##	echo ""
##	echo "Switching to mapping."
##	echo ""

##	[ -z "$STENCIL_DEFAULT" ] && STENCIL_DEFAULT="abc"
##	if env | grep -q ^STENCIL_DEFAULT=
##	then
##	  export STENCIL=$STENCIL_DEFAULT
##	  echo "Will use default location for stencil code: $STENCIL"
##	else
##	  export STENCIL=$HOME/realearth/stencil
##	fi

##	cp $STENCIL/install/lib/clay_launch/scripts/start_mapping.sh $STENCIL/install/lib/clay_launch/scripts/start.sh
##	cp $STENCIL/install/lib/clay_launch/scripts/stop_mapping.sh $STENCIL/install/lib/clay_launch/scripts/stop.sh

  shell_exec('cp '.$STENCIL.'/install/lib/clay_launch/scripts/start_mapping.sh '.$STENCIL.'/install/lib/clay_launch/scripts/start.sh');
  echo nl2br("cp $STENCIL/install/lib/clay_launch/scripts/start_mapping.sh $STENCIL/install/lib/clay_launch/scripts/start.sh" . PHP_EOL);

  shell_exec('cp '.$STENCIL.'/install/lib/clay_launch/scripts/stop_mapping.sh '.$STENCIL.'/install/lib/clay_launch/scripts/stop.sh');
  echo nl2br("cp $STENCIL/install/lib/clay_launch/scripts/stop_mapping.sh $STENCIL/install/lib/clay_launch/scripts/stop.sh" . PHP_EOL);


##	echo "The update was completed. The window will close automatically in 2 seconds."
##	sleep 2

##	exit 0

  echo nl2br(PHP_EOL);
  return(0);
}

echo "=============================================";

?>
<?php include 'footer.php'; ?>
