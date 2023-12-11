<?php

namespace Testphp\Filters;

class Comment
{
	protected $id, $body, $createdAt, $newsId;

	/**
	 * Sets the ID of the object.
	 *
	 * @param int $id The ID of the object.
	 * @return self The updated object.
	 */
	public function setId(int $id): self
	{
		$this->id = $id;

		return $this;
	}

	/**
	 * Retrieves the ID of the object.
	 *
	 * @return int The ID of the object.
	 */
	public function getId(): int
	{
		return $this->id;
	}

    /**
     * Sets the body of the object.
     *
     * @param string $body The new body value to set.
     * @return self Returns the object itself for method chaining.
     */
	public function setBody(string $body): self
	{
		$this->body = $body;

		return $this;
	}

	/**
	 * Retrieves the body of the object.
	 *
	 * @return string The body of the object.
	 */
	public function getBody(): string
	{
		return $this->body;
	}

	/**
	 * Sets the createdAt property of the object.
	 *
	 * @param string $createdAt The value to set the createdAt property to.
	 * @return self Returns the current instance of the object.
	 */
	public function setCreatedAt(string $createdAt): self
	{
		$this->createdAt = $createdAt;

		return $this;
	}

	/**
	 * Retrieves the value of the createdAt property.
	 *
	 * @return string The createdAt value.
	 */
	public function getCreatedAt(): string
	{
		return $this->createdAt;
	}

	/**
	 * Retrieves the news ID.
	 *
	 * @return int The news ID.
	 */
	public function getNewsId(): int
	{
		return $this->newsId;
	}

	/**
	 * Set the news ID.
	 *
	 * @param int $newsId The news ID to set.
	 * @return self Returns the instance of the class.
	 */
	public function setNewsId(int $newsId): self
	{
		$this->newsId = $newsId;

		return $this;
	}
}