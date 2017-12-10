function id(id) { return document.getElementById(id); }

function submitForm(){
  id('js-submitButn').disabled = true;
  id('js-submitButn').innerHTML = '<svg width="20" height="20"><use xlink:href="#spinner"></use></svg>';

  var email = id('email').value;
  var pass1 = id('pass1').value;
  var pass2 = id('pass2').value;
  var birthday = new Date(id('birthday').value);
  var today = new Date();

  var formdata = new FormData();
  formdata.append( 'email', email );
  formdata.append( 'isAjax', true );

  var ajax = new XMLHttpRequest();
  ajax.open( 'POST', 'form_handler.php' );

  ajax.onreadystatechange = function() {
    if(this.readyState == 4 && this.status == 200) {

      id('js-submitButn').innerHTML = 'Register';
      id('js-submitButn').disabled = false;

      if (pass1 !== pass2) {
        return id('js-errorMessage').innerHTML = 'Passwords did not match! Try again.';
      }

      if (birthday.getTime() >= today.getTime()) {
        return id('js-errorMessage').innerHTML = 'Birth date in the future.';
      }

       alert(`Welcome ${this.responseText}`);

    }
  }
  ajax.send( formdata );
}
