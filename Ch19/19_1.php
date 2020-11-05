<?php

namespace Claim\Submission\Domain\Contracts;

interface CriteriaHandler
{
	/** Skip any applied criteria during processing */
	public function skipCriteria(bool $status=true): Criteria;

	/** Return the currently configured criteria */
	public function getCriteria() : array;
	
	/** Immediately run the passed in criteria and return results */
	public function getByCriteria(Criteria $criteria): array;
		
	/** Add some criteria to the set of criteria to be applied */
	public function pushCriteria() : array;

	/** Apply any pushed criteria */
	public function applyCriteria();
}
