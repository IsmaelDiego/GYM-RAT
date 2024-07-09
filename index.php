<?php get_header(); ?>


<!-- ============================================================== -->
<!-- Start right Content here -->
<!-- ============================================================== -->

<section id="hero" style="background-image:url(<?php bloginfo('template_url'); ?>/plantilla/images/banner-img1.jpg);">
  <div class="container padding-large">
    <div class="row">
      <div class="col-md-6 col-lg-5 offset-md-2 text-center bg-black p-5">
        <h2 class="display-1 banner-text text-uppercase text-white mt-3">ROPA GYM</h2>
        <p class="text-uppercase text-white mb-4">CAMISETAS MODERNAS DE ALTA CALIDAD PARA MODA URBANA.</p>
        <a href="#" class="btn btn-outline-light btn-wrap">
          Empezar a comprar <i class="icon icon-arrow-io fs-5 align-text-bottom"></i>
        </a>
      </div>
    </div>
  </div>
</section>

<section id="service" class="padding-medium">
  <div class="container">
    <div class="row g-md-5 pt-4">
      <div class="col-md-3 my-3">
        <div class="card">
          <div>
            <iconify-icon class="service-icon text-primary fs-2" icon="ci:shopping-cart-02"></iconify-icon>
          </div>
          <h4 class="py-2 m-0">Entrega Gratis</h3>
            <div class="card-text">
              <p class="blog-paragraph fs-6"></p>
            </div>
        </div>
      </div>
      <div class="col-md-3 my-3">
        <div class="card">
          <div>
            <iconify-icon class="service-icon text-primary fs-2" icon="tdesign:secured"></iconify-icon>
          </div>
          <h4 class="py-2 m-0">Pago 100% Seguro</h3>
            <div class="card-text">
              <p class="blog-paragraph fs-6"></p>
            </div>
        </div>
      </div>
      <div class="col-md-3 my-3">
        <div class="card">
          <div>
            <iconify-icon class="service-icon text-primary fs-2" icon="la:award"></iconify-icon>
          </div>
          <h4 class="py-2 m-0">Garantía De Calidad</h3>
            <div class="card-text">
              <p class="blog-paragraph fs-6"></p>
            </div>
        </div>
      </div>
      <div class="col-md-3 my-3">
        <div class="card">
          <div>
            <iconify-icon class="service-icon text-primary fs-2" icon="solar:dollar-outline"></iconify-icon>
          </div>
          <h4 class="py-2 m-0">Oferta Diaria</h3>
            <div class="card-text">
              <p class="blog-paragraph fs-6"></p>
            </div>
        </div>
      </div>

    </div>
  </div>
</section>

<section id="new-arrival" class="product-store">
  <div class="container">
    <h2 class="display-5 fw-light text-uppercase text-center mb-5">TODOS LOS PRODUCTOS</h2>
    <div class="row">
      <?php
      // Example argument that defines three posts per page.
      $args = array('posts_per_page' => 30);

      // Variable to call WP_Query.
      $the_query = new WP_Query($args);

      if ($the_query->have_posts()) :
        // Start the Loop
        while ($the_query->have_posts()) : $the_query->the_post(); ?>
          <div class="col-md-6 col-lg-4 my-4">

            <div class="product-item">
              <div class="image-holder" style="width: 100%; height: 100%;">
                <a href="<?php the_permalink(); ?>" class="text-center">
                  <?php
                  if (has_post_thumbnail()) {
                    the_post_thumbnail(array(400, 400));
                  }
                  ?></a>
              </div>
              <span class="badge text-black"><?php the_category('&nbsp;|&nbsp;'); ?></span>
              <div class="product-detail d-flex justify-content-between align-items-center mt-4">

                <h4 class="product-title mb-0">
                  <a href="#"><?php the_title(); ?></a>

                </h4>
              </div>
              <p class="badge text-black"><?php the_tags('&nbsp', '&nbsp;|&nbsp;', '&nbsp'); ?></p>
              <p class="m-0 fs-5 fw-normal"><?php the_excerpt(); ?></p>
            </div>
          </div>
      <?php
        // End the Loop
        endwhile;
      else :
        // If no posts match this query, output this text.
        _e('Sorry, no posts matched your criteria.', 'textdomain');
      endif;

      wp_reset_postdata();
      ?>

    </div>
    <div class="text-center mt-5 pt-4">
      <button type="submit" class="btn btn-dark rounded-3">View All Products</button>
    </div>
  </div>
</section>

<section id="category" class="padding-medium">
  <div class="container-fluid">
    <div class="row px-md-5">



    </div>
  </div>
</section>


<?php
get_footer();
?>