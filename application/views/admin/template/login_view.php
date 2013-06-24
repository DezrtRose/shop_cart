<!DOCTYPE HTML>
<html>
<head>
    <title>My Shopping - CMS</title>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>/style/bootstrap/css/user_bootstrap.css" />
</head>
<body>
    <div class="container">
        <div>
            <form id="my_form" action="<?php echo base_url() ?>login/" method="post" class="well form-actions">
                <fieldset>
                    <legend>Login Form</legend>
                    <span class="text-error"><?php echo $this -> session -> flashdata('error') ?></span>
                    <ul class="unstyled">
                        <li>
                            <label>Username : </label>
                        </li>
                        <li>
                            <input type="text" name="username" id="username" placeholder="Username" />
                        </li>
                        <li>
                            <label>Password : </label>
                        </li>
                        <li>
                            <input type="password" name="password" id="password" placeholder="Password" />
                        </li>
                        <li>
                            <button type="submit" value="submit" name="submit" class="btn btn-primary"><i class="icon-step-forward"></i> Sign In</button>
                        </li>
                    </ul>
                </fieldset>
            </form>
        </div>
    </div>
</body>
</html>