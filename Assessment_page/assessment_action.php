<?php
include "include_script.php";

if(isset($_POST['delete_fun'])){
	$data=$_POST['delete_fun'];
	$db->sql_action("assessment","delete",$data);
}

if(isset($_POST['update_table'])){
	$data=$_POST['update_table'];
	$id=$data['id'];
	$db->sql_action("assessment","update",$data);
}

if(isset($_POST['add_table'])){
	$data=array();
	$data['name']="-";
	$db->sql_action("assessment","insert",$data);
}


if(isset($_POST['get_table'])){
?>

<table width="100%" cellspacing=0>
	<tr>
		<td class="td_class1">Assessment Name</td>
		<td class="td_class1">CO1</td>
		<td class="td_class1">CO2</td>
		<td class="td_class1">CO3</td>
		<td class="td_class1">CO4</td>
		<td class="td_class1">Weight</td>
		<td class="td_class1">Exam In Taken</td>
		<td class="td_class1">Ratio</td>
		<td class="td_class1">Delete</td>
	</tr>
	<?php 
		$sql="
		select 
		id,name,co1,co2,co3,co4,co1+co2+co3+co4 as total,exam_in_taken,(co1+co2+co3+co4)/exam_in_taken as ratio
		from assessment
		";

		$info=$db->get_sql_array($sql);
		foreach ($info as $key => $value) {
			$id=$value['id'];
			$name=$value['name'];
			$co1=$value['co1'];
			$co2=$value['co2'];
			$co3=$value['co3'];
			$co4=$value['co4'];
			$exam_in=$value['exam_in_taken'];
			$total=$value['total'];
			$ratio=$value['ratio'];
	?>
	<tr>
		<td class="td_class2">
			<input type="text" onkeyup="update(<?php echo $id; ?>)" id="name_<?php echo $id; ?>" class="input_calss2" value="<?php echo $name; ?>">
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
			<input type="text" onkeyup="update(<?php echo $id; ?>)" id="exam_in_<?php echo $id; ?>" class="input_calss1" value="<?php echo $exam_in; ?>">
		</td>
		<td class="td_class2">
			<input type="text" id="ratio_<?php echo $id; ?>"  class="input_class" value="<?php echo $ratio; ?>" readonly>
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