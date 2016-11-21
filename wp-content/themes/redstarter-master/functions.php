<?php
//navigation - some are pages, others categories;
// Do we just include the links or is there a way to grab the items we want as navigation?
// How do we set up the index/home page? it can't be a single page, SITE FRONT PAGE?
/**
 * RED Starter Theme functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package RED_Starter_Theme
 */

if ( ! function_exists( 'red_starter_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 */
function red_starter_setup() {
	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	// Let WordPress manage the document title.
	add_theme_support( 'title-tag' );

	// Enable support for Post Thumbnails on posts and pages.
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => esc_html( 'Primary Menu' ),
	) );

	// Switch search form, comment form, and comments to output valid HTML5.
	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );

}
endif; // red_starter_setup
add_action( 'after_setup_theme', 'red_starter_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * @global int $content_width
 */
function red_starter_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'red_starter_content_width', 640 );
}
add_action( 'after_setup_theme', 'red_starter_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function red_starter_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html( 'Sidebar' ),
		'id'            => 'sidebar-1',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'red_starter_widgets_init' );

/**
 * Filter the stylesheet_uri to output the minified CSS file.
 */
function red_starter_minified_css( $stylesheet_uri, $stylesheet_dir_uri ) {
	if ( file_exists( get_template_directory() . '/build/css/style.min.css' ) ) {
		$stylesheet_uri = $stylesheet_dir_uri . '/build/css/style.min.css';
	}

	return $stylesheet_uri;
}
add_filter( 'stylesheet_uri', 'red_starter_minified_css', 10, 2 );

/**
 * Enqueue scripts and styles.
 */
function red_starter_scripts() {

	wp_enqueue_style( 'foundation', get_stylesheet_directory_uri() . '/foundation/css/foundation.css' ) ;

	wp_enqueue_style( 'red-starter-style', get_stylesheet_uri() );
    wp_enqueue_style( 'font-icons-style', get_template_directory_uri().'/build/css/font-awesome.min.css' );

	wp_enqueue_script( 'red-starter-skip-link-focus-fix', get_template_directory_uri() . '/build/js/skip-link-focus-fix.min.js', array(), '20130115', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'red_starter_scripts' );

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/* Custom post-type for products */
// require get_template_directory() . '/inc/post-type.php';



// social media sharing

function crunchify_social_sharing_buttons($content) {
    global $post;
    if(is_singular() || is_home()){

        // Get current page URL
        $crunchifyURL = urlencode(get_permalink());

        // Get current page title
        $crunchifyTitle = str_replace( ' ', '%20', get_the_title());

        // Get Post Thumbnail for pinterest
        $crunchifyThumbnail = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' );

        // Construct sharing URL without using any script
        $twitterURL = 'https://twitter.com/intent/tweet?text='.$crunchifyTitle.'&amp;url='.$crunchifyURL.'&amp;via=Crunchify';
        $facebookURL = 'https://www.facebook.com/sharer/sharer.php?u='.$crunchifyURL;
        $googleURL = 'https://plus.google.com/share?url='.$crunchifyURL;
        $bufferURL = 'https://bufferapp.com/add?url='.$crunchifyURL.'&amp;text='.$crunchifyTitle;
        $whatsappURL = 'whatsapp://send?text='.$crunchifyTitle . ' ' . $crunchifyURL;
        $linkedInURL = 'https://www.linkedin.com/shareArticle?mini=true&url='.$crunchifyURL.'&amp;title='.$crunchifyTitle;

        // Based on popular demand added Pinterest too
        $pinterestURL = 'https://pinterest.com/pin/create/button/?url='.$crunchifyURL.'&amp;media='.$crunchifyThumbnail[0].'&amp;description='.$crunchifyTitle;

        // Add sharing button at the end of page/page content
        $content .= '<!-- Crunchify.com social sharing. Get your copy here: http://crunchify.me/1VIxAsz -->';
        $content .= '<div class="crunchify-social">';
        $content .= '<a class="crunchify-link crunchify-facebook" href="'.$facebookURL.'" target="_blank"><i class="fa fa-facebook" aria-hidden="true"></i>LIKE</a>';
        $content .= '<a class="crunchify-link crunchify-twitter" href="'. $twitterURL .'" target="_blank"><i class="fa fa-twitter" aria-hidden="true"></i>TWEET</a>';
        $content .= '<a class="crunchify-link crunchify-pinterest" href="'.$pinterestURL.'" target="_blank"><i class="fa fa-pinterest-p" aria-hidden="true"></i>PIN</a>';
        $content .= '</div>';

        return $content;
    }else{
        // if not a post/page then don't include sharing button
        return $content;
    }
};
add_filter( 'the_content', 'crunchify_social_sharing_buttons');


/* Add a sidebar */
add_action( 'widgets_init', 'add_sidebar' );
function add_sidebar() {
    register_sidebar( array(
        'name' => __( 'Footer Sidebar', 'redstarter' ),
        'id' => 'footer-sidebar',
        'description' => __( 'Widgets in this area will be shown in the footer.', 'redstarter' ),
        'before_widget' => '<li id="%1$s" class="widget %2$s">',
        'after_widget'  => '</li>',
        'before_title'  => '<h2 class="widgettitle">',
        'after_title'   => '</h2>',
    ) );
}

//build class
class camping {
	public $tent ="coleman";

  public function get_tent(){
		return $this -> tent;
	}
}
 class dog{
	 public $breed;
	 public $color;
	 public $bark;
	 private function get_breed(){
		 return $this ->breed;
	 }
	 private function get_color(){
		 return $this ->color;
	 }
	 public function get_dog(){
		 $r= $this -> get_breed();
		 $r.= $this ->get_color();
	 }

 private function get_bark(){
	 return $this -> bark;
 }
 }

 add_action("wp_enqueue_scripts",get_scripts());
 function get_scripts(){
	 $local_path= get_bloginfo("stylesheet_directory")."/js/localScript.js";
	 wp_enqueue_script("local_script",$local_path,array("jquery"),false,true);
	 wp_localize_script("local_script","monkey",array(
		 "rest_url" => esc_url_raw(rest_url()),
		 "security_token" => wp_create_nonce("wp-rest"),
		 "blogName" =>get_bloginfo("name"),
	 )
 );
 }
