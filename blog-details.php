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
                    <span class="n3-color fs-eight">Published <span class="n4-color">2</span> days ago</span>
                    <ul class="d-flex align-items-center gap-3">
                        <li class="n3-color fs-eight">
                            <span class="n4-color">2</span> min read
                        </li>
                        <li class="n3-color fs-eight">
                            <span class="n4-color">2</span> comments
                        </li>
                    </ul>
                </div>
            </div>
            <div class="my-5 my-md-10 overflow-hidden">
                <img src="assets/images/posts/<?= $blog_post_details['image'] ?>"
                    alt="<?= $blog_post_details['title'] ?? '' ?> | Victor Osaronwafor" class="blog-details-img" />
            </div>

            <p class="details-description n5-color fs-eight">
                <?= $blog_post_details['description'] ?? '' ?>
            </p>
        </div>

        <?php if (!empty($blog_post_details['quote'])): ?>

            <div data-aos="fade-up"
                class="details-description mb-8 mb-md-15 px-4 px-sm-8 px-md-15 py-5 py-md-10 bgn2-color br-left-p1">
                <h4 class="n5-color fs-five fw-medium">
                    <?= $blog_post_details['quote'] ?? '' ?>
                </h4>
                <div class="d-flex gap-2 gap-md-3 align-items-center mt-3 mt-md-6">
                    <div class="line3"></div>
                    <span class="n4-color fs-eight">John Romero</span>
                </div>
            </div>

        <?php endif; ?>

        <div data-aos="fade-up" class="mb-8 mb-md-15">
            <h3 class="details-description n5-color fs-two">Video Example</h3>
            <p class="details-description n5-color fs-eight my-3 my-md-5">
                Watch my Youtube tutorial on this for further explanation. Please don't forget to susbscribe ❤❤❤✔ to my
                Youtube channel.
            </p>
            <div class="overflow-hidden position-relative">
                <img src="assets/images/blog2.png" alt="..." class="blog-details-img" />
                <div class="video-btn">
                    <a href="https://www.youtube.com/watch?v=AVHozwCteL4" class="glightbox3 display-two">
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
                        <a href="https://www.youtube.com/watch?v=AVHozwCteL4" class="video glightbox3"><i
                                class="ph-fill ph-play"></i></a>
                    </div>
                </div>
            </div>
            <h3 class="details-description n5-color fs-five mt-5 mt-md-10">
                Conclusion
            </h3>
            <p class="details-description n5-color fs-eight mt-3 mt-md-5">
                Lorem ipsum dolor sit amet, consectetur adipiscing elit lobortis
                arcu enim urna adipiscing praesent velit viverra sit semper
                lorem eu cursus vel hendrerit elementum morbi curabitur etiam
                nibh justo, lorem aliquet donec sed sit mi dignissim at ante
                massa mattis.
            </p>
        </div>

        <div data-aos="fade-up" class="mb-8 mb-md-15 py-4 py-md-8 brn4-y">
            <div class="d-flex flex-wrap gap-3 align-items-center justify-content-between">
                <div class="d-flex flex-wrap gap-4 gap-md-8 align-items-center">
                    <h4 class="fs-five fw-semibold n5-color">Tag:</h4>
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
                    </div>
                </div>
                <div class="d-flex flex-wrap justify-content-center gap-2 align-items-center">
                    <a href="javascript:void(0)" class="blog-social-icon brn4">
                        <i class="ph ph-facebook-logo p1-color"></i>
                    </a>
                    <a href="javascript:void(0)" class="blog-social-icon brn4">
                        <i class="ph ph-instagram-logo p1-color"></i>
                    </a>
                    <a href="javascript:void(0)" class="blog-social-icon brn4">
                        <i class="ph ph-x-logo p1-color"></i>
                    </a>
                    <a href="javascript:void(0)" class="blog-social-icon brn4">
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
                                alt="<?= $previousPost['title'] ?? '' ?> | Victor Osaronwafor" class="prev-img" />
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
                                alt="<?= $nextPost['title'] ?? '' ?> | Victor Osaronwafor" class="prev-img" />
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
        <section data-aos="fade-up" class="mt-8 mt-md-15">
            <h3 class="n5-color fs-three fw-semibold mb-4 mb-md-8">
                2 Comments
            </h3>
            <div class="reply-container">
                <div
                    class="d-flex flex-wrap flex-md-nowrap gap-4 gap-md-8 px-4 px-md-8 py-3 py-md-6 rounded-3 w-100 brn4">
                    <div class="flex-shrink-0">
                        <img src="assets/images/buyer1.png" alt="..." class="cmnt-img flex-shrink-0" />
                    </div>

                    <div class="w-100">
                        <div class="d-flex gap-3 justify-content-between align-items-center w-100">
                            <div class="w-100">
                                <h6 class="n5-color fs-six fw-medium">Eleanor Pena</h6>
                                <span class="n5-color fs-nine fw-medium">May 9, 2014</span>
                            </div>
                            <button class="reply-btn px-3 px-md-5 py-2 p1-color br1 rounded-pill">
                                Reply
                            </button>
                        </div>
                        <p class="n4-color fs-eight mt-2 mt-md-4">
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit
                            lobortis arcu enim urna adipiscing praesent velit viverra
                            sit semper lorem eu cursus vel hendrerit elementum morbi
                            curabitur etiam nibh justo, lorem aliquet donec sed sit mi
                            dignissim at ante massa mattis.
                        </p>
                    </div>
                </div>

                <div class="reply-answer my-3 my-md-6 ms-5 ms-md-10">
                    <form>
                        <div class="d-flex align-items-center gap-3 gap-md-5">
                            <input type="text" placeholder="Enter Your comments"
                                class="px-3 px-md-6 py-2 py-md-4 w-100 brn4 rounded-3 n5-color" />
                            <button class="fs-six n11-color bg1-color px-3 px-md-5 py-2 rounded-pill">
                                <i class="ph ph-paper-plane-right"></i>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="reply-container">
                <div
                    class="d-flex flex-wrap flex-md-nowrap gap-4 gap-md-8 px-4 px-md-8 py-3 py-md-6 rounded-3 w-100 brn4">
                    <div class="flex-shrink-0">
                        <img src="assets/images/buyer3.png" alt="..." class="cmnt-img flex-shrink-0" />
                    </div>

                    <div class="w-100">
                        <div class="d-flex gap-3 justify-content-between align-items-center w-100">
                            <div class="w-100">
                                <h6 class="n5-color fs-six fw-medium">
                                    Ronald Richards
                                </h6>
                                <span class="n5-color fs-nine fw-medium">May 9, 2014</span>
                            </div>
                            <button class="reply-btn px-3 px-md-5 py-2 p1-color br1 rounded-pill">
                                Reply
                            </button>
                        </div>
                        <p class="n4-color fs-eight mt-2 mt-md-4">
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit
                            lobortis arcu enim urna adipiscing praesent velit viverra
                            sit semper lorem eu cursus vel hendrerit elementum morbi
                            curabitur etiam nibh justo, lorem aliquet donec sed sit mi
                            dignissim at ante massa mattis.
                        </p>
                    </div>
                </div>

                <div class="reply-answer mt-3 mt-md-6 ms-5 ms-md-10">
                    <form>
                        <div class="d-flex align-items-center gap-3 gap-md-5">
                            <input type="text" placeholder="Enter Your comments"
                                class="px-3 px-md-6 py-2 py-md-4 w-100 brn4 rounded-3 n5-color" />
                            <button class="fs-six n11-color bg1-color px-3 px-md-5 py-2 rounded-pill">
                                <i class="ph ph-paper-plane-right"></i>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
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
                    <span class="spinner-border spinner-border-sm text-light post_spinner me-2" role="status"></span> Post Comment
                </button>
            </form>

        </section>
    </div>
</section>
<!-- Latest Blog Posts section end -->

<?php
include_once 'components/footer.php';
?>