$(document).ready(function(params) {
    $('#addLanguageModal').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget),
            modal = $(this),
            data = {
                index: button.data('index'),
                default: button.data('default'),
                name: button.html(),
                plural_rule: button.data('plural_rule'),
                dec_point: button.data('dec_point'),
                thousands_sep: button.data('thousands_sep'),
                date_format: button.data('date_format')
            },
            is_edit = $.trim(data.index).length > 0;

        modal.find('.modal-title').text(is_edit ? 'Edit language' : 'Add language');
        for (i in data) {
            if (modal.find('.modal-body *[name="' + i + '"]').attr('type') === 'checkbox') {
                modal.find('.modal-body *[name="' + i + '"]').prop('checked', modal.find('.modal-body *[name="' + i + '"]').val() == data[i]);
            } else {
                modal.find('.modal-body *[name="' + i + '"]').val(is_edit ? data[i] : '');
            }
        }
    });
});
