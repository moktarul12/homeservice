<?php
    if ( is_single() ) {
            the_title( '<h1 class="post-title">', '</h1>' );
        } else {
            the_title( '<h2 class="post-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
        }        
         cleaning_services_posted_on_by();
    ?>
    <div class="post-teaser">
        <?php 
            if ( is_single() ){
                the_content( sprintf(
                    wp_kses( __( 'Continue Reading', 'cleaning-services' ), array( 'span' => array( 'class' => array() ) ) ),
                    the_title( '<span class="screen-reader-text">"', '"</span>', false )
                ) );
            }else{
                if( get_option('rss_use_excerpt') ){
                    the_excerpt();
                    echo '<a href="'. get_the_permalink() .'" class="btn">'. esc_html__('Continue Reading', 'cleaning-services') . '</a>';
                } else{
                    the_content( sprintf(
                        wp_kses( __( 'Continue Reading', 'cleaning-services' ), array( 'span' => array( 'class' => array('btn') ) ) ),
                        '') );
                }
            }
            wp_link_pages( array(
            'before'      => '<div class="page-pagination"><div class="page-numbers"><span class="page-links-title">' . esc_html__( 'Pages:', 'cleaning-services' ) . '</span>',
            'after'       => '</div></div>',
            'link_before' => '<span>',
            'link_after'  => '</span>',
            'pagelink'    => '<span class="screen-reader-text">' . esc_html__( 'Page', 'cleaning-services' ) . ' </span>%',
            'separator'   => ', ',
        ) );
        ?>
    </div>
     <?php 
        if ( is_single() ){
        echo    get_the_tag_list('<ul class="tags-links tags-list"><li>','</li><li>','</li></ul>');
        }
    ?>