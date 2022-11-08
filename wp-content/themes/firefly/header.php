<!--

             ````
          ````
       ``.`                     ``````....`
     ``.`                 ```...............`
    `..`              ``.....................`
   `..`             ``.........................
  `..`             `............................
 `...`             .............................`:
`....`             ..............................`
`....`             `.............................`
......`             `.............................
.......`              `...........................
`........`              `........................`
`..........``             ``.....................`
 ..............``            ``.................`
 `.................```         ``..............`
  `....................```        `...........`
   `.......................``       `.......``
    ``........................`       `....`
      `........................`      `..`
        `......................       ``
          ``.................`
             ```...........``


Website by Northern Media

Get in touch - info@northernmediauk.com

-->
<!doctype html>
<html <?php language_attributes(); ?>>

<head>
	<meta charset="<?php bloginfo('charset'); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<!-- Font Awesome  -->
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v6.1.2/css/all.css">

	<?php get_template_part('admin-variables'); ?>
	<?php wp_head(); ?>
</head>

<?php $header = get_field('header_style'); ?>
<header id="header" class="header--<?php echo $header; ?>">
	<nav>
		<div class="container">
			<div class="row d-flex align-items-center">
				<div class="col-6 col-lg-2">
				<?php
				$logo = get_field('logo', 'option');
				if( $logo ) {
					$logo_url = $logo['sizes']['medium'];
					$logo_alt = $logo['alt']; ?>
				<a href="<?php echo site_url(); ?>">
					<img class="logo" src="<?php echo $logo_url; ?>" alt="<?php echo $logo_alt; ?>">
				</a>
				<?php } ?>
				</div>
				<div class="d-none d-lg-block col-lg-8">
				<?php
				wp_nav_menu(array(
					'theme_location'	=> 'primary-menu'
				));
				?>
				</div>
				<div class="col-6 col-lg-2 search">
					<div class="search-toggle">
						<i class="fa-solid fa-magnifying-glass"></i>
						<?php /*<i class="menu-toggle fas fa-bars"></i> */?>
					</div>
				</div>
			</div>
		</div>
	</nav>
	<div id="menu">
		<?php
		wp_nav_menu(array(
			'theme_location'	=> 'primary-menu'
		));
		?>
	</div>
</header>

<body <?php body_class(); ?>>