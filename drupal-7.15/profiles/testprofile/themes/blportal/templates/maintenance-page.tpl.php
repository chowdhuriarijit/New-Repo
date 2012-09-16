<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML+RDFa 1.0//EN"
  "http://www.w3.org/MarkUp/DTD/xhtml-rdfa-1.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php print $language->language; ?>" version="XHTML+RDFa 1.0" dir="<?php print $language->dir; ?>">

<head>
  <?php print $head; ?>
  <title><?php print $head_title; ?></title>
  <?php print $styles; ?>
  <?php print $scripts; ?>
</head>
<body class="<?php print $classes; ?>" <?php print $attributes;?>>
  <div id="header"><div class="global-wrapper"><div class="section clearfix">

    <?php if ($logo): ?>
      <a href="<?php print $front_page; ?>" title="<?php print t('Home'); ?>" rel="home" id="logo"><img src="<?php print $logo; ?>" alt="<?php print t('Home'); ?>" /></a>
    <?php endif; ?>

    <?php if ($site_name || $site_slogan): ?>
      <div id="name-and-slogan">
        <?php if ($site_name): ?>
          <?php if ($title): ?>
            <div id="site-name"><strong>
              <a href="<?php print $front_page; ?>" title="<?php print t('Home'); ?>" rel="home"><span><?php print $site_name; ?></span></a>
            </strong></div>
          <?php else: /* Use h1 when the content title is empty */ ?>
            <h1 id="site-name">
              <a href="<?php print $front_page; ?>" title="<?php print t('Home'); ?>" rel="home"><span><?php print $site_name; ?></span></a>
            </h1>
          <?php endif; ?>
        <?php endif; ?>

        <?php if ($site_slogan): ?>
          <div id="site-slogan"><?php print $site_slogan; ?></div>
        <?php endif; ?>
      </div><!-- /#name-and-slogan -->
    <?php endif; ?>

    
    <?php print $header; ?>

  </div></div>
  <div class="clr"></div>
  </div><!-- /.section, /#header -->
  <div class="clr"></div>


        <?php print $navigation; ?>

      </div></div></div><!-- /.section, /#navigation -->
<div id="page-wrapper"><?php print $promopanel; ?><div id="page">

  <div id="main-wrapper">

<div id="main" class="clearfix<?php if ($main_menu || $navigation) { print ' with-navigation'; } ?>">
	<div class="clr"></div>
    <div id="content" class="column"><div class="section">
      
      <?php print $breadcrumb; ?>
      <a id="main-content"></a>
      <?php print render($title_prefix); ?>
<?php if ($tabs = render($tabs)): ?>
        <div class="tabs"><?php print $tabs; ?></div>
      <?php endif; ?>
      <?php if ($title): ?>
        <h1 class="title" id="page-title"><?php print $title; ?></h1>
      <?php endif; ?>
      <?php print render($title_suffix); ?>
            
      <?php print render($page['help']); ?>
      
	<?php print $messages; ?>
      <?php print $content; ?>
      <?php print $feed_icons; ?>
    </div></div><!-- /.section, /#content -->

    
    

    <?php print $sidebar_first; ?>

    <?php //print render($page['sidebar_second']); ?>

  </div></div><!-- /#main, /#main-wrapper -->

  

</div></div><!-- /#page, /#page-wrapper -->
<div id="footer"><div class="global-wrapper">
<?php if ($logo): ?>
      <a href="<?php print $front_page; ?>" title="<?php print t('Home'); ?>" rel="home" id="logo"><img src="<?php print $logo; ?>" alt="<?php print t('Home'); ?>" /></a>
    <?php endif; ?>
<?php print $footer; ?><div class="clr"></div></div></div>
<?php print $bottom; ?>
</body>
</html>
