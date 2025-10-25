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
                <div class="footer-info">
                    <div class="site-info">
                        <?php 
                        $footer_text = get_field('footer_text', 'option');
                        if ($footer_text) {
                            echo wp_kses_post($footer_text);
                        } else {
                            ?>
                            <p>&copy; <?php echo date('Y'); ?> <?php bloginfo('name'); ?>. <?php esc_html_e('All rights reserved.', 'casino'); ?></p>
                            <?php
                        }
                        ?>
                    </div>
                    
                    <?php
                    // Footer contact info
                    $footer_phone = get_field('footer_phone', 'option');
                    $footer_email = get_field('footer_email', 'option');
                    $footer_address = get_field('footer_address', 'option');
                    ?>
                    
                    <?php if ($footer_phone || $footer_email || $footer_address) : ?>
                        <div class="footer-contact">
                            <?php if ($footer_phone) : ?>
                                <p><strong><?php esc_html_e('Phone:', 'casino'); ?></strong> <a href="tel:<?php echo esc_attr($footer_phone); ?>"><?php echo esc_html($footer_phone); ?></a></p>
                            <?php endif; ?>
                            
                            <?php if ($footer_email) : ?>
                                <p><strong><?php esc_html_e('Email:', 'casino'); ?></strong> <a href="mailto:<?php echo esc_attr($footer_email); ?>"><?php echo esc_html($footer_email); ?></a></p>
                            <?php endif; ?>
                            
                            <?php if ($footer_address) : ?>
                                <p><strong><?php esc_html_e('Address:', 'casino'); ?></strong> <?php echo esc_html($footer_address); ?></p>
                            <?php endif; ?>
                        </div>
                    <?php endif; ?>
                </div>
                
                <div class="footer-navigation">
                    <?php
                    wp_nav_menu(array(
                        'theme_location' => 'footer',
                        'menu_class'     => 'footer-menu',
                        'container'      => false,
                        'depth'          => 1,
                        'fallback_cb'    => false,
                    ));
                    ?>
                </div>
            </div>
        </div>
    </footer>

</div><!-- #page -->

<?php get_template_part('templates/parts/footer-scripts'); ?>
</body>
</html>
