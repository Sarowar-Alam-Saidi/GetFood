

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
<body><?php include('navbar.php'); 
	include('conn.php');
?>
<form method="POST" action="view.php">
		<h5>Customer Name:</h5>
				<input type="text" name="customer" class="form-control" required>
				
			<div class="col-md-2" style="margin-left:-20px;">
				<button type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-floppy-disk"></span> Serch </button>
			</div>		
</form>

<?php	if(isset($_POST['customer'])){
	
    echo"<table class='table table-bordered table-striped'>
                        <thead>
                            <th>Product Name</th>
                            <th>Price</th>
                            <th>Purchase Quantity</th>
                            <th>Subtotal</th>
                        </thead>
                        <tbody>";
                            		$customer=$_POST['customer'];
							$sql = "SELECT * FROM purchase JOIN purchase_detail ON purchase.purchaseid=purchase_detail.purchaseid join product ON purchase_detail.productid=product.productid WHERE purchase.customer='$customer';";                       
							$dquery=$conn->query($sql);
							echo"<center><h3><b>Customer Name:</b>".$customer. ".</h3></center>";
                                while($drow=$dquery->fetch_array()){
                                    
                                    echo"<tr>
                                        <td> ". $drow['productname']."</td>
                                        <td>&#2547;".$drow['price']."</td>
                                        <td>". $drow['quantity']."</td>
                                        <td >&#2547;";
                                            
                                                $subt = $drow['price']*$drow['quantity'];
                                                echo number_format($subt, 2);
                                            
                                      echo"  </td> </tr>";
                                   
                                    
                                }
                            $view = "SELECT total FROM purchase WHERE customer='$customer'";
							$total=$conn->query($view);
							 while($row=$total->fetch_array()){
                           echo" <tr>
                                <td><b>TOTAL</b></td>
                               <td></td><td></td><td>&#2547;".$row['total']."</td></tr></tbody>
                    </table>";
							 }
           
 }?>
</body>
<footer><center>A K A S H &nbsp K U N D U  | Daffodil International University</center></footer>
</html>
