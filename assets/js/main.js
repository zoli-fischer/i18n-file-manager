$(document).ready(function(params) {
    $('#addLanguageModal').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget),
            modal = $(this),
            data = {
                index: button.data('index'),
                real_index: button.data('index'),
                default: button.data('default'),
                name: button.clone().children().remove().end().text(),
                prular_rule: button.data('prular_rule'),
                dec_point: button.data('dec_point'),
                thousands_sep: button.data('thousands_sep'),
                date_format: button.data('date_format')
            },
            is_edit = $.trim(data.index).length > 0;
        console.log(data.prular_rule);
        modal.find('.modal-title').text(is_edit ? 'Edit language' : 'Add language');
        for (i in data) {
            if (modal.find('.modal-body *[name="' + i + '"]').attr('type') === 'checkbox') {
                modal.find('.modal-body *[name="' + i + '"]').prop('checked', modal.find('.modal-body *[name="' + i + '"]').val() == data[i]);
            } else {
                modal.find('.modal-body *[name="' + i + '"]').val(is_edit ? data[i] : '');
            }
        }
        modal.find('.btn-primary').html(is_edit ? 'Update' : 'Add');
        modal.find('.btn-danger').attr('data-index', data.index).css('visibility',is_edit ? 'visible' : 'hidden');
        modal.find('.modal-body *[name="command"]').val(is_edit ? 'edit-language' : 'add-language');
        modal.find('.modal-footer *[type="submit"]').click(function(){
            modal.find('form').submit();
        });
    });

    $('#deleteLanguageModal').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget),
            modal = $(this),
            data = {
                index: button.data('index')
            };
        modal.find('.modal-title code').text(data.index);
        modal.find('.modal-footer *[type="submit"]').click(function () {
            modal.find('form').submit();
        });
    });
});
