  
var precount = 8

var offset = -1

var url="http://www.kclstudios.com/knottlab/getpreview/?theme=knottlab3"

var nextThumbs = function(){

   	if (offset < 0 || offset == precount) {
    		offset = 0;
	} else { 
		offset++;
	}  

	jQuery('#previewColumn').addClass("loader")

  	jQuery('#preview').fadeOut(500).load(url+'&offset='+offset,"",function() {

		jQuery('#preview').fadeIn(500)

	})

	//jQuery('#previewColumn').removeClass("loader")					
	
     	return false

}




var prevThumbs = function(){
	if (offset != 0) {
    		offset--
	}
    	jQuery('#previewColumn').addClass("loader")
    	jQuery('#preview').fadeOut(500).load(url+'&offset='+offset,"",function() {

    		jQuery('#preview').fadeIn(500)

	})
		
    	//jQuery('#previewColumn').removeClass("loader")
  
  	return false
 }



jQuery(document).ready(function(){  


	nextThumbs()

  	jQuery('.preview-next').click(nextThumbs)

	jQuery('.preview-prev').click(prevThumbs)
	

})