//GET Ajax
function ajax_data(type, url, success){
	$.ajax({type:type,
		url:url,
		dataType:"json",
		restful:true,
		cache:false,
		timeout:20000,
		async:true,
		crossDomain: true,
		success:function(data){
			success.call(this, data);
		},
		error:function(data){
			if (data.status == 417) {
				alert(data.responseText);	
			}
			alert("Error: "+data.status+". "+data.statusText);
		}
	});
}