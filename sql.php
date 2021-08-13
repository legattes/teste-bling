//-------------ESQUEMA

CREATE TABLE Filme(
    id INT PRIMARY KEY,
    titulo VARCHAR(45),
    ano YEAR(4)
);

CREATE TABLE Diretor(
    id INT PRIMARY KEY,
    nome VARCHAR(45)
);

CREATE TABLE Dirige(
    id INT PRIMARY KEY,
    idDiretor INT,
    idFilme INT,

    FOREIGN KEY (idDiretor) REFERENCES Diretor(id),
    FOREIGN KEY (idFilme) REFERENCES Filme(id)
);

CREATE TABLE Ator(
    id INT PRIMARY KEY,
    nome VARCHAR(45)
);

CREATE TABLE Participa(
    id INT PRIMARY KEY,
    idAtor INT,
    idFilme INT,

    FOREIGN KEY (idAtor) REFERENCES Ator(id),
    FOREIGN KEY (idFilme) REFERENCES Filme(id)
);

//-------------CONSULTAS

A. Atores do filme com título “XYZ”.
SELECT 
    a.nome 
FROM 
    Ator a 
LEFT JOIN 
    Participa p ON a.id = p.idAtor
LEFT JOIN 
    Filme f ON p.idFilme = f.id
WHERE
    f.titulo = "XYZ";
-------------

B. Filmes que o ator de nome “FULANO” participou.
SELECT
    f.titulo
FROM
    Filme f
LEFT JOIN
    Participa p ON f.id = p.idFilme
LEFT JOIN
    Ator a ON p.idAtor = a.id
WHERE
    a.nome = "FULANO";
-------------

C. Listar os filmes do ano 2015 ordenados pela quantidade de atores participantes e pelo título em ordem alfabética.
SELECT 
    COUNT(a.id), f.titulo
FROM 
    Filme f
LEFT JOIN
    Participa p ON f.id = p.idFilme
LEFT JOIN
    Ator a ON p.idAtor = a.id
WHERE
    f.ano = "2015"
GROUP BY
    COUNT(a.id), f.titulo ASC;
-------------

D. Listar os atores que trabalharam em filmes cujo diretor foi “SPIELBERG”.
SELECT 
    a.nome 
FROM 
    Ator a 
LEFT JOIN 
    Participa p ON a.id = p.idAtor
LEFT JOIN 
    Filme f ON p.idFilme = f.id
LEFT JOIN
    Dirige d ON f.id = d.idFilme
LEFT JOIN
    Diretor dir ON d.idDiretor = dir.id
WHERE
    dir.nome = "SPIELBERG";
-------------