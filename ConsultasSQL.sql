drop database control_escolar;
create database control_escolar;
use control_escolar;
show tables;

select * from rol;

select * from modulos;
show full columns from modulo;
insert into modulo(Descripcion,Nombre,Orden,created_at,updated_at)
values ('Alumnos','alumnos',1,NOW(),NOW());
drop table usuarios;

select * from rols;
insert into rols(descripcion, created_at ,updated_at)
values 
("Administrador",Now(),Now()),
("Gerente Control Escolar",Now(),Now());


select * from rols;
drop table rols;

select * from cuatrimestre;
select * from constancias;

show tables;
select * from digitalizacions;
show full columns from digitalizacions;

select * from constancias;
show full columns from constancias;

select * from cuatrimestres;
show full columns from cuatrimestres;

select * from users;

select * from estudiantes;

show create table estudiantes;