<?php

class VirtualhomeService extends DbService {




    public function navigation(Web $w, $title = null, $nav = null)
    {
        if ($title) {
            $w->ctx("title", $title);
        }

        $nav = $nav ? $nav : [];

        if ($w->Auth->loggedIn()) {
            $user = AuthService::getInstance($w)->user();
            // manager menu links
            if ($user->hasRole('architect')) {
                $w->menuLink("/virtualhome/index", "Virtual Home", $nav);
            }
            
        }
        $w->ctx("navigation", $nav);
        return $nav;
    }
}