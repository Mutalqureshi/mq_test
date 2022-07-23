<?php
/*
Template Name: Search Page
*/
get_header(); ?>


     <div class="blog_bg" id="inner_page_banner" style="background-image: url('<?php echo get_the_post_thumbnail_url(get_option('page_for_posts', true)) ?>');
">
          <div class="container">
              <div class="slider_text">
                <h1 class="blog_main_title"><?php     printf( esc_html__( 'Results for: %s', 'storevilla' ), '<span>' . get_search_query() . '</span>' );  //the_title(); ?></h1>
              </div> 
            </div> 
          </div>


<?php
					
if ( have_posts() ) { ?>
                    
				<!-- row-->	
<div id="primary" class="content-area">

    <main id="main" class="site-main">

        <section class="single-blog  single-post">
        
        <div class="container">

            <div class="row">
                <div class="col-md-8">
                <?php if(have_posts()):while (have_posts()):the_post(); ?>   
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
                        <div class="blg_co"><?php the_excerpt(); ?></div>   
                        <?php //echo do_shortcode('[Social9_Share]'); ?>
                        <?php endwhile; endif;  ?>  
             
            </div><!-- xol md 8-->

                <div class="col-md-4 col-sm-5 clearfix">
                    <div class="blog_side_bar">
                        <?php dynamic_sidebar( 'blog-sidebar' ); ?>
                    </div>
                </div>

            </div><!--row-->
            </div><!-- container-->
        </section>

    </main><!-- #main -->

</div>

<?php } ?>
	

				
				
					
<?php get_footer();