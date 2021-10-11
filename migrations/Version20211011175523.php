<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20211011175523 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE item (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, tab_name VARCHAR(8) NOT NULL, tab_key VARCHAR(255) NOT NULL, tab_data CLOB NOT NULL --(DC2Type:json)
        , created_at DATETIME NOT NULL --(DC2Type:datetime_immutable)
        , update_by DATETIME NOT NULL --(DC2Type:datetime_immutable)
        )');
        $this->addSql('DROP TABLE stab');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE stab (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, tab_name VARCHAR(8) NOT NULL COLLATE BINARY, tab_key VARCHAR(255) NOT NULL COLLATE BINARY, tab_data CLOB NOT NULL COLLATE BINARY --(DC2Type:json)
        , created_at DATETIME NOT NULL --(DC2Type:datetime_immutable)
        , update_by DATETIME NOT NULL --(DC2Type:datetime_immutable)
        )');
        $this->addSql('DROP TABLE item');
    }
}
