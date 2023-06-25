
function fc()
{
    var fn= document.myForm.fname.value;
    var ln= document.myForm.lname.value;
    var pw= document.myForm.pass.value;
    var cpw= document.myForm.cp.value;
    var ph= document.myForm.ph.value;
    if(fn==""){ 
        alert(" First name is required");
        return false;
    }

    if(ln==""){
        alert("Last name is required");
        return false;
    }

    if(pw==""){
        alert("password cannot be empty")
        return false;
    }
    if(pw.length<8){
        alert("Password length should be atleast 8");
        return false;
    }
    if(pw!=cpw){
        alert("Password doesnt match");
        return false;
    }
    if(isNaN(ph) || ph.length!=10)
    {
        alert("Enter a valid phone number");
        return false;
    }
    
    return true;
}