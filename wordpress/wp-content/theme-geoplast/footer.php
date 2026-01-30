<footer>
    <div class="container">
        <div class="footer-start">
            <div class="row">
                <div class="col-12 col-md-5 col-xl-6">
                    <div class="footer-logo">
                        <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
                            <img src="<?php echo get_template_directory_uri(); ?>/assets/image/svg/logo-white.svg" alt="logo">
                        </a>
                    </div>

                    <div class="wrap-form wrap-form-1">
                        <h2 class="h2 ts-40 ts-sm-32">
                            Grow With Us
                        </h2>
                        <p class="ts-14">
                            Get exclusive offers, seasonal care tips & inspiration
                        </p>
                        <form class="form form-1">
                            <div class="form-group">
                                <input type="text" class="input-text" placeholder="Enter your email here">
                            </div>
                            <button class="btn btn-1 w100">Join & Get 10% Off</button>
                        </form>
                        <p style="margin-bottom: 0" class="ts-14 color-white-op">
                            Earn points with every purchase – Join our loyalty club
                        </p>
                    </div>

                </div>
                <div class="col-12 col-md-7 col-xl-6">
                    <div class="row h100">
                        <div class="col-12 col-sm">
                            <div class="row">
                                <div class="col-auto">
                                    <?php WrapFooterMenus(1); ?>
                                </div>
                                <div class="col d-flex justify-content-center">
                                    <?php WrapFooterMenus(2); ?>
                                </div>
                                <div class="col-auto">
                                    <?php WrapFooterMenus(3); ?>
                                </div>
                            </div>
                        </div>
                        <div class="col-7 col-sm-4">
                            <div class="d-flex justify-content-sm-end">
                                <div class="wrap-menu">
                                    <?php WrapFooterMenus(4); ?>
                                </div>
                            </div>
                        </div>

                        <div class="col-5 col-sm-12 mt-auto">
                            <h2 class="menu-title">Social</h2>
                            <ul class="menu menu-social flex-wrap">
                                <?php while( have_rows('social','options') ) : the_row(); ?>
                                    <li>
                                        <a class="icons icons-img" href="<?php the_sub_field('url'); ?>" target="_blank">
                                            <img src="<?php echo get_sub_field('icon')['url']; ?>" alt="">
                                        </a>
                                    </li>
                                <?php endwhile; ?>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer-end">
            <div class="row flex-column-reverse flex-sm-row">
                <div class="col-12 col-sm">
                    <p class="color-white-op fs-14">
                        <?php the_field('footer-left-text','options'); ?>
                    </p>
                    <div class="d-inline-flex align-items-center payment">
                        <span class="color-white-op">Payment methods:</span>
                        <img style="margin-left: 2.3rem" src="<?php echo get_template_directory_uri(); ?>/assets/image/png/payment.png" alt="">
                    </div>
                </div>
                <div class="col-12 col-sm-auto">
                    <p class="copyright color-white-op fs-14">
                        <?php the_field('footer-right-text','options'); ?>
                    </p>
                    <ul class="menu menu-3">
                        <?php
                        wp_nav_menu( [
                                'theme_location'  => 'footer-menu-end',
                                'container'       => '',
                                'menu_class'      => 'menu',
                                'items_wrap'      => '%3$s', // без <ul>
                                'fallback_cb'     => false,
                        ] );
                        ?>
                    </ul>

            </div>
        </div>
    </div>
</footer>

</div><!-- .body -->
<?php wp_footer(); ?>
</body>
</html>