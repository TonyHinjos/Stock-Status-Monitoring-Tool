<?php require_once('header.php'); ?>

<div id="container">
<div id="wrapper">
<h1>Commodities</h1><hr/>
<div id="menu">

           <?php if(isset($status)){?>
           <div class="row">
           <div class="alert alert-success"><?=$status?></div>
           </div>
           <?php }?>
<p>click to edit item</p>
<!-- Fetching Names Of All Commodities From Database -->
<ol>
<?php foreach ($commodities as $commodity): ?>

	
<li><a href="<?php echo base_url() . "index.php/update_ctrl/show_commodities_id/" . $commodity->commodity_id; ?>"><?php echo $commodity->commodity_name; ?></a></li>
<?php endforeach; ?>
<a href="#CommodityRegistration" data-toggle="modal"><div class="btn btn-success"><h5>Add a new Commodity</h5></div></a>
</ol>
</div>
<div id="detail">
<!-- Fetching All Details of Selected agency From Database And Showing In a Form -->
<?php foreach ($single_commodity as $commodity): ?>
<p>Edit Detail & Click Update Button</p>

<form role="form" action="<?= base_url();?>index.php/update_ctrl/update_commodity_id" method="post" enctype="multipart/form-data" autocomplete="on">

<!--<form method="post" action="<?php// base_url() . "index.php/update_ctrl/update_agency_id1"?>">-->
<label id="hide">Id :</label>
<input type="text" id="hide" name="commodity_id" value="<?php echo $commodity->commodity_id; ?>">
<label>Commodity Name :</label>

<input type="text" name="commodity_name" value="<?php echo $commodity->commodity_name; ?>">
<label>Pack Size :</label>
<input type="text" name="pack_size" value="<?php echo $commodity->pack_size; ?>">
<label>Funding Agency Name:</label>
<input type="text" name="funding_agency_name" value="<?php /*echo $commodity->funding_agency_name;*/


foreach($funding_agency as $FUND):

if ($commodity->funding_agency_id==$FUND->funding_agency_id){
	echo $FUND->funding_agency_name; 
	}
	endforeach;


 ?>">
<!-- <label>Commodity Description :</label>
<input type="text" name="commodity_description" value="<?php echo $commodity->commodity_description; ?>"> -->
<input type="submit" id="submit" name="dsubmit" value="Update">


</form>

<form role="form" action="<?= base_url();?>index.php/update_ctrl/delete_commodity" method="post" enctype="multipart/form-data" autocomplete="on">
<label id="hide">Id :</label>
<input type="text" id="hide" name="commodities_id" value="<?php echo $commodity->commodity_id; ?>">
<input type="submit" class="delete-button" id="submirt" name="dsubmit" value="Delete">
</form>

<?php endforeach; ?>



</div>
</div>
</div>

<?php require_once('footer.php'); ?>