create database produtos;
use produtos;

CREATE TABLE `produtos` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) NOT NULL,
  `sku` varchar(255) NOT NULL,
  `fotos` varchar(255) DEFAULT NULL,
  `descricao` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


CREATE TABLE `variacaos` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `estoque` bigint(20) NOT NULL,
  `preco` double NOT NULL,
  `tipo_variacao` enum('cor','tamanho','cor_tamanho') NOT NULL,
  `descricao_variacao` varchar(255) NOT NULL,
  `produto_id` bigint(20) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;