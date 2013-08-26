<?php
// $Id: node-sample.tpl.php,v 1.5 2010/09/14 11:31:29 goba Exp $
?>
<div id="node-<?php print $node->nid; ?>" class="node<?php if ($sticky) { print ' sticky'; } ?><?php if (!$status) { print ' node-unpublished'; } ?>">
	
<div class="content-images">

   <?php 

if ($node->field_main_img[0]['view']) :

 $main_img_caption = $field_main_img[0]['data']['field_extend_img_caption']['body'];

 print '<a href="' . imagecache_create_url('large', $node->field_main_img[0]['filepath']) . '" title="'. $main_img_caption . '" rel="shadowbox[gallery]">';
 
 print theme('imagecache', 'medium', $node->field_main_img[0]['filepath'],$main_img_caption,'',array('class'=>'imagecache imagecache-medium'));
 
 print '</a>';
 
 
 if ($main_img_caption) :
 
   print '<div class="field_main_img_text">' . $main_img_caption . '</div>';

 endif;
 
  endif;
 

if ($node->field_alt_images[0]['view']) :

   ?>
  <div class="content-gallery">
  <?php	 
    foreach ($node->field_alt_images as $img) :
    
     $img_caption = $img['data']['field_extend_img_caption']['body'];    

      print '<a href="' . imagecache_create_url('large', $img['filepath']) . '" title="'. $img_caption .'" rel="shadowbox[gallery]">';
 
      print theme('imagecache', 'thumb', $img['filepath'],$img_caption,'',array('class'=>'imagecache imagecache-thumb','title'=>$img_caption));
 
      print '</a>';
      
    endforeach;
   ?>
   </div>
   <?php
   
  endif;
 
  ?> 

  
</div>

 
  <div class="content"> 




<?php
//load the view by name
$view = views_get_view('samples_node_data');
//output the view
print views_embed_view('samples_node_data','block_1');
?>
	
  	       <?php print $content ?>
  	       
<!-- AddThis Button BEGIN 
<div class="addthis_toolbox addthis_default_style">
<a class="addthis_button_facebook_like" fb:like:layout="button_count"></a>
<a class="addthis_button_tweet"></a>
<a class="addthis_counter addthis_pill_style"></a>
</div>
<script type="text/javascript">var addthis_config = {"data_track_clickback":true};</script>
<script type="text/javascript" src="http://s7.addthis.com/js/250/addthis_widget.js#username=herbalsyn"></script>
 AddThis Button END -->	       
  	       
  </div>

</div> 