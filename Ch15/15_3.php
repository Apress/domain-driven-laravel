<?php

//namespace & use cases

class Order extends Model
{
	//methods and property definitions

	public function addOrderLine(Product $product, int $qty)
	{	
		$orderLine = OrderLine::create($product, $qty);
			$this->orderLines()->associate($orderLine);
			$this->save();
	}	
}	
