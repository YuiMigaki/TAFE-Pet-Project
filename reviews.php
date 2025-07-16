
<?php

include_once $_SERVER['DOCUMENT_ROOT'] . '/includes/db.inc.php';
try
{
$sql = 'SELECT review.id, reviewtext, name, email
  FROM review INNER JOIN author
    ON authorid = author.id';
$result = $pdo->query($sql);
}
catch (PDOException $e)
{
$error = 'Error fetching reviews: ' . $e->getMessage();
include 'error.html.php';
exit();
}

foreach ($result as $row)
{
$reviews[] = array(
  'id' => $row['id'],
  'text' => $row['reviewtext'],
  'name' => $row['name'],
  'email' => $row['email']
);
}
include 'content/reviews.html.php';


?>



