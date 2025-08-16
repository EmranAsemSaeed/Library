<h2>Books</h2>
<form method="post">
    Title: <input type="text" name="title">
    Author: <input type="text" name="author">
    <button type="submit" name="addBook">Add</button>
</form>

<table border="1">
<tr><th>ID</th><th>Title</th><th>Author</th><th>Action</th></tr>
<?php foreach($books as $b): ?>
<tr>
    <td><?= htmlspecialchars($b['id']) ?></td>
    <td><?= htmlspecialchars($b['title']) ?></td>
    <td><?= htmlspecialchars($b['author']) ?></td>
    <td><a href="?deleteBook=<?= $b['id'] ?>">Delete</a></td>
</tr>
<?php endforeach; ?>
</table>

<!-- Display error message under the table -->
<?php if(!empty($controller->errorMessage)): ?>
    <p style="color:red; font-weight:bold;"><?= $controller->errorMessage ?></p>
<?php endif; ?>
