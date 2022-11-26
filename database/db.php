<?php 


// connection with RDBMS

$conn = mysqli_connect("localhost","root","");

if(!$conn){ 
    die("connection error : ");
}

$sql = "CREATE DATABASE IF NOT EXISTS `odc_crad` ";
$result = mysqli_query($conn,$sql);

mysqli_close($conn);



$conn = mysqli_connect("localhost","root","","odc_crad");

if(!$conn){ 
    die("connection error : ");
}


$sql = "CREATE  TABLE `categories`(
        `id` INT PRIMARY KEY AUTO_INCREMENT,
        `name` VARCHAR(100) NOT NULL
    
    ) ";
$result = mysqli_query($conn,$sql);


$sql = "CREATE  TABLE `products`(
    `id` INT PRIMARY KEY AUTO_INCREMENT,
    `category_id` INT NOT NULL,
    `name` VARCHAR(100) NOT NULL,
    `price` SMALLINT NOT NULL,
    `image` VARCHAR(200) NOT NULL,
    `description` TEXT NOT NULL,
    FOREIGN KEY (`category_id`) REFERENCES `categories`(`id`)

) ";
$result = mysqli_query($conn,$sql);


$sql = "CREATE  TABLE IF NOT EXISTS  `users`(
    `id` INT PRIMARY KEY AUTO_INCREMENT,
    `name` VARCHAR(100) NOT NULL,
    `email` VARCHAR(100) UNIQUE  NOT NULL,
    `image` VARCHAR(200) ,
    `password` VARCHAR(100)   NOT NULL,
    `type` BOOLEAN DEFAULT 0
) ";
$result = mysqli_query($conn,$sql);



$sql = "CREATE  TABLE IF NOT EXISTS  `orders`(
    `id` INT PRIMARY KEY AUTO_INCREMENT,
    `total` INT NOT NULL,
    `client_id` INT NOT NULL,
    `user_id` INT NOT NULL ,
    FOREIGN KEY (`client_id`) REFERENCES `users`(`id`),
    FOREIGN KEY (`user_id`) REFERENCES `users`(`id`)

) ";
$result = mysqli_query($conn,$sql);

$sql = "CREATE  TABLE IF NOT EXISTS  `order_items`(
    `id` INT PRIMARY KEY AUTO_INCREMENT,
    `product_id` INT NOT NULL,
    `order_id` INT NOT NULL,
    `product_name` VARCHAR(100) NOT NULL,
    `product_price` INT NOT NULL ,
    `product_quantity` INT NOT NULL ,
    FOREIGN KEY (`product_id`) REFERENCES `products`(`id`),
    FOREIGN KEY (`order_id`) REFERENCES `orders`(`id`) ON DELETE CASCADE 

) ";
$result = mysqli_query($conn,$sql);

//$sql = "INSERT INTO `users` (`id`, `name`, `email`, `image`, `password`, `type`) VALUES (NULL, 'Mahmoud kamal', 'admin@gmail.com2', '', '$2y$10\$JV291scN4Tsrw75eI67u/uTFrYCpbJIzeYuLFajwINZZysPa32HmO', '1')";
//$result = mysqli_query($conn,$sql);

echo mysqli_error($conn);



