# Guide d'installation

1. `git clone https://github.com/essaghirm/hiit-consulting-tchat.git`
2. `cd hiit-consulting-tchat`
3. Ajouter votre propre paranetres de configuration pour la base de données dans config/app.php

```
return [
    'database' => [
        'driver'    => 'mysql',
        'host'      => 'localhost',
        'port'      => '8889',
        'database'  => 'hiit_consulting_test_db',
        'username'  => 'root',
        'password'  => 'root',
        'charset'   => 'utf8',
    ],
];
```

4. lancez le script sql [hiit_consulting_test_db.sql](hiit_consulting_test_db.sql)
5. `cd public`
6. `run server: php -S localhost:8000`

:+1:
