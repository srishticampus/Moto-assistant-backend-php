<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0,maximum-scale=1">
    
    <title>Moto Assistant</title>
    
    <!-- Loading third party fonts -->
    <link href="http://fonts.googleapis.com/css?family=Titillium+Web:300,400,700|" rel="stylesheet" type="text/css">
    <link href="Workshop/fonts/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- Loading main css file -->
    <link rel="stylesheet" href="Workshop/style.css">
    
    <!--[if lt IE 9]>
    <script src="js/ie-support/html5.js"></script>
    <script src="js/ie-support/respond.js"></script>
    <![endif]-->

  <script type="text/javascript" charset="UTF-8" src="http://maps.google.com/maps-api-v3/api/js/50/7a/common.js"></script><script type="text/javascript" charset="UTF-8" src="http://maps.google.com/maps-api-v3/api/js/50/7a/util.js"></script>


<style type="text/css">
  #div{
    /*background-color: #000;*/
  }
  h1, h2 {
  color: white;
  font-family: 'Oswald', sans-serif;
  font-weight: normal;
}

h2 {
  font-size: 14px;
  margin-bottom: 30px;
  color: #24E2B8;
}
.three, .four {
  border: none;
  border-radius: 4px;
  text-shadow: 0px 0px 10px rgba(0, 0, 0, 0.48);
  overflow: hidden;
  padding: 30px 50px 20px 70px;
  margin-bottom: 20px;
  font-size: 20px;
  position: relative;
  color: white;
  outline: none;
  cursor: pointer;
  width: 100%;
  -webkit-transition: background-position .7s,box-shadow .4s;
  transition: background-position .7s,box-shadow .4s;
  background-size: 110%;
  font-family: 'Oswald', sans-serif;
}
.three:hover, .four:hover{
  background-position: 0% 30%;
}
.three:hover:after, .four:hover:after{
  right: -40px;
  -webkit-transition: right .4s,-webkit-transform 30s .2s linear;
  transition: right .4s,-webkit-transform 30s .2s linear;
  transition: right .4s,transform 30s .2s linear;
  transition: right .4s,transform 30s .2s linear,-webkit-transform 30s .2s linear;
}
.three:before, .four:before.three:after, .four:after{
  font-family: FontAwesome;
  display: block;
  position: absolute;
}
.three:before, .four:before{
  -webkit-transition: all 1s;
  transition: all 1s;
  font-size: 30px;
  left: 25px;
  top: 19px;
}
 .three:after, .four:after {
  -webkit-transition: right .4s, -webkit-transform .2s;
  transition: right .4s, -webkit-transform .2s;
  transition: right .4s, transform .2s;
  transition: right .4s, transform .2s, -webkit-transform .2s;
  font-size: 100px;
  opacity: .3;
  right: -120px;
  top: -17px;
}



.three {
  box-shadow: 0px 0px 0px 2px rgba(255, 255, 255, 0.16) inset, 0px 0px 10px 0px #36C176;
 /* background-image: -webkit-gradient(linear, left top, left bottom, from(#36C176), to(rgba(86, 202, 139, 0.18)));
  background-image: linear-gradient(to bottom, #36C176, rgba(86, 202, 139, 0.18));*/
  background-image: url('back.jpeg');
}
.three:hover {
  box-shadow: 0px 0px 0px 2px rgba(255, 255, 255, 0.16) inset, 0px 0px 30px 0px #36C176;
}
.three:hover:after {
  -webkit-transform: scale(1);
          transform: scale(1);
}
.three:hover:before {
  -webkit-transform: scale(1.2);
          transform: scale(1.2);
}
.three:after, .three:before {
 /* content: "";*/
}
.three b {
  color: #63FFAC;
  font-weight: 700;
}

.four {
  box-shadow: 0px 0px 0px 2px rgba(255, 255, 255, 0.16) inset, 0px 0px 10px 0px #33E7EA;
/*  background-image: -webkit-gradient(linear, left top, left bottom, from(#33E7EA), to(rgba(161, 245, 245, 0.24)));
  background-image: linear-gradient(to bottom, #33E7EA, rgba(161, 245, 245, 0.24));*/
  background-image: url('back.jpeg');

}
.four:hover {
  box-shadow: 0px 0px 0px 2px rgba(255, 255, 255, 0.16) inset, 0px 0px 30px 0px #33E7EA;
}
.four:hover:after {
  -webkit-transform: rotate(3000deg);
          transform: rotate(3000deg);
}
.four:hover:before {
  -webkit-transform: rotate(360deg);
          transform: rotate(360deg);
}
.four:after, .four:before {
/*  content: "";*/
}
.four b {
  color: #1CF4FF;
  font-weight: 700;
}
.container-fluid .btn {
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  -ms-transform: translate(-50%, -50%);
  background-color: #555;
  color: white;
  font-size: 16px;
  padding: 12px 24px;
  border: none;
  cursor: pointer;
  border-radius: 5px;
  text-align: center;
}
</style>
</head>
  <body>
    
   

      <main class="main-content">
        <div class="container-fluid" style=" background: url('back.jpeg');">
  <div class="row" >
  <div class="col-sm-12">
    <div id="div">
      <h1 id="head"><img src="lo.png" style="width:30%;height: 18% ">
      </h1>

     </div>
    </div>
  </div>

</div>
        <div class="hero hero-slider">

          <ul class="slides">
            <li data-bg-image="main.png" class="flex-active-slide" style="width: 100%; float: left; margin-right: -100%; position: relative; opacity: 0.703368; display: block; z-index: 2; background-image: url(&quot;main.png&quot;);">
              <div class="container">

      <div class="row btn" >
<div class="col-sm-6">
 <a href="admin_login.php"> <button class='three'>ADMIN</button></a>
</div>
<div class="col-sm-6">
  <a href="workshop_registration.php"><button class='four'>WORKSHOP</button></a>
</div>
 



</div>
              
              </div>
            </li>
            <li data-bg-image="2.jpeg" style="width: 100%; float: left; margin-right: -100%; position: relative; opacity: 0; display: block; z-index: 1; background-image: url(&quot;2.jpeg&quot;);" class="">
              
                  <div class='container'>
      <div class="row btn" >
<div class="col-sm-6">
 <a href="admin_login.php"> <button class='three'>ADMIN</button></a>
</div>
<div class="col-sm-6">
  <a href="workshop_registration.php"><button class='four'>WORKSHOP</button></a>
</div>
 
</div>


</div>
            </li>
            <li data-bg-image="3.jpeg" style="width: 100%; float: left; margin-right: -100%; position: relative; opacity: 0.296632; display: block; z-index: 1; background-image: url(&quot;3.jpeg&quot;);" class="">
              
                  <div class='container'>
      <div class="row btn" >
<div class="col-sm-6">
 <a href="admin_login.php"> <button class='three'>ADMIN</button></a>
</div>
<div class="col-sm-6">
  <a href="workshop_registration.php"><button class='four'>WORKSHOP</button></a>
</div>
 
</div>


</div>
            </li>
          </ul>
        <ol class="flex-control-nav flex-control-paging"><li><a class="flex-active">1</a></li><li><a class="">2</a></li><li><a class="">3</a></li></ol></div> <!-- .hero-slider -->

        
            

          


        

        

     


    </div> <!-- #site-content -->

    

    <script src="Workshop/js/jquery-1.11.1.min.js"></script>
    <script src="http://maps.google.com/maps/api/js?sensor=false&amp;language=en"></script>
    <script src="Workshop/js/plugins.js"></script>
    <script src="Workshop/js/app.js"></script>
    
  

</body>