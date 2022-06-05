<?php
include ('../../controller/connection.php');

$return_data = array();

session_start();
$uid = $_SESSION["userId"];
$dept_id = $_SESSION["dept_id"];
$wloc_id = $_SESSION["wloc_id"];
session_write_close();
$return_data = array();

$req = isset($_POST['req']) ? $_POST['req'] : 0;
$param = isset($_POST['param']) ? $_POST['param'] : 0;
$data = isset($_POST['data']) ? $_POST['data'] : 0;
$field_list = isset($_POST['get']) ? $_POST['get'] : '*';
$filter = isset($_POST['filter']) ? $_POST['filter'] : '';
$multi_select = isset($_POST['msel']) ? $_POST['msel'] : 0;
$match_id = isset($_POST['match']) ? $_POST['match'] : 0;

switch ($req)
{
        // for employee list
        
    case '1':
        $table = 'emp_list';
    break;

        // for organization name
        
    case '2':
        $table = 'organizations';
    break;

        // for employees infos
        
    case '3':
        $table = 'employees';
    break;

        // for employee emergency table
        
    case '4':
        $table = 'emp_emergency_contact';
    break;

        // for employee personal infos table
        
    case '5':
        $table = 'emp_personal_info';
    break;

        // for employee relative infos table
        
    case '6':
        $table = 'emp_relatives';
    break;

        // for employee spouse infos table
        
    case '7':
        $table = 'emp_spouse';
    break;

        // for departments infos table
        
    case '8':
        $table = 'departments';
    break;

        // for organization infos table
        
    case '9':
        $table = 'organizations';
    break;

        // for location infos table
        
    case '10':
        $table = 'locations';
    break;

        // for designation infos table
        
    case '11':
        $table = 'designations';
    break;

    default:
        $table = '';

}

// parameter
// ------------------------------------------------------------------
switch ($param)
{

        // for contacts list
        
    case '1':
        $sql = 'SELECT * FROM ' . $table . ' WHERE is_active = 1 ORDER BY id DESC';
        $return_data = getHTML_contact_list_Table($sql, true);
    break;

        // for organization list
        
    case '2':
        $sql = 'SELECT * FROM ' . $table . ' WHERE is_active = 1';
        $return_data = getHTML_organization_list_Table($sql, true);
    break;

        // for employees infos
        
    case '3':
        $sql = 'SELECT *,(SELECT name from organizations WHERE id=`org_id`) as company, (SELECT name from departments WHERE id = `dept_id`) AS department , (SELECT name from locations WHERE id = `wloc_id`) AS location , (SELECT name from designations WHERE id = `desig_id`) AS designation FROM employees WHERE id = "' . $uid . '"';
        $return_data = getHTML_profile_employees($sql, true);
    break;

        // for employee emergency table
        
    case '4':
        $sql = 'SELECT * FROM ' . $table . ' WHERE emp_id = ' . $uid;
        $return_data = getHTML_profile_emer_employees($sql, true);
    break;

        // for employee personal infos table
        
    case '5':
        $sql = 'SELECT * FROM ' . $table . ' WHERE emp_id = ' . $uid;
        $return_data = getHTML_profile_personal_employees($sql, true);
    break;

        // for employee relative infos table
        
    case '6':
        $sql = 'SELECT * FROM ' . $table . ' WHERE emp_id = ' . $uid;
        $return_data = getHTML_profile_relative_employees($sql, true);
    break;

        // for employee spouse infos table
        
    case '7':
        $sql = 'SELECT * FROM ' . $table . ' WHERE emp_id = ' . $uid;
        $return_data = getHTML_profile_spouse_employees($sql, true);
    break;

        // for profile list
        
    case '8':
        $sql = 'SELECT * FROM ' . $table . ' WHERE id = ' . $uid;
        $return_data = getHTML_profile_list_employees($sql, true);
    break;

        // for profile list
        
    case '9':
        $sql = 'SELECT * FROM ' . $table;
        // $sql .= ($filter!='')? ' AND '.$filter : '' ;
        $return_data = getSelectHTMLDept($sql, $match_id, '', $multi_select, true);
    break;

      // for location list

    case '10':
        $sql = 'SELECT * FROM ' . $table;
        // $sql .= ($filter!='')? ' AND '.$filter : '' ;
        $return_data = getSelectHTMLDept($sql, $match_id, '', $multi_select, true);
    break;

     // for designation list

    case '11':
        $sql = 'SELECT * FROM ' . $table;
        // $sql .= ($filter!='')? ' AND '.$filter : '' ;
        $return_data = getSelectHTMLDept($sql, $match_id, '', $multi_select, true);
    break;


  
    case '12':
        $sql = 'SELECT * FROM ' . $table;
        // $sql .= ($filter!='')? ' AND '.$filter : '' ;
        $return_data = getSelectHTMLDept($sql, $match_id, '', $multi_select, true);
    break;

    case '13': //department list
        $multi_level_select = '<option value="0">-- Select Department --</option>';
            if($filter != '')
                getSelectMultilevel(0,'',$table,'sub_of','id','id',$field_list,true,0,true,$filter,$match_id,);
            else
                getSelectMultilevel(0,'',$table,'sub_of','id','id',$field_list,true,$match_id);
            $return_data = $multi_level_select;
    break;

}
echo json_encode($return_data);

//Start function for get contact list

function getHTML_contact_list_Table($sql)
{
    global $con;
    try
    {
        $bHTML = '';
        $stmt = $con->prepare($sql, array(
            PDO::ATTR_CURSOR => PDO::CURSOR_SCROLL
        ));
        $stmt->execute();
        $c = 1;
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC, PDO::FETCH_ORI_NEXT))
        {
            $bHTML .= '
        <tr>
          <td scope="row"><p>  ' . $c . ' </p></td>
          <td><img class="rounded-circle" src="../../controller/' . $row['photo'] . '" height="20"></td>
          <td><p>' . $row['name'] . '</p></td>
          <td><p>' . $row['dept'] . '</p></td>
          <td><p>' . $row['desig'] . '</p></td>
          <td><p>' . $row['org'] . '</p></td>
          <td><p>' . $row['email'] . '</p></td>
          <td><p>' . $row['ip_phone_ext'] . '</p></td>
          <td><p>' . $row['mobile_no'] . '</p></td>
        </tr>
      ';
            $c++;
        }
    }
    catch(PDOException $e)
    {
        $bHTML = $e->getMessage();
    }
    return $bHTML;
}

//End function for get contact list


// Start function for get organizations name
function getHTML_organization_list_Table($sql)
{
    global $con;
    try
    {
        $bHTML = ' <option value="-1">All</option>';

        $stmt = $con->prepare($sql, array(
            PDO::ATTR_CURSOR => PDO::CURSOR_SCROLL
        ));
        $stmt->execute();
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC, PDO::FETCH_ORI_NEXT))
        {
            $bHTML .= '
           
           <option value="' . $row['id'] . '">' . $row['name'] . '</option>
      ';

        }
    }
    catch(PDOException $e)
    {
        $bHTML = $e->getMessage();
    }
    return $bHTML;
}

// End  function for get organizations name


// start function for get profile data
function getHTML_profile_employees($sql)
{
    global $con;
    global $uid;
    try
    {
        $bHTML = '';
        $b1HTML = $sql;
        $stmt = $con->prepare($sql, array(
            PDO::ATTR_CURSOR => PDO::CURSOR_SCROLL
        ));
        $stmt->execute();

        $row = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $bHTML = $row;
    }
    catch(PDOException $e)
    {
        $bHTML = $e->getMessage();
    }
    return $bHTML;
}

// for employee emergency table
function getHTML_profile_emer_employees($sql)
{
    global $con;
    try
    {
        $bHTML = '';
        $stmt = $con->prepare($sql, array(
            PDO::ATTR_CURSOR => PDO::CURSOR_SCROLL
        ));
        $stmt->execute();

        $row = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $bHTML = $row;
    }
    catch(PDOException $e)
    {
        $bHTML = $e->getMessage();
    }
    return $row;
}
// end employee emergency table


// for employee personal table
function getHTML_profile_personal_employees($sql)
{
    global $con;
    try
    {
        $bHTML = '';
        $stmt = $con->prepare($sql, array(
            PDO::ATTR_CURSOR => PDO::CURSOR_SCROLL
        ));
        $stmt->execute();

        $row = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $bHTML = $row;
    }
    catch(PDOException $e)
    {
        $bHTML = $e->getMessage();
    }
    return $row;
}
// end employee personal table


// function getHTML_profile_relative_employees($sql){
//  global $con;
//  try{
//    $bHTML = '';
//    $stmt = $con->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_SCROLL));
//    $stmt->execute();
//    $row = $stmt->fetchAll(PDO::FETCH_ASSOC);
//    $bHTML = $row;
//  }
//  catch (PDOException $e){
//    $bHTML = $e->getMessage();
//  }
//  return $row;
// }
// for employee relative table
function getHTML_profile_relative_employees($sql)
{
    global $con;
    try
    {
        $bHTML = '';
        $stmt = $con->prepare($sql, array(
            PDO::ATTR_CURSOR => PDO::CURSOR_SCROLL
        ));
        $stmt->execute();

        while ($row = $stmt->fetch(PDO::FETCH_ASSOC, PDO::FETCH_ORI_NEXT))
        {
            $bHTML .= '
          
                               <div class="col-md-3">
                                 <p class="small mb-0"><span class="fw-bold">Name:</span> ' . $row['full_name'] . ' </p>
                                 <p class="small mb-0"><span class="fw-bold">Occupation:</span> ' . $row['occupation'] . ' </p>
                                  <p class="small mb-0"><span class="fw-bold">Realtion:</span> ' . $row['relation'] . '  </p>
                                     <p class="small mb-0"><span class="fw-bold">Contact 1:</span> ' . $row['mobile_01'] . ' </p>
                                   <p class="small mb-0"><span class="fw-bold">Contact 2:</span> ' . $row['mobile_02'] . ' </p>
                               </div>
                              
      ';

        }
    }
    catch(PDOException $e)
    {
        $bHTML = $e->getMessage();
    }
    return $bHTML;
}

// end employee relative table


// for employee spouse table
function getHTML_profile_spouse_employees($sql)
{
    global $con;
    try
    {
        $bHTML = '';
        $stmt = $con->prepare($sql, array(
            PDO::ATTR_CURSOR => PDO::CURSOR_SCROLL
        ));
        $stmt->execute();

        $row = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $bHTML = $row;
    }
    catch(PDOException $e)
    {
        $bHTML = $e->getMessage();
    }
    return $row;
}
// end employee spouse table


//Start function for get employee_list
function getHTML_profile_list_employees($sql)
{
    global $con;
    try
    {
        $bHTML = '';
        $stmt = $con->prepare($sql, array(
            PDO::ATTR_CURSOR => PDO::CURSOR_SCROLL
        ));
        $stmt->execute();

        while ($row = $stmt->fetch(PDO::FETCH_ASSOC, PDO::FETCH_ORI_NEXT))
        {
            $bHTML .= '
            
                  <img class="rounded-circle" src="../../controller/' . $row['photo'] . '" height="70">
                             
                          

      ';

        }
    }
    catch(PDOException $e)
    {
        $bHTML = $e->getMessage();
    }
    return $bHTML;
}

function getSelectHTMLDept($sql, $matchID, $field_name, $multisel = false, $optOnly = false)
{
    global $con, $filter;
    try
    {
        $multi = ($multisel) ? 'multiple="multiple"' : '';
        $field_name = ($multisel) ? $field_name . '[]' : $field_name;
        $rHTML = '<select class="chosen-select sel2 width-100" ' . $multi . ' id="' . $field_name . '" name="' . $field_name . '">';
        $rHTML = ($optOnly) ? '' : $rHTML;
        $rHTML .= ($multisel) ? '<option value="-1">ALL</option>' : '<option value="0" selected>-- Select --</option>';

        $stmt = $con->prepare($sql, array(
            PDO::ATTR_CURSOR => PDO::CURSOR_SCROLL
        ));
        $stmt->execute();
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC, PDO::FETCH_ORI_NEXT))
        {
            if ($row['id'] == $matchID) $rHTML = $rHTML . '<option value="' . $row['id'] . '" selected>' . $row['name'] . '</option>';
            else $rHTML = $rHTML . '<option value="' . $row['id'] . '">' . $row['name'] . '</option>';
        }
        $rHTML = ($optOnly) ? $rHTML : $rHTML . '</select>';
    }
    catch(PDOException $e)
    {
        $rHTML = $e->getMessage();
    }

    return $rHTML;
}


function getSelectMultilevel($id = 0, $mrk = '', $tableName, $foreign_key_name, $orderby_name, $pkey_name, $req_name, $sel = FALSE, $matchID = 0, $custom = FALSE, $custom_str = '')
    {
        global $con, $multi_level_select, $user_id;
        $sql = ($custom)? 'SELECT * FROM '.$tableName.' WHERE '.$foreign_key_name.' = '.$id.' AND '.$custom_str.' ORDER BY '.$orderby_name.' ASC' : 'SELECT * FROM '.$tableName.' WHERE '.$foreign_key_name.' = '.$id.' ORDER BY '.$orderby_name.' ASC';
            $stmt = $con->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_SCROLL));
            $stmt->execute();
            //$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
            while($row = $stmt->fetch(PDO::FETCH_ASSOC, PDO::FETCH_ORI_NEXT))
            {
                if($sel)
                    if($row[$pkey_name] == $matchID)
                        $multi_level_select .= '<option value="'.$row[$pkey_name].'" selected>'.$mrk.$row[$req_name].'</option>';
                    else
                        $multi_level_select .= '<option value="'.$row[$pkey_name].'">'.$mrk.$row[$req_name].'</option>';
                else
                    $multi_level_select .= $mrk.$row[$pkey_name].'-'.$row[$req_name];
                
                if($custom)
                    getSelectMultilevel($row[$pkey_name],'---',$tableName,$foreign_key_name, $orderby_name, $pkey_name, $req_name,$sel,$matchID, TRUE,$custom_str);
                else
                    getSelectMultilevel($row[$pkey_name],'---',$tableName,$foreign_key_name, $orderby_name, $pkey_name, $req_name,$sel,$matchID);
            }

            // echo $matchID;
    }

?>
