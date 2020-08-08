PRAGMA synchronous = OFF;
PRAGMA journal_mode = MEMORY;
BEGIN TRANSACTION;
CREATE TABLE `posts` (
  `id` integer  NOT NULL PRIMARY KEY AUTOINCREMENT
,  `name` varchar(255) default NULL
,  `text` varchar(255) default NULL
,  `time` varchar(255) default NULL
);
END TRANSACTION;