<?php

function list_ALL(Web $w) {

    $w->setLayout(null);

    $user = AuthService::getInstance($w)->user();
    $attachments = FileService::getInstance($w)->getAttachments("User",$user->id);

    if (empty($attachments)) {
        return "No models available";
    }

    $array = [];
    foreach ($attachments as $model) {
        $row = [
            "id" => $model->id,
            "name" => $model->title,
            "client" => $model->description
        ];
        $array[] = $row;
    }

    // echo "<pre>";
    // var_dump($array);

    echo json_encode($array);
    

}