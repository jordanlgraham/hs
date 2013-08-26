$(document).ready(function(){  
   
     //$("ul.dropdown li").addClass("hover"); //Only shows drop down trigger when js is enabled (Adds empty span tag after ul.subnav*)  
   
     $("ul.dropdown li").hover(function() { //When trigger is clicked...  
   
         //Following events are applied to the subnav itself (moving subnav up and down)  
         $(this).find("ul.sublinks").slideDown(200).show() //Drop down the subnav on click  
   
         }, function(){  
             $(this).find("ul.sublinks").hide() //When the mouse hovers out of the subnav, move it back up */ 
     });       
   
});  