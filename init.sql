
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
VALUES ('Severance', 'Mark leads a team of office workers whose memories have been surgically divided between their work and personal lives. When a mysterious colleague appears outside of work, it begins a journey to discover the truth about their jobs.', '/assets/movies/severance.jpg'),
       ('Nosferatu', 'A gothic tale of obsession between a haunted young woman and the terrifying vampire infatuated with her, causing untold horror in its wake.', '/assets/movies/nosferatu.jpg'),
       ('American Primeval', 'It follows the gritty and adventurous exploration of the birth of the American West, the violent collisions of cults, religion, and men and women fighting for control of the new world.', '/assets/movies/american_primeval.jpg'),
       ('Back In Action', 'Former CIA spies Emily and Matt are pulled back into espionage after their secret identities are exposed.', '/assets/movies/back_in_action.jpg'),
       ('The Night Agent', 'Low-level FBI agent Peter Sutherland works in the basement of the White House manning a phone that never rings - until the night it does, propelling him into a conspiracy that leads all the way to the Oval Office.', '/assets/movies/the_night_agent.jpg'),
       ('Silo', 'Men and women live in a giant silo underground with several regulations which they believe are in place to protect them from the toxic and ruined world on the surface.', '/assets/movies/silo.jpg'),
       ('Squid Game', 'Hundreds of cash-strapped players accept a strange invitation to compete in children''s games. Inside, a tempting prize awaits with deadly high stakes: a survival game that has a whopping 45.6 billion-won prize at stake.', '/assets/movies/squid_game.jpg'),
       ('Landman', 'A modern-day tale of fortune seeking in the world of West Texas oil rigs.', '/assets/movies/landman.jpg'),
       ('The Substance', 'A fading celebrity takes a black-market drug: a cell-replicating substance that temporarily creates a younger, better version of herself.', '/assets/movies/the_substance.jpg'),
       ('Wicked', 'Elphaba, a misunderstood young woman because of her green skin, and Galinda, a popular girl, become friends at Shiz University in the Land of Oz. After an encounter with the Wonderful Wizard of Oz, their friendship reaches a crossroads.', '/assets/movies/wicked.jpg'),
       ('Alien: Romulus', 'While scavenging the deep ends of a derelict space station, a group of young space colonists come face to face with the most terrifying life form in the universe.', '/assets/movies/alien_romulus.jpg'),
       ('Heretic', 'Two young religious women are drawn into a game of cat-and-mouse in the house of a strange man.', '/assets/movies/heretic.jpg'),
       ('The Wild Robot', 'After a shipwreck, an intelligent robot called Roz is stranded on an uninhabited island. To survive the harsh environment, Roz bonds with the island''s animals and cares for an orphaned baby goose.', '/assets/movies/the_wild_robot.jpg'),
       ('Deadpool & Wolverine', 'Deadpool is offered a place in the Marvel Cinematic Universe by the Time Variance Authority, but instead recruits a variant of Wolverine to save his universe from extinction.', '/assets/movies/deadpool_&_wolverine.jpg'),
       ('Breaking Bad', 'A chemistry teacher diagnosed with inoperable lung cancer turns to manufacturing and selling methamphetamine with a former student to secure his family''s future.', '/assets/movies/breaking_bad.jpg'),
       ('Gladiator', 'A former Roman General sets out to exact vengeance against the corrupt emperor who murdered his family and sent him into slavery.', '/assets/movies/gladiator.jpg'),
       ('Oppenheimer', 'A dramatization of the life story of J. Robert Oppenheimer, the physicist who had a large hand in the development of the atomic bombs that brought an end to World War II.', '/assets/movies/oppenheimer.jpg'),
       ('On Call', 'Follows a pair of police officers on patrol as they respond to a new radio call, arriving on the scene to resolve incidents.', '/assets/movies/on_call.jpg'),
       ('The Office', 'A mockumentary on a group of typical office workers, where the workday consists of ego clashes, inappropriate behavior, tedium and romance.', '/assets/movies/the_office.jpg'),
       ('Twin Peaks', 'Picks up 25 years after the inhabitants of a quaint northwestern town are stunned when their homecoming queen is murdered.', '/assets/movies/twin_peaks.jpg');

CREATE TABLE categories (
    id SERIAL PRIMARY KEY,
    name VARCHAR(100) UNIQUE NOT NULL
);

INSERT INTO categories (name)
VALUES ('Action'), ('Drama'), ('Comedy'),('Thriller'), ('Scifi'), ('Horror'), ('Fantasy');

CREATE TABLE movie_categories (
    movie_id INT REFERENCES movies(id) ON DELETE CASCADE,
    category_id INT REFERENCES categories(id) ON DELETE CASCADE,
    PRIMARY KEY (movie_id, category_id)
);

INSERT INTO movie_categories (movie_id, category_id)
VALUES (1, 2),(1, 4),(1,5),
       (2, 6),(2,7),
       (3, 1),(3,2),(3,4),
        (4, 1), (4, 3),
        (5,1), (5, 2), (5 , 4),
        (6, 2), (6,5),
        (7,1),(7,2),(7,4),
        (8,2),
        (9,6),(9,5),
        (10,7),
        (11, 5), (11, 6),(11,7),
        (12, 6), (12, 4),
        (13, 5),
        (14, 3), (14, 5),(14,1),
        (15, 2), (15,4),
        (16, 1), (16,2),
        (17, 2),(17,1),
        (18,1),(18,2),
        (19,3),
        (20, 2),(20,6),(20,4);

CREATE TABLE comments (
    id SERIAL PRIMARY KEY,
    movie_id INT REFERENCES movies(id) ON DELETE CASCADE,
    user_id INT REFERENCES users(id) ON DELETE CASCADE,
    content TEXT NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

INSERT INTO comments (movie_id, user_id, content) VALUES
    (1, 1, 'Brilliantly executed storytelling.'),
    (1, 3, 'One of the best movies of the decade!'),
    (2, 2, 'The visuals were breathtaking.'),
    (2, 3, 'Left me with so many emotions.'),
    (2, 1, 'A cinematic achievement!'),
    (2, 5, 'Wish they had developed the story more.'),
    (3, 5, 'Brilliantly executed storytelling.'),
    (3, 2, 'Disappointed with the ending.'),
    (3, 3, 'A true classic in the making.'),
    (4, 2, 'Brilliantly executed storytelling.'),
    (4, 4, 'Dialogue was a bit weak, but overall good.'),
    (4, 5, 'I connected with the characters so much.'),
    (5, 4, 'Great chemistry between the leads!'),
    (5, 1, 'A must-watch for every movie fan.'),
    (5, 2, 'A visually stunning experience!'),
    (6, 4, 'Felt nostalgic watching this.'),
    (6, 2, 'I had goosebumps the entire time!'),
    (6, 1, 'Felt a bit rushed towards the end.'),
    (6, 3, 'One of the best movies of the decade!'),
    (6, 5, 'I laughed, I cried, I loved it!'),
    (7, 3, 'Left me with so many emotions.'),
    (7, 2, 'I had goosebumps the entire time!'),
    (7, 4, 'One of the most inspiring movies I have seen.'),
    (7, 1, 'Dialogue was a bit weak, but overall good.'),
    (7, 5, 'I connected with the characters so much.'),
    (8, 2, 'Disappointed with the ending.'),
    (8, 3, 'Brilliantly executed storytelling.'),
    (8, 4, 'What a rollercoaster of emotions!'),
    (8, 1, 'A visually stunning experience!'),
    (8, 5, 'Felt nostalgic watching this.'),
    (9, 1, 'A movie I could watch over and over again.'),
    (9, 3, 'I did not get the hype, honestly.'),
    (10, 3, 'The characters felt so real.'),
    (10, 1, 'I laughed, I cried, I loved it!'),
    (11, 3, 'One of the best movies of the decade!'),
    (11, 5, 'Soundtrack was out of this world!'),
    (11, 4, 'Great chemistry between the leads!'),
    (12, 5, 'A must-watch for every movie fan.'),
    (12, 2, 'Dialogue was a bit weak, but overall good.'),
    (13, 3, 'The characters felt so real.'),
    (13, 1, 'Dialogue was a bit weak, but overall good.'),
    (13, 4, 'One of the most inspiring movies I have seen.'),
    (14, 3, 'What a rollercoaster of emotions!'),
    (14, 4, 'A cinematic achievement!'),
    (15, 1, 'A movie I could watch over and over again.'),
    (15, 2, 'One of the most inspiring movies I have seen.'),
    (15, 4, 'What a rollercoaster of emotions!'),
    (15, 3, 'This should have won an Oscar.'),
    (16, 5, 'A true classic in the making.'),
    (16, 4, 'A must-watch for every movie fan.'),
    (16, 3, 'I connected with the characters so much.'),
    (17, 3, 'Unexpectedly heartwarming.'),
    (17, 5, 'Felt a bit rushed towards the end.'),
    (17, 1, 'Left me with so many emotions.'),
    (18, 2, 'Wish they had developed the story more.'),
    (18, 5, 'Unexpectedly heartwarming.'),
    (19, 1, 'A visually stunning experience!'),
    (19, 3, 'A must-watch for every movie fan.'),
    (19, 5, 'Felt a bit rushed towards the end.'),
    (19, 2, 'The visuals were breathtaking.'),
    (20, 1, 'The characters felt so real.'),
    (20, 3, 'I did not get the hype, honestly.'),
    (20, 5, 'I laughed, I cried, I loved it!'),
    (20, 2, 'A cinematic achievement!');
