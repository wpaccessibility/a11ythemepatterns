<?php

add_action( 'wp_enqueue_scripts','yourtheme_enqueue_scripts' );
/**
 * Enqueue scripts to handle AJAX comments. Localize script to pass translated responses.
 * Enqueue comment-reply scripts.
 */
function yourtheme_enqueue_scripts() {
	wp_enqueue_script( 'yourtheme.comments', get_template_directory_uri() . "/js/comments.js", array('jquery'), '1.0.0', true );
	$comment_i18n = array( 
		'processing' => __( 'Processing...', 'yourtheme' ),
		'flood' => sprintf( __( 'Your comment was either a duplicate or you are posting too rapidly. <a href="%s">Edit your comment</a>', 'yourtheme' ), '#comment' ),
		'error' => __( 'There were errors in submitting your comment; complete the missing fields and try again!', 'yourtheme' ),
		'emailInvalid' => __( 'That email appears to be invalid.', 'yourtheme' ),
		'required' => __( 'This is a required field.', 'yourtheme' )
	);
	wp_localize_script( 'yourtheme.comments', 'yourthemeComments', $comment_i18n );
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}

add_action( 'comment_post', 'yourtheme_ajax_comments', 20, 2 );
/**
 * Provide responses to comments.js based on detecting an XMLHttpRequest parameter.
 *
 * @param $comment_ID     ID of new comment.
 * @param $comment_status Status of new comment. 
 *
 * @return echo JSON encoded responses with HTML structured comment, success, and status notice.
 */
function yourtheme_ajax_comments( $comment_ID, $comment_status ) {
	if ( !empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower( $_SERVER['HTTP_X_REQUESTED_WITH'] ) == 'xmlhttprequest' ) {
		// This is an AJAX request. Handle response data. 
		switch ( $comment_status ) {
			case '0':
				// Comment needs moderation; notify comment moderator.
				wp_notify_moderator( $comment_ID );
				$return = array( 
					'response' => '', 
					'success'  => 1, 
					'status'   => __( 'Your comment has been sent for moderation. It should be approved soon!', 'yourtheme' ) 
				);
				wp_send_json( $return );
				break;
			case '1':
				// Approved comment; generate comment output and notify post author.
				$comment            = get_comment( $comment_ID );
				$comment_class      = comment_class( 'yourtheme-ajax-comment', $comment_ID, $comment->comment_post_ID, false );
				
				$comment_output     = '
						<li id="comment-' . $comment->comment_ID . '"' . $comment_class . ' tabindex="-1">
							<article id="div-comment-' . $comment->comment_ID . '" class="comment-body">
								<footer class="comment-meta">
								<div class="comment-author vcard">'.
									get_avatar( $comment->comment_author_email )
									.'<b class="fn">' . __( 'You said:', 'yourtheme' ) . '</b> </div>

								<div class="comment-meta commentmetadata"><a href="#comment-'. $comment->comment_ID .'">' . 
									get_comment_date( 'F j, Y \a\t g:i a', $comment->comment_ID ) .'</a>
								</div>
								</footer>
								
								<div class="comment-content">' . $comment->comment_content . '</div>
							</article>
						</li>';
				
				if ( $comment->comment_parent == 0 ) {
					$output = $comment_output;
				} else {
					$output = "<ul class='children'>$comment_output</ul>";
				}

				wp_notify_postauthor( $comment_ID );
				$return = array( 
					'response'=>$output, 
					'success' => 1, 
					'status'=> sprintf( __( 'Thanks for commenting! Your comment has been approved. <a href="%s">Read your comment</a>', 'yourtheme' ), "#comment-$comment_ID" ) 
				);
				wp_send_json( $return );
				break;
			default:
				// The comment status was not a valid value. Only 0 or 1 should be returned by the comment_post action.
				$return = array( 
					'response' => '', 
					'success'  => 0, 
					'status'   => __( 'There was an error posting your comment. Try again later!', 'yourtheme' ) 
				);
				wp_send_json( $return );
		}
	}
}