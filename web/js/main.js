$(document).on("ckick", 'reg', function(e){
  e.preventDefault();
  $('.site-form_registration').html('Загружаю...');
  $.ajax({
      url: '/site/form-registration',
      type: 'get',
      async: 'false',
      success: function(res) {
          $('.site-form_registration').html(res);
          // console.log('Всё хорошо!!!');
      },
      error:function(res) {
         console.log('ERROR'); 
      }
  });
});


