<?php
// This is a common way to get all of the cookie data so we can display it, and use it for checkout.

function get_menu_item_by_id($id)
{
	// You'd probably be doing a database lookup here
	if( $id == 1 )
	{
		return array(
				"id" => 1,
				"cost" => "1.99",
				"title" => "Item 1 Title"
			);
	} 
	else if( $id == 2 )
	{
		return array(
				"id" => 2,
				"cost" => "2.99",
				"title" => "Item 2 Title"
			);
	}
}

function getCartSessionData()
{	
	$cartString = $_COOKIE["cart"];

	$cartArray = explode(",",trim($cartString));

	$itemizedCart = array();

	foreach($cartArray as $item)
	{
		if(isset($itemizedCart[$item]))
		{
			$itemizedCart[$item]++;	
		}
		else
		{
			$itemizedCart[$item] = 1;	
		}
	}			


	$cartToPrint = array();
	$total = 0;
	$numItems = 0;
	foreach ($itemizedCart as $key => $quantity) 
	{
		if(is_numeric($key) && is_numeric($quantity))
		{
			$itemDetails = get_menu_item_by_id($key);
			$cost = $itemDetails["cost"];    			

			if(is_numeric($cost))
			{
				$cartToPrint[$key] = 
	    			array(
	    			"id" => $itemDetails["id"],
	    			"quantity" => $quantity,
	    			"cost" => $cost,
	    			"title" => $itemDetails["title"]	    		
	    			);
	    		$numItems += $quantity;
	    		$total += $cost*$quantity;
			}    				    		
		}    		
	}

	return array(
		"total" => $total,
		"cartToPrint" => $cartToPrint,
		"totalItems" => $numItems		
		);
}

?>