(function ($, Drupal) {

 Drupal.behaviors.customSearchBar = {
   attach: function (context, settings) {

     $("#edit-submit-search-review").empty();
     $("#edit-submit-search-review").append('<i class="fas fa-search"></i>');
    /*$("#edit-submit-search-review", context).once('customSearchBar').each(function(){
    });
    */

    $("li.expanded.dropdown a span.caret").remove();
    $("li.expanded.dropdown").hover(function(){
      if($(this).hasClass('open')){
        $(this).removeClass('open');
        console.log("cerrado");
      }else{
        $(this).addClass('open');
        console.log("abierto");
      }

    })

   }
 };

 Drupal.behaviors.navScrollUpDown = {
  attach: function (context, settings) {

    var c, currentScrollTop = 0,
    navbar = $('#navbar');

$(window).scroll(function () {

  var a = $(window).scrollTop();
   var b = navbar.height();

   currentScrollTop = a;

   if (c < currentScrollTop && a > b + b) {
     navbar.addClass("scrollUp");
   } else if (c > currentScrollTop && !(a <= b)) {
     navbar.removeClass("scrollUp");
   }
   c = currentScrollTop;
});

  }
};

})(jQuery, Drupal);




