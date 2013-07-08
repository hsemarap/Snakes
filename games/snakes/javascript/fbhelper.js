

var fbapi ={


//Function accepts gameid (unique for every game) and returns the success of the performed operation (0 for false and 1 for true)
gameStarted : function( gameid , callback ){
			  	$.ajax({
			  		url:"index.php",
			  		async:true,
			  		type:"POST",
			  		dataType:"json",
			  		data: { 
			  				"game_start":1,
			  				"game_id":2

			  				},
			  		success:function(result){
			  			if (result){
			   	 			if(result.error === "Access Denied"){
			   	 				window.location.href=result.link.replace("redirect_uri=http%3A%2F%2Fdelta.nitt.edu%2Ffestember%2Fgames_12%2Findex.php","redirect_uri="+encodeURIComponent(window.location.href));
			   	 			}
			   	 		}
			   	 		else{
			   	 			if(callback){
			   	 				callback();
			   	 			}
			   	 		}
			   	 		
			  		},
			  		error:function(result){
			  			alert("An error occured. Please try again later."+result)
			  		}
			  	});
			  },
 
sendScore : function( gamescore, gameid , callback){//, callback ){
			  	$.ajax({
			  		url:"index.php",
			  		async:true,
			  		type:"POST",
			  		dataType:"json",
			  		data: { 
			  				"game_end":1,
			  				"game_score":gamescore,
			  				"game_id":2

			  				},
			  		success:function(result){
			   	 		console.log("success ",result);
			   	 		console.log(parseScores(result));
			   	 		if (callback)
			   	 			callback(parseScores(result));
			  		},
			  		error:function(result){
			  			console.log("error ",result)
			  		}
			  	});
			  },

			 

getHighScores : function( gameid ){//, callback ){
			  	$.ajax({
			  		url:"index.php",
			  		async:true,
			  		type:"POST",
			  		dataType:"json",
			  		data: { 
			  				"game_highscore":1,
			  				"game_id":2

			  				},
			  		success:function(result){
			   	 		console.log("success ",result);
			   	 		console.log(parseScores(result));
			  		},
			  		error:function(result){
			  			console.log("error ",result)
			  		}
			  	});
			  },
			 
};


function parseScores(res){
	ret = {};
	console.log("inside parser",res);
	//var limit = 10;
	for (entry in res){
		console.log("entry:",entry);
		ret[res[entry].fb_user_name] = res[entry].game_high_score;
	//	limit--;
	//	if(limit == 0){
	//		break;
	//	}
	}
	console.log("before parser end",ret)
	return ret;
}