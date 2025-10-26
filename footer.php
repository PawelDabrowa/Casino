<?php
/**
 * The template for displaying the footer
 *
 * @package Casino
 */

// Prevent direct access
if (!defined('ABSPATH')) {
    exit;
}
?>

    </main><!-- #primary -->

    <footer id="colophon" class="site-footer">
        <div class="container">
            <div class="footer-content">
                <!-- Logo Section -->
                <div class="footer-logo">
                    <?php if (has_custom_logo()) : ?>
                        <?php the_custom_logo(); ?>
                    <?php else : ?>
                        <div class="footer-logo-custom">
                            <div class="logo-icon">
                                <div class="crown-icon">
                                    <div class="hexagon">TOP 10</div>
                                </div>
                            </div>
                            <div class="logo-text">
                                <h2>Casino Hotels</h2>
                                <span>Worldwide</span>
                            </div>
                        </div>
                    <?php endif; ?>
                </div>

                <!-- Navigation Menu -->
                <div class="footer-navigation">
                    <?php
                    wp_nav_menu(array(
                        'theme_location' => 'footer',
                        'menu_class'     => 'footer-menu',
                        'container'      => false,
                        'depth'          => 1,
                        'fallback_cb'    => 'casino_footer_fallback_menu',
                    ));
                    ?>
                </div>

                <!-- Separator Line -->
                <div class="footer-separator"></div>

                <!-- Responsible Gambling Section -->
                <div class="footer-gambling">
                    <div class="gambling-info">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/gamble.svg" alt="BeGambleAware.org" class="gambling-icon">
                    </div>
                </div>

                <!-- Copyright Section -->
                <div class="footer-copyright">
                    <p>&copy; 2022 Top 10 Casinos Worldwide. All rights reserved.</p>
                </div>
            </div>
        </div>
    </footer>

</div><!-- #page -->

<?php get_template_part('templates/parts/footer-scripts'); ?>
</body>
</html>
