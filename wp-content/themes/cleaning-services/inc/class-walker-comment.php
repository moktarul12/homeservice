<?php
/**
 * A custom WordPress comment walker class to implement the Bootstrap 3 Media object in wordpress comment list.
 *
 * @package     WP Bootstrap Comment Walker
 * @version     1.0.0
 * @author      Edi Amin <to.ediamin@gmail.com>
 * @license     http://opensource.org/licenses/gpl-2.0.php GPL v2 or later
 * @link        https://github.com/ediamin/wp-bootstrap-comment-walker
 */
class Cleaning_Services_Comment_Walker extends Walker_Comment {
	/**
	 * Output a comment in the HTML5 format.
	 *
	 * @access protected
	 * @since 1.0.0
	 *
	 * @see wp_list_comments()
	 *
	 * @param object $comment Comment to display.
	 * @param int    $depth   Depth of comment.
	 * @param array  $args    An array of arguments.
	 */
	protected function html5_comment( $comment, $depth, $args ) {
		$tag = ( 'div' === $args['style'] ) ? 'div' : 'li';
		if( $depth *1 > 1 ){
			$is_replay = 'replay';
		}else{
			$is_replay = '';
		}
?>		

		<<?php echo esc_html($tag) ; ?> id="comment-<?php comment_ID(); ?>" <?php comment_class( $this->has_children ? 'parent media' : 'media' . ' ' . $is_replay ); ?>>
			<article id="div-comment-<?php comment_ID(); ?>" class="comment-body">
				<?php if ( 0 != $args['avatar_size'] ): ?>
				<div class="userpic">
					<a href="<?php echo get_comment_author_url(); ?>" class="">
						<?php echo get_avatar( $comment, $args['avatar_size'] ); ?>
					</a>
				</div>
				<?php endif; ?>

				<div class="text">
		
						<div class="meta">
						<span class="meta-author"><?php esc_html_e('by', 'cleaning-services')?> <?php printf( '<i>%s</i>', get_comment_author_link() ); ?></span>
						<span class="date">
							<a href="<?php echo esc_url( get_comment_link( $comment->comment_ID, $args ) ); ?>">
								<time datetime="<?php comment_time( 'c' ); ?>">
									<?php printf( esc_html_x( '%1$s at %2$s', '1: date, 2: time', 'cleaning-services' ), get_comment_date( "d M y" ), get_comment_time('') ); ?>
								</time>
							</a>
						</span><!-- .comment-metadata -->
						</div>
						<?php if ( '0' == $comment->comment_approved ) : ?>
						<p class="comment-awaiting-moderation label label-info"><?php esc_html_e( 'Your comment is awaiting moderation.', 'cleaning-services' ); ?></p>
						<?php endif; ?>				
						<div class="comment-content">
							<?php comment_text(); ?>
						</div>
						<?php
							comment_reply_link( array_merge( $args, array(
								'add_below' => 'div-comment',
								'depth'     => $depth,
								'max_depth' => $args['max_depth'],
								'before'    => '',
								'after'     => ''
							) ) );	
						?>
						<ul class="list-inline">
							<?php edit_comment_link( esc_html__( 'Edit', 'cleaning-services' ), '<li class="edit-link">', '</li>' ); ?>


						</ul>
		
					
				</div>	
			</article>	
<?php
	}	
}