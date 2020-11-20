
<?php 
ob_start();
session_start();
include '../database/db.php';
// $query1= mysqli_query($con,"SELECT * FROM std_prf WHERE full_name LIKE '%".$_POST["search"]."%' ");
	$sql = "SELECT * FROM accounts WHERE `username` LIKE '%".$_POST['search']."%' OR`fullname` LIKE '%".$_POST['search']."%'";
	$rs = mysqli_query($con,$sql);


if(mysqli_num_rows($rs) > 0){

	?>

	<h4 class="center">Search Result</h4>

<table class="striped" style="margin-top:5%;"> <!-- start of the table -->											<!-- HTML code here -->
			<tr>
				<thead>
					<td>Username</td>
					<td>Fullname</td>
					<td>Cellphone #</td>
					<td>Date Created</td>
					<td>Account Type</td>
					<td>Status</td>
					<td>Actions</td>
				</thead>
			</tr>
			<tbody>
				<?php
				while($row = mysqli_fetch_array($rs)) 
				{ 

					?>
				<tr>

					<td><?php echo $row['username'];?></td>
					<td><?php echo $row['fullname'];?></td>
					<td><?php echo $row['cp_no'];?></td>
					<td><?php echo $row['date_created'];?></td>
					<td><?php $row['user_type'];
						// Identify User Type.
						if ($row['user_type'] == 2) {
							echo "guidance officer";
						}else{
							echo "guest";
						}
						?>	
					</td>
					<td><?php $row['status'];
						// Identify User Type.
						if ($row['status'] == 1) {
							echo "<div class='green' 
								 	 style='width:48px;
								 	 height:auto;
								 	 border-radius: 2px;'>
								  		<span class='white-text' 
								  			style='padding:5px;'>
								  			active
								  		</span>
								  	</div>";
						}else{
							echo "<div class='red' 
								 	 style='width:54px;
								 	 height:auto;
								 	 border-radius: 2px;'>
								  		<span class='white-text' 
								  			style='padding:5px;'>
								  			inactive
								  		</span>
								  	</div>";
						}
						?>	
					</td>
					<td>
						<a href="view_accounts.php?edit=1&id=<?php echo $row["id"];?>" class="tooltipped" data-position="top" data-delay="50" 		data-tooltip="Edit">
							<i class="fa fa-pencil-alt fa-3x icon-pad-5" style="color:#2196f3;"></i>
						</a>
						<a href="view_accounts.php?block=1&id=<?php echo $row["id"];?>" onclick="return confirm('Do you want to block this?')" class="tooltipped" data-position="top" data-delay="50" data-tooltip="block">
							<i class="fa fa-hand-paper  fa-3x icon-pad-5" style="color:#f44336; margin-left:10px"></i>
						</a>
						<a href="view_accounts.php?unblock=1&id=<?php echo $row["id"];?>" onclick="return confirm('Do you want to unblock this?')" class="tooltipped" data-position="top" data-delay="50" data-tooltip="unblock">
							<i class="fa fa-handshake  fa-3x icon-pad-5" style="color:#4CAF50; margin-left:10px"></i>
						</a>
						<a href="view_accounts.php?view=1&id=<?php echo $row["id"];?>" class="tooltipped" data-position="top" data-delay="50" data-tooltip="view">
							<i class="fa fa-eye fa-3x icon-pad-5" style="color:#6200ea; margin-left:10px;"></i>
						</a>
					</td>
				</tr>
				<?php
				} ?>
			</tbody>
			</table> 	

<?php
}else{

	echo "<h4 class='center'>No Results Found</h4>";
}

 ?>

 <script type="text/javascript">
 	
 				$(document).ready(function(){
		    $('.tooltipped').tooltip({delay: 50});
		  	});
 </script>