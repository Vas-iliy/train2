create table registration
(
    id       int auto_increment
        primary key,
    login    varchar(30) not null,
    password varchar(30) not null,
    constraint registration_login_uindex
        unique (login)
);

INSERT INTO train2.registration (id, login, password) VALUES (1, 'Vasiliy', '123');
INSERT INTO train2.registration (id, login, password) VALUES (3, '4525', 'fff');
INSERT INTO train2.registration (id, login, password) VALUES (4, 'gfdhtgr', 'reds');