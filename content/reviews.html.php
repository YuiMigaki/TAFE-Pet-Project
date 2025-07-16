<!-- <?php include_once $_SERVER['DOCUMENT_ROOT'] . '/includes/helpers.inc.php'; ?> -->
   
<section id="reviews">
    <h2>Reviews</h2>
    <p class="center-align">Here are all the reviews that we have recieved from our customers.<br>For any customers who would like to add, edit, or delete reviews, please click the following link.<br><br></p>
    <p class="center-align"><a id="adminLink" href="admin">Admin Page</a></p>
    <!-- <aside id="adminLink"> -->
    <!-- </aside> -->
    <aside id="slider3">
    <?php foreach ($reviews as $review): ?>
      <blockquote class="slide3">
          <?php markdownout($review['text']); ?>
          <a href="mailto:<?php echo($review['email']); ?>"><?php
              echo($review['name']); ?></a>
      </blockquote>
    <?php endforeach; ?>
    </aside>
         
    </section>
  

</main>

