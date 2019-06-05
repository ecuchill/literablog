(function ($, Drupal) {

  var initialized;
 function addSearchIcon (){
   if (!initialized){
     initialized = true;
   }
   $("#edit-submit-search-review").append('<i class="fas fa-search"></i>');
   console.log("Prueba");


 }

 Drupal.behaviors.customSearchBar = {
   attach: function (context, settings) {

    $("#edit-submit-search-review", context).once('customSearchBar').each(function(){
      $("#edit-submit-search-review").append('<i class="fas fa-search"></i>');
      console.log("Prueba");
    });
   // addSearchIcon();
   //
   }
 };

})(jQuery, Drupal);



