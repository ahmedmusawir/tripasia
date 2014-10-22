<?php
/*
Plugin Name: Custom Post Types
Plugin URI: http://htmlfive.info/
Description: Just another custom post type plugin. Simple but flexible.
Author: Da Moose
Author URI: http://shourav.info/
Text Domain: tripasia
Domain Path: /languages/
Version: 1.0.0
*/

/*  Copyright 2007-2014 Takayuki Miyoshi (email: takayukister at gmail.com)

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License as published by
    the Free Software Foundation; either version 2 of the License, or
    (at your option) any later version.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA  02111-1307  USA
*/
function my_custom_posttypes() {

    $labels = array(
        'name'               => 'Countrys',
        'singular_name'      => 'Country',
        'menu_name'          => 'Countrys',
        'name_admin_bar'     => 'Country',
        'add_new'            => 'Add New',
        'add_new_item'       => 'Add New Country',
        'new_item'           => 'New Country',
        'edit_item'          => 'Edit Country',
        'view_item'          => 'View Country',
        'all_items'          => 'All Countrys',
        'search_items'       => 'Search Countrys',
        'parent_item_colon'  => 'Parent Countrys:',
        'not_found'          => 'No countrys found.',
        'not_found_in_trash' => 'No countrys found in Trash.',
    );
    
    $args = array(
        'labels'             => $labels,
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'rewrite'            => array( 'slug' => 'countrys' ),
        'capability_type'    => 'post',
        'has_archive'        => true,
        'hierarchical'       => false,
        'menu_position'      => 5,
        'menu_icon'          => 'dashicons-star-half',
        'supports'           => array( 'title', 'editor', 'thumbnail', 'excerpt' ),
        'taxonomies'         => array( 'category', 'post_tag' )
    );

    register_post_type( 'country', $args );

}

add_action( 'init', 'my_custom_posttypes' );

// Flush rewrite rules to add "country" as a permalink slug
function my_rewrite_flush() {
    my_custom_posttypes();
    flush_rewrite_rules();
}
register_activation_hook( __FILE__, 'my_rewrite_flush' );










                