<!DOCTYPE html>
<html>
<head>
    <title>List of Books</title>
</head>
<body>
<?= $this->include('layouts/header'); ?>

<h2>List of Books</h2>

<?php if(session()->getFlashdata('success')): ?>
    <p style="color: green;"><?= session()->getFlashdata('success'); ?></p>
<?php endif; ?>

<a href="/books/create" class="btn-primary">+ Add New Book</a>

<table border="1" cellpadding="10" cellspacing="0">
    <tr>
        <th>Title</th>
        <th>Author</th>
        <th>Genre</th>
        <th>Year</th>
        <th>Image</th>
        <th>Actions</th>
    </tr>

    <?php foreach($books as $book): ?>
        <tr>
            <td><?= esc($book['title']); ?></td>
            <td><?= esc($book['author']); ?></td>
            <td><?= esc($book['genre']); ?></td>
            <td><?= esc($book['year']); ?></td>
            <td>
                <?php if ($book['image_path']): ?>
                    <img src="/uploads/<?= esc($book['image_path']); ?>" width="70">
                <?php else: ?>
                    <img src="/uploads/default.jpg" width="70">
                <?php endif; ?>
            </td>
            <td>
                <a href="/books/edit/<?= $book['id']; ?>" class="btn-primary" style="padding:6px 12px; font-size:14px;">Edit</a>

                <a href="/books/delete/<?= $book['id']; ?>" 
                onclick="return confirm('Delete this book?');"
                class="btn-primary"
                style="background-color:#d9534f; padding:6px 12px; font-size:14px;">
                Delete
                </a>
            </td>
        </tr>
    <?php endforeach; ?>
</table>
<?= $this->include('layouts/footer'); ?>

</body>
</html>