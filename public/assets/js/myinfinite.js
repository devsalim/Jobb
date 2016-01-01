(function(){
    var loading_options = {
        finishedMsg: "<div class='end-msg'>That's all!</div>",
        msgText: "<div class='center'>Loading more posts...</div>",
        img: "/assets/loader.gif"
    };

    $('#post-items').infinitescroll({
      loading : loading_options,
      navSelector  : ".pagination",
      nextSelector : ".pagination li.active + li a",
      itemSelector : ".post-item",
      debug        : false,
      dataType     : 'html',
      path         : function(index) {
          return "?page=" + index;
      }
    });
})();