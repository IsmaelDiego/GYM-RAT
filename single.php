<?php get_header(); ?>
<section id="service" class="padding-medium">
    <div class="container">
        <div class="row g-md-5 pt-4">

            <div class="main-content">
                <div class="page-content">
                    <div class="container-fluid">
                        <?php if (have_posts()) :
                            while (have_posts()) : the_post();


                        ?>
                                <div class="row">
                                    <div class="col-md-12">
                                        <!-- Simple card -->
                                        <div class="card">
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col-md-4 text-center">
                                                        <?php if (has_post_thumbnail()) {
                                                            the_post_thumbnail(array(700, 500));
                                                        }
                                                        ?>
                                                    </div>
                                                    <div class="col-md-8">
                                                        <h5 class="card-title"><b><?php the_title(); ?></b></h5>
                                                        <h5 class=""><b><?php the_excerpt(); ?></b></h5>

                                                        <p class="card-text"><?php the_content(); ?></p>
                                                        <div class="d-flex align-items-center mb-3 ">
                                                            <button class="btn btn-danger" type="button" id="minusBtn" onclick="cambiar_cantidad('resta')">-</button>
                                                            <input type="text" class=" text-center" minlength="0" id="cantidad" value="1" style="width: 100px;" placeholder="1">
                                                            <button class="btn btn-danger" type="button" id="minusBtn" onclick="cambiar_cantidad('suma')">+</button>
                                                        </div>
                                                        <a href="#" class="btn btn-outline-primary btn-sm p-2">Añadir al carrito</a>
                                                        <hr>
                                                        <p class="small text-muted"><i class="fas fa-bookmark"> </i> <?php the_category('&nbsp;-&nbsp;'); ?> | <i class="fas fa-tags"></i><?php the_tags('&nbsp', '&nbsp;-&nbsp;', '&nbsp'); ?></p>
                                                        <div class="tags row">
                                                            <div class=""> </div>
                                                            <div class=""></div>
                                                        </div>
                                                    </div>


                                                </div>
                                        <?php
                                    endwhile;
                                else :
                                    _e('Lo siento no se encontro la categoria seleccionada', 'textdomain');
                                endif; ?>

                                            </div>
                                            <div class="card-footer">
                                                <div class="row">
                                                    <div class="col-6">
                                                        <p class="small text-muted text-star"><b>Publicado por: </b><i class="mdi mdi-admin"></i> <?php the_author(); ?></p>
                                                    </div>
                                                    <div class="col-6">
                                                        <p class="small text-muted text-end"><b>Fecha de publicación: </b><i class="fas fa-clock"></i> <?php the_date(); ?> | <?php the_time(); ?></p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                    </div><!-- end row -->
                </div><!-- end container-fluid -->
            </div><!-- end page-content -->
        </div>
    </div>
</section>
<section id="new-arrival" class="product-store">
    <div class="container">
        <h2 class="display-5 fw-light text-uppercase text-center mb-5">TODOS LOS PRODUCTOS</h2>
        <div class="row">
            <?php
            // Example argument that defines three posts per page.
            $args = array('posts_per_page' => 20);

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

</div><!-- end main-content -->



<script>
    function cambiar_cantidad(tipo) {
        var cantidad_actual = document.getElementById('cantidad').value;
        if (tipo == "suma") {
            var cantidad_nueva = parseInt(cantidad_actual) + 1;
        } else {
            if (tipo == "resta" && cantidad_actual > 1) {
                var cantidad_nueva = parseInt(cantidad_actual) - 1;
            } else {
                var cantidad_nueva = 0;
            }
        }
        document.getElementById('cantidad').value = cantidad_nueva;
    }
</script>

<?php get_footer(); ?>