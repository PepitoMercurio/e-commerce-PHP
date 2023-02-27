<?php header("Content-type: text/css; charset=UTF-8"); ?>
.carre{
    margin-top: 10%;
	width: 20%;
	padding: 20px;
    text-align:center;
	background-color: rgb(0 0 0 / 35%);
	<!-- visibility: hidden; -->
	opacity: 0;
    margin-left:auto;
    margin-right:auto;
	border-radius: 20px;
	transition: opacity 0.3s, visibility 0.3s;
}
.carre button{
    border: 1px solid transparent;
	padding: 1rem 3rem;
	background-color: rgb(80,80,80);
	
	border-radius: 50px;
	
	margin: 1rem 25%;
	font-size: 1rem;
	transition: transform 0.3s ease, box-shadow 0.3s ease;
}
.carre button:hover{
    box-shadow: 3px 5px 15px #FFD700;
	transform: translateY(-5px);
}
.carre button a{
    color:gold;
    text-decoration:none;
    
}
