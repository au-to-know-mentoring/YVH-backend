<?php

class VirtualhomeService extends DbService {

    public function getCodeForAttachmentId($attachment_id)
    {
        

        return $this->getObject('VirtualhomeDownloadCode',  ['is_deleted'=>0, 'virtualhomemodel_id'=>$attachment_id]);
    }

    public function getCodeObjectForCode($code) {
        return $this->getObject('VirtualhomeDownloadCode', ['is_deleted'=>0, 'code'=>$code]);
    }
    public function getId($id)
    {
        return $this->getObject("VirtualhomeDownloadCode", $id);
        //return $this->getObject("VirtualhomeModel", ['is_deleted'=>0, 'attachment_id'=>$id]);
    }
    public function getModelID($attachment_id)
    {
        return $this->getObject("VirtualhomeDownloadCode", ['is_deleted'=>0, 'attachment_id'=>$attachment_id]);
    }
    public function getModelIDname($client_name)
    {
        return $this->getObject("VirtualhomeModel", ["client_name"=>$client_name]);
    }
   
  
    // public function getCodeForObjectTest($dt_generated) {
    //     return $this->getObject('VirtualhomeDownloadCode', ['is_deleted'=>0, 'dt_generated'=>$dt_generated]);
    // }




    public function navigation(Web $w, $title = null, $nav = null)
    {
        if ($title) {
            $w->ctx("title", $title);
        }

        $nav = $nav ? $nav : [];

        if (AuthService::getInstance($w)->loggedIn()) {
            $user = AuthService::getInstance($w)->user();
            // manager menu links
            if ($user->hasRole('architect')) {
               $w->menuLink("/virtualhome/index", "Virtual Home", $nav);
               $w->menuLink("/virtualhome/index", "Download Code", $nav);  
            }
            
        }
        $w->ctx("navigation", $nav);
        return $nav;
    }
   
}