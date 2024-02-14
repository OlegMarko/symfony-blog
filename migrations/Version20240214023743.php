<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240214023743 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE comment ADD author_id INT NOT NULL');
        $this->addSql('ALTER TABLE comment ADD CONSTRAINT FK_9474526CF675F31B FOREIGN KEY (author_id) REFERENCES "user" (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('CREATE INDEX IDX_9474526CF675F31B ON comment (author_id)');
        $this->addSql('ALTER TABLE micro_post ADD author_id INT NOT NULL');
        $this->addSql('ALTER TABLE micro_post ADD CONSTRAINT FK_2AEFE017F675F31B FOREIGN KEY (author_id) REFERENCES "user" (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('CREATE INDEX IDX_2AEFE017F675F31B ON micro_post (author_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('ALTER TABLE micro_post DROP CONSTRAINT FK_2AEFE017F675F31B');
        $this->addSql('DROP INDEX IDX_2AEFE017F675F31B');
        $this->addSql('ALTER TABLE micro_post DROP author_id');
        $this->addSql('ALTER TABLE comment DROP CONSTRAINT FK_9474526CF675F31B');
        $this->addSql('DROP INDEX IDX_9474526CF675F31B');
        $this->addSql('ALTER TABLE comment DROP author_id');
    }
}
