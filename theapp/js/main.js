 function check(){
         
		 var un = document.getElementById('username').value;
       var action = 'check';
$.getJSON(domain+'/json_backend.php?callback=?','un='+un+'&action='+action,function(res){

  //document.write('<b>'+res.status+'</b><br>');
   document.getElementById('result').innerHTML = '<b>'+res.status+'</b>';

});
           
       }
       
        function login(){
           
       var un = document.getElementById("username").value;
       var pw = document.getElementById("password").value;
       
       //The action
       var action = 'login';
       
    $.getJSON(domain+'/json_backend.php?callback=?','un='+un+'&pw='+pw+'&action='+action,function(res){
		
		if(res.status=="logged-in"){
			document.addEventListener("deviceready", onDeviceReady, false);
			window.localStorage.setItem("username", un);
			window.localStorage.setItem("password", pw);
			window.location = "main.html";
		}
		
		else{
       		document.getElementById('message').innerHTML = '<b>'+res.status+'</b>';
		}
    });
}
        function forgot(){
           
       var em = document.getElementById("email").value;
       
       //The action
       var action = 'forgot';
       
    $.getJSON(domain+'/json_backend.php?callback=?','em='+em+'&action='+action,function(res){

      document.write('<b>'+res.status+'</b><br>');

    });
}
	   
	   function signup(){
		   var un = document.getElementById('username').value;
       
       var em = document.getElementById('email').value;
	   var pw = document.getElementById('password').value;
	   var pw2 = document.getElementById('password2').value;
       var action = 'reg';
	   if(document.getElementById('email').value == '' || document.getElementById('username').value =='' ||document.getElementById('password').value =='' ||document.getElementById('password2').value ==''){
		   document.getElementById('message').innerHTML ='<b>All fields must be compleated</b>';
	   }
	   else{
	   if(pw==pw2){
		   $.getJSON(domain+'/json_backend.php?callback=?','un='+un+'&pw='+pw+'&em='+em+'&action='+action,function(res){
			   
			
			 if(res.status =='Please enter a valid email address'){
                         document.getElementById('message').innerHTML ='<b>'+res.status+'</b>';
			 }
                         else{
                            document.getElementById('message').innerHTML ='<b>'+res.status+'</b>';
                            document.getElementById('email').value ='';
                            document.getElementById('username').value ='';
                            document.getElementById('password').value ='';
                            document.getElementById('password2').value ='';
                            document.getElementById('result').innerHTML = '';
			 }
                         if(res.status =='Email is already in use'){
                         document.getElementById('message').innerHTML ='<b>'+res.status+'</b>';
                         }
			 else{
                            document.getElementById('message').innerHTML ='<b>'+res.status+'</b>';
                            document.getElementById('email').value ='';
                            document.getElementById('username').value ='';
                            document.getElementById('password').value ='';
                            document.getElementById('password2').value ='';
                            document.getElementById('result').innerHTML = '';
			 }

});
		   }
		   else{
                       document.getElementById('passw').innerHTML = '<b>Passwords do not match</b>';
                       document.getElementById('message').innerHTML ='';
                       document.getElementById('result').innerHTML = '';
		   }
	   }
       

	   }

     function logout()
     {  
      document.addEventListener("deviceready", logOutReady, false);
          
     }
     function logOutReady(){
      window.localStorage.removeItem("username");
          window.localStorage.removeItem("password");
          window.location = "index.html";
     }