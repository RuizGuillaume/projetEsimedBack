<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210623124719 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SEQUENCE composition_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE droit_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE fournisseur_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE gamme_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE gamme_operation_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE machine_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE operation_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE piece_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE plan_de_travail_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE plan_machine_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE realisation_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE type_piece_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE utilisateur_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE utilisateur_droit_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE utilisateur_qualification_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE TABLE composition (id INT NOT NULL, piece_id INT DEFAULT NULL, quantite INT NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_C7F4347C40FCFA8 ON composition (piece_id)');
        $this->addSql('CREATE TABLE droit (id INT NOT NULL, libelle VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE fournisseur (id INT NOT NULL, libelle VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE gamme (id INT NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE gamme_utilisateur (gamme_id INT NOT NULL, utilisateur_id INT NOT NULL, PRIMARY KEY(gamme_id, utilisateur_id))');
        $this->addSql('CREATE INDEX IDX_A30E701CD2FD85F1 ON gamme_utilisateur (gamme_id)');
        $this->addSql('CREATE INDEX IDX_A30E701CFB88E14F ON gamme_utilisateur (utilisateur_id)');
        $this->addSql('CREATE TABLE gamme_piece (gamme_id INT NOT NULL, piece_id INT NOT NULL, PRIMARY KEY(gamme_id, piece_id))');
        $this->addSql('CREATE INDEX IDX_6C31ABDED2FD85F1 ON gamme_piece (gamme_id)');
        $this->addSql('CREATE INDEX IDX_6C31ABDEC40FCFA8 ON gamme_piece (piece_id)');
        $this->addSql('CREATE TABLE gamme_operation (id INT NOT NULL, numero_operation INT DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE gamme_operation_gamme (gamme_operation_id INT NOT NULL, gamme_id INT NOT NULL, PRIMARY KEY(gamme_operation_id, gamme_id))');
        $this->addSql('CREATE INDEX IDX_1B4C3DC527B99E9 ON gamme_operation_gamme (gamme_operation_id)');
        $this->addSql('CREATE INDEX IDX_1B4C3DC5D2FD85F1 ON gamme_operation_gamme (gamme_id)');
        $this->addSql('CREATE TABLE machine (id INT NOT NULL, nom VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE operation (id INT NOT NULL, id_machine_id INT NOT NULL, id_plan_de_travail_id INT NOT NULL, duree TIME(0) WITHOUT TIME ZONE DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_1981A66D533DDBF1 ON operation (id_machine_id)');
        $this->addSql('CREATE INDEX IDX_1981A66D1ADE7CF3 ON operation (id_plan_de_travail_id)');
        $this->addSql('CREATE TABLE piece (id INT NOT NULL, id_type_piece_id INT NOT NULL, fournisseur_id INT NOT NULL, composition_id INT DEFAULT NULL, prix_vente DOUBLE PRECISION DEFAULT NULL, libelle VARCHAR(255) NOT NULL, quantite_stock INT NOT NULL, prix_catalogue DOUBLE PRECISION DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_44CA0B23B7D83931 ON piece (id_type_piece_id)');
        $this->addSql('CREATE INDEX IDX_44CA0B23670C757F ON piece (fournisseur_id)');
        $this->addSql('CREATE INDEX IDX_44CA0B2387A2E12 ON piece (composition_id)');
        $this->addSql('CREATE TABLE plan_de_travail (id INT NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE plan_machine (id INT NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE plan_machine_machine (plan_machine_id INT NOT NULL, machine_id INT NOT NULL, PRIMARY KEY(plan_machine_id, machine_id))');
        $this->addSql('CREATE INDEX IDX_F310784A9BDA6130 ON plan_machine_machine (plan_machine_id)');
        $this->addSql('CREATE INDEX IDX_F310784AF6B75B26 ON plan_machine_machine (machine_id)');
        $this->addSql('CREATE TABLE plan_machine_plan_de_travail (plan_machine_id INT NOT NULL, plan_de_travail_id INT NOT NULL, PRIMARY KEY(plan_machine_id, plan_de_travail_id))');
        $this->addSql('CREATE INDEX IDX_D8536F9C9BDA6130 ON plan_machine_plan_de_travail (plan_machine_id)');
        $this->addSql('CREATE INDEX IDX_D8536F9C99FCCE5C ON plan_machine_plan_de_travail (plan_de_travail_id)');
        $this->addSql('CREATE TABLE realisation (id INT NOT NULL, date DATE NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE realisation_gamme (realisation_id INT NOT NULL, gamme_id INT NOT NULL, PRIMARY KEY(realisation_id, gamme_id))');
        $this->addSql('CREATE INDEX IDX_98E7B38B685E551 ON realisation_gamme (realisation_id)');
        $this->addSql('CREATE INDEX IDX_98E7B38D2FD85F1 ON realisation_gamme (gamme_id)');
        $this->addSql('CREATE TABLE type_piece (id INT NOT NULL, libelle VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE utilisateur (id INT NOT NULL, nom VARCHAR(255) NOT NULL, prenom VARCHAR(255) NOT NULL, email VARCHAR(255) DEFAULT NULL, mdp VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE utilisateur_droit (id INT NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE utilisateur_droit_utilisateur (utilisateur_droit_id INT NOT NULL, utilisateur_id INT NOT NULL, PRIMARY KEY(utilisateur_droit_id, utilisateur_id))');
        $this->addSql('CREATE INDEX IDX_C57B859544D2CAEF ON utilisateur_droit_utilisateur (utilisateur_droit_id)');
        $this->addSql('CREATE INDEX IDX_C57B8595FB88E14F ON utilisateur_droit_utilisateur (utilisateur_id)');
        $this->addSql('CREATE TABLE utilisateur_droit_droit (utilisateur_droit_id INT NOT NULL, droit_id INT NOT NULL, PRIMARY KEY(utilisateur_droit_id, droit_id))');
        $this->addSql('CREATE INDEX IDX_2909E7D344D2CAEF ON utilisateur_droit_droit (utilisateur_droit_id)');
        $this->addSql('CREATE INDEX IDX_2909E7D35AA93370 ON utilisateur_droit_droit (droit_id)');
        $this->addSql('CREATE TABLE utilisateur_qualification (id INT NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE utilisateur_qualification_utilisateur (utilisateur_qualification_id INT NOT NULL, utilisateur_id INT NOT NULL, PRIMARY KEY(utilisateur_qualification_id, utilisateur_id))');
        $this->addSql('CREATE INDEX IDX_3C976563A306E38E ON utilisateur_qualification_utilisateur (utilisateur_qualification_id)');
        $this->addSql('CREATE INDEX IDX_3C976563FB88E14F ON utilisateur_qualification_utilisateur (utilisateur_id)');
        $this->addSql('CREATE TABLE utilisateur_qualification_plan_de_travail (utilisateur_qualification_id INT NOT NULL, plan_de_travail_id INT NOT NULL, PRIMARY KEY(utilisateur_qualification_id, plan_de_travail_id))');
        $this->addSql('CREATE INDEX IDX_773BE2DBA306E38E ON utilisateur_qualification_plan_de_travail (utilisateur_qualification_id)');
        $this->addSql('CREATE INDEX IDX_773BE2DB99FCCE5C ON utilisateur_qualification_plan_de_travail (plan_de_travail_id)');
        $this->addSql('ALTER TABLE composition ADD CONSTRAINT FK_C7F4347C40FCFA8 FOREIGN KEY (piece_id) REFERENCES piece (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE gamme_utilisateur ADD CONSTRAINT FK_A30E701CD2FD85F1 FOREIGN KEY (gamme_id) REFERENCES gamme (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE gamme_utilisateur ADD CONSTRAINT FK_A30E701CFB88E14F FOREIGN KEY (utilisateur_id) REFERENCES utilisateur (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE gamme_piece ADD CONSTRAINT FK_6C31ABDED2FD85F1 FOREIGN KEY (gamme_id) REFERENCES gamme (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE gamme_piece ADD CONSTRAINT FK_6C31ABDEC40FCFA8 FOREIGN KEY (piece_id) REFERENCES piece (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE gamme_operation_gamme ADD CONSTRAINT FK_1B4C3DC527B99E9 FOREIGN KEY (gamme_operation_id) REFERENCES gamme_operation (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE gamme_operation_gamme ADD CONSTRAINT FK_1B4C3DC5D2FD85F1 FOREIGN KEY (gamme_id) REFERENCES gamme (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE operation ADD CONSTRAINT FK_1981A66D533DDBF1 FOREIGN KEY (id_machine_id) REFERENCES plan_machine (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE operation ADD CONSTRAINT FK_1981A66D1ADE7CF3 FOREIGN KEY (id_plan_de_travail_id) REFERENCES plan_machine (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE piece ADD CONSTRAINT FK_44CA0B23B7D83931 FOREIGN KEY (id_type_piece_id) REFERENCES type_piece (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE piece ADD CONSTRAINT FK_44CA0B23670C757F FOREIGN KEY (fournisseur_id) REFERENCES fournisseur (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE piece ADD CONSTRAINT FK_44CA0B2387A2E12 FOREIGN KEY (composition_id) REFERENCES composition (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE plan_machine_machine ADD CONSTRAINT FK_F310784A9BDA6130 FOREIGN KEY (plan_machine_id) REFERENCES plan_machine (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE plan_machine_machine ADD CONSTRAINT FK_F310784AF6B75B26 FOREIGN KEY (machine_id) REFERENCES machine (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE plan_machine_plan_de_travail ADD CONSTRAINT FK_D8536F9C9BDA6130 FOREIGN KEY (plan_machine_id) REFERENCES plan_machine (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE plan_machine_plan_de_travail ADD CONSTRAINT FK_D8536F9C99FCCE5C FOREIGN KEY (plan_de_travail_id) REFERENCES plan_de_travail (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE realisation_gamme ADD CONSTRAINT FK_98E7B38B685E551 FOREIGN KEY (realisation_id) REFERENCES realisation (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE realisation_gamme ADD CONSTRAINT FK_98E7B38D2FD85F1 FOREIGN KEY (gamme_id) REFERENCES gamme (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE utilisateur_droit_utilisateur ADD CONSTRAINT FK_C57B859544D2CAEF FOREIGN KEY (utilisateur_droit_id) REFERENCES utilisateur_droit (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE utilisateur_droit_utilisateur ADD CONSTRAINT FK_C57B8595FB88E14F FOREIGN KEY (utilisateur_id) REFERENCES utilisateur (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE utilisateur_droit_droit ADD CONSTRAINT FK_2909E7D344D2CAEF FOREIGN KEY (utilisateur_droit_id) REFERENCES utilisateur_droit (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE utilisateur_droit_droit ADD CONSTRAINT FK_2909E7D35AA93370 FOREIGN KEY (droit_id) REFERENCES droit (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE utilisateur_qualification_utilisateur ADD CONSTRAINT FK_3C976563A306E38E FOREIGN KEY (utilisateur_qualification_id) REFERENCES utilisateur_qualification (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE utilisateur_qualification_utilisateur ADD CONSTRAINT FK_3C976563FB88E14F FOREIGN KEY (utilisateur_id) REFERENCES utilisateur (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE utilisateur_qualification_plan_de_travail ADD CONSTRAINT FK_773BE2DBA306E38E FOREIGN KEY (utilisateur_qualification_id) REFERENCES utilisateur_qualification (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE utilisateur_qualification_plan_de_travail ADD CONSTRAINT FK_773BE2DB99FCCE5C FOREIGN KEY (plan_de_travail_id) REFERENCES plan_de_travail (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('ALTER TABLE piece DROP CONSTRAINT FK_44CA0B2387A2E12');
        $this->addSql('ALTER TABLE utilisateur_droit_droit DROP CONSTRAINT FK_2909E7D35AA93370');
        $this->addSql('ALTER TABLE piece DROP CONSTRAINT FK_44CA0B23670C757F');
        $this->addSql('ALTER TABLE gamme_utilisateur DROP CONSTRAINT FK_A30E701CD2FD85F1');
        $this->addSql('ALTER TABLE gamme_piece DROP CONSTRAINT FK_6C31ABDED2FD85F1');
        $this->addSql('ALTER TABLE gamme_operation_gamme DROP CONSTRAINT FK_1B4C3DC5D2FD85F1');
        $this->addSql('ALTER TABLE realisation_gamme DROP CONSTRAINT FK_98E7B38D2FD85F1');
        $this->addSql('ALTER TABLE gamme_operation_gamme DROP CONSTRAINT FK_1B4C3DC527B99E9');
        $this->addSql('ALTER TABLE plan_machine_machine DROP CONSTRAINT FK_F310784AF6B75B26');
        $this->addSql('ALTER TABLE composition DROP CONSTRAINT FK_C7F4347C40FCFA8');
        $this->addSql('ALTER TABLE gamme_piece DROP CONSTRAINT FK_6C31ABDEC40FCFA8');
        $this->addSql('ALTER TABLE plan_machine_plan_de_travail DROP CONSTRAINT FK_D8536F9C99FCCE5C');
        $this->addSql('ALTER TABLE utilisateur_qualification_plan_de_travail DROP CONSTRAINT FK_773BE2DB99FCCE5C');
        $this->addSql('ALTER TABLE operation DROP CONSTRAINT FK_1981A66D533DDBF1');
        $this->addSql('ALTER TABLE operation DROP CONSTRAINT FK_1981A66D1ADE7CF3');
        $this->addSql('ALTER TABLE plan_machine_machine DROP CONSTRAINT FK_F310784A9BDA6130');
        $this->addSql('ALTER TABLE plan_machine_plan_de_travail DROP CONSTRAINT FK_D8536F9C9BDA6130');
        $this->addSql('ALTER TABLE realisation_gamme DROP CONSTRAINT FK_98E7B38B685E551');
        $this->addSql('ALTER TABLE piece DROP CONSTRAINT FK_44CA0B23B7D83931');
        $this->addSql('ALTER TABLE gamme_utilisateur DROP CONSTRAINT FK_A30E701CFB88E14F');
        $this->addSql('ALTER TABLE utilisateur_droit_utilisateur DROP CONSTRAINT FK_C57B8595FB88E14F');
        $this->addSql('ALTER TABLE utilisateur_qualification_utilisateur DROP CONSTRAINT FK_3C976563FB88E14F');
        $this->addSql('ALTER TABLE utilisateur_droit_utilisateur DROP CONSTRAINT FK_C57B859544D2CAEF');
        $this->addSql('ALTER TABLE utilisateur_droit_droit DROP CONSTRAINT FK_2909E7D344D2CAEF');
        $this->addSql('ALTER TABLE utilisateur_qualification_utilisateur DROP CONSTRAINT FK_3C976563A306E38E');
        $this->addSql('ALTER TABLE utilisateur_qualification_plan_de_travail DROP CONSTRAINT FK_773BE2DBA306E38E');
        $this->addSql('DROP SEQUENCE composition_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE droit_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE fournisseur_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE gamme_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE gamme_operation_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE machine_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE operation_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE piece_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE plan_de_travail_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE plan_machine_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE realisation_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE type_piece_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE utilisateur_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE utilisateur_droit_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE utilisateur_qualification_id_seq CASCADE');
        $this->addSql('DROP TABLE composition');
        $this->addSql('DROP TABLE droit');
        $this->addSql('DROP TABLE fournisseur');
        $this->addSql('DROP TABLE gamme');
        $this->addSql('DROP TABLE gamme_utilisateur');
        $this->addSql('DROP TABLE gamme_piece');
        $this->addSql('DROP TABLE gamme_operation');
        $this->addSql('DROP TABLE gamme_operation_gamme');
        $this->addSql('DROP TABLE machine');
        $this->addSql('DROP TABLE operation');
        $this->addSql('DROP TABLE piece');
        $this->addSql('DROP TABLE plan_de_travail');
        $this->addSql('DROP TABLE plan_machine');
        $this->addSql('DROP TABLE plan_machine_machine');
        $this->addSql('DROP TABLE plan_machine_plan_de_travail');
        $this->addSql('DROP TABLE realisation');
        $this->addSql('DROP TABLE realisation_gamme');
        $this->addSql('DROP TABLE type_piece');
        $this->addSql('DROP TABLE utilisateur');
        $this->addSql('DROP TABLE utilisateur_droit');
        $this->addSql('DROP TABLE utilisateur_droit_utilisateur');
        $this->addSql('DROP TABLE utilisateur_droit_droit');
        $this->addSql('DROP TABLE utilisateur_qualification');
        $this->addSql('DROP TABLE utilisateur_qualification_utilisateur');
        $this->addSql('DROP TABLE utilisateur_qualification_plan_de_travail');
    }
}
