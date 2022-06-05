$(document).ready(function() {

	// Fetch Table Data
	
	$.ajax({
		url:"../../apis/api_m/api.php",
		type: 'POST',
		data:{'req': '1','param': '1'},
		dataType:"json",
		success:function(result){
			$('#contactData').html(result);
		}
	}); 


	//fetch organization data 
	$.ajax({
		url:"../../apis/api_m/api.php",
		type: 'POST',
		data:{'req': '2','param': '2'},
		dataType:"json",
		success:function(result){
			$('#organization').html(result);
		}
	});


	//search by selected organization
	$('#organization').on('change',function(){
		var searchTerm = ($(this).val()=="-1") ? "" : $('#organization option:selected').text().toLowerCase();
		$('tr').each(function(index){
	        if (!index) return;
	        $(this).find("td").each(function () {
	            var id = $(this).text().toLowerCase().trim();
	            var not_found = (id.indexOf(searchTerm) == -1);
	            $(this).closest('tr').toggle(!not_found);
	            return not_found;
	        });
		});
	}); 


	//search by input field
	$("#search").keyup(function () {
	    var value = this.value.toLowerCase().trim();

	    $("tr").each(function (index) {
	        if (!index) return;
	        $(this).find("td").each(function () {
	            var id = $(this).text().toLowerCase().trim();
	            var not_found = (id.indexOf(value) == -1);
	            $(this).closest('tr').toggle(!not_found);
	            return not_found;
	        });
	    });
	});


});


