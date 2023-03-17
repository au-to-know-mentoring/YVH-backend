<?php

function login_ALL(Web $w) {

    $w->setLayout(null);
    //echo "test complete";

    $request_data = json_decode(file_get_contents("php://input"), true);
    if (empty($request_data) || !array_key_exists("login", $request_data) || !array_key_exists("password", $request_data)) {
        $w->error("Please enter your login and password", "/auth/login");
    }

    $login = $request_data["login"];
    $password = $request_data["password"];
    $mfa_code = array_key_exists("mfa_code", $request_data) ? $request_data["mfa_code"] : null;

    if (empty($login) || empty($password)) {
        $w->error("Please enter your login and password", "/auth/login");
    }

    $user = AuthService::getInstance($w)->getUserForLogin($login);
    if (empty($user)) {
        $w->out((new AxiosResponse())->setErrorResponse("Incorrect login details", null));
        return;
    }

    if ($user->is_mfa_enabled && empty($mfa_code)) {
        $w->out((new AxiosResponse())->setSuccessfulResponse(null, ["is_mfa_enabled" => true]));
        return;
    }

    $user = AuthService::getInstance($w)->login($login, $password, "Australia/Sydney", false, $mfa_code);
    if (empty($user)) {
        $w->out((new AxiosResponse())->setErrorResponse("Incorrect login details", null));
        return;
    }

    

}