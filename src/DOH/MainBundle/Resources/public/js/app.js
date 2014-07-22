/**
 * Keyboard shortcuts
 */
//Mousetrap.bind('?', function() { $('#doh-keyboard-help').modal('show') });
$(function() {
    $('[data-toggle=tooltip]').tooltip();

    moment.defaultFormat = 'DD-MM-YYYY HH:mm:ss';

    $('time.moment')
        .html(function () {
            return moment($(this).attr('datetime')).fromNow();
        })
        .tooltip({
            title: function() {
                return moment($(this).attr('datetime')).format();
            }
        });
});
hljs.initHighlightingOnLoad();
