<script>
	function deleteData(id)
	{
		if(confirm("You want to delete ?"))
		{
		window.location.href="deleteteacher.php?teacher_id="+id;
		}
	
	}
</script>

<?php 
include('../config.php');


echo "<table border='1' class='table'>";

echo "<tr class='danger'><th colspan='11'><a href='admindashboard.php?info=add_teacher'>Add New</a></th></tr>";

echo "<Tr><th>Teacher Id</th><th>Teacher Name</th><th>Email</th><th>Password</th><th>Mobile</th>
<th>Address</th><th>Lecture per week</th><th>Year</th><th>Department</th><th>Update</th><th>Delete</th></tr>";

	$que=mysqli_query($con,"SELECT * 
    FROM teacher 
    JOIN subject ON teacher.teacher_id = subject.teacher_id 
    WHERE subject.department_id = '13'");
	while($res=mysqli_fetch_array($que))
	{
	echo "<Tr>";
	echo "<td>".$res['teacher_id']."</td>" ;
	echo "<td>".$res['name']."</td>" ;
	echo "<td>".$res['eid']."</td>" ;
	echo "<td>".$res['password']."</td>" ;
	echo "<td>".$res['mob']."</td>" ;
	echo "<td>".$res['address']."</td>" ;
    echo "<td>".$res['lecture_per_week']."</td>" ;
    echo "<td>".$res['Year']."</td>" ;
	
	//display department name
	$que2=mysqli_query($con,"select *  from department where department_id='".$res['department_id']."'");
	$res2=mysqli_fetch_array($que2);
	
	echo "<td>".$res2['department_name']."</td>" ;
	
	//display semester name
	$que1=mysqli_query($con,"select *  from semester where sem_id='".$res['sem_id']."'");
	$res1=mysqli_fetch_array($que1);
	
	// echo "<td>".$res1['semester_name']."</td>" ;
	
	// echo "<td>".$res['status']."</td>" ;
	
	echo "<td><a href='admindashboard.php?info=updateteacher&teacher_id=$res[teacher_id]'>Update</a></td>";
	?>
    
<td><a href='javascript:deleteData("<?php echo  $res[teacher_id];?>")'>Delete</a></td>
	<?php 
	echo "</tr>";
	}
	
echo "</table>";	

?>
