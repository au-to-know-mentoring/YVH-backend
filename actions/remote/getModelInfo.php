<?php

use function PHPSTORM_META\type;

function getModelInfo_ALL(Web $w)
{
    $p = $w->pathMatch('downloadcode');
    $w->setLayout(null);
    //date_default_timezone_set('Australia/Sydney');
    
    $downloadcode = VirtualhomeService::getInstance($w)->getCodeObjectForCode($p['downloadcode']);
    $attachment = FileService::getInstance($w)->getAttachment($downloadcode->virtualhomemodel_id);
   
    $output = ["Name" => $attachment->title, "Client" => $attachment->description];
    $output = json_encode($output);
    $w->out($output); 

}



