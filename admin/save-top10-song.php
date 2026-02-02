<?php
include 'includes/auth.php';
include 'includes/db.php';

if(isset($_POST['add_song'])){

$week_date = $_POST['week_date'];
$rank = $_POST['rank'];
$singer_name = $_POST['singer_name'];
$song_name = $_POST['song_name'];
$spotify_link = $_POST['spotify_link'];

mysqli_query($conn,"\nINSERT INTO top_10_songs \n(week_date, rank, singer_name, song_name, spotify_link)\nVALUES\n('$week_date','$rank','$singer_name','$song_name','$spotify_link')\n");

header("Location: top10-list.php");
exit;
}
?>