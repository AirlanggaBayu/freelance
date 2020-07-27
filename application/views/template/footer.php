	<div>	
		<div class="row">
			<div class="col-sm-12">
				<p class="back-link">Lumino Theme by <a href="https://www.medialoot.com">Medialoot</a></p>
			</div>
		</div><!--/.row-->
	</div>	<!--/.main-->
	<script src="<?= base_url('assets/js/jquery-1.11.1.min.js')?>"></script>
	<script src="<?= base_url('assets/js/bootstrap.min.js')?>"></script>
	<script src="<?= base_url('assets/js/chart.min.js')?>"></script>
	<script src="<?= base_url('assets/js/chart-data.js')?>"></script>
	<script src="<?= base_url('assets/js/easypiechart.js')?>"></script>
	<script src="<?= base_url('assets/js/easypiechart-data.js')?>"></script>
	<script src="<?= base_url('assets/js/bootstrap-datepicker.js')?>"></script>
	<script src="<?= base_url('assets/js/custom.js')?>"></script>
	<!-- DataTables -->
	<script src="<?= base_url('assets/plugins/datatables/jquery.dataTables.min.js'); ?>"></script>
	<script src="<?= base_url('assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js'); ?>"></script>
	<script src="<?= base_url('assets/plugins/datatables-responsive/js/dataTables.responsive.min.js'); ?>"></script>
	<script src="<?= base_url('assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js'); ?>"></script>
	<script>
		window.onload = function () {
			var chart1 = document.getElementById("line-chart").getContext("2d");
			window.myLine = new Chart(chart1).Line(lineChartData, {
			responsive: true,
			scaleLineColor: "rgba(0,0,0,.2)",
			scaleGridLineColor: "rgba(0,0,0,.05)",
			scaleFontColor: "#c5c7cc"
			});
		};
	</script>
	<script>
	$(function () {
		$("#example1").DataTable({
		"responsive": true,
		"autoWidth": false,
		});
		$('#example2').DataTable({
		"paging": true,
		"lengthChange": false,
		"searching": false,
		"ordering": true,
		"info": true,
		"autoWidth": false,
		"responsive": true,
		});
	});
	</script>
		
</body>
</html>