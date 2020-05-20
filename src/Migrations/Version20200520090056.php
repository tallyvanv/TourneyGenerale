<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200520090056 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE `match` ADD winner_id INT DEFAULT NULL, ADD loser_id INT DEFAULT NULL, ADD tie TINYINT(1) DEFAULT NULL');
        $this->addSql('ALTER TABLE `match` ADD CONSTRAINT FK_7A5BC5055DFCD4B8 FOREIGN KEY (winner_id) REFERENCES team (id)');
        $this->addSql('ALTER TABLE `match` ADD CONSTRAINT FK_7A5BC5051BCAA5F6 FOREIGN KEY (loser_id) REFERENCES team (id)');
        $this->addSql('CREATE INDEX IDX_7A5BC5055DFCD4B8 ON `match` (winner_id)');
        $this->addSql('CREATE INDEX IDX_7A5BC5051BCAA5F6 ON `match` (loser_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE `match` DROP FOREIGN KEY FK_7A5BC5055DFCD4B8');
        $this->addSql('ALTER TABLE `match` DROP FOREIGN KEY FK_7A5BC5051BCAA5F6');
        $this->addSql('DROP INDEX IDX_7A5BC5055DFCD4B8 ON `match`');
        $this->addSql('DROP INDEX IDX_7A5BC5051BCAA5F6 ON `match`');
        $this->addSql('ALTER TABLE `match` DROP winner_id, DROP loser_id, DROP tie');
    }
}
