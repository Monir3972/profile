$(document).ready(function() {


	//fetch employee data 

	$.ajax({
		url:"../../apis/api_m/api.php",
		type: 'POST',
		data:{'req': '3','param': '3'},
		dataType:"json",
		success:function(result){
			var emp_info = result[0];
			$('#first_name').html(emp_info['first_name']); 
			$('#last_name').html(emp_info['last_name']); 
			$('#email').html(emp_info['email']); 
			$('#emp_code').html(emp_info['emp_code']); 
			$('#job_title').html(emp_info['job_title']); 
			$('#mobile_no').html(emp_info['mobile_no']); 
			$('#ip_phone_ext').html(emp_info['ip_phone_ext']); 
			$('#company').html(emp_info['company']); 
			$('#department').html(emp_info['department']); 
			$('#designation').html(emp_info['designation']); 
			$('#work_loc').html(emp_info['location']); 
		}
	});
      

      // fetch employe emergency table data

		$.ajax({
		url:"../../apis/api_m/api.php",
		type: 'POST',
		data:{'req': '4','param': '4'},
		dataType:"json",
		success:function(result){
			var emp_emer_info = result[0];
			$('#em_name').html(emp_emer_info['name']); 
			$('#em_relationship').html(emp_emer_info['relationship']); 
			$('#em_address').html(emp_emer_info['address']); 
			$('#em_contact').html(emp_emer_info['mobile_01']); 
			$('#em_contact2').html(emp_emer_info['mobile_02']); 
			 
		}
	});


		 // fetch employe personal table data
      
		$.ajax({
		url:"../../apis/api_m/api.php",
		type: 'POST',
		data:{'req': '5','param': '5'},
		dataType:"json",
		success:function(result){
			var emp_personal_info = result[0];
			$('#present_address').html(emp_personal_info['present_address']); 
			$('#parmanent_address').html(emp_personal_info['permanent_address']); 
			$('#blood_group').html(emp_personal_info['blood_gp']); 
			$('#home_contact').html(emp_personal_info['home_phone']); 
			$('#dob').html(emp_personal_info['dob']); 
			$('#marital_status').html(emp_personal_info['marital_status']); 
			$('#total_Experience').html(emp_personal_info['total_years_of_experience']); 
			$('#bank_name').html(emp_personal_info['bank_name']); 
			$('#nid').html(emp_personal_info['nid']); 
			$('#contact_01').html(emp_personal_info['mobile_no_01']); 
			$('#contact_02').html(emp_personal_info['mobile_no_02']); 
			$('#personal_email').html(emp_personal_info['personal_email']); 
			$('#bank_account').html(emp_personal_info['bank_ac_no']); 
			$('#photo').html(emp_personal_info['photograph']); 
			$('#emp_id').html(emp_personal_info['emp_id']); 
			
			 
		}
	});

		 // fetch employe retative table data
		$.ajax({
		url:"../../apis/api_m/api.php",
		type: 'POST',
		data:{'req': '6','param': '6'},
		dataType:"json",
		success:function(result){
			$('#employeRelative').html(result);
		}
	}); 

		 // fetch employe spouse table data

		$.ajax({
		url:"../../apis/api_m/api.php",
		type: 'POST',
		data:{'req': '7','param': '7'},
		dataType:"json",
		success:function(result){
			var emp_spouse_info = result[0];
			$('#spouse_name').html(emp_spouse_info['name']); 
			$('#spouse_occu').html(emp_spouse_info['occupation']); 
			$('#spouse_contact').html(emp_spouse_info['mobile']); 
			$('#spouse_nid').html(emp_spouse_info['nid']); 
			$('#spouse_fater').html(emp_spouse_info['father_name']); 
			$('#spouse_father_occu').html(emp_spouse_info['father_occupation']); 
			$('#spouse_father_contact').html(emp_spouse_info['father_mobile']); 
			$('#spouse_mother').html(emp_spouse_info['mother_name']); 
			$('#spouse_mother_contact').html(emp_spouse_info['mother_mobile']); 
			$('#spouse_mother_occu').html(emp_spouse_info['mother_occupation']); 
			 
		}
	});

	 // fetch employe table data
		$.ajax({
		url:"../../apis/api_m/api.php",
		type: 'POST',
		data:{'req': '1','param': '8'},
		dataType:"json",
		success:function(result){
			$('#userSummary').html(result);
		}
	}); 

		// fetch employee data for edit

		$.ajax({
		url:"../../apis/api_m/api.php",
		type: 'POST',
		data:{'req': '3','param': '3'},
		dataType:"json",
		success:function(result){
			var emp_info = result[0];
			$('#edit_fname').val(emp_info['first_name']); 
			$('#edit_lname').val(emp_info['last_name']); 
			$('#edit_contact').val(emp_info['mobile_no']); 
			$('#edit_employeeCode').val(emp_info['emp_code']); 
			$('#edit_ip_phone').val(emp_info['ip_phone_ext']); 
			$('#edit_job_tiltle').val(emp_info['job_title']); 
			$('#edit_company').val(emp_info['location']);

			var dept_id = emp_info['dept_id'];
			//fetching department depending on value

			$.ajax({
			   url:"../../apis/api_m/api.php", //the page containing php script
			   type: "post", //request type,
			   data: {'req': '8', 'param':'13', 'match': dept_id, 'get': 'name'},
			   dataType:"json",
			   success:function(result)
			   { 
				  $("#edit_department").html(result);
			   }
			}); 

			var company_id = emp_info['org_id'];

				$.ajax({
			   url:"../../apis/api_m/api.php", //the page containing php script
			   type: "post", //request type,
			   data: {'req': '9', 'param':'10', 'match': company_id},
			   dataType:"json",
			   success:function(result)
			   { 
				  $("#edit_company").html(result);
			   }
			}); 

		   var edit_company_loc = emp_info['wloc_id'];
		  	$.ajax({
			   url:"../../apis/api_m/api.php", //the page containing php script
			   type: "post", //request type,
			   data: {'req': '10', 'param':'11', 'match': edit_company_loc},
			   dataType:"json",
			   success:function(result)
			   { 
				  $("#edit_company_loc").html(result);
			   }
			}); 

         var edit_designation = emp_info['desig_id'];

         	$.ajax({
			   url:"../../apis/api_m/api.php", //the page containing php script
			   type: "post", //request type,
			   data: {'req': '11', 'param':'12', 'match': edit_designation},
			   dataType:"json",
			   success:function(result)
			   { 
				  $("#edit_designation").html(result);
			   }
			}); 

			

		}
	});

       // fetch emp_personal_info data for edit

		$.ajax({
		url:"../../apis/api_m/api.php",
		type: 'POST',
		data:{'req': '5','param': '5'},
		dataType:"json",
		success:function(result){
			var emp_info = result[0];
			$('#edit_present_address').val(emp_info['present_address']); 
			$('#edit_permanent_address').val(emp_info['permanent_address']); 
			$('#edit_home_contact').val(emp_info['home_phone']); 
			$('#edit_totlal_experience').val(emp_info['total_years_of_experience']); 
			$('#edit_bank').val(emp_info['bank_name']); 
			$('#edit_contact_01').val(emp_info['mobile_no_01']); 
			$('#edit_contact_02').val(emp_info['mobile_no_02']); 
			$('#edit_personal_email').val(emp_info['personal_email']); 
			$('#edit_bank_account').val(emp_info['bank_ac_no']); 
		}
	});

	  // fetch emp emergency contact info data for edit

		$.ajax({
		url:"../../apis/api_m/api.php",
		type: 'POST',
		data:{'req': '4','param': '4'},
		dataType:"json",
		success:function(result){
			var emp_info = result[0];
			$('#edit_emer_name').val(emp_info['name']); 
			$('#edit_emer_realtion').val(emp_info['relationship']); 
			$('#edit_emer_address').val(emp_info['address']); 
			$('#edit_emer_contact_01').val(emp_info['mobile_01']); 
			$('#edit_emer_contact_02').val(emp_info['mobile_02']); 
		}
	});

		 // fetch emp relative info data for edit

		$.ajax({
		url:"../../apis/api_m/api.php",
		type: 'POST',
		data:{'req': '6','param': '6'},
		dataType:"json",
		success:function(result){
			var emp_info = result[0];
			$('#edit_realtive_name').val(emp_info['full_name']); 
			$('#edit_realtive_occu').val(emp_info['occupation']); 
			$('#edit_realtive_relation').val(emp_info['relation']); 
			$('#edit_realtive_contact_01').val(emp_info['mobile_01']); 
			$('#edit_realtive_contact_02').val(emp_info['mobile_02']); 
		}
	});

	// fetch employee spouse info data for edit

	$.ajax({
		url:"../../apis/api_m/api.php",
		type: 'POST',
		data:{'req': '7','param': '7'},
		dataType:"json",
		success:function(result){
			var emp_info = result[0];
			$('#edit_spouse_name').val(emp_info['name']); 
			$('#edit_spouse_occu').val(emp_info['occupation']); 
			$('#edit_spouse_contact').val(emp_info['mobile']); 
			$('#edit_spouse_father').val(emp_info['spouse_fater']); 
			$('#edit_spouse_father_occu').val(emp_info['father_occupation']); 
			$('#edit_spouse_father_contact').val(emp_info['father_mobile']); 
			$('#edit_spouse_mother').val(emp_info['mother_name']); 
			$('#edit_spouse_mother_occu').val(emp_info['mother_occupation']); 
			$('#edit_spouse_mother_contact').val(emp_info['edit_spouse_mother_contact']); 
		}
	});

   // profile data update process 

 $('#profileUpdate').submit(function(event)

       {
         event.preventDefault();
         $.ajax({
            data: $('form').serialize(),
            url:"../../controller/profile_update.php",
            type:'POST',
            success:function(result_1){

           
            	if (result_1 =='success'){
            		// employess data
            		$.ajax({
						url:"../../apis/api_m/api.php",
						type: 'POST',
						data:{'req': '3','param': '3'},
						dataType:"json",
						success:function(result){
							var emp_info = result[0];
							$('#first_name').html(emp_info['first_name']); 
							$('#last_name').html(emp_info['last_name']); 
							$('#email').html(emp_info['email']); 
							$('#emp_code').html(emp_info['emp_code']); 
							$('#job_title').html(emp_info['job_title']); 
							$('#mobile_no').html(emp_info['mobile_no']); 
							$('#ip_phone_ext').html(emp_info['ip_phone_ext']); 
							$('#company').html(emp_info['company']); 
							$('#department').html(emp_info['department']); 
							$('#designation').html(emp_info['designation']); 
							$('#work_loc').html(emp_info['location']); 
						}
					});

            		// emp_personal_info data

						$.ajax({
								url:"../../apis/api_m/api.php",
								type: 'POST',
								data:{'req': '5','param': '5'},
								dataType:"json",
								success:function(result_3){
									var emp_personal_info = result_3[0];
									$('#present_address').html(emp_personal_info['present_address']); 
									$('#parmanent_address').html(emp_personal_info['permanent_address']); 
									$('#blood_group').html(emp_personal_info['blood_gp']); 
									$('#home_contact').html(emp_personal_info['home_phone']); 
									$('#dob').html(emp_personal_info['dob']); 
									$('#marital_status').html(emp_personal_info['marital_status']); 
									$('#total_Experience').html(emp_personal_info['total_years_of_experience']); 
									$('#bank_name').html(emp_personal_info['bank_name']); 
									$('#nid').html(emp_personal_info['nid']); 
									$('#contact_01').html(emp_personal_info['mobile_no_01']); 
									$('#contact_02').html(emp_personal_info['mobile_no_02']); 
									$('#personal_email').html(emp_personal_info['personal_email']); 
									$('#bank_account').html(emp_personal_info['bank_ac_no']); 
									$('#photo').html(emp_personal_info['photograph']); 
									$('#emp_id').html(emp_personal_info['emp_id']); 
									
									 
								}
							});

							// emp_emergency_contact data

							$.ajax({
								url:"../../apis/api_m/api.php",
								type: 'POST',
								data:{'req': '4','param': '4'},
								dataType:"json",
								success:function(result_4){
									var emp_emer_info = result_4[0];
									$('#em_name').html(emp_emer_info['name']); 
									$('#em_relationship').html(emp_emer_info['relationship']); 
									$('#em_address').html(emp_emer_info['address']); 
									$('#em_contact').html(emp_emer_info['mobile_01']); 
									$('#em_contact2').html(emp_emer_info['mobile_02']); 
									 
								}
							});

							// emp_spouse data

							$.ajax({
								url:"../../apis/api_m/api.php",
								type: 'POST',
								data:{'req': '7','param': '7'},
								dataType:"json",
								success:function(result_5){
									var emp_spouse_info = result_5[0];
									$('#spouse_name').html(emp_spouse_info['name']); 
									$('#spouse_occu').html(emp_spouse_info['occupation']); 
									$('#spouse_contact').html(emp_spouse_info['mobile']); 
									$('#spouse_nid').html(emp_spouse_info['nid']); 
									$('#spouse_fater').html(emp_spouse_info['father_name']); 
									$('#spouse_father_occu').html(emp_spouse_info['father_occupation']); 
									$('#spouse_father_contact').html(emp_spouse_info['father_mobile']); 
									$('#spouse_mother').html(emp_spouse_info['mother_name']); 
									$('#spouse_mother_contact').html(emp_spouse_info['mother_mobile']); 
									$('#spouse_mother_occu').html(emp_spouse_info['mother_occupation']); 
									 
								}
							});		

						Swal.fire({
						  position: 'top-end',
						  icon: 'success',
						  title: 'Your work has been saved',
						  showConfirmButton: false,
						  timer: 1500
						})	
			        
            	}  
            }
         });
       });
});
