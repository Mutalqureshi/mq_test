<?php 

function header_scripts(){
	wp_enqueue_style( 'Jesses Pride-style', get_stylesheet_uri() );
    // main style 
        wp_enqueue_style( 'Jesses-Pride-bootstrap', get_template_directory_uri() . '/css/bootstrap.min.css');
        wp_enqueue_style( 'Jesses-Pride-fontawesome', get_template_directory_uri() . '/css/all.min.css' );
        wp_enqueue_style( 'Jesses-Pride-slider', get_template_directory_uri() . '/css/slick.css' );
        wp_enqueue_style( 'Jesses-Pride-theme', get_template_directory_uri() . '/css/slick-theme.css' );
        wp_enqueue_style( 'Jesses-Pride-custom', get_template_directory_uri() . '/css/theme-style.css', false, time() , 'all' );

        wp_enqueue_style( 'Jesses-Pride-responsive', get_template_directory_uri() . '/css/rwd.css' ,false, time() , 'all');

        wp_enqueue_script( 'Jesses-Pride-bootstrap-js', get_template_directory_uri() . '/js/bootstrap.min.js' );
        wp_enqueue_script( 'Jesses-Pride-masonry-js', get_template_directory_uri() . '/js/masonry.pkgd.min.js' );
        wp_enqueue_script( 'Jesses-Pride-slick-js', get_template_directory_uri() . '/js/slick.js' );
        wp_enqueue_script( 'Jesses-Pride-custom-js', get_template_directory_uri() . '/js/custom.js', array(), time(), true );
	
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
	add_action( 'wp_enqueue_scripts', 'header_scripts');
// header scrip all 

	//--------//
/**
 * Load redux file.
 */// header scrip all --enc
if ( file_exists( get_template_directory() . '/inc/admin-folder/admin-init.php' ) ) {
	require get_template_directory() . '/inc/admin-folder/admin-init.php';

	function infloway_customize_css() {
		global $fdata;
		echo '<style type="text/css">';
		if(isset($fdata['opt-ace-editor-css'])) {
			echo $fdata['opt-ace-editor-css'];
		}
		echo '</style>';
	}
	add_action( 'wp_head', 'infloway_customize_css', 100);
	
	function infloway_customize_js() {
		global $fdata;
		if(isset($fdata['opt-ace-editor-js'])) {
			echo '<script>
			'.$fdata['opt-ace-editor-js'].'
			</script>
			';
		}
	}
	add_action( 'wp_footer', 'infloway_customize_js', 100);
}


	function menu_function(){
		register_nav_menus( array(
		'menu-1' => esc_html__( 'Main Menu', 'Jesses Pride' ),
        'menu-2' => esc_html__( 'Footer Menu', 'Jesses Pride' ),
        'menu-3' => esc_html__( 'Bar Menu', 'Jesses Pride' ),
		'menu-4' => esc_html__( 'Mobile Menu', 'Jesses Pride' ),
		) );


		add_theme_support( 'post-thumbnails' );
		add_theme_support( 'customize-selective-refresh-widgets' );
		
	}
	add_action('after_setup_theme', 'menu_function');



	function phone_num(){
	    global $fdata;
	          $html='';
	            if($fdata['phone']){
	                    $html = $fdata['phone'];
	                }
	    return $html;
	}
	add_shortcode("phone","phone_num");

	function email_txt(){
	    global $fdata;
	          $html='';
	            if($fdata['email']){
	            $html = $fdata['email'];
	        }
	    return $html;
	}
	add_shortcode("email" ,"email_txt");
	
        function address_txt(){
        global $fdata;
              $html='';
                if($fdata['address']){
                $html = $fdata['address'];
            }
        return $html;
    }
    add_shortcode("address" ,"address_txt");
    


####################################################



	function wpbeginner_numeric_posts_nav() {
    if( is_singular() )
        return;
    global $wp_query;
    /** Stop execution if there's only 1 page */
    if( $wp_query->max_num_pages <= 1 )
        return;
    $paged = get_query_var( 'paged' ) ? absint( get_query_var( 'paged' ) ) : 1;
    $max   = intval( $wp_query->max_num_pages );
    /** Add current page to the array */
    if ( $paged >= 1 )
        $links[] = $paged;
    /** Add the pages around the current page to the array */
    if ( $paged >= 3 ) {
        $links[] = $paged - 1;
        $links[] = $paged - 2;
    }
    if ( ( $paged + 2 ) <= $max ) {
        $links[] = $paged + 2;
        $links[] = $paged + 1;
    }
    echo '<div class="navigation black-temp"><ul>' . "\n";
    /** Previous Post Link */
    if ( get_previous_posts_link() )
        printf( '<li class="prev">%s</li>' . "\n", get_previous_posts_link('<i class="fa fa-angle-left" aria-hidden="true"></i>','') );
    /** Link to first page, plus ellipses if necessary */
    if ( ! in_array( 1, $links ) ) {
        $class = 1 == $paged ? ' class="active"' : '';
        printf( '<li%s><a href="%s">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( 1 ) ), '1' );
        if ( ! in_array( 2, $links ) )
            echo '<li>…</li>';
    }

    /** Link to current page, plus 2 pages in either direction if necessary */
    sort( $links );
    foreach ( (array) $links as $link ) {
        $class = $paged == $link ? ' class="active"' : '';
        printf( '<li%s><a href="%s">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( $link ) ), $link );
    }
    /** Link to last page, plus ellipses if necessary */
    if ( ! in_array( $max, $links ) ) {
        if ( ! in_array( $max - 1, $links ) )
            echo '<li>…</li>' . "\n";
        $class = $paged == $max ? ' class="active"' : '';
        printf( '<li%s><a href="%s">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( $max ) ), $max );
    }
     /** Next Post Link */
    if ( get_next_posts_link() )
        printf( '<li class="next">%s</li>' . "\n", get_next_posts_link('<i class="fa fa-angle-right" aria-hidden="true"></i>','') );
    echo '</ul></div>' . "\n";
}


############## Login Logo ###############

add_action( 'login_enqueue_scripts', 'my_login_logo' );
function my_login_logo() {
    global $fdata;
    //print_r($fdata['login-logo']);
    $logo_url = ( isset($fdata['login-logo']) ? $fdata['login-logo']['url'] : get_bloginfo('template_url').'/img/silverfox-logo.png' );
    $logo_height = ( isset($fdata['login-logo']) ? $fdata['login-logo']['height'] : '141' );
    ?>
    <style type="text/css">
        body.login {
            background-color:#fafafa;
        }
        body.login div#login h1 a {
            background-image: url(<?php echo $logo_url ?>);
            padding: 0px;
            margin:0 auto 25px;
            width:auto;
            height:<?=$logo_height?>px;
            background-position:center center;
            background-size:contain;
			}
    </style>
	<?php }

function year_shortcode() {
  $year = date('Y');
  return $year;
}
add_shortcode('current-year', 'year_shortcode');
/*----------*/
/*----site-url--------*/
function site_url_shortcode() {
  $url = get_site_url();
  return $url;
}
add_shortcode('site-url', 'site_url_shortcode');

function title_shortcode() {
     $sitetitle = get_bloginfo('name');
     return $sitetitle;
}
add_shortcode('site-title', 'title_shortcode');
/*----------*/
 function naked_register_sidebars() {
    register_sidebar(array(                 // Start a series of sidebars to register
        'id' => 'footer_widget_left',                  // Make an ID
        'name' => 'Footer Widget Left',                // Name it
        'description' => 'Take it on the side...', // Dumb description for the admin side
        'before_widget' => '<div class="widget">',  // What to display before each widget
        'after_widget' => '</div>', // What to display following each widget
        'before_title' => '<span class="title-side-bar">',  // What to display before each widget's title
        'after_title' => '</span>',     
        'empty_title'=> '',                 // What to display in the case of no title defined for a widget
    ));

register_sidebar(array(                 // Start a series of sidebars to register
        'id' => 'footer_widget_right',                  // Make an ID
        'name' => 'Footer Widget Right',                // Name it
        'description' => 'Take it on the side...', // Dumb description for the admin side
        'before_widget' => '<div class="widget">',  // What to display before each widget
        'after_widget' => '</div>', // What to display following each widget
        'before_title' => '<span class="title-side-bar">',  // What to display before each widget's title
        'after_title' => '</span>',     
        'empty_title'=> '',                 // What to display in the case of no title defined for a widget
    ));
     

     register_sidebar(array(                 // Start a series of sidebars to register
        'id' => 'blog-sidebar',                  // Make an ID
        'name' => 'Blog Sidebar',                // Name it
        'description' => 'Take it on the side...', // Dumb description for the admin side
        'before_widget' => '<div class="service_widget">',  // What to display before each widget
        'after_widget' => '</div>', // What to display following each widget
        'before_title' => '<span class="title-side-bar">',  // What to display before each widget's title
        'after_title' => '</span>',     
        'empty_title'=> '',                 // What to display in the case of no title defined for a widget
    ));

     
} 
add_action( 'widgets_init', 'naked_register_sidebars' );

function st_my_excerpt($excerpt_length = 55, $id = false, $echo = true) {

    $text = '';

    if ($id) {
        $the_post = & get_post($my_id = $id);
        $text = ($the_post->post_excerpt) ? $the_post->post_excerpt : $the_post->post_content;
    } else {
        global $post;
        $text = ($post->post_excerpt) ? $post->post_excerpt : get_the_content('');
    }

    $text = strip_shortcodes($text);
    $text = apply_filters('the_content', $text);
    $text = str_replace(']]>', ']]&gt;', $text);
    $text = strip_tags($text);

    $excerpt_more = '';
    $words = preg_split("/[\n\r\t ]+/", $text, $excerpt_length + 1, PREG_SPLIT_NO_EMPTY);
    if (count($words) > $excerpt_length) {
        array_pop($words);
        $text = implode(' ', $words);
        $text = $text . $excerpt_more;
    } else {
        $text = implode(' ', $words);
    }
    if ($echo)
        echo apply_filters('the_content', $text);
    else
        return $text;
}

function get_my_excerpt($excerpt_length = 55, $id = false, $echo = false) {
    return st_my_excerpt($excerpt_length, $id, $echo);
}




// post type

// testimonial posttype

function testimonial() {
  register_post_type( 'Testimonials',   
     array(
      'labels' => array(
        'name' => __( 'Testimonials' ),
        'singular_name' => __( 'Testimonials' ),
        'add_new'            => _( 'Add New Testimonials'),
        'add_new_item'       => __( 'Add New Testimonials'),
        'new_item'           => __( 'New Testimonials'),
        'edit_item'          => __( 'Edit Testimonials'),
        'view_item'          => __( 'View Testimonials'),
        'all_items'          => __( 'All Testimonials'),
        'search_items'       => __( 'Search Testimonials')
      ),        
        'public' => true,
        'publicly_queryable' => true,
        'show_ui' => true,
        'query_var' => true,
        'capability_type' => 'post',
        'hierarchical' => false,
        'menu_position' => null,
        'supports' => array('title','editor','thumbnail','excerpt'),
        'menu_position' => 53
     )  
  );
}
add_action( 'init', 'testimonial' );



// fetch 

function testimonials_list(){
    $args = array(
        'posts_per_page' => -1,
        'post_type' => 'testimonials',
        'order' => 'ASC',
    ); 
    $loop = new WP_Query($args); // The Loop
    $html ='';
   
    $html .='<div id="testimonial-slider" class="testimonial">';
        while ( $loop->have_posts() ) : $loop->the_post();
                { 
                    $post_id = get_the_ID();
                    $html .='<div class="testimonial-div">';
                        $html .= '<div class="testimonial-slider-section">';
                        $html .= '<p>'.get_the_content().'</p>';
                        $html .= '<hr class="testimonial_hr">';
                            $html .='<div class="rating">';
                            $html .= get_the_post_thumbnail();
                            $html .= '</div><!-- 5start-->';
                        $html .= '<h5 class="testimonial-tilte">'.get_the_title().' </h5>';
                        $html .= '<span class="designation ftn_18">';
                             $html .= get_field("location");
                        $html .= '</span>';
                        $html .= '</div>';
                    // $html .= '<p><strong>-'.get_the_title().','.get_field("name").'</strong><br>'.get_field("test_location").'</p>';                 
                    $html .='</div>';
                    
                } 
        endwhile;
   

    // $html .= '</section>';
    return $html;
}
add_shortcode("testimonials-list","testimonials_list");



// function logo_slider() {
// global $fdata;
//     $html ='';
//     $html .='<div id="logo-slider" class="logo_slider logo-container">';
//             $logo = $fdata['logo-gallery'] ;
//             $etc = explode(",", $logo) ;
//         foreach($etc as $attachmentId){ 
//             $metaAttachment = wp_get_attachment_metadata( $attachmentId );
//             $url2 =  $metaAttachment['file'];
                


//             $post_id = get_post($attachmentId);
//             $url = home_url('wp-content/uploads/');

//             $html .='<div class="logo-slider-div">';
//                 $html .='<img src="'.$url . $url2.'"/>';
//                 // $html .='<a href="'.$post_id->post_excerpt.'" target="_blank" ><img src="'.$url . $url2.'"/></a>';
//             $html .='</div>';
// }                
//     $html .='</div>';
//     return $html;

// }
// add_shortcode("logo_slider","logo_slider");







add_image_size( 'latest_blog', 360, 288, array( 'center', 'center' ));
add_image_size( 'main_blog', 507, 320, array( 'center', 'center' ));


// woo commerce function 



// display custom post types 'photos' in recent posts widget
// function wcs_cpt_recent_posts_widget( $params ) {
//     $params['post_type'] = array( 'our_services' ,'post','Recipes');
//     return $params;
// }
// add_filter( 'widget_posts_args', 'wcs_cpt_recent_posts_widget' );

function SearchFilter($query) {
    if ($query->is_search) {
        $query->set('post_type', 'post');
    }
    return $query;
}
add_filter('pre_get_posts','SearchFilter');







add_shortcode("contact-details","social_icons_sec");
function social_icons_sec(){
    $html = "";

    $html .= "
<div class='bottombar_details'> <ul>";

$html .= '<li><i class="fas fa-phone fa-flip-horizontal"></i><a href="tel:' . do_shortcode('[phone]') . '" >'. do_shortcode('[phone]') . '</a></li>';

$html .= '<li><i class="fas fa-envelope"></i><a href="mailto:' . do_shortcode('[email]') . '"> '.do_shortcode('[email]') . '</a></li>';

$html .= '<li><i class="fa fa-map-marker-alt"></i><span>' . do_shortcode('[address]') . '</span></li>';

$html .= "
</ul>
</div>";
        return $html;  
}

add_shortcode("lets_talk","lets_talk");


function lets_talk(){
    $html='';
    global $fdata;
    $html .='<div class="lets_talk_contact">';

    if($fdata['phone']){
        $html .='<a class="with-icon phone clearfix" href="tel:'.$fdata['phone'].'"><i class="fas fa-phone fa-flip-horizontal"></i><div class="ph_f">'.$fdata['phone'].'</div></a>';
    }
    $html .='<br class="nnn">';
    if($fdata['email']){
        $html .='<a class="with-icon email clearfix" href="mailto:'.$fdata['email'].'"><i class="fas fa-envelope"></i><div class="em_f">'.$fdata['email'].'</div></a>';
    }
    $html .='</div>';
    return $html;
}


function lastest_blogs() 
{
  $loop = new WP_Query( array(
        'post_type' => 'post',
        'posts_per_page' => 3,
        // 'order' => 'ASC',
    ) 
);
    // $loop = new WP_Query($args); // The Loop
    $html = "";
    $html .='<div class="container">';
    $html .='<div class="row">';
        while ( $loop->have_posts() ) { $loop->the_post();
            
                    $post_id = get_the_ID();
                        
                        $html .= '<div class="col-md-4">';
                        $html .= '<div class="main_col_h2">';
                        $html .= '<div class=res_img>';
                         if (has_post_thumbnail($post_id)) { 
                            $url = wp_get_attachment_image_src(get_post_thumbnail_id($post_id), 'latest_blog'); 
                            $img_id = get_post_thumbnail_id($post_id);
                            $image_alt = get_post_meta($img_id, '_wp_attachment_image_alt', TRUE);
                                       $html .='<a href="'.get_the_permalink().'"><img class="img-fluid" src="'.$url[0]. ' " alt="'.$image_alt.'"></a>';
                         }
                         else { 
                                  $html .='<img src="http://placehold.it/358x327" width="358" height="327" alt="">';
                              } 

                            $html .= ' <div class="date-des blg">';
                            $html .= '<span class="max-date">'. get_the_time('M'). " " . get_the_time('d').', ' .get_the_time('Y').'</span>';
                            $html .= ' </div>';

                            $html .= '</div> <!-- img div-->';
                            $html .= '<div class="main_col_content">';

                            $html .= '<h4 class="res-title res-mg"><a href="'.get_the_permalink().'">'.get_the_title().'</a></h4>';
                            // $html .= '<p>'.get_the_excerpt().'</p>';
                            // $html .= '<p>'.get_my_excerpt(20).'</p>';
                            $html .= '<p class="hea_pera">'.get_the_excerpt().'</p>';
                            // $html .= '<p class="res_need">'.get_the_content(). '</p>';
                            // $html .= '<a href="'.get_the_permalink() .'" class="res_btn hea_btn">Read more</a>';
                               $html .= '<div class="blog_author"><i class="fa fa-user"></i>'. get_the_author_meta('display_name') .'</div>';
                            $html .= '</div>';
                            $html .= '</div>';
                            $html .= '</div>';
                   
        }/*while*/
    $html .='</div>';
    $html .='</div>';
    return $html;
}
add_shortcode("lastest_blogs","lastest_blogs");


