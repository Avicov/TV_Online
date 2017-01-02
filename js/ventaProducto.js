$(document).ready(function(){
	var data = {
    labels: ["1","2","3","4","5","6","7","8","9","10","11","12","13","14","15","16","17","18","19","20","21","22","23","24","25","26","27","28","29","30","31"],
    datasets: [
	        {
	        	label: "Ganancias",
	            fillColor: "rgba(151,187,205,0.5)",
	            strokeColor: "rgba(151,187,205,0.8)",
	            highlightFill: "rgba(151,187,205,0.75)",
	            highlightStroke: "rgba(151,187,205,1)",
	            data: [0, 0, 0, 0, 0, 0, 0, 0, 0, 0]
	        },
	    ]
	};
	var data2 = {
	    labels: ["1","2","3","4","5","6","7","8","9","10","11","12","13","14","15","16","17","18","19","20","21","22","23","24","25","26","27","28","29","30","31"],
	    datasets: [
	        {
	            label: "Ganancias",
	            fillColor: "rgba(151,187,205,0.2)",
	            strokeColor: "rgba(151,187,205,1)",
	            pointColor: "rgba(151,187,205,1)",
	            pointStrokeColor: "#fff",
	            pointHighlightFill: "#fff",
	            pointHighlightStroke: "rgba(151,187,205,1)",
	            data: [0, 0, 0, 0, 0, 0, 0, 0, 0, 0]
	        },
	    ]
	};
	var options = {
		scaleBeginAtZero : true,
		scaleGridLineWidth : 5,
		responsive: true
	}
	var ctx = $("#myPieChart").get(0).getContext("2d");
	var myPieChart = new Chart(ctx).Bar(data, options);

	var base_url="../api/restApi.php/";
	var url;

	/* Search button */
	$('body').on("click",'.searchButton',function()	{
		var mes=$('#mes').val();
		
		if (mes && mes<=12 && mes>=8) {
			
			url=base_url+'ingresos2/'+mes; 
			ajax_data('GET',url, function(data){
				if ((data.ganancias && data.ganancias.length > 0) || (data.matris && data.matris.length > 0)) {
					$.each(data.ganancias, function(i,data){
						myBarChart.datasets[0].bars[data.mes-2].value = data.totalMes;
					});
					$.each(data.matris, function(i,data){
						myBarChart.datasets[1].bars[data.mes-2].value = data.totalMes;

					});
					myBarChart.update();
				} else {
					alert("No se encontraron resultados en su búsqueda.");
				}
			});
		} else {
			alert("Ingrese un año entre 2000 y 2050.");
		}

	});

	$("#exportButton").click(function(){
	 //    html2canvas($('#myBarChart'), {
		// 	onrendered: function(canvas) {										
		// 		var img = canvas.toDataURL("image/jpeg");
		// 		var pdf = new jsPDF('landscape');
		// 		console.log(img);
		// 	    pdf.addImage(img, 'JPEG', 10, 10);
		// 	    //pdf.save("download.pdf");
		// 	    pdf.output('datauri');
		// 	}
		// });
		var chart = '#myBarChart';
		getImageFromUrl('../css/images/info.jpg', createPDF, chart);
	});

	$("#exportButton2").click(function(){
	 //    html2canvas($('#myLineChart'), {
		// 	onrendered: function(canvas) {										
		// 		var img = canvas.toDataURL("image/jpeg");
		// 		var pdf = new jsPDF('landscape');
		// 		console.log(img);
		// 	    pdf.addImage(img, 'JPEG', 10, 10);
		// 	    //pdf.save("download.pdf");
		// 	    pdf.output('datauri');
		// 	}
		// });
		var chart = '#myLineChart';
		getImageFromUrl('../css/images/info.jpg', createPDF, chart);
	});

	var getImageFromUrl = function(url, callback, chart) {
		var img = new Image, data, ret={data: null, pending: true};

		img.onError = function() {
			throw new Error('Cannot load image: "'+url+'"');
		}
		img.onload = function() {
			var canvas = document.createElement('canvas');
			document.body.appendChild(canvas);
			canvas.width = img.width;
			canvas.height = img.height;

			var ctx = canvas.getContext('2d');
			ctx.drawImage(img, 0, 0);
			// Grab the image as a jpeg encoded in base64, but only the data
			data = canvas.toDataURL('image/jpeg').slice('data:image/jpeg;base64,'.length);
			// Convert the data to binary form
			data = atob(data)
			document.body.removeChild(canvas);

			ret['data'] = data;
			ret['pending'] = false;
			if (typeof callback === 'function') {
				callback(data,chart);
			}
		}
		img.src = url;

		return ret;
	}

	// Since images are loaded asyncronously, we must wait to create
	// the pdf until we actually have the image data.
	// If we already had the jpeg image binary data loaded into
	// a string, we create the pdf without delay.
	var createPDF = function(imgData,chart) {
		html2canvas($(chart), {
			onrendered: function(canvas) {										
				var img = canvas.toDataURL("image/jpeg");
				var pdf = new jsPDF('landscape');
				pdf.addImage(imgData, 'JPEG', 25, 10);
			    pdf.addImage(img, 'JPEG', 10, 25);
			    //pdf.save("download.pdf");
			    pdf.output('datauri');
			}
		});
	}
	
})