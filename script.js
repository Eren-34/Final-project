//profile//

let profilePic = document.getElementById("profile-pic");
let inputFile = document.getElementById("input-file");

inputFile.onchange = function(){
    profilePic.src = URL.createObjectURL(inputFile.files[0]);
}


 var x = document.getElementById('login');
     var y = document.getElementById('register');
     var z = document.getElementById('btn');
 
     function login(){
        x.style.left = "27px";
        y.style.right = "-350px";
        z.style.left = "0px";
     }
     function register(){
        x.style.left = "-350px";
        y.style.right = "25px";
        z.style.left = "150px";
     }