
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>AJAX: Sign Up Page</title>

        <script src="https://code.jquery.com/jquery-3.1.0.js"></script>
        <script>
        
            function validateForm() {
                
                return false;
           
            }
            
        </script>
        
        
        
        <script>
            
            $(document).ready( function(){
                
                $("#username").change(function()
                {
                    //alert(  $("#username").val() );
                    $.ajax({

                        type: "GET",
                        url: "checkUsername.php",
                        dataType: "json",
                        data: { "username": $("#username").val() },
                        success: function(data,status) {
                        
                            //alert(data.password);
                            
                            if (!data) {  //data == false
                                
                                alert("Username is AVAILABLE!");
                                $("#success").html('<span style="color:green">did work</span>.')

                             //$("#success").show();

                                
                            } else {
                                
                                //alert("Username ALREADY TAKEN!");
                                $("#failure").html('<span style="color:red">did not work</span>.')
                            }
                        
                        },
                        complete: function(data,status) { //optional, used for debugging purposes
                        //alert(status);
                        }
                        
                    });//ajax
                    
                    
                });
                
                /*$("#password").change(function()
                {
                        data = { "password": $("#password").val() }
                        data2 = { "password": $("password").val() },
                         {
                        
                            //alert(data.password);
                            
                            if (data  data2) {  //data == false
                                
                                alert("passwords match");
                                $("#success").html('<span style="color:green">match</span>.')

                             //$("#success").show();

                                
                            } else {
                                
                                alert("Passwords don't match!");
                                $("#failure").html('<span style="color:red">failure</span>.')
                            }
                    
                    
                });*/
                
                $("cPassword").keyup(checkPasswordMatch());
                
                function checkPasswordMatch() {
                var password = $("#password").val();
                var confirmPassword = $("#cPassword").val();
            
                if (password == confirmPassword)
                    $("#success").html("Passwords match.");
                else
                    $("#failure").html("Passwords do not match!");

            }
                
                $("#state").change(function() {
                    //alert($("#state").val());
                    
                    $.ajax({

                        type: "GET",
                        url: "http://itcdland.csumb.edu/~milara/ajax/countyList.php",
                        dataType: "json",
                        data: { "state": $("#state").val()},
                        success: function(data,status) {
                          
                        //   alert(data[0].county);
                        $("#county").html("<option> - Select One -</option>");
                        for(var i = 0; i < data.length; i++){
                             $("#county").append("<option>" + data[i].county + "</option>");
                        }
                        
                        },
                        complete: function(data,status) { //optional, used for debugging purposes
                        //alert(status);
                        }
                    
                    });//ajax
                    
                    
                    
                });
                
                $("#zipCode").change( function(){  
                    
                    //alert( $("#zipCode").val() );  
                    
                    $.ajax({

                        type: "GET",
                        url: "http://itcdland.csumb.edu/~milara/ajax/cityInfoByZip.php",
                        dataType: "json",
                        data: { "zip": $("#zipCode").val()   },
                        success: function(data,status) {
                          
                          //alert(data.city);
                          $("#city").html(data.city);
                        
                        },
                        complete: function(data,status) { //optional, used for debugging purposes
                        //alert(status);
                        }
                        
                    });//ajax
                    
                    
                    
                } );
                
            }   ); //documentReady
            
            
            
        </script>
        
        <div id = "failure"> </div>
        <div id = "success">  </div>

    </head>

    <body>
    
       <h1> Sign Up Form </h1>
    
        <form onsubmit="return validateForm()">
            <fieldset>
               <legend>Sign Up</legend>
                First Name:  <input type="text"><br> 
                Last Name:   <input type="text"><br> 
                Email:       <input type="text"><br> 
                Phone Number:<input type="text"><br><br>
                Zip Code:    <input type="text" id="zipCode"><br>
                City:        <span id="city"></span>
                <br>
                Latitude: 
                <br>
                Longitude:
                <br><br>
                State: 
                <select id="state">
                    <option value="">Select One</option>
                    <option value="ca"> California</option>
                    <option value="ny"> New York</option>
                    <option value="tx"> Texas</option>
                    <option value="va"> Virginia</option>
                </select><br />
                
                Select a County: <select id="county"></select><br>
                
                
                Desired Username: <input type="text" id = "username"><br>
                
                Password: <input type="password"><br>
                
                Type Password Again: <input type="cPassword"><br>
                
                <input type="submit" value="Sign up!">
                <br />
            </fieldset>
        </form>
      
      
      
      
      
      
      
      
      
      
      
      
      
      
      
      
      
      
      
      
      
      
      
      
    </body>
</html>