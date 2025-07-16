<?php include_once $_SERVER['DOCUMENT_ROOT'] . '/includes/helpers.inc.php'; ?>



    <?php if (count($cart) > 0): ?>
    <table id="cart-html-php">
      <thead>
        <tr>
          <th>Item Description</th>
          <th>Price</th>
        </tr>
      </thead>
      <tfoot>
        <tr>
          <td>Total:</td>
          <td>$<?php echo number_format($total, 2); ?></td>
        </tr>
      </tfoot>
      <tbody>
        <?php foreach ($cart as $item): ?>
          <tr>
            <td><?php echo($item['desc']); ?></td>
            <td>
              $<?php echo number_format($item['price'], 2); ?>
            </td>
          </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
    <?php endif; ?>
    <form id="cartForm1" action="?cart" method="post">
      <p>
        <a href="products.php">Continue shopping</a> or
      </p>
        <input type="submit" name="action" value="Empty cart">
		
		<!-- <span id='cwppButton'></span>  -->
      
    </form>
	

