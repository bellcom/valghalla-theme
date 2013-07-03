<?php
// $Id: page.tpl.php,v 1.2.4.20 2010/12/01 21:47:53 jmburnz Exp $ f f
?>
<div id="page">

  <?php print render($page['leaderboard']); ?>

  <header class="clearfix">
<div id="headerdiv">
<div class="container">
    <?php if ($linked_site_logo): ?>
      <div id="logo"><?php print $linked_site_logo; ?></div>
    <?php endif; ?>
  <?php if ($primary_navigation): print '<div id="primenu">'.$primary_navigation. '</div>'; endif; ?>
  <?php if ($secondary_navigation): print '<div id="secmenu">'.$secondary_navigation. '</div>'; endif; ?>

  <?php if(!empty($hello_user_text)): ?>
      <div id="hello-user-text"><?php print $hello_user_text ?></div>
  <?php endif; ?>
</div>
</div>
    <?php if ($site_name || $site_slogan): ?>
      <div id="sitenamediv">
      <div class="container">
      <hgroup<?php if (!$site_slogan && $hide_site_name): ?> class="<?php print $visibility; ?>"<?php endif; ?>>
        <?php if ($site_name): ?>
         <div id="site-name"<?php if ($hide_site_name): ?> class="<?php print $visibility; ?>"<?php endif; ?>><?php print $site_name; ?></div>
        <?php endif; ?>
        <?php if ($site_slogan): ?>
          <div id="site-slogan"><?php print $site_slogan; ?></div>
        <?php endif; ?>
      </hgroup></div></div>
    <?php endif; ?>
<div class="container">
    <?php print render($page['header']); ?>
    </div>
  </header>
  <div id="bunddiv">
<div class="container">
  <?php print render($page['menu_bar']); ?>
    <?php /* if ($breadcrumb): ?>
    <section id="breadcrumb"><?php print $breadcrumb; ?></section>
  <?php endif; */ ?>

  <?php print $messages; ?>
  <?php print render($page['help']); ?>

  <?php print render($page['secondary_content']); ?>

  <div id="columns"><div class="columns-inner clearfix">
    <div id="content-column"><div class="content-inner">

      <?php print render($page['highlighted']); ?>

      <?php $tag = $title ? 'section' : 'div'; ?>
      <<?php print $tag; ?> id="main-content">

        <?php if ($title || $primary_local_tasks || $secondary_local_tasks || $action_links): ?>
          <header>
            <?php print render($title_prefix); ?>
            <?php if ($title): ?>
              <h1 id="page-title"><?php print $title; ?></h1>
            <?php endif; ?>
            <?php print render($title_suffix); ?>

            <?php if ($primary_local_tasks || $secondary_local_tasks || $action_links): ?>
              <div id="tasks">
                <?php if ($primary_local_tasks): ?>
                  <ul class="tabs primary"><?php print render($primary_local_tasks); ?></ul>
                <?php endif; ?>
                <?php if ($secondary_local_tasks): ?>
                  <ul class="tabs secondary"><?php print render($secondary_local_tasks); ?></ul>
                <?php endif; ?>
                <?php if ($action_links): ?>
                  <ul class="action-links"><?php print render($action_links); ?></ul>
                <?php endif; ?>
              </div>
            <?php endif; ?>
          </header>
        <?php endif; ?>

        <div id="content"><?php print render($page['content']); ?></div>

        <?php print $feed_icons; ?>

      </<?php print $tag; ?>>

      <?php print render($page['content_aside']); ?>

    </div></div>

    <?php print render($page['sidebar_first']); ?>
    <?php print render($page['sidebar_second']); ?>

  </div></div>

  <?php print render($page['tertiary_content']); ?>

  <?php if ($page['footer']): ?>
    <footer><?php print render($page['footer']); ?></footer>
  <?php endif; ?>

</div>
</div></div>