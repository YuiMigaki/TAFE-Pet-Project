<?php


require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/access.inc.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/includes/db.inc.php';


/*************************************************************
//Don't forget to change server path
/*************************************************************/

if (!userIsLoggedIn())
{
	include '../login.html.php';
	exit();
}

if (!userHasRole('Content Editor'))
{
	$error = 'Only Content Editors may access this page.';
	include '../accessdenied.html.php';
	exit();
}

if (isset($_GET['add']))
{
  $pageTitle = 'New Review';
  $action = 'addform';
  $text = '';
  $authorid = '';
  $id = '';
  $button = 'Add review';

  //include $_SERVER['DOCUMENT_ROOT'] . '/includes/db.inc.php';
  // include $_SERVER['DOCUMENT_ROOT'] . '/php/Assessment1_Task6/includes/db.inc.php';

  // Build the list of authors
  try
  {
    $result = $pdo->query('SELECT id, name FROM author');
  }
  catch (PDOException $e)
  {
    $error = 'Error fetching list of authors.';
    include 'error.html.php';
    exit();
  }

  foreach ($result as $row)
  {
    $authors[] = array('id' => $row['id'], 'name' => $row['name']);
  }

  // Build the list of categories
  try
  {
    $result = $pdo->query('SELECT id, name FROM category');
  }
  catch (PDOException $e)
  {
    $error = 'Error fetching list of categories.';
    include 'error.html.php';
    exit();
  }

  foreach ($result as $row)
  {
    $categories[] = array(
        'id' => $row['id'],
        'name' => $row['name'],
        'selected' => FALSE);
  }

  include 'form.html.php';
  exit();
}

if (isset($_GET['addform']))
{
  //include $_SERVER['DOCUMENT_ROOT'] . '/includes/db.inc.php';
  // include $_SERVER['DOCUMENT_ROOT'] . '/php/Assessment1_Task6/includes/db.inc.php';

  if ($_POST['author'] == '')
  {
    $error = 'You must choose an author for this review.
        Click &lsquo;back&rsquo; and try again.';
    include 'error.html.php';
    exit();
  }

  try
  {
    $sql = 'INSERT INTO review SET
        reviewtext = :reviewtext,
        reviewdate = CURDATE(),
        authorid = :authorid';
    $s = $pdo->prepare($sql);
    $s->bindValue(':reviewtext', $_POST['text']);
    $s->bindValue(':authorid', $_POST['author']);
    $s->execute();
  }
  catch (PDOException $e)
  {
    $error = 'Error adding submitted review.';
    include 'error.html.php';
    exit();
  }

  $reviewid = $pdo->lastInsertId();

  if (isset($_POST['categories']))
  {
    try
    {
      $sql = 'INSERT INTO reviewcategory SET
          reviewid = :reviewid,
          categoryid = :categoryid';
      $s = $pdo->prepare($sql);

      foreach ($_POST['categories'] as $categoryid)
      {
        $s->bindValue(':reviewid', $reviewid);
        $s->bindValue(':categoryid', $categoryid);
        $s->execute();
      }
    }
    catch (PDOException $e)
    {
      $error = 'Error inserting review into selected categories.';
      include 'error.html.php';
      exit();
    }
  }

  header('Location: .');
  exit();
}

if (isset($_POST['action']) and $_POST['action'] == 'Edit')
{
  //include $_SERVER['DOCUMENT_ROOT'] . '/includes/db.inc.php';
  // include $_SERVER['DOCUMENT_ROOT'] . '/php/Assessment1_Task6/includes/db.inc.php';

  try
  {
    $sql = 'SELECT id, reviewtext, authorid FROM review WHERE id = :id';
    $s = $pdo->prepare($sql);
    $s->bindValue(':id', $_POST['id']);
    $s->execute();
  }
  catch (PDOException $e)
  {
    $error = 'Error fetching review details.';
    include 'error.html.php';
    exit();
  }
  $row = $s->fetch();

  $pageTitle = 'Edit Review';
  $action = 'editform';
  $text = $row['reviewtext'];
  $authorid = $row['authorid'];
  $id = $row['id'];
  $button = 'Update review';

  // Build the list of authors
  try
  {
    $result = $pdo->query('SELECT id, name FROM author');
  }
  catch (PDOException $e)
  {
    $error = 'Error fetching list of authors.';
    include 'error.html.php';
    exit();
  }

  foreach ($result as $row)
  {
    $authors[] = array('id' => $row['id'], 'name' => $row['name']);
  }

  // Get list of categories containing this review
  try
  {
    $sql = 'SELECT categoryid FROM reviewcategory WHERE reviewid = :id';
    $s = $pdo->prepare($sql);
    $s->bindValue(':id', $id);
    $s->execute();
  }
  catch (PDOException $e)
  {
    $error = 'Error fetching list of selected categories.';
    include 'error.html.php';
    exit();
  }

  foreach ($s as $row)
  {
    $selectedCategories[] = $row['categoryid'];
  }

  // Build the list of all categories
  try
  {
    $result = $pdo->query('SELECT id, name FROM category');
  }
  catch (PDOException $e)
  {
    $error = 'Error fetching list of categories.';
    include 'error.html.php';
    exit();
  }

  foreach ($result as $row)
  {
    $categories[] = array(
        'id' => $row['id'],
        'name' => $row['name'],
        'selected' => in_array($row['id'], $selectedCategories));
  }

  include 'form.html.php';
  exit();
}

if (isset($_GET['editform']))
{
  //include $_SERVER['DOCUMENT_ROOT'] . '/includes/db.inc.php';
  // include $_SERVER['DOCUMENT_ROOT'] . '/php/Assessment1_Task6/includes/db.inc.php';

  if ($_POST['author'] == '')
  {
    $error = 'You must choose an author for this review.
        Click &lsquo;back&rsquo; and try again.';
    include 'error.html.php';
    exit();
  }

  try
  {
    $sql = 'UPDATE review SET
        reviewtext = :reviewtext,
        authorid = :authorid
        WHERE id = :id';
    $s = $pdo->prepare($sql);
    $s->bindValue(':id', $_POST['id']);
    $s->bindValue(':reviewtext', $_POST['text']);
    $s->bindValue(':authorid', $_POST['author']);
    $s->execute();
  }
  catch (PDOException $e)
  {
    $error = 'Error updating submitted review.';
    include 'error.html.php';
    exit();
  }

  try
  {
    $sql = 'DELETE FROM reviewcategory WHERE reviewid = :id';
    $s = $pdo->prepare($sql);
    $s->bindValue(':id', $_POST['id']);
    $s->execute();
  }
  catch (PDOException $e)
  {
    $error = 'Error removing obsolete review category entries.';
    include 'error.html.php';
    exit();
  }

  if (isset($_POST['categories']))
  {
    try
    {
      $sql = 'INSERT INTO reviewcategory SET
          reviewid = :reviewid,
          categoryid = :categoryid';
      $s = $pdo->prepare($sql);

      foreach ($_POST['categories'] as $categoryid)
      {
        $s->bindValue(':reviewid', $_POST['id']);
        $s->bindValue(':categoryid', $categoryid);
        $s->execute();
      }
    }
    catch (PDOException $e)
    {
      $error = 'Error inserting review into selected categories.';
      include 'error.html.php';
      exit();
    }
  }

  header('Location: .');
  exit();
}

if (isset($_POST['action']) and $_POST['action'] == 'Delete')
{
  // include $_SERVER['DOCUMENT_ROOT'] . '/php/Assessment1_Task6/includes/db.inc.php';

  // Delete category assignments for this review
  try
  {
    $sql = 'DELETE FROM reviewcategory WHERE reviewid = :id';
    $s = $pdo->prepare($sql);
    $s->bindValue(':id', $_POST['id']);
    $s->execute();
  }
  catch (PDOException $e)
  {
    $error = 'Error removing review from categories.';
    include 'error.html.php';
    exit();
  }

  // Delete the review
  try
  {
    $sql = 'DELETE FROM review WHERE id = :id';
    $s = $pdo->prepare($sql);
    $s->bindValue(':id', $_POST['id']);
    $s->execute();
  }
  catch (PDOException $e)
  {
    $error = 'Error deleting review.';
    include 'error.html.php';
    exit();
  }

  header('Location: .');
  exit();
}

if (isset($_GET['action']) and $_GET['action'] == 'search')
{
  //include $_SERVER['DOCUMENT_ROOT'] . '/includes/db.inc.php';
  // include $_SERVER['DOCUMENT_ROOT'] . '/php/Assessment1_Task6/includes/db.inc.php';

  // The basic SELECT statement
  $select = 'SELECT id, reviewtext';
  $from   = ' FROM review';
  $where  = ' WHERE TRUE';

  $placeholders = array();

  if ($_GET['author'] != '') // An author is selected
  {
    $where .= " AND authorid = :authorid";
    $placeholders[':authorid'] = $_GET['author'];
  }

  if ($_GET['category'] != '') // A category is selected
  {
    $from  .= ' INNER JOIN reviewcategory ON id = reviewid';
    $where .= " AND categoryid = :categoryid";
    $placeholders[':categoryid'] = $_GET['category'];
  }

  if ($_GET['text'] != '') // Some search text was specified
  {
    $where .= " AND reviewtext LIKE :reviewtext";
    $placeholders[':reviewtext'] = '%' . $_GET['text'] . '%';
  }

  try
  {
    $sql = $select . $from . $where;
    $s = $pdo->prepare($sql);
    $s->execute($placeholders);
  }
  catch (PDOException $e)
  {
    $error = 'Error fetching reviews.';
    include 'error.html.php';
    exit();
  }

  foreach ($s as $row)
  {
    $reviews[] = array('id' => $row['id'], 'text' => $row['reviewtext']);
  }

  include 'reviews.html.php';
  exit();
}

// Display search form
//include $_SERVER['DOCUMENT_ROOT'] . '/includes/db.inc.php';
// include $_SERVER['DOCUMENT_ROOT'] . '/php/Assessment1_Task6/includes/db.inc.php';

try
{
  $result = $pdo->query('SELECT id, name FROM author');
}
catch (PDOException $e)
{
  $error = 'Error fetching authors from database!';
  include 'error.html.php';
  exit();
}

foreach ($result as $row)
{
  $authors[] = array('id' => $row['id'], 'name' => $row['name']);
}

try
{
  $result = $pdo->query('SELECT id, name FROM category');
}
catch (PDOException $e)
{
  $error = 'Error fetching categories from database!';
  include 'error.html.php';
  exit();
}

foreach ($result as $row)
{
  $categories[] = array('id' => $row['id'], 'name' => $row['name']);
}

include 'searchform.html.php';
