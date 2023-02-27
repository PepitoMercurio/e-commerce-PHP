<?php header("Content-type: text/css; charset=UTF-8"); ?>
*{
    text-decoration: none; 
}
.tous{
    background: rgba(0, 0, 0, 0.3);
}
.fond-icon{
    <!-- background: rgba(72, 122, 180, .7); -->
    margin-top: 20 px;
    margin-left: 2rem;
    display:flex;
    flex-wrap:wrap;

}
.toggleForm{
    display: flex;
    flex-wrap: wrap;
}
.test3{
    <!-- background: #696969; -->
    padding-top: 2rem;
    margin-top: 2%;
    <!-- border: 3px solid black; -->
    
    overflow-x: hidden;
    width: 28%;
    border-radius: 30px;
    margin-right: 2%;
    margin-left: 2%;
}

.filter{
    position: sticky;
    top:0;
    width: 100%;
    padding: 0.5rem 0 0.5rem 0;
    background: rgba(0, 0, 0);
    font-size: small;
    vertical-align: middle;
    <!-- padding: 1rem 0 1rem 0; -->
   
    <!-- display: flex; -->
    <!-- justify-content: space-around; -->
    
   
}
.filter h1{
    color:#FFD700;
    width: 120px;
	font-size: 2rem;
	font-style: oblique;
    margin-right: 5%;
    padding-right: 1rem;
    margin-left: 5%;
    text-align: center;
    margin-top: 1%;
    
}
.filter h2{
    display: block;
    margin-left: auto;
    margin-right: auto;
    text-align: center;
    margin-top: 2%;
    color:#FFD700;
    margin: 1% 1% 1% 1%;
}
.filter select{
    margin: 1% 2% 1% 2%;
    padding: 1% 0.5% 0.5% 0.5%;
    border-radius:30px;
    height: 3rem;
}
.filter input{
    height: 3.5rem;
    padding: 1rem 0.5rem 1rem 0.5rem;
    border-radius:30px;
    margin: 1% 0.5% 1% 0.5%;
}
.test3 img{
    width: 70%;
    height: 20rem;
    
    border-radius: 20px 20px 0px 0px;
    <!-- margin-bottom: 3rem; -->
    border: 2px solid black;
    margin-left: 15%;
}
.fond-info{
    border-radius: 0px 0px 20px 20px ;
    margin-bottom:2rem;
    padding: 1rem 1rem 1rem 0;
    width: 70%;
    margin-left: 15%;

    background: rgba(0, 0, 0, 0.1);
    text-decoration: none;
}
.fond-info button{
    margin-left:70%;
    width:25%;
    color:FFD700;
}
.fond-info h1{
    text-decoration: none; 
}
.test3 h1{
    font-size: medium;
    text-decoration: none; 
    padding-left:2rem;
    color: black;
}
.formButton {
	border: 1px solid transparent;
	padding: 0.5rem 1rem 0.5rem 1rem;
	background-color: rgb(80,80,80);
	color:#FFD700;
	border-radius: 20px;
	
	
	font-size: 1rem;
	transition: transform 0.3s ease, box-shadow 0.3s ease;
}
.formButton:hover {
	box-shadow: 3px 5px 15px #FFD700;
	transform: translateY(-5px);
}
#recherche {
    margin-left: 8%;
}