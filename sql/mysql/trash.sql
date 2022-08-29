-- Admins 
create table t_administrators(
    _id bigint auto_increment not null,
    _uuid varchar(40) not null,
    _last_name varchar(160) not null,
    _first_name varchar(160) not null,
    _email varchar(255) not null,
    _identifier varchar(32) not  null,
    _password varchar(70) not null,
    _access_level enum("user","admin") default "user",
    _inserted_at datetime default now(),
    _updated_at datetime default now(),
    primary key(_id),
    constraint u_administrators_uuid unique(_uuid),
    constraint u_administrators_email unique(_email),
    constraint u_administrators_identifier unique(_identifier)
    
) engine = innodb default charset utf8 ;

-- default user 

insert into t_administrators(_uuid, _last_name, _first_name, _email, _identifier,_password, _access_level) values ('Admin','Admin','admin','admin@gmail.com','admin','admin','admin');
insert into t_administrators(_uuid, _last_name, _first_name, _email, _identifier,_password, _access_level) values ('User','user','user','user@gmail.com','user','$2y$12$QVrP0XX1rLMwkyHDr2U5PerJOUn/6V3OUTaxSMo7o7Yyq12ip8/YS','user');



create table t_trashs(
    _id bigint auto_increment not null,
    _uuid varchar(40) not null,
    _longitude text not null,
    _latitude text not null,
    _author bigint not null,
    _address varchar(160) not null,
    _inserted_at datetime default now(),
    _updated_at datetime default now(),
    primary key(_id),
    constraint u_trashs_uuid unique(_uuid),
    constraint fk_trashs_administrators foreign key(_author) references t_administrators(_id)
    
) engine = innodb default charset utf8 ;

create table t_trash_status(
    _id bigint auto_increment not null,
    _uuid varchar(40) not null,
    _status varchar(40) not null,
    _full_level int(3) not null,
    _trash bigint not null,
    _sent_at datetime default now(),
    primary key(_id),
    constraint u_administrators_uuid unique(_uuid),
    constraint fk_trashs foreign key(_trash) references t_trashs(_id)
    
) engine = innodb default charset utf8 ;