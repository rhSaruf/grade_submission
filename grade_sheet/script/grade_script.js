action_url="grade_action.php";

function set_value(id,val){
	document.getElementById(id).value=val;
}

function delete_fun(id){

	id=parseInt(id);
	var data1={
		"id": id
	}
	var data={
    	"delete_fun": data1
    }
    $.ajax({
        type: 'POST',
        url: action_url,
        data:data,
        success: function(response) {
           show_table();
        }
    }); 
}

function update(id){
    assessment_name=document.getElementById("assessment_name_"+id).value;
    student_id=document.getElementById("student_id_"+id).value;
	student_name=document.getElementById("student_name_"+id).value;
	co1=document.getElementById("co1_"+id).value;
	co2=document.getElementById("co2_"+id).value;
	co3=document.getElementById("co3_"+id).value;
	co4=document.getElementById("co4_"+id).value;
	
	if(assessment_name=="" || student_id="" || student_name="" || co1=="" || co2=="" || co3=="" || co4=="" )return;

	total=parseFloat(co1)+parseFloat(co2)+parseFloat(co3)+parseFloat(co4);
	
	var data1={
		"id": id,
		"assessment_name": assessment_name,
        "student_id": student_id,
        "student_name": student_name,
		"co1": co1,
		"co2": co2,
		"co3": co3,
		"co4": co4
		
	}

	var data={
		"update_table": data1
	}

	console.log(data1);

	$.ajax({
        type: 'POST',
        url: action_url,
        data:data,
        success: function(response) {
            set_value("total_"+id,total);
            
        }
    }); 
	
}

function add(){

	var data={
    	"add_table": 1
    }

    $.ajax({
        type: 'POST',
        url: action_url,
        data:data,
        success: function(response) {
           show_table();
        }
    });  

}

function show_table(){
    
    var data={
    	"get_table": 1
    }

    $.ajax({
        type: 'POST',
        url: action_url,
        data:data,
        success: function(response) {
           document.getElementById('assessment_table').innerHTML=response;
        }
    });  
}