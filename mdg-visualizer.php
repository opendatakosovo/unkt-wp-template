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
    /*border: solid 2px black;*/
    background-color: #5B92E5;
}

.ul {
  list-style-type: circle;
  margin-left: 5%;
}

.p a{
  color: #337AB7;
}

.p a:hover{
  color: blue;
  text-decoration: underline;
}

hr.hr-style {
    padding: 0;
    border: none;
    width: 90%;
    border-top: medium double #333;
    color: #333;
    text-align: center;
}
hr.hr-style:after {
    content: "§";
    display: inline-block;
    position: relative;
    top: -0.7em;
    font-size: 1.5em;
    padding: 0 0.25em;
    background: transparent;
}

.mdg-text{
  /*border: solid 2px black;*/
  background-color: #fff;
  height:650px;
}

/*.mdg-animation{
  min-height: 735px;
}*/

.mdg-anim{
  /*border: solid 2px black;*/
  background-color:#F1D760;
}
.mdg-anime{
  display:none;
}
.mdg-about{
  /*border: solid 2px black;*/
  background-color:#FFFF66;
  height:340px;
}
.mdg-show-more{
  padding:20px;
}
.mdg-btn{
  cursor: pointer;
  padding-left:5px;
  border-radius: 10px;
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
/*border: 1px solid black;*/
background-color: white;
}
.chart-div{
  display:none;
  /*border: 2px solid black;*/
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

.responsive-btn {
  text-align: center;
}


.mdg-container-responsive p,
.mdg-container-responsive h1,
.mdg-container-responsive h2,
.mdg-container-responsive h3{
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
    height: 100%;
    background-color:white;
    padding: 15px;
}

.p {
    font-size: 15px;
    text-transform: none;
}


.mdg-viz-container{
  float:left;
  width:79%;
}

@media (max-width: 480px) {

  .mdg-slide-content embed {
    width: 102% !important;
  }

  .mdg-viz-container {
    width: 96.5% !important;
  }

  .mdg-btn img {
      height: 100% !important;
  }

  .mdg-container-responsive {
    display: block !important;
  }

  .mdg-buttons-img {
    width:100%;
    height: 100%;
  }

  .mdg-container {
    display: none !important;
  }

  .mdg-amin-description {
    margin-top:10% !important;
    padding: 10px 20px 10px 20px !important;
  }

  .sidebar{
    display: none !important;
  }
}

@media only screen and (min-width: 480px) and (max-width: 990px) {
  .mdg-viz-container {
    width: 98% !important;
  }

  .mdg-slide-content embed {
    width: 102% !important;
  }

  .mdg-btn img {
      height: 100% !important;
  }

  .mdg-container-responsive {
    display: block !important;
  }

  .mdg-buttons-img {
    width:70%;
    height: 70%;
  }

  .mdg-container {
    display: none;
  }

  .mdg-amin-description {
    margin-top:10% !important;
    padding: 10px 20px 10px 20px !important;
  }

  .sidebar{
    display: none !important;
  }
}

iframe{
    overflow:hidden;
    height:1000px;
}
/*embed{
    overflow:hidden;
    height:auto;
}*/
.mdg-slide-content {
  height: 1000px;
  width: 100%;
  padding-bottom: 56.25%;
  overflow: hidden;
  position: relative;
}

.mdg-slide-content embed {
  width: 100%;
  height: 100%;
  position: absolute;
  top: 0;
  left: 0;
}
.description-container {
    margin-top: -15%;
    padding: 8px 100px 5px 174px !important;
    text-align: justify;
}
</style>
<script type="text/javascript"><!--//--><![CDATA[//><!--
  $(document).ready(function(){
    $(".mdg-btn").click(function(){
      $(".mdg-show-more-btn").html("View more stats");
      $(".mdg-btn").removeClass('active');
      var id = this.id;
      $(".mdg-description, .mdg-description-responsive").each(function(){
        if (id == $(this).attr("id")){
            $(this).css("display", "block");
        } else {
            $(this).css("display", "none");
        }
      })
      addAnim(this.id);
      $('.mdg-anim').css("background-color",$(this)['context']['attributes']['data-color'].value);
      $('.mdg-about').css("background-color",$(this)['context']['attributes']['data-color'].value);
      $(".chart-div").css('display','none');
      $("#mdg-" + id).css("display","block");
      $(this).addClass('active');
    });

    $(".mdg-show-more-btn").click(function(){
      var id = $(".mdg-btn.active")[0]['id'];
      if($(".mdg-show-more-btn").html().trim()=="View more stats"){
        showMore(id);
        $("#mdg-" + id).css("display","none");
        $(".mdg-show-more-btn").text("View the visuals");
      }else{
        $("#"+id+"-more").toggle("blind",{},500);
        $("#mdg-" + id).css("display","block");
        $(".mdg-show-more-btn").html("View more stats");
      }
    });
  });

  function addAnim(id){
    $(".mdg-anime").css("display","none");
    $("."+id).toggle("fade in");
    $('html,body').animate({
        scrollTop: $(".container-fluid").offset().top},
        'slow');
  }

  function showMore(id){
    var chartDivId = id + "-more";
    $("#"+chartDivId).toggle("blind",{},500);
  }
 //--><!]]>
 </script>
 <div class="content content-article">
   <div class="container-fluid">
     <div class="row">
       <div class="content-mdg-wrapper">
         <div class="mdg-container-responsive" style="display: none; padding: 10px 10px 10px 20px; text-align: center;">
             <div class="row">
                 <div class="col-xs-12 col-md-12">
                   <br>
                   <h3 style="color: #fff;"> Millennium Development Goals</h3>
                   <br>
                   <div class="col-xs-3 col-md-3 mdg-btn active responsive-btn" data-color="#FFDD00" id="eradicate-extreme-poverty-and-hunger"
                        style="float:left;">
                       <img alt="MDG 1" class="mdg-buttons-img" src="<?php bloginfo('template_url'); ?>/logos/1.jpg"/>
                   </div>
                   <div class="col-xs-3 col-md-3 mdg-btn responsive-btn" data-color="#D8DF20" id="achieve-universal-primary-education"
                        style="float:left;">
                       <img alt="MDG 2" class="mdg-buttons-img" src="<?php bloginfo('template_url'); ?>/logos/2.jpg"/>
                   </div>
                   <div class="col-xs-3 col-md-3 mdg-btn responsive-btn" data-color="#F7941D" id="promote-gender-equality-and-empower-women"
                        style="float:left;">
                       <img alt="MDG 3" class="mdg-buttons-img" src="<?php bloginfo('template_url'); ?>/logos/3.jpg"/>
                   </div>
                   <div class="col-xs-3 col-md-3 mdg-btn responsive-btn" data-color="#C7EAFD" id="reduce-child-mortality"
                        style="float:left;">
                       <img alt="MDG 4" class="mdg-buttons-img" src="<?php bloginfo('template_url'); ?>/logos/4.jpg"/>
                   </div>
                 </div>
             </div>
             <br>
             <div class="row">
                 <div class="col-xs-12 col-md-12">
                     <div class="col-xs-3 col-md-3 mdg-btn responsive-btn" data-color="#F8C0D9" id="improve-maternal-health"
                          style="">
                         <img alt="MDG 5" class="mdg-buttons-img" src="<?php bloginfo('template_url'); ?>/logos/5.jpg"/>
                     </div>
                     <div class="col-xs-3 col-md-3 mdg-btn responsive-btn" data-color="#F15A3F" id="combat-hiv-aids-malria-and-other-desease"
                          style="">
                         <img alt="MDG 6" class="mdg-buttons-img" src="<?php bloginfo('template_url'); ?>/logos/6.jpg"/>
                     </div>
                     <div class="col-xs-3 col-md-3 mdg-btn responsive-btn" data-color="#8CC63E" id="ensure-environmental-sustainability"
                          style="">
                         <img alt="MDG 7" class="mdg-buttons-img" src="<?php bloginfo('template_url'); ?>/logos/7.jpg"/>
                     </div>
                     <div class="col-xs-3 col-md-3 mdg-btn responsive-btn" data-color="#1BB0E8" id="internet-penetration"
                          style="">
                         <img alt="MDG 8" class="mdg-buttons-img" src="<?php bloginfo('template_url'); ?>/logos/8.jpg"/>
                     </div>
                 </div>
             </div>
             <br><br>
             <div class="row" style="padding: 0 20px 0 20px;">
               <div class="mdg-description-responsive" id="eradicate-extreme-poverty-and-hunger" style="display:block;">
                   <h4 style="color:#fff;">Millennium Development Goal 1 - To eradicate extreme poverty and
                       hunger</h5>
                       <p class="p">
                           Target 1.A - Halve, between 1990 and 2015, the proportion of people whose income is less
                           than $1.25 a day
                       </p>
                       <p class="p">
                           Target 1.B - Achieve full and productive employment and decent work for all, including
                           women and young people
                       </p>
                       <p class="p">
                           Target 1.C - Halve, between 1990 and 2015, the proportion of people who suffer from
                           hunger</p>
                       <br>
               </div>
               <div class="mdg-description-responsive" id="achieve-universal-primary-education" style="display:none;">
                   <h4 style="color:#fff;">MDG 2 - To achieve universal primary education</h5>
                       <p class="p">
                           Target 2.A - Ensure that, by 2015, children everywhere, boys and girls alike, will be
                           able to complete a full course of primary schooling
                       </p>
                       <br>
               </div>
               <div class="mdg-description-responsive" id="promote-gender-equality-and-empower-women" style="display:none;">
                   <h4 style="color:#fff;">MDG 3 - To promote gender equality and empower women</h5>
                       <p class="p">
                           Target 3.A - Eliminate gender disparity in primary and secondary education, preferably
                           by 2005, and in all levels of education no later than 2015</h5>
                       </p>
                       <br>
               </div>
               <div class="mdg-description-responsive" id="reduce-child-mortality" style="display:none;">
                   <h4 style="color:#fff;">MDG 4 - To reduce child mortality</h5>
                       <p class="p">
                           Target 4.A - Reduce by two thirds, between 1990 and 2015, the under-five mortality rate
                       </p>
                       <br>
               </div>
               <div class="mdg-description-responsive" id="improve-maternal-health" style="display:none;">
                   <h4 style="color:#fff;">MDG 5 – Improve maternal health</h5>
                       <p class="p">
                           Target 5.A - Reduce by three quarters, between 1990 and 2015, the maternal mortality
                           ratio
                       </p>
                       <p class="p">
                           Target 5.B - Achieve, by 2015, universal access to reproductive health
                       </p>
                       <br>
               </div>
               <div class="mdg-description-responsive" id="combat-hiv-aids-malria-and-other-desease" style="display:none;">
                   <h4 style="color:#fff;">MDG 6 – Combat HIV/AIDS, Malaria and other diseases </5>
                   <p class="p">
                       Target 6.A - Have halted by 2015 and begun to reverse the spread of HIV/AIDS
                   </p>
                   <p class="p">
                       Target 6.B - Achieve, by 2010, universal access to treatment for HIV/AIDS for all those who
                       need it
                   </p>
                   <p class="p">
                       Target 6.C - Have halted by 2015 and begun to reverse the incidence of malaria and other
                       major diseases
                   </p>
                   <br>
               </div>
               <div class="mdg-description-responsive" id="ensure-environmental-sustainability" style="display:none;">
                   <h4 style="color:#fff;">MDG 7 – Ensure Environmental Sustainability</h5>

                       <p class="p">
                           Target 7.A - Integrate the principles of sustainable development into country policies
                           and programmes and reverse the loss of environmental resources
                       </p>
                       <p class="p">
                           Target 7.B - Reduce biodiversity loss, achieving, by 2010, a significant reduction in
                           the rate of loss
                       </p>
                       <p class="p">
                           Target 7.C - Halve, by 2015, the proportion of the population without sustainable access
                           to safe drinking water and basic sanitation
                       </p>
                       <p class="p">
                           Target 7.D - Achieve, by 2020, a significant improvement in the lives of at least 100
                           million slum dwellers
                       </p>
                       <br>
               </div>
               <div class="mdg-description-responsive" id="internet-penetration" style="display:none;">
                   <h4 style="color:#fff;">MDG 8 – Develop a global partnership for development</h5>

                       <p class="p">
                           Target 8.A - Develop further an open, rule-based, predictable, non-discriminatory
                           trading and financial system
                       </p>
                       <p class="p">
                           Target 8.B - Address the special needs of least developed countries
                       </p>
                       <p class="p">
                           Target 8.C - Address the special needs of landlocked developing countries and small
                           island developing States
                       </p>
                       <p class="p">
                           Target 8.D - Deal comprehensively with the debt problems of developing countries
                       </p>
                       <p class="p">
                           Target 8.E - In cooperation with pharmaceutical companies, provide access to affordable
                           essential drugs in developing countries
                       </p>
                       <p class="p">
                           Target 8.F - In cooperation with the private sector, make available benefits of new
                           technologies, especially information and communications
                       </p>
                       <br>
               </div>
             </div>
         </div>
           <div class="mdg-container">
               <h3> Millennium Development Goals</h3>
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
             <div class="mdg-description" id="eradicate-extreme-poverty-and-hunger" style="display:block;">
               <h4 style="color:#fff;">Millennium Development Goal 1 - To eradicate extreme poverty and hunger</h5>
               <p class="p">
                Target 1.A - Halve, between 1990 and 2015, the proportion of people whose income is less than $1.25 a day
                </p>
                <p class="p">
                  Target 1.B - Achieve full and productive employment and decent work for all, including women and young people
                </p>
                <p class="p">
                  Target 1.C - Halve, between 1990 and 2015, the proportion of people who suffer from hunger</p>
                 <br>
             </div>
             <div class="mdg-description" id="achieve-universal-primary-education" style="display:none;">
               <h4  style="color:#fff;">MDG 2 - To achieve universal primary education</h5>
               <p class="p">
                 Target 2.A - Ensure that, by 2015, children everywhere, boys and girls alike, will be able to complete a full course of primary schooling
               </p>
                 <br>
             </div>
             <div class="mdg-description" id="promote-gender-equality-and-empower-women" style="display:none;">
               <h4  style="color:#fff;">MDG 3 - To promote gender equality and empower women</h5>
               <p class="p">
                Target 3.A - Eliminate gender disparity in primary and secondary education, preferably by 2005, and in all levels of education no later than 2015</h5>
               </p>
                 <br>
             </div>
             <div class="mdg-description" id="reduce-child-mortality" style="display:none;">
               <h4  style="color:#fff;">MDG 4 - To reduce child mortality</h5>
               <p class="p">
                Target 4.A - Reduce by two thirds, between 1990 and 2015, the under-five mortality rate
               </p>
                 <br>
             </div>
             <div class="mdg-description" id="improve-maternal-health" style="display:none;">
               <h4  style="color:#fff;">MDG 5 – Improve maternal health</h5>
               <p class="p">
                 Target 5.A - Reduce by three quarters, between 1990 and 2015, the maternal mortality ratio
               </p>
               <p class="p">
                 Target 5.B - Achieve, by 2015, universal access to reproductive health
               </p>
                 <br>
             </div>
             <div class="mdg-description" id="combat-hiv-aids-malria-and-other-desease" style="display:none;">
               <h4  style="color:#fff;">MDG 6 – Combat HIV/AIDS, Malaria and other diseases </5>
                 <p class="p">
                   Target 6.A - Have halted by 2015 and begun to reverse the spread of HIV/AIDS
                 </p>
                 <p class="p">
                   Target 6.B - Achieve, by 2010, universal access to treatment for HIV/AIDS for all those who need it
                 </p>
                 <p class="p">
                   Target 6.C - Have halted by 2015 and begun to reverse the incidence of malaria and other major diseases
                 </p>
                 <br>
             </div>
             <div class="mdg-description" id="ensure-environmental-sustainability" style="display:none;">
               <h4  style="color:#fff;">MDG 7 – Ensure Environmental Sustainability</h5>

                 <p class="p">
                   Target 7.A - Integrate the principles of sustainable development into country policies and programmes and reverse the loss of environmental resources
                 </p>
                 <p class="p">
                   Target 7.B - Reduce biodiversity loss, achieving, by 2010, a significant reduction in the rate of loss
                 </p>
                 <p class="p">
                   Target 7.C - Halve, by 2015, the proportion of the population without sustainable access to safe drinking water and basic sanitation
                 </p>
                 <p class="p">
                   Target 7.D - Achieve, by 2020, a significant improvement in the lives of at least 100 million slum dwellers
                 </p>
                 <br>
             </div>
             <div class="mdg-description" id="internet-penetration" style="display:none;">
               <h4  style="color:#fff;">MDG 8 – Develop a global partnership for development</h5>

                 <p class="p">
                   Target 8.A - Develop further an open, rule-based, predictable, non-discriminatory trading and financial system
                 </p>
                 <p class="p">
                   Target 8.B - Address the special needs of least developed countries
                 </p>
                 <p class="p">
                   Target 8.C - Address the special needs of landlocked developing countries and small island developing States
                 </p>
                 <p class="p">
                   Target 8.D - Deal comprehensively with the debt problems of developing countries
                 </p>
                 <p class="p">
                   Target 8.E - In cooperation with pharmaceutical companies, provide access to affordable essential drugs in developing countries
                 </p>
                 <p class="p">
                   Target 8.F - In cooperation with the private sector, make available benefits of new technologies, especially information and communications
                 </p>
                 <br>
             </div>
         </div>
                      <div class="mdg-viz-container">
                        <div class="row">
                          <div class="mdg-anime eradicate-extreme-poverty-and-hunger">

                            <div class="mdg-anim col-xs-12" style="background-color: #FFDD00;">
                              <button type="button" style="float:right; margin:-18px 5px 0 0; background-color: #f4f4f4; color: #000" class="mdg-show-more-btn btn btn-default">
                                View more stats
                              </button>

                              <h1 class="mdg-slider-title"></h1>
                              <div class="mdg-animation" id="mdg-eradicate-extreme-poverty-and-hunger">
                              <div class="row">
                                <br>
                                <div class="mdg-slide-content">
                                  <embed src="http://opendatakosovo.github.io/millenium-development-goals-kosovo/poverty-headcount-ratio-at-national-poverty-lines/index.html">
                                </div>
                              </div>
                            </div>
                          </div>
                          </div>
                          <div class="mdg-anime achieve-universal-primary-education">
                            <div class="mdg-anim col-xs-12" style="background-color: #D8DF20;" >
                              <button type="button" style="float:right; margin:-18px 5px 0 0; background-color: #f4f4f4; color: #000" class="mdg-show-more-btn btn btn-default">
                                View more stats
                              </button>
                              <div class="mdg-animation" id="mdg-achieve-universal-primary-education">
                              <div class="mdg-slide-content">
                                <br>
                                <embed src="http://opendatakosovo.github.io/millenium-development-goals-kosovo/total-primary-and-lower-secondary-enrollments/index.html">
                              </div>

                              <div class="mdg-sliders" id="achieve-universal-primary-education-slider"></div>
                            </div>
                          </div>
                          </div>
                          <div class="mdg-anime promote-gender-equality-and-empower-women">
                            <div class="mdg-anim col-xs-12" style="background-color: #F7941D;">
                              <button type="button" style="float:right; margin:-18px 5px 0 0; background-color: #f4f4f4; color: #000" class="mdg-show-more-btn btn btn-default">
                                View more stats
                              </button>

                              <div class="mdg-animation" id="mdg-promote-gender-equality-and-empower-women">
                              <div class="mdg-slide-content">
                                <br>
                                <embed src="http://opendatakosovo.github.io/millenium-development-goals-kosovo/gender-enrollment-ratios/index.html">
                              </div>
                            </div>
                          </div>
                        </div>
                          <div class="mdg-anime reduce-child-mortality">
                            <div class="mdg-anim col-xs-12" style="background-color: #C7EAFD; height: auto;">
                              <button type="button" style="float:right; margin:-18px 5px 0 0; background-color: #f4f4f4; color: #000" class="mdg-show-more-btn btn btn-default">
                                View more stats
                              </button>
                              <div class="mdg-animation" id="mdg-reduce-child-mortality">
                              <div class="mdg-slide-content">
                                <br>
                                <embed src="http://opendatakosovo.github.io/millenium-development-goals-kosovo/infant-mortality-rate/index.html">

                                <br><br><br><br>
                              </div>
                            </div>
                          </div>
                          </div>
                          <div class="mdg-anime improve-maternal-health">
                            <div class="mdg-anim col-xs-12" style="background-color: #F8C0D9;">
                              <button type="button" style="float:right; margin:-18px 5px 0 0; background-color: #f4f4f4; color: #000" class="mdg-show-more-btn btn btn-default">
                                View more stats
                              </button>
                              <div class="mdg-animation" id="mdg-improve-maternal-health">
                              <div class="mdg-slide-content">
                                <br>
                                <embed src="http://opendatakosovo.github.io/millenium-development-goals-kosovo/maternal-mortality/index.html">
                              </div>
                            </div>
                          </div>
                          </div>
                          <div class="mdg-anime combat-hiv-aids-malria-and-other-desease" style="margin-top:-10px;">
                            <div class="mdg-anim col-xs-12" style="background-color: #F15A3F;">
                              <button type="button" style="float:right; margin:-18px 5px 0 0; background-color: #f4f4f4; color: #000" class="mdg-show-more-btn btn btn-default">
                                View more stats
                              </button>

                              <div class="mdg-animation" id="mdg-combat-hiv-aids-malria-and-other-desease">
                              <div class="mdg-slide-content">
                                <br>
                                <embed src="http://opendatakosovo.github.io/millenium-development-goals-kosovo/number-of-cases-of-hiv-aids/index.html">
                              </div>
                            </div>
                          </div>
                        </div>

                          <div class="mdg-anime ensure-environmental-sustainability">
                            <div class="mdg-anim col-xs-12" style="background-color: #8CC63E;">
                              <button type="button" style="float:right; margin:-18px 5px 0 0; background-color: #f4f4f4; color: #000" class="mdg-show-more-btn btn btn-default">
                                View more stats
                              </button>
                              <div class="mdg-animation" id="mdg-ensure-environmental-sustainability">
                              <div class="mdg-slide-content">
                                <br>
                                <embed src="http://opendatakosovo.github.io/millenium-development-goals-kosovo/afforested-areas/index.html">
                              </div>
                              </div>
                            </div>
                          </div>
                          <div class="mdg-anime internet-penetration">
                            <div class="mdg-anim col-xs-12" style="background-color: #1BB0E8;">
                              <button type="button" style="float:right; margin:-18px 5px 0 0; background-color: #f4f4f4; color: #000" class="mdg-show-more-btn btn btn-default">
                                View more stats
                              </button>
                              <div class="mdg-animation" id="mdg-internet-penetration">
                                <div class="mdg-slide-content">
                                  <br>
                                  <embed src="http://opendatakosovo.github.io/millenium-development-goals-kosovo/internet-penetration/index.html">
                                </div>
                             </div>
                            </div>
                          </div>

                        </div>
                        <div class="row">
                          <div tabindex="0" style="background-color: #FFDD00; margin-top-20px;" class="chart-div" id="eradicate-extreme-poverty-and-hunger-more">
                            <div class="row" id="line-chart-div1" style="margin: auto;"></div>
                            <p class="p" style="font-size:13px; display:inline-block; margin-left:15%;">Source: <a
                                    href="http://data.worldbank.org/data-catalog/world-development-indicators">
                                World Bank World Development Indicators</a>
                            </p>
                            <br>
                            <p class="p" style="font-size:13px; display:inline-block; margin-left:15%;">* data for this year is extrapolated from other years</h6><br><br>
                            <div class="row" style="padding: 0 13.2% 10px 16.2%;">
                              <h3 style="color:#000;">Poverty Headcount</h3>
                              <p class="p" style="color:#000;">
                                 As of 2015, poverty remains a persistent and widespread issue in Kosovo. A report produced by the Kosovo Agency of Statistics (KAS) on Consumption Poverty found that, in 2011, 29.7% of the population of Kosovo was unable to meet human needs and 10.2% of the population was unable to meet even basic survival needs. These poverty rates are very high compared to neighbouring countries and, though decreasing, have remained persistently high over the past 10 years. Reports from the World Bank and UNDP also identify that poverty and vulnerability levels would be much higher had the safety net of migration and remittances not been provided.  </p>
                               <br>
                              <p class="p" style="color:#000;">
                                 The poverty gap, another measure of poverty that calculates the "depth" of poverty, taking into account both the percentage of the population below the poverty line and how far these individuals are below the poverty line, has also slightly decreased. From 2009 to 2011, the depth of poverty based on the Full Poverty Line declined from 9.6% to 7.8%. Similar falls have been seen in the Extreme Poverty Gap measure, declining from 3.0% to 2.1% over the same period.
                               </p>
                              <br>
                            </div>
                            <hr class="hr-style">
                            <br>
                            <div class="row" id="line-chart-div2" style="margin: auto;"></div>
                            <p class="p" style="font-size:13px; display:inline-block; margin-left:15%;">Source: <a
                                    href="http://data.worldbank.org/data-catalog/world-development-indicators">
                                World Bank World Development Indicators</a>
                            </p>
                            <br>
                            <p class="p" style="font-size:13px; display:inline-block; margin-left:15%;">* data for this year is extrapolated from other years</h6><br><br>
                            <div class="row" style="padding: 0 13.2% 10px 16.2%;">
                              <h3 style="color:#000;">Employment to population ratio</h3>
                              <p class="p" style="color:#000;">
                                One of the keys to alleviating poverty is employment. Unfortunately, in Kosovo, the rates of labour force participation remain low and the unemployment rate remains high – particularly for women. In 2013, only 28.4% of the working age population was employed. This measure, and the labour force participation rate (40.6%) are the lowest in the Western Balkan region and far lower than the average for the EU. For women in particular these measures are extremely low, with the employment rate in 2013 standing at 12.9% and labour force participation at 21.1%.
                              </p>
                              <br>
                              <p class="p" style="color:#000;">
                                That said, there has been some improvement in the rate of employment in Kosovo since 2002, albeit from a very low base. In 2002 the percentage of the working age population employed was just 23.8% and the same figure for women was just 8.8%.
                              </p>
                            <br><br>
                            </div>
                            <hr class="hr-style">
                            <br>
                            <div class="row" id="line-chart-div3" style="margin: auto;"></div>
                            <p class="p" style="font-size:13px; display:inline-block; margin-left:15%;">Source: <a
                                    href="http://data.worldbank.org/data-catalog/world-development-indicators">
                                World Bank World Development Indicators</a>
                            </p>
                            <br><br>
                            <div class="row" style="padding: 0 13.2% 10px 16.2%;">
                              <h3 style="color:#000;">GDP per Capita</h3>
                              <p class="p" style="color:#000;">
                                Economic growth is also a powerful instrument for reducing poverty and improving standards of living. The Kosovo economy grew at a very high average rate of 6.3 percent per annum between 2006 and 2008, but it has not been able to sustain this high growth rate in the wake of the economic downturn in 2008-09. During the 2009-2013 period, the Kosovo economy grew at a much lower pace - averaging 3.3% per annum. The main contributors to this economic growth also changed after the 2009 period. Previously, the main contributor of this growth was the private sector (consumption and investment), in the period after the economic downturn, the economic growth rate was driven primarily by growing government expenditures.
                              </p>
                              <br>
                              <p class="p" style="color:#000;">
                                In countries with growing populations, increases in human welfare and standards of living are often better measured with growth in real GDP per capita, which shows the expansion in output not due simply to the growth in the population. When economic growth is measured with real GDP per capita, economic growth rates in Kosovo further decline. Growth in real GDP per capita averaged 4.8 percent per annum during the period 2006-2008 and 1.8 percent per annum from 2009 to 2013. To put this in perspective, if real GDP per capita in Kosovo continued to grow at 1.8 percent per annum, it would take the citizens of Kosovo 39 years to reach the same level as the average citizen of Montenegro.
                              </p>
                            <br><br>
                            </div>
                          </div>

                          <div class="chart-div" style="background-color: #D8DF20;" id="achieve-universal-primary-education-more">
                            <div class="row" id="line-chart-div4" style="margin: auto;"></div>

                            <p class="p" style="font-size:13px; display:inline-block; margin-left:15%;">Source: <a
                                    href="http://masht.rks-gov.net/en/statistikat">
                                Ministry of Education, Science and Technology</a>
                            </p>
                            <br><br>
                            <div class="row" style="padding: 0 13.2% 10px 16.2%;">
                              <h3 style="color:#000;">Gross Primary School enrolments</h3>
                              <p class="p" style="color:#000;">
                                Primary and lower secondary school enrolments in Kosovo have been high since at least 2009-10. As of 2013-14, no less than 95.5% of eligible students were enrolled in any given year. This suggests that very few children in Kosovo are missing out on this basic education and helps ensure basic literacy, mathematics and English tuition for young people.
                              </p><br>
                              <p class="p" style="color:#000;">
                                There has also been steady growth in the total number of students attending upper secondary and tertiary education. The gross enrolment rate in upper secondary education (general and VET) in 2011-12 was 92.1% - 5.2% points higher than in 2009-10. Additionally, the gross enrolment rate in Kosovo was significantly higher than other countries in the region, such as Croatia (87%), Bosnia & Herzegovina (86%), Serbia (86%) and Macedonia (78%). The percentage of students dropping out of upper secondary education has also decreased. By the end of the 2011-12 year, the dropout rate from upper secondary schools was 2.5%, compared to 3.1% for 2009-2010.
                              </p><br>
                              <p class="p" style="color:#000;">
                              Similarly, there was steady growth in the total number of students attending tertiary education in Kosovo. This was mainly due to the increasing number of private and public higher education institutions and the limited number of employment opportunities. The enrolment rate in tertiary education in 2010-2011 was estimated to be around 57% of the eligible population based on age, where 67% of those who graduated from upper secondary schools were able to pursue tertiary education.
                            </p>
                            <br><br>
                            </div>
                            <hr class="hr-style">
                            <br>
                            <div class="row" id="line-chart-div5" style="margin: auto;"></div>

                            <p class="p" style="font-size:13px; display:inline-block; margin-left:15%;">Source: <a
                                href="http://masht.rks-gov.net/en/statistikat">
                                Ministry of Education, Science and Technology</a>
                            </p><br><br>
                            <div class="row" style="padding: 0 13.2% 10px 16.2%;">
                              <h3 style="color:#000;">Total Primary School enrolments</h3>
                              <p class="p" style="color:#000;">
                                The absolute number of children enrolled has been falling since 2007-08, with over 50,000 less children enrolled in primary and lower secondary school in 2014-15 than in 2007-08. However, as reflected in the gross enrolments rates, this does not represent parents pulling children out of school, but simply the changing demographics in Kosovo.
                              </p>
                            <br><br>
                            </div>

                          </div>
                          <div class="chart-div" style="background-color: #F7941D;" id="promote-gender-equality-and-empower-women-more" >
                            <div class="row" id="line-chart-div6" style="margin: auto;"></div>

                            <p class="p" style="font-size:13px; display:inline-block; margin-left:15%;">Source: <a
                                    href="http://masht.rks-gov.net/en/statistikat">
                                Ministry of Education, Science and Technology</a>
                            </p>
                            <br><br>
                            <div class="row" style="padding: 0 13.2% 10px 16.2%;">
                              <h3 style="color:#000;">Gender Enrolment Ratios</h3>
                              <p class="p" style="color:#000;">
                              Ensuring access to education for both sexes plays an important role in providing women with economic, health, and social opportunities to help their own lives, the lives of their families, and the positions of their communities currently and for the future. In Kosovo, the enrolment ratios for women (the number of women enrolled as a percentage of the number of men enrolled in school) increased across the board, but had been relatively high for all years with available data. The biggest improvement was seen in the enrolment ratio for high secondary school. In 2005-06, there were 75 women for every 100 men in high secondary school whereas there were 89 women for every 100 men in 2014-15.
                            </p>
                            </div>
                            <br>
                            <hr class="hr-style">
                            <br>
                            <div class="row" id="line-chart-div7" style="margin: auto;"></div>

                            <p class="p" style="font-size:13px; display:inline-block; margin-left:15%;">Source: <a
                                    href="http://data.worldbank.org/data-catalog/world-development-indicators">
                                World Bank World Development Indicators</a>
                            </p>
                            <br><br>
                            <div class="row" style="padding: 0 13.2% 10px 16.2%;">
                              <h3 style="color:#000;">Labour Force Participation</h3>
                              <p class="p" style="color:#000;">
                                One of the main hurdles that must be overcome if Kosovo is to have gender equality is the very low labour participation rate for females. This rate, representing the number of women who are either currently employed or unemployed but actively looking for work as a percentage of all working age women, stood at 21.1% in 2013. That corresponds to about 2 out of every 10 women in Kosovo. By comparison, around 6 of every 10 men are either working or looking for work. This low rate of female labour participation is also extremely low for the region. Macedonia, Serbia and Albania all have female labour participation rates over 40%.
                              </p><br>
                            <p class="p" style="color:#000;">
                              Unfortunately, the female labour participation has also been on a downwards trend in recent years. As recently as 2002, the female labour participation rate in Kosovo was 34.5% - the highest recorded level in the post-war period. Although the 2013 figure of 21.1% is a slight improvement from 2012 (17.8%), it is hard to say whether this is the start of a new upward trend, or simply an anomaly.
                            </p><br>
                            <p class="p" style="color:#000;">
                              Finally, despite lower activity rates, unemployment rates for women are also higher. Even though only 2 in 20 women are active in the labour force, the unemployment rate for women stands at 40%, as compared to 28% for men. Less than 10% of businesses are women-led or women-owned, and female-led businesses are smaller (women have on average 3.07 employees, compared to 5.27 among men-led businesses). Additionally, these business often have difficulty accessing credit and loans because they lack collateral. As a result, men hold about 92% of collateral properties in Kosovo.
                            </p>
                            </div>
                            <br>
                            <hr class="hr-style">
                            <div class="row" id="bar-chart-div6" style="margin: auto;"></div>

                            <p class="p" style="font-size:13px; display:inline-block; margin-left:15%;">Source: <a
                            href="http://www.unkt.org/development-goals/progress-by-goal-for-kosovo/">
                            United Nations Kosovo Team</a>
                            </p>
                            <br><br>
                            <div class="row" style="padding: 0 13.2% 10px 16.2%;">
                              <h3 style="color:#000;">Representation in Parliament</h3>
                              <p class="p" style="color:#000;">
                                Women remain underrepresented both quantitatively and qualitatively in decision-making processes at all levels. The target defined by the law on gender equality of 40% representation for all levels of decision-making has not yet been achieved with women currently holding only 33.3% of the seats in the Kosovo Assembly (40 of 120 seats). On the other hand, only 14 of these women were elected, while 24 received their positions due to a quota. Women also remain underrepresented among ministers, deputy ministers, and chairs of assembly committees.
                              </p><br>
                              <p class="p" style="color:#000;">
                                Similarly, women are severely underrepresented in decision-making positions within municipalities; leading only 14 directorates in all of Kosovo (4.4%) and with only one municipality having a female mayor - Gjakova/Djakovica. Finally, among Kosovo’s public employees only 38% are women – however it should be noted that due to the low participation rate of women in Kosovo, this actually means women are being overrepresented when the relative availability of men and women is taken into account.
                              </p><br>
                            </div>
                            <hr class="hr-style">
                            <div class="row" id="line-chart-div8" style="margin: auto;"></div>
                            <p class="p" style="font-size:13px; display:inline-block; margin-left:15%;">Source: <a
                                    href="http://data.worldbank.org/data-catalog/world-development-indicators">
                                World Bank World Development Indicators</a>
                            </p>
                            <br><br>
                            <div class="row" style="padding: 0 13.2% 10px 16.2%;">
                              <h3 style="color:#000;">Life Expectancy at Birth</h3>
                              <p class="p" style="color:#000;">
                                Like many countries, female life expectancy at birth (73.0 years) is higher than male life expectancy (68.7 years) in Kosovo. Additionally, the life expectancy for both males and females in increasing in Kosovo, with both sexes adding approximately 3 years since 2001. However, the life expectancy in Kosovo is significantly lower than other countries in the region. In Kosovo the life expectancy at birth is 9 years lower than Albania, 5 years lower then Macedonia and Serbia, and 11 years lower than the EU average.
                              </p><br>
                            </div>
                            <br>

                          </div>

                          <div class="chart-div" style="background-color: #C7EAFD;" id="reduce-child-mortality-more" >
                            <div class="row" id="line-chart-div9" style="margin: auto;"></div>
                            <p class="p" style="font-size:13px; display:inline-block; margin-left:15%;">Source: <a
                                    href="http://ec.europa.eu/eurostat/data/database">
                                Eurostat</a>
                            </p>
                            <br><br>
                            <div class="row" style="padding: 0 13.2% 10px 16.2%;">
                              <h3 style="color:#000;">Infant mortality rate</h3>
                              <p class="p" style="color:#000;">
                                The infant mortality rate in Kosovo is relatively low by the standards of developing nations, with 11.4 infant deaths per 100,000 live births in 2012. This rate showed significant variation between 2002 and 2012, ranging between 15.1 and 8.8, but has generally exhibited a downward trend.
                              </p><br>
                              <p class="p" style="color:#000;">
                                However, the infant mortality rate in Kosovo is significantly higher than most western countries, and many of the ex-Yugoslav nations. For example, most countries in the EU have infant mortality rates below 5, while Serbia, Macedonia and Montenegro all have infant mortality rates around or just over 5. On the other hand, Albania also has a slightly higher infant mortality rate, estimated to be 13.8 in 2012.
                            </p><br>
                            </div>
                            <br>
                            <hr class="hr-style">
                            <br>
                            <div class="row" id="line-chart-div10" style="margin: auto;"></div>
                            <p class="p" style="font-size:13px; display:inline-block; margin-left:15%;">Source: Report on Perinatal Situation in Kosovo - 2014
                            </p>
                            <br><br>
                            <div class="row" style="padding: 0 13.2% 10px 16.2%;">
                              <h3 style="color:#000;">Early neonatal mortality rate</h3>
                              <p class="p" style="color:#000;">
                                A subset of infant mortality, the early neonatal mortality rate represents the deaths of children within 6 days of birth, whereas the infant mortality rate represents deaths of children less than one year old. What this data reveals better than the infant mortality rate is the strong improvements being made in postnatal care. From an early neonatal mortality rate of 14.8 in 2000, this rate had fallen to 3.7 in 2014.
                              </p><br>
                            </div>
                            <br>
                            <hr class="hr-style">
                            <br>
                            <div class="row" id="line-chart-div15" style="margin: auto;"></div>
                            <p class="p" style="font-size:13px; display:inline-block; margin-left:15%;">Source: Report on Perinatal Situation in Kosovo - 2014
                            </p>
                            <br><br>
                            <div class="row" style="padding: 0 13.2% 10px 16.2%;">
                              <h3 style="color:#000;">Stillbirth rate</h3>
                              <p class="p" style="color:#000;">
                                The positive downtrend in the early neonatal mortality rate can also be seen in the decreased number of stillbirths. Typically taken to mean late fetal death (death between 22 weeks gestation and birth), the rate has almost halved between 2000 and 2014, falling from a high of 15.9 in 2003 to 8.4 in 2014. Combined with the improvement in the early neonatal mortality rate, this data would seem to suggest improvements continue be made in both pre and postnatal care in Kosovo.
                              </p><br>
                            </div>
                          </div>

                          <div class="chart-div" style="background-color: #F8C0D9;" id="improve-maternal-health-more">
                            <div class="row" id="line-chart-div11" style="margin: auto;"></div>

                            <p class="p" style="font-size:13px; display:inline-block; margin-left:15%;">Source: Report on Perinatal Situation in Kosovo - 2014
                            </p>
                            <br><br>
                            <div class="row" style="padding: 0 13.2% 10px 16.2%;">
                              <h3 style="color:#000;">Maternal Mortality</h3>
                              <p class="p" style="color:#000;">
                                The maternal mortality rate in Kosovo has varied significantly over the past 10-15 years – from a high of 43.3 deaths per 100,000 live births in 2009 to 0 deaths in 2013 and 2014.
                              </p><br>
                              <p class="p" style="color:#000;">
                                Setting aside the spike in deaths in 2008 and 2009, there has been a clear downwards trend throughout the past 15 years. In more recent years, the data shows Kosovo also compares well with most countries in the region. For example, Macedonia had an estimated average maternal mortality rate of 8 deaths per 100,000 live births between 2010 and 2015. Meanwhile, Serbia and Albania averaged 17 and 29 deaths per 100,000 live births respectively for the same period. The average for the EU currently stands at approximately 8 deaths per 100,000 live births.
                              </p><br>
                            </div>
                            <br>
                            <hr class="hr-style">
                            <br>
                            <div class="row" id="bar-chart-div1" style="margin: auto;"></div>

                            <p class="p" style="font-size:13px; display:inline-block; margin-left:15%;">Source: <a
                                    href="https://ask.rks-gov.net/ENG/publikimet/doc_details/967-demographic-social-and-reproductive-health-survey-in-kosovo-">
                                Demographic Social and Reproductive Health Survey in Kosovo</a>
                            </p>
                            <br>
                            <br>
                            <div class="row" style="padding: 0 13.2% 10px 16.2%;">
                              <h3 style="color:#000;">Aware of Modern Contraception</h3>
                              <p class="p" style="color:#000;">
                                Awareness of modern contraception in Kosovo decreased between 2003 and 2009, but still remains generally high. This awareness also varies with age, with women aged between 25 and 45 having the highest levels of awareness.
                              </p><br>
                            </div>
                            <br>
                            <hr class="hr-style">
                            <br>
                            <div class="row" id="bar-chart-div2" style="margin: auto;"></div>

                            <p class="p" style="font-size:13px; display:inline-block; margin-left:15%;">Source: <a
                                    href="https://ask.rks-gov.net/ENG/publikimet/doc_details/967-demographic-social-and-reproductive-health-survey-in-kosovo-">
                                Demographic Social and Reproductive Health Survey in Kosovo</a>
                            </p>
                            <br>
                            <br>
                            <div class="row" style="padding: 0 13.2% 10px 16.2%;">
                              <h3 style="color:#000;">Using Modern Contraception</h3>
                              <p class="p" style="color:#000;">
                                The usage of contraception remains at fairly low rates, particularly amongst women aged 25 or younger. This is likely to be at least partially explainable by the relatively young age of marriage for many women in Kosovo, but could also be evidence that a cultural stigma around the use of contraception still exists.
                              </p><br>
                            </div>
                          </div>

                          <div class="chart-div" style="background-color: #F15A3F;" id="combat-hiv-aids-malria-and-other-desease-more">
                            <div class="row" id="bar-chart-div3" style="margin: auto;"></div>

                            <p class="p" style="font-size:13px; display:inline-block; margin-left:15%;">Source: <a
                                      href="http://www.unaids.org/sites/default/files/country/documents/KOSOVO_narrative_report_2015.pdf">
                                  UNAIDS Kosovo Narrative Report 2015</a>
                            </p>
                            <br>
                            <br>
                            <div class="row" style="padding: 0 13.2% 10px 16.2%;">
                              <h3 style="color:#000;">HIV and AIDS</h3>
                              <p class="p" style="color:#000;">
                                Kosovo is currently categorised in the group of states with a low rate of HIV. The infection rate is below 1% of the general population and below 5% of all groups threatened by the growing risk of HIV.
                              </p><br>
                            </div>
                            <br>
                            <hr class="hr-style">
                            <br>
                            <div class="row" id="bar-chart-div5" style="margin: auto;"></div>

                            <p class="p" style="font-size:13px; display:inline-block; margin-left:15%;">Source: <a
                                      href="http://www.euro.who.int/__data/assets/pdf_file/0009/251793/NTP-review_Kos_2013_April_FINAL.pdf?ua=1">
                                  World Health Organization - Review of the Tuberculosis Programme in Kosovo</a>
                            </p>
                            <br><br>
                            <div class="row" style="padding: 0 13.2% 10px 16.2%;">
                              <h3 style="color:#000;">Rate of Tuberculosis</h3>
                              <p class="p" style="color:#000;">
                                The prevalence of Tuberculosis (TB) in Kosovo has been on the decline since 2001 when there were 1,678 cases to 968 cases in 2012. However, even after this fall, tuberculosis is much more widespread in Kosovo than in other countries in the region and the EU. While in Albania the incidence of TB is 16 per 100,000 people, 18 in Macedonia, and 8 in the EU, in Kosovo the 968 cases in 2012 translates to approximately 53 per 100,000 people.
                              </p><br>
                            </div>
                            <br>
                            <hr class="hr-style">
                            <br>
                            <div class="row" id="bar-chart-div8" style="margin: auto;"></div>

                            <p class="p" style="font-size:13px; display:inline-block; margin-left:15%;">Source: <a
                                      href="https://mics-surveys-prod.s3.amazonaws.com/MICS5/Central%20and%20Eastern%20Europe%20and%20the%20Commonwealth%20of%20Independent%20States/Kosovo%20under%20UNSC%20res.%201244/2013-2014/Final/Kosovo%20%28UNSCR%201244%29%202013-14%20MICS_English.pdf">
                                  UNICEF Multiple Indicator Cluster Survey 2013-14</a>
                            </p>
                            <br><br>
                            <div class="row" style="padding: 0 13.2% 10px 16.2%;">
                              <h3 style="color:#000;">Measles Vaccinations</h3>
                              <p class="p" style="color:#000;">
                                The overall rate of vaccination in Kosovo, as reported by health facility
records and/or vaccination cards, is high with almost 90% of children aged 24 to 35 months being vaccinated against measles. However, disadvantaged communities within Kosovo continue to display high rates of unvaccinated children, with less than 45% of children aged 24 to 35 months in Roma, Ashkali and Egyptian communities being vaccinated against measles.
                                </p><br>
                            </div>
                          </div>

                          <div class="chart-div" style="background-color: #8CC63E;" id="ensure-environmental-sustainability-more" >
                            <div class="row" id="line-chart-div12" style="margin: auto;"></div>

                            <p class="p" style="font-size:13px; display:inline-block; margin-left:15%;">Source: <a
                                      href="https://ask.rks-gov.net/ENG/enviroment/publications/doc_download/1295-some-facts-on-the-environment-2015">Some
                                  Facts on the Environment 2015</a>
                            </p>
                            <br><br>
                            <div class="row" style="padding: 0 13.2% 10px 16.2%;">
                              <h3 style="color:#000;">Greening Kosovo</h3>
                              <p class="p" style="color:#000;">
                                Kosovo has made some progress in afforesting (planting forests). Between 2004 and 2010, 2,253 hectares of forest were planted. However, when considering the total land area of Kosovo (1,090,800 hectares), this only represents 0.2%. Furthermore, many sections of forest, covering roughly 44% of Kosovo’s territory, are in poor condition due to inadequate management and illegal logging. This is causing increased soil erosion and landslides, with the costs of forest degradation estimated to be around 0.4% of GDP.
                              </p><br>
                              <p class="p" style="color:#000;">
                                Kosovo also struggles with land degradation from unplanned extension of settlements, industrial and sanitary landfills, and erosion. According to estimates from the Ministry of Agriculture, Forestry and Rural Development (MAFRD), around 400 hectares of agricultural land is converted into construction land every year.
                                </p><br>
                            </div>
                            <br>
                            <hr class="hr-style">
                            <br>
                            <div class="row" id="line-chart-div13" style="margin: auto;"></div>

                            <p class="p" style="font-size:13px; display:inline-block; margin-left:15%;">Source: <a
                                      href="http://data.worldbank.org/data-catalog/world-development-indicators">Some
                                  World Bank World Development Indicators</a>
                            </p>
                            <br><br>
                            <div class="row" style="padding: 0 13.2% 10px 16.2%;">
                              <h3 style="color:#000;">Renewable Energy Output/Usage</h3>
                              <p class="p" style="color:#000;">
                                Kosovo has a very low rate of renewable energy output. Between 2001 and 2012, the output of renewable energy averaged just 2% of total energy output. While renewable energy consumption was significantly higher, averaging 22.1% over the same period, the lack of growth in output suggests little investment is being made into renewable energy in Kosovo. What is more, emissions of all greenhouse gases in Kosovo are increasing annually by approximately about 10 percent.
                              </p><br>
                              <p class="p" style="color:#000;">
                                The lack of investment in renewables is concerning as air pollution is a critical environmental problem in urban areas in Kosovo. Ambient air quality is particularly poor in Prishtine/Pristina, the Obiliq/Obilic area, the Drenas area, and Mitrovice/a. The principal contaminants are sulfur dioxide (SO2), nitrogen oxides NO and NO2 (NOx), ozone (O3), lead (Pb), carbon dioxide (CO2), particulate matter (PM or dust), and dioxin. The main sources of air pollution in Kosovo are:
                              </p>
                              <ul class="ul" style="color: #000;">
                                <li class="p">
                                  the relatively old two coal-fired power plants of the Kosovo Energy Corporation (KEK) and its coal-mining area
                                </li>
                                <li class="p">
                                  the burning of wood and lignite for household heating industrial complexes such as the Mitrovica Industrial Park (Trepca), nickel mining and production in Drenas/Gllogovc (Ferronikeli) and the cement factory in Hani Elexi (Sharrcem), and
                                </li>
                                <li class="p">
                                  fossil fuels from increased traffic and old vehicles.
                                </li>
                              </ul>
                              <br>
                              <p class="p" style="color:#000;">
                                Overall, compared on per capita terms, Kosovo has relatively low emissions in comparison with other countries in Europe, (5.7t CO2 equivalent per capita per annum in 2008). However, the compared per unit of GDP (0.84 kg CO2 equivalent per EUR in 2008) greenhouse gas emissions in Kosovo are almost double those in the EU (average 0.4 kg/EUR).
                              </p><br>
                            </div>
                            <br>
                            <hr class="hr-style">
                            <br>
                            <div class="row" id="bar-chart-div4" style="margin: auto;"></div>
                            <p class="p" style="font-size:13px; display:inline-block; margin-left:15%;">Source: <a
                                      href="http://www.kryeministri-ks.net/repository/docs/REVISING_and_UPDATING_the_KOSOVO_ENVIRONMENTAL_STRATEGY_(KES).pdf">Some
                                  Kosovo Environmental Strategy and National Environmental Action Plan</a>
                            </p>
                            <br><br>
                            <div class="row" style="padding: 0 13.2% 10px 16.2%;">
                              <h3 style="color:#000;">Biodiversity</h3>
                              <p class="p" style="color:#000;">
                                Kosovo has about 1,800 species of flora classified into 139 kingdoms, 63 phyla, 35 orders and 20 classes. More recent data shows there could be as many as 2,500 species. What makes Kosovo flora and fauna important and attractive is the large number (over 200) of endemic, endemic-relict and sub-endemic species. Especially important is a local endemic group of 13 plant species, found only on the mountains. There are also about 250 species of wild vertebrates. Although data is sparse for invertebrate species, about 200 species of butterflies and 500 species of aquatic macrobentos have been recorded. The richest areas with fauna are in Malet e Sharrit and Bjeshkët e Nemuna where it is estimated that there are 8 fish species, 13 terraqueos, 12 species of elusory, 180 bird species, 37 species of mammals and 147 butterfly species.
                              </p><br>
                            </div>
                            <br>
                            <hr class="hr-style">
                            <br>
                            <div class="row" id="bar-chart-div7" style="margin: auto;"></div>

                            <p class="p" style="font-size:13px; display:inline-block; margin-left:15%;">Source: <a
                                      href="https://ask.rks-gov.net/ENG/enviroment/publications/doc_download/990-some-facts-on-environment-2011">Some
                                      Some Facts on the Environment 2011</a>
                            </p>
                            <br><br>
                            <br>
                            <div class="row" style="padding: 0 13.2% 10px 16.2%;">
                              <h3 style="color:#000;">Land Use By Municipality</h3>
                              <p class="p" style="color:#000;">
                                As can be seen from the data, most land in Kosovo is split between agricultural land and forested land. The municipalities with largest amounts of forested land are Prishtinë/Priština, Leposaviç/Leposavić and Gjakovë/Đakovica. At the other end of the spectrum, the smaller (geographically) municipalities of Obiliq/Obilić and Fushë Kosovë/Kosovo Polje have little forested land and mainly consist of agricultural land.
                              </p><br>
                            </div>
                          </div>


                          <div class="chart-div" style="background-color: #1BB0E8;" id="internet-penetration-more">
                            <div class="row" id="line-chart-div14" style="margin: auto;"></div>

                            <p class="p" style="font-size:13px; display:inline-block; margin-left:15%;">Source: <a
                                      href="http://www.lr.undp.org/content/dam/kosovo/docs/Mozaik/Kosovo_Mosaic_2012_Eng_735317.pdf">Some
                                      Kosovo Mosaic 2012</a>
                            </p>
                            <br>
                            <p class="p" style="font-size:13px; display:inline-block; margin-left:15%;">* data for this year is extrapolated from other years</h6><br><br>
                            <br>
                            <div class="row" style="padding: 0 13.2% 10px 16.2%;">
                              <h3 style="color:#000;">Internet Penetration</h3>
                              <p class="p" style="color:#000;">
                                The steady increase in internet penetration is a positive trend for Kosovo. As recently as 2004, it is estimated that 6% of households had access to the Internet. By 2014, it was estimated that 84% of households had access to the internet.
                              </p><br>
                            </div>
                          </div>
                        </div>

                      </div>

         <div class="sidebar">

           <h3>The Millennium Development Goals</h3>
           <p class="p">At the Millennium Summit in September 2000, 189 member states of the United Nations (UN) and over 23 international organizations came together to adopt the Millennium Declaration. This Declaration included commitments to poverty eradication, social and economic development, and environmental protection. Many of these commitments drew from agreements and resolutions of world conferences and summits organized by the UN during the previous decade. One year later, the UN Secretary General’s Road Map for implementing the Millennium Declaration formally unveiled eight goals, supported by 18 quantified and time-bound targets and 48 indicators. These goals became known as the Millennium Development Goals (MDGs). The MDGs focused the efforts of the global community on achieving significant, measurable and multi-dimensional improvements in individuals’ lives by 2015. World leaders established targets and yardsticks for measuring results – not only for developing countries, but for developed countries to help fund development programs and for multilateral institutions to help countries implement them.
           </p>
         </div>
       </div>
     </div>
   </div>
 </div>
<?php get_footer(); ?>
