//message reload
//var auto_refresh = setInterval(
//function()
//{$('.grid').fadeOut('slow').load('Messages.php').fadeIn("slow");
//}, 200);

//Dialogue close
$(document).ready(function(){
          $(".place-right").click(function(){
          $(".message-dialog").fadeOut('slow');
          });
       });
//scrollbars
$(document).ready(function () {
	      if (!$.browser.webkit) {
	          $('.grid').jScrollPane();
	      }
	  });
      
//$(document).ready(function () {
//	      if (!$.browser.webkit) {
//	          $('.span10').jScrollPane();
//	      }
//	  });      

$(document).ready(function () {
	      if (!$.browser.webkit) {
	          $('.charms').jScrollPane();
	      }
	  });


                        
                            
