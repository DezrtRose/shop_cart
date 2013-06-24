<!DOCTYPE html>
<head>
    <title>
        My Shopping Online! - Shop What You Want Where You Want!
    </title>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>style/bootstrap/css/user_bootstrap.css" />
    <script type="text/javascript">
        $(document).ready(function() {
            $(".carousel").carousel({
                interval: 100
            });
        });
    </script>
</head>
<body>
    <div class="container">
        <div class="modal-header">
            <h1><a href="<?php echo base_url() ?>">My Shopping Online!</a></h1>
            <div class="pull-right" style="margin-top: -40px">
                <i class="icon-shopping-cart"></i>
                <a href="<?php echo base_url() ?>shopping_cart">
                     Cart (<?php echo count($this -> cart -> contents()) ?>)
                </a>
            </div>
        </div>


