var initPhotoSwipe = function(gallerySelector){
    var prepareItems = function(el){
        var items = [];
        for(c of el.children()){
            var figure = $(c);
            if(figure[0].nodeType !== 1) continue;
            var size = figure.find('a').data('size').split('x');
            var item = {
                src : figure.find('a').data('src'),
                w : parseInt(size[0], 10),
                h : parseInt(size[1], 10),
            };
            var capEl = figure.find('figcaption');
            if(capEl.length > 0) item.title = capEl.html();
            item.el = figure;
            items.push(item);
        }
        return items;
    }

    var openPhotoSwipe = function(index, galleryElement, disableAnimation){
        var pswpRoot = $('#photoswipe')[0];
        var items = prepareItems(galleryElement);
        options = {
            getThumbBoundsFn : function(index){
                var thumbnail = items[index].el.find('img')[0],
                    yOffset = window.pageYOffset || document.documentElement.scrollTop,
                    rect = thumbnail.getBoundingClientRect();
                return {x : rect.left, y:rect.top+yOffset, w:rect.width};
            },
            galleryUID : galleryElement.data('guid'),
            index : parseInt(index, 10),
        };
        
        if(disableAnimation) options.showAnimationDuration = 0;
        
        var g = new PhotoSwipe(pswpRoot, PhotoSwipeUI_Default, items, options);
        g.init();
    }


    $(gallerySelector + ' a').on('click', function(ev){
        ev.preventDefault ? ev.preventDefault() : ev.returnValue = false;
        var target = $(ev.target) || $(ev.srcElement);
        var clickedItem = target.closest('figure');
        var galleryRoot = clickedItem.parent();
        var nodeIndex = galleryRoot.children().index(clickedItem);
        if(nodeIndex >= 0) openPhotoSwipe(nodeIndex, galleryRoot);
        return false;
    });

}

initPhotoSwipe('.gallery');
