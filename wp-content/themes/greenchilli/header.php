<!DOCTYPE html>
<?php $options = get_option('greenchilli'); ?>
<html class="no-js" <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo('charset'); ?>">
	<title><?php wp_title(''); ?></title>
	<?php mts_meta(); ?>
	<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'stylesheet_url' ); ?>" />
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
	<?php wp_enqueue_script("jquery"); ?>
	<?php if ( is_singular() ) wp_enqueue_script( 'comment-reply' ); ?>
	<!--[if lt IE 9]>
	<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->
	
	<?php mts_head(); ?>	
	<?php wp_head(); ?>	

	<script src="<?php echo get_template_directory_uri(); ?>/js/modernizr.min.js"></script>
	<script src="<?php echo get_template_directory_uri(); ?>/js/customscript.js" type="text/javascript"></script>
	<script src="<?php echo get_template_directory_uri(); ?>/js/script.js"></script>
</head>

<?php flush(); ?>

<body id ="blog" <?php body_class('main'); ?>>
<div class="for_shadow_box">
    <header>
        <div class="wrapper">
            <div class="top clearfix">
                <div class="header_logo">
                    <a href="/" class="logo"></a>
		    <a href="<?php echo home_url(); ?>" class="logo_link"><?php bloginfo( 'name' ); ?></a>		
                </div>
                <div class="right_top clearfix">
		     <?php echo ppqtrans_generateLanguageSelectCode('both'); ?>
                    <div class="travel">
                        ВСЕГДА В ДВИЖЕНИИ!
                    </div>		   
		    <?php get_search_form(); ?>
                    <ul class="list_social_network ">
                        <li><a href="https://vk.com/" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/images/vk.png" alt="" /></a></li>
                        <li><a href="https://www.facebook.com/" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/images/fc.png" alt="" /></a></li>
                        <li><a href="https://twitter.com/" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/images/tw.png" alt="" /></a></li>
                    </ul>
                </div>
            </div>

        </div>
    </header>    		
				<nav>
					<div class="wrapper">
					<?php if ( has_nav_menu( 'primary-menu' ) ) { ?>
						<?php wp_nav_menu( array( 'theme_location' => 'primary-menu', 'menu_class' => 'nav', 'container' => '' ) ); ?>
	<ul class="nav_secondary">
        </ul>
					<?php } else { ?>
						<ul class="menu">
							<?php wp_list_categories('title_li='); ?>
						</ul>
					<?php } ?>
					</div>
				</nav>	        
<div id="content">