<?php

class VirtualhomeModel extends DbObject {

    public $user_id; // this user is the architect
    public $name;
    public $client_name;
    public $attachment_id;
    public $dt_created;

    // public function writeOut(?string $saveAs = null): void
    //  {
    //      FileService::getInstance($this->w)->writeOutAttachment($this, $saveAs);
    //  }

}