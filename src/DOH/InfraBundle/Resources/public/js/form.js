
(function () {
    var $guide = $('#doh_infra_server_changelog_guide')
    $guide.change(function() {
        var $form = $(this).closest('form');
        var data = {};
        data[$guide.attr('name')] = $guide.val();

        $.ajax({
            url : $form.attr('action'),
            type: $form.attr('method'),
            data : data,
            success: function(html) {
                var $newFormFields = $(html).find('#doh_infra_server_changelog_guideParameters');

                if ($newFormFields) {
                    $('#doh_infra_server_changelog_guideParameters').replaceWith($newFormFields);
                }
            }
        });
    });
})();


