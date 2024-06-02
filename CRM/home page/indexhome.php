<?php
session_start();
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRM Sellsy</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.19/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<!--GOOGLE FONTS-->
<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Fredoka+One&family=Play&display=swap" rel="stylesheet"> 

    <link rel="stylesheet" href="style.css">
    <style>
      @import url('https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,500;1,400&display=swap'); * { margin: 0; padding: 0; box-sizing: border-box; } html { font-size: 62.5%; font-family: 'Roboto', sans-serif; } li { list-style: none; } a { text-decoration: none; } body { margin: 0; overflow-x: hidden; background-color: #F0F4F8; } body::before { content: ""; position: absolute; top: 0; left: 0; width: 100%; height: 100%; background-size: cover; background-position: center; background-repeat: no-repeat; opacity: 0.9; z-index: -1; } .header { border-bottom: 1px solid #E2E8F0; background-color: #2b6cb0; /* Blue */ color: #fff; /* White */ } .navbar { display: flex; justify-content: space-between; align-items: center; padding: 1.5rem 1.5rem; } .hamburger { display: none; font-size: 1.6rem; cursor: pointer; color: #fff; /* White */ } .bar { display: block; width: 25px; height: 3px; margin: 5px auto; transition: all 0.3s ease-in-out; background-color: #fff; /* White */ } .nav-menu { display: flex; justify-content: space-between; align-items: center; } .nav-item { margin-left: 3rem; } .nav-link { font-size: 1.8rem; font-weight: 400; color: #fff; /* White */ transition: color 0.3s ease; } .nav-link:hover { color: #d1d5db; /* Gray */ } .nav-logo { font-size: 3rem; font-weight: 500; color: #fff; /* White */ } @media only screen and (max-width: 768px) { .nav-menu { position: fixed; left: -100%; top: 5rem; flex-direction: column; background-color: #2b6cb0; /* Blue */ width: 100%; border-radius: 10px; text-align: center; transition: 0.3s; box-shadow: 0 10px 27px rgba(0, 0, 0, 0.05); } .nav-link { color: #fff; /* White */ } .nav-menu.active { left: 0; } .nav-item { margin: 2rem 0; } .hamburger { display: block; } .hamburger.active .bar:nth-child(2) { opacity: 0; } .hamburger.active .bar:nth-child(1) { transform: translateY(8px) rotate(45deg); } .hamburger.active .bar:nth-child(3) { transform: translateY(-8px) rotate(-45deg); } }


        @keyframes fadeInUp {
            0% {
                opacity: 0;
                transform: translateY(20px);
            }

            100% {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes slideInLeft {
    from {
        opacity: 0;
        transform: translateX(-100px);
    }
    to {
        opacity: 1;
        transform: translateX(0);
    }
}

.animate-slideInLeft {
    animation: slideInLeft 2s ease-in-out forwards;
    animation-delay: 0.3s; /* Pour retarder l'animation de l'image */

}
@keyframes slideRight {
    from {
        opacity: 0;
        transform: translateX(100px);
    }
    to {
        opacity: 1;
        transform: translateX(0);
    }
}

.animate-slideRight {
    animation: slideRight 2s ease-in-out forwards;
    animation-delay: 0.3s; /* Pour retarder l'animation de l'image */
}
.animate-slideUp {
    animation: slideUp 4s ease-in-out forwards;
    animation-delay: 0.3s; /* Pour retarder l'animation de l'image */
    opacity: 0;
}
.footer{
background: rgb(30, 66, 170);
padding:30px 0px;
font-family: 'Play', sans-serif;
text-align:center;
}

.footer .row{
width:100%;
margin:1% 0%;
padding:0.6% 0%;
color:#fff;
font-size:1.5em;
}

.footer .row a{
text-decoration:none;
color:#fff;
transition:0.5s;
}

.footer .row a:hover{
color:#fff;
}

.footer .row ul{
width:100%;
}

.footer .row ul li{
display:inline-block;
margin:0px 30px;
}

.footer .row a i{
font-size:1.8em;
margin:0% 1%;
}

@media (max-width:720px){
.footer{
text-align:left;
padding:5%;
}
.footer .row ul li{
display:block;
margin:10px 0px;
text-align:left;
}
.footer .row a i{
margin:0% 3%;
}
}


@keyframes slideUp {
    from {
        opacity: 0;
        transform: translateY(50px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

    </style>
</head>

<body class="bg-blue-50">

<header class="header">
    <nav class="navbar text-blue-900">
        <a href="#" class="nav-logo">CRM</a>
        <ul class="nav-menu">
            <li class="nav-item">
                <a href="indexhome.php" class="nav-link">Acceuil</a>
            </li>
            <li class="nav-item">
                <a href="../index.php" class="nav-link">Essayer gratuitement</a>
            </li>
        </ul>
        <div class="hamburger">
            <span class="bar"></span>
            <span class="bar"></span>
            <span class="bar"></span>
        </div>
    </nav>
</header>
  

    <div class="container mx-auto py-12 px-4 flex flex-col lg:flex-row items-center mb-20">
     <div class="lg:w-3/4 lg:pr-8 text-center lg:text-left animate-slideInLeft">
        <h1 class="text-8xl font-bold text-blue-900 mb-4">Une seule plateforme digitale et bien plus qu'un CRM !</h1>
        <p class="text-4xl text-gray-700 mb-5">La suite CRM associe tous les outils digitaux et tous les conseils nécessaires pour vous aider à faire de la croissance.</p>
        <div class="flex flex-col lg:flex-row gap-4 justify-center lg:justify-start">
           <a href="../index.php" class="bg-blue-600 text-white py-6 my-7 px-10 text-3xl rounded-lg shadow-lg hover:bg-blue-700">Essayer gratuitement</a>
        </div>
    </div>
    <div class="lg:w-1/2 mt-12 lg:mt-0 animate-slideRight ">
        <div class="relative">
            <img src="IML.png" alt="Team working" class="w-full rounded-lg ">
        </div>
    </div>
</div>
<footer>
    <div class="footer text-blue-900 flex justify-between items-center">
        <div class="row">
            <a href="https://www.facebook.com/DelivriLi"><i class="fa fa-facebook" style="text-stroke: 2px white;"></i></a>
        </div>

        <div class="row">
            Pour toute question, veuillez contacter Delivrili :<br><br>
            0676972669<br>
            0559370255<br>
            0772813385<br><br>
            Copyright© DELIVRILI 2024 | Tous les droits sont réservés
        </div>

        <div class="row">
            Contact: <a href="mailto:contact@delivrili.com">contact@delivrili.com</a>
        </div>
    </div>
    
</footer>









    <script>
        const hamburger = document.querySelector('.hamburger');
        const navMenu = document.querySelector('.nav-menu');

        hamburger.addEventListener('click', () => {
            hamburger.classList.toggle('active');
            navMenu.classList.toggle('active');
        });

        window.addEventListener('scroll', () => {
    const slideUpElements = document.querySelectorAll('.animate-slideUp');
    const triggerPoint = window.innerHeight * 0.9;

    slideUpElements.forEach((element) => {
        const elementTop = element.getBoundingClientRect().top;

        if (elementTop < triggerPoint) {
            element.classList.add('animate-slideUp');
        }
    });
});

    </script>
</body>

</html>