<?php	
	//*****************************************************
	
	//Page 272
$items = array(
    array('id' => '1', 'desc' => 'Momotaro Tomato (per kg)',
        'price' => 14.99),
    array('id' => '2', 'desc' => 'Eggplant (per kg)',
        'price' => 10.99),
    array('id' => '3', 'desc' => 'Carrot (per kg)',
        'price' => 10.99),);

	//*****************************************************
	
		//Page 273
session_start();
if (!isset($_SESSION['cart']))
{
  $_SESSION['cart'] = array();
}

if (isset($_POST['action']) and $_POST['action'] == 'Buy')
{
  // Add item to the end of the $_SESSION['cart'] array - Page 276
  $_SESSION['cart'][] = $_POST['id'];
  // header('Location: ./shoppingcart/cart.html.php');
  header('Location: ./cart.php');
  exit();
}

if (isset($_POST['action']) and $_POST['action'] == 'Empty cart') //Page 279 Empty Cart
{
  // Empty the $_SESSION['cart'] array
  unset($_SESSION['cart']);
  // header('Location: ?cart');
  header('Location: ./cart.php');
  exit();
}

if (isset($_GET['cart'])) // Page 276
{
  $cart = array();
  $total = 0;
  foreach ($_SESSION['cart'] as $id)
  {
    foreach ($items as $product)
    {
      if ($product['id'] == $id)
      {
        $cart[] = $product;
        $total += $product['price'];
        break;
      }
    }
  }

  //****************************************************
  //Page 273
  // include 'cart.html.php';
  // exit();
}

// include 'catalog.html.php';