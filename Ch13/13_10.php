<?php

class Data
{
	private $id;
	private $fname;
	private $lname;
	private $role_id;
	private $address;
	private $city;
	private $state;
	private $zip;
	private $created_at;
	private $updated_at;

	public function getId(): int
	{
		return $this->id;
	}
public function setId(int $id): self 
	{
		$this->id = $id;
		return $this;
	}

	public function getFname(): string
	{
		return $this->fname;
	}
public function setFname($fname): self
	{
		$this->fname = $fname;
		return $this;
	}	
	/* remaining getters and setters */
}
