<!DOCTYPE html>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<meta name="viewport" content="width=device-width" />
	<meta name="format-detection" content="telephone=no">
	<title><?php wp_title( '|', true, 'right' ); ?></title>
	<link rel="shortcut icon" href="<?php echo get_template_directory_uri(); ?>/favicon.ico" />     
	<?php 
		function load_assets(){
			wp_enqueue_style('style', get_template_directory_uri().'/css/style.css');

			wp_enqueue_script('modernizr', get_template_directory_uri().'/js/libs/modernizr.min.js');
			wp_enqueue_script('jquery', get_template_directory_uri().'/js/libs/jquery.min.js');
			wp_enqueue_script('easing', get_template_directory_uri().'/js/plugins/jquery.easing.js');
			wp_enqueue_script('main', get_template_directory_uri().'/js/main.js');
		}
		add_action('wp_enqueue_scripts', 'load_assets');
	?>
	<?php wp_head(); ?>
	<!--[if lt IE 8]> <script src="<?php bloginfo('template_url')?>/js/lte-ie7.js"></script> <![endif]-->
	<!--[if IE]>
	<link rel="stylesheet" type="text/css" href="<?php bloginfo('template_url')?>/css/ie.css" />
	<![endif]-->
    <script type="text/javascript">
		var themeUrl = '<?php bloginfo( 'template_url' ); ?>';
		var baseUrl = '<?php bloginfo( 'url' ); ?>';
	</script>	
</head>

<body <?php body_class(); ?>>
	<div id="wrap">
<!-- 		<header id="header" role="banner">
			<div class="row clearfix">
				<div class="container">
					<div class="span ten">
						<a href="#join" class="join scroll-to-btn icon-mail-icon"><?php _e('Join the mailing list') ?></a>
						<div class="center-container centerer">
					        <div class="center"></div>
					        <div class="centered">
								<span class="nexa-light uppercase welcome">Welcome to</span>
								<span class="icon-fantrac-logo logo"></span>
							</div>
					  	</div>
					  	<div class="bottom novecento-medium uppercase">
					  		<?php _e('So, what is fantrac?') ?><br><span class="icon-arrow-down"></span>
					  	</div>
					</div>
				</div>
			</div>
		</header><!-- #masthead -->
		<div id="main" role="main">
	