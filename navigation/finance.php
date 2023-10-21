<style type="text/css">
body {
  margin: 30px 0 0;
  padding: 0;
  font-family: 'Source Sans Pro', sans-serif;
  display: flex;
  justify-content: center;
  align-items: center;
}

.container {
  padding: 0;
  margin: auto;
  display: grid;
  grid-template-columns: repeat(8,1fr);
  margin: 5px 15px;
  gap:10px;
  position: relative;
}

.card {
  width: 20%;
  height: auto;
  grid-column: span 12;
  margin: 10px 0;
  border-radius: 15px;
  position: relative;
  box-shadow: 0 10px 10px rgba(0,0,0,.1);

}

.head-card img {
  width: 100%;
  height: 200px;
  object-fit: cover;
}

.body-card {
  padding: 10px 15px;
}

.body-card h1 {
  margin: 0;  

}

.body-card svg {
  width: 31px;
  position: absolute;
  bottom: 7px;
  right: 20px;
}


@media screen and (min-width: 550px) {
  .card {
  grid-column: span 4;

}


@media screen and (min-width: 760px) {

  .card {
  width: 500px;
  margin: 0 10px;
}

@media screen and (min-width: 960px) {

}


</style><!-- 

GRADIENT BANNER DESIGN BY SIMON LURWER ON DRIBBBLE:
https://dribbble.com/shots/14101951-Banners

-->
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Card Responsive</title>
  <link rel="stylesheet" href="style.css">
  <link href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro:ital,wght@0,200;0,300;0,400;0,600;0,700;0,900;1,200;1,300;1,400;1,600;1,700;1,900&display=swap" rel="stylesheet">
</head>
<body>
  <div class="container">
    <div class="card">
       <div class="head-card">
       </div>
       <div class="body-card">
      <h1>Data Science for Business</h1>
      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ad repudiandae fuga facilis dicta fugiat voluptates deleniti libero earum sed aliquid. </p>
      <svg class="w-3 h-3"  fill="none" stroke="#303030" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path></svg>
       </div>
  </div>
  <div class="card">
     <div class="head-card">
     </div>
     <div class="body-card">
    <h1>Marketing Analitics for Business</h1>
    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ad repudiandae fuga facilis dicta fugiat voluptates deleniti libero earum sed aliquid. </p>
    <svg class="w-3 h-3" fill="none" stroke="#303030" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path></svg>
     </div>
  </div>  
  <div class="card">
     <div class="head-card">
     </div>
     <div class="body-card">
    <h1>Data Decision Making for Business</h1>
    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ad repudiandae fuga facilis dicta fugiat voluptates deleniti libero earum sed aliquid. </p>
    <svg class="w-3 h-3" fill="none" stroke="#303030" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path></svg>
      </div>
  </div>  
  <div class="card">
    <div class="head-card">
     </div>
     <div class="body-card">
        <h1>Trading in Python</h1>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ad repudiandae fuga facilis dicta fugiat voluptates deleniti libero earum sed aliquid. </p>
        <svg class="w-3 h-3" fill="none" stroke="#303030" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path></svg>
     </div>
  </div>
    <div class="card">
     <div class="head-card">
     </div>
     <div class="body-card">
    <h1>Risk Management in Python</h1>
    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ad repudiandae fuga facilis dicta fugiat voluptates deleniti libero earum sed aliquid. </p>
    <svg class="w-3 h-3" fill="none" stroke="#303030" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path></svg>
      </div>
  </div>  
  <div class="card">
    <div class="head-card">
     </div>
     <div class="body-card">
        <h1>Credit Risk Modelling in Python</h1>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ad repudiandae fuga facilis dicta fugiat voluptates deleniti libero earum sed aliquid. </p>
        <svg class="w-3 h-3" fill="none" stroke="#303030" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path></svg>
     </div>
  </div>
 </div>
</body>
</html>