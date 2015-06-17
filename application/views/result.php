<!DOCTYPE html>
<html lang="en">
	<head>	
		<link href="<?= base_url();?>bootstrap/css/bootstrap.css" rel="stylesheet">
		<script src="<?= base_url();?>bootstrap/js/jquery.js"></script>
		<script src="<?= base_url();?>bootstrap/js/bootstrap.min.js"></script>
	</head>	
	<body>
		<div class="container">
			<?php if(isset($message)){?>
			<div class="row">
				<div class="col-lg-12"><div class="alert alert-success"><?=$message?></div></div>
			</div>
			<?php }?>
			<div class="row">
			<fieldset>
    		<legend>Agencies List</legend>
				<div class="col-lg-12">
			  		<table class="table table-hover table-bordered">
					<tr>
						<td class="text-center"><strong>#</strong></td>
			        	<td><strong>Agency Name</strong></td>
			        	<td><strong>Contact person</strong></td>
			        	<td><strong>Contact phone</strong></td>
			        	<td><strong>Description</strong></td>
			        </tr>
					<?php if(is_array($SUPPLY_AGENCIES) && count($SUPPLY_AGENCIES) ) {
						foreach($SUPPLY_AGENCIES as $loop){
					?>
			        <tr>
			        	<td><?=$loop->supply_chain_agency_id;?></td>
			        	<td><?=$loop->supply_chain_agency;?></td>
			        	<td><?=$loop->contact_person;?></td>
			        	<td><?=$loop->contact_phone;?></td>
			        	<td><?=$loop->comment;?></td>


			        </tr>
					<?php } 
					}?>
					</table>
				</div>
			</fieldset>
        </div>
		</div>
	</body>
</html>











<!--<html>
<head>
<title>Update Agencies Data</title>
<link href='http://fonts.googleapis.com/css?family=Marcellus' rel='stylesheet' type='text/css'>
<link href="<?= base_url();?>bootstrap/css/styles.css" rel="stylesheet" type="text/css">
</head>
<body>-->
<?php require_once('header.php'); ?>

<script>
	

$(function(){
    $("#entrydata").dataTable();
  })
});

</script>



    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <div class="panel panel-default">
            <div class="panel-body">
 










<div id="container">
<div id="wrapper">
<h1>Edit Agencies Data</h1><hr/>
<div id="menu">

           <?php if(isset($status)){?>
           <div class="row">
           <div class="alert alert-success"><?=$staus?></div>
           </div>
           <?php }?>
<p>Click On the Agency you want to Edit</p>
<!-- Fetching Names Of All Agencies From Database -->
<ol>
<?php foreach ($agencies as $agency): ?>


<!-- 	<div class="profile">
<table id= "entrydata"  class="table table-striped">
    <thead>
        <th>name</th> 
    </thead>

        <tr>
        <td> 
           <a href="<?php //echo base_url() . "index.php/update_ctrl/show_agency_id/" . $agency->supply_chain_agency_id; ?>"><?php echo $agency->supply_chain_agency; ?></a>      
        </td>
        </tr>    
    
  <tbody>
   </tbody>
</table>
</div> -->


<!--Display a message if the data is deleted succesfully-->





	
<li><a href="<?php echo base_url() . "index.php/update_ctrl/show_agency_id/" . $agency->supply_chain_agency_id; ?>"><?php echo $agency->supply_chain_agency; ?></a></li>
<?php endforeach; ?>
<a href="#SupplyAgencyRegistration" data-toggle="modal"><div class="btn btn-success"><h5>Add a new Agency</h5></div></a>
</ol>
</div>
<div id="detail">
<!-- Fetching All Details of Selected agency From Database And Showing In a Form -->
<?php foreach ($single_agency as $agency): ?>
<p>Edit Detail & Click Update Button</p>

<form role="form" action="<?= base_url();?>index.php/update_ctrl/update_agency_id1" method="post" enctype="multipart/form-data" autocomplete="on">

<!--<form method="post" action="<?php// base_url() . "index.php/update_ctrl/update_agency_id1"?>">-->
<label id="hide">Id :</label>
<input type="text" id="hide" name="supply_agency_id" value="<?php echo $agency->supply_chain_agency_id; ?>">
<label>Agency Name :</label>
<input type="text" name="supply_agency_name" value="<?php echo $agency->supply_chain_agency; ?>">
<label>Contact Person :</label>
<input type="text" name="contact_person" value="<?php echo $agency->contact_person; ?>">
<label>Contact Phone :</label>
<input type="text" name="contact_phone" value="<?php echo $agency->contact_phone; ?>">
<label>Description :</label>
<input type="text" name="supply_agency_description" value="<?php echo $agency->comment; ?>">
<input type="submit" id="submit" name="dsubmit" value="Update">


</form>

<form role="form" action="<?= base_url();?>index.php/update_ctrl/delete_agency" method="post" enctype="multipart/form-data" autocomplete="on">
<label id="hide">Id :</label>
<input type="text" id="hide" name="supply_agency_id" value="<?php echo $agency->supply_chain_agency_id; ?>">
<input type="submit" class="delete-button" id="submirt" name="dsubmit" value="Delete">
</form>

<?php endforeach; ?>



</div>
</div>
</div>
<!--</body>
</html>-->



            </div>
          </div>
        </div> 
     </div>    
    </div>


<?php require_once('footer.php'); ?>