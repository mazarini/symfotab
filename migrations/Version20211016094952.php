<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20211016094952 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE SYMFOTAB (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, table_name VARCHAR(15) NOT NULL, field_table VARCHAR(15) NOT NULL, table_key VARCHAR(255) NOT NULL, table_order INTEGER NOT NULL, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, updated_by VARCHAR(255) NOT NULL, table_data CLOB NOT NULL --(DC2Type:json)
        )');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE SYMFOTAB');
    }
}
