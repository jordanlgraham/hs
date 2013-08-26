<?php
// $Id: node-page.tpl.php,v 1.5 2010/09/14 11:31:29 goba Exp $
?>

<div id="node-<?php print $node->nid; ?>" class="node<?php if ($sticky) { print ' sticky'; } ?><?php if (!$status) { print ' node-unpublished'; } ?>">
 

  <div class="content"> 

  	  <div style='background:transparent;'>
   	
  	       <?php print $content ?>

<!-- AddThis Button BEGIN
<div class="addthis_toolbox addthis_default_style">
<a class="addthis_button_facebook_like" fb:like:layout="button_count"></a>
<a class="addthis_button_tweet"></a>
<a class="addthis_counter addthis_pill_style"></a>
</div>
<script type="text/javascript">var addthis_config = {"data_track_clickback":true};</script>
AddThis Button END -->
  	    
  	    </div>   
  </div>

</div> 