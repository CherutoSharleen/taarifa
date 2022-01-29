<?php
include ('config.php');
?>
<!DOCTYPE html>
<html>
<head>
  <title> Page</title>
  <link rel="stylesheet" href="page.css">
</head>
<body>
 
 <?php

 $url = "https://www.kbc.co.ke/category/lifestyle/travel/feed/";

 $invalidurl = false;
 if(@simplexml_load_file($url)){
  $feeds = simplexml_load_file($url);
 }else{
  $invalidurl = true;
  echo "<h2>Invalid RSS feed URL.</h2>";
 }


 $i=0;
 if(!empty($feeds)){

  $site = $feeds->channel->title;
  $sitelink = $feeds->channel->link;
  
  echo "<h1>".$site."</h1>";
  foreach ($feeds->channel->item as $item) {

   $title = $item->title;
   $author = $item->author;
   $link = $item->link;
   $description = $item->description;
   $postDate = $item->pubDate;
   $pubDate = date('D, d M Y',strtotime($postDate));//parses an English textual datetime into a Unix timestamp
   
  $insertQuery = "INSERT INTO feed(fName, fTitle, fPubDate) VALUES ('$site','$site','$pubDate')";
  $results=mysqli_query($connection,$insertQuery);
if($results)
{
	echo"
	<script>
	alert('Patient added Successfully');
	window.location.href=('insertfeed.php');
	</script>
	
	";
}
else
{
	echo"
	<script>
	alert('Patient failed to add');
	window.location.href=('insertfeed.php');
	</script>
	
	
	";
	
	
}
};
};
?>


</div>
</body>
</html>


	


