PRAGMA journal_mode = WAL;
PRAGMA foreign_keys = ON;

DROP TABLE IF EXISTS USERS;
CREATE TABLE USERS (
	id INTEGER PRIMARY KEY,
	username TEXT UNIQUE NOT NULL,
	name TEXT,
	email TEXT NOT NULL,
	password TEXT NOT NULL,
	avatarId INTEGER REFERENCES FILES(id)
);

DROP TABLE IF EXISTS TEACHERS;
CREATE TABLE TEACHERS(
    id INTEGER PRIMARY KEY,
    name TEXT NOT NULL
);

DROP TABLE IF EXISTS FILES;
CREATE TABLE FILES(
	id INTEGER PRIMARY KEY,
	filename TEXT,
	hash TEXT UNIQUE NOT NULL,
	author_id INTEGER REFERENCES USERS(id) NOT NULL,
	type_id INTEGER REFERENCES FILE_TYPES(id) NOT NULL
);

DROP TABLE IF EXISTS FACULTIES;
CREATE TABLE FACULTIES(
    id INTEGER PRIMARY KEY,
    name TEXT UNIQUE NOT NULL,
    shortname TEXT UNIQUE NOT NULL,
    color TEXT NOT NULL,
    logo_id INTEGER REFERENCES FILES(id) NOT NULL
);

DROP TABLE IF EXISTS SUBJECTS;
CREATE TABLE SUBJECTS(
    id INTEGER PRIMARY KEY,
    name TEXT UNIQUE NOT NULL
);

DROP TABLE IF EXISTS OFFICIAL_SUBJECTS;
CREATE TABLE OFFICIAL_SUBJECTS(
    id INTEGER PRIMARY KEY,
    code TEXT UNIQUE NOT NULL,
    name TEXT NOT NULL,
    faculty_id INTEGER REFERENCES FACULTIES(id) NOT NULL,
    subject_id INTEGER REFERENCES SUBJECTS(id) NOT NULL
);

DROP TABLE IF EXISTS POSTS;
CREATE TABLE POSTS(
    id INTEGER PRIMARY KEY,
    title TEXT,
    body TEXT NOT NULL,
    date_created INTEGER NOT NULL,
    author_id INTEGER REFERENCES USERS(id) NOT NULL,
    subject_id INTEGER REFERENCES SUBJECTS(id) NOT NULL,
    type_id INTEGER REFERENCES POST_TYPES(id) NOT NULL
);

DROP TABLE IF EXISTS COMMENTS;
CREATE TABLE COMMENTS(
    id INTEGER PRIMARY KEY,
    body TEXT NOT NULL,
    author_id INTEGER REFERENCES USERS(id) NOT NULL,
    reply_to_id INTEGER REFERENCES COMMENTS(id),
    subject_id INTEGER REFERENCES SUBJECTS(id),
    post_id INTEGER REFERENCES POSTS(id),
    CONSTRAINT xor_target CHECK ((subject_id IS NOT NULL AND post_id IS NULL) OR (subject_id IS NULL AND post_id IS NOT NULL))
);

DROP TABLE IF EXISTS TEACHER_RATINGS;
CREATE TABLE TEACHER_RATINGS(
    id INTEGER PRIMARY KEY,
    rating INTEGER NOT NULL,
    date_created INTEGER NOT NULL,
    teacher_id INTEGER REFERENCES TEACHERS(id) NOT NULL,
    author_id INTEGER REFERENCES USERS(id) NOT NULL
);

DROP TABLE IF EXISTS GROUPS;
CREATE TABLE GROUPS(
    id INTEGER PRIMARY KEY,
    name TEXT UNIQUE NOT NULL
);

DROP TABLE IF EXISTS PERMISSIONS;
CREATE TABLE PERMISSIONS(
    id INTEGER PRIMARY KEY,
    name TEXT UNIQUE NOT NULL
);

DROP TABLE IF EXISTS FILE_TYPES;
CREATE TABLE FILE_TYPES(
    id INTEGER PRIMARY KEY,
    name TEXT UNIQUE NOT NULL
);

DROP TABLE IF EXISTS POST_TYPES;
CREATE TABLE POST_TYPES(
    id INTEGER PRIMARY KEY,
    name TEXT UNIQUE NOT NULL
);

DROP TABLE IF EXISTS POST_FILES;
CREATE TABLE POST_FILES(
    post_id INTEGER REFERENCES POSTS(id),
    file_id INTEGER REFERENCES FILES(id),
    PRIMARY KEY(post_id, file_id)
);

DROP TABLE IF EXISTS GROUP_PERMISSIONS;
CREATE TABLE GROUP_PERMISSIONS(
    group_id INTEGER REFERENCES GROUPS(id),
    permission_id INTEGER REFERENCES PERMISSIONS(id),
    PRIMARY KEY(group_id, permission_id)
);

DROP TABLE IF EXISTS GROUP_USERS;
CREATE TABLE GROUP_USERS(
    group_id INTEGER REFERENCES GROUPS(id),
    user_id INTEGER REFERENCES USERS(id),
    PRIMARY KEY(group_id, user_id)
);

DROP TABLE IF EXISTS SUBJECT_TEACHERS;
CREATE TABLE SUBJECT_TEACHERS(
    subject_id INTEGER REFERENCES SUBJECTS(id),
    teacher_id INTEGER REFERENCES TEACHERS(id),
    PRIMARY KEY(subject_id, teacher_id)
);

PRAGMA foreign_keys = OFF;