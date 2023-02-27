<?php header("Content-type: text/css; charset=UTF-8"); ?>
<!-- partie product -->
.fond{
	display:flex;
	flex-wrap:wrap;
    background-color: black;
	
}
.ecrit{
    background-color: black;
	width: 40%;
	float:right;
	padding: 5% 0 3% 0;
    margin: 6rem 2rem 0 0;
	border-radius:50px;
}
.ecrit button{
    border: 1px solid transparent;
	padding: 1rem 3rem;
	background-color: rgb(80,80,80);
	color:#FFD700;
	border-radius: 50px;
	
	margin: 3rem 35%;
	font-size: 1rem;
	transition: transform 0.3s ease, box-shadow 0.3s ease;
}
.ecrit button:hover {
	box-shadow: 3px 5px 15px #FFD700;
	transform: translateY(-5px);
}
.image{
   
	width: 40%;
	float:left;
	vertical-align:middle; 
}
.zonebtn{
    margin-bottom: 2rem;
	width: 90%;
	text-align: center;
	padding: 5% 5% 5% 5%;
	margin-left:auto;
	margin-right:auto;
	color:#FFD700 ;
	background-color: black ;
	border-radius: 0px 0px 20px 20px ;
}
.zonebtn a{
    text-decoration:none;
    color: #FFD700 ;
}
.zonebtn button{
    border: 1px solid transparent;
	padding: 1rem 3rem;
	background-color: rgb(80,80,80);
	color:#FFD700;
	border-radius: 50px;
	
	margin: 1rem 25%;
	font-size: 1rem;
	transition: transform 0.3s ease, box-shadow 0.3s ease;
}
.zonebtn button:hover{
    box-shadow: 3px 5px 15px #FFD700;
	transform: translateY(-5px);
}
<!-- .image p {
	 margin-bottom: 2rem;
	width: 90%;
	text-align: center;
	padding: 5% 5% 5% 5%;
	margin-left:auto;
	margin-right:auto;
	color:#FFD700 ;
	background-color: black ;
	border-radius: 0px 0px 20px 20px ; 
} -->
.image img{
	width: 90%;
	display: block;
  	margin-top:3rem;
  	margin-left:auto;
	margin-right:auto;
	border-radius: 20px 20px 0px 0px ;

}
.text{
    background-color: rgb(80,80,80);
    width:60%;
    margin-left: auto;
    margin-right: auto;
    padding:2%;
    border-radius: 20px;
   
}
.case{
	margin-top:2rem;
	padding-top:1rem;
	width: 80%;
	
	border-radius: 30px;
	margin-left:auto;
	margin-right:auto;
	display: block;
	
	
}

#zoom:hover {
	margin-top:3rem;
  
	margin-left:auto;
	margin-right:auto;
	width: 90%;
}