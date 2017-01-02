<?php include 'header.php'; ?>
<?php
echo "=============================================";
echo "<br>";

//Script values. If all values are set do something else alert the user that not all values are set
if (!empty($_POST)){
    if(isset($_POST['pointCloudFile']) && isset($_POST['outputFileNamePC'])
    && isset($_POST['trajectoryFile']) && isset($_POST['outputFileNameTF'])
    && isset($_POST['matchDis']) && isset($_POST['matchReginHori'])
    && isset($_POST['matchReginVert']) && isset($_POST['poseStackNum'])){
      //Do something here is all values are set
      echo "all values set:<br />\n";
      foreach ($_POST as $param_name => $param_val) {
        echo "$param_name: $param_val<br />\n";
      }
    } else {
      //Handle the case where one or more of the values is not set
      echo "some value is not set - ";
    }
}
?>
<?php include 'footer.php'; ?>
