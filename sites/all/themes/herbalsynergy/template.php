<?php
// $Id: template.php,v 1.16.2.2 2009/08/10 11:32:54 goba Exp $
/**
 * Sets the body-tag class attribute.
 *
 * Adds 'sidebar-left', 'sidebar-right' or 'sidebars' classes as needed.
 */
function phptemplate_body_class($left, $right) {
  if ($left != '' && $right != '') {
    $class = 'sidebars';
  }
  else {
    if ($left != '') {
      $class = 'sidebar-left';
    }
    if ($right != '') {
      $class = 'sidebar-right';
    }
  }

  if (isset($class)) {
    print ' class="'. $class .'"';
  }
}


/**
 * Allows for a separate node template for a specific node
 *
 */
 
function phptemplate_preprocess_node(&$vars) {
    $vars['template_files'][] = 'node-' . $vars['nid'];
}


/**
 * Return a themed breadcrumb trail.
 *
 * @param $breadcrumb
 *   An array containing the breadcrumb links.
 * @return a string containing the breadcrumb output.
 */
function phptemplate_breadcrumb($breadcrumb){
     if (!empty($breadcrumb)) {
        //$breadcrumb[] = drupal_get_title();
        return '<div class="breadcrumb">'. implode(' &raquo; ', $breadcrumb) .'</div>';
    }
}

/**
 * Override or insert PHPTemplate variables into the templates.
 */
function phptemplate_preprocess_page(&$vars) {
  $vars['tabs2'] = menu_secondary_local_tasks();

  // Hook into color.module
  if (module_exists('color')) {
    _color_page_alter($vars);
  }
}

/**
 * Add a "Comments" heading above comments except on forum pages.
 */
function garland_preprocess_comment_wrapper(&$vars) {
  if ($vars['content'] && $vars['node']->type != 'forum') {
    $vars['content'] = '<h2 class="comments">'. t('Comments') .'</h2>'.  $vars['content'];
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
  return t('!datetime ? !username',
    array(
      '!username' => theme('username', $comment),
      '!datetime' => format_date($comment->timestamp)
    ));
}

function phptemplate_node_submitted($node) {
  return t('!datetime ? !username',
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
  if ($language->direction == LANGUAGE_RTL) {
    $iecss .= '<style type="text/css" media="all">@import "'. base_path() . path_to_theme() .'/fix-ie-rtl.css";</style>';
  }

  return $iecss;
}


/**
* Return a multidimensional array of links for a navigation menu.
*/
function themename_navigation_links($menu_name, $level = 0) {
  // Don't even bother querying the menu table if no menu is specified.
  if (empty($menu_name)) {
    return array();
  }

  // Get the menu hierarchy for the current page.
  $tree_page = menu_tree_page_data($menu_name);
  // Also get the full menu hierarchy.
  $tree_all = menu_tree_all_data($menu_name);

  // Go down the active trail until the right level is reached.
  while ($level-- > 0 && $tree_page) {
    // Loop through the current level's items until we find one that is in trail.
    while ($item = array_shift($tree_page)) {
      if ($item['link']['in_active_trail']) {
        // If the item is in the active trail, we continue in the subtree.
        $tree_page = empty($item['below']) ? array() : $item['below'];
        break;
      }
    }
  }

  return themename_navigation_links_level($tree_page, $tree_all);
}


/**
* Helper function for themename_navigation_links to recursively create an array of links.
* (Both trees are required in order to include every menu item and active trail info.)
*/
function themename_navigation_links_level($tree_page, $tree_all) {
  $links = array();
  foreach ($tree_all as $key => $item) {
    $item_page = $tree_page[$key];
    $item_all = $tree_all[$key];
    if (!$item_all['link']['hidden']) {
        $class = '';
      $l = $item_all['link']['localized_options'];
      $l['href'] = $item_all['link']['href'];
      $l['title'] = $item_all['link']['title'];
      if ($item_page['link']['in_active_trail']) {
          $class = ' active-trail';
      }
      if ($item_all['below']) {
        $l['children'] = themename_navigation_links_level($item_page['below'], $item_all['below']);
      }
      // Keyed with the unique mlid to generate classes in theme_links().
      $links['menu-'. $item_all['link']['mlid'] . $class] = $l;
    }
  }
  return $links;
}

/**
* Return a themed set of links. (Extended to support multidimensional arrays of links.)
*/
function themename_links($links, $attributes = array('class' => 'links')) {
  $output = '';

  if (count($links) > 0) {
    $output = '<ul'. drupal_attributes($attributes) .'>';

    $num_links = count($links);
    $i = 1;

    foreach ($links as $key => $link) {
      $class = $key;

      // Add first, last and active classes to the list of links to help out themers.
      if ($i == 1) {
        $class .= ' first';
      }
      if ($i == $num_links) {
        $class .= ' last';
      }
      if (isset($link['href']) && ($link['href'] == $_GET['q'] || ($link['href'] == '<front>' && drupal_is_front_page()))) {
        $class .= ' active';
      }
      // Added: if the link has child items, add a haschildren class
      if (isset($link['children'])) {
        $class .= ' haschildren';
      }
      $output .= '<li'. drupal_attributes(array('class' => $class)) .'>';

      if (isset($link['href'])) {
        // Pass in $link as $options, they share the same keys.
        $output .= l($link['title'], $link['href'], $link);
      }
      else if (!empty($link['title'])) {
        // Some links are actually not links, but we wrap these in <span> for adding title and class attributes
        if (empty($link['html'])) {
          $link['title'] = check_plain($link['title']);
        }
        $span_attributes = '';
        if (isset($link['attributes'])) {
          $span_attributes = drupal_attributes($link['attributes']);
        }
        $output .= '<span'. $span_attributes .'>'. $link['title'] .'</span>';
      }
     
      // Added: if the link has child items, print them out recursively
      if (isset($link['children'])) {
        $output .= "\n" . theme('links', $link['children'], array('class' =>'sublinks'));
      }

      $i++;
      $output .= "</li>\n";
    }

    $output .= '</ul>';
  }

  return $output;
}

/**
* Return a block after the page content and before the comments
*/
function herbalsynergy_preprocess_node(&$variables, $hook) {
  $variables['above_comments'] = theme('blocks', 'above_comments');
}

/**
 * Theme override of theme_username(), removing '(not verified)'.
 */
function herbalsynergy_username($object) {
  return str_replace(' ('. t('not verified') .')', '', theme_username($object));
}