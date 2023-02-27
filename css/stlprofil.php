<?php header("Content-type: text/css; charset=UTF-8"); ?>
html,body  
{  
    font-family: system-ui;
    overflow:hidden;  
}  
*{
    margin: 0;
    padding: 0;
}
.mid{
    height: 100vh;
}
.droite img{
    
    display: block;
    width: 8rem;
    margin: auto;
    margin-bottom: 2rem;
    border-radius: 50%;
    border: 8px solid rgba(0, 0, 0, 0.6);
}
.droite{
    padding-top: 3rem;
    justify-content: center;
    float: right;
    
    
    border-left: 2px solid black;
    width: 25%; 
    height: 100%;
}
.gauche h2{
    text-decoration:none;
    padding-left:2%;
    background-color:#FFD700;
    <!-- border-radius:20px; -->
    
}
.rectangle{
    background: rgba(0, 0, 0, 0.3);
    box-shadow: 2px 3px 8px black;
    width: 80%;
    border-radius: 20px;
    margin: auto;
    height: 60%;
}
.text{
    padding-top: 3rem;
    padding-bottom: 2rem;
    border-radius: 20px;
    margin: auto;
    text-align: center;
    /* background: rgba(0, 0, 0, 0.3);
    box-shadow: 2px 3px 8px black; */
    /* width: 80%; */
}
.adress{
    margin: auto;
    width: 66%;
    border-top: 2px solid black;
    text-align: center;
}
.adress h1{
    margin-top: 2rem;
}
.adress h3{
    margin: 10px 0 10px 0;
}
.gauche{
    
    float: left;
    width: 70%; 
    margin-left: 2rem;
    height: 80%;
}
.panier{
    height: 28%;
    background: rgba(0, 0, 0, 0.3);
    box-shadow: 2px 3px 8px black;
    margin-top: 2rem;
    <!-- padding-left: 1rem; -->
    border-radius: 20px;
    height: 15rem;
}
.avis{
    height: 28%;
    background: rgba(0, 0, 0, 0.3);
    box-shadow: 2px 3px 8px black;
    margin-top: 2rem;
    <!-- padding-left: 1rem; -->
    border-radius: 20px;
    height: 15rem;
}
.commandes{
    height: 28%;
    background: rgba(0, 0, 0, 0.3);
    box-shadow: 2px 3px 8px black;
    margin-top: 2rem;
    <!-- padding-left: 1rem; -->
    border-radius: 20px;
    height: 15rem;
}
.zone p{
    color:#FFD700;
}
