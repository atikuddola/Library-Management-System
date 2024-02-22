<!DOCTYPE html>
<html>
<head>
	<title>
		Admin
	</title>
	<link rel="stylesheet" type="text/css" href="style.css">
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
	<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
	
	<style type="text/css">
	.wrapper
        {
            width: 100%;
            background-color: white;
        }

        header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 15px;
            background-color: black;
        }

        .logo img {
            vertical-align: middle;
            width: 110px; /* Adjust the width of the photo */
            height: 48px; /* Adjust the height of the photo */
            margin-right: 20px; /* Add some spacing between the photo and text */
            border-radius: 5px;
        }


        nav {
            float: right;
            word-spacing: 30px;
            padding: 20px;
        }
        nav ul {
            list-style: none;
            margin: 0;
            padding: 0;
            display: flex;
            align-items: center;
            justify-content: flex-end;
            gap: 30px; /* Add a small gap between the links */
        }
        nav li {
            line-height: 20px;
        }

        nav li:first-child {
            margin-left: 0;
        }

        nav li:last-child {
            margin-right: 15px; /* Remove margin for the last list item */
        }

        nav li a {
            font-family: 'Open Sans', sans-serif;
            font-weight: 215;
            font-size: 17px;
            color: white; /* Set the text color to white */
            text-decoration: none;
        }

        section .sec_img {
            height: 100vh;
            margin-top: 0px;
            background-image: url("images/homeblurbg.jpg");
            background-size: cover;
            background-position: center;
            position: relative;
            backdrop-filter: blur(50px); /* Apply blur effect to the entire section */
        }

        .middle-content {
            position: absolute;
            top: 50%;
            left: 35%;
            transform: translate(-50%, -50%);
            color: white;
            padding: 70px 0px;
        }

        .middle-content h2 {
            font-family: 'Roboto', sans-serif;
            font-weight: bold;
            font-size: 90px;
            text-align: left;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.7);
            padding-bottom: 15px;
        }

        .middle-content p {
            font-family: 'Open Sans', sans-serif;
            font-weight: 390;
            font-size: 24px;
            line-height:31px;
            text-align: left;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.8);
            
        }
        .get-started-button {
            display: inline-block;
            padding: 15px 20px;
            background-color: brown;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            margin-top: 20px;
            font-weight: bold;
            transition: background-color 0.3s ease;
        }

        .get-started-button:hover {
            background-color: #8b5c2d; /* Darker brown color on hover */
        }
    </style>
</head>


<body>
	<div class="wrapper">
	<header>
    <div class="logo">
        <img src="images/libra.png" alt="Logo">
    </div>
	<nav>
		<ul>
			<li><a href="books_admin.php">BOOKS</a></li>
			<li><a href="index.php">LOGOUT</a></li>
			<li><a href="feedback_view.php">FEEDBACK</a></li>
			
		</ul>
	</nav>
	</header>
        <section>
            <div class="sec_img">
                <div class="middle-content">
                    <h2>Library</h2>
                    <h2>Management System</h2>
                    <p>Reimagining libraries with innovation, our solution simplifies book processes and profiles, creating a seamless experience for administrators and students.</p>
                </div>
            </div>
        </section>
		<footer>
            <div class="footer-buttons">
                <a href="https://www.facebook.com/your-page-link" target="_blank">
                    <i class="fab fa-facebook fa-3x"></i> <!-- Facebook icon -->
                </a>
                <a href="https://www.instagram.com/your-page-link" target="_blank">
                    <i class="fab fa-instagram fa-3x"></i> <!-- Instagram icon -->
                </a>
                <a href="https://www.linkedin.com/your-page-link" target="_blank">
                    <i class="fab fa-linkedin fa-3x"></i> <!-- LinkedIn icon -->
                </a>
                <a href="https://www.twitter.com/your-page-link" target="_blank">
                    <i class="fab fa-twitter fa-3x"></i> <!-- Twitter icon -->
                </a>
            </div>
        </footer>
    </div>
</body>
</html>