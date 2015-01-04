<h1 id="admin">Administrator Login</h1>
<?php echo validation_errors(); ?>
<form id="login" action="<?php echo site_url('index.php/verifylogin') ?>" method="post" accept-charset="utf-8">
    <ul>
        <li>
            <label for="username">Username:</label>
            <input type="text" id="username" name="username"/>
        </li>

        <li>
            <label for="password">Password:</label>
            <input type="password" id="password" name="password"/>
        </li>

        <li>
            <input type="submit" value="Login"/>
        </li>
    </ul>
</form>
