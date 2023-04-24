$(document).ready(function () {
    $('#tblinventory tbody tr').click(function() {
        // retrieve animal data from server
        var id = $(this).attr('id');
        $.get('itemdetails.php', {id: id}, function(data) {
                // display modal with animal details
                $('#animalModal .modal-body').html(data);
                $('#animalModal').modal('show');
        });
    });
    // Setup - add a text input to each footer cell
    $('#tblinventory thead tr')
        .clone(true)
        .addClass('filters')
        .appendTo('#tblinventory thead');
  
    var table = $('#tblinventory').DataTable({
        orderCellsTop: true,
        fixedHeader: true,
        initComplete: function () {
            var api = this.api();
  
            // For each column
            api
                .columns()
                .eq(0)
                .each(function (colIdx) {
                    // Set the header cell to contain the input element
                    var cell = $('.filters th').eq(
                        $(api.column(colIdx).header()).index()
                    );
                    var title = $(cell).text();
                    $(cell).html('<input type="text" placeholder="' + title + '" />');
  
                    // On every keypress in this input
                    $(
                        'input',
                        $('.filters th').eq($(api.column(colIdx).header()).index())
                    )
                        .off('keyup change')
                        .on('change', function (e) {
                            // Get the search value
                            $(this).attr('title', $(this).val());
                            var regexr = '({search})'; //$(this).parents('th').find('select').val();
  
                            var cursorPosition = this.selectionStart;
                            // Search the column for that value
                            api
                                .column(colIdx)
                                .search(
                                    this.value != ''
                                        ? regexr.replace('{search}', '(((' + this.value + ')))')
                                        : '',
                                    this.value != '',
                                    this.value == ''
                                )
                                .draw();
                        })
                        .on('keyup', function (e) {
                            e.stopPropagation();
  
                            $(this).trigger('change');
                            $(this)
                                .focus()[0]
                                .setSelectionRange(cursorPosition, cursorPosition);
                        });
                });
        },
    });




    $("#selectcategoryinadd").change(function(){
        var value = $("#selectcategoryinadd").val();
        if(value == "clickcategory")
        {
            window.location.replace("/netiinv/pages/category.php");
        }
        else
        {
  
        }
      });
  
      $("#selectlocationinadd").change(function(){
        var value = $("#selectlocationinadd").val();
        if(value == "clicklocation")
        {
            window.location.replace("/netiinv/pages/location.php");
        }
        else
        {
  
        }
      });
      $("#selectsupplier").change(function(){
        var value = $("#selectsupplier").val();
        if(value == "clicksupplier")
        {
            window.location.replace("/netiinv/pages/supplier.php");
        }
        else
        {
  
        }
      });
  
      $("#selectassetusage").change(function(){
        var value = $("#selectassetusage").val();
        if(value == "clickassetusage")
        {
            window.location.replace("/netiinv/pages/assetusage.php");
        }
        else
        {
  
        }
      });
  });
  function getCity(val){
    $ajax({
        type: "POST",
        url: "getCity.php",
        
    
    });
  }

