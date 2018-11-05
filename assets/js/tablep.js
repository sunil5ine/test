/*					PAGINATION 
		  - on change max rows select options fade out all rows gt option value mx = 5
		  - append pagination list as per numbers of rows / max rows option (20row/5= 4pages )
		  - each pagination li on click -> fade out all tr gt max rows * li num and (5*pagenum 2 = 10 rows)
		  - fade out all tr lt max rows * li num - max rows ((5*pagenum 2 = 10) - 5)
		  - fade in all tr between (maxRows*PageNum) and (maxRows*pageNum)- MaxRows 
		  */
function getPagination(table) {
	$('#maxRows').on('change', function () {
		$('.pagination').html(''); // reset pagination 
		var trnum = 0; // reset tr counter 
		var maxRows = parseInt($(this).val()); // get Max Rows from select option
		var totalRows = $(table + ' tbody tr').length; // numbers of rows 
		$(table + ' tr:gt(0)').each(function () { // each TR in  table and not the header
			trnum++; // Start Counter 
			if (trnum > maxRows) { // if tr number gt maxRows
				$(this).hide(); // fade it out 
			}
			if (trnum <= maxRows) {
				$(this).show();
			} // else fade in Important in case if it ..
		}); //  was fade out to fade it in 
		if (totalRows > maxRows) { // if tr total rows gt max rows option
			var pagenum = Math.ceil(totalRows / maxRows); // ceil total(rows/maxrows) to get ..  
			//	numbers of pages 
			for (var i = 1; i <= pagenum;) { // for each page append pagination li 
				$('.pagination').append('<li class="waves-effect" data-page="' + i + '">\
								      <a href="#!">' + i+++'<span class="sr-only"></span></a>\
								    </li>').show();
			} // end for i 
		} // end if row count > max rows
		$('.pagination li:first-child').addClass('active'); // add active class to the first li 
		$('.pagination li').on('click', function () { // on click each page
			var pageNum = $(this).attr('data-page'); // get it's number
			var trIndex = 0; // reset tr counter
			$('.pagination li').removeClass('active'); // remove active class from all li 
			$(this).addClass('active'); // add active class to the clicked 
			$(table + ' tr:gt(0)').each(function () { // each tr in table not the header
				trIndex++; // tr index counter 
				// if tr index gt maxRows*pageNum or lt maxRows*pageNum-maxRows fade if out
				if (trIndex > (maxRows * pageNum) || trIndex <= ((maxRows * pageNum) - maxRows)) {
					$(this).hide();
				} else {
					$(this).show();
				} //else fade in 
			}); // end of for each tr in table
		}); // end of on click pagination list
	});
	// end of on select change 
	// END OF PAGINATION 
}
$(function () {
	// Just to append id number for each row  
	$('table tr:eq(0)').prepend('<th> ID </th>')
	var id = 0;
	$('table tr:gt(0)').each(function () {
		id++
		$(this).prepend('<td>' + id + '</td>');
	});
})
$(document).ready(function () {
	$("#ser-input").on("keyup", function () {
		var value = $(this).val().toLowerCase();
		$("#myjobs tbody tr").filter(function () {
			$(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
		});
		if ($('#myjobs tbody tr:visible').length == 0) {
			$('#myjobs tbody').append('<tr><td colspan="6" class="center no-result">No result found</td></tr>');
		} else {
			$('#myjobs tbody .no-result').remove();
		}
	});
	$('th').click(function () {
		var table = $(this).parents('table').eq(0)
		var rows = table.find('tr:gt(0)').toArray().sort(comparer($(this).index()))
		this.asc = !this.asc
		if (!this.asc) {
			rows = rows.reverse()
		}
		for (var i = 0; i < rows.length; i++) {
			table.append(rows[i])
		}
		
	})

	function comparer(index) {
		return function (a, b) {
			var valA = getCellValue(a, index),
				valB = getCellValue(b, index)
			return $.isNumeric(valA) && $.isNumeric(valB) ? valA - valB : valA.toString().localeCompare(valB)
		}
	}

	function getCellValue(row, index) {
		return $(row).children('td').eq(index).text()
	}
	$('.page-number').first().addClass("active");
});