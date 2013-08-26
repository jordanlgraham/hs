<?php
// $Id: comment.tpl.php,v 1.10 2008/01/04 19:24:24 goba Exp $
?>

<div class="comment<?php print ($comment->new) ? ' comment-new' : ''; print ($comment->status == COMMENT_NOT_PUBLISHED) ? ' comment-unpublished' : ''; print ' '. $zebra; ?>">
 <div class="clear-block">
 	
 		<?php if ($picture): ?>
 	 <div class="picture"><?php print $picture ?></div>	
   	<?php endif; ?>			
 		
  <div class="entry">
  	

	<?php if ($submitted): ?>		
<div class="meta"><span class="author"><?php print $author ?></span></div>
<div class="meta"><span class="timestamp"><?php echo date('M-d-Y \&\n\b\s\p\; g:i A',$comment->timestamp); ?></span></div>
<?php endif; ?>



<div class="content">
<?php print $content ?>
<?php if ($links): ?>
<div class="links"><?php print $links ?></div>
<?php endif; ?>			
</div>		

  </div>
 </div>
</div>

