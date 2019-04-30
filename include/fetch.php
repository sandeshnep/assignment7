<?php
//fetch.php
include 'connect-db.php';
$columns = array('full_name', 'location', 'email', 'question1', 'question2', 'question3', 'timestamp');
$query = "SELECT * FROM survey ";

if(isset($_POST["search"]["value"]))
{
 $query .= '
 WHERE full_name LIKE "%'.$_POST["search"]["value"].'%"
 OR location LIKE "%'.$_POST["search"]["value"].'%"
 OR email LIKE "%'.$_POST["search"]["value"].'%"
 OR question1 LIKE "%'.$_POST["search"]["value"].'%"
 OR question2 LIKE "%'.$_POST["search"]["value"].'%"
 OR question3 LIKE "%'.$_POST["search"]["value"].'%"
 ';
}

if(isset($_POST["order"]))
{
 $query .= 'ORDER BY '.$columns[$_POST['order']['0']['column']].' '.$_POST['order']['0']['dir'].'
 ';
}
else
{
 $query .= 'ORDER BY id DESC ';
}

$query1 = '';

if($_POST["length"] != -1)
{
 $query1 = 'LIMIT ' . $_POST['start'] . ', ' . $_POST['length'];
}


$number_filter_row = mysqli_num_rows(mysqli_query($connection, $query));

$result = mysqli_query($connection, $query . $query1);

$data = array();

while($row = mysqli_fetch_array($result))
{
 $sub_array = array();
 $sub_array[] = '<div contenteditable class="update" data-id="'.$row["id"].'" data-column="full_name">' . $row["full_name"] . '</div>';
 $sub_array[] = '<div contenteditable class="update" data-id="'.$row["id"].'" data-column="location">' . $row["location"] . '</div>';
 $sub_array[] = '<div contenteditable class="update" data-id="'.$row["id"].'" data-column="email">' . $row["email"] . '</div>';
 $sub_array[] = '<div contenteditable class="update" data-id="'.$row["id"].'" data-column="question1">' . $row["question1"] . '</div>';
 $sub_array[] = '<div contenteditable class="update" data-id="'.$row["id"].'" data-column="question2">' . $row["question2"] . '</div>';
 $sub_array[] = '<div contenteditable class="update" data-id="'.$row["id"].'" data-column="question3">' . $row["question3"] . '</div>';
 $sub_array[] = '<div  class="update" data-id="'.$row["id"].'" data-column="timestamp">' . $row["timestamp"] . '</div>';
 $sub_array[] = '<button type="button" name="delete" class="btn btn-danger btn-xs delete" id="'.$row["id"].'">Delete</button>';
 $data[] = $sub_array;
}

function get_all_data($connection)
{
 $query = "SELECT * FROM survey";
 $result = mysqli_query($connection, $query);
 return mysqli_num_rows($result);
}

$output = array(
 "draw"    => intval($_POST["draw"]),
 "recordsTotal"  =>  get_all_data($connection),
 "recordsFiltered" => $number_filter_row,
 "data"    => $data
);

echo json_encode($output);

?>
