<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20161115012446 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE form CHANGE oc1what_why oc1what_why VARCHAR(255) DEFAULT NULL, CHANGE oc2what_why oc2what_why VARCHAR(255) DEFAULT NULL, CHANGE oc3what_why oc3what_why VARCHAR(255) DEFAULT NULL, CHANGE oc4what_why oc4what_why VARCHAR(255) DEFAULT NULL, CHANGE oc5what_why oc5what_why VARCHAR(255) DEFAULT NULL, CHANGE additional_info additional_info LONGTEXT DEFAULT NULL');
    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE form CHANGE oc1what_why oc1what_why VARCHAR(40) DEFAULT NULL COLLATE utf8_unicode_ci, CHANGE oc2what_why oc2what_why VARCHAR(40) DEFAULT NULL COLLATE utf8_unicode_ci, CHANGE oc3what_why oc3what_why VARCHAR(40) DEFAULT NULL COLLATE utf8_unicode_ci, CHANGE oc4what_why oc4what_why VARCHAR(40) DEFAULT NULL COLLATE utf8_unicode_ci, CHANGE oc5what_why oc5what_why VARCHAR(40) DEFAULT NULL COLLATE utf8_unicode_ci, CHANGE additional_info additional_info VARCHAR(255) DEFAULT NULL COLLATE utf8_unicode_ci');
    }
}
