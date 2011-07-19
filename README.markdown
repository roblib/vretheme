## Description of VREtheme

The VREtheme was initially created as a base theme for the UPEI's Virtual Research Environment Drupal/Islandora websites. It's use has since expanded to the Islandora Virtual Machine base theme, the Lib2o base theme, and serves as the base theme for many other websites created through Discovery Garden Inc. and Robertson Library projects. 

The VREtheme is a D6 Zen sub-theme that relies on the core components of [Zen 2.x](http://drupal.org/project/zen) It has two sub-sub-themes included with it, called corporate and designer. 

* Zen 2.x is required to be in the themes directory along with your vretheme sub-theme
* Stylesheet breakdowns for the zen theme are here: - http://drupal.org/node/1069786 VREtheme stylesheets are described in more detail below.

## Basic theme directory structure:

Included in this theme, there are two sub sub themes, that rely on vretheme for their core layout components. While these two sub sub themes have the same core layout, they have selective regions defined, as well as different theme settings and different looks. These templates also have starterkits included to build sub-sub-sub themes, to make subtle changes for your own look. This theme is updated often, so rather than modifying this theme, it is recommended you create your own theme using the starterkit files provided, and place it in the sites/all/themes/ folder, it would then be dependent on zen, and vretheme. 

* **drupal/sites/all/themes/**
  * **zen** (this is zen 2.x - required, should never be modified)
  * **vretheme** (sub-theme core template)
      * **starterkit** (starterkit file to generate your own sub-sub-theme based on core vretheme)
      * **corporate** (sub-sub-theme template)
          * **starterkit** (starterkit file to generate your own sub-sub-sub-theme based on corporate)
      * **designer** (sub-sub-theme template)
           * **starterkit** (starterkit file to generate your own sub-sub-sub-theme based on designer)

## Theme files 
Further sections below will elaborate on more important files in the theme..

* **vretheme/** - core template folder, considered a sub-theme to drupal
  * **vretheme.info** - This defines regions, defines the core theme (zen), specifies js files and sets theme settings
  * **template.php** - preprocessor functions and hooks would go here.
  * **theme-settings.php** - contains the code for the settings that appear in theme settings.
  * **logo.png** - default logo
  * **favicon.ico** - default favicon
  * **screenshot.png** - screenshot on themes page
  * **README** - readme file for the theme
  * **js/** - this folder houses any javascript the theme may be calling
  * **images/** - this houses core template images
  * **images-source** - this would house any source image files for the theme, but there are none for vretheme (yet)
  * **css/** - all of the core css files are here
  * **templates/** - content-type, view, block, page, node, etc template override location
  * **starterkit/** (starterkit file to generate your own sub-theme based on core vretheme)
  * **corporate/** - corporate theme folder, considered a sub-sub-theme to drupal
      * **colors/** - color stylesheets for this theme, selectable in theme-settings
      * **corporate.info** - This defines regions, defines the core theme (vretheme), specifies js files and sets theme settings
      * **css/** - contains 1 css file, named the same name as the theme for core CSS overrides
      * **images/** - this houses corporate only images
      * **logo.png** - default corporate logo
      * **screenshot.png** - screenshot on themes page
      * **README** - readme file for corporate  theme
      * **templates/** - corporate template overrides, if nothing is added here, the theme will fall back to core template files
      * **theme-settings.php** - theme settings specific to the corporate theme
      * **starterkit/** (starterkit file to generate your own sub-sub-sub-theme based on corporate)
  * **designer/** - designer theme folder, considered a sub-sub-theme to drupal
      * **designer.info** - This defines regions, defines the core theme (vretheme), specifies js files and sets theme settings
      * **css/** - contains 1 css file, named the same name as the theme for core CSS overrides
      * **images/** - this houses designer only images
      * **logo.png** - default designer logo
      * **screenshot.png** - screenshot on themes page
      * **README** - readme file for designer theme
      * **templates/** - designer template overrides, if nothing is added here, the theme will fall back to core template files
      * **theme-settings.php** - theme settings specific to the designer theme
      * **starterkit/** (starterkit file to generate your own sub-sub-sub-theme based on designer)

## Stylesheets

Most of the changes you would need to make can be handled via css, the css files you would use for specific site overrides are in the vretheme/css folder. For the most part these are very similar to Zen's defaults with a few additional stylesheets and some modifications with the existing ones. These stylesheets are defined in vretheme.info, if you add or remove a stylesheet then it must be declared in vretheme.info and you must clear your drupal cache to see the change.

### Core Stylesheets

* **html-reset.css** - This isn't a "reset" stylesheet. Instead this is the place where you should set (not reset) the default styling for all HTML elements.
* **layout-fixed.css** - Zen's default layout is based on the Zen Columns layout method. The layout-fixed.css file contains all column and layout styling.
* **page-backgrounds.css** - Layered backgrounds across scattered divs can be easier to manage if they are centralized in one location.
* **tabs.css** - Tab styling, these tabs are css3 based and degrade gracefully for ie
* **messages.css** - Styling for Drupal tabs and Drupal status messages.
* **pages.css** - Page styling for the markup in the page.tpl.php template.
* **blocks.css** - Block styling for the markup in the block.tpl.php template.
* **navigation.css** - The styling for your site's menus can get quite bulky and its easier to see all the styles if they are grouped together rather then across the header/footer sections of pages.css and in blocks.css.
* **views-styles.css** - Views styling for the markup in various views templates. You'll notice this stylesheet isn't called "views.css" as that would override (remove) the Views module's stylesheet.
* **nodes.css** - Node styling for the markkup in the node.tpl.php template.
* **comments.css** - Comment styling for the markup in the comment-wrapper.tpl.php and comments.tpl.php templates.
* **forms.css** - Form styling for the markup in various Drupal forms, this also contains button styling. Since buttons are commonly used in forms, the code is located here.
* **superfish.css** - Styling for dropdown menus in the primary link section, code here is integral for the related javascript to work, color styling should be placed in navigation.css
* **islandora.css** - Styling for islandora specific displays
* **jcarousel.css** - Overrides for the jcarousel jquery plugin
* **typography.css** - Offers some optional typography classes
* **print.css** - The print styles for all markup.
* **ie.css**:
* **ie6.css** - The Internet Explorer stylesheets are added via conditional comments. Many CSS authors find using IE "conditional stylesheets" much easier then writing rulesets with CSS hacks that are known to only apply to various versions of IE.

### Sub Sub Theme Stylesheets

  * **corporate/css/**
    * **corporates.css** - corporate theme's stylesheet, overrides the core stylesheets
  * **designer/css/**
    * **designer.css** - designer theme's stylesheet, overrides the core stylesheets

A description of zen's default stylesheets & IE issues: http://drupal.org/node/1069786

## Javascript

* **VREtheme/js/**
  * **superfish.js** - this is the core dropdown menu code
  * **hoverIntent.js** - this is a superfish javascript file that must be included, it controls how the dropdowns behave
  * **jquery_example/** - this is a jquery module to add the word "Search" to search box locations
  * **searchtext.js** - this defines where the word "search" appears in drupal (related to the jquery_example module)

More involved changes would be handled in the core template's templates/page.tpl.php (region locations & page structure) and preprocessor functions and hooks, etc would go in template.php

## Templates
### Core Templates

* **vretheme/**
  * **template.php** - currently there are overrides to add custom CSS ids to all menu links, and to shorten default form lengths for fixed-width themes
  * **templates/page.tpl.php** - This contains all of the structural php & html markup, as well as doctype & file includes.. similar to an index.php

### Sub Sub Theme Templates

* **vretheme/corporate**
  * **template.php** -
  * **templates/** - There are currently no templates included in this theme, template changes made in core are dished out to all sub sub themes
* **vretheme/designer**
  * **template.php** -
  * **templates/** - There are currently no templates included in this theme, template changes made in core are dished out to all sub sub themes


### Reference docs

Zen Documentation
http://drupal.org/node/193318
