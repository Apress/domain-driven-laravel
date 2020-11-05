<?php

namespace Ecommerce\Domain\Models\Orders\Order;

use Illuminate\Database\Eloquent\Model;
use Ecommerce\Domain\Models\{Payment\PaymentId,Shipping\ShippingId, 
					  Cart\CartId, Billing\BillingId};

class Order extends Model
{
	protected float $total=0.00;

	protected ShopperId $shopper;
	
	protected CartId $cartId;	
	
	protected ShippingId $shippingId;
	
	protected PaymentId $paymentId;

     protected $fillable = ['shopper_id','cart_id','payment_id', 
	   'shipping_id'];

     public function __construct(Shopper $shopper, CartId $cartId, 
			Payment $paymentId=null, ShippingId $shippingId=null)
	{
		parent::__construct();
		$this->shopperId = $shopperId;
		$this->cartId = $cartId;
		$this->billingId = $billingId;
		$this->shippingId = $shippingId;
	}

     public function orderLines()
     {
         return $this->hasMany(OrderLine::class);
     }
}
