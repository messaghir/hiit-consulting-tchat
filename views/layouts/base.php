<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Hiit Consulting - Test</title>
    <link rel="stylesheet" type="text/css" href="/assets/libs/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css"/>
    <link rel="stylesheet" type="text/css" href="/assets/css/app.css">
</head>
<body>

<div class="d-flex flex-column flex-md-row align-items-center p-3 px-md-4 mb-3 bg-white border-bottom shadow-sm">
    <h5 class="my-0 mr-md-auto font-weight-normal">Hiit Consulting - Test</h5>
    
    <?php if(false === (new \App\Core\Auth())->isLogged()) : ?>
        <a class="btn btn-outline-success mr-1" href="/login">Log in</a>
        <a class="btn btn-outline-success" href="/register">Register</a>
    <?php else : ?>
        <span class="btn btn-outline-success mr-1"><?php echo (new \App\Core\Auth())->getUser()->username; ?></span>
        <a class="btn btn-outline-success" href="/login/logout">Sign out</a>
    <?php endif; ?>
</div>

<?php echo $content; ?>

<script src="/assets/libs/jquery/jquery.min.js"></script>
<script src="/assets/libs/bootstrap/js/bootstrap.min.js"></script>
<script src="/assets/libs/momentjs/moment-with-locales.js"></script>
<script src="/assets/js/app.js"></script>
<script src="/assets/js/message.js"></script>
<?php if((new \App\Core\Auth())->isLogged()) : ?>
<script>
    var message = new Message({
        currentUser: <?php echo (new \App\Core\Auth())->getUser()->id ?>
    });
    message.bindEvents();
</script>
<?php endif; ?>
</body>
</html>
