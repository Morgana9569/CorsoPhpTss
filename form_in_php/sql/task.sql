-- Active: 1678177573379@@127.0.0.1@3306@todo
CREATE TABLE `task` (
  `task_id` int(11) NOT NULL,
  `task` varchar(150) NOT NULL,
  `stato` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

ALTER TABLE `task`
  ADD PRIMARY KEY (`task_id`);
 
INSERT INTO `task` (`task_id`, `task`, `stato`) VALUES
(1, 'Trovare Errori', 'Fatto'),
(4, 'Rimuovi Bugs', ''),
(5, 'Comprare il pane', '');

ALTER TABLE `task`
  MODIFY `task_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--drop table TASK;