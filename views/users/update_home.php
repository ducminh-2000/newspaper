<div class='container' style="padding-top:110px">
<h2>Cập nhật user</h2>
<form action="" method="post" enctype="multipart/form-data">
    <div class="form-group">
        <label for="username">Username <span class="red">*</span></label>
        <input type="text" name="username" id="username"
               value="<?php echo isset($_POST['username']) ? $_POST['username'] : $user['username'] ?>" disabled
               class="form-control"/>
    </div>
    <div class="form-group">
        <label for="name">Name</label>
        <input type="text" name="name" id="name"
               value="<?php echo isset($_POST['name']) ? $_POST['name'] : $user['name'] ?>"
               class="form-control"/>
    </div>
    <div class="form-group">
        <label for="name">Password</label>
        <input type="text" name="password" id="password"
               value="<?php echo isset($_POST['password']) ? $_POST['password'] : '' ?>"
               class="form-control"/>
    </div>
    <div class="form-group">
        <input type="submit" name="submit" value="Save" class="btn btn-primary"/>
        <a href="index.php?controller=home&action=index" class="btn btn-default">Back to home</a>
    </div>
</form>
</div>