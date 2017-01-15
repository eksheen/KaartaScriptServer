
<?php
session_start();
if (isset($_POST["pointcloudIn"])) {
    echo $_POST["pointcloudIn"];
    $_SESSION['pci'] = $_POST['pointcloudIn'];
}
 ?>
