let profilepic=document.getElementById("profile-pic");
let inputfile=document.getElementById("input-file");
let profilelogo=document.getElementById("profile-logo");

function myFunction() {
	profilepic.src ="images/userlogo.jpg"
	profilelogo.src="images/userlogo.jpg"
}

inputfile.onchange=function()
{
	profilepic.src=URL.createObjectURL(inputfile.files[0]);
	profilelogo.src=URL.createObjectURL(inputfile.files[0]);
}
