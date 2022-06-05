<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220529141050 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE pack_videos (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(32) NOT NULL, description LONGTEXT DEFAULT NULL, prix DOUBLE PRECISION DEFAULT NULL, slug VARCHAR(100) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE videos ADD pack_videos_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE videos ADD CONSTRAINT FK_29AA64321CA2BF04 FOREIGN KEY (pack_videos_id) REFERENCES pack_videos (id)');
        $this->addSql('CREATE INDEX IDX_29AA64321CA2BF04 ON videos (pack_videos_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE videos DROP FOREIGN KEY FK_29AA64321CA2BF04');
        $this->addSql('DROP TABLE pack_videos');
        $this->addSql('DROP INDEX IDX_29AA64321CA2BF04 ON videos');
        $this->addSql('ALTER TABLE videos DROP pack_videos_id');
    }
}
