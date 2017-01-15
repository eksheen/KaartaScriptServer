  $(document).ready( function() {
    var pointcloudIn = "";
    var script = "";
    var last_pose_in = "";

    $('#pointCloudTree').fileTree({
//	need to set the proper root location for the files.
//	comment out the original
      root: '/home/eksheen/evan-sheen.com/Kaarta/recordings/',
//	stencil's data files are here:
//					root: '/home/realearth/recordings/',
      script: 'connectors/jqueryFileTree.php',
      multiFolder: true
    }, function(file) {
      fileArr = file.split("/");
      file1 = fileArr[fileArr.length-1];
      var element = document.getElementById("pointCloudFileOutput");
      element.innerHTML = file1;
      pointcloud_in = file1;
      script = "choose_map_for_localizationRun";

    });

    $('#localizationBtn').click(function(){
      var url = "http://www.evan-sheen.com/Kaarta/runScripts.php?"
      var params = {script : script, pointcloud_in : pointcloud_in},
      query = $.param(params);
      url = url + query;
      window.location.href = url;
    });


    $('#poseTree').fileTree({
      root: '/home/eksheen/evan-sheen.com/Kaarta/recordings/',
//					root: '/home/realearth/recordings/',
      script: 'connectors/jqueryFileTree.php',
      folderEvent: 'click',
      multiFolder: true
    }, function(file) {
      fileArr = file.split("/");
      file1 = fileArr[fileArr.length-1];
      var element = document.getElementById("poseFileOutput");
      element.innerHTML = file1;
      last_pose_in = file1;
      script = 'choose_last_poseRun';
    });

    $('#lastPoseBtn').click(function(){
      var url1 = "http://www.evan-sheen.com/Kaarta/runScripts.php?"
      var params1 = {script : script, last_pose_in : last_pose_in},
      query1 = $.param(params1);
      url1 = url1 + query1;
      window.location.href = url1;
    });


    $('#trajectoryTree').fileTree({
      root: '/home/eksheen/evan-sheen.com/Kaarta/recordings/',
//					root: '/home/realearth/recordings/',
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

    $('#pointCloudTree1').fileTree({
//	need to set the proper root location for the files.
//	comment out the original
      root: '/home/eksheen/evan-sheen.com/Kaarta/recordings/',
//	stencil's data files are here:
//					root: '/home/realearth/recordings/',
      script: 'connectors/jqueryFileTree.php',
      multiFolder: true
    }, function(file) {
      fileArr = file.split("/");
      file1 = fileArr[fileArr.length-1];
      var element = document.getElementById("pointCloudFileOutput1");
      file1 = file1.replace("pointcloud", "pointcloud_loop_closed");
      element.innerHTML = file1;
      pointcloud_in = file1;
      script = 'start_loop_closingRun';

    });

    $('#trajectoryTree1').fileTree({
      root: '/home/eksheen/evan-sheen.com/Kaarta/recordings/',
//					root: '/home/realearth/recordings/',
      script: 'connectors/jqueryFileTree.php',
      folderEvent: 'click',
      multiFolder: true
    }, function(file) {
      fileArr = file.split("/");
      file1 = fileArr[fileArr.length-1];
      var element = document.getElementById("trajectoryFileOutput1");
      file1 = file1.replace("trajectory", "trajectory_loop_closed");
      element.innerHTML = file1;
      trajectory_in = file1;
      script = 'start_loop_closingRun';
    });

    $('#loopClosureBtn').click(function(){
      var url2 = "http://www.evan-sheen.com/Kaarta/runScripts.php?"
      var params2 = {script : script, pointcloud_in : pointcloud_in, trajectory_in : trajectory_in},
      query2 = $.param(params2);
      query2 = "runScripts.php?" + query2;
      var frm = document.getElementById('loopClosureForm') || null;
      if(frm) {
        frm.action = query2;
      }
    });


    $('#pointCloudTree2').fileTree({
//	need to set the proper root location for the files.
//	comment out the original
      root: '/home/eksheen/evan-sheen.com/Kaarta/recordings/',
//	stencil's data files are here:
//					root: '/home/realearth/recordings/',
      script: 'connectors/jqueryFileTree.php',
      multiFolder: true
    }, function(file) {
      fileArr = file.split("/");
      file1 = fileArr[fileArr.length-1];
      var element = document.getElementById("pointCloudFileOutput2");
      element.innerHTML = file1;
      pointcloud_in = file1;
      script = "start_thinningRun";
      var element = document.getElementById("outputFileName");
      file1 = file1.replace("pointcloud", "pointcloud_thinned");
      element.innerHTML = file1;
      pointcloud_out = file1;
    });

    $('#cloudThinningBtn').click(function(){
      var url3 = "http://www.evan-sheen.com/Kaarta/runScripts.php?"
      var params3 = {script : script, pointcloud_in : pointcloud_in, pointcloud_out : pointcloud_out},
      query3 = $.param(params3);
      query3 = "runScripts.php?" + query3;
      var frm1 = document.getElementById('cloudThinningForm') || null;
      if(frm1) {
        frm1.action = query3;
      }
    });




  });
