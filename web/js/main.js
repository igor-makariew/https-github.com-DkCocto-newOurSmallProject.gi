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
//    alert(idComment);
    $('#comment-parent_id').val(idComment);
    $('#comment-text').focus();
});


// Удаление аватара
$('.delFoto').on('click', function(e){
   e.preventDefault();
    var id = $(this).data('id');
    var img = $(this).data('img');
    
    $.ajax({
        url: '/user/del-img',
        data: {id:id, img:img},
        type: 'GET',
        
        success: function(res) {
            if(res == 'ok') {
                $('.del'+img).remove();
                $('.delFoto').remove();
            }
        },
        error: function(res){
            alert('Что-то пошло не так');
        }
    });
});

// Удаление аватара
//$('.delFoto').on ('click', function (e) {
//    e.preventDefault();
//    var id = $(this).data('id');
//    var img = $(this).data('img');
//    
//    $.ajax({
//        url: '/user/del-img',
//        data: {id: id, img: img},
//        type: 'GET',
//        
//        success: function (res) {
//            if (res == 'ok')
//            {
//                $('.del_'+img).remove();
//                $('.delFoto').remove();
//            }
//        },
//        error:function (res) {
//            alert ('Что-то пошло не так');
//        }
//    });
//    
//});