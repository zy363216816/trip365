if (typeof jQuery === "undefined") {
    throw new Error("Backend requires jQuery");
  }
  
  $.Backend = {};

  $(function () {

    "use strict";

    _initLogin();
    // login start
    function _initLogin(){
        var submit   = $('#sub'),
            captcha  = $('.captcha-img');
        submit.click(function(){
            var username = $('#username').val(),
                password = $('#password').val(),
                captcha  = $('#captcha').val(),
                form      = $('#login-form');
            if (username ===''){
                $.Pop.error('用户名不能为空！')
            }else if(password === ''){
                $.Pop.error('密码不能为空请输入密码！')
            }else if(captcha === ''){
                $.Pop.error('请输入验证码！')
            } else{
                NProgress.start();
                $.ajax({
                    url:form.attr('action'),
                    type:'post',
                    data:form.serialize(),
                    success:function(data){
                        if(data.success === true && data.code == '1'){
                            $.Pop.error('登录成功')
                            window.location.href = "/index.html";
                        }else{
                            $.Pop.error(data.msg);
                            
                        }
                        NProgress.done();
                    }
                })
            }     
            return false;
        });
        captcha.click(function () {
            this.src = this.src;
        })

    }
  });


  /**layer plugin */
  $.Pop = {};

  $.Pop = {
      error:function(msg){
        layer.msg(msg,{
            anim: 6
        })
      }
  };