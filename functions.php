<?php
global $float;
define("THEME_DIR",get_template_directory_uri());
define("LANG", ICL_LANGUAGE_CODE);

//get_template_part("admin/ajax");
get_template_part("admin/cf7_integration");

require(dirname(__FILE__) . '/admin/ajax.php');

if( is_rtl() ) {
	$float = 'right';
} else {
	$float = 'left';
}


add_filter('body_class','browser_body_class');
function browser_body_class($classes) {
	global $is_lynx, $is_gecko, $is_IE, $is_opera, $is_NS4, $is_safari, $is_chrome, $is_iphone;

	if($is_lynx) $classes[] = 'lynx';
	elseif($is_gecko) $classes[] = 'gecko';
	elseif($is_opera) $classes[] = 'opera';
	elseif($is_NS4) $classes[] = 'ns4';
	elseif($is_safari) $classes[] = 'safari';
	elseif($is_chrome) $classes[] = 'chrome';
	elseif($is_IE) $classes[] = 'ie';
	else $classes[] = 'unknown';

	if($is_iphone) $classes[] = 'iphone';

	$classes[] = 'site_lang_'.LANG;

	return $classes;
}

$lang = TEMPLATEPATH . '/lang';
load_theme_textdomain('insightec', $lang);
require(dirname(__FILE__) . '/types.php');

add_filter('language_attributes', 'lang_class');
function lang_class($output) {
    return $output . ' class="no-js '.LANG.'"';
}


remove_action('wp_head', 'wp_generator');
add_theme_support( 'post-thumbnails' );

// include TEMPLATEPATH.'/functions/templateTags.php';

function custom_excerpt_length( $length ) {
	return 20;
}
add_filter( 'excerpt_length', 'custom_excerpt_length', 999 );

function new_excerpt_more( $more ) {
		return '';
}
add_filter('excerpt_more', 'new_excerpt_more');

add_theme_support( 'post-thumbnails' );

/***********************************************
	      I M A G E   S I Z E
***********************************************/
// home
add_image_size( 'home_banner_img', 1200, 370, true );

// about / state
add_image_size( 'about_state_img', 438  ,510, true );

// contact
add_image_size( 'contact_banner_img', 1200, 145, true );

// Downloads
add_image_size( 'downloads_banner_img', 1200, 185, true );

// News
add_image_size( 'news_banner_img', 1200, 185, true );
add_image_size( 'news_banner_item', 1140, 240, true );

// state
add_image_size( 'state_man_img', 283, 205, true );
add_image_size( 'state_project_img', 263, 175, true );

// water / industrial
add_image_size( 'solution_cat_box', 380, 380, true );

// water
add_image_size( 'water_banner_img', 1200, 372, true );

// industrial
add_image_size( 'indus_banner_img', 1200, 385, true );

// taxonomy cat
add_image_size( 'taxonomy_banner_img', 1200, 467, true );

add_image_size( 'socials_img', 42, 42, true );


	function enqueue_my_styles() {
	    $foundation         = THEME_DIR . '/css/foundation.min.css';
	    $font_awesome       = 'https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css';
	    $slick				= '//cdn.jsdelivr.net/jquery.slick/1.5.9/slick.css';
	    $slickTheme			= '//cdn.jsdelivr.net/jquery.slick/1.5.9/slick-theme.css';
	    $chosen           	= THEME_DIR . '/css/chosen.min.css';
	    $magnific           = THEME_DIR . '/css/magnific-popup.css';
	    $animate           	= THEME_DIR . '/css/animate.css';
	    $mainStyle          = THEME_DIR . '/css/style.css';
	    $queryStyle         = THEME_DIR . '/css/media-quires.css';
	    $rtlres         	= THEME_DIR . '/css/rtl-responsive.css';
	    $foundation_rtl     = 'https://cdnjs.cloudflare.com/ajax/libs/foundation/6.2.0/foundation-rtl.min.css';
	    $rtl 				= THEME_DIR . '/css/rtl.css';
	    $fonts 				= THEME_DIR . '/fonts/style.css';

	    if( !is_rtl() ) {
	    	wp_enqueue_style( 'foundation', $foundation, array(), NULL, 'all' );
	    } else {
	    	wp_enqueue_style(  'foundation_rtl', $foundation_rtl, array(), 'v1', 'all' );
	    }

	    wp_enqueue_style( 'font_awesome', $font_awesome, array(), NULL, 'all' );
	    wp_enqueue_style( 'slick', $slick, array(), NULL, 'all' );
	    wp_enqueue_style( 'slickTheme', $slickTheme, array(), NULL, 'all' );
	    wp_enqueue_style( 'chosen', $chosen, array(), NULL, 'all' );
	    wp_enqueue_style( 'magnific', $magnific, array(), NULL, 'all' );
	    wp_enqueue_style( 'animate', $animate, array(), NULL, 'all' );
	    wp_enqueue_style( 'fonts', $fonts, array(), NULL, 'all' );



	    wp_enqueue_style( 'mainStyle', $mainStyle, array(), NULL, 'all' );
	    wp_enqueue_style( 'queryStyle', $queryStyle, array(), NULL, 'all' );

	    if ( is_rtl() ) {
	      wp_enqueue_style(  'rtl', $rtl, array(), 'v1', 'all' );
	      wp_enqueue_style(  'rtlres', $rtlres, array(), 'v1', 'all' );
	    }
	}
	add_action( 'wp_enqueue_scripts', 'enqueue_my_styles' );

##############################################################################################

	function register_my_jscripts() {
   wp_register_script( 'slick', '//cdn.jsdelivr.net/jquery.slick/1.5.9/slick.min.js', array( 'jquery' ), '1', true ); wp_enqueue_script( 'slick' );
   wp_register_script( 'chosen', THEME_DIR . '/js/chosen.jquery.min.js', array( 'jquery' ), '1', true ); wp_enqueue_script( 'chosen' );
   wp_register_script( 'magnific', THEME_DIR . '/js/jquery.magnific-popup.min.js', array( 'jquery' ), '1', true ); wp_enqueue_script( 'magnific' );
   wp_register_script( 'foundation', THEME_DIR . '/js/foundation.min.js', array( 'jquery' ), '1', true ); wp_enqueue_script( 'foundation' );

   wp_register_script( 'notify', THEME_DIR .'/js/notify.js', array( 'jquery' ), '1', true ); wp_enqueue_script( 'notify' );
   wp_register_script( 'scrollSpeed', THEME_DIR .'/js/jQuery.scrollSpeed.js', array( 'jquery' ), '1', true ); wp_enqueue_script( 'scrollSpeed' );


   wp_register_script( 'scripts', THEME_DIR .'/js/scripts.js', array( 'jquery' ), '1', true ); wp_enqueue_script( 'scripts' );
	}
	add_action('wp_enqueue_scripts', 'register_my_jscripts');

##############################################################################################

	add_action( 'init', 'register_my_menus' );
	function register_my_menus() {
	    register_nav_menus(array('top_menu' =>  'Top Menu',
	    					'top_menu_mobile' =>  'Top Menu Mobile',
	    					'footer_menu' =>  'Footer Menu'

	    ));
	}



##############################################################################################

	// $new_general_setting = new new_general_setting();

	// 	class new_general_setting {
	// 	    function new_general_setting( ) {
	// 	        add_filter( 'admin_init' , array( &$this , 'register_fields' ) );
	// 	    }
	// 	    function register_fields() {
	// 	        register_setting( 'general', 'slogan_sentence', 'esc_attr' );
	// 	        add_settings_field('slogan_sentx', '<label for="slogan_sentence">'.__('Slogan Sentence' , 'sagive' ).'</label>' , array(&$this, 'fields_html') , 'general' );
	// 	    }
	// 	    function fields_html() {
	// 	        $value = get_option( 'slogan_sentence', '' );
	// 	        echo '<input type="text" id="slogan_sentence" name="slogan_sentence" value="' . $value . '" style="width: 65%" />';
	// 	    }
	// 	}

##############################################################################################

/***************************************************************
** DYNAMIC EXCERPT
***************************************************************/
// Variable excerpt length.
function dynamic_excerpt($length) { // Variable excerpt length. Length is set in characters
    global $post;
    $text = $post->post_excerpt;
    if ( '' == $text ) {
    $text = get_the_content('');
    $text = apply_filters('the_content', $text);
    $text = str_replace(']]>', ']]>', $text);
    }
    $text = strip_shortcodes($text); // optional, recommended
    $text = strip_tags($text); // use ' $text = strip_tags($text,'<p><a>'); ' if you want to keep some tags
    $text = mb_substr($text,0,$length).' ...';
    echo $text;
    // Use this is if you want a unformatted text block
    //echo apply_filters('the_excerpt',$text); // Use this if you want to keep line breaks
}


		/************************************
		**  REGISTER SIDEBARS
		************************************/
		register_sidebar(array(
		    'name' => __('Home Sidebar', 'sagive'),
		    'id' => 'home-sidebar',
		    'description' => __('Main Home Sidebar', 'sagive')
		));



		if( function_exists('acf_add_options_page') ) {

		acf_add_options_page(array(
			'page_title' 	=> 'Theme General Settings',
			'menu_title'	=> 'Theme Settings',
			'menu_slug' 	=> 'theme-general-settings',
			'capability'	=> 'edit_posts',
			'redirect'		=> false
		));

	}



/************************************
	**  LANGUGES
************************************/
function icl_post_languages(){
	$languages = icl_get_languages('skip_missing=0');

	$flag = array();

	$flags_repeater = get_field('flags_repeater','option');
	if($flags_repeater){
		foreach($flags_repeater as $item){
			$flag[$item['language_code']] = $item['language_flag_image']['url'];
		}
	}
	// $flag['he'] = THEME_DIR.'/images/israelflag.png';
	// $flag['en'] = THEME_DIR.'/images/enflag.png';
	// $flag['fr'] = THEME_DIR.'/images/frflag.png';
	// $flag['de'] = THEME_DIR.'/images/germanyflag.png';
	// $flag['it'] = THEME_DIR.'/images/germanyflag.png';
	// $flag['es'] = THEME_DIR.'/images/germanyflag.png';

  if(1 < count($languages)){
  	$current_lang = strtoupper(LANG);
  	$langs[] = $current_lang;
  	$langs[] = '<div class="drop_langs_div">';
	  	$langs[] = '<ul>';
	    foreach($languages as $l){
	    	$class= '';
	    	$flag_url = $flag[$l['language_code']];
	    	if($l['active'] == 1) {
	    		$class = 'active';
	    	}
	      $langs[] = '<li class="li_lang ' . $class . '"><a class="lang" href="'.$l['url'].'"><img class="flag_img" src="'.$flag_url .'" alt="">'. strtoupper($l['translated_name']).'</a></li>';
	    }
	    $langs[] = '</ul>';
    $langs[] = '</div>';
    echo join('', $langs);
  }
}

function getYoutubeThumbUrl($id , $size="0") {
    $data = "http://img.youtube.com/vi/".$id."/".$size.".jpg";
    return $data;
}

function icl_post_languages_m(){
	$languages = icl_get_languages('skip_missing=0');

	$flag = array();
	$flag['he'] = THEME_DIR.'/images/israelflag.png';
	$flag['en'] = THEME_DIR.'/images/enflag.png';
	$flag['fr'] = THEME_DIR.'/images/frflag.png';
	$flag['de'] = THEME_DIR.'/images/germanyflag.png';
	  if(1 < count($languages)){
	  	$current_lang = strtoupper(LANG);
	  	// $langs[] = $current_lang;
	  	$langs[] = '<div class="drop_langs_div">';
		  	$langs[] = '<ul>';
		    foreach($languages as $l){
		    	$class= '';
		    	$flag_url = $flag[$l['language_code']];
		    	if($l['active'] == 1) {
		    		$class = 'active';
		    	}
		      $langs[] = '<li class="li_lang ' . $class . '"><a class="lang" href="'.$l['url'].'"><img class="flag_img" src="'.$flag_url .'" alt=""></a></li>';
		    }
		    $langs[] = '</ul>';
	    $langs[] = '</div>';
	    echo join('', $langs);
	  }
}



	// Pagination
	function my_pagination(){
	    global $wp_query;
	    $big = 999999999; // This needs to be an unlikely integer
	    // For more options and info view the docs for paginate_links()
	    // http://codex.wordpress.org/Function_Reference/paginate_links
	    $paginate_links = paginate_links( array(
	        'base' => str_replace( $big, '%#%', get_pagenum_link($big) ),
	        'current' => max( 1, get_query_var('paged') ),
	        'total' => $wp_query->max_num_pages,
	        'prev_text'          => __('« '),
			'next_text'          => __(' »'),
	        'mid_size' => 5
	    ) );

	    // Display the pagination if more than one page is found
	    if ( $paginate_links ) {
	        echo '<div class="pagination">';
	        echo $paginate_links;
	        echo '</div><!--// end .pagination -->';
	    }
	}
	add_action('init', 'my_pagination'); // Add our Pagination







/**************
		Color transformer
******************************/
function hex2rgba($color, $opacity = false) {

	$default = 'rgb(0,0,0)';

	//Return default if no color provided
	if(empty($color))
          return $default;

	//Sanitize $color if "#" is provided
        if ($color[0] == '#' ) {
        	$color = substr( $color, 1 );
        }

        //Check if color has 6 or 3 characters and get values
        if (strlen($color) == 6) {
                $hex = array( $color[0] . $color[1], $color[2] . $color[3], $color[4] . $color[5] );
        } elseif ( strlen( $color ) == 3 ) {
                $hex = array( $color[0] . $color[0], $color[1] . $color[1], $color[2] . $color[2] );
        } else {
                return $default;
        }

        //Convert hexadec to rgb
        $rgb =  array_map('hexdec', $hex);

        //Check if opacity is set(rgba or rgb)
        if($opacity){
        	if(abs($opacity) > 1)
        		$opacity = 1.0;
        	$output = 'rgba('.implode(",",$rgb).','.$opacity.')';
        } else {
        	$output = 'rgb('.implode(",",$rgb).')';
        }

        //Return rgb(a) color string
        return $output;
}


//Get user IP
function get_user_ip(){

	if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
	    $ip = $_SERVER['HTTP_CLIENT_IP'];
	} elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
	    $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
	} else {
	    $ip = $_SERVER['REMOTE_ADDR'];
	}

	return $ip;

}
function get_user_country(){
	global $wpdb;

	if(isset($_SESSION["coutries"])){
		return $_SESSION["coutries"];
	}

	$user_ip = get_user_ip();
	if(!$user_ip){
		return false;
	}
	$long_ip = ip2long($user_ip);

	$sql = "SELECT DISTINCT qs_ip_lang_code FROM qs_ip_table WHERE INET_ATON(qs_ip_from) < $long_ip AND INET_ATON(qs_ip_to) > $long_ip";

	$results = $wpdb->get_results($sql);

	$_SESSION["coutries"] = $results;

	return $results;
}
add_action("init","redirect_user_by_coutnry");

function redirect_user_by_coutnry(){
	session_start();

	if(is_admin())
		return;

	$countries_to_redirect = get_field("redirects","option");
	if($countries_to_redirect){
		foreach($countries_to_redirect as $redirect){
			if($redirect["redirect_users_originated_in"] && $redirect["redirect_to"]){
				$user_country = get_user_country();
				foreach($user_country as $country_code){
					if(in_array($country_code->qs_ip_lang_code,$redirect["redirect_users_originated_in"])){
						wp_redirect($redirect["redirect_to"]);
						die();
					}
				}
			}
		}
	}
}

function get_ip_list() {

    global $wpdb;
    $clientIP_full      = get_user_ip();
    $clientIP_explode   = explode(".", $clientIP_full);
    $clientIP_search    = $clientIP_explode[0].'.'.$clientIP_explode[1];
    //echo $clientIP_search;
    //echo '<br><br><br>';

     $sql = "SELECT * FROM `qs_ip_table` WHERE `qs_ip_from` LIKE '%$clientIP_search%'";
    //$sql = "SELECT * FROM `qs_ip_table`";
    $results = $wpdb->get_results( $sql, OBJECT );

    foreach($results as $result) {


        $qs_ip_from         = $result->qs_ip_from;
        $qs_ip_from_explode = explode(".", $qs_ip_from);
        $qs_ip_from_search  = $qs_ip_from_explode[0].'.'.$qs_ip_from_explode[1];

        $qs_ip_lang_code = $result->qs_ip_lang_code;

        if( $clientIP_search == $qs_ip_from_search ) {
            return $qs_ip_lang_code;
            break;
        }
    }

}

function usa_check(){
    $user_ip = get_user_ip();
    $url = 'freegeoip.net/json/' . $user_ip;
    //  Initiate curl
    $ch = curl_init();
    // Disable SSL verification
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    // Will return the response, if false it print the response
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    // Set the url
    curl_setopt($ch, CURLOPT_URL,$url);
    // Execute
    $result = curl_exec($ch);
    // Closing
    curl_close($ch);

    // Will dump a beauty json :3
    return json_decode($result, true);
}

// Check permalink update,category base update and tag base update
add_filter('pre_update_option_' . 'category_base', 'wpms_remove_prefix_blog');
add_filter('pre_update_option_' . 'tag_base', 'wpms_remove_prefix_blog');
add_filter('pre_update_option_' . 'permalink_structure', 'wpms_remove_prefix_blog');

/**
 * Just check if the current structure begins with /blog/ remove that and return the stripped structure
 */
function wpms_remove_prefix_blog($structure_permalink) {
	if ( substr($structure_permalink, 0, 6) != '/blog/' )
		return $structure_permalink;

	return substr($structure_permalink, 5, strlen($structure_permalink));
}
function get_regions_langage_codes(){
	$locations 				= get_terms('location', array('hide_empty'=>true));
	$center_language_codes	= array();
	foreach($locations as $location) {
		if($location->parent) {
			$center_language_code = get_field('center_language_code','location_'.$location->term_id);
			$center_language_codes[$location->term_id] = $center_language_code;
		}

	}
	return $center_language_codes;
}

function get_user_country_code(){
	$user_countries = get_user_country();
	if($user_countries){
		$user_country = reset($user_countries);
		$user_lang_code	= $user_country->qs_ip_lang_code;
	}else{
		$user_lang_code	= "US";
	}


	return $user_lang_code;
}
