<?php 
include ('retrieveSingleFeed.php'); 
$db_handle = retrieveSingleFeed();
?>

<!DOCTYPE html>
<html>
<head>
	<title> HTML </title>
  <link rel="stylesheet" type="text/css" href="../css/box2.css">
</head>
<body>
	<?php
	  foreach($db_handle as $user)
	  {?>
	  	<?php $url=array(); ?>
	  	<?php $url = $user['feedLink'];
//<?php



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
   $pubDate = date('D, d M Y',strtotime($postDate));


   if($i>=30) break;
  ?>
   <div class="blog-card">
     <div class="content">
       <h2><a class="feed_title" href="<?php echo $link; ?>"  target="new window"><?php echo $title; ?></a></h2>
       <span><?php echo $pubDate;
       echo $author; ?></span>
     </div>
     <div class="text">
       <?php echo implode(' ', array_slice(explode(' ', $description), 0, 100)) . "..."; ?><button> <a href="<?php echo $link; ?>" target="new window">Read more</a></button>
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
 }?> 
 ?>
</body>
</html>