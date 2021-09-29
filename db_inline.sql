create database db_inline;

use db_inline;


CREATE USER 'inline'@'localhost' IDENTIFIED WITH mysql_native_password BY '03172005';
GRANT ALL PRIVILEGES ON db_inline.* TO 'inline'@' localhost' WITH GRANT OPTION;

create table tbl_categoria
(	
    cd_categoria int primary key auto_increment,
    nm_categoria varchar(25) not null    
);

create table tbl_desenvolv
(	
    cd_desenvolv int primary key auto_increment,
    nm_desenvolv varchar(40) not null    
);

create table tbl_jogos
(
	cod_jg int primary key auto_increment,
	nome_jg varchar(50) not null,
    preco_jg decimal(6,2) not null,
    capa_jg varchar(255) not null,
    template_jg varchar(255),
    qtd_jg int not null,
    resumo_jg text not null,
    lacamento_jg enum('S','N') not null,
    cd_categoria int not null,
    cd_desenvolv int not null,
    constraint fk_cat foreign key(cd_categoria) references tbl_categoria(cd_categoria),
    constraint fk_des foreign key(cd_desenvolv) references tbl_desenvolv(cd_desenvolv)
);



## INSERTS NA TABELA DE CATEGORIAS
insert into tbl_categoria
values(default,'Ação'),
(default, 'RPG'),
(default, 'Estratégia'),
(default, 'Aventura e Casual'),
(default, 'Simulador'),
(default, 'Esporte e Corrida'),
(default, 'Terror');

select * from tbl_categoria;


## INSERTS NA TABELA DE DESENVOLVEDORES
insert into tbl_desenvolv
values(default,'Rockstar Games'),
(default, 'Ubisoft');
insert into tbl_desenvolv
values(default,'Eletronic Arts');

delete from tbl_jogos;


select * from tbl_desenvolv;


## INSERTS NA TABELA DE JOGOS
insert into tbl_jogos values
(default, 'Red Dead Redemption 2', '239.00', 'reddead_capa', 'reddead_template', '106',
'<p>Estados Unidos, 1899. Arthur Morgan e a gangue Van der Linde são bandidos em fuga. Com agentes federais e os melhores caçadores 
 de recompensas no seu encalço, a gangue precisa roubar, assaltar e lutar para sobreviver no impiedoso coração
 dos Estados Unidos. Conforme divisões internas profundas ameaçam despedaçar a gangue, Arthur deve fazer uma 
 escolha entre os seus próprios ideais e a lealdade à gangue que o criou.</p>', 'N', '1', '1');
 
update tbl_jogos set carossel_position = 'First' where cod_jg = 1;
update tbl_jogos set carossel_position = 'Second' where cod_jg = 2;

 select * from tbl_jogos;
 
 create view vw_jogos
 as select
		tbl_jogos.cod_jg,
        tbl_jogos.nome_jg,
        tbl_jogos.preco_jg,
        tbl_categoria.cd_categoria,
        tbl_jogos.capa_jg,
        tbl_desenvolv.cd_desenvolv,
        tbl_jogos.template_jg,
        tbl_jogos.qtd_jg,
        tbl_jogos.resumo_jg,
        tbl_jogos.carossel_position,
        tbl_jogos.lacamento_jg
from tbl_jogos inner join tbl_desenvolv
	on tbl_jogos.cod_jg = tbl_desenvolv.cd_desenvolv
inner join tbl_categoria 
	on tbl_jogos.cd_categoria = tbl_categoria.cd_categoria;
    
select * from vw_jogos;

drop view vw_jogos;

