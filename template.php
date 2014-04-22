<?php

function tbr_main_html_head_alter(&$head_elements) {
  unset($head_elements['metatag_generator']);
  unset($head_elements['system_metatag_generator']);
}

function tbr_main_preprocess_html(&$variables) {

  $tbr_host = str_replace('.', '-', $_SERVER['SERVER_NAME']);
  $tbr_host = explode('-', $tbr_host);
  $tbr_host = $tbr_host[0];

  //add host class in the body
  $variables['classes_array'][] = $tbr_host;

  $filename = "host-{$tbr_host}.css";
  $path = drupal_get_path("theme", "tbr_main");
  
  print $path;

  //if the site specific style exists, then load it VERY last
  if (file_exists($_SERVER["DOCUMENT_ROOT"] . "/{$path}/css/{$filename}")) {
    drupal_add_css("{$path}/css/{$filename}", array('group' => CSS_THEME, 'every_page' => true, 'weight' => 9999));
  }

}