<?php
echo "=============================================";
echo "<br>";

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
