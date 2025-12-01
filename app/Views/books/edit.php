<!DOCTYPE html>
<html>
<head>
    <title>Edit Book</title>
</head>
<body>

<h1>Edit Book</h1>

<?php if(isset($validation)): ?>
    <div style="color:red;">
        <?= $validation->listErrors(); ?>
    </div>
<?php endif; ?>

<form action="/books/update/<?= $book['id']; ?>" method="post">

    <label>Title:</label><br>
    <input type="text" name="title" value="<?= esc($book['title']); ?>"><br><br>

    <label>Author:</label><br>
    <input type="text" name="author" value="<?= esc($book['author']); ?>"><br><br>

    <label>Genre:</label><br>
    <input type="text" name="genre" value="<?= esc($book['genre']); ?>"><br><br>

    <label>Year:</label><br>
    <input type="number" name="year" value="<?= esc($book['year']); ?>"><br><br>

    <button type="submit">Update</button>
</form>

</body>
</html>