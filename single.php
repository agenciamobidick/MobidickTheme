<?php get_header(); ?>  

<?php
    $args = array(
        'post_type' => 'page',
        'name'      => 'blog'
    );   
    $my_posts = get_posts($args);
    if( $my_posts ): foreach( $my_posts as $post ) : setup_postdata($post);
?>

    <div class="banner">
        <?php 
            $image = get_field('banner');
            $url = $image['url'];
            $size = 'Banner Internas';
            $thumb = $image['sizes'][$size];
        ?>
        <div class="banner-img" style="background:url(<?php echo $thumb; ?>) no-repeat center center;"></div>
    </div>

<?php endforeach; endif; ?>

<div class="container">
    <div class="container-fluid">
        <div class="row breadcrumbs">
            <div class="col-sm-12">
                <span typeof="v:Breadcrumb">
                    <a class="home" href="http://192.168.25.25:8888/Conexão Inteligente" title="Go to Conexão Inteligente." property="v:title" rel="v:url">Home</a>
                </span> 
                - 
                <span typeof="v:Breadcrumb">
                    <a class="home" href="http://192.168.25.25:8888/blog" title="Go to Blog." property="v:title" rel="v:url">Blog</a>
                </span>
            </div>
        </div>
        <div class="row div-blog">
            <div class="col-md-8">
                <?php if(have_posts()) : while(have_posts()) : the_post(); ?>
                    <div class="posts">                        
                        <div class="img-post"><a href="<?php the_permalink(); ?>"><?php the_post_thumbnail("Posts Blog"); ?></a></div>
                        <span class="date"><?php the_time('d/m/Y') ?></span>
                        <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                        <p><?php the_content() ?></p>
                    </div>                
                <?php endwhile; else: ?>
                    <p>Nenhum post cadastrado</p>
                <?php endif; ?>
            </div>
            <div class="col-md-3">
                <?php get_sidebar(); ?>
            </div>
        </div>
    </div>
</div>

<?php get_footer(); ?>