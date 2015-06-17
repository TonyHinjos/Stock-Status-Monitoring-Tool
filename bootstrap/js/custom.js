
$(document).ready(function(){
  $("#delete").click(function(){
    if (!confirm("Do you want to delete")){
      return false;
    }
  });
});


$(document).ready(function(){
  $(".update").click(function(){
    if (!confirm("Do you want to update")){
      return false;
    }
  });
});

$(document).ready(function(){
  $("#submit").click(function(){
    if (!confirm("Do you want to update")){
      return false;
    }
  });
});

 $('#expected_date_delivery').datepicker({
     dateFormat: 'dd-mm-yy',
     minDate: '+5d',
     changeMonth: true,
     changeYear: true,
     // altField: "#idTourDateDetailsHidden",
     // altFormat: "yy-mm-dd"
 });

 $('#idTourDateDetails').datepicker({
     dateFormat: 'dd-mm-yy',
     minDate: '+5d',
     changeMonth: true,
     changeYear: true,
     altField: "#idTourDateDetailsHidden",
     altFormat: "yy-mm-dd"
 });