<?php get_header(); ?>
<div class="wrapper clearfix">
	
		<article class="article">
			<div id="content_box" >
				<div id="content" class="hfeed">
					<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
						<div id="post-<?php the_ID(); ?>" <?php post_class('g post'); ?>>
						<div class="single_page">
				<?php if ($options['mts_breadcrumb'] == '1') { ?>
					<div class="breadcrumb"><?php the_breadcrumb(); ?></div>
				<?php } ?>
							<header>
								<h1 class="title"><?php the_title(); ?></h1>
							</header>
							<div class="post-content box mark-links">
								<?php the_content(); ?>
								<?php wp_link_pages('before=<div class="pagination">&after=</div>'); ?>
							</div><!--.post-content box mark-links-->
						</div>
						</div>
						<?php if ( ! is_page( ) ) comments_template( '', true ); ?>
					<?php endwhile; ?>
				</div>
			</div>
		</article>
<?php get_sidebar(); ?>
<?php get_footer(); ?>