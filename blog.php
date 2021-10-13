
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title> BLOG CARD CSS</title>
	<link rel="stylesheet" type="text/css" href="page2.css">
</head>
<body>
	 <?php

 $url = "https://www.kahawatungu.com/category/politics/feed/";
 if(isset($_POST['submit'])){
   if($_POST['feedurl'] != ''){
     $url = $_POST['feedurl'];
   }
 }

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
  $image = $feeds->channel->image;
  
  echo "<h1>".$site."</h1>";
  foreach ($feeds->channel->item as $item) {

   $title = $item->title;
   $author = $item->author;
   $link = $item->link;
   $description = $item->description;
   $postDate = $item->pubDate;
   $pubDate = date('D, d M Y',strtotime($postDate));


   if($i>=30) break;
  ?>
	<div class="blog-card">
     <div class="content">
     	
     	<div class="title"> <h2><a class="feed_title" href="<?php echo $link; ?>"><?php echo $title; ?></a></h2></div>
	     <span><?php echo $pubDate;
       echo $author; ?></span>  
     
     <div class="text">
       <?php echo implode(' ', array_slice(explode(' ', $description), 0, 50)) . "..."; ?> <button><a href="<?php echo $link; ?>">Read more</a> </button>
     </div>
   </div>
		<?php
    $i++;
   }
 }else{
   if(!$invalidurl){
     echo "<h2>No item found</h2>";
   }
 }
 ?>
</div>

</body>
</html>