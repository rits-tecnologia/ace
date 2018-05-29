module.exports = (function () {
    /**
     * Attach methods to tables.
     * @private
     */
    function _attachEvents() {
        $('.table-orderable .fa-bars').css('cursor', 'pointer');
        $('.table-orderable').rowSorter({
            handler: '.fa-bars',
            onDrop: _sendToBackend
        });
    }

    /**
     * Send data to backend.
     * @param {DOMElement} tbody
     * @param {DOMElement} row
     * @param {int} new_index
     * @param {int} old_index
     * @private
     */
    function _sendToBackend(tbody, row, new_index, old_index) {
        let endpoint = $(tbody).parents('table').attr('data-reorder');

        $.post(endpoint, {
            id: row.getAttribute('data-id'),
            order: new_index
        }).done((response) => {
            new Noty({ text: response.message, type: response.type }).show();
        }).fail(() => {
            new Noty({ text: 'Falha ao reordernar itens.', type: 'error' }).show();
        });
    }

    /**
     * Enable mask selectors.
     */
    function init() {
        _attachEvents();
    }

    return { init };
})();
