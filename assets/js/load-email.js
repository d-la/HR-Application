$(document).ready(function(){
  // Loads the remembered email into the input
  if (localStorage.getItem('email') !== null){
    $('#email').val(localStorage.getItem('email'));
  }
});
