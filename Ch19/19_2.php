<?php

namespace Claim\Submission\Domain\Contracts;

interface Repository
{
	public function all(array $columns = [‘*’]);
	public function paginate(int $perpage=1, array $columns = [‘*’]);
	public function find(int $id, array $columns);
	public function findBy(string $field, $value, $columns=[“*”]);
	public function findAllBy(string $field, $value, $columns=[“*”]);
	public function findWhere(string $where, columns=[“*”]);
	public function findOrFail(int $id, $columns=[“*”];
}
