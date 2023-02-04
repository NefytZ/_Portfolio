<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230204180436 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE competence (id INT AUTO_INCREMENT NOT NULL, user_id INT DEFAULT NULL, nom VARCHAR(255) NOT NULL, niveau VARCHAR(255) DEFAULT NULL, INDEX IDX_94D4687FA76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE experience (id INT AUTO_INCREMENT NOT NULL, user_id INT DEFAULT NULL, titreposte VARCHAR(255) NOT NULL, nom_entreprise VARCHAR(255) NOT NULL, date_debut DATE NOT NULL, date_fin DATE DEFAULT NULL, description VARCHAR(255) DEFAULT NULL, INDEX IDX_590C103A76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE experience_competence (experience_id INT NOT NULL, competence_id INT NOT NULL, INDEX IDX_7B75D7C346E90E27 (experience_id), INDEX IDX_7B75D7C315761DAB (competence_id), PRIMARY KEY(experience_id, competence_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE formation (id INT AUTO_INCREMENT NOT NULL, user_id INT DEFAULT NULL, formation_competence_id INT DEFAULT NULL, nom_etablissement VARCHAR(255) NOT NULL, diplome VARCHAR(255) DEFAULT NULL, date_debut DATE NOT NULL, date_fin DATE DEFAULT NULL, description VARCHAR(255) DEFAULT NULL, INDEX IDX_404021BFA76ED395 (user_id), INDEX IDX_404021BF4CD47E4A (formation_competence_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE formation_competence (formation_id INT NOT NULL, competence_id INT NOT NULL, INDEX IDX_6C7CBB465200282E (formation_id), INDEX IDX_6C7CBB4615761DAB (competence_id), PRIMARY KEY(formation_id, competence_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE hobbie (id INT AUTO_INCREMENT NOT NULL, user_id INT DEFAULT NULL, nom VARCHAR(255) NOT NULL, description VARCHAR(255) DEFAULT NULL, INDEX IDX_1D9CA9F7A76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(180) NOT NULL, roles JSON NOT NULL, password VARCHAR(255) NOT NULL, nom VARCHAR(255) NOT NULL, prenom VARCHAR(255) NOT NULL, user_picture VARCHAR(255) DEFAULT NULL, updated_at DATETIME DEFAULT NULL, UNIQUE INDEX UNIQ_8D93D649E7927C74 (email), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE messenger_messages (id BIGINT AUTO_INCREMENT NOT NULL, body LONGTEXT NOT NULL, headers LONGTEXT NOT NULL, queue_name VARCHAR(190) NOT NULL, created_at DATETIME NOT NULL, available_at DATETIME NOT NULL, delivered_at DATETIME DEFAULT NULL, INDEX IDX_75EA56E0FB7336F0 (queue_name), INDEX IDX_75EA56E0E3BD61CE (available_at), INDEX IDX_75EA56E016BA31DB (delivered_at), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE competence ADD CONSTRAINT FK_94D4687FA76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE experience ADD CONSTRAINT FK_590C103A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE experience_competence ADD CONSTRAINT FK_7B75D7C346E90E27 FOREIGN KEY (experience_id) REFERENCES experience (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE experience_competence ADD CONSTRAINT FK_7B75D7C315761DAB FOREIGN KEY (competence_id) REFERENCES competence (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE formation ADD CONSTRAINT FK_404021BFA76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE formation ADD CONSTRAINT FK_404021BF4CD47E4A FOREIGN KEY (formation_competence_id) REFERENCES competence (id)');
        $this->addSql('ALTER TABLE formation_competence ADD CONSTRAINT FK_6C7CBB465200282E FOREIGN KEY (formation_id) REFERENCES formation (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE formation_competence ADD CONSTRAINT FK_6C7CBB4615761DAB FOREIGN KEY (competence_id) REFERENCES competence (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE hobbie ADD CONSTRAINT FK_1D9CA9F7A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE competence DROP FOREIGN KEY FK_94D4687FA76ED395');
        $this->addSql('ALTER TABLE experience DROP FOREIGN KEY FK_590C103A76ED395');
        $this->addSql('ALTER TABLE experience_competence DROP FOREIGN KEY FK_7B75D7C346E90E27');
        $this->addSql('ALTER TABLE experience_competence DROP FOREIGN KEY FK_7B75D7C315761DAB');
        $this->addSql('ALTER TABLE formation DROP FOREIGN KEY FK_404021BFA76ED395');
        $this->addSql('ALTER TABLE formation DROP FOREIGN KEY FK_404021BF4CD47E4A');
        $this->addSql('ALTER TABLE formation_competence DROP FOREIGN KEY FK_6C7CBB465200282E');
        $this->addSql('ALTER TABLE formation_competence DROP FOREIGN KEY FK_6C7CBB4615761DAB');
        $this->addSql('ALTER TABLE hobbie DROP FOREIGN KEY FK_1D9CA9F7A76ED395');
        $this->addSql('DROP TABLE competence');
        $this->addSql('DROP TABLE experience');
        $this->addSql('DROP TABLE experience_competence');
        $this->addSql('DROP TABLE formation');
        $this->addSql('DROP TABLE formation_competence');
        $this->addSql('DROP TABLE hobbie');
        $this->addSql('DROP TABLE user');
        $this->addSql('DROP TABLE messenger_messages');
    }
}
