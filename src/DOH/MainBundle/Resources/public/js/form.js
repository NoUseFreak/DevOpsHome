$(function() {

    /**
     * Collection
     */
    $('ul.doh-form-collection').each(function() {
        var $collectionHolder = $(this);
        var $addTagLink = $('<a href="#" class="btn btn-primary add_link">Add</a>')
            .on('click', function (e) {
                e.preventDefault();
                addCollectionNewForm($collectionHolder, $newLinkLi);
            });
        var $newLinkLi  = $('<li class="list-group-item"></li>').append($addTagLink);

        $collectionHolder.find('li').each(function () {
            addCollectionDeleteLink($(this));
        });

        $collectionHolder.append($newLinkLi);
        $collectionHolder.data('index', $collectionHolder.find('li').length);
    });

    function addCollectionNewForm($collectionHolder, $newLinkLi) {
        var prototype = $collectionHolder.data('prototype');
        var index = $collectionHolder.data('index');
        $collectionHolder.data('index', index + 1);
        var $newFormLi = $('<li class="list-group-item"></li>').append(prototype.replace(/__name__/g, index));

        $newLinkLi.before($newFormLi);
        addCollectionDeleteLink($newFormLi);
    }

    function addCollectionDeleteLink($li) {
        var $removeLink = $('<a href="#" class="badge pull-right">X</a>');
        $li.prepend($removeLink);

        $removeLink.on('click', function (e) {
            e.preventDefault();
            $li.remove();
        });
    }

    /**
     * Select
     */
    $('select[multiple="multiple"]').select2();
});
