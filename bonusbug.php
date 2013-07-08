<html>
<head>
<script src="javascript/jquery.js" type="text/javascript"></script>
<script src="javascript/ocanvas.js" type="text/javascript"></script>

<script>
var level='l1';

var maze=new Array(100);
  for (var i = 0; i < 100; i++) {
    maze[i] = new Array(100);
  }
  for (var i = 0; i < 100; i++)
  for (var j = 0; j < 100; j++)
  maze[i][j]=0;
function level1(){
for ( i = 10; i < 40; i++)
{
maze[i][15]=1;
}
for ( i = 10; i < 40; i++)
{maze[i][16]=1;
}
for ( i = 10; i < 40; i++)
{maze[i][35]=1;
}/*
for ( i = 10; i < 40; i++)
{maze[i][34]=1;
}
for ( i = 0; i < 10; i++)
{maze[i][0]=1;
maze[i][1]=1;
maze[i][2]=1;
maze[i][3]=1;
}*/
}
$(document).ready(function(){
var imag=new Image()
var canvas=document.getElementById('canvas');
var ctx=canvas.getContext('2d');
var scorecanvas=document.getElementById('canvas');
var scorectx=scorecanvas.getContext('2d');
var scoreimg=new Image();
scoreimg.src="images/board.png";
scoreimg.onload=function(){
ctx.drawImage(scoreimg,525,115);
};
var w=1000,h=1000,nx,ny,score=0;
var cw=10,left=0,up=1,right=2,down=3;
var d;
var snake,tempsnake,food=[],bfood=[];
food.push({x: 0, y:0});
bfood.push({x: 0, y:0 ,type:1});
var snakeinterval;

function startgame(){
d=right;

makesnake();
food.x=5;food.y=35;
makefood();
ctx.fillStyle="#000000";
	ctx.fillRect(0, 0, 500, 500);
level='fest';
if(level=='1')
<?php include 'javascript/level1.js';?>
if(level=='fest')
<?php include 'javascript/levelFESTEMBER.js';?>
//level1();
/*
for ( i = 10; i < 40; i++)
{
maze[i][15]=1;
maze[i][16]=1;
maze[i][35]=1;
maze[i][34]=1;
}*/

/*
for ( i = 10; i < 40; i++)
{
}
for ( i = 10; i < 40; i++)
{
}
for ( i = 0; i < 10; i++)
{maze[i][0]=1;
maze[i][1]=1;
maze[i][2]=1;
maze[i][3]=1;
}*/
//maze=window.maze1;

snakeinterval = setInterval(fillSnake,31);
}
$("#reset").onclick=function(){startgame();alert('a');}
startgame();


function makesnake()
	{
		var length = 35; 
		snake= []; tempsnake = [];
		for(var i = length-1; i>=0; i--)
		{
						snake.push({x: i, y:25});
						//tempsnake.push({x: i, y:0});
		}
		/*snake[0].x=0;
		snake[0].y=25;*/
	}
speedx=document.getElementById('speed').value;

	document.onclick=showmaze();
$("#speed").mouseup(function(){
	defspeed=false;
	startgame();
	var speedx=10-document.getElementById('speed').value;
	alert(speedx*100+50);
	var snakeinterval=setInterval(fillSnake, speedx*100+5);
	});
	function makefood(){
	var tx1=food.x,ty1=food.y;
	food.x=Math.round(Math.random()*(w-cw)/cw); 
	food.y=Math.round(Math.random()*(h-cw)/cw); 

		//console.log(food.x+' '+food.y);
		while(((food.x+1<=nx)&&(food.x-1>=nx) && (food.y+1<=ny)||(food.y-1>=ny))||collision(food.x,food.y,snake)||ty1==food.y||tx1==food.x||mazecollision(food.x,food.y,maze)||mazecollision(food.x-1,food.y,maze)||mazecollision(food.x+1,food.y,maze)||mazecollision(food.x,food.y+1,maze)||mazecollision(food.x,food.y-1,maze)||maze[food.x][food.y]==1)
		{
		tx1=food.x,ty1=food.y;
	food.x=Math.round(Math.random()*(w-cw)/cw); 
	food.y=Math.round(Math.random()*(h-cw)/cw); 
		}
		if(food.y<=ty1+150 && food.y>=ty1-150){food.y=Math.round(Math.random()*(h-cw)/cw);food.x=Math.round(Math.random()*(w-cw)/cw); }
		for (var i = 0; i < 50; i++)
for (var j = 0; j < 100; j++)
//if(maze[i][j]==1 && (i+1>=food.x&&i-i<=food.x) && j==food.y )
if(maze[i][j]==1 && (i+2>=food.x && i-2<=food.x) && (j+2>=food.y && j-2<=food.y) )
makefood();
if(level=='fest')
{
if((food.y<=9&&food.y>=3)||(food.x<=47&&food.x>=3&&food.y>=39&&food.y<=44)||food.y==25||food.y==24||food.y==26)
makefood();
}
if(mazecollision(food.x*2,food.y*2,maze))
makefood();
if(ty1==food.y||tx1==food.x)
		{food.x=food.y;food.y=food.x;}
if(food.x<0)food.x=500+food.x;
if(food.y<0)food.y=500+food.y;		
console.log("FOOD X:"+food.x+" y:"+food.y+" maze val:"+maze[food.x][food.y]);
//fillCell(food.x+1,food.y+1,"black");        //TEST FOR POSTION OF FOOD
	return;
	}
	function makebonusfood(){
	var tx=bfood.x,ty=bfood.y;
	bfood.x=Math.round(Math.random()*(w-cw)/cw); 
	bfood.y=(20+Math.round(Math.random()*(h-cw)/cw))%50; 
	//bfood.type=Math.floor((Math.random()*3)+1);
	
	if(bfood.y<20||collision(bfood.x,bfood.y,snake))
	{
		bfood.x=Math.round(Math.random()*(w-cw)/cw); 
	bfood.y=Math.round(Math.random()*(h-cw)/cw); 
	}
		//console.log(food.x+' '+food.y);
		while(((bfood.x+1<=nx)&&(bfood.x-1>=nx) && (bfood.y+1<=ny)||(bfood.y-1>=ny))||ty==bfood.y||tx==bfood.x||mazecollision(bfood.x,bfood.y,maze)||mazecollision(bfood.x-1,bfood.y,maze)||mazecollision(bfood.x+1,bfood.y,maze)||mazecollision(bfood.x,bfood.y+1,maze)||mazecollision(bfood.x,bfood.y-1,maze)||(mazecollision(bfood.x,bfood.y,maze))||((level=='fest')&&((bfood.y<=9&&bfood.y>=3)||(bfood.x<=47&&bfood.x>=3)||bfood.y==25))||maze[bfood.x*2][bfood.y*2]==1||bfood.y<18)
		{
		tx=bfood.x,ty=bfood.y;
	bfood.x=Math.round(Math.random()*(w-cw)/cw); 
	bfood.y=Math.round(Math.random()*(h-cw)/cw);
		}
		
/*		if(level=='fest')
{
if((bfood.y<=9&&bfood.y>=3)||(bfood.x<=47&&bfood.x>=3)||bfood.y==25)
makebonusfood();
}
*/
while((ty+4>=bfood.y&&ty-4<=bfood.y)||(tx+4>=bfood.x&&tx-4<=bfood.x)||maze[bfood.x*2][bfood.y*2]==1)
{
var t=bfood.y;
bfood.y=bfood.x;
bfood.x=t;
if(maze[bfood.x*2][bfood.y*2]==1)
makebonusfood();
}
if(ty==bfood.y||tx==bfood.x)
		{bfood.x=bfood.y;bfood.y=bfood.x;}
if(bfood.x<0)bfood.x=500+bfood.x;
if(bfood.y<0)bfood.y=500+bfood.y;		

		if(bfood.y<=ty+150 && bfood.y>=ty-150){bfood.y=Math.round(Math.random()*(h-cw)/cw);bfood.x=Math.round(Math.random()*(w-cw)/cw); }
	return;
	}
	var bfoodtime=true;
	if(bfoodtime)
	var bonusinterval=setInterval(makebonusfood,3000);
	var foodinterval=setInterval(makefood,35000);
var tnx,tny;
var blink=1;
function displayscore()
{
ctx.font="bold 30px verdana";
ctx.fillStyle="#8ED6FF";
ctx.rect(500,0,350,500);
ctx.fill();
ctx.drawImage(scoreimg,525,115);
console.log(score%10);

ctx.fillText(Math.floor(score/10000),575,250);

ctx.fillText(Math.floor(score/1000-10*Math.floor(score/10000)),622,250);

ctx.fillText(Math.floor(score/100-10*Math.floor(score/1000)),665,250);

ctx.fillText(Math.floor(score/10-10*Math.floor(score/100)),708,250);
ctx.fillText("0",750,250);
}
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
}

function fillSnake()
	{
	console.log("x:"+nx+"y:"+ny);
	//level='1';
//showmaze();
	if(level=='1')
{<?php include 'javascript/level1.js';?>
imag.src='images/l1.png';
}
if(level=='fest')
{<?php include 'javascript/levelFESTEMBER.js';?>
imag.src='images/fest.png';
}
	
	ctx.fillStyle="#000000";
		ctx.fillRect(0, 0, 500, 500);
		ctx.drawImage(imag,0,0);
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
	if(ny>100)
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
alert("GAME Over ");
//blink();
clearInterval(snakeinterval);
clearInterval(bonusinterval);
blinkme();
}
	if((nx == food.x || nx == food.x-1 || nx == food.x+1)&&( ny == food.y || ny == food.y+1 || ny == food.y-1))
		{
			var tail = {x: nx, y: ny};
			score=score+50; 
			makefood();
		}
		
		else if((nx == bfood.x || nx == bfood.x-1 || nx == bfood.x+1)&&( ny == bfood.y || ny == bfood.y+1 || ny == bfood.y-1))
		{
			var tail = {x: nx, y: ny};
			var t=bfood.x;
			bfood.x=bfood.y;
			bfood.y=(t+100)%500;
			makebonusfood();
			score=score+200;
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
		ctx.fillStyle="#000000";
	
		
		fillCell(food.x,food.y,"#00F");
		fillCell(bfood.x,bfood.y,"#f00");
		displayscore();
		
		
		
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
}imag.onclick=function(){alert('as');};
var bodyalternate=0;
	function fillCell(x, y,color1)
	{
		
	//	ctx.fillRect(x*cw, y*cw, cw, cw);
		
		if(color1=='snake')
		{if(d==right)
		{
		var i=new Image();
		i.src='images/up.png';
		ctx.drawImage(i,x*5-10,y*5-9,30,30);
		}
		else if(d==left)
		{
		var i=new Image();
		i.src='images/left.png';
		ctx.drawImage(i,x*5-7,y*5-9,30,30);
		}
		else if(d==up)
		{
		var i=new Image();
		i.src='images/snake-u.png';
		ctx.drawImage(i,x*5-9,y*5-10,30,30);
		}
		else 
		{
		var i=new Image();
		i.src='images/down.png';
		ctx.drawImage(i,x*5-11,y*5-10,30,30);
		}
		}
		   else
		{
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
</head>

<input type="range" step=3 name="points" id="speed" min="1" max="10" />
<canvas id="canvas" width="850" height="500" style="border:7px solid"></canvas>
<!--
<input type="button" id="reset" onclick="javascript:startgame()" value="RESET" />-->