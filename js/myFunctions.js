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

function updateModalnew() {
	var x = document.getElementById('updateMyModal');
	if (x.style.display === 'block') x.style.display = 'none';
	else x.style.display = 'block';
}

function updateModal() {
	var x = document.getElementById('closeModal');
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
	xhttp.open("POST", "likes.php", true);
	xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	xhttp.send("img_id="+likes.id+"&user_id="+likes.getAttribute('data-userid'));
}

function myComments(id) {
	if (document.getElementById("commentdiv" + id).style.display === "block") {
		document.getElementById("commentdiv" + id).style.display = "none";
	} else {
		document.getElementById("commentdiv" + id).style.display = "block";
	}
}
	
function submitcomment(id, box) {
	var xhr = new XMLHttpRequest();
	var comment = document.getElementById(id + '-comment').value;
	xhr.addEventListener('load', function(event) {
		loadcomments(id);
		document.getElementById(id + '-comment').value = "";
		showComments(id);
		myComments(id);
	});
	xhr.open('POST', 'comments.php');
	xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
	xhr.send('type=set&imgID=' + id + '&comment=' + comment);
}

function loadcomments(id) {
	var xhr = new XMLHttpRequest();
	xhr.addEventListener('load', function(event) {
		document.getElementById('insertcomment' + id).innerHTML = this.response;
	});
	xhr.open('POST', 'comments.php');
	xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
	xhr.send('type=fetch&imgID=' + id);
}

function showComments(id) {
	if (document.getElementById('insertcomment' + id).style.display == 'block')
		document.getElementById('insertcomment' + id).style.display = "none";
	else
		document.getElementById('insertcomment' + id).style.display = "block";
	loadcomments(id);
}

function deleteImage(id) {
	var xhr = new XMLHttpRequest();
	xhr.onreadystatechange = function(event) {
		if (this.status == 200)
		{
			window.location.reload();
		};
	};
	xhr.open('POST', 'delete.php');
	xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
	xhr.send('imageid='+id);
}

function signup() {
	var xhr = new XMLHttpRequest();
	var username = document.querySelector("#signupusername").value;
	var password = document.querySelector("#signuppassword").value;
	var confirm = document.querySelector('#signupconfirm').value;
	var email = document.querySelector('#email').value;
	xhr.onreadystatechange = function(event) {
		if (this.status == 200 && this.readyState == 4)
		{
			document.querySelector(".signupModalError").innerHTML = this.response;
		}
	}
	xhr.open('POST', 'modal/signup.php');
	xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
	xhr.send("username=" + username + "&password=" + password + "&confirm=" + confirm + "&email=" + email);
}