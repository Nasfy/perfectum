<?php
1.  CREATE TABLE `users`(
        `id` INT NOT NULL AUTO_INCREMENT,
        `login` VARCHAR(20) NOT NULL,
        PRIMARY KEY(`ID`)
    );

    CREATE TABLE `messages`(
        `id` INT NOT NULL AUTO_INCREMENT,
        `id_dialog` INT NOT NULL,
        `text` LONGTEXT NOT NULL,
        `date` TIMESTAMP NOT NULL,
        `from_id_user` NOT NULL,
        `to_id_user` NOT NULL,
        PRIMARY KEY(`ID`)
    );
    CREATE TABLE `dialogs`(
            `id_dialog` INT NOT NULL,
            `id` INT NOT NULL
    );
2. INSERT INTO ?
3.  SELECT `users.login` FROM `users`
    JOIN `messages.text` ON users.id_user = messages.from_id_user
    WHERE ((from_id = X) and (to_id = Y)) or ()(from_id = Y) and (to_id = X);
4.  SELECT `messages.id_dialog`, `messages.text` FROM `messages`
    JOIN `dialogs.user_id` ON `messages.id_dialog` = `dialogs.id_dialog`
    WHERE `dialog.user_id` = X ORDER BY `messages_id`;
5.  DELETE * FROM `messages` WHERE `message_id` = X;
6. DELETE * FROM `messages` WHERE `id_dialog` = X;
