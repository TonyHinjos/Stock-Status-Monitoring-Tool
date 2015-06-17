
<!--<html>
<head>
<title>Update Agencies Data</title>
<link href='http://fonts.googleapis.com/css?family=Marcellus' rel='stylesheet' type='text/css'>
<link href="<?= base_url();?>bootstrap/css/styles.css" rel="stylesheet" type="text/css">
</head>
<body>-->
<?php require_once('header.php'); ?>



<div id="container">
<div id="wrapper">
<h1>Static parameters</h1><hr/>
<div id="menu">

           <?php if(isset($status)){?>
           <div class="row">
           <div class="alert alert-success"><?=$status?></div>
           </div>
           <?php }?>
<p>click to edit item</p>
<!-- Fetching Names Of All Agencies From Database -->
<ol>
<?php foreach ($staticParams as $static_dets): ?>
<li><a href="<?php echo base_url() . "index.php/update_ctrl/showStaticParams/" . $static_dets->staticparameterid; ?>"><?php 

foreach($COMMODITY as $COMM):

if ($static_dets->commodity_id==$COMM->commodity_id){
	echo $COMM->commodity_name; 
	}
	endforeach;



/*echo $static_dets->commodity_name; */?></a></li>
<?php endforeach; ?>
<a href="#StaticParameters" data-toggle="modal"><div class="btn btn-success"><h5>Adjust Static Parameters</h5></div></a>
</ol>
</div>
<div id="detail">
<!-- Fetching All Details of Selected agency From Database And Showing In a Form -->
<?php foreach ($single_staticparam as $static_dets): ?>
<p>Edit Detail & Click Update Button</p>

<form role="form" action="<?= base_url();?>index.php/update_ctrl/updateStaticParamsid" method="post" enctype="multipart/form-data" autocomplete="on">

<!--<form method="post" action="<?php// base_url() . "index.php/update_ctrl/update_agency_id1"?>">-->
<label id="hide">Id :</label>
<input type="text" id="hide" name="staticparams_id" value="<?php echo $static_dets->staticparameterid; ?>">
<label>Period :</label>
<input type="text" name="period" value="<?php echo $static_dets->period; ?>">
<label>Commodity Name :</label>
<input type="text" name="commodity_name" value="<?php /*echo $static_dets->commodity_name;*/


foreach($COMMODITY as $COMM):

if ($static_dets->commodity_id==$COMM->commodity_id){
	echo $COMM->commodity_name; 
	}
	endforeach;


 ?>">

<label>Reporting Rate :</label>
<input type="text" name="reporting_rate" value="<?php echo $static_dets->reporting_rate; ?>">

<!-- 
<label>Pack Size :</label>
<input type="text" name="pack_size" value="<?php //echo $static_dets->pack_size; ?>"> -->

<label>Projected Monthly Consumption :</label>
<input type="text" name="projected_monthly_consumption" value="<?php echo $static_dets->projected_monthly_consumption; ?>">

<label>Average Monthly Consumption :</label>
<input type="text" name="average_monthly_consumption" value="<?php echo $static_dets->average_monthly_consumption; ?>">


<input type="submit" id="submit" name="dsubmit" value="Update">


</form>

<form role="form" action="<?= base_url();?>index.php/update_ctrl/deleteStaticParam" method="post" enctype="multipart/form-data" autocomplete="on">
<label id="hide">Id :</label>
<input type="text" id="hide" name="staticparams_id" value="<?php echo $static_dets->staticparameterid; ?>">
<input type="submit" class="delete-button" id="submirt" name="dsubmit" value="Delete">
</form>

<?php endforeach; ?>



</div>
</div>
</div>


<?php require_once('footer.php'); ?>