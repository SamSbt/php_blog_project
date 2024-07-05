CREATE TABLE serie(
   id_serie INT AUTO_INCREMENT,
   title VARCHAR(255),
   summary TEXT,
   img_src VARCHAR(255),
   is_deleted BOOLEAN,
   PRIMARY KEY(id_serie)
);

CREATE TABLE tech(
   id_tech INT AUTO_INCREMENT,
   label VARCHAR(255),
   img_src VARCHAR(255),
   is_deleted BOOLEAN,
   PRIMARY KEY(id_tech),
   UNIQUE(label)
);

CREATE TABLE role(
   id_role INT AUTO_INCREMENT,
   label VARCHAR(255),
   is_deleted BOOLEAN,
   PRIMARY KEY(id_role),
   UNIQUE(label)
);

CREATE TABLE appuser(
   id_appuser INT AUTO_INCREMENT,
   pseudo VARCHAR(255),
   is_deleted BOOLEAN,
   id_role INT NOT NULL,
   PRIMARY KEY(id_appuser),
   UNIQUE(pseudo),
   FOREIGN KEY(id_role) REFERENCES role(id_role)
);

CREATE TABLE article(
   id_article INT AUTO_INCREMENT,
   title VARCHAR(255),
   summary TEXT,
   img_src VARCHAR(255),
   published_at DATETIME,
   updated_at DATETIME,
   is_deleted BOOLEAN,
   id_appuser INT NOT NULL,
   id_serie INT,
   PRIMARY KEY(id_article),
   FOREIGN KEY(id_appuser) REFERENCES appuser(id_appuser),
   FOREIGN KEY(id_serie) REFERENCES serie(id_serie)
);

CREATE TABLE article_tech(
   id_tech INT,
   id_article INT,
   PRIMARY KEY(id_tech, id_article),
   FOREIGN KEY(id_tech) REFERENCES tech(id_tech),
   FOREIGN KEY(id_article) REFERENCES article(id_article)
);
