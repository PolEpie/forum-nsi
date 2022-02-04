create table if not exists users
(
    username varchar(255) not null
    primary key,
    password varchar(255) not null,
    constraint users_username_uindex
    unique (username)
    );

