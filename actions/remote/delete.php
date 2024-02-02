<?php 
function delete_GET(Web $w) {
	$p = $w->pathMatch("id");
	
    $attachment = FileService::getInstance($w)->getAttachment($p['id']);

	if (empty($p['id'])) {
		$w->error("Missing attachment ID");
	}

	
	if (empty($attachment->id)) {
		$w->error("Attachment not found");
	}

	$attachment->delete();
    $w->msg("Attachment deleted", '/virtualhome');
       
}



