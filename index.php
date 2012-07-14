<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" " http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"> 
<html xmlns="http://www.w3.org/1999/xhtml"> 
<head> 
    <title>iMprovi: Technical Challenge</title>
	<script src="js/jquery-latest.js" type="text/javascript"></script>
	<script src="js/jquery.tablesorter.js" type="text/javascript"></script>
	<script src="js/jquery.jeditable.js" type="text/javascript"></script>
	<script src="js/jquery.tabs.js" type="text/javascript"></script>
	<meta http-equiv="content-type" content="text/html; charset=UTF-8"><link href="style.css" rel="stylesheet" type="text/css">
	<link href="js/themes/style.css" rel="stylesheet" type="text/css"/>
	<!-- <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.5/jquery.min.js"></script> !-->
	<script src="js/jquery-ui.min.js"></script>
<script type="text/javascript">
$(document).ready(function() {
	 // call the tablesorter plugin 
    $("table")
	.tablesorter({ 
        // sort on the first name and last name, order asc 
        sortList: [[0,0],[2,0]],
		widgets: ['zebra', 'Hover']
    });
	var buttonImage = $( "#datepicker" ).datepicker( "option", "buttonImage" );
	//setter
	
	$( "#datepicker" ).datepicker( "option", "buttonImage", "datepicker.jpg" );
	
	/*
	$('.edit_text').editable("ProcessRecords.php", {
		style: "background:url(text_bx.gif) no-repeat bottom;display:inline; width: 200px; height: 20px",
		width: "none",
		onblur: "submit",
		cssclass: "inputbtn",
		tooltip : "Click to edit..."
	});
	*/
});
</script>
	<script src="js/script.js" type="text/javascript"></script>
</head>
<body>
<?php
	$db = mysql_connect("localhost","root","phani");
	mysql_select_db("test",$db);
?>
<div id="tabbed_box_1" class="tabbed_box"> 
    <h4>Employee Details</h4>  
    <div class="tabbed_area">  
  
        <ul class="tabs">  
            <li><a href="javascript:tabSwitch(1, 2, 'tab_', 'content_')" id="tab_1" class="active">Personal</a></li>  
            <li><a href="javascript:tabSwitch(2, 2, 'tab_', 'content_')" id="tab_2">Contact Details</a></li>    
        </ul>  
  
        <div id="content_1" class="content">
			<table class="tablesorter">
				<thead><tr>
					<th> Id </th>
					<th> First Name </th>
					<th> Last Name </th>
					<th> Date of Birth </th>
					<th> Username </th>
					<th> Password </th>
					<th> Comments </th>
				</tr></thead>
			<?php
				$query1 = "SELECT id, first_name, last_name, dob, user_id, password, comments FROM person";
				$res = mysql_query($query1);
				
				//$query2 = "SELECT addr_line1, addr_line2, city, state, country, zipcode, phone1, email1 FROM comm_details WHERE person_id = '" . $PersonId . "'";
				if($res)
				{
					echo "<tbody>";
					while($getRow = mysql_fetch_row($res))
					{
						echo "<tr>
							<td>$getRow[0]</td>
							<td class='edit_text'>$getRow[1]</td>
							<td class='edit_text'>$getRow[2]</td>
							<div id='datepicker'><td class='edit_date'>$getRow[3]</td></div>
							<td class='edit_text'>$getRow[4]</td>
							<td class='edit_text'>$getRow[5]</td>
							<td class='edit_text'>$getRow[6]</td>
							</tr>";
					}
					echo "</tbody>";
				}
				?>
			</table>
		</div>
        <div id="content_2" class="content">
			<table class="tablesorter">
				<thead><tr>
					<th> Name </th>
					<th> Address Line 1 </th>
					<th> Address Line 2 </th>
					<th> City </th>
					<th> State </th>
					<th> Country </th>
					<th> Zip Code </th>
					<th> Phone </th>
					<th> Email </th>
				</tr></thead>
			<?php
				$query1 = "SELECT CONCAT(a.first_name, ' ', a.last_name), b.addr_line1, b.addr_line2, b.city, b.state, b.country, b.zipcode, b.phone1, b.email1 
				FROM comm_details b JOIN person a ON (b.person_id = a.id)";
				$res = mysql_query($query1);
				
				//$query2 = "SELECT addr_line1, addr_line2, city, state, country, zipcode, phone1, email1 FROM comm_details WHERE person_id = '" . $PersonId . "'";
				if($res)
				{
					echo "<tbody>";
					while($getRow = mysql_fetch_row($res))
					{
						echo "<tr>
							<td class='edit_text'>$getRow[0]</td>
							<td class='edit_text'>$getRow[1]</td>
							<td class='edit_text'>$getRow[2]</td>
							<td class='edit_text'>$getRow[3]</td>
							<td class='edit_text'>$getRow[4]</td>
							<td class='edit_text'>$getRow[5]</td>
							<td class='edit_text'>$getRow[6]</td>
							<td class='edit_text'>$getRow[7]</td>
							<td class='edit_text'><a href='mailto:$getRow[8]'>$getRow[8]</a></td>
							</tr>";
					}
					echo "</tbody>";
				}
				?>
			</table>
		</div>
    </div>  
</div>  
</body> 
</html>
