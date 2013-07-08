<html>
<head>
<script src="games/snakes/javascript/jquery.js" type="text/javascript"></script>
<script src="games/snakes/javascript/fbhelper.js" type="text/javascript"></script>

<script>
var level='level1';
var btype;
var maze=new Array(100);
  for (var i = 0; i < 100; i++) {
    maze[i] = new Array(100);
  }
  for (var i = 0; i < 100; i++)
  for (var j = 0; j < 100; j++)
  maze[i][j]=0;

$(document).ready(function(){
var dimbonus=false,snake;
var theme=document.getElementById("theme");
theme.play();
var imag=new Image()
var canvas=document.getElementById('canvas');
var ctx=canvas.getContext('2d');
var scorecanvas=document.getElementById('canvas');
var scorectx=scorecanvas.getContext('2d');
var scoreimg=new Image();
scoreimg.src="games/snakes/images/board.png";
scoreimg.onload=function(){
//ctx.drawImage(scoreimg,525,115);
};
var w=1000,h=990,nx,ny,score=0;
document.getElementById('score').value=score;
var cw=10,left=0,up=1,right=2,down=3;
var d;
var snake,tempsnake,food=[],bfood=[];
food.push({x: 0, y:0});
bfood.push({x: 0, y:0 ,type:1});
var snakeinterval;

function displayscore()
{
ctx.font="bold 30px verdana";
ctx.fillStyle="#8ED6FF";
ctx.rect(507,0,387,500);
ctx.fill();
ctx.drawImage(scoreimg,525,115);



ctx.fillText(Math.floor(score/10000),575,250);

ctx.fillText(Math.floor(score/1000-10*Math.floor(score/10000)),622,250);

ctx.fillText(Math.floor(score/100-10*Math.floor(score/1000)),665,250);

ctx.fillText(Math.floor(score/10-10*Math.floor(score/100)),708,250);
ctx.fillText("0",750,250);
var lev,tmp=ctx.fillStyle;
ctx.fillStyle="black";

if(level=='fest')
ctx.fillText("FINALE",617,400);
else
{
if(level=='level1')
lev=1;
else
if(level=='level2')
lev=2;
else
if(level=='level3')
lev=3;
ctx.fillText("LEVEL : "+lev,600,400);
}
ctx.fillStyle=tmp;
}
var menuvisibile=true;
function startgame(){
d=right;
menuvisibile=false;
for (var i = 1; i < 99999; i++)
        window.clearInterval(i);
makesnake();
food.x=5;food.y=35;
makefood();
ctx.fillStyle="#8ED6FF";
	ctx.fillRect(0, 0, 850, 500);
	

if(level==null)
level='level1';

	

//maze=window.maze1;
ctx.fillStyle="#8ED6FF";
ctx.rect(507,0,387,500);
//ctx.fill();
score=0;
document.getElementById('score').value=score;

displayscore();
foodsinterval();
snakeinterval = setInterval(fillSnake,31);
}
$("#reset").onclick=function(){startgame();}

      function getMousePos(canvas, evt) {
        var rect = canvas.getBoundingClientRect(), root = document.documentElement;

        // return relative mouse position
        var mouseX = evt.clientX - rect.top - root.scrollTop;
        var mouseY = evt.clientY - rect.left - root.scrollLeft;
        return {
          x: mouseX,
          y: mouseY
        };
      }

function startup(){

d=right;

makesnake();
food.x=5;food.y=35;
//makefood();
score=0;
var menu=new Image();
menu.src='games/snakes/images/menu.png';
var mousePos=[];

menu.onload=function(){ctx.drawImage(menu,0,0,500,500);
 
// 303 -150         690 -150
// 303 -109			690 -109

// 340 -45			658 -45
//	338 -2 			658 -2

//	355 78			660 78
//	355	142			660	142
// link 1
// 375  465			520  465
// 375  488 		520	 488
//link 2
// 645  464			803  464
// 637  488			803	 490
var menuoption=0;
var p = $("canvas");
var position = p.position();
canvas.onmousemove=function(e){
var Xcoord=e.pageX-$("#wrapper").position().left;
var Ycoord=e.pageY-$("#wrapper").position().top;
// THIS ONE FOR CURSOR CHANGE ON HOVER ABOVE ALL OPTIONS
if((Xcoord>=375&&Xcoord<=520&&Ycoord<=488&&Ycoord>=465&&menuoption==0)||(Xcoord>=637&&Xcoord<=803&&Ycoord<=488&&Ycoord>=465&&menuoption==0)||((Xcoord>=378&&Xcoord<=777&&Ycoord<=140&&Ycoord>=96)&&menuoption==0)||(Xcoord>=378&&Xcoord<=777&&Ycoord<=250&&Ycoord>=200&&menuoption==0)||(Xcoord>=400&&Xcoord<=760&&Ycoord<=390&&Ycoord>=333&&(menuoption==0)))
{
$(this).css( 'cursor', 'pointer' );
}
else
$(this).css('cursor','auto');
	};
//$("#inst").text( "left: " + position.left + ", top: " + position.top );
$(canvas).mouseup(function(e){
var Xcoord=e.pageX-$("#wrapper").position().left;
var Ycoord=e.pageY-$("#wrapper").position().top;
// LINK AT BOTTOM LEFT
if(Xcoord>=375&&Xcoord<=520&&Ycoord<=488&&Ycoord>=465&&menuoption==0)
{
window.open("https://www.facebook.com/pnkjkumarjha");
}
// LINK AT BOTTOM RIGHT	
if(Xcoord>=637&&Xcoord<=803&&Ycoord<=488&&Ycoord>=465&&menuoption==0)
{
        window.open("https://www.facebook.com/pbornskater");
}  
// MENU CASE 1: INSTRUCTIONS
	  if((Xcoord>=378&&Xcoord<=777&&Ycoord<=140&&Ycoord>=96)&&menuoption==0)
{
menuoption=1
var instr=new Image();
instr.src='games/snakes/images/inst.png';
ctx.drawImage(instr,0,0);

	//alert(menuoption);

}

// MENU CASE 2: PLAY GAME
if(Xcoord>=378&&Xcoord<=777&&Ycoord<=250&&Ycoord>=200&&menuoption==0)
{
menuoption=2;
//fbapi.gameStarted(4);
startgame();
}
// MENU CASE 3: HIGH SCORES							//       Edit arrName (here and in blinkme function) array var with highscores    
if(Xcoord>=400&&Xcoord<=760&&Ycoord<=390&&Ycoord>=333&&(menuoption==0))
{
menuoption=3;
//var arrName = [{"rose", "daisy","orchid", "sunFlower","Lily"},{100,200,300,400,500}];
var arrName=new Array(2);  
arrName[0]=new Array(5);
arrName[1]=new Array(5);
arrName[0] = ["rose", "daisy","orchid", "sunFlower","Lily"];
arrName[1] = [100,200,300,400,500];
  var i = 150;
	ctx.fillStyle="rgba(255,255,255,0.7)";
	ctx.fillRect(0,0,500,500);
	ctx.fillStyle="black";
	ctx.font="bold 25px verdana";
	ctx.fillText("High Scores:",105,100);
	var j=0;
	
    for (var k=0;k<arrName[0].length;k++) 
	{
		ctx.fillText(arrName[0][k]+"     "+arrName[1][k]+" pts",105,i);
		i+=35;        
    }
	
}
   }); 
$(canvas).mousedown(function(e){
	if(menuoption!=0&&menuoption!=2)
	{ctx.drawImage(menu,0,0,500,500);
	menuoption=0;
	}
	}	);
};


/*canvas.addEventListener('mouseup', function(evt) {
          mousePos = getMousePos(canvas, evt);

if((mousePos.x>=303&&mousePos.x<=690&&mousePos.y>=-150&&mousePos.y<=-109))
{

var instr=new Image();
instr.src='games/snakes/images/inst.png';
ctx.drawImage(instr,0,0);
}
if(mousePos.x>=340&&mousePos.x<=658&&mousePos.y<=-2&&mousePos.y>=-45)
{

startgame();
}
if(mousePos.x>=355&&mousePos.x<=660&&mousePos.y<=142&&mousePos.y>=78)
{
var arrName = {"rose":"5", "daisy":"4",
                   "orchid":"3", "sunFlower":"10",
                   "Lily":"15"};
    var i = 250;
	ctx.fillStyle="rgba(255,255,255,0.7)";
	ctx.fillRect(0,0,500,500);
	ctx.fillStyle="black";
	ctx.font="bold 30px verdana";
	ctx.fillText("High Scores:",105,220);
    for (var name in arrName) {
ctx.fillText(name+"     "+arrName[name]+" pts",105,i);
i+=35;        
        }


}


		  
          }, false);
*/		  


//startgame();
}


startup();
function makesnake()
	{
		var length = 15; 
		snake= []; tempsnake = [];
		for(var i = length-1; i>=0; i--)
		{
						snake.push({x: i, y:55});
						//tempsnake.push({x: i, y:0});
		}
		/*snake[0].x=0;
		snake[0].y=25;*/
	}
speedx=50;//document.getElementById('speed').value;

	//document.onclick=showmaze();
$("#speed").mouseup(function(){
	defspeed=false;
	startgame();
	var speedx=10-document.getElementById('speed').value;
	alert(speedx*100+50);
	var snakeinterval=setInterval(fillSnake, speedx*100+5);
	});
	
	
	function checkmaze(a,b){
	if(level=='level1')
		{
		//if(((b>=14&&b<=17)||(b>=34&&b<=45))&&(a>=9&&a<=40))
		if(((b>=28&&b<=34)||(b>=68&&b<=90))&&(a>=40&&a<=84))
		return true;
		else return false;
		}
	if(level=='level2')
		{
		//if(	((b>=2&&b<=4)||(b>=46&&b<=48)||(a>=4&&a<=6)||(a>=43&&a<=45))	|| (a>=24&&a<=26)	|| (b>=24&&b<=26) )
		if(	((b>=4&&b<=8)||(b>=92&&b<=96)||(a>=8&&a<=12)||(a>=86&&a<=90))	|| (a>=48&&a<=52)	|| (b>=48&&b<=52) )
		return true;
		else return false;
		}
	if(level=='level3')
		{
		//if((b>=29&&b<=31)||(b>=37&&b<=39)||(a>=9&&a<=11)||(a>=34&&a<=36))
		if((b>=58&&b<=62)||(b>=74&&b<=78)||(a>=18&&a<=22)||(a>=68&&a<=72))
		return true;
		else return false;
		}
	if(level=='fest')
		{
		if((b>=6 && b<=18) || (b>=74 && b<=93 && a >= 22 && a <=65))
		return true;
		else return false;
		}		
	}
	
	
	function makebonusfood(){
	var tx=bfood.x,ty=bfood.y;
	
	bfood.x=Math.round(Math.random()*(w-cw)/cw); 
	if(ty<50)
	bfood.y=50+Math.round(Math.random()*(h-cw)/(2*cw));
else
	bfood.y=Math.round(Math.random()*(h-cw)/(cw));
	btype=Math.round(Math.random()*3);
	
	if(level=='fest')
check=(food.y>=6 && food.y<=18) || (food.y>=48 && food.y<=52) ||(food.y>=74 && food.y<=93 && food.x >= 22 && food.x <=65);
else if(level=='level1')
check=((food.y<=32 && food.y>=30) || (food.y<=70 && food.y>=68)) && (food.x<=80 && food.x>20);
	
		//console.log(food.x+' '+food.y);
//while(((food.x+1<=nx)&&(food.x-1>=nx) && (food.y+1<=ny)||(food.y-1>=ny))||collision(food.x,food.y,snake)||ty1==food.y||tx1==food.x||mazecollision(food.x,food.y,maze)||mazecollision(food.x-1,food.y,maze)||mazecollision(food.x+1,food.y,maze)||mazecollision(food.x,food.y+1,maze)||mazecollision(food.x,food.y-1,maze)||maze[food.x][food.y]==1)
while(  (bfood.x+1>=nx && bfood.x-1<=nx && bfood.y>=ny-1 && bfood.y<=ny+1)||collision(bfood.x,bfood.y,snake)||(bfood.x+1>=tx && bfood.x-1<=tx && bfood.y>=ty-1 && bfood.y<=ty+1)||mazecollision(bfood.x,bfood.y,maze)||maze[bfood.x][bfood.y]==1 ||check||checkmaze(bfood.x,bfood.y))
		{
		tx=bfood.x;ty=bfood.y;
	bfood.x=Math.round(Math.random()*(w-cw)/cw); 
	if(ty>50)
	bfood.y=50+Math.round(Math.random()*(h-cw)/(2*cw));
else
	bfood.y=Math.round(Math.random()*(h-cw)/(cw));

if(level=='fest')
check=(food.y>=6 && food.y<=18) || (food.y>=48 && food.y<=52) ||(food.y>=74 && food.y<=93 && food.x >= 22 && food.x <=65)
else if(level=='level1')
check=((food.y<=32 && food.y>=30) || (food.y<=70 && food.y>=68)) && (food.x<=80 && food.x>20);
	
	}
	
		}
		
	function speedbonus(){
	clearInterval(snakeinterval);
	snakeinterval=setInterval(fillSnake,10);
	setTimeout(stopspeed,5000);
	}
	function stopspeed(){
	clearInterval(snakeinterval);
	document.getElementById('spl').innerHTML='None';
	snakeinterval=setInterval(fillSnake,31);
	}
	<?php //include 'games/snakes/javascript/redblack.js' ?>


var x=0.0,increaseflag=0,ctr=0;
function timer() {
ctx.fillStyle = "rgba(0, 0, 0, "+x+")";
ctx.fillRect(0,0,500,500);
if(x>=1.00)
{
if(ctr++>45)
increaseflag=1;
}
else if(x<=0&&increaseflag)
{
ctx.drawImage(imag,0,0);
displayscore();
document.getElementById('spl').innerHTML='None';
dimbonus=false;x=0;increaseflag=0;ctr=0;
return;
}
if(increaseflag==0)
x=x+0.02;
else
x=x-0.02;
console.log(x);
ctx.fill();
}
var magmode=false;
function magnet(){
magmode=true;
setTimeout(function(){magmode=false;document.getElementById('spl').innerHTML='None';},5000);
}


var foodbonuscount=0;var bonusx=new Array(100),bonusy=new Array(100),foodbonuscheck=false;
foodb=[];
function foodbonus(){
foodbonuscheck=true;
var xx=0,yy=0;
while(foodbonuscount<=10)
{
xx=Math.round(Math.random()*100);
yy=Math.round(Math.random()*100);
while(maze[xx][yy]==1||checkmaze(xx,yy))
{
	xx=Math.round(Math.random()*100);
	yy=Math.round(Math.random()*100);
}

var temp2=maze[xx][yy];
bonusx[foodbonuscount]=xx;
bonusy[foodbonuscount]=yy;

foodb.push({x: xx, y:yy});
//maze[xx][yy]=2;

fillCell(xx,yy,"#00F");
setTimeout(function(){

/*
//maze[xx][yy]=temp2;
//foodb.pop();

for(var te=0;te<foodb.length;te++)
console.log('a');

for(var q=0;q<bonusx.length;q++)
if(bonusx[q]==xx)
{
bonusx[q]=-100;bonusy[q]=-100;
}*/
foodbonuscheck=false;
},10000);
foodbonuscount++;
}
foodbonuscount=0;
return;
}

	function makefood(){
	var tx1=food.x,ty1=food.y;
	
	food.x=Math.round(Math.random()*(w-cw)/cw); 
	/*if(ty1<50)
	food.y=50+Math.round(Math.random()*(h-cw)/(2*cw));
else*/
	food.y=Math.round(Math.random()*(h-cw)/(cw));
var check;
if(level=='fest')
check=(food.y>=6 && food.y<=18) || (food.y>=74 && food.y<=93 && food.x >= 22 && food.x <=65);
else if(level=='level1')
check=((food.y<=32 && food.y>=30) || (food.y<=70 && food.y>=68)) && (food.x<=80 && food.x>20);	
		//console.log(food.x+' '+food.y);
//while(((food.x+1<=nx)&&(food.x-1>=nx) && (food.y+1<=ny)||(food.y-1>=ny))||collision(food.x,food.y,snake)||ty1==food.y||tx1==food.x||mazecollision(food.x,food.y,maze)||mazecollision(food.x-1,food.y,maze)||mazecollision(food.x+1,food.y,maze)||mazecollision(food.x,food.y+1,maze)||mazecollision(food.x,food.y-1,maze)||maze[food.x][food.y]==1)
while(  (food.x+1>=nx && food.x-1<=nx && food.y>=ny-1 && food.y<=ny+1)||collision(food.x,food.y,snake)||(food.x+1>=tx1 && food.x-1<=tx1 && food.y>=ty1-1 && food.y<=ty1+1)||mazecollision(food.x,food.y,maze)||maze[food.x][food.y]==1||check||checkmaze(food.x,food.y))
		{
		tx1=food.x;ty1=food.y;
	food.x=Math.round(Math.random()*(w-cw)/cw); 
	if(ty1>50)
	food.y=50+Math.round(Math.random()*(h-cw)/(2*cw));
else
	food.y=Math.round(Math.random()*(h-cw)/(cw));

if(level=='fest')
check=(food.y>=6 && food.y<=18) || (food.y>=74 && food.y<=93 && food.x >= 22 && food.x <=65);
else if(level=='level1')
check=((food.y<=32 && food.y>=30) || (food.y<=70 && food.y>=68)) && (food.x<=80 && food.x>20);	
	}
	if(level=='fest')
{
	while((food.y<=18&&food.y>=6)||(food.x<=60&&food.x>=24&&food.y>=39&&food.y<=44)||(food.y>=23&&food.y<=27)||(food.x<62&&food.y>24&&food.x>78&&food.x<88))
	{
		tx1=food.x;ty1=food.y;
	food.x=Math.round(Math.random()*(w-cw)/cw); 
	food.y=Math.round(Math.random()*(h-cw)/cw); 
	}
	
}

	
	}
	var bonusinterval,foodinterval;
	function foodsinterval(){
	var bfoodtime=true;
	bonusinterval=setInterval(makebonusfood,6000);
	foodinterval=setInterval(makefood,35000);
	}
var tnx,tny;
var blink=1;

function blinker(){
if(blinkcolor=="white")
			blinkcolor="green"
			else
			blinkcolor="white";
for(var i = 0; i < snake.length; i++)
		{
			var c = snake[i];
			
			fillCell(c.x, c.y,blinkcolor);
			
			ctx.strokeStyle = "black";
			ctx.stroke();
			
		}
}

function blinkme(){
setInterval(blinker,500);
var gameove=new Image();
gameove.src='games/snakes/images/over.png';
ctx.font="bold 30px verdana";

gameove.onload=function(){
ctx.fillStyle="black";
ctx.drawImage(gameove,0,0);
ctx.fillText("Your Score: "+score,105,215);
var arrName=new Array(2);
arrName[0]=new Array(5);
arrName[1]=new Array(5);
arrName[0] = ["rose", "daisy","orchid", "sunFlower","Lily"];
arrName[1] = [100,200,300,400,500];
    var i = 250;
   for (var k=0;k<arrName[0].length;k++) 
	{
		ctx.fillText(arrName[0][k]+"     "+arrName[1][k]+" pts",105,i);
		i+=35;        
    }


};
}
function bonusfunctions(){
						if(btype==0)
						{
			speedbonus();document.getElementById('spl').innerHTML='SUPER SPEED'; 
						}
			else if(btype==1)
			{
			dimbonus=true;
			document.getElementById('spl').innerHTML='INVISIBLITY';
			}
			else if(btype==2)
			{
			magnet();
			document.getElementById('spl').innerHTML='MAGNET MODE';
			}
			else if(btype>=3)
			{
			foodbonus();
			document.getElementById('spl').innerHTML='Food bonus';
			}
			
			
}
var levelchg=false;
function levelchange(){
//if(score>50&&level=='level1')
if(score>1500&&level=='level1')
	{
		level='level2';
	startgame();
	levelchg=true;
	}
	else if(score>2000&&level=='level2')
	{level='level3';levelchg=true;startgame();}
	else if(score>2500&&level=='level3')
	{level='fest';levelchg=true;startgame();}
	else levelchg=false;
	
}
function fillSnake()
	{
	//Level creation 
	
if(level=='level1')
{<?php include 'games/snakes/javascript/level1.js';?>
imag.src='games/snakes/images/l1.jpg';
}
else
if(level=='level2')
{<?php include 'games/snakes/javascript/level2.js';?>
imag.src='games/snakes/images/level2.png';
}
else
if(level=='level3')
{
for(j=0;j<100;j++)
for(i=0;i<100;i++)
maze[i][j]=0;
<?php include 'games/snakes/javascript/level3.js';?>
imag.src='games/snakes/images/level3.jpg';
}
else
if(level=='fest')
{
<?php include 'games/snakes/javascript/levelFESTEMBER.js';?>
imag.src='games/snakes/images/fest.jpg';
}
	
	//ctx.fillStyle="#000000";
		//ctx.fillRect(0, 0, 500, 500);
		if(dimbonus)
		{timer();displayscore();}
		else
		ctx.drawImage(imag,0,0);
		//if()
		
		ctx.strokeStyle = "black";
		ctx.strokeRect(0, 0, w, h);
	nx = snake[0].x;
	ctx.fill();
	
	ny = snake[0].y;
	if(d == right) nx++;
	else if(d == left) nx--;
	else if(d == up) ny--;
	else if(d == down) ny++;
	
	var gamemode="nob";
	if(gamemode=="nob")
	{
	if(nx<0)
	{
	
	nx--;//var t=snake.pop();t.x=nx;t.y=ny;tempsnake.unshift(tail);filltempSnake();
	nx=nx+100-1;
	}
	if(nx>=99)
	{
	nx++;//var t=snake.pop();t.x=nx;t.y=ny;tempsnake.unshift(tail);filltempSnake();
	nx=nx-100-1;
	}
	if(ny<0)
	{
	
	ny--;//var t=snake.pop();t.x=nx;t.y=ny;tempsnake.unshift(tail);filltempSnake();
	ny=ny+100-1;
	}
	if(ny>=99)
	{
	ny++;//var t=snake.pop();t.x=nx;t.y=ny;tempsnake.unshift(tail);filltempSnake();
	ny=ny-100-1;
	}
	}
	else if(nx == -1 || nx == w/cw || ny == -1 || ny == h/cw || gamemode=="b")
		{
			
			startgame();
			return;
		}
	
	
if(collision(nx,ny,snake)||mazecollision(nx,ny,maze)){
//alert("GAME Over ");
//blink();
for (var i = 1; i < 9999; i++)
        window.clearInterval(i);
clearInterval(snakeinterval);
clearInterval(bonusinterval);
blinkme();
//fbapi.sendScore(score,4,blinkme);
}

var bonusmode=false;
if(magmode)
{
if(nx >= food.x-15 && nx <= food.x+15&& ny <= food.y+15 && ny >= food.y-15 )
{
			var tail = {x: nx, y: ny};
			score=score+50; 
			document.getElementById('score').value=score;
			makefood();
			document.getElementById('bite').currentTime=0;
			document.getElementById('bite').play();displayscore();
			document.getElementById('msg').innerHTML="magmode got u food";
			setTimeout(function(){document.getElementById('msg').innerHTML="";},1000)
			
		}

}
if(foodcollision(nx,ny,foodb))
			{
			
			for(var q=0;q<bonusx.length;q++)
				if(nx==bonusx[q]&&ny==bonusy[q])
				bonusx[q]=-4;bonusy[q]=-4;
				bonusx[clearfoodx]=-4;bonusy[clearfoodx]=-4;var hit;
				for(var q=0;q<bonusx.length;q++)
				{
				if(bonusy[q]+1>=ny&&bonusy[q]-1<=ny)
				{
bonusx[q]=-1;bonusy[q]=-1;

}
}
var tail = {x: nx, y: ny};
			score=score+50; 
			
			document.getElementById('score').value=score;
			makefood();
			document.getElementById('bite').currentTime=0;
			document.getElementById('bite').play();displayscore();

			}


	if((nx == food.x || nx == food.x-1 || nx == food.x+1)&&( ny == food.y || ny == food.y+1 || ny == food.y-1)||foodcollision(nx,ny,foodb))
	//if((nx == food.x || nx == food.x-1 || nx == food.x+1)&&( ny == food.y || ny == food.y+1 || ny == food.y-1))
		{
			if(foodcollision(nx,ny,foodb))
			{
			alert('a');
			for(var q=0;q<bonusx.length;q++)
				if(nx==bonusx[q]&&ny==bonusy[q])
				bonusx[q]=-4;bonusy[q]=-4;
				bonusx[clearfoodx]=-4;bonusy[clearfoodx]=-4;
				for(var q=0;q<bonusx.length;q++)
{
bonusx[q]=-1;bonusy[q]=-1;
alert(bonusx[q]+'a'+bonusy[q]);
}

			}
			
			
			var tail = {x: nx, y: ny};
			score=score+50; 
			
			document.getElementById('score').value=score;
			makefood();
			document.getElementById('bite').currentTime=0;
			document.getElementById('bite').play();displayscore();
			
		}
		
		else if((nx >= bfood.x-3 && nx <= bfood.x+3)&&(  ny <= bfood.y+3 && ny >= bfood.y-3))
		{
			var tail = {x: nx, y: ny};
			var t=bfood.x;
			bfood.x=bfood.y;
			bfood.y=(t+100)%500;
			makebonusfood();
			score=score+200;
			document.getElementById('score').value=score;
			document.getElementById('bite').currentTime=0;
			document.getElementById('bite').play();displayscore();
			bonusmode=true;
			//console.log('a');
					
			//timer();
		}
		else
		{
			var tail = snake.pop(); 
			tail.x = nx; tail.y = ny;
		}
		
	snake.unshift(tail);
	
	fillCell(snake[0].x,snake[0].y,"snake");
	//fillCell(snake[1].x,snake[1].y,"snake");
	//fillCell(snake[2].x,snake[2].y,"snake");

	for(var i = 1; i < snake.length; i++)
		{
			var c = snake[i];
			fillCell(c.x, c.y,"body");
			/*if(blink==0)fillCell(c.x, c.y,"black");
			if(blink>=1&&blink<5){fillCell(c.x, c.y,"white");blink++;}
			if(blink==5){fillCell(c.x, c.y,"black");blink=blink+1;}
			if(blink>=5){fillCell(c.x, c.y,"black");blink--;}*/
		}
		ctx.fill();
		
		fillCell(food.x,food.y,"food");
		fillCell(bfood.x,bfood.y,"bonus");
		ctx.fillStyle="#8ED6FF";
		ctx.rect(500,0,25,500);
		ctx.fill();
		levelchange();
		if(bonusmode&&levelchg==false)
		bonusfunctions();
		//if(dimbonus)
		displayscore();
		
		
		if(foodbonuscheck)
		for(var q=0;q<bonusx.length;q++)
		//if(bonusx>0)
		if(bonusx[q]>0)
{		fillCell(bonusx[q],bonusy[q],"#00F");
if(bonusx[q]<0)
console.log(bonusx[q]+' '+bonusy[q]);
}
		
		
	
		/*for(i=24;i<62;i++)
	fillCell(i,80,"snake");
	for(i=78;i<88;i++)
	fillCell(24,i,"black");*/

		//displayscore();
	}
	var blinkcolor="black";

	function polygonizer(xcent,ycent)
{
var numberOfSides = 4,
    size = 5,
    Xcenter = xcent,
    Ycenter = ycent;

ctx.beginPath();
ctx.moveTo (Xcenter +  size * Math.cos(0), Ycenter +  size *  Math.sin(0));          

for (var i = 1; i <= numberOfSides;i += 1) {
    ctx.lineTo (Xcenter + size * Math.cos(i * 2 * Math.PI / numberOfSides), Ycenter + size * Math.sin(i * 2 * Math.PI / numberOfSides));
}

ctx.strokeStyle = "#000000";
ctx.lineWidth = 1;
ctx.fillstyle="#000";
ctx.fill();
ctx.stroke();

}

function collision(x, y, a)
	{
		for(var i = 0; i < a.length; i++)
		{
			if(a[i].x == x && a[i].y == y)
			 return true;
		}
		return false;
	}
	var clearfoodx,clearfoody;
function foodcollision(x, y, a)
	{
		for(var i = 0; i < a.length; i++)
		{
			if(a[i].x+1 >= x && a[i].x-1 <= x && a[i].y+1 >= y && a[i].y-1 <= y)
			 {
			 clearfoodx=a[i].x;clearfoody=a[i].y;foodb[i].x=-4;foodb[i].y=-4;
			 bonusx[a[i].x]=-4;bonusy[a[i].y]=-4;
			 return true;}
		}
		return false;
	}

	
function mazecollision(x, y, a)
	{
	//maze[2][23]=1;fillCell(2*2,23*2,"black");
		for (var i = 0; i < 100; i++)
for (var j = 0; j < 100; j++)
//if(maze[i][j]==1&&(i*2+1<=x && i*2+2>=x )&&(j*2+1==y|| j*2+2>=y-1 && j*2+1<=y+1)) {return true;}
//if(maze[i][j]==1&&(i*2-2<=x && i*2+2>=x )&&(j*2+1>=y && j*2-1<=y)) {return true;}
if(maze[i][j]==1&&(i*2-1<=x && i*2+1>=x )&&(j*2+1>=y && j*2-1<=y)) {return true;}
		return false;
	}
	function showmaze(){
	for (var i = 0; i < 100; i++)
for (var j = 0; j < 100; j++)
if(maze[i][j]==1)
{
ctx.fillStyle="brown";
ctx.rect(i*10,j*10,10,10);
ctx.fill();
}
}imag.onclick=function(){};
var bodyalternate=0;
	function fillCell(x, y,color1)
	{
		
	//	ctx.fillRect(x*cw, y*cw, cw, cw);
		
		if(color1=='snake')
		{if(d==right)
		{
		var i=new Image();
		i.src='games/snakes/images/up.png';
		ctx.drawImage(i,x*5-10,y*5-9,30,30);
		}
		else if(d==left)
		{
		var i=new Image();
		i.src='games/snakes/images/left.png';
		ctx.drawImage(i,x*5-7,y*5-9,30,30);
		}
		else if(d==up)
		{
		var i=new Image();
		i.src='games/snakes/images/snake-u.png';
		ctx.drawImage(i,x*5-9,y*5-10,30,30);
		}
		else 
		{
		var i=new Image();
		i.src='games/snakes/images/down.png';
		ctx.drawImage(i,x*5-11,y*5-10,30,30);
		}
		}
		else if(color1=="bonus")
		{
		var i=new Image();
		i.src='games/snakes/images/303.gif';
		ctx.drawImage(i,x*5,y*5,20,20);
		}
		else if(color1=="food1")
		{
		var i=new Image();
		i.src='games/snakes/images/food.png';
		ctx.drawImage(i,x*5,y*5,13,13);
		}
		   else
		{ctx.fillStyle="black";
		polygonizer((x*cw+cw)/2,(y*cw+cw)/2);ctx.fillStyle = color1;ctx.fill();
		}
	}
	$(document).keydown(function(e){
		var key = e.which;
		if(key == "37" && d != right) d = left;
		else if(key == "38" && d != down) d = up;
		else if(key == "39" && d != left) d = right;
		else if(key == "40" && d != up) d = down;
			})
			
});

/* TO DO LIST 
-->DOnt restart game on boundary, just continue from opp end*********
-->BOnus food**************
-->no food for 20 sec color to red*************
-->no food for 30 sec game over************
-->Normal food dies in 20 sec************
-->Bonus Food in 10 sec
-->Mazes




*/

</script>
<!--<script src='level1.js' type='text/javascript'></script>-->
<style>
body{
background-image:url('games/snakes/images/bg1.jpg');
}
</style>

</head>
<body>
<br><br><br><br>
<center>
<div id='wrapper'><canvas id="canvas" width="850" height="500" style="border:7px solid"></canvas></div>
</center>
<div id='inst'></div>
<!--
<input type="range" step=3 name="points" id="speed" min="1" max="10" />
-->

<center>Active Special Power::<b id='spl'>None</b><br /><b id='msg'></b></footer><a href=""><button>RESET</button></a></center>
<footer><center>
<audio controls="controls" id='theme' loop="loop" preload="auto">
  <source src="games/snakes/music/theme.mp3" type="audio/mpeg" />
  <source src="games/snakes/music/theme.wav" type="audio/ogg" />
  Your browser does not support the audio element.
</audio>
<audio  id="bite" >
<source src="games/snakes/music/bite.wav" type="audio/wav" />
<source src="games/snakes/music/bite.mp3" type="audio/mpeg" />
Your browser does not support the audio element.
</audio>

</center>

<input type='text' style='visibility:hidden;' id='score' />
</body>
</html>