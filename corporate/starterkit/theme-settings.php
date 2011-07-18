<?php
// $Id: theme-settings.php,v 1.7 2008/09/11 09:36:50 johnalbin Exp $

// Include the definition of zen_settings() and zen_theme_get_default_settings().
include_once './' . drupal_get_path('theme', 'corporate') . '/theme-settings.php';


/**
 * Implementation of THEMEHOOK_settings() function.
 *
 * @param $saved_settings
 *   An array of saved settings for this theme.
 * @return
 *   A form array.
 */
function STARTERKIT_settings($saved_settings) {

  // Get the default values from the .info file.
  $defaults = zen_theme_get_default_settings('STARTERKIT');

  // Merge the saved variables and their default values.
  $settings = array_merge($defaults, $saved_settings);

  /*
   * Create the form using Forms API: http://api.drupal.org/api/6
   */
  $form = array();


  $form['corporate_design'] = array(
    '#type'          => 'radios',
    '#title'         => t('Color Scheme'),
    '#default_value' => $settings['corporate_design'],
    '#options'       => array(
      '0' => t('None (default grey)'),
      '1' => t('Dark Blue'),      
      '2' => t('Green'),
      '3' => t('Orange'),
     ),
    '#description'   => t('Select an option above if you wish to use a pre-designed color scheme.'),
    
  );

  // Add the base theme's settings.
  $form += corporate_settings($saved_settings, $defaults);

  // Remove some of the base theme's settings.
  unset($form['themedev']['zen_layout']); // We don't need to select the base stylesheet.

  // Return the form
  return $form;
}

