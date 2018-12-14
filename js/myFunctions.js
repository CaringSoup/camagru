function mySignup() {
    var x = document.getElementById("signup");
    if (x.style.display === "block") {
        x.style.display = "none";
    } else {
        x.style.display = "block";
    }
}

function myProfile() {
	var x = document.getElementById("dropdown");
	if (x.style.display === "block") {
		x.style.display = "none";
	} else {
		x.style.display = "block";
	}
}

function myGallery() {
	var x = document.getElementById("gallery");
	if (x.style.display === "block") {
		x.style.display = "none";
	} else {
		x.style.display = "block";
	}
}

function loginModal() {
	var x = document.getElementById('myModal');
	if (x.style.display === 'block') x.style.display = 'none';
	else x.style.display = 'block';
}


function myLikes(likes) {
	var xhttp = new XMLHttpRequest();
	xhttp.onreadystatechange = function() {
			if (this.readyState == 4 && this.status == 200) {
				likes.classList.toggle("fa-thumbs-down");
			}
	};
	xhttp.open("POST", "http://localhost:8080/WTC_/Semester_2/gferreir/likes.php", true);
	xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	xhttp.send("img_id="+likes.id+"&user_id="+likes.getAttribute('data-userid'));
  }

  function myComments() {
	var x = document.getElementById("myDIV");
	if (x.style.display === "block") {
	  x.style.display = "none";
	} else {
	  x.style.display = "block";
	}
  }