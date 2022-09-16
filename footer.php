 <!-- Footer -->
    <footer>
        <div style="text-align:center;"><?php echo date("Y"); ?> &copy; <strong><a href="#"> Inventory Management, All Rights Reserved. </a></strong></div>
        <div><a id="back2Top" title="Back to top" href="#">&#10148;</a></div>
    </footer>

	
	<!-- Include Jquery library from Google's CDN but if something goes wrong get Jquery from local file (Remove 'http:' if you have SSL) -->
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
        <script>!window.jQuery && document.write(decodeURI('%3Cscript src="js/vendor/jquery-1.11.1.min.js"%3E%3C/script%3E'));</script>

        <!-- Bootstrap.js -->
        <script src="js/vendor/bootstrap.min.js"></script>

        <!-- Jquery plugins and custom javascript code -->
        <script src="js/plugins.js"></script>
        <script src="js/main.js"></script>
                    
					
<!-- <canvas id="myCanvas" width="100" height="100"></canvas>-->
<script>
const canvas = document.querySelector('#myCanvas');
  // could be 3d, if you want to make a video game
  const ctx = canvas.getContext('2d');
  canvas.width = window.innerWidth;
  canvas.height = window.innerHeight;

  ctx.lineJoin = 'round';
  ctx.lineCap = 'round';
  ctx.lineWidth = 5;
  ctx.strokeStyle = '#000';

  let isDrawing = false;
  let lastX = 0;
  let lastY = 0;

  function draw(e) {
    // stop the function if they are not mouse down
    if(!isDrawing) return;
    //listen for mouse move event
    console.log(e);
    ctx.beginPath();
    ctx.moveTo(lastX, lastY);
    ctx.lineTo(e.offsetX, e.offsetY);
    ctx.stroke();
    [lastX, lastY] = [e.offsetX, e.offsetY];
  }

  canvas.addEventListener('mousedown', (e) => {
    isDrawing = true;
    [lastX, lastY] = [e.offsetX, e.offsetY];
  });

  canvas.addEventListener('mousemove', draw);
  canvas.addEventListener('mouseup', () => isDrawing = false);
  canvas.addEventListener('mouseout', () => isDrawing = false);
  
  function openNav() {
  document.getElementById("mySidenav").style.width = "250px";
  document.getElementById("main").style.marginLeft = "250px";
}

function closeNav() {
  document.getElementById("mySidenav").style.width = "0";
  document.getElementById("main").style.marginLeft= "0";
}
</script>
<script type="text/javascript">
$(function (){
	$("#rma").change(function () {
		if($(this).val() == "rma") {
		    $("#rma").show();
            } else {
                $("#rma").hide();
            }
	}
}
</script>
<script>
    /*Scroll to top when arrow up clicked BEGIN*/
$(window).scroll(function() {
    var height = $(window).scrollTop();
    if (height > 100) {
        $('#back2Top').fadeIn();
    } else {
        $('#back2Top').fadeOut();
    }
});
$(document).ready(function() {
    $("#back2Top").click(function(event) {
        event.preventDefault();
        $("html, body").animate({ scrollTop: 0 }, "slow");
        return false;
    });

});
 /*Scroll to top when arrow up clicked END*/
/* //var ctx = document.getElementById('myChart').getContext('2d');
var chart = new Chart(ctx, {
    // The type of chart we want to create
    type: 'horizontalBar',

    // The data for our dataset
    data: {
        labels: ['First Name', 'Last Name', 'Email Address', 'Department', 'Username', 'Password'],
        datasets: [{
            label: 'diagram',
            backgroundColor: 'rgba(0, 0, 0, 0.1)',
            borderColor: 'rgb(255, 99, 132)',
            barPercentage: 0.5,
			barThickness: 1,
			maxBarThickness: 1,
			minBarLength: 0,
            data: [6, 6, 6, 4, 2, 2],
			order:2
        }]
    },

    // Configuration options go here
    options: {
		scales: {
            xAxes: [{
                stacked: true
            }],
            yAxes: [{
                stacked: true
            }]
        }
		
	}
}); */
</script>
<!-- END Footer -->