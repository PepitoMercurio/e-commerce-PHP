<?php header("Content-type: text/css; charset=UTF-8"); ?>
h1{
	color:#FFD700;
}
html,body  
{  
	font-family: system-ui;
	overflow-x: hidden; 
}  
*,
*::before,
*::after {
	box-sizing: border-box;
	font-family: system-ui;
	margin: 0;
	padding: 0;
}
.container {
	position: relative;
	height: 100vh;
	width: 100%;
	background: linear-gradient(rgba(0, 0, 0), transparent);
	margin-right: 0rem;
	
	background-size: cover;
}

.sec-container {
	width: 90%;
	margin: 0 auto;
	
}

nav {
	padding: 5px 8%;
	display: flex;
	justify-content: space-between;
	align-items: center;
	flex-wrap: wrap;
	border-bottom: 1px solid #FFD700 ;
	
}

nav .logo {
	width: 120px;
	cursor: pointer;
	font-size: 2.5rem;
	font-style: oblique;
	font-weight: bold;
	text-decoration: none;
	color: #FFD700;
}

nav ul {
	display: flex;
	justify-content: flex-end;
	flex: 1;
	align-items: center;
	padding-right: 40px;
	text-align: right;
	list-style-type: none;
}

ul li {
	margin-right: 10px;
}

ul li a {
	position: relative;
	padding: 10px 20px;
	text-decoration: none;
	color: #FFD700;
	font-size: 16px;
}

button.btn {
	padding: 10px 20px;
	font-size: 1.2rem;
	font-weight: bold;
	font-style: italic;
	margin-top: 0;
	background-color: transparent;
	color: #FFD700;
	border: 1px solid transparent;
	transition: border-color 0.3s ease;
}

button.btn:hover {
	border-color: #FFD700;
}
.sous{
	background:gold;
	padding:1rem;
}
.cadre{
    height: 50%;
    background: rgba(0, 0, 0, 0.3);
    box-shadow: 2px 3px 8px black;
    margin: 2rem;
    <!-- padding-left: 1rem; -->
    border-radius: 20px;
    <!-- height: 15rem; -->
}
.cadre p{
	color:gold;
	padding:0.5rem;
}