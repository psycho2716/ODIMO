<!DOCTYPE html>
<?php
	require '../config.php';
?>

<html lang="en">
	<head>
        
	</head>
<body>
    <div style="position: flex; align-items:center; justify-content: center; text-align: center; ">
        <h2>ODIMO</h2>
        <br /> <br />
        <!--<b style="text-align: left; margin-left: 10px; ">Date Prepared:</b>
        <?php
            $date = date("Y-m-d", strtotime("+6 HOURS"));
            echo $date;
        ?>
        <br /><br />-->
        <table class="print_table table table-striped">
            <thead>
                
                <tr>
                    <th class="text-center" scope="col">No.</th>
                    <th class="text-center" scope="col">Reference</th>
                    <th class="text-center" scope="col">Addressee</th>
                    <th class="text-center" scope="col">Sender</th>
                    <th class="text-center" scope="col">Filing</th>
                    <th class="text-center" scope="col">Office/Unit</th>
                    <th class="text-center" scope="col">Subject</th>
                    <th class="text-center" scope="col">Address</th>
                    <th class="text-center" scope="col">Date</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    $n = 1;
                    $query = $con->query("SELECT * FROM `uheads_data`");
                    while($fetch = $query->fetch_array()){
    
                ?>
    
                <tr>
                    <td><?php echo $n?></td>
                    <td><?php echo $fetch['reference_id']?></td>
                    <td><?php echo $fetch['n_add']?></td>
                    <td><?php echo $fetch['n_send']?></td>
                    <td><?php echo $fetch['u_filing']?></td>
                    <td><?php echo $fetch['u_unit']?></td>
                    <td><?php echo $fetch['u_sub']?></td>
                    <td><?php echo $fetch['u_address']?></td>
                    <td><?php echo $fetch['uploaded']?></td>
                </tr>
    
                <?php
                    $n++;
                    }
                ?>
            </tbody>
        </table>
    </div>
</body>
<script type="text/javascript">
	function PrintPage() {
		window.print();
	}
    window.addEventListener('DOMContentLoaded', (event) => {
   		PrintPage()
		setTimeout(function(){ window.close() },750)
	});
</script>
</html>



