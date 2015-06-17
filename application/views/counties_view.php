

	<?php require_once('header.php'); ?>

	  <h1>Counties</h1><hr/> <!-- header  -->              
   
   


	       <?php if(isset($SUPPLY_AGENCIES) && $SUPPLY_AGENCIES==""){?>
           <div class="row">
           <div class="col-lg-12"><div class="alert alert-success"><h3>There is no data to display</h3></div></div>
           </div>
           <?php }?>



		


	<div class="col-lg-6">
	<p>click to edit item</p>
  <table id= "entrydata"  class="table table-striped  table-hover">
    <thead>
       <tr class="bg-primary">
        <th>#</th> 
        <th>Name</th> 
       </tr>
    </thead>
	<tbody>


	<?php $count=1; ?>
	<?php foreach ($counties as $county): ?>

	<tr>
	<td><?php echo $count; ?></td>
	<td><a href="<?php echo base_url() . "index.php/update_ctrl/show_county_id/" . $county->county_id; ?>"><?php echo $county->county_name; ?></a></td>
	</tr>
	<?php $count++; endforeach; ?>

	</tbody>
  </table>
  </div>

<div class="col-lg-6">
  <?php foreach ($single_county as $county): ?>
<p>Edit Detail & Click Update Button</p>

<form role="form" action="<?= base_url();?>index.php/update_ctrl/update_county_id1" method="post" enctype="multipart/form-data" autocomplete="on">
<label>County Name:</label>
<?php echo "<br />".$county->county_name."<br />" ;?>



<label id="hide">County Id:</label>
<input type="text" id="hide" name="county_id" value="<?php echo $county->county_id; ?>">

<label>Zone :</label>
          <select name="zone_name" class="form-control">

          <!-- <option name="zone_name"><?php //echo $county->zone?></option>   -->
          <?php foreach ($zones as $zone_name):?>
          <option name="zone_name" <?php if($zone_name->zone==$county->zone){echo"selected";} ?>><?php echo $zone_name->zone;?></option>
          <?php endforeach; ?>          

           </select>


<!-- <label>Zone :</label>
<input type="text" name="zone_name" value="<?php //echo $county->zone; ?>"> -->

<label>Comment :</label>
<input type="text" name="county_comment" value="<?php echo $county->comment; ?>">

<input type="submit" id="submit" class="update" name="dsubmit" value="Update">

<?php endforeach; ?>	
</div>		


<?php require_once('footer.php'); ?>