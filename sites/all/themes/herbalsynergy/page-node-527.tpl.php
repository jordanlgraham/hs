<?php
// $Id: page-front-test.tpl.php,v 1.18.2.1 2009/04/30 00:13:31 goba Exp $
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php print $language->language ?>" lang="<?php print $language->language ?>" dir="<?php print $language->dir ?>">
  <head>
    <?php print $head ?>
    <meta name="description" content="Herbal Synergy LLC provides mobile Medical Marijuana (MMJ) product testing with same day results." />
    <meta name="keywords" content="medical marijuana, mmj, product testing, cannabinoid, gas chromatography" />
    <title><?php print $head_title ?></title>
    <?php print $styles ?>
    <?php print $scripts ?>
    
<script src="<?php print $base_url; print path_to_theme(); ?>/jquery/jquery.tabs.min.js" type="text/javascript" charset="utf-8"></script> 
<script src="<?php print $base_url; print path_to_theme(); ?>/js/contentslider.js" type="text/javascript" charset="utf-8"></script>
<script src="http://www.herbalsynergyllc.com/sites/all/themes/herbalsynergy/js/menu-effects.js" type="text/javascript" charset="utf-8"></script> 
<link href="<?php print $base_url; print path_to_theme(); ?>/style-test.css" rel="stylesheet" type="text/css" />
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
			  				       				
			    <a id="logo" href="<?php print check_url($front_page) .'" title="'. $site_title .'"' ?>><img src="<?php print  base_path() . 'sites/all/themes/herbalsynergy/img/logo.gif'; ?>" alt="Herbal Synergy, LLC" /></a>
							
 		      <div class="slogan">
      	
      	      <?php print $site_slogan ?>
      	
          </div>	
							
					<a href="http://www.facebook.com/pages/Herbal-Synergy-LLC/133848976658742" title="facebook"><img src="" alt="Find us on facebook" /></a>		
							
      </div>
	 			   <div id="nav">
	 			   	
       	<?php if (isset($secondary_links)) : ?>
          		<?php print themename_links(themename_navigation_links('secondary-links'), array('class' =>'dropdown', 'id' => 'page-bar-2')) ?>
        	<?php endif; ?>

        	<?php if (isset($primary_links)) : ?>
          		<?php print themename_links(themename_navigation_links('primary-links'), array('class' =>'dropdown', 'id' => 'page-bar')) ?>
        	<?php endif; ?>
  
  <div class="clearfix"><!-- htbd --></div>      	
        		 			   	<img id="logoBot" src="<?php print  base_path() . 'sites/all/themes/herbalsynergy/img/logo-bot.gif'; ?>" alt="logo" />       

				</div>		
	
	</div>		
 
 
	
  <div class="contentOuter">	
	
    <div class="contentInner">	
	
			<div id="content-slider">
				
      	<div id="frontpage-slider" class="sliderwrapper">
  	
 <?php
//load the view by name
$view = views_get_view('content_slider');
//output the view
print views_embed_view('content_slider','block_1');
?>
   			</div>
   			<div id="paginate-frontpage-slider" class="pagination">

 <?php
//load the view by name
$view = views_get_view('content_slider_toc');
//output the view
print views_embed_view('content_slider_toc','block_1');
?>   	 
   	    
      	</div>
      
<script type="text/javascript">

featuredcontentslider.init({
id: "frontpage-slider", //id of main slider DIV
contentsource: ["inline", ""], //Valid values: ["inline", ""] or ["ajax", "path_to_file"]
toc: "markup", //Valid values: "#increment", "markup", ["label1", "label2", etc]
nextprev: ["Previous", "Next"], //labels for "prev" and "next" links. Set to "" to hide.
revealtype: "mouseover", //Behavior of pagination links to reveal the slides: "click" or "mouseover"
enablefade: [true, 0.2], //[true/false, fadedegree]
autorotate: [true, 5000], //[true/false, pausetime]
onChange: function(previndex, curindex){ //event handler fired whenever script changes slide
//previndex holds index of last slide viewed b4 current (1=1st slide, 2nd=2nd etc)
//curindex holds index of currently shown slide (1=1st slide, 2nd=2nd etc)
}
})

</script>

			</div>

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
          	
			<?php print $tab1 ?>			

          </div>          
      
          <div id="tab2">	          

			<?php print $tab2 ?>		

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

  	</div>
	</div>

  <div id="bottom">
  	
  	<div class="clear-block">
  		
  		<div class="col1">
  			
  			<?php if ($col1) : print $col1; endif; ?>
  			
  		</div>
  	
  		<div class="col2">
  			
  		 	<?php if ($col2) : print $col2 ; endif; ?>	
  		 	
  		</div>	
  	
  		<div class="col3">
  			
  		 	<?php if ($col3) : print $col3 ; endif; ?>	
  			
  		</div>	
  			
  	</div>
  	
  </div>	

  <div id="footer">
     
      <div id="footerInner">
      	
  	     	
 	&copy; <?php print date(Y) ?> Herbal Synergy, LLC  | <a href="http://www.herbalsynergyllc.com/sites/all/themes/herbalsynergy/downloads/Herbal-Synergy-Press-Kit.pdf">Press Kit</a> | <a href="<?php $base_url; ?>/contact">Contact Us</a>
   
  	
      </div>
      
        <div id="disclaimer"><?php print $footer_message ?></div>
      
    
      
  </div>

</div>

  <?php print $closure ?>
</body>
</html>
