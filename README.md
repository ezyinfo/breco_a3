# Presentation

This project is an example of frontend and backend simple product. For Icademie academic activity.

The frontend part is a refactoring of the previous work https://github.com/ezyinfo/breco_cda
We add the backend part.


# Requirements

You need to create a database (MySQL or MongoDB) and configure it in the inc/config.php file

Here is an example of data you can create :

CREATE TABLE `dest`.`locations` ( `id` INT NOT NULL AUTO_INCREMENT , `location` VARCHAR(128) NOT NULL , PRIMARY KEY (`id`)) ENGINE = InnoDB; 

INSERT INTO `locations` (`id`, `location`) VALUES (NULL, 'Rennes'), (NULL, 'Saint-Malo'), (NULL, 'Vignoc'), (NULL, 'Tinténiac'), (NULL, 'Vannes'), (NULL, 'Dinan'), (NULL, 'Nantes'), (NULL, 'Ploermel')


# Usage

Just visit index.html and enter destination value

# Test

To test, you need phpunit.
On Linux, just install phpunit via sudo apt install phpunit
Then, execute test by calling :
$ phpunit tests/locations_test.php
