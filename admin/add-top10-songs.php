<?php include 'includes/auth.php'; ?>
<?php include 'includes/header.php'; ?>
<?php include 'includes/topbar.php'; ?>
<?php include 'includes/sidebar.php'; ?>
<?php include 'includes/db.php'; ?>

<div class="content">

<h2 class="mb-4">Add Top 10 Weekly Song</h2>

<div class="card">
<form action="save-top10-song.php" method="post">

<div class="mb-3">
<label class="form-label">Week Date</label>
<input type="date" name="week_date" class="form-control" required>
<small class="text-muted">Select the week this chart represents</small>
</div>

<div class="mb-3">
<label class="form-label">Rank (1-10)</label>
<input type="number" name="rank" class="form-control" min="1" max="10" required>
</div>

<div class="mb-3">
<label class="form-label">Singer Name</label>
<input type="text" name="singer_name" class="form-control" required>
</div>

<div class="mb-3">
<label class="form-label">Song Name</label>
<input type="text" name="song_name" class="form-control" required>
</div>

<div class="mb-3">
<label class="form-label">Spotify Link</label>
<input type="url" name="spotify_link" class="form-control" placeholder="https://open.spotify.com/track/..." required>
</div>

<button type="submit" name="add_song" class="btn btn-primary">
Add Song
</button>

<a href="top10-list.php" class="btn btn-outline-secondary">View All Songs</a>

</form>
</div>

</div>

</body>
</html>