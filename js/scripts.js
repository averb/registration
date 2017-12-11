function id(id) { return document.getElementById(id); }

function submitForm(){
  id('js-submitButn').disabled = true;
  id('js-submitButn').innerHTML = '<svg width="20" height="20"><use xlink:href="#spinner"></use></svg>';

  var email = id('email').value;
  var birthday = id('birthday').value;
  var pass1 = id('pass1').value;
  var pass2 = id('pass2').value;

  var checkRequired = email === '' || birthday === '' || pass1 === '' || pass2 === '';
  var checkPass = pass1 !== pass2;

  var formdata = new FormData();
  formdata.append( 'email', email );
  formdata.append( 'birthday', birthday );
  formdata.append( 'pass1', pass1 );
  formdata.append( 'pass2', pass2 );
  formdata.append( 'isAjax', true );

  var ajax = new XMLHttpRequest();
  ajax.open( 'POST', 'form_handler.php' );

  ajax.onreadystatechange = function() {
    if(this.readyState == 4 && this.status == 200) {

      id('js-submitButn').innerHTML = 'Register';
      id('js-submitButn').disabled = false;

      if (checkRequired) {
        return id('js-errorMessage').innerHTML = 'All fields are required.';
      }

      if (checkPass) {
        return id('js-errorMessage').innerHTML = 'Passwords did not match! Try again.';
      }

      if (this.responseText === 'Date is not correct.') {
        return id('js-errorMessage').innerHTML = this.responseText;
      }

      if (this.responseText === 'Birth date in the future.') {
        return id('js-errorMessage').innerHTML = this.responseText;
      }

      id('js-errorMessage').innerHTML = '';
      alert( `Welcome ${this.responseText}` );

    }
  }
  ajax.send( formdata );
}
