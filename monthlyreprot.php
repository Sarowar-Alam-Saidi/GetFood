<?php include('header.php'); ?>
<!DOCTYPE html>
<html>
<head>
<style>
table, th, td {
    border: 1px solid black;
}
</style>
</head>
<body><?php include('navbar2.php'); 
	include('conn.php');
?>
<form method="POST" action="monthlyreprot.php">
		<h5>Month Name:</h5>
				<input type="text" name="mname" class="form-control" required>
				
			<div class="col-md-2" style="margin-left:-20px;">
				<button type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-floppy-disk"></span> Serch </button>
			</div>		
</form>

<?php	if(isset($_POST['mname'])){
	
    echo"<table class='table table-bordered table-striped'>
                        <thead>
                            <th>Date</th>
                            <th>Customer</th>
                            <th>Total Sale</th>
                        </thead>
                        <tbody>";
                            $MonthName=$_POST['mname'];
							$sum=0;
							$sql = "SELECT * FROM purchase WHERE date_purchase between '2019/01/01' and '2019/02/01'";                       
							$dquery=$conn->query($sql);
							echo"<center><h3><b>Month Name:</b>".$MonthName. ".</h3></center>";
                                while($drow=$dquery->fetch_array()){
                                    
                                    echo"<tr>
                                        <td> ". $drow['date_purchase']."</td>
                                        <td>".$drow['customer']."</td>
                                        <td>". $drow['total']."</td>
										<td >&#2547;";    
                                                $sum = $sum + $drow['total'];
                                                echo number_format($subt, 2);
                                            
                                      echo"  </td> </tr>";
                                   
                                    
                                }
                           echo" </tbody>
                    </table>";
							 
           
 }?>
</body>
<footer><center>A K A S H &nbsp K U N D U  | Daffodil International University</center></footer>
</html>
