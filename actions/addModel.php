<?php

function addModel_GET(Web $w) {
    ini_set('post_max_size', '64M');
    ini_set('upload_max_filesize', '64M');
    $loggedInUser = AuthService::getInstance($w)->User();
    $w->ctx("userId", $loggedInUser->id);
    $userContact = $loggedInUser->getContact();

    $w->ctx('title','Hello ' . $userContact->getFullName());
    

    $form = [
        'Model Upload' => [
            [
                ['Name', 'text', 'name', ''],
                ['Client Name', 'text', 'client_name', '']
            ],
            [
                ['Model', 'file' , 'model_name', '']
            ]
        ]
    ];
   
    $w->ctx('class', 'User');
    $w->ctx('class_id', $loggedInUser->id);

    $w->ctx('redirect_url', '/virtualhome/index');

}



function addModel_POST(Web $w) {

     //echo '<pre>';
     // var_dump($form); die;
     //print("hello");
}