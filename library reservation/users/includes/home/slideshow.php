    <link rel="stylesheet" href="css/slidecontrol.css">
    <link rel="stylesheet" href="css/slide.css">
    <script src="http://code.jquery.com/jquery-1.8.2.min.js"></script>
    <script src="js/bjqs-1.3.min.js"></script>
    
    <div id="container">
      <div id="banner-slide">
        <ul class="bjqs">
          <li><img src="../img/slideshow/1.png" title="The original UOE, was started by Friar Miquel Carod who was assigned to university main campus."></li>
		  
          <li><img src="../img/slideshow/2.png" title="The actual construction was started in 1991 but Friar Carod died in November 1871 with the ‘finishing touches’ yet to be made to the church. His replacement, Friar Nicholas Gallo completed the university and subsequently built the adjoining ‘convento’ in the same style as the university itself."></li>
		  
          <li><img src="../img/slideshow/3.png" title="The corner of the building is a massive construct of limestone and the on-going wall is of solid red brick. A few hundred feet to the north of this corner is the bell tower."></li>
		  
          <li><img src="../img/slideshow/4.png" title="End wall of the second floor showing partitions and old roof line."></li>
		  
          <li><img src="../img/slideshow/5.png" title="A side view of the new church."></li>
		  
          <li><img src="../img/slideshow/6.png" title="As mentioned, the university has a wide open, bright and airy feel to it, as can be seen from the photos that follow…"></li>
		  
          <li><img src="../img/slideshow/7.png" title="The church has a wide open, bright and airy feel to it."></li>
          
		  <li><img src="../img/slideshow/8.png" title="Everything about this university is quite simple and clean as can be seen in the photo of the library"></li>
          
		  <li><img src="../img/slideshow/9.png" title="Leaving this beautiful church and descending to street level we get a glimpse of how large the edifice truly is."></li>
          
		  <li><img src="../img/slideshow/10.png" title="The statue of St. Julian outside the church that overlooks the town square and the town’s main road intersection."></li>
        </ul>
      </div>
      
      <!--  jQuery settings -->
      <script class="secret-source">
        jQuery(document).ready(function($) {
          
          $('#banner-slide').bjqs({
            animtype      : 'slide',
            height        : 320,
            width         : 650,
            responsive    : true,
            randomstart   : false
          });
          
        });
      </script>
    </div>