!function ($) {
	
	
	
	//*****************************************************************
	//*********************Fetch Region Table**************************
	//*****************************************************************
	$.ajax({
	   url:"../../apis/apis_s/api.php", 
	   type: "post",
	   data: {'req': '1', 'param':'1', 'get':'body'},
	   dataType:"json",
	   success:function(result)
	   { 
		  $("#region_table").html(result);
	   }
	});


	//*****************************************************************
	//**********************Add Region data****************************
	//*****************************************************************


	$('#add_region_form').submit(function (event)
     {
         event.preventDefault();
         $.ajax({
             data: $(this).serialize(),
             url:"../../controller/process_region_data.php", //php page URL where we post this data to save in database
             type: 'POST',
             success: function (result_1) {
                 $.ajax({
				   url:"../../apis/apis_s/api.php", 
				   type: "post",
				   data: {'req': '1', 'param':'1', 'get':'body'},
				   dataType:"json",
				   success:function(result)
				   { 
				   	  if(result_1 == 'true'){
					   	  Swal.fire({
							  position: 'top-end',
							  icon: 'success',
							  title: 'Region has been saved',
							  showConfirmButton: false,
							  timer: 1500
							})
						  $("#region_table").html(result);
						  $("#add_region_form")[0].reset();
						}
						else{ 
							Swal.fire({
							  position: 'top-end',
							  icon: 'error',
							  title: 'Something Went Wrong. Please Try Again',
							  showConfirmButton: false,
							  timer: 1500
							})
						  $("#region_table").html(result);
						  // $("#add_region_form")[0].reset();
						}

				   }
				});
             }
         });
     });


	//*****************************************************************
	//**********************Search From Table**************************
	//*****************************************************************
	$('#search').on('keyup',function(){
	   var searchTerm = $(this).val().toLowerCase();
	   $('#region_table tr').each(function(){
		   var lineStr = $(this).text().toLowerCase();
		   if(lineStr.indexOf(searchTerm) === -1)
		   {
			  $(this).hide();
		   }
		   else
		   {
			  $(this).show();
		   }
	   });
	});



	//*****************************************************************
	//**********************Edit Regions Data**************************
	//*****************************************************************

	$("#region_table").on('click', '#btn_edit',function(e)
	{
		var did = $(this).attr('data-id');
		$("#edit_id").val(did);
		$("#modal_edit").modal('show');
	});
	
	$("#modal_edit").on('show.bs.modal', function(event)
	{  
		// Get region ID
		var did = $("#edit_id").val();
		$.ajax({
		   url:"../../apis/apis_s/api.php", 
		   type: "post",
		   data: {'req': '1', 'param': '2', 'data': did},
		   dataType:"json",
		   success:function(result)
		   { 
			  $('#edit_code').val(result['code']);
			  $("#edit_name").val(result['name']);
			  $("#edit_defination").val(result['definition']);
			  $("#edit_status > [value=" + result['is_active'] + "]").attr("selected", "true");
			  $("#edit_status").trigger("change"); 
		   }
		}); 
	});

	// *************************************************************************************************
	$('#edit_region_form').submit(function (event)
     {
         event.preventDefault();
         $.ajax({
             data: $(this).serialize(),
             url:"../../controller/process_region_data.php", //php page URL where we post this data to save in database
             type: 'POST',
             success: function (result_1) {
                 $.ajax({
				   url:"../../apis/apis_s/api.php", 
				   type: "post",
				   data: {'req': '1', 'param':'1', 'get':'body'},
				   dataType:"json",
				   success:function(result)
				   { 
				   	  if(result_1 == 'true'){
					   	  Swal.fire({
							  position: 'top-end',
							  icon: 'success',
							  title: 'Region has been edited',
							  showConfirmButton: false,
							  timer: 1500
							})
						  $("#region_table").html(result);
						  $("#edit_region_form")[0].reset();
					  	  $('#modal_edit').modal('hide');
						}
						else{ 
							Swal.fire({
							  position: 'top-end',
							  icon: 'error',
							  title: 'Something Went Wrong. Please Try Again',
							  showConfirmButton: false,
							  timer: 1500
							})
						}
				   }
				});
             }
         });
     });




}(window.jQuery);