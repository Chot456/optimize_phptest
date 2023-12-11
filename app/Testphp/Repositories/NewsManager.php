<?php

namespace Testphp\Repositories;

use Exception;
use Testphp\DBconnect\DB;
use Testphp\Filters\News;

class NewsManager
{
	private $commentManager;
	private $db;

	public function __construct()
	{
		$this->commentManager = new CommentManager();
		$this->db = DB::getInstance();
	}

	/**
	 * Gets all news articles from the database.
	 *
	 * @return array An array of News objects.
	 */
	public function listNews(): array
	{
		$news = $this->db->select('SELECT * FROM `news`');

		return array_map(function ($row) {
			return (new News())
				->setId($row['id'])
				->setTitle($row['title'])
				->setBody($row['body'])
				->setCreatedAt($row['created_at']);
		}, $news);
	}

	/**
	 * Adds a news article to the database.
	 *
	 * @param string $title The title of the news article.
	 * @param string $body The body of the news article.
	 * @throws Exception Error message if the transaction fails.
	 * @return int The ID of the newly inserted news article.
	 */
	public function addNews(string $title, string $body): int
	{
		try {
			$this->db->beginTransaction();
			$query = "INSERT INTO `news` (`title`, `body`, `created_at`) VALUES(?, ?, ?)";
			$params = [$title, $body, date('Y-m-d')];
			$statement = $this->db->prepare($query);
			$statement->execute($params);
			$newsId = $this->db->lastInsertId();
			$this->db->commit();
			return $newsId;
		} catch (\Throwable $th) {
			$this->db->rollBack();
			throw new Exception("Error: " . $th->getMessage());
		}
	}

	
	/**
	 * Deletes a news item from the database.
	 *
	 * @param int $id The ID of the news item to be deleted.
	 * @throws Exception If an error occurs during the deletion process.
	 * @return array An array with a success message and a boolean indicating the result.
	 */
	public function deleteNews(int $id): array
	{
		$comments = $this->commentManager->listComments();

		$idsToDelete = array_filter($comments, function ($comment) use ($id) {
			return $comment->getNewsId() == $id;
		});

		if (!empty($idsToDelete)) {
			$this->commentManager->deleteComment(array_column($idsToDelete, 'id'));
		}

		$db = DB::getInstance();

		try {
			$db->beginTransaction();
			$sql = "DELETE FROM `news` WHERE `id`=" . $id;
			$db->exec($sql);
			$db->commit();
			return ['message' => 'Success', 'result' => true];
		} catch (\Throwable $th) {
			$db->rollBack();
			throw new Exception("Error: " . $th->getMessage());
		}
	}
}
