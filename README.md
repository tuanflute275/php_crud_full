CREATE TABLE category (
	id int PRIMARY KEY AUTO_INCREMENT, 
    name varchar(200) NOT NULL
);


CREATE TABLE product 
(
 	id int PRIMARY KEY AUTO_INCREMENT,
 	name varchar(200) NOT NULL, 
 	price int(20) NOT NULL, 
 	image varchar(200) NOT NULL, 
    status tinyint DEFAULT 1,
    category_id int, 
    FOREIGN KEY (category_id) REFERENCES category(id)
);

INSERT INTO `category` (`name`) VALUES ('quần');
INSERT INTO `category` (`name`) VALUES ('áo dài');
INSERT INTO `category` (`name`) VALUES ('ví');
INSERT INTO `category` (`name`) VALUES ('giày/dép');
INSERT INTO `category` (`name`) VALUES ('áo cộc');



INSERT INTO `product` (`name`, `price`, `image`, `status`, `category_id`) VALUES ('áo dài', '200', 'https://vanhoavadoisong.vn/uploads/images/HAIANH/pham-huong-mac-ao-dai-trang-683x1024.jpg', '1', '3');
INSERT INTO `product` (`name`, `price`, `image`, `status`, `category_id`) VALUES ('áo cộc', '250', 'https://vanhoavadoisong.vn/uploads/images/HAIANH/pham-huong-mac-ao-dai-trang-683x1024.jpg', '1', '6');
INSERT INTO `product` (`name`, `price`, `image`, `status`, `category_id`) VALUES ('giày vans', '140', 'https://vanhoavadoisong.vn/uploads/images/HAIANH/pham-huong-mac-ao-dai-trang-683x1024.jpg', '1', '5');
