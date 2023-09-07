<?php
function getModel_ALL(Web $w)
{
    
    $p = $w->pathMatch('downloadcode');
    //date_default_timezone_set('Australia/Sydney');
    
    if (empty($p['downloadcode'])) {
        $w->error('No model Id found ', '/virtualhome');
    }
    
    // attempt to get virtualhomemodel_id from db
    $downloadcode = VirtualhomeService::getInstance($w)->getCodeObjectForCode($p['downloadcode']);
    if (empty($downloadcode)) {
        $w->error('no model found for id', '/virtualhome');
    }
   




   






    echo date('Y-m-d H:i:s', time()); //- $downloadcode->dt_generated;
    echo '<br><br>';
    echo date('Y-m-d H:i:s', $downloadcode->dt_generated);
    echo '<br>';
    echo formatDate($downloadcode->dt_modified);
    
    echo '<br>';
    echo $downloadcode->dt_generated;
    //echo $downloadcode->dt_generated->timetostr("now");
    //echo $downloadcode->dt_generated->strtotime(date("Y-m-d H:i:s"));
    echo '<br>';
    
    echo strtotime(date("Y-m-d H:i:s"));
    echo '<br>';
    //echo strtotime("Y-m-d H:i:s");
    echo '<br>';
    echo $downloadcode->dt_created;
    echo '<br>';
   // $date = date_create($downloadcode->dt_generated, timezone_open('Australia/Sydney'));
    //echo date_format($date, 'Y-m-d H:i:sP') . "\n";
    echo '<br>';


    

    

    // Create a new DateTime object in the UTC format
    
    

    // Convert the DateTime object to the timezone of Tallinn

   //$datetime->setTimezone($australiaTZ);

    // Display the result in the YYYY-MM-DD HH:MM:SS format

   
    

    die;

    //$TestDate = new DateTime($downloadcode->dt_generated); 
    //echo $TestDate->format('Y-m-d H:i:s');
    

    // check dt_generated 
    //echo out how long ago it was made
    // 6 hour duration

    // get the attachment using the id from the downloadcode object
  
    
    //echo $attachment->id; // test
    
    //
    

   
   
  
    




    




    
 

    //echo("hello");







}

function timetostr() {

}
?>
