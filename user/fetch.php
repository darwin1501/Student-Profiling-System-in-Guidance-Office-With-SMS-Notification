
<?php 
ob_start();
session_start();
include '../database/db.php';
// $query1= mysqli_query($con,"SELECT * FROM std_prf WHERE full_name LIKE '%".$_POST["search"]."%' ");
	$sql = "SELECT * FROM std_prf WHERE `full_name` LIKE '%".$_POST['search']."%' OR`lrn` LIKE '%".$_POST['search']."%'";
	$rs = mysqli_query($con,$sql);




if(mysqli_num_rows($rs) > 0){
	?>
<table class="striped"> 			<!-- start of the table -->											<!-- HTML code here -->
			<tr>
				<thead>
					<td>lrn</td>
					<td>Fullname</td>
					<td>Age</td>
					<td>Gender</td>
					<!-- <td>Address</td> -->
					<td>Cellphone Number</td>
					<td>Number of Violation</td>
					<td>Actions</td>
				</thead>
			</tr>
			<tbody>
				<?php
				while($row = mysqli_fetch_array($rs)) 
				{ 

					?>
				<tr>
					<td><?php echo $row['lrn'];
						?>	
					</td>
					<td><?php echo $row['full_name'];
						?>		
					</td>
					<td><?php echo $row['age'];?></td>
					<td><?php echo $row['gen'];?></td>
					<td><?php echo $row['tel'];
						?>
							
					</td>
					<td><?php echo $row['num_of_violation'];?></td>
					<td>
						
						<a href="user_search_student.php?edit=1&student_id=<?php echo $row["student_id"];?>" class="tooltipped" data-position="top" data-delay="50" 		data-tooltip="Edit">
							<i class="fa fa-pencil-alt fa-3x icon-pad-5" style="color:#2196f3; margin-left:10px;"></i>
						</a>
						<a href="user_search_student.php?add=1&student_id=<?php echo $row["student_id"];?>" class="tooltipped" data-position="top" data-delay="50" data-tooltip="Add">
							<i class="fa fa-plus-circle fa-3x icon-pad-5" style="color:#4caf50; margin-left:10px;"></i>
						</a>
						<a href="user_search_student.php?view=1&student_id=<?php echo $row["student_id"];?>" class="tooltipped" data-position="top" data-delay="50" data-tooltip="view">
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