<style>
.hexagon {
  position: relative;
  width: 140px; 
  height: 80.83px;
  background-color: white;
  margin: 40.41px 0;
  box-shadow: 0 0 5px rgba(0,0,0,0.6);
  color:black;
}

.hexagon:before,
.hexagon:after {
  content: "";
  position: absolute;
  z-index: 1;
  width: 98.99px;
  height: 98.99px;
  -webkit-transform: scaleY(0.5774) rotate(-45deg);
  -ms-transform: scaleY(0.5774) rotate(-45deg);
  transform: scaleY(0.5774) rotate(-45deg);
  background-color: inherit;
  left: 20.5025px;
  box-shadow: 0 0 5px rgba(0,0,0,0.6);
}

.hexagon:before {
  top: -49.4975px;
}

.hexagon:after {
  bottom: -49.4975px;
}

/*cover up extra shadows*/
.hexagon span {
  display: block;
  position: absolute;
  top:0px;
  left: 0;
  width:140px;
  height:80.8290px;
  z-index: 2;
  background: inherit;
}

.hexagon span { 
	text-align:center;
	vertical-align:center;
	font:larger;
}
.complete {
	background: #5cb85c;
	color:white;
}
.in-process {
	background: #9786cc;
	color:white;
}
.accordion-wsar-score
{
	font-size: 24px; 
	color: purple;
	
}
.required>label:after {
    content: '*';
    color: red;
}

.tooltip {
    width : 250px;
}
</style>