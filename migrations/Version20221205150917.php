<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20221205150917 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE livre DROP FOREIGN KEY FK_AC634F99DDE18E7B');
        $this->addSql('DROP TABLE empreint');
        $this->addSql('ALTER TABLE livre DROP FOREIGN KEY FK_AC634F999F34925F');
        $this->addSql('DROP INDEX IDX_AC634F999F34925F ON livre');
        $this->addSql('DROP INDEX IDX_AC634F99DDE18E7B ON livre');
        $this->addSql('ALTER TABLE livre DROP id_categorie_id, DROP empreint_id');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE empreint (id INT AUTO_INCREMENT NOT NULL, nom_produit VARCHAR(40) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE livre ADD id_categorie_id INT NOT NULL, ADD empreint_id INT NOT NULL');
        $this->addSql('ALTER TABLE livre ADD CONSTRAINT FK_AC634F999F34925F FOREIGN KEY (id_categorie_id) REFERENCES categorie (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('ALTER TABLE livre ADD CONSTRAINT FK_AC634F99DDE18E7B FOREIGN KEY (empreint_id) REFERENCES empreint (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('CREATE INDEX IDX_AC634F999F34925F ON livre (id_categorie_id)');
        $this->addSql('CREATE INDEX IDX_AC634F99DDE18E7B ON livre (empreint_id)');
    }
}
