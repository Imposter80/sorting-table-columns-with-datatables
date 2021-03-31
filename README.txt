Данное приложение позволят отображать список пользователей с возможностью редактирования данных и добавления новых пользователей, используя ajax jquery. 
Для работы приложения нужно создать Базу данных c  phpMyAdmin:
$dbHost='localhost';
$dbUser='root';
$dbPass='root';
$dbName='test_encomage_db'
$dbTable='users';
Скрипт для создания таблицы:
create table users(
	id int not null auto_increment primary key,
	first_name varchar(255),
	last_name varchar(255),
	email varchar(255),
	create_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP,  
	update_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP   
)
Для заполнения таблицы можно использовать:
insert into users(first_name,  last_name, email) values ('Ivan', 'Ivanov', 'i.ivan@test.test');
insert into users (first_name, last_name, email) values ('Petr', 'Petrov', 'p.petrov@test.test');

поле create_date – будет заполняться автоматически при создании новой записи
поле update_date - будет изменяться при редактировании данных пользователя.
