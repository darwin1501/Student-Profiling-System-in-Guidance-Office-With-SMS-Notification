
<script type="text/javascript" src="../../../../assets/js/materialize.min.js"></script>
<script>
	//Collapsible sidenav
	$(".button-collapse").sideNav();
</script>
<script>
$(".btn_export_grd7").click(function() {
				$(".tbl_export_grd7").table2excel({
					exclude: ".noExl",
					name: "Excel Document Name",
					filename: "grade7.xls",
					fileext: ".xlsx",
					exclude_img: true,
					exclude_links: true,
					exclude_inputs: true
				});
			});

$(".btn_export_grd8").click(function() {
				$(".tbl_export_grd8").table2excel({
					exclude: ".noExl",
					name: "Excel Document Name",
					filename: "grade8.xls",
					fileext: ".xlsx",
					exclude_img: true,
					exclude_links: true,
					exclude_inputs: true
				});
			});

$(".btn_export_grd9").click(function() {
				$(".tbl_export_grd9").table2excel({
					exclude: ".noExl",
					name: "Excel Document Name",
					filename: "grade9.xls",
					fileext: ".xlsx",
					exclude_img: true,
					exclude_links: true,
					exclude_inputs: true
				});
			});

$(".btn_export_grd10").click(function() {
				$(".tbl_export_grd10").table2excel({
					exclude: ".noExl",
					name: "Excel Document Name",
					filename: "grade10.xls",
					fileext: ".xlsx",
					exclude_img: true,
					exclude_links: true,
					exclude_inputs: true
				});
			});

		 $(document).ready(function(){
    	$('.collapsible').collapsible();
  		});
		// script for the datepicker
			$('.datepicker').pickadate({
			selectMonths: true, // Creates a dropdown to control month
			selectYears: 15, // Creates a dropdown of 15 years to control year,
			today: 'Today',
			clear: 'Clear',
			close: 'Ok',
			format: 'yyyy-mm-dd', 
			closeOnSelect: false // Close upon selecting a date,
			});	
	</script>