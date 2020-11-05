<?php

//namespace & use statements

class Order extends Model
{
	//properties and method definitions

	/** 
	* @param $sequence : The location of the order line in the array
	*/
	public function removeOrderLine($sequence)
	{
		if (isset($this->orderLines[$sequence])) {
			$orderLine = $this->orderLines[$sequence];
			$totalAmountDelta = $orderLine->product->price +
				($orderLine->product->price * static::TAX_RATE);
			$this->total -= $totalAmountDelta;
			unset ($this->orderLines[$sequence]));
		}
	}

	public function updateQuantity($sequence, $newQuantity)
	{
		if (isset($this->orderLines[$sequence])) {
			//get the product that corresponds to that order line:
			$orderLine = $this->orderLines[$sequence];
			$product = $orderLine->product;
			//remove the orderLine completely from the array:
			$totalAmountDelta = $product->price + ($product->price 
				* static::TAX_RATE);
			$this->amount -= $totalAmountDelta;
			unset($this->orderLines[$sequence]);
			//we dont have to worry about adding the product’s
			//tax because that logic is already in addOrderLine():
			$this->addOrderLine($product, $newQuantity);
		}
	}
}
