<?php
/*
Template Name: Hero
*/
get_header(); ?>

<header id="homepage-hero" role="banner">
	<div class="row">
		<div class="small-12 medium-6 columns">
			<h1><a href="<?php bloginfo( 'url' ); ?>" title="<?php bloginfo( 'name' ); ?>"><?php bloginfo( 'name' ); ?></a></h1>
			<p><?php bloginfo( 'description' ); ?></p>
		</div>

		<div class="medium-6 columns">
			<?php if ( has_post_thumbnail() ) : ?>
			<div class="show-for-medium-up">
				<?php the_post_thumbnail(); ?>
			</div>
			<?php 
			endif;
			?>
		</div>
	</div>

</header>

	<div class="row">
		<div class="small-12 large-12 columns" role="main">

		<?php do_action( 'foundationpress_before_content' ); ?>

				<div class="entry-content">
					<div class="medium-7 columns">
						<h3 class="home-section-title"><i class="fa fa-newspaper-o"></i> Recent News</h3>
							<div class="home-recent-news">
							<?php 
							// the query
							$the_query = new WP_Query( 'posts_per_page=3' ); ?>

							<?php if ( $the_query->have_posts() ) : ?>

								<!-- pagination here -->

								<!-- the loop -->
								<?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
								<article <?php post_class() ?> id="post-<?php the_ID(); ?>">
									<header>
										<h4><a title="<?php the_title_attribute(); ?>" href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
									<p class="post-date subheader">– <?php echo get_the_date(); ?> –</p>
									</header>
									<?php the_excerpt(); ?>
									<a role="button" title="<?php the_title_attribute(); ?>" href="<?php the_permalink(); ?>" class="button secondary small">Read More ></a>
								</article>
								<hr>
								<?php endwhile; ?>
								<!-- end of the loop -->

								<!-- pagination here -->

								<?php wp_reset_postdata(); ?>

							<?php else : ?>
								<p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>
							<?php endif; ?>
							<a role="button" href="news" class="button secondary expand">See all news <i class="fa fa-newspaper-o"></i></i></a>
						</div>
						<!-- .home-recent-news -->
					</div>
					<!-- .medium-7 -->
					<div class="medium-5 columns">
						<h3 class="home-section-title"><i class="fa fa-comment-o"></i> Contacts</h3>
						<address><strong>The Janusz Korczak Association of Canada</strong>
						#203 - 5455 West Boulevard
						Vancouver BC, V6M 3W5
						<hr>
						Tel. 604.733.6386 (Gina Dimant)
						or 604.264.9990 (Jerry Nussbaum)
						Fax. 604.264.8675
						E-mail: <a href="mailto:jkorczakassn@shaw.ca">jkorczakassn@shaw.ca</a>
						<a href="mailto:canadian.association@januszkorczak.ca">canadian.association@januszkorczak.ca</a></address>
					</div>
					<!-- .medium-6 -->
				</div>
				<!-- .entry-content -->
		<?php do_action( 'foundationpress_after_content' ); ?>

		</div>
	</div>
<?php get_footer(); ?>
