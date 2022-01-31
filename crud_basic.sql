CREATE DATABASE crud_basic;

CREATE TABLE persona(

'id_persona' INT(20) NOT NULL AUTO_INCREMENT,
'nombre' varchar(100) NOT NULL,
'apellido' varchar(100) NOT NULL,
'telefono' BIGINT(20) NOT NULL,
'email' varchar(100) NOT NULL,
'status' INT(20) NOT NULL,
PRIMARY KEY ('id_persona') 
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO persona (nombre,apellido,telefono,email,status) VALUES ('Octavio','Villafranco',
	5511343084,'ovillafrancot@gmail.com',1);