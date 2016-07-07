<?php get_header(); ?>

<?php
    $images = get_field('banner_topo', 'option');
    if($images): ?>
        <section id="banner-home" style="background: url('<?php echo $images["sizes"]["Banner Home"]; ?>') no-repeat center top / cover"> </section>
<?php 
    endif;
?>

<div class="container">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <?php if(have_posts()) : while(have_posts()) : the_post(); ?>
                    <div class="col-xs-12 pull-right search-result">
                        <a href="<?php the_permalink(); ?>">
                            <h2><?php the_title(); ?></h2>
                            <span><?php echo excerptLeiaMais('50'); ?></span>
                        </a>
                    </div>
                <?php endwhile; endif; ?>
            </div>
        </div>
    </div>
</div>

<?php get_footer(); ?>