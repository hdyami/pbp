<?php
// $Id: theme-settings-init.php,v 1.1.2.7 2008/04/21 02:45:34 johnalbin Exp $

if (is_null(theme_get_setting('pbp_block_editing'))) {
  global $theme_key;

  /*
   * The default values for the theme variables. Make sure $defaults exactly
   * matches the $defaults in the theme-settings.php file.
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

  // Get default theme settings.
  $settings = theme_get_settings($theme_key);
  // Don't save the toggle_node_info_ variables.
  if (module_exists('node')) {
    foreach (node_get_types() as $type => $name) {
      unset($settings['toggle_node_info_' . $type]);
    }
  }
  // Save default theme settings.
  variable_set(
    str_replace('/', '_', 'theme_'. $theme_key .'_settings'),
    array_merge($defaults, $settings)
  );
  // Force refresh of Drupal internals.
  theme_get_setting('', TRUE);
}
