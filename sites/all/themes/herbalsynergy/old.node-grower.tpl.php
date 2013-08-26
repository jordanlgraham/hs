<?php
// $Id: node-grower.tpl.php,v 1.5 2011/01/27 09:51:29 goba Exp $
?>
<div id="node-<?php print $node->nid; ?>" class="node<?php if ($sticky) { print ' sticky'; } ?><?php if (!$status) { print ' node-unpublished'; } ?>">
 
  <div class="content-full clear-block">

    <?php print $content ?> 
 
    <?php  if ($field_web_site[0]['view']) : ?>
    <div class="field-field-web-site">
      <div class="field-label">Website:</div> 
      <a href="<?php print $field_web_site[0]['view'] ?>" title="<?php print $title ?>" target="_new"><?php print $field_web_site[0]['view'] ?></a>
    </div>
    <?php endif; ?>  
 
    <?php  if ($field_email[0]['view']) : ?>  
    <div class="field-field-email"> 
   	  <div class="field-label">Email:</div>
      <a href="mailto:<?php print $field_email[0]['view'] ?>" title="Email: <?php print $field_email[0]['view'] ?>"><?php print $field_email[0]['view'] ?></a>
    </div>
    <?php endif; ?>     
   
<!-- AddThis Button BEGIN -->
<div class="addthis_toolbox addthis_default_style">
<a class="addthis_button_facebook_like" fb:like:layout="button_count"></a>
<a class="addthis_button_tweet"></a>
<a class="addthis_counter addthis_pill_style"></a>
</div>
<script type="text/javascript">var addthis_config = {"data_track_clickback":true};</script>
<script type="text/javascript" src="http://s7.addthis.com/js/250/addthis_widget.js#username=herbalsyn"></script>
<!-- AddThis Button END -->

  </div>
  
	<?php if ($above_comments): ?>
	<br />
	<div class="above_comments"><?php print $above_comments ?></div>
	<?php endif ?>

</div>