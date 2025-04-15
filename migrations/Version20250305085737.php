<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250305085737 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE garage (id INT AUTO_INCREMENT NOT NULL, nom_garage_id INT DEFAULT NULL, UNIQUE INDEX UNIQ_9F26610B500E8414 (nom_garage_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE lieu (id INT AUTO_INCREMENT NOT NULL, lieu_id INT DEFAULT NULL, adresse VARCHAR(255) NOT NULL, codepostal VARCHAR(255) NOT NULL, INDEX IDX_2F577D596AB213CC (lieu_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE voiture (id INT AUTO_INCREMENT NOT NULL, titre VARCHAR(255) NOT NULL, description LONGTEXT NOT NULL, lien_image VARCHAR(255) DEFAULT NULL, prix_location VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE garage ADD CONSTRAINT FK_9F26610B500E8414 FOREIGN KEY (nom_garage_id) REFERENCES voiture (id)');
        $this->addSql('ALTER TABLE lieu ADD CONSTRAINT FK_2F577D596AB213CC FOREIGN KEY (lieu_id) REFERENCES lieu (id)');
        $this->addSql('ALTER TABLE jeux DROP FOREIGN KEY FK_3755B50D3375BD21');
        $this->addSql('DROP TABLE jeux');
        $this->addSql('DROP TABLE user');
        $this->addSql('DROP TABLE editeur');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE jeux (id INT AUTO_INCREMENT NOT NULL, editeur_id INT DEFAULT NULL, nom VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, duree INT DEFAULT NULL, mini INT DEFAULT NULL, maxi INT DEFAULT NULL, photo1 VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, photo2 VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, photo3 VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, prix NUMERIC(5, 2) NOT NULL, stock INT DEFAULT NULL, note INT DEFAULT NULL, INDEX IDX_3755B50D3375BD21 (editeur_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(180) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, roles JSON NOT NULL COMMENT \'(DC2Type:json)\', password VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, nom VARCHAR(100) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, prenom VARCHAR(100) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, UNIQUE INDEX UNIQ_IDENTIFIER_EMAIL (email), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE editeur (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, adresse VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, cp VARCHAR(5) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, ville VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE jeux ADD CONSTRAINT FK_3755B50D3375BD21 FOREIGN KEY (editeur_id) REFERENCES editeur (id)');
        $this->addSql('ALTER TABLE garage DROP FOREIGN KEY FK_9F26610B500E8414');
        $this->addSql('ALTER TABLE lieu DROP FOREIGN KEY FK_2F577D596AB213CC');
        $this->addSql('DROP TABLE garage');
        $this->addSql('DROP TABLE lieu');
        $this->addSql('DROP TABLE voiture');
    }
}
