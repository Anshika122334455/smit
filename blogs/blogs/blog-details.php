<?php
include '../admin/includes/db.php';
$slug = $_GET['slug'];

$q = mysqli_query($conn,"SELECT * FROM blogs WHERE slug='$slug'");
$blog = mysqli_fetch_assoc($q);
?>
<!DOCTYPE html>
<html>
<head>
<title><?php echo $blog['meta_title']; ?></title>
<meta name="description" content="<?php echo $blog['meta_description']; ?>">
</head>
<body>

<h1><?php echo $blog['title']; ?></h1>

<img src="../uploads/blog-images/<?php echo $blog['featured_image']; ?>" width="400">

<div>
<?php echo $blog['content']; ?>
</div>

</body>
</html>
