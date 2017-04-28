(function($){
    $(document).ready(function($) {
        $("ul#menu-top-menu").each(function () {
            var list = $(this);
            var currentDistance = 0;
            var currentLine = 0;

            list.find("li").each(function () {
                var item = $(this);
                var offset = item.offset();
                var topDistance = offset.top;
                if (topDistance > currentDistance) {
                    currentDistance = topDistance;
                    currentLine += 1;
                    item.addClass("new-line");
                }
                item.addClass("line-" + currentLine);
            });
        });
    });
})(jQuery);
