
<!--<?php
	//include '../includes/userpageHeader.php';
?>	-->
<?php 
include '../includes/userpageHeader.php';
include ('retrieveFeeds.php'); 
$db_handle = retrieveFeeds();
?>
<!DOCTYPE html>
<html>
<head>
	<title> Categories </title>
	<link rel="stylesheet" type="text/css" href="../css/box2.css">
	
</head>
<body>
	
<div class="content">
  
	<?php
		  foreach($db_handle as $user)
	  {?>	
	
		<!--		<?php $url//=array(); ?> -->
	  	<?php $url = $user['feedLink'];?>


<?php



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
  $sitedescription = $feeds->channel->description;
  //$sitelink = $feeds->channel->link;
  $image = $feeds->channel->image->url;
  echo "<h1>".$site."</h1>";
  echo "<h3>".$sitedescription."</h3>";

  ?>
  <img src="<?php echo $image;?>" width=130px height = 80px/> 
<?php
  foreach ($feeds->channel->item as $item) {

   $title = $item->title;
   $author = $item->dc;
   $link = $item->link;
   $description = $item->description;
   $author = $item->children('dc', 'http://purl.org/dc/elements/1.1/'); //get the children of the dc:creator.

   $postDate = $item->pubDate;
   //Changes the time string to UNIX(No.of seconds since Jan 1 1970) timestamp format for easier representation for the computer
   $pubDate = date('D, d M Y',strtotime($postDate));


   if($i>=30) break;
  ?>
   <div class="blog-card">
     <div class="content">
    
       <h2><a class="title" href="<?php echo $link; ?>" target="_blank"><?php echo $title; ?></a></h2>
       <span><?php echo $pubDate;
      echo("creator -".$author."<br>"); ?></span>
      
     </div>
     <div class="text">

      <!--Returns string from an element in array then slice divides the string and explode defines limitations and splits array -->
       <?php echo implode(' ', array_slice(explode(' ', $description), 0, 10000)) . "..."; ?> <a href="<?php echo $link; ?>" target="_blank">Read more</a>
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
				
			</div>
			
		
	</div>

</div>
</body>
</html>