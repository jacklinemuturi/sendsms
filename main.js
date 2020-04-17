$(document).ready(function(){
    $("#register").click(function(event)
    { 
        // ajax post
        $.post("signup_insert.php",
        // ajax data
        {
            name:$('#name').val(),
            uname:$('#uname').val(),
            email:$('#email').val(),
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

    $("#msgbtns button").click(function(){
        var append = $(this).attr("value");

        console.log($("#messagephone"+append).val());
        console.log($("#messagetext"+append).val());
        
        $.post("message_insert.php",
        {
            messagephone:$("#messagephone"+append).val(),
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
    })
   
});

