<?php
/**
 * @file
 *  template.php
 *
 * @author
 * @copyright 2014 Syddjurs Kommune. See README.md at
 * https://github.com/os2web/valghalla-deploy
 */

/**
 * Override or insert variables into the page templates.
 */
function valhalla_preprocess_page(&$vars) {
  global $user;

  $vars['hello_user_text'] = FALSE;
  if ($user->uid) {
    $user = user_load($user->uid);

    $list = '';
    if (!empty($user->field_party[LANGUAGE_NONE][0]['tid'])) {
      $term = taxonomy_term_load($user->field_party[LANGUAGE_NONE][0]['tid']);
      $list = '<span class="list">Liste ' . $term->name . '</span>';
    }
    $vars['hello_user_text'] = t('Du er logget på som: !username', array('!username' => theme('username', array('account' => $user)))) . $list;
  }

  // Hide unnessecary page elements when volunteer is rsvp'ing
  if(arg(0) == 'volunteers'){
    if( arg(1) == 'login' || arg(1) == 'rsvp'){
      unset($vars['page']['sidebar_first']);
      unset($vars['primary_navigation']);
    }
  }
}
