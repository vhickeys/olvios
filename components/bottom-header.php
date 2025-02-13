<!-- bottom header  -->
<div class="w-100 bgn1-color p-3 position-fixed z-3 bottom-0 d-block d-lg-none br-top-n5 box-shadow1">
  <div class="header-bottom-menu w-full">
    <ul class="d-flex gap-1 align-items-center justify-content-between">
      <li class="<?= setActivePageMobile($currentPage, 'homepage') ?>">
        <a href="index.php"
          class="d-flex align-items-center gap-2 <?= setActivePage2($currentPage, 'homepage') ?> fs-eight p-2">
          <span class="fs-five d-flex align-items-center justify-content-center">
            <i class="ph-fill ph-user"></i>
          </span>
          <span class="d-none d-md-block">About Me</span></a>
      </li>
      <li class="<?= setActivePageMobile($currentPage, 'portfolio') ?>">
        <a href="portfolio.php" class="d-flex justify-content-between align-items-center">
          <div class="d-flex align-items-center gap-2 <?= setActivePage2($currentPage, 'portfolio') ?> fs-eight p-2">
            <span class="fs-five d-flex align-items-center justify-content-center">
              <i class="ph-fill ph-code-block"></i>
            </span>
            <span class="d-none d-md-block">Portfolio</span>
          </div>
          <span class="n5-color bg2-color fs-ten px-1 pt-1 rounded-2 me-3 d-none d-md-block">16</span>
        </a>
      </li>
      <li class="<?= setActivePageMobile($currentPage, 'services') ?>">
        <a href="services.php"
          class="d-flex align-items-center gap-2 <?= setActivePage2($currentPage, 'services') ?> fs-eight p-2">
          <span class="fs-five d-flex align-items-center justify-content-center">
            <i class="ph-fill ph-briefcase"></i>
          </span>
          <span class="d-none d-md-block">Services</span>
        </a>
      </li>
      <li class="<?= setActivePageMobile($currentPage, 'resume') ?>">
        <a href="resume.php" class="d-flex align-items-center gap-2 <?= setActivePage2($currentPage, 'resume') ?> fs-eight p-2">
          <span class="fs-five d-flex align-items-center justify-content-center"><i
              class="ph-fill ph-notebook fs-six"></i></span>
          <span class="d-none d-md-block">Resume</span>
        </a>
      </li>
      <li class="<?= setActivePageMobile($currentPage, 'products') ?>">
        <a href="products.php" class="d-flex align-items-center gap-2 <?= setActivePage2($currentPage, 'products') ?> fs-eight p-2">
          <span class="fs-five d-flex align-items-center justify-content-center">
            <i class="ph-fill ph-shopping-bag"></i>
          </span>
          <span class="d-none d-md-block">Products</span>
        </a>
      </li>
      <li class="<?= setActivePageMobile($currentPage, 'blog') ?>">
        <a href="blog.php" class="d-flex align-items-center gap-2 <?= setActivePage2($currentPage, 'blog') ?> fs-eight p-2">
          <span class="fs-five d-flex align-items-center justify-content-center">
            <i class="ph-fill ph-newspaper-clipping"></i>
          </span>
          <span class="d-none d-md-block">Blog</span>
        </a>
      </li>
      <li class="<?= setActivePageMobile($currentPage, 'contact') ?>">
        <a href="contact.php" class="d-flex align-items-center gap-2 <?= setActivePage2($currentPage, 'contact') ?> fs-eight p-2">
          <span class="fs-five d-flex align-items-center justify-content-center"><i
              class="ph-fill ph-envelope"></i></span>
          <span class="d-none d-md-block">Contact</span>
        </a>
      </li>
    </ul>
  </div>
</div>