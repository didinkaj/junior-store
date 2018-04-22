<br/>
<div id="container">
	<ul>		
      	<li><img src="img/slideshow/3.png" width="700" height="500" title="Well come to University of Eldoret New Library"/></li>

		<li><?php include "includes/history/1.html"?></li>
		<li><?php include "includes/history/2.html"?></li>
		<li><?php include "includes/history/3.html"?></li>
      	
      	<li><img src="img/slideshow/5.png" width="700" height="500" title="We offer quality and conducive Enviroment for study  and Research"/></li>
      	
      	<li><img src="img/slideshow/6.png" width="700" height="500" title="Incase of Any problem We have Well Traint pesonnel that can helb you incase of any problem"/></li>
      	
      	<li><img src="img/slideshow/7.png" width="700" height="500" title="please call admininstrator through 24578941545/ 0721649472/ 0733556677."/></li>
      	
		<li><?php include "includes/home/map.php"?></li>
      	
      </ul>
     <!-- (Disabled)
      <span class="button prevButton"></span>
      <span class="button nextButton"></span>
     -->
</div>
<script>
$(window).load(function(){
		var pages = $('#container li'), current=0;
		var currentPage,nextPage;
		var timeoutID;
		var buttonClicked=0;

		var handler1=function(){
			buttonClicked=1;
			$('#container .button').unbind('click');
			currentPage= pages.eq(current);
			if($(this).hasClass('prevButton'))
			{
				if (current <= 0)
					current=pages.length-1;
					else
					current=current-1;
			}
			else
			{

				if (current >= pages.length-1)
					current=0;
				else
					current=current+1;
			}
			nextPage = pages.eq(current);	
			currentPage.fadeTo('slow',0.3,function(){
				nextPage.fadeIn('slow',function(){
					nextPage.css("opacity",1);
					currentPage.hide();
					currentPage.css("opacity",1);
					$('#container .button').bind('click',handler1);
				});	
			});			
		}

		var handler2=function(){
			if (buttonClicked==0)
			{
			$('#container .button').unbind('click');
			currentPage= pages.eq(current);
			if (current >= pages.length-1)
				current=0;
			else
				current=current+1;
			nextPage = pages.eq(current);	
			currentPage.fadeTo('slow',0.3,function(){
				nextPage.fadeIn('slow',function(){
					nextPage.css("opacity",1);
					currentPage.hide();
					currentPage.css("opacity",1);
					$('#container .button').bind('click',handler1);				
				});	
			});
			timeoutID=setTimeout(function(){
				handler2();	
			}, 5000);
			}
		}

		$('#container .button').click(function(){
			clearTimeout(timeoutID);
			handler1();
		});

		timeoutID=setTimeout(function(){
			handler2();	
			}, 5000);
		
});
</script>