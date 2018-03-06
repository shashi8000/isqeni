<link href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet">
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<style type="text/css">
body {
  background-color: #ecf0f1;
}
.navbar-inverse {
  background-color: #2C3E50;
  border-color: #2C3E50;
}
.navbar {
  position: relative;
  min-height: 50px;
  margin-bottom: 0px;
  border: 0px solid transparent;
}
.navbar-nav > li > a {
  padding-top: 20px;
  padding-bottom: 10px;
  line-height: 20px;
}
@media (min-width: 768px) {
.navbar {
  border-radius: 0px;
}
}
.navbar-brand {
  float: left;
  height: auto;
  padding: 15px 15px;
  font-size: 18px;
  line-height: 20px;
}
.sidebar-toggle {
  color: #fff;
  font-size: 28px;
  display: inline-block;
  padding: 3px 22px;
}
@media (min-width:768px) {
.container-1 {
  width: 15%;
  float: left;
}
.container-2 {
  width: 100%;
  float: left;
}
}
 @media (max-width:768px) {
.container-1 {
  width: 100%;
}
.container-2 {
  width: 100%;
}
}
.container-1:after, .container-2:before {
  display: table;
  content: " ";
}
.container-1:after, .container-2:after {
  clear: both;
}
.container-1 {
  display: none;
}
/*navbar-right=====START==========*/

.social-icon {
  margin: 0px;
  padding: 0px;
}
.social-icon li {
  margin: 0px;
  padding: 0px;
  list-style-type: none;
}
.social-icon li a {
  display: block;
  padding: 15px 14px;
  text-decoration: none;
}
.social-icon li a:focus {
  color: #fff;
  text-decoration: none;
}
.messages-link {
  color: #fff !important;
  background: #16a085 !important;
}
.alerts-link {
  color: #fff !important;
  background: #f39c12 !important;
}
.tasks-link {
  color: #fff !important;
  background: #2980b9 !important;
}
.user-link {
  color: #fff !important;
  background: #E74C3C !important;
}
.number {
  position: absolute;
  bottom: 25px;
  left: 3px;
  width: 20px;
  height: 20px;
  padding-right: 1px;
  border-radius: 50%;
  text-align: center;
  font-size: 11px;
  line-height: 20px;
  background-color: #2c3e50;
}
.dropdown-menu {
  position: absolute;
  top: 100%;
  left: -105px;
  z-index: 1000;
  display: none;
  float: left;
  min-width: 160px;
  padding: 5px 0;
  margin: 2px 0 0;
  font-size: 14px;
  text-align: left;
  list-style: none;
  background-color: #fff;
  -webkit-background-clip: padding-box;
  background-clip: padding-box;
  border: 1px solid #ccc;
  border: 1px solid rgba(0, 0, 0, .15);
  border-radius: 4px;
  -webkit-box-shadow: 0 6px 12px rgba(0, 0, 0, .175);
  box-shadow: 0 6px 12px rgba(0, 0, 0, .175);
}
/*navbar-right=======END========*/

/*sidebar-toggle=============*/
.sidebar-toggle:hover, .sidebar-toggle:focus {
  color: #fff;
  text-decoration: underline;
}
/*sidr-NAVBAR=======START========*/
.navbar-nav-1 {
  width: 100%;
  background-color: #34495E;
  height: auto;
  overflow: hidden;
  z-index: 1020;
  position: relative;
}
.side-user {
  display: block;
  width: 100%;
  padding: 15px;
  border-top: none !important;
  border-bottom: 1px solid #142638;
  text-align: center;
}
.close-btn {
  position: absolute;
  z-index: 99;
  color: #fff;
  font-size: 31px;
  top: 0px;
  left: 223px;
  display: none;
  padding: 0px;
  cursor: pointer;
}
.close-btn .fa-window-close {
  color: #fff;
  font-size: 25px;
}
.welcome {
  margin: 0;
  font-style: italic;
  color: #9aa4af;
}
.name {
  margin: 0;
  font-family: "Ubuntu", "Helvetica Neue", Helvetica, Arial, sans-serif;
  font-size: 20px;
  font-weight: 300;
  color: #ccd1d7;
}
.side-user a {
  color: #fff;
}
.nav-search {
  border-top: 1px solid #54677a;
}
.nav-search .form-control {
  border: 1px solid #000;
  border-radius: 0px;
}
.nav-search .btn {
  border: 1px solid #000;
  border-radius: 0px;
}
.dashboard>a {
  color: #fff;
}
.side-nav li {
  border-top: 1px solid #54677a;
  border-bottom: 1px solid #142638;
}
.side-nav>li>a:active {
  text-shadow: 1px 1px 1px rgba(0,0,0,0.1);
  outline: none;
  color: #fff;
  background-color: #34495e;
}
.panel {
  margin-bottom: 0;
  border: none;
  border-radius: 0;
  background-color: transparent;
  box-shadow: none;
}
.panel>a {
  position: relative;
  display: block;
  padding: 10px 15px;
  color: #fff;
}
.panel>ul>li>a {
  position: relative;
  display: block;
  padding: 10px 15px;
  color: darkcyan;
  background: black;
}
.nav > li > a:hover, .nav > li > a:focus {
  text-decoration: none;
  background-color: #3d566e;
}
/*sidr-NAVBAR=======END========*/
@media (min-width: 768px) {
#page-wrapper {
  padding: 0 30px;
  min-height: 1300px;
  border-left: 1px solid #2c3e50;
}
}
#page-wrapper {
  padding: 0 15px;
  border: none;
}
.date-picker {
  border-color: #138871;
  color: #fff;
  background-color: #149077;
  margin-top: -7px;
  border-radius: 0px;
  margin-right: -15px;
}
#page-wrapper .breadcrumb {
  padding: 8px 15px;
  margin-bottom: 20px;
  list-style: none;
  background-color: #e0e7e8;
  border-radius: 0px;
}
 @media (min-width: 768px) {
.circle-tile {
  margin-bottom: 30px;
}
}
.circle-tile {
  margin-bottom: 15px;
  text-align: center;
}
.circle-tile-heading {
  position: relative;
  width: 80px;
  height: 80px;
  margin: 0 auto -40px;
  border: 3px solid rgba(255,255,255,0.3);
  border-radius: 100%;
  color: #fff;
  transition: all ease-in-out .3s;
}
/* -- Background Helper Classes */

/* Use these to cuztomize the background color of a div. These are used along with tiles, or any other div you want to customize. */

.dark-blue {
  background-color: #34495e;
}
.green {
  background-color: #16a085;
}
.blue {
  background-color: #2980b9;
}
.orange {
  background-color: #f39c12;
}
.red {
  background-color: #e74c3c;
}
.purple {
  background-color: #8e44ad;
}
.dark-gray {
  background-color: #7f8c8d;
}
.gray {
  background-color: #95a5a6;
}
.light-gray {
  background-color: #bdc3c7;
}
.yellow {
  background-color: #f1c40f;
}
/* -- Text Color Helper Classes */

.text-dark-blue {
  color: #34495e;
}
.text-green {
  color: #16a085;
}
.text-blue {
  color: #2980b9;
}
.text-orange {
  color: #f39c12;
}
.text-red {
  color: #e74c3c;
}
.text-purple {
  color: #8e44ad;
}
.text-faded {
  color: rgba(255,255,255,0.7);
}
.circle-tile-heading .fa {
  line-height: 80px;
}
.circle-tile-content {
  padding-top: 50px;
}
.circle-tile-description {
  text-transform: uppercase;
}
.text-faded {
  color: rgba(255,255,255,0.7);
}
.circle-tile-number {
  padding: 5px 0 15px;
  font-size: 26px;
  font-weight: 700;
  line-height: 1;
}
.circle-tile-footer {
  display: block;
  padding: 5px;
  color: rgba(255,255,255,0.5);
  background-color: rgba(0,0,0,0.1);
  transition: all ease-in-out .3s;
}
.circle-tile-footer:hover {
  text-decoration: none;
  color: rgba(255,255,255,0.5);
  background-color: rgba(0,0,0,0.2);
}
.morning {
  background: url(https://lh3.googleusercontent.com/-1YbV7nsVnX8/WMugaq-6BEI/AAAAAAAADSg/0wPfQ84vMUcCle_SkgiUDOumUKscMaA8QCL0B/w530-d-h353-p-rw/widget-bg-morning.jpg) center bottom no-repeat;
  background-size: cover;
}
.time-widget {
  margin-top: 5px;
  overflow: hidden;
  text-align: center;
  font-size: 1.75em;
}
.time-widget-heading {
  text-transform: uppercase;
  font-size: .5em;
  font-weight: 400;
  color: #fff;
}
#datetime {
  color: #fff;
}
.tile-img {
  text-shadow: 2px 2px 3px rgba(0,0,0,0.9);
}
.tile {
  margin-bottom: 15px;
  padding: 15px;
  overflow: hidden;
  color: #fff;
}
.amcharts-chart-div a {
  display: none !important
}
</style>
<div id="content" class="span10">
  <div>
    <ul class="breadcrumb">
      <li> <a href="<?php echo site_url("administrator/home")?>"><?php echo lang("Home") ;?></a> <span class="divider">/</span> </li>
      <li> <?php echo lang("Orders")?> </li>
    </ul>
  </div>
  <div class="container-2">
    <div class="box-content clearfix">
      <div class="row" >
        <div class="col-lg-3 col-sm-6 info">
          <div class="circle-tile"> <a href="#">
            <div class="circle-tile-heading dark-blue"> <i class="fa fa-users fa-fw fa-3x"></i> </div>
            </a>
            <div class="circle-tile-content dark-blue">
              <div class="circle-tile-description text-faded">Total Products</div>
              <div class="circle-tile-number text-faded">265<span id="sparklineA"></span> </div>
              <a href="#" class="circle-tile-footer">More Info <i class="fa fa-chevron-circle-right"></i></a> </div>
          </div>
        </div>
        <div class="col-lg-3 col-sm-6 info">
          <div class="circle-tile"> <a href="#">
            <div class="circle-tile-heading green"> <i class="fa fa-user fa-fw fa-3x"></i> </div>
            </a>
            <div class="circle-tile-content green">
              <div class="circle-tile-description text-faded">Total Drivers</div>
              <div class="circle-tile-number text-faded">32,384</div>
              <a href="#" class="circle-tile-footer">More Info <i class="fa fa-chevron-circle-right"></i></a> </div>
          </div>
        </div>
        <div class="col-lg-3 col-sm-6 info">
          <div class="circle-tile"> <a href="#">
            <div class="circle-tile-heading blue"> <i class="fa fa-building fa-fw fa-3x"></i> </div>
            </a>
            <div class="circle-tile-content blue">
              <div class="circle-tile-description text-faded">Total Orders</div>
              <div class="circle-tile-number text-faded"> 123 <span id="sparklineB"></span> </div>
              <a href="#" class="circle-tile-footer">More Info <i class="fa fa-chevron-circle-right"></i></a> </div>
          </div>
        </div>
        <div class="col-lg-3 col-sm-6 info">
          <div class="circle-tile"> <a href="#">
            <div class="circle-tile-heading red"> <i class="fa fa-shopping-cart fa-fw fa-3x"></i> </div>
            </a>
            <div class="circle-tile-content red">
              <div class="circle-tile-description text-faded">Total Voucher</div>
              <div class="circle-tile-number text-faded"> 24 <span id="sparklineC"></span> </div>
              <a href="#" class="circle-tile-footer">More Info <i class="fa fa-chevron-circle-right"></i></a> </div>
          </div>
        </div>
      </div>
    </div>
    <div class="box-content clearfix" style="direction:ltr"><h2 class="text-center">Top 10 Liked Products</h2>
      <div class="my-graph"> 
        <script src="<?php echo base_url(); ?>graphs/amcharts.js"></script> 
        <script src="<?php echo base_url(); ?>graphs/serial.js"></script>
        <div id="chartdiv"></div>
        <script>
var chart = AmCharts.makeChart("chartdiv", {
  "type": "serial",
  "startDuration": 2,
  "dataProvider": [{
    "country": "Product1",
    "visits": 4025,
    "color": "#FF0F00"
  }, {
    "country": "Product2",
    "visits": 1882,
    "color": "#FF6600"
  }, {
    "country": "Product3",
    "visits": 1809,
    "color": "#FF9E01"
  }, {
    "country": "Product4",
    "visits": 1322,
    "color": "#FCD202"
  }, {
    "country": "Product5",
    "visits": 1122,
    "color": "#F8FF01"
  }, {
    "country": "Product6",
    "visits": 1114,
    "color": "#B0DE09"
  }, {
    "country": "Product7",
    "visits": 984,
    "color": "#04D215"
  }, {
    "country": "Product8",
    "visits": 711,
    "color": "#0D8ECF"
  }, {
    "country": "Product9",
    "visits": 665,
    "color": "#0D52D1"
  }, {
    "country": "Product10",
    "visits": 580,
    "color": "#2A0CD0"
  }
  ],
  "valueAxes": [{
    "position": "left",
    "axisAlpha": 0,
    "gridAlpha": 0
  }],
  "graphs": [{
    "balloonText": "[[category]]: <b>[[value]]</b>",
    "colorField": "color",
    "fillAlphas": 0.85,
    "lineAlpha": 0.1,
    "type": "column",
    "topRadius": 1,
    "valueField": "visits"
  }],
  "depth3D": 40,
  "angle": 30,
  "chartCursor": {
    "categoryBalloonEnabled": false,
    "cursorAlpha": 0,
    "zoomable": false
  },
  "categoryField": "country",
  "categoryAxis": {
    "gridPosition": "start",
    "axisAlpha": 0,
    "gridAlpha": 0

  },
  "exportConfig": {
    "menuTop": "20px",
    "menuRight": "20px",
    "menuItems": [{
      "icon": '/lib/3/images/export.png',
      "format": 'png'
    }]
  }
}, 0);

jQuery('.chart-input').off().on('input change', function() {
  var property = jQuery(this).data('property');
  var target = chart;
  chart.startDuration = 0;

  if (property == 'topRadius') {
    target = chart.graphs[0];
  }

  target[property] = this.value;
  chart.validateNow();
});
</script> 
      </div>
    </div>
    <div class="box-content clearfix">
     <!--
      <div class="row">
        <div class="col-md-6 pies">
        <h2 class="text-center">Vendor Products</h2>
          <div class="my-chart">
            <div id="pieChart" class="chart"></div>
            <script>
      $(function(){
  $("#pieChart").drawPieChart([
    { title: "Vendor1",         value : 180,  color: "#02B3E7" },
    { title: "Vendor2", value:  60,   color: "#CFD3D6" },
    { title: "Vendor3",        value : 50,   color: "#736D79" },
    { title: "Vendor4",      value:  30,   color: "#776068" },
    { title: "Vendor5",        value : 20,   color: "#EB0D42" },
    { title: "Vendor6",        value : 20,   color: "#FFEC62" },
    { title: "vendor7",         value : 7,    color: "#04374E" }
  ]);
});

/*!
 * jquery.drawPieChart.js
 * Version: 0.3(Beta)
 * Inspired by Chart.js(http://www.chartjs.org/)
 *
 * Copyright 2013 hiro
 * https://github.com/githiro/drawPieChart
 * Released under the MIT license.
 */
;(function($, undefined) {
  $.fn.drawPieChart = function(data, options) {
    var $this = this,
      W = $this.width(),
      H = $this.height(),
      centerX = W/2,
      centerY = H/2,
      cos = Math.cos,
      sin = Math.sin,
      PI = Math.PI,
      settings = $.extend({
        segmentShowStroke : true,
        segmentStrokeColor : "#fff",
        segmentStrokeWidth : 1,
        baseColor: "#fff",
        baseOffset: 15,
        edgeOffset: 30,//offset from edge of $this
        pieSegmentGroupClass: "pieSegmentGroup",
        pieSegmentClass: "pieSegment",
        lightPiesOffset: 12,//lighten pie's width
        lightPiesOpacity: .3,//lighten pie's default opacity
        lightPieClass: "lightPie",
        animation : true,
        animationSteps : 90,
        animationEasing : "easeInOutExpo",
        tipOffsetX: -15,
        tipOffsetY: -45,
        tipClass: "pieTip",
        beforeDraw: function(){  },
        afterDrawed : function(){  },
        onPieMouseenter : function(e,data){  },
        onPieMouseleave : function(e,data){  },
        onPieClick : function(e,data){  }
      }, options),
      animationOptions = {
        linear : function (t){
          return t;
        },
        easeInOutExpo: function (t) {
          var v = t<.5 ? 8*t*t*t*t : 1-8*(--t)*t*t*t;
          return (v>1) ? 1 : v;
        }
      },
      requestAnimFrame = function(){
        return window.requestAnimationFrame ||
          window.webkitRequestAnimationFrame ||
          window.mozRequestAnimationFrame ||
          window.oRequestAnimationFrame ||
          window.msRequestAnimationFrame ||
          function(callback) {
            window.setTimeout(callback, 1000 / 60);
          };
      }();

    var $wrapper = $('<svg width="' + W + '" height="' + H + '" viewBox="0 0 ' + W + ' ' + H + '" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"></svg>').appendTo($this);
    var $groups = [],
        $pies = [],
        $lightPies = [],
        easingFunction = animationOptions[settings.animationEasing],
        pieRadius = Min([H/2,W/2]) - settings.edgeOffset,
        segmentTotal = 0;

    //Draw base circle
    var drawBasePie = function(){
      var base = document.createElementNS('http://www.w3.org/2000/svg', 'circle');
      var $base = $(base).appendTo($wrapper);
      base.setAttribute("cx", centerX);
      base.setAttribute("cy", centerY);
      base.setAttribute("r", pieRadius+settings.baseOffset);
      base.setAttribute("fill", settings.baseColor);
    }();

    //Set up pie segments wrapper
    var pathGroup = document.createElementNS('http://www.w3.org/2000/svg', 'g');
    var $pathGroup = $(pathGroup).appendTo($wrapper);
    $pathGroup[0].setAttribute("opacity",0);

    //Set up tooltip
    var $tip = $('<div class="' + settings.tipClass + '" />').appendTo('body').hide(),
      tipW = $tip.width(),
      tipH = $tip.height();

    for (var i = 0, len = data.length; i < len; i++){
      segmentTotal += data[i].value;
      var g = document.createElementNS('http://www.w3.org/2000/svg', 'g');
      g.setAttribute("data-order", i);
      g.setAttribute("class", settings.pieSegmentGroupClass);
      $groups[i] = $(g).appendTo($pathGroup);
      $groups[i]
        .on("mouseenter", pathMouseEnter)
        .on("mouseleave", pathMouseLeave)
        .on("mousemove", pathMouseMove)
        .on("click", pathClick);

      var p = document.createElementNS('http://www.w3.org/2000/svg', 'path');
      p.setAttribute("stroke-width", settings.segmentStrokeWidth);
      p.setAttribute("stroke", settings.segmentStrokeColor);
      p.setAttribute("stroke-miterlimit", 2);
      p.setAttribute("fill", data[i].color);
      p.setAttribute("class", settings.pieSegmentClass);
      $pies[i] = $(p).appendTo($groups[i]);

      var lp = document.createElementNS('http://www.w3.org/2000/svg', 'path');
      lp.setAttribute("stroke-width", settings.segmentStrokeWidth);
      lp.setAttribute("stroke", settings.segmentStrokeColor);
      lp.setAttribute("stroke-miterlimit", 2);
      lp.setAttribute("fill", data[i].color);
      lp.setAttribute("opacity", settings.lightPiesOpacity);
      lp.setAttribute("class", settings.lightPieClass);
      $lightPies[i] = $(lp).appendTo($groups[i]);
    }

    settings.beforeDraw.call($this);
    //Animation start
    triggerAnimation();

    function pathMouseEnter(e){
      var index = $(this).data().order;
      $tip.text(data[index].title + ": " + data[index].value).fadeIn(200);
      if ($groups[index][0].getAttribute("data-active") !== "active"){
        $lightPies[index].animate({opacity: .8}, 180);
      }
      settings.onPieMouseenter.apply($(this),[e,data]);
    }
    function pathMouseLeave(e){
      var index = $(this).data().order;
      $tip.hide();
      if ($groups[index][0].getAttribute("data-active") !== "active"){
        $lightPies[index].animate({opacity: settings.lightPiesOpacity}, 100);
      }
      settings.onPieMouseleave.apply($(this),[e,data]);
    }
    function pathMouseMove(e){
      $tip.css({
        top: e.pageY + settings.tipOffsetY,
        left: e.pageX - $tip.width() / 2 + settings.tipOffsetX
      });
    }
    function pathClick(e){
      var index = $(this).data().order;
      var targetGroup = $groups[index][0];
      for (var i = 0, len = data.length; i < len; i++){
        if (i === index) continue;
        $groups[i][0].setAttribute("data-active","");
        $lightPies[i].css({opacity: settings.lightPiesOpacity});
      }
      if (targetGroup.getAttribute("data-active") === "active"){
        targetGroup.setAttribute("data-active","");
        $lightPies[index].css({opacity: .8});
      } else {
        targetGroup.setAttribute("data-active","active");
        $lightPies[index].css({opacity: 1});
      }
      settings.onPieClick.apply($(this),[e,data]);
    }
    function drawPieSegments (animationDecimal){
      var startRadius = -PI/2,//-90 degree
          rotateAnimation = 1;
      if (settings.animation) {
        rotateAnimation = animationDecimal;//count up between0~1
      }

      $pathGroup[0].setAttribute("opacity",animationDecimal);

      //draw each path
      for (var i = 0, len = data.length; i < len; i++){
        var segmentAngle = rotateAnimation * ((data[i].value/segmentTotal) * (PI*2)),//start radian
            endRadius = startRadius + segmentAngle,
            largeArc = ((endRadius - startRadius) % (PI * 2)) > PI ? 1 : 0,
            startX = centerX + cos(startRadius) * pieRadius,
            startY = centerY + sin(startRadius) * pieRadius,
            endX = centerX + cos(endRadius) * pieRadius,
            endY = centerY + sin(endRadius) * pieRadius,
            startX2 = centerX + cos(startRadius) * (pieRadius + settings.lightPiesOffset),
            startY2 = centerY + sin(startRadius) * (pieRadius + settings.lightPiesOffset),
            endX2 = centerX + cos(endRadius) * (pieRadius + settings.lightPiesOffset),
            endY2 = centerY + sin(endRadius) * (pieRadius + settings.lightPiesOffset);
        var cmd = [
          'M', startX, startY,//Move pointer
          'A', pieRadius, pieRadius, 0, largeArc, 1, endX, endY,//Draw outer arc path
          'L', centerX, centerY,//Draw line to the center.
          'Z'//Cloth path
        ];
        var cmd2 = [
          'M', startX2, startY2,
          'A', pieRadius + settings.lightPiesOffset, pieRadius + settings.lightPiesOffset, 0, largeArc, 1, endX2, endY2,//Draw outer arc path
          'L', centerX, centerY,
          'Z'
        ];
        $pies[i][0].setAttribute("d",cmd.join(' '));
        $lightPies[i][0].setAttribute("d", cmd2.join(' '));
        startRadius += segmentAngle;
      }
    }

    var animFrameAmount = (settings.animation)? 1/settings.animationSteps : 1,//if settings.animationSteps is 10, animFrameAmount is 0.1
        animCount =(settings.animation)? 0 : 1;
    function triggerAnimation(){
      if (settings.animation) {
        requestAnimFrame(animationLoop);
      } else {
        drawPieSegments(1);
      }
    }
    function animationLoop(){
      animCount += animFrameAmount;//animCount start from 0, after "settings.animationSteps"-times executed, animCount reaches 1.
      drawPieSegments(easingFunction(animCount));
      if (animCount < 1){
        requestAnimFrame(arguments.callee);
      } else {
        settings.afterDrawed.call($this);
      }
    }
    function Max(arr){
      return Math.max.apply(null, arr);
    }
    function Min(arr){
      return Math.min.apply(null, arr);
    }
    return $this;
  };
})(jQuery);
      </script> 
          </div>
        </div>
        <div class="col-md-6 pies">
        <h2 class="text-center">Total sale by vendor</h2>
        <div class="my-charts">
          <div id="doughnutChart" class="charts"></div>
          <script>
    $(function(){
  $("#doughnutChart").drawDoughnutChart([
    { title: "Vendor1",         value : 120,  color: "#2C3E50" },
    { title: "Vendor2", value:  80,   color: "#FC4349" },
    { title: "Vendor3",      value:  70,   color: "#6DBCDB" },
    { title: "Vendor4",        value : 50,   color: "#F7E248" },
    { title: "Vendor5",        value : 40,   color: "#D7DADB" },
    { title: "Vendor6",        value : 20,   color: "#FFF" }
  ]);
});
/*!
 * jquery.drawDoughnutChart.js
 * Version: 0.4.1(Beta)
 * Inspired by Chart.js(http://www.chartjs.org/)
 *
 * Copyright 2014 hiro
 * https://github.com/githiro/drawDoughnutChart
 * Released under the MIT license.
 * 
 */
;(function($, undefined) {
  $.fn.drawDoughnutChart = function(data, options) {
    var $this = this,
      W = $this.width(),
      H = $this.height(),
      centerX = W/2,
      centerY = H/2,
      cos = Math.cos,
      sin = Math.sin,
      PI = Math.PI,
      settings = $.extend({
        segmentShowStroke : true,
        segmentStrokeColor : "#0C1013",
        segmentStrokeWidth : 1,
        baseColor: "rgba(0,0,0,0.5)",
        baseOffset: 4,
        edgeOffset : 10,//offset from edge of $this
        percentageInnerCutout : 75,
        animation : true,
        animationSteps : 90,
        animationEasing : "easeInOutExpo",
        animateRotate : true,
        tipOffsetX: -8,
        tipOffsetY: -45,
        tipClass: "doughnutTip",
        summaryClass: "doughnutSummary",
        summaryTitle: "TOTAL:",
        summaryTitleClass: "doughnutSummaryTitle",
        summaryNumberClass: "doughnutSummaryNumber",
        beforeDraw: function() {  },
        afterDrawed : function() {  },
        onPathEnter : function(e,data) {  },
        onPathLeave : function(e,data) {  }
      }, options),
      animationOptions = {
        linear : function (t) {
          return t;
        },
        easeInOutExpo: function (t) {
          var v = t<.5 ? 8*t*t*t*t : 1-8*(--t)*t*t*t;
          return (v>1) ? 1 : v;
        }
      },
      requestAnimFrame = function() {
        return window.requestAnimationFrame ||
          window.webkitRequestAnimationFrame ||
          window.mozRequestAnimationFrame ||
          window.oRequestAnimationFrame ||
          window.msRequestAnimationFrame ||
          function(callback) {
            window.setTimeout(callback, 1000 / 60);
          };
      }();

    settings.beforeDraw.call($this);

    var $svg = $('<svg width="' + W + '" height="' + H + '" viewBox="0 0 ' + W + ' ' + H + '" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"></svg>').appendTo($this),
        $paths = [],
        easingFunction = animationOptions[settings.animationEasing],
        doughnutRadius = Min([H / 2,W / 2]) - settings.edgeOffset,
        cutoutRadius = doughnutRadius * (settings.percentageInnerCutout / 100),
        segmentTotal = 0;

    //Draw base doughnut
    var baseDoughnutRadius = doughnutRadius + settings.baseOffset,
        baseCutoutRadius = cutoutRadius - settings.baseOffset;
    $(document.createElementNS('http://www.w3.org/2000/svg', 'path'))
      .attr({
        "d": getHollowCirclePath(baseDoughnutRadius, baseCutoutRadius),
        "fill": settings.baseColor
      })
      .appendTo($svg);

    //Set up pie segments wrapper
    var $pathGroup = $(document.createElementNS('http://www.w3.org/2000/svg', 'g'));
    $pathGroup.attr({opacity: 0}).appendTo($svg);

    //Set up tooltip
    var $tip = $('<div class="' + settings.tipClass + '" />').appendTo('body').hide(),
        tipW = $tip.width(),
        tipH = $tip.height();

    //Set up center text area
    var summarySize = (cutoutRadius - (doughnutRadius - cutoutRadius)) * 2,
        $summary = $('<div class="' + settings.summaryClass + '" />')
                   .appendTo($this)
                   .css({ 
                     width: summarySize + "px",
                     height: summarySize + "px",
                     "margin-left": -(summarySize / 2) + "px",
                     "margin-top": -(summarySize / 2) + "px"
                   });
    var $summaryTitle = $('<p class="' + settings.summaryTitleClass + '">' + settings.summaryTitle + '</p>').appendTo($summary);
    var $summaryNumber = $('<p class="' + settings.summaryNumberClass + '"></p>').appendTo($summary).css({opacity: 0});

    for (var i = 0, len = data.length; i < len; i++) {
      segmentTotal += data[i].value;
      $paths[i] = $(document.createElementNS('http://www.w3.org/2000/svg', 'path'))
        .attr({
          "stroke-width": settings.segmentStrokeWidth,
          "stroke": settings.segmentStrokeColor,
          "fill": data[i].color,
          "data-order": i
        })
        .appendTo($pathGroup)
        .on("mouseenter", pathMouseEnter)
        .on("mouseleave", pathMouseLeave)
        .on("mousemove", pathMouseMove);
    }

    //Animation start
    animationLoop(drawPieSegments);

    //Functions
    function getHollowCirclePath(doughnutRadius, cutoutRadius) {
        //Calculate values for the path.
        //We needn't calculate startRadius, segmentAngle and endRadius, because base doughnut doesn't animate.
        var startRadius = -1.570,// -Math.PI/2
            segmentAngle = 6.2831,// 1 * ((99.9999/100) * (PI*2)),
            endRadius = 4.7131,// startRadius + segmentAngle
            startX = centerX + cos(startRadius) * doughnutRadius,
            startY = centerY + sin(startRadius) * doughnutRadius,
            endX2 = centerX + cos(startRadius) * cutoutRadius,
            endY2 = centerY + sin(startRadius) * cutoutRadius,
            endX = centerX + cos(endRadius) * doughnutRadius,
            endY = centerY + sin(endRadius) * doughnutRadius,
            startX2 = centerX + cos(endRadius) * cutoutRadius,
            startY2 = centerY + sin(endRadius) * cutoutRadius;
        var cmd = [
          'M', startX, startY,
          'A', doughnutRadius, doughnutRadius, 0, 1, 1, endX, endY,//Draw outer circle
          'Z',//Close path
          'M', startX2, startY2,//Move pointer
          'A', cutoutRadius, cutoutRadius, 0, 1, 0, endX2, endY2,//Draw inner circle
          'Z'
        ];
        cmd = cmd.join(' ');
        return cmd;
    };
    function pathMouseEnter(e) {
      var order = $(this).data().order;
      $tip.text(data[order].title + ": " + data[order].value)
          .fadeIn(200);
      settings.onPathEnter.apply($(this),[e,data]);
    }
    function pathMouseLeave(e) {
      $tip.hide();
      settings.onPathLeave.apply($(this),[e,data]);
    }
    function pathMouseMove(e) {
      $tip.css({
        top: e.pageY + settings.tipOffsetY,
        left: e.pageX - $tip.width() / 2 + settings.tipOffsetX
      });
    }
    function drawPieSegments (animationDecimal) {
      var startRadius = -PI / 2,//-90 degree
          rotateAnimation = 1;
      if (settings.animation && settings.animateRotate) rotateAnimation = animationDecimal;//count up between0~1

      drawDoughnutText(animationDecimal, segmentTotal);

      $pathGroup.attr("opacity", animationDecimal);

      //If data have only one value, we draw hollow circle(#1).
      if (data.length === 1 && (4.7122 < (rotateAnimation * ((data[0].value / segmentTotal) * (PI * 2)) + startRadius))) {
        $paths[0].attr("d", getHollowCirclePath(doughnutRadius, cutoutRadius));
        return;
      }
      for (var i = 0, len = data.length; i < len; i++) {
        var segmentAngle = rotateAnimation * ((data[i].value / segmentTotal) * (PI * 2)),
            endRadius = startRadius + segmentAngle,
            largeArc = ((endRadius - startRadius) % (PI * 2)) > PI ? 1 : 0,
            startX = centerX + cos(startRadius) * doughnutRadius,
            startY = centerY + sin(startRadius) * doughnutRadius,
            endX2 = centerX + cos(startRadius) * cutoutRadius,
            endY2 = centerY + sin(startRadius) * cutoutRadius,
            endX = centerX + cos(endRadius) * doughnutRadius,
            endY = centerY + sin(endRadius) * doughnutRadius,
            startX2 = centerX + cos(endRadius) * cutoutRadius,
            startY2 = centerY + sin(endRadius) * cutoutRadius;
        var cmd = [
          'M', startX, startY,//Move pointer
          'A', doughnutRadius, doughnutRadius, 0, largeArc, 1, endX, endY,//Draw outer arc path
          'L', startX2, startY2,//Draw line path(this line connects outer and innner arc paths)
          'A', cutoutRadius, cutoutRadius, 0, largeArc, 0, endX2, endY2,//Draw inner arc path
          'Z'//Cloth path
        ];
        $paths[i].attr("d", cmd.join(' '));
        startRadius += segmentAngle;
      }
    }
    function drawDoughnutText(animationDecimal, segmentTotal) {
      $summaryNumber
        .css({opacity: animationDecimal})
        .text((segmentTotal * animationDecimal).toFixed(1));
    }
    function animateFrame(cnt, drawData) {
      var easeAdjustedAnimationPercent =(settings.animation)? CapValue(easingFunction(cnt), null, 0) : 1;
      drawData(easeAdjustedAnimationPercent);
    }
    function animationLoop(drawData) {
      var animFrameAmount = (settings.animation)? 1 / CapValue(settings.animationSteps, Number.MAX_VALUE, 1) : 1,
          cnt =(settings.animation)? 0 : 1;
      requestAnimFrame(function() {
          cnt += animFrameAmount;
          animateFrame(cnt, drawData);
          if (cnt <= 1) {
            requestAnimFrame(arguments.callee);
          } else {
            settings.afterDrawed.call($this);
          }
      });
    }
    function Max(arr) {
      return Math.max.apply(null, arr);
    }
    function Min(arr) {
      return Math.min.apply(null, arr);
    }
    function isNumber(n) {
      return !isNaN(parseFloat(n)) && isFinite(n);
    }
    function CapValue(valueToCap, maxValue, minValue) {
      if (isNumber(maxValue) && valueToCap > maxValue) return maxValue;
      if (isNumber(minValue) && valueToCap < minValue) return minValue;
      return valueToCap;
    }
    return $this;
  };
})(jQuery);
    </script> 
        </div>
      </div>-->
      </div>
    </div>
  </div>
</div>
