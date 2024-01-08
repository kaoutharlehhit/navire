<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240108094731 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        //$this->addSql('ALTER TABLE navire ADD destinaton_id INT DEFAULT NULL');
        //$this->addSql('ALTER TABLE navire ADD CONSTRAINT FK_EED103838E50D3C FOREIGN KEY (destinaton_id) REFERENCES port (id)');
        //$this->addSql('CREATE INDEX IDX_EED103838E50D3C ON navire (destinaton_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE navire DROP FOREIGN KEY FK_EED103838E50D3C');
        $this->addSql('DROP INDEX IDX_EED103838E50D3C ON navire');
        $this->addSql('ALTER TABLE navire DROP destinaton_id');
    }
}
