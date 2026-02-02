<?php
// Database connection
$host = "localhost";
$dbname = "u614646620_lyrical_db";
$username = "u614646620_lyrical_user";
$password = "Aezakmi22@@";
$conn = mysqli_connect($host, $username, $password, $dbname);

if (!$conn) {
    die("Database connection failed: " . mysqli_connect_error());
}

// Fetch published blogs from database
$query = "SELECT * FROM blogs WHERE status = 'published' ORDER BY blog_date DESC";
$result = mysqli_query($conn, $query);

if (!$result) {
    die("Query failed: " . mysqli_error($conn));
}
?>
<!DOCTYPE html>
<html data-wf-page="grungy-id">
    <head>
        <meta charset="utf-8" />
        <meta content="width=device-width, initial-scale=1" name="viewport" />

        <title>Grungy - Blog Website Template</title>

        <link href="css/normalize.css" rel="stylesheet" type="text/css" />
        <link href="css/layout.css" rel="stylesheet" type="text/css" />
        <link href="css/style.css" rel="stylesheet" type="text/css" />

        <link href="images/favicon.png" rel="shortcut icon" type="image/x-icon" />
        <link href="images/webclip.png" rel="apple-touch-icon" />
    </head>

    <body class="body">
         <?php include 'header.php'; ?>

        <section class="top-blog-section">
            <div class="w-layout-blockcontainer main-container w-container">
                <div class="top-blog-list-wrapper w-dyn-list">
                    <div role="list" class="top-blog-list w-dyn-items">
                        
                        <?php
                        // Check if there are any blogs
                        if (mysqli_num_rows($result) > 0) {
                            // Loop through each blog post
                            while ($blog = mysqli_fetch_assoc($result)) {
                                // Extract blog data
                                $id = htmlspecialchars($blog['id']);
                                $title = htmlspecialchars($blog['title']);
                                $slug = htmlspecialchars($blog['slug']);
                                $blog_date = date('F j, Y', strtotime($blog['blog_date']));
                                $content = $blog['content'];
                                $featured_image = htmlspecialchars($blog['featured_image']);
                                $category = htmlspecialchars($blog['category'] ?? 'General');
                                
                                // Calculate read time (rough estimate: 200 words per minute)
                                $word_count = str_word_count(strip_tags($content));
                                $read_time = max(1, ceil($word_count / 200));
                                
                                // Set image path (adjust this based on your upload directory)
                                $image_path = !empty($featured_image) ? 'uploads/' . $featured_image : 'images/default-blog.jpg';
                                
                                // Generate blog URL
                                $blog_url = 'singleblog.php?slug=' . urlencode($slug);
                        ?>
                        
                        <div role="listitem" class="w-dyn-item">
                            <div
                                data-w-id="1b3f3cd6-09ce-1f4e-e361-71a9f11e93a8"
                                class="top-blog-item"
                            >
                                <a href="<?php echo $blog_url; ?>" class="top-blog-img-wrapper w-inline-block">
                                    <img
                                        src="<?php echo $image_path; ?>"
                                        alt="<?php echo $title; ?>"
                                        class="top-blog-img"
                                    />
                                    <img src="images/post-dec.png" loading="lazy" width="143" alt="" class="tob-blog-line" />
                                </a>
                                <div class="top-blog-content">
                                    <h2 class="top-blog-title"><?php echo $title; ?></h2>
                                    <div class="top-blog-time-box">
                                        <div class="post-time-text"><?php echo $blog_date; ?></div>
                                        <div class="post-time-text"><?php echo $read_time; ?> min Read</div>
                                    </div>
                                    <div class="top-blog-read-box">
                                        <img src="images/snake-arrow.png" loading="lazy" width="55" alt="" class="top-blog-left-arrow" />
                                        <a href="<?php echo $blog_url; ?>" class="read-more w-inline-block">
                                            <div class="read-more-text">Read post</div>
                                            <div class="arrow">
                                                <img src="images/post-arr.png" loading="lazy" width="10" alt="" />
                                            </div>
                                        </a>
                                    </div>
                                </div>
                                <a href="<?php echo $blog_url; ?>" class="top-blog-category"><?php echo $category; ?></a>
                            </div>
                        </div>

                        <?php
                            } // End while loop
                        } else {
                            // No blogs found message
                            echo '<div class="no-blogs-message" style="text-align: center; padding: 50px;">
                                    <h3>No blog posts found.</h3>
                                    <p>Check back soon for new content!</p>
                                  </div>';
                        }
                        
                        // Close database connection
                        mysqli_close($conn);
                        ?>
                        
                    </div>
                </div>
            </div>
        </section>

        <section class="newsletter-section">
            <div class="w-layout-blockcontainer main-container w-container">
                <div data-w-id="1ce5df7d-96f1-af6d-2ed8-6dc54341fec5" class="inner-newsletter">
                    <img src="images/newspaper_icon.png" loading="lazy" width="80" alt="" class="newsletter-icon" />
                    <h2 class="newsletter-title">NEWSLETTER</h2>
                    <img src="images/snake-arrow.png" loading="lazy" width="90" alt="" class="top-blog-left-arrow subscribe-arrow" />
                    <div class="newsletter-text">
                        Stay ahead of the curve with our exclusive <br />
                        daily newsletter directly in your inbox!
                    </div>
                    <div class="subscribe-form-block w-form">
                        <form action="#" method="post" class="subscribe-form">
                            <input class="subscribe-field w-input" maxlength="256" name="email" data-name="Email" placeholder="Your Email" type="email" id="email" required="" />
                            <input type="submit" class="submit-button w-button" value="Subscribe" />
                        </form>
                    </div>
                </div>
            </div>
        </section>

         <?php include 'footer.php'; ?>

        <script src="js/webfont.js" type="text/javascript"></script>
        <script src="js/jquery.min.js" type="text/javascript"></script>
        <script src="js/plugins.js" type="text/javascript"></script>

    </body>
</html>