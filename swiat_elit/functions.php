<?php

function register_my_menus() {
  register_nav_menus(
    array(
      'header-menu' => __( 'Header Menu' ),
      'top-menu' => __( 'Top Menu' )
    )
  );
}
add_action( 'init', 'register_my_menus' );

if (function_exists('add_theme_support')) {
    // Add Menu Support
    add_theme_support('menus');

    add_theme_support('post-thumbnails');
    add_image_size('large', 700, '', true); // Large Thumbnail
    add_image_size('medium', 256, '', true); // Medium Thumbnail
    add_image_size('small', 120, '', true); // Small Thumbnail
    add_image_size('custom-size', 700, 200, true); // Custom Thumbnail Size call using the_post_thumbnail('custom-size');

    add_theme_support('automatic-feed-links');
}

remove_filter( 'the_excerpt', 'wpautop' );


function swiat_index($length) // Create 20 Word Callback for Index page Excerpts, call using html5wp_excerpt('html5wp_index');
{
    return 18;
}

function swiat_post_list($length) // Create 20 Word Callback for Index page Excerpts, call using html5wp_excerpt('html5wp_index');
{
    return 53;
}

// Create 40 Word Callback for Custom Post Excerpts, call using html5wp_excerpt('html5wp_custom_post');
function swiat_custom_post($length)
{
    return 40;
}

// Create the Custom Excerpts callback
function swiat_excerpt($length_callback = '', $more_callback = '')
{
    global $post;
    if (function_exists($length_callback)) {
        add_filter('excerpt_length', $length_callback);
    }
    if (function_exists($more_callback)) {
        add_filter('excerpt_more', $more_callback);
    }
    $output = get_the_excerpt();
    $output = apply_filters('wptexturize', $output);
    $output = apply_filters('convert_chars', $output);
    $output = '<p>' . $output . '</p>';
    echo $output;
}

function the_breadcrumb() {
		echo '<ul class="crumbs">';
	if (!is_home()) {
		echo '<li><a href="';
		echo get_option('home');
		echo '">';
		echo 'Home';
		echo "</a></li>";
		if (is_category() || is_single()) {
			echo '<li>';
			the_category(' </li><li> ');
			if (is_single()) {
				echo "</li><li>";
				the_title();
				echo '</li>';
			}
		} elseif (is_page()) {
			echo '<li>';
			echo the_title();
			echo '</li>';
		}
	}
	elseif (is_tag()) {single_tag_title();}
	elseif (is_day()) {echo"<li>Archive for "; the_time('F jS, Y'); echo'</li>';}
	elseif (is_month()) {echo"<li>Archive for "; the_time('F, Y'); echo'</li>';}
	elseif (is_year()) {echo"<li>Archive for "; the_time('Y'); echo'</li>';}
	elseif (is_author()) {echo"<li>Author Archive"; echo'</li>';}
	elseif (isset($_GET['paged']) && !empty($_GET['paged'])) {echo "<li>Blog Archives"; echo'</li>';}
	elseif (is_search()) {echo"<li>Search Results"; echo'</li>';}
	echo '</ul>';
}

register_sidebar(array('name' => 'Newsletter'));
register_sidebar(array('name' => 'Prenumerata'));

if (function_exists('register_sidebar')) {
    register_sidebar(array(
        'name' => __('Widget Area 1', 'swiatelit'),
        'description' => __('Description for this widget-area...', 'swiatelit'),
        'id' => 'widget-area-1',
        'before_widget' => '<div id="%1$s" class="%2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h3>',
        'after_title' => '</h3>'
    ));

    register_sidebar(array(
        'name' => __('Widget Area 2', 'swiatelit'),
        'description' => __('Description for this widget-area...', 'swiatelit'),
        'id' => 'widget-area-2',
        'before_widget' => '<div id="%1$s" class="%2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h3>',
        'after_title' => '</h3>'
    ));
}

add_filter('widget_text', 'do_shortcode');
add_filter('widget_text', 'shortcode_unautop');

function pagination()
{
    global $wp_query;
    $big = 999999999;
    echo paginate_links(array(
        'base' => str_replace($big, '%#%', get_pagenum_link($big)),
        'format' => '?paged=%#%',
        'current' => max(1, get_query_var('paged')),
        'total' => $wp_query->max_num_pages
    ));
}

add_action('init', 'pagination'); // Add our HTML5 Pagination

add_action( 'admin_menu', 'swiat_social_register' );

add_theme_support( 'custom-logo', array(
		'width'       => 288,
		'height'      => 66,
		'flex-width'  => true,
	) );

function swiat_social_register() {
    add_theme_page(
        'Ikonki Socialne',     // page title
        'Ikonki Socialne',     // menu title
        'manage_options',   // capability
        'social-icons',     // menu slug
        'swiat_social_render' // callback function
    );
}

function swiat_social_render() {
    global $title;

    print '<div class="wrap">';
    print "<h1>$title</h1>";
    print "<p>Tutaj dodasz adresy do spolecznosci</p>";

    $file = plugin_dir_path( __FILE__ ) . "included.html";

    if ( file_exists( $file ) )
        require $file;

    print "<p>Adres do Fanpage'a:</p>";
    print "<input name='facebook' type='text' id='facebook' value='Świat Elit' class='regular-text'>";
    print "<p>Adres do Instagram'a:</p>";
    print "<input name='instagram' type='text' id='instagram' value='Świat Elit' class='regular-text'>";
    print "<p>Adres do Twitter'a:</p>";
    print "<input name='twitter' type='text' id='twitter' value='Świat Elit' class='regular-text'>";

    print '</div>';
}
