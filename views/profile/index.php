<?php include('../../controller/sessions.php'); ?>
<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="utf-8" />
      <title>AIR - <?php echo $get_title; ?></title>
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <meta http-equiv="X-UA-Compatible" content="IE=edge" />
      <!-- App favicon -->
      <link rel="shortcut icon" href="../../assets/images/favicon.ico">
      <!-- Plugins css -->
        <!-- sweet alert cdn -->
       <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.6.9/sweetalert2.min.css">
      <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.6.9/sweetalert2.min.js"></script>
      <link href="../../plugins/select2/select2.min.css" rel="stylesheet" type="text/css" />
      <link href="../../plugins/huebee/huebee.min.css" rel="stylesheet" type="text/css" />
      <link href="../../plugins/timepicker/bootstrap-material-datetimepicker.css" rel="stylesheet">
      <link href="../../plugins/bootstrap-touchspin/css/jquery.bootstrap-touchspin.min.css" rel="stylesheet" />
      <!-- App css -->
      <link href="../../assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
      <link href="../../assets/css/icons.min.css" rel="stylesheet" type="text/css" />
      <link href="../../assets/css/metisMenu.min.css" rel="stylesheet" type="text/css" />
      <link href="../../plugins/daterangepicker/daterangepicker.css" rel="stylesheet" type="text/css" />
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
      <link href="../../assets/css/app.min.css" rel="stylesheet" type="text/css" />
      <style type="text/css">
         .nav-pills .nav-item.show .nav-link, .nav-pills .nav-link.active {
           background:none!important;
           color: #000;
           }
           .nav.nav-pills {
           background-color:#fff!important;
           }
           .nav-link {
           color: #000!important; 
           }
           label{
           font-size: .875em!important;
           }
           .form-label {
           margin-bottom: 0px!important; 
           }
           .left-sidenav-menu li>a i {
            display: none!important;
            }
            .form-control-sm {
              margin-bottom:  12px!important;
            }
            .form-select, .form-control{
              border-top: 0px!important;
              border-left: 0px!important;
              border-right: 0px!important;
              border-style: dashed!important;
              color: #333334!important;
              border-radius: 0!important;
          }
          .form-select:focus, .form-control:focus {
           border-color: #ddd!important; 
      }
            }

      </style>
   </head>
   <body>
      <!-- start left-sidenav-->
      <?php include('../../include/left_sidebar.php') ?>
      <!--   end left-sidenav-->
      <div class="page-wrapper">
         <!-- Top Bar Start -->
         <?php include('../../include/top_bar.php'); ?>
         <!-- Top Bar End -->
         <!-- Page Content-->

         <?php
         if (count($_POST) > 0) {
          $result = mysqli_query($con, "SELECT *from employees WHERE userId='" . $_SESSION["userId"] . "'");
          $row = mysqli_fetch_array($result);
          if ($_POST["currentPassword"] == $row["password"]) {
              mysqli_query($conn, "UPDATE employees set secret='" . $_POST["newPassword"] . "' WHERE userId='" . $_SESSION["userId"] . "'");
              $message = "Password Changed";
          } else
              $message = "Current Password is not correct";
      }
          ?>
         <div class="page-content">
            <ul class="nav nav-pills mb-0" id="pills-tab" role="tablist">
               <li class="nav-item" role="presentation">
                  <button class="nav-link" id="pills_home_tab" data-bs-toggle="pill" data-bs-target="#pills_home" type="button" role="tab" aria-controls="pills_home" aria-selected="true"><i class="fa fa-user" aria-hidden="true"></i></button>
               </li>
               <li class="nav-item" role="presentation">
                  <button class="nav-link" id="pills_edit_tab" data-bs-toggle="pill" data-bs-target="#pills_edit" type="button" role="tab" aria-controls="pills_edit" aria-selected="false"><i class="fa-solid fa-pen"></i></button>
               </li>
               <li class="nav-item" role="presentation">
                  <button class="nav-link active" id="pills_reset" data-bs-toggle="pill" data-bs-target="#pills_reset_password" type="button" role="tab" aria-controls="pills_reset_password" aria-selected="false"><i class="fa-solid fa-key"></i></button>
               </li>
            </ul>
            <div class="tab-content" id="pills-tabContent">

              <!-- start fetch employee data   -->

               <div class="tab-pane fade" id="pills_home" role="tabpanel" aria-labelledby="pills_home_tab" tabindex="0">
                  <div class="section" id="">
                     <!--   Profile Summary including photo -->
                     <hr class="m-1">
                     <div class="container-fluid">
                        <div class="row">
                           <div class="col-md-6" id="userSummary"> 
                           </div>
                        </div>
                     </div>
                     <!--   Profile Identity -->
                     <hr class="m-1">
                     <div class="container-fluid mt-2">
                        <div class="row">
                           <h6 class="text-uppercase mb-1">Identity</h6>
                           <div class="col-md-4">
                              <p class="small mb-0">
                                 <span class="fw-bold">Name:</span> 
                                 <r id="first_name"></r>
                                 <r id="last_name"></r>
                              </p>
                              <p class="small mb-0">
                                 <span class="fw-bold">Email:</span>  
                                 <r id="email"></r>
                              </p>
                              <p class="small mb-0">
                                 <span class="fw-bold">Employee Code:</span> 
                                 <r id="emp_code"></r>
                              </p>
                           </div>
                           <div class="col-md-4">
                              <p class="small mb-0">
                                 <span class="fw-bold" >Contact: </span> 
                                 <r id="mobile_no"></r>
                              </p>
                              <p class="small mb-0">
                                 <span class="fw-bold">IP Phone :</span>
                                 <r id="ip_phone_ext"></r>
                              </p>
                           </div>
                        </div>
                     </div>
                     <!--   Job Informations -->
                     <hr class="m-1">
                     <div class="container-fluid mt-2">
                        <div class="row">
                           <h6 class="text-uppercase mb-1">Job info </h6>
                           <div class="col-md-4">
                              <p class="small mb-0">
                                 <span class="fw-bold">Department: </span> 
                                 <r id="department"></r>
                              </p>
                              <p class="small mb-0">
                                 <span class="fw-bold">Job Title:</span> 
                                 <r id="job_title"></r>
                              </p>
                               <p class="small mb-0">
                                 <span class="fw-bold">Designation:</span> 
                                 <r id="designation"></r>
                              </p>
                           </div>
                           <div class="col-md-4">
                              <p class="small mb-0">
                                 <span class="fw-bold">Company:</span> 
                                 <r id="company"></r>
                              </p>
                              <p class="small mb-0">
                                 <span class="fw-bold">Location:</span> 
                                 <r id="work_loc"></r>
                              </p>
                           </div>
                        </div>
                     </div>
                     <!-- Personal Information  -->
                     <hr class="m-1">
                     <div class="container-fluid mt-2">
                        <div class="row">
                           <h6 class="text-uppercase mb-1">Personal Information </h6>
                           <div class="col-md-4">
                              <p class="small mb-0">
                                 <span class="fw-bold">Present Address:</span> 
                                 <r id="present_address"></r>
                              </p>
                              <p class="small mb-0">
                                 <span class="fw-bold">Parmanent Address:</span> 
                                 <r id="parmanent_address"></r>
                              </p>
                              <p class="small mb-0">
                                 <span class="fw-bold">Blood Group:</span> 
                                 <r id="blood_group"></r>
                              </p>
                           </div>
                           <div class="col-md-4">
                              <p class="small mb-0">
                                 <span class="fw-bold">Home Contact:</span> 
                                 <r id="home_contact"></r>
                              </p>
                              <p class="small mb-0">
                                 <span class="fw-bold">Date Of Birth:</span> 
                                 <r id="dob"></r>
                              </p>
                              <p class="small mb-0">
                                 <span class="fw-bold">Marital Status:</span> 
                                 <r id="marital_status"></r>
                              </p>
                              <p class="small mb-0">
                                 <span class="fw-bold">Total Experience:</span> 
                                 <r id="total_Experience"></r>
                              </p>
                              <p class="small mb-0">
                                 <span class="fw-bold">Bank Name:</span> 
                                 <r id="bank_name"></r>
                              </p>
                           </div>
                           <div class="col-md-4">
                              <p class="small mb-0">
                                 <span class="fw-bold">NID:</span> 
                                 <r id="nid"></r>
                              </p>
                              <p class="small mb-0">
                                 <span class="fw-bold">Contact 1:</span> 
                                 <r id="contact_01"></r>
                              </p>
                              <p class="small mb-0">
                                 <span class="fw-bold">Contact 2:</span> 
                                 <r id="contact_02"></r>
                              </p>
                              <p class="small mb-0">
                                 <span class="fw-bold">Personal Email:</span> 
                                 <r id="personal_email"></r>
                              </p>
                              <p class="small mb-0">
                                 <span class="fw-bold">Bank Account:</span> 
                                 <r id="bank_account"></r>
                              </p>
                           </div>
                        </div>
                     </div>
                     <!-- Employee Relatives -->

                     <!--   Emergency Contacts -->
                     <hr class="m-1">
                     <div class="container-fluid mt-2">
                        <div class="row">
                           <h6 class="text-uppercase mb-1">Emergency Contact </h6>
                           <div class="col-md-3">
                              <!-- <p class="small mb-0"><span class="fw-bold">Name: </span> <r id="name"></r>  </p> -->
                              <p class="small mb-0">
                                 <span class="fw-bold">Name:</span> 
                                 <r id="em_name"></r>
                              </p>
                              <p class="small mb-0">
                                 <span class="fw-bold">Relationship:</span> 
                                 <r id="em_relationship"></r>
                              </p>
                              <p class="small mb-0">
                                 <span class="fw-bold">Address:</span> 
                                 <r id="em_address"></r>
                              </p>
                              <p class="small mb-0">
                                 <span class="fw-bold">Contact 1 :</span> 
                                 <r id="em_contact"></r>
                              </p>
                              <p class="small mb-0">
                                 <span class="fw-bold">Contact 2 :</span> 
                                 <r id="em_contact2"></r>
                              </p>
                           </div>
                        </div>
                     </div>
                     <hr class="m-1">
                     <div class="container-fluid mt-2">
                        <h6 class="text-uppercase mb-1">Employee Relatives </h6>
                        <div class="row" id="employeRelative">   
                        </div>
                     </div>
                     <!-- Employee Spouse -->

                     <hr class="m-1">
                     <div class="container-fluid mt-2">
                        <div class="row">
                           <h6 class="text-uppercase mb-1">Employee Spouse </h6>
                           <div class="col-md-4">
                              <p class="small mb-0">
                                 <span class="fw-bold">Name:</span> 
                                 <r id="spouse_name"></r>
                              </p>
                              <p class="small mb-0">
                                 <span class="fw-bold">Occupation:</span> 
                                 <r id="spouse_occu"></r>
                              </p>
                              <p class="small mb-0">
                                 <span class="fw-bold">Contact:</span> 
                                 <r id="spouse_contact"></r>
                              </p>
                              <p class="small mb-0">
                                 <span class="fw-bold">NID:</span> 
                                 <r id="spouse_nid"></r>
                              </p>
                           </div>
                           <div class="col-md-4">
                              <p class="small mb-0">
                                 <span class="fw-bold">Father Name</span> 
                                 <r id="spouse_fater"></r>
                              </p>
                              <p class="small mb-0">
                                 <span class="fw-bold">Father Occupation:</span> 
                                 <r id="spouse_father_occu"></r>
                              </p>
                              <p class="small mb-0">
                                 <span class="fw-bold">Father Contact:</span> 
                                 <r id="spouse_father_contact"></r>
                              </p>
                           </div>
                           <div class="col-md-4">
                              <p class="small mb-0">
                                 <span class="fw-bold">Mother Name:</span> 
                                 <r id="spouse_mother"></r>
                              </p>
                              <p class="small mb-0">
                                 <span class="fw-bold">Mother Contact:</span> 
                                 <r id="spouse_mother_contact"></r>
                              </p>
                              <p class="small mb-0">
                                 <span class="fw-bold">Mother Occupation:</span> 
                                 <r id="spouse_mother_occu"></r>
                              </p>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>

              <!-- end fetch employee data   -->

              <!--  start edit part -->
               <div class="tab-pane fade" id="pills_edit" role="tabpanel" aria-labelledby="pills_edit-tab" tabindex="0">
                  <div class="container-fluid">
                     <div class="row">
                        <div class="col-md-12">
                           <form class="row g-3" id="profileUpdate">
                              <!-- start 1st row -->
                              <div class="col-md-2">
                                 <label for="edit_name" class="form-label small">First Name</label>
                                 <input type="text" class="form-control form-control-sm" name="edit_fname" id="edit_fname">
                              </div>
                               <div class="col-md-2">
                                 <label for="edit_name" class="form-label small">Last Name</label>
                                 <input type="text" class="form-control form-control-sm" name="edit_lname" id="edit_lname">
                              </div>
                              <div class="col-md-2">
                                 <label for="edit_contact" class="form-label">Contact 1</label>
                                 <input type="text" class="form-control form-control-sm" name="edit_contact" id="edit_contact">
                              </div>
                                 <div class="col-md-2">
                                 <label for="edit_contact" class="form-label">Contact 2</label>
                                 <input type="text" class="form-control form-control-sm" name="" id="">
                              </div>
                              <div class="col-2">
                                 <label for="edit_employeeCode" class="form-label">Employee Code</label>
                                 <input type="text" class="form-control form-control-sm" name="edit_employeeCode" id="edit_employeeCode">
                              </div>
                              
                              <div class="col-2">
                                 <label for="edit_ip_phone" class="form-label">Ip Phone</label>
                                 <input type="text" class="form-control form-control-sm" name="edit_ip_phone" id="edit_ip_phone">
                              </div>

                              <!--    end 1st row -->

                                <!--  start 2nd row -->
                              <div class="col-3">
                                 <label for="edit_department" class="form-label">Department</label>
                                 <select class="form-select form-select-sm" id="edit_department" name="edit_department" aria-label=".form-select-sm example">
                                 
                                 </select>
                              </div>
                           
                              <div class="col-3">
                                 <label for="edit_job_tiltle" class="form-label">Job Title</label>
                                 <input type="text" class="form-control form-control-sm" id="edit_job_tiltle" name="edit_job_tiltle">
                              </div>
                              <div class="col-3">
                                 <label for="edit_department" class="form-label">Company</label>
                                 <select class="form-select form-select-sm" id="edit_company" name="edit_company">
                                   
                                 </select>
                              </div>
                                <div class="col-3">
                                 <label for="edit_designation" class="form-label">Designation</label>
                                 <select class="form-select form-select-sm" id="edit_designation" name="edit_designation">
                                   
                                 </select>
                              </div>
                              <!--     end 2nd row -->

                              <!--    start 3rd row -->
                             
                              <div class="col-2">
                                 <label for="edit_home_contact" class="form-label">Home Contact</label>
                                 <input type="text" class="form-control form-control-sm" name="edit_home_contact" id="edit_home_contact">
                              </div>
                              <div class="col-2">
                                 <label for="edit_totlal_experience" class="form-label">Total Experience</label>
                                 <input type="text" class="form-control form-control-sm" name="edit_totlal_experience" id="edit_totlal_experience">
                              </div>
                              <div class="col-3">
                                 <label for="edit_personal_email" class="form-label">Personal Email</label>
                                 <input type="text" class="form-control form-control-sm" name="edit_personal_email" id="edit_personal_email">
                              </div>
                              <div class="col-2">
                                 <label for="edit_contact_01" class="form-label">Contact 1</label>
                                 <input type="text" class="form-control form-control-sm" name="edit_contact_01" id="edit_contact_01">
                              </div>
                              <div class="col-2">
                                 <label for="edit_contact_02" class="form-label">Contact 2</label>
                                 <input type="text" class="form-control form-control-sm" name="edit_contact_02" id="edit_contact_02">
                              </div>
                          

                              <!--  end 3rd row -->
                              <!--  start 4th row -->
                              
                                <div class="col-2">
                                 <label for="edit_department" class="form-label">Company Location</label>
                                 <select class="form-select form-select-sm" id="edit_company_loc" name="edit_company_loc">
                                 
                                 </select>
                              </div>
                                <div class="col-2">
                                 <label for="edit_bank" class="form-label">Bank Name</label>
                                 <input type="text" class="form-control form-control-sm" name="edit_bank" id="edit_bank">
                              </div>
                              <div class="col-2">
                                 <label for="edit_bank_account" class="form-label">Bank Account</label>
                                 <input type="text" class="form-control form-control-sm" name="edit_bank_account" id="edit_bank_account">
                              </div>
                               <div class="col-3">
                                 <label for="edit_present_address" class="form-label">Present Address</label>
                                 <textarea class="form-control form-control-sm" rows="4" name="edit_present_address" id="edit_present_address"></textarea>
                              </div>
                               <div class="col-3">
                                 <label for="edit_permanent_address" class="form-label">Permanent Address</label>
                                 <textarea class="form-control form-control-sm" rows="4" name="edit_permanent_address" id="edit_permanent_address"></textarea>
                              </div>
                              <!--   end 4th row -->

                              <!--   start 5th Update Emergency Contact Information row -->
                              <h5 class="small mb-0 fw-bold">Update Emergency Contact Information</h5>
                              <div class="col-2">
                                 <label for="edit_emer_name" class="form-label">Name</label>
                                 <input type="text" class="form-control form-control-sm" name="edit_emer_name" id="edit_emer_name">
                              </div>
                              <div class="col-2">
                                 <label for="edit_emer_realtion" class="form-label">Relationship</label>
                                 <input type="text" class="form-control form-control-sm" name="edit_emer_realtion" id="edit_emer_realtion">
                              </div>
                              <div class="col-2">
                                 <label for="edit_emer_contact_01" class="form-label">Contact 1</label>
                                 <input type="text" class="form-control form-control-sm" name="edit_emer_contact_01" id="edit_emer_contact_01">
                              </div>
                              <div class="col-2">
                                 <label for="edit_emer_contact_02" class="form-label">Contact 2</label>
                                 <input type="text" class="form-control form-control-sm" name="edit_emer_contact_02" id="edit_emer_contact_02">
                              </div>
                              <div class="col-4">
                                 <label for="edit_emer_address" class="form-label">Address</label>
                                 <textarea class="form-control form-control-sm" rows="4" name="edit_emer_address" id="edit_emer_address"></textarea>
                              </div>
                              <!-- end 5th Update Emergency Contact Information row -->

                             <!--  start 6 th row Update Relative Information -->

                              <h5 class="small mb-0 fw-bold">Update Relative Information</h5>
                              <div class="col-2">
                                 <label for="edit_realtive_name" class="form-label">Name</label>
                                 <input type="text" class="form-control form-control-sm" name="edit_realtive_name" id="edit_realtive_name">
                              </div>
                              <div class="col-2">
                                 <label for="edit_realtive_occu" class="form-label">Occupation</label>
                                 <input type="text" class="form-control form-control-sm" name="edit_realtive_occu" id="edit_realtive_occu">
                              </div>
                              <div class="col-2">
                                 <label for="edit_realtive_relation" class="form-label">Realtion</label>
                                 <input type="text" class="form-control form-control-sm" name="edit_realtive_relation" id="edit_realtive_relation">
                              </div>
                              <div class="col-3">
                                 <label for="edit_realtive_contact_01" class="form-label">Contact 01</label>
                                 <input type="text" class="form-control form-control-sm" name="edit_realtive_contact_01" id="edit_realtive_contact_01">
                              </div>
                              <div class="col-3">
                                 <label for="edit_realtive_contact_02" class="form-label">Contact 02</label>
                                 <input type="text" class="form-control form-control-sm" name="edit_realtive_contact_02" id="edit_realtive_contact_02">
                              </div>

                              <!--  end 6 th row Update Relative Information -->

                              <!-- start 7th row update employee spouse information -->

                              <h5 class="small mb-0 fw-bold">Update Empoyee Spouse Information</h5>
                              <div class="col-2">
                                 <label for="edit_spouse_name" class="form-label">Name</label>
                                 <input type="text" class="form-control form-control-sm" name="edit_spouse_name" id="edit_spouse_name">
                              </div>
                              <div class="col-2">
                                 <label for="edit_spouse_occu" class="form-label">Occupation</label>
                                 <input type="text" class="form-control form-control-sm" name="edit_spouse_occu" id="edit_spouse_occu">
                              </div>
                              <div class="col-2">
                                 <label for="edit_spouse_contact" class="form-label">Contact</label>
                                 <input type="text" class="form-control form-control-sm" name="edit_spouse_contact" id="edit_spouse_contact">
                              </div>
                              <div class="col-2">
                                 <label for="edit_spouse_father" class="form-label">Father</label>
                                 <input type="text" class="form-control form-control-sm" name="edit_spouse_father" id="edit_spouse_father">
                              </div>
                              <div class="col-2">
                                 <label for="edit_spouse_father_occu" class="form-label">Father Occupation</label>
                                 <input type="text" class="form-control form-control-sm" name="edit_spouse_father_occu" id="edit_spouse_father_occu">
                              </div>
                              <div class="col-2">
                                 <label for="edit_spouse_father_contact" class="form-label">Father Contact</label>
                                 <input type="text" class="form-control form-control-sm" name="edit_spouse_father_contact" id="edit_spouse_father_contact">
                              </div>
                              <div class="col-2">
                                 <label for="edit_spouse_mother" class="form-label">Mother</label>
                                 <input type="text" class="form-control form-control-sm" name="edit_spouse_mother" id="edit_spouse_mother">
                              </div>
                              <div class="col-2">
                                 <label for="edit_spouse_mother_occu" class="form-label">Mother Occupation</label>
                                 <input type="text" class="form-control form-control-sm" name="edit_spouse_mother_occu" id="edit_spouse_mother_occu">
                              </div>
                              <div class="col-2">
                                 <label for="edit_spouse_mother_contact" class="form-label">Mother Contact</label>
                                 <input type="text" class="form-control form-control-sm" name="edit_spouse_mother_contact" id="edit_spouse_mother_contact">
                              </div>
                              <!-- end 7th row update employee spouse information -->

                              <div class="col-12">
                                 <button type="submit" class="btn btn-primary btn-sm mb-2">Update</button>
                              </div>
                           </form>
                        </div>
                     </div>
                  </div>
               </div>
             <!--   end edit part -->

              <!-- Start reset password part  -->
               <div class="tab-pane fade show active" id="pills_reset_password" role="tabpanel" aria-labelledby="pills_reset" tabindex="0">
                  <div class="container">
                     <div class="row">
                        <div class="col-md-4 mx-auto">
                          <div class="card rounded-0">
                            <div class="card-body">
                              <form name="frmChange" method="post" action=""  onSubmit="return validatePassword()">
                              <div class="message"><?php if(isset($message)) { echo $message; } ?></div>
                              <div class="form-floating mb-3">
                                <input type="password" class="form-control" name="currentPassword" placeholder="current_password">
                                <span id="currentPassword" class="required"></span>
                                <label for="current_password">Current Password</label>
                              </div>
                                <div class="form-floating mb-3">
                                <input type="password" class="form-control" name="newPassword" placeholder="new_password">
                                <span id="newPassword" class="required"></span>
                                <label for="new_password">New Password</label>
                              </div>
                              <div class="form-floating">
                                <input type="password" class="form-control"  name="confirmPassword" placeholder="confirm_Password">
                                <span id="confirmPassword"></span>
                                <label for="floatingPassword">Confirm Password</label>
                                <button type="submit" class="btn btn-primary btn-sm mt-2 btnSubmit">Submit</button>
                              </div>
                              </form>
                             
                            </div>
                          </div>
                        </div>
                     </div>
                  </div>
               </div>
               <!-- end reset password part -->
            </div>
            <?php include('../../include/footer.php') ?>
         </div>
         <!-- end page content -->
      </div>
      <!-- end page-wrapper -->
      <!-- jQuery  -->
      <script src="../../assets/js/jquery.min.js"></script>
      <script src="../../assets/js/bootstrap.bundle.min.js"></script>
      <script src="../../assets/js/metismenu.min.js"></script>
      <script src="../../assets/js/waves.js"></script>
      <script src="../../assets/js/feather.min.js"></script>
      <script src="../../assets/js/simplebar.min.js"></script>
      <script src="../../assets/js/moment.js"></script>
      <script src="../../plugins/daterangepicker/daterangepicker.js"></script>
      <!-- Plugins js -->
      <script src="../../plugins/select2/select2.min.js"></script>
      <!-- <script src="../../plugins/huebee/huebee.pkgd.min.js"></script> -->
      <!-- <script src="../../plugins/timepicker/bootstrap-material-datetimepicker.js"></script> -->
      <!-- <script src="../../plugins/bootstrap-maxlength/bootstrap-maxlength.min.js"></script> -->
      <!-- <script src="../../plugins/bootstrap-touchspin/js/jquery.bootstrap-touchspin.min.js"></script> -->
      <!-- <script src="../../assets/js/jquery.forms-advanced.js"></script> -->
      <!-- App js -->
      <script src="../../assets/js/app.js"></script>
      <script src="../../assets/js/pagejs/profile.js"></script>
      <script>
         function validatePassword() {
         var currentPassword,newPassword,confirmPassword,output = true;

         currentPassword = document.frmChange.currentPassword;
         newPassword = document.frmChange.newPassword;
         confirmPassword = document.frmChange.confirmPassword;

         if(!currentPassword.value) {
            currentPassword.focus();
            document.getElementById("currentPassword").innerHTML = "required";
            output = false;
         }
         else if(!newPassword.value) {
            newPassword.focus();
            document.getElementById("newPassword").innerHTML = "required";
            output = false;
         }
         else if(!confirmPassword.value) {
            confirmPassword.focus();
            document.getElementById("confirmPassword").innerHTML = "required";
            output = false;
         }
         if(newPassword.value != confirmPassword.value) {
            newPassword.value="";
            confirmPassword.value="";
            newPassword.focus();
            document.getElementById("confirmPassword").innerHTML = "not same";
            output = false;
         }  
         return output;
         }
         </script>
   </body>
</html>