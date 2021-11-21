<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20211121004822 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE cliente (id INT AUTO_INCREMENT NOT NULL, nome VARCHAR(64) NOT NULL, cpf INT NOT NULL, endereço VARCHAR(100) DEFAULT NULL, email VARCHAR(100) NOT NULL, telefone INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE conteiner (id INT AUTO_INCREMENT NOT NULL, cliente_conteiner_id INT DEFAULT NULL, number VARCHAR(11) NOT NULL, type INT NOT NULL, status VARCHAR(5) NOT NULL, category VARCHAR(11) NOT NULL, INDEX IDX_32224ADB6C673F0A (cliente_conteiner_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE conteiner_movimentacoes (id INT AUTO_INCREMENT NOT NULL, movement_type VARCHAR(20) NOT NULL, dt_inicio DATETIME NOT NULL, dt_fim DATETIME NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE conteiner_movimentacoes_conteiner (conteiner_movimentacoes_id INT NOT NULL, conteiner_id INT NOT NULL, INDEX IDX_F5F9F7FD16D16E86 (conteiner_movimentacoes_id), INDEX IDX_F5F9F7FD386BF9B8 (conteiner_id), PRIMARY KEY(conteiner_movimentacoes_id, conteiner_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE conteiner ADD CONSTRAINT FK_32224ADB6C673F0A FOREIGN KEY (cliente_conteiner_id) REFERENCES cliente (id)');
        $this->addSql('ALTER TABLE conteiner_movimentacoes_conteiner ADD CONSTRAINT FK_F5F9F7FD16D16E86 FOREIGN KEY (conteiner_movimentacoes_id) REFERENCES conteiner_movimentacoes (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE conteiner_movimentacoes_conteiner ADD CONSTRAINT FK_F5F9F7FD386BF9B8 FOREIGN KEY (conteiner_id) REFERENCES conteiner (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE conteiner DROP FOREIGN KEY FK_32224ADB6C673F0A');
        $this->addSql('ALTER TABLE conteiner_movimentacoes_conteiner DROP FOREIGN KEY FK_F5F9F7FD386BF9B8');
        $this->addSql('ALTER TABLE conteiner_movimentacoes_conteiner DROP FOREIGN KEY FK_F5F9F7FD16D16E86');
        $this->addSql('DROP TABLE cliente');
        $this->addSql('DROP TABLE conteiner');
        $this->addSql('DROP TABLE conteiner_movimentacoes');
        $this->addSql('DROP TABLE conteiner_movimentacoes_conteiner');
    }
}
