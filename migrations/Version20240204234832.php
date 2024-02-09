<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240204234832 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE micro_post_user (micro_post_id INT NOT NULL, user_id INT NOT NULL, PRIMARY KEY(micro_post_id, user_id))');
        $this->addSql('CREATE INDEX IDX_19DCF74D11E37CEA ON micro_post_user (micro_post_id)');
        $this->addSql('CREATE INDEX IDX_19DCF74DA76ED395 ON micro_post_user (user_id)');
        $this->addSql('ALTER TABLE micro_post_user ADD CONSTRAINT FK_19DCF74D11E37CEA FOREIGN KEY (micro_post_id) REFERENCES micro_post (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE micro_post_user ADD CONSTRAINT FK_19DCF74DA76ED395 FOREIGN KEY (user_id) REFERENCES "user" (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('ALTER TABLE micro_post_user DROP CONSTRAINT FK_19DCF74D11E37CEA');
        $this->addSql('ALTER TABLE micro_post_user DROP CONSTRAINT FK_19DCF74DA76ED395');
        $this->addSql('DROP TABLE micro_post_user');
    }
}
