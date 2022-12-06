<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20221206123347 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE authorization ADD id_user_id INT NOT NULL');
        $this->addSql('ALTER TABLE authorization ADD CONSTRAINT FK_7A6D8BEF79F37AE5 FOREIGN KEY (id_user_id) REFERENCES user (id)');
        $this->addSql('CREATE INDEX IDX_7A6D8BEF79F37AE5 ON authorization (id_user_id)');
        $this->addSql('ALTER TABLE user DROP FOREIGN KEY FK_8D93D64979F37AE5');
        $this->addSql('DROP INDEX IDX_8D93D64979F37AE5 ON user');
        $this->addSql('ALTER TABLE user DROP id_user_id');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE authorization DROP FOREIGN KEY FK_7A6D8BEF79F37AE5');
        $this->addSql('DROP INDEX IDX_7A6D8BEF79F37AE5 ON authorization');
        $this->addSql('ALTER TABLE authorization DROP id_user_id');
        $this->addSql('ALTER TABLE user ADD id_user_id INT NOT NULL');
        $this->addSql('ALTER TABLE user ADD CONSTRAINT FK_8D93D64979F37AE5 FOREIGN KEY (id_user_id) REFERENCES authorization (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('CREATE INDEX IDX_8D93D64979F37AE5 ON user (id_user_id)');
    }
}
