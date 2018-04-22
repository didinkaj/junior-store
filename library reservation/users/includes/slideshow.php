<br/>
<div id="container">
	<ul>		
      	<li><img src="../img/slideshow/3.png" width="700" height="500" title="On approaching the site of the new church we walk past the ruins and one of the first things we see is this wall of red brick and limestone."/></li>

		<li><?php include "includes/history/1.html"?></li>
		<li><?php include "includes/history/2.html"?></li>
		<li><?php include "includes/history/3.html"?></li>
      	
      	<li><img src="../img/slideshow/5.png" width="700" height="500" title="The corner of the building is a massive construct of limestone and the on-going wall is of solid red brick. A few hundred feet to the north of this corner is the bell tower."/></li>
      	
      	<li><img src="../img/slideshow/6.png" width="700" height="500" title="The thickness of the walls alone suggests that it was likely constructed to protect the citizens against invaders of one type or another."/></li>
      	
      	<li><img src="../img/slideshow/7.png" width="700" height="500" title="This church apparently had no buttresses but a look at the wall in the photo above clear indicates a wall of great thickness, likely meant for protection against insurgents or invaders."/></li>
      	
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