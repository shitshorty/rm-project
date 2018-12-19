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
	SHORTCODE : Taxonomy print
	==========================================
*/

function add_category_link($args){


    $attributes = shortcode_atts(

        array(
            'type' => ''

        ),$args
    );

    $postid = get_the_ID();





    return print_taxonomy_link($postid,$attributes['type']);
}

add_shortcode( 'TaxonomyLink','add_category_link' );






/*
	==========================================
	SHORTCODE : next / previous print
	==========================================
*/
/**
 * @return string
 */
function add_pagination_link(){

        //echo'sadas';

        $previous_post = get_previous_post();
        $next_post = get_next_post();
        //$post_language_information = wpml_get_language_information($next_post->ID);
        //$post_language_information;
        //foreach ($post_language_information as $postss) {
         //   echo $postss;

        //}

        //if (empty ($previous_post))
             //return 0;
        //return $previous_post->post_title;

        /*///////////   Render into HTML5 ////////////////*/


        $html_phase1='<div class="nav-links post-navigation">'
                    .'<div class="row">'
                        .'<div class="col-md-5">';

        if(empty($previous_post))
                $variable_phrase_1 = '<div class="nav-previous"></div><!--nav-previous-->';
        else $variable_phrase_1 =  '
          <div class="nav-previous"><a href="'.get_permalink($previous_post->ID).'" rel="previous">'
            .'<span class="meta-nav"></span>'
                .'<span class="screen-reader-text"></span>'
                    .'<span class="post-title">'
                        .$previous_post->post_title
                    .'</span></a>'
            .'</div><!--nav-previous-->';

        $html_phase2='</div><!--.col-md-5-->'
                    .'<div class="col-md-5 col-md-offset-2">';


        if(empty($next_post))
               $variable_phrase_2 = '<div class="nav-next"></div><!--nav-next-->';
        else $variable_phrase_2 =  '
          <div class="nav-next"><a href="'.get_permalink($next_post->ID).'" rel="next">'
            .'<span class="meta-nav"></span>'
                .'<span class="screen-reader-text"></span>'
                    .'<span class="post-title">'
                        .$next_post->post_title
                    .'</span></a>
         .</div><!--nav-next-->';



        $html_phase_end ='</div><!--.col-md-5-->'
                    .'</div><!--.row-->'
                .'</div><!--.nav-links post-navigation-->';



    /*///////////   Display into HTML5 ////////////////*/

        $html = $html_phase1.$variable_phrase_1.$html_phase2.$variable_phrase_2.$html_phase_end;

        return $html;

}

add_shortcode( 'Pagination','add_pagination_link' );


