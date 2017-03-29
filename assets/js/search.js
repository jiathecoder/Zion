
	
	$(document).ready(function(){
	  $("#search").keyup(function(){
		if($("#search").val().length>2){
			// console.log($("#search").val());
		$.ajax({
			type: "post",
			url: "../../mains/search_a_Book",
			cache: false,				
			data:'search='+$("#search").val(),
			success: function(response){
				// console.log(response);
				$('#finalResult').html("");
				var obj = JSON.parse(response); 
				console.log(obj);
				if(obj.length>0){
					try{
						var items=[]; 	
						$.each(obj, function(i,val){											
						    items.push($('<br><a href="/mains/book_review/'+obj[i].Id+'">').text(val.title));
						});	
						$('#finalResult').append.apply($('#finalResult'), items);
					}catch(e) {		
						alert('Exception while request..');
					}		
				}else{
					$('#finalResult').html($('<p/>').text("No Data Found"));		
				}		
				
			},
			error: function(){						
				alert('Error while request..');
			}
		});
		}
		return false;
	  });
	});
