$(document).ready(function(){

    $("#selectcategory").change(function(){
      var value = $("#selectcategory").val();
      if(value == "click")
      {
          window.location.replace("/netiiams/modules/maintenancepage/category.php");
      }
      else
      {

      }
    });

    $("#selectsupplier").change(function(){
      var value = $("#selectsupplier").val();
      if(value == "clicksupplier")
      {
          window.location.replace("/netiiams/modules/maintenancepage/supplier.php");
      }
      else
      {

      }
    });

    $("#selectassetusage").change(function(){
      var value = $("#selectassetusage").val();
      if(value == "clickassetusage")
      {
          window.location.replace("/netiiams/modules/maintenancepage/assetusage.php");
      }
      else
      {

      }
    });
    

    $('#daysremaining').hide();
    $("#selectconsumable").change(function(){
        var consumableid = $("#selectconsumable").val();
        if(consumableid === "1")
        {
          $('#daysremaining').hide();
        }
        else if(consumableid === "2")
        {
          $('#daysremaining').show();
        }

    });

    if(exportid == 1)
    {
      $('#tblinventory').DataTable( {
          dom: 'Bfrtip',
          'scrollY': 500,
          'scrollX': true,
          buttons: [
          ]
      } );
    }
    else
    {
      $('#tblinventory').DataTable( {
          dom: 'Bfrtip',
          'scrollY': 500,
          'scrollX': true,
          buttons: [
              'copy',
              'excel',
              'csv',
              'pdfHtml5',
              'print'
          ]
      } );
    }



});
