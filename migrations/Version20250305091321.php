<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250305091321 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE messenger_messages (id BIGINT AUTO_INCREMENT NOT NULL, body LONGTEXT NOT NULL, headers LONGTEXT NOT NULL, queue_name VARCHAR(190) NOT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', available_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', delivered_at DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\', INDEX IDX_75EA56E0FB7336F0 (queue_name), INDEX IDX_75EA56E0E3BD61CE (available_at), INDEX IDX_75EA56E016BA31DB (delivered_at), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('DROP INDEX UNIQ_9F26610B500E8414 ON garage');
        $this->addSql('ALTER TABLE garage ADD lieu_id INT DEFAULT NULL, ADD nom_garage VARCHAR(255) NOT NULL, CHANGE nom_garage_id voiture_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE garage ADD CONSTRAINT FK_9F26610B181A8BA FOREIGN KEY (voiture_id) REFERENCES voiture (id)');
        $this->addSql('ALTER TABLE garage ADD CONSTRAINT FK_9F26610B6AB213CC FOREIGN KEY (lieu_id) REFERENCES lieu (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_9F26610B181A8BA ON garage (voiture_id)');
        $this->addSql('CREATE INDEX IDX_9F26610B6AB213CC ON garage (lieu_id)');
        $this->addSql('DROP INDEX IDX_2F577D596AB213CC ON lieu');
        $this->addSql('ALTER TABLE lieu ADD ville VARCHAR(255) DEFAULT NULL, DROP lieu_id, CHANGE codepostal codepostal VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE voiture CHANGE prix_location prixÂ_location VARCHAR(255) DEFAULT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE messenger_messages');
        $this->addSql('ALTER TABLE garage DROP FOREIGN KEY FK_9F26610B181A8BA');
        $this->addSql('ALTER TABLE garage DROP FOREIGN KEY FK_9F26610B6AB213CC');
        $this->addSql('DROP INDEX UNIQ_9F26610B181A8BA ON garage');
        $this->addSql('DROP INDEX IDX_9F26610B6AB213CC ON garage');
        $this->addSql('ALTER TABLE garage ADD nom_garage_id INT DEFAULT NULL, DROP voiture_id, DROP lieu_id, DROP nom_garage');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_9F26610B500E8414 ON garage (nom_garage_id)');
        $this->addSql('ALTER TABLE voiture CHANGE prixÂ_location prix_location VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE lieu ADD lieu_id INT DEFAULT NULL, DROP ville, CHANGE codepostal codepostal VARCHAR(255) NOT NULL');
        $this->addSql('CREATE INDEX IDX_2F577D596AB213CC ON lieu (lieu_id)');
    }
}
