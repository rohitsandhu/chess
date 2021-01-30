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
//final class Version20210125102643 extends AbstractMigration
//{
//    public function getDescription() : string
//    {
//        return '';
//    }
//
//    public function up(Schema $schema) : void
//    {
//        // this up() migration is auto-generated, please modify it to your needs
//        $this->addSql('CREATE TABLE arbitre (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, pais VARCHAR(255) NOT NULL, cognoms VARCHAR(255) NOT NULL, contrasenya VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
//        $this->addSql('CREATE TABLE jugador (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, cognoms VARCHAR(255) NOT NULL, equip VARCHAR(255) DEFAULT NULL, pais VARCHAR(255) NOT NULL, elo INT DEFAULT NULL, byes INT DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
//        $this->addSql('CREATE TABLE partida (id INT AUTO_INCREMENT NOT NULL, jugador_blanques_id INT DEFAULT NULL, jugador_negres_id INT DEFAULT NULL, ronda_id INT DEFAULT NULL, punts_blanques INT DEFAULT NULL, punts_negres INT DEFAULT NULL, guanyador TINYINT(1) NOT NULL, UNIQUE INDEX UNIQ_A9C1580C4EA3DDDF (jugador_blanques_id), UNIQUE INDEX UNIQ_A9C1580C2A208720 (jugador_negres_id), INDEX IDX_A9C1580CB27F466B (ronda_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
//        $this->addSql('CREATE TABLE ronda (id INT AUTO_INCREMENT NOT NULL, jugador_imparell_id INT DEFAULT NULL, torneig_id INT DEFAULT NULL, numero_ronda INT NOT NULL, UNIQUE INDEX UNIQ_5F18BAA0D78F4885 (jugador_imparell_id), INDEX IDX_5F18BAA059E4FAF9 (torneig_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
//        $this->addSql('CREATE TABLE torneig (id INT AUTO_INCREMENT NOT NULL, arbitre_id INT DEFAULT NULL, nom VARCHAR(255) NOT NULL, pais VARCHAR(255) NOT NULL, num_rondes INT NOT NULL, num_byes INT NOT NULL, INDEX IDX_DF78888943A5F0 (arbitre_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
//        $this->addSql('CREATE TABLE torneig_jugador (torneig_id INT NOT NULL, jugador_id INT NOT NULL, INDEX IDX_ED15598F59E4FAF9 (torneig_id), INDEX IDX_ED15598FB8A54D43 (jugador_id), PRIMARY KEY(torneig_id, jugador_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
//        $this->addSql('ALTER TABLE partida ADD CONSTRAINT FK_A9C1580C4EA3DDDF FOREIGN KEY (jugador_blanques_id) REFERENCES jugador (id)');
//        $this->addSql('ALTER TABLE partida ADD CONSTRAINT FK_A9C1580C2A208720 FOREIGN KEY (jugador_negres_id) REFERENCES jugador (id)');
//        $this->addSql('ALTER TABLE partida ADD CONSTRAINT FK_A9C1580CB27F466B FOREIGN KEY (ronda_id) REFERENCES ronda (id)');
//        $this->addSql('ALTER TABLE ronda ADD CONSTRAINT FK_5F18BAA0D78F4885 FOREIGN KEY (jugador_imparell_id) REFERENCES jugador (id)');
//        $this->addSql('ALTER TABLE ronda ADD CONSTRAINT FK_5F18BAA059E4FAF9 FOREIGN KEY (torneig_id) REFERENCES torneig (id)');
//        $this->addSql('ALTER TABLE torneig ADD CONSTRAINT FK_DF78888943A5F0 FOREIGN KEY (arbitre_id) REFERENCES arbitre (id)');
//        $this->addSql('ALTER TABLE torneig_jugador ADD CONSTRAINT FK_ED15598F59E4FAF9 FOREIGN KEY (torneig_id) REFERENCES torneig (id) ON DELETE CASCADE');
//        $this->addSql('ALTER TABLE torneig_jugador ADD CONSTRAINT FK_ED15598FB8A54D43 FOREIGN KEY (jugador_id) REFERENCES jugador (id) ON DELETE CASCADE');
//    }
//
//    public function down(Schema $schema) : void
//    {
//        // this down() migration is auto-generated, please modify it to your needs
//        $this->addSql('ALTER TABLE torneig DROP FOREIGN KEY FK_DF78888943A5F0');
//        $this->addSql('ALTER TABLE partida DROP FOREIGN KEY FK_A9C1580C4EA3DDDF');
//        $this->addSql('ALTER TABLE partida DROP FOREIGN KEY FK_A9C1580C2A208720');
//        $this->addSql('ALTER TABLE ronda DROP FOREIGN KEY FK_5F18BAA0D78F4885');
//        $this->addSql('ALTER TABLE torneig_jugador DROP FOREIGN KEY FK_ED15598FB8A54D43');
//        $this->addSql('ALTER TABLE partida DROP FOREIGN KEY FK_A9C1580CB27F466B');
//        $this->addSql('ALTER TABLE ronda DROP FOREIGN KEY FK_5F18BAA059E4FAF9');
//        $this->addSql('ALTER TABLE torneig_jugador DROP FOREIGN KEY FK_ED15598F59E4FAF9');
//        $this->addSql('DROP TABLE arbitre');
//        $this->addSql('DROP TABLE jugador');
//        $this->addSql('DROP TABLE partida');
//        $this->addSql('DROP TABLE ronda');
//        $this->addSql('DROP TABLE torneig');
//        $this->addSql('DROP TABLE torneig_jugador');
//    }
//}
