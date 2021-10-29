/*
 *
 * login-register modal
 * Autor: Creative Tim
 * Web-autor: creative.tim
 * Web script: http://creative-tim.com
 *
 */
function showRegisterForm(){
    $('.loginBox').fadeOut('fast',function(){
        $('.registerBox').fadeIn('fast');
        $('.login-footer').fadeOut('fast',function(){
            $('.register-footer').fadeIn('fast');
        });
        $('.modal-title').html('Register with');
    });
    $('.error').removeClass('alert alert-danger').html('');

}
function showLoginForm(){
    $('#loginModal .registerBox').fadeOut('fast',function(){
        $('.loginBox').fadeIn('fast');
        $('.register-footer').fadeOut('fast',function(){
            $('.login-footer').fadeIn('fast');
        });

        $('.modal-title').html('Login with');
    });
     $('.error').removeClass('alert alert-danger').html('');
}

function openLoginModal(){
    showLoginForm();
    setTimeout(function(){
        $('#loginModal').modal('show');
    }, 230);

}
function openRegisterModal(){
    showRegisterForm();
    setTimeout(function(){
        $('#loginModal').modal('show');
    }, 230);

}

function loginAjax(){
    var username = $('input[name=username]', '#login-form').val();
    var password = $('input[name=password]', '#login-form').val();
    var user_type = $('input[name=user_type]:checked', '#login-form').val();

    if(username == "" || password == "") {
        shakeModal();
    }

    var url = "http://api-ijin.mmhp.tech/user/"+user_type+"/login/";
    console.log(username +", "+ password +", "+ user_type);
    $.post(url, { username: username, password: password })
    .done(function(response) {
        var data = JSON.parse(response);
        if(data.error == false) {
            var user = data.data;
            // Set cookie login
            var now = new Date();
            var time = now.getTime();
            var expireTime = time + 1000*36000;
            now.setTime(expireTime);
            document.cookie = 'user_id='+user.id+';expires='+now.toUTCString()+';path=/';
            document.cookie = 'username='+user.username+';expires='+now.toUTCString()+';path=/';
            document.cookie = 'role='+data.role+';expires='+now.toUTCString()+';path=/';
            window.location.replace("/");
            return;
        }
        shakeModal()
    });
    // $.post(url, function(data) {
    //     console.log(data);
    //     if(data == 1){
    //         // Set cookie login
    //         // var date = new Date("Februari 10, 2013");
    //         // var dateString = date.toGMTString();
    //         // var cookieString = "Css=document.getElementById("css").href" + dateString;
    //         // document.cookie = cookieString;
    //         // window.location.replace("/home");
    //     } else {
    //         shakeModal();
    //     }
    // });
}

function shakeModal(){
    $('#loginModal .modal-dialog').addClass('shake');
             $('.error').addClass('alert alert-danger').html("Invalid email/password combination");
             $('input[type="password"]').val('');
             setTimeout( function(){
                $('#loginModal .modal-dialog').removeClass('shake');
    }, 1000 );
}
