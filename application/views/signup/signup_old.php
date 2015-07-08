<h2>Signup</h2>
<form action="" method="post">
    <table>
        <tr>
            <td>First Name:</td>
            <td><input type="text" name="fname" id="fname" value="<?= set_value('fname'); ?>" ><?= form_error('fname') ?></td>
        </tr>
        <tr>
            <td>Last Name:</td>
            <td><input type="text" name="lname" id="lname" value="<?= set_value('lname'); ?>" ><?= form_error('lname') ?></td>
        </tr>
        <tr>
            <td>Email:</td>
            <td><input type="text" name="email" id="email" value="<?= set_value('email'); ?>" ><?= form_error('email') ?></td>
        </tr>
        <tr>
            <td>Password:</td>
            <td><input type="password" name="password" id="password"><?= form_error('password') ?></td>
        </tr>
        <tr>
            <td>Confirm Password:</td>
            <td><input type="password" name="password2" id="password2"><?= form_error('password2') ?></td>
        </tr>
        <tr>
            <td>Phone:</td>
            <td><input type="text" name="phone" id="phone" value="<?= set_value('phone'); ?>" ><?= form_error('phone') ?></td>
        </tr>
        <tr>
            <td>Website:</td>
            <td><input type="text" name="website" id="website" value="<?= set_value('website'); ?>" ><?= form_error('website') ?></td>
        </tr>
        <tr>
            <td colspan="2"><input type="submit" value="Submit"></td>
        </tr>
    </table>
</form>
