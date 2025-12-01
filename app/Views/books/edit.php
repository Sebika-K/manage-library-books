<!DOCTYPE html>
<html>
<head>
    <title>Edit Book</title>
</head>
<body>
<?= $this->include('layouts/header'); ?>

<h1>Edit Book</h1>

<?php if(isset($validation)): ?>
    <div style="color:red;">
        <?= $validation->listErrors(); ?>
    </div>
<?php endif; ?>

<form action="/books/update/<?= $book['id']; ?>" method="post" enctype="multipart/form-data">

    <label>Title:</label><br>
    <input type="text" name="title" value="<?= esc($book['title']); ?>"><br><br>

    <label>Author:</label><br>
    <input type="text" name="author" value="<?= esc($book['author']); ?>"><br><br>

    <label>Genre:</label><br>
    <input type="text" name="genre" value="<?= esc($book['genre']); ?>"><br><br>

    <label>Year:</label><br>
    <input type="number" name="year" value="<?= esc($book['year']); ?>"><br><br>

    <p>Current Image:</p>

    <?php if ($book['image_path']): ?>
        <img src="/uploads/<?= $book['image_path']; ?>" width="100">
    <?php else: ?>
        <p>No image available</p>
    <?php endif; ?>

    <br><br>

    <label>Upload New Image:</label><br>
    <input type="file" name="image"><br><br>

    <button type="submit">Update</button>
</form>
<?= $this->include('layouts/footer'); ?>

</body>
</html>