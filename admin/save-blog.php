<?php
include 'includes/auth.php';
include 'includes/db.php';

if(isset($_POST['publish'])){

$title = $_POST['title'];
$slug = $_POST['slug'];
$blog_date = $_POST['blog_date'];
$content = $_POST['content'];
$meta_title = $_POST['meta_title'];
$meta_description = $_POST['meta_description'];
$status = $_POST['status'];

$imageName = '';

if (!empty($_FILES['image']['name'])) {

    $uploadDir = __DIR__ . '/uploads/blog-images/';

    // create folder if not exists
    if (!is_dir($uploadDir)) {
        mkdir($uploadDir, 0755, true);
    }

    $imageName = time() . '_' . basename($_FILES['image']['name']);

    move_uploaded_file(
        $_FILES['image']['tmp_name'],
        $uploadDir . $imageName
    );
}


mysqli_query($conn,"
INSERT INTO blogs 
(title, slug, content, blog_date, featured_image, meta_title, meta_description, status)
VALUES
('$title','$slug','$content','$blog_date','$imageName','$meta_title','$meta_description','$status')
");

header("Location: blog-list.php");
exit;
}
