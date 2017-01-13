<form action="/user/update" method="post">
    First name:<br>
    <input type="text" name="firstname" value="<?php echo $_SESSION['firstname']; ?>" required><br>
    Last name:<br>
    <input type="text" name="lastname" value="<?php echo $_SESSION['lastname']; ?>" required><br>
    Email (Username):<br>
    <input type="email" name="email" value="<?php echo $_SESSION['username']; ?>" required><br>
    Password<br>
    <input type="password" name="password" required><br>
    <input type="submit" value="Update" class="search-submit">
</form>