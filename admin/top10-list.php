<?php include 'includes/auth.php'; ?>
<?php include 'includes/db.php'; ?>
<?php include 'includes/header.php'; ?>
<?php include 'includes/topbar.php'; ?>
<?php include 'includes/sidebar.php'; ?>

<?php
$songs = mysqli_query($conn,"SELECT * FROM top_10_songs ORDER BY week_date DESC, rank ASC");
?>

<div class="content">

<h2 class="mb-4">Top 10 Weekly Songs List</h2>

<div class="card">
<a href="add-top10-songs.php" class="btn btn-primary mb-3">Add New Song</a>

<table class="table align-middle">
<thead>
<tr>
  <th>Week Date</th>
  <th>Rank</th>
  <th>Singer</th>
  <th>Song Name</th>
  <th>Spotify Link</th>
  <th>Action</th>
</tr>
</thead>
<tbody>

<?php while($row = mysqli_fetch_assoc($songs)) { ?>
<tr>

  <td><?php echo date('d M Y', strtotime($row['week_date'])); ?></td>

  <td><strong><?php echo $row['rank']; ?></strong></td>

  <td><?php echo htmlspecialchars($row['singer_name']); ?></td>

  <td><?php echo htmlspecialchars($row['song_name']); ?></td>

  <td>
    <a href="<?php echo htmlspecialchars($row['spotify_link']); ?>" target="_blank" class="btn btn-sm btn-success">
      Open Spotify
    </a>
  </td>

  <td style="white-space:nowrap">

    <!-- EDIT -->
    <a 
      href="edit-top10-song.php?id=<?php echo $row['id']; ?>" 
      class="btn btn-sm btn-outline-primary"
    >
      Edit
    </a>

    <!-- DELETE -->
    <a 
      href="delete-top10-song.php?id=<?php echo $row['id']; ?>" 
      class="btn btn-sm btn-outline-danger"
      onclick="return confirm('Are you sure you want to delete this song?');"
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