CREATE TABLE `admin` (
	`id` int NOT NULL AUTO_INCREMENT,
	`nom` varchar(100) ,
	`prenom` varchar(100) ,
	`sexe` varchar(100) ,
	`date_n` DATE ,
	`tel` varchar(100) ,
	`email` varchar(100)  UNIQUE,
	`username` varchar(100)  UNIQUE,
	`password` varchar(100) ,
	`qst_s` varchar(100) ,
	`photo` varchar(100) ,
	PRIMARY KEY (`id`)
);

CREATE TABLE `membre` (
	`id_abo` int,
	`id_membre` int NOT NULL AUTO_INCREMENT,
	`nom` varchar(100),
	`prenom` varchar(100),
	`sexe` varchar(100),	
	`date_n` DATE ,
	`email` varchar(100)  UNIQUE,
	`username` varchar(100)  UNIQUE,
	`password` varchar(100) ,
	`adress` varchar(100) ,
	`tel` varchar(100) ,
	`date_rejoint` DATE ,
	`photo` varchar(100) ,
	PRIMARY KEY (`id_membre`)
);

CREATE TABLE `abonnenement` (
	`id_abo` int NOT NULL AUTO_INCREMENT,
	`date_pay` DATE ,
	`id_plan` int ,
	`date_exp` DATE ,
	`status` BOOLEAN ,
	PRIMARY KEY (`id_abo`)
);

CREATE TABLE `product` (
	`id_produit` int NOT NULL AUTO_INCREMENT,
	`nom` varchar(100) ,
	`qnt` int ,
	`prix` FLOAT ,
	`prix_g` FLOAT ,
	`image` varchar(100) ,
	PRIMARY KEY (`id_produit`)
);

CREATE TABLE `achat` (
	`id_membre` int ,
	`id_achat` int NOT NULL AUTO_INCREMENT,
	`prix_t` FLOAT ,
	PRIMARY KEY (`id_achat`)
);

CREATE TABLE `panier` (
	`id_produit` int ,
	`id_achat` int
);

CREATE TABLE `finance` (
	`pdf_fin` varchar(100)
);

CREATE TABLE `depense` (
	`id_depense` int NOT NULL AUTO_INCREMENT,
	`date_depense` DATE ,
	`id_produit` int ,
	PRIMARY KEY (`id_depense`)
);

CREATE TABLE `plan` (
	`id_plan` int NOT NULL AUTO_INCREMENT,
	`type` varchar(100) ,
	`tarif` FLOAT ,
	PRIMARY KEY (`id_plan`)
);

CREATE TABLE `super_admin` (
	`id_s` int NOT NULL AUTO_INCREMENT,
	`nom` varchar(100) ,
	`prenom` varchar(100) ,
	`date_n` DATE ,
	`tel` varchar(100) ,
	`email` varchar(100)  UNIQUE,
	`username` varchar(100) UNIQUE,
	`password` varchar(100) ,
	`qst_s` varchar(100) ,
	`photo` varchar(100) ,
	PRIMARY KEY (`id_s`)
);

ALTER TABLE `membre` ADD CONSTRAINT `membre_fk0` FOREIGN KEY (`id_abo`) REFERENCES `abonnenement`(`id_abo`);

ALTER TABLE `abonnenement` ADD CONSTRAINT `abonnenement_fk0` FOREIGN KEY (`id_plan`) REFERENCES `plan`(`id_plan`);

ALTER TABLE `achat` ADD CONSTRAINT `achat_fk0` FOREIGN KEY (`id_membre`) REFERENCES `membre`(`id_membre`);

ALTER TABLE `panier` ADD CONSTRAINT `panier_fk0` FOREIGN KEY (`id_produit`) REFERENCES `product`(`id_produit`);

ALTER TABLE `panier` ADD CONSTRAINT `panier_fk1` FOREIGN KEY (`id_achat`) REFERENCES `achat`(`id_achat`);

ALTER TABLE `depense` ADD CONSTRAINT `depense_fk0` FOREIGN KEY (`id_produit`) REFERENCES `product`(`id_produit`);
