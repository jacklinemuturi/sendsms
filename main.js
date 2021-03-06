$(document).ready(function(){
    $("#register").click(function(event)
    { 
        // ajax post
        $.post("signup_insert.php",
        // ajax data
        {
            name:$('#name').val(),
            uname:$('#uname').val(),
            phone:$('#phone').val(),
            password:$('#password').val(),
            confirm:$('#confirm').val()
        },
        // ajax callback
        function(response)
        {
            if(response == "success")
            {
                window.location.href = "activate.php";
            }else{
                $('#response').html(response);
            }
        });
    });
        // activate file
    $("#activate").click(function()
    { 
        // ajax post
        $.post("confirm_active.php",
        // ajax data
        {
            activate:$('#code').val()
        },
        // ajax callback
        function(response)
        {
            if(response == "successful")
            {
                window.location.href = "index.php";
            }else{
                $('#activateresponse').html(response);
            }
        });
    }); 
        // add contacts
    $("#addnew").click(function()
    { 
        // ajax post
        $.post("addnumber_insert.php",
        // ajax data
        {
            contactName:$('#contactName').val(),
            contactNumber:$('#contactNumber').val(),
        },
        // ajax callback
        function(response)
        {
            if(response == "successfully added")
            {
                location.reload();
            }else if(response == "login"){
                window.location.href = "login.php";
            }else{
                $('#contactresponse').html(response); 
            }
        });
    });
        // message sending
    $("#msgbtns button").click(function(){
        var append = $(this).attr("value");

        console.log($("#messagephone"+append).val());
        console.log($("#messagename"+append).val());
        console.log($("#messagetext"+append).val());
        
        $.post("message_insert.php",
        {
            messagephone:$("#messagephone"+append).val(),
            messagename:$("#messagename"+append).val(),
            messagetext:$("#messagetext"+append).val()
        },
        function(response)
        {
            if(response == "sent")
            {
                window.location.href = "index.php";
            }else{
                $('#msgbtnsresponse'+append).html(response);
            }
        
        });
    });
    // forgot password_username1
    $("#forgot1").click(function()
    { 
        // ajax post
        $.post("forgot_username_update.php",
        // ajax data
        {
            username_forgotpassword:$('#username_forgotpassword').val(),
        },
        // ajax callback
        function(response)
        {
            if(response == "success")
            {
                window.location.href ="login.php";
            }else{
                $('#forgot1response').html(response); 
            }
        });
    });
     // reset_forgot_password
     $("#reset").click(function()
     { 
         // ajax post
         $.post("reset_forgotpassword_update.php",

         // ajax data
         {
             old_password    :$('#old_password').val(),
             new_password    :$('#new_password').val(),
             confirm_password:$('#confirm_password').val()

         },
         // ajax callback
         function(response)
         {
             if(response == "success")
             {
                 window.location.href ="login.php";
             }else{
                 $('#resetresponse').html(response); 
             }
         });
     });
    // login
    $("#login").click(function()
    { 
        // ajax post
        $.post("login_session.php",
        // ajax data
        {
            login_username :$('#login_username').val(),
            login_password :$('#login_password ').val()

        },
        // ajax callback
        function(response)
        {
            if(response == "success")
            {
                window.location.href = "index.php";
            }else{
                $('#loginresponse').html(response); 
            }
        });
    });
});

