<?php
include '../admin/includes/db.php';

/* Get slug from URL */
$slug = basename($_SERVER['REQUEST_URI'], '.php');

/* Fetch published blog */
$result = mysqli_query(
    $conn,
    "SELECT * FROM blogs WHERE slug='$slug' AND status='published'"
);

if(mysqli_num_rows($result) == 0){
    http_response_code(404);
    echo "Page not found";
    exit;
}

$blog = mysqli_fetch_assoc($result);

/* Fallbacks (safety) */
$metaTitle = !empty($blog['meta_title']) ? $blog['meta_title'] : $blog['title'];
$metaDesc  = !empty($blog['meta_description']) 
            ? $blog['meta_description'] 
            : substr(strip_tags($blog['content']), 0, 160);
?>
<!DOCTYPE html>
<html data-wf-page="grungy-id">

<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1" name="viewport" />

   <!-- SEO META (FROM CRM) -->
    <title><?php echo htmlspecialchars($metaTitle); ?></title>
    <meta name="description" content="<?php echo htmlspecialchars($metaDesc); ?>" />
    <meta name="robots" content="index, follow">

    <!-- Open Graph -->
    <meta property="og:title" content="<?php echo htmlspecialchars($metaTitle); ?>">
    <meta property="og:description" content="<?php echo htmlspecialchars($metaDesc); ?>">
    <?php if(!empty($blog['featured_image'])){ ?>
    <meta property="og:image" content="https://lyricalfever.com/admin/uploads/blog-images/<?php echo $blog['featured_image']; ?>">
    <?php } ?>
    <meta property="og:type" content="article">

    <link href="../css/normalize.css" rel="stylesheet" type="text/css" />
    <link href="../css/layout.css" rel="stylesheet" type="text/css" />
    <link href="../css/style.css" rel="stylesheet" type="text/css" />



    <link href="../images/favicon.png" rel="shortcut icon" type="image/x-icon" />
    <link href="../images/webclip.png" rel="apple-touch-icon" />
</head>


<body class="body">
    <div id="home" class="header">
        <div class="inner-header">

            <div class="top-bar">
                <div class="tob-bar-category-text">Tech</div>
                <div class="tech-cateogry-moving-section">
                    <div class="moving-tech-list-wrapper w-dyn-list">
                        <div role="list" class="moving-tech-list w-dyn-items">
                            <div role="listitem" class="w-dyn-item">
                                <a
                                    href="singleblog.php"
                                    class="moving-tech-item w-inline-block">
                                    <img src="../images/chat-centered-text.png" loading="lazy" width="20" alt="" class="comment-icon" />
                                    <div class="moving-tech-text">Tech Talk: Advancements in Science and Tech</div>
                                </a>
                            </div>
                            <div role="listitem" class="w-dyn-item">
                                <a
                                    href="singleblog.php"
                                    class="moving-tech-item w-inline-block">
                                    <img src="images/chat-centered-text.png" loading="lazy" width="20" alt="" class="comment-icon" />
                                    <div class="moving-tech-text">Tech Trends: Navigating the Digital Frontier</div>
                                </a>
                            </div>
                            <div role="listitem" class="w-dyn-item">
                                <a
                                    href="singleblog.php"
                                    class="moving-tech-item w-inline-block">
                                    <img src="images/chat-centered-text.png" loading="lazy" width="20" alt="" class="comment-icon" />
                                    <div class="moving-tech-text">Lab Diaries: Cutting-edge Scientific Discoveries</div>
                                </a>
                            </div>
                            <div role="listitem" class="w-dyn-item">
                                <a
                                    href="singleblog.php"
                                    class="moving-tech-item w-inline-block">
                                    <img src="images/chat-centered-text.png" loading="lazy" width="20" alt="" class="comment-icon" />
                                    <div class="moving-tech-text">Future Forward: Technology's Evolution Unveiled</div>
                                </a>
                            </div>
                            <div role="listitem" class="w-dyn-item">
                                <a
                                    href="singleblog.php"
                                    class="moving-tech-item w-inline-block">
                                    <img src="images/chat-centered-text.png" loading="lazy" width="20" alt="" class="comment-icon" />
                                    <div class="moving-tech-text">Cosmic Curiosities: Exploring the Universe</div>
                                </a>
                            </div>
                            <div role="listitem" class="w-dyn-item">
                                <a
                                    href="singleblog.php"
                                    class="moving-tech-item w-inline-block">
                                    <img src="images/chat-centered-text.png" loading="lazy" width="20" alt="" class="comment-icon" />
                                    <div class="moving-tech-text">Bio Wonders: Nature's Marvels Explored</div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div data-animation="default" data-collapse="medium" data-duration="400" data-easing="ease" data-easing2="ease" role="banner" class="navbar w-nav">
                <div class="inner-navbar">
                    <a href="https://lyricalfever.com/index.php" aria-current="page" class="logo w-nav-brand w--current">
                        <img
                            src="../images/grungy-logo.png"
                            width="200"
                            alt=""
                            class="logo-img" />
                    </a>
                    <nav role="navigation" class="nav-menu w-nav-menu">
                        <a href="https://lyricalfever.com/index.php" aria-current="page" class="menu-item w-nav-link w--current">Home</a>
                        <a href="https://lyricalfever.com/about.php" class="menu-item w-nav-link">About</a>
                        <a href="https://lyricalfever.com/categories.php" class="menu-item w-nav-link">categories</a>
                        <a href="https://lyricalfever.com/posts.php" class="menu-item w-nav-link">posts</a>
                        <a href="https://lyricalfever.com/contact.php" class="menu-item w-nav-link">Contact</a>
                    </nav>
                    <div class="menu-button w-nav-button">
                        <div class="icon w-icon-nav-menu"></div>
                    </div>

                </div>
            </div>
        </div>
    </div>

 <section class="single-post-section">
    <div class="w-layout-blockcontainer main-container w-container">
        <div class="single-post-inner">
            <div id="w-node-_73ec5895-66d0-8dd3-4268-43c43eaa1113-dc78bc32" class="single-post-img-wrapper">
                <?php if(!empty($blog['featured_image'])){ ?>
                    <img
                        src="/admin/uploads/blog-images/<?php echo $blog['featured_image']; ?>"
                        alt="<?php echo htmlspecialchars($blog['title']); ?>"
                        class="single-post-img" />
                <?php } ?>
            </div>
            <div id="w-node-_0e8cb343-e5b9-dc07-5646-e092817aa67f-dc78bc32" class="single-post-content">
                <div class="top-blog-time-box">
                    <div class="post-time-text">
                        <?php echo date('F d, Y', strtotime($blog['blog_date'])); ?>
                    </div>
                    <?php if(!empty($blog['tags'])){ ?>
                        <div class="post-time-text">
                            <?php echo htmlspecialchars($blog['tags']); ?>
                        </div>
                    <?php } ?>
                </div>
                <h2 class="single-title">
                    <?php echo htmlspecialchars($blog['title']); ?>
                </h2>
                <img src="images/post-dec.png" loading="lazy" alt="" />
                <div class="single-rich w-richtext">
                    <?php echo $blog['content']; ?>
                </div>
            </div>
        </div>
    </div>
</section>






    <div class="footer">
        <div class="w-layout-blockcontainer main-container w-container">
            <div class="inner-footer">
                <div id="w-node-_309588e7-d5f0-871f-0289-459e178d6ab7-178d6ab4" data-w-id="309588e7-d5f0-871f-0289-459e178d6ab7" class="social-footer" style="opacity: 0;">
                    <div class="social-inner">
                        <a id="w-node-_309588e7-d5f0-871f-0289-459e178d6ab9-178d6ab4" href="http://www.themeforest.com" target="_blank" class="social-item w-inline-block">
                            <img src="images/fb.png" loading="lazy" width="48" alt="" class="social-icon" />
                            <div class="social-text">facebook</div>
                        </a>
                        <a id="w-node-_309588e7-d5f0-871f-0289-459e178d6abd-178d6ab4" href="http://www.themeforest.com" target="_blank" class="social-item w-inline-block">
                            <img src="images/x.png" loading="lazy" width="48" alt="" class="social-icon" />
                            <div class="social-text">twitter</div>
                        </a>
                        <a id="w-node-_309588e7-d5f0-871f-0289-459e178d6ac1-178d6ab4" href="http://www.themeforest.com" target="_blank" class="social-item w-inline-block">
                            <img src="images/ins.png" loading="lazy" width="48" alt="" class="social-icon" />
                            <div class="social-text">instagram</div>
                        </a>
                        <a id="w-node-_309588e7-d5f0-871f-0289-459e178d6ac5-178d6ab4" href="http://www.themeforest.com" target="_blank" class="social-item w-inline-block">
                            <img src="images/yt.png" loading="lazy" width="48" alt="" class="social-icon" />
                            <div class="social-text">yotube</div>
                        </a>
                    </div>
                </div>
                <div id="w-node-_309588e7-d5f0-871f-0289-459e178d6ac9-178d6ab4" data-w-id="309588e7-d5f0-871f-0289-459e178d6ac9" class="tags-footer" style="opacity: 0;">
                    <div class="tags-footer-inner">
                        <a href="/categories" class="tags-item w-inline-block">
                            <div>#travel</div>
                        </a><a href="/" aria-current="page" class="tags-item w-inline-block w--current">
                            <div>#sports</div>
                        </a>
                        <a href="/" aria-current="page" class="tags-item w-inline-block w--current">
                            <div>#coding</div>
                        </a><a href="/" aria-current="page" class="tags-item w-inline-block w--current">
                            <div>#food</div>
                        </a>
                        <a href="/" aria-current="page" class="tags-item w-inline-block w--current">
                            <div>#marketing</div>
                        </a><a href="/" aria-current="page" class="tags-item w-inline-block w--current">
                            <div>#seo</div>
                        </a>
                        <a href="/" aria-current="page" class="tags-item w-inline-block w--current">
                            <div>#design</div>
                        </a><a href="/" aria-current="page" class="tags-item w-inline-block w--current">
                            <div>#science</div>
                        </a>
                        <a href="/" aria-current="page" class="tags-item w-inline-block w--current">
                            <div>#books</div>
                        </a><a href="/" aria-current="page" class="tags-item w-inline-block w--current">
                            <div>#videos</div>
                        </a>
                        <a href="/" aria-current="page" class="tags-item w-inline-block w--current">
                            <div>#photography</div>
                        </a><a href="/" aria-current="page" class="tags-item w-inline-block w--current">
                            <div>#health</div>
                        </a>
                    </div>
                </div>
            </div>
            <div data-w-id="309588e7-d5f0-871f-0289-459e178d6aef" class="copyright" style="opacity: 0;">
                <div class="copyright-text">
                    Designed by <a href="https://themeforest.net/user/max-themes" target="_blank" class="copyright-text">MaxThemes</a> - Powered by
                    <a href="http://www.themeforest.com" target="_blank" class="copyright-text">Wordpress</a>
                </div>
                <div class="copyright-rightside">
                    <a href="#" class="copyright-text license-text">License</a>
                    <a href="#home" class="backtop w-inline-block"><img src="../images/backtop.png" loading="lazy" width="14" alt="" class="backtop-image" /></a>
                </div>
            </div>
        </div>
    </div>


    <script src="../js/webfont.js" type="text/javascript"></script>
    <script src="../js/jquery.min.js" type="text/javascript"></script>
    <script src="../js/plugins.js" type="text/javascript"></script>

</body>

</html>