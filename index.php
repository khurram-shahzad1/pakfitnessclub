<?php include('includes/header.php');
?>
<style>

@import url('https://fonts.googleapis.com/css2?family=Roboto+Condensed:ital,wght@1,300&display=swap');


*
{
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    user-select: none;    
}
body{
    background: #1d1d1d;  
}

  .hvr-wobble-bottom {
    display: inline-block;
    vertical-align: middle;
    -webkit-transform: perspective(1px) translateZ(0);
    transform: perspective(1px) translateZ(0);
    -webkit-transform-origin: 100% 0;
    transform-origin: 100% 0;
  }
  
  .hvr-wobble-bottom:hover, .hvr-wobble-bottom:focus, .hvr-wobble-bottom:active {
    -webkit-animation-name: hvr-wobble-bottom;
    animation-name: hvr-wobble-bottom;
    -webkit-animation-duration: 1s;
    animation-duration: 1s;
    -webkit-animation-timing-function: ease-in-out;
    animation-timing-function: ease-in-out;
    -webkit-animation-iteration-count: 1;
  }
  .oppertunity
  {
    width: 100%;
    height:200px;
    background:#ec3642;
    clip-path: polygon(0% 0%, 100% 0%, 100% 75%, 55% 76%, 49% 100%, 43% 76%, 0% 75%);
    color: #1d1d1d;
    font-family: 'Roboto Condensed', sans-serif;
  }
  .oppertunity h1
  {
      text-align: center;
      letter-spacing: 2px;
      color: #f1f1f1;
  }
  @media(max-width:567px)
  {

      .oppertunity h1
      {
         font-size: 25px;
      }
  }
.banner
{
    position: relative;
    width: 100%;
    min-height: 100vh;
    padding: 0 50px;
    background: #111;
    display: flex;
    justify-content: flex-start;
    align-items: center;
}
.banner:before
{
    content: '';
    position: absolute;
    right: 0;
    top: 0;
    width: 400px;
    height: 100%;
    background: #ec3642;
    transform-origin: top;
    transform: skewX(-25deg);
    z-index: 1;
}
.banner video
{
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    object-fit: cover;
    opacity: 0.15;
    pointer-events: none;
}
.banner .textbox
{
    position: relative;
    max-width: 600px;
    z-index: 2;
}
.banner .textbox h2
{
    color: #fff;
    font-size: 4em;
    font-family: 'Roboto Condensed', sans-serif;
}
.banner .textbox p
{
    color: #fff;
    font-size: 1.2em;
    line-height: 25px;
    letter-spacing: 2px;
    font-family:'Roboto Condensed', sans-serif;;
} 
.banner .textbox a
{
    position: relative;
    display: inline-block;
    background: #fff;
    color: #111;
    padding: 15px 25px;
    text-decoration: none;
    font-size: 1.1em;
    text-transform: uppercase;
    letter-spacing: 1px;
    font-weight: 500;
    font-family: 'Roboto Condensed', sans-serif;
}
.banner .textbox .SignIn:hover{
  color: #ec3642;
}
.banner .textbox .SignIn
{
    position: relative;
    display: inline-block;
    background: #ec3642;
    color: white;
    padding: 15px 25px;
    text-decoration: none;
    font-size: 1.1em;
    text-transform: uppercase;
    letter-spacing: 1px;
    font-weight: 500;
}
.banner .textbox .SignUp:hover{
  color: #ec3642;
}
.banner .textbox .SignUp
{
    position: relative;
    display: inline-block;
    background: #ec3642;
    color: white;
    padding: 15px 25px;
    text-decoration: none;
    font-size: 1.1em;
    text-transform: uppercase;
    letter-spacing: 1px;
    font-weight: 500;
}
.banner .textbox a:hover
{
    color: white;
}
.banner .imgbox
{
    position: relative;
    height: auto;
    display: flex;
    justify-content: center;
    align-items: center;
    width: 100%;
    z-index: 2;
}
.banner .imgbox .img
{
    bottom: 0;
    width: 100%;
    height: 100%;
    z-index: 10000;
}
.hvr-bounce-to-top {
    display: inline-block;
    vertical-align: middle;
    -webkit-transform: perspective(1px) translateZ(0);
    transform: perspective(1px) translateZ(0);
    box-shadow: 0 0 1px rgba(0, 0, 0, 0);
    position: relative;
    -webkit-transition-property: color;
    transition-property: color;
    -webkit-transition-duration: 0.5s;
    transition-duration: 0.5s;
  }
  .hvr-bounce-to-top:before {
    content: "";
    position: absolute;
    z-index: -1;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: #ec3642;
    color: #fff;
    -webkit-transform: scaleY(0);
    transform: scaleY(0);
    -webkit-transform-origin: 50% 100%;
    transform-origin: 50% 100%;
    -webkit-transition-property: transform;
    transition-property: transform;
    -webkit-transition-duration: 0.5s;
    transition-duration: 0.5s;
    -webkit-transition-timing-function: ease-out;
    transition-timing-function: ease-out;
  }
  .hvr-bounce-to-top:hover, 
  .hvr-bounce-to-top:focus, 
  .hvr-bounce-to-top:active 
  {
    color: #fff;
  }
  .hvr-bounce-to-top:hover:before,
  .hvr-bounce-to-top:focus:before, 
  .hvr-bounce-to-top:active:before 
  {
    -webkit-transform: scaleY(1);
    transform: scaleY(1);
    -webkit-transition-timing-function: cubic-bezier(0.52, 1.64, 0.37, 0.66);
    transition-timing-function: cubic-bezier(0.52, 1.64, 0.37, 0.66);
  }
  .hvr-bounce-to-top1 {
    display: inline-block;
    vertical-align: middle;
    -webkit-transform: perspective(1px) translateZ(0);
    transform: perspective(1px) translateZ(0);
    box-shadow: 0 0 1px rgba(0, 0, 0, 0);
    position: relative;
    -webkit-transition-property: color;
    transition-property: color;
    -webkit-transition-duration: 0.5s;
    transition-duration: 0.5s;
  }
  .hvr-bounce-to-top1:before {
    content: "";
    position: absolute;
    z-index: -1;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: white;
    color: #ec3642;
    -webkit-transform: scaleY(0);
    transform: scaleY(0);
    -webkit-transform-origin: 50% 100%;
    transform-origin: 50% 100%;
    -webkit-transition-property: transform;
    transition-property: transform;
    -webkit-transition-duration: 0.5s;
    transition-duration: 0.5s;
    -webkit-transition-timing-function: ease-out;
    transition-timing-function: ease-out;
  }
  .hvr-bounce-to-top1:hover, 
  .hvr-bounce-to-top1:focus, 
  .hvr-bounce-to-top1:active 
  {
    color: #1d1d1d;
  }
  .hvr-bounce-to-top1:hover:before,
  .hvr-bounce-to-top1:focus:before, 
  .hvr-bounce-to-top1:active:before 
  {
    -webkit-transform: scaleY(1);
    transform: scaleY(1);
    -webkit-transition-timing-function: cubic-bezier(0.52, 1.64, 0.37, 0.66);
    transition-timing-function: cubic-bezier(0.52, 1.64, 0.37, 0.66);
  }
  .join_img img{
      width:60%;
      height:aut;

  }
@media(max-width: 991px)
{
    .banner
    {
        flex-direction: column;
        overflow: hidden;
    }
    .banner:before
    {
        width: 300px;
        transform: skewX(-15deg) translateX(50%);
    }
    .banner .textbox
    {
        position: relative;
        max-width: 100%;
        z-index: 2;
    }
}
.cross_fit h1
{
    letter-spacing: 5px;
    font-size: 35px;
    color: #979696;
}
.cross_fit span
{
 color: #ec3642;
}
@media(max-width:567px)
{
    .cross_fit h1
    {
        font-size: 25px;
        margin-top: 0;
        
    }
}
.card
{
    background: #383737;
        color: white;
        border-left: 5px solid #ec3642;
    clip-path: polygon(51% 12%, 100% 0, 100% 100%, 0 100%, 0 0);
    
}

.card_side_head {
        width: 100%;
        height: 1000px;
        position: absolute;
        left: 0;
        top: 1300px;
        z-index: -1;
        background-color: #b642334b;
        clip-path: polygon(58% 1%, 0% 20%, 0 50%, 0% 80%, 0 97%, 0 98%, 35% 64%, 100% 0, 0 67%, 23% 49%, 80% 0%, 0 42%);
    }
   @media(max-width: 567px)
   {
    .card_side_head
    {
        clip-path: none;
        display: none;
    }
   }
    .card .card_btn a
    {
        border: 1px solid white;
        color: white;
        padding: 15px;
    }
    .card .card_btn a:hover{
      color: #ec3642;
    }
.hvr-shutter-out-horizontal {
  display: inline-block;
  vertical-align: middle;
  -webkit-transform: perspective(1px) translateZ(0);
  transform: perspective(1px) translateZ(0);
  box-shadow: 0 0 1px rgba(0, 0, 0, 0);
  position: relative;
  -webkit-transition-property: color;
  transition-property: color;
  -webkit-transition-duration: 0.3s;
  transition-duration: 0.3s;
}
.hvr-shutter-out-horizontal:before {
  content: "";
  position: absolute;
  z-index: -1;
  top: 0;
  bottom: 0;
  left: 0;
  right: 0;
  background: #ffffff;
  -webkit-transform: scaleX(0);
  transform: scaleX(0);
  -webkit-transform-origin: 50%;
  transform-origin: 50%;
  -webkit-transition-property: transform;
  transition-property: transform;
  -webkit-transition-duration: 0.3s;
  transition-duration: 0.3s;
  -webkit-transition-timing-function: ease-out;
  transition-timing-function: ease-out;
}
.hvr-shutter-out-horizontal:hover, .hvr-shutter-out-horizontal:focus, .hvr-shutter-out-horizontal:active {
  color: white;
}
.hvr-shutter-out-horizontal:hover:before, .hvr-shutter-out-horizontal:focus:before, .hvr-shutter-out-horizontal:active:before {
  -webkit-transform: scaleX(1);
  transform: scaleX(1);
}
    /* card Button end */
.hvr-sweep-to-right {
        display: inline-block;
        vertical-align: middle;
        -webkit-transform: perspective(1px) translateZ(0);
        transform: perspective(1px) translateZ(0);
        box-shadow: 0 0 1px rgba(0, 0, 0, 0);
        position: relative;
        -webkit-transition-property: color;
        transition-property: color;
        -webkit-transition-duration: 0.3s;
        transition-duration: 0.3s;
    }

    .hvr-sweep-to-right:before {
        content: "";
        position: absolute;
        z-index: -1;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: #ec3642;
        -webkit-transform: scaleX(0);
        transform: scaleX(0);
        -webkit-transform-origin: 0 50%;
        transform-origin: 0 50%;
        -webkit-transition-property: transform;
        transition-property: transform;
        -webkit-transition-duration: 0.3s;
        transition-duration: 0.3s;
        -webkit-transition-timing-function: ease-out;
        transition-timing-function: ease-out;
    }

    .hvr-sweep-to-right:hover,
    .hvr-sweep-to-right:focus,
    .hvr-sweep-to-right:active {
        color: white;
    }

    .hvr-sweep-to-right:hover:before,
    .hvr-sweep-to-right:focus:before,
    .hvr-sweep-to-right:active:before {
        -webkit-transform: scaleX(1);
        transform: scaleX(1);
    }
.learn_hero
{
    background-image: url("assets/imgs/lifting-weights.jpg");
    background-attachment: fixed;
    background-repeat: no-repeat;
    background-size: cover;
    height: auto;
    width: 100%;
    

}
.learn_hero .learning_head h1
{
    font-family: 'Roboto Condensed', sans-serif;

letter-spacing: 2px;
font-size: 65px;
color: #ec3642;
    
}
.learn_hero .learning_content p{
    font-size: 20px;
    color: #d3cccc;
    font-family: 'Roboto Condensed', sans-serif;
}

.learn_hero .learning_btn a{
    border:2px solid #ec3642;
    padding: 20px;
    font-size: 17px;
    color: #ec3642;

}
.learn_hero .learning_btn a:hover{
color: aliceblue;
}

@media(max-width: 567px)
{
    .learn_hero .learning_head h1
    {
        font-family: 'Roboto Condensed', sans-serif;
letter-spacing: 2px;
font-size: 40px;
color: #ec3642;
    }
    .learn_hero .learning_content p{
        font-family: 'Roboto Condensed', sans-serif;
    font-size: 15px;
    color: rgb(211, 204, 204);
}
}
.container-fluid .junior_program_img img{
    opacity: 0.5;
    -webkit-box-shadow: 1px 4px 15px 5px rgba(0, 0, 0, 0.73);
        box-shadow: 1px 4px 15px 5px rgba(0, 0, 0, 0.73);
        z-index: -1;
}
.container-fluid .junior_program_head span
{
    font-family: 'Roboto Condensed', sans-serif;
    letter-spacing: 1px;
    color: #ec3642;
}
.container-fluid .junior_program_head h1{
   
    font-family: 'Roboto Condensed', sans-serif;
    letter-spacing: 1px;
    color: #979696;
}
.container-fluid .junior_program_small small
{
    font-size: 20px;
    color: #f3f1f1;

}
.container-fluid .junior_program_content p 
{
    font-size: 17px;
    font-family: 'Roboto Condensed', sans-serif;
    color: #979696;
}
.container-fluid .junior_program_btn a
{
    border: 2px solid #ec3642;
    color: #f3f1f1;
    padding: 10px;
}
.plan_svg
{
    background: rgb(214, 29, 29);
}
.container-fluid .join_head h1
{
    font-family: 'Roboto Condensed', sans-serif;
  font-size: 60px;
  font-weight: bold;
  color: #ec3642;
}
.container-fluid .join_btn a
{
  font-size: 25px;
  
}
.container-fluid .join_btn a:hover
{
  
}

.container .join_hero
{
  width: 80%;
  margin: auto;
  height: 500px;
  background-color: #b642334b;
  position: absolute;
  top: 5000px;
  right: px;
  z-index: -1;
  /* clip-path: polygon(25% 0, 100% 20%, 75% 100%, 25% 100%); */
  clip-path: polygon(23% 20%, 100% 20%, 75% 100%, 21% 100%);
}
.container-fluid .join_contect p
{
  font-size: 25px;
  font-family: 'Roboto Condensed', sans-serif;
  color: #7e7e7e;
}
@media (max-width:567px)
{
  .container-fluid .join_head h1
  {
    font-size: 30px;
    font-family: 'Roboto Condensed', sans-serif;
  }
  .container-fluid .join_btn a
  {
    font-size: 17px;
  }
.container .join_hero
{
  display: none;
}
.container-fluid .join_contect p
{
  font-size: 17px;

}

}
.card_head
{
    font-family: 'Roboto Condensed', sans-serif;
    
}
.card_content
{
    font-family: 'Roboto Condensed', sans-serif;

}
marquee strong{
    font-size: 18px;
    font-weight: bold;
}
marquee{
    position: absolute; 
    top:10px;
     width: 70%;
      margin:auto;
       font-size:15px; 
       color:white;
}
</style> 
    
<div class="banner">
<div >
<marquee behavior="scroll" direction="stop" scrollamount="10"> <strong>PFC!! </strong> “The last three or four reps is what makes the muscle grow. This area of pain divides a champion from someone who is not a champion.”- <strong>Arnold Schwarzenegger</strong></marquee>

</div>

        <video src="assets/imgs/vdeo.mp4" autoplay muted loop type="mp4"></video>
        <div class="textbox " style="margin-top: 100px;">
            <h2 class="text-flicker-in-glow">More Then Fitness</h2>
            <p class="mt-5">
                Lorem ipsum dolor sit, amet consectetur adipisicing elit. Id praesentium qui dolore ex et fugit optio
                exercitationem, eum, tenetur illo cumque illum ipsa sit dolores odio facere harum! Sunt amet porro eaque
                delectus enim placeat expedita aut magni necessitatibus beatae consectetur, obcaecati, voluptatum
                commodi officia dolorum minima. Architecto, voluptatibus labore?
            </p>
            <a href="#" class="hvr-bounce-to-top mt-5  ">Read More</a>
          
        </div>
        <div class="imgbox text-flicker-in-glow" style="margin-top: 100px; height:700px; width:100%; -webkit-transform: scaleX(-1);
  transform: scaleX(-1);">
            <img class="img" src="assets/imgs/man.png" alt="">
        </div>
    </div>
    <div class="oppertunity ">
        <div class="row w-100 m-auto">
            <div class="col-lg-12 mt-5" style="">
                <h1>
                    Capture The oppertunity
                   
                </h1>
                <div class="row">

                </div>

            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-md-4 col-sm-4">
                <div class="booking_trainder">

                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-4"></div>
            <div class="col-lg-4 col-md-4 col-sm-4"></div>
        </div>
    </div>
    <div class="container mt-5 cross_fit">
        <div class="row mt-5">
            <div class="col-lg-12" align="center">
                <h1> <span>Crossfit</span>  Exercises</h1>
            </div>
        </div>
    </div>
    <hr class="w-25 m-auto text-dark ">

    <div class="container crossfit_card mt-5">
        <div class="row mt-5">
            <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 mt-5 " data-aos="fade-down-right">
                <div class="card p-5 hvr-sweep-to-right">
                    <div class="card_img p-5" align="center">
                        <img src="assets/imgs/weight-lifting.png" class="img-fluid" width="100" height="100" alt="">
                    </div>
                    <div class="card_head" align="center">
                        <h3>weight-lifting</h3>
                    </div>
                    <div class="card_content mt-5" align="center">
                        <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Quod at quibusdam adipisci, minus
                            provident explicabo voluptatem vel porro quos veritatis alias perferendis ab quaerat ex
                            similique suscipit est quae iusto.</p>
                    </div>
                    <div class="card_btn" align="center">
                        <a href="" class="btn mt-5 hvr-shutter-out-horizontal">Read More</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 mt-5" data-aos="zoom-in">
                <div class="card p-5 hvr-sweep-to-right">
                    <div class="card_img p-5" align="center">
                        <img src="assets/imgs/spinning-50.png" class="img-fluid" width="100" height="100" alt="">
                    </div>
                    <div class="card_head" align="center">
                        <h3>Spinning</h3>
                    </div>
                    <div class="card_content mt-5" align="center">
                        <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Quod at quibusdam adipisci, minus
                            provident explicabo voluptatem vel porro quos veritatis alias perferendis ab quaerat ex
                            similique suscipit est quae iusto.</p>
                    </div>
                    <div class="card_btn mt-5" align="center">
                        <a href="" class="btn hvr-shutter-out-horizontal">Read More</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 mt-5" data-aos="fade-down-left">
                <div class="card p-5 hvr-sweep-to-right">
                    <div class="card_img p-5" align="center">
                        <img src="assets/imgs/pilates-50.png" class="img-fluid" width="100" height="100" alt="">
                    </div>
                    <div class="card_head" align="center">
                        <h3>Pilates Fitness</h3>
                    </div>
                    <div class="card_content mt-5" align="center">
                        <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Quod at quibusdam adipisci, minus
                            provident explicabo voluptatem vel porro quos veritatis alias perferendis ab quaerat ex
                            similique suscipit est quae iusto.</p>
                    </div>
                    <div class="card_btn" align="center">
                        <a href="" class="btn mt-5 hvr-shutter-out-horizontal">Read More</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mt-5">
            <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 mt-5" data-aos="fade-down-right">
                <div class="card p-5 hvr-sweep-to-right">
                    <div class="card_img p-5" align="center">
                        <img src="assets/imgs/pullups-50.png" class="img-fluid" width="100" height="100" alt="">
                    </div>
                    <div class="card_head" align="center">
                        <h3>Pullups</h3>
                    </div>
                    <div class="card_content mt-5" align="center">
                        <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Quod at quibusdam adipisci, minus
                            provident explicabo voluptatem vel porro quos veritatis alias perferendis ab quaerat ex
                            similique suscipit est quae iusto.</p>
                    </div>
                    <div class="card_btn" align="center">
                        <a href="" class="btn mt-5 hvr-shutter-out-horizontal">Read More</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 mt-5" data-aos="zoom-in">
                <div class="card p-5 hvr-sweep-to-right">
                    <div class="card_img p-5" align="center">
                        <img src="assets/imgs/pushups-50.png" class="img-fluid" width="100" height="100" alt="">
                    </div>
                    <div class="card_head" align="center">
                        <h3>Push-Up</h3>
                    </div>
                    <div class="card_content mt-5" align="center">
                        <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Quod at quibusdam adipisci, minus
                            provident explicabo voluptatem vel porro quos veritatis alias perferendis ab quaerat ex
                            similique suscipit est quae iusto.</p>
                    </div>
                    <div class="card_btn " align="center">
                        <a href="" class="btn mt-5 hvr-shutter-out-horizontal">Read More</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 mt-5" data-aos="fade-down-left">
                <div class="card p-5 hvr-sweep-to-right">
                    <div class="card_img p-5" align="center">
                        <img src="assets/imgs/icons8-prenatal-yoga-50.png" class="img-fluid" width="100" height="100" alt="">
                    </div>
                    <div class="card_head" align="center">
                        <h3>Prenatal Yoga</h3>
                    </div>
                    <div class="card_content mt-5" align="center">
                        <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Quod at quibusdam adipisci, minus
                            provident explicabo voluptatem vel porro quos veritatis alias perferendis ab quaerat ex
                            similique suscipit est quae iusto.</p>
                    </div>
                    <div class="card_btn" align="center">
                        <a href="" class="btn mt-5 hvr-shutter-out-horizontal">Read More</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container card_side_head "></div>
    <div class="container-fluid learn_hero mt-5">
        <div class="row w-75 m-auto">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 mt-5">
                <div class="learning_head mt-5" align="center" data-aos="fade-up">
                    <h1>LEARN TO MOVE WELL AND LIVE WEL!</h1>
                </div>
            </div>
        </div>
        <div class="row w-75 m-auto ">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 ">
                <div class="learning_content " align="center" data-aos="fade-up">
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Nisi cum voluptate reprehenderit, fugit
                        laudantium error debitis repellat alias perspiciatis cupiditate repudiandae harum soluta eum
                        similique impedit, totam veniam rerum enim?</p>
                </div>
            </div>
        </div>
        <div class="row w-75 m-auto ">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 ">
                <div class="learning_btn mt-5 mb-5 " align="center">
                    <a href="" class="btn mb-5 hvr-bounce-to-top">More Program</a>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid w-100 m-auto">
        <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 ">
                <div class="junior_program_img" data-aos="zoom-in">
                    <img src="assets/imgs/junior_program.jpg" class="img-fluid" alt="">
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 p-5" data-aos="zoom-in">
                <div class="junior_program_head mt-5 " align="center">
                    <h1> <span>Junior</span> Program</h1>
                </div>
                <div class="junior_program_small w-75 m-auto" align="center">
                    <small> Express (2 weeks), Smart (3 months),
                        Normal (6 months)</small>
                </div>
                <div class="junior_program_content p-4 ml-5 mr-5" align="center">
                    <p align="center">I offer programs for all ages, not
                        just adults. My staff of trained professionals did their research to gather technology to
                        create this amazing set of junior programs.</p>
                </div>
                <div class="junior_program_btn" align="center">
                    <a href="#" class="btn mt-4 hvr-bounce-to-top">More Program</a>
                </div>
            </div>
        </div>
        <div class="row mt-5">
            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 p-5" data-aos="zoom-in">
                <div class="junior_program_head mt-5" align="center">
                    <h1> <span>ADULT</span> Program</h1>
                </div>
                <div class="junior_program_small w-75 m-auto" align="center">
                    <small> Express (2 weeks), Smart (3 months),
                        Normal (6 months)</small>
                </div>
                <div class="junior_program_content p-4 ml-5 mr-5 " align="center">
                    <p align="center">These programs will help you get lean and sculpted. My exercise plan will speed
                        your metabolism and help you slim down. These explosive programs require almost no equipment.
                    </p>
                </div>
                <div class="junior_program_btn" align="center">
                    <a href="#" class="btn mt-4 hvr-bounce-to-top">More Program</a>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 ">
                <div class="junior_program_img" data-aos="zoom-in">
                    <img src="assets/imgs/adult_program.jpg" class="img-fluid" alt="">
                </div>
            </div>
        </div>
        <div class="row mt-5 ">
            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 ">
                <div class="junior_program_img" data-aos="zoom-in">
                    <img src="assets/imgs/workshop.jpg" class="img-fluid" alt="">
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 p-5 " data-aos="zoom-in">
                <div class="junior_program_head mt-5 " align="center">
                    <h1> <span>WORK</span> Program</h1>
                </div>
                <div class="junior_program_small w-75 m-auto" align="center">
                    <small> Save time by taking part
                        in my CrossFit workshops</small>
                </div>
                <div class="junior_program_content p-4 ml-5 mr-5 " align="center">
                    <p align="center">CrossFit Workshops include the most comprehensive range of state of the art,
                        ergonomically correct strength and cardio equipment as well as training instructions available
                        at the best possible prices.</p>
                </div>
                <div class="junior_program_btn" align="center">
                    <a href="#" class="btn mt-4 hvr-bounce-to-top">More Program</a>
                </div>
            </div>
        </div>
    </div>
   <div class="plan_svg">
   </div>
    <div class="container-fluid " style="background-color: ;">
        <div class="row mt-5" >
            <div class="col-lg-7 col-md-7 col-sm-12 col-xs-12 p-5" data-aos="zoom-in">
                <div class="join_head mt-5 p-5" align="center">
                    <h1  >PFC IS FOR EVERYONE</h1>
                </div>
               
                <div class="join_contect p-4 ml-5 mr-5 " align="center"style="border-right: 2px solid white; " >
                    <p align="center" >Lorem ipsum dolor sit amet consectetur adipisicing elit. Eveniet enim molestias numquam, at harum veniam suscipit necessitatibus deleniti excepturi ipsa commodi, itaque facilis nobis id placeat magni, consequuntur quod dolore?
                    </p>
                </div>
                <div class="junior_program_btn join_btn" align="center">
                    <a href="#" class="btn mt-5 hvr-bounce-to-top">Join Now</a>
                </div>
            </div>
            <div class="col-lg-5 col-md-5 mt-5 col-sm-12 col-xs-12 ">
                <div class="join_img mt-5 " data-aos="zoom-in">
                    <img src="assets/imgs/banner12.png" height="300px" class="img-fluid" alt="">
               

                </div>
            </div>
        </div> 
    </div> 
    
    <div class="mb-5 mt-5" style="height: 1px; width:100%; background-color:gray">  </div>  
    <div class="container ">
        <div class="join_hero"></div>
    </div>

  


    <!-- footer start -->

    <!-- footer end -->

    <!-- AOS start-->
    <script type="text/javascript">
        AOS.init({
            duration: 1500,
        });
    </script>
    <!-- AOS end -->
    <script>
        function openNav() {
            document.getElementById("mySidenav").style.width = "300px";
        }

        function closeNav() {
            document.getElementById("mySidenav").style.width = "0";
        }
    </script>
    <!-- bootstrap min js -->
    <script src="js/bootstrap.min.js"></script>
    <!-- jqeury min js -->
    <script src="js/jquery.min.js"></script>
    <!-- popper -->
    <script src="js/popper.min.js"></script>
    <!-- Plugins JS -->
<script src="assets/js/plugins.js"></script>
<!-- <script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script> -->
<!-- Main JS -->
<script src="assets/js/main.js"></script>
    <?php include('includes/footer.php');
?>