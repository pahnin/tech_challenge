<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');
$table_structure=[
	[
		"person",
		[
			["id"],
			["first_name",["req"]],
			["last_name",["req"]],
			["dob",["req"]],
			["user_id"],
			["password"],
			["comments"]
		]
	],
	[
		"comm_details",
		[
			["person_id"],
			["addr_line1",["req"]],
			["addr_line2"],
			["city",["req"]],
			["state",["req"]],
			["country",["req"]],
			["zipcode"],
			["phone1",["phone"]],
			["email1",["email"]]
		]
	]
];

$table	=	$table_structure[$_GET['table']][0];
$field	=	$table_structure[$_GET['table']][1][$_GET['field']][0];
$id		=	$_GET['id'];
$val	=	$_GET['data']; 
$errors	=	"";
function validate($key,$validations){
	global $errors;
	foreach ($validations as $type) {
		if ($type) {
			if ($type == "req") { 
				if ($key=="") {
					$errors=$errors . 'Field cannot be empty. ';
					return False;
				}
				else {
					return True;
				}
			}
			elseif ($type == "email") {
				if (preg_match("/^[_a-z0-9-]+(.[_a-z0-9-]+)*@[a-z0-9-]+(.[a-z0-9-]+)*(.[a-z]{2,3})$/i", $key)) {
					return True;
				}
				else {
					$errors=$errors . 'Invalid input. ';
					return False;
				}
			}

			
			elseif ($type == "phone") {
			
				if (preg_match("/^[0-9]{3}-[0-9]{4}-[0-9]{4}$/", $key) || preg_match("/^[0-9]{10}$/", $key)) {
					return True;
				}
				else {
					$errors=$errors . 'Invalid input. ';
					return False;
				}
			}

		}
	}	
}

if (isset($table_structure[$_GET['table']][1][$_GET['field']][1])) {
	//need to validate
	$validations_passed = validate($val,$table_structure[$_GET['table']][1][$_GET['field']][1]);
}
else{
	$validations_passed = True;
}
if ($table==""||$field==""||$id==""){
	$errors=$errors . 'Missing information to process request. ';
}
if(isset($validations_passed)){
	if($validations_passed){
		$db = mysql_connect("localhost","root","phani");
		mysql_select_db("test",$db);
		$query=mysql_query("UPDATE `$table` SET `$field` = '$val' WHERE `id` =$id;");
		if ($query) {
			echo "Success: Value updated";
		}
		else{
			$errors=$errors.'Failed to update database! :(';
		}
	}
	else{}}
else {echo "Unknown Error";}
echo $errors;
?>
