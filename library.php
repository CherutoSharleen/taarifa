
<!--<?php
	//include '../includes/userpageHeader.php';
?>	-->
<?php 
include '../includes/userpageHeader.php';
include ('retrieveSuggestions.php'); 
$db_handle = retrieveFeedsSuggestions();
$suggestions_handle = retrieveCategoriesSuggestions();
include ('retrieveusers.php'); 
$cat_handle = retrieveCategories();
$users_handle = retrieveUsers();
?>
<!DOCTYPE html>
<html>
<head>
	<title> Library </title>

	<link rel="stylesheet" type="text/css" href="../css/categoriesIndex.css">
		
</head>
	<body>	
	<button id="modalBtn" class="modal-btn">Suggest feed</button>
		<!--Add Product
		<script src="../js/modal.js"></script>-->
				  
		<div id="simpleModal"class="modal">
			<div class="modal-content">
				<div class="modal-header">	
					<span class="closeBtn">&times;</span>
					<h2>Add feed</h2>
				</div>
				
				<div class="modal-body">	
				 	
	  			<form action="addFeedsUsers.php?myid=<?php echo $_SESSION['userid'];?> " method="POST">
					<?php echo $_SESSION['userid'];?> </br>


					<label for="feedname">Feed Name:</label><br>
					<input type="text" name="feedname"><br>
					<label for="feedname">Feed Link:</label><br>
					<input type="text" name="feedlink" style="width:60%";><br>
						<label for="categoryname">Category Name:</label><br>
				
					 <select name="catID">
					  	<?php
					  foreach($cat_handle as $cat )
					  {?>		

			
						<option  value="<?php echo $cat['categoryID'];?>" ><?php echo $cat['categoryID'];?>. <?php echo $cat['categoryName'];?> </option>
					  <?php } ?>
					</select><br>

					
					<button class="btn-submit" name="submit" type="submit">Submit</button>	
				</form>

				</div>
			</div>
		</div>

		<button id="modalBtn2" class="modal-btn">Suggest Category</button>
		<!--Add Product
		<script src="../js/modal.js"></script>-->
				  
		<div id="simpleModal2"class="modal2">
			<div class="modal-content">
				<div class="modal-header">	
					<span class="closeBtn2">&times;</span>
					<h2>Suggest Category</h2>
				</div>
				
				<div class="modal-body">	
				<form action="addCategoryUsers.php?myid=<?php echo $_SESSION['userid'];?> " method="POST">

					<label for="categoryname">Category Name:</label><br>
					<input type="text" name="categoryName"><br>
					<button class="btn-submit" name="submit" type="submit">Submit</button>	
				</form>
				</div>
			</div>
		</div>
		<div class="content"></div>
	<?php
	if ($db_handle == 0) {
		echo "Suggest Feed";
	}
	else{?>
	
	
<div class="cover">
	<?php
		
		  foreach($db_handle as $user)
	  {?>	

	<div class="blog-card">

			<div class="content">
		<div class="title2"><a href="retrieveFeeds2.php?myid=<?php echo $user['feedID']; ?>" target="_blank"><?php echo $user['feedName'];?></a> </div>
				
				<button><a href="retrieveFeeds2.php?myid=<?php echo $user['feedID']; ?>" target="new window"> <i class="fas fa-arrow-circle-right"></i></a></button><br>
				<?php
				$app =  $user['approval']; 

				if ($app == 0) {
					echo "Awaiting Approval";
					# code...
				}
				elseif ($app==1) {
					echo "Feed Approved";
				}


				?>
			</div>
			
		
	</div>
<?php } 

}
?>
<?php if ($suggestions_handle==0 ){
	//echo" No Categories Awaiting Approval";
	
}
else {
?>
<div class="cover">
<?php
		
		  foreach($suggestions_handle as $suggestions)
	  {?>	

	<div class="blog-card">

			<div class="content">
		<div class="title2"><a href="#"><?php echo $suggestions['categoryName'];?></a> </div>
				
				
				<?php
				$app =  $suggestions['approval']; 

				if ($app == 0) {
					echo "Awaiting Approval";
					# code...
				}
				elseif ($app==1) {
					echo "Feed Approved";
				}


				?>
			</div>
	
		
	</div>
	
			<?php } 
}

?>
</div>
</div>

<script src="../js/modal.js"></script>
</body>
</html>
<script type="text/javascript">
			$(document).ready(function() {
    $('#name').keyup(function() {
        $(this).attr('size', $(this).val().length)
    });
});
		</script>
