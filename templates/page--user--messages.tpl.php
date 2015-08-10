<?php

/**
 * @file
 * Default theme implementation to display a single Drupal page.
 *
 * The doctype, html, head and body tags are not in this template. Instead they
 * can be found in the html.tpl.php template in this directory.
 *
 * Available variables:
 *
 * General utility variables:
 * - $base_path: The base URL path of the Drupal installation. At the very
 *   least, this will always default to /.
 * - $directory: The directory the template is located in, e.g. modules/system
 *   or themes/bartik.
 * - $is_front: TRUE if the current page is the front page.
 * - $logged_in: TRUE if the user is registered and signed in.
 * - $is_admin: TRUE if the user has permission to access administration pages.
 *
 * Site identity:
 * - $front_page: The URL of the front page. Use this instead of $base_path,
 *   when linking to the front page. This includes the language domain or
 *   prefix.
 * - $logo: The path to the logo image, as defined in theme configuration.
 * - $site_name: The name of the site, empty when display has been disabled
 *   in theme settings.
 * - $site_slogan: The slogan of the site, empty when display has been disabled
 *   in theme settings.
 *
 * Navigation:
 * - $main_menu (array): An array containing the Main menu links for the
 *   site, if they have been configured.
 * - $secondary_menu (array): An array containing the Secondary menu links for
 *   the site, if they have been configured.
 * - $breadcrumb: The breadcrumb trail for the current page.
 *
 * Page content (in order of occurrence in the default page.tpl.php):
 * - $title_prefix (array): An array containing additional output populated by
 *   modules, intended to be displayed in front of the main title tag that
 *   appears in the template.
 * - $title: The page title, for use in the actual HTML content.
 * - $title_suffix (array): An array containing additional output populated by
 *   modules, intended to be displayed after the main title tag that appears in
 *   the template.
 * - $messages: HTML for status and error messages. Should be displayed
 *   prominently.
 * - $tabs (array): Tabs linking to any sub-pages beneath the current page
 *   (e.g., the view and edit tabs when displaying a node).
 * - $action_links (array): Actions local to the page, such as 'Add menu' on the
 *   menu administration interface.
 * - $feed_icons: A string of all feed icons for the current page.
 * - $node: The node object, if there is an automatically-loaded node
 *   associated with the page, and the node ID is the second argument
 *   in the page's path (e.g. node/12345 and node/12345/revisions, but not
 *   comment/reply/12345).
 *
 * Regions:
 * - $page['help']: Dynamic help text, mostly for admin pages.
 * - $page['highlighted']: Items for the highlighted content region.
 * - $page['content']: The main content of the current page.
 * - $page['sidebar_first']: Items for the first sidebar.
 * - $page['sidebar_second']: Items for the second sidebar.
 * - $page['header']: Items for the header region.
 * - $page['footer']: Items for the footer region.
 *
 * @see template_preprocess()
 * @see template_preprocess_page()
 * @see template_process()
 * @see html.tpl.php
 *
 * @ingroup themeable
 */
?>

<div id="page-wrapper">
    <div id="page">
        <div id="header">
            <?php if ($page['header_left']): ?>
            <div id="header-left" class="headerbox left">
                <?php if ($page['header_left_motto']): ?>
                    <div id="header-left-motto" class="headerbox left motto">
                        <?php print render($page['header_left_motto']); ?>
                    </div>
                <?php endif; ?>
                <div id="header-left-content" class="headerbox left content">
                    <?php print render($page['header_left']); ?>
                </div>
                <?php endif; ?>
            </div>
            <?php if ($page['header_middle']): ?>
                <div id="header-middle" class="headerbox middle">
                    <?php print render($page['header_middle']); ?>
                </div>
            <?php endif; ?>

            <?php if ($page['header_right']): ?>
                <div id="header-right" class="headerbox right">
                    <?php if ($page['header_langselect']): ?>
                        <div id="header-langselect" class="langselect">
                            <?php print render($page['header_langselect']); ?>
                        </div>
                    <?php endif; ?>
                    <?php print render($page['header_right']); ?>
                </div>
            <?php endif; ?>

            <?php print render($page['header']); ?>

        </div>
        <!-- /.section, /#header -->

        <?php if ($site_slogan): ?>
            <div id="name-and-slogan">
                <?php if ($site_slogan): ?>
                    <div id="header-slogan"><?php print $site_slogan; ?></div>
                <?php endif; ?>
            </div> <!-- /#name-and-slogan -->
        <?php endif; ?>


        <?php if ($main_menu || $secondary_menu): ?>
            <div id="navigation">
                <div class="section">
                    <?php print theme('links__system_main_menu', array('links' => $main_menu, 'attributes' => array('id' => 'main-menu', 'class' => array('links', 'inline', 'clearfix')), 'heading' => t('Main menu'))); ?>
                    <?php print theme('links__system_secondary_menu', array('links' => $secondary_menu, 'attributes' => array('id' => 'secondary-menu', 'class' => array('links', 'inline', 'clearfix')), 'heading' => t('Secondary menu'))); ?>
                </div>
            </div> <!-- /.section, /#navigation -->
        <?php endif; ?>

        <div id="main-wrapper">
            <div id="content-left" class="column sidebar">
                <?php if ($page['content_left']): ?>
                    <?php print render($page['content_left']); ?>
                <?php endif; ?>
            </div>
            <!-- /.section, /#content_left -->
            <?php if ($page['content']): ?>
                <div id="content-middle" class="column">
                    <?php if ($page['highlighted']): ?>
                        <div id="highlighted"><?php print render($page['highlighted']); ?></div><?php endif; ?>
                    <div id="main-content">
                        <?php print $messages; ?>
                        <?php print render($title_prefix); ?>
                        <?php if ($title): ?><h1 class="title"
                                                 id="page-title"><?php print $title; ?></h1><?php endif; ?>
                        <?php print render($title_suffix); ?>
                        <?php print render($page['content']); ?>
                        <?php print $feed_icons; ?>
                    </div>

                </div> <!-- /.section, /#content_middle_main -->
            <?php endif; ?>
            <div id="content-right" class="column sidebar">
                <?php if ($page['content_right']): ?>
                    <?php print render($page['content_right']); ?>
                <?php endif; ?>
                <?php if ($page['spodni_textove_menu']): ?>
                    <div id="spodni-textove-menu" class="column sidebar">
                        <?php print render($page['spodni_textove_menu']); ?>
                    </div>
                <?php endif; ?>
            </div>

            <!-- /.section, /#content_left -->
        </div>
        <!-- /#main, /#main-wrapper -->

        <div id="footer">
            <div id="footerWrapper">
                <div class="section left">
                    <?php print render($page['footer_left']); ?>
                </div>
                <div class="section center">
                    <?php print render($page['footer']); ?>
                </div>
                <div class="section right">
                    <?php print render($page['footer_right']); ?>
                </div>
            </div>
        </div>
        <!-- /.section, /#footer -->

    </div>
</div>
<!-- /#page, /#page-wrapper -->
