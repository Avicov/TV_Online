$(document).ready(function(){

	var htmlContent = false;
	var escape = false;

	var parseString = function(data){		
		if(htmlContent == 'true'){
			content_data = data.html().trim();
		}else{
			content_data = data.text().trim();
		}
		
		if(escape == 'true'){
			content_data = escape(content_data);
		}

		return content_data;
	}

	$("#exportButton").click(function(titulo){

	    var doc = new jsPDF('landscape');
		doc.setFontSize(14);
		// Título
		doc.text(90,20, $('#tit').text());
		doc.setFontSize(12);
		var ignoreColumn = [];
		// Header
		var startColPosition=15; //LeftMargin
		$('#t').find('thead').find('tr').each(function() {
			$(this).filter(':visible').find('th').each(function(index,data) {
				if ($(this).css('display') != 'none'){					
					if(ignoreColumn.indexOf(index) == -1){
						var colPosition = startColPosition+ (index * 33);									
						doc.text(colPosition,30, parseString($(this)));
					}
				}
			});									
		});					
	
	
		// Row Vs Column
		var startRowPosition = 30; var page =1;var rowPosition=0;
		$('#t').find('tbody').find('tr').each(function(index,data) {
			rowCalc = index+1;
			
		if (rowCalc % 26 == 0){
			doc.addPage();
			page++;
			startRowPosition=startRowPosition+10;
		}
		rowPosition=(startRowPosition + (rowCalc * 10)) - ((page -1) * 280);
			
			$(this).filter(':visible').find('td').each(function(index,data) {
				if ($(this).css('display') != 'none'){	
					if(ignoreColumn.indexOf(index) == -1){
						var colPosition = startColPosition+ (index * 33);									
						doc.text(colPosition,rowPosition, parseString($(this)));
					}
				}
				
			});															
			
		});					
							
		// Output as Data URI
		doc.output('datauri');

	});
	
})