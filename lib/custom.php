<?php

// Custom functions

// Disable Yoast Schema
add_filter( 'wpseo_json_ld_output', '__return_false' );

// Fix the Tabbing of Input Boxes for Gravity forms
add_filter( 'gform_tabindex', 'gform_tabindexer', 10, 2 );
function gform_tabindexer( $tab_index, $form = false ) {
    $starting_index = 1000; // if you need a higher tabindex, update this number
    if( $form )
        add_filter( 'gform_tabindex_' . $form['id'], 'gform_tabindexer' );
    return GFCommon::$tab_index >= $starting_index ? GFCommon::$tab_index : $starting_index;
}

// Check If Page is Part of a Structure Tree
function is_tree($pid) {      // $pid = The ID of the page we're looking for pages underneath
	global $post;         // load details about this page
	if(is_page()&&($post->post_parent==$pid||is_page($pid))) 
               return true;   // we're at the page or at a sub page
	else 
               return false;  // we're elsewhere
};

function cc_mime_types($mimes) {
  $mimes['svg'] = 'image/svg+xml';
  return $mimes;
}
add_filter('upload_mimes', 'cc_mime_types');


function get_depth($id = '', $depth = '', $i = 0)
{
	global $wpdb;

	if($depth == '')
	{
		if(is_page())
		{
			if($id == '')
			{
				global $post;
				$id = $post->ID;
			}
			$depth = $wpdb->get_var("SELECT post_parent FROM $wpdb->posts WHERE ID = '".$id."'");
			return get_depth($id, $depth, $i);
		}
		elseif(is_category())
		{

			if($id == '')
			{
				global $cat;
				$id = $cat;
			}
			$depth = $wpdb->get_var("SELECT parent FROM $wpdb->term_taxonomy WHERE term_id = '".$id."'");
			return get_depth($id, $depth, $i);
		}
		elseif(is_single())
		{
			if($id == '')
			{
				$category = get_the_category();
				$id = $category[0]->cat_ID;
			}
			$depth = $wpdb->get_var("SELECT parent FROM $wpdb->term_taxonomy WHERE term_id = '".$id."'");
			return get_depth($id, $depth, $i);
		}
	}
	elseif($depth == '0')
	{
		return $i;
	}
	elseif(is_single() || is_category())
	{
		$depth = $wpdb->get_var("SELECT parent FROM $wpdb->term_taxonomy WHERE term_id = '".$depth."'");
		$i++;
		return get_depth($id, $depth, $i);
	}
	elseif(is_page())
	{
		$depth = $wpdb->get_var("SELECT post_parent FROM $wpdb->posts WHERE ID = '".$depth."'");
		$i++;
		return get_depth($id, $depth, $i);
	}
}