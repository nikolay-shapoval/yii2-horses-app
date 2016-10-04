<?php

use yii\db\Migration;

class m161004_231716_add_tables extends Migration
{
    public function safeUp()
    {

        $sql        = <<<TXT
CREATE TABLE `breeds` (
  `id` int(11) NOT NULL,
  `breed` varchar(100) NOT NULL,
  `external_signs` text NOT NULL,
  `comments` text NOT NULL
) ENGINE=Innodb DEFAULT CHARSET=utf8;

CREATE TABLE `descriptions` (
  `id` int(11) NOT NULL,
  `horse_id` int(11) NOT NULL,
  `head` varchar(100) NOT NULL,
  `neck` varchar(100) NOT NULL,
  `left_front` varchar(100) NOT NULL,
  `right_front` varchar(100) NOT NULL,
  `left_back` varchar(100) NOT NULL,
  `right_back` varchar(100) NOT NULL,
  `body` varchar(100) NOT NULL,
  `verification_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=Innodb DEFAULT CHARSET=utf8;

CREATE TABLE `horses` (
  `id` int(11) NOT NULL,
  `owner_id` int(11) NOT NULL,
  `breed_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `sex` enum('male','female','','') NOT NULL,
  `colour` varchar(80) NOT NULL,
  `birthday` date NOT NULL,
  `father` varchar(100) NOT NULL,
  `mother` varchar(100) NOT NULL
) ENGINE=Innodb DEFAULT CHARSET=utf8;

CREATE TABLE `owners` (
  `id` int(11) NOT NULL,
  `sale_date` date NOT NULL,
  `owner` varchar(150) NOT NULL,
  `organization` varchar(150) NOT NULL,
  `address` varchar(200) NOT NULL
) ENGINE=Innodb DEFAULT CHARSET=utf8;

CREATE TABLE `promers` (
  `id` int(11) NOT NULL,
  `date` date NOT NULL,
  `horse_id` int(11) NOT NULL,
  `height` int(11) NOT NULL,
  `slanting_length` int(11) NOT NULL,
  `breast_girth` int(11) NOT NULL,
  `mouth_grasp` int(11) NOT NULL
) ENGINE=Innodb DEFAULT CHARSET=utf8;
 
ALTER TABLE `breeds`
  ADD PRIMARY KEY (`id`);
 
ALTER TABLE `descriptions`
  ADD PRIMARY KEY (`id`);
 
ALTER TABLE `horses`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`),
  ADD UNIQUE KEY `id_2` (`id`),
  ADD UNIQUE KEY `id_3` (`id`),
  ADD UNIQUE KEY `id_4` (`id`),
  ADD KEY `owner_id` (`owner_id`,`breed_id`),
  ADD KEY `breed_id` (`breed_id`);
 
ALTER TABLE `owners`
  ADD PRIMARY KEY (`id`);
 
ALTER TABLE `promers`
  ADD PRIMARY KEY (`id`);
 
ALTER TABLE `breeds`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
 
ALTER TABLE `descriptions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
 
ALTER TABLE `horses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
 
ALTER TABLE `owners`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
 
ALTER TABLE `promers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19

TXT;
        $sqlQueries = explode(';', $sql);
        foreach ($sqlQueries as $sql) {
            $this->execute($sql . ';');
        }
    }

    public function safeDown()
    {
        $this->dropTable('breeds');
        $this->dropTable('descriptions');
        $this->dropTable('horses');
        $this->dropTable('owners');
        $this->dropTable('promers');

    }
}
