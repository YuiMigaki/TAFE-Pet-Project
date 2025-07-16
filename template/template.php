<?php
 	$header = '
<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="This is an organic produce shop located in the land of sunshine, Okayama Prefecture, Japan. We aim to provide pesticide-free agricultural products to all our customers to make their lives brighter and more fulfilled.">
    <meta name="keywords" content="Okayama, Japan, certified organic produce store, health, life, food, vegetables, shop, near me, organic, farming, agriculture, store, raw food, diet, superfoods, JAS, green papaya, radish, carrot, cabbage, kale, cherry tomato, cucmber, onion, beetroot, eggplant, momotaro tomato, ">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">


    <title>Organic Life Fenthree - Certified organic produce store from Okayama, Japan</title>
    <link rel="icon" href="./img/favicon.ico">
    <link href="css/style.css" rel="stylesheet">
    <link href="css/newform.css" rel="stylesheet">

    <!-- Google tag (gtag.js) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-DLP94Y2E55"></script>
    <script>
      window.dataLayer = window.dataLayer || [];
      function gtag(){dataLayer.push(arguments);}
      gtag("js", new Date());
    
      gtag("config", "G-DLP94Y2E55");
    </script>
</head>

<body>
    <div id="wrapper">
        <header>
        <a href="main" class="skip">Skip to main content</a>
            <a href="index.php">
                <picture>
                    <source srcset="img/logo2.jpg" media="(max-width: 800px)">
                    <img src="img/logo.jpg" alt="A image of logo"><!--https://organiclife-fenthree.com-->
                </picture>
                </a>
                <a class="underline" href="index.php" aria-label="Click to navigate to home page">
                  <h1>Organic Life Fenthree</h1>
                </a>
                <a href="index.php">
                  <img id="leaf-img" src="img/leaf.jpg" alt="A picture of a leaf"><!--https://www.istockphoto.com/photos/leaf-->
                </a>
        </header>';

$nav = '
    <nav class="navbar">
    <aside class="menu" id="togglebutton">
        <aside class="menu-line"></aside>
        <aside class="menu-line"></aside>
        <aside class="menu-line"></aside>
    </aside>
    <aside class="mobile_search-container">
        <label for="searchInput2" class="searchText"><img src="img/search.png" alt="A image of search mark"><!--https://www.flaticon.com/free-icon/search_10385257--></label>
        <input type="text" id="searchInput2"  name="search" placeholder="Search..">
        <button type="submit">Submit</button>
    </aside>
    <ul id="navlist"> <!--id used by js-->
        <li><a href="index.php">Home</a></li>
        <li><a href="blog.php">Blog</a></li>
        <li><a href="products.php">Products</a></li>
        <li><a href="cart.php">Cart</a></li>
        <li><a href="contact.php">Contact</a></li>

        <li class="search-container">
            <label for="searchInput" class="searchText"><!--https://www.flaticon.com/free-icon/search_10385257--></label>
            <!-- referenced from https://www.w3schools.com/howto/howto_css_searchbar.asp-->
            <input type="text" id="searchInput" name="search" placeholder="Search..">
            <button type="submit">Submit</button>
        </li>
    </ul>
    </nav>';
 

	
	$footer = '
    <footer>
          <aside>
            <img id="icon1" src="img/small_instagram.png" alt="instagram_icon"><!-- https://icons8.com/icons-->
            <img id="icon2" src="img/small_facebook.png" alt="facebook_icon"><!-- https://icons8.com/icons-->
            <img id="icon3" src="img/small_twitter.png" alt="twitter_icon"><!-- https://icons8.com/icons-->
            <img id="icon4" src="img/small_tiktok.png" alt="tiktok_icon"><!-- https://icons8.com/icons-->
          </aside>
          <ul>
            <li><a href="index.php">About us</a></li>
            <li><a href="index.php">Privacy Policy & Security Policy</a></li>
            <li><a href="index.php">Terms and Conditions</a></li>
            <li><a href="contact.php">Contact us</a></li>
          </ul>
          <p>Address: Kita-ku, Okayama City, Okayama 000-0000</p>
          <p>Copyright ' . date("Y") . ' 100% organic. All Rights Reserved.</p>
    </footer>
</div>
<script src="js/script.js"></script>
  </body>
</html>';



$footer_contact_page = '
<footer>
      <aside>
        <img id="icon1" src="img/small_instagram.png" alt="instagram_icon"><!-- https://icons8.com/icons-->
        <img id="icon2" src="img/small_facebook.png" alt="facebook_icon"><!-- https://icons8.com/icons-->
        <img id="icon3" src="img/small_twitter.png" alt="twitter_icon"><!-- https://icons8.com/icons-->
        <img id="icon4" src="img/small_tiktok.png" alt="tiktok_icon"><!-- https://icons8.com/icons-->
      </aside>
      <ul>
        <li><a href="index.php">About us</a></li>
        <li><a href="index.php">Privacy Policy & Security Policy</a></li>
        <li><a href="index.php">Terms and Conditions</a></li>
        <li><a href="contact.php">Contact us</a></li>
      </ul>
      <p>Address: Kita-ku, Okayama City, Okayama 000-0000</p>
      <p>Copyright ' . date("Y") . ' 100% organic. All Rights Reserved.</p>
</footer>
</div>
<script src="js/script.js"></script>
<script src="js/register.js"></script>
<script src="js/errorMessages.js"></script>
<script src="js/utilities.js"></script>

</body>
</html>';

 ?>