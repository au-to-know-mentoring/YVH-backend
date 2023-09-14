<?php

use function PHPSTORM_META\type;

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
    //var_dump($downloadcode->code);
    
    
    // $code = $downloadcode->code;
    // // echo $code;
    // // echo "<br>";
    //  $code = $downloadcode->virtualhomemodel_id;
    // // echo $code;
    // // echo "<br>";
    // // $var1 = (string) $code;
    //  $var2 = strval($code);
    //  $link = '/virtualhome-remote/download/';
    // // //echo ( '/virtualhome-remote/download/' +  $linkcode);   
    // // echo $var1;
    // // echo $var2;
    // // echo $link . $var2;
    //  $linkto = $link . $var2;
    // // //$w->ctx('redirect_url', '/virtualhome-remote/download/');
    // // echo "<br>";
    // // echo $linkto;
    // if ($code = $downloadcode->code) {
    //     $code = $downloadcode->virtualhomemodel_id;
    //     if ($code = $downloadcode->virtualhomemodel_id) {
    //         //echo "LOL";
    //         //$w->ctx('redirect_url', '/virtualhome-remote/download/' . $downloadcode->virtualhomemodel_id);
    //         $w->header($linkto, true);
    //         die;
    //         //echo $linkto;
    //     }
    // } //555361
    $downloadWinodw = config::get('virtualhome.download_window');
    $timenow = time();
    $timeSinceGenerated = $downloadcode->dt_generated;
    if ($downloadcode->code == $downloadcode->code) 
    {
        if ($timeSinceGenerated < $timenow){
            $timeSinceGenerated =  $timenow - $timeSinceGenerated;
            if ($timeSinceGenerated > $downloadWinodw ) {
                $w->error('Too Late ', '/virtualhome');
             } else {
                list($id) = $w->pathMatch();

                $attachment = FileService::getInstance($w)->getAttachment($downloadcode->virtualhomemodel_id); // 
                if (!empty($attachment) && $attachment->exists()) {
                
                
                    $attachment->writeOut();
                } else {
                $w->header("HTTP/1.1 404 Not Found");
                $w->notFoundPage();
                }
        }
        
    }
    }

}


?>
