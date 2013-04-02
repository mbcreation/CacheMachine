<?php 

// Remove cache on comment submit

function cache_comment_erase($incomingcomment){
 
 	$post = get_post($incomingcomment['comment_post_id']);
 	unlink(ABSPATH.'/cache/'.$post->post_name);
 	unlink(ABSPATH.'/cache/home');
 	return $incomingcomment;

}

add_action( 'preprocess_comment', 'cache_comment_erase');

// Remove cache on post save

function cache_erase($post_ID, $post) {

	unlink(ABSPATH.'/cache/'.$post->post_name);
	unlink(ABSPATH.'/cache/home');

}

add_action('save_post', 'cache_erase', 10, 2);