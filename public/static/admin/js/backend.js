if (typeof jQuery === "undefined") {
    throw new Error("Backend requires jQuery");
}
var selector = {
    sidebar: $(".sidebar-menu"),
    iframe: $("#iframe"),
    menu: $(".menu-item"),
    treeView : $(".treeview")
};
$(function () {

    "use strict";

    _initLogin();
    _init();

    // login start
    function _initLogin() {
        var submit = $('#sub'),
            captcha = $('.captcha-img');
        submit.click(function () {
            var username = $('#username').val(),
                password = $('#password').val(),
                captcha = $('#captcha').val(),
                form = $('#login-form');
            if (username === '') {
                $.Pop.error('用户名不能为空！')
            } else if (password === '') {
                $.Pop.error('密码不能为空请输入密码！')
            } else if (captcha === '') {
                $.Pop.error('请输入验证码！')
            } else {
                NProgress.start();
                $.ajax({
                    url: form.attr('action'),
                    type: 'post',
                    data: form.serialize(),
                    success: function (data) {
                        if (data.success === true && data.code === '1') {
                            $.Pop.error('登录成功');
                            window.location.href = "/index.html";
                        } else {
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
        });
    }
    $.Backend = {};
    function _init() {
        var $path = location.search;
        if ($path !== '' || $path != null) {
            var url = $path.substr(6),
                $parent  = selector.sidebar.find('.menu-item[href="' + url + '"]').parent('li'),
                $parents  = selector.sidebar.find('.menu-item[href="' + url + '"]').parents('li.treeview');
            selector.menu.removeClass("active");
            selector.treeView.removeClass("active");
            $parent.addClass('active');
            $parents.addClass('active');
            selector.iframe.attr('src', url);
        }
    }

    var menu = {
        _init: function () {
            var menu = selector.menu;
            menu.click(function () {
                event.preventDefault();
                var _href = $(this).attr('href'),
                    li = $(this).parent('li'),
                    states = {
                        title: $(this).text(),
                        url: _href,
                        time: new Date().getTime()
                    };
                if (!li.hasClass('active')) {
                    menu.parent('li').removeClass('active');
                    li.addClass('active');
                }
                selector.iframe.attr('src', _href);
                if (history.pushState) {
                    window.history.pushState(states, states.title, '?path=' + _href);
                    document.title = states.title;
                }
            });
        }
    };
    menu._init();
});

/**layer plugin */
$.Pop = {};

$.Pop = {
    error: function (msg) {
        layer.msg(msg, {
            anim: 6
        })
    }
};

