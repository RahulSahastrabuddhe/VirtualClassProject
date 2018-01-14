<video  id="video" width="320" height="240" controls>
  <source src="movie.mp4" type="video/mp4">
  <source src="movie.ogg" type="video/ogg">
  Your browser does not support the video tag.
</video><script src="size.js"></script>

<button onClick="big()">Big</button>
<button  onClick="small()">Small</button>
<button onClick="normal()">Normal</button>
<script>
// JavaScript Document
var myVideo = document.getElementById("video");

function big()
  {
myVideo.width=1104;
  }
function small()
 {
myVideo.height=320;
  }
function normal()
 {
myVideo.width=400;
  }
</script>