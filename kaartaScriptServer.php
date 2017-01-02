<!doctype html>
<html lang="en">
	<head>
		<meta charset="UTF-8"</meta>
		<title>test server side script submits</title>
		<link rel="stylesheet" href="kaarta.css">
	</head>
	<body>
		<div class="content">
            <form method="post">
             <p> PointCloud File <input type="file"  class="file" name="pointCloudFile" />
              Output File Name <input type="text"  class="text" name="outputFileNamePC" /> </p>
             <p> Trajectory File <input type="file"  class="file" name="trajectoryFile" />
              Output File Name <input type="text"  class="text" name="outputFileNameTF" /> </p>
             <p> matchDis <input type="text"  class="text" name="matchDis" /> </p>
             <p> matchReginHori <input type="text"  class="text" name="matchReginHori" /> </p>
             <p> matchReginVert <input type="text"  class="text" name="matchReginVert" /> </p>
             <p> poseStackNum <input type="text"  class="text" name="poseStackNum" /> </p>
             <p> <input type="submit"  class="submit" /> </p>
            </form>
			<h1>Press a button to fire the server side php code</h1>
			<!-- We use form submissions to send the data to the server to be rtrieved with
			our php code. -->
			<form method="post">
			 <p>Script 1 <input type="image" src="../IMG/play-button.ico" class="button" name="FireScript1" value="FireScript1" /> </p>
			 <p>Script 2 <input type="image" src="../IMG/play-button.ico" class="button" name="FireScript2" value="FireScript2" /> </p>
			 <p>Script 3 <input type="image" src="../IMG/play-button.ico" class="button" name="FireScript3" value="FireScript3" /> </p>
			 <p>Script 4 <input type="image" src="../IMG/play-button.ico" class="button" name="FireScript4" value="FireScript4" /> </p>
			</form>

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
    	echo "all values set - ";
		} else {
			//Handle the case where one or more of the values is not set
			echo "some value is not set - ";
		}
}

//We use forms to submit data to the server
//We then check which value was sent with (isset($_POST['...']))
//We can run as many scripts as we need to by adding buttons above
//and checking ~ if(isset($_POST['...'])) ~ it is set then
//adding the function to correspond for the script.
//Should essentially be lots of copying and pasting.
if (!empty($_POST)){
    if(isset($_POST['FireScript1'])){
    	//if button for script 1 was called we call the function script1()
        script1();
    }elseif(isset($_POST['FireScript2'])){
    	//if button for script 2 was called we call the function script2()
        script2();
    }elseif(isset($_POST['FireScript3'])){
    	//if button for script 3 was called we call the function script3()
        script3();
    }elseif(isset($_POST['FireScript4'])){
    	//if button for script 4 was called we call the function script4()
        script4();
    }
}
    function script1()
    {
    	//Insert code here to run a script
    	echo "We can call script - 1 -";

        $output = shell_exec('ps -a');
        echo "<pre>$output</pre>";

        if( strpos( $output, 'hello.sh' ) == true ) {
            echo 'yes script 1 is running';
        }


    }
    function script2()
    {
        $running = true;
    	//Insert code here to run a script
    	echo "We can call script - 2 -";

        $output = shell_exec('ps -a');
        echo "<pre>$output</pre>";

        if( strpos( $output, 'hi.sh' ) == true ) {
            echo 'yes script 2 is running';
        }
    }
        function script3()
    {
        $running = true;
    	//Insert code here to run a script
    	echo "We can call script - 3 -";
    }
        function script4()
    {
        $running = true;
    	//Insert code here to run a script
    	echo "We can call script - 4 -";
    }

?>
		</div>
	</body>
</html>
