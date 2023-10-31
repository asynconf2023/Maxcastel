<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20231030212043 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE voitures (id INT AUTO_INCREMENT NOT NULL, voiture_type_id INT NOT NULL, carburant_type_id INT NOT NULL, kilometrage_id INT NOT NULL, annee_id INT NOT NULL, taux_empreint_id INT NOT NULL, passager_id INT NOT NULL, INDEX IDX_8B58301B380D8123 (voiture_type_id), INDEX IDX_8B58301BF5674C01 (carburant_type_id), INDEX IDX_8B58301B690E2730 (kilometrage_id), INDEX IDX_8B58301B543EC5F0 (annee_id), INDEX IDX_8B58301B6A9BA2EB (taux_empreint_id), INDEX IDX_8B58301B71A51189 (passager_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE voitures ADD CONSTRAINT FK_8B58301B380D8123 FOREIGN KEY (voiture_type_id) REFERENCES voitures_type (id)');
        $this->addSql('ALTER TABLE voitures ADD CONSTRAINT FK_8B58301BF5674C01 FOREIGN KEY (carburant_type_id) REFERENCES carburants_type (id)');
        $this->addSql('ALTER TABLE voitures ADD CONSTRAINT FK_8B58301B690E2730 FOREIGN KEY (kilometrage_id) REFERENCES kilometrages (id)');
        $this->addSql('ALTER TABLE voitures ADD CONSTRAINT FK_8B58301B543EC5F0 FOREIGN KEY (annee_id) REFERENCES annees (id)');
        $this->addSql('ALTER TABLE voitures ADD CONSTRAINT FK_8B58301B6A9BA2EB FOREIGN KEY (taux_empreint_id) REFERENCES taux_empreint (id)');
        $this->addSql('ALTER TABLE voitures ADD CONSTRAINT FK_8B58301B71A51189 FOREIGN KEY (passager_id) REFERENCES passagers (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE voitures DROP FOREIGN KEY FK_8B58301B380D8123');
        $this->addSql('ALTER TABLE voitures DROP FOREIGN KEY FK_8B58301BF5674C01');
        $this->addSql('ALTER TABLE voitures DROP FOREIGN KEY FK_8B58301B690E2730');
        $this->addSql('ALTER TABLE voitures DROP FOREIGN KEY FK_8B58301B543EC5F0');
        $this->addSql('ALTER TABLE voitures DROP FOREIGN KEY FK_8B58301B6A9BA2EB');
        $this->addSql('ALTER TABLE voitures DROP FOREIGN KEY FK_8B58301B71A51189');
        $this->addSql('DROP TABLE voitures');
    }
}
