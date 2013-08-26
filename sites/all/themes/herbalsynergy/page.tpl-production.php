<?php
// $Id: page.tpl.php,v 1.18.2.1 2009/04/30 00:13:31 goba Exp $
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php print $language->language ?>" lang="<?php print $language->language ?>" dir="<?php print $language->dir ?>">
  <head>
    <?php print $head ?>
    <title><?php print $head_title ?></title>
    <?php print $styles ?>
    <?php print $scripts ?>    
  
<script src="<?php print $base_url; print path_to_theme(); ?>/jquery/jquery.tabs.min.js" type="text/javascript" charset="utf-8"></script> 
<script src="<?php print $base_url; print path_to_theme(); ?>/js/featuredcontentfader.js" type="text/javascript" charset="utf-8"></script>
<script src="http://www.herbalsynergyllc.com/sites/all/themes/herbalsynergy/js/menu-effects.js" type="text/javascript" charset="utf-8"></script> 
<script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-18562108-1']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>

</head>

<body>

<div id="outer">
	<div id="topOuter">
		<div id="top">
			<a id="logo" href="<?php print check_url($front_page) .'" title="'. $site_title .'"' ?>><img src="<?php print  base_path() . 'sites/all/themes/herbalsynergy/img/top-cut.png'; ?>" alt="logo top" /></a>
			<div class="slogan">
				<?php print $site_slogan ?>
			</div>
		</div>
		<div id="nav">
			<?php if (isset($primary_links)) : ?>
				<?php print themename_links(themename_navigation_links('primary-links'), array('class' =>'dropdown', 'id' => 'page-bar')) ?>
        	<?php endif; ?>
        	<?php if (isset($secondary_links)) : ?>
          		<?php print themename_links(themename_navigation_links('secondary-links'), array('class' =>'dropdown', 'id' => 'page-bar-2')) ?>
        	<?php endif; ?>
        	<div class="clearfix"><!-- htbd --></div>
        	<img id="logoBot" src="<?php print  base_path() . 'sites/all/themes/herbalsynergy/img/bottom.png'; ?>" alt="logo bottom" />
        </div>		
	</div>
	<div class="contentOuter">
		<div class="contentInner">
			<?php
				if (! $is_front ) {			# if this is not the front page - display green box on top
			?>  
			
<div id="greenBox"  style="background: #f2f2f2 url(<?php
	if ($node->field_main_img[0]['view']) {
		print imagecache_create_url('titlebox', $node->field_main_img[0]['filepath']);
		} else {
			print base_path() . 'sites/all/themes/herbalsynergy/img/titlebox-default.jpg';
	}
	?>) center no-repeat;">
	<div class="trans"><!-- htbd --></div>
	<div class="op">
		<h1 id="title"><?php print $title; ?></h1>
	</div>
	<div class="clearfix"><!-- htbd --></div>
</div>      	<!-- greenBox --> 

					<?php print $content; 
					
					} else {                	# means that this is the front page - display green box on bottom  
						     
						 print $content ?>
			<div class="clearfix"><!-- htbd --></div>

			<div id="searchWidget" style="background: url(<?php print $base_url; print path_to_theme(); ?>/img/titlebox-default.jpg) center no-repeat">
			<div class="trans"><!-- htbd --></div>
			<div class="op">
				<div id="tabs-outer">
					<h3 class="lh">Search</h3>
					<ul id="adv2">
						<li><a class="selected" href="#tab1">Tested Products</a></li>
						<li><a href="#tab2">Care Centers</a></li> 
        		    </ul>
            		<div id="tab1">
	            		<?php print views_embed_view('samples', 'panel_pane_1'); ?>
	    	        </div>
    	    	    <div id="tab2">
        	    		<?php print views_embed_view('dispensaries_2', 'panel_pane_1'); ?>
	        	    </div>
    	        	<div class="clearfix"><!-- htbd --></div>
				</div>
			</div>
		</div>
	
		<script type="text/javascript">
			$(document).ready(function() {
    			$('#tabs-outer').tabs({ fxFade: true, fxSpeed: 'fast' });
			});
		</script>	 
						    
						
				<?php 
				}
				?>
		
		</div> 						<!-- content inner -->

	</div> 							<!-- content outer -->
	
	<div id="footer">
		<div id="footerRight">
			 &copy; <?php print date(Y) ?> Herbal Synergy, LLC  | <a href="http://www.herbalsynergyllc.com/sites/all/themes/herbalsynergy/downloads/Herbal-Synergy-Press-Kit.pdf">Press Kit</a> | <a href="<?php $base_url; ?>/contact">Contact Us</a>
		</div>
		<div id="disclaimer"><?php print $footer_message ?></div>
	</div>
</div><!--// end outer -->

<?php print $closure ?>
</body>
</html>
