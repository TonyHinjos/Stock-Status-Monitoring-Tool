

<?php require_once('header.php'); ?>

<div id="container">
<div id="wrapper">
<h1>Supply Agencies</h1><hr/>
<div id="menu">


<p>click to edit item</p>
<!-- Fetching Names Of All Agencies From Database -->

<table id= "entrydata"  class="table table-striped  table-hover">
    <thead>
       <tr class="bg-primary">
        <th>Count</th> 
        <th>Name</th> 
       </tr>
    </thead>
<tbody>
<?php $count=1; ?>
<?php foreach ($agencies as $agency): ?>

<tr>
<td><?php echo $count; ?></td>
<td><a href="<?php echo base_url() . "index.php/update_ctrl/show_agency_id/" . $agency->supply_chain_agency_id; ?>"><?php echo $agency->supply_chain_agency; ?></a></td>
</tr>
<?php $count++; endforeach; ?>

</tbody>
</table>

              <?php if(isset($formupdate)){?>              
              <div class="col-lg-12"><div class="alert alert-success"><div class="col-lg-12"></div><?php echo $agency->supply_chain_agency." was successfully updated"; ?><?=$formupdate?></div></div>              
              <?php }?>



<a href="#SupplyAgencyRegistration" data-toggle="modal"><div class="btn btn-success"><h5>Add a new Agency</h5></div></a>

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
<input type="submit" id="submit" class="update" name="dsubmit" value="Update">

</form>

<form role="form" action="<?= base_url();?>index.php/update_ctrl/delete_agency" method="post" enctype="multipart/form-data" autocomplete="on">
<label id="hide">Id :</label>
<input type="text" id="hide" name="supply_agency_id" value="<?php echo $agency->supply_chain_agency_id; ?>">
<input type="submit" class="delete-button" id="delete" name="dsubmit" value="Delete">
</form>

<?php endforeach; ?>




</div>
</div>
</div>
<!--</body>
</html>-->



<?php require_once('footer.php'); ?>