<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<?php require_once('header.php'); ?>

	
 <table border="1" style="width:100%">
 	<tr>Expected Stocks</tr><br>
 	<tr>Expected Shipments Totals</tr>
 	<tr>
    <td>commodity</td>
    <td>Totals</td>
  </tr>

    <?php foreach ($pendingConsignments as $pending_totals): ?>
   <tr>
	<td><?php
foreach($COMMODITY as $COMM):

if ($pending_totals->commodity_id==$COMM->commodity_id){
  echo $COMM->commodity_name; 
  }
  endforeach;
  ?>


  </td>
   	<td>
   	<?php echo $pending_totals->PendingTotal;?>

  </td></tr>
<?php endforeach?>
  </table> 

