

<script>   

// $(document).ready(function () {
//     createCookie("usertimezone", Intl.DateTimeFormat().resolvedOptions().timeZone, "");
// });

window.onload(createCookie("usertimezone", Intl.DateTimeFormat().resolvedOptions().timeZone, "999"));

// Function to create the cookie 
function createCookie(name, value, days) {
    let expires;

    if (days) {
        let date = new Date();
        date.setTime(date.getTime() + (days * 24 * 60 * 60 * 1000));
        expires = "; expires=" + date.toGMTString();
    }
    else {
        expires = "";
    }

    document.cookie = escape(name) + "=" +
        escape(value) + expires + "; path=/";
}




</script>
<title>Architect Login YVH</title>
<link rel="icon" type="image/x-icon" href="/uploads/virtualhomeicon.ico">

<div class="floatPanel">

<?php echo $loginform; ?>

</div>
<style>
   
    

    .floatPanel{

        

        margin-top: 10%;
      
        margin-left: 30%;
        margin-right: 25%;
        background-color: #fefefe;
        border: 1px solid #122648;
        padding: 30px 50px;
        width: 35%;
        border-radius: 10px;
        box-shadow: 0px 5px 10px rgba(10, 10, 10, 0.5);
    }
    body{
        background-color: #34486A !important;
    }
    h4{
        font-size: 1.7rem;
    }
    label {
        font-size:1.2rem;
        color: #4d4d4d;
        cursor: pointer;
        display: block;
        font-weight: normal;
        line-height: 1.5;
        margin-bottom: 10px;
    }
    .savebutton{
        text-align: center;
        background-color: #1D84B5;
        color: white;
        display: inline-block;
        border-style: solid;
        border-width: 0;
        cursor: pointer;
        font-family: "Helvetica Neue", Helvetica, Roboto, Arial, sans-serif;
        font-weight: normal;
        line-height: normal;
        margin: 0 0 1.25rem;
        position: relative;
        text-decoration: none;
        text-align: center;
        -webkit-appearance: none;
        border-radius: 0;
        display: inline-block;
        margin-top: 4;
        padding-top: 1rem;
        /* padding-right: 2rem; */
        padding-bottom: 1.0625rem;
        /* padding-left: 2rem; */
        font-size: 1rem;
        background-color: #008CBA;
        border-color: #007095;
        color: #FFFFFF;
        transition: background-color 300ms ease-out;
        width: 15.66667%;
        border-radius: 5px !important;
    
  
    }

    html, p, span, label, h1, h2, h3, h4, h5, h6 {
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif !important;
    }

    .cancelbutton{
        visibility: hidden;
    }
    
</style>





