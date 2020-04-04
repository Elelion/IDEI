$(function () {
  $(document).on('submit', '#add-product-form', function () {
    $.ajax({
      url: '/site/addProduct',
      type: 'post',
      data: $('#add-product-form').serializeArray(),
      success: function () {

      },
      error: function () {

      }
    });

    return false;
  });
});