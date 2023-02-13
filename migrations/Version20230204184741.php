<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230204184741 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE competence ADD formation_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE competence ADD CONSTRAINT FK_94D4687F5200282E FOREIGN KEY (formation_id) REFERENCES formation (id)');
        $this->addSql('CREATE INDEX IDX_94D4687F5200282E ON competence (formation_id)');
        $this->addSql('ALTER TABLE formation DROP FOREIGN KEY FK_404021BF15761DAB');
        $this->addSql('DROP INDEX IDX_404021BF15761DAB ON formation');
        $this->addSql('ALTER TABLE formation DROP competence_id');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE competence DROP FOREIGN KEY FK_94D4687F5200282E');
        $this->addSql('DROP INDEX IDX_94D4687F5200282E ON competence');
        $this->addSql('ALTER TABLE competence DROP formation_id');
        $this->addSql('ALTER TABLE formation ADD competence_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE formation ADD CONSTRAINT FK_404021BF15761DAB FOREIGN KEY (competence_id) REFERENCES competence (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('CREATE INDEX IDX_404021BF15761DAB ON formation (competence_id)');
    }
}
