<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package tech
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">
    <link
      href="https://fonts.googleapis.com/css2?family=Bowlby+One&family=DM+Mono:wght@500&family=Goldman:wght@400;700&family=Raleway:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Righteous&display=swap"
      rel="stylesheet"
    />
    <!-- Load FontAwesome Kit -->
    <script src="https://kit.fontawesome.com/6b297ad0f4.js" crossorigin="anonymous"></script>
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e( 'Skip to content', 'tech' ); ?></a>

	<header id="masthead" class="site-header">
		<div class="site-branding">
			<?php
			the_custom_logo();
			if ( is_front_page() && is_home() ) :
				?>
				<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
				<?php
			else :
				?>
				<p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
				<?php
			endif;
			$tech_description = get_bloginfo( 'description', 'display' );
			if ( $tech_description || is_customize_preview() ) :
				?>
				<!-- <p class="site-description"><?php //echo $tech_description; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></p>-->
			<?php endif; ?>
		</div><!-- .site-branding -->

		<nav id="site-navigation" class="main-navigation">
		<!-- <button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false"><?php //esc_html_e( 'Primary Menu', 'tech' ); ?></button> -->
			<?php
			wp_nav_menu(
				array(
					'theme_location' => 'menu-1',
                    'menu_id'        => 'primary-menu',
                    'before'         => '',
                    'after'          =>  '<i class="fas fa-caret-down dropdown-menu"></i>',
                    'fallback_cb'	 => 'fallback_top_menu',
				)
			);
			?>

         <div id="menu-icon-svg" style="height:19px; width: 19px;">
            <svg
              xmlns="http://www.w3.org/2000/svg"
              xmlns:xlink="http://www.w3.org/1999/xlink"
              version="1.1"
              id="Capa_1"
              x="0px"
              y="0px"
              viewBox="0 0 384.97 384.97"
              style="enable-background:new 0 0 384.97 384.97;"
              xml:space="preserve"
            >
              <g>
                <g>
                  <path
                    d="M12.03,120.303h360.909c6.641,0,12.03-5.39,12.03-12.03c0-6.641-5.39-12.03-12.03-12.03H12.03    c-6.641,0-12.03,5.39-12.03,12.03C0,114.913,5.39,120.303,12.03,120.303z"
                  />
                  <path
                    d="M372.939,180.455H12.03c-6.641,0-12.03,5.39-12.03,12.03s5.39,12.03,12.03,12.03h360.909c6.641,0,12.03-5.39,12.03-12.03    S379.58,180.455,372.939,180.455z"
                  />
                  <path
                    d="M372.939,264.667H132.333c-6.641,0-12.03,5.39-12.03,12.03c0,6.641,5.39,12.03,12.03,12.03h240.606    c6.641,0,12.03-5.39,12.03-12.03C384.97,270.056,379.58,264.667,372.939,264.667z"
                  />
                </g>
              </g>
            </svg>
          </div>
		</nav><!-- #site-navigation -->
	</header><!-- #masthead -->
