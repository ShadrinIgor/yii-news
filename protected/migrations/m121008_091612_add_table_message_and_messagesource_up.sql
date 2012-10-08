DROP TABLE IF EXISTS i18n;
CREATE TABLE i18n
(
    id INTEGER PRIMARY KEY,
    category VARCHAR(32),
    message TEXT
);

DROP TABLE IF EXISTS i18n_translate;
CREATE TABLE i18n_translate
(
    id INTEGER,
    language VARCHAR(16),
    translation TEXT,
    PRIMARY KEY (id, language),
    CONSTRAINT FK_i18n_i18nTranslate FOREIGN KEY (id)
         REFERENCES i18n (id) ON DELETE CASCADE ON UPDATE RESTRICT
);