
<?php
/**
* Register a custom post type called "book".
*
* @see get_post_type_labels() for label keys.
*/
function books_custom_post() {
$labels = array(
'name'                  => _x( 'Books', 'Post type general name', 'textdomain' ),
'singular_name'         => _x( 'Book', 'Post type singular name', 'textdomain' ),
'menu_name'             => _x( 'Books', 'Admin Menu text', 'textdomain' ),
'name_admin_bar'        => _x( 'Book', 'Add New on Toolbar', 'textdomain' ),
'add_new'               => __( 'Add New Book', 'textdomain' ),
'add_new_item'          => __( 'Add New Book', 'textdomain' ),
'new_item'              => __( 'New Book', 'textdomain' ),
'edit_item'             => __( 'Edit Book', 'textdomain' ),
'view_item'             => __( 'View Book', 'textdomain' ),
'all_items'             => __( 'All Books', 'textdomain' ),
'search_items'          => __( 'Search Books', 'textdomain' ),
'parent_item_colon'     => __( 'Parent Books:', 'textdomain' ),
'not_found'             => __( 'No books found.', 'textdomain' ),
'not_found_in_trash'    => __( 'No books found in Trash.', 'textdomain' ),
//        'featured_image'        => _x( 'Book Cover Image', 'Overrides the “Featured Image” phrase for this post type. Added in 4.3', 'textdomain' ),
//        'set_featured_image'    => _x( 'Set cover image', 'Overrides the “Set featured image” phrase for this post type. Added in 4.3', 'textdomain' ),
//        'remove_featured_image' => _x( 'Remove cover image', 'Overrides the “Remove featured image” phrase for this post type. Added in 4.3', 'textdomain' ),
//        'use_featured_image'    => _x( 'Use as cover image', 'Overrides the “Use as featured image” phrase for this post type. Added in 4.3', 'textdomain' ),
'archives'              => _x( 'Book archives', 'The post type archive label used in nav menus. Default “Post Archives”. Added in 4.4', 'textdomain' ),
'insert_into_item'      => _x( 'Insert into book', 'Overrides the “Insert into post”/”Insert into page” phrase (used when inserting media into a post). Added in 4.4', 'textdomain' ),
'uploaded_to_this_item' => _x( 'Uploaded to this book', 'Overrides the “Uploaded to this post”/”Uploaded to this page” phrase (used when viewing media attached to a post). Added in 4.4', 'textdomain' ),
'filter_items_list'     => _x( 'Filter books list', 'Screen reader text for the filter links heading on the post type listing screen. Default “Filter posts list”/”Filter pages list”. Added in 4.4', 'textdomain' ),
'items_list_navigation' => _x( 'Books list navigation', 'Screen reader text for the pagination heading on the post type listing screen. Default “Posts list navigation”/”Pages list navigation”. Added in 4.4', 'textdomain' ),
'items_list'            => _x( 'Books list', 'Screen reader text for the items list heading on the post type listing screen. Default “Posts list”/”Pages list”. Added in 4.4', 'textdomain' ),
);

$args = array(
'labels'             => $labels,
'menu_icon'          => 'dashicons-book-alt',
'public'             => true,
'publicly_queryable' => true,
'show_ui'            => true,
'show_in_menu'       => true,
'query_var'          => true,
'rewrite'            => array( 'slug' => 'book' ),
'capability_type'    => 'post',
'has_archive'        => true,
'hierarchical'       => false,
'menu_position'      => null,
//        'supports'           => array( 'title', 'editor', 'author', 'thumbnail'),
);

register_post_type( 'book', $args );
}

add_action( 'init', 'books_custom_post' );


// Let us create Taxonomy for Custom Post Type

//////////////////////////////
//////LANGUAGE TAXONOMY///////
//////////////////////////////
function language_custom_taxonomy() {

$labels = array(
        'name'              => _x( 'Talen', 'taxonomy general name' ),
        'singular_name'     => _x( 'Taal', 'taxonomy singular name' ),
        'search_items'      => __( 'Search Talen' ),
        'all_items'         => __( 'All Talen' ),
        'parent_item'       => __( 'Parent Taal' ),
        'parent_item_colon' => __( 'Parent Taal:' ),
        'edit_item'         => __( 'Edit Taal' ),
        'update_item'       => __( 'Update Taal' ),
        'add_new_item'      => __( 'Add New Taal' ),
        'new_item_name'     => __( 'New Taal Name' ),
        'menu_name'         => __( 'Talen' ),
);

$args = array(
'labels'      => $labels,
'hierarchical' => true,
);

register_taxonomy('talen','book', $args);

//    register_taxonomy('languages',array('books'), array(
//        'hierarchical'      => true,
//        'labels'            => $labels,
//        'show_ui'           => true,
//        'show_admin_column' => true,
//        'query_var'         => true,
//        'rewrite'           => array( 'slug' => 'type' ),
//    ));
}
add_action( 'init', 'language_custom_taxonomy', 0 );


//////////////////////////////
//////CATEGORIES TAXONOMY/////
//////////////////////////////
function categories_custom_taxonomy (){
    $labels = array(
        'name'              => _x( 'Categorieën', 'taxonomy general name' ),
        'singular_name'     => _x( 'Categorieën', 'taxonomy singular name' ),
        'search_items'      => __( 'Search Categorieën' ),
        'all_items'         => __( 'All Categorieën' ),
        'parent_item'       => __( 'Parent Categorieën' ),
        'parent_item_colon' => __( 'Parent Categorieën:' ),
        'edit_item'         => __( 'Edit Categorieën' ),
        'update_item'       => __( 'Update Categorieën' ),
        'add_new_item'      => __( 'Add New Categorieën' ),
        'new_item_name'     => __( 'New Categorieën Name' ),
        'menu_name'         => __( 'Categorieën' ),
        'slug'              => __( 'Categorieën' )
    );

    $args = array(
        'labels'      => $labels,
        'hierarchical' => true,
    );

    register_taxonomy('categorieën','book', $args);

};

add_action('init','categories_custom_taxonomy', 0 );



//////////////////////////////
//////COUNTRY TAXONOMY///////
//////////////////////////////
function country_custom_taxonomy() {

    $labels = array(
        'name'              => _x( 'Landen', 'taxonomy general name' ),
        'singular_name'     => _x( 'Land', 'taxonomy singular name' ),
        'search_items'      => __( 'Search Landen' ),
        'all_items'         => __( 'All Landen' ),
        'parent_item'       => __( 'Parent Land' ),
        'parent_item_colon' => __( 'Parent Land:' ),
        'edit_item'         => __( 'Edit Land' ),
        'update_item'       => __( 'Update Land' ),
        'add_new_item'      => __( 'Add New Land' ),
        'new_item_name'     => __( 'New Land Name' ),
        'menu_name'         => __( 'Landen' ),
    );

    $args = array(
        'labels'      => $labels,
        'hierarchical' => true,
    );

    register_taxonomy('landen','book', $args);

};
add_action( 'init', 'country_custom_taxonomy', 0 );
?>