
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
    
    $user = AuthService::getInstance($w)->user();

    if ($user->id != $attachment->parent_id) {
        $w->error("This model doesn't belong to you", '/virtualhome');
    }

    $downloadcode = VirtualhomeService::getInstance($w)->getCodeForAttachmentId($attachment->id);
    if (empty($downloadcode)) {
        $downloadcode = new VirtualhomeDownloadCode($w);
        $downloadcode->virtualhomemodel_id = $attachment->id;
    }
    function FixLength(int $fixInt){
        if ($fixInt == 1){
            $fixInt = random_int(1, 9);
            
        }elseif ($fixInt == 2){
            $fixInt = random_int(10, 99);
           
        }elseif ($fixInt == 3){
          $fixInt = random_int(100, 999);
           
        }elseif ($fixInt == 4){
            $fixInt = random_int(1000, 9999);
            
        }elseif ($fixInt == 5){
            $fixInt = random_int(10000, 99999);
        }
        return $fixInt;
    }

    $codePlusId = $downloadcode->virtualhomemodel_id;
    $numlength = mb_strlen($codePlusId);
    if ($numlength != 6) {  // makes sure that we get a 6-digit code whilst also keeping the virtualhomemodel_id

       $DigitOffset = 6 - mb_strlen($codePlusId);

       $codePlusId = (string)$codePlusId . (string)FixLength($DigitOffset); 
    }
   
    
    $message = 'Here is your code ';
    echo $message . $codePlusId;
    
     
    $downloadcode->code = $codePlusId;

    $dt_object =  new DateTime("UTC"); 
    $downloadcode->dt_generated = $dt_object->format("Y-m-d H:i:s");

    $downloadcode->insertOrUpdate();
}
?>

