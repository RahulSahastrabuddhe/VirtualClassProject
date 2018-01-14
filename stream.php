<?php
include ( 'includes/header1.php' );
$result=mysql_query("SELECT * FROM users WHERE username = '$_SESSION[username]'")
or die("There are no records to display ... \n" . mysql_error()); 
if (mysql_num_rows($result)<1){
    $result = null;
}
$row = mysql_fetch_array($result);
if($row)
 {
 $email = $row['email'];
 }
?>

<?php
date_default_timezone_set('Asia/Kolkata');

//$t=date(DATE_RFC2822);
$d=date("Y M j");
$t=date("h:i:s A");

?>
<html lang="en" >
<head>
    <title>ILLUMINOUS</title>
    <link rel="stylesheet" type="text/css" href="css/broadcaststyle.css" />   
	<link rel="stylesheet" type="text/css" href="css/broadcastnormalize.css" />
	<link rel="stylesheet" type="text/css" href="js/jScrol lPane/jScrollPane.css" />
    <link rel="stylesheet" type="text/css" href="css/page.css" />
    <link rel="stylesheet" type="text/css" href="css/chat.css" />

</head>
<body>
<table style="width:100%">
<tr>
<td>
<div class = "bodyDiv">    
<div id="vid-box"></div>
 <div id="stream-info" hidden="true">
        <button id="end" onclick="end()" hidden="true">abort</button>
        <img src="img/person_dark.png"/>
        <span id="here-now">0</span>
</div> 


<form name="streamForm" id="stream" action="#" onsubmit="return errWrap(stream,this);">
    <span class="input input--nao">
        <input class="input__field input__field--nao" type="text" name="streamname" placeholder="Enter Stream Name" id="streamname"/>
                <label class="input__label input__label--nao" for="streamname">
                    <span class="input__label-content input__label-content--nao">        
                    </span>
                </label>
            <svg class="graphic graphic--nao" width="300%" height="100%" viewBox="0 0 1200 60" preserveAspectRatio="none">
                <path d="M0,56.5c0,0,298.666,0,399.333,0C448.336,56.5,513.994,46,597,46c77.327,0,135,10.5,200.999,10.5c95.996,0,402.001,0,402.001,0"/>
            </svg>
    </span>

      <button class="cbutton cbutton--effect-radomir" type="submit" value="Stream" name="stream_submit" style="margin-top: 40px; margin-left:-10px">
            <i class="cbutton__icon fa fa-fw fa fa fa-video-camera"></i>
        </button>
</form>
    

<form name="watchForm" id="watch" action="#" onsubmit="return errWrap(watch,this);">
    <span class="input input--nao">
        <input class="input__field input__field--nao" type="text" name="number" placeholder="Enter Stream To Watch!"/>
                <label class="input__label input__label--nao" for="number">
                    <span class="input__label-content input__label-content--nao">        
                    </span>
                </label>
            <svg class="graphic graphic--nao" width="300%" height="100%" viewBox="0 0 1200 60" preserveAspectRatio="none">
                <path d="M0,56.5c0,0,298.666,0,399.333,0C448.336,56.5,513.994,46,597,46c77.327,0,135,10.5,200.999,10.5c95.996,0,402.001,0,402.001,0"/>
            </svg>
    </span>

       <button class="cbutton cbutton--effect-radomir" type="submit" value="Watch" style="margin-top: 40px; margin-left:-10px">
                <i class="cbutton__icon fa fa-fw fa fa-eye"></i>
        </button>
</form>  
    
<div id="inStream" class="ptext">
	Embed Style: <button onclick="genEmbed(400,600)">Tall</button><button onclick="genEmbed(600,400)">Wide</button><button onclick="genEmbed(500,500)">Square</button><br>
	<div id="embed-code"></div>
	<div id="embed-demo"></div>
</div>
    
<div id="logs" class="ptext" style="background-color:white"></div>


<!-- =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=- -->
<!-- WebRTC Peer Connections -->
<!-- =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=- -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script src="https://cdn.pubnub.com/pubnub.min.js"></script>
<script src="js/webrtc.js"></script>
<script src="js/rtc-controller.js"></script>
<script src="jquery-1.11.0.min.js" type="text/javascript"></script>
<script type="text/javascript">

var video_out  = document.getElementById("vid-box");
var embed_code = document.getElementById("embed-code");
var embed_demo = document.getElementById("embed-demo");
var here_now   = document.getElementById('here-now');
var stream_info= document.getElementById('stream-info');
var end_stream = document.getElementById('end');

var tim1, tim2,tim3, tim4,tim5, tim6;
var streamName;

function stream(form) {
	streamName = form.streamname.value || "<?php echo $_SESSION['username'] ?>";
	var phone = window.phone = PHONE({
	    number        : streamName, // listen on username line else random
	    publish_key   : 'pub-c-561a7378-fa06-4c50-a331-5c0056d0163c', // Your Pub Key
	    subscribe_key : 'sub-c-17b7db8a-3915-11e4-9868-02ee2ddab7fe', // Your Sub Key
	    oneway        : true,
	    broadcast     : true
	});
	//phone.debug(function(m){ console.log(m); })
	var ctrl = window.ctrl = CONTROLLER(phone);
	ctrl.ready(function(){
		form.streamname.style.background="#55ff5b";
		form.streamname.value = phone.number(); 
//		form.stream_submit.hidden="true"; 
		ctrl.addLocalStream(video_out);
		ctrl.stream();
        stream_info.hidden=false;
        end_stream.hidden =false;
		addLog("Streaming Started on " + streamName); 
		tim4=new Date();
	});
	ctrl.receive(function(session){
	    session.connected(function(session){  addLog(" You are streaming to: "+session.number  );});
	    session.ended(function(session) {	
		tim5 = new Date(); tim6 = (tim5-tim4)/60000; 
	      
		  $.ajax({
          type: 'POST',
          url: 'check_availability2.php',
          data: { ttime: tim6, tusername: "<?php echo $_SESSION['username'] ?>", date: "<?php echo $d ?>", time: "<?php echo $t ?>", },
          });
		
		
		
		addLog(session.number + " has left."+tim6); console.log(session)});
		
	});
	ctrl.streamPresence(function(m){
		here_now.innerHTML=m.occupancy;
		addLog(m.occupancy + " currently watching.");
	});
	return false;
}

function watch(form){
	var num = form.number.value;
	var phone = window.phone = PHONE({
	    number        : "Viewer " +  "<?php echo $_SESSION['username'] ?>",                            //Math.floor(Math.random()*100), // listen on username line else random
	    publish_key   : 'pub-c-561a7378-fa06-4c50-a331-5c0056d0163c', // Your Pub Key
	    subscribe_key : 'sub-c-17b7db8a-3915-11e4-9868-02ee2ddab7fe', // Your Sub Key
	    oneway        : true
	});
	var ctrl = window.ctrl = CONTROLLER(phone);
	ctrl.ready(function(){
		ctrl.isStreaming(num, function(isOn){
			if (isOn) ctrl.joinStream(num);
			else alert("User is not streaming!");
		});
		addLog("Joining stream  " + num);
		tim1 = new Date();
	});
	
	ctrl.receive(function(session){
	    session.connected(function(session){ 
            video_out.appendChild(session.video); 
            
            stream_info.hidden=false;
        });
		
	    session.ended(function(session) {tim2 = new Date();
		tim3 = (tim2-tim1)/60000;
		$.ajax({
        type: 'POST',
        url: 'check_availability.php',
        data: { stime: tim3, username: "<?php echo $_SESSION['username'] ?>", tusername: session.number, date: "<?php echo $d ?>", time: "<?php echo $t ?>", },
        });
		
		
		addLog(session.number + " has left.at time you watched "+tim3); });
		
      
	});
	ctrl.streamPresence(function(m){
		here_now.innerHTML=m.occupancy;
		
	});
	return false;
	
}

function getVideo(number){
	return $('*[data-number="'+number+'"]');
}

function addLog(log){
	$('#logs').append("<p>"+log+"</p>");
}

function end(){
	if (!window.phone) return;
	ctrl.hangup();
    video_out.innerHTML = "";
	
	
//	phone.pubnub.unsubscribe(); // unsubscribe all?
}


function errWrap(fxn, form){
	try {
		return fxn(form);
	} catch(err) {
		alert("WebRTC is currently only supported by Chrome, Opera, and Firefox");
		return false;
	}
}

</script>


































</div>
</td>

<div id="chatContainer">
<td style="width:relative">
    <div id="chatTopBar" class="rounded"></div>
    <div id="chatLineHolder"></div>
	
    <div id="chatUsers" class="rounded"></div>
    <div id="chatBottomBar" class="rounded">
    	<div class="tip"></div>
        
        <form id="loginForm" method="post" action="">
            <input id="name" name="name" value="<?php echo $_SESSION['username'] ?>" class="rounded" maxlength="16" readonly />
            <input id="email" name="email" value="<?php echo $email ?>" class="rounded" readonly />
            <input type="submit" class="blueButton" value="Login" />
        </form>
        
        <form id="submitForm" method="post" action="">
            <input id="chatText" name="chatText" class="rounded" maxlength="255" />
            <input type="submit" class="blueButton" value="Submit" />
        </form>
        
    </div>
    </td>
</div>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"></script>
<script src="js/jScrollPane/jquery.mousewheel.js"></script>
<script src="js/jScrollPane/jScrollPane.min.js"></script>
<script src="js/script.js"></script>

</tr>
</table>



</body>

</html>
<?php
include ( 'includes/footer1.php' );
?>