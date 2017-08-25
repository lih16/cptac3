<!DOCTYPE html>
<html>
<head>
<title>Cancer Curation Viewer</title>
<link href="<?php echo CSS_PATH; ?>/login.css" rel="stylesheet" type="text/css">
 <script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
</head>
<body>
<div>
   <h3 style="color: #594F4F; font-family: 'Droid serif', serif; font-size: 36px; font-weight: 400; font-style: italic; line-height: 44px; margin: 0 0 12px; text-align: center; ">
      Variant Curation Viewer
   </h3>
</div>
<script>
$(document).ready(function(){
   addList();
   $("#tumorTypeselect").change(function() {
		var tissue=$("#tumorTypeselect option:selected").val();
		addcellList(tissue);
   });
   $("#geneselect").change(function() {
		var genename=$("#geneselect option:selected").val();
		var tissue=$("#tumorTypeselect option:selected").val();
		addMutationList(tissue,genename);
			
	});
});
function addcellList(tissue){
		$.ajax({
			type : 'POST',
			url : 'getgenes',
			dataType : 'text',
			data: {
				
				cancer:tissue
				
			},
			success : function(data1){
			  var celllineList=data1.split("\n");
			  $("#geneselect").empty();
				var ddl = $("#geneselect"); 
				ddl.append("<option value='3'>Please select gene</option>");				
				for (k = 0; k < celllineList.length; k++)
					ddl.append("<option value='" + celllineList[k]+ "'>" + celllineList[k] + "</option>");
					return false;
				},
			 error : function(XMLHttpRequest, textStatus, errorThrown) {
				 alert("Parse error");
				
			 }
		});
}

function addMutationList(tissue,gene){
		$.ajax({
			type : 'POST',
			url : 'getgenemutations',
			dataType : 'text',
			data: {
				cancer:tissue,
				gene:gene
			},
			success : function(data1){
			  var celllineList=data1.split("\n");
			  $("#mutationselect").empty();
			  var ddl = $("#mutationselect"); 
			  ddl.append("<option value='1'>Please select mutation</option>");				
			  for (k = 0; k < celllineList.length; k++)
					ddl.append("<option value='" + celllineList[k]+ "'>" + celllineList[k] + "</option>");
					return false;
				
			
				},
			 error : function(XMLHttpRequest, textStatus, errorThrown) {
				//$('#waiting').hide(500);
				alert("Parse error");
				
			}
		});
		
}

function addList(){
	$.ajax({
		//asyn:false,
		type : 'POST',
		url : 'gettumor',
		dataType : 'text',
		success : function(data1){
			alert("vadsf"+data1);
			var tissueList=data1.split("\n");
			$("#tumorTypeselect").empty();
			var ddl = $("#tumorTypeselect");  
			ddl.append("<option value='2'>Please select tumor type</option>");				
		for (k = 0; k < tissueList.length; k++)
					ddl.append("<option value='" + tissueList[k]+ "'>" + tissueList[k] + "</option>");
					return false;
				
				
	     },
		 error : function(XMLHttpRequest, textStatus, errorThrown) {
					alert("Parse error");
		 }
	});
		
		
}
</script>