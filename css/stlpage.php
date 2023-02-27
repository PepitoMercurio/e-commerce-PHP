<?php header("Content-type: text/css; charset=UTF-8"); ?>
html,body  
{  
	font-family: system-ui;
	overflow:hidden;  
}  
*,
*::before,
*::after {
	box-sizing: border-box;
	font-family: system-ui;
	margin: 0;
	padding: 0;
	
}

<!-- /* .container {
	position: relative;
	height: 100vh;
	width: 100%;
	padding: 0 8%;
	background: linear-gradient(rgba(0, 0, 0, 0.4), transparent);
	background-size: cover;
}

.sec-container {
	width: 90%;
	margin: 0 auto;
}

a {
	display: flex;
	align-items: center;
}

nav {
	display: flex;
	justify-content: space-between;
	align-items: center;
	flex-wrap: wrap;
	padding: 5px 0;
}

nav .logo {
	width: 120px;
	cursor: pointer;
	font-size: 2.5rem;
	font-style: oblique;
	font-weight: bold;
	text-decoration: none;
	color: #94f7e6;
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
.error {color: #FF0000;}

ul li a {
	position: relative;
	padding: 10px 20px;
	text-decoration: none;
	color: #fff;
	font-size: 16px;
}

button.btn {
	padding: 10px 20px;
	font-size: 1.2rem;
	font-weight: bold;
	font-style: italic;
	margin-top: 0;
	background-color: transparent;
	color: #94f7e6;
	border: 1px solid transparent;
	transition: border-color 0.3s ease;
}

button.btn:hover {
	border-color: #94f7e6;
} */ -->

section {
	display: flex;
	justify-content: center;
	align-items: center;
	margin: 0px 0;
}

.formWrapper {
	display: flex;
	justify-content: center;
	align-items: center;
	flex: auto;
}

.formWrapper .card {
	margin-top: 10%;
	width: 360px;
	padding: 20px;
	background-color: rgb(0 0 0 / 35%);
	<!-- visibility: hidden; -->
	opacity: 0;
	border-radius: 20px;
	transition: opacity 0.3s, visibility 0.3s;
}

.card.show {
	visibility: visible;
	opacity: 1;
}

.card-header {
	<!-- display: flex;
	justify-content: space-evenly;
	align-items: center;-->
	margin: 0px 0px 0; 
	font-size: 1.1rem;
	color: #94f7e6;
	<!-- box-shadow: 2px 3px 8px #d3f7ff71; -->
	border-radius: 50px;
}

.card-header .form-header {
	flex: 50%;
	text-align: center;
	padding: 10px 0;
	border: 1px solid transparent;
	border-radius: 50px;
	user-select: none;
}

.card-header .form-header:hover {
	cursor: pointer;
}

.card-header .form-header.active {
	border-color: #94f7e6;
	box-shadow: inset 1px 1px 2px rgb(19 210 177 / 55%), inset -1px 1px 2px rgb(19 210 177 / 55%), inset -1px -1px 2px rgb(19 210 177 / 55%),
	inset 1px -1px 2px rgb(19 210 177 / 55%);
	transition: border-color 0.3s, box-shadow 0.3s;
	background: linear-gradient(rgba(0, 0, 0, 0.3), transparent);
}

.card-body {
	display: flex;
	flex-wrap: nowrap;
	padding: 40px 0;
	text-align: center;
}

form {
	margin-top:10%;
	flex: 0 0 100%;
}

.form-control {
	width: 100%;
	border: none;
	border-bottom: 1px solid #FFD700;
	background: none;
	outline: none;
	padding: 10px 5px;
	margin-top: 20px;
	color: #fff;
}
.error{
	color:red;
}
label {
	display: block;
	padding-bottom: 20px;
	color: #FFD700;
	<!-- text-align: left; -->
}

.form-control::placeholder {
	color: #FFD700;
}

.formButton {
	border: 1px solid transparent;
	padding: 1rem 3rem;
	background-color: rgb(80,80,80);
	color:#FFD700;
	border-radius: 50px;
	
	margin: 1rem 25%;
	font-size: 1rem;
	transition: transform 0.3s ease, box-shadow 0.3s ease;
}
.card-header .form-header.active a{
	text-decoration: none;
	color: black;
}
.formButton:hover {
	box-shadow: 3px 5px 15px #FFD700;
	transform: translateY(-5px);
}

.toggleForm {
	<!-- visibility: hidden; -->
	opacity: 0;
	transition: opacity 0.3s, visibility 0.3s;
}