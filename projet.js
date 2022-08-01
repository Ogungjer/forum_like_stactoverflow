 "use strict";
 
 function openFunction(){
  document.getElementById("menu").style.width="300px";
  document.getElementById("mainbox").style.marginLeft="300px";
  document.getElementById("mainbox").innerHTML="";
 }
 
 
function closeFunction(){
 document.getElementById("menu").style.width="0px";
 document.getElementById("mainbox").style.marginLeft="17px";
 document.getElementById("mainbox").innerHTML="&#9776;";
}
