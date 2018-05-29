<script type="text/javascript">
		$(document).ready(function() {
	// Initializing arrays with section.
	var Grade7 = [<?php  while ($row = mysqli_fetch_array($grade7)) {
		echo '{
		display: "'.$row['section'].' ",value: "'.$row['section'].' "},';
		}?>];

	var Grade8 = [<?php  while ($row = mysqli_fetch_array($grade8)) {	
		echo '{
		display: "'.$row['section'].' ",value: "'.$row['section'].' "},';
		}?>];

	var Grade9 = [<?php  while ($row = mysqli_fetch_array($grade9)) {	
		echo '{
		display: "'.$row['section'].' ",value: "'.$row['section'].' "},';
		}?>];

	var Grade10 = [<?php  while ($row = mysqli_fetch_array($grade10)) {
		echo '{
		display: "'.$row['section'].' ",value: "'.$row['section'].' "},';
		}?>];
	// Function executes on change of first select option field.
	$("#gradeLevel").change(function() {
	var select = $("#gradeLevel option:selected").val();
	switch (select) {
	case "7":
	section(Grade7);
	break;
	case "8":
	section(Grade8);
	break;
	case "9":
	section(Grade9);
	break;
	case "10":
	section(Grade10);
	break;
	default:
	$("#section").empty();
	$("#section").append("<option>--Select--</option>");
	break;
	}
	});
	// Function To List out Cities in Second Select tags
	function section(arr) {
	$("#section").empty(); //To reset sections
	$("#section").append("<option>--Select--</option>");
	$(arr).each(function(i) { //to list sections
	$("#section").append("<option value=" + arr[i].value + ">" + arr[i].display + "</option>")
	});
	}
	});
	</script>