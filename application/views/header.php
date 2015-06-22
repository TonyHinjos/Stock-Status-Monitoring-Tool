
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    
    <meta name="generator" content="CoffeeCup Image Mapper">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title></title>

  
    <link href="<?= base_url();?>bootstrap/css/bootstrap.min.css" rel="stylesheet"><!--link the html code to the bootstrap-->
    
    <link rel="<?= base_url();?>stylesheet" href="bootstrap/css/bootstrap-theme.min.css">
    <!-- DATEPICKER -->

    <link href="<?= base_url();?>bootstrap-datepicker-1.4.0-dist/css/bootstrap-datepicker.css" rel="stylesheet">
    <link href="<?= base_url();?>bootstrap-datepicker-1.4.0-dist/css/bootstrap.css" rel="stylesheet">
     
    <link href="<?= base_url();?>bootstrap/css/styles.css" rel="stylesheet" type="text/css">
    



  </script>

  <style>
  .datepicker{z-index: 1151px, !important}
  </style>
  
   
  </head>
  <body>  

   
   <div style= "background-color:#276696"  class="navbar navbar-inverse navbar-static-top">

      <div class="container"><!--this contains the everything to be place in the navbar-->
        
        <button class= "navbar-toggle" data-toggle = "collapse" data-target = "#navHeaderCollapse">
          <span class="icon-bar"></span> 
          <span class="icon-bar"></span>  
          <span class="icon-bar"></span>   

        </button>

        <div class="collapse navbar-collapse" id="navHeaderCollapse">

          <ul class="nav navbar-nav navbar-right">

            <li class="active"><a href="<?= base_url();?>">Home</a></li><!--this is the general outlook of the site by everyone-->
                    


           <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">Setup<b class="caret"></b> </a>
              <ul class= "dropdown-menu">              
                <li><a href="<?= base_url();?>index.php/update_ctrl/showFundingAgency" >Funding Agencies</a></li>


            
                <li><a href="<?= base_url();?>index.php/update_ctrl/show_agency_id" >Supply Agencies</a></li>

                <li><a href="<?= base_url();?>index.php/update_ctrl/show_commodities_id">Commodities</a></li>       
                <li><a href="#">Zones</a></li>
                <li><a href="<?= base_url();?>index.php/update_ctrl/show_county_id">Counties</a></li>
                <li><a href="<?= base_url();?>index.php/update_ctrl/showStaticParams">Static Parameters</a></li>
              </ul>
            </li>  



           <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">Transactions<b class="caret"></b> </a>
              <ul class= "dropdown-menu">              
                <li><a href="<?= base_url();?>index.php/update_ctrl/show_pending_stocks" >Pending Shipments</a></li>
                 <li><a href="<?= base_url();?>index.php/update_ctrl/show_central_level_stock">Current Stock</a></li>

                <li><a href="#">View Transactions</a></li>
              </ul>
            </li>  



            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">Reports<b class="caret"></b> </a>
              <ul class= "dropdown-menu"> 
                <li><a href="<?= base_url();?>index.php/update_ctrl/select_period">Central Level Drug Status</a></li>   
                <li><a href="<?= base_url();?>index.php/update_ctrl/countyLevelstocksReports">County Level Drug Status</a></li>         
                <li><a href="#" >Central</a></li>
                <li><a href="<?= base_url();?>index.php/update_ctrl/DisplayPendingShipments">Total Pending Commodities</a></li>
                <li><a href="<?= base_url();?>index.php/update_ctrl/pendingstocksReports"> Individual Pending Commodities</a></li>
                <li><a href="#">Period</a></li><!-- commoditiesPerAgency -->
              </ul>
            </li> 
               

          </ul>

        </div>       

      </div>
    </div><!--this is the end of the top navbar-->

<!-- BODY CONTAINER-->
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <div class="panel panel-default">
            <div class="panel-body">
              <!--HEADER-->
<!--               <div class="page-header"> 
                
        
              </div> -->
              <!-- BODY CONTAINER-->


              <?php require_once('forms.php'); ?>
