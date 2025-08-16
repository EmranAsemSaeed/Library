<h2>Users</h2>

<form method="post">
    Name: <input type="text" name="name">
    Email: <input type="text" name="email">
    <button type="submit" name="addUser">Add User</button>
</form>

<table border="1">
<tr><th>ID</th><th>Name</th><th>Email</th><th>Action</th></tr>
<?php foreach($users as $u): ?>
<tr>
    <td><?= htmlspecialchars($u['id']) ?></td>
    <td><?= htmlspecialchars($u['name']) ?></td>
    <td><?= htmlspecialchars($u['email']) ?></td>
    <td><a href="?deleteUser=<?= $u['id'] ?>">Delete</a></td>
</tr>
<?php endforeach; ?>
</table>

<!-- Display error message under the table -->
<?php if(!empty($userError)): ?>
    <p style="color:red; font-weight:bold;"><?= $userError ?></p>
<?php endif; ?>
