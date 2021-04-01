-- Create table for books

CREATE TABLE `book`
(
    `id`          INT AUTO_INCREMENT,
    `title`       VARCHAR(255),
    `description` TEXT,
    `sheets`      INT NOT NULL DEFAULT 0,
    `year_pub`    INT NOT NULL DEFAULT 0,
    `click_book`  INT NOT NULL DEFAULT 0,
    `click_get`   INT NOT NULL DEFAULT 0,
    `isbn`        INT,
    `deleted`     DATE,
    PRIMARY KEY (id)
);

CREATE TABLE `authors`
(
    `id`     INT AUTO_INCREMENT,
    `author` VARCHAR(255),
    PRIMARY KEY (id)
);

CREATE TABLE `books_authors`
(
    `id`     INT AUTO_INCREMENT,
    `author_id` INT,
    `book_id` INT,
    `deleted` DATE,
    PRIMARY KEY (id)
);

