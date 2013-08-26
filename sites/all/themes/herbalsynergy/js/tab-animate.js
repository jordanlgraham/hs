  jQuery("#adv2").idTabs(function(id,list,set){ 
    jQuery("a",set).removeClass("selected") 
    .filter("[@href='"+id+"']",set).addClass("selected"); 
    for(i in list) 
      jQuery(list[i]).hide(); 
    jQuery(id).fadeIn(); 
    return false; 
  }); 