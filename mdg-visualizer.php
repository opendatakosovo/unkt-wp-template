<?php /* Template Name: MDG Visializer */ ?>
<?php get_header(); ?>
<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/maps/modules/map.js"></script>
<script src="<?php bloginfo('template_url'); ?>/mdg-viz/data.js"></script>

<script src="<?php bloginfo('template_url'); ?>/mdg-viz/indicator_charts.js"></script>
<script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
<link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
<style>
.mdg-header-title.row {
    border: solid 2px black;
    background-color: #5B92E5;
}
.mdg-text{
  border: solid 2px black;
  background-color: #fff;
  height:650px;
}
.mdg-anim{
  border: solid 2px black;
  background-color:#F1D760;
}
.mdg-anime{
  display:none;
}
.mdg-about{
  border: solid 2px black;
  background-color:#FFFF66;
  height:340px;
}
.mdg-show-more{
  padding:20px;
}
.mdg-btn{
  cursor: pointer;
  padding-left:5px;
}
.not-active-mdg{
  display:none;
}
.active-mdg{
  display:block;
}
.slider-text{
  float: left;
margin-top: 20px;
margin-left: -11px;
border: 1px solid black;
background-color: white;
}
.chart-div{
  display:none;
  border: 2px solid black;
}
.eradicate-extreme-poverty-and-hunger{
  display:block;
}
.mdg-slide-content img{
  width: 87%;
  height: 72%;
  margin:34px 2px 1px 40px;
  margin-top:20px;
}
.mdg-show-more-btn{
  margin-left: 40%;
    margin-top: 37px;
}
.mdg-slider-numeric-values{
  margin-top:65%;
}
.mdg-container {
    padding: 2% 3% 0% 21%;
}
.mdg-container p,
.mdg-container h1,
.mdg-container h2,
.mdg-container h3{
  color:white;
}
.mdg-btn img {
    height: 80px;
}
.content-mdg-wrapper{
  background-color:black;
      display: block;
}
.mdg-container {
    padding: 2% 3% 0% 21%;
    width: 80%;
}
.sidebar {
    float: right;
    margin-top: -5%;
    width: 20%;
    background-color:white;
    padding: 15px;
}
.mdg-viz-container{
  float:left;
  width:79%;
}
iframe{
    overflow:hidden;
}
</style>
<script type="text/javascript"><!--//--><![CDATA[//><!--
  $(document).ready(function(){
    $(".mdg-btn").click(function(){
      $(".mdg-show-more-btn").html("Show more");
      $(".mdg-btn").removeClass('active');
      addAnim(this.id);
      $('.mdg-anim').css("background-color",$(this)['context']['attributes']['data-color'].value);
      $('.mdg-about').css("background-color",$(this)['context']['attributes']['data-color'].value);
      $(".chart-div").css('display','none');
      $(this).addClass('active');
    });

    $(".mdg-show-more-btn").click(function(){
      var id = $(".mdg-btn.active")[0]['id'];
      if($(".mdg-show-more-btn").html().trim()=="Show more"){
        showMore(id);
        $(".mdg-show-more-btn").text("Show less");
      }else{
        $("#"+id+"-more").toggle("blind",{},500);
        $(".mdg-show-more-btn").html("Show more");
        $('html,body').animate({
            scrollTop: $('.mdg-header-title').offset().top},
            'slow');
      }


    });
  });

  function addAnim(id){
    $(".mdg-anime").css("display","none");
    $("."+id).toggle("fade in");
    $('html,body').animate({
        scrollTop: $("."+id).offset().top - 25},
        'slow');
  }

  function showMore(id){
    var chartDivId = id + "-more";
    $("#"+chartDivId).toggle("blind",{},500);
    $('html,body').animate({
        scrollTop: $("#"+chartDivId).offset().top},
        'slow');
  }
 //--><!]]>
 </script>
 <div class="content content-article">
   <div class="container-fluid">
     <div class="row">
       <div class="content-mdg-wrapper">
           <div class="mdg-container">
               <h3> Milenium Development Goals</h3>
               <div class="row" style="margin-left: -17px;">
                 <div class="col-xs-12">
                   <div class="mdg-btn active" data-color="#FFDD00" id="eradicate-extreme-poverty-and-hunger" style="width:12.5%;float:left;">
                     <img alt="MDG 1" src="<?php bloginfo('template_url'); ?>/logos/1.jpg" />
                   </div>
                   <div class="mdg-btn" data-color="#D8DF20" id="achieve-universal-primary-education" style="width:12.5%;float:left;">
                   <img alt="MDG 2" src="<?php bloginfo('template_url'); ?>/logos/2.jpg" />
                   </div>
                   <div class="mdg-btn" data-color="#F7941D" id="promote-gender-equality-and-empower-women" style="width:12.5%;float:left;">
                     <img alt="MDG 3" src="<?php bloginfo('template_url'); ?>/logos/3.jpg" />
                   </div>
                   <div class="mdg-btn" data-color="#C7EAFD" id="reduce-child-mortality" style="width:12.5%;float:left;">
                     <img alt="MDG 4" src="<?php bloginfo('template_url'); ?>/logos/4.jpg" />
                   </div>
                   <div class="mdg-btn" data-color="#F8C0D9" id="improve-maternal-health" style="width:12.5%;float:left;">
                     <img alt="MDG 5" src="<?php bloginfo('template_url'); ?>/logos/5.jpg" />
                   </div>
                   <div class="mdg-btn" data-color="#F15A3F" id="combat-hiv-aids-malria-and-other-desease" style="width:12.5%;float:left;">
                    <img alt="MDG 6" src="<?php bloginfo('template_url'); ?>/logos/6.jpg" />
                   </div>
                   <div class="mdg-btn" data-color="#8CC63E" id="ensure-environmental-sustainability" style="width:12.5%;float:left;">
                   <img alt="MDG 7" src="<?php bloginfo('template_url'); ?>/logos/7.jpg" />
                   </div>
                   <div class="mdg-btn" data-color="#1BB0E8" id="internet-penetration" style="width:12.5%;float:left;">
                     <img alt="MDG 8" src="<?php bloginfo('template_url'); ?>/logos/8.jpg" />
                   </div>
                 </div>
             </div>
             <br>
             <p>Description/title of the MDG sliderDescription/title of the MDG sliderDescription/title of the MDG sliderDescription/title of the MDG sliderDescription/title of the MDG slider</p>
             <br>
         </div>
                      <div class="mdg-viz-container">
                        <div class="row">
                          <div class="mdg-anime eradicate-extreme-poverty-and-hunger">

                            <div class="mdg-anim col-xs-12" style="background-color: #FFDD00;">
                              <h1 class="mdg-slider-title"></h1>
                              <div class="row">
                                <br>
                                <div class="mdg-slide-content" id="slide-content">
                                  <embed style="width:100%; height:650px; overflow:hidden;" src="http://opendatakosovo.github.io/millenium-development-goals-kosovo/poverty-headcount-ratio-at-national-poverty-lines/index.html">
                                </div>
                              </div>

                              <button type="button" class="mdg-show-more-btn btn btn-warning btn-default">
                                Show more
                              </button>
                            </div>
                          </div>
                          <div class="mdg-anime achieve-universal-primary-education">

                            <div class="mdg-anim col-xs-12" style="background-color: #D8DF20;" >
                              <div class="mdg-slide-content" id="slide-content">
                                <br>
                                <embed style="width:100%; height:650px" src="http://opendatakosovo.github.io/millenium-development-goals-kosovo/total-primary-and-lower-secondary-enrollments/index.html">
                              </div>

                              <div class="mdg-sliders" id="achieve-universal-primary-education-slider"></div>
                              <button type="button" class="mdg-show-more-btn btn btn-warning btn-default">
                                Show more
                              </button>
                            </div>
                          </div>
                          <div class="mdg-anime promote-gender-equality-and-empower-women">

                            <div class="mdg-anim col-xs-12" style="background-color: #F7941D;">
                              <div class="mdg-slide-content" id="slide-content">
                                <br>
                                <embed style="width:100%; height:650px" src="http://opendatakosovo.github.io/millenium-development-goals-kosovo/gender-enrollment-ratios/index.html">
                              </div>
                              <button type="button" class="mdg-show-more-btn btn btn-warning btn-default">
                                Show more
                              </button>
                            </div>
                          </div>
                          <div class="mdg-anime reduce-child-mortality">

                            <div class="mdg-anim col-xs-12" style="background-color: #C7EAFD;">
                              <div class="mdg-slide-content" id="slide-content">
                                <br>
                                <embed style="width:100%; height:650px" src="http://opendatakosovo.github.io/millenium-development-goals-kosovo/infant-mortality-rate/index.html">
                              </div>
                              <button type="button" class="mdg-show-more-btn btn btn-warning btn-default">
                                Show more
                              </button>
                            </div>
                          </div>
                          <div class="mdg-anime improve-maternal-health">
                            <div class="mdg-anim col-xs-12" style="background-color: #F8C0D9;">
                              <div class="mdg-slide-content" id="slide-content">
                                <br>
                                <embed style="width:100%; height:650px" src="http://opendatakosovo.github.io/millenium-development-goals-kosovo/maternal-mortality/index.html">
                              </div>
                              <button type="button" class="mdg-show-more-btn btn btn-warning btn-default">
                                Show more
                              </button>
                            </div>
                          </div>
                          <div class="mdg-anime combat-hiv-aids-malria-and-other-desease">

                            <div class="mdg-anim col-xs-12" style="background-color: #F15A3F;">
                              <div class="mdg-slide-content" id="slide-content">
                                <br>
                                <embed style="width:100%; height:650px" src="http://opendatakosovo.github.io/millenium-development-goals-kosovo/number-of-cases-of-hiv-aids/index.html">
                              </div>
                              <button type="button" class="mdg-show-more-btn btn btn-warning btn-default">
                                Show more
                              </button>
                            </div>
                          </div>

                          <div class="mdg-anime ensure-environmental-sustainability">


                            <div class="mdg-anim col-xs-12" style="background-color: #8CC63E;">
                              <div class="mdg-slide-content" id="slide-content">
                                <br>
                                <embed style="width:100%; height:650px" src="http://opendatakosovo.github.io/millenium-development-goals-kosovo/afforested-areas/index.html">
                              </div>
                              <button type="button" class="mdg-show-more-btn btn btn-warning btn-default">
                                Show more
                              </button>
                            </div>
                          </div>
                          <div class="mdg-anime internet-penetration">

                            <div class="mdg-anim col-xs-12" style="background-color: #1BB0E8;">
                              <div class="mdg-slide-content" id="slide-content">
                                <br>
                                <embed style="width:100%; height:650px" src="http://opendatakosovo.github.io/millenium-development-goals-kosovo/internet-penetration/index.html">
                              </div>
                              <button type="button" class="mdg-show-more-btn btn btn-warning btn-default">
                                Show more
                              </button>
                            </div>
                          </div>


                        </div>
                        <div class="row">
                          <div tabindex="0" class="chart-div" id="eradicate-extreme-poverty-and-hunger-more">
                            <div class="row" id="line-chart-div1" style="margin: auto;"></div>
                            <br>
                            <div class="row" id="line-chart-div2" style="margin: auto;"></div>
                            <br>
                            <div class="row" id="line-chart-div3" style="margin: auto;"></div>
                            <br>

                          </div>
                          <div class="chart-div" id="achieve-universal-primary-education-more">
                            <div class="row" id="line-chart-div4" style="margin: auto;"></div>
                            <br>
                            <div class="row" id="line-chart-div5" style="margin: auto;"></div>
                            <br>

                          </div>
                          <div class="chart-div" id="promote-gender-equality-and-empower-women-more" >
                            <div class="row" id="line-chart-div6" style="margin: auto;"></div>
                            <br>
                            <div class="row" id="line-chart-div7" style="margin: auto;"></div>
                            <br>
                            <div class="row" id="line-chart-div8" style="margin: auto;"></div>
                            <br>

                          </div>
                          <div class="chart-div" id="reduce-child-mortality-more" >
                            <div class="row" id="line-chart-div9" style="margin: auto;"></div>
                            <br>
                            <div class="row" id="line-chart-div10" style="margin: auto;"></div>
                            <br>

                          </div>
                          <div class="chart-div" id="improve-maternal-health-more">
                            <div class="row" id="line-chart-div11" style="margin: auto;"></div>
                            <br>
                            <div class="row" id="bar-chart-div1" style="margin: auto;"></div>
                            <br>
                            <div class="row" id="bar-chart-div2" style="margin: auto;"></div>
                            <br>

                          </div>
                          <div class="chart-div" id="combat-hiv-aids-malria-and-other-desease-more">

                            <div class="row" id="bar-chart-div3" style="margin: auto;"></div>
                            <br>

                          </div>
                          <div class="chart-div" id="ensure-environmental-sustainability-more" >
                            <div class="row" id="line-chart-div12" style="margin: auto;"></div>
                            <br>
                            <div class="row" id="line-chart-div13" style="margin: auto;"></div>
                            <br>
                            <div class="row" id="bar-chart-div4" style="margin: auto;"></div>
                            <br>

                          </div>
                          <div class="chart-div" id="global-partnership-for-development-more">
                            <div class="row" id="line-chart-div14" style="margin: auto;"></div>
                            <br>
                            <div class="row" id="line-chart-div15" style="margin: auto;"></div>
                          </div>
                        </div>

                      </div>

         <div class="sidebar">
           <h3>About MDG's</h3>
           <p>The eight Millennium Development Goals (MDGs) – which range from halving extreme poverty rates to halting the spread of HIV/AIDS and providing universal primary education, all by the target date of 2015 – form a blueprint agreed to by all the world’s countries and all the world’s leading development institutions. They have galvanized unprecedented efforts to meet the needs of the world’s poorest. The UN is also working with governments, civil society and other partners to build on the momentum generated by the MDGs and carry on with an ambitious post-2015 development agenda.</p>
         </div>
       </div>
     </div>
   </div>
 </div>
<?php get_footer(); ?>
