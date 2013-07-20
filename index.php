<body>
<script src="games/snakes/javascript/jquery.js" type="text/javascript"></script>
<script src="games/snakes/javascript/fbhelper.js" type="text/javascript"></script>
<script src="games/snakes/javascript/snakes.js" type="text/javascript"></script>
<!--<script src='level1.js' type='text/javascript'></script>-->
<style>
body{
background-image:url('games/snakes/images/bg1.jpg');
}
</style>

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
<!--  <source src="games/snakes/music/theme.wav" type="audio/wav" /> -->
  Your browser does not support the audio element.
</audio>
<audio  id="bite" >
<source src="games/snakes/music/bite.wav" type="audio/wav" />
Your browser does not support the audio element.
</audio>

</center>

<input type='text' style='visibility:hidden;' id='score' />
</body>
