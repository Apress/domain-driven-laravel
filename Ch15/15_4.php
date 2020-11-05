<?php

//use cases & namespaces
use Ecommerce\Domain\Models\Orders\OrderStatus;
use Illuminate\Support\Facades\DB;

class Order extends Model
{
    //methods and property definitions
    public $orderLines = [];
    const  TAX_RATE = .10;

    private $status = OrderStatus::ORDER_STARTED;

    /**
    *	Invariant #2 & #3 are protected here
    */
    public function addOrderLine(Product $product, int $qty=1)
    {
        $orderLine = new OrderLine($product, $qty);
        $price = $product->price;

        foreach ($qty as $q) {
            $this->total += ($price +
                (static::TAX_RATE * $price));
        }


        $this->orderLines[] = $orderLine;
    }

    /**
     * 	Invariant #1 is protected here
     */
    public function startCheckout()
    {
        if (!empty($this->orderLines) &&
		   (count($this->orderLines) > 0)) {
			//save the order lines within a transaction so we can
			//guarantee the state of the order stays consistent
			DB::transaction(function() {
		        foreach ($this->orderLines as $orderLine) {
                    	$this->associate($orderLine);
                }
			$this->save();
            });
		/*start checkout process with a job or service.
		  In theory, this would also change the status of the
		  Order to something like OrderStatus::CHECKOUT_STARTED*/
		}
		
		return new JsonResponse(“Order must have at least one Order Line before Checkout can begin”, 500);
	}
}
