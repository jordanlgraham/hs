<?php
// $Id: node.tpl.php,v 1.5 2007/10/11 09:51:29 goba Exp $
?>

 <!-- 
<div class="content-img">
   <?php 

if ($node->field_images[0]) :
 print '<a href="' . imagecache_create_url('featured_panel_full', $node->field_images[0]['filepath']) . '" rel="shadowbox">';
 
 print theme('imagecache', 'default_thumb', $node->field_images[0]['filepath']);
 
 print '</a>';
 
 print "<strong>" . $node->field_images[0]['data']['description'] . "</strong>" ; 
 
 endif;
 
 
  ?> 
</div>

<h2><?php print $title ?></h2> -->

  <div class="views-row"> 
   	
  	       <?php print $node->field_indica; ?>
  	       
  </div>



