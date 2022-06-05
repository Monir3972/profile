<?php 
	session_start();
	 $uid = $_SESSION["userId"];
	if($_SERVER['REQUEST_METHOD'] == "POST") {
	include('connection.php');
	// Table: employees
    $emp_fname = $_POST['edit_fname'];
    $emp_lname = $_POST['edit_lname'];
	$emp_contact = $_POST['edit_contact'];
	$em_employeecode = $_POST['edit_employeeCode'];
	$em_ipphone = $_POST['edit_ip_phone'];
	$em_department = $_POST['edit_department'];
	$em_jobtitle = $_POST['edit_job_tiltle'];
	$em_company = $_POST['edit_company'];
	$em_designation = $_POST['edit_designation'];
	// Table: emp_personal_info
	$em_homecontact = $_POST['edit_home_contact'];
	$em_experience = $_POST['edit_totlal_experience'];
	$em_email = $_POST['edit_personal_email'];
	$em_personal_contact_01 = $_POST['edit_contact_01'];
	$em_personal_contact_02 = $_POST['edit_contact_02'];
	$em_companyloc = $_POST['edit_company_loc'];
	$em_bank = $_POST['edit_bank'];
	$em_bank_ac = $_POST['edit_bank_account'];
	$em_present_address = $_POST['edit_present_address'];
	$em_permanent_address = $_POST['edit_permanent_address'];
	// Table: emp_emergency_contact
	$em_emer_name = $_POST['edit_emer_name'];
	$em_emer_relation = $_POST['edit_emer_realtion'];
	$em_emer_contact_01 = $_POST['edit_emer_contact_01'];
	$em_emer_contact_02 = $_POST['edit_emer_contact_02'];
	$em_emer_address = $_POST['edit_emer_address'];
	// Table: emp_spouse
	$em_spouse_name = $_POST['edit_spouse_name'];
	$em_spouse_occu = $_POST['edit_spouse_occu'];
	$em_spouse_contact = $_POST['edit_spouse_contact'];
	$em_spouse_father = $_POST['edit_spouse_father'];
	$em_spouse_father_occu = $_POST['edit_spouse_father_occu'];
	$em_spouse_father_contact = $_POST['edit_spouse_father_contact'];
	$em_spouse_mother = $_POST['edit_spouse_mother'];
	$em_spouse_mother_occu = $_POST['edit_spouse_mother_occu'];
	$em_spouse_mother_contact = $_POST['edit_spouse_mother_contact'];

	$sql1 = "UPDATE `employees` SET `first_name`='$emp_fname', `last_name`='$emp_lname', `mobile_no`='$emp_contact', `emp_code`='$em_employeecode', `ip_phone_ext`='$em_ipphone', `dept_id`='$em_department', `job_title`='$em_jobtitle', `org_id`='$em_company',  `wloc_id`='$em_companyloc',`desig_id`='$em_designation' WHERE ID = '$uid'";

	$sql2 =  "UPDATE `emp_personal_info` SET `home_phone`='$em_homecontact', `total_years_of_experience`='$em_experience', `bank_name`='$em_bank', `bank_ac_no`='$em_bank_ac', `present_address`='$em_present_address', `permanent_address`='$em_permanent_address' WHERE emp_id = '$uid'";

	$sql3 =  "UPDATE `emp_emergency_contact` SET `name`='$em_emer_name', `relationship`='$em_emer_relation', `address`='$em_emer_address', `mobile_01`='$em_emer_contact_01', `mobile_02`='$em_emer_contact_02' WHERE emp_id = '$uid'";


	$sql4 =  "UPDATE `emp_spouse` SET `name`='$em_spouse_name', `occupation`='$em_spouse_occu', `mobile`='$em_spouse_contact', `father_name`='$em_spouse_father', `father_occupation`='$em_spouse_father_occu', `father_mobile`='$em_spouse_father_contact', `mother_name`='$em_spouse_mother', `mother_occupation`='$em_spouse_mother_occu', `mother_mobile`='$em_spouse_mother_contact'  WHERE emp_id = '$uid'";

	$stmt = $con->prepare($sql1);
	$sss = $stmt->execute();
	// echo $stmt->rowCOUNT() . " record upadate successfully ";
	if($sss == true){
		$r = 'success';
	}

	$stmt2 = $con->prepare($sql2);
	$stmt2->execute();
	// echo $stmt2->rowCOUNT() . " record upadate successfully ";

	$stmt3 = $con->prepare($sql3);
	$stmt3->execute();
	// echo $stmt3->rowCOUNT() . " record upadate successfully ";

	$stmt4 = $con->prepare($sql4);
	$stmt4->execute();
	// echo $stmt4->rowCOUNT() . " record upadate successfully ";
	echo $r;
}


?>