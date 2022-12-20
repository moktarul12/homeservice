<?php
class Cleaning_About_Tabs extends WPBakeryShortCode {

    public function __construct() {
        add_shortcode('cleaning_about_tabs', array($this, 'cleaning_about_tabs_func'));
       
    }

    function cleaning_about_tabs_func($atts, $content = null) {
        extract(shortcode_atts(array(
            'image' => '',
            'title' => 'About Our Company',
            'extra_class' => '',
                        ), $atts));

	   $attachement = wp_get_attachment_image_src((int) $image, 'full');
	   
      $args = array(
		'post_type' => 'cleaning_about_tabs',
		'no_found_rows' => true,
	 );
	 $tabquery = new WP_Query($args);

        ob_start();
        ?>
		<div class="block fullwidth-bg bg-cover inset-lg-3 pb-xs-0 block-1 mb-0">
			<div class="container">
				<div class="row zindex-1">
					<div class="col-sm-7 col-lg-8">
						<h2 class="h-lg"><?php echo $title;?></h2>
						<ul class="nav nav-tabs nav-tabs--sm">
							<?php  
							if ($tabquery->have_posts()) :
								$i = 0;
								while ($tabquery->have_posts()) : $tabquery->the_post();
								$i++;
							?>
								<li <?php if($i == 1){echo 'class="active"'; } ?>><a data-toggle="tab" href="#about<?php echo $i;?>" aria-expanded="true"><?php the_title(); ?></a></li>
							<?php
								endwhile;
								wp_reset_postdata();
							endif;
							?>
						</ul>

						<div class="tab-content tab-content-nopad">
						<?php  
						if ($tabquery->have_posts()) :
							$i = 0;
							while ($tabquery->have_posts()) : $tabquery->the_post();
							$i++;
								?>
									<div id="about<?php echo $i;?>" class="tab-pane fade <?php if($i == 1){echo 'active in'; }?>">
										<?php the_content();?>
									</div>
								<?php
							endwhile;
							wp_reset_postdata();
						endif;
						?>
						</div>
					</div>
				</div>
				<div class="img-right-wrap">
					<img src="<?php echo esc_url($attachement[0]); ?>" alt="">
				</div>
			</div>
		</div>
        <?php

        $output = ob_get_clean();
        return $output;
    }
}

new Cleaning_About_Tabs();