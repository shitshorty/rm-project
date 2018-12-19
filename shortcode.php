<?php
/**
 * Shortcode
 *
 * @package WordPress
 * @subpackage IDEE EDAY Visual Design
 * @since RMUTR by IDEE EDAY 1.0
 */


/*
	==========================================
	SHORTCODE :
	==========================================
*/
function add_category_link($args){

    $attributes = shortcode_atts(

        array(
            'type' => 'news-type',
            'name' => 'unknown'
        ),$args
    );


    print 	get_stylesheet_directory();
    $terms = wp_get_post_terms( $post->ID, $attributes['type']);
    $i=0;
    foreach ($attributes as $attribute){
        echo $attribute;
        echo $i;
        $i++;
    }

    /*echo '<ul>';
    foreach ($terms as $term) {
        echo '<li><a href="'.get_term_link($term->slug, $attributes['type']).'">'.$term->name.'</a></li>';
    }
    echo '</ul>';
    */
}

add_shortcode( 'CTCatlink','add_category_link' );




