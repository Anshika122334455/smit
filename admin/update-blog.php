<?php
include 'includes/auth.php';
include 'includes/db.php';

if (!isset($_POST['id'])) {
    header("Location: blog-list.php");
    exit;
}

$id = $_POST['id'];
$title = $_POST['title'];
$slug = $_POST['slug'];
$blog_date = $_POST['blog_date'];
$content = $_POST['content'];
$meta_title = $_POST['meta_title'];
$meta_description = $_POST['meta_description'];
$status = $_POST['status'];

$imageName = null;

if (!empty($_FILES['image']['name'])) {
    $imageName = time() . '_' . $_FILES['image']['name'];
    move_uploaded_file(
        $_FILES['image']['tmp_name'],
        "uploads/blog-images/" . $imageName
    );
}

if ($imageName) {
    $stmt = $conn->prepare("
        UPDATE blogs SET
        title=?,
        slug=?,
        blog_date=?,
        content=?,
        meta_title=?,
        meta_description=?,
        status=?,
        featured_image=?
        WHERE id=?
    ");
    $stmt->bind_param(
        "ssssssssi",
        $title,
        $slug,
        $blog_date,
        $content,
        $meta_title,
        $meta_description,
        $status,
        $imageName,
        $id
    );
} else {
    $stmt = $conn->prepare("
        UPDATE blogs SET
        title=?,
        slug=?,
        blog_date=?,
        content=?,
        meta_title=?,
        meta_description=?,
        status=?
        WHERE id=?
    ");
    $stmt->bind_param(
        "sssssssi",
        $title,
        $slug,
        $blog_date,
        $content,
        $meta_title,
        $meta_description,
        $status,
        $id
    );
}

$stmt->execute();
$stmt->close();

header("Location: blog-list.php");
exit;
