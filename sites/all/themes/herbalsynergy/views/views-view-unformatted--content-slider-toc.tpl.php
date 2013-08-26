<?php
// $Id: views-view-unformatted--featured-panel-toc.tpl.php,v 1.6 2008/10/01 20:52:11 merlinofchaos Exp $
/**
 * @file views-view-unformatted--featured-panel-toc.tpl.php
 * Default simple view template to display a list of rows.
 *
 * @ingroup views_templates
 */
?>

<?php $my_rows = count($rows); if($my_rows > 1) : ?>

<?php foreach ($rows as $id => $row): ?>

    <?php print $row; ?>

<?php endforeach; endif; ?>
