<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20231031012250 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE passagers CHANGE bonus_ou_malus_pourcentage bonus_ou_malus_pourcentage DOUBLE PRECISION NOT NULL');
        $this->addSql('ALTER TABLE taux_empreint CHANGE taux_empreint_pourcentage taux_empreint_pourcentage DOUBLE PRECISION NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE passagers CHANGE bonus_ou_malus_pourcentage bonus_ou_malus_pourcentage INT NOT NULL');
        $this->addSql('ALTER TABLE taux_empreint CHANGE taux_empreint_pourcentage taux_empreint_pourcentage INT NOT NULL');
    }
}
