
const signupform=document.getElementById('signupform');
const userid=document.getElementById('userid');
const userpass=document.getElementById('userpass');
const usernumber=document.getElementById('usernumber');
const useremail=document.getElementById('useremail');

signupform.addEventListener('submit',e => {
    
   if(!validateInputs()){
    e.preventDefault();
   }
});
const setError=(element,message)=>{
    const inputControl = element.parentElement;
    const errorDisplay=inputControl.querySelector('.error');
    errorDisplay.innerText = message;
    inputControl.classList.add('error');
    inputControl.classList.remove('success');
}
const setSuccess=element=>{
    const inputControl =element.parentElement;
    const errorDisplay=inputControl.querySelector('.error');
    errorDisplay.innerText ='';
    inputControl.classList.add('success');
    inputControl.classList.remove('error');
}
const isValidEmail=useremail=>{
    const mail= /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/;
    return mail.test(String(useremail).toLowerCase());
}
const valipass=userpass=>{
    return /[\@\#\$\%\^\&\*\(\)\_\+\!]/.test(userpass) && /[a-z]/.test(userpass) && /[0-9]/.test(userpass) && /[A-Z]/.test(userpass);
}
const validateInputs=()=>{
    const useridValue=userid.value.trim();
    const userpassValue=userpass.value.trim();
    const usernumberValue=usernumber.value.trim();
    const useremailValue=useremail.value.trim();
    let success=true;
    if(useridValue === ''){
        setError(userid,'userid is required');
    }
    else{
        setSuccess(userid);
    }
    if(useremailValue === ''){
        success=false;
        setError(useremail,'Email is Required');
    }
    else if(!isValidEmail(useremailValue)){
        success=false;
        setError(useremail,'Provide Valid Email Address');
    }
    else {
        setSuccess(useremail);
    }
    if(usernumberValue === ''){
        success=false;
        setError(usernumber,'Phone Number is required');
    }
    else if(usernumberValue.lenght > 10 || usernumberValue.lenght < 10 ) {
        success=false;
        setError(usernumber,'mobile number must be 10');
    }
    else {
        setSuccess(usernumber);
    }
    if(userpassValue === ''){
        success=false;
        setError(userpass,'password is required');
    }
    else if(userpassValue.lenght < 8){
        success=false;
        setError(userpass,'password must be 8 charcters');
    }
    else if(!valipass(userpassValue)){
        success=false;
        setError(userpass,'password must be one capital letter,special character,and number');
    }
    else{
        setSuccess(userpass);
    }
    return success;

}

