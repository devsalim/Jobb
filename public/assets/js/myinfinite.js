(function(){
    var loading_options = {
        finishedMsg: "<div class='end-msg'>That's all!</div>",
        msgText: "<div class='center'>Loading more jobs...</div>",
        img: "/assets/loader.gif"
    };

    $('#post-items').infinitescroll({
      loading : loading_options,
      navSelector  : "#job .pagination",
      nextSelector : "#job .pagination li.active + li a",
      itemSelector : ".post-item",
      debug        : false,
      dataType     : 'html',
      path         : function(index) {
          return "?page=" + index;
      }
    });
})();

(function(){
    var loading_options = {
        finishedMsg: "<div class='end-msg'>That's all!</div>",
        msgText: "<div class='center'>Loading more skills...</div>",
        img: "/assets/loader.gif"
    };

    $('#post-skill-items').infinitescroll({
      loading : loading_options,
      navSelector  : "#skill .pagination",
      nextSelector : "#skill .pagination li.active + li a",
      itemSelector : ".post-skill-item",
      debug        : false,
      dataType     : 'html',
      path         : function(index) {
          return "?page=" + index;
      }
    });
})();