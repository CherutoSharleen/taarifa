<!--<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8" />
	<script type="text/javascript" src="http://code.jquery.com/jquery-1.8.1.js"></script>
	<script type="text/javascript">
	$(function(){
		$.ajax({
			url:'https://news.yahoo.com/rss/topstories',
			success:function(data){
				$(data).find('item').each(function(){
					var $item=$(this)
					var media = $item.find('media\\:content,content').attr('url')
					alert(media)
				})
			},
		})
	})
	</script>
</head>
<body>

</body>
</html>-->


<?php

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />

    <title>Your Site Title</title>

    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
    
    <script type="text/javascript">
    $(document).ready(function(){

function get_rss_feed() {
 
 // Using CNN's RSS Feed as an example
 var rssUrl = 'http://bits.blogs.nytimes.com/feed/';
 
 //clear the content in the div for the next feed.
 $("#feedContent").empty();
 
 //use the JQuery get to grab the URL from the selected item, put the results in to an argument for parsing in the inline function called when the feed retrieval is complete
 $.get('rss.php?url='+rssUrl, function(d) {
 
 //find each 'item' in the file and parse it
 $(d).find('item').each(function() {

 //name the current found item this for this particular loop run
 var $item = $(this);
 // grab the post title
 var title = $item.find('title').text();
 // grab the post's URL
 var link = $item.find('link').text();
 // next, the description
 var description = $item.find('description').text();
 //don't forget the pubdate
 var pubDate = $item.find('pubDate').text();
 var media = $item.find('media\\:content,content').attr('url')
 
         // now create a var 'html' to store the markup we're using to output the feed to the browser window
 var html = "<div class=\"entry\"><h2 class=\"postTitle\">" + title + "<\/h2>";
 html += "<em class=\"date\">" + pubDate + "</em>";
 html += "<p class=\"description\">" + description + "</p>";
 html += "<img src=\"" + media + "\" alt=\"image\"/>";
 html += "<a href=\"" + link + "\" target=\"_blank\">Read More >><\/a><\/div>";
 
 //Send Results to a div
 $('#rss').append($(html));  
 });
 });
 
};
get_rss_feed();

      });
    </script>
</head>

<body>
<h1>RSS TEST</h1>
<!-- Your RSS DIV -->
<div id="rss">
	

	
</div>

</body>
</html>
?>
