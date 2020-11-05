<?php

namespace Ecommerce\Domain\Models\Orders\Order;

use Illuminate\Database\Eloquent\Model;
use Ecommerce\Domain\Models\{Product\ProductId, Order\OrderId};

class OrderLine extends Model
{
	protected Order $order;
	protected Product $product;
	protected int $quantity;

	protected $fillable = ['product_id', 'orderLineAmount',
					 'order_id', 'quantity'];

	public function __construct(Product $product, int $quantity, Order $order)
	{
		parent::__construct();
		$this->product = $product;
		$this->quantity = $quantity;
	}

	public function order()
     {
		return $this->belongsTo(Order::class);
     }

	public function product()
	{
	 	return $this->hasOne(Product::class);
	}
}
