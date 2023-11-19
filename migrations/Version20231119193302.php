<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

final class Version20231119173302 extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'Adds index to existing NWCG_REPORTING_UNIT_NAME column';
    }

    public function up(Schema $schema): void
    {
        $this->addSql('CREATE INDEX i_forest_name ON Fires (NWCG_REPORTING_UNIT_NAME)');
    }

    public function down(Schema $schema): void
    {
        $this->addSql('DROP INDEX i_forest_name ON Fires');
    }
}
