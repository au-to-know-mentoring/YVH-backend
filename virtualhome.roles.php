<?php

function role_virtualhome_architect_allowed(Web $w, $path) {
    return $w->checkUrl($path, "virtualhome", "*", "*");
}