<?php  
require 'db.php';
$sql = 'SELECT * FROM users';
$statement = $connection->prepare($sql);
$statement->execute();
$people = $statement->fetchAll(PDO::FETCH_OBJ);
 ?>  
 <!DOCTYPE html>  
 <html>  
      <head>               
           <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
            <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">  
           <script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script> 

<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css">
	   
           <script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>            
           <link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css" />  
      </head>  
      <body>  
          
		   <?php require 'header.php'; ?>
           <div class="container">
			<div class="card mt-5">
				<div class="card-header">
					<h2>All users</h2>
				</div>
				<div class="card-body">
                     <table id="employee_data" class="table table-success">  
                          <thead>  
                               <tr> 
  							        <td>ID</td>
                                    <td>First Name</td>  
                                    <td>Last Name</td>  
                                    <td>Email</td>  
                                    <td>Create Date</td>  
                                    <td>Update Date</td> 
                                    <td>Edit</td>  									
                               </tr>  
                          </thead> 
							<tbody>						  
						  <?php foreach($people as $person): ?>
							<tr>
								<td><?= $person->id; ?></td>
								<td><?= $person->first_name; ?></td>
								<td><?= $person->last_name; ?></td>
								<td><?= $person->email; ?></td>
								<td><?= $person->create_date; ?></td>
								<td><?= $person->update_date; ?></td>
								<td>
								<a href="edit.php?id=<?= $person->id ?>" class="btn btn-info">Edit</a>              
								</td>
							</tr>
							<?php endforeach; ?>  
							</tbody>
							<tfoot>
								<tr>
									<th>id</th>
									<th>first_name</th>
									<th>last_name</th>
									<th>email</th>
									<th>create_date</th>
									<th>update_date</th>
								</tr>
							</tfoot>							
                     </table>  
					 </div>					
                </div>  
           </div>  
      </body>  
 </html>  
 <script> 
 $(document).ready(function(){  
      $('#employee_data').DataTable( {
        initComplete: function () {
            this.api().columns().every( function () {
                var column = this;
                var select = $('<select><option value=""></option></select>')
                    .appendTo( $(column.footer()).empty() )
                    .on( 'change', function () {
                        var val = $.fn.dataTable.util.escapeRegex(
                            $(this).val()
                        );
 
                        column
                            .search( val ? '^'+val+'$' : '', true, false )
                            .draw();
                    } );
 
                column.data().unique().sort().each( function ( d, j ) {
                    select.append( '<option value="'+d+'">'+d+'</option>' )
                } );
            } );
        }
    } );
} ); 
 </script>  
