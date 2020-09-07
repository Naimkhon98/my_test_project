<?php
$host = "localhost"; /* Host name */
$user = "root"; /* User */
$password = "123"; /* Password */
$dbname = "test"; /* Database name */

$con = mysqli_connect($host, $user, $password, $dbname);
// Check connection
if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}

## Read value
$draw = $_POST['draw'];
$row = $_POST['start'];
$rowperpage = $_POST['length']; // Rows display per page
$columnIndex = $_POST['order'][0]['column']; // Column index
$columnName = $_POST['columns'][$columnIndex]['data']; // Column name
$columnSortOrder = $_POST['order'][0]['dir']; // asc or desc
$searchValue = $_POST['search']['value']; // Search value

## Search 
$searchQuery = " ";
if ($searchValue != '') {
    $searchQuery = " and (id like '%" . $searchValue . "%' or 
                          user_fio like '%" . $searchValue . "%' or 
                          email like'%" . $searchValue . "%' or
                          task_text like'%" . $searchValue . "%') ";
}

## Total number of records without filtering
$sel = mysqli_query($con, "select count(*) as allcount from `task_list`");
$records = mysqli_fetch_assoc($sel);
$totalRecords = $records['allcount'];

## Total number of records with filtering
$sel = mysqli_query($con, "select count(*) as allcount from `task_list` WHERE 1 " . $searchQuery);
$records = mysqli_fetch_assoc($sel);
$totalRecordwithFilter = $records['allcount'];

## Fetch records
$empQuery = "select * from `task_list` WHERE 1 " . $searchQuery . " order by " . $columnName . " " . $columnSortOrder . " limit " . $row . "," . $rowperpage;
$empRecords = mysqli_query($con, $empQuery);
$data = array();

while ($row = mysqli_fetch_assoc($empRecords)) {
    $data[] = array(
        "id" => $row['id'],
        "user_fio" => $row['user_fio'],
        "email" => $row['email'],
        "task_text" => $row['task_text'],
        "action" => '<td>
                     <div role="group" style="float: right">
                         <a class="btn btn-primary btn-sm" href="index.php?action=task-edit&id='.$row['id'].'"> <span
                                 class="glyphicon glyphicon-edit"></span> изменить</a>
                         <a class="btn btn-danger btn-sm" href="index.php?action=task-delete&id='.$row['id'].'"
                            onclick="return confirmDelete()">&nbsp<span class="glyphicon glyphicon-trash"></span> удалить</a>
                     </div>
                     </td>'
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
