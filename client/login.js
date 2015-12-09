var url_base = "http://wwwp.cs.unc.edu/Courses/comp426-f15/users/luiculau/Codiad/workspace/cs426/WeRole/server"; //fix this

$(document).ready(function(){
	
	//this function will get the information to the new account and try to add it to the database
	//if nickname already exists, the answer will include an error message and the person will have to try again.
	$('#newacc').click(function() {		
		$newemail = document.getElementById("new_email").value;
		$newpassword = document.getElementById("new_password").value;
		$newnickname = document.getElementById("new_nickname").value;
		if($newemail =="" || $newpassword =="" ||$newnickname==""){
			alert("Please fill in all the fields to create a New Account");
			return;
		}
		else{
			alert($newemail+""+$newpassword+""+$newnickname);
			
			//here the code to send the data to the database
			$.ajax(url_base + "/login2.php",
					{type: "POST",
						  dataType: "json",
						  data: { "newacc": 1, "newnickname": $newnickname, "newemail" : $newemail, "newpassword" : $newpassword},
						  success: function(todo_json, status, jqXHR) {
						  	alert(jqXHR.responseText);
						  		newemail = "";
								newpassword = "";
								newnickname= "";
							window.location.replace("home.html"); //or .assign instead of replace
					      }, 
						  error: function(jqXHR, status, error) {
						  	alert(jqXHR.responseText);
					      }});
			
		}	
    });
    
   	$('#start').click(function() {		
		$nickname = document.getElementById("user_nickname").value;
		$password = document.getElementById("user_password").value;
		if($nickname =="" || $password ==""){
			alert("Please fill in all the fields.");
			return;
		}
		else{
			alert($nickname+$password);
			$.ajax(url_base + "/login2.php",
			       {type: "POST",
				       dataType: "json",
				       data: { "newacc": 0, "nickname": $nickname, "password" : $password },
				       success: function(todo_ids, status, jqXHR) {
				       		//set current user logged in 
				  			window.location.replace("home.html");
					   },
					   error: function(jqXHR, status, error) {
						  	alert(jqXHR.responseText);
					   }
			        }
			);
		}
   	});
});
 	
    //this function is used to login on an existing account



