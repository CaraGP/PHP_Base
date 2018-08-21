USE todolist;

CREATE TABLE IF NOT EXISTS todos (
    id INT NOT NULL AUTO_INCREMENT,
    deadline DATE NOT NULL,
    title VARCHAR(30) NOT NULL,
    description VARCHAR(400) NOT NULL,
    owner VARCHAR(20) NOT NULL,
    PRIMARY KEY (id)
);
