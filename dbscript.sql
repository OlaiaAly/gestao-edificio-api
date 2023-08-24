use domiciliarymanagement;
-- show tables;
/*alter table produto drop foreign key produto_ibfk_1;*/
create table building
(
	id int not null auto_increment,
    _name varchar(60) not null,
    _number int not null,
    _apartments int not null,
    _city varchar(30),
    _district varchar(30),
    _street varchar(30),
    _imagem varchar(60) not null unique,
    constraint primary key pK_ID(id)
) engine InnoDB;

create table apartment
(
    id int not null auto_increment,
    _idbuilding int not null,
    _name varchar(60) not null,
    _number int not null,
    _status int not null,
    _price float,
    constraint primary key PK_ID(id),
    constraint foreign key FK_BUILDING(_idbuilding) references building(id) on delete cascade
) engine InnoDB;

create table costumer
(
    id int not null auto_increment,
    _name varchar(30) not null,
    _surname varchar(30) not null,
    _email varchar(40) not null,
    _contact varchar(20),
    _nuit int not null,
    _status int default 0,
    constraint primary key FK_ID(id)
) engine InnoDB;

create table rent
(
    id int not null auto_increment,
    _costumer int not null,
    _apartment int not null,
    _created_at timestamp,
    _paymentdate timestamp,
    _price float,
    _status int default 0,
    constraint primary key PK_ID(id),
    constraint foreign key FK_COSTUMER(_costumer) references costumer(id) on delete cascade,
    constraint foreign key FK_APARTMENT(_apartment) references apartment(id) on delete cascade
)engine InnoDB;

create table payment
(
    id int not null auto_increment,
    _rent int not null,
    _month date,
    _reference varchar(20) not null,
    _paymentdate timestamp,
    _mpesanumber int not null,
    constraint primary key PK_ID(id),
    constraint foreign key FK_RENT(_rent) references rent(id) on delete cascade
) engine InnoDB;

create table manager
(
	id int auto_increment,  
    _name varchar(30) not null,
    _surname varchar(30) not null,
    _email varchar(50) not null,
    _password varchar(50) not null,
    _contact int not null,
    constraint primary key PK(id)
)engine InnoDB;
