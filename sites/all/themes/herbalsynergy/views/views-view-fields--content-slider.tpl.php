<?php
// $Id: views-view-fields--content-slider.tpl.php,v 1.6 2008/09/24 22:48:21 merlinofchaos Exp $
/**
 * @file views-view-fields--featured-panel.tpl.php
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

		<div class="contentdiv">

			<div class="panelText">
				<h1><a href="<?php print $fields['path']->content; ?>" title="<?php print $fields['title']->content; ?>"><?php print $fields['title']->content; ?></a></h1>
        <?php print $fields['teaser']->content; ?>
			</div>
		
  		<div class="panelImage">		
				<a href="<?php print $fields['path']->content; ?>" title="<?php print $fields['title']->content; ?>"><img src="<?php if ($fields['field_front_image_fid_1']->content) : print $fields['field_front_image_fid_1']->content; elseif ($fields['field_main_img_fid_1']->content) : print $fields['field_main_img_fid_1']->content; else : print ""; endif; ?>" alt="<?php print $title ?>" /></a>
  		</div>  			
   		
		</div><!-- /content-div -->
