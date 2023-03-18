
CREATE TABLE `items` (
  `item_id` int(11) NOT NULL,
  `title` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `create_time` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

ALTER TABLE `items`
  ADD PRIMARY KEY (`item_id`),
  ADD KEY `title` (`title`);

ALTER TABLE `items`
  MODIFY `item_id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;



alter table items add user_id int(11) not null;
alter table items add constraint fk_userid foreign key (user_id) references users(user_id);
COMMIT;

ALTER TABLE items MODIFY create_time TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP;
COMMIT;


CREATE TABLE users (
  `user_id` int(11) NOT NULL,
  `username` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(88) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD KEY `username` (`username`);

ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

ALTER TABLE `users`
  MODIFY `password` varchar(20) NOT NULL ;
COMMIT;

