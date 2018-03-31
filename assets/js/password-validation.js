'use strict';
$(document).ready(function(){
  let newPasswordInput = $('input[name=newPassword]');
  let confirmNewPasswordInput = $('input[name=confirmNewPassword]');
  let passwordRequirements = $('div#password-requirements');
  let confirmNewPasswordDiv = $('div#confirm-new-password');

  /**
   * When focusing on the newPassword/confirmNewPassword input,
   * show the password requirements/matching div
   */
  $(newPasswordInput).focus(function(){
    $(passwordRequirements).fadeIn('slow');
  });

  $(confirmNewPasswordInput).focus(function(){
    $(confirmNewPasswordDiv).fadeIn('slow');
  });

  /**
   * When leaving the newPassword/confirmNewPassword input,
   * hide the password requirements/matching div
   */

  $(newPasswordInput).focusout(function(){
    $(passwordRequirements).fadeOut('slow');
  });

  $(confirmNewPasswordInput).focusout(function(){
    $(confirmNewPasswordDiv).fadeOut('slow');
  });

  /**
   * As the user types in their new password,
   * check and validate it
   */
  $(newPasswordInput).bind('input propertychange', function(){
    let newPassword = $(this).val();

    checkPasswordLength(newPassword);

    checkPasswordUpperCaseLetter(newPassword);

    checkPasswordLowerCaseLetter(newPassword);

    checkPasswordDigit(newPassword);

    checkPasswordSymbol(newPassword);

    if (validatePassword(newPassword)){
      $(confirmNewPasswordInput).removeAttr('disabled');
    } else {
      $(confirmNewPasswordInput).attr('disabled', 'disabled');
    }
  });

  $(confirmNewPasswordInput).bind('input propertychange', function(){
    let newPassword = $(newPasswordInput).val();
    let confirmNewPassword = $(this).val();
    let confirmSymbol = $('span[data-type=confirm-passwords]');

    if (confirmMatchingPasswords(newPassword, confirmNewPassword)){
      $(confirmSymbol).removeClass().addClass('oi oi-check green');
      // $(confirmNewPasswordDiv).text('<span class="oi oi-check green" data-type="confirm-passwords"></span> Passwords match!');
    } else {
      $(confirmSymbol).removeClass().addClass('oi oi-x red');
      // $(confirmNewPasswordDiv).text('<span class="oi oi-x red" data-type="confirm-passwords"></span> Passwords do not match!');
    }
  });
});

  /**
   * Use as the final check before allowing user to enter their confirmed password
   */
  function validatePassword(input){
    if (input.length >= 8){
      if (/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*(_|[-+_!@#$%^&*.,?{}])).+$/.test(input)){
        return true;
      } else {
        return false;
      }
    } else {
      return false;
    }
  }

  /**
   * Use to check newPassword value with confirmNewPassword value
   */
  function confirmMatchingPasswords(newPassword, confirmNewPassword){
    if (newPassword === confirmNewPassword){
      return true;
    } else {
      return false;
    }
  }


  function checkPasswordLength(input){
    let lengthSymbol = $('span[data-type=length]');

    if (input.length >= 8){
      $(lengthSymbol).removeClass().addClass('oi oi-check green');
    } else {
      $(lengthSymbol).removeClass().addClass('oi oi-x red');
    }
  }


  function checkPasswordUpperCaseLetter(input){
    let uppercaseSymbol = $('span[data-type=uppercase]');

    if (/^(?=.*[A-Z]).+$/.test(input)){
      $(uppercaseSymbol).removeClass().addClass('oi oi-check green');
    } else {
      $(uppercaseSymbol).removeClass().addClass('oi oi-x red');
    }
  }

  function checkPasswordLowerCaseLetter(input){
    let lowercaseSymbol = $('span[data-type=lowercase]');

    if (/^(?=.*[a-z]).+$/.test(input)){
      $(lowercaseSymbol).removeClass().addClass('oi oi-check green');
    } else {
      $(lowercaseSymbol).removeClass().addClass('oi oi-x red');
    }
  }

  function checkPasswordDigit(input){
    let digitSymbol = $('span[data-type=digit]');

    if (/^(?=.*\d).+$/.test(input)){
      $(digitSymbol).removeClass().addClass('oi oi-check green');
    } else {
      $(digitSymbol).removeClass().addClass('oi oi-x red');
    }
  }

  function checkPasswordSymbol(input){
    let symbolSymbol = $('span[data-type=symbol]');

    if (/^(?=.*(_|[-+_!@#$%^&*.,?{}])).+$/.test(input)){
      $(symbolSymbol).removeClass().addClass('oi oi-check green');
    } else {
      $(symbolSymbol).removeClass().addClass('oi oi-x red');
    }
  }
