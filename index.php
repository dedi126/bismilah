<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>CRUD PHP Native</title>
	<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
	<!-- lib js untuk ajax -->
	<script src="plugins/jQuery/jQuery-2.1.4.min.js"></script>
	<!-- lib js untuk datatables -->
	<script src="plugins/datatables/jquery.dataTables.min.js"></script>
	<!-- lib js untuk datatables -->
	<script src="plugins/datatables/dataTables.bootstrap.min.js"></script>
	<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
	<link rel="stylesheet" href="plugins/datatables/dataTables.bootstrap.css">
	<link rel="stylesheet" href="plugins/datatables/jquery.dataTables.min.css">
</head>
<body style="margin: 50px auto;">
	<section class="container">
		<div class="row">
			<div class="col-xs-12">
				<!-- panel panel-primary -->
				<div class="panel panel-primary">
					<!-- panel-header -->
					<div class="panel-header with-border">
						<button class="btn btn-primary  pull-right" style="margin: 5px 15px;" onClick="window.open('add.php','_self')"><i class="fa fa-plus"></i> Tambah</button>
					</div>
					<!-- /panel-header -->
					<!-- view data -->
	                <div class="panel-body">

						<table id="tabel_data_pegawai" class="table table-bordered table-striped">
							<thead>
								<tr>
									<th>Id</th>
									<th>Nama Lengkap</th>
									<th>Jenis Kelamin</th>
									<th>Alamat</th>
									<th>Email</th>
									<th>Action</th>
								</tr>
							</thead>
							<tfoot>
								<tr>
									<th>Id</th>
									<th>Nama</th>
									<th>Jenis Kelamin</th>
									<th>Alamat</th>
									<th>Email</th>
									<th>Action</th>
								</tr>
							</tfoot>
						</table>                   
	                </div><!-- /.panel-body -->
					<!-- /view data -->
				</div>
				<!-- /panel panel-primary-->
			</div><!--/.col (right) -->
		</div> <!-- /.row -->
	</section><!-- /.container -->
	<script type="text/javascript">
		var t = $('#tabel_data_pegawai').DataTable({
				  "autoWidth": false,
				  "rowCallback": function( row, data, index ) {
					  $('td:eq(5)', row).html("<div class=\"btn-group\"><button class=\"btn btn-warning\" onClick=\"window.open('update.php?id="+data[0]+"','_self')\"><i class=\"fa fa-edit\"></i> Ubah</button>&nbsp;&nbsp;<button class=\"btn btn-danger\" onClick=\"window.open('delete.php?id="+data[0]+"','_self')\"><i class=\"fa fa-trash\"></i> Hapus</button></div>");
				  },			  
				  "columnDefs": [
	    				{ "width": "2%", "sClass": "dt-head-center dt-body-center", "targets": 0 },
	    				{ "width": "15%", "sClass": "dt-head-center dt-body-left", "targets": 1 },
	    				{ "width": "20%", "sClass": "dt-head-center dt-body-left", "targets": 2 },
	    				{ "width": "20%", "sClass": "dt-head-center dt-body-left", "targets": 3 },
	    				{ "width": "15%", "sClass": "dt-head-center dt-body-left", "targets": 4 },
	    				{ "width": "20%", "sClass": "dt-head-center dt-body-center", "targets": 5 }
	  				]
				});	

		function add_data_to_table_t(table, data){
	  	  	table.clear().draw();
	  	  	table.rows.add(data).draw( false );
		}		

	  	$(document).ready(function(){
		  	t.order( [ 0, 'asc' ] ).draw(false);	  		
		<?php
			require_once('phpCode/queryCode.php');
			$c = new Connection;
			$data = $c->select();
			echo "
			var data = ".json_encode($data).";
			add_data_to_table_t(t,data);
			";
		?>		
		});	
	</script>	
</body>
</html>
