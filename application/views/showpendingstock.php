
<?php require_once('header.php'); ?>

<script>
	

</script>


<div id="container">
<div id="wrapper">
<h1>Pending Stock</h1><hr/>
<div id="menu">

           <?php if(isset($status)){?>
           <div class="row">
           <div class="alert alert-success"><?=$staus?></div>
           </div>
           <?php }?>
<p>click to edit item</p>
<!-- Fetching Names Of All Agencies From Database -->
<ol>
<?php foreach ($PSTOCKS as $pendingstocks): ?>
<li><a href="<?php echo base_url() . "index.php/update_ctrl/show_pending_stocks/" . $pendingstocks->pendingstocksId; ?>"><?php 
foreach($COMMODITY as $COMM):

if ($pendingstocks->commodity_id==$COMM->commodity_id){
	echo $COMM->commodity_name; 
	}
	endforeach; ?></a></li>
<?php endforeach; ?>
<a href="#PendingStock" data-toggle="modal"><div class="btn btn-success"><h5>Add a new Transaction</h5></div></a>
</ol>
</div>
<div id="detail">
<!-- Fetching All Details of Selected agency From Database And Showing In a Form -->
<?php foreach ($single_PSTOCKS as $pendingstocks): ?>
<p>Edit Detail & Click Update Button</p>

<form role="form" action="<?= base_url();?>index.php/update_ctrl/updatePendingDeliveryid" method="post" enctype="multipart/form-data" autocomplete="on">

<!--<form method="post" action="<?php// base_url() . "index.php/update_ctrl/update_agency_id1"?>">-->
<label id="hide">Id :</label>
<input type="text" id="hide" name="pendingstockid" value="<?php echo $pendingstocks->pendingstocksId; ?>">
<label>Commodity Name :</label>
<input type="text" name="commodity_name" value="<?php /*echo $pendingstocks->commodity_name;*/ 


foreach($COMMODITY as $COM):

if ($pendingstocks->commodity_id==$COM->commodity_id){
	echo $COM->commodity_name; 
	}
	endforeach;



?>">
<!-- <label>Pack Size :</label>
<input type="text"  name="pack_size" value="<?php echo $pendingstocks->pack_size; ?>"> -->
<label>Funding Agency :</label>
<input type="text"  name="funding_agency" value="<?php /*echo $pendingstocks->funding_agency;*/



foreach($FUNDING as $FUND):

if ($pendingstocks->funding_agency_id==$FUND->funding_agency_id){
	echo $FUND->funding_agency_name; 
	}
	endforeach;



 ?>">
<label>Pending Deliveries :</label>
<input type="text" name="pending_deliveries" value="<?php echo $pendingstocks->pending_deliveries; ?>">
<label>Expected date of delivery :</label>
<input type="text" id="deliverydate" name="expected_date_delivery" value="<?php echo $pendingstocks->expected_date_delivery; ?>">
<label>Description :</label>
<input type="text" name="pddescription" value="<?php echo $pendingstocks->comments; ?>">



<input type="submit" id="submit" name="dsubmit" value="Update">


</form>

<form role="form" action="<?= base_url();?>index.php/update_ctrl/deleteFundingAgency" method="post" enctype="multipart/form-data" autocomplete="on">
<label id="hide">Id :</label>
<input type="text" id="hide" name="pendingstockid" value="<?php echo $pendingstocks->pendingstocksId; ?>">
<input type="submit" class="delete-button" id="submirt" name="dsubmit" value="Delete">
</form>

<?php endforeach; ?>



</div>
</div>
</div>


<?php require_once('footer.php'); ?>