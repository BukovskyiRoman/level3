<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Тег table</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <link rel="stylesheet" href="/css/table.css">
</head>
<body>

<h1><br>Бібліотека Ш++</br></h1>

<div>
    <table class="table table-success table-striped">
        <thead>
        <tr>
            <th>Назва книги</th>
            <th>Автор</th>
            <th>Рік</th>
            <th>Перегляди</th>
            <th>Взяти книгу</th>
            <th>Дія</th>
            <th>Видалено</th>
        </tr>
        </thead>

        <colgroup>
            <col class="col1"/>
            <col span="1" class="col1"/>
        </colgroup>

        <tbody>
        <?php foreach ($books as $book): ?>
            <tr>
                <td><?= $book['title'] ?></td>
                <td><?= $book['author'] ?></td>
                <td><?= $book['year_pub'] ?></td>
                <td><?= $book['click_book'] ?></td>
                <td><?= $book['click_get'] ?></td>
                <td><a href="http://mybooks.ua/admin/delete/?id=<?= $book['id'] ?>">Видалити</a></td>
                <td><?= $book['deleted'] ?></td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>

    <div class="d-grid gap-2">
        <button class="btn btn-primary" type="button" onclick="window.location.href ='http://logout@mybooks.ua/admin/'">Вихід/Exit</button>
    </div>

    <div class="d-grid gap-2">
        <?php if ($pagination->countPages > 1): ?>
            <?=$pagination; ?>
        <?php endif; ?>
    </div>

</div>

<form method="POST" class="form-floating" action="/admin/add" enctype="multipart/form-data">
    <div class="form-col-left">

        <div class="image">
            <span id="output"></span>
        </div>

        <div class="mb-3">
            <input type="text" class="form-control" name="title" placeholder="Назва книги">
        </div>

        <div class="mb-3">
            <input type="text" class="form-control" name="year" placeholder="Рік видання">
        </div>

        <div class="input-group mb-3">
            <label class="input-group-text">Вибір зображення:</label>
            <input type="file" id="file" name="file" class="form-control" multiple accept="image/*"/>
        </div>

    </div>

    <div class="form-col-right container">

        <div class="mb-3">
            <input class="form-control" name="author1" placeholder="Автор">
        </div>

        <div class="mb-3">
            <input class="form-control" name="author2" placeholder="Автор">
        </div>

        <div class="mb-3">
            <input class="form-control" name="sheets" placeholder="Кількість сторінок">
        </div>
        <div class="mb-3">
            <textarea class="form-control" name="description" rows="3" placeholder="Опис книги"></textarea>
        </div>

        <div class="mb-3">
            <input type="submit" value="Додати">
        </div>

    </div>

    <script>
        function handleFileSelect(evt) {
            var file = evt.target.files;                        // FileList object
            var f = file[0];
            // Only process image files.
            if (!f.type.match('image.*')) {
                alert("Image only please....");
            }
            var reader = new FileReader();
            // Closure to capture the file information.
            reader.onload = (function (theFile) {
                return function (e) {
                    // Render thumbnail.
                    var span = document.createElement('span');
                    span.innerHTML = ['<img class="thumb" width="111" height="145" title="', escape(theFile.name),
                        '" src="', e.target.result, '" />'].join('');
                    document.getElementById('output').insertBefore(span, null);
                };
            })(f);
            // Read in the image file as a data URL.
            reader.readAsDataURL(f);
        }
        document.getElementById('file').addEventListener('change', handleFileSelect, false);
    </script>
</form>
</body>
</html>
