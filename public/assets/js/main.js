$(function() {
   $('.remove-item').on('click', function(){
      var isDel = confirm('Удалить этот элемент');
      if (isDel) {
          $(this).parent().submit();
      }
   });
});