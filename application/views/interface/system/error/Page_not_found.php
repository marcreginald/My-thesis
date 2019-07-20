<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1" name="viewport" />

    <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&amp;subset=all" rel="stylesheet" type="text/css" />

    <!-- Page title -->
    <title><?= $page_title ?> | <?= $system_title ?></title>

    <link rel="icon" type="image/png" href="<?= $system_logo ?>">

    <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&amp;subset=all" rel="stylesheet" type="text/css" />
    <!-- icons -->
    <link href="<?= base_url() ?>assets/fonts/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
    <link rel="stylesheet" href="<?= base_url() ?>assets/plugins/iconic/css/material-design-iconic-font.min.css">
    <!-- bootstrap -->
    <link href="<?= base_url() ?>assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <!-- style -->
    <link rel="stylesheet" href="<?= base_url() ?>assets/css/pages/extra_pages.css">
    <!-- favicon -->
    <link rel="shortcut icon" href="http://radixtouch.in/templates/admin/smart/source/assets/img/favicon.ico" /> 

    <script src="<?= base_url() ?>assets/plugins/jquery/jquery.min.js" ></script>

</head>
<body>
    <div class="limiter">
        <div class="container-login100 page-background">
            <div class="wrap-login100">
                <form class="form-404">
                    <span class="login100-form-logo">
                        <img alt="" src="<?= base_url() ?>assets/img/logo-2.png">
                    </span>
                    <span class="form404-title p-b-34 p-t-27">
                        Error 404
                    </span>
                    <p class="content-404">The page you are looking for does't exist or an other error occurred.</p>
                    <div class="container-login100-form-btn">
                        <a href="<?= base_url() ?>dashboard" class="login100-form-btn">
                            Go to home page
                        </a>
                    </div>
                    <div class="text-center p-t-27">
                        <a class="txt1" href="#">
                            Need Help?
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- start js include path -->
    <!-- bootstrap -->
    <script src="<?= base_url() ?>assets/plugins/bootstrap/js/bootstrap.min.js" ></script>
    <script src="<?= base_url() ?>assets/js/pages/extra-pages/pages.js" ></script>
    <!-- end js include path -->

</body>
</html>