<?php
	// require the database connection
	require 'includes/config.php';


if(ISSET($_POST['search'])){
?>
<?php include('lang.php')?>


<table class="table table-bordered">
    <thead class="alert-info">
        <tr>
            <th><?php echo htmlspecialchars($lang['Id']);?></th>
            <th><?php echo htmlspecialchars($lang['First name']);?></th>
            <th><?php echo htmlspecialchars($lang['Last name']);?></th>
            <th><?php echo htmlspecialchars($lang['User name']);?></th>
            <th><?php echo htmlspecialchars($lang['User Type']);?></th>
        </tr>
    </thead>
    <tbody>
        <?php
				$keyword = $_POST['keyword'];
				$sql = "SELECT * FROM `customer` WHERE `firstname` LIKE '%$keyword%' or `lastname` LIKE '%$keyword%' ";

                $query = $dbcon -> prepare($sql);
              
                $query->execute();
				while($row = $query->fetch()){
			?>
        <tr>
            <td><?php echo $row['id']?></td>

            <td><?php echo $row['firstname']?></td>
            <td><?php echo $row['lastname']?></td>
            <td><?php echo $row['username']?></td>
            <td><?php echo $row['usertype']?></td>


        </tr>


        <?php
				}
			?>
    </tbody>
</table>
<?php		
	}else{
        
?>

</tr>


<?php
				}
			?>
</tbody>
</table>