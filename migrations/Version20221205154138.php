<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20221205154138 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE empreint (id INT AUTO_INCREMENT NOT NULL, nom_produit VARCHAR(50) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE empreint_livre (empreint_id INT NOT NULL, livre_id INT NOT NULL, INDEX IDX_9FCFF4B9DDE18E7B (empreint_id), INDEX IDX_9FCFF4B937D925CB (livre_id), PRIMARY KEY(empreint_id, livre_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE empreint_livre ADD CONSTRAINT FK_9FCFF4B9DDE18E7B FOREIGN KEY (empreint_id) REFERENCES empreint (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE empreint_livre ADD CONSTRAINT FK_9FCFF4B937D925CB FOREIGN KEY (livre_id) REFERENCES livre (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE empreint_livre DROP FOREIGN KEY FK_9FCFF4B9DDE18E7B');
        $this->addSql('ALTER TABLE empreint_livre DROP FOREIGN KEY FK_9FCFF4B937D925CB');
        $this->addSql('DROP TABLE empreint');
        $this->addSql('DROP TABLE empreint_livre');
    }
}
