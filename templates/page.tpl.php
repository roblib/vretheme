<?php
// $Id: page.tpl.php,v 1.26.2.3 2010/06/26 15:36:04 johnalbin Exp $

/**
 * @file
 * Theme implementation to display a single Drupal page.
 *
 * Available variables:
 *
 * General utility variables:
 * - $base_path: The base URL path of the Drupal installation. At the very
 *   least, this will always default to /.
 * - $css: An array of CSS files for the current page.
 * - $directory: The directory the template is located in, e.g. modules/system
 *   or themes/garland.
 * - $is_front: TRUE if the current page is the front page. Used to toggle the mission statement.
 * - $logged_in: TRUE if the user is registered and signed in.
 * - $is_admin: TRUE if the user has permission to access administration pages.
 *
 * Page metadata:
 * - $language: (object) The language the site is being displayed in.
 *   $language->language contains its textual representation.
 *   $language->dir contains the language direction. It will either be 'ltr' or 'rtl'.
 * - $head_title: A modified version of the page title, for use in the TITLE tag.
 * - $head: Markup for the HEAD section (including meta tags, keyword tags, and
 *   so on).
 * - $styles: Style tags necessary to import all CSS files for the page.
 * - $scripts: Script tags necessary to load the JavaScript files and settings
 *   for the page.
 * - $classes: String of classes that can be used to style contextually through
 *   CSS. It should be placed within the <body> tag. When selecting through CSS
 *   it's recommended that you use the body tag, e.g., "body.front". It can be
 *   manipulated through the variable $classes_array from preprocess functions.
 *   The default values can be one or more of the following:
 *   - front: Page is the home page.
 *   - not-front: Page is not the home page.
 *   - logged-in: The current viewer is logged in.
 *   - not-logged-in: The current viewer is not logged in.
 *   - node-type-[node type]: When viewing a single node, the type of that node.
 *     For example, if the node is a "Blog entry" it would result in "node-type-blog".
 *     Note that the machine name will often be in a short form of the human readable label.
 *   - page-views: Page content is generated from Views. Note: a Views block
 *     will not cause this class to appear.
 *   - page-panels: Page content is generated from Panels. Note: a Panels block
 *     will not cause this class to appear.
 *   The following only apply with the default 'sidebar_first' and 'sidebar_second' block regions:
 *     - two-sidebars: When both sidebars have content.
 *     - no-sidebars: When no sidebar content exists.
 *     - one-sidebar and sidebar-first or sidebar-second: A combination of the
 *       two classes when only one of the two sidebars have content.
 * - $node: Full node object. Contains data that may not be safe. This is only
 *   available if the current page is on the node's primary url.
 * - $menu_item: (array) A page's menu item. This is only available if the
 *   current page is in the menu.
 *
 * Site identity:
 * - $front_page: The URL of the front page. Use this instead of $base_path,
 *   when linking to the front page. This includes the language domain or prefix.
 * - $logo: The path to the logo image, as defined in theme configuration.
 * - $site_name: The name of the site, empty when display has been disabled
 *   in theme settings.
 * - $site_slogan: The slogan of the site, empty when display has been disabled
 *   in theme settings.
 * - $mission: The text of the site mission, empty when display has been disabled
 *   in theme settings.
 *
 * Navigation:
 * - $search_box: HTML to display the search box, empty if search has been disabled.
 * - $primary_links (array): An array containing the Primary menu links for the
 *   site, if they have been configured.
 * - $secondary_links (array): An array containing the Secondary menu links for
 *   the site, if they have been configured.
 * - $breadcrumb: The breadcrumb trail for the current page.
 *
 * Page content (in order of occurrence in the default page.tpl.php):
 * - $title: The page title, for use in the actual HTML content.
 * - $messages: HTML for status and error messages. Should be displayed prominently.
 * - $tabs: Tabs linking to any sub-pages beneath the current page (e.g., the
 *   view and edit tabs when displaying a node).
 * - $help: Dynamic help text, mostly for admin pages.
 * - $content: The main content of the current page.
 * - $feed_icons: A string of all feed icons for the current page.
 *
 * Footer/closing data:
 * - $footer_message: The footer message as defined in the admin settings.
 * - $closure: Final closing markup from any modules that have altered the page.
 *   This variable should always be output last, after all other dynamic content.
 *
 * Helper variables:
 * - $classes_array: Array of html class attribute values. It is flattened
 *   into a string within the variable $classes.
 *
 * Regions:
 * - $content_top: Items to appear above the main content of the current page.
 * - $content_bottom: Items to appear below the main content of the current page.
 * - $navigation: Items for the navigation bar.
 * - $sidebar_first: Items for the first sidebar.
 * - $sidebar_second: Items for the second sidebar.
 * - $header: Items for the header region.
 * - $footer: Items for the footer region.
 * - $page_closure: Items to appear below the footer.
 *
 * The following variables are deprecated and will be removed in Drupal 7:
 * - $body_classes: This variable has been renamed $classes in Drupal 7.
 *
 * @see template_preprocess()
 * @see template_preprocess_page()
 * @see zen_preprocess()
 * @see zen_process()
 */
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php print $language->language; ?>" lang="<?php print $language->language; ?>" dir="<?php print $language->dir; ?>">

<head>

  <title><?php print $head_title; ?></title>
  <?php print $head; ?>
  <?php print $styles; ?>
  <?php print $scripts; ?>

</head>

<body class="<?php print $classes; ?>">
  <?php if ($primary_links): ?>
  <div id="skip-link"><a href="#main-menu"><?php print t('Jump to Navigation'); ?></a></div>
  <?php endif; ?>

<div id="page-wrapper">
  <div id="page">
  <div style="clear:both"></div>

  <div id="headerandfeature">
    <div id="header" class="tb<?php print (bool) $topbar_left + (bool) $topbar_right; ?>">

    <?php if($topbar_top || $topbar_left || $topbar_right): ?>
      <div id="topbar-wrapper" class="tb<?php print (bool) $topbar_left + (bool) $topbar_right; ?>">
        <div id="topbartop-wrapper-bg">
          <div id="topbartop-wrapper">
            <?php print $topbar_top; ?>
          </div><!-- /#topbar-wrapper -->
        </div><!-- /#topbar-wrapper-bg -->
        <div style="clear:both"></div>
    	  <div id="topbarleftright-wrapper-bg">		 
        <div id="topbarleftright-wrapper">	 
          <div id="topbar" class="section clearfix">
            <?php if ($topbar_left): ?>
              <div class="column TopbarLeft">
                <?php print $topbar_left; ?>
              </div>
            <?php endif; ?>
            <?php if ($topbar_right): ?>
              <div class="column TopbarRight">
                <?php print $topbar_right; ?>
          	  </div>
            <?php endif; ?> 
          </div><!-- /#topbar -->	 
        </div><!-- /#topbarleftright-wrapper -->	      
          <div style="clear:both"></div>
      </div><!-- /#topbarleftright-wrapper-bg -->
      </div> <!-- #topbar-wrapper -->
    <?php endif; ?>

    <div class="section clearfix">
    <?php if($logo || $site_name || $site_slogan || $header || $header_first || $header_second || $secondary_links): ?>
      <div style="clear:both"></div>
    	<div id="headercontent-wrapper-bg">
        <div id="headercontent-wrapper" class="hf<?php print (int)(bool) $header_first + (int)(bool) $logo + (int)(bool) $site_name + (int)(bool) $site_slogan;?> hs<?php print (int)(bool) $header_second + (int)(bool) $secondary_links;?>">
          <div class="section">
          <div id="headercontent-inner" class="clearfix tbl<?php print (bool) $topbar_left; ?>  tbr<?php print (bool) $topbar_right; ?>">

            <div class="column HeaderLeft">
              <div id="header-site-info" class="clearfix">
                <div id="header-site-info-inner">

          <?php if ($logo): ?>
          	<div class="<?php if ($site_name || $site_slogan) { print ' with-sitename-slogan'; } ?>" id="sitelogo" >
            <a href="<?php print $front_page; ?>" title="<?php print t('Home'); ?>" rel="home" id="logo"><img src="<?php print $logo; ?>" alt="<?php print t('Home'); ?>" /></a>
            </div>     
          <?php endif; ?><!-- logo -->

          <?php if ($site_name || $site_slogan): ?>
            <div id="name-and-slogan" class="clearfix">
              <?php if ($site_name): ?>
          		<?php if ($title): ?>
                  <div id="site-name">
                    <a href="<?php print $front_page; ?>" title="<?php print t('Home'); ?>" rel="home"><span><?php print $site_name; ?></span></a>
                  </div>
                <?php else: /* Use h1 when the content title is empty */ ?>
                  <h1 id="site-name">
                    <a href="<?php print $front_page; ?>" title="<?php print t('Home'); ?>" rel="home"><span><?php print $site_name; ?></span></a>
                  </h1>
                <?php endif; ?><!-- title -->
              <?php endif; ?><!-- site name -->
              <?php if ($site_slogan): ?>
                <div id="site-slogan"><?php print $site_slogan; ?></div>
              <?php endif; ?><!-- site slogan -->
            </div> <!-- /#name-and-slogan -->
          <?php endif; ?><!-- site name and slogan -->

                </div><!-- /#header-site-info-inner -->
              </div><!-- /#header-site-info -->
            <?php print $header_first; ?>
            </div><!-- /#header-left -->

          <?php if ($header_second || $secondary_links): ?>
            <div class="column HeaderRight">
              <?php
                if ($secondary_links) {
                print theme(array('links__system_main_menu', 'links'), $secondary_links,
                  array(
                    'id' => 'secondary-menu',
                    'class' => 'links clearfix menu',
                  ),
                  array(
                    'text' => t('Secondary menu'),
                    'level' => 'h2',
                    'class' => 'element-invisible',
                  )); 
    				        }
              ?>
            <?php print $header_second; ?>
            </div><!-- /#header-right -->
            <?php endif; ?>
            
          <?php print $header; ?>

          </div> <!-- /#headercontent-inner -->
    </div><!-- /.section -->
    </div><!-- /#headercontent-wrapper -->
    </div><!-- /#headercontent-wrapper-bg -->
    <?php endif; ?>
    </div><!-- /.section -->

    <?php if ($primary_links || $navigation): ?>
      <div id="navigation" class="nbl<?php print (int)(bool) $navigation + (int)(bool) $primary_links;?> nbr<?php print (int)(bool) $navbar_right + (int)(bool) $search_box;?>">
      <div class="section clearfix">
        <div id="navbar-wrapper" class="nbl<?php print (int)(bool) $navigation + (int)(bool) $primary_links;?> nbr<?php print (int)(bool) $navbar_right + (int)(bool) $search_box;?>">
        <!-- PRIMARY -->
        <div class="column NavbarLeft">
          <div id="<?php print $primary_links ? 'nav' : 'superfish' ; ?>">
            <?php 
    					     if ($primary_links) {
    		          print theme(array('links__system_main_menu', 'links'), $primary_links,
                array(
                  'id' => 'main-menu',
                  'class' => 'links clearfix menu',
                ),
                array(
                  'text' => t('Main menu'),
                  'level' => 'h2',
                  'class' => 'element-invisible',
                )); 
    				      }
    				      elseif (!empty($navigation)) {
    				        print $navigation;
    				      }
            ?>
          </div><!-- /primary -->
        </div><!-- /#NavbarLeft -->

        <?php if ($navbar_right || $search_box): ?>
        <div class="column NavbarRight">
          <?php if ($search_box): ?>
            <div id="search-box"><?php print $search_box; ?></div>
          <?php endif; ?>
          <?php print $navbar_right; ?>
        </div><!-- /navbarright -->
        <?php endif; ?>
      </div><!-- /#Navbar-wrapper -->
      </div><!-- /.section -->
    </div><!-- /#navigation -->
    <?php endif; ?>

    </div><!-- /#header -->


     <?php if($feature || feature_right): ?>
        <div style="clear:both"></div>
        <div id="feature-wrapper" class="in<?php print (bool) $feature + (bool) $feature_right; ?> "><div id="feature"><div class="section">
              <?php if($feature): ?>
              <div class="column FeatureMain">
                <?php print $feature; ?>
              </div><!-- /.featuremain -->
              <?php endif; ?>
              <?php if($feature_right): ?>
              <div class="column FeatureRight">
                <?php print $feature_right; ?>
              </div><!-- /.featureright -->
              <?php endif; ?> 
          <div style="clear:both"></div>
        </div></div></div><!-- /.section, /#feature-wrapper, /#feature -->
        <div style="clear:both"></div>
        <?php endif; ?>
    </div><!-- /#headerandfeature -->

<div id="sitecontent-wrapper"><div id="sitecontent">

<div id="breadcrumb-wrapper">
  <?php print $breadcrumb; ?>
</div>

<?php if($preface_first || $preface_second || $preface_third || $preface_fourth): ?>
  <div style="clear:both"></div>
  <div id="preface-wrapper" class="in<?php print (bool) $preface_first + (bool) $preface_second + (bool) $preface_third + (bool) $preface_fourth; ?> "><div class="section">
          <?php if($preface_first): ?>
          <div class="column PrefaceFirst">
            <?php print $preface_first; ?>
          </div>
          <?php endif; ?>
          <?php if($preface_second): ?>
          <div class="column PrefaceSecond">
            <?php print $preface_second; ?>
          </div>
          <?php endif; ?>
          <?php if($preface_third): ?>
          <div class="column PrefaceThird">
            <?php print $preface_third; ?>
          </div>
          <?php endif; ?>
          <?php if($preface_fourth): ?>
          <div class="column PrefaceFourth">
            <?php print $preface_fourth; ?>
          </div>
          <?php endif; ?>          
      <div style="clear:both"></div>
    </div></div> <!-- /.section, /#preface-wrapper -->
  <div style="clear:both"></div>
<?php endif; ?>

<div id="main-wrapper"><div id="main" class="clearfix<?php if ($primary_links || $navigation) { print ' with-navigation'; } ?> <?php if ($preface_first || $preface_second || $preface_third || $preface_fourth) { print ' with-preface'; } ?>">

      <div id="content" class="column"><div class="section">

        <?php if ($mission): ?>
          <div id="mission"><?php print $mission; ?></div>
        <?php endif; ?>

        <?php print $highlight; ?>

        <?php if ($title): ?>
          <h1 class="title"><?php print $title; ?></h1>
        <?php endif; ?>
        <?php print $messages; ?>
        <?php if ($tabs): ?>
          <div class="tabs"><?php print $tabs; ?></div>
        <?php endif; ?>
        <?php print $help; ?>
        <?php print $content_top; ?>

  <?php if($content_top1 || $content_top2): ?>
    <div style="clear:both"></div>
    <div id="content-top-wrapper" class="in<?php print (bool) $content_top1 + (bool) $content_top2; ?>"><div class="section">
          <?php if($content_top1): ?>
          <div class="column ContentTop1">
            <?php print $content_top1; ?>
          </div>
          <?php endif; ?>
          <?php if($content_top2) : ?>
          <div class="column ContentTop2">
            <?php print $content_top2; ?>
          </div>
          <?php endif; ?>
      <div style="clear:both"></div>
    </div></div> <!-- /.section, /#content-bottom-wrapper -->
  <?php endif; ?>

        <div id="content-area">
          <?php print $content; ?>
        </div>
        <?php print $content_middle; ?>        
        <?php print $content_bottom; ?>
 <?php if($content_bottom1 || $content_bottom2): ?>
    <div style="clear:both"></div>
    <div id="content-bottom-wrapper" class="in<?php print (bool) $content_bottom1 + (bool) $content_bottom2; ?>"><div class="section">
          <?php if($content_bottom1): ?>
          <div class="column ContentBottom1">
            <?php print $content_bottom1; ?>
          </div>
          <?php endif; ?>
          <?php if($content_bottom2): ?>
          <div class="column ContentBottom2">
            <?php print $content_bottom2; ?>
          </div>
          <?php endif; ?>
      <div style="clear:both"></div>
    </div></div> <!-- /.section, /#content-bottom-wrapper -->
    <?php endif; ?>


        <?php if ($feed_icons): ?>
          <div class="feed-icons"><?php print $feed_icons; ?></div>
        <?php endif; ?>


      </div></div> <!-- /.section, /#content -->

      <?php print $sidebar_first; ?>
      <?php print $sidebar_second; ?>

    </div><!-- /#main -->
    
     <?php if($mainbottom_first || $mainbottom_second || $mainbottom_third || $mainbottom_fourth): ?>
    <div style="clear:both"></div>
    <div id="mainbottom-wrapper" class="in<?php print (bool) $mainbottom_first + (bool) $mainbottom_second + (bool) $mainbottom_third + (bool) $mainbottom_fourth; ?>"><div class="section">
      <?php if($mainbottom_first): ?>
      <div class="column MainBottomFirst">
        <?php print $mainbottom_first; ?>
      </div>
      <?php endif; ?>
      <?php if($mainbottom_second): ?>
      <div class="column MainBottomSecond">
        <?php print $mainbottom_second; ?>
      </div>
      <?php endif; ?>
      <?php if($mainbottom_third): ?>
      <div class="column MainBottomThird">
        <?php print $mainbottom_third; ?>
      </div>
      <?php endif; ?>
      <?php if($mainbottom_fourth): ?>
      <div class="column MainBottomFourth">
        <?php print $mainbottom_fourth; ?>
      </div>
      <?php endif; ?>          
      <div style="clear:both"></div>
    </div></div> <!-- /.section, /#mainbottom-wrapper -->
    <?php endif; ?>
    
    </div> <!-- /#main, /#main-wrapper -->
</div></div> <!-- /#sitecontent-wrapper, /#sitecontent -->

    <div id="bottom-wrapper">
      <div id="bottom">
        <div class="section">
          <?php if($bottom_first || $bottom_second || $bottom_third || $bottom_fourth || $bottom_fifth || $bottom_sixth): ?>
          <div style="clear:both"></div>
          <div id="bottomcontent-wrapper" class="in<?php print (bool) $bottom_first + (bool) $bottom_second + (bool) $bottom_third + (bool) $bottom_fourth + (bool) $bottom_fifth + (bool) $bottom_sixth; ?>">
            <div class="section">
              <?php if($bottom_first): ?>
                <div class="column BottomFirst">
                  <?php print $bottom_first; ?>
                </div>
              <?php endif; ?>
              <?php if($bottom_second): ?>
                <div class="column BottomSecond">
                  <?php print $bottom_second; ?>
                </div>
              <?php endif; ?>
              <?php if($bottom_third): ?>
                <div class="column BottomThird">
                  <?php print $bottom_third; ?>
                </div>
              <?php endif; ?>
              <?php if($bottom_fourth): ?>
                <div class="column BottomFourth">
                  <?php print $bottom_fourth; ?>
                </div>
              <?php endif; ?>
              <?php if($bottom_fifth): ?>
                <div class="column BottomFifth">
                  <?php print $bottom_fifth; ?>
                </div>
              <?php endif; ?>
              <?php if($bottom_sixth): ?>
                <div class="column BottomSixth">
                  <?php print $bottom_sixth; ?>
                </div>
              <?php endif; ?>
            </div><!-- /.section -->
          <div style="clear:both"></div>
          </div><!-- /#bottomcontent-wrapper -->
          <?php endif; ?>
     
          <?php if ($footer_preface_first || $footer_preface_second || $footer_preface_third || $footer || $secondary_links || $sidebar_footer): ?>
          <div style="clear:both"></div>
          <div id="footer-wrapper">
            <div id="footer" class="clearfix<?php if ($sidebar_footer) { print ' with-sidebar-footer'; } ?>">
              <div id="footer-content" class="column">
                <div class="section">
                  
                  <?php if($footer_preface_first || $footer_preface_second || $footer_preface_third): ?>
                  <div style="clear:both"></div>
                  <div id="footer-preface-wrapper" class="in<?php print (bool) $footer_preface_first + (bool) $footer_preface_second + (bool) $footer_preface_third + (bool) $footer_preface_fourth; ?> ">
                    <div class="section">
                      <?php if($footer_preface_first): ?>
                        <div class="column FooterPrefaceFirst">
                          <?php print $footer_preface_first; ?>
                        </div>
                      <?php endif; ?>
                      <?php if($footer_preface_second): ?>
                        <div class="column FooterPrefaceSecond">
                          <?php print $footer_preface_second; ?>
                        </div>
                      <?php endif; ?>
                      <?php if($footer_preface_third): ?>
                        <div class="column FooterPrefaceThird">
                          <?php print $footer_preface_third; ?>
                        </div>
                      <?php endif; ?> 
                      <?php if($footer_preface_fourth): ?>
                        <div class="column FooterPrefaceFourth">
                          <?php print $footer_preface_fourth; ?>
                        </div>
                      <?php endif; ?>
                    <div style="clear:both"></div>
                    </div><!-- /.section -->
                  </div><!-- /#preface-wrapper -->
                  <?php endif; ?>
          
                  <?php if($footer || $sidebar_footer): ?>
                    <div style="clear:both"></div>
                    <div id="footer-content-bottom-wrapper" class="in<?php print (bool) $footer; ?> <?php if ($footer_preface_first || $footer_preface_second || $footer_preface_third || $footer_preface_fourth) { print ' with-footer-preface'; } ?>">
                      <div class="section">
                        <div class="column Footer">
                          <?php print $footer; ?>
                        </div>
                      <div style="clear:both"></div>
                      </div><!-- /.section -->
                    </div><!-- /#footer-content-bottom-wrapper -->
                  <?php endif; ?>  
                
                </div><!-- /.section -->
              </div><!-- /#footer-content -->

              <?php if($sidebar_footer): ?>
                <div class="column SidebarFooter">
                  <div class="section clearfix">
                    <div class="footersidebar">
                      <?php print $sidebar_footer; ?>  
                    </div><!-- /.footersidebar -->
                  </div><!-- /.section -->
                </div><!-- /.SidebarFooter -->
              <?php endif; ?>

            </div><!-- /#footer -->
          </div><!-- /#footer-wrapper -->
          <?php endif; ?>      

        </div><!-- /.section -->
      </div><!-- /#bottom -->
    </div><!-- /#bottom-wrapper  -->

  </div><!-- /#page -->
</div><!-- /#page-wrapper -->

<?php if($page_closure || $footer_message): ?>
  <div id="closure-wrapper">
    <div id="closure">
    <?php print $page_closure; ?>
      <?php if ($footer_message): ?>
        <div id="footer-message"><?php print $footer_message; ?></div>
      <?php endif; ?>
    </div><!-- /#closure -->
  </div><!-- /#closure-wrapper -->
<?php endif; ?>

<?php print $closure; ?>
</body>
</html>
