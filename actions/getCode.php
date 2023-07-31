
<?php
  
 function getCode_ALL(Web $w) {
    function printCode() {

        $user_id = rand(10,99);        // makes random number from variable
        $attachment_id = rand(10,99);
        $dt_created = rand(10,99);
    
    
         $message = 'Here is your code ';
         echo($message);
    
    
        $string1 = (rand($user_id , $user_id));   // takes the random number and echo's it
        echo $string1;
        $string2 = (rand($attachment_id, $attachment_id));
        echo $string2;
        $string3 = (rand($dt_created, $dt_created));
        echo $string3;
    
        return $string1.$string2.$string3;
        
    }
    printCode();
    //echo "<script>
    //{$code};
    //</script>"; // working dbug
    
}


    function getCode_POST(web $w) {

        echo $GLOBALS['a'];



   
	
        $task = (!empty($p["id"]) ? VirtualhomeDownloadCode::getInstance($w)->getCode($p["id"]) : new VirtualhomeDownloadCode($w));
    
        $p = $w->pathMatch("id");
        $task = new Task($w);  
    
        //$task->fill($_POST); ///broken
  
        $task->insertOrUpdate(true); // broken

    
      
    

 
    }

?>

