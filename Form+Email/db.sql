DROP DATABASE IF EXISTS contato;

CREATE DATABASE contato DEFAULT CHARACTER SET utf8 DEFAULT COLLATE utf8_general_ci;

USE contato;


CREATE TABLE tbl_contact(
    con_id INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
    con_name VARCHAR (50) NOT NULL,
    con_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    con_email VARCHAR (100) NOT NULL,
    con_tel VARCHAR (20) NOT NULL,
    cont_sub ENUM ('sugestao','critica', 'elogio','outro'),
    con_tent TEXT NOT NULL
);
