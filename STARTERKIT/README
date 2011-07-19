Summary

The cairntheme theme is a D6 Zen sub-theme that relies on the core components of Zen 2.x - http://drupal.org/project/zen

 * *Zen 2.x* is required to be in the themes directory along with your cairntheme sub theme

The cairntheme directory  in your theme folder is a sub-theme of Zen. This folder is actually the main template for all of the current cairntheme websites. The main template is basically all of the core style similarities of all of the sites, such as fixed width, margins, padding, sizes, etc. 

 * stylesheet breakdowns for the core template are here:  - http://drupal.org/node/1069786

Each of the websites then has it's own sub-sub-theme of the cairntheme, stored in the cairntheme folder by site name. The sub-sub-themes contain basic overrides such as color changes, header changes, etc. These sub-sub-themes are the only themes that should be modified for per site styling, if you modify the core template, all sites will be affected. 
 
 * Theme bugs, or overall feature additions should be addressed in the core theme. 

h3. Basic theme directory structure: 

 * sites/all/themes/
 ** zen (this is zen 2.x - required, should never be modified)
 ** cairntheme (sub-theme core template)
 *** cairnroblib (sub-sub-theme)

Most of the changes you would need to make can be handled via css, the css files you would use for specific site overrides are simply in the css folder of the respective site name. 

example:  

 * cairnroblib/css/cairnroblib.css

More involved changes would be handled in the core template's templates/page.tpl.php (region locations & page structure) and preprocessor functions and hooks, etc would go in template.php


h2. Detailed Notes

Here are the breakdown of the theme files in detail: 

 * *cairntheme/* - core template folder, considered a sub-theme to drupal, same folder that houses all of the sub-sub-themes
 ** *cairntheme.info* - This defines regions, defines the core theme (zen), specifies js files and sets theme settings
 ** *template.php* - preprocessor functions and hooks would go here, if a sub-sub-theme does not have a template.php, it falls back to this one
 ** *theme-settings.php* - not used, as this is part of the core template but must be present
 ** *logo.png* - default logo - not used, as this is part of the core template but must be present
 ** *favicon.ico* - default favicon - not used, as this is part of the core template but must be present
 ** *screenshot.png* - screenshot on themes page for template (not important, but must be present)
 ** *README* - readme file for the theme
 ** *js/* - this folder houses any javascript the theme may be calling
 ** *images/* - this houses core template images, if a sub-sub-theme does not call an image, the theme falls back to these in the core template
 ** *images-source* - this houses the source psd's that are used to create the header, search bar & nav bar
 ** *css/* - all of the core css files are here
 ** *templates/* - content-type, view, block, page, node, etc template override location, if a sub-sub-theme does not have template files in it's own templates dir, it falls back to this folder
 ** *starterkit/* - this is the kit used to create new sub-sub-themes
 ** *cairnroblib/* - sub-sub-theme

h3. breakdown of files in a sub-sub-theme

 * *themename/* - this is the theme name, it should correspond with the name of your sub-sub-theme's .info file
 ** *logo.png* - this is the logo for the sub-sub-theme
 ** *screenshot.jpg* - this is the screenshot that appears when picking your theme in theme-settings
 ** *template.php* - custom functions can be added here that will work only for the sub-sub-theme, the sub-sub-theme will read this file first, then fall back to the core theme's template.php
 ** *theme-settings* - you can further add features for your theme-settings page here
 ** *css/* - contains 1 css file themename.css, this is for overrides of the core template to customize your sub-sub-theme
 ** *images/* - put images here that you reference from your themename.css
 ** *js/* - if you wish to add javascript to a specific sub-sub-theme, drop it here and initialize it in your themename.info
 ** *templates/* - template overrides get added here, if you are overriding a core drupal feature, then first copy the .tpl.php from the zen templates folder (example node.tpl.php) then add it to your sub-theme (core) or sub-sub-theme templates folder.. You can then directly modify it, or copy it and make a new one to further isolate the thing you want to modify (example node-content_type_name.tpl.php)

h2. How to create a new sub-sub-theme

 * copy the starterkit/ folder to a new theme name
 * do a search and replace in theme-settings.php, template.php and starterkit.info.text for STARTERKIT and replace with your themename
 * rename starterkit.info.text to themename.info
 * rename css/starterkit.css to themename.css
 * do a search and replace on themename.css for the 3 main colors #f7e59d (gold replacement), #292c33 (green replacement), #517801 (brown replacement) with your own replacement colors 
 * you will need to go into the sub-sub-theme and change link colors where necessary, even if using the script below

If you wanted to do this with a shell script, you would use: 

<pre>
!/bin/bash

dir=/var/aegir/platforms/drupal-6.20/sites/all/themes/cairntheme
user=username
group=webdevelopers

# Get name of new multisite
echo -n "Enter name of new subtheme: "
read sub

# Get the replacement colour codes for the new theme

echo -n "Enter the primary colour in HEX (red text and links on UPEI): "
read red

echo -n "Enter the secondary colour in HEX (gold navbar on UPEI): "
read gold

echo -n "Enter the secondary gradient colour in HEX (choose a lighter color - http://www.colorzilla.com/gradient-editor/ ): "
read goldgradient

echo -n "Enter the third replacement colour (green highlights on UPEI): "
read green

# Stripout any dashes in new name
sub2=`echo $sub | sed 's/\-//'`

# Create new theme dir and copy Zen starterkit into it
cp -R $dir/starterkit  $dir/$sub2

# Rename starterkit files and find/replace starterkit with new subtheme name in all the files
mv $dir/$sub2/starterkit.info.txt $dir/$sub2/$sub2.info
mv $dir/$sub2/css/starterkit.css $dir/$sub2/css/$sub2.css
cd $dir/$sub2/
chown -R $user:$group $dir/$sub2

sed -i "s/starterkit/$sub2/g" $dir/$sub2/template.php
sed -i "s/starterkit/$sub2/g" $dir/$sub2/theme-settings.php
sed -i "s/starterkit/$sub2/g" $dir/$sub2/$sub2.info

# Replace the colour codes in css/<theme>.css
sed -i "s/8B1F04/$red/g" $dir/$sub2/css/$sub2.css
sed -i "s/F5AE30/$gold/g" $dir/$sub2/css/$sub2.css
sed -i "s/F4DAAD/$goldgradient/g" $dir/$sub2/css/$sub2.css
sed -i "s/6B6F2A/$green/g" $dir/$sub2/css/$sub2.css
</pre>

h2. 
Custom mods made to specific cairntheme sites

 ** *cairnroblib/* - no custom changes

h2. Reference docs

Zen Documentation
http://drupal.org/node/193318
