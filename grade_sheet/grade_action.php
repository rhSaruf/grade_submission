<?php
include "include_script.php";

if(isset($_POST['delete_fun'])){
	$data=$_POST['delete_fun'];
	$db->sql_action("grade_sheet","delete",$data);
}

if(isset($_POST['update_table'])){
	$data=$_POST['update_table'];
	$id=$data['id'];
	$db->sql_action("grade_sheet","update",$data);
}

if(isset($_POST['add_table'])){
	$data=array();
    $data['assessment_name']="-";
    $data['student_id']="-";
	$data['student_name']="-";
	$db->sql_action("grade_sheet","insert",$data);
}


if(isset($_POST['get_table'])){
?>

<table width="100%" cellspacing=0>
	<tr>
		<td class="td_class1">Assessment Name</td>
        <td class="td_class1">Student ID</td>
        <td class="td_class1">Student Name</td>
		<td class="td_class1">CO1</td>
		<td class="td_class1">CO2</td>
		<td class="td_class1">CO3</td>
		<td class="td_class1">CO4</td>
		<td class="td_class1">Total</td>		
		<td class="td_class1">Delete</td>
	</tr>
	<?php 
		$sql="
		select 
		id,assessment_name,student_id,student_name,co1,co2,co3,co4,co1+co2+co3+co4 as total
		from grade_sheet
		";

		$info=$db->get_sql_array($sql);
		foreach ($info as $key => $value) {
			$id=$value['id'];
			$assessment_name=$value['assessment_name'];
            $student_id=$value['student_id'];
            $student_name=$value['student_name'];
			$co1=$value['co1'];
			$co2=$value['co2'];
			$co3=$value['co3'];
			$co4=$value['co4'];
			$total=$value['total'];
			
	?>
	<tr>
		<td class="td_class2">
			<input type="text" onkeyup="update(<?php echo $id; ?>)" id="assessment_name_<?php echo $id; ?>" class="input_calss2" value="<?php echo $assessment_name; ?>">
		</td>
        <td class="td_class2">
			<input type="text" onkeyup="update(<?php echo $id; ?>)" id="student_id_<?php echo $id; ?>" class="input_calss2" value="<?php echo $student_id; ?>">
		</td>
        <td class="td_class2">
			<input type="text" onkeyup="update(<?php echo $id; ?>)" id="student_name_<?php echo $id; ?>" class="input_calss2" value="<?php echo $student_name; ?>">
		</td>
		<td class="td_class2">
			<input type="text" onkeyup="update(<?php echo $id; ?>)" id="co1_<?php echo $id; ?>" class="input_calss1" value="<?php echo $co1; ?>">
		</td>
		<td class="td_class2">
			<input type="text" onkeyup="update(<?php echo $id; ?>)" id="co2_<?php echo $id; ?>" class="input_calss1" value="<?php echo $co2; ?>">
		</td>
		<td class="td_class2">
			<input type="text" onkeyup="update(<?php echo $id; ?>)" id="co3_<?php echo $id; ?>" class="input_calss1" value="<?php echo $co3; ?>">
		</td>
		<td class="td_class2">
			<input type="text" onkeyup="update(<?php echo $id; ?>)" id="co4_<?php echo $id; ?>" class="input_calss1" value="<?php echo $co4; ?>">
		</td>
		<td class="td_class2">
			<input type="text" id="total_<?php echo $id; ?>" class="input_class" value="<?php echo $total; ?>" readonly>
		</td>
		
		<td class="td_class2">
			<button onclick="delete_fun(<?php echo $id; ?>)">Delete</button>
		</td>
	</tr>
	<?php } ?>
</table>

<?php

}

?>