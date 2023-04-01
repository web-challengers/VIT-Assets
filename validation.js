function null_textfield(k) 
      {
          
        if(k=="name")
        {
                 //   var x = document.getElementById("t5").value;
                    var regName = /^[a-zA-Z]+ [a-zA-Z]+$/;
                    var name = document.getElementById("name").value;
                    if(!regName.test(name))
                    {                    
                        document.getElementById("div_name").innerHTML="Enter Firstname and Lastname";
                        document.getElementById("div_name").style.color="Red";                                                                            
                    }                   
                    else
                    {
                        document.getElementById("div_name").innerHTML=" ";
                    }
        }

        if(k=="phone")
          {
            var regName = /^\(?([0-9]{3})\)?[-. ]?([0-9]{3})[-. ]?([0-9]{4})$/; 
            var name = document.getElementById("phone").value;
            if(!regName.test(name))
            {                    
                document.getElementById("div_phone").innerHTML="Enter valid phone number";
                document.getElementById("div_phone").style.color="Red";                                                                            
            }                   
            else
            {
                document.getElementById("div_phone").innerHTML=" ";
            }
   
          }

          if(k=="email")
          {
            var regName = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/ ;
            var name = document.getElementById("email").value;
            if(!regName.test(name))
            {                    
                document.getElementById("div_email").innerHTML="Enter valid email-id";
                document.getElementById("div_email").style.color="Red";                                                                            
            }                   
            else
            {
                document.getElementById("div_email").innerHTML=" ";
            }
   
          }
    }
