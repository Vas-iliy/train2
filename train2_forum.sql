create table forum
(
    id    int auto_increment
        primary key,
    login varchar(30)   not null,
    text  varchar(8000) not null,
    date  varchar(30)   not null
);

