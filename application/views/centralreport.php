<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<?php require_once('header.php'); ?>




<?php

if(isset($period)){
 
print_r($period);
}


 ?><label for="Period" class="col-lg-5">Period: </label>
       <div class= "col-lg-7">
       <select name="Period" class="form-control">
         <option name="period" selected>--SELECT PERIOD--</option>
          <?php foreach($period_dates as $pdates):?>
          <option name="period"><?php echo $pdates->period;?></option>
          <?php endforeach; ?>
           </select>
      </div>



<div class= "col-lg-12">

<table border="1" style="width:100%">
  <tr>
  <td>
  Central Level
 </td>
  <td>
  Aggregated Adjusted Consumption Totals (3 month average)
  </td>
  <td>
  Aggregated Stock on Hand Totals (For Reporting Period)
  </td>
  <td>
  Central level MOS
  </td>
  </tr>


  <tr>
    <td>AL6s</td>
    <td>AAC</td>
  </tr>

<?php if(isset($period)){
 

//  foreach($period as $p):

// endforeach;
}
?>


</table>

</div>




