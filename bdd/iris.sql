drop database if exists iris;
create database iris;
use iris;

create table users (
    iduser int(3) not null auto_increment,
    nomuser varchar(50),
    prenomuser varchar(50),
    pseudouser varchar(20) UNIQUE,
    emailuser varchar(255) UNIQUE,
    mdpuser varchar(255),
    lvl int not null default 1,
    primary key (iduser)
) ENGINE=InnoDB, charset=utf8;

drop function if exists count_pseudo;
delimiter //
create function count_pseudo (newpseudouser varchar(20))
returns int
begin
    select count(*) from users where pseudouser = newpseudouser into @result;
    return @result;
end//
delimiter ;

drop function if exists count_email;
delimiter //
create function count_email (newemailuser varchar(255))
returns int
begin
    select count(*) from users where emailuser = newemailuser into @result;
    return @result;
end//
delimiter ;

drop trigger if exists check_pseudo;
delimiter //
create trigger check_pseudo
before insert on users
for each row
begin
    if count_pseudo(new.pseudouser)
    then
        signal sqlstate '45000' set message_text = 'Ce pseudo est déjà utilisé !';
    end if;
end//
delimiter ;

drop trigger if exists check_email;
delimiter //
create trigger check_email
before insert on users
for each row
begin
    if count_email(new.emailuser)
    then
        signal sqlstate '45000' set message_text = 'Cet email est déjà utilisé !';
    end if;
end//
delimiter ;

insert into users values
(1, "Bourget", "Bruno", "Thavall", "bruno.bourget@gmail.com", "Nie7kie6oon", 1),
(2, "Authier", "Roger", "Imsels", "roget.authier@gmail.com", "Quo4lahch3", 1),
(3, "Varieur", "Jules", "Ornise", "jules.varieur@gmail.com", "Tue6ex2Jae", 1),
(4, "Bruaire", "Tom", "tombruaire", "tom.bruaire@gmail.com", "Ach3jal", 2),
(5, "Kini", "Nahel", "nahelkini", "nahel.kini@gmail.com", "JeieMoo7ou", 2),
(6, "Ben-Hamdoune", "Yassine", "yassinebenhamdoune", "yassine.ben-hamboune@gmail.com", "eiPh4oHu", 2),
(7, "ADMIN", "Test", "root", "admin@gmail.com", "root", 2),
(8, "USER", "Test", "user", "user@gmail.com", "user", 1);

create table grainSel (
    nb varchar(255) not null primary key
) ENGINE=InnoDB;

insert into grainSel values
("1236789015678909876543456");

select nb into @nbSel from grainSel;

update users set mdpuser = md5(concat(mdpuser, @nbSel));

create table professeurs (
    idprofesseur int(3) not null auto_increment,
    nomprofesseur varchar(50),
    prenomprofesseur varchar(50),
    adresseprofesseur varchar(255),
    diplomeprofesseur varchar(50),
    primary key (idprofesseur)
) ENGINE=InnoDB, charset=utf8;

insert into professeurs values
(1, "Ben Ahmed", "Oka", "5 rue de Paris", "Master"),
(2, "Chouaky", "Abdel", "18 avenue Pompidou", "Master");

create table materiels (
    idmateriel int(3) not null auto_increment,
    designationmateriel varchar(50),
    dateachatmateriel date,
    etatmateriel enum('Bon état', 'Mauvais état'),
    primary key (idmateriel)
) ENGINE=InnoDB, charset=utf8;

insert into materiels values
(1, "PC Portable", "2021-09-05", "Bon état"),
(2, "Téléphone Portable", "2021-09-25", "Mauvais état");

create table categories (
    idcategorie int(3) not null auto_increment,
    libellecategorie varchar(50),
    fournisseurcategorie varchar(50),
    primary key (idcategorie)
) ENGINE=InnoDB, charset=utf8;

insert into categories values
(1, "Informatique", "Asus"),
(2, "Jeux-video", "Nintendo");

create table locations (
    idlocation int(3) not null auto_increment,
    datelocation date,
    heurelocation time,
    dureelocation int(3),
    idprofesseur int(3),
    idmateriel int(3),
    primary key (idlocation),
    foreign key (idprofesseur) references professeurs (idprofesseur)
    on delete cascade
    on update cascade,
    foreign key (idmateriel) references materiels (idmateriel)
    on delete cascade
    on update cascade
) ENGINE=InnoDB;

insert into locations values
(1, "2021-10-01", "09:00:00", 120, 1, 1),
(2, "2021-10-05", "10:00:00", 60, 2, 2);

create or replace view locationsProfsMats as (
    select l.idlocation, l.datelocation, l.heurelocation, l.dureelocation, p.nomprofesseur, p.prenomprofesseur, m.designationmateriel
    from locations l, professeurs p, materiels m
    where l.idprofesseur = p.idprofesseur and l.idmateriel = m.idmateriel
);

drop table if exists tentatives;
create table tentatives (
    idtentative int(1) not null auto_increment,
    nbtentative int(1),
    primary key (idtentative)
) ENGINE=InnoDB;
