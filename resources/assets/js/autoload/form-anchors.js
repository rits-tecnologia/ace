(($) => {
    let $selectors = $('[data-method]');

    function forward($item) {
        var method = $item.data('method');
        var action = $item.attr('href');
        var token = $('meta[name="csrf-token"]').attr('content');

        var form =
            $('<form>', {
                'method': 'POST',
                'action': action
            });

        var token =
            $('<input>', {
                'type': 'hidden',
                'name': '_token',
                'value': token
            });

        var hiddenInput =
            $('<input>', {
                'name': '_method',
                'type': 'hidden',
                'value': method
            });

        return form.append(token, hiddenInput)
            .appendTo('body')
            .submit();
    };

    $selectors.each(function () {
        let $item = $(this);

        $item.on('click', function (e) {
            e.preventDefault();

            let confirmation;
            let $this = $(this);

            if (confirmation = $this.data('confirm')) {
                var type = {
                  'post': 'info',
                  'patch': 'warning',
                  'put': 'warning',
                  'delete': 'error',
                }[$this.data('method').toLowerCase()] || 'warning';

                var n = new Noty({
                    type: type,
                    text: confirmation,
                    buttons: [
                        Noty.button('Confirmar', 'btn btn-' + type, function () {
                            forward($this);
                        }),
                        Noty.button('Cancelar', 'btn btn-default', function () {
                            n.close();
                        })
                    ]
                }).show();
            }

            return false;
        });
    });
})(window.jQuery);

