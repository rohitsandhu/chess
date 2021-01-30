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
//final class Version20210128111453 extends AbstractMigration
//{
//    public function getDescription() : string
//    {
//        return '';
//    }
//
//    public function up(Schema $schema) : void
//    {
//        // this up() migration is auto-generated, please modify it to your needs
//        $this->addSql('CREATE TABLE jugador_jugador (jugador_source INT NOT NULL, jugador_target INT NOT NULL, INDEX IDX_1FA1A436B6C1481 (jugador_source), INDEX IDX_1FA1A437289440E (jugador_target), PRIMARY KEY(jugador_source, jugador_target)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
//        $this->addSql('ALTER TABLE jugador_jugador ADD CONSTRAINT FK_1FA1A436B6C1481 FOREIGN KEY (jugador_source) REFERENCES jugador (id) ON DELETE CASCADE');
//        $this->addSql('ALTER TABLE jugador_jugador ADD CONSTRAINT FK_1FA1A437289440E FOREIGN KEY (jugador_target) REFERENCES jugador (id) ON DELETE CASCADE');
//        $this->addSql('ALTER TABLE jugador ADD contador_punts INT DEFAULT NULL');
//        $this->addSql('ALTER TABLE partida CHANGE guanyador guanyador TINYINT(1) NOT NULL');
//        $this->addSql('CREATE UNIQUE INDEX UNIQ_A9C1580C2A208720 ON partida (jugador_negres_id)');
//        $this->addSql('CREATE UNIQUE INDEX UNIQ_A9C1580C4EA3DDDF ON partida (jugador_blanques_id)');
//        $this->addSql('CREATE UNIQUE INDEX UNIQ_5F18BAA0D78F4885 ON ronda (jugador_imparell_id)');
//    }
//
//    public function down(Schema $schema) : void
//    {
//        // this down() migration is auto-generated, please modify it to your needs
//        $this->addSql('DROP TABLE jugador_jugador');
//        $this->addSql('ALTER TABLE jugador DROP contador_punts');
//        $this->addSql('ALTER TABLE partida CHANGE guanyador guanyador TINYINT(1) DEFAULT NULL');
//        $this->addSql('CREATE INDEX UNIQ_A9C1580C4EA3DDDF ON partida (jugador_blanques_id)');
//        $this->addSql('CREATE INDEX UNIQ_A9C1580C2A208720 ON partida (jugador_negres_id)');
//        $this->addSql('CREATE INDEX UNIQ_5F18BAA0D78F4885 ON ronda (jugador_imparell_id)');
//    }
//}
