<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20221206205418 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SEQUENCE book_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE empreint_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE TABLE book (id INT NOT NULL, category_id INT DEFAULT NULL, name VARCHAR(255) NOT NULL, autheur VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_CBE5A33112469DE2 ON book (category_id)');
        $this->addSql('CREATE TABLE empreint (id INT NOT NULL, empreinter_id INT DEFAULT NULL, empreinted_id INT DEFAULT NULL, book_id INT DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_7890E66F3D45CE63 ON empreint (empreinter_id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_7890E66F4837C620 ON empreint (empreinted_id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_7890E66F16A2B381 ON empreint (book_id)');
        $this->addSql('ALTER TABLE book ADD CONSTRAINT FK_CBE5A33112469DE2 FOREIGN KEY (category_id) REFERENCES category (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE empreint ADD CONSTRAINT FK_7890E66F3D45CE63 FOREIGN KEY (empreinter_id) REFERENCES "user" (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE empreint ADD CONSTRAINT FK_7890E66F4837C620 FOREIGN KEY (empreinted_id) REFERENCES book (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE empreint ADD CONSTRAINT FK_7890E66F16A2B381 FOREIGN KEY (book_id) REFERENCES book (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('DROP SEQUENCE book_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE empreint_id_seq CASCADE');
        $this->addSql('ALTER TABLE book DROP CONSTRAINT FK_CBE5A33112469DE2');
        $this->addSql('ALTER TABLE empreint DROP CONSTRAINT FK_7890E66F3D45CE63');
        $this->addSql('ALTER TABLE empreint DROP CONSTRAINT FK_7890E66F4837C620');
        $this->addSql('ALTER TABLE empreint DROP CONSTRAINT FK_7890E66F16A2B381');
        $this->addSql('DROP TABLE book');
        $this->addSql('DROP TABLE empreint');
    }
}
