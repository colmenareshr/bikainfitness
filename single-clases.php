<?php
/**
 * Single Template for Clases
 * 
 * @package BikainFitness
 */

get_header();
?>

<main id="main" class="site-main">
    <?php
    if (have_posts()) :
        while (have_posts()) : the_post();
            ?>
            <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                <header class="entry-header">
                    <h1 class="entry-title"><?php the_title(); ?></h1>
                </header>

                <?php if (has_post_thumbnail()) : ?>
                    <div class="post-thumbnail">
                        <?php the_post_thumbnail('large'); ?>
                    </div>
                <?php endif; ?>

                <div class="entry-content">
                    <?php the_content(); ?>
                </div>

                <footer class="entry-footer">
                    <p class="class-category">
                        <?php
                        $categories = get_the_terms(get_the_ID(), 'categorias-clases');
                        if ($categories) :
                            foreach ($categories as $category) {
                                echo '<span>' . esc_html($category->name) . '</span> ';
                            }
                        endif;
                        ?>
                    </p>
                    <p>
                        <a href="https://wa.me/?text=<?php echo urlencode('¡Hola! Estoy interesado en la clase: ' . get_the_title()); ?>" class="whatsapp-link">
                            Reserva esta clase vía WhatsApp
                        </a>
                    </p>
                </footer>
            </article>
            <?php
        endwhile;
    else :
        echo '<p>' . __('No se encontró la clase.', 'bikainfitness') . '</p>';
    endif;
    ?>
</main>

<?php
get_footer();
