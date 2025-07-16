<?php include_once $_SERVER['DOCUMENT_ROOT'] . '/includes/helpers.inc.php';?>

  <table id="itemTable">
          <thead>
            <tr>
              <th>Item Description</th>
              <th>Price</th>
              <th>Add</th>
            </tr>
          </thead>

            <?php foreach ($items as $item):?>
              <tr>
                <td><?php echo ($item['desc']); ?></td>
                <td>
                  $<?php echo number_format($item['price'], 2); ?>
                  <!-- We use PHP’s built-in number_format function to display the prices with two digits after the decimal point (see the PHP Manual4 for more information about this function) -->
    
                </td>
                <td>
                <form action="?" method="post">
                        <div>
                            <input type="hidden" name="id" value="<?php htmlout($item['id']); ?>">
                            <input type="submit" name="action" value="Buy">
                        </div>
                    </form>
                </td>
              </tr>
            <?php endforeach; ?>
         
        </table>
        <br>
        <p id="count">Your shopping cart contains <?php
            echo count($_SESSION['cart']); ?>items.</p>		
            <!-- We use the built-in PHP function count to output the number of items in the array stored in the $_SESSION['cart'] -->
        <p id="empty">Press the below link to see your cart!</p>
        <p id="cartView"><a href="?cart">View your cart</a></p>
            <!-- We provide a link to let the user view the contents of the shopping cart. In a system that provided checkout facilities, you might label this link Proceed to Checkout -->


