
CREATE TABLE users (
    id SERIAL PRIMARY KEY,
    first_name VARCHAR(50) NOT NULL,
    last_name VARCHAR(50) NOT NULL,
    nickname VARCHAR(50) UNIQUE NOT NULL,
    email VARCHAR(100) UNIQUE NOT NULL,
    birth_date DATE NOT NULL,
    password_hash TEXT NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);


INSERT INTO users (first_name, last_name, nickname, email, birth_date, password_hash, created_at)
VALUES
    -- Email: "tomek123@test.com" Haslo: "tomek123"
    -- Email: "ptak@wewatch.com" Haslo: "ptak123"
    -- Email: "kowalska@wewatch.com" Haslo: "kowalska123"
    -- Email: "nowak@wewatch.com" Haslo: "nowak123"
    -- Email: "shmurda@wewatch.com" Haslo: "shmurda123"
    ('tomek123','tomek123','tomek123','tomek123@test.com','2000-01-01','$2y$10$RDnu1Y1eiFPYrs.7kU7ERO.fr3qLqtTau0vgaRQFHG4Tx8GYecr7S', NOW()),
    ('Janusz','Ptak','Ptaszor','ptak@wewatch.com','2000-01-01','$2y$10$rJyKcZL.QP4aWJkgQIk36.CEgmF2zNUWUbUSYGEsvAoSarZo5BkJu',NOW()),
    ('Marta','Kowalska','Marti','kowalska@wewatch.com','2004-02-05','$2y$10$O0aRg1PhW3QOfpoNsPG0luvy6ZJkldwxvg6xNCcWEmsBTqQ2WPGjC',NOW()),
    ('Alicja','Nowak','Alizkrainy','nowak@wewatch.com','1994-12-09','$2y$10$29febl6Yo1V9P/unycYF2.7Mww5NVdzJPqm97z9Ai/rLqPMUuD7r2',NOW()),
    ('Bobby','Shmurda','HotChicken','shmurda@wewatch.com','1999-03-05','$2y$10$OAQmmlYUchaaBhO/sfyzrO6wfvJECDeHPWATwD4Mx.zf9j3fVBo/G',NOW());

CREATE TABLE movies (
    id SERIAL PRIMARY KEY,
    title VARCHAR(255) NOT NULL,
    description TEXT,
    image_path VARCHAR(255),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

INSERT INTO movies (title, description, image_path)
VALUES ('Movie Title', 'Movie description...', '/assets/movie_image.webp');


CREATE TABLE categories (
    id SERIAL PRIMARY KEY,
    name VARCHAR(100) UNIQUE NOT NULL
);

INSERT INTO categories (name)
VALUES ('Action'), ('Drama'), ('Comedy');

CREATE TABLE movie_categories (
    movie_id INT REFERENCES movies(id) ON DELETE CASCADE,
    category_id INT REFERENCES categories(id) ON DELETE CASCADE,
    PRIMARY KEY (movie_id, category_id)
);

INSERT INTO movie_categories (movie_id, category_id)
VALUES (1, 2),(1, 1);

CREATE TABLE comments (
    id SERIAL PRIMARY KEY,
    movie_id INT REFERENCES movies(id) ON DELETE CASCADE,
    user_id INT REFERENCES users(id) ON DELETE CASCADE,
    content TEXT NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

INSERT INTO comments (movie_id, user_id, content)
VALUES (1, 1, 'Great movie! Highly recommend!');
