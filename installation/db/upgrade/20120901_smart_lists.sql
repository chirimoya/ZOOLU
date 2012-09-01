--
-- disable foreign key checks
--
SET FOREIGN_KEY_CHECKS=0;

--
-- data for table `decorators`
--
INSERT INTO `decorators` (`id`, `title`) VALUES (11, 'SmartList');

--
--  data for table `fieldTypes`
--
INSERT INTO `fieldTypes` (`id`, `idDecorator`, `sqlType`, `size`, `title`, `defaultValue`, `idFieldTypeGroup`) VALUES
(35, 11, '', 0, 'smartList', '', 5);

--
-- enable foreign key checks
--
SET FOREIGN_KEY_CHECKS=1;