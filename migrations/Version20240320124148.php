<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240320124148 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE candidacy (id INT AUTO_INCREMENT NOT NULL, job_id INT DEFAULT NULL, candida_id INT DEFAULT NULL, time DATE NOT NULL, approved TINYINT(1) NOT NULL, INDEX IDX_D930569DBE04EA9 (job_id), INDEX IDX_D930569D71099BC6 (candida_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE candidate (id INT AUTO_INCREMENT NOT NULL, experience_id INT NOT NULL, user_id INT DEFAULT NULL, gender TINYINT(1) NOT NULL, first_name LONGTEXT NOT NULL, last_name LONGTEXT NOT NULL, adress LONGTEXT NOT NULL, country LONGTEXT NOT NULL, nationality LONGTEXT NOT NULL, passport TINYINT(1) NOT NULL, passport_file VARCHAR(255) NOT NULL, curriculum_vitae VARCHAR(255) NOT NULL, profil_picture VARCHAR(255) NOT NULL, current_location LONGTEXT NOT NULL, date_of_birth DATE NOT NULL, place_of_birth LONGTEXT NOT NULL, email_adress VARCHAR(255) NOT NULL, confirm_email VARCHAR(255) NOT NULL, password VARCHAR(255) NOT NULL, confirm_password VARCHAR(255) NOT NULL, availability TINYINT(1) NOT NULL, job_category VARCHAR(255) NOT NULL, experience VARCHAR(255) NOT NULL, short_description LONGTEXT NOT NULL, notes LONGTEXT NOT NULL, date_created DATE NOT NULL, date_updated DATE NOT NULL, date_deleted DATE NOT NULL, files VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_C8B28E4446E90E27 (experience_id), UNIQUE INDEX UNIQ_C8B28E44A76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE client (id INT AUTO_INCREMENT NOT NULL, nom_societe LONGTEXT NOT NULL, type_activite LONGTEXT NOT NULL, nom_contact LONGTEXT NOT NULL, poste LONGTEXT NOT NULL, numero_contact INT NOT NULL, email_contact VARCHAR(255) NOT NULL, notes INT DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE experience (id INT AUTO_INCREMENT NOT NULL, experience VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE job (id INT AUTO_INCREMENT NOT NULL, job_type_id INT NOT NULL, job_category_id INT NOT NULL, client_id INT DEFAULT NULL, reference VARCHAR(255) NOT NULL, client VARCHAR(255) NOT NULL, description LONGTEXT NOT NULL, active TINYINT(1) NOT NULL, notes LONGTEXT NOT NULL, job_title LONGTEXT NOT NULL, location VARCHAR(255) NOT NULL, closing_date DATE NOT NULL, salary VARCHAR(255) NOT NULL, date_creation DATE NOT NULL, INDEX IDX_FBD8E0F85FA33B08 (job_type_id), INDEX IDX_FBD8E0F8712A86AB (job_category_id), INDEX IDX_FBD8E0F819EB6921 (client_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE job_category (id INT AUTO_INCREMENT NOT NULL, category VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE job_type (id INT AUTO_INCREMENT NOT NULL, type VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(180) NOT NULL, roles JSON NOT NULL COMMENT \'(DC2Type:json)\', password VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_IDENTIFIER_EMAIL (email), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE messenger_messages (id BIGINT AUTO_INCREMENT NOT NULL, body LONGTEXT NOT NULL, headers LONGTEXT NOT NULL, queue_name VARCHAR(190) NOT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', available_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', delivered_at DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\', INDEX IDX_75EA56E0FB7336F0 (queue_name), INDEX IDX_75EA56E0E3BD61CE (available_at), INDEX IDX_75EA56E016BA31DB (delivered_at), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE candidacy ADD CONSTRAINT FK_D930569DBE04EA9 FOREIGN KEY (job_id) REFERENCES job (id)');
        $this->addSql('ALTER TABLE candidacy ADD CONSTRAINT FK_D930569D71099BC6 FOREIGN KEY (candida_id) REFERENCES candidate (id)');
        $this->addSql('ALTER TABLE candidate ADD CONSTRAINT FK_C8B28E4446E90E27 FOREIGN KEY (experience_id) REFERENCES experience (id)');
        $this->addSql('ALTER TABLE candidate ADD CONSTRAINT FK_C8B28E44A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE job ADD CONSTRAINT FK_FBD8E0F85FA33B08 FOREIGN KEY (job_type_id) REFERENCES job_type (id)');
        $this->addSql('ALTER TABLE job ADD CONSTRAINT FK_FBD8E0F8712A86AB FOREIGN KEY (job_category_id) REFERENCES job_category (id)');
        $this->addSql('ALTER TABLE job ADD CONSTRAINT FK_FBD8E0F819EB6921 FOREIGN KEY (client_id) REFERENCES client (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE candidacy DROP FOREIGN KEY FK_D930569DBE04EA9');
        $this->addSql('ALTER TABLE candidacy DROP FOREIGN KEY FK_D930569D71099BC6');
        $this->addSql('ALTER TABLE candidate DROP FOREIGN KEY FK_C8B28E4446E90E27');
        $this->addSql('ALTER TABLE candidate DROP FOREIGN KEY FK_C8B28E44A76ED395');
        $this->addSql('ALTER TABLE job DROP FOREIGN KEY FK_FBD8E0F85FA33B08');
        $this->addSql('ALTER TABLE job DROP FOREIGN KEY FK_FBD8E0F8712A86AB');
        $this->addSql('ALTER TABLE job DROP FOREIGN KEY FK_FBD8E0F819EB6921');
        $this->addSql('DROP TABLE candidacy');
        $this->addSql('DROP TABLE candidate');
        $this->addSql('DROP TABLE client');
        $this->addSql('DROP TABLE experience');
        $this->addSql('DROP TABLE job');
        $this->addSql('DROP TABLE job_category');
        $this->addSql('DROP TABLE job_type');
        $this->addSql('DROP TABLE user');
        $this->addSql('DROP TABLE messenger_messages');
    }
}
