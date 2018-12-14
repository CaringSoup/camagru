    <link rel="stylesheet" href="css/main.css"/>
    <script src="js/photo.js"></script>
    <div class="booth">
        <div id="videodiv">
            <video id="video" width="400" height="300"></video>
            <a href="#" id="capture" class="booth-capture">Snap Photo</a>
        </div>
        <div id="photodiv">
            <canvas id="canvas" width="400" height="300"></canvas>
            <canvas id="canvashold" width="400" height="300" style='display: none;'></canvas>
            <button onclick="savetogallery()" class="booth-capture" style="width: 100%">Save to gallery</button>
        </div>
    </div>
    <div class="row">
  <input type="checkbox" name="overlay" value="black_beard" id="bbeard">Black beard<br>
  <input type="checkbox" name="overlay" value="jb007" checked="checked" id="jb">The names Bond...<br>
  <input type="checkbox" name="overlay" value="santa_hat" id="hat">Santa hat<br>
  <input type="button" onclick="examplePreview()" value="Add on">
</div>
    <div id="thing"></div>