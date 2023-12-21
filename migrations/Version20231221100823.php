<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20231221100823 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP INDEX `primary` ON porttypecompatible');
        $this->addSql('ALTER TABLE porttypecompatible ADD idport INT NOT NULL');
        $this->addSql('ALTER TABLE porttypecompatible ADD CONSTRAINT FK_2C02FFDB905EAC6C FOREIGN KEY (idport) REFERENCES port (id)');
        $this->addSql('ALTER TABLE porttypecompatible ADD CONSTRAINT FK_2C02FFDB39F5FA88 FOREIGN KEY (idaisshiptype) REFERENCES aisshiptype (id)');
        $this->addSql('CREATE INDEX IDX_2C02FFDB905EAC6C ON porttypecompatible (idport)');
        $this->addSql('CREATE INDEX IDX_2C02FFDB39F5FA88 ON porttypecompatible (idaisshiptype)');
        $this->addSql('ALTER TABLE porttypecompatible ADD PRIMARY KEY (idport, idaisshiptype)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE porttypecompatible DROP FOREIGN KEY FK_2C02FFDB905EAC6C');
        $this->addSql('ALTER TABLE porttypecompatible DROP FOREIGN KEY FK_2C02FFDB39F5FA88');
        $this->addSql('DROP INDEX IDX_2C02FFDB905EAC6C ON porttypecompatible');
        $this->addSql('DROP INDEX IDX_2C02FFDB39F5FA88 ON porttypecompatible');
        $this->addSql('DROP INDEX `PRIMARY` ON porttypecompatible');
        $this->addSql('ALTER TABLE porttypecompatible DROP idport');
        $this->addSql('ALTER TABLE porttypecompatible ADD PRIMARY KEY (idaisshiptype)');
    }
}
