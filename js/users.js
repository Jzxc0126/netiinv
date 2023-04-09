$(document).ready(function() {
    $('#tblusers').DataTable( {
        dom: 'Bfrtip',
        "scrollY": 200,
        "scrollX": true,
        buttons: [
            'copy',
            'excel',
            'csv',
            'pdfHtml5',
            'print'
        ]
    } );
} );


$(document).ready(function() {
    $('#tblviewers').DataTable( {
        dom: 'Bfrtip',
        "scrollY": 200,
        "scrollX": true,
        buttons: [
            'copy',
            'excel',
            'csv',
            'pdfHtml5',
            'print'
        ]
    } );
} );

// Filter the department
$(document).ready(function(){


    $("#selectdepartment").change(function(){
           var depid =  $("#selectdepartment").val();
          
           $.post("usersearchbydepartment.php" , {
            depid:depid
           },function(data){
             $("#dataTable1").html(data);
           });
    });
    
    $('#dataTable1').DataTable( {
        dom: 'Bfrtip',
        'scrollY': 450,
        'scrollX': true,
        buttons: [
        ]
    } );
  
  });
 