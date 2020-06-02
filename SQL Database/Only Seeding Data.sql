--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `firstname`, `lastname`, `email`, `birthdate`, `gender`, `photo_profile`, `password`, `type`, `created_at`, `updated_at`, `deleted_at`) VALUES
(2, 'Christianto', 'Vinsen', 'vinsen@pazzapizza.com', '2000-10-17', 'Male', NULL, '$2y$10$0QcU9xZ3zNOUBCCdkk0/eObXoKfmR1poZD3j5KU7ffbb5mP385UaG', 'user', '2020-06-02 01:00:36', '2020-06-02 01:00:36', NULL);

-- --------------------------------------------------------

--
-- Dumping data untuk tabel `products`
--

INSERT INTO `products` (`id`, `name`, `category_id`, `image_url`, `description`, `stock`, `price`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Baked Chicken Chunks', 1, '/images/cms/menu/Appetizer/images_1591023993.jpg', 'Meat Lovers, Chicken Lovers, Super Supreme, Super Supreme Chicken, American Favourite,Pepperoni, Veggie Garden, Tuna Melt, Black Pepper Beef, Black Pepper Chicken, Cheese Lovers', 100, 50000, '2020-06-01 15:06:33', '2020-06-01 15:06:33', NULL),
(2, 'Cheese Rolls', 1, '/images/cms/menu/Appetizer/images_1591024035.jpg', 'Meat Lovers, Chicken Lovers, Super Supreme, Super Supreme Chicken, American Favourite,Pepperoni, Veggie Garden, Tuna Melt, Black Pepper Beef, Black Pepper Chicken, Cheese Lovers', 100, 45000, '2020-06-01 15:07:15', '2020-06-01 15:07:15', NULL),
(3, 'Chicken Royale', 1, '/images/cms/menu/Appetizer/images_1591024061.jpg', 'Meat Lovers, Chicken Lovers, Super Supreme, Super Supreme Chicken, American Favourite,Pepperoni, Veggie Garden, Tuna Melt, Black Pepper Beef, Black Pepper Chicken, Cheese Lovers', 100, 39000, '2020-06-01 15:07:41', '2020-06-01 15:07:41', NULL),
(4, 'Choco Puff', 1, '/images/cms/menu/Appetizer/images_1591024083.jpg', 'Meat Lovers, Chicken Lovers, Super Supreme, Super Supreme Chicken, American Favourite,Pepperoni, Veggie Garden, Tuna Melt, Black Pepper Beef, Black Pepper Chicken, Cheese Lovers', 100, 35000, '2020-06-01 15:08:03', '2020-06-01 15:08:03', NULL),
(5, 'Deluxe Beef Bruschetta', 1, '/images/cms/menu/Appetizer/images_1591024110.jpg', 'Meat Lovers, Chicken Lovers, Super Supreme, Super Supreme Chicken, American Favourite,Pepperoni, Veggie Garden, Tuna Melt, Black Pepper Beef, Black Pepper Chicken, Cheese Lovers', 100, 40000, '2020-06-01 15:08:30', '2020-06-01 15:08:30', NULL),
(6, 'Deluxe Chicken Bruschetta', 1, '/images/cms/menu/Appetizer/images_1591024135.jpg', 'Meat Lovers, Chicken Lovers, Super Supreme, Super Supreme Chicken, American Favourite,Pepperoni, Veggie Garden, Tuna Melt, Black Pepper Beef, Black Pepper Chicken, Cheese Lovers', 100, 55000, '2020-06-01 15:08:55', '2020-06-01 15:08:55', NULL),
(7, 'Deluxe Tuna Brushchetta', 1, '/images/cms/menu/Appetizer/images_1591024162.jpg', 'Meat Lovers, Chicken Lovers, Super Supreme, Super Supreme Chicken, American Favourite,Pepperoni, Veggie Garden, Tuna Melt, Black Pepper Beef, Black Pepper Chicken, Cheese Lovers', 100, 44000, '2020-06-01 15:09:22', '2020-06-01 15:09:22', NULL),
(8, 'Garlic Bread', 1, '/images/cms/menu/Appetizer/images_1591024189.jpg', 'Meat Lovers, Chicken Lovers, Super Supreme, Super Supreme Chicken, American Favourite,Pepperoni, Veggie Garden, Tuna Melt, Black Pepper Beef, Black Pepper Chicken, Cheese Lovers', 100, 35000, '2020-06-01 15:09:49', '2020-06-01 15:09:49', NULL),
(9, 'Garlic Cheese Bread', 1, '/images/cms/menu/Appetizer/images_1591024210.jpg', 'Meat Lovers, Chicken Lovers, Super Supreme, Super Supreme Chicken, American Favourite,Pepperoni, Veggie Garden, Tuna Melt, Black Pepper Beef, Black Pepper Chicken, Cheese Lovers', 100, 30000, '2020-06-01 15:10:10', '2020-06-01 15:10:10', NULL),
(10, 'Nacho Cheese', 1, '/images/cms/menu/Appetizer/images_1591024236.jpg', 'Meat Lovers, Chicken Lovers, Super Supreme, Super Supreme Chicken, American Favourite,Pepperoni, Veggie Garden, Tuna Melt, Black Pepper Beef, Black Pepper Chicken, Cheese Lovers', 100, 35000, '2020-06-01 15:10:36', '2020-06-01 15:10:36', NULL),
(11, 'New Orleans Chicken Wings', 1, '/images/cms/menu/Appetizer/images_1591024263.jpg', 'Meat Lovers, Chicken Lovers, Super Supreme, Super Supreme Chicken, American Favourite,Pepperoni, Veggie Garden, Tuna Melt, Black Pepper Beef, Black Pepper Chicken, Cheese Lovers', 100, 30000, '2020-06-01 15:11:03', '2020-06-01 15:11:03', NULL),
(12, 'Philly Cheeseteak Slider', 1, '/images/cms/menu/Appetizer/images_1591024290.jpg', 'Meat Lovers, Chicken Lovers, Super Supreme, Super Supreme Chicken, American Favourite,Pepperoni, Veggie Garden, Tuna Melt, Black Pepper Beef, Black Pepper Chicken, Cheese Lovers', 100, 70000, '2020-06-01 15:11:30', '2020-06-01 15:11:30', NULL),
(13, 'Potata Wedges', 1, '/images/cms/menu/Appetizer/images_1591024320.jpg', 'Meat Lovers, Chicken Lovers, Super Supreme, Super Supreme Chicken, American Favourite,Pepperoni, Veggie Garden, Tuna Melt, Black Pepper Beef, Black Pepper Chicken, Cheese Lovers', 100, 35000, '2020-06-01 15:12:00', '2020-06-01 15:12:00', NULL),
(14, 'Puff Pastry Mushroom', 1, '/images/cms/menu/Appetizer/images_1591024352.jpg', 'Meat Lovers, Chicken Lovers, Super Supreme, Super Supreme Chicken, American Favourite,Pepperoni, Veggie Garden, Tuna Melt, Black Pepper Beef, Black Pepper Chicken, Cheese Lovers', 100, 35000, '2020-06-01 15:12:32', '2020-06-01 15:12:32', NULL),
(15, 'Salad Bar', 1, '/images/cms/menu/Appetizer/images_1591024407.jpg', 'Meat Lovers, Chicken Lovers, Super Supreme, Super Supreme Chicken, American Favourite,Pepperoni, Veggie Garden, Tuna Melt, Black Pepper Beef, Black Pepper Chicken, Cheese Lovers', 100, 25000, '2020-06-01 15:13:27', '2020-06-01 15:13:27', NULL),
(16, 'Sausage Pastry Rolls', 1, '/images/cms/menu/Appetizer/images_1591024434.jpg', 'Meat Lovers, Chicken Lovers, Super Supreme, Super Supreme Chicken, American Favourite,Pepperoni, Veggie Garden, Tuna Melt, Black Pepper Beef, Black Pepper Chicken, Cheese Lovers', 100, 45000, '2020-06-01 15:13:54', '2020-06-01 15:13:54', NULL),
(17, 'Soup Of Day', 1, '/images/cms/menu/Appetizer/images_1591024457.jpg', 'Meat Lovers, Chicken Lovers, Super Supreme, Super Supreme Chicken, American Favourite,Pepperoni, Veggie Garden, Tuna Melt, Black Pepper Beef, Black Pepper Chicken, Cheese Lovers', 100, 20000, '2020-06-01 15:14:17', '2020-06-01 15:14:17', NULL),
(18, 'Black Pepper Chicken Rice', 5, '/images/cms/menu/Rice/images_1591024488.jpg', 'Meat Lovers, Chicken Lovers, Super Supreme, Super Supreme Chicken, American Favourite,Pepperoni, Veggie Garden, Tuna Melt, Black Pepper Beef, Black Pepper Chicken, Cheese Lovers', 100, 59000, '2020-06-01 15:14:48', '2020-06-01 15:14:48', NULL),
(19, 'Meatballs Beef Mushroom Rice', 5, '/images/cms/menu/Rice/images_1591024513.jpg', 'Meat Lovers, Chicken Lovers, Super Supreme, Super Supreme Chicken, American Favourite,Pepperoni, Veggie Garden, Tuna Melt, Black Pepper Beef, Black Pepper Chicken, Cheese Lovers', 100, 100000, '2020-06-01 15:15:13', '2020-06-01 15:15:13', NULL),
(20, 'Thai Chicken Rice', 5, '/images/cms/menu/Rice/images_1591024567.jpg', 'Meat Lovers, Chicken Lovers, Super Supreme, Super Supreme Chicken, American Favourite,Pepperoni, Veggie Garden, Tuna Melt, Black Pepper Beef, Black Pepper Chicken, Cheese Lovers', 100, 80000, '2020-06-01 15:16:07', '2020-06-01 15:16:07', NULL),
(21, 'Oriental Chicken Rice', 5, '/images/cms/menu/Rice/images_1591024539.jpg', 'Meat Lovers, Chicken Lovers, Super Supreme, Super Supreme Chicken, American Favourite,Pepperoni, Veggie Garden, Tuna Melt, Black Pepper Beef, Black Pepper Chicken, Cheese Lovers', 100, 75000, '2020-06-01 15:16:08', '2020-06-01 15:15:39', NULL),
(22, 'Beef Lasagna', 3, '/images/cms/menu/Pasta/images_1591024600.jpg', 'Meat Lovers, Chicken Lovers, Super Supreme, Super Supreme Chicken, American Favourite,Pepperoni, Veggie Garden, Tuna Melt, Black Pepper Beef, Black Pepper Chicken, Cheese Lovers', 98, 44000, '2020-06-01 15:16:40', '2020-06-02 01:25:37', NULL),
(23, 'Beef Spaghetti', 3, '/images/cms/menu/Pasta/images_1591024622.jpg', 'Meat Lovers, Chicken Lovers, Super Supreme, Super Supreme Chicken, American Favourite,Pepperoni, Veggie Garden, Tuna Melt, Black Pepper Beef, Black Pepper Chicken, Cheese Lovers', 100, 70000, '2020-06-01 15:17:02', '2020-06-01 15:17:02', NULL),
(24, 'Black Pepper Beef Fettuccine', 3, '/images/cms/menu/Pasta/images_1591024654.jpg', 'Meat Lovers, Chicken Lovers, Super Supreme, Super Supreme Chicken, American Favourite,Pepperoni, Veggie Garden, Tuna Melt, Black Pepper Beef, Black Pepper Chicken, Cheese Lovers', 98, 60000, '2020-06-01 15:17:34', '2020-06-02 01:25:37', NULL),
(25, 'Black Pepper Chicken Fettuccine', 3, '/images/cms/menu/Pasta/images_1591024679.jpg', 'Meat Lovers, Chicken Lovers, Super Supreme, Super Supreme Chicken, American Favourite,Pepperoni, Veggie Garden, Tuna Melt, Black Pepper Beef, Black Pepper Chicken, Cheese Lovers', 100, 55000, '2020-06-01 15:17:59', '2020-06-01 15:17:59', NULL),
(26, 'Caneloni Chicken', 3, '/images/cms/menu/Pasta/images_1591024701.jpg', 'Meat Lovers, Chicken Lovers, Super Supreme, Super Supreme Chicken, American Favourite,Pepperoni, Veggie Garden, Tuna Melt, Black Pepper Beef, Black Pepper Chicken, Cheese Lovers', 100, 60000, '2020-06-01 15:18:21', '2020-06-01 15:18:21', NULL),
(27, 'Cheese Beef Fusilli', 3, '/images/cms/menu/Pasta/images_1591024726.jpg', 'Meat Lovers, Chicken Lovers, Super Supreme, Super Supreme Chicken, American Favourite,Pepperoni, Veggie Garden, Tuna Melt, Black Pepper Beef, Black Pepper Chicken, Cheese Lovers', 100, 45000, '2020-06-01 15:18:46', '2020-06-01 15:18:46', NULL),
(28, 'Creamy Beef Classic Fettuccine', 3, '/images/cms/menu/Pasta/images_1591024750.jpg', 'Meat Lovers, Chicken Lovers, Super Supreme, Super Supreme Chicken, American Favourite,Pepperoni, Veggie Garden, Tuna Melt, Black Pepper Beef, Black Pepper Chicken, Cheese Lovers', 100, 55000, '2020-06-01 15:19:10', '2020-06-01 15:19:10', NULL),
(29, 'Creamy Chicken Classic Fettuccine', 3, '/images/cms/menu/Pasta/images_1591024772.jpg', 'Meat Lovers, Chicken Lovers, Super Supreme, Super Supreme Chicken, American Favourite,Pepperoni, Veggie Garden, Tuna Melt, Black Pepper Beef, Black Pepper Chicken, Cheese Lovers', 100, 66000, '2020-06-01 15:19:32', '2020-06-01 15:19:32', NULL),
(30, 'Oriental Chicken Spaghetti', 3, '/images/cms/menu/Pasta/images_1591024799.jpg', 'Meat Lovers, Chicken Lovers, Super Supreme, Super Supreme Chicken, American Favourite,Pepperoni, Veggie Garden, Tuna Melt, Black Pepper Beef, Black Pepper Chicken, Cheese Lovers', 98, 55000, '2020-06-01 15:19:59', '2020-06-02 01:25:37', NULL),
(31, 'Tuna Aglio Olio Spaghetti', 3, '/images/cms/menu/Pasta/images_1591024829.jpg', 'Meat Lovers, Chicken Lovers, Super Supreme, Super Supreme Chicken, American Favourite,Pepperoni, Veggie Garden, Tuna Melt, Black Pepper Beef, Black Pepper Chicken, Cheese Lovers', 100, 45000, '2020-06-01 15:20:29', '2020-06-01 15:20:29', NULL),
(32, 'Avocado Juice', 2, '/images/cms/menu/Drink/images_1591024867.jpg', 'Meat Lovers, Chicken Lovers, Super Supreme, Super Supreme Chicken, American Favourite,Pepperoni, Veggie Garden, Tuna Melt, Black Pepper Beef, Black Pepper Chicken, Cheese Lovers', 100, 25000, '2020-06-01 15:21:07', '2020-06-01 15:21:07', NULL),
(33, 'Blue Ocean', 2, '/images/cms/menu/Drink/images_1591024889.jpg', 'Meat Lovers, Chicken Lovers, Super Supreme, Super Supreme Chicken, American Favourite,Pepperoni, Veggie Garden, Tuna Melt, Black Pepper Beef, Black Pepper Chicken, Cheese Lovers', 100, 20000, '2020-06-01 15:21:29', '2020-06-01 15:21:29', NULL),
(34, 'Chocolate Milkshake', 2, '/images/cms/menu/Drink/images_1591024912.jpg', 'Meat Lovers, Chicken Lovers, Super Supreme, Super Supreme Chicken, American Favourite,Pepperoni, Veggie Garden, Tuna Melt, Black Pepper Beef, Black Pepper Chicken, Cheese Lovers', 100, 15000, '2020-06-01 15:21:52', '2020-06-01 15:21:52', NULL),
(35, 'Green Italian Soda', 2, '/images/cms/menu/Drink/images_1591024941.jpg', 'Meat Lovers, Chicken Lovers, Super Supreme, Super Supreme Chicken, American Favourite,Pepperoni, Veggie Garden, Tuna Melt, Black Pepper Beef, Black Pepper Chicken, Cheese Lovers', 100, 20000, '2020-06-01 15:22:21', '2020-06-01 15:22:21', NULL),
(36, 'Green Tea Yakult', 2, '/images/cms/menu/Drink/images_1591024963.jpg', 'Meat Lovers, Chicken Lovers, Super Supreme, Super Supreme Chicken, American Favourite,Pepperoni, Veggie Garden, Tuna Melt, Black Pepper Beef, Black Pepper Chicken, Cheese Lovers', 100, 30000, '2020-06-01 15:22:43', '2020-06-01 15:22:43', NULL),
(37, 'Lime Squash', 2, '/images/cms/menu/Drink/images_1591024985.jpg', 'Meat Lovers, Chicken Lovers, Super Supreme, Super Supreme Chicken, American Favourite,Pepperoni, Veggie Garden, Tuna Melt, Black Pepper Beef, Black Pepper Chicken, Cheese Lovers', 100, 15000, '2020-06-01 15:23:05', '2020-06-01 15:23:05', NULL),
(38, 'Lyche Spring', 2, '/images/cms/menu/Drink/images_1591025012.jpg', 'Meat Lovers, Chicken Lovers, Super Supreme, Super Supreme Chicken, American Favourite,Pepperoni, Veggie Garden, Tuna Melt, Black Pepper Beef, Black Pepper Chicken, Cheese Lovers', 100, 15000, '2020-06-01 15:23:32', '2020-06-01 15:23:32', NULL),
(39, 'Lychee Breeze', 2, '/images/cms/menu/Drink/images_1591025037.jpg', 'Meat Lovers, Chicken Lovers, Super Supreme, Super Supreme Chicken, American Favourite,Pepperoni, Veggie Garden, Tuna Melt, Black Pepper Beef, Black Pepper Chicken, Cheese Lovers', 100, 30000, '2020-06-01 15:23:57', '2020-06-01 15:23:57', NULL),
(40, 'Mixberry', 2, '/images/cms/menu/Drink/images_1591025061.jpg', 'Meat Lovers, Chicken Lovers, Super Supreme, Super Supreme Chicken, American Favourite,Pepperoni, Veggie Garden, Tuna Melt, Black Pepper Beef, Black Pepper Chicken, Cheese Lovers', 100, 25000, '2020-06-01 15:24:21', '2020-06-01 15:24:21', NULL),
(41, 'Orange', 2, '/images/cms/menu/Drink/images_1591025082.jpg', 'Meat Lovers, Chicken Lovers, Super Supreme, Super Supreme Chicken, American Favourite,Pepperoni, Veggie Garden, Tuna Melt, Black Pepper Beef, Black Pepper Chicken, Cheese Lovers', 100, 15000, '2020-06-01 15:24:42', '2020-06-01 15:24:42', NULL),
(42, 'Orange Lychee Sparkle', 2, '/images/cms/menu/Drink/images_1591025114.jpg', 'Meat Lovers, Chicken Lovers, Super Supreme, Super Supreme Chicken, American Favourite,Pepperoni, Veggie Garden, Tuna Melt, Black Pepper Beef, Black Pepper Chicken, Cheese Lovers', 100, 19000, '2020-06-01 15:25:14', '2020-06-01 15:25:14', NULL),
(43, 'Peach Spring', 2, '/images/cms/menu/Drink/images_1591025134.jpg', 'Meat Lovers, Chicken Lovers, Super Supreme, Super Supreme Chicken, American Favourite,Pepperoni, Veggie Garden, Tuna Melt, Black Pepper Beef, Black Pepper Chicken, Cheese Lovers', 100, 14000, '2020-06-01 15:25:34', '2020-06-01 15:25:34', NULL),
(44, 'Red Italian Soda', 2, '/images/cms/menu/Drink/images_1591025155.jpg', 'Meat Lovers, Chicken Lovers, Super Supreme, Super Supreme Chicken, American Favourite,Pepperoni, Veggie Garden, Tuna Melt, Black Pepper Beef, Black Pepper Chicken, Cheese Lovers', 100, 30000, '2020-06-01 15:25:55', '2020-06-01 15:25:55', NULL),
(45, 'Strawberry Milkshake', 2, '/images/cms/menu/Drink/images_1591025180.jpg', 'Meat Lovers, Chicken Lovers, Super Supreme, Super Supreme Chicken, American Favourite,Pepperoni, Veggie Garden, Tuna Melt, Black Pepper Beef, Black Pepper Chicken, Cheese Lovers', 100, 20000, '2020-06-01 15:26:20', '2020-06-01 15:26:20', NULL),
(46, 'Tropical Punch', 2, '/images/cms/menu/Drink/images_1591025201.jpg', 'Meat Lovers, Chicken Lovers, Super Supreme, Super Supreme Chicken, American Favourite,Pepperoni, Veggie Garden, Tuna Melt, Black Pepper Beef, Black Pepper Chicken, Cheese Lovers', 98, 20000, '2020-06-01 15:26:41', '2020-06-02 01:25:37', NULL),
(47, 'Vanilla Milkshake', 2, '/images/cms/menu/Drink/images_1591025224.jpg', 'Meat Lovers, Chicken Lovers, Super Supreme, Super Supreme Chicken, American Favourite,Pepperoni, Veggie Garden, Tuna Melt, Black Pepper Beef, Black Pepper Chicken, Cheese Lovers', 98, 17000, '2020-06-01 15:27:04', '2020-06-02 01:25:37', NULL),
(48, 'Winter Punch', 2, '/images/cms/menu/Drink/images_1591025242.jpg', 'Meat Lovers, Chicken Lovers, Super Supreme, Super Supreme Chicken, American Favourite,Pepperoni, Veggie Garden, Tuna Melt, Black Pepper Beef, Black Pepper Chicken, Cheese Lovers', 100, 19000, '2020-06-01 15:27:22', '2020-06-01 15:27:22', NULL),
(49, 'Large Chicken Puff Pizza', 4, '/images/cms/menu/Pizza/images_1591025279.jpg', 'Meat Lovers, Chicken Lovers, Super Supreme, Super Supreme Chicken, American Favourite,Pepperoni, Veggie Garden, Tuna Melt, Black Pepper Beef, Black Pepper Chicken, Cheese Lovers', 100, 150000, '2020-06-01 15:27:59', '2020-06-01 15:27:59', NULL),
(50, 'Large Pan', 4, '/images/cms/menu/Pizza/images_1591025301.jpg', 'Meat Lovers, Chicken Lovers, Super Supreme, Super Supreme Chicken, American Favourite,Pepperoni, Veggie Garden, Tuna Melt, Black Pepper Beef, Black Pepper Chicken, Cheese Lovers', 100, 140000, '2020-06-01 15:28:21', '2020-06-01 15:28:21', NULL),
(51, 'Large Pan Pizza', 4, '/images/cms/menu/Pizza/images_1591025334.jpg', 'Meat Lovers, Chicken Lovers, Super Supreme, Super Supreme Chicken, American Favourite,Pepperoni, Veggie Garden, Tuna Melt, Black Pepper Beef, Black Pepper Chicken, Cheese Lovers', 100, 135000, '2020-06-01 15:28:54', '2020-06-01 15:28:54', NULL),
(52, 'Large Splitza', 4, '/images/cms/menu/Pizza/images_1591025366.jpg', 'Meat Lovers, Chicken Lovers, Super Supreme, Super Supreme Chicken, American Favourite,Pepperoni, Veggie Garden, Tuna Melt, Black Pepper Beef, Black Pepper Chicken, Cheese Lovers', 98, 160000, '2020-06-01 15:29:26', '2020-06-02 01:25:37', NULL),
(53, 'Regular Pan', 4, '/images/cms/menu/Pizza/images_1591025399.jpg', 'Meat Lovers, Chicken Lovers, Super Supreme, Super Supreme Chicken, American Favourite,Pepperoni, Veggie Garden, Tuna Melt, Black Pepper Beef, Black Pepper Chicken, Cheese Lovers', 100, 13000, '2020-06-01 15:29:59', '2020-06-01 15:29:59', NULL),
(54, 'Regular Splitza', 4, '/images/cms/menu/Pizza/images_1591025424.jpg', 'Meat Lovers, Chicken Lovers, Super Supreme, Super Supreme Chicken, American Favourite,Pepperoni, Veggie Garden, Tuna Melt, Black Pepper Beef, Black Pepper Chicken, Cheese Lovers', 98, 145000, '2020-06-01 15:30:24', '2020-06-02 01:25:37', NULL),
(55, 'REGULAR PAN : Triple Meat Lovers', 4, '/images/cms/menu/Pizza/images_1591025538.jpg', 'Meat Lovers, Chicken Lovers, Super Supreme, Super Supreme Chicken, American Favourite,Pepperoni, Veggie Garden, Tuna Melt, Black Pepper Beef, Black Pepper Chicken, Cheese Lovers', 100, 140000, '2020-06-01 15:32:18', '2020-06-01 15:32:18', NULL),
(56, 'PERSONAL PAN : Triple Meat Lovers', 4, '/images/cms/menu/Pizza/images_1591025566.jpg', 'Meat Lovers, Chicken Lovers, Super Supreme, Super Supreme Chicken, American Favourite,Pepperoni, Veggie Garden, Tuna Melt, Black Pepper Beef, Black Pepper Chicken, Cheese Lovers', 98, 70000, '2020-06-01 15:32:46', '2020-06-02 01:25:37', NULL),
(57, 'LARGE PAN : Triple Meat Lovers', 4, '/images/cms/menu/Pizza/images_1591025602.jpg', 'Meat Lovers, Chicken Lovers, Super Supreme, Super Supreme Chicken, American Favourite,Pepperoni, Veggie Garden, Tuna Melt, Black Pepper Beef, Black Pepper Chicken, Cheese Lovers', 97, 200000, '2020-06-01 15:33:22', '2020-06-02 01:25:37', NULL);

-- --------------------------------------------------------

--
-- Dumping data untuk tabel `user_favorite`
--

INSERT INTO `user_favorite` (`id`, `product_id`, `user_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 27, 1, '2020-06-02 01:06:51', '2020-06-02 01:06:51', NULL),
(2, 31, 1, '2020-06-02 01:07:01', '2020-06-02 01:07:01', NULL),
(3, 55, 1, '2020-06-02 01:10:05', '2020-06-02 01:10:05', NULL),
(4, 52, 1, '2020-06-02 01:11:12', '2020-06-02 01:11:12', NULL),
(5, 57, 1, '2020-06-02 01:12:39', '2020-06-02 01:24:26', '2020-06-02 01:24:26'),
(6, 57, 1, '2020-06-02 01:27:27', '2020-06-02 01:27:27', NULL);

-- --------------------------------------------------------

--
-- Dumping data untuk tabel `cart`
--

INSERT INTO `cart` (`id`, `product_id`, `user_id`, `quantity_order`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 57, 1, 1, '2020-06-02 01:01:09', '2020-06-02 01:13:12', '2020-06-02 01:13:12'),
(2, 56, 1, 2, '2020-06-02 01:03:39', '2020-06-02 01:25:37', '2020-06-02 01:25:37'),
(3, 47, 1, 2, '2020-06-02 01:04:12', '2020-06-02 01:25:37', '2020-06-02 01:25:37'),
(4, 46, 1, 2, '2020-06-02 01:04:32', '2020-06-02 01:25:37', '2020-06-02 01:25:37'),
(5, 30, 1, 2, '2020-06-02 01:05:00', '2020-06-02 01:25:37', '2020-06-02 01:25:37'),
(6, 24, 1, 2, '2020-06-02 01:05:45', '2020-06-02 01:25:37', '2020-06-02 01:25:37'),
(7, 22, 1, 2, '2020-06-02 01:05:55', '2020-06-02 01:25:37', '2020-06-02 01:25:37'),
(8, 54, 1, 2, '2020-06-02 01:10:14', '2020-06-02 01:25:37', '2020-06-02 01:25:37'),
(9, 52, 1, 2, '2020-06-02 01:11:06', '2020-06-02 01:25:37', '2020-06-02 01:25:37'),
(10, 57, 1, 3, '2020-06-02 01:13:12', '2020-06-02 01:25:37', '2020-06-02 01:25:37'),
(11, 56, 1, 3, '2020-06-02 01:26:13', '2020-06-02 01:26:39', '2020-06-02 01:26:39'),
(12, 52, 1, 1, '2020-06-02 01:26:23', '2020-06-02 01:26:44', '2020-06-02 01:26:44'),
(13, 56, 1, 1, '2020-06-02 01:26:55', '2020-06-02 01:27:16', '2020-06-02 01:27:16'),
(14, 57, 1, 1, '2020-06-02 01:26:59', '2020-06-02 01:27:16', '2020-06-02 01:27:16'),
(15, 52, 1, 1, '2020-06-02 01:27:06', '2020-06-02 01:27:16', '2020-06-02 01:27:16'),
(16, 57, 1, 1, '2020-06-02 01:27:31', '2020-06-02 01:27:31', NULL),
(17, 52, 1, 1, '2020-06-02 01:27:38', '2020-06-02 01:27:38', NULL);

-- --------------------------------------------------------

--
-- Dumping data untuk tabel `product_review`
--

INSERT INTO `product_review` (`id`, `product_id`, `user_id`, `title`, `message`, `rating`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 56, 1, 'ENAKK', NULL, 5, '2020-06-02 01:25:56', '2020-06-02 01:25:56', NULL);

-- --------------------------------------------------------

--
-- Dumping data untuk tabel `transaction`
--

INSERT INTO `transaction` (`id`, `user_id`, `total`, `address`, `phone_number`, `order_notes`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 1742000, 'Multimedia Nusantara University', '08231131312', 'Mohon tambahkan lebih banyak cabai', '2020-06-02 01:25:37', '2020-06-02 01:25:37', NULL);

-- --------------------------------------------------------

--
-- Dumping data untuk tabel `transaction_details`
--

INSERT INTO `transaction_details` (`id`, `transaction_id`, `product_id`, `quantity_order`, `review_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 56, 2, 1, '2020-06-02 01:25:37', '2020-06-02 01:25:56', NULL),
(2, 1, 47, 2, NULL, '2020-06-02 01:25:37', '2020-06-02 01:25:37', NULL),
(3, 1, 46, 2, NULL, '2020-06-02 01:25:37', '2020-06-02 01:25:37', NULL),
(4, 1, 30, 2, NULL, '2020-06-02 01:25:37', '2020-06-02 01:25:37', NULL),
(5, 1, 24, 2, NULL, '2020-06-02 01:25:37', '2020-06-02 01:25:37', NULL),
(6, 1, 22, 2, NULL, '2020-06-02 01:25:37', '2020-06-02 01:25:37', NULL),
(7, 1, 54, 2, NULL, '2020-06-02 01:25:37', '2020-06-02 01:25:37', NULL),
(8, 1, 52, 2, NULL, '2020-06-02 01:25:37', '2020-06-02 01:25:37', NULL),
(9, 1, 57, 3, NULL, '2020-06-02 01:25:37', '2020-06-02 01:25:37', NULL);

-- --------------------------------------------------------
