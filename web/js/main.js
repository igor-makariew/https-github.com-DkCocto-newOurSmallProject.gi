//$(document).on("click", 'reg', function(e){
//  e.preventDefault();
//  $('.site-form_registration').html('Загружаю...');
//  $.ajax({
//      url: '/site/form-registration',
//      type: 'get',
//      async: 'false',
//      success: function(res) {
//          $('.site-form_registration').html(res);
//          // console.log('Всё хорошо!!!');
//      },
//      error:function(res) {
//         console.log('ERROR'); 
//      }
//  });
//});

$('.reply').on('click', function (e) {
    e.preventDefault();
    var idComment = $(this).data('comment');
    alert(idComment);
    $('#comment-parent_id').val(idComment);
    $('#comment-text').focus();
});

