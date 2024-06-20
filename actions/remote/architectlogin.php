<?php

function architectlogin_GET(Web $w)
{
    $w->setLayout(null);
    

    // Check if logged in already
    $user = AuthService::getInstance($w)->user();
    if (AuthService::getInstance($w)->loggedIn() && AuthService::getInstance($w)->allowed($user->redirect_url)) {
        $w->redirect($w->localUrl("/virtualhome"));
    }

    $loginform = [
        ["Architect Login ", "section", "font-size: 2rem;"],
        ["Username", "text", "login"],
        ["Password", "password", "password"],
    ];

    $w->ctx("loginform", Html::form($loginform, "/virtualhome-remote/architectlogin", "POST"));

    

}

function architectlogin_POST(Web $w)
{
    $request_data = json_decode(file_get_contents("php://input"), true);
   

    $login = $_POST["login"];
    $password = $_POST["password"];
    

    $user = AuthService::getInstance($w)->login($login, $password, $_SESSION['usertimezone'], false);   

    $w->redirect("/virtualhome");


}