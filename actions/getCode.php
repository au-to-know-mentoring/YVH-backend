
<?php

 function getCode_ALL(Web $w) {
    
    
    function printCode() {

        $user_id = rand(10,99);        // makes random number from variable
        $attachment_id = rand(10,99);
        $dt_created = rand(10,99);


         $message = 'Here is your code ';
         echo($message);

 
        echo(rand($user_id , $user_id));   // takes the random number and echo's it
        echo(rand($attachment_id, $attachment_id));
        echo(rand($dt_created, $dt_created));
    }  
    printCode(); 
    
}
  



?>

