<?php
//Check to see if the process is still running.

//if it isnt anymore redirect back to the beggining

?>

<!doctype html>
<html lang="en">
	<head>
		<meta charset="utf-8">
	  <meta http-equiv="X-UA-Compatible" content="IE=edge">
	  <meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Start/Stop Stencil</title>
		<link href="kaarta.css" rel="stylesheet" type="text/css" media="screen" />
	</head>
  <body class="stencilBody">
    <div class="stencilContent">
      <h1>Stencil</h1>
      <hr>
        <input id="stencilBtnRunning" type="submit" name="startBtn" value="RUNNING">
      <hr>
      <form class="stencilStop" action="stop.php" method="post">
        <input id="stencilBtnStop" type="submit" name="stopBtn" value="STOP">
      </form>
      <hr>
    </div>
  </body>
