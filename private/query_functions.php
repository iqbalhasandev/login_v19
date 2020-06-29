<?php


function count_number_rows($result)
{
  $subject = mysqli_num_rows($result);
  return $subject;
}
/*========================================================================================================================================
  ================================================================  batch =============================================================
==========================================================================================================================================*/
function find_all_batches()
{
  global $db;
  $sql = "SELECT * FROM `batches`";
  $result = mysqli_query($db, $sql);
  confirm_result_set($result);
  return $result;
}
function find_all_batches_DESC()
{
  global $db;
  $sql = "SELECT * FROM `batches` ORDER BY `Si No` DESC";
  $result = mysqli_query($db, $sql);
  confirm_result_set($result);
  return $result;
}

function find_batches_by_name($name, $value)
{
  global $db;

  $sql = "SELECT * FROM `batches` ";
  $sql .= "WHERE `$name`='" . db_escape($db, $value) . "'";
  // echo $sql;
  $result = mysqli_query($db, $sql);
  confirm_result_set($result);
  return $result;
}
function find_batches_by_id($id)
{
  global $db;

  $sql = "SELECT * FROM `batches` ";
  $sql .= "WHERE `id`='" . db_escape($db, $id) . "'";
  // echo $sql;
  $result = mysqli_query($db, $sql);
  confirm_result_set($result);
  return $result;
}
function Insert_batches($batch)
{
  global $db;

  $sql = "INSERT INTO `batches`(`Si No`,`Name`, `Time`) ";
  $sql .= "VALUES (";
  $sql .= "'" . db_escape($db, $batch['no']) . "',";
  $sql .= "'" . db_escape($db, $batch['name']) . "',";
  $sql .= "'" . db_escape($db, $batch['time']) . "',";
  $sql .= ")";
  // echo $sql;
  $result = mysqli_query($db, $sql);
  confirm_result_set($result);
  return $result;
}

function update_batches_by_name($batch)
{
  global $db;
  $sql = "UPDATE batches SET `Name`='{$batch['name']}',`Time`='{$batch['time']} 'WHERE `id`={$batch['id']}";
  // echo $sql;
  $result = mysqli_query($db, $sql);
  confirm_result_set($result);
  return $result;
}
function delete_batch($id)
{
  global $db;

  $sql = "DELETE FROM `batches` ";
  $sql .= "WHERE id='" . db_escape($db, $id) . "' ";
  $sql .= "LIMIT 1";
  $result = mysqli_query($db, $sql);

  // For DELETE statements, $result is true/false
  if ($result) {
    return true;
  } else {
    // DELETE failed
    // echo mysqli_error($db);
    // db_disconnect($db);
    // exit;
    redirect_to('500.php');
  }
}

/*========================================================================================================================================
  ================================================================  pattern =============================================================
==========================================================================================================================================*/

function find_all_pattern()
{
  global $db;
  $sql = "SELECT * FROM `student_pattern`";
  $result = mysqli_query($db, $sql);
  confirm_result_set($result);
  return $result;
}

function find_all_pattern_DESC()
{
  global $db;
  $sql = "SELECT * FROM `student_pattern` ORDER BY `Student Id Pattern` DESC";
  $result = mysqli_query($db, $sql);
  confirm_result_set($result);
  return $result;
}

function find_pattern_by_id($id)
{
  global $db;

  $sql = "SELECT * FROM `student_pattern` ";
  $sql .= "WHERE `id`='" . db_escape($db, $id) . "'";
  // echo $sql;
  $result = mysqli_query($db, $sql);
  confirm_result_set($result);
  return $result;
}
function Insert_pattern($pattern)
{
  global $db;

  $sql = "INSERT INTO `student_pattern`(`Student Id Pattern`) ";
  $sql .= "VALUES (";
  $sql .= "'" . db_escape($db, $pattern['pattern']) . "'";
  $sql .= ")";
  // echo $sql;
  $result = mysqli_query($db, $sql);
  confirm_result_set($result);
  return $result;
}

function update_pattern($pattern)
{
  global $db;

  // $hashed_password = password_hash($user['password'], PASSWORD_BCRYPT);

  $sql = "UPDATE student_pattern SET ";
  $sql .= "`Student Id Pattern`='" . db_escape($db, $pattern['pattern']) . "' ";
  $sql .= "WHERE id='" . db_escape($db, $pattern['id']) . "' ";
  $sql .= "LIMIT 1";
  $result = mysqli_query($db, $sql);

  // For UPDATE statements, $result is true/false
  if ($result) {
    return true;
  } else {
    // UPDATE failed
    // echo mysqli_error($db);
    // db_disconnect($db);
    // exit;
    redirect_to('500.php');
  }
}
function delete_pattern($id)
{
  global $db;

  $sql = "DELETE FROM `student_pattern` ";
  $sql .= "WHERE id='" . db_escape($db, $id) . "' ";
  $sql .= "LIMIT 1";
  $result = mysqli_query($db, $sql);

  // For DELETE statements, $result is true/false
  if ($result) {
    return true;
  } else {
    // DELETE failed
    // echo mysqli_error($db);
    // db_disconnect($db);
    // exit;
    redirect_to('500.php');
  }
}
/*========================================================================================================================================
  ================================================================  student =============================================================
==========================================================================================================================================*/

function find_all_student()
{
  global $db;
  $sql = "SELECT * FROM   students  ";
  // $sql .= "ORDER BY position ASC";
  // echo $sql;
  $result = mysqli_query($db, $sql);
  confirm_result_set($result);
  return $result;
}


function find_all_student_DESC()
{
  global $db;
  $sql = "SELECT * FROM   students ORDER BY `id` DESC";
  $result = mysqli_query($db, $sql);
  confirm_result_set($result);
  return $result;
}


function find_student_by_sub($sub, $value)
{
  global $db;

  $sql = "SELECT * FROM students ";
  $sql .= "WHERE `$sub`='" . db_escape($db, $value) . "'";
  // echo $sql;
  $result = mysqli_query($db, $sql);
  confirm_result_set($result);

  $subject = mysqli_num_rows($result);
  mysqli_free_result($result);
  return $subject;
}

function find_student_by_phone($phone)
{
  global $db;
  $sql = "SELECT * FROM students ";
  $sql .= "WHERE `Contact Number`='" . db_escape($db, $phone) . "'";
  $result = mysqli_query($db, $sql);
  $subject = mysqli_fetch_assoc($result);
  mysqli_free_result($result);
  return $subject; // returns an assoc. array
}

function find_student_by_id($id)
{
  global $db;

  $sql = "SELECT * FROM students ";
  $sql .= "WHERE id='" . db_escape($db, $id) . "'";
  // echo $sql;
  $result = mysqli_query($db, $sql);
  confirm_result_set($result);
  $subject = mysqli_fetch_assoc($result);
  mysqli_free_result($result);
  return $subject; // returns an assoc. array
}


function find_student_by_status($status)
{
  global $db;

  $sql = "SELECT * FROM students ";
  $sql .= "WHERE Status='" . db_escape($db, $status) . "'";
  // echo $sql;
  $result = mysqli_query($db, $sql);
  confirm_result_set($result);
  // $subject = mysqli_fetch_assoc($result);
  // mysqli_free_result($result);
  return   $result; // returns an assoc. array
}



function find_student_by_student_id($student_id)
{
  global $db;

  $sql = "SELECT * FROM students ";
  $sql .= "WHERE `Student ID`='" . db_escape($db, $student_id) . "'";
  // echo $sql;
  $result = mysqli_query($db, $sql);
  confirm_result_set($result);
  $subject = mysqli_fetch_assoc($result);
  mysqli_free_result($result);
  return $subject; // returns an assoc. array
}


function find_student_by_interest_in($interest_in)
{
  global $db;

  $sql = "SELECT * FROM students ";
  $sql .= "WHERE `Interest In`='" . db_escape($db, $interest_in) . "'";
  // echo $sql;
  $result = mysqli_query($db, $sql);
  confirm_result_set($result);
  return $result; // returns an assoc. array
}

function find_student_by_training_category($training_category)
{
  global $db;

  $sql = "SELECT * FROM students ";
  $sql .= "WHERE `Training Category`='" . db_escape($db, $training_category) . "'";
  // echo $sql;
  $result = mysqli_query($db, $sql);
  confirm_result_set($result);
  return $result; // returns an assoc. array
}

function find_student_by_department($department)
{
  global $db;

  $sql = "SELECT * FROM students ";
  $sql .= "WHERE `Department`='" . db_escape($db, $department) . "'";
  // echo $sql;
  $result = mysqli_query($db, $sql);
  confirm_result_set($result);
  return $result; // returns an assoc. array
}
function find_student_by_shift($shift)
{
  global $db;

  $sql = "SELECT * FROM students ";
  $sql .= "WHERE `Shift`='" . db_escape($db, $shift) . "'";
  // echo $sql;
  $result = mysqli_query($db, $sql);
  confirm_result_set($result);
  return $result; // returns an assoc. array
}

function update_student($update_student)
{
  global $db;

  $sql = "UPDATE students SET ";
  $sql .= " `Name`   ='" . db_escape($db, $update_student['name']) . "', ";
  $sql .= " `Fathers Name`  ='" . db_escape($db, $update_student['fathers_name']) . "', ";
  $sql .= " `Mothers Name`  ='" . db_escape($db, $update_student['mothers_name']) . "', ";
  $sql .= " `Present Address`  ='" . db_escape($db, $update_student['present_address']) . "', ";
  $sql .= " `Permanent Address` ='" . db_escape($db, $update_student['permanent_address']) . "', ";
  $sql .= " `Contact Number` ='" . db_escape($db, $update_student['contact_number']) . "', ";
  $sql .= " `Emergency Contact`  ='" . db_escape($db, $update_student['emergency_contact']) . "', ";
  $sql .= " `Institute Name` ='" . db_escape($db, $update_student['institute']) . "', ";
  $sql .= " `Department` ='" . db_escape($db, $update_student['department']) . "', ";
  $sql .= " `Shift`='" . db_escape($db, $update_student['shift']) . "', ";
  $sql .= " `Session` ='" . db_escape($db, $update_student['session']) . "', ";
  $sql .= " `Interest In`='" . db_escape($db, $update_student['interestedin']) . "', ";
  $sql .= "`Training Category`='" . db_escape($db, $update_student['trainingcart']) . "', ";
  $sql .= "`Batch No`='" . db_escape($db, $update_student['batch_no']) . "', ";
  $sql .= "`Roll No`='" . db_escape($db, $update_student['rollNo']) . "', ";
  $sql .= "`Registration No`='" . db_escape($db, $update_student['registrationNo']) . "', ";
  $sql .= "`Student Image`='" . db_escape($db, $update_student['student_image']) . "' ";
  $sql .= "WHERE id='" . db_escape($db, $update_student['id']) . "' ";
  $sql .= "LIMIT 1";
  $result = mysqli_query($db, $sql);
  if ($result) {
    return true;
  } else {
    // echo "UPDATE failed";
    // // echo mysqli_error($db);
    // // db_disconnect($db);
    // // exit;
    redirect_to('500.php');
  }
}

function update_student_status($update_student)
{
  global $db;

  $sql = "UPDATE students SET ";
  $sql .= "`Status`='" . db_escape($db, $update_student['status']) . "' ";
  $sql .= "WHERE id='" . db_escape($db, $update_student['id']) . "'";
  $sql .= "LIMIT 1";

  // echo $sql;
  $result = mysqli_query($db, $sql);
  // For UPDATE statements, $result is true/false
  if ($result) {
    return true;
  } else {
    // echo "UPDATE failed";
    // echo mysqli_error($db);
    // db_disconnect($db);
    // exit;

    redirect_to('500.php');
  }
}
function field_is_not_empty($student)
{
  if (!empty($student['name']) && !empty($student['fathers_name']) && !empty($student['mothers_name']) && !empty($student['present_address']) && !empty($student['permanent_address']) && !empty($student['contact_number']) && !empty($student['emergency_contact']) && !empty($student['institute']) && !empty($student['department']) && !empty($student['session']) && !empty($student['registrationNo']) && !empty($student['rollNo']) && !empty($student['shift']) && !empty($student['interestedin']) && !empty($student['trainingcart'])) {
    return true;
  } else {
    $_SESSION['validate_error'] = "Please Fill Out The Field!";
  }
}
function student_validation($insert_student)
{

  $all_student_DESC = find_all_student_DESC();
  $all_student_DESC_arry = mysqli_fetch_assoc($all_student_DESC);
  $insert_student['SiNo'] = $all_student_DESC_arry['Si No'];
  // validation
  $contact_validate =  find_student_by_sub('Contact Number', $insert_student['contact_number']);
  $emergency_validate =  find_student_by_sub('Emergency Contact', $insert_student['emergency_contact']);
  // $name_validate =  find_student_by_sub('Name', $insert_student['name']);
  // $fathers_validate = find_student_by_sub('Fathers Name', $insert_student['fathers_name']);
  // $mothers_validate = find_student_by_sub('Mothers Name', $insert_student['mothers_name']);
  $rollNo_validate = find_student_by_sub('Roll No', $insert_student['rollNo']);
  $registrationNo_validate = find_student_by_sub('Registration No', $insert_student['registrationNo']);


  if ($contact_validate > 0) {
    $_SESSION['validate_error'] = "The Contact Number already exits.try another one";
  } elseif ($emergency_validate > 0) {
    $_SESSION['validate_error'] = "The Emergency Contact Number already exits.try another one";
  }
  //elseif (($name_validate > 0) and ($fathers_validate > 0)) {
  //   $_SESSION['validate_error'] = "you already exits.";
  // } elseif (($name_validate > 0) and ($mothers_validate > 0)) {
  //   $_SESSION['validate_error'] = "you already exits.";  
  elseif ($rollNo_validate > 0) {
    $_SESSION['validate_error'] = "The Roll No is already exits.try another one";
  } elseif ($registrationNo_validate > 0) {
    $_SESSION['validate_error'] = "The Registration No is  already exits.try another one";
  } else {
    return true;
  } // Contact-validate

}
// function registrationId()
// {
//   $all_patteern = find_all_batches_DESC();
//   $all_pattern = mysqli_fetch_assoc($all_patteern);
//   $pattern = $all_patteern['Student Id Pattern'];
//   $number = 1;

//   if (!isset($insert_student['registrationId'])) {
//     $insert_student['registrationId'] = $pattern . $number;
//   } else {
//     $count_number = explode($pattern, $insert_student['registrationId']);
//     $count_number++;
//     $insert_student['registrationId'] = $pattern . $count_number;
//   }
// }



function insert_student($insert_student)
{

  $all_student_DESC = find_all_student_DESC();
  $all_student_DESC_arry = mysqli_fetch_assoc($all_student_DESC);
  $insert_student['SiNo'] = $all_student_DESC_arry['Si No'];
  $insert_student['studentId'] = $all_student_DESC_arry['Student ID'];



  if (!isset($insert_student['SiNo'])) {
    $insert_student['SiNo'] = 1;
  } else {
    intval($si_no = $insert_student['SiNo']);
    $insert_student['SiNo'] = $si_no + 1;
  }




  $all_patteern = find_all_pattern_DESC();
  $all_patteern = mysqli_fetch_assoc($all_patteern);
  $pattern = $all_patteern['Student Id Pattern'];
  $number = 1;


  if (!isset($insert_student['studentId'])) {
    $insert_student['studentId'] = $pattern . '-' . $number;
  } else {
    $count_number_arry = explode('-', $insert_student['studentId']);

    $count_number = end($count_number_arry);
    // die($count_number);
    $num = $count_number + 1;
    $insert_student['studentId'] = $pattern . '-' . $num;
  }
  $hashed_password = password_hash($insert_student['password'], PASSWORD_BCRYPT);



  global $db;
  // after complate validate
  $sql = "INSERT INTO students(`Name`, `Fathers Name`, `Mothers Name`, `Present Address`, `Permanent Address`, `Contact Number`, `Emergency Contact`, `Institute Name`, `Department`, `Shift`, `Session`, `Interest In`, `Training Category`, `Batch No`, `Si No`, `Roll No`, `Registration No`, `Student ID`,`Student Image`,  `trams`,`hashed_password`) ";
  $sql .= "VALUES (";
  $sql .= "'" . db_escape($db, $insert_student['name']) . "',";
  $sql .= "'" . db_escape($db, $insert_student['fathers_name']) . "',";
  $sql .= "'" . db_escape($db, $insert_student['mothers_name']) . "',";
  $sql .= "'" . db_escape($db, $insert_student['present_address']) . "',";
  $sql .= "'" . db_escape($db, $insert_student['permanent_address']) . "',";
  $sql .= "'" . db_escape($db, $insert_student['contact_number']) . "',";
  $sql .= "'" . db_escape($db, $insert_student['emergency_contact']) . "',";
  $sql .= "'" . db_escape($db, $insert_student['institute']) . "',";
  $sql .= "'" . db_escape($db, $insert_student['department']) . "',";
  $sql .= "'" . db_escape($db, $insert_student['shift']) . "',";
  $sql .= "'" . db_escape($db, $insert_student['session']) . "',";
  $sql .= "'" . db_escape($db, $insert_student['interestedin']) . "',";
  $sql .= "'" . db_escape($db, $insert_student['trainingcart']) . "',";
  $sql .= "'" . db_escape($db, $insert_student['batch_no']) . "',";
  $sql .= "'" . db_escape($db, $insert_student['SiNo']) . "',";
  $sql .= "'" . db_escape($db, $insert_student['rollNo']) . "',";
  $sql .= "'" . db_escape($db, $insert_student['registrationNo']) . "',";
  $sql .= "'" . db_escape($db, $insert_student['studentId']) . "',";
  $sql .= "'" . db_escape($db, $insert_student['student_image']) . "',";
  $sql .= "'" . db_escape($db, $insert_student['trams']) . "',";
  $sql .= "'" . db_escape($db, $hashed_password) . "'";
  $sql .= ")";
  // echo $sql;
  $result = mysqli_query($db, $sql);
  if ($result) {
    return true;
  } else {
    //   $errors = $result;
    // die(mysqli_error($db));
    // echo "Filed to Update";
    redirect_to('500.php');
  }
}

function delete_student($id)
{
  global $db;

  $sql = "DELETE FROM students ";
  $sql .= "WHERE id='" . db_escape($db, $id) . "' ";
  $sql .= "LIMIT 1";
  $result = mysqli_query($db, $sql);

  // For DELETE statements, $result is true/false
  if ($result) {
    return true;
  } else {
    // DELETE failed
    // echo mysqli_error($db);
    // db_disconnect($db);
    // exit;
    redirect_to('500.php');
  }
}
function change_student_password($student)
{
  global $db;

  $hashed_password = password_hash($student['new_password'], PASSWORD_BCRYPT);

  $sql = "UPDATE students SET ";
  $sql .= "hashed_password='" . db_escape($db, $hashed_password) . "' ";
  $sql .= "WHERE id='" . db_escape($db, $student['id']) . "' ";
  $sql .= "LIMIT 1";
  $result = mysqli_query($db, $sql);

  // For UPDATE statements, $result is true/false
  if ($result) {
    return true;
  } else {
    // UPDATE failed
    // echo mysqli_error($db);
    // db_disconnect($db);
    // exit;
    redirect_to('500.php');
  }
}
function change_student_password_by_phone($student)
{
  global $db;

  $hashed_password = password_hash($student['student_new_pass'], PASSWORD_BCRYPT);

  $sql = "UPDATE students SET ";
  $sql .= "hashed_password='" . db_escape($db, $hashed_password) . "' ";
  $sql .= "WHERE `Contact Number`='" . db_escape($db, $student['student_phone']) . "' ";
  $sql .= "LIMIT 1";
  $result = mysqli_query($db, $sql);

  // For UPDATE statements, $result is true/false
  if ($result) {
    return true;
  } else {
    // UPDATE failed
    // echo mysqli_error($db);
    // db_disconnect($db);
    // exit;
    redirect_to('500.php');
  }
}
/*========================================================================================================================================
  ================================================================  payment =============================================================
==========================================================================================================================================*/
function payment_update($payment)
{
  global $db;
  $sql = "UPDATE students SET ";
  $sql .= " `Payment Method`   ='" . db_escape($db, $payment['payment_method']) . "', ";
  $sql .= " `Payment`  =" . db_escape($db, $payment['payment_amount']) . ", ";
  $sql .= " `Due`  =" . db_escape($db, $payment['due']) . ", ";
  $sql .= "`Comment`='" . db_escape($db, $payment['comment']) . "' ";
  $sql .= "WHERE id='" . db_escape($db, $payment['id']) . "'";
  $sql .= "LIMIT 1";
  $result = mysqli_query($db, $sql);
  confirm_result_set($result);
  return true;

  // echo $sql;
}
/*========================================================================================================================================
  ================================================================  payment invoice =============================================================
==========================================================================================================================================*/
function find_all_invoices()
{
  global $db;
  $sql = "SELECT * FROM invoices";
  // $sql .= "ORDER BY position ASC";
  // echo $sql;
  $result = mysqli_query($db, $sql);
  confirm_result_set($result);
  return $result;
}


function find_all_invoices_DESC()
{
  global $db;
  $sql = "SELECT * FROM   invoices ORDER BY `id` DESC";
  $result = mysqli_query($db, $sql);
  confirm_result_set($result);
  return $result;
}


function find_invoices_by_sub($sub, $value)
{
  global $db;

  $sql = "SELECT * FROM invoices ";
  $sql .= "WHERE `$sub`='" . db_escape($db, $value) . "'";
  // echo $sql;
  $result = mysqli_query($db, $sql);
  confirm_result_set($result);

  return $result;
}


function find_invoices_by_id($id)
{
  global $db;

  $sql = "SELECT * FROM invoices ";
  $sql .= "WHERE id='" . db_escape($db, $id) . "'";
  // echo $sql;
  $result = mysqli_query($db, $sql);
  confirm_result_set($result);
  $subject = mysqli_fetch_assoc($result);
  mysqli_free_result($result);
  return $subject; // returns an assoc. array
}

function update_invoices($update_invoice)
{
  global $db;

  $sql = "UPDATE invoices SET ";
  $sql .= " `receipt_no`  ='" . db_escape($db, $update_invoice['receipt_no']) . "', ";
  $sql .= " `payment_date`  =" . db_escape($db, $update_invoice['payment_date']) . ", ";
  $sql .= " `payment_method`  ='" . db_escape($db, $update_invoice['payment_method']) . "', ";
  $sql .= " `total` =" . db_escape($db, $update_invoice['total']) . ", ";
  $sql .= " `receive_amount` =" . db_escape($db, $update_invoice['receive_amount']) . ", ";
  $sql .= " `total_payment`  =" . db_escape($db, $update_invoice['total_payment']) . ", ";
  $sql .= "`total_due`=" . db_escape($db, $update_invoice['total_due']) . " ";
  $sql .= "WHERE id='" . db_escape($db, $update_invoice['id']) . "'";
  $sql .= "LIMIT 1";
  $result = mysqli_query($db, $sql);
  if ($result) {
    return true;
  } else {
    // echo "UPDATE failed";
    // echo mysqli_error($db);
    // db_disconnect($db);
    // exit;
    redirect_to('500.php');
  }
}


function insert_invoice($insert_invoice)
{

  $insert_invoice['student_id'] = realescape($insert_invoice['student_id']);
  // $insert_invoice['receipt_no'] =  realescape(h($insert_invoice['receipt_no']));
  $insert_invoice['payment_date'] =  realescape($insert_invoice['payment_date']);
  $insert_invoice['payment_method'] =  realescape($insert_invoice['payment_method']);
  $insert_invoice['total'] =  realescape($insert_invoice['total']);
  $insert_invoice['receive_amount'] =  realescape($insert_invoice['receive_amount']);
  $insert_invoice['total_payment'] =  realescape($insert_invoice['total_payment']);
  $insert_invoice['total_due'] =   realescape($insert_invoice['total_due']);


  $find_all_invoices_DESC = find_all_invoices_DESC();
  $find_all_invoices_DESC_arry = mysqli_fetch_assoc($find_all_invoices_DESC);
  $insert_invoice['receipt_no'] = $find_all_invoices_DESC_arry['receipt_no'];



  if (!isset($insert_invoice['receipt_no'])) {
    $insert_invoice['receipt_no'] = '0001';
  } else {

    $receipt_no = intval($insert_invoice['receipt_no']);
    ++$receipt_no;
  }
  if ($receipt_no <= 9) {
    $digit = '000';
    $insert_invoice['receipt_no'] = $digit . $receipt_no;
  } elseif ($receipt_no >= 9) {
    $digit = '00';
    $insert_invoice['receipt_no'] = $digit . $receipt_no;
  } elseif ($receipt_no >= 100) {
    $digit = '0';
    $insert_invoice['receipt_no'] = $digit . $receipt_no;
  } elseif ($receipt_no >= 1000) {

    $insert_invoice['receipt_no'] = $receipt_no;
  }


  global $db;
  // after complate validate
  $sql = "INSERT INTO invoices(`student_id`, `receipt_no`, `payment_date`, `payment_method`, `total`, `receive_amount`, `total_payment`, `total_due`) ";
  $sql .= "VALUES ('{$insert_invoice['student_id']}','{$insert_invoice['receipt_no']}','{$insert_invoice['payment_date']}','{$insert_invoice['payment_method']}',{$insert_invoice['total']},{$insert_invoice['receive_amount']},{$insert_invoice['total_payment']},{$insert_invoice['total_due']})";
  // echo $sql;
  $result = mysqli_query($db, $sql);
  if ($result) {
    return true;
  } else {
    //   $errors = $result;
    // die(mysqli_error($db));
    // echo "Filed to Update";
    redirect_to('500.php');
  }
}

function delete_invoice($id)
{
  global $db;

  $sql = "DELETE FROM invoices ";
  $sql .= "WHERE id='" . db_escape($db, $id) . "' ";
  $sql .= "LIMIT 1";
  $result = mysqli_query($db, $sql);

  // For DELETE statements, $result is true/false
  if ($result) {
    return true;
  } else {
    // DELETE failed
    // echo mysqli_error($db);
    // db_disconnect($db);
    // exit;
    redirect_to('500.php');
  }
}
/*========================================================================================================================================
  ================================================================  visitor =============================================================
==========================================================================================================================================*/


function find_all_visitors()
{
  global $db;
  $sql = "SELECT * FROM   visitors  ";
  // $sql .= "ORDER BY position ASC";
  // echo $sql;
  $result = mysqli_query($db, $sql);
  confirm_result_set($result);
  return $result;
}


function find_all_visitors_DESC()
{
  global $db;
  $sql = "SELECT * FROM   visitors ORDER BY `Si` DESC";
  $result = mysqli_query($db, $sql);
  confirm_result_set($result);
  return $result;
}

function find_visitor_by_id($id)
{
  global $db;

  $sql = "SELECT * FROM visitors ";
  $sql .= "WHERE id='" . db_escape($db, $id) . "'";
  // echo $sql;
  $result = mysqli_query($db, $sql);
  confirm_result_set($result);
  $subject = mysqli_fetch_assoc($result);
  mysqli_free_result($result);
  return $subject; // returns an assoc. array
}

function update_visitor($update_visitor)
{
  global $db;

  $sql = "UPDATE visitors SET ";
  $sql .= " `Visitor Name`   ='" . db_escape($db, $update_visitor['visitor_name']) . "', ";
  $sql .= " `Visitor Phone`  ='" . db_escape($db, $update_visitor['visitor_phone']) . "', ";
  $sql .= " `Visitor Address`  ='" . db_escape($db, $update_visitor['visitor_address']) . "', ";
  $sql .= " `Reason`  ='" . db_escape($db, $update_visitor['reason']) . "', ";
  $sql .= "`description`='" . db_escape($db, $update_visitor['description']) . "' ";
  $sql .= "WHERE id='" . db_escape($db, $update_visitor['id']) . "'";
  $sql .= "LIMIT 1";

  // echo $sql;
  $result = mysqli_query($db, $sql);
  // // For UPDATE statements, $result is true/false
  if ($result) {
    return true;
  } else {
    // echo "UPDATE failed";
    // echo mysqli_error($db);
    // db_disconnect($db);
    // exit;
    redirect_to('500.php');
  }
}


function insert_visitor($insert_visitor)
{
  global $db;
  $insert_visitor['visitor_name'] = realescape(h($insert_visitor['visitor_name']));
  $insert_visitor['visitor_phone'] =  realescape(h($insert_visitor['visitor_phone']));
  $insert_visitor['visitor_address'] =  realescape(h($insert_visitor['visitor_address']));
  $insert_visitor['reason'] =  realescape(h($insert_visitor['reason']));
  $insert_visitor['description'] =  realescape(h($insert_visitor['description']));


  $all_visitors_DESC = find_all_visitors_DESC();
  $all_visitors_DESC = mysqli_fetch_assoc($all_visitors_DESC);
  $insert_visitor['Si'] = $all_visitors_DESC['Si'];

  if (!isset($insert_visitor['Si'])) {
    $insert_visitor['Si'] = 1;
  } else {
    $insert_visitor['Si']++;
  }

  // after complate validate
  $sql = "INSERT INTO visitors(`Si`, `Visitor Name`, `Visitor Phone`, `Visitor Address`, `Reason`, `description`) ";
  $sql .= "VALUES ('{$insert_visitor['Si']}','{$insert_visitor['visitor_name']}','{$insert_visitor['visitor_phone']}','{$insert_visitor['visitor_address']}','{$insert_visitor['reason']}','{$insert_visitor['description']}')";
  // echo $sql;
  $result = mysqli_query($db, $sql);
  if ($result) {
    return true;
  } else {
    //   $errors = $result;
    // die(mysqli_error($db));
    // echo "Filed to Update";
    redirect_to('500.php');
  }
}

function delete_visitor($id)
{
  global $db;

  $sql = "DELETE FROM visitors ";
  $sql .= "WHERE id='" . db_escape($db, $id) . "' ";
  $sql .= "LIMIT 1";
  $result = mysqli_query($db, $sql);

  // For DELETE statements, $result is true/false
  if ($result) {
    return true;
  } else {
    // DELETE failed
    // echo mysqli_error($db);
    // db_disconnect($db);
    // exit;
    redirect_to('500.php');
  }
}

/*========================================================================================================================================
  ================================================================  User Log in ===========================================================
==========================================================================================================================================*/
function find_all_user()
{
  global $db;
  $sql = "SELECT * FROM   users  ";
  // $sql .= "ORDER BY position ASC";
  // echo $sql;
  $result = mysqli_query($db, $sql);
  confirm_result_set($result);
  return $result;
}

function find_user_by_email($email)
{
  global $db;

  $sql = "SELECT * FROM users ";
  $sql .= "WHERE email='" . db_escape($db, $email) . "' ";
  $sql .= "LIMIT 1";
  $result = mysqli_query($db, $sql);
  confirm_result_set($result);
  $user = mysqli_fetch_assoc($result); // find first
  mysqli_free_result($result);
  return $user; // returns an assoc. array
}

function find_user_by_id($id)
{
  global $db;

  $sql = "SELECT * FROM users ";
  $sql .= "WHERE id='" . db_escape($db, $id) . "' ";
  $sql .= "LIMIT 1";
  $result = mysqli_query($db, $sql);
  confirm_result_set($result);
  $user = mysqli_fetch_assoc($result); // find first
  mysqli_free_result($result);
  return $user; // returns an assoc. array
}

function find_user_by_username_sub($sub, $value)
{
  global $db;

  $sql = "SELECT * FROM users ";
  $sql .= "WHERE `$sub`='" . db_escape($db, $value) . "'";
  $result = mysqli_query($db, $sql);
  confirm_result_set($result);
  $user = mysqli_fetch_assoc($result); // find first
  mysqli_free_result($result);
  return $user; // returns an assoc. array
}

function insert_user($new_user)
{
  global $db;

  $hashed_password = password_hash($new_user['password'], PASSWORD_BCRYPT);

  $sql = "INSERT INTO users ";
  $sql .= "(`username`, `email`, `Roles`, `Name`, `Phone`, `Image`, `hashed_password`) ";
  $sql .= "VALUES (";
  $sql .= "'" . db_escape($db, $new_user['username']) . "',";
  $sql .= "'" . db_escape($db, $new_user['email']) . "',";
  $sql .= "'" . db_escape($db, $new_user['roles']) . "',";
  $sql .= "'" . db_escape($db, $new_user['name']) . "',";
  $sql .= "'" . db_escape($db, $new_user['phone']) . "',";
  $sql .= "'" . db_escape($db, $new_user['image']) . "',";
  $sql .= "'" . db_escape($db, $hashed_password) . "'";
  $sql .= ")";
  $result = mysqli_query($db, $sql);
  return true;
}

function update_user($user)
{
  global $db;

  // $hashed_password = password_hash($user['password'], PASSWORD_BCRYPT);

  $sql = "UPDATE users SET ";
  $sql .= "email='" . db_escape($db, $user['email']) . "', ";
  $sql .= "username='" . db_escape($db, $user['username']) . "', ";
  $sql .= "Roles='" . db_escape($db, $user['roles']) . "', ";
  $sql .= "Name='" . db_escape($db, $user['name']) . "', ";
  $sql .= "Phone='" . db_escape($db, $user['phone']) . "', ";
  $sql .= "Image='" . db_escape($db, $user['image']) . "' ";
  $sql .= "WHERE id='" . db_escape($db, $user['id']) . "' ";
  $sql .= "LIMIT 1";
  $result = mysqli_query($db, $sql);

  // For UPDATE statements, $result is true/false
  if ($result) {
    return true;
  } else {
    // UPDATE failed
    // echo mysqli_error($db);
    // db_disconnect($db);
    // exit;
    redirect_to('500.php');
  }
}


function change_user_password($user)
{
  global $db;

  $hashed_password = password_hash($user['new_password'], PASSWORD_BCRYPT);

  $sql = "UPDATE users SET ";
  $sql .= "hashed_password='" . db_escape($db, $hashed_password) . "' ";
  $sql .= "WHERE id='" . db_escape($db, $user['id']) . "' ";
  $sql .= "LIMIT 1";
  $result = mysqli_query($db, $sql);

  // For UPDATE statements, $result is true/false
  if ($result) {
    return true;
  } else {
    // UPDATE failed
    // echo mysqli_error($db);
    // db_disconnect($db);
    // exit;
    redirect_to('500.php');
  }
}

function change_user_password_by_email($user)
{
  global $db;

  $hashed_password = password_hash($user['new_pass'], PASSWORD_BCRYPT);

  $sql = "UPDATE users SET ";
  $sql .= "hashed_password='" . db_escape($db, $hashed_password) . "' ";
  $sql .= "WHERE email='" . db_escape($db, $user['user_email']) . "' ";
  $sql .= "LIMIT 1";
  $result = mysqli_query($db, $sql);

  // For UPDATE statements, $result is true/false
  if ($result) {
    return true;
  } else {
    // UPDATE failed
    // echo mysqli_error($db);
    // db_disconnect($db);
    // exit;
    redirect_to('500.php');
  }
}

function delete_user($user)
{
  global $db;

  $sql = "DELETE FROM users ";
  $sql .= "WHERE id='" . db_escape($db, $user) . "' ";
  $sql .= "LIMIT 1;";
  $result = mysqli_query($db, $sql);

  // For DELETE statements, $result is true/false
  if ($result) {
    return true;
  } else {
    // echo 'DELETE failed';
    // echo mysqli_error($db);
    // db_disconnect($db);
    // exit;
    redirect_to('500.php');
  }
}

function login_user_details()
{
  if (is_login()) {
    $session_id = $_SESSION['user_id'];
    $find_user = find_user_by_id($session_id);
    //  $login_username=$find_user['username'];
    //  $login_email=$find_user['email'];
    //  $login_Roles=$find_user['Roles'];
    //  $login_id=$find_user['id'];

    return $find_user;
  }
}

/*========================================================================================================================================
  ================================================================ employer ===========================================================
==========================================================================================================================================*/
function find_all_employer()
{
  global $db;
  $sql = "SELECT * FROM employer";
  // $sql .= "ORDER BY position ASC";
  // echo $sql;
  $result = mysqli_query($db, $sql);
  confirm_result_set($result);
  return $result;
}



function find_employer_by_id($id)
{
  global $db;

  $sql = "SELECT * FROM employer ";
  $sql .= "WHERE id='" . db_escape($db, $id) . "' ";
  $sql .= "LIMIT 1";
  $result = mysqli_query($db, $sql);
  confirm_result_set($result);
  $user = mysqli_fetch_assoc($result); // find first
  mysqli_free_result($result);
  return $user; // returns an assoc. array
}


function find_employer_by_sub($sub, $value)
{
  global $db;

  $sql = "SELECT * FROM employer ";
  $sql .= "WHERE `$sub`='" . db_escape($db, $value) . "' ";
  $sql .= "LIMIT 1";
  $result = mysqli_query($db, $sql);
  confirm_result_set($result);
  $user = mysqli_fetch_assoc($result); // find first
  mysqli_free_result($result);
  return $user; // returns an assoc. array
}
function find_employer_by_status($status)
{
  global $db;

  $sql = "SELECT * FROM employer ";
  $sql .= "WHERE status='" . db_escape($db, $status) . "'";
  // echo $sql;
  $result = mysqli_query($db, $sql);
  confirm_result_set($result);
  // $subject = mysqli_fetch_assoc($result);
  // mysqli_free_result($result);
  return   $result; // returns an assoc. array
}

function insert_employer($new_employer)
{
  global $db;

  // $hashed_password = password_hash($new_employer['password'], PASSWORD_BCRYPT);

  $sql = "INSERT INTO employer ";
  $sql .= "(`name`, `father_name`, `mother_name`, `date_of_birth`, `phone_number`, `marital_status`, `country`, `blood_group`, `nid_number`, `religious`, `gender`, `present_address`, `permanent_address`, `employer_image`, `city`, `state`, `zip_code`, `home_tel`, `join_date`, `probation_end_date`, `date_of_permanency`, `employer_designation`, `ref_name`, `ref_designation`, `ref_phone`, `ref_email`, `ref_office_add`, `employer_id`, `ref_relationship`) ";
  $sql .= "VALUES (";
  $sql .= "'" . db_escape($db, $new_employer['name']) . "',";
  $sql .= "'" . db_escape($db, $new_employer['father_name']) . "',";
  $sql .= "'" . db_escape($db, $new_employer['mother_name']) . "',";
  $sql .= "'" . db_escape($db, $new_employer['date_of_birth']) . "',";
  $sql .= "'" . db_escape($db, $new_employer['phone_number']) . "',";
  $sql .= "'" . db_escape($db, $new_employer['marital_status']) . "',";
  $sql .= "'" . db_escape($db, $new_employer['country']) . "',";
  $sql .= "'" . db_escape($db, $new_employer['blood_group']) . "',";
  $sql .= "'" . db_escape($db, $new_employer['nid_number']) . "',";
  $sql .= "'" . db_escape($db, $new_employer['religious']) . "',";
  $sql .= "'" . db_escape($db, $new_employer['gender']) . "',";
  $sql .= "'" . db_escape($db, $new_employer['present_address']) . "',";
  $sql .= "'" . db_escape($db, $new_employer['permanent_address']) . "',";
  $sql .= "'" . db_escape($db, $new_employer['employer_image']) . "',";
  $sql .= "'" . db_escape($db, $new_employer['city']) . "',";
  $sql .= "'" . db_escape($db, $new_employer['state']) . "',";
  $sql .= "'" . db_escape($db, $new_employer['zip_code']) . "',";
  $sql .= "'" . db_escape($db, $new_employer['home_tel']) . "',";
  $sql .= "'" . db_escape($db, $new_employer['join_date']) . "',";
  $sql .= "'" . db_escape($db, $new_employer['probation_end_date']) . "',";
  $sql .= "'" . db_escape($db, $new_employer['date_of_permanency']) . "',";
  $sql .= "'" . db_escape($db, $new_employer['employer_designation']) . "',";
  $sql .= "'" . db_escape($db, $new_employer['ref_name']) . "',";
  $sql .= "'" . db_escape($db, $new_employer['ref_designation']) . "',";
  $sql .= "'" . db_escape($db, $new_employer['ref_phone']) . "',";
  $sql .= "'" . db_escape($db, $new_employer['ref_email']) . "',";
  $sql .= "'" . db_escape($db, $new_employer['ref_office_add']) . "',";
  $sql .= "'" . db_escape($db, $new_employer['employer_id']) . "',";
  $sql .= "'" . db_escape($db, $new_employer['ref_relationship']) . "'";
  $sql .= ")";
  $result = mysqli_query($db, $sql);
  return true;
}

function update_employer($employer)
{
  global $db;

  // $hashed_password = password_hash($user['password'], PASSWORD_BCRYPT);

  $sql = "UPDATE employer SET ";
  $sql .= "name='" . db_escape($db, $employer['name']) . "', ";
  $sql .= "father_name='" . db_escape($db, $employer['father_name']) . "', ";
  $sql .= "mother_name='" . db_escape($db, $employer['mother_name']) . "', ";
  $sql .= "date_of_birth='" . db_escape($db, $employer['date_of_birth']) . "', ";
  $sql .= "phone_number='" . db_escape($db, $employer['phone_number']) . "', ";
  $sql .= "marital_status='" . db_escape($db, $employer['marital_status']) . "', ";
  $sql .= "country='" . db_escape($db, $employer['country']) . "', ";
  $sql .= "blood_group='" . db_escape($db, $employer['blood_group']) . "', ";
  $sql .= "nid_number='" . db_escape($db, $employer['nid_number']) . "', ";
  $sql .= "religious='" . db_escape($db, $employer['religious']) . "', ";
  $sql .= "gender='" . db_escape($db, $employer['gender']) . "', ";
  $sql .= "present_address='" . db_escape($db, $employer['present_address']) . "', ";
  $sql .= "permanent_address='" . db_escape($db, $employer['permanent_address']) . "', ";
  $sql .= "employer_image='" . db_escape($db, $employer['employer_image']) . "', ";
  $sql .= "city='" . db_escape($db, $employer['city']) . "', ";
  $sql .= "state='" . db_escape($db, $employer['state']) . "', ";
  $sql .= "zip_code='" . db_escape($db, $employer['zip_code']) . "', ";
  $sql .= "home_tel='" . db_escape($db, $employer['home_tel']) . "', ";
  $sql .= "employer_id='" . db_escape($db, $employer['employer_id']) . "', ";
  $sql .= "join_date='" . db_escape($db, $employer['join_date']) . "', ";
  $sql .= "probation_end_date='" . db_escape($db, $employer['probation_end_date']) . "', ";
  $sql .= "date_of_permanency='" . db_escape($db, $employer['date_of_permanency']) . "', ";
  $sql .= "employer_designation='" . db_escape($db, $employer['employer_designation']) . "', ";
  $sql .= "ref_name='" . db_escape($db, $employer['ref_name']) . "', ";
  $sql .= "ref_designation='" . db_escape($db, $employer['ref_designation']) . "', ";
  $sql .= "ref_phone='" . db_escape($db, $employer['ref_phone']) . "', ";
  $sql .= "ref_email='" . db_escape($db, $employer['ref_email']) . "', ";
  $sql .= "ref_office_add='" . db_escape($db, $employer['ref_office_add']) . "', ";
  $sql .= "ref_relationship='" . db_escape($db, $employer['ref_relationship']) . "' ";
  $sql .= "WHERE id='" . db_escape($db, $employer['id']) . "' ";
  $sql .= "LIMIT 1";
  $result = mysqli_query($db, $sql);

  // For UPDATE statements, $result is true/false
  if ($result) {
    return true;
  } else {
    // UPDATE failed
    // echo mysqli_error($db);
    // db_disconnect($db);
    // exit;
    redirect_to('500.php');
  }
}

function update_employer_status($employer)
{
  global $db;

  $sql = "UPDATE employer SET ";
  $sql .= "`status`='" . db_escape($db, $employer['status']) . "' ";
  $sql .= "WHERE id='" . db_escape($db, $employer['id']) . "'";
  $sql .= "LIMIT 1";

  // echo $sql;
  $result = mysqli_query($db, $sql);
  // For UPDATE statements, $result is true/false
  if ($result) {
    return true;
  } else {
    // echo "UPDATE failed";
    // echo mysqli_error($db);
    // db_disconnect($db);
    // exit;
    redirect_to('500.php');
  }
}

function delete_employer($employer)
{
  global $db;

  $sql = "DELETE FROM employer ";
  $sql .= "WHERE id='" . db_escape($db, $employer) . "' ";
  $sql .= "LIMIT 1;";
  $result = mysqli_query($db, $sql);

  // For DELETE statements, $result is true/false
  if ($result) {
    return true;
  } else {
    // DELETE failed
    // echo mysqli_error($db);
    // db_disconnect($db);
    // exit;
    redirect_to('500.php');
  }
}



/*========================================================================================================================================
  ================================================================ general_cash ===========================================================
==========================================================================================================================================*/

function find_all_general_cash()
{
  global $db;
  $sql = "SELECT * FROM general_cash";
  // $sql .= "ORDER BY position ASC";
  // echo $sql;
  $result = mysqli_query($db, $sql);
  confirm_result_set($result);
  return $result;
}

function find_all_general_cash_by_status($status)
{
  global $db;
  $sql = "SELECT * FROM general_cash WHERE `status`='" . db_escape($db, $status) . "' ";
  // $sql .= "ORDER BY position ASC";
  // echo $sql;
  $result = mysqli_query($db, $sql);
  confirm_result_set($result);
  return $result;
}


function find_general_cash_by_id($id)
{
  global $db;

  $sql = "SELECT * FROM general_cash ";
  $sql .= "WHERE id='" . db_escape($db, $id) . "' ";
  $sql .= "LIMIT 1";
  $result = mysqli_query($db, $sql);
  confirm_result_set($result);
  $user = mysqli_fetch_assoc($result); // find first
  mysqli_free_result($result);
  return $user; // returns an assoc. array
}

function insert_general_cash($new_cash_deposit)
{
  global $db;
  $sql = "INSERT INTO general_cash ";
  $sql .= "(`deposit_by`, `total`, `date`, `entry_by`, `comment`) ";
  $sql .= "VALUES (";
  $sql .= "'" . db_escape($db, $new_cash_deposit['deposit_by']) . "',";
  $sql .= "'" . db_escape($db, $new_cash_deposit['total']) . "',";
  $sql .= "'" . db_escape($db, $new_cash_deposit['date']) . "',";
  $sql .= "'" . db_escape($db, $new_cash_deposit['entry_by']) . "',";
  $sql .= "'" . db_escape($db, $new_cash_deposit['comment']) . "'";
  $sql .= ")";
  $result = mysqli_query($db, $sql);
  return true;
}

function update_general_cash($cash_deposit)
{
  global $db;


  $sql = "UPDATE general_cash SET ";
  $sql .= "deposit_by='" . db_escape($db, $cash_deposit['deposit_by']) . "', ";
  $sql .= "total='" . db_escape($db, $cash_deposit['total']) . "', ";
  $sql .= "date='" . db_escape($db, $cash_deposit['date']) . "' ";
  $sql .= "WHERE id='" . db_escape($db, $cash_deposit['id']) . "' ";
  $sql .= "LIMIT 1";
  $result = mysqli_query($db, $sql);

  // For UPDATE statements, $result is true/false
  if ($result) {
    return true;
  } else {
    // UPDATE failed
    // echo mysqli_error($db);
    // db_disconnect($db);
    // exit;
    redirect_to('500.php');
  }
}

function delete_general_cash($id)
{
  global $db;

  $sql = "DELETE FROM general_cash ";
  $sql .= "WHERE id='" . db_escape($db, $id) . "' ";
  $sql .= "LIMIT 1;";
  $result = mysqli_query($db, $sql);

  // For DELETE statements, $result is true/false
  if ($result) {
    return true;
  } else {
    // DELETE failed
    // echo mysqli_error($db);
    // db_disconnect($db);
    // exit;
    redirect_to('500.php');
  }
}
function update_general_cash_status($general_cash_status)
{
  global $db;

  $sql = "UPDATE general_cash SET ";
  $sql .= "`status`='" . db_escape($db, $general_cash_status['status']) . "' ";
  $sql .= "WHERE id='" . db_escape($db, $general_cash_status['id']) . "'";
  $sql .= "LIMIT 1";

  $result = mysqli_query($db, $sql);
  if ($result) {
    return true;
  } else {
    redirect_to('500.php');
  }
}


/*========================================================================================================================================
  ================================================================ total_cash ===========================================================
==========================================================================================================================================*/

function find_all_total_cash()
{
  global $db;
  $sql = "SELECT * FROM total_cash";
  // $sql .= "ORDER BY position ASC";
  // echo $sql;
  $result = mysqli_query($db, $sql);
  confirm_result_set($result);
  return $result;
}
function find_all_total_cash_DESC()
{
  global $db;
  $sql = "SELECT * FROM total_cash ";
  $sql .= "ORDER BY id DESC";
  // echo $sql;
  $result = mysqli_query($db, $sql);
  confirm_result_set($result);
  $cash = mysqli_fetch_assoc($result);
  return $cash;
}


function find_total_cash_by_id($id)
{
  global $db;

  $sql = "SELECT * FROM total_cash ";
  $sql .= "WHERE id='" . db_escape($db, $id) . "' ";
  $sql .= "LIMIT 1";
  $result = mysqli_query($db, $sql);
  confirm_result_set($result);
  $user = mysqli_fetch_assoc($result); // find first
  mysqli_free_result($result);
  return $user; // returns an assoc. array
}

function insert_total_cash($total_cash)
{
  global $db;
  $sql = "INSERT INTO total_cash ";
  $sql .= "(`total`, `last_update_date`, `last_update_by`) ";
  $sql .= "VALUES (";
  $sql .= "'" . db_escape($db, $total_cash['total']) . "',";
  $sql .= "'" . db_escape($db, $total_cash['last_update_date']) . "',";
  $sql .= "'" . db_escape($db, $total_cash['last_update_by']) . "'";
  $sql .= ")";
  $result = mysqli_query($db, $sql);
  return true;
}

function update_total_cash($total_cash)
{
  global $db;
  $sql = "UPDATE total_cash SET ";
  $sql .= "total='" . db_escape($db, $total_cash['total']) . "', ";
  $sql .= "last_update_date='" . db_escape($db, $total_cash['last_update_date']) . "', ";
  $sql .= "last_update_by='" . db_escape($db, $total_cash['last_update_by']) . "' ";
  $sql .= "WHERE id='" . db_escape($db, $total_cash['id']) . "' ";
  $sql .= "LIMIT 1";
  $result = mysqli_query($db, $sql);

  // For UPDATE statements, $result is true/false
  if ($result) {
    return true;
  } else {
    // UPDATE failed
    // echo mysqli_error($db);
    // db_disconnect($db);
    // exit;
    redirect_to('500.php');
  }
}

function sum_total_cash($new_cash)
{
  global $log_info;
  global $db;
  $find_all_total_cash = find_all_total_cash_DESC();
  $total_cash['total'] = $find_all_total_cash['total'] + $new_cash['cash'];
  $total_cash['last_update_date'] = date("g:i:sa, j-F-Y") ?? '';
  $total_cash['last_update_by'] = $log_info['Name'] ?? '';
  $total_cash['id'] = $find_all_total_cash['id'];
  $total_cash_result = update_total_cash($total_cash);

  if ($total_cash_result) {
    return true;
  } else {
    // UPDATE failed
    // echo mysqli_error($db);
    // db_disconnect($db);
    // exit;
    redirect_to('500.php');
  }
}
function sub_total_cash($new_purchase)
{
  global $db;
  $find_all_total_cash = find_all_total_cash_DESC();
  $total_cash['total'] = $find_all_total_cash['total'] - $new_purchase['total_taka'];
  $total_cash['last_update_date'] = date("g:i:sa, j-F-Y") ?? '';
  $total_cash['last_update_by'] = $log_info['Name'] ?? '';
  $total_cash['id'] = $find_all_total_cash['id'];
  $total_cash_result = update_total_cash($total_cash);

  if ($total_cash_result) {
    return true;
  } else {
    // UPDATE failed
    // echo mysqli_error($db);
    // db_disconnect($db);
    // exit;
    redirect_to('500.php');
  }
}
function delete_total_cash($id)
{
  global $db;

  $sql = "DELETE FROM total_cash ";
  $sql .= "WHERE id='" . db_escape($db, $id) . "' ";
  $sql .= "LIMIT 1;";
  $result = mysqli_query($db, $sql);

  // For DELETE statements, $result is true/false
  if ($result) {
    return true;
  } else {
    // DELETE failed
    // echo mysqli_error($db);
    // db_disconnect($db);
    // exit;
    redirect_to('500.php');
  }
}

/*========================================================================================================================================
  ================================================================ purchase ===========================================================
==========================================================================================================================================*/

function find_all_purchase()
{
  global $db;
  $sql = "SELECT * FROM purchase";
  // $sql .= "ORDER BY position ASC";
  // echo $sql;
  $result = mysqli_query($db, $sql);
  confirm_result_set($result);
  return $result;
}
function find_all_purchase_DESC()
{
  global $db;
  $sql = "SELECT * FROM purchase ";
  $sql .= "ORDER BY id DESC";
  // echo $sql;
  $result = mysqli_query($db, $sql);
  confirm_result_set($result);
  $cash = mysqli_fetch_assoc($result);
  return $cash;
}


function find_purchase_by_id($id)
{
  global $db;

  $sql = "SELECT * FROM purchase ";
  $sql .= "WHERE id='" . db_escape($db, $id) . "' ";
  $sql .= "LIMIT 1";
  $result = mysqli_query($db, $sql);
  confirm_result_set($result);
  $user = mysqli_fetch_assoc($result); // find first
  mysqli_free_result($result);
  return $user; // returns an assoc. array
}

function insert_purchase($purchase)
{
  global $db;
  $sql = "INSERT INTO purchase ";
  $sql .= "(`purchase_cate`, `purchase_by`, `total_taka`, `entry_by`, `purchase_date`, `comment`) ";
  $sql .= "VALUES (";
  $sql .= "'" . db_escape($db, $purchase['purchase_cate']) . "',";
  $sql .= "'" . db_escape($db, $purchase['purchase_by']) . "',";
  $sql .= "'" . db_escape($db, $purchase['total_taka']) . "',";
  $sql .= "'" . db_escape($db, $purchase['entry_by']) . "',";
  $sql .= "'" . db_escape($db, $purchase['purchase_date']) . "',";
  $sql .= "'" . db_escape($db, $purchase['comment']) . "'";
  $sql .= ")";
  $result = mysqli_query($db, $sql);
  return true;
}

function update_purchase($purchase)
{
  global $db;
  $sql = "UPDATE purchase SET ";
  $sql .= "purchase_cate='" . db_escape($db, $purchase['purchase_cate']) . "', ";
  $sql .= "purchase_by='" . db_escape($db, $purchase['purchase_by']) . "', ";
  $sql .= "total_taka='" . db_escape($db, $purchase['total_taka']) . "', ";
  $sql .= "entry_by='" . db_escape($db, $purchase['entry_by']) . "' ";
  $sql .= "WHERE id='" . db_escape($db, $purchase['id']) . "' ";
  $sql .= "LIMIT 1";
  $result = mysqli_query($db, $sql);

  // For UPDATE statements, $result is true/false
  if ($result) {
    return true;
  } else {
    // UPDATE failed
    // echo mysqli_error($db);
    // db_disconnect($db);
    // exit;
    redirect_to('500.php');
  }
}

// function update_purchases($new_cash)
// {
//   $find_all_purchase = find_all_purchase_DESC();
//   $purchase['total'] = $find_all_purchase['total'] + $new_cash['cash'];
//   $purchase['last_update_date'] = date("g:i:sa, j-F-Y") ?? '';
//   $purchase['last_update_by'] = $log_info['Name'] ?? '';
//   $purchase['id'] = $find_all_purchase['id'];
//   $purchase_result = update_purchase($purchase);

//   if ($purchase_result) {
//     return true;
//   } else {
//     // UPDATE failed
//     echo mysqli_error($db);
//     db_disconnect($db);
//     exit;
//   }
// }
function delete_purchase($id)
{
  global $db;

  $sql = "DELETE FROM purchase ";
  $sql .= "WHERE id='" . db_escape($db, $id) . "' ";
  $sql .= "LIMIT 1;";
  $result = mysqli_query($db, $sql);

  // For DELETE statements, $result is true/false
  if ($result) {
    return true;
  } else {
    // DELETE failed
    // echo mysqli_error($db);
    // db_disconnect($db);
    // exit;
    redirect_to('500.php');
  }
}
function find_all_purchase_by_status($status)
{
  global $db;
  $sql = "SELECT * FROM purchase WHERE `status`='" . db_escape($db, $status) . "' ";
  // $sql .= "ORDER BY position ASC";
  // echo $sql;
  $result = mysqli_query($db, $sql);
  confirm_result_set($result);
  return $result;
}

function update_purchase_status($purchase_status)
{
  global $db;

  $sql = "UPDATE purchase SET ";
  $sql .= "`status`='" . db_escape($db, $purchase_status['status']) . "' ";
  $sql .= "WHERE id='" . db_escape($db, $purchase_status['id']) . "'";
  $sql .= "LIMIT 1";

  $result = mysqli_query($db, $sql);
  if ($result) {
    return true;
  } else {
    redirect_to('500.php');
  }
}
/*========================================================================================================================================
  ================================================================ Daily Report ===========================================================
==========================================================================================================================================*/

function find_all_daily_report_DESC()
{
  global $db;
  $sql = "SELECT * FROM daily_report  ORDER BY `id` DESC";
  $result = mysqli_query($db, $sql);
  confirm_result_set($result);
  return $result;
}
function find_all_daily_report()
{
  global $db;
  $sql = "SELECT * FROM daily_report";
  $result = mysqli_query($db, $sql);
  confirm_result_set($result);
  return $result;
}
function find_daily_report_by_id($id)
{
  global $db;

  $sql = "SELECT * FROM daily_report ";
  $sql .= "WHERE id='" . db_escape($db, $id) . "' ";
  $sql .= "LIMIT 1";
  $result = mysqli_query($db, $sql);
  confirm_result_set($result);
  $user = mysqli_fetch_assoc($result); // find first
  mysqli_free_result($result);
  return $user; // returns an assoc. array
}
function find_daily_report_by_employer_id($id)
{
  global $db;

  $sql = "SELECT * FROM daily_report ";
  $sql .= "WHERE employer_id='" . db_escape($db, $id) . "' ";
  $sql .= "ORDER BY `id` DESC";
  $result = mysqli_query($db, $sql);
  confirm_result_set($result);
  return $result; // returns an assoc. array
}

function insert_daily_report($new_daily_report)
{
  global $db;
  $sql = "INSERT INTO daily_report ";
  $sql .= "(`employer_id`, `report_details`, `date`) ";
  $sql .= "VALUES (";
  $sql .= "'" . db_escape($db, $new_daily_report['employer_id']) . "',";
  $sql .= "'" . db_escape($db, $new_daily_report['report_details']) . "',";
  $sql .= "'" . db_escape($db, $new_daily_report['date']) . "'";
  $sql .= ")";
  $result = mysqli_query($db, $sql);
  return true;
}

function update_daily_report($update_daily_report)
{
  global $db;


  $sql = "UPDATE daily_report SET ";
  $sql .= "report_details='" . db_escape($db, $update_daily_report['report_details']) . "' ";
  // $sql .= "date='" . db_escape($db, $update_daily_report['date']) . "' ";
  $sql .= "WHERE id='" . db_escape($db, $update_daily_report['id']) . "' ";
  $sql .= "LIMIT 1";
  $result = mysqli_query($db, $sql);

  // For UPDATE statements, $result is true/false
  if ($result) {
    return true;
  } else {
    // UPDATE failed
    // echo mysqli_error($db);
    // db_disconnect($db);
    // exit;
    redirect_to('500.php');
  }
}

function delete_daily_report($id)
{
  global $db;

  $sql = "DELETE FROM daily_report ";
  $sql .= "WHERE id='" . db_escape($db, $id) . "' ";
  $sql .= "LIMIT 1;";
  $result = mysqli_query($db, $sql);

  // For DELETE statements, $result is true/false
  if ($result) {
    return true;
  } else {
    // DELETE failed
    // echo mysqli_error($db);
    // db_disconnect($db);
    // exit;
    redirect_to('500.php');
  }
}
