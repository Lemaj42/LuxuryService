<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240327134225 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE job_to_candidate ADD user_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE job_to_candidate ADD CONSTRAINT FK_F672CC1AA76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_F672CC1AA76ED395 ON job_to_candidate (user_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE job_to_candidate DROP FOREIGN KEY FK_F672CC1AA76ED395');
        $this->addSql('DROP INDEX UNIQ_F672CC1AA76ED395 ON job_to_candidate');
        $this->addSql('ALTER TABLE job_to_candidate DROP user_id');
    }
}
