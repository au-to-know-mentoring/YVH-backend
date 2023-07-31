<?php

class VirtualhomeDownloadCode extends DbObject {

    public $user_id; // this user is the architect
    public $name;
    public $client_name;
    public $attachment_id;
    public $dt_generated;
    public $code;

    
    public function getCode($id)
    {
        

        return $this->getObjects("Code", $id);
    }
    
}