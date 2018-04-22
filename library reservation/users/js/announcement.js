$(document).ready(function(){
	
	//initial
	$('#mainCont').load('includes/announcement/announcement.php')	;
		
	//handle menu clicks
	$('ul#nav li a').click(function(){
		var page = $(this).attr('href');
		$('#mainCont').load('includes/announcement/'+ page +'.php');
		return false;
	});
});