# Teste Desenvolvedor Back-End

Nome: Jose Carlos Falcão Junior.

## Orientação para teste.

* Pontos
    * Configurar arquivo de conexão em App\Core\connect.php com dados do banco
    * Rodar 'bower install' - Caso não tenha este gerenciador de pacotes instalado execute 'npm install -g bower'
    * Rodar 'composer dump-autoload'
    * Rodar 'composer install'

### Criação de tabela usuarios

```sql
CREATE DATABASE IF NOT EXISTS `teste` /*!40100 DEFAULT CHARACTER SET utf8 COLLATE utf8_bin */;
USE `teste`;

-- Estrutura para tabela teste.usuarios
CREATE TABLE IF NOT EXISTS `usuarios` (
  `id_user` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `email` varchar(50) NOT NULL,
  `fone` varchar(11) NOT NULL,
  `cpf` varchar(11) NOT NULL,
  PRIMARY KEY (`id_user`)
);

```

### Levantar servidor embutido

```bash
php -S localhost:8000
```
