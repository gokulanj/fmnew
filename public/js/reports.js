$(function() {	
	$('#agentAdherenceTable').DataTable({
		dom: 'Bfrtip',
        buttons: [
            'csv', 'pdf', 'print'
        ],
		footer: true 
	});
	
	$('#outOfAdherenceTable').DataTable({
		dom: 'Bfrtip',
        buttons: [
            'csv', 'pdf', 'print'
        ],
		footer: true 
	});
	$('#outOfAdherenceTable2').DataTable();

	$('#agentStatusAdherenceTable').DataTable({
		dom: 'Bfrtip',
        buttons: [
            'csv', 'pdf', 'print'
        ],
		footer: true 
	});
	$('#reportEnddate').datetimepicker();
	$('#reportFromdate').datetimepicker();

});









