<?php declare(strict_types = 1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20180304111515 extends AbstractMigration
{
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE users_about (id BIGINT UNSIGNED AUTO_INCREMENT NOT NULL, user_id INT UNSIGNED DEFAULT NULL, item VARCHAR(255) NOT NULL, value VARCHAR(250) NOT NULL, up_date DATETIME DEFAULT CURRENT_TIMESTAMP NOT NULL, INDEX user (user_id), INDEX user_item_value (user_id, item, value), INDEX item (item), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE users (id INT UNSIGNED AUTO_INCREMENT NOT NULL, email VARCHAR(100) NOT NULL, password VARCHAR(100) NOT NULL, role VARCHAR(100) NOT NULL, reg_date DATETIME DEFAULT CURRENT_TIMESTAMP NOT NULL, last_visit DATETIME DEFAULT \'0000-00-00 00:00:00\' NOT NULL, INDEX email_password (email, password), INDEX role_reg_date (role, reg_date), UNIQUE INDEX email (email), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE users_about ADD CONSTRAINT FK_528386AAA76ED395 FOREIGN KEY (user_id) REFERENCES users (id)');
    }

    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE users_about DROP FOREIGN KEY FK_528386AAA76ED395');
        $this->addSql('DROP TABLE users_about');
        $this->addSql('DROP TABLE users');
    }
}
