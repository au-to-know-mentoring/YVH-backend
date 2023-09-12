
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
    
    $code = random_int(100000, 999999);
    echo $code;




    


    
    //GETDATE()
    
     $dt_object =  new DateTime("UTC"); //dt_generated gettimeofday(true)
    
    
    //$dt_object = $downloadcode->dt_generated->DateTime("Y-m-d H:i:s");
    // 'Y-m-d H:i:s'
    $downloadcode->code = $code;
    $downloadcode->dt_generated = $dt_object->format("Y-m-d H:i:s");
    $downloadcode->insertOrUpdate();
    //echo "<br>";
  
    
    //$downloadcode->dt_generated = $dt_object->date("Y-m-d H:i:s");

    
   
   

    
        
    
    //echo "<script>
    //{$code};
    //</script>"; // working dbug
    
}


   

?>

