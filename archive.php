<?php
/**
 * @package WordPress
 * @subpackage Conexão Inteligente
 * @since Conexão Inteligente 1.0
**/
?>
<?php get_header(); ?>

<?php
$segunda_consulta = new WP_Query( 
    array( 
        'post_type'         => 'noticias',
        'order'             =>  'DESC',
        'paged'             => $paged,
    ) 
);
?>

<div class="container">
    <div class="container-fluid">
        <div class="row">
            <section class="col-sm-8" role="article">
                <?php if ( $segunda_consulta->have_posts() ): ?>
                    <?php while ( $segunda_consulta->have_posts() ): ?>                    
                        <?php $segunda_consulta->the_post(); ?>
                         <ul class="list-news">
                            <li class="list-news-image">
                                <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail("Thumb"); ?></a>
                            </li>
                            <li class="list-news-date">
                                <?php the_time("d/m/Y"); ?>
                            </li>
                            <li class="list-news-title">
                                <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                            </li>
                            <li class="list-news-text">
                                <p><?php echo excerptLeiaMais('55'); ?></p>
                            </li>
                        </ul>        
                    <?php endwhile; ?>
                        <?php post_pagination();?>
                <?php endif; ?>
                <?php wp_reset_postdata(); ?>
            </section>
            <aside class="col-sm-4" role="complementary">
                <?php get_header("sidebar2"); ?>
            </aside>
        </div>
    </div>
</div>

<?php get_footer(); ?>