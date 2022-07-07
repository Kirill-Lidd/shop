document.getElementById('slider-left').onclick = sliderLeft;
document.getElementById('slider-right').onclick = sliderRight;

var left = 0;


function sliderLeft(){
  var polosa = document.getElementById('polosa');
  left = left -530;
  if(left < -530){
    left = 0;
  }
  polosa.style.left = left +'px';
}
function sliderRight(){
  var polosa = document.getElementById('polosa');
   left = left +530;
   if(left > 0){
    left = -530;
  }
  polosa.style.left = left +'px';
}