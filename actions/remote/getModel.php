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

    $downloadWindow = config::get('virtualhome.download_window');
    $timenow = time();
    $timeSinceGenerated = $downloadcode->dt_generated;
    if ($downloadcode->code == $downloadcode->code) 
    {
        if ($timeSinceGenerated < $timenow)
        {
            $timeSinceGenerated =  $timenow - $timeSinceGenerated;
            if ($timeSinceGenerated > $downloadWindow ) 
            {
                $w->error('Too Late ', '/virtualhome');
            } else 
            {
                list($id) = $w->pathMatch();

                $attachment = FileService::getInstance($w)->getAttachment($downloadcode->virtualhomemodel_id); // 
                if (!empty($attachment) && $attachment->exists()) 
                {
                    $attachment->writeOut();
                } else {
                    $w->header("HTTP/1.1 404 Not Found");
                    $w->notFoundPage();
                }
            }
        
        }
    }



} ?>
