<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20231218104817 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE aisshiptype (id INT AUTO_INCREMENT NOT NULL, aisshiptype INT NOT NULL, libelle VARCHAR(60) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('DROP TABLE ais_ship_type');
        $this->addSql('ALTER TABLE navire ADD longueur INT NOT NULL, ADD largeur INT NOT NULL, ADD tirantdeau DOUBLE PRECISION NOT NULL');
        $this->addSql('ALTER TABLE navire ADD CONSTRAINT FK_EED103839F5FA88 FOREIGN KEY (idaisshiptype) REFERENCES aisshiptype (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE navire DROP FOREIGN KEY FK_EED103839F5FA88');
        $this->addSql('CREATE TABLE ais_ship_type (id INT AUTO_INCREMENT NOT NULL, aisshiptype INT NOT NULL, libelle VARCHAR(60) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('DROP TABLE aisshiptype');
        $this->addSql('ALTER TABLE navire DROP longueur, DROP largeur, DROP tirantdeau');
    }
}
