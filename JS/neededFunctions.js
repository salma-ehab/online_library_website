function goLogIn()
{
    window.location.href = "Login.php";
}

function goAdminHomepage()
{
    window.location.href = "adminhomepage.php";
}

function confirmPassword()
{
    var rPassword = document.getElementById("password").value;
    var cPassword = document.getElementById("cPassword").value;

    if (rPassword != cPassword)
    {
        alert("Your passwords don't match")
        return true
    }

    return false         
}

function checkPassword()
{
    var rPassword = document.getElementById("password").value;

    if (rPassword.search(/\d/) == -1)
     {
        alert("The password must contain at least one number")  
        return true
     }

     if (rPassword.search(/[a-zA-Z]/) == -1)
     {
        alert("The password must contain at least one letter") 
        return true 
     }

     if (!rPassword.match(/^[0-9a-z]+$/))
     {
        alert("The password must contain only letters and numbers")  
        return true
     }

    if(rPassword.length < 5) 
    {  
        alert("The minimum length of the password is 5")  
        return true
    }  
     
     if(rPassword.length > 10) 
     {  
        alert("The maximum length of the password is 10")  
        return true
     }  

     return false         
}

function confirmTelephoneNumber()
{
    var TNumber = document.getElementById("Tnumber").value;

    if(!TNumber.match(/^\d{3}-\d{4}-\d{4}$/)) 
    {  
        alert("The telephone number isn't enetered in the correct format. Try again")  
        return true
    }
    return false    
}

function disableEnableSignUp()
{
    if (confirmPassword() == true || checkPassword() == true || confirmTelephoneNumber() ==true)
    {
        event.preventDefault(); 
    }
}

function validatePrice()
{
    var price = document.getElementById("price").value;

    if (isNaN(price))
     {
        alert("The price must be a number")  
        return true
     }
     return false         
}

function validateTotalBooks()
{
    var noBooks = document.getElementById("totalBooks").value;

     if (Number.isInteger(Number(noBooks)))
     {
        return false
     }
     alert("The total number of books must be an integer") 
     return true        
}

function disableEnableAddBooks()
{
    if (validatePrice() == true || validateTotalBooks() == true)
    {
        event.preventDefault(); 
    }
}

