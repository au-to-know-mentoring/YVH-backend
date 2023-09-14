<?php
function download_GET(Web &$w)
{
    list($id) = $w->pathMatch();

    $attachment = FileService::getInstance($w)->getAttachment($id); // 
    if (!empty($attachment) && $attachment->exists()) {
        //check if no user logged in, is attachment public
       
        $attachment->writeOut();
    } else {
        $w->header("HTTP/1.1 404 Not Found");
        $w->notFoundPage();
    }
}
