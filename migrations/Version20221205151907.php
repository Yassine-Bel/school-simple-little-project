<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20221205151907 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE empreint (id INT AUTO_INCREMENT NOT NULL, idlivre_id INT NOT NULL, nom_produit VARCHAR(30) NOT NULL, INDEX IDX_7890E66F9D0C6DC6 (idlivre_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE empreint ADD CONSTRAINT FK_7890E66F9D0C6DC6 FOREIGN KEY (idlivre_id) REFERENCES livre (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE empreint DROP FOREIGN KEY FK_7890E66F9D0C6DC6');
        $this->addSql('DROP TABLE empreint');
    }
}
