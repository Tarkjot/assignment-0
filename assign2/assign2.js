        function error_msg(){
          
          //fetching all values from form
            var user_name=document.getElementById("reqd_usr").value;
            var password=document.getElementById("reqd_pswd").value;
            var email=document.getElementById("reqd_email").value;
            var city=document.getElementById("reqd_city").value;
            var date=document.getElementById("reqd_date").value;
            var age=document.getElementById("reqd_age").value;
            var intro=document.getElementById("reqd_intro").value;
            var gender = document.getElementsByName('gender'); 
            var dsgn = document.getElementsByName('designation'); 
    
        
        //Validation
            if(user_name=="") {
                document.getElementById("msg_usr").innerHTML='username cannot be empty';
                red_brdr("reqd_usr");
                }
            if(password=="") {
                document.getElementById("msg_pswd").innerHTML='password cannot be empty';
                red_brdr("reqd_pswd");
                }
                

            var mailformat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
              
            if(email=="") {
                document.getElementById("msg_email").innerHTML='email cannot be empty';
                red_brdr("reqd_email");
               
                }
                if(!email.match(mailformat)){
                    red_brdr("reqd_email");
                    document.getElementById("msg_email").innerHTML='email is incorrect';
                }
            if(date=="") {
                document.getElementById("msg_date").innerHTML='date must be selected';
                red_brdr("reqd_date");
            } 
            // Age Validation
            if(age=="") {
                document.getElementById("msg_age").innerHTML='age must be filled';
                red_brdr("reqd_pswd");
               } 
            if(isNaN(age)) {
                document.getElementById("msg_age").innerHTML='Not a number';
                red_brdr("reqd_age");
              } 
            
             if(age <10 || age > 50) {
                document.getElementById("msg_age").innerHTML='age must be in between 10 to 50';
                red_brdr("reqd_age");
            }
      
             if(intro=="") {
                document.getElementById("msg_intro").innerHTML='Write something please!!';
                red_brdr("reqd_intro");
               }
            if(city=="") {
            document.getElementById("msg_city").innerHTML='city must be selected';
            red_brdr("reqd_city");
            } 
                            
            var i=0;
            var flag=0;
          
            //validation on radio button  
            for(i = 0; i < gender.length; i++) { 
                if(gender[i].checked) {
                    flag=1;
                    }
            }
            if(flag!=1){
               document.getElementById("msg_gender").innerHTML='gender must be selected';
               
             }

           //validation on checked 
           for(i = 0; i < dsgn.length; i++) { 
              if(dsgn[i].checked) {
                  flag=1;
                  }
            }
            if(flag!=1){
               document.getElementById("msg_dsgn").innerHTML='designation must be selected';    
             }

           //validation on multiselect 
                 var multi = document.getElementById('reqd_multi'); 
                 for ( var i = 0; i < multi.selectedOptions.length; i++) {
                    if( multi.selectedOptions[i].value){
                      break;
                    }
                }
                if(i ==multi.selectedOptions.length){
                  document.getElementById("msg_err").innerHTML='Atleast select one';
                }
              
                   
           //Captcha validation
                var response = grecaptcha.getResponse();
                if(response.length == 0) {
                    document.getElementById('g-recaptcha-error').innerHTML = '<span style="color:red;">This field is required.</span>';
                    
                }
                function verifyCaptcha() {
                    document.getElementById('g-recaptcha-error').innerHTML = '';
                }
                     
        }
function remove_warning(x,y){
        document.getElementById(x).style["border-color"] = "#F8F8F8";
        document.getElementById(y).innerHTML = '';
}
function red_brdr(x){
       document.getElementById(x).style["border-color"]="red";
}
        
      
        
        