<?php 
include_once 'header-2.php';
?>
<head>
<link rel="stylesheet" type="text/css" href="./assets/vendor/datatables/css/jquery.dataTables.css"/><link rel="stylesheet" type="text/css" href="./assets/vendor/datatables/css/dataTables.bootstrap.css"/>
</head>
<body>
	<div class="container-fluid">
		<br><h3>Persetujuan Atestasi Masuk</h3><br>
			<table id="table_id" class="display" style="flex-shrink: 0; width:100%">
				<thead>
					<tr>
						<th >Nomor Atestasi</th>
						<th>Tanggal Pengajuan</th>
						<th>Nama Lengkap</th>
						<th>Alamat</th>
						<th>Asal Gereja</th>
						<th>Status</th>
						<th>Majelis</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
				<?php
				/* @var $row Atestasi */
					foreach($result as $row) {
						echo '<tr>';
						echo '<td>' . $row->getNoAtestasi() . '</td>';
						echo '<td>' . $row->getTglPengajuan() . '</td>';
						echo '<td>' . $row->getNamaLengkap() . '</td>';
						echo '<td>' . $row->getAlamat() . '</td>';
						echo '<td>' . $row->getGerejaAsal() . '</td>';
						echo '<td>' . $row->getStatus() . '</td>';
						echo '<td><button class="acc_atestasi" data-id="'. $idAtestasiM = $row->getIdAtestasiM() .'">Setujui</button></td>';
						echo '<td><button class="detail_atestasi" data-id="'. $idAtestasiM = $row->getIdAtestasiM() .'">Detail</button></td>';
						echo '</tr>';
					}
				?>
				</tbody>
			</table>
	</div>
</body>

  <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-body">
		
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>
 <script>
$(document).ready( function () {
    $('#table_id').DataTable({"dom": '<f<t>>'});
	$(".detail_atestasi").click(function(){
       var atestasi = $(this).attr("data-id");   
       $.ajax({
            url: "./util/ajax.php",
            type: "POST",
            data: {atestasi: atestasi},
            success: function(response) {
               $('.modal-body').html(response);
			   $('#myModal').modal('show'); 
           }
         }); 

     });
	 $(".acc_atestasi").click(function(){
       var atestasi_up = $(this).attr("data-id");   
       $.ajax({
            url: "./util/ajax.php",
            type: "POST",
            data: {atestasi_up: atestasi_up},
            success: function(response) {
               $('.modal-body').html(response);
			   $('#myModal').modal('show'); 
           }
         }); 

     });
} );
</script>
<?php include 'footer-2.php'; ?>