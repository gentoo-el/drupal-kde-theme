<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php print $language->language ?>" lang="<?php print $language->language ?>" dir="<?php print $language->dir ?>">
<head>
<?php print $styles ?>
<!--[if IE]><link rel="stylesheet" type="text/css" href="<?php echo $base_path . $directory; ?>/fix-ie.css" /><![endif]--> 

<?php print $scripts ?>
<?php print $head ?>
<title><?php print $head_title ?></title>
</head>
	<body <?php phptemplate_body_class($left, $right);?>>
		<div id="header-region"><?php print $header; ?></div>
		<div id="header">
			<div id="logo">
				<a href="" name="kde"><img src="<?php echo $base_path . $directory; ?>/images/logo.png" alt="image" width="37" height="36" /></a>
			</div><!-- /logo -->
			<div id="kdeTitle">
				<?php if ($logo) { ?><a href="<?php print $base_path ?>" title="<?php print t('Home') ?>"><img src="<?php print $logo ?>" alt="<?php print t('Home') ?>" /></a><?php } ?>
			</div><!-- /kdeTitle -->
      
      <div id="topnav">
        <?php if (isset($primary_links)) : ?>
          <?php print theme('links', $primary_links, array('class' => 'links primary-links')) ?>
        <?php endif; ?>
        <?php print $feed ?>
      </div>
		</div><!-- /header -->

		<div id="midTainer">
			<div id="searchTainer">
				<div id="searchFloat">
					<?php if ($search_box): ?><div class="block block-theme"><?php print $search_box ?></div><?php endif; ?>
				</div><!-- searchFloat -->
			</div><!-- /searchTainer -->

			<div class="contentCentre">
				<div id="main">
					<h1><?php print $title ?></h1>
					<ul class="tabs"><?php print $tabs ?></ul>
          <?php if ($tabs2): print '<ul class="tabs secondary">'. $tabs2 .'</ul>'; endif; ?>
          <div id="content">
            <?php print $help ?>
            <?php print $messages ?>
            <?php print $content; ?>
          </div>
				</div><!-- /main -->


					<!-- Not sure yet how to make "sidebar_right" the default column so this is probably semantically incorrect but it works -->
					<?php if ($left): ?>
             <div id="sidebar">
               <?php print $left ?>
             </div><!-- /sidebar -->
					<?php endif; ?>
			</div><!-- /content -->

			<div id="botMenu">
				<div class="contentCentre">
				<?php if (isset($primary_links)) : ?>
				  <?php print theme('links', $primary_links, array('class' => 'links primary-links')) ?>
				<?php endif; ?>
				</div><!-- /content -->
			</div><!-- /botMenu -->
		</div><!-- /mid -->

		<div id="footer">
			<div id="footTile"></div><!-- /footTile -->
			<div class="contentCentre">
				<?php print $footer_message ?>
				<p>KDE, "K Desktop Environment", "KDE Dot News", "got the dot?" and the KDE Logo are trademarks or registered trademarks of KDE e.V. in the European Union, the United States and other countries. All other trademarks and copyrights on this page are owned by their respective owners. Comments are owned by the poster. The rest: Copyright 2000-<?php echo date('Y');?> KDE e.V. for The KDE Project. For further information or comments on this site, please contact the <a href="mailto:webmaster@kde.org">Webmaster</a>.</p>
			</div><!-- /content -->
		</div><!-- /footer -->
	<?php print $closure ?>
	</body>
</html>
