<?php
//print(password_verify('myPass', '$2y$10$FQBma9NNszvozpqmqgHgaO4kzpTDtqVvHCu5VqIBhTOJUnoFoVqpa'))?'Совпадает':'Не совпадает';
$hash = password_hash('pass', PASSWORD_DEFAULT);
print($hash === '$2y$10$FQBma9NNszvozpqmqgHgaO4kzpTDtqVvHCu5VqIBhTOJUnoFoVqpa')?'Хаши одинковые':'Хаши разные';
print '<br>';
print $hash;
print '<br>';
//print '$2y$10$FQBma9NNszvozpqmqgHgaO4kzpTDtqVvHCu5VqIBhTOJUnoFoVqpa';
print '<br>';
print_r(password_verify('user', '$2y$10$zAzCdsjb.xVbTztPsWAbEOFViJh9wK.ymCavobY0XyrUwAAGGPeGe'));

