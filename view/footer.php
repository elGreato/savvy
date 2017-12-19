<!DOCTYPE html>
<html>

<head>
    <title>Footer with Map</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.min.css">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/Footer-with-map.css">
</head>

<body>
<div class="content">
</div>
<footer id="myFooter">
    <div class="container">
        <div class="row">
            <div class="col-sm-3">
                <h5>Get started</h5>
                <ul>
                    <li><a href="<?php echo $GLOBALS["ROOT_URL"]; ?>">Home</a></li>
                    <li><a href="<?php echo $GLOBALS["ROOT_URL"]; ?>/register">Sign up</a></li>
                    <li><a href="https://fhnw.ch">Contact FHNW</a></li>
                </ul>
            </div>
            <div class="col-sm-3">
                <h5>About us</h5>
                <ul>
                    <li><a href="#">Company Information</a></li>
                    <li><a href="#">Contact us</a></li>
                    <li><a href="#">Reviews</a></li>
                </ul>
            </div>
            <div class="col-sm-3">
                <h5>Support</h5>
                <ul>
                    <li><a href="#">FAQ</a></li>
                    <li><a href="#">Help desk</a></li>
                    <li><a href="#">Forums</a></li>
                </ul>
            </div>
            <div class="col-sm-3">
                <h5>Legal</h5>
                <ul>
                    <li><a href="#">Terms of Service</a></li>
                    <li><a href="#">Terms of Use</a></li>
                    <li><a href="#">Privacy Policy</a></li>
                </ul>
            </div>
        </div>
        <!-- Here we use the Google Embed API to show Google Maps. -->
        <!-- In order for this to work in your project you will need to generate a unique API key.  -->
        <iframe
                width="100%"
                height="150"
                frameborder="0" style="border:0"
                src="https://www.google.com/maps/embed/v1/place?key=AIzaSyAj92hP8xIdJpch1SaKDN9YpbFQEyYDnns
    &q=fhnw+basel,switzerland" allowfullscreen>
        </iframe>
    </div>
    <div class="social-networks">
        <a href="#" class="twitter"><i class="fa fa-twitter"></i></a>
        <a href="#" class="facebook"><i class="fa fa-facebook"></i></a>
        <a href="#" class="google"><i class="fa fa-google-plus"></i></a>
    </div>
    <div class="footer-copyright">
        <p>© 2016 Copyright Text </p>
    </div>
</footer>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</body>

</html>
