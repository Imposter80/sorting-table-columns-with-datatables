������ ���������� �������� ���������� ������ ������������� � ������������ �������������� ������ � ���������� ����� �������������, ��������� ajax jquery. 
��� ������ ���������� ����� ������� ���� ������ c  phpMyAdmin:
$host='localhost';
$user='root';
$pass='root';
$dbname='test_encomage_db';
$dbtable='users';
������ ��� �������� �������:
create table users(
	id int not null auto_increment primary key,
	first_name varchar(255),
	last_name varchar(255),
	email varchar(255),
	create_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP,  
	update_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP   
)
��� ���������� ������� ����� ������������:
insert into users(first_name,  last_name, email) values ('Ivan', 'Ivanov', 'i.ivan@test.test');
insert into users (first_name, last_name, email) values ('Petr', 'Petrov', 'p.petrov@test.test');

���� create_date � ����� ����������� ������������� ��� �������� ����� ������
���� update_date - ����� ���������� ��� �������������� ������ ������������.
