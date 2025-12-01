<!DOCTYPE html>
<html>
<head>
    <title>Add Book</title>
</head>
<body>

<h1>Add New Book</h1>

<?php if(isset($validation)): ?>
    <div style="color:red;">
        <?= $validation->listErrors(); ?>
    </div>
<?php endif; ?>

<form action="/books/store" method="post" enctype="multipart/form-data">
    <label>Title:</label><br>
    <input type="text" name="title"><br><br>

    <label>Author:</label><br>
    <input type="text" name="author"><br><br>

    <label>Genre:</label><br>
    <input type="text" name="genre"><br><br>

    <label>Year:</label><br>
    <input type="number" name="year"><br><br>

    <label>Cover Image:</label><br>
    <input type="file" name="image"><br><br>

    <button type="submit">Save</button>
</form>

</body>
</html>