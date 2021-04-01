<div class="container">
    <section id="main" class="main-wrapper">
        <div class="container">
            <div id="content" class="col-xs-12 col-sm-12 col-md-12 col-lg-12">

                <?php if (!empty($books)) : ?>
                    <?php foreach ($books as $book): ?>

                        <div data-book-id="<?= $book['id'] ?>" class="book_item col-xs-6 col-sm-3 col-md-2 col-lg-2">
                            <div class="book">
                                <a href="http://mybooks.ua/book/<?= $book['id'] ?>"><img
                                        src="/libs/books-page/books-page_files/<?= $book['id'] ?>.jpg"
                                        alt="<?= $book['title'] ?>">
                                    <div data-title="<?= $book['title'] ?>" class="blockI" style="height: 46px;">
                                        <div data-book-title="<?= $book['title'] ?>"
                                             class="title size_text"><?= $book['title'] ?></div>
                                        <div data-book-author="<?= $book['author'] ?>"
                                             class="author"><?= $book['author'] ?></div>
                                    </div>
                                </a>
                                <a href="http://mybooks.ua/book/<?= $book['id'] ?>">
                                    <button type="button" class="details btn btn-success">Читать</button>
                                </a>
                            </div>
                        </div>

                    <?php endforeach; ?>


                    <div class="text-center">
                        <?php if ($pagination->countPages > 1): ?>
                            <?=$pagination; ?>
                        <?php endif; ?>

                    </div>

                <?php endif; ?>

            </div>
        </div>
    </section>
</div>
