CREATE DATABASE CrudBiviliotecaPedroFeddersen;

USE CrudBiviliotecaPedroFeddersen;

CREATE TABLE autores(
	 id_autor INT PRIMARY KEY AUTO_INCREMENT, 
     nome VARCHAR(50) NOT NULL, 
     nacionalidade VARCHAR(50) NULL, 
     ano_nascimento INT NOT NULL
);

CREATE TABLE livros(
	id_livro INT PRIMARY KEY AUTO_INCREMENT, 
    titulo VARCHAR(50) NOT NULL, 
    genero VARCHAR(100) NOT NULL, 
    ano_publicacao INT NOT NULL, 
    id_autor INT,
    FOREIGN KEY(id_autor) REFERENCES autores(id_autor)
);

CREATE TABLE leitores(
	id_leitor INT PRIMARY KEY AUTO_INCREMENT, 
    nome VARCHAR(50) NOT NULL, 
    email VARCHAR(100) NOT NULL, 
    telefone CHAR(13) NOT NULL
);

CREATE TABLE emprestimos(
	id_emprestimo INT PRIMARY KEY AUTO_INCREMENT,  
    data_emprestimo DATE NOT NULL, 
    data_devolucao DATE NOT NULL,
    id_livro INT,
    id_leitor INT, 
    FOREIGN KEY (id_livro) REFERENCES livros(id_livro),
    FOREIGN KEY (id_leitor) REFERENCES leitores(id_leitor)
);