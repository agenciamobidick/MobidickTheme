<?php get_header(); ?>
<?php get_header("banner-categorias"); ?>

<div class="taxonomy">
	<div class="container">
	    <div class="container-fluid">
	    	<div class="row">
	    		<div class="col-sm-12">
						<?php
							$terms = get_the_terms( $post->ID , 'categoria');
							foreach($terms as $term){
								echo "<h1>".$term->name."</h1>";
							} 
						?>
	    		</div>
	    		<div class="col-sm-12">
	    			<div class="holder-select">
	    				<?php fjarrett_custom_taxonomy_dropdown( 'categoria' ); ?>
	    			</div>
	    		</div>
	    	</div>
	        <div class="row">
	            <section class="col-sm-12" role="article">
	            	<div id="mais-vistos" class="row">
		                <?php if (have_posts() ): while (have_posts() ):the_post(); ?>					
							<div class="col-xs-12">
								<a href="<?php the_permalink(); ?>" class="list-news">
									<?php
										$imageGaleria = get_field('imagem');
										if( !empty($imageGaleria) ): 
									?>
											<div class="holder-image">
												<img src="<?php echo $imageGaleria['sizes']['Listagem Notícias']; ?>" alt="<?php echo $imageGaleria['alt']; ?>" />						
												<?php
													$terms2 = get_the_terms( $post->ID , 'categoria');
													foreach($terms2 as $term2):
														$Hex_color2 = get_field('cor_das_categorias', $term2 );
														$RGB_color2 = hex2rgb($Hex_color2);
														$Final_Rgb_color2 = implode(", ", $RGB_color2);
														echo "<div class='category2' style='background-color: rgba(".$Final_Rgb_color2.", 0.7);'>".$term2->name."</div>";
													endforeach;
												?>
											</div>
									<?php
										endif;
									?>
									<h2><?php the_title(); ?></h2>
									<?php echo custom_field_excerpt(); ?>
								</a>
							</div>					
						<?php endwhile; endif; ?>
						<div class="col-xs-12 col-sm-12 holder-pagination">
							<?php post_pagination(); ?>
						</div>
						<?php wp_reset_postdata(); ?>
					</div>
	            </section>
	        </div>
	    </div>
	</div>
</div>

<?php
$nova_consulta = new WP_Query( 
    array(
    	'post_type' 		  => 'noticias',
        'posts_per_page'      => 4,                 // Máximo de 5 artigos
        'no_found_rows'       => true,              // Não conta linhas
        'post_status'         => 'publish',         // Somente posts publicados
        'ignore_sticky_posts' => true,              // Ignora posts fixos
        'orderby'             => 'meta_value_num',  // Ordena pelo valor da post meta
        'meta_key'            => 'tp_post_counter', // A nossa post meta
        'order'               => 'DESC',            // Ordem decrescente
    )
);
?>
<div class="container">
	<div class="container-fluid">
		<div class="cartola">
			<div class="row">
				<div class="col-sm-12">
					<span>MAIS LIDAS</span>
				</div>
			</div>
		</div>
		<div id="mais-vistos" class="row">
			<?php if ( $nova_consulta->have_posts() ): while ( $nova_consulta->have_posts() ): $nova_consulta->the_post(); ?>		    
				<div class="col-xs-6">
					<a href="<?php the_permalink(); ?>">
						<?php
							$imageGaleria = get_field('imagem');
							if( !empty($imageGaleria) ): ?>
								<div class="holder-image">
									<img src="<?php echo $imageGaleria['sizes']['thumbnail']; ?>" alt="<?php echo $imageGaleria['alt']; ?>" />
								</div>
							<?php endif;
						?>
						<h5><?php the_title(); ?></h5>
					</a>
				</div>
		    <?php endwhile; endif;
		    wp_reset_postdata(); ?>
		</div>		
	</div>
</div>	

<?php get_footer(); ?>