DROP TABLE IF EXISTS users;

CREATE TABLE users (
    user_id INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
    user_name VARCHAR(50),
    user_user VARCHAR(50),
    user_pass TEXT,
    user_whatsapp VARCHAR(50),
    user_photo VARCHAR(50) DEFAULT 'default.png',
    user_admin BOOLEAN DEFAULT 0,
    user_last VARCHAR(50),
    user_created VARCHAR(50)
) ENGINE INNODB;

INSERT INTO
    users
VALUES
    (
        1,
        'Administrator',
        'admin',
        'admin',
        '00000000000',
        'default.png',
        1,
        '2023-01-01 00:00:00',
        '2023-01-01 00:00:00'
    );

DROP TABLE IF EXISTS tasks;

CREATE TABLE tasks (
    task_id INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
    task_name VARCHAR(50),
    task_desc TEXT,
    task_status INT DEFAULT 0,
    task_notify BOOLEAN DEFAULT 0,
    task_date VARCHAR(50),
    task_created VARCHAR(50),
    task_updated VARCHAR(50),
    user_id INT,
    FOREIGN KEY (user_id) REFERENCES users(user_id)
) ENGINE INNODB;