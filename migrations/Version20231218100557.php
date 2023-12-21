<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20231218100557 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE navire ADD idaisshiptype INT NOT NULL, CHANGE imo imo VARCHAR(7) NOT NULL');
        $this->addSql('ALTER TABLE navire ADD CONSTRAINT FK_EED103839F5FA88 FOREIGN KEY (idaisshiptype) REFERENCES aisshiptype (id)');
        $this->addSql('CREATE INDEX IDX_EED103839F5FA88 ON navire (idaisshiptype)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE navire DROP FOREIGN KEY FK_EED103839F5FA88');
        $this->addSql('DROP INDEX IDX_EED103839F5FA88 ON navire');
        $this->addSql('ALTER TABLE navire DROP idaisshiptype, CHANGE imo imo VARCHAR(255) NOT NULL');
    }
}
