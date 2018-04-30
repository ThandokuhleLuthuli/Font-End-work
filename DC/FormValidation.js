function Validate(){ 
//variable declaration
var email=document.getElementById("email").value;
var password=document.getElementById("pass").value;
var confirmpassword=document.getElementById("cpass").value;
  if(email!="" && password !="" && confirmpassword!="" )
  { if( password==6)
    {

    }
    else{
        alert.document("A Password Cannot Be Shorter/Longer Than 6 characters");
        return false;
    }
    if(confirmpassword!=password)
    {
alert("Passwords Do Not Match");
return fasle;

    }

  }
  else
  {
      alert("All Fields Are Required");
      return false;
  }



}