<?php
/**
*	@package Blank
*	
*/

	function awesome_acf_responsive_image($image_id,$image_size,$max_width){

		// check the image ID is not blank
		if($image_id != '') {

			// set the default src image size
			$image_src = wp_get_attachment_image_url( $image_id, $image_size );

			// set the srcset with various image sizes
			$image_srcset = wp_get_attachment_image_srcset( $image_id, $image_size );

			// generate the markup for the responsive image
			echo 'src="'.$image_src.'" srcset="'.$image_srcset.'" sizes="(max-width: '.$max_width.') 100vw, '.$max_width.'"';

		}
	}


	//////////////////////////
	//  SRCSET THUMBNAILS
	//////////////////////////

	function custom_data_srcset_thumbnail( $post_id ) {


		  $image_t = wp_get_attachment_image_src( get_post_thumbnail_id( $post_id ), 'thumbnail' )[0];
		  $image_t_W = wp_get_attachment_image_src( get_post_thumbnail_id( $post_id ), 'thumbnail' )[1];

		  $image_l = wp_get_attachment_image_src( get_post_thumbnail_id( $post_id ), 'medium' )[0];
		  $image_l_W = wp_get_attachment_image_src( get_post_thumbnail_id( $post_id ), 'medium' )[1];

		  $image_f = wp_get_attachment_image_src( get_post_thumbnail_id( $post_id ), 'full' )[0];
		  $image_f_W = wp_get_attachment_image_src( get_post_thumbnail_id( $post_id ), 'full' )[1];
		  $image_f_H = wp_get_attachment_image_src( get_post_thumbnail_id( $post_id ), 'full' )[2];

		  $image_ratio = $image_f_W / $image_f_H;



		  $image_alt =  get_post_meta( get_post_thumbnail_id($post_id) )['_wp_attachment_image_alt']['0'];


		  $full_src_imge = '<img class="b-lazy" ' .
		  'alt="' . $image_alt . '"' .
		  'src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==" ' .
		  'data-ratio="' . trim($image_ratio) . '" ' .
		  'data-src="' . $image_l . '" ' .
		  'data-srcset="' . $image_f . ' ' . $image_f_W . 'w, ' .  $image_l . ' ' . $image_l_W . 'w, ' . $image_t . ' ' . $image_t_W . 'w "  />';


		  return $full_src_imge;

	}

	//////////////////
	// ACF SRC SET
	//////////////////

	function custom_acf_data_srcset_thumbnail( $lazy ,$image , $class='' ) {

		$image_ratio = $image['sizes']['large-width'] / $image['sizes']['large-height'];

		if ($lazy == true) {
		    return '<img
			    class="' . esc_attr( $class ) . '"
			    data-ratio="' . $image_ratio . '"
			  	src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw=="
			    alt="' . $image['title'] . '"
			    data-src="' . $image['sizes']['large'] . '"
			    data-srcset="'. $image['url'] .' '. $image['width'] .'w, '  . $image['sizes']['large'] .' '. $image['sizes']['large-width'] .'w, '. $image['sizes']['medium'] .' '.  $image['sizes']['medium-width'] .'w, '. $image['sizes']['thumbnail'] .' '.  $image['sizes']['thumbnail-width'] .'w">';

		} else {

		    return '<img

			    class="' . esc_attr( $class ) . '"
			    alt="' . $image['title'] . '"
			    src="' . $image['sizes']['large'] . '"
			    srcset="'. $image['url'] .' '. $image['width'] .'w, ' . $image['sizes']['large'] .' '. $image['sizes']['large-width'] .'w, '. $image['sizes']['medium'] .' '.  $image['sizes']['medium-width'] .'w, '. $image['sizes']['thumbnail'] .' '.  $image['sizes']['thumbnail-width'] .'w">';

		}

	};
