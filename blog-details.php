<?php

$title = "My Blog";
$currentPage = "blog";
include_once 'components/head.php';

if (!isset($_GET['read']) || empty($_GET['read']) || ($blog->getPostBySlugStatus($_GET['read']) == [])) {
    echo "<script>window.history.back()</script>";
}

$blogPostId = $blog_post_details['id'];
$previousPost = $blog->getPreviousPost($blogPostId);
$nextPost = $blog->getNextPost($blogPostId);
$comments = $blog->getPostComments($blogPostId);
$commentsCount = $blog->postCommentsCount($blogPostId);

include_once 'components/side-menu.php';
include_once 'components/top-header.php';
include_once 'components/bottom-header.php';
include_once 'components/color-switcher.php';
?>

<!-- Latest Blog Posts section start -->
<section class="blog-details-section pt-120 pb-120 mt-10 mt-lg-0">
    <div class="container">
        <div class="mb-8 mb-md-15">
            <div data-aos="fade-left">
                <h3 class="n5-color fs-one">
                    <?= $blog_post_details['title'] ?? '' ?>
                </h3>
                <div class="d-flex flex-wrap align-items-center gap-2 gap-md-3 mt-3">
                    <span class="n3-color fs-eight"><span class="n4-color">Published</span>
                        <?= timeAgo($blog_post_details['date']) ?></span>
                    <ul class="d-flex align-items-center gap-3">
                        <li class="n3-color fs-eight">
                            <span class="n4-color">2</span> min read
                        </li>
                        <li class="n3-color fs-eight">
                            <span class="n4-color"><?= $commentsCount ?? '0' ?></span> comments
                        </li>
                    </ul>
                </div>
            </div>
            <div class="my-5 my-md-10 overflow-hidden">
                <img src="assets/images/posts/<?= $blog_post_details['image'] ?>"
                    alt="<?= $blog_post_details['title'] ?? '' ?> | Victor Osaronwafor" class="blog-details-img" />
            </div>

            <div class="details-description n5-color fs-eight">
                <?= $blog_post_details['description'] ?? '' ?>
            </div>
        </div>

        <?php if (!empty($blog_post_details['quote'])): ?>

            <div data-aos="fade-up"
                class="details-description mb-8 mb-md-15 px-4 px-sm-8 px-md-15 py-5 py-md-10 bgn2-color br-left-p1">
                <h4 class="n5-color fs-five fw-medium">
                    <?= $blog_post_details['quote'] ?? '' ?>
                </h4>
                <div class="d-flex gap-2 gap-md-3 align-items-center mt-3 mt-md-6">
                    <div class="line3"></div>
                    <span class="n4-color fs-eight"><?= $blog_post_details['quoted_by'] ?? '' ?></span>
                </div>
            </div>

        <?php endif; ?>

        <?php if (!empty($blog_post_details['video_url'])): ?>

            <div data-aos="fade-up" class="mb-4 mb-md-10">
                <h3 class="details-description n5-color fs-two">Video Example</h3>
                <p class="details-description n5-color fs-eight my-3 my-md-5">
                    Watch my Youtube tutorial on this for further explanation. Please don't forget to susbscribe
                    🥰😍❤💝💘🖤🤎💚✔ to my
                    Youtube channel.
                </p>
                <?php
                // Function to extract YouTube video ID from URL
                function getYouTubeVideoID($url)
                {
                    preg_match("/(?:youtu\.be\/|youtube\.com\/(?:.*v=|.*\/|.*embed\/|.*shorts\/|.*watch\?v=))([a-zA-Z0-9_-]+)/", $url, $matches);
                    return $matches[1] ?? null;
                }

                $post_image = $blog_post_details['image'] ?? '';
                $video_url = $blog_post_details['video_url'] ?? '';
                $video_id = getYouTubeVideoID($video_url);
                $thumbnail_url = $video_id ? "https://img.youtube.com/vi/{$video_id}/maxresdefault.jpg" : "assets/images/posts/$post_image";
                ?>

                <div class="overflow-hidden position-relative">
                    <img src="<?= $thumbnail_url ?>" alt="Video Thumbnail" class="blog-details-img" />
                    <?php if ($video_id): ?>
                        <div class="video-btn">
                            <a href="<?= $video_url ?>" class="glightbox3 display-two">
                                <i class="ph-fill ph-play-circle"></i>
                            </a>
                        </div>

                        <div class="wrapper">
                            <div class="video-main">
                                <div class="promo-video">
                                    <div class="waves-block">
                                        <div class="waves wave-1"></div>
                                        <div class="waves wave-2"></div>
                                        <div class="waves wave-3"></div>
                                    </div>
                                </div>
                                <a href="<?= $video_url ?>" class="video glightbox3"><i class="ph-fill ph-play"></i></a>
                            </div>
                        </div>
                    <?php endif; ?>
                </div>

            </div>

        <?php endif; ?>

        <?php if (!empty($blog_post_details['conclusion'])): ?>

            <div class="mb-8 mb-md-15">
                <h3 class="details-description n5-color fs-five mt-5 mt-md-10">
                    Conclusion
                </h3>
                <p class="details-description n5-color fs-eight mt-3 mt-md-5">
                    <?= $blog_post_details['conclusion'] ?? '' ?>
                </p>
            </div>

        <?php endif; ?>


        <div data-aos="fade-up" class="mb-8 mb-md-15 py-4 py-md-8 brn4-y">
            <div class="d-flex flex-wrap gap-3 align-items-center justify-content-between">
                <div class="d-flex flex-wrap gap-4 gap-md-8 align-items-center">
                    <!-- <h4 class="fs-five fw-semibold n5-color">Tag:</h4>
                    <div class="d-flex flex-wrap align-items-center gap-2">
                        <a href="javascript:void(0)"
                            class="bgn2-color n4-color py-2 py-md-3 px-3 px-md-5 d-block rounded-pill brn4">Business</a>
                        <a href="javascript:void(0)"
                            class="bgn2-color n4-color py-2 py-md-3 px-3 px-md-5 d-block rounded-pill brn4">Analysis</a>
                        <a href="javascript:void(0)"
                            class="bgn2-color n4-color py-2 py-md-3 px-3 px-md-5 d-block rounded-pill brn4">Technology</a>
                        <a href="javascript:void(0)"
                            class="bgn2-color n4-color py-2 py-md-3 px-3 px-md-5 d-block rounded-pill brn4">Design</a>
                        <a href="javascript:void(0)"
                            class="bgn2-color n4-color py-2 py-md-3 px-3 px-md-5 d-block rounded-pill brn4">Strategy</a>
                    </div> -->
                </div>
                <div class="d-flex flex-wrap justify-content-center gap-2 align-items-center">
                    <a href="<?= $webSetting['facebook'] ?: '' ?>" class="blog-social-icon brn4">
                        <i class="ph ph-facebook-logo p1-color"></i>
                    </a>
                    <a href="<?= $webSetting['instagram'] ?: '' ?>" class="blog-social-icon brn4">
                        <i class="ph ph-instagram-logo p1-color"></i>
                    </a>
                    <a href="<?= $webSetting['twitter'] ?: '' ?>" class="blog-social-icon brn4">
                        <i class="ph ph-x-logo p1-color"></i>
                    </a>
                    <a href="<?= $webSetting['linkedIn'] ?: '' ?>" class="blog-social-icon brn4">
                        <i class="ph ph-linkedin-logo p1-color"></i>
                    </a>
                </div>
            </div>

            <div class="d-flex flex-wrap flex-md-nowrap gap-3 gap-md-6 mt-4 mt-md-8">

                <?php if ($previousPost != []): ?>
                    <a href="blog-details.php?read=<?= $previousPost['slug'] ?>"
                        class="prev-card d-flex gap-3 gap-md-6 align-items-center p-3 brn4 rounded-3">
                        <div class="overflow-hidden">
                            <img src="assets/images/posts/<?= $previousPost['image'] ?>"
                                alt="<?= $previousPost['title'] ?? '' ?> | Victor Osaronwafor Olvios" class="prev-img" />
                        </div>
                        <div>
                            <span class="d-flex gap-1 align-items-center p1-color">
                                <i class="ph ph-caret-double-left"></i>
                                Previous
                            </span>
                            <span
                                class="n5-color fw-semibold fs-eight mt-2 d-block"><?= $previousPost['title'] ?? '' ?></span>
                        </div>
                    </a>
                <?php endif; ?>

                <?php if ($nextPost != []): ?>

                    <a href="blog-details.php?read=<?= $nextPost['slug'] ?>"
                        class="next-card d-flex gap-3 gap-md-6 align-items-center p-3 brn4 rounded-3">
                        <div class="overflow-hidden">
                            <img src="assets/images/posts/<?= $nextPost['image'] ?>"
                                alt="<?= $nextPost['title'] ?? '' ?> | Victor Osaronwafor Olvios" class="prev-img" />
                        </div>
                        <div>
                            <span class="d-flex gap-1 align-items-center p1-color">
                                Next
                                <i class="ph ph-caret-double-right"></i>
                            </span>
                            <span class="n5-color fw-semibold fs-eight mt-2 d-block"><?= $nextPost['title'] ?? '' ?></span>
                        </div>
                    </a>
                <?php endif; ?>

            </div>
        </div>

        <!-- comments -->
        <section data-aos="fade-up" class="mt-8 mt-md-15" id="postComments">
            <h3 class="n5-color fs-three fw-semibold mb-4 mb-md-8">
                <?= $commentsCount ?? '0' ?> Comment(s)
            </h3>

            <?php if ($comments != []): ?>
                <?php foreach ($comments as $comment): ?>

                    <div class="reply-container mb-5">
                        <div
                            class="d-flex flex-wrap flex-md-nowrap gap-4 gap-md-8 px-4 px-md-8 mb-5 py-3 py-md-6 rounded-3 w-100 brn4">
                            <div class="flex-shrink-0">
                                <img src="assets/images/comments/placeholder.jpg"
                                    alt="<?= $comment['first_name'] ?> | Victor Osaronwafor Olvios"
                                    class="cmnt-img flex-shrink-0" />
                            </div>

                            <div class="w-100">
                                <div class="d-flex gap-3 justify-content-between align-items-center w-100">
                                    <div class="w-100">
                                        <h6 class="n5-color fs-six fw-medium">
                                            <?= $comment['first_name'] . ' ' . $comment['last_name'] ?>
                                        </h6>
                                        <span
                                            class="n5-color fs-nine fw-medium"><?= date('d M, Y', strtotime($comment['date'])) ?></span>
                                    </div>
                                </div>
                                <p class="n4-color fs-eight mt-2 mt-md-4">
                                    <?= $comment['message'] ?>
                                </p>
                            </div>
                        </div>
                    </div>

                <?php endforeach; ?>
            <?php endif; ?>

        </section>

        <!-- reply section -->
        <section data-aos="zoom-in" class="reply-section mt-8 mt-md-15 p-3 p-sm-5 p-md-10 brn4 rounded-3">
            <h3 class="n5-color fs-three mb-2 mb-md-3">Leave a Reply</h3>
            <p class="n4-color fs-eight">
                Your email address will not be published. Required fields are
                marked *
            </p>

            <form class="mt-5 mt-md-10" id="submitComment">

                <div id="alert">alert</div>

                <input type="hidden" id="post_id" value="<?= $blog_post_details['id'] ?>">

                <div class="d-flex flex-wrap flex-md-nowrap align-items-center gap-3 gap-md-6">
                    <input type="text" id="first_name" placeholder="First Name"
                        class="px-4 px-md-8 py-2 py-md-4 w-100 brn4 rounded-3 n5-color" />
                    <input type="text" id="last_name" placeholder="Last Name"
                        class="px-4 px-md-8 py-2 py-md-4 w-100 brn4 rounded-3 n5-color" />
                </div>

                <input type="email" id="email" placeholder="Enter Email"
                    class="px-4 px-md-8 py-2 py-md-4 w-100 brn4 rounded-3 n5-color my-3 my-md-6" />
                <textarea class="n5-color px-3 px-md-5 py-2 py-md-4 rounded-2 brn4 w-100 h-120" id="message"
                    placeholder="Your Message:"></textarea>

                <button type="submit" id="submit_post_btn"
                    class="primary-btn fw-medium px-3 px-md-6 py-2 py-md-4 rounded-pill mt-5 mt-md-10">
                    <span class="spinner-border spinner-border-sm text-light post_spinner me-2" role="status"></span>
                    Post Comment
                </button>
            </form>

        </section>
    </div>
</section>
<!-- Latest Blog Posts section end -->

<?php
include_once 'components/footer.php';
?>