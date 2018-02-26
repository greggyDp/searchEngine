<?php declare(strict_types = 1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20180226185058 extends AbstractMigration
{
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE users_about DROP FOREIGN KEY users_about_ibfk_1');
        $this->addSql('ALTER TABLE users_about CHANGE user user INT UNSIGNED DEFAULT NULL');
        $this->addSql('ALTER TABLE users_about ADD CONSTRAINT FK_528386AA8D93D649 FOREIGN KEY (user) REFERENCES users (id)');
    }

    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE users_about DROP FOREIGN KEY FK_528386AA8D93D649');
        $this->addSql('ALTER TABLE users_about CHANGE user user INT UNSIGNED NOT NULL');
        $this->addSql('ALTER TABLE users_about ADD CONSTRAINT users_about_ibfk_1 FOREIGN KEY (user) REFERENCES users (id) ON UPDATE CASCADE ON DELETE CASCADE');
    }
}
