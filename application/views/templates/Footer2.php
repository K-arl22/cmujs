<br>
<footer class="main-footer w-100 position-absolute bottom-0 start-0 py-2" style="background: #222">
        <div class="container-fluid">
          <div class="row text-center gy-3">
            <div class="col-sm-6 text-sm-start">
              <p class="mb-0 text-sm text-gray-600">CMU Journal of Science &copy; 2024</p>
            </div>
            <div class="col-sm-6 text-sm-end">
              <p class="mb-0 text-sm text-gray-600">Contact us <a href="#">CMU</a></p>
              <!-- Please do not remove the backlink to us unless you support further theme's development at https://bootstrapious.com/donate. It is part of the license conditions and it helps me to run Bootstrapious. Thank you for understanding :)-->
            </div>
          </div>
        </div>
      </footer>
    </div>
    <!-- JavaScript files-->
    <script src="<?php echo base_url("assets/strap/bootstrap.bundle.min.js")?>"></script>
    <script src="<?php echo base_url("assets/strap/Chart.min.js")?>"></script> 
    <script src="<?php echo base_url("assets/strap/just-validate.min.js")?>"></script>
    <script src="<?php echo base_url("assets/strap/choices.min.js")?>"></script>
    <script src="<?php echo base_url("assets/strap/OverlayScrollbar.min.js")?>"></script>
    
    <!-- Main File-->
    <script src="<?php echo base_url("assets/strap/front.js")?>"></script>
    
    <script>
      // ------------------------------------------------------- //
      //   Inject SVG Sprite - 
      //   see more here 
      //   https://css-tricks.com/ajaxing-svg-sprite/
      // ------------------------------------------------------ //
      function injectSvgSprite(path) {
      
          var ajax = new XMLHttpRequest();
          ajax.open("GET", path, true);
          ajax.send();
          ajax.onload = function(e) {
          var div = document.createElement("div");
          div.className = 'd-none';
          div.innerHTML = ajax.responseText;
          document.body.insertBefore(div, document.body.childNodes[0]);
          }
      }
      // this is set to BootstrapTemple website as you cannot 
      // inject local SVG sprite (using only 'icons/orion-svg-sprite.svg' path)
      // while using file:// protocol
      // pls don't forget to change to your domain :)
      injectSvgSprite('https://bootstraptemple.com/files/icons/orion-svg-sprite.svg'); 
      
      
    </script>
    <!-- FontAwesome CSS - loading as last, so it doesn't block rendering-->
    <link rel="stylesheet" href="<?php echo base_url('assets/strap/release.css'); ?>" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
  </body>
</html>

<script>
document.getElementById('profilePicInput').addEventListener('change', function(event) {
    const file = event.target.files[0]; // Get the selected file
    const reader = new FileReader(); // Create a FileReader instance

    // When the file is loaded
    reader.onload = function(e) {
        const img = document.getElementById('profilePic'); // Get the img element
        img.src = e.target.result; // Set the src attribute of the img element to the file data
        
        // Set the width and height of the new image to match the profile picture dimensions
        img.style.width = '260px'; // Assuming the original profile picture width is 260px
        img.style.height = '260px'; // Assuming the original profile picture height is 260px
    };
    // Read the file as a data URL
    reader.readAsDataURL(file);
});
</script>