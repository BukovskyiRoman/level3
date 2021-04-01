INSERT INTO `book`(title,description,sheets, year_pub, click_book, click_get,deleted)
SELECT title,description,sheets, year_pub, click_book, click_get,deleted
FROM `books`;