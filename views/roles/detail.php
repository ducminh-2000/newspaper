<h1>Chi tiết các quyền</h1>

<table class="table table-bordered">
    <tr>
        <th>ID</th>
        <td><?php echo $role['id']; ?></td>
    </tr>
    <tr>
        <th>Name</th>
        <td><?php echo $role['name']; ?></td>
    </tr>
    <tr>
        <th>Created_at</th>
        <td>
            <?php echo date('d-m-Y H:i:s', strtotime($role['created_at'])); ?>
        </td>
    </tr>
    <tr>
        <th>Updated_at</th>
        <td>
            <?php echo date('d-m-Y H:i:s', strtotime($role['updated_at'])); ?>
        </td>
    </tr>
</table>
<a class="btn btn-primary" href="index.php?controller=role">Back</a>

