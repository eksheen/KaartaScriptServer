<?php
//Redirect after 10 seconds
header('Refresh: 10; URL=http://www.evan-sheen.com/Kaarta/running.php');


//Code to start the script goes here.


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
      <form class="stencilStart" method="post">
				<div class="loader"></div>
      </form>
      <hr>
      <form class="stencilStop" action="stop.php" method="post">
        <input id="stencilBtnStop" type="submit" name="stopBtn" value="STOP">
      </form>
      <hr>
    </div>
  </body>
