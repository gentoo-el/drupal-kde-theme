
Drupal.behaviors.searchform = function(context) {
  $('#edit-search-theme-form-1').val(Drupal.t('Search...'));

  $('#edit-search-theme-form-1').focus(function(){
    if (Drupal.t('Search...') == $(this).val()) {
      $(this).val('');
    }
  }).blur(function(){
    if ($(this).val().length == 0) {
      $(this).val(Drupal.t('Search...'));
    }
  });
}