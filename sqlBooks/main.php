<!DOCTYPE html>

<html lang="ru">
    <head>
        <meta charset="UTF-8">
        <title>sql Книги</title>
    </head>
    <body>
            <?php
            include_once './filter_input.php'; // Включаем фильтр
            $request_inp = my_filter_function (); // Передаем данные в фильтр по $_GET (филтр его непосредственно принимает)
            $pdo = new PDO("mysql:host=localhost; dbname=global; charset=utf8", "evolchanov", "neto1822"); // Создаем объект запроса
            
            /* Формируем запрос в базу данных на основе введенных пользователем данных */
            
            if (isset($request_inp)) {
                $sqlAll = "select * from books where";
                $ISBN = '';
                $author = '';
                $book_name = '';
                if (!empty($request_inp['ISBN'])) { // Проверяем ввел ли пользователь ISBN
                    iconv_strlen($book_name, 'UTF-8') > 5 || iconv_strlen($author, 'UTF-8') > 5 ? $and = ' and' : $and = ''; // Проверяем больше ли ISBN 5 символов
                    $ISBN = $and . ' ISBN = ' . "'". $request_inp['ISBN'] ."'"; // Формируем ISBN как элемент запроса
                    $sqlAll = $sqlAll . $ISBN; // Добавляем ISBN  к запросу
                } 
                if (!empty($request_inp['book_name'])) { // Проверяем введен ли book_name
                    iconv_strlen($ISBN, 'UTF-8') > 5 || iconv_strlen($author, 'UTF-8') > 5 ? $and = ' and' : $and = ''; // Проверяем больше ли book_name 5 символов
                    $book_name = $and . ' name = ' . "'". $request_inp['book_name'] ."'"; // Формируем элемент запроса
                    $sqlAll = $sqlAll . $book_name; // Добаляем к запросу
                }
                if (!empty($request_inp['author'])) { // Проверяем введен ли author
                    iconv_strlen($ISBN, 'UTF-8') > 5 || iconv_strlen($book_name, 'UTF-8') > 5 ? $and = ' and' : $and = ''; // Проверяем больше ли author 5 символов
                    $author = $and . ' author = ' . "'". $request_inp['author'] ."'"; // Формируем запрос для author
                    $sqlAll = $sqlAll . $author; // Добавляем author к запросу
                }
            }
            else { // Формируем запрос для БД "по умолчанию"
            $sqlAll = "SELECT * FROM `books` LIMIT 50"; // Это и есть запрос по умолчанию
            }
            $stmtGetAll = $pdo->prepare($sqlAll);
            $stmtGetAll->execute();
            $getSqlAll = $stmtGetAll->fetchAll(PDO::FETCH_ASSOC);
            ?>
    </body>
</html>
