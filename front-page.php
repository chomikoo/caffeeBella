<?php get_header(); ?>

	<main>
		
		<section id="about" class="about">
			<h2 class="sub-title"><?php the_field( 'o_nas_tytul' ); ?></h2>
			<?php the_field( 'o_nas_text' ); ?>
		</section><!-- .about -->

		<section id="cupcakes" class="cupcakes">
			<h2 class="sub-title"><?php the_field( 'nasze_wypieki_tytul' ); ?></h2>
			
			<?php the_field( 'nasze_wypieki_1' ); ?>
			<?php the_field( 'nasze_wypieki_2' ); ?>
			<?php the_field( 'nasze_wypieki_3' ); ?>

		</section><!-- .cupcakes -->



<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>











		<section id="gallery" class="menu">
			<h2 class="sub-title"><?php the_field( 'produkty_tytul' ); ?></h2>
			<?php the_field( 'produkty_tekst' ); ?>

			<div class="tabs__nav">
				
				<?php 
					$args = array( 'taxonomy' => 'product_type' );

					$terms = get_terms('product_type', $args);

					$count = count($terms); $i=0;
					if ($count > 0) {
					    foreach ($terms as $term) {
					        $i++;
					        $term_list .= '<a href="#tab-'. $i .'" ">' . $term->name . '</a>';
					    }
					    echo $term_list;
					}
					wp_reset_postdata();
				?>

			</div>

			<div class="tabs__container">


				<?php 
					$args = array( 'taxonomy' => 'product_type' );

					$terms = get_terms('product_type', $args);

					$count = count($terms); $i=0;
					if ($count > 0) {
					    // $cape_list = '<p class="my_term-archive">';
					    foreach ($terms as $term) {
					        $i++;

					        // $term_list .= '<a href="#tab-'. $i .'" ">' . $term->name . '</a>';
					        ?>

	        			    <div id="tab1" class="tabs__content active">

						        <h3 class="tab-title">
						            <?php echo $term->name ?>
						            <!-- <?php echo $term->slug ?> -->

						        </h3>
						        <div class="products">
						            
						            <?php 

										$newargs = array(
										 'post_type' => 'products',
										 'post_per_page' => -1,
										 'tax_query' => array(
											  array(
											   'taxonomy' => 'product_type',
											   'field' => 'slug',
											   'terms' => $term->slug
											  )
										 )
										);

										$products_query = new WP_Query( $newargs );

										if( $products_query ->have_posts() ) :
											while($products_query ->have_posts() ) : $products_query->the_post(); ?>
										
												<div class="tab-content" > 
													<?php if( has_post_thumbnail() ) { ?>

														<img src="<?php echo get_the_post_thumbnail_url(); ?>" alt="<?php the_title(); ?>" > 
														
													<?php } ?>
													<h4 class="menu__title"><?php  the_title(); ?> </h4>

												</div>
											
										<?php endwhile; endif;
										wp_reset_postdata();
						            ?>


						        </div>
						    </div>

					        <?php




					    }
					    // echo $term_list;
					}
					wp_reset_postdata();
				?>


			    <article id="tab1" class="tabs__content active">

			        <h3 class="tab-title">
			            Treść pierwszej zakładki
			        </h3>
			        <div class="tab-text">
			            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cumque fugit itaque modi necessitatibus pariatur...
			        </div>
			    </article>
			   
			</div>

		</section><!-- .gallery -->
<br>
<br>
<br>
<br>
<br>
<br>

		<section id="contact" class="contact">
			<h2 class="sub-title"><?php the_field( 'kontakt_tytul' ); ?></h2>
			<?php the_field( 'kontakt_formularz' ); ?>
			<?php the_field( 'kontakt_text' ); ?>

			
		</section><!-- .contanct -->

	</main>

<?php get_footer(); ?>   