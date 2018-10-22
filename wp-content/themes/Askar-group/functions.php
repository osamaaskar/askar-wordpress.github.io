<?php

/*
** include navbar walker class for bootstrap navigation menu
*/
require_once('wp-bootstrap-navwalker.php');


// Add Thumbnail Image For Your Post
add_theme_support( 'post-thumbnails' );


/*
*Function To Add Stylesheet 
*First Using get_template_directory()Function To come url Of syle
*using function wp_enqueue_style to add files of css folder
*/
function Askar_Add_Styles(){
    
    wp_enqueue_style('bootstrap-css',get_template_directory_uri() .'/css/bootstrap.min.css');
    wp_enqueue_style('fontawesome-css',get_template_directory_uri() .'/css/font-awesome.min.css');
    wp_enqueue_style('animate-css',get_template_directory_uri() .'/css/animate.css');
    wp_enqueue_style('main-css',get_template_directory_uri() .'/css/main.css');
    
}
/*
*Function To Add Scripts 
*First Using get_template_directory()Function To come url Of syle
*using function wp_enqueue_script to add files of js folder
*/
function Askar_Add_Scripts(){
    
   //Remove jquery from header using deregister function
    wp_deregister_script('jquery');  
    //Register jquery in footer
    wp_register_script('jquery',includes_url('/js/jquery/jquery.js'), false, '', true); 
    // Enqueue the jquery
    wp_enqueue_script('jquery');
    //Add poper js in footer
    wp_enqueue_script('poper-js',get_template_directory_uri() .'/js/poper.js', array(), false, true);
    //Add bootstrap js in footer
    wp_enqueue_script('bootstrap-js',get_template_directory_uri() .'/js/bootstrap.min.js', array('jquery'), false, true);
    //Add main js in footer which will use it
    wp_enqueue_script('main-js',get_template_directory_uri() .'/js/main.js', array(), false, true);
    //Add html5hshiv js in header
    wp_enqueue_script('html5shiv-js',get_template_directory_uri() .'/js/html5shiv.js');
    //Add conditional comment for html5shiv
    wp_script_add_data('html5shiv', 'conditional','lt IE 9');
    //Add respond js in header
    wp_enqueue_script('respond-js',get_template_directory_uri() .'/js/respond.js');
    //Add conditionl comment for respond
    wp_script_add_data('respond', 'conditional','lt IE 9');
    
}

//Actions And Filter Hooks
    add_action('wp_enqueue_scripts','Askar_Add_Styles');
    add_action('wp_enqueue_scripts','Askar_Add_Scripts');

// Add custom Menu

function Askar_Register_Custom_Menu(){
    
    register_nav_menu('bootstarp-menu',__('Navigation bar'));
    
}

// Add Action of menu
add_action('init','Askar_Register_Custom_Menu');

//Add Navegation Bar Of Bootstrap And Call This Function In Header.php 

function Askar_Bootstrap_Menu(){
    wp_nav_menu(array(
        'menu_class'        =>'nav navbar-nav navbar-right',
        'container'         =>false,
        'depth'             => 2,
        'walker'            =>new wp_bootstrap_navwalker()
    ));
}




//Function V 1.0 Increase Or Decrease Words Of Content

function Askar_Extend_Excerpt_Length($length){
    if(is_author()){ //if You Are In Author Page
        return 40; //The Number Of Words That You Want To Appear
    } else if(is_category('22')){ //If You Are In Any Category Page
        return 50;
    } else { //You Are Not In Author Page
        return 25;
    }
    
    
    
}
add_filter('excerpt_length','Askar_Extend_Excerpt_Length');

// Function To Remove Dots [...] of  Excerpt Function

function Askar_Remove_Dots($length){
    
    return '<a href="'.get_the_permalink().'" rel="nofollow"> Read More...</a>';
    
}
add_filter('excerpt_more','Askar_Remove_Dots');


//Function Numbering Pagination

function numbering_pagination(){
    
    global $wp_query; //Instance From The Class (WP_Query) .Enabled You To Use AnY Thing In This Class At Any Place
    $all_pages = $wp_query->max_num_pages ; //Number Of Pages
    $current_page = max(1,get_query_var('paged')); //Get Current Page
    
    if($all_pages > 1){ //Check If All Pages Number More Than 1 Or Not
        
        //Return Pagination
        return paginate_links(array(
            
            'base'      =>get_pagenum_link(). '%_%', //Start Of Pagination
            'format'    =>'page/%#%', //Shape Of Your Link
            'current'   =>$current_page,
            'mid_size'  =>2,
            'end_size'  =>2
        ));
        
    }
     
}

//Function To Register Sidebar

function Askar_sidebar(){
    
    //Register Main SideBar
    register_sidebar(array(
        'name'              => 'Main_Sidebar', //Name Of SideBar
        'id'                => 'main_sidebar', //Identifire Of Sidebar
        'description'       =>'Mian Sidebar Appear Every Where', //Description Of Sidebar
        'class'             =>'main-sidebar', //Class Of Sidebar
        'before_widget'     =>'<div class="widget-content">',//Code Of html
        'after_widget'      =>'</div>',
        'before_title'      =>'<h3 class="widget-title">',
        'after_title'       =>'</h3>',
    ));
}

//Add Action Of Sidebar
add_action('widgets_init','Askar_sidebar');















?>