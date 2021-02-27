<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210220153626 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE employee (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, surname VARCHAR(255) NOT NULL, email VARCHAR(255) NOT NULL, phone VARCHAR(255) NOT NULL, department VARCHAR(255) NOT NULL, position VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE equipment_handover (id INT AUTO_INCREMENT NOT NULL, employee_id INT NOT NULL, equipment_id INT NOT NULL, handover_user_id INT NOT NULL, takeover_user_id INT DEFAULT NULL, handover_date DATE NOT NULL, takeover_date DATE DEFAULT NULL, INDEX IDX_B0DA64F28C03F15C (employee_id), INDEX IDX_B0DA64F2517FE9FE (equipment_id), INDEX IDX_B0DA64F2C7EE0FD8 (handover_user_id), INDEX IDX_B0DA64F2DFDE5566 (takeover_user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE equipment_handover ADD CONSTRAINT FK_B0DA64F28C03F15C FOREIGN KEY (employee_id) REFERENCES employee (id)');
        $this->addSql('ALTER TABLE equipment_handover ADD CONSTRAINT FK_B0DA64F2517FE9FE FOREIGN KEY (equipment_id) REFERENCES equipment (id)');
        $this->addSql('ALTER TABLE equipment_handover ADD CONSTRAINT FK_B0DA64F2C7EE0FD8 FOREIGN KEY (handover_user_id) REFERENCES employee (id)');
        $this->addSql('ALTER TABLE equipment_handover ADD CONSTRAINT FK_B0DA64F2DFDE5566 FOREIGN KEY (takeover_user_id) REFERENCES employee (id)');
        $this->addSql('ALTER TABLE user CHANGE roles roles LONGTEXT NOT NULL COMMENT \'(DC2Type:json)\'');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE equipment_handover DROP FOREIGN KEY FK_B0DA64F28C03F15C');
        $this->addSql('ALTER TABLE equipment_handover DROP FOREIGN KEY FK_B0DA64F2C7EE0FD8');
        $this->addSql('ALTER TABLE equipment_handover DROP FOREIGN KEY FK_B0DA64F2DFDE5566');
        $this->addSql('DROP TABLE employee');
        $this->addSql('DROP TABLE equipment_handover');
        $this->addSql('ALTER TABLE user CHANGE roles roles LONGTEXT CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_bin`');
    }
}
