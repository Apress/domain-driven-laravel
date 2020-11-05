<?php

//create order object
$order = new Order($shopperId, $cartId);

//create product object & quantity of that product
$product = Product::find(420);
$quantity = 3;

//we no longer have to worry about the orderLine object at all!
//instead, we just pass in the data we already have...
$order->addOrderLine($product, $qty);
$order->addOrderLine($product2, $qty2);
$order->addOrderLine($product3, $qty3);

//user clicks on the “Checkout” button:
if ($order->startCheckout()) {
	dispatch(new RunCheckout($order));
} else {
	//return some response indicating to the frontend the issue, 
	//which would presumably display a notification to the user
}
