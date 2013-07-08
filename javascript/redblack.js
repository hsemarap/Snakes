var Color= new Array(9);
Color[1] = "ff";
Color[2] = "ee";
Color[3] = "dd";
Color[4] = "cc";
Color[5] = "bb";
Color[6] = "aa";
Color[7] = "99";
Color[8] = "88";
Color[9] = "77";
Color[10] = "66";
Color[11] = "55";
Color[12] = "44";
Color[13] = "33";
Color[14] = "22";
Color[15] = "11";
Color[16] = "00";

/*
function fadeIn(where) {
if (i >= 1) {
ctx.fillStyle="#" + Color[i] +"0000"
ctx.fillRect(0,0,500,500);
ctx.fill();
i -= 1;
setTimeout("fadeIn("+i+")", 15);
} else {
setTimeout('fadeOut(1)', 15);
}
}
function fadeOut(where) {
if (i <=16) {
ctx.fillStyle="#" + Color[i] +"0000"
ctx.fillRect(0,0,500,500);
ctx.fill();
i += 1;
setTimeout("fadeOut("+i+")", 15)
} else {
setTimeout("fadeIn(16)", 15);
}
}
*/
function fadeIn(where) {
if (where >= 1) {
document.bgColor="#" + Color[where] +"0000";
where -= 1;
setTimeout("fadeIn("+where+")", 15);
} else {
setTimeout('fadeOut(1)', 15);
   }
}
function fadeOut(where) {
if (where <=16) {
document.bgColor="#" + Color[where] +"0000";
where += 1;
setTimeout("fadeOut("+where+")", 15)
} else {
setTimeout("fadeIn(16)", 15);
   }
}
function Go()
{
fadeIn(16);
}
window.onload=Go;