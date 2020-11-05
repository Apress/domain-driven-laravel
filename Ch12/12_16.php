<?php
namespace YarnsAndGobyl\Domain\Repositories;

use YarnsAndGobyl\Domain\Models\Cart;

interface CartRepository
{
	public function nextIdentity();
	public function add(Cart $cart);
	public function remove(Cart $cart);
}	
