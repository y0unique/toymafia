 CREATE DATABASE toymafia_db;

 CREATE TABLE tbl_items(
    item_id INT PRIMARY KEY AUTO_INCREMENT,
    item_name VARCHAR(50) NOT NULL,
    item_description TEXT NOT NULL,
    item_location VARCHAR(50) NOT NULL,
    item_category VARCHAR(50) NOT NULL,
    item_quality VARCHAR(50) NOT NULL,
    item_price DECIMAL(10,2) NOT NULL,
    item_quantity INT NOT NULL,
    item_image VARCHAR(100) NOT NULL,
    item_status varchar(11) NOT NULL DEFAULT 'active'
 )

 CREATE TABLE timelogtbl(
    time_id int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    log_action longtext NOT NULL,
    log_date date NOT NULL,
    log_time time NOT NULL,
    log_status varchar(11) NOT NULL DEFAULT 'active'
);