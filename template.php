<?php
// $Id: template.php,v 1.2.4.8 2010/12/18 06:35:00 jmburnz Exp $


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

  if(arg(0) == 'volunteers'){
    if( arg(1) == 'login' || arg(1) == 'rsvp'){
      unset($vars['page']['sidebar_first']);
      unset($vars['primary_navigation']);
    }
  }
}
