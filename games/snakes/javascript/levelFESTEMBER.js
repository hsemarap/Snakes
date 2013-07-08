for (var i = 0; i < 100; i++)
for (var j = 0; j < 100; j++)
maze[i][j]=0;

//FESTEMBER F
for(i=3;i<6;i++)maze[i][6]=1;
for(i=3;i<6;i++)maze[i][4]=1;
for(j=4;j<9;j++)maze[3][j]=1;


//FESTEMBER E
for(j=4;j<9;j++)
for(i=8;i<11;i++)maze[i][j]=1;

//FESTEMBER S
for(j=4;j<9;j++)
for(i=13;i<16;i++)maze[i][j]=1;
//FESTEMBER T
for(j=4;j<9;j++)maze[18][j]=1;
for(i=17;i<20;i++)maze[i][4]=1;

//FESTEMBER E
for(j=4;j<9;j++)
for(i=21;i<24;i++)maze[i][j]=1;


//FESTEMBER M
for(j=4;j<9;j++)maze[26][j]=1;
for(j=4;j<9;j++)maze[30][j]=1;
maze[28][4]=1;maze[27][4]=1;maze[29][4]=1;
maze[28][5]=1;
maze[28][6]=1;

//FESTEMBER B
for(j=4;j<9;j++)maze[33][j]=1;
for(j=4;j<9;j++)maze[36][j]=1;
for(j=4;j<9;j++)maze[35][j]=1;
//for(i=34;i<37;i++)maze[i][6]=1;
//for(i=34;i<37;i++)maze[i][4]=1;
//for(i=34;i<37;i++)maze[i][8]=1;
maze[34][6]=0;maze[34][4]=0;maze[34][8]=0;

//FESTEMBER E
//FESTEMBER E
for(j=4;j<9;j++)
for(i=39;i<42;i++)maze[i][j]=1;

//FESTEMBER R
for(j=4;j<9;j++)maze[43][j]=1;
for(i=43;i<47;i++)maze[i][6]=1;
for(i=43;i<47;i++)maze[i][4]=1;
for(j=4;j<9;j++)maze[46][j]=1;
maze[44][6]=0;

//MIDDLE BAR
for(i=0;i<50;i++)maze[i][25]=1;

//level1();
//maze=window.maze1;

//nitt n
for(j=39;j<44;j++)maze[12][j]=1;
for(j=39;j<44;j++)maze[17][j]=1;
maze[13][39]=1;
maze[14][40]=1;
maze[14][41]=1;
maze[15][41]=1;
maze[15][42]=1;
maze[16][42]=1;
maze[16][43]=1;
maze[13][40]=1;


//nitt i
for(j=39;j<44;j++)maze[20][j]=1;


//nitt t
for(j=39;j<44;j++)maze[24][j]=1;
maze[23][39]=1;maze[25][39]=1;

//nitt t
//nitt t
for(j=39;j<44;j++)maze[29][j]=1;
maze[28][39]=1;maze[30][39]=1;





/***************************
makefood constraints


(food.y>=6 && food.y<=18) || (food.y>=74 && food.y<=93 && food.x >= 22 && food.x <=65)




****************************/









