<?php
header("Content-Type: application/xml; charset=utf-8");

include __DIR__ . "/admin/includes/db.php";

$baseUrl = "https://lyricalfever.com";

echo '<?xml version="1.0" encoding="UTF-8"?>';
echo '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">';

/* ===============================
   PART 1: WEBSITE PAGES
   =============================== */

$excludeFiles = [
    "index.php",
    "sitemap.xml.php",
    "robots.txt",
    "header.php",
    "footer.php",
    "config.php"
];

$files = glob(__DIR__ . "/*.php");

foreach ($files as $file) {
    $fileName = basename($file);

    if (in_array($fileName, $excludeFiles)) {
        continue;
    }

    $pageUrl = $baseUrl . "/" . str_replace(".php", "", $fileName);

    echo "<url>";
    echo "<loc>$pageUrl</loc>";
    echo "<priority>0.8</priority>";
    echo "</url>";
}

/* ===============================
   PART 2: BLOG PAGES
   =============================== */

$blogs = mysqli_query(
    $conn,
    "SELECT slug FROM blogs WHERE status='published'"
);

while ($blog = mysqli_fetch_assoc($blogs)) {
    $blogUrl = $baseUrl . "/blogs/" . $blog['slug'];

    echo "<url>";
    echo "<loc>$blogUrl</loc>";
    echo "<priority>0.6</priority>";
    echo "</url>";
}

echo "</urlset>";
