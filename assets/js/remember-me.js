'use strict';

var usersEmail = '';

$(document).ready(function(){
  let rememberMeInput = $('input[id=rememberMe]');

  $(rememberMeInput).on('click', function(e){
    let emailInput = $('input[name=email]');

    if ($(emailInput).val() !== ''){
      let email = $(emailInput).val();

      localStorage.setItem('email', email);
    } else {
      $(emailInput).on('focusout', function(){
        if ($(this).val() != ''){
          localStorage.setItem('email', $(this).val());
        }
      });
    }
  });

});
