CREATE DATABASE IF NOT EXISTS `gpu_store`
    CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;

USE `gpu_store`;

-- Таблица товаров (список видеокарт)
CREATE TABLE `products` (
    `id` INT(11) NOT NULL AUTO_INCREMENT,
    `name` VARCHAR(255) NOT NULL,
    `specs` TEXT NOT NULL,
    `price` VARCHAR(50) NOT NULL,
    `image_url` VARCHAR(500) NOT NULL,
    `full_description` TEXT NOT NULL,
    `in_stock` TINYINT(1) NOT NULL DEFAULT 1,
    PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Вставка 6 видеокарт
INSERT INTO `products` (`name`, `specs`, `price`, `image_url`, `full_description`, `in_stock`) VALUES
('NVIDIA GeForce RTX 4090', '24GB GDDR6X, 16384 CUDA ядер, трассировка лучей 3-го поколения', '199 999 ₽', 'https://placehold.co/400x300/1a2635/10b981?text=RTX+4090', 'Флагманская модель для 8K-гейминга и профессиональных задач. Поддержка DLSS 3, AV1 энкодинг.', 1),
('NVIDIA GeForce RTX 4080 SUPER', '16GB GDDR6X, 10240 CUDA ядер, отличный выбор для 4K', '119 999 ₽', 'https://placehold.co/400x300/1a2635/10b981?text=RTX+4080+SUPER', 'Идеальный баланс цены и производительности. Подходит для требовательных игр и 3D-рендеринга.', 1),
('NVIDIA GeForce RTX 4070 Ti', '12GB GDDR6X, 7680 ядер, эффективность и мощность', '84 999 ₽', 'https://placehold.co/400x300/1a2635/10b981?text=RTX+4070+Ti', 'Отличная карта для 1440p-гейминга с высокими настройками. Поддержка трассировки лучей и DLSS 3.', 1),
('NVIDIA GeForce RTX 4060 Ti', '8GB GDDR6, 4352 ядра, доступный вход в мир RTX', '49 999 ₽', 'https://placehold.co/400x300/1a2635/10b981?text=RTX+4060+Ti', 'Стартовая модель нового поколения. Отличная производительность в Full HD и энергоэффективность.', 0),
('NVIDIA GeForce RTX 4070', '12GB GDDR6X, 5888 ядер, оптимальный выбор для 1440p', '74 999 ₽', 'https://placehold.co/400x300/1a2635/10b981?text=RTX+4070', 'Новинка! RTX 4070 обеспечивает высокую частоту кадров в современных играх при отличной энергоэффективности.', 1),
('NVIDIA GeForce RTX 4060', '8GB GDDR6, 3072 ядра, идеальный старт в RTX-игры', '39 999 ₽', 'https://placehold.co/400x300/1a2635/10b981?text=RTX+4060', 'Доступная видеокарта для 1080p-гейминга. Отличный выбор для сборки среднего уровня.', 1);

-- Таблица заказов (данные из формы)
CREATE TABLE `orders` (
    `id` INT(11) NOT NULL AUTO_INCREMENT,
    `customer_name` VARCHAR(255) NOT NULL,
    `email` VARCHAR(255) NOT NULL,
    `product_id` INT(11) NOT NULL,
    `quantity` INT(11) NOT NULL DEFAULT 1,
    `comment` TEXT,
    `created_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY (`id`),
    FOREIGN KEY (`product_id`) REFERENCES `products`(`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
