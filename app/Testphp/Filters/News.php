<?php
namespace Testphp\Filters;

class News
{
	protected $id, $title, $body, $createdAt;

	/**
	 * Sets the ID of the object.
	 *
	 * @param mixed $id The ID to set.
	 * @return self Returns the updated object.
	 */
	public function setId($id): self
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
	 * Sets the title of the object.
	 *
	 * @param string $title The new title value.
	 *
	 * @return self Returns the updated object.
	 */
	public function setTitle(string $title): self
	{
		$this->title = $title;

		return $this;
	}

	/**
	 * Retrieves the title of the object.
	 *
	 * @return string The title of the object.
	 */
	public function getTitle(): string
	{
		return $this->title;
	}

	/**
	 * Sets the body of the function.
	 *
	 * @param string $body The body of the function.
	 * @return self Returns the current instance of the class.
	 */
	public function setBody(string $body): self
	{
		$this->body = $body;

		return $this;
	}

	/**
	 * Retrieves the body of the function.
	 *
	 * @return string The body of the function.
	 */
	public function getBody(): string
	{
		return $this->body;
	}

	/**
	 * Sets the value of the createdAt property.
	 *
	 * @param string $createdAt The new value for the createdAt property.
	 * @return self Returns the current instance of the class.
	 */
	public function setCreatedAt(string $createdAt): self
	{
		$this->createdAt = $createdAt;

		return $this;
	}

	/**
	 * Retrieves the value of the `createdAt` property.
	 *
	 * @return string The value of the `createdAt` property.
	 */
	public function getCreatedAt(): string
	{
		return $this->createdAt;
	}
}