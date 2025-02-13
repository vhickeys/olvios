<?php
$title = "My Blog";
$currentPage = "blog";
include_once 'components/head.php';
include_once 'components/side-menu.php';
include_once 'components/top-header.php';
include_once 'components/bottom-header.php';
include_once 'components/color-switcher.php';
?>

<!-- Latest Blog Posts section start -->
<section class="pt-120 pb-120 mt-10 mt-lg-0">
    <div class="pb-60 br-bottom-n3">
        <div class="container">
            <div data-aos="zoom-in" class="page-heading">
                <h3 class="page-title fs-onefw-semibold n5-color mb-2 mb-md-3 text-center">
                    A Blog About Software Development And Life
                </h3>
                <p class="fs-seven n5-color mb-4 mb-md-8 text-center">
                    Welcome to my blog. Subscribe and get my latest blog post in
                    your inbox.
                </p>
                <form class="d-flex flex-wrap flex-sm-nowrap gap-3 gap-md-6">
                    <input placeholder="Enter your email"
                        class="brn4 px-4 px-md-8 py-2 py-md-4 rounded-pill n5-color" />
                    <button
                        class="primary-btn fw-medium px-3 px-md-6 py-2 py-md-4 rounded-pill d-flex align-items-center gap-2 mx-auto h-100 flex-shrink-0">
                        <i class="ph ph-paper-plane-tilt"></i>Subscribe
                    </button>
                </form>
            </div>
        </div>
    </div>

    <!-- blog card  -->
    <div class="container">
        <div class="row g-5 g-md-10 mt-5">

            <?php if ($blogPosts != []): ?>

                <?php foreach ($blogPosts as $blogPost): ?>

                    <div data-aos="fade-up" data-aos-duration="700" class="col-sm-6 col-xxl-4">
                        <a href="blog-details.php?read=<?= $blogPost['slug'] ?>" class="blog-card">
                            <div class="blog-img rounded-3 overflow-hidden">
                                <img src="assets/images/posts/<?= $blogPost['image'] ?>"
                                    alt="<?= $blogPost['title'] ?? '' ?> | Victor Osaronwafor Olvios" class="rounded-3 w-100" />
                            </div>
                            <div class="pt-4 pt-md-8 px-3 px-md-5">
                                <div class="d-flex align-items-center gap-3 mb-2 mb-md-3">
                                    <span class="n4-color fs-eight"><?= (date('d M, Y', strtotime($blogPost['date']))) ?></span>
                                    <span class="p1-color fs-eight">/</span>
                                    <span class="n4-color fs-eight"><?= $blogPost['category'] ?? '' ?></span>
                                </div>
                                <h4 class="blog-title fs-five n5-color fw-semibold">
                                    <?= $blogPost['title'] ?? '' ?>
                                </h4>
                            </div>
                        </a>
                    </div>

                <?php endforeach; ?>

            <?php else: ?>
                <div class="row">
                    <div class="alert alert-info">
                        No Blog Post Yet! Check again later.
                    </div>
                </div>
            <?php endif; ?>
        </div>
        
        <div data-aos="zoom-in-up" class="d-flex gap-4 gap-md-8 justify-content-center mt-8 mt-md-15">
            <div class="pagination-countainer brn4 n5-color">
                <i class="ph-bold ph-caret-left"></i>
            </div>
            <div class="d-flex gap-2 align-items-center">
                <div class="pagination-countainer brn4 pagination-active">
                    01
                </div>
                <div class="pagination-countainer brn4 n5-color">02</div>
                <div class="pagination-countainer brn4 n5-color">03</div>
            </div>
            <div class="pagination-countainer brn4 n5-color">
                <i class="ph-bold ph-caret-right"></i>
            </div>
        </div>
    </div>
</section>
<!-- Latest Blog Posts section end -->

<?php
include_once 'components/footer.php';
?>