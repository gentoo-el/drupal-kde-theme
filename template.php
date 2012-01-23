<?php
// $Id: template.php,v 1.16 2007/10/11 09:51:29 goba Exp $

/**
 * Sets the body-tag class attribute.
 *
 * Adds 'sidebar-left', 'sidebar-right' or 'sidebars' classes as needed.
 */
function phptemplate_body_class($left, $right) {
  if ($left != '' && $right != '') {
    $class = 'sidebars';
  }
  else if ($left != '') {
    $class = 'sidebar-left';
  }
  else if ($right != '') {
    $class = 'sidebar-right';
  }
  else {
    $class = "none";
  }
  

  if (isset($class)) {
    print ' class="'. $class .'"';
  }
}

/**
 * Return a themed breadcrumb trail.
 *
 * @param $breadcrumb
 *   An array containing the breadcrumb links.
 * @return a string containing the breadcrumb output.
 */
function phptemplate_breadcrumb($breadcrumb) {
  if (!empty($breadcrumb)) {
    return '<div class="breadcrumb">'. implode(' › ', $breadcrumb) .'</div>';
  }
}

/**
 * Allow themable wrapping of all comments.
 */
function phptemplate_comment_wrapper($content, $node) {
  if (!$content || $node->type == 'forum') {
    return '<div id="comments">'. $content .'</div>';
  }
  else {
    return '<div id="comments"><h2 class="comments">'. t('Comments') .'</h2>'. $content .'</div>';
  }
}

/**
 * Override or insert PHPTemplate variables into the templates.
 */
function phptemplate_preprocess_page(&$vars) {
  global $base_url;
  $vars['tabs2'] = menu_secondary_local_tasks();

  // RSS Feed link, this is absolutely ugly, although I'm guessing should work in pretty much all configurations
  
  $icon_url = $base_url. '/' . drupal_get_path('theme', 'dotkde') . '/images/feedIcon.gif';
  $vars['feed'] = l('<img src="'. $icon_url . '"/>', 'rss.xml', array('html' => TRUE));

  // Hook into color.module
  if (module_exists('color')) {
    _color_page_alter($vars);
  }
}

/**
 * Returns the rendered local tasks. The default implementation renders
 * them as tabs. Overridden to split the secondary tasks.
 *
 * @ingroup themeable
 */
function phptemplate_menu_local_tasks() {
  return menu_primary_local_tasks();
}

function phptemplate_comment_submitted($comment) {
  return t('!datetime — !username',
    array(
      '!username' => theme('username', $comment),
      '!datetime' => format_date($comment->timestamp)
    ));
}

function phptemplate_node_submitted($node) {
  return t('!datetime — !username',
    array(
      '!username' => theme('username', $node),
      '!datetime' => format_date($node->created),
    ));
}

/**
 * Generates IE CSS links for LTR and RTL languages.
 */
function phptemplate_get_ie_styles() {
  global $language;

  $iecss = '<link type="text/css" rel="stylesheet" media="all" href="'. base_path() . path_to_theme() .'/fix-ie.css" />';
  if (defined('LANGUAGE_RTL') && $language->direction == LANGUAGE_RTL) {
    $iecss .= '<style type="text/css" media="all">@import "'. base_path() . path_to_theme() .'/fix-ie-rtl.css";</style>';
  }

  return $iecss;
}


function phptemplate_preprocess_node(&$variables) {
  $node = $variables['node'];
  $variables['year'] = date('Y', $node->created);
  $variables['month'] = date('M', $node->created);
  $variables['day'] = date('j', $node->created);

  $user = user_load(array(uid =>$node->uid));
  $variables['name'] = l($user->profile_name, "user/$user->uid");
}