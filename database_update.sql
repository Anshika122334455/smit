-- Table for Top 10 Weekly Songs
CREATE TABLE `top_10_songs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `week_date` date NOT NULL,
  `rank` int(11) NOT NULL,
  `singer_name` varchar(255) NOT NULL,
  `song_name` varchar(255) NOT NULL,
  `spotify_link` varchar(500) NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;