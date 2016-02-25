<?php /* Template Name: MDG Visializer */ ?>
<?php get_header(); ?>
<script src="<?php bloginfo('template_url'); ?>/js/jquery.min.js"></script>
<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/maps/modules/map.js"></script>
<script src="<?php bloginfo('template_url'); ?>/mdg-viz/data.js"></script>

<script src="<?php bloginfo('template_url'); ?>/mdg-viz/indicator_charts.js"></script>
<script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
<link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/bootstrap/css/bootstrap.min.css">
<style>
.mdg-header-title.row {
    border: solid 2px black;
    background-color: #5B92E5;
}
.mdg-text{
  border: solid 2px black;
  background-color: #fff;
  height:550px;
}
.mdg-anim{
  border: solid 2px black;
  background-color:#FFFF66;
  height:550px;
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
</style>
<script type="text/javascript"><!--//--><![CDATA[//><!--
  $(document).ready(function(){

    // $(".eradicate-extreme-poverty-and-hunger").toggle("fade in");
    eradicateExtremePovertyAndHungerSlider();

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
        console.log("Clicked show more");
        showMore(id);
        $(".mdg-show-more-btn").text("Show less");
      }else{
        $("#"+id+"-more").toggle("blind",{},500);
        // $(".chart-div").css("display","none");
        $(".mdg-show-more-btn").html("Show more");
        $('html,body').animate({
            scrollTop: $('.mdg-header-title').offset().top},
            'slow');
      }


    });
  });

  function addAnim(id){
    $(".mdg-anime").css("display","none");
    // $(".mdg-anime").removeClass('active-mdg');
    // $(".mdg-anime").addClass('not-active-mdg');
    // $("."+id).addClass('active-mdg');
    $("."+id).toggle("fade in");
    $('html,body').animate({
        scrollTop: $("."+id).offset().top},
        'slow');
  }

  function showMore(id){
    var chartDivId = id + "-more";
    $("#"+chartDivId).toggle("blind",{},500);
    $('html,body').animate({
        scrollTop: $("#"+chartDivId).offset().top},
        'slow');
  }
  function eradicateExtremePovertyAndHungerSlider(){
    $( ".mdg-sliders" ).slider({
      values: 2010,
      min: 2010,
      max:2014,
      slide: function( event, ui ) {
        $(".ui-slider-handle").html("<span class='slider-text'>"+ui.value+"</span>");
        if(ui.value==2010){
          $( ".mdg-slide-content" ).html( "<img src='<?php bloginfo('template_url'); ?>/mdg-viz/images/mdg-slider-1/mdg-1-1.png'/>" );
        }else if(ui.value==2011){
          $( ".mdg-slide-contentt" ).html( "<img src='<?php bloginfo('template_url'); ?>/mdg-viz/images/mdg-slider-1/mdg-1-2.png'/>" );
        }else if(ui.value==2012){
          $( ".mdg-slide-content" ).html( "<img src='<?php bloginfo('template_url'); ?>/mdg-viz/images/mdg-slider-1/mdg-1-3.png'/>" );
        }else if(ui.value==2013){
          $( ".mdg-slide-content" ).html( "<img src='<?php bloginfo('template_url'); ?>/mdg-viz/images/mdg-slider-1/mdg-1-4.png'/>" );
        }else if(ui.value==2014){
          $( ".mdg-slide-content" ).html( "<img src='<?php bloginfo('template_url'); ?>/mdg-viz/images/mdg-slider-1/mdg-1-5.png'/>" );
        }
      }
    });
    $(".ui-slider-handle").html("<span class='slider-text'>2010</span>")
    $( ".mdg-slide-content" ).html( "<img src='<?php bloginfo('template_url'); ?>/mdg-viz/images/mdg-slider-1/mdg-1-1.png'/>" );
  }
 //--><!]]>
 </script>

<div class="container-fluid">
	<div class="row">
		<div class="col-md-12">
      <div class="mdg-header-title row">
  			<h3>
  				Millenium Development Goals in Kosovo
  			</h3>
      </div>
			<div class="row">
        <div class="col-xs-12">
  				<div class="mdg-btn active" data-color="#FCDB32" id="eradicate-extreme-poverty-and-hunger" style="width:12.5%;float:left;">
  					<img alt="MDG 1" src="<?php bloginfo('template_url'); ?>/logos/1.jpg" />
  				</div>
  				<div class="mdg-btn" data-color="#D6DD3A" id="achieve-universal-primary-education" style="width:12.5%;float:left;">
  				<img alt="MDG 2" src="<?php bloginfo('template_url'); ?>/logos/2.jpg" />
  				</div>
  				<div class="mdg-btn" data-color="#F3941D" id="promote-gender-equality-and-empower-women" style="width:12.5%;float:left;">
  					<img alt="MDG 3" src="<?php bloginfo('template_url'); ?>/logos/3.jpg" />
  				</div>
  				<div class="mdg-btn" data-color="#C7EBFC" id="reduce-child-mortality" style="width:12.5%;float:left;">
  					<img alt="MDG 4" src="<?php bloginfo('template_url'); ?>/logos/4.jpg" />
  				</div>
  				<div class="mdg-btn" data-color="#F6C2DA" id="improve-maternal-health" style="width:12.5%;float:left;">
  					<img alt="MDG 5" src="<?php bloginfo('template_url'); ?>/logos/5.jpg" />
  				</div>
  			  <div class="mdg-btn" data-color="#EE5B45" id="combat-hiv-aids-malria-and-other-desease" style="width:12.5%;float:left;">
  				 <img alt="MDG 6" src="<?php bloginfo('template_url'); ?>/logos/6.jpg" />
  				</div>
          <div class="mdg-btn" data-color="#8CC449" id="ensure-environmental-sustainability" style="width:12.5%;float:left;">
  				<img alt="MDG 7" src="<?php bloginfo('template_url'); ?>/logos/7.jpg" />
  				</div>
          <div class="mdg-btn" data-color="#29B1E6" id="global-partnership-for-development" style="width:12.5%;float:left;">
  					<img alt="MDG 8" src="<?php bloginfo('template_url'); ?>/logos/8.jpg" />
  				</div>
        </div>
			</div>
			<div class="row">
        <div class="mdg-anime eradicate-extreme-poverty-and-hunger">
          <h2>
            Eradicate Extreme Poverty and Hunger
          </h2>
          <div class="mdg-text col-xs-5">

            <p>
            Eradicate Extreme Poverty and Hunger   Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui.
            </p>
            <p>
            Eradicate Extreme Poverty and Hunger   Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui.
            </p>
            <p>
            Eradicate Extreme Poverty and Hunger   Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui.
            </p>
            <p>
            Eradicate Extreme Poverty and Hunger   Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui.
            </p>

          </div>

          <div class="mdg-anim col-xs-7">
            <h1 class="mdg-slider-title">Description/title of the MDG slider</h1>
            <div class="row">
              <div class="col-xs-8">
                <div class="mdg-slide-content" id="slide-content"></div>

                <div class="mdg-sliders" id="eradicate-extreme-poverty-and-hunger-slider"></div>
              </div>
              <div class="col-xs-4">
                <h1 class="mdg-slider-numeric-values">18 % </h1>
              </div>
            </div>

            <button type="button" class="mdg-show-more-btn btn btn-warning btn-default">
  						Show more
  					</button>
          </div>
        </div>
        <div class="mdg-anime achieve-universal-primary-education">
          <h2>
            Achieve Universal Primary Education
          </h2>
  				<div class="mdg-text col-xs-5">

  					<p>
  						Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui.
  					</p>
            <p>
  						Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui.
  					</p>
            <p>
  						Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui.
  					</p>
            <p>
  						Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui.
  					</p>

  				</div>

  				<div class="mdg-anim col-xs-7">
            <div class="mdg-slide-content" id="slide-content"></div>

            <div class="mdg-sliders" id="achieve-universal-primary-education-slider"></div>
            <button type="button" class="mdg-show-more-btn btn btn-warning btn-default">
  						Show more
  					</button>
  				</div>
        </div>
        <div class="mdg-anime promote-gender-equality-and-empower-women">
          <h2>
            Promote gender equality and empower women
          </h2>
          <div class="mdg-text col-xs-5">

            <p>
            Eradicate Extreme Poverty and Hunger   Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui.
            </p>
            <p>
            Eradicate Extreme Poverty and Hunger   Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui.
            </p>
            <p>
            Eradicate Extreme Poverty and Hunger   Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui.
            </p>
            <p>
            Eradicate Extreme Poverty and Hunger   Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui.
            </p>

          </div>

          <div class="mdg-anim col-xs-7">
            <div class="mdg-slide-content" id="slide-content"></div>

            <div class="mdg-sliders" id="promote-gender-equality-and-empower-women-slider"></div>
            <button type="button" class="mdg-show-more-btn btn btn-warning btn-default">
  						Show more
  					</button>
          </div>
        </div>
        <div class="mdg-anime reduce-child-mortality">
          <h2>
            Reduce child mortality
          </h2>
          <div class="mdg-text col-xs-5">

            <p>
            Reduce child mortality   Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui.
            </p>
            <p>
            Reduce child mortality   Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui.
            </p>
            <p>
            Reduce child mortality   Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui.
            </p>
            <p>
            Reduce child mortality   Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui.
            </p>

          </div>

          <div class="mdg-anim col-xs-7">
            <div class="mdg-slide-content" id="slide-content"></div>

            <div class="mdg-sliders" id="reduce-child-mortality-slider"></div>
            <button type="button" class="mdg-show-more-btn btn btn-warning btn-default">
  						Show more
  					</button>
          </div>
        </div>
        <div class="mdg-anime improve-maternal-health">
          <h2>
            Improve maternal health
          </h2>
          <div class="mdg-text col-xs-5">

            <p>
            Improve maternal health   Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui.
            </p>
            <p>
            Improve maternal health   Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui.
            </p>
            <p>
            Improve maternal health   Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui.
            </p>
            <p>
            Improve maternal health   Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui.
            </p>

          </div>

          <div class="mdg-anim col-xs-7">
            <div class="mdg-slide-content" id="slide-content"></div>

            <div class="mdg-sliders" id="improve-maternal-health-slider"></div>
            <button type="button" class="mdg-show-more-btn btn btn-warning btn-default">
  						Show more
  					</button>
          </div>
        </div>
        <div class="mdg-anime combat-hiv-aids-malria-and-other-desease">
          <h2>
            Combat hiv aids, malria and other desease
          </h2>
          <div class="mdg-text col-xs-5">

            <p>
            Combat hiv aids, malria and other desease   Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui.
            </p>
            <p>
            Combat hiv aids, malria and other desease   Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui.
            </p>
            <p>
            Combat hiv aids, malria and other desease   Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui.
            </p>
            <p>
            Combat hiv aids, malria and other desease   Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui.
            </p>

          </div>

          <div class="mdg-anim col-xs-7">
            <div class="mdg-slide-content" id="slide-content"></div>

            <div class="mdg-sliders" id="combat-hiv-aids-malria-and-other-desease-slider"></div>
            <button type="button" class="mdg-show-more-btn btn btn-warning btn-default">
  						Show more
  					</button>
          </div>
        </div>
        <div class="mdg-anime ensure-environmental-sustainability">
          <h2>
            Ensure environmental sustainability
          </h2>
          <div class="mdg-text col-xs-5">

            <p>
            Ensure environmental sustainability   Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui.
            </p>
            <p>
            Ensure environmental sustainability   Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui.
            </p>
            <p>
            Ensure environmental sustainability   Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui.
            </p>
            <p>
            Ensure environmental sustainability   Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui.
            </p>

          </div>

          <div class="mdg-anim col-xs-7">
            <div class="mdg-slide-content" id="slide-content"></div>

            <div class="mdg-sliders" id="ensure-environmental-sustainability-slider"></div>
            <button type="button" class="mdg-show-more-btn btn btn-warning btn-default">
  						Show more
  					</button>
          </div>
        </div>
        <div class="mdg-anime global-partnership-for-development">
          <h2>
            Global partnership for development
          </h2>
          <div class="mdg-text col-xs-5">

            <p>
            Global partnership for development   Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui.
            </p>
            <p>
            Global partnership for development  Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui.
            </p>
            <p>
            Global partnership for development   Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui.
            </p>
            <p>
            Global partnership for development   Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui.
            </p>

          </div>

          <div class="mdg-anim col-xs-7">
            <div class="mdg-slide-content" id="slide-content"></div>

            <div class="mdg-sliders" id="global-partnership-for-development-slider"></div>

  					<button type="button" class="mdg-show-more-btn btn btn-warning btn-default">
  						Show more
  					</button>
          </div>
        </div>

			</div>
			<!-- <div class="mdg-show-more row">
				<div class="col-md-6">
				</div>
				<div class="col-md-6">

					<button type="button" class="mdg-show-more-btn btn btn-warning btn-default">
						Show more
					</button>
				</div>
			</div> -->
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

			<div class="row">
				<div class="mdg-about col-md-12">
					<div class="row">
						<div class="footer-col col-md-4">
							<h2>
								About
							</h2>
							<p>
The eight Millennium Development Goals (MDGs) – which range from halving extreme poverty rates to halting the spread of HIV/AIDS and providing universal primary education, all by the target date of 2015 – form a blueprint agreed to by all the world’s countries and all the world’s leading development institutions. They have galvanized unprecedented efforts to meet the needs of the world’s poorest. The UN is also working with governments, civil society and other partners to build on the momentum generated by the MDGs and carry on with an ambitious <a href="http://www.un.org/sustainabledevelopment">post-2015 development agenda</a>.
            </p>

						</div>
            <div class="footer-col col-md-4">
                <br>
                <h4>Follow us</h4>
                <!-- Twitter -->
                <a href="https://twitter.com/UNKosovoTeam" data-toggle="tooltip" title="Twitter" target="_blank" class="share-btn twitter">
                    <i class="fa fa-twitter"></i>
                </a>

                <!-- Facebook -->
                <a href="https://www.facebook.com/UNKosovoTeam/" data-toggle="tooltip" title="Facebook" target="_blank" class="share-btn facebook">
                    <i class="fa fa-facebook"></i>
                </a>

                <!-- Page -->
                <a href="http://www.unkt.org" data-toggle="tooltip" title="UN Kosovo Team" target="_blank" class="share-btn home">
                    <i class="fa fa-home"></i>
                </a>
                <br><br>
            </div>
            <div class="footer-col col-md-4">
              <?php echo(exec("whoami")); ?>
            </div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<?php get_footer(); ?>
