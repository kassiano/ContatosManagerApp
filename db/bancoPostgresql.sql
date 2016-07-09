

--
-- PostgreSQL database dump
--

SET statement_timeout = 0;
SET client_encoding = 'UTF8';
SET standard_conforming_strings = off;
SET check_function_bodies = false;
SET client_min_messages = warning;
SET escape_string_warning = off;

SET search_path = public, pg_catalog;

SET default_tablespace = '';

SET default_with_oids = false;

--
-- Name: appUser; Type: TABLE; Schema: public; Owner: outsidet; Tablespace:
--

CREATE TABLE "appUser" (
    "ID" integer NOT NULL,
    "userName" character(255) NOT NULL,
    email character(255) NOT NULL,
    password character(500),
    "AndroidToken" character(500)
);


ALTER TABLE public."appUser" OWNER TO outsidet;

--
-- Name: appUser_ID_seq; Type: SEQUENCE; Schema: public; Owner: outsidet
--

CREATE SEQUENCE "appUser_ID_seq"
    START WITH 1
    INCREMENT BY 1
    NO MAXVALUE
    NO MINVALUE
    CACHE 1;


ALTER TABLE public."appUser_ID_seq" OWNER TO outsidet;

--
-- Name: appUser_ID_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: outsidet
--

ALTER SEQUENCE "appUser_ID_seq" OWNED BY "appUser"."ID";


--
-- Name: contatos; Type: TABLE; Schema: public; Owner: outsidet; Tablespace:
--

CREATE TABLE contatos (
    "ID" integer NOT NULL,
    nome character(255) NOT NULL,
    telefone character(255),
    "idUser" integer NOT NULL
);


ALTER TABLE public.contatos OWNER TO outsidet;

--
-- Name: contatos_ID_seq; Type: SEQUENCE; Schema: public; Owner: outsidet
--

CREATE SEQUENCE "contatos_ID_seq"
    START WITH 1
    INCREMENT BY 1
    NO MAXVALUE
    NO MINVALUE
    CACHE 1;


ALTER TABLE public."contatos_ID_seq" OWNER TO outsidet;

--
-- Name: contatos_ID_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: outsidet
--

ALTER SEQUENCE "contatos_ID_seq" OWNED BY contatos."ID";


--
-- Name: ID; Type: DEFAULT; Schema: public; Owner: outsidet
--

ALTER TABLE ONLY "appUser" ALTER COLUMN "ID" SET DEFAULT nextval('"appUser_ID_seq"'::regclass);


--
-- Name: ID; Type: DEFAULT; Schema: public; Owner: outsidet
--

ALTER TABLE ONLY contatos ALTER COLUMN "ID" SET DEFAULT nextval('"contatos_ID_seq"'::regclass);


--
-- Name: appUser_pkey; Type: CONSTRAINT; Schema: public; Owner: outsidet; Tablespace:
--

ALTER TABLE ONLY "appUser"
    ADD CONSTRAINT "appUser_pkey" PRIMARY KEY ("ID");


--
-- Name: contatos_pkey; Type: CONSTRAINT; Schema: public; Owner: outsidet; Tablespace:
--

ALTER TABLE ONLY contatos
    ADD CONSTRAINT contatos_pkey PRIMARY KEY ("ID");


--
-- Name: contatos_appUser_FK; Type: FK CONSTRAINT; Schema: public; Owner: outsidet
--

ALTER TABLE ONLY contatos
    ADD CONSTRAINT "contatos_appUser_FK" FOREIGN KEY ("idUser") REFERENCES "appUser"("ID");


--
-- Name: public; Type: ACL; Schema: -; Owner: postgres
--

REVOKE ALL ON SCHEMA public FROM PUBLIC;
REVOKE ALL ON SCHEMA public FROM postgres;
GRANT ALL ON SCHEMA public TO postgres;
GRANT ALL ON SCHEMA public TO PUBLIC;


--
-- PostgreSQL database dump complete
--