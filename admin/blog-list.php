<?php include 'includes/auth.php'; ?>
<?php include 'includes/db.php'; ?>
<?php include 'includes/header.php'; ?>
<?php include 'includes/topbar.php'; ?>
<?php include 'includes/sidebar.php'; ?>

<?php
$blogs = mysqli_query($conn,"SELECT * FROM blogs ORDER BY id DESC");
?>

<div class="content">

<h2 class="mb-4">Blog List</h2>

<div class="card">
<table class="table align-middle">
<thead>
<tr>
  <th>Title</th>
  <th>Date</th>
  <th>Status</th>
  <th>Action</th>
</tr>
</thead>
<tbody>

<?php while($row = mysqli_fetch_assoc($blogs)) { ?>
<tr>

  <td><?php echo htmlspecialchars($row['title']); ?></td>

  <td><?php echo date('d M Y', strtotime($row['blog_date'])); ?></td>

  <td>
    <?php if($row['status'] == 'published'){ ?>
      <span class="badge bg-success">Published</span>
    <?php } else { ?>
      <span class="badge bg-secondary">Draft</span>
    <?php } ?>
  </td>

  <td style="white-space:nowrap">

    <!-- OPEN BLOG -->
    <?php if($row['status'] == 'published'){ ?>
      <a 
        href="/blogs/<?php echo $row['slug']; ?>.php" 
        target="_blank"
        class="btn btn-sm btn-outline-success"
      >
        Open
      </a>
    <?php } ?>

    <!-- EDIT -->
    <a 
      href="edit-blog.php?id=<?php echo $row['id']; ?>" 
      class="btn btn-sm btn-outline-primary"
    >
      Edit
    </a>

    <!-- TOGGLE -->
    <a 
      href="toggle-status.php?id=<?php echo $row['id']; ?>" 
      class="btn btn-sm btn-outline-dark"
    >
      Toggle
    </a>

    <!-- DELETE -->
    <a 
      href="delete-blog.php?id=<?php echo $row['id']; ?>" 
      class="btn btn-sm btn-outline-danger"
      onclick="return confirm('Are you sure you want to delete this blog?');"
    >
      Delete
    </a>

  </td>

</tr>
<?php } ?>

</tbody>
</table>
</div>

</div>

</body>
</html>
