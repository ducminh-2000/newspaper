<h1>Chi tiết thể loại</h1>

<table class="table table-bordered">
    <tr>
        <th>ID</th>
        <td><?php echo $type['id']; ?></td>
    </tr>
    <tr>
        <th>Name</th>
        <td><?php echo $type['name']; ?></td>
    </tr>
    <tr>
        <th>Created_at</th>
        <td>
            <?php echo date('d-m-Y H:i:s', strtotime($type['created_at'])); ?>
        </td>
    </tr>
    <tr>
        <th>Updated_at</th>
        <td>
            <?php echo date('d-m-Y H:i:s', strtotime($type['updated_at'])); ?>
        </td>
    </tr>
</table>
<a class="btn btn-primary" href="index.php?controller=type">Back</a>

