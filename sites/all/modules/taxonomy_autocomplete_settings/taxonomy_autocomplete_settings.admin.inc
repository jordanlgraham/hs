<?php

/**
 * @file taxonomy_autocomplete_settings.admin.inc
 * Contains the admin settings form.
 */

/**
 * settings form
 */
function taxonomy_autocomplete_settings_settings_form() {
  $result = db_query("SELECT vid, name FROM {vocabulary}");
  $list = array('match anything', 'match the beginning');

  while ($row = db_fetch_object($result)) {
    $form['vocab_'. $row->vid] = array(
      '#type' => 'fieldset',
      '#title' => t('Vocabulary: %vocab', array('%vocab' => $row->name)),
      '#tree' => FALSE,
    );
    $form['vocab_'. $row->vid]['taxonomy_autocomplete_settings_'. $row->vid] = array(
      '#type' => 'select',
      '#options' => $list,
      '#title' => t('Matching behavior'),
      '#default_value' => variable_get('taxonomy_autocomplete_settings_'. $row->vid, array()),
    );
    $form['vocab_'. $row->vid]['taxonomy_autocomplete_settings_results_'. $row->vid] = array(
      '#type' => 'textfield',
      '#title' => t('Number of results to show'),
      '#size' => 8,
      '#maxlength' => 5,
      '#default_value' => variable_get('taxonomy_autocomplete_settings_results_'. $row->vid, 10),
    );
    $form['vocab_'. $row->vid]['taxonomy_autocomplete_settings_second_search_'. $row->vid] = array(
      '#type' => 'checkbox',
      '#title' => t('Fill results with "match anything" results'),
      '#description' => t('If there are not enough returned results from a "match the beginning" search to equal the "number of results to show", fill the rest of the results with additional "match anything" results. This has no effect if the matching behavior is set to "match anything".'),
      '#default_value' => variable_get('taxonomy_autocomplete_settings_second_search_'. $row->vid, FALSE),
    );
  }

  return system_settings_form($form);
}
