$(document).ready( function() {
  // Breadcrumb
  $('#edit-pbp-breadcrumb').change(
    function() {
      div = $('#div-pbp-breadcrumb-collapse');
      if ($('#edit-pbp-breadcrumb').val() == 'no') {
        div.slideUp('slow');
      } else if (div.css('display') == 'none') {
        div.slideDown('slow');
      }
    }
  );
  if ($('#edit-pbp-breadcrumb').val() == 'no') {
    $('#div-pbp-breadcrumb-collapse').css('display', 'none');
  }
} );
