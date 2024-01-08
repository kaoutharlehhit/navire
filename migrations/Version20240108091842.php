<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240108091842 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE escale (id INT AUTO_INCREMENT NOT NULL, idnavire INT NOT NULL, idport INT NOT NULL, dateHeureArrivee DATETIME NOT NULL, dateHeureDepart DATETIME DEFAULT NULL, INDEX IDX_C39FEDD36A50BD94 (idnavire), INDEX IDX_C39FEDD3905EAC6C (idport), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE escale ADD CONSTRAINT FK_C39FEDD36A50BD94 FOREIGN KEY (idnavire) REFERENCES navire (id)');
        $this->addSql('ALTER TABLE escale ADD CONSTRAINT FK_C39FEDD3905EAC6C FOREIGN KEY (idport) REFERENCES port (id)');
        $this->addSql('ALTER TABLE port ADD idpays INT NOT NULL');
        $this->addSql('ALTER TABLE port ADD CONSTRAINT FK_43915DCCE750CD0E FOREIGN KEY (idpays) REFERENCES pays (id)');
        $this->addSql('CREATE INDEX IDX_43915DCCE750CD0E ON port (idpays)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE escale DROP FOREIGN KEY FK_C39FEDD36A50BD94');
        $this->addSql('ALTER TABLE escale DROP FOREIGN KEY FK_C39FEDD3905EAC6C');
        $this->addSql('DROP TABLE escale');
        $this->addSql('ALTER TABLE port DROP FOREIGN KEY FK_43915DCCE750CD0E');
        $this->addSql('DROP INDEX IDX_43915DCCE750CD0E ON port');
        $this->addSql('ALTER TABLE port DROP idpays');
    }
}
