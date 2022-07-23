<?php


get_header(); ?>

                <div class="blog_bg" id="inner_page_banner" style="background-image: url('<?php echo get_the_post_thumbnail_url(get_option('page_for_posts', true)) ?>');
">
          <div class="container">
              <div class="slider_text">
                <h1>
                  <?= get_the_title( get_option('page_for_posts', true) ); ?>
                </h1>
              </div> 
            </div> 
          </div>

<section id="primary <?php echo "default page-".$post_id = get_the_ID();?>" class="all-pages <?php echo "page-".$post_id = get_the_ID(); wp_title('');?>">		


   <!-- page to show the single post from the wordpress pre-developed Posts  posttype posts-->
    <!-- Portfolio Grid Section -->
	<section class="single-blog  single-post">
		<div class="container">
			<div class="row">
				<?php if(have_posts()):while (have_posts()):the_post(); ?>   
				<div class="col-md-8">
					<div class="head-sec">	
						<h2 class="title"><?php echo get_the_title(); ?></h2> 
						<div class="blogListFooter">
		                        <p>
		                            <span class="listAuthor"><?php echo get_the_date(); ?> By Jesses Pride Charters</span>
		                             <!-- <span class="listTime">in <?php //the_category(', '); ?></span> -->
		                        </p>
		                    </div><!-- ( BLOG LIST FOOTER END ) -->
					</div>
						<!-- use php href  echo get_the_permalink();  if want to show link-->
						<div class="main-single-post-thubnail-image text-center">
						<?php the_post_thumbnail('blog-post-thumbnail',array('class'=>'single-blog-image')); ?>
						</div>
						<div class="blg_co"><?php the_content(); ?></div>	
						<?php //echo do_shortcode('[Social9_Share]'); ?>
						<?php endwhile; endif;  ?>	
						<div class="social-links">
							
						</div>
						<?php 			getPrevNext(); ?>
					<div class="full">
						<ul class="single-pagination">
							<li class="previous">
								<?php previous_post_link( '%link', __( '', '' ) . '<i class="fa fa-angle-left" aria-hidden="true"></i> Previous' ); ?>
							</li>
							<li class="next">
								<?php   next_post_link( '%link', __( '', '' ) . 'Next <i class="fa fa-angle-right" aria-hidden="true"></i> ' ); ?>
							</li>
						</ul>
					</div>
					<?php 
						function getPrevNext(){
	$pagelist = get_pages('sort_column=menu_order&sort_order=asc');
	$pages = array();
	foreach ($pagelist as $page) {
	   $pages[] += $page->ID;
	}

	$current = array_search(get_the_ID(), $pages);
	$prevID = $pages[$current-1];
	$nextID = $pages[$current+1];
	
	echo '<div class="navigation">';
	
	if (!empty($prevID)) {
		echo '<div class="alignleft">';
		echo '<a href="';
		echo get_permalink($prevID);
		echo '"';
		echo 'title="';
		echo get_the_title($prevID); 
		echo'">Previous</a>';
		echo "</div>";
	}
	if (!empty($nextID)) {
		echo '<div class="alignright">';
		echo '<a href="';
		echo get_permalink($nextID);
		echo '"';
		echo 'title="';
		echo get_the_title($nextID); 
		echo'">Next</a>';
		echo "</div>";		
	}
}	
					 ?>

				</div>
				<div class="col-md-4 col-sm-5 clearfix">
					<div class="blog_side_bar">
		                <?php dynamic_sidebar( 'blog-sidebar' ); ?>
		            </div>
				</div>
			</div>
		</div>
	</section>  
</section>
<?php get_footer(); ?>