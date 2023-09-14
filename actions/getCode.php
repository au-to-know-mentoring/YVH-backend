
<?php

use Html\Form\InputField\Date;

 function getCode_ALL(Web $w) {

    $p = $w->pathMatch('attachment_id');
    if (empty($p['attachment_id'])) {
        $w->error('No model Id found ', '/virtualhome');
    }

    $attachment = FileService::getInstance($w)->getAttachment($p['attachment_id']);
    if (empty($attachment)) {
        $w->error('no model found for id', '/virtualhome');
    }
    // get logged in user
    // check attachment object id == loged in user id
    //
    $user = AuthService::getInstance($w)->user();

    if ($user->id != $attachment->parent_id) {
        $w->error("This model doesn't belong to you", '/virtualhome');
    }

    $downloadcode = VirtualhomeService::getInstance($w)->getCodeForAttachmentId($attachment->id);
    if (empty($downloadcode)) {
        $downloadcode = new VirtualhomeDownloadCode($w);
        $downloadcode->virtualhomemodel_id = $attachment->id;
    }


   
    
    

    $message = 'Here is your code ';
    echo($message);
    
    $code = random_int(100, 999);
    $randomNumOne = random_int(1, 9);
    $randomNum2 = random_int(10, 99);




    


    
    //GETDATE()
     $codePlusId = $downloadcode->virtualhomemodel_id;
     $dt_object =  new DateTime("UTC"); //dt_generated gettimeofday(true)
     $numlength = mb_strlen($codePlusId);
    
    if ($numlength == 1) {
        $codePlusId = $randomNum2 . $downloadcode->virtualhomemodel_id;
    }  
    else if ($numlength != 3) { // check if model id has 3 digits if not then add 0
        $codePlusId = $randomNumOne . $downloadcode->virtualhomemodel_id;
    }
       
     echo $code . $codePlusId;
    
    //$dt_object = $downloadcode->dt_generated->DateTime("Y-m-d H:i:s");
    // 'Y-m-d H:i:s'
    $downloadcode->code = $code . $codePlusId;
    $downloadcode->dt_generated = $dt_object->format("Y-m-d H:i:s");
    $downloadcode->insertOrUpdate();
    //echo "<br>";
  
    
    //$downloadcode->dt_generated = $dt_object->date("Y-m-d H:i:s");

    
   
   

    
        
    
    //echo "<script>
    //{$code};
    //</script>"; // working dbug
    
}


   

?>

