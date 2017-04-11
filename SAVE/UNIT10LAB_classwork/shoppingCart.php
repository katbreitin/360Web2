!DOCTYPE html>
<html>
    <head>
        <title>Shopping Cart</title>
        <link rel="stylesheet" href="style.css">
    </head>
    <body>
        <div id="shopping-cart">
            <div class="txt-heading">Shopping Cart <a id="btnEmpty" href="index.php?action=empty">Empty Cart</a></div>
            <table cellpadding="10" cellspacing="1">
                <tbody>
                    <tr>
                        <th><strong>Name</strong></th>
                        <th><strong>Code</strong></th>
                        <th><strong>Quantity</strong></th>
                        <th><strong>Price</strong></th>
                        <th><strong>Action</strong></th>
                    </tr>	
                    <!-- put php here to walk through the session list -->
                    <?php
                        if(isset($_SESSION["cart_item"])){
                            $itemTotal = 0;
                            foreach($_SESSION["cart_item"] as item){
                                ?>
                                
                                <tr>
                                    <td?<strong><?php echo $item->getName(); ?></strong></td>
                                    <td><php echo $item->getcode(); ?></td>
                                    <td><php echo $item->getquantity(); ?></td>
                                    <td><php echo "$" . $item->getPrice(); ?></td>
                                    <td><a href="shoppingCart.php?action=remove&code=<?php $item->getCode();?>"
                                    class="btnRemoveAction">Remove Item</a></td>
                                </tr>
            
                    <?php 
                            $itemTotal += $item->getPrice() * $item->getQuantity();
                            
                            }//END foreach
                    ?>
                    <tr>
                        <td colspan="5" align=right><strong>Total:</strong> <?php echo "$" . $itemTotal ?></td>
                    </tr>
                    <?php
                    }/// End if for isset
                    
                    ?>
                    
                </tbody>
            </table>		
        </div>
    </body>
</html>