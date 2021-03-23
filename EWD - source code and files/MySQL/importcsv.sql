LOAD DATA INFILE 'G:/xampp/htdocs/PHPinVisualStudioCode/PAGINA_WEB/MySQL/SHOP.csv'
INTO TABLE shop
FIELDS TERMINATED BY ',' ENCLOSED BY '"'
LINES TERMINATED BY '\n'
IGNORE 1 ROWS
(id,name,game,image,price)