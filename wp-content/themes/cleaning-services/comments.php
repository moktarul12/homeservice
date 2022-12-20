<?php
/**
 * The template for displaying comments.
 *
 * This is the template that displays the area of the page that contains both the current comments
 * and the comment form.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Cleaning_Services
 */

/*
 * If the current post is protected by a password and
 * the visitor has not yet entered the password we will
 * return early without loading the comments.
 */
if ( post_password_required() ) {
	return;
}
?>

<div id="comments" class="comments-area comments">

	<?php
	
	
	if ( have_comments() ) : ?>
		<h5 class="comments-title">
		<?php
			printf( // WPCS: XSS OK.
				esc_html( _nx( 'One thought on &ldquo;%2$s&rdquo;', '%1$s thoughts on &ldquo;%2$s&rdquo;', get_comments_number(), 'comments title', 'cleaning-services' ) ),
				number_format_i18n( get_comments_number() ),
				'<span>' . get_the_title() . '</span>'
			);
		?>
		</h5>

		<?php cleaning_services_comment_nav() ?>

		<div class="comment-list">
			<?php				
				wp_list_comments( array(
				  'style'       => 'ol',
				  'short_ping'  => true,
				  'avatar_size' => 80,
				  'walker' => new Cleaning_Services_Comment_Walker
				) );
			?>
		</div><!-- .comment-list -->

		<div class="divider-lg"></div>
		<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // Are there comments to navigate through? ?>
		<nav id="comment-nav-below" class="navigation comment-navigation">
			<h2 class="screen-reader-text"><?php esc_html_e( 'Comment navigation', 'cleaning-services' ); ?></h2>
			<div class="nav-links">
				<div class="nav-previous"><?php previous_comments_link( esc_html__( 'Older Comments', 'cleaning-services' ) ); ?></div>
				<div class="nav-next"><?php next_comments_link( esc_html__( 'Newer Comments', 'cleaning-services' ) ); ?></div>
			</div><!-- .nav-links -->
		</nav><!-- #comment-nav-below -->
		<?php
		endif; // Check for comment navigation.

	endif; // Check for have_comments().


	// If comments are closed and there are comments, let's leave a little note, shall we?
	if ( ! comments_open() && get_comments_number() && post_type_supports( get_post_type(), 'comments' ) ) : ?>
		<p class="no-comments"><?php esc_html_e( 'Comments are closed.', 'cleaning-services' ); ?></p>
		
	<?php
	endif;

$args = array(
  'id_form'           => 'commentform',
  'class_form'		  => 'contact-form',
  'id_submit'         => 'submit',
  'class_submit'      => 'btn',
  'name_submit'       => 'submit',
  'title_reply'       => esc_html__( 'Leave a Reply', 'cleaning-services' ),
  'title_reply_to'    => esc_html__( 'Leave a Reply', 'cleaning-services' ),
  'cancel_reply_link' => esc_html__( 'Cancel Reply', 'cleaning-services' ),
  'label_submit'      => esc_html__( 'Leave a Comment', 'cleaning-services' ),
  'format'            => 'xhtml',

  'comment_field' =>  '<div><label for="comment">' . esc_html_x( 'Comment', 'noun', 'cleaning-services' ) . '</label><textarea id="comment" name="comment" class="textarea-custom input-full" ></textarea></div>',

  'must_log_in' => '<p class="must-log-in">' .
    sprintf(
      wp_kses_post(__( 'You must be <a href="%s">logged in</a> to post a comment.', 'cleaning-services' )),
      esc_url(wp_login_url( apply_filters( 'the_permalink', get_permalink() ) ))
    ) . '</p>',

  'logged_in_as' => '<p class="logged-in-as">' .
    sprintf(
		wp_kses_post(__( 'Logged in as <a href="%1$s">%2$s</a>. <a href="%3$s" title="Log out of this account">Log out?</a>', 'cleaning-services' )),
      esc_url(admin_url( 'profile.php' )),
      $user_identity,
      esc_url(wp_logout_url( apply_filters( 'the_permalink', get_permalink( ) ) ))
    ) . '</p>',

  	'fields' => apply_filters( 'comment_form_default_fields', array(
		'author' =>
			'<div class="inputs-col">
				<div class="input-wrapper">
					<label>' . esc_html__( 'Name', 'cleaning-services' ) . ' '. ( $req ? '<span class="required">*</span>' : '' ) .'</label>' .
			 		'<input id="author" class="input-custom input-full" name="author" type="text" value="' . esc_attr( $commenter['comment_author'] ) .
			 '" /></div>',

		'email' =>
			'<div class="input-wrapper">
				<label>' . esc_html__( 'Email', 'cleaning-services' ) . ( $req ? '<span class="required">*</span>' : '' ) . '</label>' .
					'<input id="email" class="input-custom input-full" name="email" type="text" value="' . esc_attr(  $commenter['comment_author_email'] ) .
			 '" /></div>
			</div>',

		'url' =>
			'<div class="input-wrapper">
				<label>' . esc_html__( 'Website', 'cleaning-services' ) . '</label>' .
			 		'<input id="url" class="input-custom input-full" name="url" type="text" value="' . esc_attr( $commenter['comment_author_url'] ) .
			 '" /></div>',
		
		) ),
);

comment_form($args);
	?>
</div>
