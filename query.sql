create table wp_portfolio
(
user_id int null,
coin varchar(255) null,
buyprice int null,
qty decimal(10,2) null,
timestamp timestamp default CURRENT_TIMESTAMP not null,
list_id int not null auto_increment
primary key,
constraint wp_portfolio_list_id_uindex
unique (list_id)
);

create table wp_portfolio_history
(
user_id int null,
coin varchar(255) null,
buyprice decimal(10,2) null,
closedprice decimal(10,2) null,
profitatclosed decimal(20,2) null,
qty decimal(10,2) null,
timestamp_started varchar(255) null,
timestamp timestamp default CURRENT_TIMESTAMP not null,
list_id int not null auto_increment
primary key,
totalvalue_closed decimal(20,2) null,
constraint wp_portfolio_history_list_id_uindex
unique (list_id)
);

