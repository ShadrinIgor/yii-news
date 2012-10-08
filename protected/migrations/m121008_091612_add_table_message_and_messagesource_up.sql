DROP TABLE IF EXISTS message_translate;
CREATE TABLE message_translate
(
    id INTEGER PRIMARY KEY,
    category VARCHAR(32),
    message TEXT
);

DROP TABLE IF EXISTS Message;
CREATE TABLE Message
(
    id INTEGER,
    language VARCHAR(16),
    translation TEXT,
    PRIMARY KEY (id, language),
    CONSTRAINT FK_Message_MessageTranslate FOREIGN KEY (id)
         REFERENCES message_translate (id) ON DELETE CASCADE ON UPDATE RESTRICT
);