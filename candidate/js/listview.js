$(function() {
	/*$("#example1").dataTable();*/
	$.fn.dataTableExt.sErrMode = 'mute';
	
	/*$("#customerlist").dataTable({
		"bPaginate": false,
		"bLengthChange": true,
		"oLanguage": {
				"sSearch": "Search all columns:"
			},
		"bFilter": true,
		"bSort": true,
		"bInfo": true,
		"bAutoWidth": true,
		"aaSorting": [[ 1, "desc" ]],
		"aoColumnDefs": [{ "bSortable": false, "aTargets": [ 0 ] }]
	});*/
	
	$("#example1").dataTable({
		"bPaginate": false,
		"bLengthChange": true,
		"bFilter": true,
		"bSort": true,
		"bInfo": true,
		"bAutoWidth": true,
		"aaSorting": [[ 1, "desc" ]],
		"aoColumnDefs": [{ "bSortable": false, "aTargets": [ 0, 13, 14, 15 ] }],
	});
	
	$("#approvedlist").dataTable({
		"bPaginate": false,
		"bLengthChange": true,
		"bFilter": true,
		"bSort": true,
		"bInfo": true,
		"bAutoWidth": true,
		/*"aaSorting": [[ 1, "desc" ]],*/
		"aoColumnDefs": [{ "bSortable": false, "aTargets": [ 1 ] }]
	});
	
	/*$("#customerlist1").dataTable();*/
	$("#customerlist1").dataTable({
		"bPaginate": false,
		"bLengthChange": true,
		"bFilter": true,
		"bSort": true,
		"bInfo": true,
		"bAutoWidth": true,
		/*"aaSorting": [[ 1, "desc" ]],*/
		"aoColumnDefs": [{ "bSortable": false, "aTargets": [ 10 ] }]
	});
	
	/*$("#bannerlist").dataTable();*/
	$("#bannerlist").dataTable({
		"bPaginate": false,
		"bLengthChange": true,
		"bFilter": true,
		"bSort": true,
		"bInfo": true,
		"bAutoWidth": true,
		/*"aaSorting": [[ 1, "desc" ]],*/
		"aoColumnDefs": [{ "bSortable": false, "aTargets": [ 0 ] }]
	});
	
	/*$("#mmplist").dataTable();*/
	$("#mmplist").dataTable({
		"bPaginate": false,
		"bLengthChange": true,
		"bFilter": true,
		"bSort": true,
		"bInfo": true,
		"bAutoWidth": true,
		/*"aaSorting": [[ 1, "desc" ]],*/
		"aoColumnDefs": [{ "bSortable": false, "aTargets": [ 0, 15 ] }]
	});
	
	$("#singlelist").dataTable({
		"bPaginate": false,
		"bLengthChange": true,
		"bFilter": true,
		"bSort": false,
		"bInfo": true,
		"bAutoWidth": true
	});
	
	$("#setaddress").dataTable({
		"bPaginate": false,
		"bLengthChange": true,
		"bFilter": false,
		"bSort": false,
		"bInfo": true,
		"bAutoWidth": true
	});
	
	$("#quotelist").dataTable({
		"bPaginate": false,
		"bLengthChange": true,
		"bFilter": true,
		"bSort": true,
		"bInfo": true,
		"bAutoWidth": true,
		/*"aaSorting": [[ 1, "desc" ]],
		"aoColumnDefs": [{ "bSortable": false, "aTargets": [ 0 ] }]*/
	});
	
	
	$("#combinelist").dataTable({
		"bPaginate": false,
		"bLengthChange": true,
		"bFilter": true,
		"bSort": false,
		"bInfo": true,
		"bAutoWidth": true
	});
	
	$("#printedlist").dataTable({
		"bPaginate": false,
		"bLengthChange": true,
		"bFilter": true,
		"bSort": true,
		"bInfo": true,
		"bAutoWidth": true,
		/*"aaSorting": [[ 1, "desc" ]],*/
		"aoColumnDefs": [{ "bSortable": false, "aTargets": [ 0 ] }]
	});
	/*$("#queuedlist").dataTable({
		"bPaginate": false,
		"bLengthChange": true,
		"bFilter": true,
		"bSort": true,
		"bInfo": true,
		"bAutoWidth": true,*/
		/*"aaSorting": [[ 1, "desc" ]],*/
		/*"aoColumnDefs": [{ "bSortable": false, "aTargets": [ 0 ] }]
	});*/
	$("#dispatchlist").dataTable({
		"bPaginate": false,
		"bLengthChange": true,
		"bFilter": true,
		"bSort": true,
		"bInfo": true,
		"bAutoWidth": true,
		/*"aaSorting": [[ 1, "desc" ]],*/
		"aoColumnDefs": [{ "bSortable": false, "aTargets": [ 0, 14 ] }]
	});
	$("#courierlist").dataTable({
		"bPaginate": false,
		"bLengthChange": true,
		"bFilter": true,
		"bSort": false,
		"bInfo": true,
		"bAutoWidth": true,
		/*"aaSorting": [[ 0, "asc" ]],*/
		/*"aoColumnDefs": [{ "bSortable": false, "aTargets": [ 0 ] }]*/
	});
	$("#estquotelist").dataTable({
		"bPaginate": false,
		"bLengthChange": true,
		"bFilter": true,
		"bSort": true,
		"bInfo": true,
		"bAutoWidth": true,
		/*"aaSorting": [[ 1, "desc" ]],
		"aoColumnDefs": [{ "bSortable": false, "aTargets": [ 0 ] }]*/
	});
	$("#jobstatuslist").dataTable({
		"bPaginate": false,
		"bLengthChange": true,
		"bFilter": false,
		"bSort": false,
		"bInfo": true,
		"bAutoWidth": true,
		/*"aaSorting": [[ 1, "desc" ]],
		"aoColumnDefs": [{ "bSortable": false, "aTargets": [ 0,7,12,13,14] }]*/
	});
	$("#invoicelist").dataTable({
		"bPaginate": false,
		"bLengthChange": true,
		"bFilter": false,
		"bSort": false,
		"bInfo": true,
		"bAutoWidth": true,
		/*"aaSorting": [[ 1, "desc" ]],
		"aoColumnDefs": [{ "bSortable": false, "aTargets": [ 0,7,12,13,14] }]*/
	});
	$("#ratelist").dataTable({
		"bPaginate": false,
		"bLengthChange": true,
		"bFilter": false,
		"bSort": false,
		"bInfo": true,
		"bAutoWidth": true,
		/*"aaSorting": [[ 1, "desc" ]],
		"aoColumnDefs": [{ "bSortable": false, "aTargets": [ 0,7,12,13,14] }]*/
	});
	$("#failorderlist").dataTable({
		"bPaginate": false,
		"bLengthChange": true,
		"bFilter": true,
		"bSort": true,
		"bInfo": true,
		"bAutoWidth": true,
		"aaSorting": [[ 1, "desc" ]],
		"aoColumnDefs": [{ "bSortable": false, "aTargets": [ 0 ] }]
	});
	$("#failqtorderlist").dataTable({
		"bPaginate": false,
		"bLengthChange": true,
		"bFilter": true,
		"bSort": true,
		"bInfo": true,
		"bAutoWidth": true,
		"aaSorting": [[ 1, "desc" ]],
		"aoColumnDefs": [{ "bSortable": false, "aTargets": [ 0 ] }]
	});
	$("#partnerlist").dataTable({
		"bPaginate": false,
		"bLengthChange": true,
		"bFilter": true,
		"bSort": true,
		"bInfo": true,
		"bAutoWidth": true,
		"aaSorting": [[ 1, "desc" ]],
		"aoColumnDefs": [{ "bSortable": false, "aTargets": [ 0, 9 ] }]
	});
});

