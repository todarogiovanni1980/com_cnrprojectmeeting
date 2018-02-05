CREATE TABLE IF NOT EXISTS `#__cnrprojectmeeting_meetings` (
`id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,

`asset_id` INT(10) UNSIGNED NOT NULL DEFAULT '0',

`ordering` INT(11)  NOT NULL ,
`title` VARCHAR(255)  NOT NULL ,
`state` TINYINT(1)  NOT NULL ,
`startdate` DATE NOT NULL ,
`enddate` DATE NOT NULL ,
`host` VARCHAR(255)  NOT NULL ,
`location` VARCHAR(255)  NOT NULL ,
`description` TEXT NOT NULL ,
`checked_out` INT(11)  NOT NULL ,
`checked_out_time` DATETIME NOT NULL ,
`created_by` INT(11)  NOT NULL ,
`photogallery` VARCHAR(255)  NOT NULL ,
`agenda` TEXT NOT NULL ,
PRIMARY KEY (`id`)
) DEFAULT COLLATE=utf8_general_ci;

