CREATE TABLE `food_app`.`users` (
  `user_id` INT AUTO_INCREMENT PRIMARY KEY,
  `user_name` VARCHAR(100) NOT NULL,
  `user_email` VARCHAR(100) NOT NULL,
  `user_password` VARCHAR(100) NOT NULL,
  `user_image_url` VARCHAR(100) NOT NULL
);
