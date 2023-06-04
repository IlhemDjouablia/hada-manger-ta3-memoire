<?php 
session_start();
include('../config/conn.php');
if (isset($_SESSION['idm']) && isset($_SESSION['namem'])) {
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student</title>
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css" integrity="sha512-YWzhKL2whUzgiheMoBFwW8CKV4qpHQAEuvilg9FAn5VJUDwKZZxkJNuGM4XkWuk94WCrrwslk8yWNGmY1EduTA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- Custom CSS -->
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/profile.css">
    <script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<style>
    @import url('https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap');

@import url('https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap');

* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: 'Roboto', sans-serif;
}

:root {
  --purple2:#925ffa;
  --purple3:#9967CE;
--purple4:#bb7efc;

  --purple:#BA9CF6;
    --blueColor: #696cff;
    --whiteColor: #ffffff;
    --lightGray: #f7f7f7;
    --textColor: #d1d1d1;
    --borderColor: #e4e4e4;
    --smallBorder: .5rem;
    --bigBorder: 2rem;
    --fs13: 1.3rem;
    --fs14: 1.4rem;
    --fs15: 1.5rem;
    --fs16: 1.6rem;
    --fs20: 2rem;
    --fs30: 3rem;
}

html {
    font-size: 62.5%;
    scroll-behavior: smooth;
}

body {
  background-image: var(--lightGray);
  background-repeat: no-repeat;
    color: var(--textColor);
    position: relative;
}

h1,
h2,
h3,
h4,
h5,
h6 {
    line-height: 1.2;
    font-weight: 500;
}

ul {
    list-style: none;
}

a {
    text-decoration: none;
}

::-webkit-scrollbar {
    width: .8rem;
}

::-webkit-scrollbar-track {
    background: var(--lightGray);
}

::-webkit-scrollbar-thumb {
    background-color: var(--blueColor);
}

.container {
    width: 100%;
    height: 100%;
    position: relative;
    display: flex;
    gap: 2rem;
    border-radius: 10px;
}

/*Start Aside*/
.sidebar-wrapper {
    position: fixed;
    top: 0;
    left: -100rem;
    width: 25rem;
    height: 100vh;
    padding: 0 1.5rem;
    background-color: var(--whiteColor);
    box-shadow: 0 .2rem .6rem 0 rgb(218 218 253 / 65%), 0 .2rem .6rem 0 rgb(206 206 238 / 54%);
    z-index: 999;
    transition: all .3s ease-in-out;
}

.sidebar-wrapper.active {
    left: 0;
}

.sidebar-wrapper .sidebar-header .close-menu {
    position: absolute;
    top: 1%;
    right: -1.6rem;
    width: 4rem;
    height: 4rem;
    border-radius: 50%;
    background-color: var(--purple2);
    border: .7rem solid var(--lightGray);
    display: flex;
    align-items: center;
    justify-content: center;
    cursor: pointer;
}

.sidebar-wrapper .sidebar-header .close-menu i {
    font-size: var(--fs13);
    color: var(--whiteColor);
}

@media(min-width: 992px) {
    .sidebar-wrapper {
        left: 0;
    }

    .sidebar-wrapper .sidebar-header .close-menu {
        display: none;
    }
}

.sidebar-wrapper .sidebar-header {
    display: flex;
    align-items: center;
   
    height: 6rem;
    border-bottom: .2rem solid #927df80e;
}

.sidebar-wrapper .sidebar-header img {
    width: 8rem;
}

.sidebar-wrapper .sidebar-header h4 {
    text-transform: capitalize;
    font-size: 2.2rem;
    letter-spacing: .3rem;
    color: var(--purple);
}


.sidebar-wrapper nav ul {
    padding: 1rem;
    margin-top: 20px;
    display: flex;
    flex-direction: column;
    gap: 1rem;
}

.sidebar-wrapper nav ul li a {
    display: flex;
    align-items: center;
    gap: 0.5rem;
    padding: 12px 10px;
   
    color:#828486;
    letter-spacing: .05rem;
    border: .1rem solid #ffffff00;
    transition: all .3s ease-in-out;
    border-radius: 8px;margin-bottom: 10px;
	font-size: 16px;

    
}


.sidebar-wrapper nav ul li a i {
    font-size: var(--fs15);
    line-height: 1;
    color: var(--purple); 
    padding-right: 7px;
}

.sidebar-wrapper nav ul li a .title {
    text-transform: capitalize;
}

.sidebar-wrapper nav ul li a:hover {
    color: #ffffff;
    background: #cfb7ff98;
   
}

.sidebar-wrapper nav ul li.active{ 
    background: #cfb7ff98!important; position: relative;  border-radius:15px;  height: 45px;}
.sidebar-wrapper nav ul li div span{right: 10rem;}
.sidebar-wrapper nav .active a div{color:  #ffffff!important;}
.sidebar-wrapper nav .active a i{color: var(--purple)!important;}
.active:after{
	content: "";
    position: absolute;
    right: -24px;
    width: 0.4rem;
    height: 40px;
    top: 2px;
    background: #9881fab9;
    border-radius: 0.375rem 0 0 0.375rem;
}


.sidebar-wrapper nav ul li .submenu {
  display: none;
  margin-left: 2rem;
  padding: 0.5rem 0;
}

.sidebar-wrapper nav ul li.open .submenu {
  display: block;
}

.sidebar-wrapper nav ul li .submenu li {
  margin-bottom: 0.5rem;
}

.sidebar-wrapper nav ul li .submenu li a {
  padding: 10px;
}



/*End Aside*/

/*Start Main Content*/
.content {
    width: 100%;
    padding-right: 1.5rem;
    padding-left: 1.5rem;
    
;
}

@media(min-width: 992px) {
    .content {
        margin-left: 27rem;
        padding-left: 0;
    }
}

.content header {
    margin: 1.3rem auto;
   
}

.content header .header-wrapper {
    background-color: var(--whiteColor);
    display: flex;
    align-items: center;
    justify-content: space-between;
    padding: 0rem 1.5rem;
    height: 6rem;
    
    border-radius: 10px;
    box-shadow: 0 0 0.375rem 0.25rem rgba(157, 171, 187, 0.171);
}

.content header .header-wrapper .header-left {
    display: flex;
    align-items: center;
    gap: 1rem;
}

.content header .header-wrapper .header-left .toggle-icon i {
    cursor: pointer;
}

@media(min-width: 992px) {
    .content header .header-wrapper .header-left .toggle-icon {
        display: none;
    }
}

.content header .header-wrapper .header-left i {
    color: #697a8d;
    font-size: 1.8rem;
}

.content header .header-wrapper .header-left input {
    background-color: transparent;
    color: #615f5f;
    font-weight: 400;
    font-size: var(--fs16);
    padding: .5rem .8rem;
    width: 100%;
    outline: none;
    border: none;
}

.content header .header-wrapper .header-left input::placeholder {
    font-size: var(--fs15);
    color: #63656893;
}

.content header .header-wrapper .header-left input:focus::placeholder {
    opacity: 0;
}

.content header .header-wrapper .header-right {
    display: flex;
    align-items: center;
    gap: 1rem;
}

.content header .header-wrapper .header-right .star-container {
    display: flex;
    align-items: center;
    font-size: 2rem;
    font-weight: 300;
    color: #5a39fa;
  background-color: rgba(132, 130, 223, 0.2);
  padding: 8px;
  border-radius: 13px;
   cursor: pointer;
   
}


@media(min-width: 768px) {
    .content header .header-wrapper .header-right {
        gap: 2rem;
    }

    .header-wrapper .header-right .star-container .star-left,
    .header-wrapper .header-right .star-container .star-right {
        padding: .5rem 1rem;
    }
}

.content header .header-wrapper .header-right img {
    width: 4rem;
    border-radius: 50%;
}

.main {
    display: grid;
    gap: 2rem;
    position: relative;
}

@media(min-width: 768px) {
    .main {
        grid-template-columns: repeat(2, 1fr);
    }
}

@media(min-width: 1200px) {
    .main {
        grid-template-columns: repeat(4, 1fr);
         background: url(hadjer.png)no-repeat;
    }
}


footer {
  background-color: var(--whiteColor);
  margin-top: 2rem;
  
  padding: 2rem 0;
  border-radius: var(--smallBorder) var(--smallBorder) 0 0;
  box-shadow: 0 0 9px rgba(0, 0, 0, 0.2);

}

footer .copyright {
  font-size: var(--fs14);
  text-align: center;
  text-transform: capitalize;
  color: #7a7777;
}

.switcher-container {
  position: fixed;
  top: 5%;
  right: -20rem;
  width: 20rem;
  height: 20rem;
  padding: 1rem .5rem;
  border-radius: var(--smallBorder) 0 0 var(--smallBorder);
  background-color: var(--whiteColor);
  box-shadow: 0 0.2rem 0.6rem 0 rgb(218 218 253 / 65%), 0 0.2rem 0.6rem 0 rgb(206 206 238 / 54%);
  transition: all .3s ease-in-out;
}

.switcher-container.open {
  right: 0;
}

.switcher-container .switcher-icon {
  position: absolute;
  top: calc(50% - 3rem);
  left: -3rem;
  padding: .5rem;
  width: 3rem;
  height: 3rem;
  background-color: var(--blueColor);
  border-radius: var(--smallBorder) 0 0 var(--smallBorder);
  display: flex;
  align-items: center;
  justify-content: center;
  cursor: pointer;
}

.switcher-container .switcher-icon i {
  font-size: var(--fs16);
  color: var(--whiteColor);
  animation: rotate 2s linear infinite;
}

@keyframes rotate {
  100% {
      transform: rotate(360deg);
  }
}

.switcher-container .switcher-close {
  position: absolute;
  top: 1.5rem;
  right: 0.5rem;
  cursor: pointer;
}
/* score-card */
.switcher-container .switcher-close i {
  font-size: var(--fs16);
}

.switcher-container .switcher-header {
  padding: 0 .5rem;
}

.switcher-container .switcher-header h3 {
  text-transform: uppercase;
  font-size: var(--fs16);
  padding: .5rem 0;
  border-bottom: .1rem solid var(--lightGray);
}

.switcher-container .switcher-header h4 {
  text-transform: capitalize;
  font-size: var(--fs14);
  margin: 1rem 0;
  padding: .5rem 0;
  border-bottom: .1rem solid var(--lightGray);
}

.switcher-container .switcher-body {
  margin-top: 3rem;
}

.switcher-container .switcher-body ul {
  display: flex;
  align-items: center;
  justify-content: center;
  gap: 1.5rem;
}

.switcher-container .switcher-body ul li {
  width: 2rem;
  height: 2rem;
  border-radius: var(--smallBorder);
  box-shadow: 0 0.2rem 0.6rem 0 rgb(67 89 113 / 12%);
  cursor: pointer;
}

.switcher-container .switcher-body ul li:first-child {
  background-color: #ffffff;
}

.switcher-container .switcher-body ul li:last-child {
  background-color: #000000;
}

.scroll-top {
  position: absolute;
  bottom: 1%;
  right: 2%;
  width: 3rem;
  height: 3rem;
  padding: .5rem;
  border-radius: var(--smallBorder);
  background-color: var(--blueColor);
  color: var(--whiteColor);
  display: flex;
  align-items: center;
  justify-content: center;
  cursor: pointer;
}


.scroll-top i {
    font-size: var(--fs16);
}

.dropdown {
  position: relative;
}

.dropdown-content {
  display: none;
  position: absolute;
  top: 100%;
  right: 0;
  width: 250px;
  background-color: #ffffff;
  box-shadow: 0 2px 4px rgba(0, 0, 0, 0.15);
  border-radius: 10px;
  z-index: 1;
  animation: slideDown 0.3s ease-in-out;
  animation-fill-mode: forwards;
  opacity: 0;
  transform: translateY(-10px);
  cursor: pointer;
}

.notification {
  display: flex;
  align-items: center;
  padding: 10px;
  transition: all 0.2s ease-in-out;
}

.notification:hover {
  background-color: #f5f5f5;
  border-radius:10px ;
}

.notification img {
  width: 50px;
  height: 50px;
  border-radius: 50%;
  margin-right: 10px;
}

.notification-text {
  flex: 1;
}

.notification-text p {
  margin: 0;
  font-size: 14px;
  font-weight: bold;
  color: #615f5fb6;
}

.notification-text span {
  font-size: 11px;
  color: var(--purple);
}

.dropdown:hover .dropdown-content {
  display: block;
  opacity: 1;
  transform: translateY(0);
}

@keyframes slideDown {
  0% {
    opacity: 0;
    transform: translateY(-10px);
  }
  100% {
    opacity: 1;
    transform: translateY(0);
  }
}
.sidebar-wrapper nav ul li .submenu {
  display: none;
  margin-left: 2rem;
  padding: 0.5rem 0;
}

.sidebar-wrapper nav ul li.open .submenu {
  display: block;
}

.sidebar-wrapper nav ul li .submenu li {
  margin-bottom: 0.5rem;
}

.sidebar-wrapper nav ul li .submenu li a {
  padding: 10px;
}

/*End Main Content*/





/* .contain2{
  min-height: 45vh;
  background-size: cover;
  background-position: center;
  
} */
/* td */

/*End Main Content*/ 

#home{
    position: relative;
    z-index: 2;
    overflow: hidden;
}
.row{
    width: 100%;
    display: flex;
    justify-content: center;
    flex-wrap: wrap;
  }
  
.contain1{
    background-color:#ffffff;
    /* background-image: url(../tst3.png);
    background-size: cover; */
    position: relative;
    flex: 1;
    max-width: 400px;
    height: 150px;
    margin: 10px;
    border-radius: 25px;
    box-shadow: 0 0 9px rgba(0, 0, 0, 0.2);
    cursor: pointer;
    margin: 10px;
    overflow: hidden;
    display: flex;
    align-items: center;
    justify-content: center;
  }
  
  .contain2{
    background: var(--whiteColor);
    position: relative;
    flex: 1;
    max-width: 800px;
    height:250px;
    margin: 10px;
    border-radius: 25px;
    box-shadow: 0 0 9px rgba(0, 0, 0, 0.2);
  }
  
  .contain3{
    /* background-image: url(../STAGET.png);
    background-size: contain; */
    background-color: #5939fa71;
    position: relative;
    flex: 1;
    max-width: 400px;
    height:250px;
    margin: 10px;

    border-radius: 25px;
    box-shadow: 0 0 9px rgba(0, 0, 0, 0.2);

  }
  .contain4{
    background-color:#ffffff;
    background-size: contain;
    position: relative;
    flex: 1;
    max-width:100%;
    height:90px;
    margin: 10px;

    border-radius: 25px;
    box-shadow: 0 0 9px rgba(0, 0, 0, 0.2);

  }
  .contain2 .box-home{
    /* width: 800px;*/
    height: 250px; 
    display: flex;
    align-items: center;
    border-radius:25px;
    /* box-shadow: 0 0 9px rgba(0, 0, 0, 0.2); */
    /* backdrop-filter: blur(5px); */
    background: rgb(255, 255, 255);
    overflow: hidden;
    position: relative;
  
  }
  .contain2 .box-home .image-home{
    padding: 60px;
    margin-right: 40px;
    border-radius: 0 50px 50px 0;
    background: #8B73FF;
    height: 270px;
  
  }
  .contain2 .box-home .image-home img{
    height: 150px;
    width: 150px;
    border-radius: 0 50px 0 50px;
     border-radius: 30px;
    
    box-shadow: 0 0 0 10px #fff3;
  
  }
  .contain2 .box-home .content-home .title-home{
    color:#0e0e0e ;
    padding: 5px 0;
    font-size: 20px;
    text-transform: capitalize;
  
  
  }
  .contain2 .box-home .content-home .post{
    display: block;
    font-size: 13px;
    color: rgba(121, 117, 117, 0.6);
    margin-bottom: 30px;
  
  }
  .contain2 .box-home .content-home .text-home {
    display: block;
    color: rgb(94, 91, 91);
    font-size: 14px;
  }
  .contain2 .box-home .content-home .btn-home{
    display: flex;
    align-items: center;
    justify-content: center;
    height: 45px;
   
    width: 40%;
    border: none;
    outline: none;
    color: #fff;
   
    border-radius: 5px;
    margin: 25px 0;
    background: #8B73FF;
    transition: all 0.3s linear;
    cursor: pointer;
  }
  
  
  @media (max-width:769px){
  .contain2 .box-home{
    flex-flow: column;
    padding-bottom: 100px;
    margin: 20px;
    text-align: center;
   
    
    width: 330px;
  }
  .contain2 .box-home .image-home{
    width: 100%;
    margin-right: 0;
    margin-bottom: 20px;
    border-radius: 0 0 50px 50px;
    text-align: center;
  }
  
  .contain2 .box-home .content-home .btn-home{
    display: flex;
    align-items: center;
    justify-content: center;
    height: 45px;
   
  
   
    border-radius: 5px;
    margin: 25px 0;
    background: #8B73FF;
    transition: all 0.3s linear;
    cursor: pointer;
  }
  
  
  }
  
  .row .contain1::before {
    position: absolute;
    content: "";
    top: -60px;
    right: -60px;
    height: 125px;
    width: 125px;
    border-radius: 50%;
    transition: all 0.5s ease-in-out;
}
.row .contain1:hover::before {
    transform: scale(10);
}
.row .contain1:nth-child(1):before {
    background: #8B73FF;
}
.row .contain1  .num:nth-child(1):after {

    font-style: var(--whiteColor);
}
.row .contain1:nth-child(2):before {
    background: #8B73FF;
}
.row .contain1:nth-child(3):before {
    background: #8B73FF;
} 
.row .contain1:nth-child(4):before {
    background:#8B73FF;
}
.row .contain1 span, 
.row .contain1 text,
.row .contain1 i,
.row .contain1 p {
    z-index: 1;
}
  
  @media (max-width:800px){
    .contain1{
      flex: 100%;
      max-width: 600px;
      height: 130px;
      padding: 10px;
      
    }
    .row .contain1 .i{
        margin-left: 1px;
        margin-right: 1px;
    }
  
    .contain2{
      flex: 100%;
      max-width: 700px;
      height: 500px;
    }
    .contain3{
      flex: 100%;
      max-width: 700px;
      height: 500px;
    }
    .main-content{
        width: calc(100% - 5px);
      }
  }
  @media (max-width:1200px){
    .contain1{
      flex: 100%;
      max-width: 750px;
      height: 130px;
      padding: 5px;
      
    }
    .row .contain1 .i{
        margin-left: 2px;
    }
    .row .contain1 P{
        margin-left: 10px;
    }
    .contain2{
      flex: 100%;
      max-width: 750px;
      height: 300px;
    }
    .contain3{
      flex: 100%;
      max-width: 750px;
      height: 260px;
    }
    .main-content{
        width: calc(100% - 5px);
      }
  
  }


  .row .contain1 i {
    color: #8B73FF ;
    font-size: 4.5em;
    text-align: center;
    margin-top: 2 ;
    margin-right: 5px;
    margin-left: 5px;
  }

  span.num {
    color:#8B73FF ;
    display: flex ;
    flex-direction: column;
    place-items: center;
    font-weight: 600;
    font-size: 2.2em;
    /* margin-top: 20px; */
    margin-left: 10px;
  }

  p.text {
    color: #363636;
    font-size: 1.9em;
    text-align: center;
    pad: 0.7em 0;
    font-weight: 600;
    /* margin-top: 20px; */
    margin-left: 10px;
  }
.contain1:hover p{
    color: var(--borderColor);
}
.contain1:hover i{
    color: #e4e9ee;
}
.contain1:hover span{
    color: var(--borderColor);
}


/*progress bar/////////////////////////////////*/
.containerpro{
 position: relative;
 display: flex;
 justify-content: center;  align-items: center;
 flex-wrap: wrap;
 gap: 40px;
 margin-top: 3.5rem;
 }
 .contain2 h1{
    position: relative;
    display: flex;
    justify-content: center;  align-items: center;
    margin-top: 2.5rem;
    color: #615f5f;
    font-weight: 500;
    text-transform: uppercase;
    letter-spacing: 2px;

 }
 .containerpro .card{
 position: relative;
 width: 120px;  height: 120px;  
 background: transparent;
 display: flex;
 justify-content: center;  align-items: center;
 }
 .containerpro .card .percent{
    position: relative;
    width: 150px;
    height: 150px;
 }
 .containerpro .card .percent svg{
    position: relative;
    width: 150px;
    height: 150px;
    transform: rotate(270deg);
 }
 .containerpro .card .percent svg circle{
  width: 50px;
  height: 50px;
  fill: transparent;
  stroke-width:3 ;
  stroke: #d1c5c5;
  transform: translate(5px ,5px);  
 }
 .containerpro .card .percent svg circle:nth-child(2){
    stroke: var(--clr);
    stroke-dasharray: 440;
   stroke-dashoffset: calc(440 - (440 * var(--num)) /100);
   opacity: 0;
   animation: fadeIn 1.5s linear forwards;
   animation-delay: 2.5s;

}
@keyframes fadeIn{
0%{
    opacity: 0;
}
100%{
    opacity: 1;
} 
}
.dot{
position: absolute;
inset: 5px;
z-index: 10;
animation: animateDot 2s linear forwards;

}
@keyframes animateDot{
0%{
    transform: rotate(0deg);
}
100%{
    transform: rotate(calc(3.6deg * var(--num)));
}
}
.dot::before{
content: '';
position: absolute;
top: -5px;
left: 70px;
transform: translateX(-70%);
width: 10px;
height: 10px;
border-radius: 50px;
background: var(--clr);
box-shadow: 0 0 10px var(--clr),
0 0 30px var(--clr) ;
}
.number{
    position: absolute;
    inset: 0;
    display: flex;
    justify-content: center;
    align-items: center;
    opacity: 0;
    animation: fadeIn 1.5s linear forwards;
    animation-delay: 2.5s;

}
.number h2{
    position: absolute;
    justify-content: center;
    align-items: center;
    color: #615f5f;
    font-weight: 700;
    font-size: 2.5em;
   
}
.number h2 span{
    font-weight: 500;
    color: #615f5f;
    font-size: 0.75em;
}
.number p{
     font-weight: 300;
     font-size: 0.75;
    margin-top: 50px;
    text-transform: uppercase;
    color: #615f5f;
}


@import url('https://fonts.googleapis.com/css2?family=Alkatra&family=Permanent+Marker&family=Poppins:ital,wght@0,100;0,200;0,300;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,800;1,900&family=Roboto+Mono&family=Roboto:ital,wght@0,400;0,500;0,700;1,400;1,500;1,700&display=swap');


/*home cards*/
#home{
    overflow: hidden
  }
/*offers /////////////////////*/

  /*intenships table*/

  #offers-section{
    
      justify-content: center;
      align-items: center;
      overflow-y: scroll;
      width: 100%;
      height: 70%;
      background: rgba(255, 255, 255, .15);
      box-shadow: 0 8px 32px rgba(144, 146, 184, 0.37);
      border: 1px solid rgba(255, 255, 255, .18);
      border-radius: 1rem;
      margin-top: 20px;
      margin-bottom: 10px;
      margin-right: 20px;
      overflow: hidden;
      backdrop-filter: blur(7px);
}
#head-section{
    
    justify-content: center;
    align-items: center;
    overflow-y: scroll;
    width: 100%;
    height: 70%;
    background: rgba(255, 255, 255, .15);
    box-shadow: 0 8px 32px rgba(144, 146, 184, 0.37);
    border: 1px solid rgba(255, 255, 255, .18);
    border-radius: 1rem;
    margin-top: 20px;
    margin-bottom: 10px;
    margin-right: 20px;
    overflow: hidden;
    backdrop-filter: blur(7px);
  }
#supervisor-section{
    
    justify-content: center;
    align-items: center;
    overflow-y: scroll;
    width: 100%;
    height: 70%;
    background: rgba(255, 255, 255, .15);
    box-shadow: 0 8px 32px rgba(144, 146, 184, 0.37);
    border: 1px solid rgba(255, 255, 255, .18);
    border-radius: 1rem;
    margin-top: 20px;
    margin-bottom: 10px;
    margin-right: 20px;
    overflow: hidden;
    backdrop-filter: blur(7px);
  }

  #trainee-section{
    
    justify-content: center;
    align-items: center;
    overflow-y: scroll;
    width: 100%;
    height: 70%;
    background: rgba(255, 255, 255, .15);
    box-shadow: 0 8px 32px rgba(105, 106, 134, 0.37);
    border: 1px solid rgba(255, 255, 255, .18);
    border-radius: 1rem;
    margin-top: 20px;
    margin-bottom: 10px;
    margin-right: 20px;
    overflow: hidden;
    backdrop-filter: blur(7px);
  }


  .score-card {
    border: 2px solid #e4e1ee52;
    border-radius:.5rem;
    display: flex;
    justify-content: space-between;
    margin-bottom: 10px;
    height: inherit;
    font-weight: inherit;
  }
   .table__header {
    width: 100%;
    height: 30%;
    background-color: white;
    padding: .8rem 2rem;
    border-top-left-radius:25px ;
    border-top-right-radius:25px  ;
    /* border-radius: 1rem; */
    display: flex;
    justify-content: space-between;
    align-items: center;
    
  }
  .table__header h1{
    color: #615f5f;
    
  }
   .table__header .input-group {
    width: 35%;
    height: 5em;
    background-color: rgba(124, 75, 210, 0.151);
    
    padding: 0 .8rem;
    border-radius: 2rem;
    display: flex;
    justify-content: center;
    align-items: center;
    transition: .2s;
  }
  
  .table__header .input-group:hover {
    width: 40%;
    background-color: rgba(125, 75, 210, 0.277);
    box-shadow: 0 .1rem .4rem #0002;
  }
  
  .table__header .input-group i{
    width: 1.2rem;
    height: 1.2rem;
    color: #8B73FF;
  }
  
  .table__header .input-group input {
    width: 100%;
    padding: 0 .5rem 0 .3rem;
    background-color: transparent;
    border: none;
    outline: none;
  }
  
  .table__body {
    background-color: #ffffff;
    /* margin: .8rem auto; */
    border-bottom-left-radius: 25px;
    border-bottom-right-radius: 25px;
    /* border-radius: .6rem; */
    /* padding-top: 4px; */
    padding: 0 40px;
    overflow: auto;
    overflow: overlay;
  }
  
  .table__body::-webkit-scrollbar{
    width: 0.5rem;
    height: 0.5rem;
  }
  
  .table__body::-webkit-scrollbar-thumb{
    border-radius: .5rem;
    background-color: rgb(255, 0, 0);
    visibility: hidden;
  }
  
  .table__body:hover::-webkit-scrollbar-thumb{ 
    visibility: visible;
  }
  
  table {
    width: 100%;
    height: 100%;
    margin-bottom: 400px;
  }
  
  td img {
    width: 65px;
    height: 65px;
    margin-right: .5rem;
    border-radius: 50%;
  
    vertical-align: middle;
  }
  
  table, th, td {
    border-collapse: collapse;
    padding: 2rem;
    text-align: left;
    color: #15151b;
    font-size: 1.4rem;
    font-weight: 800;
  }
  
  thead th {
    position: sticky;
    top: 0;
    left: 0;
    color: #f7f7f7;
    cursor: pointer;
    font-weight: 400;
    font-size: medium;
   
  }
  .themecar{
    background-color: #8B73FF;
  }
  
  
  tbody tr:nth-child(even) {
    background-color: #0000000b;
  }
  
  tbody tr {
    --delay: .1s;
    transition: .5s ease-in-out var(--delay), background-color 0s;
   
  }
  
  tbody tr.hide {
    opacity: 0;
    transform: translateX(100%);
  }
  
  tbody tr:hover {
    background-color: rgba(145, 155, 250, 0.637) !important;
  }
  
  tbody tr td,
  tbody tr td p,
  tbody tr td img {
    transition: .2s ease-in-out;
  }
  
  tbody tr.hide td,
  tbody tr.hide td p {
    padding: 0;
    font: 0 / 0 sans-serif;
    transition: .2s ease-in-out .5s;
  }
  
  tbody tr.hide td img {
    width: 0;
    height: 0;
    transition: .2s ease-in-out .5s;
  }
  

   td .action{
    display: inline-flex;
    
  }
  .action{
    margin-right: 10px;
  }
  .action i{
    font-size: large;
   
  }
  .action:hover{
    color: #6c00bd;
  
  
  }

  
  
  @media (max-width: 1000px) {
    td:not(:first-of-type) {
        min-width: 12.1rem;
    }
    .action i{
        font-size: small;
        display: row;
       
      }
  }
  
  thead th span.icon-arrow {
    display: inline-block;
    width: 2.5rem;
    height: 2.5rem;
    border-radius: 50%;
    border: 1.4px solid transparent;
    
    text-align: center;
    font-size: 1.8rem;
    
    margin-left: .5rem;
    transition: .2s ease-in-out;
  }
 
  thead th:hover span.icon-arrow{
    border: 1.4px solid #6c00bd;
  }
  
  thead th:hover {
    color: #6c00bd;
  }
  
  thead th.active span.icon-arrow{
    background-color: #6c00bd;
    color: #fff;
  }
  
  thead th.asc span.icon-arrow{
    transform: rotate(180deg);
  }
  
  thead th.active,tbody td.active {
    color: #6c00bd;
  }
  .hidden {
    display: none;
  }

 
     .bgt88{
    display: inline-block;
    background-color:  #8B73FF;
    color: #fff;
    padding: 1rem 1.5rem;
    border-radius: .5rem;
    font-weight: 600;
    transition: .3s;
    border: none;
  }
  
  .bgt88:hover{
    background-color: #539bde;
  }
  
  .bgt88-link{
    background: none;
    padding: 0;
    color: #8B73FF;
  }
  
  .bgt88-link:hover{
    background-color: transparent;
    color: var(--first-color-alt);
  }
    .home__title{
  font-size: 3rem;
  font-weight: 800;
  margin-bottom:1rem;
  color: #5B5757;
}
</style>
</head>
<body>
   <div class="container" id="top">
    <!--start sidebar///////////////////////////////////////////////-->
    <aside class="sidebar-wrapper">
            <div class="sidebar-header">
                <img src="send2.png" alt="Logo">
                <h4>Staget</h4>
                <div class="close-menu">
                    <i class="fas fa-chevron-left"></i>
                </div>
            </div>
            <nav>
                <ul>
                    <li class="active"><a href="index.php" data-section="home">
                            <i class="fas fa-home"></i>
                            <div class="title">Home  </div>
                           
                        </a></li>


                        <li>
                            <a href="#internship" class="dropdown-toggle">
                                <i class="fa-solid fa-pen-to-square"></i>
                                <div class="title">internship Request</div>
                                <i class="fas fa-chevron-down dropdown-icon"></i>
                            </a>
                            <ul class="submenu">
                                <li><a href="request.php"><i class='bx bx-send' style="font-size: 2rem;"></i>Request</a></li>
                                <li><a href="acc.php"><i class='bx bx-check-circle' style="font-size: 2rem;"></i>Accepted</a></li>
                                <li ><a href="ref.php"> <i class='bx bx-x-circle' style="font-size: 2rem;"></i>Refused</a></li>
                            </ul>
                        </li>
                    <li><a href="intern.php" data-section="company">
                        <i class="fa-solid fa-briefcase"></i>
                            <div class="title">internships</div>
                        </a></li>

                    <li><a href="contact.php"  data-section="contact">
                        <i class="fa-solid fa-message"></i>
                            <div class="title">Contact</div>
                        </a></li> 

                    
                  
                </ul>
            </nav>
        </aside>
    <!--end sidebar//////////////////////////////////////////////////-->
    <main class="content">
        <!--start header ////////////////////////////////////////////////-->
        <header>
            <div class="header-wrapper">
                <div class="header-left">
                    <div class="toggle-icon">
                        <i class="fas fa-bars"></i>
                    </div>
                    <i class="fa-solid fa-magnifying-glass fa-beat" style="color: #537bc1;"></i>
                    <input type="text" placeholder="Search...">
                </div>
                <div class="header-right">

                <div class="dropdown dt">
    <div class="star-container bell">
        <i class='bx bx-bell'></i>
        <span class="count" style="	position: absolute;
	top: -6px;
	right: -6px;
	width: 20px;
	height: 20px;
	border-radius: 50%;
	border: 2px solid white;
	background: #fe3232d8;
	color: white;
	font-weight: 700;
	font-size: 12px;
	display: none;
	justify-content: center;
	align-items: center;
    display: flex;"></span>
      </div>
    <div class="dropdown-content ">

    </div>
</div>
<script type="text/javascript">
	$(document).ready(function(){
		function load_unseen_notification(view = '') {
			$.ajax({
				url: "fetch.php",
				method: "POST",
				data: { view: view },
				dataType: "json",
				success: function(data) {
					$('.dropdown-content').html(data.notification);
					if (data.unseen_notification > 0) {
						$('.count').html(data.unseen_notification);
						$('.count').css('display', 'flex');
					} else {
						$('.count').html('');
						$('.count').css('display', 'none');
					}
				}
			});
		}

		load_unseen_notification();

		$(document).on('click', '.dt', function() {
			$('.count').html('');
			$('.count').css('display', 'none');
			load_unseen_notification('yes');
		});

		setInterval(function() {
			load_unseen_notification();
		}, 5000);
	});
</script>
              <div class="star-container chat">
                        <i class="fa-regular fa-comment-dots"></i>
                    </div>
                    <img src="img/<?=$_SESSION['pm']?>" alt="avatar" style="height: 45px ;width:45px ;">
                </div>
            </div>
        </header>        
        <section id="home-section" class="page-section ">
                         
         
<div class="row">
               
               <div class="left">
                   <img src="img/<?=$_SESSION['pm']?>" 
                   alt="user" width="150">
                   <h4><?=$_SESSION['namem']?></h4>
                    <p>Internship manager/<?=$_SESSION['companym']?> </p>
               </div>
               <div class="right">
                   <div class="info">
                       <h3><i class="fa-sharp fa-solid fa-user-graduate"></i>  Personal Information</h3>
                       <div class="info_data">
                            <div class="data">
                               <h4><i class="fa-sharp fa-solid fa-envelope-open"></i>  Email</h4>
                               <p><?=$_SESSION['emailm']?></p>
                            </div>
                            <div class="data">
                              <h4><i class="fa-sharp fa-solid fa-id-card-clip"></i>  Full Name</h4>
                               <p><?=$_SESSION['namem']?></p>
                         </div>
                       </div>
                   </div>
                 
                 <div class="projects">
                       <h3><i class="fa-sharp fa-solid fa-book"></i>  Company Information</h3>
                       <div class="projects_data">
                       <div class="data">
                              <h4><i class="fa-sharp fa-solid fa-chalkboard-user"></i>  Company:</h4>
                               <p> <?=$_SESSION['companym']?></p>
                         </div>
                         <div class="data">
                           <h4><i class="fa-sharp fa-solid fa-list-check"></i> Faculty:</h4>
                            <p> NTIC </p>
                      </div>


                 
                     
                       </div>
                   </div>
                 
                   <div class="social_media">
                       <ul>
                         <li><a href="index.php" class="sidebar-link btn-home" data-section="home"><i class="fa-sharp fa-solid fa-right-to-bracket"></i> Back</a></li>
                         <li><a href="edit.php" class="sidebar-link btn-home" data-section="edit"><i class="fa-sharp fa-solid fa-wrench"></i> Update</a></li>
                     </ul>
                 </div>
               </div>
           </div>
           </div>
  
         </section>   
       
<br><br><br>
        <footer>
            <div class="copyright">
                copyright &copy; 2023 | Staget made with ❤️ by girls team | all right reserved.
            </div>
        </footer>


    </main>
   </div>

    <div class="switcher-container">
        <div class="switcher-icon">
            <i class="fas fa-cog"></i>
        </div>
        <div class="switcher-close">
            <i class="fas fa-times"></i>
        </div>
        <div class="switcher-header">
            <h3>theme customizer</h3>
            <h4>theme styles</h4>
        </div>
        <div class="switcher-body">
            <ul>
                <li data-color="#f7f7f7" class="active"></li>
                <li data-color="#212529"></li>
            </ul>
        </div>
    </div>
    <a href="#top" class="scroll-top">
        <i class="fas fa-arrow-up"></i>
    </a>
    
    
    <script>
    const dropdownToggle = document.querySelector(".dropdown-toggle");
    const activeListItem = document.querySelector(".submenu li.active");

    dropdownToggle.addEventListener("click", function (event) {
        event.preventDefault();
        const parentLi = this.parentElement;
        parentLi.classList.toggle("open");
    });

    // Check if there is an active list item and keep the dropdown open
    if (activeListItem) {
        const parentDropdown = activeListItem.closest(".submenu");
        const parentLi = parentDropdown.parentElement;
        parentLi.classList.add("open");
    }
</script>




</body>
</html>
                <?php 
               }else{
                    header("Location: ../login.php");
                    exit();
               }
                ?>