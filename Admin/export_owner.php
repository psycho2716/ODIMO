<?php  
  
include '../config.php';
$output = '';
if(isset($_POST["export"]))
{
 $query = "SELECT * FROM uheads_data order by 1 desc";
 $result = mysqli_query($con, $query);
 if(mysqli_num_rows($result) > 0)
 {
  $output .= '
   <table class="table" bordered="1">  
                    <tr>  
                         <th>No.</th> 
                         <th>Reference No.</th> 
                         <th>Addressee</th>  
                         <th>Sender</th>  
                         <th>Filing Type</th>  
                         <th>Office/Unit</th>  
                         <th>Subject</th>
                         <th>Address</th>  
                         <th>Image Name</th>
                         <th>Date of Receipt</th>
                    </tr>
  ';
  $i = 0;
  while($row = mysqli_fetch_array($result))
  {
    $sl = ++$i;
   $output .= '
    <tr>  
                         <td > '.$sl.' </td>
                         <td>'.$row["reference_id"].'</td>  
                         <td>'.$row["n_add"].'</td>  
                         <td>'.$row["n_send"].'</td>  
                         <td>'.$row["u_filing"].'</td>  
                         <td>'.$row["u_unit"].'</td>  
                         <td>'.$row["u_sub"].'</td> 
                         <td>'.$row["u_address"].'</td>  
                         <td>'.$row["image"].'</td>  
                         <td>'.$row["uploaded"].'</td> 
                    </tr>
   ';
  }
  $output .= '</table>';
  header('Content-Type: application/xls');
  header('Content-Disposition: attachment; filename=Document_data.xls');
  echo $output;
 }
}
?>