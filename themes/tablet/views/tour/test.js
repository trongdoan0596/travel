function ShowRegister(){
    $('#idfrmlogin').hide();
    $('#idfrmregister').show();
}
function ShowLogin(){
    $('#idfrmlogin').show();
    $('#idfrmregister').hide();
}
function IsEmail(email) {
        var regex = /^([a-zA-Z0-9_\.\-\+])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
        if(!regex.test(email)) {
           return false;
        }else{
           return true;
        }
 }
function frmLogin(){
     var username  = $('#username').val();
     var password = $('#password').val();
      if(username== '' || username.length<4){
         alert('T�n dang nh?p >=6 k� t?!');
         return false;
      }
      if(/^[a-zA-Z0-9- ]*$/.test(username) == false) {
         alert('T�n dang nh?p kh�ng du?c ch?a k� t? d?c bi?t!');
         return false;
      }
     if(password== '' || password.length<6){
         alert('M?t kh?u ph?i >=6 k� t?!');
         return false;
     }
     document.frmlogin.submit();        
}
function frmRegister(){
     var username  = $('#usernamesignup').val();
     var password = $('#passwordsignup').val();
     var password1 = $('#passwordsignup_confirm').val();
     var e_mail = $('#emailsignup').val();
     var mobile = $('#mobilesignup').val();
     
     if(username== '' || username.length<4){
         alert('T�n dang nh?p >=6 k� t?!');
         return false;
      }
      if(/^[a-zA-Z0-9- ]*$/.test(username) == false) {
          alert('T�n dang nh?p kh�ng du?c ch?a k� t? d?c bi?t!');
         return false;
      }
      if(mobile== '' || mobile.length<9){
         alert('S? di?n tho?i >=9 k� t?!');
         return false;
      }
      if(/^[0-9]*$/.test(mobile) == false) {
          alert('S? di?n tho?i kh�ng du?c ch?a k� t? d?c bi?t!');
         return false;
      }
      if(e_mail== ''){
           alert('�?a ch? Email kh�ng d? tr?ng!');
          return false;
      }
     if(IsEmail(e_mail)==false){
           alert('�?a ch? Email kh�ng h?p l?!');
         return false;
     }
     if(password== '' || password.length<6){
          alert('M?t kh?u ph?i >=6 k� t?!');
         return false;
     }
     if(password != password1){
         alert('M?t kh?u kh�ng gi?ng nhau!');
         return false;
      }
     
    document.frmregister.submit();        
}
function frmUpdateProfile(){    
     var password = $('#passwordsignup').val();     
     var e_mail = $('#emailsignup').val();
     var mobile = $('#mobilesignup').val(); 
     if(mobile== '' || mobile.length<9){
         alert('S? di?n tho?i >=9 k� t?!');
         return false;
      }
      if(/^[0-9]*$/.test(mobile) == false) {
          alert('S? di?n tho?i kh�ng du?c ch?a k� t? d?c bi?t!');
         return false;
      }
      if(e_mail== ''){
           alert('�?a ch? Email kh�ng d? tr?ng!');
          return false;
      }
     if(IsEmail(e_mail)==false){
           alert('�?a ch? Email kh�ng h?p l?!');
         return false;
     }
     if(password== '' || password.length<6){
          alert('M?t kh?u ph?i >=6 k� t?!');
         return false;
     }  
    document.frmupdateprofile.submit();        
}
function shareFacebook(userId,userName, gameId ,totalSccore){
    FB.init( {
          appId: '168631436915278', // App ID
          channelUrl : 'http://chanchuoi.didongexpress.vn/index.php', // Channel File
          status : true, // check login status
          cookie: true, // enable cookies to allow the server to access the session
          oauth: true, // enable OAuth 2.0
          xfbml: true  // parse XFBML
      } );
      FB.apiDidInit = true;

      FB.Event.subscribe('auth.statusChange', function(response) {
          if(response.status == 'connected') {
              //this.shareFacebook();
                   if(!FB.apiDidInit) {
                          this.initFaceBook();
                      }else{
                          FB.ui({
                              method: 'share',
                              quote: "Ch�c m?ng " + userName + " d� d?t du?c " + totalSccore + " di?m trong game chan chu?i c?a didongexpress.vn. H�y c�ng tham gia d? c�ng rinh qu� v? n�o!",
                              href: 'http://chanchuoi.didongexpress.vn/index.php',
                          }, function(response){
                             // sendShareCompleteGameAPI(function (params) {   }.bind(this))
							  $.ajax({
										type: "POST",
										url: 'http://chanchuoi.didongexpress.vn/actions.php?cmd=sharefb',
										data: ({"gameid":gameId,"userId":userId}),
										dataType: "json"			
										}).done(function( data ) {
											alert('C?m on b?n d� share facebook');	
									});
			
                          }.bind(this));
                      }
          }
      }.bind(this));      
}