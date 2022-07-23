<?php

global $fdata;

?>


	



<footer>


	<div class="mid_sec_foot ">
		<div class="container">	
			<div class="row">
					<div class="col-lg-7">
						<?php if (get_the_ID() == 361 || get_the_ID() == 415 || get_the_ID() == 424 || get_the_ID() == 432 || get_the_ID() == 442 || get_the_ID() == 454){ ?>
								
						<div class="footer_contact_details quote">	
						<?php //do_shortcode('[contact-form-7 id="17" title="Contact form 1"]'); ?>
						<?php echo do_shortcode('[gravityform id="2" title="false" description="false" ajax="true"]'); ?>
						</div>

						<?php } else{ ?>

						<div class="footer_contact_details">	
							<?php //do_shortcode('[contact-form-7 id="17" title="Contact form 1"]'); ?>
							<?php echo do_shortcode('[gravityform id="1" title="false" description="false" ajax="true"]'); ?>
						</div>

						<?php
						} ?>
					</div><!--footer widget col md -->

					<div class="col-lg-4 offset-lg-1">
						<div class="footer-widget-right">
							<?php if ( is_active_sidebar('footer_widget_right') ) : ?>
							<?php dynamic_sidebar('footer_widget_right'); ?>
							<?php endif; ?>
						</div>

						<div class="bottombar_details">
	                    <ul>

	                      <li><i class="fas fa-phone fa-flip-horizontal"></i><a href="tel:<?php echo do_shortcode('[phone]'); ?>" ><?php echo do_shortcode('[phone]'); ?></a></li>

	                      <li><i class="fas fa-envelope"></i><a href="mailto:<?php echo do_shortcode('[email]'); ?>"><?php echo do_shortcode('[email]'); ?></a></li>

                            <li><i class="fa fa-map-marker-alt"></i><span><?php echo do_shortcode('[address]'); ?></span></li>

	                    </ul>
				        </div><!--bottom bar-->


						<div class="newslatter-section">
							<?php echo do_shortcode('[ctct form="18" show_title="false"]'); ?>
						</div>

								
				</div><!-- col-lg-4 -->
			</div><!--row -->
		</div><!--container-->	
	</div><!--mid sec foot-->

					



	<div class="foot_secondlast ">	
			<div class="container">	
				<div class="row">	
					<div class="col-md-12">
						<div class="foot_content">
							<div class="foot-nav">
							<?php

								if ( has_nav_menu( 'menu-2' )){
									wp_nav_menu(array( 
									'container' => false,
									'menu_class'=> 'main-menu',
									'menu_id'=> '',
									'theme_location' => 'menu-2'
									)); 
								} 
								else{
									echo "<p>Assign Any Menu To Header Main Menu</p>";
								}
								?>
							</div><!--foot content-->
						</div><!--foot content-->
					</div><!--col-->
				</div>
			</div>
	</div><!--foot last-->	

<div class="last_foot">
	<div class="container">
		<div class="row">
			<div class="col-lg-7">
				<div class="copy_right_t">	
				<?php if($fdata['footer-copyright']){
				$output = do_shortcode($fdata['footer-copyright']);
				echo '<span class="copy-right-text">'.$output.'</span>';
				} ?>
				</div><!--copy right t-->
			</div>

			<div class="col-lg-5">
					<div class="footer_social">
                       <ul>
                       	<li>Follow us</li>
						  <?php if( $fdata['linkedin']) {?><li><a target="_blank" href="<?php echo $fdata['linkedin']; ?>"><i class="fab fa-linkedin-in"></i>&nbsp;</a></li><?php } ?>
						  <?php if( $fdata['facebook']) {?><li><a target="_blank" href="<?php echo $fdata['facebook']; ?>"><i class="fab fa-facebook-f"></i>&nbsp;</a></li><?php } ?>
						  <?php if( $fdata['twitter']) {?><li><a target="_blank" href="<?php echo $fdata['twitter']; ?>"><i class="fab fa-twitter"></i>&nbsp;</a></li><?php } ?>
						  <?php if( $fdata['google-plus']) {?><li><a target="_blank" href="<?php echo $fdata['google-plus']; ?>"><i class="fab fa-google-plus"></i>&nbsp;</a></li><?php } ?>
						  <?php if( $fdata['youtube']) {?><li><a target="_blank" href="<?php echo $fdata['youtube']; ?>"><i class="fab fa-youtube"></i>&nbsp;</a></li><?php } ?>
						  <?php if( $fdata['instagram']) {?><li><a target="_blank" href="<?php echo $fdata['instagram']; ?>"><i class="fab fa-instagram"></i>&nbsp;</a></li><?php } ?>
                        </ul>
                    </div><!-- footer social -->	
			</div>
		</div>
	</div>
</div><!-- last-foot -->
	


</footer>
<a href="#" id="scroll-top" class="scroll-top" onclick="topFunction()" ><i class="fa fa-chevron-circle-up" aria-hidden="true"></i></a>
<?php  wp_footer(); ?>
</body>
</html>





