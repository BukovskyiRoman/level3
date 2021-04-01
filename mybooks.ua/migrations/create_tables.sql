CREATE TABLE `books`
(
    `id`          INT AUTO_INCREMENT,
    `title`       VARCHAR(255),
    `description` VARCHAR(255),
    `author`      VARCHAR(255),
    `sheets`      INT NOT NULL DEFAULT 0,
    `year_pub`    INT NOT NULL DEFAULT 0,
    `click_book`  INT NOT NULL DEFAULT 0,
    `click_get`   INT NOT NULL DEFAULT 0,
    `isbn`        INT,
    `deleted`     DATE,
    PRIMARY KEY (id)
);