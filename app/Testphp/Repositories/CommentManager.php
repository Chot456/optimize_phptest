<?php

namespace Testphp\Repositories;

use Exception;
use Testphp\DBconnect\DB;
use Testphp\Filters\Comment;

class CommentManager
{
	private $db;

	/**
	 * Initializes a new instance of the class.
	 *
	 * @return void
	 */
	public function __construct()
	{
		$this->db = DB::getInstance();
	}

	/**
	 * Retrieves a list of comments from the database.
	 *
	 * @return array Returns an array of Comment objects representing the comments.
	 */
	public function listComments(): array
	{
		$query = 'SELECT * FROM `comment`';
		$rows = $this->db->select($query);

		return array_map(function ($row) {
			return (new Comment())
				->setId($row['id'])
				->setBody($row['body'])
				->setCreatedAt($row['created_at'])
				->setNewsId($row['news_id']);
		}, $rows);
	}

	/**
	 * Adds a comment for a news article.
	 *
	 * @param string $body The body of the comment.
	 * @param int $newsId The ID of the news article.
	 * @throws Exception If there is an error inserting the comment.
	 * @return int The ID of the newly inserted comment.
	 */
	public function addCommentForNews($body, $newsId): int
	{
		try {
			$this->db->beginTransaction();
			$sql = "INSERT INTO `comment` (`body`, `created_at`, `news_id`) VALUES(?, ?, ?)";
			$stmt = $this->db->prepare($sql);
			$stmt->execute([$body, date('Y-m-d'), $newsId]);
			$this->db->commit();
			return $this->db->lastInsertId();
		} catch (\Throwable $th) {
			$this->db->rollBack();
			throw new Exception("Error: " . $th->getMessage());
		}
	}


	/**
	 * Deletes comments from the database.
	 *
	 * @param array $ids The array of comment IDs to be deleted.
	 * @throws Exception If there is an error executing the SQL statement.
	 * @return int The number of rows affected by the delete statement.
	 */
	public function deleteComment($ids = []): int
	{
		if (empty($ids)) {
			return 0;
		}

		try {
			$this->db->beginTransaction();
			$stmt = $this->db->prepare("DELETE FROM `comment` WHERE `id` IN (?)");
			$stmt->execute([$ids]);
			$this->db->commit();
			return $stmt->rowCount();
		} catch (\Throwable $th) {
			$this->db->rollBack();
			throw new Exception("Error: " . $th->getMessage());
		}
	}
}
