<!DOCTYPE html>
<html data-wf-page="grungy-id" >
    <head>
        <meta charset="utf-8" />
        <meta content="width=device-width, initial-scale=1" name="viewport" />

        <title>Grungy - Blog Website Template</title>

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
                                    <img src="../images/chat-centered-text.png" loading="lazy" width="20" alt="" class="comment-icon" />
                                    <div class="moving-tech-text">Tech Trends: Navigating the Digital Frontier</div>
                                </a>
                            </div>
                            <div role="listitem" class="w-dyn-item">
                                <a
                                    href="singleblog.php"
                                    class="moving-tech-item w-inline-block">
                                    <img src="../images/chat-centered-text.png" loading="lazy" width="20" alt="" class="comment-icon" />
                                    <div class="moving-tech-text">Lab Diaries: Cutting-edge Scientific Discoveries</div>
                                </a>
                            </div>
                            <div role="listitem" class="w-dyn-item">
                                <a
                                    href="singleblog.php"
                                    class="moving-tech-item w-inline-block">
                                    <img src="../images/chat-centered-text.png" loading="lazy" width="20" alt="" class="comment-icon" />
                                    <div class="moving-tech-text">Future Forward: Technology's Evolution Unveiled</div>
                                </a>
                            </div>
                            <div role="listitem" class="w-dyn-item">
                                <a
                                    href="singleblog.php"
                                    class="moving-tech-item w-inline-block">
                                    <img src="../images/chat-centered-text.png" loading="lazy" width="20" alt="" class="comment-icon" />
                                    <div class="moving-tech-text">Cosmic Curiosities: Exploring the Universe</div>
                                </a>
                            </div>
                            <div role="listitem" class="w-dyn-item">
                                <a
                                    href="singleblog.php"
                                    class="moving-tech-item w-inline-block">
                                    <img src="../images/chat-centered-text.png" loading="lazy" width="20" alt="" class="comment-icon" />
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

<section class="page-header">
    <div class="container">
        
    </div><!-- /.container -->
    
    <div class="page-header__shape-three"></div><!-- /.page-header__shape-three -->
    <div class="page-header__shape-four"></div><!-- /.page-header__shape-four -->
</section><!-- /.page-header -->

<section class="top-blog-section">
    <div class="w-layout-blockcontainer main-container w-container">
        <?php
        include '../admin/includes/db.php';

        // Pagination settings
        $blogs_per_page = 9;
        $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
        $page = max($page, 1); // Ensure page is at least 1
        $offset = ($page - 1) * $blogs_per_page;

        // Get total count of published blogs
        $count_query = mysqli_query(
            $conn,
            "SELECT COUNT(*) as total FROM blogs WHERE status='published'"
        );
        $count_result = mysqli_fetch_assoc($count_query);
        $total_blogs = $count_result['total'];
        $total_pages = ceil($total_blogs / $blogs_per_page);

        // Get blogs for current page
        $blogs = mysqli_query(
            $conn,
            "SELECT * FROM blogs WHERE status='published' ORDER BY blog_date DESC LIMIT $offset, $blogs_per_page"
        );
        ?>

        <div class="top-blog-list-wrapper w-dyn-list">
            <div role="list" class="top-blog-list w-dyn-items">
                <?php while($blog = mysqli_fetch_assoc($blogs)) { ?>
                <div role="listitem" class="w-dyn-item">
                    <div data-w-id="1b3f3cd6-09ce-1f4e-e361-71a9f11e93a8" class="top-blog-item">
                        <a href="/blogs/<?php echo $blog['slug']; ?>.php" class="top-blog-img-wrapper w-inline-block">
                            <img
                                src="/admin/uploads/blog-images/<?php echo $blog['featured_image']; ?>"
                                alt="<?php echo htmlspecialchars($blog['title']); ?>"
                                class="top-blog-img"
                            />
                            <img src="images/post-dec.png" loading="lazy" width="143" alt="" class="tob-blog-line" />
                        </a>
                        <div class="top-blog-content">
                            <h2 class="top-blog-title">
                                <?php echo htmlspecialchars($blog['title']); ?>
                            </h2>
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
                            <div class="top-blog-read-box">
                                <img src="images/snake-arrow.png" loading="lazy" width="55" alt="" class="top-blog-left-arrow" />
                                <a href="/blogs/<?php echo $blog['slug']; ?>.php" class="read-more w-inline-block">
                                    <div class="read-more-text">Read post</div>
                                    <div class="arrow">
                                        <img src="../images/post-arr.png" loading="lazy" width="10" alt="" />
                                    </div>
                                </a>
                            </div>
                        </div>
                        <a href="/blogs/<?php echo $blog['slug']; ?>.php" class="top-blog-category">
                            <?php echo !empty($blog['tags']) ? htmlspecialchars($blog['tags']) : 'Blog'; ?>
                        </a>
                    </div>
                </div>
                <?php } ?>
            </div>
        </div>

        <!-- Pagination -->
        <?php if($total_pages > 1) { ?>
        <div class="pagination-wrapper">
            <ul class="pagination">
                <!-- Previous Button -->
                <li class="<?php echo ($page <= 1) ? 'disabled' : ''; ?>">
                    <?php if($page > 1) { ?>
                        <a href="?page=<?php echo $page - 1; ?>">
                            <i class="fas fa-chevron-left"></i>
                        </a>
                    <?php } else { ?>
                        <span><i class="fas fa-chevron-left"></i></span>
                    <?php } ?>
                </li>

                <!-- Page Numbers -->
                <?php
                // Show max 5 page numbers
                $start_page = max(1, $page - 2);
                $end_page = min($total_pages, $page + 2);

                // Show first page if not in range
                if($start_page > 1) {
                    echo '<li><a href="?page=1">1</a></li>';
                    if($start_page > 2) {
                        echo '<li class="disabled"><span>...</span></li>';
                    }
                }

                // Show page numbers
                for($i = $start_page; $i <= $end_page; $i++) {
                    if($i == $page) {
                        echo '<li class="active"><span>' . $i . '</span></li>';
                    } else {
                        echo '<li><a href="?page=' . $i . '">' . $i . '</a></li>';
                    }
                }

                // Show last page if not in range
                if($end_page < $total_pages) {
                    if($end_page < $total_pages - 1) {
                        echo '<li class="disabled"><span>...</span></li>';
                    }
                    echo '<li><a href="?page=' . $total_pages . '">' . $total_pages . '</a></li>';
                }
                ?>

                <!-- Next Button -->
                <li class="<?php echo ($page >= $total_pages) ? 'disabled' : ''; ?>">
                    <?php if($page < $total_pages) { ?>
                        <a href="?page=<?php echo $page + 1; ?>">
                            <i class="fas fa-chevron-right"></i>
                        </a>
                    <?php } else { ?>
                        <span><i class="fas fa-chevron-right"></i></span>
                    <?php } ?>
                </li>
            </ul>
        </div>
        <?php } ?>
        <!-- End Pagination -->

    </div>
</section>

<style>
/* Fixed Image Size for Blog Cards */
.top-blog-img-wrapper {
    position: relative;
    width: 100%;
    height: 280px;
    overflow: hidden;
    display: block;
}

.top-blog-img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    object-position: center;
}

/* Pagination Styles */
.pagination-wrapper {
    display: flex;
    justify-content: center;
    margin-top: 4rem;
    margin-bottom: 2rem;
}

.pagination {
    display: flex;
    gap: 0.5rem;
    list-style: none;
    padding: 0;
    margin: 0;
}

.pagination li {
    display: inline-block;
}

.pagination a,
.pagination span {
    display: flex;
    align-items: center;
    justify-content: center;
    min-width: 45px;
    height: 45px;
    padding: 0 15px;
    border-radius: 0.6rem;
    font-weight: 600;
    font-size: 0.95rem;
    text-decoration: none;
    transition: all 0.35s cubic-bezier(0.4, 0, 0.2, 1);
    border: 2px solid #e2e8f0;
    color: #1e293b;
    background: #ffffff;
}

.pagination a:hover {
    background: #ffde00;
    color: #ffffff;
    border-color: #ffde00;
    transform: translateY(-2px);
    box-shadow: 0 6px 10px rgba(0,0,0,0.12);
}

.pagination .active span {
    background: #ffde00;
    color: #ffffff;
    border-color: #ffde00;
    box-shadow: 0 6px 10px rgba(0,0,0,0.12);
}

.pagination .disabled span {
    opacity: 0.4;
    cursor: not-allowed;
    background: #f1f5f9;
}

.pagination .disabled:hover span {
    transform: none;
    box-shadow: none;
    background: #f1f5f9;
    color: #1e293b;
    border-color: #e2e8f0;
}

/* Responsive */
@media (max-width: 768px) {
    .top-blog-img-wrapper {
        height: 220px;
    }
    
    .pagination a,
    .pagination span {
        min-width: 40px;
        height: 40px;
        font-size: 0.85rem;
        padding: 0 10px;
    }

    .pagination {
        gap: 0.35rem;
    }
}
</style>












 


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
