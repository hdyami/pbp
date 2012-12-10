<?php
// $Id: theme-settings.php,v 1.1.2.8 2008/01/27 12:57:41 johnalbin Exp $

/**
 * Implementation of THEMEHOOK_settings() function.
 *
 * @param $saved_settings
 *   An array of saved settings for this theme.
 * @param $subtheme_defaults
 *   Allow a subtheme to override the default values.
 * @return
 *   A form array.
 */
function pbp_settings($saved_settings, $subtheme_defaults = array()) {

  // Add the form's CSS
  drupal_add_css(drupal_get_path('theme', 'pbp') .'/theme-settings.css', 'theme');

  // Add javascript to show/hide optional settings
  drupal_add_js(drupal_get_path('theme', 'pbp') .'/theme-settings.js', 'theme');

  /*
   * The default values for the theme variables. Make sure $defaults exactly
   * matches the $defaults in the theme-settings-init.php file.
   */
  $defaults = array(
    'pbp_block_editing' => 1,
    'pbp_breadcrumb' => 'yes',
    'pbp_breadcrumb_separator' => ' › ',
    'pbp_breadcrumb_home' => 1,
    'pbp_breadcrumb_trailing' => 1,
    'pbp_layout' => 'border-politics-liquid',
    'pbp_wireframes' => 0,
  );
  $defaults = array_merge($defaults, $subtheme_defaults);

  // Merge the saved variables and their default values
  $settings = array_merge($defaults, $saved_settings);

  /*
   * Create the form using Form API
   */
  $form['pbp-div-opening'] = array(
    '#value'         => '<div id="pbp-settings">',
  );

  $form['pbp_block_editing'] = array(
    '#type'          => 'checkbox',
    '#title'         => t('Show block editing on hover'),
    '#description'   => t('When hovering over a block, privileged users will see block editing links.'),
    '#default_value' => $settings['pbp_block_editing'],
  );

  $form['breadcrumb'] = array(
    '#type'          => 'fieldset',
    '#title'         => t('Breadcrumb settings'),
    '#attributes'    => array('id' => 'pbp-breadcrumb'),
  );
  $form['breadcrumb']['pbp_breadcrumb'] = array(
    '#type'          => 'select',
    '#title'         => t('Display breadcrumb'),
    '#default_value' => $settings['pbp_breadcrumb'],
    '#options'       => array(
                          'yes'   => t('Yes'),
                          'admin' => t('Only in admin section'),
                          'no'    => t('No'),
                        ),
  );
  $form['breadcrumb']['pbp_breadcrumb_separator'] = array(
    '#type'          => 'textfield',
    '#title'         => t('Breadcrumb separator'),
    '#description'   => t('Text only. Don’t forget to include spaces.'),
    '#default_value' => $settings['pbp_breadcrumb_separator'],
    '#size'          => 5,
    '#maxlength'     => 10,
    '#prefix'        => '<div id="div-pbp-breadcrumb-collapse">', // jquery hook to show/hide optional widgets
  );
  $form['breadcrumb']['pbp_breadcrumb_home'] = array(
    '#type'          => 'checkbox',
    '#title'         => t('Show home page link in breadcrumb'),
    '#default_value' => $settings['pbp_breadcrumb_home'],
  );
  $form['breadcrumb']['pbp_breadcrumb_trailing'] = array(
    '#type'          => 'checkbox',
    '#title'         => t('Append a separator to the end of the breadcrumb'),
    '#default_value' => $settings['pbp_breadcrumb_trailing'],
    '#description'   => t('Useful when the breadcrumb is placed just before the title.'),
    '#suffix'        => '</div>', // #div-pbp-breadcrumb
  );

  $form['themedev'] = array(
    '#type'          => 'fieldset',
    '#title'         => t('Theme development settings'),
    '#attributes'    => array('id' => 'pbp-themedev'),
  );
  $form['themedev']['pbp_layout'] = array(
    '#type'          => 'radios',
    '#title'         => t('Layout method'),
    '#options'       => array(
                          'border-politics-liquid' => t('Liquid layout') .' <small>(layout-liquid.css)</small>',
                          'border-politics-fixed' => t('Fixed layout') .' <small>(layout-fixed.css)</small>',
                        ),
    '#default_value' => $settings['pbp_layout'],
  );
  $form['themedev']['pbp_wireframes'] = array(
    '#type'          => 'checkbox',
    '#title'         => t('Display borders around main layout elements'),
    '#default_value' => $settings['pbp_wireframes'],
    '#description'   => l(t('Wireframes'), 'http://www.boxesandarrows.com/view/html_wireframes_and_prototypes_all_gain_and_no_pain') . t(' are useful when prototyping a website.'),
    '#prefix'        => '<div id="div-pbp-wireframes"><strong>'. t('Wireframes:') .'</strong>',
    '#suffix'        => '</div>',
  );

  $form['pbp-div-closing'] = array(
    '#value'         => '</div>',
  );

  // Return the form
  return $form;
}
