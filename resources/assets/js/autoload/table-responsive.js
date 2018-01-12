(($) => {
    let $tables = $('.table-responsive');

    $tables.on('shown.bs.dropdown', function (e) {
        const $this = $(this);
        const $menu = $(e.target).find('.dropdown-menu');
        const offsetTop = $this.offset().top + $this.height();
        const offsetBottom = $menu.offset().top + $menu.outerHeight(true);
        const distance = 20;

        if ($this[0].scrollWidth > Math.round($this.innerWidth())) {
            if (offsetBottom + distance > offsetTop) {
                $this.css('padding-bottom', ((offsetBottom + distance) - offsetTop));
            }
        } else {
            $this.css('overflow', 'visible');
        }
    }).on('hidden.bs.dropdown', function () {
        $(this).css({ "padding-bottom": "", "overflow": "" });
    });
})(window.jQuery);
