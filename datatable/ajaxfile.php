<?php
include 'config.php';

## Read value
$draw = $_POST['draw'];
$row = $_POST['start'];
$rowperpage = $_POST['length']; // Rows display per page
$columnIndex = $_POST['order'][0]['column']; // Column index
$columnName = $_POST['columns'][$columnIndex]['data']; // Column name
$columnSortOrder = $_POST['order'][0]['dir']; // asc or desc
$searchValue = mysqli_real_escape_string($con,$_POST['search']['value']); // Search value

## Search 
$searchQuery = " ";
if($searchValue != ''){
	$searchQuery = " and (name like '%".$searchValue."%' or 
        mother_name like '%".$searchValue."%' or 
        father_name  like'%".$searchValue."%' or 
        present_address  like'%".$searchValue."%'or 
        present_thana  like'%".$searchValue."%'or 
        present_district  like'%".$searchValue."%'or 
        nid_no  like'%".$searchValue."%'or 
        mobile_no  like'%".$searchValue."%'or 
        ref  like'%".$searchValue."%'or
        register_type  like'%".$searchValue."%'or 
        print  like'%".$searchValue."%'or 
        register_type  like'%".$searchValue."%'or 
        id  like'%".$searchValue."%' ) ";
}

## Total number of records without filtering
$sel = mysqli_query($con,"select count(*) as allcount from short_form_of_reg_gra");
$records = mysqli_fetch_assoc($sel);
$totalRecords = $records['allcount'];

## Total number of records with filtering
$sel = mysqli_query($con,"select count(*) as allcount from short_form_of_reg_gra WHERE 1 ".$searchQuery);
$records = mysqli_fetch_assoc($sel);
$totalRecordwithFilter = $records['allcount'];

## Fetch records
$empQuery = "select * from short_form_of_reg_gra WHERE 1 ".$searchQuery." order by ".$columnName." ".$columnSortOrder." limit ".$row.",".$rowperpage;
$empRecords = mysqli_query($con, $empQuery);
$data = array();

while ($row = mysqli_fetch_assoc($empRecords)) {
    $data[] = array(
    		"id"=>$row['id'],
            "name"=>$row['name'],
            "mother_name"=>$row['mother_name'],
            "father_name"=>$row['father_name'],
            "present_address"=>$row['present_address'],
            "present_thana"=>$row['present_thana'],
            "present_district"=>$row['present_district'],
            "nid_no"=>$row['nid_no'],
            "mobile_no"=>$row['mobile_no'],
            "ref"=>$row['ref'],
            "register_type"=>$row['register_type'],
            "print"=>$row['print'],
    	);
}

## Response
$response = array(
    "draw" => intval($draw),
    "iTotalRecords" => $totalRecords,
    "iTotalDisplayRecords" => $totalRecordwithFilter,
    "aaData" => $data
);

echo json_encode($response);
