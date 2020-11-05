<?php

namespace Claim\Submission\Domain\Repository;

use Claim\Submission\Domain\Contracts\Repository as 
	RepositoryInterface;
use Claim\Submission\Domain\Contracts\CriteriaHandler;

use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Container\Container as App;
use Illuminate\Http\Exception\HttpResponseException;

abstract class BaseRepository implements RepositoryInterface, 
                                     CriteriaHandler
{
	/** Specify the underlying model class */
	abstract public function model(): Model;
	
	/** Service Container */
	private App $app;

	/** The underlying model class name*/
	protected string $model;

/** The current stack of criteria */
	protected Collection $criteria;

	/** Switch to skip criteria */
	protected bool $skipCriteria = false;

	/** Prevent overwriting same criteria in stack */
	protected bool $preventCriteriaOverwriting = true;
	
	public function __construct(App $app, Collection $collection)
	{
		$this->app = $app;
		$this->criteria = $collection;
		$this->resetScope();
		$this->makeModel();		
	}

	public function all(array $columns = [“*”])
	{
		$this->applyCriteria();
		return $this->model->get($columns); 
	}

	public function query()
	{
		return $this->model;
	}	

	public function find($id, $columns=[“*”])
	{
		$this->applyCriteria();
		return $this->model->findOrFail($id, $columns);
	}	

	public function findBy($attribute, $value, $columns=[“*”])
	{
		$this->applyCriteria();
		return $this->model->where($attribute, ‘=’, 
			$value)->first($columns);
	}	

	public function (Criteria $criteria)
	{
		$this->model = $criteria->apply($this->model, $this);
		return $this;
	}	

	public function applyCriteria()
	{
		if ($this->skipCriteria === true) {
			return $this;
		}

		foreach ($this->getCriteria() as $criteria) {
			if ($criteria instanceof Criteria) {	
				$this->model = $criteria->apply(
					$this->model, $this);
			}
		}
		return $this;
	}
}
