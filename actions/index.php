<?php

function index_ALL(Web $w) {
    $w->ctx("title", "Your Virtual Home");

    $loggedInUser = AuthService::getInstance($w)->User();
    $w->ctx("userId", $loggedInUser->id);
    $userContact = $loggedInUser->getContact();

    $w->ctx("User_name", $userContact->getFullName());

    
    //var_dump($downloadcode->code);
    //var_dump($attachments); 


    //table that shows uploaded models
    //with buttons to delete
        $attachments = FileService::getInstance($w)->getAttachments('User', $loggedInUser->id);

        $table = [];
        $tableHeaders = ['Name' , 'Client', 'File Name', 'Actions'];
        if (!empty($attachments)) {
            foreach ($attachments as $attachment) {
                $row = [];
                $row[] = $attachment->title;
                $row[] = $attachment->description;
                $row[] = $attachment->filename;
                $actions = [];
                $actions[] = Html::box('/virtualhome/getCode/' . $attachment->id, 'Generate Code',  true);
                $actions[] = Html::b('/virtualhome-remote/delete/' . $attachment->id, 'Delete', 'Are you sure you want to Delete this model?', null, false, 'warning');
                
                // $actions[] = html::b('/virtualhome-remote/getModel/' . $attachment->virtualhome_id, 'Get Model');
                // $actions[] = html::b('/virtualhome-remote/download/' . $attachment->id, 'Download');
               
                //$actions[] = html::box('/school/getSchoolCode/' . $attachment->id, 'Get Code');
                
    
                
                $row[] = implode($actions);
                $table[] = $row;
            }
        }
    

   

    $w->ctx("table",Html::table($table,null,"tablesorter",$tableHeaders));

    //echo "<pre>";
    // var_dump($table);

  


}



