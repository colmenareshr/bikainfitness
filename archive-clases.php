<?php
/**
 * Archive Template for Clases
 * 
 * @package BikainFitness
 */

get_header();
?>

<main id="main" class="site-main">
    <header class="page-header">
        <h1 class="page-title"><?php _e('Nuestras Clases', 'bikainfitness'); ?></h1>
    </header>

    <?php if (have_posts()) : ?>
        <div class="clases-list">
            <?php
            while (have_posts()) : the_post();
                ?>
                <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                    <?php if (has_post_thumbnail()) : ?>
                        <div class="post-thumbnail">
                            <a href="<?php the_permalink(); ?>">
                                <?php the_post_thumbnail('medium'); ?>
                            </a>
                        </div>
                    <?php endif; ?>

                    <div class="entry-summary">
                        <h2 class="entry-title">
                            <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                        </h2>
                        <p><?php the_excerpt(); ?></p>
                        <a href="<?php the_permalink(); ?>" class="read-more"><?php _e('Leer más', 'bikainfitness'); ?></a>
                    </div>
                </article>
                <?php
            endwhile;
            ?>
        </div>

        <div class="pagination">
            <?php
            the_posts_pagination([
                'mid_size' => 2,
                'prev_text' => __('« Anterior', 'bikainfitness'),
                'next_text' => __('Siguiente »', 'bikainfitness'),
            ]);
            ?>
        </div>
    <?php else : ?>
        <p><?php _e('No se encontraron clases.', 'bikainfitness'); ?></p>
    <?php endif; ?>
</main>

<?php
get_footer();
