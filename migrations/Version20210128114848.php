<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210128114848 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE arbitre ADD usuari VARCHAR(255) NOT NULL');
//        $this->addSql('DROP INDEX UNIQ_A9C1580C4EA3DDDF ON partida');
//        $this->addSql('DROP INDEX UNIQ_A9C1580C2A208720 ON partida');
//        $this->addSql('ALTER TABLE partida CHANGE guanyador guanyador TINYINT(1) NOT NULL');
//        $this->addSql('CREATE UNIQUE INDEX UNIQ_A9C1580C4EA3DDDF ON partida (jugador_blanques_id)');
//        $this->addSql('CREATE UNIQUE INDEX UNIQ_A9C1580C2A208720 ON partida (jugador_negres_id)');
//        $this->addSql('DROP INDEX UNIQ_5F18BAA0D78F4885 ON ronda');
//        $this->addSql('CREATE UNIQUE INDEX UNIQ_5F18BAA0D78F4885 ON ronda (jugador_imparell_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE arbitre DROP usuari');
//        $this->addSql('DROP INDEX UNIQ_A9C1580C4EA3DDDF ON partida');
//        $this->addSql('DROP INDEX UNIQ_A9C1580C2A208720 ON partida');
//        $this->addSql('ALTER TABLE partida CHANGE guanyador guanyador TINYINT(1) DEFAULT NULL');
//        $this->addSql('CREATE INDEX UNIQ_A9C1580C4EA3DDDF ON partida (jugador_blanques_id)');
//        $this->addSql('CREATE INDEX UNIQ_A9C1580C2A208720 ON partida (jugador_negres_id)');
//        $this->addSql('DROP INDEX UNIQ_5F18BAA0D78F4885 ON ronda');
//        $this->addSql('CREATE INDEX UNIQ_5F18BAA0D78F4885 ON ronda (jugador_imparell_id)');
    }
}
