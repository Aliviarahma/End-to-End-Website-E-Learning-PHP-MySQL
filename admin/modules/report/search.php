
<?php require_once("../../../include/initialize.php");
	 if (!isset($_SESSION['TYPE'])=='Administrator'){
      redirect(web_root."index.php");
     }


?>

<div class="container">
	<div class="panel">
		<div class="panel-body">
	<div class="row">
		<form class="form-inline pull-right" action="index.php" method="post"> 
		 <div class="form-group">
		<h3>Date Filter :: </h3>
		</div>
		 <div class="form-group">
		 <input class="form-control date start input-lg" size="20" type="date" value="<?php echo (isset($_POST['start'])) ? $_POST['start'] : ''; ?>" Placeholder="Check In" name="start" id="from" data-date="" data-date-format="yyyy-mm-dd" data-link-field="any" data-link-format="yyyy-mm-dd">
		 </div>
		  <div class="form-group"> 
		      <input class="form-control date end input-lg" size="20" type="date" value="<?php echo (isset($_POST['end'])) ? $_POST['end'] : ''; ?>"  name="end" id="end" data-date="" data-date-format="yyyy-mm-dd" data-link-field="any" data-link-format="yyyy-mm-dd">
		  </div>
		  
		  <button type="submit" name="submit" class="btn btn_kcctc btn-lg"><span class="glyphicon glyphicon-search"></span></button>
		</form>
 </div> <br/><br/>
 
<form  method="post" action="<?php echo $_SERVER['PHP_SELF'] ?>">
<span id="printout">
<div class="row" ><h3 align="center">Overall Income in <?php echo ((@$_POST['start']) ? $_POST['start'] : '') . ' to ' .  ((@$_POST['end']) ? $_POST['end'] : '');?></h3></div>
<table  class="table table-bordered" cellspacing="0">
<thead>
<tr bgcolor="#bbd43b">
<td ><strong>Name</strong></td>
<td ><strong>Order Number</strong></td>
<td ><strong>Date Ordered</strong></td>
<td ><strong>Date Claimed</strong></td> 
<td ><strong>Payment Method</strong></td> 
<!-- <td ><strong>Quantity</strong></td> -->
<td ><strong>Total Price</strong></td>
</tr>
</thead>
<tbody>		
<?php
if(isset($_POST['submit'])){
	$_SESSION['start']=$_POST['start'];
	$_SESSION['end']=$_POST['end'];	
 
	$query = "SELECT  `FIRSTNAME` ,  ' ',  `LASTNAME` ,  `ORDERNUMBER` ,  `DATEORDER` ,  `PAYMENTMETHOD` ,  `CLAIMDATE` ,ALLQTY,  `TOTALPRICE` ,  `STATS` 
				FROM  `tblcustomer` c,  `tblpayment` p
				WHERE c.`CUSTOMERID` = p.`CUSTOMERID` AND STATS='Confirmed' AND date(DATEORDER)>='".$_POST['start']."' AND date(DATEORDER) <='".$_POST['end']."'";
				$result = mysql_query($query) or die(mysql_error());

		$rowcount = mysql_num_rows($result) or die(mysql_error());
 
	if ($rowcount>0)	{
		while ($row = mysql_fetch_array($result)) {
			# code...

		echo '	<tr >';
		echo '<td>'.$row['FIRSTNAME']." ".$row['LASTNAME'].'</td>';
		echo '<td>'.$row['ORDERNUMBER'].'</td>';
		echo '<td>'.$row['DATEORDER'].'</td>';
		echo '<td>'.$row['CLAIMDATE'].'</td>';
		echo '<td>'.$row['PAYMENTMETHOD'].'</td> ';
		// echo '<td>'.$row['ALLQTY'].'</td>'
		echo '<td>'.$row['TOTALPRICE'].'</td>';
		echo '</tr>';


				@$overall += $row['TOTALPRICE'];
		}

	}else{
			echo '<tr><td colspan="7" align="center"><h2>Please Enter Then Dates</h2></td></tr>';

	}
		 
	}
?>
</tbody>

</table>
<table>
	<tfoot style="margin-right:10%">
<tr> <h4 align="right"> Overall Price : &#8369 <?php echo isset( $overall) ? $overall : 0; ?></h4>  </tr>
	
</tfoot>
</table>
</span>
<button onclick="tablePrint();" class="btn btn_fixnmix"><span class="glyphicon glyphicon-print"></span> Print Report</button>
 
</form>
</div>
</div> 
</div>
<script>
function tablePrint(){  
    var display_setting="toolbar=no,location=no,directories=no,menubar=no,";  
    display_setting+="scrollbars=no,width=500, height=500, left=100, top=25";  
    var content_innerhtml = document.getElementById("printout").innerHTML;  
    var document_print=window.open("","",display_setting);  
    document_print.document.open();  
    document_print.document.write('<body style="font-family:verdana; font-size:12px;" onLoad="self.print();self.close();" >');  
    document_print.document.write(content_innerhtml);  
    document_print.document.write('</body></html>');  
    document_print.print();  
    document_print.document.close();  
    return false;  
    } 
	$(document).ready(function() {
		oTable = jQuery('#list').dataTable({
		"bJQueryUI": true,
		"sPaginationType": "full_numbers"
		} );
	});		
</script>