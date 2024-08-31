function validateEmail(email) {
  var reg = /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/;
  if (reg.test(email) == false) {
    return false;
  }
  return true;
}

function isAlphaNumeric(evt) {
  evt = (evt) ? evt : window.event;
  var charCode = (evt.which) ? evt.which : evt.keyCode;
  if ((charCode >= 48 && charCode <= 57) || ((charCode >= 65 && charCode <= 90) || (charCode >= 97 && charCode <= 122) || charCode == 8 || charCode == 32)) {
    return true;
  }
  return false;
}

function isNumber(evt) {
  evt = (evt) ? evt : window.event;
  var charCode = (evt.which) ? evt.which : evt.keyCode;
  console.log({charCode});
  if (charCode > 31 && (charCode < 48 || charCode > 57)) {
    return false;
  }
  return true;
}

function isDecimalNumber(evt) {
  evt = (evt) ? evt : window.event;
  var charCode = (evt.which) ? evt.which : evt.keyCode;
  console.log({charCode});
  if (charCode == 8 || charCode == 46 || charCode == 37 || charCode == 39 || charCode == 190) {
    return true;
  }
  // Allow only digits
  if (charCode < 48 || charCode > 57) {
    return false;
  }
  return true;
}

function isAlphabet(evt) {
  evt = (evt) ? evt : window.event;
  var charCode = (evt.which) ? evt.which : evt.keyCode;
  console.log('charCode :>> ', charCode); 
  if ((charCode >= 65 && charCode <= 90) || (charCode >= 97 && charCode <= 122) || charCode == 8  || charCode == 190 || charCode == 32) {
    return true;
  }
  return false;
}

// select2_one for single selection
$(document).ready(function() {
    $('.select2_one').select2();
});

// select2_multiple for single selection
$(document).ready(function() {
  $('.select2_multiple').select2({
    closeOnSelect:false
  });
});


$(document).ready(function() {
  setTimeout(() => {
    $('.alert_div').addClass('d-none');
  }, 3500);
});

function validatePassword(){
  var password = $('#password').val();
  var confirm_password = $('#confirm_password').val();
  
  if (password !== confirm_password && password != '' && confirm_password != '') {
    $('#password').val('');
    $('#confirm_password').val('');
    $('#password').focus();
    alert('Passwords do not match.')
    $('#message').text('Passwords do not match.').css('color', 'red');
  }
}
