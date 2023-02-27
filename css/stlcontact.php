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
    width: 35%; 
    height: 100%;
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
    width: 60%; 
    margin-left: 2rem;
    height: 80%;
}
.envoie-mail{
    height: 80%;
    padding: 2% 0 3% 0;
    background: rgba(0, 0, 0, 0.3);
    box-shadow: 2px 3px 8px black;
    margin: 10% 5% 5% 5%;
    padding-left: 1rem;
    border-radius: 20px;
    
}
.envoie-mail h3{
    text-align: center;
    padding: 1% 15% 1% 15%;
}
.mail{
    font-weight: bold;
    height: 5rem;
}
.sujet{
    font-weight: bold;
    height: 5rem;
}
.zone-text{
    font-weight: bold;
    height: 20rem;
}
.mail input{
    
    height: 50%;
    width: 95%;
    border-radius: 20px;
    padding: 10px;
    font-size: 1.5rem;
    box-shadow: 2px 3px 8px black;
}
.sujet input{
   
    height: 50%;
    width: 95%;
    border-radius: 20px;
    padding: 10px;
    font-size: 1.5rem;
    box-shadow: 2px 3px 8px black;
}
.zone-text textarea{
    resize : none;
    height: 18rem;
    width: 95%;
    border-radius: 20px;
    padding: 10px;
    font-size: 1rem;
    box-shadow: 2px 3px 8px black;
}
.form-send {
	margin-top: 20px;
	text-align: end;
    
}
.form-btn {
    margin-right: 5%;
	background-color: #1b1310;
	border-radius: 30px;
	box-shadow: 0 0 6px #1b1310;
	color: #fff;
	display: inline-block;
	font-size: 1.4rem;
	font-weight: bold;
    padding: 20px 20px 20px 20px;
	<!-- padding: 20px 97px; -->
	text-align: center;
	width: 20%;
}