<form action="/user/update" method="post">
    <?php echo $lang['ACCOUNT_FIRSTNAME'];?>:<br>
    <input type="text" name="firstname" value="<?php echo $_SESSION['firstname']; ?>" required><br>
    <?php echo $lang['ACCOUNT_LASTNAME'];?>:<br>
    <input type="text" name="lastname" value="<?php echo $_SESSION['lastname']; ?>" required><br>
    Email:<br>
    <input type="email" name="email" value="<?php echo $_SESSION['email']; ?>" required><br>
    <?php echo $lang['ACCOUNT_USERNAME'];?>:<br>
    <input type="text" name="username" value="<?php echo $_SESSION['username']; ?>" required><br>
    <?php echo $lang['ACCOUNT_PASSWORD'];?><br>
    <input type="password" name="password" required><br>
    <input type="submit" value="Update" class="search-submit">
</form>