CREATE DATABASE hospinfo;

USE hospinfo;

CREATE TABLE tipo_usuario (
id_tipo_usuario INTEGER AUTO_INCREMENT PRIMARY KEY,
niveis_acesso VARCHAR(50)
);

CREATE TABLE usuario (
id_usuario INTEGER AUTO_INCREMENT PRIMARY KEY,
nome_usuario VARCHAR(50),
sobrenome_usuario VARCHAR(50),
email_usuario VARCHAR(250),
senha_usuario VARCHAR(50),
niveis_acesso INTEGER DEFAULT 1,
FOREIGN KEY (niveis_acesso) REFERENCES tipo_usuario (id_tipo_usuario)
);

CREATE TABLE hospital (
id_hospital INTEGER AUTO_INCREMENT PRIMARY KEY,
nome_hospital VARCHAR(250),
endereco_hospital VARCHAR(250),
telefone_hospital VARCHAR(250)
);

CREATE TABLE especialidade (
id_especialidade INTEGER AUTO_INCREMENT PRIMARY KEY,
nome_especialidade VARCHAR(250)
);

CREATE TABLE medico (
id_medico INTEGER AUTO_INCREMENT PRIMARY KEY,
nome_medico VARCHAR(50),
sobrenome_medico VARCHAR(50),
crm INTEGER,
email_medico VARCHAR(250),
hospital INTEGER,
tipo_atendimento VARCHAR(50),
especialidade INTEGER,
hr_entrada TIME,
hr_saida TIME,
FOREIGN KEY (hospital) REFERENCES hospital (id_hospital),
FOREIGN KEY (especialidade) REFERENCES especialidade (id_especialidade)
);

CREATE TABLE comentario (
id_comentario INTEGER AUTO_INCREMENT PRIMARY KEY,
situacao_atendimento VARCHAR(50),
motivo_atendimento VARCHAR(250),
obs_nao_atendido VARCHAR(250),
obs_atendido VARCHAR(250),
id_usuario INTEGER,
id_medico INTEGER,
created DATETIME,
FOREIGN KEY (id_usuario) REFERENCES usuario (id_usuario) ON DELETE CASCADE,
FOREIGN KEY (id_medico) REFERENCES medico (id_medico) ON DELETE CASCADE
);

INSERT INTO `hospital` (`id_hospital`, `nome_hospital`, `endereco_hospital`, `telefone_hospital`) VALUES (NULL, 'Hospital Regi�o Leste (Parano�)', '�rea especial hospitalar, quadra 2, conj. K , lote 1, CEP 71570-050; Parano�', '2017-1550, ramais 1641/1553/1554'), (NULL, 'Hospital Regional de Planaltina', 'Av. WL4 � �rea Especial � Setor Hospitalar Planaltina-DF. CEP: 73310- 000.', '(61) 2017-1350'), (NULL, 'Hospital Regional de Santa Maria', 'AC 102, Blocos, Conj. A/B/C - Santa Maria, Bras�lia - DF, 72502-100', '(61) 4042-7770'), (NULL, 'Hospital Regional de Samambaia', 'QS 614 CJ C LOTES 1/2. CEP: 72.322-583', '(61) 20172205'), (NULL, 'Hospital Regional de Sobradinho', 'Q 12 CJ B LT 38 Sobradinho � DF. CEP: 73010-120.', '(61) 2017-1200'), (NULL, 'Hospital Regional de Taguatinga', 'St. C Norte �rea Especial 24 - Taguatinga, Federal District, Brasilia - Federal District, 72120-970', '(61)2017-1700');

INSERT INTO `especialidade` (`id_especialidade`, `nome_especialidade`) VALUES (NULL, 'Alergia e Imunologia'), (NULL, 'Anestesiologia'), (NULL, 'Angiologia'), (NULL, 'Cancerologia'), (NULL, 'Cardiologia'), (NULL, 'Cirurgia Cardiovascular'), (NULL, 'Cirurgia da M�o'), (NULL, 'Cirurgia de cabe�a e pesco�o'), (NULL, 'Cirurgia do Aparelho Digestivo'), (NULL, 'Cirurgia Geral'), (NULL, 'Cirurgia Pedi�trica'), (NULL, 'Cirurgia Pl�stica'), (NULL, 'Cirurgia Tor�cica'), (NULL, 'Cirurgia Vascular'), (NULL, 'Cl�nica M�dica'), (NULL, 'Coloproctologia'), (NULL, 'Dermatologia'), (NULL, 'Endocrinologia'), (NULL, 'Metabologia'), (NULL, 'Endoscopia'), (NULL, 'Gastroenterologia'), (NULL, 'Gen�tica m�dica'), (NULL, 'Geriatria'), (NULL, 'Ginecologia'), (NULL, ''), (NULL, 'Hemoterapia'), (NULL, 'Homeopatia'), (NULL, 'Infectologia'), (NULL, 'Mastologia'), (NULL, 'Medicina de Fam�lia e Comunidade'), (NULL, 'Medicina de Emerg�ncia'), (NULL, 'Medicina do Trabalho'), (NULL, 'Medicina do Tr�fego'), (NULL, 'Medicina Esportiva'), (NULL, 'Medicina F�sica e Reabilita��o'), (NULL, 'Medicina Intensiva'), (NULL, 'Medicina Legal e Per�cia M�dica'), (NULL, 'Medicina Nuclear'), (NULL, 'Medicina Preventiva e Social'), (NULL, 'Nefrologia'), (NULL, 'Neurocirurgia'), (NULL, 'Neurologia'), (NULL, 'Nutrologia'), (NULL, 'Obstetr�cia'), (NULL, 'Oftalmologia'), (NULL, 'Ortopedia'), (NULL, 'Otorrinolaringologia'), (NULL, 'Patologia'), (NULL, 'Patologia Cl�nica'), (NULL, 'Pediatria'), (NULL, 'Pneumologia'), (NULL, 'Psiquiatria'), (NULL, 'Radiologia'), (NULL, 'Radioterapia'), (NULL, 'Reumatologia'), (NULL, 'Urologia');

INSERT INTO `tipo_usuario` (`id_tipo_usuario`, `niveis_acesso`) VALUES (NULL, 'Comum'), (NULL, 'Administrador');
