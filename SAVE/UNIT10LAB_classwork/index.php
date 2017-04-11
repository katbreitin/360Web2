<!DOCTYPE html>
<html>
    <head>
        <title>Shopping Cart</title>
        <link rel="stylesheet" href="style.css">
    </head>
    <body>
    	<?php
    		include_once("cartObject.php");
    		session_start();
    		
    		if(!empty($_POST["quantity"])){
    			$cObject = new cartObject();
    			$cObject->setCode($_GET["code"]); //uses the GET (note the name=3D%20Camera etc) to set the data
    			$cObject->setName($_GET["name"]);
    			$cObject->setPrice($_GET["price"]);
    			$cObject->setQuantity($_POST["quantity"]);
    			
    			$itemArray = array();
    			if(!empty($_SESSION["cart_item"])){
    				$itemArray = $_SESSION["cart_item"];
    				
    				$found = false; // here we check to see if we already have one of the item
    				foreach($itemArray as $value){
    					if($value->getCode() == $cObject->getCode()){
    						$found=true;
    						$value->setQuantity($value->getQuantity() + $cObject->getQuantity());
    					}
    				}
    				if(!$found){
    					$itemArray[] = $cObject; //pushes the new object onto the end of the array
    				}
    			}else{
    				$itemArray[] = $cObject;
    			}
    			
    			$_SESSION["cart_item"] = $itemArray;
    			
    			
    		}
    	?>
        <div id="product-grid">
	        <div class="txt-heading">Products</div>
	        <div class="product-item">
			    <form method="post" action="index.php?action=add&code=1&name=3D%20Camera&price=1500">
			        <div class="product-image"><img src="product-images/camera.jpg"></div>
			        <div><strong>3D Camera</strong></div>
        			<div class="product-price">1500.00</div>
			        <div><input type="text" name="quantity" value="1" size="2" />
			        <input type="submit" value="Add to cart" class="btnAddAction" /></div>
			    </form>
			</div>
			<div><a href="shoppingCart.php">Go to shopping cart.</a></div>
	    </div>
    </body>
</html>