<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20221206210038 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SEQUENCE "authorization_id_seq" INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE TABLE "authorization" (id INT NOT NULL, authentified_id INT DEFAULT NULL, role VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_7A6D8BEF2184C8D6 ON "authorization" (authentified_id)');
        $this->addSql('ALTER TABLE "authorization" ADD CONSTRAINT FK_7A6D8BEF2184C8D6 FOREIGN KEY (authentified_id) REFERENCES "user" (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('DROP SEQUENCE "authorization_id_seq" CASCADE');
        $this->addSql('ALTER TABLE "authorization" DROP CONSTRAINT FK_7A6D8BEF2184C8D6');
        $this->addSql('DROP TABLE "authorization"');
    }
}
