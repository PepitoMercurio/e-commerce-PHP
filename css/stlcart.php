<?php header("Content-type: text/css; charset=UTF-8"); ?>
h1{
    font-size:large;
}
.test2{
    display:flex;
    flex-wrap:wrap;
    
}
.test3{
    width: 80%;
    margin-bottom:2rem;
    margin-left:2rem;
    padding:2rem;
    background-color: rgba(0, 0, 0, 0.3);
    box-shadow: 2px 3px 8px black;
}
.test3 img{
    width: 50%;
}
#btn{
    border: 1px solid transparent;
	padding: 1rem 3rem;
	background-color: rgb(80,80,80);
	color:#FFD700;
	border-radius: 50px;
	
	margin: 1rem 1rem;
	font-size: 1rem;
	transition: transform 0.3s ease, box-shadow 0.3s ease;
}
#btn:hover{
    box-shadow: 3px 5px 15px #FFD700;
	transform: translateY(-5px);
}