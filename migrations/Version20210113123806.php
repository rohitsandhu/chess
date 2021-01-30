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
//final class Version20210113123806 extends AbstractMigration
//{
//    public function getDescription() : string
//    {
//        return '';
//    }
//
//    public function up(Schema $schema) : void
//    {
//        // this up() migration is auto-generated, please modify it to your needs
//        $this->addSql('ALTER TABLE torneig ADD arbitre_id INT DEFAULT NULL');
//        $this->addSql('ALTER TABLE torneig ADD CONSTRAINT FK_DF78888943A5F0 FOREIGN KEY (arbitre_id) REFERENCES arbitre (id)');
//        $this->addSql('CREATE INDEX IDX_DF78888943A5F0 ON torneig (arbitre_id)');
//    }
//
//    public function down(Schema $schema) : void
//    {
//        // this down() migration is auto-generated, please modify it to your needs
//        $this->addSql('ALTER TABLE torneig DROP FOREIGN KEY FK_DF78888943A5F0');
//        $this->addSql('DROP INDEX IDX_DF78888943A5F0 ON torneig');
//        $this->addSql('ALTER TABLE torneig DROP arbitre_id');
//    }
//}
