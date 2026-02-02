<!DOCTYPE html>
<html data-wf-page="grungy-id">

<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1" name="viewport" />

    <title>Grungy - Blog HTML Website Template</title>

    <link href="css/normalize.css" rel="stylesheet" type="text/css" />
    <link href="css/layout.css" rel="stylesheet" type="text/css" />
    <link href="css/style.css" rel="stylesheet" type="text/css" />



    <link href="images/favicon.png" rel="shortcut icon" type="image/x-icon" />
    <link href="images/webclip.png" rel="apple-touch-icon" />
</head>


<body class="body">
    <?php include 'header.php'; ?>


    <section class="about-section">
        <div class="w-layout-blockcontainer main-container w-container">
            <div class="inner-about">
                <img
                    src="images/about-img.jpg"
                    alt=""
                    class="about-img" />
                <div class="about-content">
                    <h2 class="about-title">About Us</h2>
                    <div class="about-span">Something About Us</div>
                    <p class="about-paragraph">
                        A passionate and dedicated environmentalist, Alex devotes his energy and expertise to illuminating the pressing ecological challenges facing our planet today. Through his thought-provoking articles and
                        impassioned advocacy, he not only raises awareness but also sparks crucial conversations about the urgent need for sustainability practices.
                    </p>
                    <blockquote class="about-quote">In the tapestry of life, every thread counts. Let us weave together a future where sustainability is not just a choice, but a way of life.</blockquote>
                    <p class="about-paragraph">
                        With a keen eye for detail and a deep understanding of environmental science, Alex delves into complex issues with clarity and precision, offering not just theoretical solutions but also practical insights that
                        empower individuals and communities to take meaningful action. His unwavering commitment to a greener future serves as a beacon of hope in an increasingly environmentally conscious world, inspiring others to join
                        him in safeguarding the health and vitality of our precious ecosystems for generations to come.
                    </p>
                </div>
            </div>
        </div>
    </section>
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    <section class="page-header">
    <div class="container">
        
    </div><!-- /.container -->
    
    <div class="page-header__shape-three"></div><!-- /.page-header__shape-three -->
    <div class="page-header__shape-four"></div><!-- /.page-header__shape-four -->
</section><!-- /.page-header -->

<section class="top-blog-section">
    <div class="w-layout-blockcontainer main-container w-container">
        <?php
        include 'admin/includes/db.php';

        // Get only the 3 most recent published blogs
        $blogs = mysqli_query(
            $conn,
            "SELECT * FROM blogs WHERE status='published' ORDER BY blog_date DESC LIMIT 3"
        );
        ?>

        <div class="top-blog-list-wrapper w-dyn-list">
            <div role="list" class="top-blog-list w-dyn-items">
                <?php while($blog = mysqli_fetch_assoc($blogs)) { ?>
                <div role="listitem" class="w-dyn-item">
                    <div data-w-id="1b3f3cd6-09ce-1f4e-e361-71a9f11e93a8" class="top-blog-item">
                        <a href="blogs/blogs/<?php echo $blog['slug']; ?>.php" class="top-blog-img-wrapper w-inline-block">
                            <img
                                src="admin/uploads/blog-images/<?php echo $blog['featured_image']; ?>"
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
                                <a href="blogs/<?php echo $blog['slug']; ?>.php" class="read-more w-inline-block">
                                    <div class="read-more-text">Read post</div>
                                    <div class="arrow">
                                        <img src="/images/post-arr.png" loading="lazy" width="10" alt="" />
                                    </div>
                                </a>
                            </div>
                        </div>
                        <a href="blogs/blogs/<?php echo $blog['slug']; ?>.php" class="top-blog-category">
                            <?php echo !empty($blog['tags']) ? htmlspecialchars($blog['tags']) : 'Blog'; ?>
                        </a>
                    </div>
                </div>
                <?php } ?>
            </div>
        </div>

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

/* Responsive */
@media (max-width: 768px) {
    .top-blog-img-wrapper {
        height: 220px;
    }
}
</style>
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
   

    <section class="education-section">
        <div class="w-layout-blockcontainer main-container w-container">
            <div data-w-id="c42c21f0-cd9f-3310-b8fb-ca8c90f8766c" style="opacity: 0;" class="main-title">
                <h2 class="title-heading">Education</h2>
                <img src="images/post-module-title-dec.png" loading="lazy" alt="" class="title-icon" />
            </div>
            <div class="education-wrapper w-dyn-list">
                <div role="list" class="education-list w-dyn-items">
                    <div role="listitem" class="w-dyn-item">
                        <div data-w-id="150c21cc-d5f7-f827-ba08-0e66450754ce" style="opacity: 0;" class="education-item">
                            <a href="singleblog.html" class="education-img-wrapper w-inline-block">
                                <img
                                    src="images/post1.jpg"
                                    alt=""
                                    class="education-img" />
                            </a>
                            <div class="education-content w-clearfix">
                                <a href="#" class="education-title-wrapper w-inline-block">
                                    <h2 class="education-title">Tech Talk: Advancements in Science and Tech</h2>
                                </a>
                                <div class="top-blog-time-box">
                                    <div class="post-time-text">April 21, 2024</div>
                                    <div class="post-time-text">5 min Read</div>
                                </div>
                                <a href="singleblog.html" class="read-more read-more-education w-inline-block">
                                    <div class="read-more-text">Read post</div>
                                    <img src="images/arrow-post.png" loading="lazy" width="139" alt="" class="top-blog-arrow" />
                                </a>
                            </div>
                        </div>
                    </div>
                    <div role="listitem" class="w-dyn-item">
                        <div data-w-id="150c21cc-d5f7-f827-ba08-0e66450754ce" style="opacity: 0;" class="education-item">
                            <a href="singleblog.html" class="education-img-wrapper w-inline-block">
                                <img
                                    src="images/post2.jpg"
                                    alt=""
                                    class="education-img" />
                            </a>
                            <div class="education-content w-clearfix">
                                <a href="#" class="education-title-wrapper w-inline-block">
                                    <h2 class="education-title">Wild Wonders: Exploring Nature's Tapestry</h2>
                                </a>
                                <div class="top-blog-time-box">
                                    <div class="post-time-text">April 21, 2024</div>
                                    <div class="post-time-text">5 min Read</div>
                                </div>
                                <a href="singleblog.html" class="read-more read-more-education w-inline-block">
                                    <div class="read-more-text">Read post</div>
                                    <img src="images/arrow-post.png" loading="lazy" width="139" alt="" class="top-blog-arrow" />
                                </a>
                            </div>
                        </div>
                    </div>
                    <div role="listitem" class="w-dyn-item">
                        <div data-w-id="150c21cc-d5f7-f827-ba08-0e66450754ce" style="opacity: 0;" class="education-item">
                            <a href="singleblog.html" class="education-img-wrapper w-inline-block">
                                <img
                                    src="images/post3.jpg"
                                    alt=""
                                    class="education-img" />
                            </a>
                            <div class="education-content w-clearfix">
                                <a href="#" class="education-title-wrapper w-inline-block">
                                    <h2 class="education-title">Wanderlust Chronicles: Tales from the Road</h2>
                                </a>
                                <div class="top-blog-time-box">
                                    <div class="post-time-text">April 21, 2024</div>
                                    <div class="post-time-text">3 min Read</div>
                                </div>
                                <a href="singleblog.html" class="read-more read-more-education w-inline-block">
                                    <div class="read-more-text">Read post</div>
                                    <img src="images/arrow-post.png" loading="lazy" width="139" alt="" class="top-blog-arrow" />
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="business-section">
        <div class="w-layout-blockcontainer main-container w-container">

            <div data-w-id="502854d5-e016-7e31-d90c-979a6ea1596b" style="opacity: 0;" class="main-title">
                <h2 class="title-heading">marketing</h2>
                <img src="images/post-module_title.png" loading="lazy" width="61" alt="" class="title-icon" />
            </div>

            <div class="marketing-wrapper w-dyn-list">
                <div role="list" class="marketing-list w-dyn-items">
                    <div role="listitem" class="w-dyn-item">
                        <div data-w-id="76f8fbd6-afeb-da4c-4703-1612e0e04b3c" style="opacity: 0;" class="top-blog-item business-item">
                            <a href="singleblog.html" class="top-blog-img-wrapper w-inline-block">
                                <img
                                    src="images/post7.jpg"
                                    alt=""
                                    class="top-blog-img" />
                                <img src="images/post-dec.png" loading="lazy" width="143" alt="" class="tob-blog-line" />
                            </a>
                            <div class="top-blog-content">
                                <h2 class="top-blog-title">Teacher's Toolbox: Strategies for Success</h2>
                                <div class="top-blog-time-box">
                                    <div class="post-time-text">April 21, 2024</div>
                                    <div class="post-time-text">5 min Read</div>
                                </div>
                                <div class="top-blog-read-box">
                                    <img src="images/snake-arrow.png" loading="lazy" width="50" alt="" class="top-blog-left-arrow" />
                                    <a href="singleblog.html" class="read-more w-inline-block">
                                        <div class="read-more-text">Read post</div>
                                        <div class="arrow"><img src="images/post-arr.png" loading="lazy" width="10" alt="" /></div>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div role="listitem" class="w-dyn-item">
                        <div data-w-id="76f8fbd6-afeb-da4c-4703-1612e0e04b3c" style="opacity: 0;" class="top-blog-item business-item">
                            <a href="singleblog.html" class="top-blog-img-wrapper w-inline-block">
                                <img
                                    src="images/post10.jpg"
                                    alt=""
                                    class="top-blog-img" />
                                <img src="images/post-dec.png" loading="lazy" width="143" alt="" class="tob-blog-line" />
                            </a>
                            <div class="top-blog-content">
                                <h2 class="top-blog-title">Startup Spotlight: Unveiling Business Triumphs</h2>
                                <div class="top-blog-time-box">
                                    <div class="post-time-text">April 21, 2024</div>
                                    <div class="post-time-text">5 min Read</div>
                                </div>
                                <div class="top-blog-read-box">
                                    <img src="images/snake-arrow.png" loading="lazy" width="50" alt="" class="top-blog-left-arrow" />
                                    <a href="singleblog.html" class="read-more w-inline-block">
                                        <div class="read-more-text">Read post</div>
                                        <div class="arrow"><img src="images/post-arr.png" loading="lazy" width="10" alt="" /></div>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="_2col-blogs">
                <div id="w-node-_44874d52-170e-42c7-8ae7-669bb6842db6-7332d353" class="_2col-blog-item">
                    <div class="_2col-blogs-wrapper w-dyn-list">
                        <div role="list" class="_2col-blogs-list w-dyn-items">
                            <div role="listitem" class="w-dyn-item">
                                <a data-w-id="e43ca78c-19f2-958b-a18b-e2b884a7a1d4" href="singleblog.html" class="_2col-blogs-item w-inline-block">
                                    <div class="_2col-blogs-icon-wrapp"><img src="images/chat-centered-text.png" loading="lazy" width="23" alt="" /></div>
                                    <h4 class="_2col-blogs-title">Tech Talk: Advancements in Science and Tech</h4>
                                    <img
                                        src="images/post1.jpg"
                                        alt=""
                                        class="_2col-blogs-img" />
                                    <div class="_2col-blogs-overlay"></div>
                                </a>
                            </div>
                            <div role="listitem" class="w-dyn-item">
                                <a data-w-id="e43ca78c-19f2-958b-a18b-e2b884a7a1d4" href="singleblog.html" class="_2col-blogs-item w-inline-block">
                                    <div class="_2col-blogs-icon-wrapp"><img src="images/chat-centered-text.png" loading="lazy" width="23" alt="" /></div>
                                    <h4 class="_2col-blogs-title">Wild Wonders: Exploring Nature's Tapestry</h4>
                                    <img
                                        src="images/post2.jpg"
                                        alt=""
                                        class="_2col-blogs-img" />
                                    <div class="_2col-blogs-overlay"></div>
                                </a>
                            </div>
                            <div role="listitem" class="w-dyn-item">
                                <a data-w-id="e43ca78c-19f2-958b-a18b-e2b884a7a1d4" href="singleblog.html" class="_2col-blogs-item w-inline-block">
                                    <div class="_2col-blogs-icon-wrapp"><img src="images/chat-centered-text.png" loading="lazy" width="23" alt="" /></div>
                                    <h4 class="_2col-blogs-title">Wanderlust Chronicles: Tales from the Road</h4>
                                    <img
                                        src="images/post3.jpg"
                                        alt=""
                                        class="_2col-blogs-img" />
                                    <div class="_2col-blogs-overlay"></div>
                                </a>
                            </div>
                            <div role="listitem" class="w-dyn-item">
                                <a data-w-id="e43ca78c-19f2-958b-a18b-e2b884a7a1d4" href="singleblog.html" class="_2col-blogs-item w-inline-block">
                                    <div class="_2col-blogs-icon-wrapp"><img src="images/chat-centered-text.png" loading="lazy" width="23" alt="" /></div>
                                    <h4 class="_2col-blogs-title">Training Triumphs: Athlete's Journey to Excellence</h4>
                                    <img
                                        src="images/post4.jpg"
                                        alt=""
                                        class="_2col-blogs-img" />
                                    <div class="_2col-blogs-overlay"></div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="w-node-_9ee69ad1-7a9f-8c66-2cca-f486df6807ec-7332d353" class="_2col-blog-item">
                    <div class="_2col-blogs-wrapper w-dyn-list">
                        <div role="list" class="_2col-blogs-list _2col-blogs-list-2 w-dyn-items">
                            <div role="listitem" class="w-dyn-item">
                                <a data-w-id="27271ca3-b29f-b6d5-a0f0-ef4590851981" href="singleblog.html" class="_2col-blogs-item w-inline-block">
                                    <div class="_2col-blogs-icon-wrapp"><img src="images/chat-centered-text.png" loading="lazy" width="23" alt="" /></div>
                                    <h4 class="_2col-blogs-title">Thrill of Victory: Sportsmanship Spotlight</h4>
                                    <img
                                        src="images/post5.jpg"
                                        alt=""
                                        class="_2col-blogs-img" />
                                    <div class="_2col-blogs-overlay"></div>
                                </a>
                            </div>
                            <div role="listitem" class="w-dyn-item">
                                <a data-w-id="27271ca3-b29f-b6d5-a0f0-ef4590851981" href="singleblog.html" class="_2col-blogs-item w-inline-block">
                                    <div class="_2col-blogs-icon-wrapp"><img src="images/chat-centered-text.png" loading="lazy" width="23" alt="" /></div>
                                    <h4 class="_2col-blogs-title">Tech Trends: Navigating the Digital Frontier</h4>
                                    <img
                                        src="images/post6.jpg"
                                        alt=""
                                        class="_2col-blogs-img" />
                                    <div class="_2col-blogs-overlay"></div>
                                </a>
                            </div>
                            <div role="listitem" class="w-dyn-item">
                                <a data-w-id="27271ca3-b29f-b6d5-a0f0-ef4590851981" href="singleblog.html" class="_2col-blogs-item w-inline-block">
                                    <div class="_2col-blogs-icon-wrapp"><img src="images/chat-centered-text.png" loading="lazy" width="23" alt="" /></div>
                                    <h4 class="_2col-blogs-title">Teacher's Toolbox: Strategies for Success</h4>
                                    <img
                                        src="images/post7.jpg"
                                        alt=""
                                        class="_2col-blogs-img" />
                                    <div class="_2col-blogs-overlay"></div>
                                </a>
                            </div>
                            <div role="listitem" class="w-dyn-item">
                                <a data-w-id="27271ca3-b29f-b6d5-a0f0-ef4590851981" href="singleblog.html" class="_2col-blogs-item w-inline-block">
                                    <div class="_2col-blogs-icon-wrapp"><img src="images/chat-centered-text.png" loading="lazy" width="23" alt="" /></div>
                                    <h4 class="_2col-blogs-title">Student Chronicles: Life in the Academic Lane</h4>
                                    <img
                                        src="images/post8.jpg"
                                        alt=""
                                        class="_2col-blogs-img" />
                                    <div class="_2col-blogs-overlay"></div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="travel-section">
        <div class="w-layout-blockcontainer main-container w-container">
            <div data-w-id="9af15f5c-c5dd-4ac0-71df-fbb8b52a2321" style="opacity: 0;" class="main-title">
                <h2 class="title-heading">Travel</h2>
                <img src="images/post-module-title-dec.png" loading="lazy" alt="" class="title-icon" />
            </div>
            <div class="travel-wrapper w-dyn-list">
                <div role="list" class="travel-list w-dyn-items">
                    <div role="listitem" class="w-dyn-item">
                        <a data-w-id="1493d3a9-df30-701d-3df9-beb981ab9701" style="opacity: 0;" href="singleblog.html" class="travel-item w-inline-block">
                            <img src="images/trvl-ic.png" loading="lazy" width="120" alt="" class="travel-comment" />
                            <h2 class="travel-title">Wanderlust Chronicles: Tales from the Road</h2>
                            <div class="read-more read-more-travel">
                                <div class="read-more-text">read more</div>
                                <div class="arrow"><img src="images/post-arr.png" loading="lazy" width="10" alt="" /></div>
                            </div>
                        </a>
                    </div>
                    <div role="listitem" class="w-dyn-item">
                        <a data-w-id="1493d3a9-df30-701d-3df9-beb981ab9701" style="opacity: 0;" href="singleblog.html" class="travel-item w-inline-block">
                            <img src="images/trvl-ic.png" loading="lazy" width="120" alt="" class="travel-comment" />
                            <h2 class="travel-title">Nature's Retreat: Serenity in Every Step</h2>
                            <div class="read-more read-more-travel">
                                <div class="read-more-text">read more</div>
                                <div class="arrow"><img src="images/post-arr.png" loading="lazy" width="10" alt="" /></div>
                            </div>
                        </a>
                    </div>
                    <div role="listitem" class="w-dyn-item">
                        <a data-w-id="1493d3a9-df30-701d-3df9-beb981ab9701" style="opacity: 0;" href="singleblog.html" class="travel-item w-inline-block">
                            <img src="images/trvl-ic.png" loading="lazy" width="120" alt="" class="travel-comment" />
                            <h2 class="travel-title">Local Bites: Culinary Experiences Worldwide</h2>
                            <div class="read-more read-more-travel">
                                <div class="read-more-text">read more</div>
                                <div class="arrow"><img src="images/post-arr.png" loading="lazy" width="10" alt="" /></div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <section class="entertainment-section">
        <div class="w-layout-blockcontainer main-container w-container">
            <div data-w-id="cbd156c4-1356-de5e-198a-68fd8463e95e" style="opacity: 0;" class="main-title">
                <h2 class="title-heading">entertanment</h2>
                <img src="images/post-module_title.png" loading="lazy" width="61" alt="" class="title-icon" />
            </div>
            <div class="entertanment-wrapper w-dyn-list">
                <div role="list" class="entertanment-list w-dyn-items">
                    <div role="listitem" class="w-dyn-item">
                        <div data-w-id="6f7f1fb7-c667-9e7c-b081-6dfb2a809d44" style="opacity: 0;" class="entertanment-item">
                            <a href="singleblog.html" class="entertanment-img-wrapper w-inline-block">
                                <img
                                    src="images/post8.jpg"
                                    alt=""
                                    class="entertanment-img" />
                            </a>
                            <div class="top-blog-content entertanment-content">
                                <h2 class="top-blog-title entertanment-title">Student Chronicles: Life in the Academic Lane</h2>
                                <div class="top-blog-time-box">
                                    <div class="post-time-text">April 21, 2024</div>
                                    <div class="post-time-text">5 min Read</div>
                                </div>
                                <div class="top-blog-read-box">
                                    <a href="singleblog.html" class="read-more entertanment-read-more w-inline-block">
                                        <div class="read-more-text">Read post</div>
                                        <div class="arrow"><img src="images/post-arr.png" loading="lazy" width="10" alt="" /></div>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div role="listitem" class="w-dyn-item">
                        <div data-w-id="6f7f1fb7-c667-9e7c-b081-6dfb2a809d44" style="opacity: 0;" class="entertanment-item">
                            <a href="singleblog.html" class="entertanment-img-wrapper w-inline-block">
                                <img
                                    src="images/post11.jpg"
                                    alt=""
                                    class="entertanment-img" />
                            </a>
                            <div class="top-blog-content entertanment-content">
                                <h2 class="top-blog-title entertanment-title">Pop Culture Parade: Trends and Fandoms</h2>
                                <div class="top-blog-time-box">
                                    <div class="post-time-text">April 21, 2024</div>
                                    <div class="post-time-text">5 min Read</div>
                                </div>
                                <div class="top-blog-read-box">
                                    <a href="singleblog.html" class="read-more entertanment-read-more w-inline-block">
                                        <div class="read-more-text">Read post</div>
                                        <div class="arrow"><img src="images/post-arr.png" loading="lazy" width="10" alt="" /></div>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div role="listitem" class="w-dyn-item">
                        <div data-w-id="6f7f1fb7-c667-9e7c-b081-6dfb2a809d44" style="opacity: 0;" class="entertanment-item">
                            <a href="singleblog.html" class="entertanment-img-wrapper w-inline-block">
                                <img
                                    src="images/post16.jpg"
                                    alt=""
                                    class="entertanment-img" />
                            </a>
                            <div class="top-blog-content entertanment-content">
                                <h2 class="top-blog-title entertanment-title">Music Mosaic: Harmony Across Genres</h2>
                                <div class="top-blog-time-box">
                                    <div class="post-time-text">April 21, 2024</div>
                                    <div class="post-time-text">5 min Read</div>
                                </div>
                                <div class="top-blog-read-box">
                                    <a href="singleblog.html" class="read-more entertanment-read-more w-inline-block">
                                        <div class="read-more-text">Read post</div>
                                        <div class="arrow"><img src="images/post-arr.png" loading="lazy" width="10" alt="" /></div>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div role="listitem" class="w-dyn-item">
                        <div data-w-id="6f7f1fb7-c667-9e7c-b081-6dfb2a809d44" style="opacity: 0;" class="entertanment-item">
                            <a href="singleblog.html" class="entertanment-img-wrapper w-inline-block">
                                <img
                                    src="images/post23.jpg"
                                    alt=""
                                    class="entertanment-img" />
                            </a>
                            <div class="top-blog-content entertanment-content">
                                <h2 class="top-blog-title entertanment-title">Laugh Lounge: Comedy Capers and Chuckles</h2>
                                <div class="top-blog-time-box">
                                    <div class="post-time-text">April 21, 2024</div>
                                    <div class="post-time-text">5 min Read</div>
                                </div>
                                <div class="top-blog-read-box">
                                    <a href="singleblog.html" class="read-more entertanment-read-more w-inline-block">
                                        <div class="read-more-text">Read post</div>
                                        <div class="arrow"><img src="images/post-arr.png" loading="lazy" width="10" alt="" /></div>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
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