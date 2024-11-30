CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    google_id VARCHAR(255) NOT NULL,
    access_token TEXT NOT NULL,
    refresh_token TEXT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE admins (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(255) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE settings (
    id INT AUTO_INCREMENT PRIMARY KEY,
    google_client_id VARCHAR(255) NOT NULL,
    google_client_secret VARCHAR(255) NOT NULL,
    redirect_uri VARCHAR(255) NOT NULL,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

-- Insert admin demo data
INSERT INTO admins (username, password) VALUES
('admin', '$2y$10$EixZaYVK1fsbw1ZfbX3OXePaWxn96p36xuhz/5DwHX4lsKxJZWb.G'); -- Password: admin

-- Insert settings demo data
INSERT INTO settings (google_client_id, google_client_secret, redirect_uri) VALUES
('your_client_id', 'your_client_secret', 'https://tools.itplic.biz/api/oauth-callback');
