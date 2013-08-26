<?php
// $Id: views-view-fields--samples-node-data.tpl.php,v 1.6 2008/09/24 22:48:21 merlinofchaos Exp $
/**
 * @file views-view-fields--samples-node-data.tpl.php
 * Default simple view template to all the fields as a row.
 *
 * - $view: The view in use.
 * - $fields: an array of $field objects. Each one contains:
 *   - $field->content: The output of the field.
 *   - $field->raw: The raw data for the field, if it exists. This is NOT output safe.
 *   - $field->class: The safe class id to use.
 *   - $field->handler: The Views field handler object controlling this field. Do not use
 *     var_export to dump this object, as it can't handle the recursion.
 *   - $field->inline: Whether or not the field should be inline.
 *   - $field->inline_html: either div or span based on the above flag.
 *   - $field->separator: an optional separator that may appear before a field.
 * - $row: The raw result object from the query, with all data it fetched.
 *
 * @ingroup views_templates
 */
?>

<div class="field-label"><?php print $fields['type']->content; ?>:</div>
<div class="views-field field"><?php print $fields['field_sample_src_nid']->content; ?></div>

<div class="field-label">Test Date:</div>
<div class="views-field field"><?php print $fields['created']->content; ?></div>

<div class="field-label">Dominance:</div>
<div class="views-field field"><?php print $fields['field_dominance_value']->content; ?></div>

  <table class="views-table cols-1">
    <thead>
    <tr>
              <th class="views-field views-field-field-thc-value">
          THC        </th>
              <th class="views-field views-field-field-cbd-value">
          CBD        </th>
              <th class="views-field views-field-field-cbn-value">
          CBN        </th>

              <th class="views-field views-field-cid1">
          Total Cannabinoids        </th>
          </tr>
  </thead>
  <tbody>
          <tr class="odd views-row-first views-row-last">
                  <td class="views-field views-field-field-thc-value"><?php print $fields['field_thc_value']->content; ?></td>

                  <td class="views-field views-field-field-cbd-value"><?php print $fields['field_cbd_value']->content; ?></td>

                  <td class="views-field views-field-field-cbn-value"><?php print $fields['field_cbn_value']->content; ?></td>

                  <td class="views-field views-field-cid1"><?php print $fields['cid1']->content; ?></td>
              </tr>

      </tbody>
</table>

<div class="views-field"><?php print $fields['body']->content; ?></div>

