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


$(function(){
    var $form = $('.navbar-fixed-top form');
    $form
        .on('click', 'button', function() {
            if (!$form.find('input').val()) {
                $form.toggleClass('open');
                return false;
            }
        })
    ;
});

$(function(){
    (function() {
        var updateContentHeight = function() {
            var height = ($(document).height() - $('.page-header').height() * 2 )+ 'px';
            $('.page-content').css('min-height', height);
        };
        updateContentHeight();
        $(window).resize(function() {
            updateContentHeight();
        });
    })();
});
