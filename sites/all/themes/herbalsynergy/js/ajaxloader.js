
var ajaxcount = 6
var offset = -1
var url="http://www.kclstudios.com/knottlab/gethint/"

var getNext = function(){

   	if (offset < 0) {
    		offset = 0
	} else { offset++}

    	jQuery('#panelContainer').fadeOut(500, function() {

		jQuery('#panelContainer').css("width","0px")

 		jQuery('#panelFeature').addClass("loader")

    		jQuery('#panelContainer').load(url+'?offset='+offset,"", function(){

    		
    			jQuery('#panelContainer').animate({ 
        	  		 width: "620px"
       		  	}, 1000 )

		
	
     		})



	})
   

 
	if (offset == ajaxcount) { offset = -1 }
  	
	//return false
}


jQuery(document).ready(function(jQuery){



	var startSwap =  setInterval('getNext()', 5000 )






  var getPrev = function(){

    	if (offset > 0) {
    		offset--;
	} else { offset = 0;}
    jQuery('#contentFeature *').fadeOut(500);
    jQuery('#contentFeature + p').fadeOut(500);
    jQuery('#contentFeature').load(url+'?offset='+offset);
    jQuery('#panelContainer').animate({ 
        width: "890px"
       }, 1500 );
  
  return false;
  };






	var stopSwap = function() {

		clearInterval(startSwap);
	}




  	//getNext();

	//startSwap();


	jQuery('.ajax-next').click(getNext);

  	jQuery('.ajax-stop').click(stopSwap);

  	jQuery('.ajax-prev').click(getPrev);





});