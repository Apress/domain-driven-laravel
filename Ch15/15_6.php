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
			unset ($this->orderLines[$sequence]));
		}
	}

	public function updateQuantity($sequence, $newQuantity)
	{
		if (isset($this->orderLines[$sequence])) {
			//get the product that corresponds to that order line:
			$product = $this->orderLines[$sequence]->product;
			//remove the orderLine completely from the array:
			unset($this->orderLines[$sequence]);
			//add the new orderLine to the array:
			$this->addOrderLine($product, $newQuantity);
		}
	}
}
