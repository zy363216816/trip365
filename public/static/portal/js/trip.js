!(function () {
    var menu = $('#main-menu li'),
        block = $('.block');
    menu.hover(function () {
        var $this = $(this);
        var liWidth = $this.width(),
            offset = $this.offset(),
            left = offset.left;
        block.animate({'left': left}, 50, function () {
            block.css('width', liWidth);
        });
    })
})();