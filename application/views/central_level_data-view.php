
<?php require_once('header.php'); ?>


<div id="container">
<div id="wrapper">
<h1>Central level data</h1><hr/>
<div id="menu">

           <?php if(isset($status)){?>
           <div class="row">
           <div class="alert alert-success"><?=$staus?></div>
           </div>
           <?php }?>
<p>Cclick to edit item</p>
<!-- Fetching Names Of All Agencies From Database -->
<ol>
<?php foreach ($Central_level as $central_level_data): ?>	
<li><a href="<?php echo base_url() . "index.php/update_ctrl/show_central_level_stock/" . $central_level_data->central_level_stock_id; ?>"><?php 

foreach($COMMODITY as $COMM):

if ($central_level_data->commodity_id==$COMM->commodity_id){
  echo $COMM->commodity_name; 
  }
  endforeach;


/*$data2['COMMODITY']=$this->agenciesmodel->show_commodities();
    $data2['FUNDING']=$this->agenciesmodel->show_fundingorgs();
    $data2['SUPLYAGENCY']=$this->agenciesmodel->show_students();

*/





?></a></li>
<?php endforeach; ?>
<a href="#CentralLevelData" data-toggle="modal"><div class="btn btn-success"><h5>Add a Transaction</h5></div></a>
</ol>
</div>
<div id="detail">
<!-- Fetching All Details of Selected agency From Database And Showing In a Form -->
<?php foreach ($single_Central_level as $central_level_data): ?>
<p>Edit Detail & Click Update Button</p>

<form role="form" action="<?= base_url();?>index.php/update_ctrl/updatecentral_levelid" method="post" enctype="multipart/form-data" autocomplete="on">

<!--<form method="post" action="<?php// base_url() . "index.php/update_ctrl/update_agency_id1"?>">-->
<label id="hide">Id :</label>
<input type="text" id="hide" name="central_level_stock_id" value="<?php echo $central_level_data->central_level_stock_id; ?>">
<label>Commodity Name :</label>
<input type="text" name="commodity_name" value="<?php /*echo $central_level_data->commodity_name;*/

foreach($COMMODITY as $COMM):

if ($central_level_data->commodity_id==$COMM->commodity_id){
  echo $COMM->commodity_name; 
  }
  endforeach;

 ?>">
<label>Funding Agency :</label>
<input type="text" name="funding_Agencye" value="<?php /*echo $central_level_data->pack_size;*/


foreach($FUNDING as $FA):

if ($central_level_data->funding_agency_id==$FA->funding_agency_id){
  echo $FA->funding_agency_name; 
  }
  endforeach;


 ?>">
<label>Supply Agency :</label>
<input type="text" name="supply_chain_agency" value="<?php /*echo $central_level_data->supply_chain_agency;*/

foreach($SUPLYAGENCY as $SA):

if ($central_level_data->supply_agency_id==$SA->supply_chain_agency_id){
  echo $SA->supply_chain_agency; 
  }
  endforeach;


 ?>">
<label>Opening Balance:</label>
<input type="text" name="opening_balance" value="<?php echo $central_level_data->opening_balance; ?>">
<label>Supplier Receipts :</label>
<input type="text" name="receipts_from_suppliers" value="<?php echo $central_level_data->receipts_from_suppliers; ?>">
<label>Total Issues :</label>
<input type="text" name="total_issues" value="<?php echo $central_level_data->total_issues; ?>">
<label>Closing Balance :</label>
<input type="text" name="closing_balance" value="<?php echo $central_level_data->closing_balance; ?>">
<label>Earliest Expiry :</label>
<input type="text" name="earliest_expiry_date" value="<?php echo $central_level_data->earliest_expiry_date; ?>">
<label>Quantity Expiring :</label>
<input type="text" name="quantity_expiring" value="<?php echo $central_level_data->quantity_expiring; ?>">
<label>Reporting Date:<?php echo $central_level_data->report_date; ?> </label>
<input type="submit" id="submit" name="dsubmit" value="Update">


</form>

<form role="form" action="<?= base_url();?>index.php/update_ctrl/delete_central_level_data" method="post" enctype="multipart/form-data" autocomplete="on">
<label id="hide">Id :</label>
<input type="text" id="hide" name="central_level_stock_id" value="<?php echo $central_level_data->central_level_stock_id; ?>">
<input type="submit" class="delete-button" id="submirt" name="dsubmit" value="Delete">
</form>

<?php endforeach; ?>



</div>
</div>
</div>



<?php require_once('footer.php'); ?>
















   <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">Add Transactions<b class="caret"></b> </a>
              <ul class= "dropdown-menu">              
                <li><a href="#" >Add to Pending Trabsactions</a></li>
                  <li><a href="#" >Add to Current Stocks</a></li>
              </ul>
            </li> 