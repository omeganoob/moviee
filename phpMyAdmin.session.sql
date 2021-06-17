
--@block
ALTER TABLE user_favorites
ADD FOREIGN KEY (user_id) REFERENCES users(id);

--@block
ALTER TABLE user_favorites
ADD FOREIGN KEY (movie_id) REFERENCES movies(id);