<?php

require_once __DIR__ . '/Propel20WithCacheTestSuite.php';

class Propel20FormatOnDemandTestSuite extends Propel20WithCacheTestSuite
{
	function runHydrate($i)
	{
		$books = BookQuery::create()
			->filterByPrice(array('min' => $i))
			->limit(5)
			->setFormatter(\Propel\Runtime\ActiveQuery\ModelCriteria::FORMAT_ON_DEMAND)
			->find();
		foreach ($books as $book) {
		}
	}
	
	function runJoinSearch($i)
	{
		$books = BookQuery::create()
			->filterByTitle('Hello' . $i)
			->joinWithAuthor()
			->setFormatter(\Propel\Runtime\ActiveQuery\ModelCriteria::FORMAT_ON_DEMAND)
			->findOne();
	}
	
}