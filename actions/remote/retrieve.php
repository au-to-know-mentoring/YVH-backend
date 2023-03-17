<?php

function retrieve_ALL(Web $w) {

    $p = $w->pathMatch("attachment_id");

    //check if id is found
    if (empty($p['attachment_id'])) {
        $w->out('no id found');
        return;
    }

    //get logged in user 
    $user = AuthService::getInstance($w)->user();
    

    //check that attachment belongs to the loged in user
    

    $attachment = FileService::getInstance($w)->getAttachment($p['attachment_id']);

    // echo '<pre>';
    // var_dump($attachment); die;

    if ($attachment->parent_id != $user->id) {
        $w->out('id does not match user');
        return;
    }

    if (!empty($attachment) && $attachment->exists()) {
        //check if no user logged in, is attachment public
        if (!AuthService::getInstance($w)->loggedIn() && !($attachment->is_public || $attachment->checkViewingWindow())) {
            return;
        }
        $attachment->writeOut();
    } else {
        $w->header("HTTP/1.1 404 Not Found");
        $w->notFoundPage();
    }

}




