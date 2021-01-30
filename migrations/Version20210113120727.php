<?php
//
//declare(strict_types=1);
//
//namespace DoctrineMigrations;
//
//use Doctrine\DBAL\Schema\Schema;
//use Doctrine\Migrations\AbstractMigration;
//
///**
// * Auto-generated Migration: Please modify to your needs!
// */
//final class Version20210113120727 extends AbstractMigration
//{
//    public function getDescription() : string
//    {
//        return '';
//    }
//
//    public function up(Schema $schema) : void
//    {
//        // this up() migration is auto-generated, please modify it to your needs
//        $this->addSql('DROP TABLE jugador_blanques');
//        $this->addSql('ALTER TABLE ronda CHANGE jugador_imparell_id jugador_imparell_id INT DEFAULT NULL');
//        $this->addSql('ALTER TABLE torneig DROP FOREIGN KEY FK_DF78888943A5F0');
//        $this->addSql('DROP INDEX UNIQ_DF78888943A5F0 ON torneig');
//        $this->addSql('ALTER TABLE torneig DROP arbitre_id, CHANGE numero_byes num_byes INT NOT NULL');
//    }
//
//    public function down(Schema $schema) : void
//    {
//        // this down() migration is auto-generated, please modify it to your needs
//        $this->addSql('CREATE TABLE jugador_blanques (id INT AUTO_INCREMENT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
//        $this->addSql('ALTER TABLE ronda CHANGE jugador_imparell_id jugador_imparell_id INT NOT NULL');
//        $this->addSql('ALTER TABLE torneig ADD arbitre_id INT DEFAULT NULL, CHANGE num_byes numero_byes INT NOT NULL');
//        $this->addSql('ALTER TABLE torneig ADD CONSTRAINT FK_DF78888943A5F0 FOREIGN KEY (arbitre_id) REFERENCES arbitre (id)');
//        $this->addSql('CREATE INDEX UNIQ_DF78888943A5F0 ON torneig (arbitre_id)');
//    }
//}
