<?php
require_once "app/start.php";

use Testphp\Repositories\CommentManager;
use Testphp\Repositories\NewsManager;

$commentManger = new CommentManager();
$newManager = new NewsManager();


foreach ($newManager->listNews() as $news) {
	echo("############ NEWS " . $news->getTitle() . " ############\n");
	echo($news->getBody() . "\n");
	foreach ($commentManger->listComments() as $comment) {
		if ($comment->getNewsId() == $news->getId()) {
			echo("Comment " . $comment->getId() . " : " . $comment->getBody() . "\n");
		}
	}
}
