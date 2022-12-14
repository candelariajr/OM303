<!DOCTYPE html>
<html lang="en-us">
<head>
<?php
    if (isset($title)) {
        $titleParts[] = strip_formatting($title);
    }
    $titleParts[] = option('site_title');
?>
<title><?php echo implode(' &middot; ', $titleParts); ?></title>
<link rel="shortcut icon" href="/themes/appstate2/images/favicon.ico" type="image/x-icon" />

<!-- Meta -->
<meta charset="utf-8" />
<?php if ( $description = option('description')): ?>
    <meta name="description" content="<?php echo $description; ?>" />
<?php endif; ?>

<?php echo auto_discovery_link_tags(); ?>

<!-- Plugin Stuff -->
<?php fire_plugin_hook('public_head', array('view'=>$this)); ?>

<!-- Stylesheets -->
<?php
queue_css_file(array('style'));
echo head_css();
?>

<!-- JavaScripts -->
<?php echo head_js(); ?>
</head>

<?php echo body_tag(array('id' => @$bodyid, 'class' => @$bodyclass)); ?>

<?php fire_plugin_hook('public_body', array('view'=>$this)); ?>

<div id="wrap">
	<div id="header">
		<?php fire_plugin_hook('public_header', array('view'=>$this)); ?>
		<div id="search-wrap">
			<?php echo search_form(); ?><br/>
			<b><a href="/items/search" style="padding-right:30px; text-decoration: none;">Advanced search</a></b>
			<a href="/contact">Report a problem</a>
		</div><!-- end search -->

		<div id="site-title">
			<h1 id="head1"><a href="/">Library Digital Collections</a></h1>
			<h2 id="head2"><a href="http://www.library.appstate.edu">Appalachian State University</a></h2>
		</div>
	</div><!-- end header -->

	<div id="primary-nav"><div id="primary-nav2">
		<ul class="navigation">
		<?php
			$navArray = array();
			$navArray[] = array('label'=>'Home', 'uri'=>url(''));
			$navArray[] = array('label'=>'Collections', 'uri'=>url('collections?sort_field=Dublin+Core%2CTitle'));
			$navArray[] = array('label'=>'About', 'uri'=>url('about'));
			$navArray[] = array('label'=>'Exhibits', 'uri'=>url('exhibits'));

			echo nav($navArray);
		?>
		</ul>
	</div></div><!-- end primary-nav -->
<div id="updateHeader" style="color: #fc0; padding: 20px; font-size: 15px; background: black; font-family: Arial, Verdana, sans-serif; font-weight:bold;">Omeka is undergoing significant changes over holiday break 2021. This site may be down or not functioning properly. It should be working by January 3, 2022. For questions please contact <a style="text-decoration: none;" href="mailto:candelariajr@appstate.edu?subject=Omeka Holiday Update">candelariajr@appstate.edu</div>
	<div id="content">
		<?php fire_plugin_hook('public_content_top', array('view'=>$this)); ?>
