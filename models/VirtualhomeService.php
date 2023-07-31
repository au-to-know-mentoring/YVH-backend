<?php

class VirtualhomeService extends DbService {




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
    public function getCode($where = [])
    {
        $where["is_deleted"] = 0;

        return $this->getObjects("Code", $where);
    }
}