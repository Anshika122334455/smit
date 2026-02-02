<?php
include 'includes/auth.php';
include 'includes/db.php';

$id = $_GET['id'];

$row = mysqli_fetch_assoc(
  mysqli_query($conn,"SELECT status FROM blogs WHERE id='$id'")
);

$newStatus = ($row['status'] == 'published') ? 'draft' : 'published';

mysqli_query($conn,"UPDATE blogs SET status='$newStatus' WHERE id='$id'");

header("Location: blog-list.php");
exit;
