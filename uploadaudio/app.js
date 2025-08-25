
URL = window.URL || window.webkitURL;

var gumStream; 						//stream from getUserMedia()
var rec; 							//Recorder.js object
var input; 							//MediaStreamAudioSourceNode we'll be recording
var stop_btn_status=true;

// shim for AudioContext when it's not avb. 
var AudioContext = window.AudioContext || window.webkitAudioContext;
var audioContext ;//audio context to help us record




var counter_voice=1;
var ry_rec_audio = document.getElementById("ry-microphone");

//add events to those 2 buttons
ry_rec_audio.addEventListener("click", sts_check);
function sts_check() {
    if (stop_btn_status){
        startRecording();
        stop_btn_status=false;
    }
    else {
        stopRecording();
        stop_btn_status=true;
    }
}


function startRecording() {
	console.log("recordButton clicked");

	/*
		Simple constraints object, for more advanced audio features see
		https://addpipe.com/blog/audio-constraints-getusermedia/
	*/

    var constraints = { audio: true, video:false };



	navigator.mediaDevices.getUserMedia(constraints).then(function(stream) {
		console.log("getUserMedia() success, stream created, initializing Recorder.js ...");

		/*
			create an audio context after getUserMedia is called
			sampleRate might change after getUserMedia is called, like it does on macOS when recording through AirPods
			the sampleRate defaults to the one set in your OS for your playback device

		*/
		audioContext = new AudioContext();

		//update the format
		// document.getElementById("formats").innerHTML="Format: 1 channel pcm @ "+audioContext.sampleRate/1000+"kHz";

		/*  assign to gumStream for later use  */
		gumStream = stream;

		/* use the stream */
		input = audioContext.createMediaStreamSource(stream);

		/*
			Create the Recorder object and configure to record mono sound (1 channel)
			Recording 2 channels  will double the file size
		*/
		rec = new Recorder(input,{numChannels:1});

		//start the recording process
		rec.record();

		console.log("Recording started");

	}).catch(function(err) {
	  	//enable the record button if getUserMedia() fails

	});
}

function pauseRecording(){
	console.log("pauseButton clicked rec.recording=",rec.recording );
	if (rec.recording){
		//pause
		rec.stop();

	}else{
		//resume
		rec.record();


	}
}

function stopRecording() {
	console.log("stopButton clicked");

	//disable the stop button, enable the record too allow for new recordings


	//reset button just in case the recording is stopped while paused


	//tell the recorder to stop the recording
	rec.stop();

	//stop microphone access
	gumStream.getAudioTracks()[0].stop();

	//create the wav blob and pass it on to createDownloadLink
	rec.exportWAV(createDownloadLink);
}

function createDownloadLink(blob) {

	var url = URL.createObjectURL(blob);
	var au = document.createElement('audio');
	var li = document.createElement('li');
	var link = document.createElement('a');

	//name of .wav file to use during upload and download (without extendion)
	var filename = new Date().toISOString();

	//add controls to the <audio> element
	au.controls = true;
	au.src = url;

	//save to disk link
	link.href = url;
	link.download = filename+".wav"; //download forces the browser to donwload the file using the  filename
	link.innerHTML = "Save to disk";

	//add the new audio element to li
	// li.appendChild(au);

	//add the filename to the li
	// li.appendChild(document.createTextNode(filename+".wav "));

	//add the save to disk link to li
	// li.appendChild(link);

	//upload link
	var upload = document.createElement('a');
	upload.href="#";
	upload.innerHTML = "Upload";

		  upload_video();

	// li.appendChild(document.createTextNode (" "));//add a space in between
	// li.appendChild(upload);//add the upload link to li


	function upload_video(){
        counter_voice=Math.floor(Math.random() * 100000) + 1;
        var namesss=Math.floor(Math.random() * 6) + 1;
        var xhr=new XMLHttpRequest();
        xhr.onload=function(e) {
            if(this.readyState === 4) {
                console.log("Server returned: ",e.target.responseText);
            }
        };
        var fd=new FormData();
        fd.append("audio_data",blob, filename);
        fd.append("name","roozbeh"+counter_voice);

        xhr.open("POST","./upload_voice.php",true);
        xhr.send(fd);

	}




	//add the li element to the ol

}