<!DOCTYPE html>
<html>
<head>
    <title>List of Books</title>
</head>
<body>

<h1>List of Books</h1>

<?php if(session()->getFlashdata('success')): ?>
    <p style="color: green;"><?= session()->getFlashdata('success'); ?></p>
<?php endif; ?>

<a href="/books/create">Add New Book</a>

<table border="1" cellpadding="10" cellspacing="0">
    <tr>
        <th>Title</th>
        <th>Author</th>
        <th>Genre</th>
        <th>Year</th>
        <th>Actions</th>
    </tr>

    <?php foreach($books as $book): ?>
        <tr>
            <td><?= esc($book['title']); ?></td>
            <td><?= esc($book['author']); ?></td>
            <td><?= esc($book['genre']); ?></td>
            <td><?= esc($book['year']); ?></td>
            <td>
                <a href="/books/edit/<?= $book['id']; ?>">Edit</a> |
                <a href="/books/delete/<?= $book['id']; ?>" onclick="return confirm('Delete this book?');">Delete</a>
            </td>
        </tr>
    <?php endforeach; ?>
</table>

</body>
</html>