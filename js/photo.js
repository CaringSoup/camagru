let canvas, canvashold, canvas_2d, canvashold_2d, video, videodiv, photodiv;

window.onload = function() {
    canvas = document.getElementById('canvas'); //demo
    canvashold = document.getElementById('canvashold'); //sent to server
    canvas_2d = canvas.getContext('2d');
    canvashold_2d = canvashold.getContext('2d');
    video = document.getElementById('video');
    photodiv = document.getElementById('photodiv');
    videodiv = document.getElementById('videodiv');
    photodiv.style.display = "none";
    if (navigator.mediaDevices && navigator.mediaDevices.getUserMedia) {
        navigator.mediaDevices.getUserMedia({ video: true }).then(stream => {
            try {
                video.srcObject = stream;
            }
            catch (error) {
                video.src = window.URL.createObjectURL(stream);
            }
            video.play();
        });
    }
    document.getElementById('capture').addEventListener('click', snap);
}

function snap(){
    photodiv.style.display = "block";
    canvas.width = video.offsetWidth;
    canvas.height = video.offsetHeight;
    canvas_2d.drawImage(video, 0, 0, video.offsetWidth, video.offsetHeight);
    canvashold.width = video.offsetWidth;
    canvashold.height = video.offsetHeight;
    canvashold_2d.drawImage(video, 0, 0, video.offsetWidth, video.offsetHeight);
    videodiv.style.display = "none";
}

function examplePreview()
{
	var bbeard = document.getElementById("bbeard");
	var jb = document.getElementById("jb");
    var santa = document.getElementById("hat");

	if (bbeard.checked)
	{
		var bbeardimg = new Image();
		bbeardimg.src = "superimpose/black_beard.jpg";
		canvashold_2d.drawImage(bbeardimg,100,480,630,100);
	}
	if (jb.checked)
	{
		var jb = new Image();
		jb.src = "superimpose/jb007.jpg";
		canvashold_2d.drawImage(jb,0,0,640,640);
	}
	if (santa.checked)
	{
		var santa = new Image();
		santa.src = "superimpose/santa_hat.jpg";
		canvashold_2d.drawImage(santa,320,0,400,100);
	}
}

function savetogallery()
{
    var image = canvashold.toDataURL();
    xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function ()
    {
        if (this.readyState == 4 && this.status == 200)
        {
            alert(this.response);
        }
        console.log("ready state:: " + this.readyState + "\nStatus:: " +  this.status + "\nResponse:: " + this.response);
    }
    xhr.open("post", "modal/savephoto.php");
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xhr.send("image=" + escape(image));
}