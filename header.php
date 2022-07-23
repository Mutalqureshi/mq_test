<?php

global $fdata;

?>

<!doctype html>
<html <?php language_attributes(); ?>>
  <head >
    <!-- Required meta tags -->
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <?php if( $fdata['favicon-logo']) {echo '<link rel="shortcut icon" href="'.$fdata['favicon-logo']['url'].'" />';}?>
    
<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:ital,wght@0,300;0,400;0,600;0,700;0,800;0,900;1,300;1,400;1,600&family=Oswald:wght@300;400;500;600;700&Fenix&display=swap" rel="stylesheet"> 

    <title><?php wp_title( '|', true, 'right' ); ?><?php bloginfo( 'name' ); ?></title>

  <?php echo wp_head(); ?>
  </head>

  
	<body <?php body_class();?> >
	
	
	
	<header >
		<!-- main-header -->
	<div class="main-header">
				<div class="container">
					<div class="row">
						<div class="col-sm-2 col-4 col-pad-none">
						<?php if($fdata['site-logo']['url']){
							echo '<a href="'.get_site_url().'" class="header-logo"><img src="'.$fdata['site-logo']['url'].'" alt="Namamiinc"></a>';
							}
						?>	
						</div>
						<div class="col-sm-10 col-8 d_menu_flex col-pad-none">
							<div class="header-top-bar">
									<div class="book_a_char">
										<?php
										if($fdata['header_text']){
											$top_header_text = $fdata['header_text'];
											echo "<a href='". get_site_url()."/book-now/'>";								
											echo $top_header_text;								
											echo "</a>";								
										}
										?>
									</div>


									<div class="top_phone">
										<i class="fa fa-phone fa-flip-horizontal"></i>
										<?php
										if($fdata['phone']){
											$phone = $fdata['phone'];
										echo '&nbsp;<a href="tel:'.$phone.'">'.$phone.'</a>';								
										}
										?>
									</div>
									

								<div class="social_ic">
									<ul>

									<?php if( $fdata['linkedin']) {?><li><a target="_blank" href="<?php echo $fdata['linkedin']; ?>"><i class="fab fa-linkedin-in"></i>&nbsp;</a></li><?php } ?>
									<?php if( $fdata['facebook']) {?><li><a target="_blank" href="<?php echo $fdata['facebook']; ?>"><i class="fab fa-facebook-f"></i>&nbsp;</a></li><?php } ?>
									<?php if( $fdata['twitter']) {?><li><a target="_blank" href="<?php echo $fdata['twitter']; ?>"><i class="fab fa-twitter"></i>&nbsp;</a></li><?php } ?>
									<?php if( $fdata['google-plus']) {?><li><a target="_blank" href="<?php echo $fdata['google-plus']; ?>"><i class="fab fa-google-plus"></i>&nbsp;</a></li><?php } ?>
									<?php if( $fdata['youtube']) {?><li><a target="_blank" href="<?php echo $fdata['youtube']; ?>"><i class="fa fa-youtube"></i>&nbsp;</a></li><?php } ?>
									<?php if( $fdata['instagram']) {?><li><a target="_blank" href="<?php echo $fdata['instagram']; ?>"><i class="fab fa-instagram"></i>&nbsp;</a></li><?php } ?>
									</ul>
								</div>			


							</div>
							<div class="nav-wrapper">
								<?php 
									if ( has_nav_menu( 'menu-1' )){
										wp_nav_menu(array( 
										'container' => false,
										'depth' => 3,
										'menu_class'=> 'menu-1',
										'menu_id'=> '',
										'theme_location' => 'menu-1'
										)); 
									} 
									else{
										echo "<p>Assign Any Menu To Header Main Menu</p>";
									}
								?>	
							</div>
							<div class="res-menu">
								<?php echo do_shortcode( '[rmp_menu id="141"]' ); ?>
							</div>
							
						</div>
					</div>
				</div>
			</div>
			<!-- main-header-Ended -->
	</header>