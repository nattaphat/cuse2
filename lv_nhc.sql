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
-- Name: action; Type: TABLE; Schema: public; Owner: moac; Tablespace: 
--

CREATE TABLE action (
    id integer NOT NULL,
    action_name character varying(255) NOT NULL,
    created_at timestamp without time zone NOT NULL,
    updated_at timestamp without time zone NOT NULL,
    action character varying(255)
);


ALTER TABLE public.action OWNER TO moac;

--
-- Name: action_id_seq; Type: SEQUENCE; Schema: public; Owner: moac
--

CREATE SEQUENCE action_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.action_id_seq OWNER TO moac;

--
-- Name: action_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: moac
--

ALTER SEQUENCE action_id_seq OWNED BY action.id;


--
-- Name: action_id_seq; Type: SEQUENCE SET; Schema: public; Owner: moac
--

SELECT pg_catalog.setval('action_id_seq', 8, true);


--
-- Name: action_policy; Type: TABLE; Schema: public; Owner: moac; Tablespace: 
--

CREATE TABLE action_policy (
    id integer NOT NULL,
    policy_id integer NOT NULL,
    action_id integer NOT NULL
);


ALTER TABLE public.action_policy OWNER TO moac;

--
-- Name: action_policy_id_seq; Type: SEQUENCE; Schema: public; Owner: moac
--

CREATE SEQUENCE action_policy_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.action_policy_id_seq OWNER TO moac;

--
-- Name: action_policy_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: moac
--

ALTER SEQUENCE action_policy_id_seq OWNED BY action_policy.id;


--
-- Name: action_policy_id_seq; Type: SEQUENCE SET; Schema: public; Owner: moac
--

SELECT pg_catalog.setval('action_policy_id_seq', 26, true);


--
-- Name: agency; Type: TABLE; Schema: public; Owner: moac; Tablespace: 
--

CREATE TABLE agency (
    id integer NOT NULL,
    tname character varying(200) NOT NULL,
    abbr character varying(100),
    ministry_id integer NOT NULL,
    status boolean DEFAULT true NOT NULL,
    created_at timestamp without time zone NOT NULL,
    updated_at timestamp without time zone NOT NULL,
    code character varying(50) NOT NULL
);


ALTER TABLE public.agency OWNER TO moac;

--
-- Name: agency_data; Type: TABLE; Schema: public; Owner: moac; Tablespace: 
--

CREATE TABLE agency_data (
    id integer NOT NULL,
    agency_id integer,
    data_id integer
);


ALTER TABLE public.agency_data OWNER TO moac;

--
-- Name: TABLE agency_data; Type: COMMENT; Schema: public; Owner: moac
--

COMMENT ON TABLE agency_data IS 'เก็บข้อมูลว่าหน่วยงานไหมส่งข้อมูลอะไรมาบ้างในคลัง';


--
-- Name: agency_data_id_seq; Type: SEQUENCE; Schema: public; Owner: moac
--

CREATE SEQUENCE agency_data_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.agency_data_id_seq OWNER TO moac;

--
-- Name: agency_data_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: moac
--

ALTER SEQUENCE agency_data_id_seq OWNED BY agency_data.id;


--
-- Name: agency_data_id_seq; Type: SEQUENCE SET; Schema: public; Owner: moac
--

SELECT pg_catalog.setval('agency_data_id_seq', 44, true);


--
-- Name: agency_id_seq; Type: SEQUENCE; Schema: public; Owner: moac
--

CREATE SEQUENCE agency_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.agency_id_seq OWNER TO moac;

--
-- Name: agency_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: moac
--

ALTER SEQUENCE agency_id_seq OWNED BY agency.id;


--
-- Name: agency_id_seq; Type: SEQUENCE SET; Schema: public; Owner: moac
--

SELECT pg_catalog.setval('agency_id_seq', 12, true);


--
-- Name: condition; Type: TABLE; Schema: public; Owner: moac; Tablespace: 
--

CREATE TABLE condition (
    id integer NOT NULL,
    cond_name character varying(255) NOT NULL,
    created_at timestamp without time zone NOT NULL,
    updated_at timestamp without time zone NOT NULL,
    condition character varying(255)
);


ALTER TABLE public.condition OWNER TO moac;

--
-- Name: condition_id_seq; Type: SEQUENCE; Schema: public; Owner: moac
--

CREATE SEQUENCE condition_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.condition_id_seq OWNER TO moac;

--
-- Name: condition_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: moac
--

ALTER SEQUENCE condition_id_seq OWNED BY condition.id;


--
-- Name: condition_id_seq; Type: SEQUENCE SET; Schema: public; Owner: moac
--

SELECT pg_catalog.setval('condition_id_seq', 11, true);


--
-- Name: condition_policy; Type: TABLE; Schema: public; Owner: moac; Tablespace: 
--

CREATE TABLE condition_policy (
    id integer NOT NULL,
    cond_id integer NOT NULL,
    policy_id integer NOT NULL
);


ALTER TABLE public.condition_policy OWNER TO moac;

--
-- Name: condition_policy_id_seq; Type: SEQUENCE; Schema: public; Owner: moac
--

CREATE SEQUENCE condition_policy_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.condition_policy_id_seq OWNER TO moac;

--
-- Name: condition_policy_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: moac
--

ALTER SEQUENCE condition_policy_id_seq OWNED BY condition_policy.id;


--
-- Name: condition_policy_id_seq; Type: SEQUENCE SET; Schema: public; Owner: moac
--

SELECT pg_catalog.setval('condition_policy_id_seq', 56, true);


--
-- Name: data; Type: TABLE; Schema: public; Owner: moac; Tablespace: 
--

CREATE TABLE data (
    id integer NOT NULL,
    data_name character varying(255) NOT NULL,
    created_at timestamp without time zone NOT NULL,
    updated_at timestamp without time zone NOT NULL,
    table_name character varying(255)
);


ALTER TABLE public.data OWNER TO moac;

--
-- Name: data_id_seq; Type: SEQUENCE; Schema: public; Owner: moac
--

CREATE SEQUENCE data_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.data_id_seq OWNER TO moac;

--
-- Name: data_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: moac
--

ALTER SEQUENCE data_id_seq OWNED BY data.id;


--
-- Name: data_id_seq; Type: SEQUENCE SET; Schema: public; Owner: moac
--

SELECT pg_catalog.setval('data_id_seq', 12, true);


--
-- Name: data_policy; Type: TABLE; Schema: public; Owner: moac; Tablespace: 
--

CREATE TABLE data_policy (
    id integer NOT NULL,
    data_id integer NOT NULL,
    policy_id integer NOT NULL
);


ALTER TABLE public.data_policy OWNER TO moac;

--
-- Name: data_policy_id_seq; Type: SEQUENCE; Schema: public; Owner: moac
--

CREATE SEQUENCE data_policy_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.data_policy_id_seq OWNER TO moac;

--
-- Name: data_policy_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: moac
--

ALTER SEQUENCE data_policy_id_seq OWNED BY data_policy.id;


--
-- Name: data_policy_id_seq; Type: SEQUENCE SET; Schema: public; Owner: moac
--

SELECT pg_catalog.setval('data_policy_id_seq', 107, true);


--
-- Name: data_privacy; Type: TABLE; Schema: public; Owner: moac; Tablespace: 
--

CREATE TABLE data_privacy (
    id integer NOT NULL,
    data_id integer NOT NULL,
    agency_id integer NOT NULL,
    status boolean DEFAULT false NOT NULL
);


ALTER TABLE public.data_privacy OWNER TO moac;

--
-- Name: data_privacy_id_seq; Type: SEQUENCE; Schema: public; Owner: moac
--

CREATE SEQUENCE data_privacy_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.data_privacy_id_seq OWNER TO moac;

--
-- Name: data_privacy_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: moac
--

ALTER SEQUENCE data_privacy_id_seq OWNED BY data_privacy.id;


--
-- Name: data_privacy_id_seq; Type: SEQUENCE SET; Schema: public; Owner: moac
--

SELECT pg_catalog.setval('data_privacy_id_seq', 261, true);


--
-- Name: department; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE department (
    department_id integer NOT NULL,
    ministry_id integer,
    full_th_name character varying(500),
    full_en_name character varying(500),
    short_name character varying(50),
    department_code character varying(10),
    status boolean DEFAULT true,
    created_date timestamp with time zone DEFAULT now() NOT NULL,
    created_by character varying(50),
    last_updated_date timestamp with time zone DEFAULT now() NOT NULL,
    last_updated_by character varying(50)
);


ALTER TABLE public.department OWNER TO postgres;

--
-- Name: TABLE department; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON TABLE department IS 'รายชื่อหน่วยงาน';


--
-- Name: COLUMN department.status; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN department.status IS 'สถานะข้อมูล true = มีการใช้งาน false = เลิกใช้งาน';


--
-- Name: COLUMN department.created_date; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN department.created_date IS 'วันที่สร้างข้อมูล';


--
-- Name: COLUMN department.created_by; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN department.created_by IS 'ชื่อผู้ใช้งานที่สร้างข้อมูล';


--
-- Name: COLUMN department.last_updated_date; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN department.last_updated_date IS 'วันที่ปรับปรุงข้อมูลล่าสุด';


--
-- Name: COLUMN department.last_updated_by; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN department.last_updated_by IS 'ชื่อผู้ใช้งานที่ปรับปรุงข้อมูล';


--
-- Name: discolse; Type: TABLE; Schema: public; Owner: moac; Tablespace: 
--

CREATE TABLE discolse (
    id integer NOT NULL,
    freqdata_id integer NOT NULL,
    status boolean NOT NULL,
    created_at timestamp without time zone NOT NULL,
    updated_at timestamp without time zone NOT NULL
);


ALTER TABLE public.discolse OWNER TO moac;

--
-- Name: discolse_id_seq; Type: SEQUENCE; Schema: public; Owner: moac
--

CREATE SEQUENCE discolse_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.discolse_id_seq OWNER TO moac;

--
-- Name: discolse_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: moac
--

ALTER SEQUENCE discolse_id_seq OWNED BY discolse.id;


--
-- Name: discolse_id_seq; Type: SEQUENCE SET; Schema: public; Owner: moac
--

SELECT pg_catalog.setval('discolse_id_seq', 1, false);


--
-- Name: dispose; Type: TABLE; Schema: public; Owner: moac; Tablespace: 
--

CREATE TABLE dispose (
    id integer NOT NULL,
    freqdata_id integer NOT NULL,
    created_at timestamp without time zone NOT NULL,
    updated_at timestamp without time zone NOT NULL
);


ALTER TABLE public.dispose OWNER TO moac;

--
-- Name: dispose_id_seq; Type: SEQUENCE; Schema: public; Owner: moac
--

CREATE SEQUENCE dispose_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.dispose_id_seq OWNER TO moac;

--
-- Name: dispose_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: moac
--

ALTER SEQUENCE dispose_id_seq OWNED BY dispose.id;


--
-- Name: dispose_id_seq; Type: SEQUENCE SET; Schema: public; Owner: moac
--

SELECT pg_catalog.setval('dispose_id_seq', 1, false);


--
-- Name: dix_department_department_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE dix_department_department_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.dix_department_department_id_seq OWNER TO postgres;

--
-- Name: dix_department_department_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE dix_department_department_id_seq OWNED BY department.department_id;


--
-- Name: dix_department_department_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('dix_department_department_id_seq', 366, true);


--
-- Name: ministry; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE ministry (
    ministry_id integer NOT NULL,
    full_th_name character varying(500),
    full_en_name character varying(500),
    short_name character varying(50),
    ministry_code character varying(10),
    status boolean DEFAULT true,
    created_date timestamp with time zone DEFAULT now() NOT NULL,
    created_by character varying(50),
    last_updated_date timestamp with time zone DEFAULT now() NOT NULL,
    last_updated_by character varying(50)
);


ALTER TABLE public.ministry OWNER TO postgres;

--
-- Name: TABLE ministry; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON TABLE ministry IS 'กระทรวง';


--
-- Name: COLUMN ministry.status; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN ministry.status IS 'สถานะข้อมูล true = มีการใช้งาน false = เลิกใช้งาน';


--
-- Name: COLUMN ministry.created_date; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN ministry.created_date IS 'วันที่สร้างข้อมูล';


--
-- Name: COLUMN ministry.created_by; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN ministry.created_by IS 'ชื่อผู้ใช้งานที่สร้างข้อมูล';


--
-- Name: COLUMN ministry.last_updated_date; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN ministry.last_updated_date IS 'วันที่ปรับปรุงข้อมูลล่าสุด';


--
-- Name: COLUMN ministry.last_updated_by; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN ministry.last_updated_by IS 'ชื่อผู้ใช้งานที่ปรับปรุงข้อมูล';


--
-- Name: dix_ministry_ministry_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE dix_ministry_ministry_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.dix_ministry_ministry_id_seq OWNER TO postgres;

--
-- Name: dix_ministry_ministry_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE dix_ministry_ministry_id_seq OWNED BY ministry.ministry_id;


--
-- Name: dix_ministry_ministry_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('dix_ministry_ministry_id_seq', 30, true);


--
-- Name: frequency; Type: TABLE; Schema: public; Owner: moac; Tablespace: 
--

CREATE TABLE frequency (
    id integer NOT NULL,
    src_id integer NOT NULL,
    fld_id integer NOT NULL,
    freq_name character varying(255) NOT NULL,
    comment character varying(255),
    created_at timestamp without time zone NOT NULL,
    updated_at timestamp without time zone NOT NULL
);


ALTER TABLE public.frequency OWNER TO moac;

--
-- Name: frequency_id_seq; Type: SEQUENCE; Schema: public; Owner: moac
--

CREATE SEQUENCE frequency_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.frequency_id_seq OWNER TO moac;

--
-- Name: frequency_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: moac
--

ALTER SEQUENCE frequency_id_seq OWNED BY frequency.id;


--
-- Name: frequency_id_seq; Type: SEQUENCE SET; Schema: public; Owner: moac
--

SELECT pg_catalog.setval('frequency_id_seq', 1, false);


--
-- Name: frequencydata; Type: TABLE; Schema: public; Owner: moac; Tablespace: 
--

CREATE TABLE frequencydata (
    id integer NOT NULL,
    data_id integer NOT NULL,
    freq_id integer NOT NULL
);


ALTER TABLE public.frequencydata OWNER TO moac;

--
-- Name: frequencydata_id_seq; Type: SEQUENCE; Schema: public; Owner: moac
--

CREATE SEQUENCE frequencydata_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.frequencydata_id_seq OWNER TO moac;

--
-- Name: frequencydata_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: moac
--

ALTER SEQUENCE frequencydata_id_seq OWNED BY frequencydata.id;


--
-- Name: frequencydata_id_seq; Type: SEQUENCE SET; Schema: public; Owner: moac
--

SELECT pg_catalog.setval('frequencydata_id_seq', 1, false);


--
-- Name: logs; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE logs (
    id integer NOT NULL,
    ip character varying(255),
    host character varying(255),
    lastpage character varying(255),
    last_visit character varying(255),
    created_at timestamp without time zone NOT NULL,
    updated_at timestamp without time zone NOT NULL,
    role_id integer,
    data_id integer,
    userid integer
);


ALTER TABLE public.logs OWNER TO postgres;

--
-- Name: logs_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE logs_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.logs_id_seq OWNER TO postgres;

--
-- Name: logs_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE logs_id_seq OWNED BY logs.id;


--
-- Name: logs_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('logs_id_seq', 574, true);


--
-- Name: migrations; Type: TABLE; Schema: public; Owner: moac; Tablespace: 
--

CREATE TABLE migrations (
    migration character varying(255) NOT NULL,
    batch integer NOT NULL
);


ALTER TABLE public.migrations OWNER TO moac;

--
-- Name: ministry2; Type: TABLE; Schema: public; Owner: moac; Tablespace: 
--

CREATE TABLE ministry2 (
    id integer NOT NULL,
    ministry_id integer NOT NULL,
    full_name character varying(256) NOT NULL,
    short_name character varying(256),
    code character varying(20),
    created_at timestamp without time zone NOT NULL,
    updated_at timestamp without time zone NOT NULL
);


ALTER TABLE public.ministry2 OWNER TO moac;

--
-- Name: ministry_id_seq; Type: SEQUENCE; Schema: public; Owner: moac
--

CREATE SEQUENCE ministry_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.ministry_id_seq OWNER TO moac;

--
-- Name: ministry_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: moac
--

ALTER SEQUENCE ministry_id_seq OWNED BY ministry2.id;


--
-- Name: ministry_id_seq; Type: SEQUENCE SET; Schema: public; Owner: moac
--

SELECT pg_catalog.setval('ministry_id_seq', 8, true);


--
-- Name: obligation; Type: TABLE; Schema: public; Owner: moac; Tablespace: 
--

CREATE TABLE obligation (
    id integer NOT NULL,
    obl_name character varying(255) NOT NULL,
    created_at timestamp without time zone NOT NULL,
    updated_at timestamp without time zone NOT NULL
);


ALTER TABLE public.obligation OWNER TO moac;

--
-- Name: obligation_id_seq; Type: SEQUENCE; Schema: public; Owner: moac
--

CREATE SEQUENCE obligation_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.obligation_id_seq OWNER TO moac;

--
-- Name: obligation_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: moac
--

ALTER SEQUENCE obligation_id_seq OWNED BY obligation.id;


--
-- Name: obligation_id_seq; Type: SEQUENCE SET; Schema: public; Owner: moac
--

SELECT pg_catalog.setval('obligation_id_seq', 5, true);


--
-- Name: obligation_policy; Type: TABLE; Schema: public; Owner: moac; Tablespace: 
--

CREATE TABLE obligation_policy (
    id integer NOT NULL,
    obl_id integer NOT NULL,
    policy_id integer NOT NULL
);


ALTER TABLE public.obligation_policy OWNER TO moac;

--
-- Name: obligation_policy_id_seq; Type: SEQUENCE; Schema: public; Owner: moac
--

CREATE SEQUENCE obligation_policy_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.obligation_policy_id_seq OWNER TO moac;

--
-- Name: obligation_policy_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: moac
--

ALTER SEQUENCE obligation_policy_id_seq OWNED BY obligation_policy.id;


--
-- Name: obligation_policy_id_seq; Type: SEQUENCE SET; Schema: public; Owner: moac
--

SELECT pg_catalog.setval('obligation_policy_id_seq', 24, true);


--
-- Name: password_reminders; Type: TABLE; Schema: public; Owner: moac; Tablespace: 
--

CREATE TABLE password_reminders (
    email character varying(255) NOT NULL,
    token character varying(255) NOT NULL,
    created_at timestamp without time zone NOT NULL
);


ALTER TABLE public.password_reminders OWNER TO moac;

--
-- Name: policy; Type: TABLE; Schema: public; Owner: moac; Tablespace: 
--

CREATE TABLE policy (
    id integer NOT NULL,
    policy_content text NOT NULL,
    author character varying(255) NOT NULL,
    status boolean DEFAULT true NOT NULL,
    created_at timestamp without time zone NOT NULL,
    updated_at timestamp without time zone NOT NULL,
    policy_duty integer
);


ALTER TABLE public.policy OWNER TO moac;

--
-- Name: policy_duty; Type: TABLE; Schema: public; Owner: moac; Tablespace: 
--

CREATE TABLE policy_duty (
    id integer NOT NULL,
    fname character varying(255) NOT NULL,
    lastname character varying(255) NOT NULL,
    "position" character varying(255) NOT NULL,
    email character varying(255) NOT NULL,
    tel character varying(255) NOT NULL,
    status boolean DEFAULT false NOT NULL,
    created_at timestamp without time zone NOT NULL,
    updated_at timestamp without time zone NOT NULL,
    duty_type integer
);


ALTER TABLE public.policy_duty OWNER TO moac;

--
-- Name: COLUMN policy_duty.duty_type; Type: COMMENT; Schema: public; Owner: moac
--

COMMENT ON COLUMN policy_duty.duty_type IS 'ประเภทความรับผิดชอบ';


--
-- Name: policy_duty_id_seq; Type: SEQUENCE; Schema: public; Owner: moac
--

CREATE SEQUENCE policy_duty_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.policy_duty_id_seq OWNER TO moac;

--
-- Name: policy_duty_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: moac
--

ALTER SEQUENCE policy_duty_id_seq OWNED BY policy_duty.id;


--
-- Name: policy_duty_id_seq; Type: SEQUENCE SET; Schema: public; Owner: moac
--

SELECT pg_catalog.setval('policy_duty_id_seq', 5, true);


--
-- Name: policy_dutytype; Type: TABLE; Schema: public; Owner: moac; Tablespace: 
--

CREATE TABLE policy_dutytype (
    id integer NOT NULL,
    name character varying NOT NULL,
    comment character varying
);


ALTER TABLE public.policy_dutytype OWNER TO moac;

--
-- Name: TABLE policy_dutytype; Type: COMMENT; Schema: public; Owner: moac
--

COMMENT ON TABLE policy_dutytype IS 'ตารางประเภทความรับผิดชอบ';


--
-- Name: policy_dutytype_id_seq; Type: SEQUENCE; Schema: public; Owner: moac
--

CREATE SEQUENCE policy_dutytype_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.policy_dutytype_id_seq OWNER TO moac;

--
-- Name: policy_dutytype_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: moac
--

ALTER SEQUENCE policy_dutytype_id_seq OWNED BY policy_dutytype.id;


--
-- Name: policy_dutytype_id_seq; Type: SEQUENCE SET; Schema: public; Owner: moac
--

SELECT pg_catalog.setval('policy_dutytype_id_seq', 3, true);


--
-- Name: policy_id_seq; Type: SEQUENCE; Schema: public; Owner: moac
--

CREATE SEQUENCE policy_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.policy_id_seq OWNER TO moac;

--
-- Name: policy_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: moac
--

ALTER SEQUENCE policy_id_seq OWNED BY policy.id;


--
-- Name: policy_id_seq; Type: SEQUENCE SET; Schema: public; Owner: moac
--

SELECT pg_catalog.setval('policy_id_seq', 26, true);


--
-- Name: privacy; Type: TABLE; Schema: public; Owner: moac; Tablespace: 
--

CREATE TABLE privacy (
    id integer NOT NULL,
    userid integer NOT NULL,
    email boolean DEFAULT false,
    telno boolean DEFAULT false,
    agency boolean DEFAULT false,
    department boolean DEFAULT false,
    ministry boolean DEFAULT false,
    role boolean DEFAULT false,
    action boolean DEFAULT false,
    created_at timestamp without time zone NOT NULL,
    updated_at timestamp without time zone NOT NULL,
    fname boolean NOT NULL,
    lname boolean NOT NULL
);


ALTER TABLE public.privacy OWNER TO moac;

--
-- Name: privacy_id_seq; Type: SEQUENCE; Schema: public; Owner: moac
--

CREATE SEQUENCE privacy_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.privacy_id_seq OWNER TO moac;

--
-- Name: privacy_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: moac
--

ALTER SEQUENCE privacy_id_seq OWNED BY privacy.id;


--
-- Name: privacy_id_seq; Type: SEQUENCE SET; Schema: public; Owner: moac
--

SELECT pg_catalog.setval('privacy_id_seq', 12, true);


--
-- Name: privacy_init; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE privacy_init (
    id integer NOT NULL,
    name_en character varying(255) NOT NULL,
    name_th character varying(255) NOT NULL,
    privacy_type character varying(255) NOT NULL,
    removeable boolean NOT NULL,
    created_at timestamp without time zone NOT NULL,
    updated_at timestamp without time zone NOT NULL,
    init_value boolean NOT NULL
);


ALTER TABLE public.privacy_init OWNER TO postgres;

--
-- Name: privacy_init_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE privacy_init_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.privacy_init_id_seq OWNER TO postgres;

--
-- Name: privacy_init_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE privacy_init_id_seq OWNED BY privacy_init.id;


--
-- Name: privacy_init_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('privacy_init_id_seq', 10, true);


--
-- Name: privacy_type; Type: TABLE; Schema: public; Owner: moac; Tablespace: 
--

CREATE TABLE privacy_type (
    id integer NOT NULL,
    name character varying(255) NOT NULL,
    created_at timestamp without time zone NOT NULL,
    updated_at timestamp without time zone NOT NULL
);


ALTER TABLE public.privacy_type OWNER TO moac;

--
-- Name: privacy_type_id_seq; Type: SEQUENCE; Schema: public; Owner: moac
--

CREATE SEQUENCE privacy_type_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.privacy_type_id_seq OWNER TO moac;

--
-- Name: privacy_type_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: moac
--

ALTER SEQUENCE privacy_type_id_seq OWNED BY privacy_type.id;


--
-- Name: privacy_type_id_seq; Type: SEQUENCE SET; Schema: public; Owner: moac
--

SELECT pg_catalog.setval('privacy_type_id_seq', 1, false);


--
-- Name: purpose; Type: TABLE; Schema: public; Owner: moac; Tablespace: 
--

CREATE TABLE purpose (
    id integer NOT NULL,
    purp_name character varying(255) NOT NULL,
    created_at timestamp without time zone NOT NULL,
    updated_at timestamp without time zone NOT NULL
);


ALTER TABLE public.purpose OWNER TO moac;

--
-- Name: purpose_id_seq; Type: SEQUENCE; Schema: public; Owner: moac
--

CREATE SEQUENCE purpose_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.purpose_id_seq OWNER TO moac;

--
-- Name: purpose_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: moac
--

ALTER SEQUENCE purpose_id_seq OWNED BY purpose.id;


--
-- Name: purpose_id_seq; Type: SEQUENCE SET; Schema: public; Owner: moac
--

SELECT pg_catalog.setval('purpose_id_seq', 7, true);


--
-- Name: purpose_policy; Type: TABLE; Schema: public; Owner: moac; Tablespace: 
--

CREATE TABLE purpose_policy (
    id integer NOT NULL,
    purp_id integer NOT NULL,
    policy_id integer NOT NULL
);


ALTER TABLE public.purpose_policy OWNER TO moac;

--
-- Name: purpose_policy_id_seq; Type: SEQUENCE; Schema: public; Owner: moac
--

CREATE SEQUENCE purpose_policy_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.purpose_policy_id_seq OWNER TO moac;

--
-- Name: purpose_policy_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: moac
--

ALTER SEQUENCE purpose_policy_id_seq OWNED BY purpose_policy.id;


--
-- Name: purpose_policy_id_seq; Type: SEQUENCE SET; Schema: public; Owner: moac
--

SELECT pg_catalog.setval('purpose_policy_id_seq', 22, true);


--
-- Name: request_data; Type: TABLE; Schema: public; Owner: moac; Tablespace: 
--

CREATE TABLE request_data (
    id integer NOT NULL,
    data_id integer NOT NULL,
    cond_id integer NOT NULL,
    agency_code character varying(255) NOT NULL,
    req_status boolean,
    send_userid integer NOT NULL,
    send_agencyid integer NOT NULL,
    created_at timestamp without time zone NOT NULL,
    updated_at timestamp without time zone NOT NULL,
    downloaded boolean,
    comment text,
    app_userid integer,
    req_type integer
);


ALTER TABLE public.request_data OWNER TO moac;

--
-- Name: request_data_id_seq; Type: SEQUENCE; Schema: public; Owner: moac
--

CREATE SEQUENCE request_data_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.request_data_id_seq OWNER TO moac;

--
-- Name: request_data_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: moac
--

ALTER SEQUENCE request_data_id_seq OWNED BY request_data.id;


--
-- Name: request_data_id_seq; Type: SEQUENCE SET; Schema: public; Owner: moac
--

SELECT pg_catalog.setval('request_data_id_seq', 7, true);


--
-- Name: request_type_data; Type: TABLE; Schema: public; Owner: moac; Tablespace: 
--

CREATE TABLE request_type_data (
    id integer NOT NULL,
    type_name character varying(255) NOT NULL,
    created_at timestamp without time zone NOT NULL,
    updated_at timestamp without time zone NOT NULL
);


ALTER TABLE public.request_type_data OWNER TO moac;

--
-- Name: request_type_data_id_seq; Type: SEQUENCE; Schema: public; Owner: moac
--

CREATE SEQUENCE request_type_data_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.request_type_data_id_seq OWNER TO moac;

--
-- Name: request_type_data_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: moac
--

ALTER SEQUENCE request_type_data_id_seq OWNED BY request_type_data.id;


--
-- Name: request_type_data_id_seq; Type: SEQUENCE SET; Schema: public; Owner: moac
--

SELECT pg_catalog.setval('request_type_data_id_seq', 2, true);


--
-- Name: retain; Type: TABLE; Schema: public; Owner: moac; Tablespace: 
--

CREATE TABLE retain (
    id integer NOT NULL,
    freqdata_id integer NOT NULL,
    created_at timestamp without time zone NOT NULL,
    updated_at timestamp without time zone NOT NULL
);


ALTER TABLE public.retain OWNER TO moac;

--
-- Name: retain_data; Type: TABLE; Schema: public; Owner: moac; Tablespace: 
--

CREATE TABLE retain_data (
    id integer NOT NULL,
    data_id integer NOT NULL,
    period timestamp without time zone NOT NULL,
    retain_text character varying(255),
    start_retain_date character varying
);


ALTER TABLE public.retain_data OWNER TO moac;

--
-- Name: retain_data_id_seq; Type: SEQUENCE; Schema: public; Owner: moac
--

CREATE SEQUENCE retain_data_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.retain_data_id_seq OWNER TO moac;

--
-- Name: retain_data_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: moac
--

ALTER SEQUENCE retain_data_id_seq OWNED BY retain_data.id;


--
-- Name: retain_data_id_seq; Type: SEQUENCE SET; Schema: public; Owner: moac
--

SELECT pg_catalog.setval('retain_data_id_seq', 11, true);


--
-- Name: retain_id_seq; Type: SEQUENCE; Schema: public; Owner: moac
--

CREATE SEQUENCE retain_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.retain_id_seq OWNER TO moac;

--
-- Name: retain_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: moac
--

ALTER SEQUENCE retain_id_seq OWNED BY retain.id;


--
-- Name: retain_id_seq; Type: SEQUENCE SET; Schema: public; Owner: moac
--

SELECT pg_catalog.setval('retain_id_seq', 1, false);


--
-- Name: roles; Type: TABLE; Schema: public; Owner: moac; Tablespace: 
--

CREATE TABLE roles (
    id integer NOT NULL,
    role_name character varying(255) NOT NULL,
    created_at timestamp without time zone NOT NULL,
    updated_at timestamp without time zone NOT NULL
);


ALTER TABLE public.roles OWNER TO moac;

--
-- Name: role_id_seq; Type: SEQUENCE; Schema: public; Owner: moac
--

CREATE SEQUENCE role_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.role_id_seq OWNER TO moac;

--
-- Name: role_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: moac
--

ALTER SEQUENCE role_id_seq OWNED BY roles.id;


--
-- Name: role_id_seq; Type: SEQUENCE SET; Schema: public; Owner: moac
--

SELECT pg_catalog.setval('role_id_seq', 8, true);


--
-- Name: role_policy; Type: TABLE; Schema: public; Owner: moac; Tablespace: 
--

CREATE TABLE role_policy (
    id integer NOT NULL,
    role_id integer NOT NULL,
    policy_id integer NOT NULL
);


ALTER TABLE public.role_policy OWNER TO moac;

--
-- Name: role_policy_id_seq; Type: SEQUENCE; Schema: public; Owner: moac
--

CREATE SEQUENCE role_policy_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.role_policy_id_seq OWNER TO moac;

--
-- Name: role_policy_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: moac
--

ALTER SEQUENCE role_policy_id_seq OWNED BY role_policy.id;


--
-- Name: role_policy_id_seq; Type: SEQUENCE SET; Schema: public; Owner: moac
--

SELECT pg_catalog.setval('role_policy_id_seq', 46, true);


--
-- Name: role_user; Type: TABLE; Schema: public; Owner: moac; Tablespace: 
--

CREATE TABLE role_user (
    id integer NOT NULL,
    role_id integer NOT NULL,
    user_id integer NOT NULL
);


ALTER TABLE public.role_user OWNER TO moac;

--
-- Name: role_user_id_seq; Type: SEQUENCE; Schema: public; Owner: moac
--

CREATE SEQUENCE role_user_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.role_user_id_seq OWNER TO moac;

--
-- Name: role_user_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: moac
--

ALTER SEQUENCE role_user_id_seq OWNED BY role_user.id;


--
-- Name: role_user_id_seq; Type: SEQUENCE SET; Schema: public; Owner: moac
--

SELECT pg_catalog.setval('role_user_id_seq', 13, true);


--
-- Name: schedule; Type: TABLE; Schema: public; Owner: moac; Tablespace: 
--

CREATE TABLE schedule (
    id integer NOT NULL,
    title character varying(256) NOT NULL,
    disp_id integer NOT NULL,
    retain_id integer NOT NULL,
    status boolean DEFAULT false NOT NULL,
    created_at timestamp without time zone NOT NULL,
    updated_at timestamp without time zone NOT NULL
);


ALTER TABLE public.schedule OWNER TO moac;

--
-- Name: schedule_id_seq; Type: SEQUENCE; Schema: public; Owner: moac
--

CREATE SEQUENCE schedule_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.schedule_id_seq OWNER TO moac;

--
-- Name: schedule_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: moac
--

ALTER SEQUENCE schedule_id_seq OWNED BY schedule.id;


--
-- Name: schedule_id_seq; Type: SEQUENCE SET; Schema: public; Owner: moac
--

SELECT pg_catalog.setval('schedule_id_seq', 1, false);


--
-- Name: source_field; Type: TABLE; Schema: public; Owner: moac; Tablespace: 
--

CREATE TABLE source_field (
    id integer NOT NULL,
    fld_name character varying(255) NOT NULL,
    fld_where character varying(255),
    fld_order character varying(255),
    fld_limit character varying(255),
    created_at timestamp without time zone NOT NULL,
    updated_at timestamp without time zone NOT NULL
);


ALTER TABLE public.source_field OWNER TO moac;

--
-- Name: source_field_id_seq; Type: SEQUENCE; Schema: public; Owner: moac
--

CREATE SEQUENCE source_field_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.source_field_id_seq OWNER TO moac;

--
-- Name: source_field_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: moac
--

ALTER SEQUENCE source_field_id_seq OWNED BY source_field.id;


--
-- Name: source_field_id_seq; Type: SEQUENCE SET; Schema: public; Owner: moac
--

SELECT pg_catalog.setval('source_field_id_seq', 1, false);


--
-- Name: source_tbl; Type: TABLE; Schema: public; Owner: moac; Tablespace: 
--

CREATE TABLE source_tbl (
    id integer NOT NULL,
    src_name character varying(255) NOT NULL,
    comment character varying(255),
    created_at timestamp without time zone NOT NULL,
    updated_at timestamp without time zone NOT NULL
);


ALTER TABLE public.source_tbl OWNER TO moac;

--
-- Name: source_tbl_id_seq; Type: SEQUENCE; Schema: public; Owner: moac
--

CREATE SEQUENCE source_tbl_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.source_tbl_id_seq OWNER TO moac;

--
-- Name: source_tbl_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: moac
--

ALTER SEQUENCE source_tbl_id_seq OWNED BY source_tbl.id;


--
-- Name: source_tbl_id_seq; Type: SEQUENCE SET; Schema: public; Owner: moac
--

SELECT pg_catalog.setval('source_tbl_id_seq', 1, false);


--
-- Name: srctable; Type: TABLE; Schema: public; Owner: moac; Tablespace: 
--

CREATE TABLE srctable (
    id integer NOT NULL,
    src_name character varying(255) NOT NULL,
    comment character varying(255),
    created_at timestamp without time zone NOT NULL,
    updated_at timestamp without time zone NOT NULL
);


ALTER TABLE public.srctable OWNER TO moac;

--
-- Name: srctable_id_seq; Type: SEQUENCE; Schema: public; Owner: moac
--

CREATE SEQUENCE srctable_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.srctable_id_seq OWNER TO moac;

--
-- Name: srctable_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: moac
--

ALTER SEQUENCE srctable_id_seq OWNED BY srctable.id;


--
-- Name: srctable_id_seq; Type: SEQUENCE SET; Schema: public; Owner: moac
--

SELECT pg_catalog.setval('srctable_id_seq', 5, true);


--
-- Name: training; Type: TABLE; Schema: public; Owner: moac; Tablespace: 
--

CREATE TABLE training (
    id integer NOT NULL,
    title character varying(256) NOT NULL,
    description text NOT NULL,
    target character varying(255) NOT NULL,
    status boolean DEFAULT false NOT NULL,
    created_at timestamp without time zone NOT NULL,
    updated_at timestamp without time zone NOT NULL,
    closed_date timestamp without time zone NOT NULL,
    start_training_date timestamp without time zone
);


ALTER TABLE public.training OWNER TO moac;

--
-- Name: training_id_seq; Type: SEQUENCE; Schema: public; Owner: moac
--

CREATE SEQUENCE training_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.training_id_seq OWNER TO moac;

--
-- Name: training_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: moac
--

ALTER SEQUENCE training_id_seq OWNED BY training.id;


--
-- Name: training_id_seq; Type: SEQUENCE SET; Schema: public; Owner: moac
--

SELECT pg_catalog.setval('training_id_seq', 5, true);


--
-- Name: transfer; Type: TABLE; Schema: public; Owner: moac; Tablespace: 
--

CREATE TABLE transfer (
    id integer NOT NULL,
    freqdata_id integer NOT NULL,
    status boolean DEFAULT false NOT NULL,
    created_at timestamp without time zone NOT NULL,
    updated_at timestamp without time zone NOT NULL
);


ALTER TABLE public.transfer OWNER TO moac;

--
-- Name: transfer_id_seq; Type: SEQUENCE; Schema: public; Owner: moac
--

CREATE SEQUENCE transfer_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.transfer_id_seq OWNER TO moac;

--
-- Name: transfer_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: moac
--

ALTER SEQUENCE transfer_id_seq OWNED BY transfer.id;


--
-- Name: transfer_id_seq; Type: SEQUENCE SET; Schema: public; Owner: moac
--

SELECT pg_catalog.setval('transfer_id_seq', 1, false);


--
-- Name: user_training; Type: TABLE; Schema: public; Owner: moac; Tablespace: 
--

CREATE TABLE user_training (
    id integer NOT NULL,
    userid integer NOT NULL,
    training_id integer NOT NULL,
    attend boolean NOT NULL,
    comment text,
    date_time_att timestamp without time zone
);


ALTER TABLE public.user_training OWNER TO moac;

--
-- Name: user_training_id_seq; Type: SEQUENCE; Schema: public; Owner: moac
--

CREATE SEQUENCE user_training_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.user_training_id_seq OWNER TO moac;

--
-- Name: user_training_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: moac
--

ALTER SEQUENCE user_training_id_seq OWNED BY user_training.id;


--
-- Name: user_training_id_seq; Type: SEQUENCE SET; Schema: public; Owner: moac
--

SELECT pg_catalog.setval('user_training_id_seq', 6, true);


--
-- Name: usergroup; Type: TABLE; Schema: public; Owner: moac; Tablespace: 
--

CREATE TABLE usergroup (
    id integer NOT NULL,
    grp_name character varying(50) NOT NULL,
    grp_description text,
    created_at timestamp without time zone NOT NULL,
    updated_at timestamp without time zone NOT NULL,
    grp_nameth character varying(255)
);


ALTER TABLE public.usergroup OWNER TO moac;

--
-- Name: usergroup_id_seq; Type: SEQUENCE; Schema: public; Owner: moac
--

CREATE SEQUENCE usergroup_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.usergroup_id_seq OWNER TO moac;

--
-- Name: usergroup_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: moac
--

ALTER SEQUENCE usergroup_id_seq OWNED BY usergroup.id;


--
-- Name: usergroup_id_seq; Type: SEQUENCE SET; Schema: public; Owner: moac
--

SELECT pg_catalog.setval('usergroup_id_seq', 3, true);


--
-- Name: usernhc; Type: TABLE; Schema: public; Owner: moac; Tablespace: 
--

CREATE TABLE usernhc (
    id integer NOT NULL,
    agency_id integer NOT NULL,
    grp_id integer NOT NULL,
    username character varying(255) NOT NULL,
    password character varying(255) NOT NULL,
    email character varying(255) NOT NULL,
    fname character varying(255) NOT NULL,
    lname character varying(255),
    telno character varying(255),
    created_at timestamp without time zone NOT NULL,
    updated_at timestamp without time zone NOT NULL,
    rememberme boolean DEFAULT true NOT NULL,
    status character varying(255) DEFAULT 'no'::character varying NOT NULL,
    remember_token character varying
);


ALTER TABLE public.usernhc OWNER TO moac;

--
-- Name: usernhc_id_seq; Type: SEQUENCE; Schema: public; Owner: moac
--

CREATE SEQUENCE usernhc_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.usernhc_id_seq OWNER TO moac;

--
-- Name: usernhc_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: moac
--

ALTER SEQUENCE usernhc_id_seq OWNED BY usernhc.id;


--
-- Name: usernhc_id_seq; Type: SEQUENCE SET; Schema: public; Owner: moac
--

SELECT pg_catalog.setval('usernhc_id_seq', 16, true);


--
-- Name: v_agency; Type: VIEW; Schema: public; Owner: moac
--

CREATE VIEW v_agency AS
    SELECT a.id AS agency_id, a.tname, a.ministry_id, a.abbr, a.code, a.status, m.full_name, m.short_name FROM (agency a JOIN ministry2 m ON ((a.ministry_id = m.ministry_id)));


ALTER TABLE public.v_agency OWNER TO moac;

--
-- Name: v_agency2; Type: VIEW; Schema: public; Owner: moac
--

CREATE VIEW v_agency2 AS
    SELECT a.id AS agency_id, a.tname, a.ministry_id, a.abbr, a.code, a.status, m.full_th_name AS full_name, m.short_name FROM (agency a JOIN ministry m ON ((a.ministry_id = m.ministry_id)));


ALTER TABLE public.v_agency2 OWNER TO moac;

--
-- Name: v_data_privacy; Type: VIEW; Schema: public; Owner: moac
--

CREATE VIEW v_data_privacy AS
    SELECT DISTINCT r.policy_id, policy.status AS policy_status, d.data_id, p.status AS privacy, p.agency_id, a.code AS agency_code, data.data_name, data.table_name, t.period, c.cond_id, n.cond_name, n.condition, at.action_name FROM ((((((((((role_policy r JOIN data_policy d ON ((d.policy_id = r.policy_id))) JOIN policy ON ((policy.id = r.policy_id))) JOIN data_privacy p ON ((p.data_id = d.data_id))) JOIN agency a ON ((a.id = p.agency_id))) JOIN data ON ((d.data_id = data.id))) JOIN retain_data t ON ((d.data_id = t.data_id))) JOIN condition_policy c ON ((c.policy_id = r.policy_id))) JOIN condition n ON ((n.id = c.cond_id))) JOIN action_policy ap ON ((ap.policy_id = r.policy_id))) JOIN action at ON ((at.id = ap.action_id))) ORDER BY r.policy_id, p.status DESC;


ALTER TABLE public.v_data_privacy OWNER TO moac;

--
-- Name: v_data_privacy_tmp; Type: VIEW; Schema: public; Owner: moac
--

CREATE VIEW v_data_privacy_tmp AS
    SELECT DISTINCT r.policy_id, d.data_id, p.status AS privacy, p.agency_id, a.code AS agency_code, data.data_name, data.table_name, t.period, c.cond_id, n.cond_name, n.condition, at.action_name FROM ((((((((((role_policy r JOIN data_policy d ON ((d.policy_id = r.policy_id))) JOIN policy ON ((policy.id = r.policy_id))) JOIN data_privacy p ON ((p.data_id = d.data_id))) JOIN agency a ON ((a.id = p.agency_id))) JOIN data ON ((d.data_id = data.id))) JOIN retain_data t ON ((d.data_id = t.data_id))) JOIN condition_policy c ON ((c.policy_id = r.policy_id))) JOIN condition n ON ((n.id = c.cond_id))) JOIN action_policy ap ON ((ap.policy_id = r.policy_id))) JOIN action at ON ((at.id = ap.action_id))) ORDER BY r.policy_id, p.status DESC;


ALTER TABLE public.v_data_privacy_tmp OWNER TO moac;

--
-- Name: VIEW v_data_privacy_tmp; Type: COMMENT; Schema: public; Owner: moac
--

COMMENT ON VIEW v_data_privacy_tmp IS 'เป็นการแมพ เมื่อตามบทบาทผู้ใช้งาน
ว่าสามารถดูข้อมูลอะไรบ้างเกี่ยวข้องกับนโยบายไหน
ข้อมูลอยู่หน่วยงานไหน แล้วหน่วยงานนั้นเขาเปิดให้ดุ
ข้อมูลไหม ';


--
-- Name: v_databy_agency; Type: VIEW; Schema: public; Owner: moac
--

CREATE VIEW v_databy_agency AS
    SELECT p.data_id, d.data_name, p.agency_id, p.status AS privacy_data, r.period AS lastdate_retain FROM ((data d JOIN data_privacy p ON ((d.id = p.data_id))) JOIN retain_data r ON ((p.data_id = r.data_id))) GROUP BY p.data_id, d.data_name, p.agency_id, p.status, r.period ORDER BY p.agency_id;


ALTER TABLE public.v_databy_agency OWNER TO moac;

--
-- Name: VIEW v_databy_agency; Type: COMMENT; Schema: public; Owner: moac
--

COMMENT ON VIEW v_databy_agency IS 'สำหรับค้นหาว่าหน่วยงานไหนเปิดเผยข้อมูลไหนบ้างร่วมไปถึงว่าข้อมูลเก็บถึงวันไหน';


--
-- Name: v_policy; Type: VIEW; Schema: public; Owner: moac
--

CREATE VIEW v_policy AS
    SELECT p.id, p.policy_content, p.author, p.status, p.created_at, d.fname, d.lastname, d."position", d.email, d.tel, d.status AS duty_status, d.created_at AS duty_created, d.id AS policy_duty FROM (policy p JOIN policy_duty d ON ((p.policy_duty = d.id)));


ALTER TABLE public.v_policy OWNER TO moac;

--
-- Name: v_querydata_metadata_v3; Type: VIEW; Schema: public; Owner: moac
--

CREATE VIEW v_querydata_metadata_v3 AS
    SELECT DISTINCT data_privacy.data_id, data.data_name, data.table_name, data_policy.policy_id, usernhc.id AS user_id, usergroup.id AS user_grp, agency.id AS agency_id, agency.code AS agency_code, role_user.id AS role_id, role.role_name, action_policy.action_id, action.action_name, action.action, condition.cond_name, condition.condition, condition_policy.cond_id, retain_data.period, policy.status AS policy_status, data_privacy.status AS data_privacy_status, agency.code, retain_data.period AS keepdata_lastdate FROM (((((((((((((data_privacy JOIN data_policy ON ((data_policy.data_id = data_privacy.data_id))) JOIN data ON ((data.id = data_policy.data_id))) JOIN policy ON ((policy.id = data_policy.policy_id))) JOIN usernhc ON ((usernhc.agency_id = data_privacy.agency_id))) JOIN usergroup ON ((usernhc.grp_id = usergroup.id))) JOIN agency ON ((usernhc.agency_id = agency.id))) JOIN role_user ON ((role_user.user_id = usernhc.id))) JOIN roles role ON ((role_user.role_id = role.id))) JOIN action_policy ON ((data_policy.policy_id = action_policy.policy_id))) JOIN action ON ((action_policy.action_id = action.id))) JOIN condition_policy ON ((condition_policy.policy_id = data_policy.policy_id))) JOIN condition ON ((condition_policy.cond_id = condition.id))) JOIN retain_data ON ((retain_data.data_id = data_privacy.data_id))) WHERE (usergroup.id <> 1) ORDER BY data_privacy.data_id;


ALTER TABLE public.v_querydata_metadata_v3 OWNER TO moac;

--
-- Name: v_user_info; Type: VIEW; Schema: public; Owner: moac
--

CREATE VIEW v_user_info AS
    SELECT DISTINCT usernhc.id AS user_id, usernhc.status AS user_status, usernhc.fname, usernhc.lname, usernhc.email, usernhc.grp_id, usernhc.telno, usernhc.created_at, agency.id AS agency_id, agency.tname AS agency_name, agency.code, roles.role_name, roles.id AS role_id, ministry2.ministry_id, ministry2.full_name, ministry2.short_name, usergroup.grp_name FROM (((((usernhc JOIN agency ON ((usernhc.agency_id = agency.id))) JOIN ministry2 ON ((agency.ministry_id = ministry2.ministry_id))) JOIN usergroup ON ((usernhc.grp_id = usergroup.id))) JOIN role_user ON ((role_user.user_id = usernhc.id))) JOIN roles ON ((roles.id = role_user.role_id))) ORDER BY usernhc.id DESC;


ALTER TABLE public.v_user_info OWNER TO moac;

--
-- Name: v_training; Type: VIEW; Schema: public; Owner: moac
--

CREATE VIEW v_training AS
    SELECT t.id, t.title, t.description, t.target, t.status, t.closed_date, t.start_training_date, u.userid, u.training_id, u.attend, u.comment, u.date_time_att, i.fname, i.lname, i.agency_name FROM ((training t JOIN user_training u ON ((t.id = u.training_id))) JOIN v_user_info i ON ((i.user_id = u.userid)));


ALTER TABLE public.v_training OWNER TO moac;

--
-- Name: v_user_info_privacy; Type: VIEW; Schema: public; Owner: moac
--

CREATE VIEW v_user_info_privacy AS
    SELECT DISTINCT usernhc.id AS user_id, usernhc.status AS user_status, usernhc.fname, usernhc.lname, usernhc.email, usernhc.grp_id, usernhc.telno, usernhc.created_at, agency.id AS agency_id, agency.tname AS agency, agency.code, roles.role_name AS role, roles.id AS role_id, ministry2.ministry_id, ministry2.full_name AS ministry, ministry2.short_name, usergroup.grp_name FROM (((((usernhc JOIN agency ON ((usernhc.agency_id = agency.id))) JOIN ministry2 ON ((agency.ministry_id = ministry2.ministry_id))) JOIN usergroup ON ((usernhc.grp_id = usergroup.id))) JOIN role_user ON ((role_user.user_id = usernhc.id))) JOIN roles ON ((roles.id = role_user.role_id))) ORDER BY usernhc.id DESC;


ALTER TABLE public.v_user_info_privacy OWNER TO moac;

--
-- Name: id; Type: DEFAULT; Schema: public; Owner: moac
--

ALTER TABLE action ALTER COLUMN id SET DEFAULT nextval('action_id_seq'::regclass);


--
-- Name: id; Type: DEFAULT; Schema: public; Owner: moac
--

ALTER TABLE action_policy ALTER COLUMN id SET DEFAULT nextval('action_policy_id_seq'::regclass);


--
-- Name: id; Type: DEFAULT; Schema: public; Owner: moac
--

ALTER TABLE agency ALTER COLUMN id SET DEFAULT nextval('agency_id_seq'::regclass);


--
-- Name: id; Type: DEFAULT; Schema: public; Owner: moac
--

ALTER TABLE agency_data ALTER COLUMN id SET DEFAULT nextval('agency_data_id_seq'::regclass);


--
-- Name: id; Type: DEFAULT; Schema: public; Owner: moac
--

ALTER TABLE condition ALTER COLUMN id SET DEFAULT nextval('condition_id_seq'::regclass);


--
-- Name: id; Type: DEFAULT; Schema: public; Owner: moac
--

ALTER TABLE condition_policy ALTER COLUMN id SET DEFAULT nextval('condition_policy_id_seq'::regclass);


--
-- Name: id; Type: DEFAULT; Schema: public; Owner: moac
--

ALTER TABLE data ALTER COLUMN id SET DEFAULT nextval('data_id_seq'::regclass);


--
-- Name: id; Type: DEFAULT; Schema: public; Owner: moac
--

ALTER TABLE data_policy ALTER COLUMN id SET DEFAULT nextval('data_policy_id_seq'::regclass);


--
-- Name: id; Type: DEFAULT; Schema: public; Owner: moac
--

ALTER TABLE data_privacy ALTER COLUMN id SET DEFAULT nextval('data_privacy_id_seq'::regclass);


--
-- Name: department_id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE department ALTER COLUMN department_id SET DEFAULT nextval('dix_department_department_id_seq'::regclass);


--
-- Name: id; Type: DEFAULT; Schema: public; Owner: moac
--

ALTER TABLE discolse ALTER COLUMN id SET DEFAULT nextval('discolse_id_seq'::regclass);


--
-- Name: id; Type: DEFAULT; Schema: public; Owner: moac
--

ALTER TABLE dispose ALTER COLUMN id SET DEFAULT nextval('dispose_id_seq'::regclass);


--
-- Name: id; Type: DEFAULT; Schema: public; Owner: moac
--

ALTER TABLE frequency ALTER COLUMN id SET DEFAULT nextval('frequency_id_seq'::regclass);


--
-- Name: id; Type: DEFAULT; Schema: public; Owner: moac
--

ALTER TABLE frequencydata ALTER COLUMN id SET DEFAULT nextval('frequencydata_id_seq'::regclass);


--
-- Name: id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE logs ALTER COLUMN id SET DEFAULT nextval('logs_id_seq'::regclass);


--
-- Name: ministry_id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ministry ALTER COLUMN ministry_id SET DEFAULT nextval('dix_ministry_ministry_id_seq'::regclass);


--
-- Name: id; Type: DEFAULT; Schema: public; Owner: moac
--

ALTER TABLE ministry2 ALTER COLUMN id SET DEFAULT nextval('ministry_id_seq'::regclass);


--
-- Name: id; Type: DEFAULT; Schema: public; Owner: moac
--

ALTER TABLE obligation ALTER COLUMN id SET DEFAULT nextval('obligation_id_seq'::regclass);


--
-- Name: id; Type: DEFAULT; Schema: public; Owner: moac
--

ALTER TABLE obligation_policy ALTER COLUMN id SET DEFAULT nextval('obligation_policy_id_seq'::regclass);


--
-- Name: id; Type: DEFAULT; Schema: public; Owner: moac
--

ALTER TABLE policy ALTER COLUMN id SET DEFAULT nextval('policy_id_seq'::regclass);


--
-- Name: id; Type: DEFAULT; Schema: public; Owner: moac
--

ALTER TABLE policy_duty ALTER COLUMN id SET DEFAULT nextval('policy_duty_id_seq'::regclass);


--
-- Name: id; Type: DEFAULT; Schema: public; Owner: moac
--

ALTER TABLE policy_dutytype ALTER COLUMN id SET DEFAULT nextval('policy_dutytype_id_seq'::regclass);


--
-- Name: id; Type: DEFAULT; Schema: public; Owner: moac
--

ALTER TABLE privacy ALTER COLUMN id SET DEFAULT nextval('privacy_id_seq'::regclass);


--
-- Name: id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE privacy_init ALTER COLUMN id SET DEFAULT nextval('privacy_init_id_seq'::regclass);


--
-- Name: id; Type: DEFAULT; Schema: public; Owner: moac
--

ALTER TABLE privacy_type ALTER COLUMN id SET DEFAULT nextval('privacy_type_id_seq'::regclass);


--
-- Name: id; Type: DEFAULT; Schema: public; Owner: moac
--

ALTER TABLE purpose ALTER COLUMN id SET DEFAULT nextval('purpose_id_seq'::regclass);


--
-- Name: id; Type: DEFAULT; Schema: public; Owner: moac
--

ALTER TABLE purpose_policy ALTER COLUMN id SET DEFAULT nextval('purpose_policy_id_seq'::regclass);


--
-- Name: id; Type: DEFAULT; Schema: public; Owner: moac
--

ALTER TABLE request_data ALTER COLUMN id SET DEFAULT nextval('request_data_id_seq'::regclass);


--
-- Name: id; Type: DEFAULT; Schema: public; Owner: moac
--

ALTER TABLE request_type_data ALTER COLUMN id SET DEFAULT nextval('request_type_data_id_seq'::regclass);


--
-- Name: id; Type: DEFAULT; Schema: public; Owner: moac
--

ALTER TABLE retain ALTER COLUMN id SET DEFAULT nextval('retain_id_seq'::regclass);


--
-- Name: id; Type: DEFAULT; Schema: public; Owner: moac
--

ALTER TABLE retain_data ALTER COLUMN id SET DEFAULT nextval('retain_data_id_seq'::regclass);


--
-- Name: id; Type: DEFAULT; Schema: public; Owner: moac
--

ALTER TABLE role_policy ALTER COLUMN id SET DEFAULT nextval('role_policy_id_seq'::regclass);


--
-- Name: id; Type: DEFAULT; Schema: public; Owner: moac
--

ALTER TABLE role_user ALTER COLUMN id SET DEFAULT nextval('role_user_id_seq'::regclass);


--
-- Name: id; Type: DEFAULT; Schema: public; Owner: moac
--

ALTER TABLE roles ALTER COLUMN id SET DEFAULT nextval('role_id_seq'::regclass);


--
-- Name: id; Type: DEFAULT; Schema: public; Owner: moac
--

ALTER TABLE schedule ALTER COLUMN id SET DEFAULT nextval('schedule_id_seq'::regclass);


--
-- Name: id; Type: DEFAULT; Schema: public; Owner: moac
--

ALTER TABLE source_field ALTER COLUMN id SET DEFAULT nextval('source_field_id_seq'::regclass);


--
-- Name: id; Type: DEFAULT; Schema: public; Owner: moac
--

ALTER TABLE source_tbl ALTER COLUMN id SET DEFAULT nextval('source_tbl_id_seq'::regclass);


--
-- Name: id; Type: DEFAULT; Schema: public; Owner: moac
--

ALTER TABLE srctable ALTER COLUMN id SET DEFAULT nextval('srctable_id_seq'::regclass);


--
-- Name: id; Type: DEFAULT; Schema: public; Owner: moac
--

ALTER TABLE training ALTER COLUMN id SET DEFAULT nextval('training_id_seq'::regclass);


--
-- Name: id; Type: DEFAULT; Schema: public; Owner: moac
--

ALTER TABLE transfer ALTER COLUMN id SET DEFAULT nextval('transfer_id_seq'::regclass);


--
-- Name: id; Type: DEFAULT; Schema: public; Owner: moac
--

ALTER TABLE user_training ALTER COLUMN id SET DEFAULT nextval('user_training_id_seq'::regclass);


--
-- Name: id; Type: DEFAULT; Schema: public; Owner: moac
--

ALTER TABLE usergroup ALTER COLUMN id SET DEFAULT nextval('usergroup_id_seq'::regclass);


--
-- Name: id; Type: DEFAULT; Schema: public; Owner: moac
--

ALTER TABLE usernhc ALTER COLUMN id SET DEFAULT nextval('usernhc_id_seq'::regclass);


--
-- Data for Name: action; Type: TABLE DATA; Schema: public; Owner: moac
--

INSERT INTO action VALUES (1, 'ดาวน์โหลด', '2013-10-28 03:33:45', '2013-10-28 03:33:45', 'download');
INSERT INTO action VALUES (2, 'แจ้งกลับไปยังเจ้าหน้าที่คลังข้อมูล', '2013-10-28 03:33:45', '2013-10-28 03:33:45', 'inform');
INSERT INTO action VALUES (4, 'ขออนุญาตเปิดเผยข้อมูล', '2013-10-28 03:33:45', '2013-10-28 03:33:45', 'disclose');
INSERT INTO action VALUES (5, 'ขออนุญาตส่งต่อข้อมูล', '2013-10-28 03:33:45', '2013-10-28 03:33:45', 'transfer');
INSERT INTO action VALUES (6, 'เพิ่มข้อมูลหรือแก้ไข', '2013-10-28 03:33:45', '2013-10-28 03:33:45', 'insertupdate');
INSERT INTO action VALUES (7, 'ลบข้อมูล', '2013-10-28 03:33:45', '2013-10-28 03:33:45', 'remove');
INSERT INTO action VALUES (3, 'เรียกดูข้อมูล', '2013-10-28 03:33:45', '2014-10-13 09:59:21', 'readonly');


--
-- Data for Name: action_policy; Type: TABLE DATA; Schema: public; Owner: moac
--

INSERT INTO action_policy VALUES (5, 2, 1);
INSERT INTO action_policy VALUES (6, 2, 3);
INSERT INTO action_policy VALUES (8, 3, 3);
INSERT INTO action_policy VALUES (9, 4, 3);
INSERT INTO action_policy VALUES (10, 5, 3);
INSERT INTO action_policy VALUES (17, 6, 3);
INSERT INTO action_policy VALUES (18, 8, 4);
INSERT INTO action_policy VALUES (19, 8, 5);
INSERT INTO action_policy VALUES (20, 8, 3);
INSERT INTO action_policy VALUES (21, 9, 3);
INSERT INTO action_policy VALUES (22, 10, 6);
INSERT INTO action_policy VALUES (23, 10, 7);
INSERT INTO action_policy VALUES (24, 10, 3);
INSERT INTO action_policy VALUES (26, 1, 3);


--
-- Data for Name: agency; Type: TABLE DATA; Schema: public; Owner: moac
--

INSERT INTO agency VALUES (1, 'กรมชลประทาน', 'RID', 17, true, '2013-10-28 03:33:45', '2013-10-28 03:33:45', '07003');
INSERT INTO agency VALUES (2, 'การไฟฟ้าฝ่ายผลิตแห่งประเทศไทย', 'EGAT', 26, true, '2013-10-28 03:33:45', '2013-10-28 03:33:45', '50504');
INSERT INTO agency VALUES (3, 'กรมอุตุนิยมวิทยา', 'TMD', 14, true, '2013-10-28 03:33:45', '2013-10-28 03:33:45', '11004');
INSERT INTO agency VALUES (4, 'สถาบันสารสนเทศทรัพยากรน้ำและการเกษตร (องค์การมหาชน)', 'HAII', 6, true, '2013-10-28 03:33:45', '2013-10-28 03:33:45', '19012');
INSERT INTO agency VALUES (5, 'กรมอุทกศาสตร์ กองทัพเรือ', 'RTN', 20, true, '2013-10-28 03:33:45', '2013-10-28 03:33:45', '02005');
INSERT INTO agency VALUES (6, 'กรมพัฒนาที่ดิน', 'LDD', 17, true, '2013-10-28 03:33:45', '2013-10-28 03:33:45', '07008');
INSERT INTO agency VALUES (7, 'สำนักระบายน้ำ กรุงเทพมหานคร', 'BMA', 10, true, '2013-10-28 03:33:45', '2013-10-28 03:33:45', '15009');
INSERT INTO agency VALUES (8, 'กรมทรัพยากรธรณี', 'DMR', 15, true, '2013-10-28 03:33:45', '2013-10-28 03:33:45', '09005');
INSERT INTO agency VALUES (9, 'กรมเจ้าท่า', 'MD', 16, true, '2013-10-28 03:33:45', '2013-10-28 03:33:45', '08003');
INSERT INTO agency VALUES (10, 'สำนักงานพัฒนาเทคโนโลยีอวกาศและภูมิสารสนเทศ (องค์การมหาชน)', 'GIST', 6, true, '2013-10-28 03:33:45', '2013-10-28 03:33:45', '19006');
INSERT INTO agency VALUES (11, 'กรมทรัพยากรน้ำ', 'DWR', 15, true, '2013-10-28 03:33:45', '2013-10-28 03:33:45', '09006');
INSERT INTO agency VALUES (12, 'กรมทรัพยากรน้ำบาดาล', 'DGR', 15, true, '2013-10-28 03:33:45', '2013-10-28 03:33:45', '09007');


--
-- Data for Name: agency_data; Type: TABLE DATA; Schema: public; Owner: moac
--

INSERT INTO agency_data VALUES (1, 7, 1);
INSERT INTO agency_data VALUES (2, 7, 3);
INSERT INTO agency_data VALUES (3, 7, 4);
INSERT INTO agency_data VALUES (4, 7, 5);
INSERT INTO agency_data VALUES (17, 2, 5);
INSERT INTO agency_data VALUES (18, 2, 6);
INSERT INTO agency_data VALUES (19, 1, 5);
INSERT INTO agency_data VALUES (20, 1, 6);
INSERT INTO agency_data VALUES (21, 5, 5);
INSERT INTO agency_data VALUES (22, 5, 11);
INSERT INTO agency_data VALUES (32, 4, 1);
INSERT INTO agency_data VALUES (33, 4, 2);
INSERT INTO agency_data VALUES (34, 4, 3);
INSERT INTO agency_data VALUES (35, 4, 4);
INSERT INTO agency_data VALUES (36, 4, 5);
INSERT INTO agency_data VALUES (37, 4, 7);
INSERT INTO agency_data VALUES (38, 4, 9);
INSERT INTO agency_data VALUES (39, 4, 10);
INSERT INTO agency_data VALUES (40, 4, 8);
INSERT INTO agency_data VALUES (41, 11, 1);
INSERT INTO agency_data VALUES (42, 11, 3);
INSERT INTO agency_data VALUES (43, 11, 4);
INSERT INTO agency_data VALUES (44, 11, 5);


--
-- Data for Name: condition; Type: TABLE DATA; Schema: public; Owner: moac
--

INSERT INTO condition VALUES (1, 'ข้อมูลปัจจุบัน', '2013-10-28 03:33:45', '2013-10-28 03:33:45', 'now()::date - 0');
INSERT INTO condition VALUES (2, 'ข้อมูลย้อนหลัง 3 วัน', '2013-10-28 03:33:45', '2013-10-28 03:33:45', 'now()::date - 3');
INSERT INTO condition VALUES (3, 'ข้อมูลย้อนหลัง 7 วัน', '2013-10-28 03:33:45', '2013-10-28 03:33:45', 'now()::date - 7');
INSERT INTO condition VALUES (4, 'ได้รับการยินยอมจากเจ้าหน้าที่คลังข้อมูล', '2013-10-28 03:33:45', '2013-10-28 03:33:45', '');
INSERT INTO condition VALUES (5, 'ได้รับการยินยอมจากหน่วยงานเจ้าของข้อมูล', '2013-10-28 03:33:45', '2013-10-28 03:33:45', '');
INSERT INTO condition VALUES (6, 'ข้อมูลไม่ถูกต้อง', '2013-10-28 03:33:45', '2013-10-28 03:33:45', '');
INSERT INTO condition VALUES (7, 'ข้อมูลปัจจุบัน 100 เรคคอร์ด', '2013-10-28 03:33:45', '2013-10-28 03:33:45', ' limit 100 offset 0');
INSERT INTO condition VALUES (8, 'ข้อมูลปัจจุบัน 200 เรคคอร์ด', '2013-10-28 03:33:45', '2013-10-28 03:33:45', ' limit 200 offset 0');
INSERT INTO condition VALUES (9, 'ข้อมูลปัจจุบัน 20 อันดับสูงสุด', '2013-10-28 03:33:45', '2013-10-28 03:33:45', ' limit 20 offset 0');


--
-- Data for Name: condition_policy; Type: TABLE DATA; Schema: public; Owner: moac
--

INSERT INTO condition_policy VALUES (21, 1, 2);
INSERT INTO condition_policy VALUES (22, 2, 2);
INSERT INTO condition_policy VALUES (23, 3, 2);
INSERT INTO condition_policy VALUES (27, 2, 3);
INSERT INTO condition_policy VALUES (28, 3, 3);
INSERT INTO condition_policy VALUES (29, 1, 4);
INSERT INTO condition_policy VALUES (30, 2, 4);
INSERT INTO condition_policy VALUES (31, 3, 4);
INSERT INTO condition_policy VALUES (32, 1, 5);
INSERT INTO condition_policy VALUES (33, 2, 5);
INSERT INTO condition_policy VALUES (34, 3, 5);
INSERT INTO condition_policy VALUES (45, 1, 6);
INSERT INTO condition_policy VALUES (46, 1, 8);
INSERT INTO condition_policy VALUES (47, 2, 8);
INSERT INTO condition_policy VALUES (48, 3, 8);
INSERT INTO condition_policy VALUES (49, 1, 9);
INSERT INTO condition_policy VALUES (50, 1, 10);
INSERT INTO condition_policy VALUES (51, 2, 10);
INSERT INTO condition_policy VALUES (52, 3, 10);
INSERT INTO condition_policy VALUES (54, 1, 1);
INSERT INTO condition_policy VALUES (55, 2, 1);
INSERT INTO condition_policy VALUES (56, 3, 1);


--
-- Data for Name: data; Type: TABLE DATA; Schema: public; Owner: moac
--

INSERT INTO data VALUES (1, 'ปริมาณน้ำฝนราย 24 ชั่วโมง', '2013-10-28 03:33:45', '2013-10-28 03:33:45', 'rainfall_sumary-rainfall24h-rainfall24h_date');
INSERT INTO data VALUES (2, 'ปริมาณน้ำฝนวันนี้', '2013-10-28 03:33:45', '2013-10-28 03:33:45', 'rainfall_sumary-rainfall_today-rainfall_today_date');
INSERT INTO data VALUES (3, 'ปริมาณน้ำฝนวานนี้', '2013-10-28 03:33:45', '2013-10-28 03:33:45', 'rainfall_sumary-rainfall_yesterday-rainfall_yesterday_date');
INSERT INTO data VALUES (4, 'ปริมาณน้ำฝนย้อนหลัง', '2013-10-28 03:33:45', '2013-10-28 03:33:45', 'rainfall_168h-rainfall1h-rainfall_date');
INSERT INTO data VALUES (5, 'ข้อมูลระดับน้ำ', '2013-10-28 03:33:45', '2013-10-28 03:33:45', 'wl_168h-water_level-wl_tele_date');
INSERT INTO data VALUES (6, 'ข้อมูลน้ำในเขื่อน', '2013-10-28 03:33:45', '2013-10-28 03:33:45', 'damdaily-dam_storage_daily-dam_date');
INSERT INTO data VALUES (7, 'ข้อมูลความเข้มแสง', '2013-10-28 03:33:45', '2013-10-28 03:33:45', 'solar_168h-solar_value-solar_date');
INSERT INTO data VALUES (9, 'ข้อมูลความกดอากาศ', '2013-10-28 03:33:45', '2013-10-28 03:33:45', 'pressure_168h-pressure_value-pressure_date');
INSERT INTO data VALUES (10, 'ข้อมูลอุณหภูมิ', '2013-10-28 03:33:45', '2013-10-28 03:33:45', 'temp_168h-temp_value-temp_date');
INSERT INTO data VALUES (11, 'ข้อมูลระดับน้ำทะเล', '2013-10-28 03:33:45', '2013-10-28 03:33:45', 'wl_168h-water_level-wl_tele_date-telertn0001');
INSERT INTO data VALUES (8, 'ข้อมูลความชื้น', '2013-10-28 03:33:45', '2013-10-28 03:33:45', 'humid_168h-humid_value-humid_date');


--
-- Data for Name: data_policy; Type: TABLE DATA; Schema: public; Owner: moac
--

INSERT INTO data_policy VALUES (22, 6, 2);
INSERT INTO data_policy VALUES (23, 7, 2);
INSERT INTO data_policy VALUES (24, 8, 2);
INSERT INTO data_policy VALUES (25, 9, 2);
INSERT INTO data_policy VALUES (26, 10, 2);
INSERT INTO data_policy VALUES (27, 11, 2);
INSERT INTO data_policy VALUES (31, 1, 3);
INSERT INTO data_policy VALUES (32, 2, 3);
INSERT INTO data_policy VALUES (33, 3, 3);
INSERT INTO data_policy VALUES (34, 4, 3);
INSERT INTO data_policy VALUES (35, 5, 4);
INSERT INTO data_policy VALUES (36, 6, 4);
INSERT INTO data_policy VALUES (37, 7, 4);
INSERT INTO data_policy VALUES (38, 9, 4);
INSERT INTO data_policy VALUES (39, 10, 4);
INSERT INTO data_policy VALUES (40, 11, 4);
INSERT INTO data_policy VALUES (41, 8, 4);
INSERT INTO data_policy VALUES (42, 4, 5);
INSERT INTO data_policy VALUES (43, 5, 5);
INSERT INTO data_policy VALUES (44, 6, 5);
INSERT INTO data_policy VALUES (45, 7, 5);
INSERT INTO data_policy VALUES (46, 9, 5);
INSERT INTO data_policy VALUES (47, 10, 5);
INSERT INTO data_policy VALUES (48, 11, 5);
INSERT INTO data_policy VALUES (49, 8, 5);
INSERT INTO data_policy VALUES (80, 1, 6);
INSERT INTO data_policy VALUES (81, 2, 6);
INSERT INTO data_policy VALUES (82, 3, 6);
INSERT INTO data_policy VALUES (83, 1, 8);
INSERT INTO data_policy VALUES (84, 2, 8);
INSERT INTO data_policy VALUES (85, 3, 8);
INSERT INTO data_policy VALUES (86, 4, 8);
INSERT INTO data_policy VALUES (87, 5, 9);
INSERT INTO data_policy VALUES (88, 6, 9);
INSERT INTO data_policy VALUES (89, 7, 9);
INSERT INTO data_policy VALUES (90, 9, 9);
INSERT INTO data_policy VALUES (91, 10, 9);
INSERT INTO data_policy VALUES (92, 11, 9);
INSERT INTO data_policy VALUES (93, 8, 9);
INSERT INTO data_policy VALUES (94, 1, 10);
INSERT INTO data_policy VALUES (95, 2, 10);
INSERT INTO data_policy VALUES (96, 3, 10);
INSERT INTO data_policy VALUES (97, 4, 10);
INSERT INTO data_policy VALUES (98, 5, 10);
INSERT INTO data_policy VALUES (99, 6, 10);
INSERT INTO data_policy VALUES (100, 7, 10);
INSERT INTO data_policy VALUES (101, 9, 10);
INSERT INTO data_policy VALUES (102, 10, 10);
INSERT INTO data_policy VALUES (103, 11, 10);
INSERT INTO data_policy VALUES (104, 8, 10);
INSERT INTO data_policy VALUES (106, 1, 1);
INSERT INTO data_policy VALUES (107, 2, 1);


--
-- Data for Name: data_privacy; Type: TABLE DATA; Schema: public; Owner: moac
--

INSERT INTO data_privacy VALUES (239, 1, 4, true);
INSERT INTO data_privacy VALUES (240, 2, 4, true);
INSERT INTO data_privacy VALUES (241, 3, 4, true);
INSERT INTO data_privacy VALUES (242, 4, 4, true);
INSERT INTO data_privacy VALUES (243, 5, 4, true);
INSERT INTO data_privacy VALUES (244, 7, 4, false);
INSERT INTO data_privacy VALUES (245, 9, 4, false);
INSERT INTO data_privacy VALUES (246, 10, 4, false);
INSERT INTO data_privacy VALUES (247, 8, 4, true);
INSERT INTO data_privacy VALUES (248, 1, 11, true);
INSERT INTO data_privacy VALUES (249, 3, 11, true);
INSERT INTO data_privacy VALUES (250, 4, 11, false);
INSERT INTO data_privacy VALUES (251, 5, 11, false);
INSERT INTO data_privacy VALUES (252, 5, 2, false);
INSERT INTO data_privacy VALUES (253, 6, 2, true);
INSERT INTO data_privacy VALUES (254, 5, 1, true);
INSERT INTO data_privacy VALUES (255, 6, 1, false);
INSERT INTO data_privacy VALUES (260, 5, 5, true);
INSERT INTO data_privacy VALUES (261, 11, 5, true);
INSERT INTO data_privacy VALUES (226, 1, 7, true);
INSERT INTO data_privacy VALUES (227, 3, 7, false);
INSERT INTO data_privacy VALUES (228, 4, 7, true);
INSERT INTO data_privacy VALUES (229, 5, 7, false);


--
-- Data for Name: department; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO department VALUES (12, 15, 'กรมควบคุมมลพิษ', '', '', '09003', true, '2013-05-15 13:44:45.878349+07', NULL, '2013-05-15 13:44:45.878349+07', NULL);
INSERT INTO department VALUES (29, 26, 'การไฟฟ้าฝ่ายผลิตแห่งประเทศไทย', '', '', '50504', true, '2013-05-15 13:44:45.878349+07', NULL, '2013-05-15 13:44:45.878349+07', NULL);
INSERT INTO department VALUES (3, 26, 'การรถไฟแห่งประเทศไทย', '', '', '50312', true, '2013-05-15 13:44:45.878349+07', NULL, '2013-05-15 13:44:45.878349+07', NULL);
INSERT INTO department VALUES (30, 1, 'สำนักงานปลัดสำนักนายกรัฐมนตรี', '', '', '01001', true, '2013-05-15 13:44:45.878349+07', NULL, '2013-05-15 13:44:45.878349+07', NULL);
INSERT INTO department VALUES (4, 20, 'กองทัพอากาศ', '', '', '02006', true, '2013-05-15 13:44:45.878349+07', NULL, '2013-05-15 13:44:45.878349+07', NULL);
INSERT INTO department VALUES (5, 3, 'กรมโรงงานอุตสาหกรรม', '', '', '22003', true, '2013-05-15 13:44:45.878349+07', NULL, '2013-05-15 13:44:45.878349+07', NULL);
INSERT INTO department VALUES (7, 15, 'กรมป่าไม้', '', '', '09012', true, '2013-05-15 13:44:45.878349+07', NULL, '2013-05-15 13:44:45.878349+07', NULL);
INSERT INTO department VALUES (8, 16, 'กรมทางหลวง', '', '', '08006', true, '2013-05-15 13:44:45.878349+07', NULL, '2013-05-15 13:44:45.878349+07', NULL);
INSERT INTO department VALUES (9, 16, 'กรมเจ้าท่า', '', '', '08003', true, '2013-05-15 13:44:45.878349+07', NULL, '2013-05-15 13:44:45.878349+07', NULL);
INSERT INTO department VALUES (11, 15, 'กรมทรัพยากรทางทะเลและชายฝั่ง', '', '', '09004', true, '2013-05-15 13:44:45.878349+07', NULL, '2013-05-15 13:44:45.878349+07', NULL);
INSERT INTO department VALUES (14, 10, 'กรมโยธาธิการและผังเมือง', '', '', '15007', true, '2013-05-15 13:44:45.878349+07', NULL, '2013-05-15 13:44:45.878349+07', NULL);
INSERT INTO department VALUES (15, 10, 'กรมป้องกันและบรรเทาสาธารณภัย', '', '', '15006', true, '2013-05-15 13:44:45.878349+07', NULL, '2013-05-15 13:44:45.878349+07', NULL);
INSERT INTO department VALUES (16, 10, 'กรมการปกครอง', '', '', '15003', true, '2013-05-15 13:44:45.878349+07', NULL, '2013-05-15 13:44:45.878349+07', NULL);
INSERT INTO department VALUES (32, 1, 'สำนักงานคณะกรรมการการคุ้มครองผู้บริโภค', '', '', '01003', true, '2013-05-15 13:44:45.878349+07', NULL, '2013-05-15 13:44:45.878349+07', NULL);
INSERT INTO department VALUES (18, 14, 'กรมอุตุนิยมวิทยา', '', '', '11004', true, '2013-05-15 13:44:45.878349+07', NULL, '2013-05-15 13:44:45.878349+07', NULL);
INSERT INTO department VALUES (20, 6, 'สถาบันสารสนเทศทรัพยากรน้ำและการเกษตร (องค์การมหาชน)', '', '', '19012', true, '2013-05-15 13:44:45.878349+07', NULL, '2013-05-15 13:44:45.878349+07', NULL);
INSERT INTO department VALUES (21, 6, 'สำนักงานพัฒนาเทคโนโลยีอวกาศและภูมิสารสนเทศ (องค์การมหาชน)', '', '', '19006', true, '2013-05-15 13:44:45.878349+07', NULL, '2013-05-15 13:44:45.878349+07', NULL);
INSERT INTO department VALUES (22, 15, 'กรมทรัพยากรธรณี', '', '', '09005', true, '2013-05-15 13:44:45.878349+07', NULL, '2013-05-15 13:44:45.878349+07', NULL);
INSERT INTO department VALUES (23, 15, 'กรมทรัพยากรน้ำ', '', '', '09006', true, '2013-05-15 13:44:45.878349+07', NULL, '2013-05-15 13:44:45.878349+07', NULL);
INSERT INTO department VALUES (24, 15, 'กรมทรัพยากรน้ำบาดาล', '', '', '09007', true, '2013-05-15 13:44:45.878349+07', NULL, '2013-05-15 13:44:45.878349+07', NULL);
INSERT INTO department VALUES (25, 16, 'กรมทางหลวงชนบท', '', '', '08007', true, '2013-05-15 13:44:45.878349+07', NULL, '2013-05-15 13:44:45.878349+07', NULL);
INSERT INTO department VALUES (26, 17, 'กรมพัฒนาที่ดิน', '', '', '07008', true, '2013-05-15 13:44:45.878349+07', NULL, '2013-05-15 13:44:45.878349+07', NULL);
INSERT INTO department VALUES (27, 17, 'กรมชลประทาน', '', '', '07003', true, '2013-05-15 13:44:45.878349+07', NULL, '2013-05-15 13:44:45.878349+07', NULL);
INSERT INTO department VALUES (33, 1, 'สำนักเลขาธิการนายกรัฐมนตรี', '', '', '01004', true, '2013-05-15 13:44:45.878349+07', NULL, '2013-05-15 13:44:45.878349+07', NULL);
INSERT INTO department VALUES (17, 10, 'กรมส่งเสริมการปกครองท้องถิ่น', '', '', '15008', true, '2013-05-15 13:44:45.878349+07', NULL, '2013-05-15 13:44:45.878349+07', NULL);
INSERT INTO department VALUES (2, 18, 'สำนักงานพัฒนาการท่องเที่ยว', '', '', '05004', true, '2013-05-15 13:44:45.878349+07', NULL, '2013-05-15 13:44:45.878349+07', NULL);
INSERT INTO department VALUES (28, 20, 'กองทัพเรือ', '', '', '02005', true, '2013-05-15 13:44:45.878349+07', NULL, '2013-05-15 13:44:45.878349+07', NULL);
INSERT INTO department VALUES (34, 1, 'สำนักเลขาธิการคณะรัฐมนตรี', '', '', '01005', true, '2013-05-15 13:44:45.878349+07', NULL, '2013-05-15 13:44:45.878349+07', NULL);
INSERT INTO department VALUES (35, 1, 'สำนักข่าวกรองแห่งชาติ', '', '', '01006', true, '2013-05-15 13:44:45.878349+07', NULL, '2013-05-15 13:44:45.878349+07', NULL);
INSERT INTO department VALUES (36, 1, 'สำนักงบประมาณ', '', '', '01007', true, '2013-05-15 13:44:45.878349+07', NULL, '2013-05-15 13:44:45.878349+07', NULL);
INSERT INTO department VALUES (37, 1, 'สำนักงานสภาความมั่นคงแห่งชาติ', '', '', '01008', true, '2013-05-15 13:44:45.878349+07', NULL, '2013-05-15 13:44:45.878349+07', NULL);
INSERT INTO department VALUES (38, 1, 'สำนักงานคณะกรรมการกฤษฎีกา', '', '', '01009', true, '2013-05-15 13:44:45.878349+07', NULL, '2013-05-15 13:44:45.878349+07', NULL);
INSERT INTO department VALUES (39, 1, 'สำนักงานคณะกรรมการข้าราชการพลเรือน', '', '', '01011', true, '2013-05-15 13:44:45.878349+07', NULL, '2013-05-15 13:44:45.878349+07', NULL);
INSERT INTO department VALUES (40, 1, 'สำนักงานคณะกรรมการพัฒนาการเศรษฐกิจและสังคมแห่งชาติ', '', '', '01012', true, '2013-05-15 13:44:45.878349+07', NULL, '2013-05-15 13:44:45.878349+07', NULL);
INSERT INTO department VALUES (41, 1, 'สำนักงานกองทุนสนับสนุนการวิจัย', '', '', '01014', true, '2013-05-15 13:44:45.878349+07', NULL, '2013-05-15 13:44:45.878349+07', NULL);
INSERT INTO department VALUES (42, 1, 'สำนักงานรับรองมาตรฐานและประเมินคุณภาพการศึกษา (องค์การมหาชน)', '', '', '01016', true, '2013-05-15 13:44:45.878349+07', NULL, '2013-05-15 13:44:45.878349+07', NULL);
INSERT INTO department VALUES (43, 1, 'กองอำนวยการรักษาความมั่นคงภายในราชอาณาจักร', '', '', '01019', true, '2013-05-15 13:44:45.878349+07', NULL, '2013-05-15 13:44:45.878349+07', NULL);
INSERT INTO department VALUES (44, 1, 'สำนักงานคณะกรรมการพัฒนาระบบราชการ', '', '', '01021', true, '2013-05-15 13:44:45.878349+07', NULL, '2013-05-15 13:44:45.878349+07', NULL);
INSERT INTO department VALUES (45, 1, 'องค์การบริหารการพัฒนาพื้นที่พิเศษเพื่อการท่องเที่ยวอย่างยั่งยืน (องค์การมหาชน)', '', '', '01023', true, '2013-05-15 13:44:45.878349+07', NULL, '2013-05-15 13:44:45.878349+07', NULL);
INSERT INTO department VALUES (46, 1, 'สำนักงานส่งเสริมการจัดประชุมและนิทรรศการ (องค์การมหาชน)', '', '', '01024', true, '2013-05-15 13:44:45.878349+07', NULL, '2013-05-15 13:44:45.878349+07', NULL);
INSERT INTO department VALUES (47, 1, 'สำนักงานบริหารและพัฒนาองค์ความรู้ (องค์การมหาชน)', '', '', '01025', true, '2013-05-15 13:44:45.878349+07', NULL, '2013-05-15 13:44:45.878349+07', NULL);
INSERT INTO department VALUES (48, 3, 'สำนักงานปลัดกระทรวงอุตสาหกรรม', '', '', '22002', true, '2013-05-15 13:44:45.878349+07', NULL, '2013-05-15 13:44:45.878349+07', NULL);
INSERT INTO department VALUES (49, 3, 'กรมส่งเสริมอุตสาหกรรม', '', '', '22004', true, '2013-05-15 13:44:45.878349+07', NULL, '2013-05-15 13:44:45.878349+07', NULL);
INSERT INTO department VALUES (50, 3, 'กรมอุตสาหกรรมพื้นฐานและการเหมืองแร่', '', '', '22005', true, '2013-05-15 13:44:45.878349+07', NULL, '2013-05-15 13:44:45.878349+07', NULL);
INSERT INTO department VALUES (51, 3, 'สำนักงานคณะกรรมการอ้อยและน้ำตาลทราย', '', '', '22006', true, '2013-05-15 13:44:45.878349+07', NULL, '2013-05-15 13:44:45.878349+07', NULL);
INSERT INTO department VALUES (52, 3, 'สำนักงานมาตรฐานผลิตภัณฑ์อุตสาหกรรม', '', '', '22007', true, '2013-05-15 13:44:45.878349+07', NULL, '2013-05-15 13:44:45.878349+07', NULL);
INSERT INTO department VALUES (53, 3, 'สำนักงานเศรษฐกิจอุตสาหกรรม ', '', '', '22008', true, '2013-05-15 13:44:45.878349+07', NULL, '2013-05-15 13:44:45.878349+07', NULL);
INSERT INTO department VALUES (54, 3, 'สำนักงานคณะกรรมการส่งเสริมการลงทุน', '', '', '22009', true, '2013-05-15 13:44:45.878349+07', NULL, '2013-05-15 13:44:45.878349+07', NULL);
INSERT INTO department VALUES (55, 4, 'สำนักงานปลัดกระทรวงสาธารณสุข', '', '', '21002', true, '2013-05-15 13:44:45.878349+07', NULL, '2013-05-15 13:44:45.878349+07', NULL);
INSERT INTO department VALUES (56, 4, 'กรมการแพทย์', '', '', '21003', true, '2013-05-15 13:44:45.878349+07', NULL, '2013-05-15 13:44:45.878349+07', NULL);
INSERT INTO department VALUES (57, 4, 'กรมควบคุมโรค', '', '', '21004', true, '2013-05-15 13:44:45.878349+07', NULL, '2013-05-15 13:44:45.878349+07', NULL);
INSERT INTO department VALUES (261, 20, 'กองทัพบก', '', '', '02004', true, '2013-05-15 13:44:45.878349+07', NULL, '2013-05-15 13:44:45.878349+07', NULL);
INSERT INTO department VALUES (111, 5, 'มหาวิทยาลัยราชภัฏมหาสารคาม', '', '', '20147', true, '2013-05-15 13:44:45.878349+07', NULL, '2013-05-15 13:44:45.878349+07', NULL);
INSERT INTO department VALUES (58, 4, 'กรมพัฒนาการแพทย์แผนไทยและการแพทย์ทางเลือก', '', '', '21005', true, '2013-05-15 13:44:45.878349+07', NULL, '2013-05-15 13:44:45.878349+07', NULL);
INSERT INTO department VALUES (59, 4, 'กรมวิทยาศาสตร์การแพทย์', '', '', '21006', true, '2013-05-15 13:44:45.878349+07', NULL, '2013-05-15 13:44:45.878349+07', NULL);
INSERT INTO department VALUES (60, 4, 'กรมสนับสนุนบริการสุขภาพ', '', '', '21007', true, '2013-05-15 13:44:45.878349+07', NULL, '2013-05-15 13:44:45.878349+07', NULL);
INSERT INTO department VALUES (61, 4, 'กรมสุขภาพจิต', '', '', '21008', true, '2013-05-15 13:44:45.878349+07', NULL, '2013-05-15 13:44:45.878349+07', NULL);
INSERT INTO department VALUES (62, 4, 'กรมอนามัย', '', '', '21009', true, '2013-05-15 13:44:45.878349+07', NULL, '2013-05-15 13:44:45.878349+07', NULL);
INSERT INTO department VALUES (63, 4, 'สำนักงานคณะกรรมการอาหารและยา', '', '', '21010', true, '2013-05-15 13:44:45.878349+07', NULL, '2013-05-15 13:44:45.878349+07', NULL);
INSERT INTO department VALUES (64, 4, 'สถาบันวิจัยระบบสาธารณสุข', '', '', '21011', true, '2013-05-15 13:44:45.878349+07', NULL, '2013-05-15 13:44:45.878349+07', NULL);
INSERT INTO department VALUES (65, 4, 'โรงพยาบาลบ้านแพ้ว (องค์การมหาชน)', '', '', '21012', true, '2013-05-15 13:44:45.878349+07', NULL, '2013-05-15 13:44:45.878349+07', NULL);
INSERT INTO department VALUES (66, 4, 'สำนักงานหลักประกันสุขภาพแห่งชาติ', '', '', '21013', true, '2013-05-15 13:44:45.878349+07', NULL, '2013-05-15 13:44:45.878349+07', NULL);
INSERT INTO department VALUES (67, 4, 'สถาบันการแพทย์ฉุกเฉินแห่งชาติ', '', '', '21014', true, '2013-05-15 13:44:45.878349+07', NULL, '2013-05-15 13:44:45.878349+07', NULL);
INSERT INTO department VALUES (68, 4, 'สถาบันรับรองคุณภาพสถานพยาบาล (องค์การมหาชน)', '', '', '21015', true, '2013-05-15 13:44:45.878349+07', NULL, '2013-05-15 13:44:45.878349+07', NULL);
INSERT INTO department VALUES (69, 5, 'สำนักงานปลัดกระทรวงศึกษาธิการ', '', '', '20002', true, '2013-05-15 13:44:45.878349+07', NULL, '2013-05-15 13:44:45.878349+07', NULL);
INSERT INTO department VALUES (70, 5, 'สำนักงานเลขาธิการสภาการศึกษา', '', '', '20003', true, '2013-05-15 13:44:45.878349+07', NULL, '2013-05-15 13:44:45.878349+07', NULL);
INSERT INTO department VALUES (71, 5, 'สำนักงานคณะกรรมการการศึกษาขั้นพื้นฐาน', '', '', '20004', true, '2013-05-15 13:44:45.878349+07', NULL, '2013-05-15 13:44:45.878349+07', NULL);
INSERT INTO department VALUES (72, 5, 'สำนักงานคณะกรรมการการอุดมศึกษา', '', '', '20005', true, '2013-05-15 13:44:45.878349+07', NULL, '2013-05-15 13:44:45.878349+07', NULL);
INSERT INTO department VALUES (73, 5, 'สำนักงานคณะกรรมการการอาชีวศึกษา', '', '', '20006', true, '2013-05-15 13:44:45.878349+07', NULL, '2013-05-15 13:44:45.878349+07', NULL);
INSERT INTO department VALUES (74, 5, 'มหาวิทยาลัยเกษตรศาสตร์', '', '', '20102', true, '2013-05-15 13:44:45.878349+07', NULL, '2013-05-15 13:44:45.878349+07', NULL);
INSERT INTO department VALUES (75, 5, 'มหาวิทยาลัยขอนแก่น', '', '', '20103', true, '2013-05-15 13:44:45.878349+07', NULL, '2013-05-15 13:44:45.878349+07', NULL);
INSERT INTO department VALUES (76, 5, 'มหาวิทยาลัยธรรมศาสตร์', '', '', '20106', true, '2013-05-15 13:44:45.878349+07', NULL, '2013-05-15 13:44:45.878349+07', NULL);
INSERT INTO department VALUES (77, 5, 'มหาวิทยาลัยนเรศวร', '', '', '20107', true, '2013-05-15 13:44:45.878349+07', NULL, '2013-05-15 13:44:45.878349+07', NULL);
INSERT INTO department VALUES (78, 5, 'มหาวิทยาลัยมหาสารคาม', '', '', '20109', true, '2013-05-15 13:44:45.878349+07', NULL, '2013-05-15 13:44:45.878349+07', NULL);
INSERT INTO department VALUES (79, 5, 'มหาวิทยาลัยแม่โจ้', '', '', '20111', true, '2013-05-15 13:44:45.878349+07', NULL, '2013-05-15 13:44:45.878349+07', NULL);
INSERT INTO department VALUES (80, 5, 'มหาวิทยาลัยรามคำแหง', '', '', '20112', true, '2013-05-15 13:44:45.878349+07', NULL, '2013-05-15 13:44:45.878349+07', NULL);
INSERT INTO department VALUES (81, 5, 'มหาวิทยาลัยศรีนครินทรวิโรฒ', '', '', '20113', true, '2013-05-15 13:44:45.878349+07', NULL, '2013-05-15 13:44:45.878349+07', NULL);
INSERT INTO department VALUES (82, 5, 'มหาวิทยาลัยศิลปากร', '', '', '20114', true, '2013-05-15 13:44:45.878349+07', NULL, '2013-05-15 13:44:45.878349+07', NULL);
INSERT INTO department VALUES (83, 5, 'มหาวิทยาลัยสงขลานครินทร์', '', '', '20115', true, '2013-05-15 13:44:45.878349+07', NULL, '2013-05-15 13:44:45.878349+07', NULL);
INSERT INTO department VALUES (84, 5, 'มหาวิทยาลัยสุโขทัยธรรมาธิราช', '', '', '20116', true, '2013-05-15 13:44:45.878349+07', NULL, '2013-05-15 13:44:45.878349+07', NULL);
INSERT INTO department VALUES (85, 5, 'มหาวิทยาลัยอุบลราชธานี', '', '', '20117', true, '2013-05-15 13:44:45.878349+07', NULL, '2013-05-15 13:44:45.878349+07', NULL);
INSERT INTO department VALUES (86, 5, 'สถาบันบัณฑิตพัฒนบริหารศาสตร์', '', '', '20120', true, '2013-05-15 13:44:45.878349+07', NULL, '2013-05-15 13:44:45.878349+07', NULL);
INSERT INTO department VALUES (87, 5, 'มหาวิทยาลัยมหาจุฬาลงกรณราชวิทยาลัย', '', '', '20122', true, '2013-05-15 13:44:45.878349+07', NULL, '2013-05-15 13:44:45.878349+07', NULL);
INSERT INTO department VALUES (88, 5, 'มหาวิทยาลัยมหามกุฎราชวิทยาลัย', '', '', '20123', true, '2013-05-15 13:44:45.878349+07', NULL, '2013-05-15 13:44:45.878349+07', NULL);
INSERT INTO department VALUES (89, 5, 'มหาวิทยาลัยราชภัฏกาญจนบุรี', '', '', '20124', true, '2013-05-15 13:44:45.878349+07', NULL, '2013-05-15 13:44:45.878349+07', NULL);
INSERT INTO department VALUES (90, 5, 'มหาวิทยาลัยราชภัฏกาฬสินธุ์', '', '', '20125', true, '2013-05-15 13:44:45.878349+07', NULL, '2013-05-15 13:44:45.878349+07', NULL);
INSERT INTO department VALUES (91, 5, 'มหาวิทยาลัยราชภัฏกำแพงเพชร', '', '', '20126', true, '2013-05-15 13:44:45.878349+07', NULL, '2013-05-15 13:44:45.878349+07', NULL);
INSERT INTO department VALUES (92, 5, 'มหาวิทยาลัยราชภัฏจันทรเกษม', '', '', '20127', true, '2013-05-15 13:44:45.878349+07', NULL, '2013-05-15 13:44:45.878349+07', NULL);
INSERT INTO department VALUES (93, 5, 'มหาวิทยาลัยราชภัฏชัยภูมิ', '', '', '20128', true, '2013-05-15 13:44:45.878349+07', NULL, '2013-05-15 13:44:45.878349+07', NULL);
INSERT INTO department VALUES (94, 5, 'มหาวิทยาลัยราชภัฏเชียงราย', '', '', '20129', true, '2013-05-15 13:44:45.878349+07', NULL, '2013-05-15 13:44:45.878349+07', NULL);
INSERT INTO department VALUES (95, 5, 'มหาวิทยาลัยราชภัฏเชียงใหม่', '', '', '20130', true, '2013-05-15 13:44:45.878349+07', NULL, '2013-05-15 13:44:45.878349+07', NULL);
INSERT INTO department VALUES (96, 5, 'มหาวิทยาลัยราชภัฏเทพสตรี', '', '', '20131', true, '2013-05-15 13:44:45.878349+07', NULL, '2013-05-15 13:44:45.878349+07', NULL);
INSERT INTO department VALUES (97, 5, 'มหาวิทยาลัยราชภัฏธนบุรี', '', '', '20132', true, '2013-05-15 13:44:45.878349+07', NULL, '2013-05-15 13:44:45.878349+07', NULL);
INSERT INTO department VALUES (98, 5, 'มหาวิทยาลัยราชภัฏนครปฐม', '', '', '20133', true, '2013-05-15 13:44:45.878349+07', NULL, '2013-05-15 13:44:45.878349+07', NULL);
INSERT INTO department VALUES (99, 5, 'มหาวิทยาลัยราชภัฏนครราชสีมา', '', '', '20135', true, '2013-05-15 13:44:45.878349+07', NULL, '2013-05-15 13:44:45.878349+07', NULL);
INSERT INTO department VALUES (100, 5, 'มหาวิทยาลัยราชภัฏนครศรีธรรมราช', '', '', '20136', true, '2013-05-15 13:44:45.878349+07', NULL, '2013-05-15 13:44:45.878349+07', NULL);
INSERT INTO department VALUES (101, 5, 'มหาวิทยาลัยราชภัฏนครสวรรค์', '', '', '20137', true, '2013-05-15 13:44:45.878349+07', NULL, '2013-05-15 13:44:45.878349+07', NULL);
INSERT INTO department VALUES (102, 5, 'มหาวิทยาลัยราชภัฏบ้านสมเด็จเจ้าพระยา', '', '', '20138', true, '2013-05-15 13:44:45.878349+07', NULL, '2013-05-15 13:44:45.878349+07', NULL);
INSERT INTO department VALUES (103, 5, 'มหาวิทยาลัยราชภัฏบุรีรัมย์', '', '', '20139', true, '2013-05-15 13:44:45.878349+07', NULL, '2013-05-15 13:44:45.878349+07', NULL);
INSERT INTO department VALUES (104, 5, 'มหาวิทยาลัยราชภัฏพระนคร', '', '', '20140', true, '2013-05-15 13:44:45.878349+07', NULL, '2013-05-15 13:44:45.878349+07', NULL);
INSERT INTO department VALUES (105, 5, 'มหาวิทยาลัยราชภัฏพระนครศรีอยุธยา', '', '', '20141', true, '2013-05-15 13:44:45.878349+07', NULL, '2013-05-15 13:44:45.878349+07', NULL);
INSERT INTO department VALUES (106, 5, 'มหาวิทยาลัยราชภัฏพิบูลสงคราม', '', '', '20142', true, '2013-05-15 13:44:45.878349+07', NULL, '2013-05-15 13:44:45.878349+07', NULL);
INSERT INTO department VALUES (107, 5, 'มหาวิทยาลัยราชภัฏเพชรบุรี', '', '', '20143', true, '2013-05-15 13:44:45.878349+07', NULL, '2013-05-15 13:44:45.878349+07', NULL);
INSERT INTO department VALUES (108, 5, 'มหาวิทยาลัยราชภัฏวไลยอลงกรณ์ในพระบรมราชูปถัมภ์ จังหวัดปทุมธานี', '', '', '20144', true, '2013-05-15 13:44:45.878349+07', NULL, '2013-05-15 13:44:45.878349+07', NULL);
INSERT INTO department VALUES (109, 5, 'มหาวิทยาลัยราชภัฏเพชรบูรณ์', '', '', '20145', true, '2013-05-15 13:44:45.878349+07', NULL, '2013-05-15 13:44:45.878349+07', NULL);
INSERT INTO department VALUES (110, 5, 'มหาวิทยาลัยราชภัฏภูเก็ต', '', '', '20146', true, '2013-05-15 13:44:45.878349+07', NULL, '2013-05-15 13:44:45.878349+07', NULL);
INSERT INTO department VALUES (112, 5, 'มหาวิทยาลัยราชภัฏยะลา', '', '', '20148', true, '2013-05-15 13:44:45.878349+07', NULL, '2013-05-15 13:44:45.878349+07', NULL);
INSERT INTO department VALUES (113, 5, 'มหาวิทยาลัยราชภัฏราชนครินทร์', '', '', '20149', true, '2013-05-15 13:44:45.878349+07', NULL, '2013-05-15 13:44:45.878349+07', NULL);
INSERT INTO department VALUES (114, 5, 'มหาวิทยาลัยราชภัฏร้อยเอ็ด', '', '', '20150', true, '2013-05-15 13:44:45.878349+07', NULL, '2013-05-15 13:44:45.878349+07', NULL);
INSERT INTO department VALUES (115, 5, 'มหาวิทยาลัยราชภัฏรำไพพรรณี', '', '', '20151', true, '2013-05-15 13:44:45.878349+07', NULL, '2013-05-15 13:44:45.878349+07', NULL);
INSERT INTO department VALUES (116, 5, 'มหาวิทยาลัยราชภัฏเลย', '', '', '20152', true, '2013-05-15 13:44:45.878349+07', NULL, '2013-05-15 13:44:45.878349+07', NULL);
INSERT INTO department VALUES (117, 5, 'มหาวิทยาลัยราชภัฏลำปาง', '', '', '20153', true, '2013-05-15 13:44:45.878349+07', NULL, '2013-05-15 13:44:45.878349+07', NULL);
INSERT INTO department VALUES (118, 5, 'มหาวิทยาลัยราชภัฏศรีสะเกษ', '', '', '20154', true, '2013-05-15 13:44:45.878349+07', NULL, '2013-05-15 13:44:45.878349+07', NULL);
INSERT INTO department VALUES (119, 5, 'มหาวิทยาลัยราชภัฏสกลนคร', '', '', '20155', true, '2013-05-15 13:44:45.878349+07', NULL, '2013-05-15 13:44:45.878349+07', NULL);
INSERT INTO department VALUES (120, 5, 'มหาวิทยาลัยราชภัฏสงขลา', '', '', '20156', true, '2013-05-15 13:44:45.878349+07', NULL, '2013-05-15 13:44:45.878349+07', NULL);
INSERT INTO department VALUES (121, 5, 'มหาวิทยาลัยราชภัฏสวนดุสิต', '', '', '20157', true, '2013-05-15 13:44:45.878349+07', NULL, '2013-05-15 13:44:45.878349+07', NULL);
INSERT INTO department VALUES (122, 5, 'มหาวิทยาลัยราชภัฏสวนสุนันทา', '', '', '20158', true, '2013-05-15 13:44:45.878349+07', NULL, '2013-05-15 13:44:45.878349+07', NULL);
INSERT INTO department VALUES (123, 5, 'มหาวิทยาลัยราชภัฏสุราษฎร์ธานี', '', '', '20159', true, '2013-05-15 13:44:45.878349+07', NULL, '2013-05-15 13:44:45.878349+07', NULL);
INSERT INTO department VALUES (124, 5, 'มหาวิทยาลัยราชภัฏสุรินทร์', '', '', '20160', true, '2013-05-15 13:44:45.878349+07', NULL, '2013-05-15 13:44:45.878349+07', NULL);
INSERT INTO department VALUES (125, 5, 'มหาวิทยาลัยราชภัฏหมู่บ้านจอมบึง', '', '', '20161', true, '2013-05-15 13:44:45.878349+07', NULL, '2013-05-15 13:44:45.878349+07', NULL);
INSERT INTO department VALUES (126, 5, 'มหาวิทยาลัยราชภัฏอุดรธานี', '', '', '20162', true, '2013-05-15 13:44:45.878349+07', NULL, '2013-05-15 13:44:45.878349+07', NULL);
INSERT INTO department VALUES (127, 5, 'มหาวิทยาลัยราชภัฏอุตรดิตถ์', '', '', '20163', true, '2013-05-15 13:44:45.878349+07', NULL, '2013-05-15 13:44:45.878349+07', NULL);
INSERT INTO department VALUES (128, 5, 'มหาวิทยาลัยราชภัฏอุบลราชธานี', '', '', '20164', true, '2013-05-15 13:44:45.878349+07', NULL, '2013-05-15 13:44:45.878349+07', NULL);
INSERT INTO department VALUES (129, 5, 'มหาวิทยาลัยเทคโนโลยีราชมงคลธัญบุรี', '', '', '20165', true, '2013-05-15 13:44:45.878349+07', NULL, '2013-05-15 13:44:45.878349+07', NULL);
INSERT INTO department VALUES (130, 5, 'มหาวิทยาลัยเทคโนโลยีราชมงคลกรุงเทพ', '', '', '20166', true, '2013-05-15 13:44:45.878349+07', NULL, '2013-05-15 13:44:45.878349+07', NULL);
INSERT INTO department VALUES (131, 5, 'มหาวิทยาลัยเทคโนโลยีราชมงคลตะวันออก', '', '', '20167', true, '2013-05-15 13:44:45.878349+07', NULL, '2013-05-15 13:44:45.878349+07', NULL);
INSERT INTO department VALUES (132, 5, 'มหาวิทยาลัยเทคโนโลยีราชมงคลพระนคร', '', '', '20168', true, '2013-05-15 13:44:45.878349+07', NULL, '2013-05-15 13:44:45.878349+07', NULL);
INSERT INTO department VALUES (133, 5, 'มหาวิทยาลัยเทคโนโลยีราชมงคลรัตนโกสินทร์', '', '', '20169', true, '2013-05-15 13:44:45.878349+07', NULL, '2013-05-15 13:44:45.878349+07', NULL);
INSERT INTO department VALUES (134, 5, 'มหาวิทยาลัยเทคโนโลยีราชมงคลล้านนา', '', '', '20170', true, '2013-05-15 13:44:45.878349+07', NULL, '2013-05-15 13:44:45.878349+07', NULL);
INSERT INTO department VALUES (135, 5, 'มหาวิทยาลัยเทคโนโลยีราชมงคลศรีวิชัย', '', '', '20171', true, '2013-05-15 13:44:45.878349+07', NULL, '2013-05-15 13:44:45.878349+07', NULL);
INSERT INTO department VALUES (136, 5, 'มหาวิทยาลัยเทคโนโลยีราชมงคลสุวรรณภูมิ', '', '', '20172', true, '2013-05-15 13:44:45.878349+07', NULL, '2013-05-15 13:44:45.878349+07', NULL);
INSERT INTO department VALUES (137, 5, 'มหาวิทยาลัยเทคโนโลยีราชมงคลอีสาน', '', '', '20173', true, '2013-05-15 13:44:45.878349+07', NULL, '2013-05-15 13:44:45.878349+07', NULL);
INSERT INTO department VALUES (138, 5, 'สถาบันเทคโนโลยีปทุมวัน', '', '', '20174', true, '2013-05-15 13:44:45.878349+07', NULL, '2013-05-15 13:44:45.878349+07', NULL);
INSERT INTO department VALUES (139, 5, 'มหาวิทยาลัยนราธิวาสราชนครินทร์', '', '', '20175', true, '2013-05-15 13:44:45.878349+07', NULL, '2013-05-15 13:44:45.878349+07', NULL);
INSERT INTO department VALUES (140, 5, 'มหาวิทยาลัยนครพนม', '', '', '20176', true, '2013-05-15 13:44:45.878349+07', NULL, '2013-05-15 13:44:45.878349+07', NULL);
INSERT INTO department VALUES (141, 5, 'สถาบันส่งเสริมการสอนวิทยาศาสตร์และเทคโนโลยี', '', '', '20301', true, '2013-05-15 13:44:45.878349+07', NULL, '2013-05-15 13:44:45.878349+07', NULL);
INSERT INTO department VALUES (142, 5, 'โรงเรียนมหิดลวิทยานุสรณ์ ', '', '', '20302', true, '2013-05-15 13:44:45.878349+07', NULL, '2013-05-15 13:44:45.878349+07', NULL);
INSERT INTO department VALUES (143, 5, 'มหาวิทยาลัยเทคโนโลยีสุรนารี', '', '', '20304', true, '2013-05-15 13:44:45.878349+07', NULL, '2013-05-15 13:44:45.878349+07', NULL);
INSERT INTO department VALUES (144, 5, 'มหาวิทยาลัยวลัยลักษณ์', '', '', '20305', true, '2013-05-15 13:44:45.878349+07', NULL, '2013-05-15 13:44:45.878349+07', NULL);
INSERT INTO department VALUES (145, 5, 'มหาวิทยาลัยเทคโนโลยีพระจอมเกล้าธนบุรี', '', '', '20306', true, '2013-05-15 13:44:45.878349+07', NULL, '2013-05-15 13:44:45.878349+07', NULL);
INSERT INTO department VALUES (146, 5, 'มหาวิทยาลัยแม่ฟ้าหลวง', '', '', '20307', true, '2013-05-15 13:44:45.878349+07', NULL, '2013-05-15 13:44:45.878349+07', NULL);
INSERT INTO department VALUES (147, 5, 'สถาบันระหว่างประเทศเพื่อการค้าและการพัฒนา (องค์การมหาชน) ', '', '', '20308', true, '2013-05-15 13:44:45.878349+07', NULL, '2013-05-15 13:44:45.878349+07', NULL);
INSERT INTO department VALUES (148, 5, 'สำนักงานเลขาธิการคุรุสภา', '', '', '20309', true, '2013-05-15 13:44:45.878349+07', NULL, '2013-05-15 13:44:45.878349+07', NULL);
INSERT INTO department VALUES (149, 5, 'สำนักงานคณะกรรมการส่งเสริมสวัสดิการและสวัสดิภาพครูและบุคลากรทางการศึกษา', '', '', '20310', true, '2013-05-15 13:44:45.878349+07', NULL, '2013-05-15 13:44:45.878349+07', NULL);
INSERT INTO department VALUES (150, 5, 'สถาบันทดสอบทางการศึกษาแห่งชาติ (องค์การมหาชน)', '', '', '20311', true, '2013-05-15 13:44:45.878349+07', NULL, '2013-05-15 13:44:45.878349+07', NULL);
INSERT INTO department VALUES (151, 5, 'มหาวิทยาลัยมหิดล', '', '', '20312', true, '2013-05-15 13:44:45.878349+07', NULL, '2013-05-15 13:44:45.878349+07', NULL);
INSERT INTO department VALUES (152, 5, 'มหาวิทยาลัยเทคโนโลยีพระจอมเกล้าพระนครเหนือ', '', '', '20313', true, '2013-05-15 13:44:45.878349+07', NULL, '2013-05-15 13:44:45.878349+07', NULL);
INSERT INTO department VALUES (153, 5, 'มหาวิทยาลัยบูรพา', '', '', '20314', true, '2013-05-15 13:44:45.878349+07', NULL, '2013-05-15 13:44:45.878349+07', NULL);
INSERT INTO department VALUES (154, 5, 'มหาวิทยาลัยทักษิณ', '', '', '20315', true, '2013-05-15 13:44:45.878349+07', NULL, '2013-05-15 13:44:45.878349+07', NULL);
INSERT INTO department VALUES (155, 5, 'จุฬาลงกรณ์มหาวิทยาลัย', '', '', '20316', true, '2013-05-15 13:44:45.878349+07', NULL, '2013-05-15 13:44:45.878349+07', NULL);
INSERT INTO department VALUES (156, 5, 'มหาวิทยาลัยเชียงใหม่', '', '', '20317', true, '2013-05-15 13:44:45.878349+07', NULL, '2013-05-15 13:44:45.878349+07', NULL);
INSERT INTO department VALUES (157, 5, 'สถาบันเทคโนโลยีพระจอมเกล้าเจ้าคุณทหารลาดกระบัง', '', '', '20318', true, '2013-05-15 13:44:45.878349+07', NULL, '2013-05-15 13:44:45.878349+07', NULL);
INSERT INTO department VALUES (158, 5, 'มหาวิทยาลัยพะเยา', '', '', '20319', true, '2013-05-15 13:44:45.878349+07', NULL, '2013-05-15 13:44:45.878349+07', NULL);
INSERT INTO department VALUES (159, 6, 'สำนักงานปลัดกระทรวงวิทยาศาสตร์และเทคโนโลยี', '', '', '19002', true, '2013-05-15 13:44:45.878349+07', NULL, '2013-05-15 13:44:45.878349+07', NULL);
INSERT INTO department VALUES (160, 6, 'กรมวิทยาศาสตร์บริการ', '', '', '19003', true, '2013-05-15 13:44:45.878349+07', NULL, '2013-05-15 13:44:45.878349+07', NULL);
INSERT INTO department VALUES (161, 6, 'สำนักงานปรมาณูเพื่อสันติ', '', '', '19004', true, '2013-05-15 13:44:45.878349+07', NULL, '2013-05-15 13:44:45.878349+07', NULL);
INSERT INTO department VALUES (162, 6, 'สำนักงานพัฒนาวิทยาศาสตร์และเทคโนโลยีแห่งชาติ', '', '', '19005', true, '2013-05-15 13:44:45.878349+07', NULL, '2013-05-15 13:44:45.878349+07', NULL);
INSERT INTO department VALUES (163, 6, 'สถาบันเทคโนโลยีนิวเคลียร์แห่งชาติ (องค์การมหาชน)', '', '', '19008', true, '2013-05-15 13:44:45.878349+07', NULL, '2013-05-15 13:44:45.878349+07', NULL);
INSERT INTO department VALUES (164, 6, 'สำนักงานคณะกรรมการนโยบายวิทยาศาสตร์ เทคโนโลยี และนวัตกรรมแห่งชาติ', '', '', '19009', true, '2013-05-15 13:44:45.878349+07', NULL, '2013-05-15 13:44:45.878349+07', NULL);
INSERT INTO department VALUES (165, 6, 'สถาบันวิจัยแสงซินโครตรอน (องค์การมหาชน)', '', '', '19010', true, '2013-05-15 13:44:45.878349+07', NULL, '2013-05-15 13:44:45.878349+07', NULL);
INSERT INTO department VALUES (166, 6, 'สถาบันวิจัยดาราศาสตร์แห่งชาติ (องค์การมหาชน)', '', '', '19011', true, '2013-05-15 13:44:45.878349+07', NULL, '2013-05-15 13:44:45.878349+07', NULL);
INSERT INTO department VALUES (167, 6, 'สำนักงานนวัตกรรมแห่งชาติ (องค์การมหาชน)', '', '', '19013', true, '2013-05-15 13:44:45.878349+07', NULL, '2013-05-15 13:44:45.878349+07', NULL);
INSERT INTO department VALUES (168, 7, 'สำนักงานปลัดกระทรวงวัฒนธรรม', '', '', '18002', true, '2013-05-15 13:44:45.878349+07', NULL, '2013-05-15 13:44:45.878349+07', NULL);
INSERT INTO department VALUES (169, 7, 'กรมการศาสนา', '', '', '18003', true, '2013-05-15 13:44:45.878349+07', NULL, '2013-05-15 13:44:45.878349+07', NULL);
INSERT INTO department VALUES (170, 7, 'กรมศิลปากร', '', '', '18004', true, '2013-05-15 13:44:45.878349+07', NULL, '2013-05-15 13:44:45.878349+07', NULL);
INSERT INTO department VALUES (171, 7, 'สำนักงานคณะกรรมการวัฒนธรรมแห่งชาติ', '', '', '18005', true, '2013-05-15 13:44:45.878349+07', NULL, '2013-05-15 13:44:45.878349+07', NULL);
INSERT INTO department VALUES (172, 7, 'สำนักงานศิลปวัฒนธรรมร่วมสมัย', '', '', '18006', true, '2013-05-15 13:44:45.878349+07', NULL, '2013-05-15 13:44:45.878349+07', NULL);
INSERT INTO department VALUES (173, 7, 'ศูนย์มานุษยวิทยาสิรินธร (องค์การมหาชน) ', '', '', '18007', true, '2013-05-15 13:44:45.878349+07', NULL, '2013-05-15 13:44:45.878349+07', NULL);
INSERT INTO department VALUES (174, 7, 'สถาบันบัณฑิตพัฒนศิลป์', '', '', '18008', true, '2013-05-15 13:44:45.878349+07', NULL, '2013-05-15 13:44:45.878349+07', NULL);
INSERT INTO department VALUES (175, 7, 'หอภาพยนต์ (องค์การมหาชน)', '', '', '18009', true, '2013-05-15 13:44:45.878349+07', NULL, '2013-05-15 13:44:45.878349+07', NULL);
INSERT INTO department VALUES (176, 8, 'สำนักงานปลัดกระทรวงแรงงาน', '', '', '17002', true, '2013-05-15 13:44:45.878349+07', NULL, '2013-05-15 13:44:45.878349+07', NULL);
INSERT INTO department VALUES (177, 8, 'กรมการจัดหางาน', '', '', '17003', true, '2013-05-15 13:44:45.878349+07', NULL, '2013-05-15 13:44:45.878349+07', NULL);
INSERT INTO department VALUES (178, 8, 'กรมพัฒนาฝีมือแรงงาน', '', '', '17004', true, '2013-05-15 13:44:45.878349+07', NULL, '2013-05-15 13:44:45.878349+07', NULL);
INSERT INTO department VALUES (179, 8, 'กรมสวัสดิการและคุ้มครองแรงงาน', '', '', '17005', true, '2013-05-15 13:44:45.878349+07', NULL, '2013-05-15 13:44:45.878349+07', NULL);
INSERT INTO department VALUES (180, 8, 'สำนักงานประกันสังคม', '', '', '17006', true, '2013-05-15 13:44:45.878349+07', NULL, '2013-05-15 13:44:45.878349+07', NULL);
INSERT INTO department VALUES (181, 9, 'สำนักงานปลัดกระทรวงยุติธรรม', '', '', '16002', true, '2013-05-15 13:44:45.878349+07', NULL, '2013-05-15 13:44:45.878349+07', NULL);
INSERT INTO department VALUES (182, 9, 'กรมคุมประพฤติ', '', '', '16003', true, '2013-05-15 13:44:45.878349+07', NULL, '2013-05-15 13:44:45.878349+07', NULL);
INSERT INTO department VALUES (183, 9, 'กรมคุ้มครองสิทธิและเสรีภาพ', '', '', '16004', true, '2013-05-15 13:44:45.878349+07', NULL, '2013-05-15 13:44:45.878349+07', NULL);
INSERT INTO department VALUES (184, 9, 'กรมบังคับคดี', '', '', '16005', true, '2013-05-15 13:44:45.878349+07', NULL, '2013-05-15 13:44:45.878349+07', NULL);
INSERT INTO department VALUES (185, 9, 'กรมพินิจและคุ้มครองเด็กและเยาวชน', '', '', '16006', true, '2013-05-15 13:44:45.878349+07', NULL, '2013-05-15 13:44:45.878349+07', NULL);
INSERT INTO department VALUES (186, 9, 'กรมราชทัณฑ์', '', '', '16007', true, '2013-05-15 13:44:45.878349+07', NULL, '2013-05-15 13:44:45.878349+07', NULL);
INSERT INTO department VALUES (187, 9, 'กรมสอบสวนคดีพิเศษ', '', '', '16008', true, '2013-05-15 13:44:45.878349+07', NULL, '2013-05-15 13:44:45.878349+07', NULL);
INSERT INTO department VALUES (188, 9, 'สำนักงานกิจการยุติธรรม', '', '', '16009', true, '2013-05-15 13:44:45.878349+07', NULL, '2013-05-15 13:44:45.878349+07', NULL);
INSERT INTO department VALUES (189, 9, 'สถาบันนิติวิทยาศาสตร์', '', '', '16010', true, '2013-05-15 13:44:45.878349+07', NULL, '2013-05-15 13:44:45.878349+07', NULL);
INSERT INTO department VALUES (190, 9, 'สำนักงานคณะกรรมการป้องกันและปราบปรามยาเสพติด', '', '', '16011', true, '2013-05-15 13:44:45.878349+07', NULL, '2013-05-15 13:44:45.878349+07', NULL);
INSERT INTO department VALUES (191, 9, 'สำนักงานคณะกรรมการป้องกันและปราบปรามการทุจริตในภาครัฐ', '', '', '16012', true, '2013-05-15 13:44:45.878349+07', NULL, '2013-05-15 13:44:45.878349+07', NULL);
INSERT INTO department VALUES (192, 10, 'สำนักงานปลัดกระทรวงมหาดไทย', '', '', '15002', true, '2013-05-15 13:44:45.878349+07', NULL, '2013-05-15 13:44:45.878349+07', NULL);
INSERT INTO department VALUES (193, 10, 'กรมการพัฒนาชุมชน', '', '', '15004', true, '2013-05-15 13:44:45.878349+07', NULL, '2013-05-15 13:44:45.878349+07', NULL);
INSERT INTO department VALUES (194, 10, 'กรมที่ดิน', '', '', '15005', true, '2013-05-15 13:44:45.878349+07', NULL, '2013-05-15 13:44:45.878349+07', NULL);
INSERT INTO department VALUES (195, 10, 'กรุงเทพมหานคร', '', '', '15009', true, '2013-05-15 13:44:45.878349+07', NULL, '2013-05-15 13:44:45.878349+07', NULL);
INSERT INTO department VALUES (196, 10, 'เมืองพัทยา', '', '', '15011', true, '2013-05-15 13:44:45.878349+07', NULL, '2013-05-15 13:44:45.878349+07', NULL);
INSERT INTO department VALUES (197, 11, 'สำนักงานปลัดกระทรวงพาณิชย์', '', '', '13002', true, '2013-05-15 13:44:45.878349+07', NULL, '2013-05-15 13:44:45.878349+07', NULL);
INSERT INTO department VALUES (198, 11, 'กรมการค้าต่างประเทศ', '', '', '13003', true, '2013-05-15 13:44:45.878349+07', NULL, '2013-05-15 13:44:45.878349+07', NULL);
INSERT INTO department VALUES (199, 11, 'กรมการค้าภายใน', '', '', '13004', true, '2013-05-15 13:44:45.878349+07', NULL, '2013-05-15 13:44:45.878349+07', NULL);
INSERT INTO department VALUES (200, 11, 'กรมเจรจาการค้าระหว่างประเทศ', '', '', '13006', true, '2013-05-15 13:44:45.878349+07', NULL, '2013-05-15 13:44:45.878349+07', NULL);
INSERT INTO department VALUES (201, 11, 'กรมทรัพย์สินทางปัญญา', '', '', '13007', true, '2013-05-15 13:44:45.878349+07', NULL, '2013-05-15 13:44:45.878349+07', NULL);
INSERT INTO department VALUES (202, 11, 'กรมพัฒนาธุรกิจการค้า', '', '', '13008', true, '2013-05-15 13:44:45.878349+07', NULL, '2013-05-15 13:44:45.878349+07', NULL);
INSERT INTO department VALUES (203, 11, 'กรมส่งเสริมการส่งออก', '', '', '13009', true, '2013-05-15 13:44:45.878349+07', NULL, '2013-05-15 13:44:45.878349+07', NULL);
INSERT INTO department VALUES (204, 11, 'ศูนย์ส่งเสริมศิลปาชีพระหว่างประเทศ (องค์การมหาชน)', '', '', '13011', true, '2013-05-15 13:44:45.878349+07', NULL, '2013-05-15 13:44:45.878349+07', NULL);
INSERT INTO department VALUES (205, 11, 'สถาบันวิจัยและพัฒนาอัญมณีและเครื่องประดับแห่งชาติ (องค์การมหาชน)', '', '', '13012', true, '2013-05-15 13:44:45.878349+07', NULL, '2013-05-15 13:44:45.878349+07', NULL);
INSERT INTO department VALUES (206, 12, 'สำนักงานปลัดกระทรวงการพัฒนาสังคมและความมั่นคงของมนุษย์', '', '', '06002', true, '2013-05-15 13:44:45.878349+07', NULL, '2013-05-15 13:44:45.878349+07', NULL);
INSERT INTO department VALUES (207, 12, 'กรมพัฒนาสังคมและสวัสดิการ', '', '', '06003', true, '2013-05-15 13:44:45.878349+07', NULL, '2013-05-15 13:44:45.878349+07', NULL);
INSERT INTO department VALUES (208, 12, 'สำนักงานกิจการสตรีและสถาบันครอบครัว', '', '', '06004', true, '2013-05-15 13:44:45.878349+07', NULL, '2013-05-15 13:44:45.878349+07', NULL);
INSERT INTO department VALUES (209, 12, 'สำนักงานส่งเสริมสวัสดิภาพและพิทักษ์เด็ก เยาวชน ผู้ด้อยโอกาส คนพิการ และผู้สูงอายุ', '', '', '06005', true, '2013-05-15 13:44:45.878349+07', NULL, '2013-05-15 13:44:45.878349+07', NULL);
INSERT INTO department VALUES (210, 12, 'สถาบันพัฒนาองค์กรชุมชน (องค์การมหาชน)', '', '', '06006', true, '2013-05-15 13:44:45.878349+07', NULL, '2013-05-15 13:44:45.878349+07', NULL);
INSERT INTO department VALUES (262, 20, 'กองบัญชาการกองทัพไทย', '', '', '02008', true, '2013-05-15 13:44:45.878349+07', NULL, '2013-05-15 13:44:45.878349+07', NULL);
INSERT INTO department VALUES (263, 20, 'สถาบันเทคโนโลยีป้องกันประเทศ (องค์การมหาชน)', '', '', '02009', true, '2013-05-15 13:44:45.878349+07', NULL, '2013-05-15 13:44:45.878349+07', NULL);
INSERT INTO department VALUES (211, 12, 'สำนักงานส่งเสริมและพัฒนาคุณภาพชีวิตคนพิการแห่งชาติ', '', '', '06007', true, '2013-05-15 13:44:45.878349+07', NULL, '2013-05-15 13:44:45.878349+07', NULL);
INSERT INTO department VALUES (212, 13, 'สำนักงานปลัดกระทรวงพลังงาน', '', '', '12002', true, '2013-05-15 13:44:45.878349+07', NULL, '2013-05-15 13:44:45.878349+07', NULL);
INSERT INTO department VALUES (213, 13, 'กรมเชื้อเพลิงธรรมชาติ', '', '', '12003', true, '2013-05-15 13:44:45.878349+07', NULL, '2013-05-15 13:44:45.878349+07', NULL);
INSERT INTO department VALUES (214, 13, 'กรมธุรกิจพลังงาน', '', '', '12004', true, '2013-05-15 13:44:45.878349+07', NULL, '2013-05-15 13:44:45.878349+07', NULL);
INSERT INTO department VALUES (215, 13, 'กรมพัฒนาพลังงานทดแทนและอนุรักษ์พลังงาน', '', '', '12005', true, '2013-05-15 13:44:45.878349+07', NULL, '2013-05-15 13:44:45.878349+07', NULL);
INSERT INTO department VALUES (216, 13, 'สำนักงานนโยบายและแผนพลังงาน', '', '', '12006', true, '2013-05-15 13:44:45.878349+07', NULL, '2013-05-15 13:44:45.878349+07', NULL);
INSERT INTO department VALUES (217, 13, 'สถาบันบริหารกองทุนพลังงาน (องค์การมหาชน)', '', '', '12007', true, '2013-05-15 13:44:45.878349+07', NULL, '2013-05-15 13:44:45.878349+07', NULL);
INSERT INTO department VALUES (218, 14, 'สำนักงานปลัดกระทรวงเทคโนโลยีสารสนเทศและการสื่อสาร', '', '', '11002', true, '2013-05-15 13:44:45.878349+07', NULL, '2013-05-15 13:44:45.878349+07', NULL);
INSERT INTO department VALUES (219, 14, 'สำนักงานสถิติแห่งชาติ', '', '', '11005', true, '2013-05-15 13:44:45.878349+07', NULL, '2013-05-15 13:44:45.878349+07', NULL);
INSERT INTO department VALUES (220, 14, 'สำนักงานส่งเสริมอุตสาหกรรมซอฟแวร์แห่งชาติ (องค์การมหาชน)', '', '', '11006', true, '2013-05-15 13:44:45.878349+07', NULL, '2013-05-15 13:44:45.878349+07', NULL);
INSERT INTO department VALUES (221, 15, 'สำนักงานปลัดกระทรวงทรัพยากรธรรมชาติและสิ่งแวดล้อม', '', '', '09002', true, '2013-05-15 13:44:45.878349+07', NULL, '2013-05-15 13:44:45.878349+07', NULL);
INSERT INTO department VALUES (222, 15, 'กรมส่งเสริมคุณภาพสิ่งแวดล้อม', '', '', '09008', true, '2013-05-15 13:44:45.878349+07', NULL, '2013-05-15 13:44:45.878349+07', NULL);
INSERT INTO department VALUES (223, 15, 'กรมอุทยานแห่งชาติ สัตว์ป่า และพันธุ์พืช', '', '', '09009', true, '2013-05-15 13:44:45.878349+07', NULL, '2013-05-15 13:44:45.878349+07', NULL);
INSERT INTO department VALUES (224, 15, 'สำนักงานนโยบายและแผนทรัพยากรธรรมชาติและสิ่งแวดล้อม', '', '', '09011', true, '2013-05-15 13:44:45.878349+07', NULL, '2013-05-15 13:44:45.878349+07', NULL);
INSERT INTO department VALUES (225, 15, 'สำนักงานพัฒนาเศรษฐกิจจากฐานชีวภาพ (องค์การมหาชน)', '', '', '09013', true, '2013-05-15 13:44:45.878349+07', NULL, '2013-05-15 13:44:45.878349+07', NULL);
INSERT INTO department VALUES (226, 15, 'องค์การบริหารจัดการก๊าซเรือนกระจก (องค์การมหาชน)', '', '', '09014', true, '2013-05-15 13:44:45.878349+07', NULL, '2013-05-15 13:44:45.878349+07', NULL);
INSERT INTO department VALUES (227, 16, 'สำนักงานปลัดกระทรวงคมนาคม', '', '', '08002', true, '2013-05-15 13:44:45.878349+07', NULL, '2013-05-15 13:44:45.878349+07', NULL);
INSERT INTO department VALUES (228, 16, 'กรมการขนส่งทางบก', '', '', '08004', true, '2013-05-15 13:44:45.878349+07', NULL, '2013-05-15 13:44:45.878349+07', NULL);
INSERT INTO department VALUES (229, 16, 'กรมการบินพลเรือน', '', '', '08005', true, '2013-05-15 13:44:45.878349+07', NULL, '2013-05-15 13:44:45.878349+07', NULL);
INSERT INTO department VALUES (230, 16, 'สำนักงานนโยบายและแผนการขนส่งและจราจร', '', '', '08008', true, '2013-05-15 13:44:45.878349+07', NULL, '2013-05-15 13:44:45.878349+07', NULL);
INSERT INTO department VALUES (231, 17, 'สำนักงานปลัดกระทรวงเกษตรและสหกรณ์', '', '', '07002', true, '2013-05-15 13:44:45.878349+07', NULL, '2013-05-15 13:44:45.878349+07', NULL);
INSERT INTO department VALUES (232, 17, 'กรมตรวจบัญชีสหกรณ์', '', '', '07004', true, '2013-05-15 13:44:45.878349+07', NULL, '2013-05-15 13:44:45.878349+07', NULL);
INSERT INTO department VALUES (233, 17, 'กรมประมง', '', '', '07005', true, '2013-05-15 13:44:45.878349+07', NULL, '2013-05-15 13:44:45.878349+07', NULL);
INSERT INTO department VALUES (234, 17, 'กรมปศุสัตว์', '', '', '07006', true, '2013-05-15 13:44:45.878349+07', NULL, '2013-05-15 13:44:45.878349+07', NULL);
INSERT INTO department VALUES (235, 17, 'กรมวิชาการเกษตร', '', '', '07009', true, '2013-05-15 13:44:45.878349+07', NULL, '2013-05-15 13:44:45.878349+07', NULL);
INSERT INTO department VALUES (236, 17, 'กรมส่งเสริมการเกษตร', '', '', '07011', true, '2013-05-15 13:44:45.878349+07', NULL, '2013-05-15 13:44:45.878349+07', NULL);
INSERT INTO department VALUES (237, 17, 'กรมส่งเสริมสหกรณ์', '', '', '07012', true, '2013-05-15 13:44:45.878349+07', NULL, '2013-05-15 13:44:45.878349+07', NULL);
INSERT INTO department VALUES (238, 17, 'สำนักงานการปฏิรูปที่ดินเพื่อเกษตรกรรม', '', '', '07013', true, '2013-05-15 13:44:45.878349+07', NULL, '2013-05-15 13:44:45.878349+07', NULL);
INSERT INTO department VALUES (239, 17, 'สำนักงานมาตรฐานสินค้าเกษตรและอาหารแห่งชาติ', '', '', '07014', true, '2013-05-15 13:44:45.878349+07', NULL, '2013-05-15 13:44:45.878349+07', NULL);
INSERT INTO department VALUES (240, 17, 'สำนักงานเศรษฐกิจการเกษตร', '', '', '07015', true, '2013-05-15 13:44:45.878349+07', NULL, '2013-05-15 13:44:45.878349+07', NULL);
INSERT INTO department VALUES (241, 17, 'สถาบันวิจัยและพัฒนาพื้นที่สูง (องค์การมหาชน)', '', '', '07017', true, '2013-05-15 13:44:45.878349+07', NULL, '2013-05-15 13:44:45.878349+07', NULL);
INSERT INTO department VALUES (242, 17, 'กรมการข้าว', '', '', '07018', true, '2013-05-15 13:44:45.878349+07', NULL, '2013-05-15 13:44:45.878349+07', NULL);
INSERT INTO department VALUES (243, 17, 'สำนักงานพิพิธภัณฑ์เกษตรเฉลิมพระเกียรติพระบาทสมเด็จพระเจ้าอยู่หัว (องค์กรมหาชน)', '', '', '07019', true, '2013-05-15 13:44:45.878349+07', NULL, '2013-05-15 13:44:45.878349+07', NULL);
INSERT INTO department VALUES (244, 17, 'กรมหม่อนไหม', '', '', '07020', true, '2013-05-15 13:44:45.878349+07', NULL, '2013-05-15 13:44:45.878349+07', NULL);
INSERT INTO department VALUES (245, 18, 'สำนักงานปลัดกระทรวงการท่องเที่ยวและกีฬา', '', '', '05002', true, '2013-05-15 13:44:45.878349+07', NULL, '2013-05-15 13:44:45.878349+07', NULL);
INSERT INTO department VALUES (246, 18, 'สำนักงานพัฒนาการกีฬาและนันทนาการ', '', '', '05003', true, '2013-05-15 13:44:45.878349+07', NULL, '2013-05-15 13:44:45.878349+07', NULL);
INSERT INTO department VALUES (247, 18, 'สถาบันการพลศึกษา', '', '', '05006', true, '2013-05-15 13:44:45.878349+07', NULL, '2013-05-15 13:44:45.878349+07', NULL);
INSERT INTO department VALUES (248, 19, 'สำนักงานปลัดกระทรวงการคลัง', '', '', '03002', true, '2013-05-15 13:44:45.878349+07', NULL, '2013-05-15 13:44:45.878349+07', NULL);
INSERT INTO department VALUES (249, 19, 'กรมธนารักษ์', '', '', '03003', true, '2013-05-15 13:44:45.878349+07', NULL, '2013-05-15 13:44:45.878349+07', NULL);
INSERT INTO department VALUES (250, 19, 'กรมบัญชีกลาง', '', '', '03004', true, '2013-05-15 13:44:45.878349+07', NULL, '2013-05-15 13:44:45.878349+07', NULL);
INSERT INTO department VALUES (251, 19, 'กรมศุลกากร', '', '', '03005', true, '2013-05-15 13:44:45.878349+07', NULL, '2013-05-15 13:44:45.878349+07', NULL);
INSERT INTO department VALUES (252, 19, 'กรมสรรพสามิต', '', '', '03006', true, '2013-05-15 13:44:45.878349+07', NULL, '2013-05-15 13:44:45.878349+07', NULL);
INSERT INTO department VALUES (253, 19, 'กรมสรรพากร', '', '', '03007', true, '2013-05-15 13:44:45.878349+07', NULL, '2013-05-15 13:44:45.878349+07', NULL);
INSERT INTO department VALUES (254, 19, 'สำนักงานคณะกรรมการนโยบายรัฐวิสาหกิจ', '', '', '03008', true, '2013-05-15 13:44:45.878349+07', NULL, '2013-05-15 13:44:45.878349+07', NULL);
INSERT INTO department VALUES (255, 19, 'สำนักงานบริหารหนี้สาธารณะ', '', '', '03009', true, '2013-05-15 13:44:45.878349+07', NULL, '2013-05-15 13:44:45.878349+07', NULL);
INSERT INTO department VALUES (256, 19, 'สำนักงานเศรษฐกิจการคลัง', '', '', '03011', true, '2013-05-15 13:44:45.878349+07', NULL, '2013-05-15 13:44:45.878349+07', NULL);
INSERT INTO department VALUES (257, 19, 'สำนักงานความร่วมมือพัฒนาเศรษฐกิจกับประเทศเพื่อนบ้าน (องค์การมหาชน)', '', '', '03012', true, '2013-05-15 13:44:45.878349+07', NULL, '2013-05-15 13:44:45.878349+07', NULL);
INSERT INTO department VALUES (258, 19, 'สำนักงานคณะกรรมการกำกับและส่งเสริมการประกอบธุรกิจประกันภัย (คปภ.)', '', '', '03013', true, '2013-05-15 13:44:45.878349+07', NULL, '2013-05-15 13:44:45.878349+07', NULL);
INSERT INTO department VALUES (259, 20, 'สำนักงานปลัดกระทรวงกลาโหม', '', '', '02001', true, '2013-05-15 13:44:45.878349+07', NULL, '2013-05-15 13:44:45.878349+07', NULL);
INSERT INTO department VALUES (260, 20, 'กรมราชองครักษ์', '', '', '02002', true, '2013-05-15 13:44:45.878349+07', NULL, '2013-05-15 13:44:45.878349+07', NULL);
INSERT INTO department VALUES (264, 21, 'สำนักงานปลัดกระทรวงการต่างประเทศ', '', '', '04002', true, '2013-05-15 13:44:45.878349+07', NULL, '2013-05-15 13:44:45.878349+07', NULL);
INSERT INTO department VALUES (265, 21, 'กรมการกงสุล', '', '', '04003', true, '2013-05-15 13:44:45.878349+07', NULL, '2013-05-15 13:44:45.878349+07', NULL);
INSERT INTO department VALUES (266, 21, 'กรมพิธีการทูต', '', '', '04004', true, '2013-05-15 13:44:45.878349+07', NULL, '2013-05-15 13:44:45.878349+07', NULL);
INSERT INTO department VALUES (267, 21, 'กรมยุโรป', '', '', '04005', true, '2013-05-15 13:44:45.878349+07', NULL, '2013-05-15 13:44:45.878349+07', NULL);
INSERT INTO department VALUES (268, 21, 'กรมวิเทศสหการ', '', '', '04006', true, '2013-05-15 13:44:45.878349+07', NULL, '2013-05-15 13:44:45.878349+07', NULL);
INSERT INTO department VALUES (269, 21, 'กรมเศรษฐกิจระหว่างประเทศ', '', '', '04007', true, '2013-05-15 13:44:45.878349+07', NULL, '2013-05-15 13:44:45.878349+07', NULL);
INSERT INTO department VALUES (270, 21, 'กรมสนธิสัญญาและกฎหมาย', '', '', '04008', true, '2013-05-15 13:44:45.878349+07', NULL, '2013-05-15 13:44:45.878349+07', NULL);
INSERT INTO department VALUES (271, 21, 'กรมสารนิเทศ', '', '', '04009', true, '2013-05-15 13:44:45.878349+07', NULL, '2013-05-15 13:44:45.878349+07', NULL);
INSERT INTO department VALUES (272, 21, 'กรมองค์การระหว่างประเทศ', '', '', '04011', true, '2013-05-15 13:44:45.878349+07', NULL, '2013-05-15 13:44:45.878349+07', NULL);
INSERT INTO department VALUES (273, 21, 'กรมอเมริกาและแปซิฟิกใต้', '', '', '04012', true, '2013-05-15 13:44:45.878349+07', NULL, '2013-05-15 13:44:45.878349+07', NULL);
INSERT INTO department VALUES (274, 21, 'กรมอาเซียน', '', '', '04013', true, '2013-05-15 13:44:45.878349+07', NULL, '2013-05-15 13:44:45.878349+07', NULL);
INSERT INTO department VALUES (275, 21, 'กรมเอเซียตะวันออก', '', '', '04014', true, '2013-05-15 13:44:45.878349+07', NULL, '2013-05-15 13:44:45.878349+07', NULL);
INSERT INTO department VALUES (276, 21, 'กรมเอเซียใต้ ตะวันออกกลางและแอฟริกา', '', '', '04015', true, '2013-05-15 13:44:45.878349+07', NULL, '2013-05-15 13:44:45.878349+07', NULL);
INSERT INTO department VALUES (277, 22, 'สำนักราชเลขาธิการ', '', '', '25001', true, '2013-05-15 13:44:45.878349+07', NULL, '2013-05-15 13:44:45.878349+07', NULL);
INSERT INTO department VALUES (278, 22, 'สำนักพระราชวัง', '', '', '25002', true, '2013-05-15 13:44:45.878349+07', NULL, '2013-05-15 13:44:45.878349+07', NULL);
INSERT INTO department VALUES (279, 22, 'สำนักงานพระพุทธศาสนาแห่งชาติ', '', '', '25003', true, '2013-05-15 13:44:45.878349+07', NULL, '2013-05-15 13:44:45.878349+07', NULL);
INSERT INTO department VALUES (280, 22, 'สำนักงานคณะกรรมการพิเศษเพื่อประสานงานโครงการอันเนื่องมาจากพระราชดำริ', '', '', '25004', true, '2013-05-15 13:44:45.878349+07', NULL, '2013-05-15 13:44:45.878349+07', NULL);
INSERT INTO department VALUES (281, 22, 'สำนักงานคณะกรรมการวิจัยแห่งชาติ', '', '', '25005', true, '2013-05-15 13:44:45.878349+07', NULL, '2013-05-15 13:44:45.878349+07', NULL);
INSERT INTO department VALUES (282, 22, 'ราชบัณฑิตยสถาน', '', '', '25006', true, '2013-05-15 13:44:45.878349+07', NULL, '2013-05-15 13:44:45.878349+07', NULL);
INSERT INTO department VALUES (283, 22, 'สำนักงานตำรวจแห่งชาติ', '', '', '25007', true, '2013-05-15 13:44:45.878349+07', NULL, '2013-05-15 13:44:45.878349+07', NULL);
INSERT INTO department VALUES (284, 22, 'สำนักงานป้องกันและปราบปรามการฟอกเงิน', '', '', '25008', true, '2013-05-15 13:44:45.878349+07', NULL, '2013-05-15 13:44:45.878349+07', NULL);
INSERT INTO department VALUES (285, 23, 'สำนักงานเลขาธิการวุฒิสภา', '', '', '25010', true, '2013-05-15 13:44:45.878349+07', NULL, '2013-05-15 13:44:45.878349+07', NULL);
INSERT INTO department VALUES (286, 23, 'สำนักงานเลขาธิการสภาผู้แทนราษฎร', '', '', '25011', true, '2013-05-15 13:44:45.878349+07', NULL, '2013-05-15 13:44:45.878349+07', NULL);
INSERT INTO department VALUES (287, 23, 'สถาบันพระปกเกล้า', '', '', '25012', true, '2013-05-15 13:44:45.878349+07', NULL, '2013-05-15 13:44:45.878349+07', NULL);
INSERT INTO department VALUES (288, 24, 'สำนักงานศาลรัฐธรรมนูญ', '', '', '26002', true, '2013-05-15 13:44:45.878349+07', NULL, '2013-05-15 13:44:45.878349+07', NULL);
INSERT INTO department VALUES (289, 24, 'สำนักงานศาลปกครอง', '', '', '26004', true, '2013-05-15 13:44:45.878349+07', NULL, '2013-05-15 13:44:45.878349+07', NULL);
INSERT INTO department VALUES (290, 24, 'สำนักงานศาลยุติธรรม', '', '', '26008', true, '2013-05-15 13:44:45.878349+07', NULL, '2013-05-15 13:44:45.878349+07', NULL);
INSERT INTO department VALUES (291, 25, 'สำนักงานอัยการสูงสุด', '', '', '25009', true, '2013-05-15 13:44:45.878349+07', NULL, '2013-05-15 13:44:45.878349+07', NULL);
INSERT INTO department VALUES (292, 25, 'สำนักงานสภาที่ปรึกษาเศรษฐกิจและสังคมแห่งชาติ', '', '', '25015', true, '2013-05-15 13:44:45.878349+07', NULL, '2013-05-15 13:44:45.878349+07', NULL);
INSERT INTO department VALUES (293, 25, 'สำนักงานคณะกรรมการการเลือกตั้ง', '', '', '26001', true, '2013-05-15 13:44:45.878349+07', NULL, '2013-05-15 13:44:45.878349+07', NULL);
INSERT INTO department VALUES (294, 25, 'สำนักงานผู้ตรวจการแผ่นดิน', '', '', '26003', true, '2013-05-15 13:44:45.878349+07', NULL, '2013-05-15 13:44:45.878349+07', NULL);
INSERT INTO department VALUES (295, 25, 'สำนักงานคณะกรรมการป้องกันและปราบปรามการทุจริตแห่งชาติ', '', '', '26005', true, '2013-05-15 13:44:45.878349+07', NULL, '2013-05-15 13:44:45.878349+07', NULL);
INSERT INTO department VALUES (296, 25, 'สำนักงานการตรวจเงินแผ่นดิน', '', '', '26006', true, '2013-05-15 13:44:45.878349+07', NULL, '2013-05-15 13:44:45.878349+07', NULL);
INSERT INTO department VALUES (297, 25, 'สำนักงานคณะกรรมการสิทธิมนุษยชนแห่งชาติ', '', '', '26007', true, '2013-05-15 13:44:45.878349+07', NULL, '2013-05-15 13:44:45.878349+07', NULL);
INSERT INTO department VALUES (298, 26, 'ด้านการเกษตร', '', '', '71000', true, '2013-05-15 13:44:45.878349+07', NULL, '2013-05-15 13:44:45.878349+07', NULL);
INSERT INTO department VALUES (299, 26, 'องค์การตลาดเพื่อเกษตรกร', '', '', '50101', true, '2013-05-15 13:44:45.878349+07', NULL, '2013-05-15 13:44:45.878349+07', NULL);
INSERT INTO department VALUES (300, 26, 'องค์การสวนยาง', '', '', '50102', true, '2013-05-15 13:44:45.878349+07', NULL, '2013-05-15 13:44:45.878349+07', NULL);
INSERT INTO department VALUES (301, 26, 'องค์การสะพานปลา', '', '', '50103', true, '2013-05-15 13:44:45.878349+07', NULL, '2013-05-15 13:44:45.878349+07', NULL);
INSERT INTO department VALUES (302, 26, 'องค์การส่งเสริมกิจการโคนมแห่งประเทศไทย', '', '', '50104', true, '2013-05-15 13:44:45.878349+07', NULL, '2013-05-15 13:44:45.878349+07', NULL);
INSERT INTO department VALUES (303, 26, 'องค์การอุตสาหกรรมป่าไม้', '', '', '50105', true, '2013-05-15 13:44:45.878349+07', NULL, '2013-05-15 13:44:45.878349+07', NULL);
INSERT INTO department VALUES (304, 26, 'สำนักงานกองทุนสงเคราะห์การทำสวนยาง ', '', '', '50106', true, '2013-05-15 13:44:45.878349+07', NULL, '2013-05-15 13:44:45.878349+07', NULL);
INSERT INTO department VALUES (305, 26, 'ด้านการอุตสาหกรรม', '', '', '72000', true, '2013-05-15 13:44:45.878349+07', NULL, '2013-05-15 13:44:45.878349+07', NULL);
INSERT INTO department VALUES (306, 26, 'การนิคมอุตสาหกรรมแห่งประเทศไทย', '', '', '50201', true, '2013-05-15 13:44:45.878349+07', NULL, '2013-05-15 13:44:45.878349+07', NULL);
INSERT INTO department VALUES (307, 26, 'องค์การแบตเตอรี่', '', '', '50202', true, '2013-05-15 13:44:45.878349+07', NULL, '2013-05-15 13:44:45.878349+07', NULL);
INSERT INTO department VALUES (308, 26, 'องค์การฟอกหนัง', '', '', '50203', true, '2013-05-15 13:44:45.878349+07', NULL, '2013-05-15 13:44:45.878349+07', NULL);
INSERT INTO department VALUES (309, 26, 'องค์การเภสัชกรรม', '', '', '50204', true, '2013-05-15 13:44:45.878349+07', NULL, '2013-05-15 13:44:45.878349+07', NULL);
INSERT INTO department VALUES (310, 26, 'องค์การสุรา', '', '', '50205', true, '2013-05-15 13:44:45.878349+07', NULL, '2013-05-15 13:44:45.878349+07', NULL);
INSERT INTO department VALUES (311, 26, 'โรงงานไพ่', '', '', '50206', true, '2013-05-15 13:44:45.878349+07', NULL, '2013-05-15 13:44:45.878349+07', NULL);
INSERT INTO department VALUES (312, 26, 'โรงงานยาสูบ', '', '', '50207', true, '2013-05-15 13:44:45.878349+07', NULL, '2013-05-15 13:44:45.878349+07', NULL);
INSERT INTO department VALUES (313, 26, 'โรงพิมพ์ตำรวจ', '', '', '50208', true, '2013-05-15 13:44:45.878349+07', NULL, '2013-05-15 13:44:45.878349+07', NULL);
INSERT INTO department VALUES (315, 26, 'ด้านการคมนาคม ขนส่งและสื่อสาร', '', '', '73000', true, '2013-05-15 13:44:45.878349+07', NULL, '2013-05-15 13:44:45.878349+07', NULL);
INSERT INTO department VALUES (316, 26, 'การทางพิเศษแห่งประเทศไทย', '', '', '50301', true, '2013-05-15 13:44:45.878349+07', NULL, '2013-05-15 13:44:45.878349+07', NULL);
INSERT INTO department VALUES (317, 26, 'องค์การขนส่งมวลชนกรุงเทพ', '', '', '50302', true, '2013-05-15 13:44:45.878349+07', NULL, '2013-05-15 13:44:45.878349+07', NULL);
INSERT INTO department VALUES (318, 26, 'การท่าเรือแห่งประเทศไทย', '', '', '50304', true, '2013-05-15 13:44:45.878349+07', NULL, '2013-05-15 13:44:45.878349+07', NULL);
INSERT INTO department VALUES (323, 26, 'สถาบันการบินพลเรือน ', '', '', '50311', true, '2013-05-15 13:44:45.878349+07', NULL, '2013-05-15 13:44:45.878349+07', NULL);
INSERT INTO department VALUES (324, 26, 'การรถไฟฟ้าขนส่งมวลชนแห่งประเทศไทย', '', '', '50313', true, '2013-05-15 13:44:45.878349+07', NULL, '2013-05-15 13:44:45.878349+07', NULL);
INSERT INTO department VALUES (331, 26, 'ด้านการพาณิชย์และการท่องเที่ยว', '', '', '74000', true, '2013-05-15 13:44:45.878349+07', NULL, '2013-05-15 13:44:45.878349+07', NULL);
INSERT INTO department VALUES (332, 26, 'องค์การตลาด', '', '', '50401', true, '2013-05-15 13:44:45.878349+07', NULL, '2013-05-15 13:44:45.878349+07', NULL);
INSERT INTO department VALUES (333, 26, 'องค์การคลังสินค้า', '', '', '50402', true, '2013-05-15 13:44:45.878349+07', NULL, '2013-05-15 13:44:45.878349+07', NULL);
INSERT INTO department VALUES (334, 26, 'สำนักงานสลากกินแบ่งรัฐบาล', '', '', '50403', true, '2013-05-15 13:44:45.878349+07', NULL, '2013-05-15 13:44:45.878349+07', NULL);
INSERT INTO department VALUES (335, 26, 'การท่องเที่ยวแห่งประเทศไทย', '', '', '50404', true, '2013-05-15 13:44:45.878349+07', NULL, '2013-05-15 13:44:45.878349+07', NULL);
INSERT INTO department VALUES (337, 26, 'ด้านวิทยาศาสตร์ เทคโนโลยี พลังงาน และสิ่งแวดล้อม', '', '', '75000', true, '2013-05-15 13:44:45.878349+07', NULL, '2013-05-15 13:44:45.878349+07', NULL);
INSERT INTO department VALUES (338, 26, 'สถาบันวิจัยวิทยาศาสตร์และเทคโนโลยีแห่งประเทศไทย ', '', '', '50501', true, '2013-05-15 13:44:45.878349+07', NULL, '2013-05-15 13:44:45.878349+07', NULL);
INSERT INTO department VALUES (339, 26, 'องค์การพิพิธภัณฑ์วิทยาศาสตร์แห่งชาติ ', '', '', '50502', true, '2013-05-15 13:44:45.878349+07', NULL, '2013-05-15 13:44:45.878349+07', NULL);
INSERT INTO department VALUES (340, 26, 'องค์การสวนพฤกษศาสตร์ ', '', '', '50503', true, '2013-05-15 13:44:45.878349+07', NULL, '2013-05-15 13:44:45.878349+07', NULL);
INSERT INTO department VALUES (341, 26, 'การไฟฟ้านครหลวง', '', '', '50505', true, '2013-05-15 13:44:45.878349+07', NULL, '2013-05-15 13:44:45.878349+07', NULL);
INSERT INTO department VALUES (342, 26, 'การไฟฟ้าส่วนภูมิภาค', '', '', '50506', true, '2013-05-15 13:44:45.878349+07', NULL, '2013-05-15 13:44:45.878349+07', NULL);
INSERT INTO department VALUES (345, 26, 'องค์การจัดการน้ำเสีย ', '', '', '50510', true, '2013-05-15 13:44:45.878349+07', NULL, '2013-05-15 13:44:45.878349+07', NULL);
INSERT INTO department VALUES (346, 26, 'ด้านการบริการสังคม', '', '', '76000', true, '2013-05-15 13:44:45.878349+07', NULL, '2013-05-15 13:44:45.878349+07', NULL);
INSERT INTO department VALUES (347, 26, 'การประปานครหลวง', '', '', '50601', true, '2013-05-15 13:44:45.878349+07', NULL, '2013-05-15 13:44:45.878349+07', NULL);
INSERT INTO department VALUES (348, 26, 'การประปาส่วนภูมิภาค', '', '', '50602', true, '2013-05-15 13:44:45.878349+07', NULL, '2013-05-15 13:44:45.878349+07', NULL);
INSERT INTO department VALUES (349, 26, 'การเคหะแห่งชาติ', '', '', '50603', true, '2013-05-15 13:44:45.878349+07', NULL, '2013-05-15 13:44:45.878349+07', NULL);
INSERT INTO department VALUES (350, 26, 'การกีฬาแห่งประเทศไทย', '', '', '50604', true, '2013-05-15 13:44:45.878349+07', NULL, '2013-05-15 13:44:45.878349+07', NULL);
INSERT INTO department VALUES (351, 26, 'องค์การสวนสัตว์', '', '', '50605', true, '2013-05-15 13:44:45.878349+07', NULL, '2013-05-15 13:44:45.878349+07', NULL);
INSERT INTO department VALUES (352, 26, 'สำนักงานธนานุเคราะห์', '', '', '50606', true, '2013-05-15 13:44:45.878349+07', NULL, '2013-05-15 13:44:45.878349+07', NULL);
INSERT INTO department VALUES (363, 26, 'องค์การสงเคราะห์ทหารผ่านศึกในพระบรมราชูปถัมภ์', '', '', '50801', true, '2013-05-15 13:44:45.878349+07', NULL, '2013-05-15 13:44:45.878349+07', NULL);
INSERT INTO department VALUES (31, 1, 'กรมประชาสัมพันธ์', '', '', '01002', true, '2013-05-15 13:44:45.878349+07', NULL, '2013-05-15 13:44:45.878349+07', NULL);
INSERT INTO department VALUES (365, 2, 'United States Department of Agriculture', 'United States Department of Agriculture', 'USDA', 'A0002', false, '2013-06-10 16:16:12.262951+07', 'postgres', '2013-06-10 16:16:12.262951+07', '');
INSERT INTO department VALUES (364, 2, 'HAMweather', 'HAMweather', '', 'A0001', false, '2013-06-10 16:10:13.581995+07', 'postgres', '2013-06-10 16:10:13.581995+07', '');
INSERT INTO department VALUES (366, 2, 'Kochi University', 'Kochi University', '', 'A0003', false, '2013-06-10 16:18:53.107017+07', 'postgres', '2013-06-10 16:18:53.107017+07', '');


--
-- Data for Name: discolse; Type: TABLE DATA; Schema: public; Owner: moac
--



--
-- Data for Name: dispose; Type: TABLE DATA; Schema: public; Owner: moac
--



--
-- Data for Name: frequency; Type: TABLE DATA; Schema: public; Owner: moac
--



--
-- Data for Name: frequencydata; Type: TABLE DATA; Schema: public; Owner: moac
--



--
-- Data for Name: logs; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO logs VALUES (1, '10.37.137.230', 'leuschke.biz', '', '2014-07-03 23:28:12', '2002-12-28 06:20:26', '1982-12-01 06:17:20', 4, 4, NULL);
INSERT INTO logs VALUES (2, '192.168.228.130', 'huel.com', '', '2014-04-23 23:20:09', '2006-07-11 18:12:58', '2010-12-14 12:16:47', 5, 10, NULL);
INSERT INTO logs VALUES (3, '10.129.94.239', 'hammes.com', '', '2014-04-17 02:09:00', '1983-01-23 01:59:41', '1982-06-20 08:19:30', 5, 2, NULL);
INSERT INTO logs VALUES (4, '192.168.99.158', 'block.net', '', '2014-03-22 17:34:16', '1971-02-09 23:44:42', '2006-07-16 09:13:48', 3, 9, NULL);
INSERT INTO logs VALUES (5, '192.168.175.202', 'prohaska.info', '', '2014-04-10 01:47:12', '1983-08-05 21:25:25', '2008-03-04 21:23:01', 1, 2, NULL);
INSERT INTO logs VALUES (6, '10.226.247.138', 'cole.biz', '', '2014-03-17 01:40:36', '1983-12-14 06:25:48', '1986-08-24 06:39:55', 2, 5, NULL);
INSERT INTO logs VALUES (7, '10.8.93.80', 'macejkovic.biz', '', '2014-05-26 11:25:20', '1987-09-15 14:28:25', '1993-11-09 05:50:26', 5, 11, NULL);
INSERT INTO logs VALUES (8, '192.168.46.216', 'ondricka.com', '', '2014-05-25 09:41:21', '1997-05-25 10:51:45', '1998-08-05 14:02:50', 4, 11, NULL);
INSERT INTO logs VALUES (9, '192.168.69.4', 'kling.net', '', '2014-05-10 23:15:23', '1995-05-14 21:04:33', '1994-02-17 16:37:30', 3, 4, NULL);
INSERT INTO logs VALUES (10, '10.182.128.91', 'bergekovacek.net', '', '2014-06-21 17:19:33', '1983-01-17 13:38:01', '1977-12-17 13:41:36', 1, 5, NULL);
INSERT INTO logs VALUES (11, '10.26.8.195', 'mueller.info', '', '2014-07-03 19:54:47', '2000-09-30 04:59:53', '1984-01-07 18:31:41', 5, 5, NULL);
INSERT INTO logs VALUES (12, '192.168.205.141', 'kihnwehner.org', '', '2014-06-21 01:43:31', '1998-08-25 14:23:49', '1971-11-16 21:16:03', 5, 9, NULL);
INSERT INTO logs VALUES (13, '192.168.227.167', 'kovacekcollins.com', '', '2014-03-29 19:56:53', '1989-10-19 01:34:17', '1989-06-27 13:47:38', 4, 3, NULL);
INSERT INTO logs VALUES (14, '192.168.23.178', 'orn.com', '', '2014-07-04 21:23:42', '1989-05-31 21:40:51', '2011-04-27 17:24:18', 4, 1, NULL);
INSERT INTO logs VALUES (15, '192.168.210.252', 'cummingsbrakus.com', '', '2014-07-08 11:56:06', '1985-12-02 16:58:00', '1991-07-27 18:20:58', 3, 8, NULL);
INSERT INTO logs VALUES (16, '10.30.194.171', 'collins.com', '', '2014-05-30 09:01:55', '2013-07-27 17:10:54', '2001-02-05 13:24:11', 6, 2, NULL);
INSERT INTO logs VALUES (17, '192.168.231.243', 'morissettedubuque.com', '', '2014-04-29 10:43:32', '1995-02-05 10:02:00', '1976-07-24 02:17:18', 3, 3, NULL);
INSERT INTO logs VALUES (18, '192.168.16.63', 'friesen.com', '', '2014-06-12 21:13:12', '2010-04-01 04:15:13', '2006-09-06 11:47:01', 5, 11, NULL);
INSERT INTO logs VALUES (19, '192.168.161.35', 'rath.org', '', '2014-07-08 05:29:48', '1983-03-05 14:18:48', '1983-07-13 05:42:21', 1, 4, NULL);
INSERT INTO logs VALUES (20, '192.168.229.26', 'lemke.org', '', '2014-06-20 20:52:53', '2007-08-13 21:59:46', '1986-01-22 12:38:50', 4, 2, NULL);
INSERT INTO logs VALUES (21, '10.40.251.183', 'toy.biz', '', '2014-03-19 23:42:40', '1995-10-25 07:12:09', '1995-10-10 08:23:29', 5, 10, NULL);
INSERT INTO logs VALUES (22, '10.228.75.11', 'aufderharborer.com', '', '2014-04-17 15:09:01', '1986-02-14 13:19:41', '1995-08-11 19:05:55', 5, 4, NULL);
INSERT INTO logs VALUES (23, '192.168.115.48', 'kuphal.com', '', '2014-05-02 23:06:05', '2002-11-20 21:02:53', '1995-02-05 20:41:59', 5, 2, NULL);
INSERT INTO logs VALUES (24, '192.168.155.246', 'von.com', '', '2014-06-12 22:00:30', '1976-02-21 20:44:13', '2005-10-01 16:53:18', 3, 5, NULL);
INSERT INTO logs VALUES (25, '192.168.111.70', 'koepp.biz', '', '2014-04-12 11:41:35', '2000-02-29 17:07:54', '1972-06-09 14:38:50', 3, 10, NULL);
INSERT INTO logs VALUES (26, '192.168.101.55', 'hegmannwalsh.com', '', '2014-07-03 23:14:01', '1986-09-26 13:47:41', '1993-03-28 09:57:40', 4, 4, NULL);
INSERT INTO logs VALUES (27, '10.131.13.238', 'nicolas.info', '', '2014-06-21 17:18:31', '2012-10-04 11:02:16', '1982-11-28 15:18:01', 4, 1, NULL);
INSERT INTO logs VALUES (28, '192.168.125.177', 'block.info', '', '2014-06-15 12:05:07', '1977-09-14 13:14:07', '2009-03-18 00:30:47', 2, 9, NULL);
INSERT INTO logs VALUES (29, '10.244.47.1', 'bins.com', '', '2014-04-02 02:58:06', '1986-02-03 09:11:01', '1977-07-16 23:47:01', 1, 2, NULL);
INSERT INTO logs VALUES (30, '192.168.243.124', 'gaylordbarrows.com', '', '2014-05-06 15:15:46', '1987-07-18 11:33:15', '1980-05-01 10:09:45', 6, 6, NULL);
INSERT INTO logs VALUES (31, '192.168.43.39', 'durgan.com', '', '2014-03-24 23:48:40', '1996-07-28 20:28:32', '2011-04-26 20:10:34', 6, 11, NULL);
INSERT INTO logs VALUES (32, '192.168.56.167', 'kiehngrant.com', '', '2014-03-20 11:13:08', '1986-03-10 10:04:57', '1980-08-06 22:42:22', 3, 1, NULL);
INSERT INTO logs VALUES (33, '192.168.32.88', 'markskrajcik.com', '', '2014-05-01 12:18:49', '1983-06-01 13:25:59', '2011-03-30 06:21:24', 1, 3, NULL);
INSERT INTO logs VALUES (34, '192.168.116.56', 'koelpinmarquardt.com', '', '2014-03-27 20:51:04', '1980-07-19 03:00:25', '1991-12-21 04:07:03', 6, 1, NULL);
INSERT INTO logs VALUES (35, '192.168.125.179', 'paucekgreenholt.com', '', '2014-05-08 23:22:52', '1970-07-28 11:44:26', '2007-06-25 21:39:32', 3, 3, NULL);
INSERT INTO logs VALUES (36, '10.243.223.134', 'strosin.com', '', '2014-05-14 06:52:12', '1980-09-15 17:00:17', '1978-09-26 23:08:45', 1, 8, NULL);
INSERT INTO logs VALUES (37, '10.53.128.111', 'okon.com', '', '2014-06-13 08:30:06', '2002-12-31 11:56:34', '1986-11-13 01:13:00', 2, 8, NULL);
INSERT INTO logs VALUES (38, '192.168.254.33', 'keeling.com', '', '2014-06-15 18:01:24', '2005-04-28 21:38:22', '1991-11-24 20:42:17', 3, 7, NULL);
INSERT INTO logs VALUES (39, '192.168.104.152', 'terry.info', '', '2014-06-27 08:59:48', '1974-05-17 10:51:29', '1994-03-22 21:05:44', 3, 7, NULL);
INSERT INTO logs VALUES (40, '10.250.11.160', 'nitzsche.org', '', '2014-04-18 17:59:19', '1984-11-29 14:43:50', '2005-08-23 13:50:32', 2, 7, NULL);
INSERT INTO logs VALUES (41, '192.168.192.122', 'cronin.com', '', '2014-05-23 16:39:44', '1976-09-10 11:48:05', '2014-06-27 01:25:39', 1, 11, NULL);
INSERT INTO logs VALUES (42, '10.197.33.132', 'kiehn.com', '', '2014-06-15 09:10:35', '1970-10-06 23:10:56', '1991-05-26 02:54:27', 4, 8, NULL);
INSERT INTO logs VALUES (43, '10.0.192.150', 'johns.com', '', '2014-06-08 16:41:49', '1975-06-27 01:10:51', '1991-12-10 09:46:31', 2, 11, NULL);
INSERT INTO logs VALUES (44, '192.168.73.17', 'collierhoeger.com', '', '2014-05-28 21:14:36', '1991-11-01 21:56:00', '2013-12-31 00:37:10', 3, 7, NULL);
INSERT INTO logs VALUES (45, '192.168.67.108', 'kesslerhaley.com', '', '2014-04-04 05:48:41', '1971-03-07 11:47:19', '2009-09-02 04:30:25', 5, 2, NULL);
INSERT INTO logs VALUES (46, '192.168.67.117', 'reichertfay.org', '', '2014-05-05 22:02:18', '1982-11-05 13:05:37', '2007-02-07 14:25:54', 6, 9, NULL);
INSERT INTO logs VALUES (47, '10.158.103.107', 'purdy.com', '', '2014-06-02 01:10:00', '2012-03-02 04:34:13', '1974-01-22 05:28:12', 6, 2, NULL);
INSERT INTO logs VALUES (48, '192.168.188.72', 'greenholtkreiger.biz', '', '2014-07-07 00:44:54', '1996-10-08 19:15:33', '2010-03-13 20:35:36', 2, 4, NULL);
INSERT INTO logs VALUES (49, '10.173.202.232', 'kertzmannbernier.info', '', '2014-04-13 01:22:40', '1976-07-28 04:00:43', '2014-06-22 12:45:24', 3, 3, NULL);
INSERT INTO logs VALUES (50, '10.52.207.188', 'frami.org', '', '2014-04-18 03:18:41', '2011-12-23 15:17:08', '1974-11-29 07:57:41', 4, 1, NULL);
INSERT INTO logs VALUES (51, '10.48.52.74', 'larson.com', '', '2014-07-02 07:51:37', '1984-06-04 10:43:04', '1997-05-12 18:56:38', 6, 11, NULL);
INSERT INTO logs VALUES (52, '192.168.209.204', 'stokes.net', '', '2014-06-04 17:21:30', '1991-04-22 14:00:58', '1970-07-13 08:19:33', 4, 6, NULL);
INSERT INTO logs VALUES (53, '10.198.136.233', 'crooks.net', '', '2014-05-07 19:30:42', '1973-02-24 02:41:54', '1987-06-10 04:37:51', 1, 10, NULL);
INSERT INTO logs VALUES (54, '192.168.23.122', 'streich.com', '', '2014-03-18 06:58:33', '1987-07-06 12:37:07', '1977-01-19 14:07:44', 6, 2, NULL);
INSERT INTO logs VALUES (55, '192.168.225.35', 'reilly.com', '', '2014-06-30 11:05:37', '1982-12-08 23:35:32', '1972-08-02 22:03:13', 5, 6, NULL);
INSERT INTO logs VALUES (56, '10.58.154.36', 'jast.com', '', '2014-04-06 17:13:09', '2003-01-25 15:21:59', '2003-08-30 22:37:00', 5, 4, NULL);
INSERT INTO logs VALUES (57, '10.66.249.209', 'flatley.com', '', '2014-05-01 14:29:28', '1982-03-21 11:12:51', '2012-03-15 05:14:02', 6, 8, NULL);
INSERT INTO logs VALUES (58, '192.168.234.126', 'gislason.com', '', '2014-03-13 10:05:32', '2001-02-23 21:21:41', '1989-10-08 10:34:40', 1, 8, NULL);
INSERT INTO logs VALUES (59, '192.168.88.45', 'lemke.com', '', '2014-03-21 08:30:04', '1976-10-22 04:58:34', '1977-06-14 23:58:24', 5, 4, NULL);
INSERT INTO logs VALUES (60, '10.102.192.122', 'will.org', '', '2014-05-29 08:21:59', '1975-02-18 23:06:59', '1970-12-16 08:03:03', 4, 4, NULL);
INSERT INTO logs VALUES (61, '10.147.241.198', 'corwin.com', '', '2014-05-11 17:37:23', '2003-08-15 03:37:00', '2004-09-07 22:39:10', 4, 11, NULL);
INSERT INTO logs VALUES (62, '10.123.154.181', 'stark.info', '', '2014-04-05 08:46:52', '2011-11-19 22:36:33', '2007-01-19 23:00:11', 1, 1, NULL);
INSERT INTO logs VALUES (63, '10.149.198.103', 'lueilwitz.com', '', '2014-03-23 14:13:45', '1985-11-14 00:15:06', '1986-08-24 15:55:11', 2, 6, NULL);
INSERT INTO logs VALUES (64, '10.228.138.181', 'davis.com', '', '2014-04-03 01:24:56', '2003-11-27 18:10:58', '1974-08-30 14:32:49', 1, 7, NULL);
INSERT INTO logs VALUES (65, '192.168.251.169', 'bednar.net', '', '2014-06-01 23:53:38', '1971-03-25 09:39:37', '1975-01-16 07:06:08', 4, 9, NULL);
INSERT INTO logs VALUES (66, '192.168.86.192', 'runolfssonharber.org', '', '2014-05-29 14:34:10', '1997-02-14 02:15:14', '1970-09-08 10:59:42', 5, 3, NULL);
INSERT INTO logs VALUES (67, '192.168.82.197', 'lowe.com', '', '2014-05-22 20:31:20', '2014-04-16 19:10:58', '1970-07-09 05:38:36', 2, 1, NULL);
INSERT INTO logs VALUES (68, '192.168.237.116', 'kulas.com', '', '2014-06-11 13:54:10', '1988-04-20 21:25:48', '1983-12-30 18:41:48', 2, 11, NULL);
INSERT INTO logs VALUES (69, '10.160.132.82', 'conn.com', '', '2014-03-29 22:11:00', '1976-06-19 15:08:12', '1992-11-21 20:39:03', 6, 4, NULL);
INSERT INTO logs VALUES (70, '10.197.105.130', 'gusikowski.com', '', '2014-06-12 09:30:44', '1996-12-04 06:09:05', '1976-11-10 20:13:26', 3, 9, NULL);
INSERT INTO logs VALUES (71, '192.168.167.222', 'kris.com', '', '2014-05-06 18:18:02', '1981-07-27 21:26:30', '2014-06-07 22:42:59', 6, 4, NULL);
INSERT INTO logs VALUES (72, '10.224.32.200', 'leuschke.com', '', '2014-06-26 03:34:14', '1990-09-21 23:10:48', '1996-03-06 22:45:33', 6, 3, NULL);
INSERT INTO logs VALUES (73, '192.168.82.24', 'schinner.net', '', '2014-06-03 08:51:36', '1997-03-31 07:27:24', '2000-11-05 14:30:44', 6, 3, NULL);
INSERT INTO logs VALUES (74, '10.59.12.81', 'schumm.com', '', '2014-06-04 09:33:47', '1992-03-06 19:48:30', '1987-10-08 14:04:30', 3, 7, NULL);
INSERT INTO logs VALUES (75, '10.125.211.132', 'huel.com', '', '2014-06-18 23:01:22', '2008-01-01 01:26:19', '1982-10-08 11:15:33', 3, 4, NULL);
INSERT INTO logs VALUES (76, '192.168.254.151', 'nikolausokeefe.info', '', '2014-04-22 13:27:54', '1996-02-10 01:02:07', '1980-11-04 12:54:37', 4, 6, NULL);
INSERT INTO logs VALUES (77, '10.144.182.246', 'hirtheolson.biz', '', '2014-06-14 05:06:33', '1974-06-18 22:00:17', '1990-11-15 23:05:46', 3, 4, NULL);
INSERT INTO logs VALUES (78, '10.155.100.53', 'hirthe.com', '', '2014-03-27 08:43:52', '1984-02-08 06:32:02', '1994-09-30 07:37:43', 4, 6, NULL);
INSERT INTO logs VALUES (79, '10.189.120.151', 'rogahn.org', '', '2014-05-16 14:31:33', '1971-08-10 00:17:49', '2003-08-29 19:41:52', 5, 2, NULL);
INSERT INTO logs VALUES (80, '10.56.148.26', 'pollichward.com', '', '2014-06-05 11:00:21', '2000-09-23 12:10:38', '1996-06-04 04:25:47', 6, 9, NULL);
INSERT INTO logs VALUES (81, '10.172.168.37', 'nienowspencer.com', '', '2014-05-10 03:11:37', '1992-08-08 18:49:13', '1994-04-17 19:04:48', 1, 10, NULL);
INSERT INTO logs VALUES (82, '192.168.231.147', 'jones.net', '', '2014-04-17 22:09:19', '2004-01-29 18:04:50', '2010-02-25 18:40:31', 3, 11, NULL);
INSERT INTO logs VALUES (83, '192.168.7.204', 'feil.org', '', '2014-03-21 03:20:02', '1995-03-25 11:31:02', '1991-10-17 12:00:14', 3, 10, NULL);
INSERT INTO logs VALUES (84, '192.168.83.41', 'powlowski.biz', '', '2014-05-30 18:02:24', '1999-12-01 02:36:40', '1974-11-13 19:48:01', 5, 9, NULL);
INSERT INTO logs VALUES (85, '10.76.176.200', 'schmidt.org', '', '2014-07-01 09:18:30', '1973-02-13 17:49:21', '1982-06-17 19:28:15', 4, 3, NULL);
INSERT INTO logs VALUES (86, '10.45.32.77', 'gaylordkoelpin.com', '', '2014-04-24 09:55:45', '1972-12-10 22:05:16', '1998-01-04 13:58:53', 6, 4, NULL);
INSERT INTO logs VALUES (87, '10.66.74.165', 'halvorson.org', '', '2014-04-28 01:23:50', '1989-05-09 05:28:20', '2007-07-24 10:55:31', 2, 9, NULL);
INSERT INTO logs VALUES (88, '192.168.232.59', 'carter.biz', '', '2014-06-28 15:56:44', '1983-04-17 04:43:45', '1990-01-17 07:05:15', 5, 10, NULL);
INSERT INTO logs VALUES (89, '10.60.58.34', 'aufderhar.net', '', '2014-04-16 22:37:27', '1977-11-09 06:17:26', '2012-08-22 10:18:29', 6, 4, NULL);
INSERT INTO logs VALUES (90, '10.237.179.121', 'fritschbednar.com', '', '2014-05-25 07:54:25', '1984-09-24 07:09:39', '1987-04-23 22:59:15', 5, 6, NULL);
INSERT INTO logs VALUES (91, '10.218.212.218', 'lubowitz.com', '', '2014-06-16 23:38:54', '2003-07-25 10:59:48', '2008-07-06 20:39:06', 1, 1, NULL);
INSERT INTO logs VALUES (92, '192.168.153.28', 'ortizrice.com', '', '2014-06-27 21:02:04', '1982-12-13 12:55:33', '2013-09-29 15:37:54', 5, 11, NULL);
INSERT INTO logs VALUES (93, '192.168.248.169', 'sporer.org', '', '2014-03-15 19:07:54', '2001-09-29 01:36:54', '1996-04-09 07:42:40', 4, 3, NULL);
INSERT INTO logs VALUES (94, '10.199.142.5', 'gerlachnitzsche.com', '', '2014-03-29 17:38:39', '1975-11-22 12:24:41', '2006-02-16 21:58:04', 2, 4, NULL);
INSERT INTO logs VALUES (95, '10.187.189.129', 'pouros.info', '', '2014-06-01 11:43:15', '1973-08-26 15:20:08', '2012-03-22 06:55:36', 2, 7, NULL);
INSERT INTO logs VALUES (96, '10.186.193.17', 'harberlarson.org', '', '2014-07-06 01:49:16', '1986-02-22 21:57:36', '1983-03-26 01:10:24', 1, 5, NULL);
INSERT INTO logs VALUES (97, '192.168.142.19', 'torp.com', '', '2014-04-25 11:58:24', '1984-07-07 08:07:37', '1987-04-02 19:12:25', 6, 8, NULL);
INSERT INTO logs VALUES (98, '10.21.174.234', 'dooley.com', '', '2014-04-19 11:28:13', '2006-02-05 20:30:24', '2003-02-28 22:31:51', 6, 3, NULL);
INSERT INTO logs VALUES (99, '192.168.167.203', 'waters.biz', '', '2014-04-15 13:09:01', '1995-11-04 00:10:41', '2013-06-26 17:44:39', 4, 7, NULL);
INSERT INTO logs VALUES (100, '192.168.219.213', 'williamson.com', '', '2014-05-09 23:48:34', '2000-01-14 16:52:13', '1998-04-09 09:13:03', 6, 8, NULL);
INSERT INTO logs VALUES (101, '192.168.249.244', 'wilkinson.com', '', '2014-04-23 13:31:16', '1986-09-14 09:33:41', '1993-05-24 20:08:56', 4, 6, NULL);
INSERT INTO logs VALUES (102, '192.168.231.134', 'lindgren.biz', '', '2014-05-06 20:26:51', '2009-07-31 19:58:19', '1975-01-20 03:21:20', 6, 2, NULL);
INSERT INTO logs VALUES (103, '192.168.121.64', 'hilllmetz.org', '', '2014-04-09 08:26:24', '1978-09-09 14:07:20', '1998-06-03 09:52:40', 6, 10, NULL);
INSERT INTO logs VALUES (104, '192.168.67.135', 'vonrueden.com', '', '2014-04-29 14:26:24', '2012-06-08 03:24:55', '1974-05-05 09:23:27', 2, 2, NULL);
INSERT INTO logs VALUES (105, '192.168.21.16', 'bradtke.net', '', '2014-05-11 16:37:38', '2000-03-30 15:06:35', '1985-12-03 09:27:15', 5, 9, NULL);
INSERT INTO logs VALUES (106, '10.172.156.191', 'spinkaschultz.com', '', '2014-06-10 13:36:06', '1983-08-23 09:18:26', '1973-09-03 11:19:12', 3, 6, NULL);
INSERT INTO logs VALUES (107, '192.168.143.233', 'schiller.com', '', '2014-05-06 01:34:53', '1974-01-31 05:26:14', '1985-11-09 05:18:10', 4, 4, NULL);
INSERT INTO logs VALUES (108, '10.85.65.58', 'haag.info', '', '2014-07-03 15:11:36', '2000-01-18 02:09:47', '1997-08-04 06:03:18', 5, 7, NULL);
INSERT INTO logs VALUES (109, '192.168.106.144', 'vonhoppe.com', '', '2014-05-10 13:57:46', '2000-02-24 09:22:13', '2014-05-30 05:55:45', 3, 11, NULL);
INSERT INTO logs VALUES (110, '192.168.43.205', 'eichmann.com', '', '2014-03-24 14:04:04', '2006-08-30 18:07:25', '2013-12-21 08:00:19', 6, 10, NULL);
INSERT INTO logs VALUES (111, '10.137.76.47', 'schaeferboyle.com', '', '2014-05-07 01:20:40', '1982-06-18 15:21:06', '1991-09-14 04:01:00', 1, 7, NULL);
INSERT INTO logs VALUES (112, '192.168.167.149', 'hilll.info', '', '2014-04-11 21:58:27', '2005-01-20 08:51:25', '2012-04-21 20:39:00', 5, 4, NULL);
INSERT INTO logs VALUES (113, '10.123.85.120', 'stroman.org', '', '2014-04-05 12:04:00', '1990-03-11 13:35:00', '1995-07-18 01:48:25', 6, 10, NULL);
INSERT INTO logs VALUES (114, '192.168.174.23', 'oreillywaters.com', '', '2014-04-29 00:34:58', '1996-05-14 14:05:43', '2001-09-16 09:26:15', 1, 9, NULL);
INSERT INTO logs VALUES (115, '192.168.46.98', 'romaguerabednar.com', '', '2014-05-09 10:30:45', '1999-12-25 00:00:06', '1992-12-01 13:45:45', 3, 6, NULL);
INSERT INTO logs VALUES (116, '10.202.156.213', 'krisparisian.com', '', '2014-06-04 14:27:40', '2006-12-08 18:23:41', '2006-10-05 01:42:13', 3, 10, NULL);
INSERT INTO logs VALUES (117, '10.160.14.36', 'welch.com', '', '2014-03-14 14:42:47', '2006-02-24 05:59:34', '1971-10-22 14:23:41', 3, 9, NULL);
INSERT INTO logs VALUES (118, '10.14.194.140', 'mohrcronin.com', '', '2014-06-15 19:50:13', '1998-07-13 02:11:33', '2001-04-13 11:10:06', 2, 7, NULL);
INSERT INTO logs VALUES (119, '192.168.118.246', 'dicki.com', '', '2014-03-18 14:53:46', '2007-08-23 08:53:12', '1970-01-04 13:38:39', 3, 7, NULL);
INSERT INTO logs VALUES (120, '192.168.170.234', 'bernhard.net', '', '2014-06-15 03:35:19', '2013-03-30 21:36:22', '2011-10-18 11:52:17', 3, 6, NULL);
INSERT INTO logs VALUES (121, '10.151.73.11', 'heidenreichbarton.com', '', '2014-06-24 03:02:38', '2008-03-18 23:00:19', '2004-04-24 23:57:38', 4, 2, NULL);
INSERT INTO logs VALUES (122, '192.168.52.12', 'wilderman.com', '', '2014-05-10 12:06:30', '2002-01-07 07:11:41', '2010-07-03 02:10:05', 1, 3, NULL);
INSERT INTO logs VALUES (123, '10.27.109.165', 'dickens.com', '', '2014-05-08 22:12:01', '2012-03-01 20:02:04', '1971-10-06 18:40:37', 2, 4, NULL);
INSERT INTO logs VALUES (124, '192.168.233.124', 'handlubowitz.com', '', '2014-05-11 21:58:33', '2000-09-10 05:28:04', '1992-03-16 17:03:14', 1, 1, NULL);
INSERT INTO logs VALUES (125, '10.236.87.107', 'bernier.com', '', '2014-04-02 12:22:46', '1974-09-05 16:09:30', '1982-11-22 02:53:41', 6, 2, NULL);
INSERT INTO logs VALUES (126, '10.179.127.92', 'balistrerirobel.info', '', '2014-05-17 01:38:12', '1989-12-14 00:58:01', '2014-01-25 21:05:46', 5, 8, NULL);
INSERT INTO logs VALUES (127, '192.168.71.155', 'metzhodkiewicz.com', '', '2014-04-01 03:10:30', '2009-11-29 16:33:19', '2003-03-10 13:32:00', 3, 7, NULL);
INSERT INTO logs VALUES (128, '192.168.8.62', 'ward.com', '', '2014-04-02 04:42:05', '1981-12-06 01:37:05', '1996-10-02 19:30:46', 2, 10, NULL);
INSERT INTO logs VALUES (129, '192.168.7.84', 'padberg.biz', '', '2014-07-01 12:56:08', '1998-02-11 22:52:29', '1996-07-17 14:31:12', 4, 11, NULL);
INSERT INTO logs VALUES (130, '10.59.20.247', 'cummingsmurray.org', '', '2014-04-01 06:00:14', '2007-03-09 08:48:44', '1978-04-30 09:27:14', 1, 11, NULL);
INSERT INTO logs VALUES (131, '192.168.170.253', 'wunschdubuque.org', '', '2014-06-14 03:21:48', '1977-03-28 10:57:04', '1998-12-19 11:18:54', 1, 3, NULL);
INSERT INTO logs VALUES (132, '10.163.81.173', 'schoen.org', '', '2014-05-29 23:05:05', '2008-12-06 04:55:06', '1971-10-19 03:18:31', 3, 5, NULL);
INSERT INTO logs VALUES (133, '192.168.93.241', 'ernser.com', '', '2014-06-05 17:58:43', '1981-01-27 17:26:10', '2004-08-07 15:32:07', 6, 9, NULL);
INSERT INTO logs VALUES (134, '192.168.157.118', 'brown.info', '', '2014-06-06 13:22:37', '1990-06-13 01:54:35', '2012-01-08 23:29:53', 2, 1, NULL);
INSERT INTO logs VALUES (135, '10.28.145.252', 'towne.info', '', '2014-04-29 00:48:10', '2001-05-13 11:11:03', '1995-12-16 23:21:53', 1, 8, NULL);
INSERT INTO logs VALUES (136, '192.168.188.79', 'hodkiewicz.com', '', '2014-03-27 21:42:03', '1992-06-25 20:10:24', '2012-07-14 09:18:33', 5, 5, NULL);
INSERT INTO logs VALUES (137, '10.166.11.119', 'koch.org', '', '2014-07-04 20:20:53', '1992-01-31 23:07:55', '2000-11-25 21:00:59', 4, 9, NULL);
INSERT INTO logs VALUES (138, '10.124.164.110', 'wunsch.com', '', '2014-04-14 22:07:08', '2001-12-25 20:39:55', '2007-03-15 10:46:35', 6, 6, NULL);
INSERT INTO logs VALUES (139, '10.48.234.51', 'wuckertluettgen.info', '', '2014-05-22 03:01:05', '1979-12-04 03:04:34', '2011-07-05 11:43:57', 5, 9, NULL);
INSERT INTO logs VALUES (140, '10.167.245.23', 'rodriguezwiegand.com', '', '2014-07-07 10:02:51', '1985-08-12 01:26:18', '2006-06-16 03:11:32', 1, 7, NULL);
INSERT INTO logs VALUES (141, '10.212.212.251', 'leuschkewiegand.com', '', '2014-06-18 21:34:53', '1982-05-14 06:22:11', '1972-09-25 03:11:54', 5, 1, NULL);
INSERT INTO logs VALUES (142, '192.168.83.28', 'kossbosco.net', '', '2014-06-20 22:19:23', '2006-05-28 18:50:55', '2012-08-17 08:23:11', 1, 9, NULL);
INSERT INTO logs VALUES (143, '192.168.22.205', 'wuckert.com', '', '2014-05-08 12:49:04', '1982-02-04 12:08:23', '2012-07-17 11:43:47', 4, 1, NULL);
INSERT INTO logs VALUES (144, '192.168.236.55', 'wolf.com', '', '2014-07-01 05:42:24', '1983-05-02 10:29:27', '1996-01-22 21:47:17', 2, 8, NULL);
INSERT INTO logs VALUES (145, '192.168.49.143', 'beerkulas.info', '', '2014-06-05 17:33:10', '2001-08-13 04:02:52', '2013-09-28 16:43:59', 4, 6, NULL);
INSERT INTO logs VALUES (146, '10.233.130.198', 'willmsgrady.com', '', '2014-04-11 09:07:03', '2009-07-30 22:44:08', '2009-07-11 02:16:17', 6, 6, NULL);
INSERT INTO logs VALUES (147, '10.93.74.93', 'gottliebschowalter.com', '', '2014-03-19 19:48:32', '2005-11-14 23:01:11', '1996-03-12 18:58:14', 4, 2, NULL);
INSERT INTO logs VALUES (148, '10.150.100.49', 'grimes.biz', '', '2014-03-30 03:12:33', '2007-06-05 06:58:47', '2013-02-12 17:01:11', 2, 7, NULL);
INSERT INTO logs VALUES (149, '192.168.95.84', 'halvorson.info', '', '2014-04-13 18:09:05', '1995-02-06 15:11:54', '1970-09-09 21:43:25', 2, 8, NULL);
INSERT INTO logs VALUES (150, '10.53.139.18', 'reynoldsschmitt.biz', '', '2014-03-15 15:14:40', '1994-08-20 15:58:35', '2000-06-23 19:20:33', 3, 1, NULL);
INSERT INTO logs VALUES (151, '192.168.21.138', 'kub.com', '', '2014-05-31 01:54:38', '2000-03-19 01:39:31', '2008-11-27 09:22:58', 2, 6, NULL);
INSERT INTO logs VALUES (152, '192.168.232.89', 'spencer.org', '', '2014-05-19 14:35:48', '2000-06-21 03:20:02', '2011-11-06 04:25:49', 1, 1, NULL);
INSERT INTO logs VALUES (153, '192.168.24.44', 'batzbogisich.biz', '', '2014-06-06 04:09:39', '1999-02-09 23:47:51', '1983-11-15 10:23:37', 3, 5, NULL);
INSERT INTO logs VALUES (154, '10.72.166.26', 'harris.info', '', '2014-06-05 01:23:46', '1997-01-11 15:59:42', '2014-06-13 19:32:11', 3, 8, NULL);
INSERT INTO logs VALUES (155, '192.168.47.99', 'sengerstark.com', '', '2014-06-20 20:33:24', '1976-11-05 17:59:59', '1976-07-03 13:46:35', 5, 5, NULL);
INSERT INTO logs VALUES (156, '10.75.34.237', 'treutel.com', '', '2014-06-18 20:47:51', '2006-11-29 20:41:21', '1978-12-26 10:22:11', 2, 3, NULL);
INSERT INTO logs VALUES (157, '192.168.143.107', 'heidenreich.com', '', '2014-03-29 12:30:16', '1970-03-19 02:12:53', '1998-05-16 07:58:08', 6, 10, NULL);
INSERT INTO logs VALUES (158, '10.47.225.224', 'crist.com', '', '2014-06-14 00:46:22', '1995-10-28 20:56:30', '1979-01-07 23:39:16', 6, 2, NULL);
INSERT INTO logs VALUES (159, '10.248.129.78', 'hirthe.com', '', '2014-04-23 05:18:16', '2010-08-22 01:55:12', '1978-06-22 06:03:28', 3, 10, NULL);
INSERT INTO logs VALUES (160, '10.252.163.210', 'grady.com', '', '2014-06-23 02:29:14', '2004-02-14 17:12:42', '1988-05-06 13:56:18', 4, 11, NULL);
INSERT INTO logs VALUES (161, '10.61.203.224', 'oconner.info', '', '2014-05-18 05:52:16', '2011-03-23 19:37:40', '1991-11-10 20:43:38', 5, 9, NULL);
INSERT INTO logs VALUES (162, '192.168.252.0', 'johns.com', '', '2014-04-08 19:04:23', '2006-07-28 20:53:32', '2004-05-02 23:56:29', 6, 7, NULL);
INSERT INTO logs VALUES (163, '10.76.107.35', 'reichel.info', '', '2014-05-11 17:27:42', '2014-02-19 23:51:08', '2007-01-17 07:02:53', 1, 1, NULL);
INSERT INTO logs VALUES (164, '10.47.117.102', 'okonwelch.com', '', '2014-06-05 01:27:29', '1982-12-11 13:37:40', '2012-02-18 07:52:22', 3, 9, NULL);
INSERT INTO logs VALUES (165, '10.205.67.195', 'altenwerth.org', '', '2014-05-10 07:33:57', '1973-07-22 08:26:46', '1977-07-31 01:58:47', 1, 7, NULL);
INSERT INTO logs VALUES (166, '192.168.201.241', 'batz.com', '', '2014-05-26 21:19:10', '1988-12-23 09:25:13', '1988-11-11 15:50:12', 5, 3, NULL);
INSERT INTO logs VALUES (167, '192.168.82.9', 'johnson.net', '', '2014-07-01 23:06:29', '1974-06-28 17:41:15', '1972-12-24 04:15:14', 1, 11, NULL);
INSERT INTO logs VALUES (168, '192.168.206.223', 'gerhold.biz', '', '2014-06-20 21:36:56', '2003-07-17 05:27:15', '1980-02-27 20:46:58', 1, 8, NULL);
INSERT INTO logs VALUES (169, '10.6.221.239', 'kuphalbruen.com', '', '2014-03-16 16:40:46', '1981-05-27 23:07:28', '2011-01-25 09:52:40', 5, 11, NULL);
INSERT INTO logs VALUES (170, '192.168.169.17', 'erdman.com', '', '2014-06-19 04:44:19', '2009-12-13 17:18:04', '1978-12-26 03:11:04', 5, 9, NULL);
INSERT INTO logs VALUES (171, '10.24.116.163', 'collier.net', '', '2014-05-27 08:01:23', '2004-03-29 19:02:57', '2007-10-18 07:28:56', 3, 11, NULL);
INSERT INTO logs VALUES (172, '10.57.243.81', 'mcdermottschulist.com', '', '2014-06-30 22:32:48', '2006-11-26 20:01:30', '2004-04-23 17:12:56', 4, 9, NULL);
INSERT INTO logs VALUES (173, '10.214.242.165', 'rodriguez.com', '', '2014-06-26 14:13:24', '1971-09-18 02:19:32', '1987-11-18 16:34:21', 5, 1, NULL);
INSERT INTO logs VALUES (174, '192.168.211.35', 'reichert.com', '', '2014-06-18 22:18:25', '1983-09-28 08:34:02', '2006-06-03 21:26:07', 3, 10, NULL);
INSERT INTO logs VALUES (175, '192.168.157.228', 'williamsonfadel.biz', '', '2014-04-26 23:21:53', '2012-08-22 04:08:25', '1998-05-28 01:28:28', 3, 3, NULL);
INSERT INTO logs VALUES (176, '192.168.241.49', 'tromp.com', '', '2014-06-05 23:06:18', '2010-10-01 13:25:56', '2004-05-10 19:26:21', 4, 9, NULL);
INSERT INTO logs VALUES (177, '192.168.250.114', 'deckow.info', '', '2014-06-22 01:53:03', '1974-12-08 02:18:46', '1988-10-19 17:04:43', 2, 5, NULL);
INSERT INTO logs VALUES (178, '10.57.10.19', 'legrosbahringer.com', '', '2014-05-08 10:56:04', '1996-06-26 11:25:16', '2013-10-22 07:35:26', 6, 2, NULL);
INSERT INTO logs VALUES (179, '192.168.67.75', 'oberbrunnerwehner.com', '', '2014-05-11 05:07:40', '2013-04-01 08:25:02', '1989-11-04 21:59:46', 3, 10, NULL);
INSERT INTO logs VALUES (180, '10.54.169.79', 'erdman.com', '', '2014-05-19 03:50:14', '1987-07-07 13:20:24', '1984-01-18 11:38:40', 3, 7, NULL);
INSERT INTO logs VALUES (181, '192.168.56.158', 'powlowski.biz', '', '2014-04-21 12:51:15', '1976-01-21 14:57:13', '2001-01-22 13:54:34', 5, 1, NULL);
INSERT INTO logs VALUES (182, '10.250.49.125', 'roberts.com', '', '2014-06-16 14:05:45', '1975-10-03 07:24:15', '1989-02-07 20:17:37', 4, 9, NULL);
INSERT INTO logs VALUES (183, '10.51.48.242', 'schiller.org', '', '2014-07-01 18:04:16', '1982-04-16 23:31:46', '2011-04-17 16:15:38', 3, 1, NULL);
INSERT INTO logs VALUES (184, '192.168.0.182', 'uptondaniel.com', '', '2014-03-14 09:57:54', '1975-02-27 02:11:18', '1991-07-18 21:48:17', 4, 10, NULL);
INSERT INTO logs VALUES (185, '192.168.78.164', 'bernhard.info', '', '2014-07-05 01:07:00', '1980-02-11 21:09:15', '1981-08-18 05:13:10', 5, 8, NULL);
INSERT INTO logs VALUES (186, '10.58.0.160', 'morarfritsch.com', '', '2014-06-29 01:27:27', '1986-04-25 10:56:59', '2004-07-07 09:29:40', 2, 2, NULL);
INSERT INTO logs VALUES (187, '10.53.160.142', 'leuschke.info', '', '2014-04-25 11:13:17', '1985-02-17 12:10:07', '2010-02-21 00:09:50', 2, 10, NULL);
INSERT INTO logs VALUES (188, '192.168.234.53', 'powlowski.info', '', '2014-03-24 09:56:38', '2011-07-07 15:30:51', '1990-07-07 22:23:30', 3, 2, NULL);
INSERT INTO logs VALUES (189, '10.25.4.33', 'cronin.info', '', '2014-04-10 18:11:10', '1987-01-08 14:15:30', '1991-12-21 23:14:08', 1, 6, NULL);
INSERT INTO logs VALUES (190, '192.168.230.124', 'bednarmante.net', '', '2014-04-27 17:51:52', '2006-05-02 20:25:21', '2002-11-17 11:26:41', 3, 9, NULL);
INSERT INTO logs VALUES (191, '10.251.200.140', 'reynolds.net', '', '2014-03-16 08:42:57', '2004-01-11 02:33:12', '2010-12-23 09:18:56', 4, 11, NULL);
INSERT INTO logs VALUES (192, '10.183.63.11', 'lind.info', '', '2014-05-03 17:32:50', '1978-04-26 08:39:38', '1986-09-04 03:57:29', 1, 7, NULL);
INSERT INTO logs VALUES (193, '192.168.162.188', 'dooley.info', '', '2014-04-21 01:38:58', '2008-02-23 01:14:34', '1974-11-04 05:48:14', 3, 11, NULL);
INSERT INTO logs VALUES (194, '192.168.222.109', 'king.biz', '', '2014-07-07 18:41:04', '1986-03-12 21:13:04', '2002-02-01 01:34:48', 3, 10, NULL);
INSERT INTO logs VALUES (195, '10.77.103.202', 'wiegand.com', '', '2014-06-06 05:43:28', '2002-08-07 13:15:37', '1991-10-12 16:47:35', 6, 6, NULL);
INSERT INTO logs VALUES (196, '10.182.234.43', 'jerdestoltenberg.com', '', '2014-03-16 05:05:45', '1989-12-25 13:18:53', '2001-04-29 06:13:49', 5, 10, NULL);
INSERT INTO logs VALUES (197, '192.168.250.242', 'rogahnturner.com', '', '2014-03-31 14:26:16', '1977-08-01 06:50:55', '1983-04-10 05:29:46', 5, 5, NULL);
INSERT INTO logs VALUES (198, '192.168.140.152', 'rempelgreen.com', '', '2014-03-19 02:37:40', '2008-06-20 11:09:12', '2012-02-12 11:12:09', 1, 11, NULL);
INSERT INTO logs VALUES (199, '10.170.78.84', 'borerbosco.org', '', '2014-05-02 08:55:56', '2005-05-06 23:30:25', '1983-06-01 11:30:12', 5, 6, NULL);
INSERT INTO logs VALUES (200, '192.168.238.60', 'konopelski.biz', '', '2014-04-25 07:01:35', '2000-05-31 08:05:24', '1983-05-14 09:36:03', 3, 7, NULL);
INSERT INTO logs VALUES (201, '10.152.36.27', 'bayer.net', '', '2014-04-13 04:43:50', '2009-09-10 12:59:07', '2007-02-04 11:26:21', 4, 9, NULL);
INSERT INTO logs VALUES (202, '192.168.227.125', 'wiza.biz', '', '2014-04-24 16:07:37', '2008-12-02 00:32:37', '2013-12-21 00:34:02', 4, 11, NULL);
INSERT INTO logs VALUES (203, '10.188.195.237', 'cristhane.com', '', '2014-07-03 23:16:41', '1983-05-22 13:30:45', '1983-07-07 07:22:23', 3, 3, NULL);
INSERT INTO logs VALUES (204, '10.23.176.167', 'koelpingerhold.com', '', '2014-05-24 18:06:26', '2007-02-20 12:07:25', '2002-06-03 02:05:45', 1, 9, NULL);
INSERT INTO logs VALUES (205, '192.168.107.206', 'feeneycorwin.org', '', '2014-06-30 14:39:09', '2013-11-08 05:16:24', '1982-02-09 04:33:23', 5, 2, NULL);
INSERT INTO logs VALUES (206, '10.220.101.193', 'jenkinswalter.com', '', '2014-06-11 15:22:05', '1981-08-06 11:41:11', '1983-11-21 20:10:50', 4, 7, NULL);
INSERT INTO logs VALUES (207, '192.168.253.61', 'kassulke.info', '', '2014-05-19 03:34:22', '2007-01-18 05:16:39', '1982-05-09 00:27:18', 5, 1, NULL);
INSERT INTO logs VALUES (208, '192.168.254.122', 'simonisorn.info', '', '2014-03-22 08:06:58', '1981-06-27 22:41:35', '2006-04-02 07:09:50', 4, 7, NULL);
INSERT INTO logs VALUES (209, '192.168.131.52', 'gorczanybotsford.com', '', '2014-04-04 02:41:42', '1984-11-01 08:30:14', '1996-12-28 14:23:59', 4, 11, NULL);
INSERT INTO logs VALUES (210, '192.168.77.128', 'schroederstanton.org', '', '2014-05-22 10:44:01', '1971-04-04 16:57:49', '2003-05-09 11:47:30', 4, 3, NULL);
INSERT INTO logs VALUES (211, '192.168.147.198', 'oconnellhahn.net', '', '2014-06-29 02:56:33', '2007-08-14 19:45:15', '1970-12-10 17:27:01', 2, 1, NULL);
INSERT INTO logs VALUES (212, '10.135.208.121', 'considine.com', '', '2014-05-20 00:00:10', '1975-09-27 22:39:07', '1992-07-26 01:44:12', 4, 4, NULL);
INSERT INTO logs VALUES (213, '10.104.119.26', 'pfefferkub.com', '', '2014-06-24 17:27:01', '2001-11-29 15:40:41', '1985-06-26 11:53:30', 4, 8, NULL);
INSERT INTO logs VALUES (214, '192.168.67.224', 'hyattkreiger.info', '', '2014-05-01 19:45:03', '1998-07-02 08:48:47', '1987-03-20 10:45:23', 5, 5, NULL);
INSERT INTO logs VALUES (215, '10.156.214.11', 'wehner.biz', '', '2014-03-25 17:19:49', '1973-02-24 20:36:41', '1992-12-10 23:52:31', 2, 10, NULL);
INSERT INTO logs VALUES (216, '10.193.29.12', 'hintz.net', '', '2014-07-06 07:38:59', '2011-06-05 02:32:54', '1991-02-28 12:52:14', 4, 10, NULL);
INSERT INTO logs VALUES (217, '10.40.164.145', 'parisian.com', '', '2014-04-13 00:13:35', '1990-01-05 05:37:47', '1991-02-19 07:53:37', 2, 6, NULL);
INSERT INTO logs VALUES (218, '10.232.139.72', 'krisdamore.com', '', '2014-06-17 08:47:18', '1979-11-25 03:31:53', '2009-05-30 11:59:57', 1, 10, NULL);
INSERT INTO logs VALUES (219, '10.64.29.26', 'crooks.com', '', '2014-05-01 17:13:41', '2012-02-03 06:39:00', '1994-04-24 03:39:03', 6, 2, NULL);
INSERT INTO logs VALUES (220, '10.58.22.81', 'smith.org', '', '2014-06-25 21:28:25', '2012-01-11 05:31:04', '2001-03-14 09:58:51', 5, 6, NULL);
INSERT INTO logs VALUES (221, '192.168.81.36', 'huelgulgowski.info', '', '2014-05-09 12:04:47', '2008-11-12 18:02:07', '1974-03-24 15:41:03', 6, 4, NULL);
INSERT INTO logs VALUES (222, '10.10.40.184', 'auermohr.org', '', '2014-05-30 20:00:57', '1994-02-05 08:51:42', '1998-03-27 13:36:11', 2, 11, NULL);
INSERT INTO logs VALUES (223, '10.250.128.158', 'wiza.org', '', '2014-03-20 03:09:31', '2006-05-23 05:29:50', '1981-09-30 16:27:48', 4, 11, NULL);
INSERT INTO logs VALUES (224, '192.168.111.221', 'cruickshank.com', '', '2014-06-15 05:49:20', '2003-03-04 09:11:32', '1988-11-11 01:01:42', 5, 3, NULL);
INSERT INTO logs VALUES (225, '10.108.169.72', 'deckowhermann.com', '', '2014-03-13 12:10:52', '1971-12-15 01:05:13', '1978-04-13 07:07:46', 6, 4, NULL);
INSERT INTO logs VALUES (226, '192.168.165.96', 'buckridge.com', '', '2014-05-30 21:06:42', '1989-03-25 20:00:03', '1985-09-17 03:04:19', 2, 1, NULL);
INSERT INTO logs VALUES (227, '10.93.252.247', 'kautzer.com', '', '2014-05-24 05:38:53', '1971-07-08 07:33:13', '1984-05-20 05:17:47', 3, 8, NULL);
INSERT INTO logs VALUES (228, '192.168.4.188', 'armstrong.info', '', '2014-03-30 09:11:37', '2014-01-26 09:24:05', '2007-06-22 16:11:03', 5, 4, NULL);
INSERT INTO logs VALUES (229, '10.158.30.53', 'hahnullrich.com', '', '2014-06-13 02:48:03', '2002-11-25 13:02:35', '2002-03-03 16:54:42', 3, 6, NULL);
INSERT INTO logs VALUES (230, '192.168.112.218', 'kovacekwunsch.com', '', '2014-05-11 18:19:36', '2012-03-24 09:33:46', '1990-10-10 01:40:12', 6, 9, NULL);
INSERT INTO logs VALUES (231, '10.209.71.44', 'tillmanframi.com', '', '2014-04-24 05:37:57', '2012-01-10 05:22:46', '2005-06-09 01:53:53', 4, 3, NULL);
INSERT INTO logs VALUES (232, '192.168.208.104', 'shields.info', '', '2014-03-16 10:48:14', '2005-08-19 16:47:37', '1986-12-06 10:18:37', 4, 1, NULL);
INSERT INTO logs VALUES (233, '192.168.230.118', 'dubuque.com', '', '2014-04-02 00:25:16', '1990-03-15 21:51:12', '1996-05-10 09:55:13', 6, 10, NULL);
INSERT INTO logs VALUES (234, '10.158.118.126', 'miller.org', '', '2014-06-29 10:18:14', '1997-11-17 20:34:51', '1998-12-05 09:06:23', 6, 2, NULL);
INSERT INTO logs VALUES (235, '192.168.70.82', 'nicolas.com', '', '2014-06-09 12:49:12', '1984-01-01 16:02:33', '1982-05-01 06:45:41', 4, 3, NULL);
INSERT INTO logs VALUES (236, '192.168.57.144', 'hudson.org', '', '2014-05-18 16:41:54', '1972-04-23 07:37:13', '1978-02-08 06:32:10', 6, 8, NULL);
INSERT INTO logs VALUES (237, '10.43.228.19', 'fisher.com', '', '2014-06-13 05:47:43', '1978-12-20 07:42:17', '1971-04-18 22:26:34', 5, 2, NULL);
INSERT INTO logs VALUES (238, '10.225.146.181', 'kris.org', '', '2014-03-21 15:39:20', '1984-11-22 06:37:34', '1991-09-22 05:26:28', 2, 4, NULL);
INSERT INTO logs VALUES (239, '10.183.30.177', 'hauck.com', '', '2014-04-15 00:02:31', '2011-08-26 04:03:05', '1996-05-24 17:09:32', 5, 3, NULL);
INSERT INTO logs VALUES (240, '192.168.172.241', 'weimann.com', '', '2014-03-18 04:50:53', '2001-08-28 04:43:47', '1994-07-07 13:42:14', 1, 6, NULL);
INSERT INTO logs VALUES (241, '10.213.124.18', 'gulgowskilind.com', '', '2014-06-13 02:53:27', '1978-02-17 02:01:41', '1988-11-07 06:48:53', 5, 6, NULL);
INSERT INTO logs VALUES (242, '192.168.186.96', 'torphy.com', '', '2014-03-21 15:35:16', '2002-04-30 04:37:33', '2000-04-11 09:08:55', 5, 6, NULL);
INSERT INTO logs VALUES (243, '10.145.199.111', 'lueilwitzcrona.org', '', '2014-04-14 22:02:02', '2011-03-25 19:47:35', '2011-09-08 13:51:01', 2, 10, NULL);
INSERT INTO logs VALUES (244, '192.168.122.11', 'romaguera.biz', '', '2014-03-11 13:21:05', '2009-08-13 03:39:56', '1988-10-24 12:15:07', 6, 6, NULL);
INSERT INTO logs VALUES (245, '192.168.125.78', 'lindgrenschowalter.info', '', '2014-04-05 02:38:33', '1997-10-02 15:11:22', '1995-01-09 19:44:00', 4, 11, NULL);
INSERT INTO logs VALUES (246, '10.132.145.179', 'rempel.net', '', '2014-05-31 15:23:56', '1990-01-13 01:38:43', '1982-10-02 10:46:01', 1, 4, NULL);
INSERT INTO logs VALUES (247, '10.249.214.126', 'farrell.com', '', '2014-05-03 16:53:29', '1997-01-18 21:26:12', '1983-09-04 21:32:09', 3, 6, NULL);
INSERT INTO logs VALUES (248, '192.168.146.160', 'larsongrimes.com', '', '2014-04-04 16:54:21', '1982-02-05 04:59:09', '1980-10-28 09:20:25', 6, 2, NULL);
INSERT INTO logs VALUES (249, '10.59.82.241', 'predovic.org', '', '2014-04-14 21:10:48', '1975-10-12 16:28:38', '2010-03-25 22:37:34', 2, 11, NULL);
INSERT INTO logs VALUES (250, '10.157.111.69', 'reingerswaniawski.com', '', '2014-06-27 20:40:36', '2005-01-03 16:32:15', '1984-09-12 08:51:38', 1, 2, NULL);
INSERT INTO logs VALUES (251, '10.208.146.134', 'cummerata.com', '', '2014-04-16 08:39:14', '1985-02-22 01:50:17', '1975-03-20 12:31:39', 2, 9, NULL);
INSERT INTO logs VALUES (252, '10.28.107.237', 'stamm.com', '', '2014-03-26 06:09:48', '1985-04-03 03:38:04', '2004-03-15 03:29:09', 2, 11, NULL);
INSERT INTO logs VALUES (253, '192.168.105.160', 'schoen.org', '', '2014-03-26 18:17:15', '2001-05-14 13:31:00', '1975-08-13 06:15:54', 4, 8, NULL);
INSERT INTO logs VALUES (254, '192.168.165.237', 'hauck.com', '', '2014-07-05 17:27:07', '1975-05-19 06:15:28', '2006-10-31 16:41:50', 6, 3, NULL);
INSERT INTO logs VALUES (255, '192.168.207.35', 'upton.com', '', '2014-03-19 12:04:33', '1979-10-17 20:50:23', '1985-01-06 21:58:58', 1, 9, NULL);
INSERT INTO logs VALUES (256, '192.168.143.172', 'dickicarter.net', '', '2014-04-21 22:53:44', '2008-01-13 23:04:19', '1998-02-09 13:06:36', 1, 10, NULL);
INSERT INTO logs VALUES (257, '10.229.33.68', 'metzbailey.org', '', '2014-03-25 13:19:48', '1994-08-19 07:21:05', '1979-03-10 09:20:29', 2, 8, NULL);
INSERT INTO logs VALUES (258, '10.113.95.132', 'dickinson.com', '', '2014-04-28 03:28:23', '1982-08-23 09:52:42', '1998-12-27 13:26:19', 2, 3, NULL);
INSERT INTO logs VALUES (259, '192.168.140.54', 'abernathy.com', '', '2014-03-30 08:12:58', '1985-12-26 21:54:56', '1995-08-26 15:58:06', 2, 2, NULL);
INSERT INTO logs VALUES (260, '192.168.169.7', 'strosindaugherty.org', '', '2014-06-26 06:02:05', '1999-09-01 14:01:32', '2011-09-18 00:18:24', 2, 11, NULL);
INSERT INTO logs VALUES (261, '192.168.62.43', 'langworth.info', '', '2014-03-25 14:58:07', '1975-10-22 11:17:28', '1985-10-24 22:50:39', 6, 3, NULL);
INSERT INTO logs VALUES (262, '192.168.162.184', 'franecki.com', '', '2014-06-13 06:30:01', '1996-10-22 12:33:49', '2004-12-02 06:31:50', 1, 5, NULL);
INSERT INTO logs VALUES (263, '192.168.126.224', 'swift.com', '', '2014-04-20 07:12:39', '2005-05-16 04:03:17', '1993-10-03 23:21:49', 6, 11, NULL);
INSERT INTO logs VALUES (264, '10.150.129.152', 'conn.com', '', '2014-05-10 20:26:04', '1997-07-08 16:45:36', '1972-06-23 23:09:20', 1, 7, NULL);
INSERT INTO logs VALUES (265, '192.168.34.144', 'connellymorar.com', '', '2014-04-10 19:43:56', '1980-12-21 16:07:36', '2004-05-13 06:14:03', 6, 5, NULL);
INSERT INTO logs VALUES (266, '10.160.134.197', 'effertzbalistreri.net', '', '2014-05-15 13:46:25', '2006-08-01 12:31:43', '1997-10-13 00:27:14', 1, 5, NULL);
INSERT INTO logs VALUES (267, '10.218.48.137', 'macejkovic.com', '', '2014-03-13 21:58:02', '2001-01-02 06:29:59', '2011-07-04 07:11:13', 5, 1, NULL);
INSERT INTO logs VALUES (268, '10.218.96.140', 'lindgrady.com', '', '2014-05-04 03:55:19', '1977-05-16 03:55:25', '2006-11-14 07:53:13', 5, 10, NULL);
INSERT INTO logs VALUES (269, '10.223.154.104', 'shields.com', '', '2014-04-17 21:32:10', '2000-07-04 19:35:01', '1985-08-22 00:42:01', 1, 11, NULL);
INSERT INTO logs VALUES (270, '192.168.205.56', 'treutel.com', '', '2014-06-05 06:02:42', '2006-01-06 08:38:23', '2003-08-29 23:54:10', 4, 4, NULL);
INSERT INTO logs VALUES (271, '192.168.220.130', 'reichert.biz', '', '2014-05-17 17:31:50', '1978-12-24 09:06:23', '2008-11-17 00:30:17', 2, 7, NULL);
INSERT INTO logs VALUES (272, '10.225.85.119', 'kozey.com', '', '2014-06-12 17:27:04', '1972-01-28 01:10:36', '1971-09-24 03:14:35', 2, 11, NULL);
INSERT INTO logs VALUES (273, '10.250.39.73', 'funk.com', '', '2014-06-10 13:20:04', '1973-02-19 20:18:15', '2005-06-06 08:06:42', 5, 2, NULL);
INSERT INTO logs VALUES (274, '192.168.68.51', 'mclaughlin.info', '', '2014-05-19 02:31:16', '1996-05-08 21:45:11', '1981-10-21 23:11:16', 5, 2, NULL);
INSERT INTO logs VALUES (275, '192.168.176.96', 'sawayn.com', '', '2014-03-12 12:21:45', '1995-10-04 21:57:26', '2006-02-01 21:24:46', 6, 11, NULL);
INSERT INTO logs VALUES (276, '10.168.177.123', 'webercormier.com', '', '2014-04-16 19:11:29', '2002-03-21 10:10:45', '2000-03-01 11:06:18', 5, 11, NULL);
INSERT INTO logs VALUES (277, '192.168.159.124', 'monahanlemke.com', '', '2014-03-10 22:02:12', '1976-05-02 04:10:32', '2011-08-14 14:06:45', 5, 8, NULL);
INSERT INTO logs VALUES (278, '10.168.83.10', 'crist.com', '', '2014-04-01 15:30:42', '1993-01-27 11:10:24', '1976-12-14 09:12:40', 1, 10, NULL);
INSERT INTO logs VALUES (279, '10.172.216.16', 'harber.com', '', '2014-06-23 03:12:06', '1971-06-15 15:00:28', '1993-11-19 00:18:17', 6, 5, NULL);
INSERT INTO logs VALUES (280, '10.174.252.107', 'rice.com', '', '2014-07-05 09:43:18', '2005-11-20 17:48:03', '1974-09-08 03:23:18', 5, 6, NULL);
INSERT INTO logs VALUES (281, '192.168.86.207', 'okuneva.biz', '', '2014-04-05 15:23:45', '1986-07-30 00:53:36', '1973-07-03 07:59:13', 1, 11, NULL);
INSERT INTO logs VALUES (282, '10.191.255.219', 'kunderogahn.net', '', '2014-06-12 13:18:54', '1991-07-03 05:17:22', '2008-02-02 12:41:16', 1, 5, NULL);
INSERT INTO logs VALUES (283, '10.41.175.144', 'gleichner.com', '', '2014-05-02 07:04:56', '1990-11-17 13:05:08', '1971-04-29 22:43:59', 1, 10, NULL);
INSERT INTO logs VALUES (284, '10.68.90.197', 'gulgowski.com', '', '2014-06-17 14:21:57', '1984-10-01 10:02:13', '2012-07-11 22:44:00', 1, 1, NULL);
INSERT INTO logs VALUES (285, '10.104.108.32', 'mills.com', '', '2014-05-09 00:00:15', '1988-07-08 17:54:54', '1991-10-18 03:06:32', 4, 6, NULL);
INSERT INTO logs VALUES (286, '192.168.64.47', 'lindgren.com', '', '2014-04-10 13:51:43', '2007-03-10 01:18:20', '1995-02-18 20:08:22', 4, 8, NULL);
INSERT INTO logs VALUES (287, '10.167.39.171', 'hodkiewiczgraham.com', '', '2014-04-18 00:51:24', '1985-07-03 13:12:57', '1988-07-14 14:11:48', 5, 10, NULL);
INSERT INTO logs VALUES (288, '10.96.25.98', 'hirthe.com', '', '2014-03-12 09:30:14', '1973-12-15 17:21:49', '1980-02-27 16:46:17', 4, 10, NULL);
INSERT INTO logs VALUES (289, '10.146.225.213', 'moengrady.com', '', '2014-04-16 07:03:11', '2000-01-29 22:51:12', '2012-07-08 22:20:17', 2, 4, NULL);
INSERT INTO logs VALUES (290, '10.9.62.75', 'tremblay.org', '', '2014-06-13 12:42:52', '2013-08-09 11:36:36', '1977-02-22 01:20:37', 1, 3, NULL);
INSERT INTO logs VALUES (291, '192.168.183.135', 'dubuquelegros.com', '', '2014-04-18 07:19:00', '1983-06-18 07:58:13', '1980-06-07 13:18:34', 5, 9, NULL);
INSERT INTO logs VALUES (292, '10.222.4.240', 'feest.com', '', '2014-03-12 02:13:26', '1974-03-05 04:36:38', '2004-07-12 21:42:41', 2, 10, NULL);
INSERT INTO logs VALUES (293, '10.67.173.110', 'cristledner.com', '', '2014-03-27 20:27:44', '1978-02-18 22:02:29', '1982-11-20 21:41:12', 5, 5, NULL);
INSERT INTO logs VALUES (294, '10.23.17.188', 'douglas.com', '', '2014-06-08 15:16:29', '1982-12-12 00:27:45', '1985-07-18 20:25:15', 5, 11, NULL);
INSERT INTO logs VALUES (295, '192.168.26.121', 'huels.com', '', '2014-05-23 23:56:43', '1985-01-01 13:24:46', '2013-03-09 02:18:53', 6, 1, NULL);
INSERT INTO logs VALUES (296, '10.185.59.25', 'larson.com', '', '2014-04-21 20:17:07', '1994-02-01 12:20:20', '1999-09-06 00:53:39', 6, 10, NULL);
INSERT INTO logs VALUES (297, '10.72.37.170', 'leannon.com', '', '2014-06-01 04:36:44', '1974-04-04 18:55:43', '1982-09-11 14:24:17', 1, 3, NULL);
INSERT INTO logs VALUES (298, '192.168.149.182', 'morar.info', '', '2014-07-08 04:15:22', '1991-05-31 11:17:51', '2010-06-22 21:55:48', 3, 3, NULL);
INSERT INTO logs VALUES (299, '10.134.146.157', 'danielkuhic.com', '', '2014-05-01 01:58:46', '1978-04-30 06:09:44', '1997-06-06 13:34:46', 4, 11, NULL);
INSERT INTO logs VALUES (300, '10.131.64.82', 'yost.com', '', '2014-03-18 16:38:41', '1989-06-01 18:57:46', '2003-09-30 19:51:52', 5, 2, NULL);
INSERT INTO logs VALUES (301, '192.168.233.210', 'lebsack.com', '', '2014-07-07 17:40:00', '1985-03-15 11:05:20', '2013-12-07 11:36:39', 2, 8, NULL);
INSERT INTO logs VALUES (302, '10.1.241.112', 'rempel.org', '', '2014-03-15 07:01:37', '1992-02-27 20:02:25', '1978-01-02 02:34:31', 1, 11, NULL);
INSERT INTO logs VALUES (303, '10.75.155.20', 'franecki.com', '', '2014-04-18 17:47:54', '1983-10-25 20:04:04', '1974-08-28 06:32:31', 1, 6, NULL);
INSERT INTO logs VALUES (304, '192.168.155.254', 'abbott.org', '', '2014-06-25 11:56:07', '1994-02-06 18:38:47', '1991-12-06 18:45:19', 5, 3, NULL);
INSERT INTO logs VALUES (305, '192.168.196.219', 'ratke.com', '', '2014-07-08 11:28:03', '1972-04-19 22:42:42', '1983-01-03 16:14:24', 3, 2, NULL);
INSERT INTO logs VALUES (306, '192.168.104.211', 'stark.com', '', '2014-05-12 16:48:14', '2003-10-01 05:18:16', '2006-10-12 23:33:04', 5, 7, NULL);
INSERT INTO logs VALUES (307, '192.168.35.237', 'bogan.net', '', '2014-05-31 21:06:09', '2011-10-17 18:51:03', '1981-10-28 22:30:07', 3, 11, NULL);
INSERT INTO logs VALUES (308, '192.168.186.207', 'fadel.biz', '', '2014-04-01 22:32:12', '1983-03-25 20:09:31', '2013-04-16 13:21:53', 5, 7, NULL);
INSERT INTO logs VALUES (309, '10.138.191.101', 'nikolaus.com', '', '2014-06-30 12:11:29', '1999-12-06 04:48:27', '1988-06-21 15:30:22', 2, 5, NULL);
INSERT INTO logs VALUES (310, '192.168.156.165', 'koelpin.biz', '', '2014-03-27 10:50:21', '2002-05-22 18:37:43', '1995-12-10 12:41:07', 2, 4, NULL);
INSERT INTO logs VALUES (311, '10.31.87.57', 'upton.com', '', '2014-05-29 11:23:50', '2004-05-14 23:28:25', '1987-02-24 20:29:31', 2, 10, NULL);
INSERT INTO logs VALUES (312, '192.168.189.76', 'wiegandmccullough.info', '', '2014-06-24 11:56:48', '1996-12-17 00:28:29', '1995-08-14 07:19:40', 4, 5, NULL);
INSERT INTO logs VALUES (313, '192.168.229.65', 'ward.com', '', '2014-05-11 10:02:38', '2002-09-18 09:42:57', '1980-09-23 03:16:50', 6, 6, NULL);
INSERT INTO logs VALUES (314, '10.157.59.229', 'heidenreich.com', '', '2014-03-18 09:26:08', '1976-02-01 15:23:07', '2009-11-12 03:37:34', 5, 6, NULL);
INSERT INTO logs VALUES (315, '192.168.123.205', 'boscorunolfsson.org', '', '2014-03-18 19:10:12', '1975-04-11 23:43:43', '1975-07-10 16:47:17', 6, 6, NULL);
INSERT INTO logs VALUES (316, '192.168.116.106', 'bosco.com', '', '2014-06-03 11:24:50', '1975-01-07 08:59:23', '2010-04-18 03:08:08', 6, 8, NULL);
INSERT INTO logs VALUES (317, '192.168.134.119', 'yostprosacco.info', '', '2014-03-11 07:56:21', '1996-10-24 05:20:51', '1985-07-03 06:06:52', 2, 2, NULL);
INSERT INTO logs VALUES (318, '192.168.159.131', 'sporerraynor.com', '', '2014-06-20 18:02:51', '1977-06-18 20:39:00', '2011-06-26 16:28:38', 6, 6, NULL);
INSERT INTO logs VALUES (319, '10.251.239.16', 'dicki.org', '', '2014-05-31 11:50:43', '1999-03-08 20:37:43', '1996-10-28 14:36:34', 6, 2, NULL);
INSERT INTO logs VALUES (320, '192.168.79.61', 'okuneva.org', '', '2014-06-17 09:18:12', '1979-01-21 22:54:00', '1988-06-04 20:56:57', 4, 4, NULL);
INSERT INTO logs VALUES (321, '192.168.151.184', 'koelpindaugherty.com', '', '2014-06-14 18:12:21', '2007-02-17 05:21:59', '1972-05-17 14:19:31', 2, 3, NULL);
INSERT INTO logs VALUES (322, '10.16.85.108', 'balistreri.com', '', '2014-05-10 22:35:57', '2000-06-04 23:09:45', '1994-03-30 20:40:01', 6, 3, NULL);
INSERT INTO logs VALUES (323, '192.168.198.167', 'macejkovicschowalter.net', '', '2014-06-05 00:32:25', '2005-06-18 20:19:52', '2010-10-03 21:32:09', 5, 8, NULL);
INSERT INTO logs VALUES (324, '10.104.147.245', 'schiller.com', '', '2014-05-05 15:05:46', '1973-04-08 14:47:05', '1995-12-18 10:08:28', 1, 5, NULL);
INSERT INTO logs VALUES (325, '10.43.152.204', 'stokesconn.com', '', '2014-04-18 02:08:34', '2004-04-10 18:54:13', '1992-01-18 18:27:35', 3, 8, NULL);
INSERT INTO logs VALUES (326, '10.135.250.40', 'towne.com', '', '2014-04-16 08:51:49', '1983-04-05 19:48:40', '2003-06-17 13:16:20', 5, 5, NULL);
INSERT INTO logs VALUES (327, '10.178.230.6', 'rippin.com', '', '2014-05-13 09:59:09', '1983-04-05 02:20:59', '1987-09-26 13:52:17', 3, 2, NULL);
INSERT INTO logs VALUES (328, '10.89.204.36', 'goyette.com', '', '2014-05-29 09:30:41', '2002-05-28 03:39:28', '1999-11-08 03:34:18', 1, 9, NULL);
INSERT INTO logs VALUES (329, '192.168.48.62', 'trantow.com', '', '2014-05-31 16:22:07', '1992-04-17 13:15:39', '2006-01-10 08:49:44', 4, 10, NULL);
INSERT INTO logs VALUES (330, '10.154.177.188', 'carter.net', '', '2014-04-06 10:42:28', '1971-05-02 07:04:09', '1970-10-14 10:43:04', 6, 9, NULL);
INSERT INTO logs VALUES (331, '10.34.244.70', 'kshlerin.net', '', '2014-04-12 13:12:52', '1986-03-07 04:58:09', '2012-02-28 14:12:30', 5, 4, NULL);
INSERT INTO logs VALUES (332, '192.168.243.77', 'powlowski.info', '', '2014-06-22 10:47:19', '2009-10-01 00:52:46', '1989-07-30 18:51:51', 1, 7, NULL);
INSERT INTO logs VALUES (333, '192.168.101.191', 'jaskolski.biz', '', '2014-05-23 10:35:06', '1979-01-06 02:49:49', '1972-04-11 08:11:31', 1, 11, NULL);
INSERT INTO logs VALUES (334, '192.168.251.204', 'stamm.com', '', '2014-04-03 19:23:50', '1980-02-25 18:19:37', '1970-03-19 04:46:33', 1, 7, NULL);
INSERT INTO logs VALUES (335, '192.168.163.129', 'kiehn.info', '', '2014-06-09 02:31:31', '1982-08-15 16:16:11', '2001-09-26 18:37:48', 4, 10, NULL);
INSERT INTO logs VALUES (336, '10.219.46.22', 'keebler.com', '', '2014-05-24 23:00:43', '2014-05-21 04:39:48', '2000-07-11 12:40:43', 1, 11, NULL);
INSERT INTO logs VALUES (337, '192.168.206.110', 'abernathybeier.com', '', '2014-05-05 14:55:54', '1984-08-18 11:00:45', '2006-08-09 23:32:15', 1, 7, NULL);
INSERT INTO logs VALUES (338, '192.168.33.178', 'schneider.com', '', '2014-05-03 00:36:26', '1989-12-20 16:38:56', '1992-03-02 04:00:09', 4, 6, NULL);
INSERT INTO logs VALUES (339, '10.240.174.119', 'hyatt.com', '', '2014-07-05 22:58:48', '1976-09-20 14:31:54', '1999-04-04 11:20:01', 6, 3, NULL);
INSERT INTO logs VALUES (340, '192.168.101.14', 'altenwerth.com', '', '2014-04-19 02:34:44', '1997-01-13 16:54:44', '1997-03-30 11:16:00', 5, 3, NULL);
INSERT INTO logs VALUES (341, '192.168.81.192', 'schimmel.net', '', '2014-04-18 17:12:43', '2002-03-22 09:29:07', '2006-10-09 20:33:21', 3, 3, NULL);
INSERT INTO logs VALUES (342, '192.168.212.245', 'reichertschneider.biz', '', '2014-06-21 19:06:52', '1977-01-11 20:47:16', '2007-03-31 12:57:40', 5, 4, NULL);
INSERT INTO logs VALUES (343, '10.55.243.110', 'oreilly.biz', '', '2014-03-24 09:26:20', '2003-09-23 11:50:45', '2008-11-12 05:28:22', 2, 5, NULL);
INSERT INTO logs VALUES (344, '192.168.224.132', 'dubuquejacobs.com', '', '2014-04-16 17:22:36', '2011-04-30 12:58:42', '2007-09-28 08:20:20', 4, 4, NULL);
INSERT INTO logs VALUES (345, '10.69.32.187', 'schinner.net', '', '2014-05-28 00:41:06', '1973-10-20 12:18:00', '1972-09-23 10:08:09', 5, 3, NULL);
INSERT INTO logs VALUES (346, '192.168.24.68', 'reillyvolkman.org', '', '2014-05-18 03:05:13', '2012-10-04 13:37:33', '2005-10-30 19:06:59', 2, 9, NULL);
INSERT INTO logs VALUES (347, '192.168.84.99', 'brown.biz', '', '2014-05-17 17:15:10', '1974-06-05 07:22:30', '1996-06-12 17:46:20', 4, 10, NULL);
INSERT INTO logs VALUES (348, '10.129.176.118', 'hilpert.com', '', '2014-04-14 10:24:58', '1973-07-10 20:23:35', '1997-03-24 04:39:54', 6, 4, NULL);
INSERT INTO logs VALUES (349, '192.168.87.69', 'cormiertremblay.com', '', '2014-05-02 04:10:33', '2003-07-12 06:39:38', '2013-08-25 19:32:29', 3, 9, NULL);
INSERT INTO logs VALUES (350, '10.175.9.53', 'lubowitz.info', '', '2014-07-01 23:53:30', '1997-06-18 20:50:53', '1996-07-28 15:45:53', 6, 2, NULL);
INSERT INTO logs VALUES (351, '10.224.36.14', 'hudsonstrosin.com', '', '2014-03-18 22:46:24', '1979-03-04 12:02:49', '2007-06-06 22:36:53', 6, 8, NULL);
INSERT INTO logs VALUES (352, '192.168.229.144', 'pollichcrooks.com', '', '2014-03-21 15:39:30', '2003-01-21 06:28:28', '1993-06-11 02:51:37', 5, 6, NULL);
INSERT INTO logs VALUES (353, '10.183.230.215', 'strackefarrell.org', '', '2014-04-16 22:51:14', '1987-02-14 19:16:14', '1990-12-21 17:40:24', 4, 2, NULL);
INSERT INTO logs VALUES (354, '10.45.236.31', 'williamson.biz', '', '2014-05-06 00:19:55', '2008-05-30 04:36:31', '1982-02-21 18:30:40', 5, 4, NULL);
INSERT INTO logs VALUES (355, '10.22.10.164', 'dicki.com', '', '2014-04-09 17:23:08', '1990-05-07 05:54:56', '2008-02-08 01:58:39', 5, 1, NULL);
INSERT INTO logs VALUES (356, '192.168.144.183', 'bergnaum.com', '', '2014-03-19 13:25:59', '1980-08-09 21:04:20', '2006-04-28 15:26:06', 6, 1, NULL);
INSERT INTO logs VALUES (357, '10.134.234.135', 'rosenbaum.com', '', '2014-05-16 06:20:29', '1973-05-19 00:34:08', '1991-09-19 11:20:56', 4, 7, NULL);
INSERT INTO logs VALUES (358, '10.28.176.229', 'toy.org', '', '2014-04-03 06:10:38', '2002-09-05 19:37:09', '1991-12-31 19:10:14', 2, 4, NULL);
INSERT INTO logs VALUES (359, '10.195.101.112', 'powlowski.com', '', '2014-05-21 19:34:21', '1974-12-27 17:23:44', '2001-08-18 02:53:15', 2, 4, NULL);
INSERT INTO logs VALUES (360, '10.133.25.249', 'blanda.info', '', '2014-04-10 01:59:24', '2009-02-12 19:25:56', '2003-08-12 13:21:33', 2, 9, NULL);
INSERT INTO logs VALUES (361, '192.168.129.159', 'schumm.com', '', '2014-05-25 17:21:27', '2004-11-16 03:23:09', '1986-02-12 15:05:00', 4, 10, NULL);
INSERT INTO logs VALUES (362, '192.168.13.232', 'ward.org', '', '2014-07-05 01:53:54', '2012-07-12 01:28:09', '1971-07-03 08:22:13', 2, 6, NULL);
INSERT INTO logs VALUES (363, '192.168.92.53', 'zboncak.com', '', '2014-03-15 19:03:00', '1994-08-20 08:33:45', '1985-04-11 04:13:04', 3, 10, NULL);
INSERT INTO logs VALUES (364, '10.240.115.224', 'schmittschmidt.com', '', '2014-04-28 22:17:15', '1987-11-06 13:05:29', '2000-08-22 05:55:43', 1, 4, NULL);
INSERT INTO logs VALUES (365, '10.32.183.18', 'quigley.com', '', '2014-07-03 04:19:24', '1991-12-09 01:43:52', '2000-09-23 16:30:05', 1, 7, NULL);
INSERT INTO logs VALUES (366, '10.112.57.0', 'price.info', '', '2014-06-24 09:36:22', '1992-09-15 14:17:52', '1973-04-13 02:16:11', 4, 4, NULL);
INSERT INTO logs VALUES (367, '192.168.9.68', 'vandervorttreutel.com', '', '2014-04-15 07:39:23', '1972-04-12 12:22:10', '2001-04-13 13:55:34', 2, 10, NULL);
INSERT INTO logs VALUES (368, '192.168.35.15', 'cassin.info', '', '2014-06-15 02:02:08', '1997-01-23 05:14:42', '1984-11-30 15:38:03', 6, 4, NULL);
INSERT INTO logs VALUES (369, '10.161.97.10', 'vandervort.info', '', '2014-05-24 02:58:20', '1988-02-19 13:38:23', '1974-01-09 12:59:04', 5, 5, NULL);
INSERT INTO logs VALUES (370, '192.168.153.238', 'wolff.net', '', '2014-07-07 22:08:00', '2002-01-31 14:15:48', '1986-04-19 12:38:40', 1, 7, NULL);
INSERT INTO logs VALUES (371, '10.247.177.213', 'connkuhn.com', '', '2014-05-21 04:23:36', '1972-01-26 16:27:50', '1973-05-01 10:25:49', 6, 11, NULL);
INSERT INTO logs VALUES (372, '192.168.38.188', 'shields.biz', '', '2014-07-01 00:55:54', '1986-11-09 17:28:36', '2003-04-27 00:26:05', 6, 5, NULL);
INSERT INTO logs VALUES (373, '192.168.202.214', 'tromp.com', '', '2014-06-02 07:24:38', '2004-10-30 21:39:10', '1986-07-26 05:02:16', 6, 9, NULL);
INSERT INTO logs VALUES (374, '10.62.152.118', 'bahringerhowell.com', '', '2014-05-22 01:29:32', '1974-06-13 12:49:55', '1974-04-18 09:01:17', 5, 8, NULL);
INSERT INTO logs VALUES (375, '10.11.209.16', 'schmittmuller.com', '', '2014-07-02 06:42:37', '2009-04-01 05:41:19', '1975-06-22 11:33:03', 1, 2, NULL);
INSERT INTO logs VALUES (376, '10.228.214.183', 'ernser.info', '', '2014-04-26 15:11:00', '1976-01-06 11:54:34', '1995-01-10 07:12:01', 3, 8, NULL);
INSERT INTO logs VALUES (377, '192.168.102.48', 'marksschneider.com', '', '2014-04-04 15:32:25', '1989-05-14 11:01:33', '1985-10-31 04:23:16', 1, 7, NULL);
INSERT INTO logs VALUES (378, '192.168.9.33', 'jacobson.com', '', '2014-04-01 03:15:29', '1980-08-25 06:07:50', '1982-10-30 08:49:01', 3, 10, NULL);
INSERT INTO logs VALUES (379, '10.18.63.184', 'langosh.com', '', '2014-04-18 05:00:50', '1977-05-31 22:16:29', '1972-01-19 10:01:16', 2, 7, NULL);
INSERT INTO logs VALUES (380, '10.69.130.34', 'halvorson.biz', '', '2014-04-09 08:38:25', '1996-10-15 12:54:01', '1975-10-09 15:28:08', 6, 9, NULL);
INSERT INTO logs VALUES (381, '10.71.140.184', 'smithamhermiston.info', '', '2014-04-18 09:39:45', '1986-02-28 03:14:12', '1975-08-28 04:31:28', 4, 7, NULL);
INSERT INTO logs VALUES (382, '10.74.100.207', 'wehner.biz', '', '2014-06-21 14:10:13', '1989-05-07 12:34:35', '1971-12-10 09:28:40', 2, 2, NULL);
INSERT INTO logs VALUES (383, '192.168.23.129', 'spencerbauch.com', '', '2014-06-17 12:15:34', '2013-06-13 05:01:27', '1998-05-25 02:23:13', 6, 5, NULL);
INSERT INTO logs VALUES (384, '10.157.122.122', 'hudsonflatley.net', '', '2014-04-02 16:59:24', '1975-05-24 00:02:30', '2008-09-17 05:53:36', 6, 7, NULL);
INSERT INTO logs VALUES (385, '192.168.122.53', 'schillerroberts.org', '', '2014-06-15 18:01:03', '2009-01-04 22:57:19', '2000-10-04 00:22:57', 4, 11, NULL);
INSERT INTO logs VALUES (386, '192.168.124.253', 'heaneymarks.biz', '', '2014-06-08 16:08:55', '1985-03-24 13:40:58', '1985-05-19 03:58:09', 2, 11, NULL);
INSERT INTO logs VALUES (387, '10.196.133.21', 'schuster.com', '', '2014-04-20 11:01:21', '2009-01-06 18:50:30', '1998-02-09 23:01:00', 5, 3, NULL);
INSERT INTO logs VALUES (388, '192.168.100.220', 'millerlind.org', '', '2014-05-22 20:13:25', '1978-09-21 03:08:37', '1980-04-09 02:00:24', 6, 4, NULL);
INSERT INTO logs VALUES (389, '10.138.48.225', 'medhurstrowe.com', '', '2014-03-20 03:20:33', '1992-02-24 17:35:30', '1973-12-30 23:55:45', 4, 3, NULL);
INSERT INTO logs VALUES (390, '192.168.38.44', 'bogan.org', '', '2014-04-07 23:04:23', '1977-10-20 23:01:06', '1995-11-04 22:50:15', 5, 11, NULL);
INSERT INTO logs VALUES (391, '10.206.35.166', 'mcdermott.com', '', '2014-06-08 09:02:44', '1996-04-10 10:32:15', '1994-02-19 06:52:52', 3, 10, NULL);
INSERT INTO logs VALUES (392, '192.168.139.52', 'dibbert.com', '', '2014-05-20 23:31:22', '1978-09-16 16:02:36', '2009-04-20 10:03:37', 3, 8, NULL);
INSERT INTO logs VALUES (393, '10.219.184.63', 'dibbert.com', '', '2014-05-24 05:11:46', '1990-04-19 12:38:00', '1974-12-24 09:10:54', 2, 5, NULL);
INSERT INTO logs VALUES (394, '10.231.196.150', 'runolfsdottir.net', '', '2014-03-12 09:14:46', '1997-11-06 03:26:53', '1987-06-11 05:28:37', 5, 3, NULL);
INSERT INTO logs VALUES (395, '10.70.101.114', 'johnston.org', '', '2014-04-02 08:41:25', '2004-10-28 08:19:10', '1981-06-03 01:05:19', 4, 2, NULL);
INSERT INTO logs VALUES (396, '10.219.146.51', 'heaneygrimes.com', '', '2014-06-11 12:01:08', '2005-10-31 01:53:17', '2009-05-24 21:21:01', 1, 2, NULL);
INSERT INTO logs VALUES (397, '10.176.39.234', 'bauch.com', '', '2014-06-06 04:03:19', '1984-03-07 12:40:52', '1977-03-09 04:39:41', 5, 7, NULL);
INSERT INTO logs VALUES (398, '10.142.181.63', 'medhurst.info', '', '2014-06-24 14:09:51', '1974-03-11 16:09:24', '1978-03-20 12:41:01', 3, 9, NULL);
INSERT INTO logs VALUES (399, '10.172.142.102', 'bogan.com', '', '2014-03-24 20:37:05', '2013-04-09 03:27:15', '2000-06-10 02:52:26', 3, 8, NULL);
INSERT INTO logs VALUES (400, '10.196.57.72', 'littlebatz.com', '', '2014-04-19 17:02:31', '1996-06-16 20:14:36', '1984-09-01 09:30:02', 6, 1, NULL);
INSERT INTO logs VALUES (401, '10.184.127.194', 'rohanromaguera.com', '', '2014-06-03 18:13:33', '2003-12-20 13:59:34', '1992-07-03 20:42:53', 2, 3, NULL);
INSERT INTO logs VALUES (402, '10.195.165.185', 'roberts.org', '', '2014-03-24 05:57:00', '2009-10-24 01:16:03', '2013-05-10 03:00:49', 3, 7, NULL);
INSERT INTO logs VALUES (403, '192.168.27.152', 'altenwerthschuster.com', '', '2014-04-24 20:55:10', '1985-10-07 20:52:44', '1984-09-25 01:24:41', 5, 2, NULL);
INSERT INTO logs VALUES (404, '192.168.60.152', 'hyatt.com', '', '2014-06-09 11:11:58', '2002-03-16 22:08:35', '1998-10-01 17:10:36', 3, 5, NULL);
INSERT INTO logs VALUES (405, '192.168.252.120', 'goyettebins.org', '', '2014-05-19 16:28:58', '2006-11-14 04:10:19', '2012-11-14 02:46:58', 5, 11, NULL);
INSERT INTO logs VALUES (406, '192.168.160.100', 'bednar.net', '', '2014-03-15 19:13:58', '1981-01-17 13:00:58', '1990-08-15 15:54:58', 1, 7, NULL);
INSERT INTO logs VALUES (407, '192.168.1.136', 'west.com', '', '2014-05-07 05:18:27', '1972-08-23 05:22:57', '1984-01-28 13:26:56', 6, 2, NULL);
INSERT INTO logs VALUES (408, '192.168.115.127', 'abshirelubowitz.com', '', '2014-05-23 00:05:38', '1974-11-08 00:07:25', '1978-01-17 15:38:03', 4, 9, NULL);
INSERT INTO logs VALUES (409, '192.168.52.21', 'legros.com', '', '2014-05-28 02:09:10', '1986-05-19 10:30:37', '2003-12-06 13:28:43', 3, 2, NULL);
INSERT INTO logs VALUES (410, '10.212.116.111', 'rosenbaumkiehn.info', '', '2014-05-12 15:15:10', '1981-11-04 07:57:48', '1999-10-15 16:15:18', 5, 5, NULL);
INSERT INTO logs VALUES (411, '10.64.36.250', 'bayerschaefer.net', '', '2014-06-03 06:08:59', '2002-05-29 16:03:28', '1985-06-23 06:48:40', 3, 2, NULL);
INSERT INTO logs VALUES (412, '10.32.23.90', 'nitzsche.net', '', '2014-06-23 01:17:38', '2014-07-01 17:19:26', '2000-04-23 04:44:20', 1, 10, NULL);
INSERT INTO logs VALUES (413, '10.48.245.171', 'corwin.com', '', '2014-05-13 04:40:59', '2013-07-16 22:49:56', '2006-04-01 10:16:56', 6, 8, NULL);
INSERT INTO logs VALUES (414, '10.88.215.107', 'spencer.info', '', '2014-06-16 08:25:09', '2008-06-02 06:50:23', '1997-08-07 12:57:55', 3, 10, NULL);
INSERT INTO logs VALUES (415, '10.123.91.161', 'weimannschaefer.com', '', '2014-05-04 06:57:35', '1975-02-04 13:53:29', '1980-12-31 09:21:45', 2, 9, NULL);
INSERT INTO logs VALUES (416, '192.168.177.32', 'okeefe.net', '', '2014-05-23 09:08:08', '1970-10-26 20:14:35', '1996-07-04 07:08:55', 1, 9, NULL);
INSERT INTO logs VALUES (417, '10.207.235.157', 'haagraynor.com', '', '2014-07-05 11:31:47', '2008-04-29 15:56:33', '1983-12-28 21:21:37', 1, 4, NULL);
INSERT INTO logs VALUES (418, '192.168.175.152', 'fahey.com', '', '2014-05-22 01:20:34', '1978-07-06 21:12:30', '1981-11-05 08:34:00', 1, 10, NULL);
INSERT INTO logs VALUES (419, '10.239.154.4', 'robelbreitenberg.biz', '', '2014-04-03 07:35:17', '1979-11-10 22:50:16', '1975-03-09 17:37:27', 4, 7, NULL);
INSERT INTO logs VALUES (420, '10.165.42.80', 'blanda.com', '', '2014-06-17 10:55:41', '1982-03-15 11:22:48', '1996-08-10 06:20:15', 3, 8, NULL);
INSERT INTO logs VALUES (421, '10.252.148.15', 'jaskolskirolfson.com', '', '2014-05-10 09:01:34', '2008-04-15 02:36:34', '1995-04-26 15:27:18', 5, 5, NULL);
INSERT INTO logs VALUES (422, '10.140.150.233', 'schuppekuhic.net', '', '2014-05-03 16:00:22', '1995-12-18 00:55:34', '1979-05-13 19:55:36', 1, 7, NULL);
INSERT INTO logs VALUES (423, '10.130.230.192', 'thompson.info', '', '2014-06-03 14:22:09', '1995-07-11 00:27:21', '1985-08-06 09:23:58', 5, 1, NULL);
INSERT INTO logs VALUES (424, '192.168.143.180', 'kris.com', '', '2014-05-06 18:30:17', '2003-01-23 03:49:47', '1990-02-20 11:30:52', 3, 9, NULL);
INSERT INTO logs VALUES (425, '10.71.222.98', 'marquardt.com', '', '2014-03-12 20:46:19', '1981-10-11 02:07:41', '1972-12-31 07:08:02', 4, 3, NULL);
INSERT INTO logs VALUES (426, '192.168.35.236', 'mcglynn.com', '', '2014-06-04 07:27:13', '1981-11-05 13:38:49', '2009-11-29 18:04:12', 6, 3, NULL);
INSERT INTO logs VALUES (427, '10.0.184.238', 'mccullough.com', '', '2014-05-17 19:30:30', '1981-07-20 03:06:51', '1998-08-13 17:45:05', 6, 3, NULL);
INSERT INTO logs VALUES (428, '192.168.146.77', 'kohler.info', '', '2014-04-28 16:24:14', '1980-02-27 12:22:38', '1995-10-27 15:11:05', 4, 5, NULL);
INSERT INTO logs VALUES (429, '10.28.167.53', 'schroeder.com', '', '2014-03-31 11:02:54', '1982-12-06 07:33:40', '1998-05-23 00:00:23', 5, 4, NULL);
INSERT INTO logs VALUES (430, '192.168.240.224', 'sawayn.com', '', '2014-04-12 01:42:24', '1987-01-21 11:51:38', '2004-05-24 00:57:43', 6, 6, NULL);
INSERT INTO logs VALUES (431, '10.129.191.199', 'larson.com', '', '2014-04-10 19:08:28', '2001-05-06 10:43:26', '1972-05-23 06:11:42', 1, 1, NULL);
INSERT INTO logs VALUES (432, '192.168.62.186', 'crona.com', '', '2014-06-07 00:15:26', '1988-03-05 03:02:46', '1983-10-12 11:05:38', 2, 2, NULL);
INSERT INTO logs VALUES (433, '10.176.159.84', 'krajcik.com', '', '2014-04-06 14:10:43', '1996-02-26 22:20:03', '2008-03-28 16:02:52', 4, 9, NULL);
INSERT INTO logs VALUES (434, '10.108.241.33', 'schillerhyatt.info', '', '2014-06-21 09:55:20', '1993-08-09 04:17:04', '1973-10-13 13:25:25', 5, 4, NULL);
INSERT INTO logs VALUES (435, '10.164.185.141', 'klockofarrell.com', '', '2014-05-09 01:45:13', '1995-06-17 21:52:41', '1987-09-22 07:49:51', 4, 2, NULL);
INSERT INTO logs VALUES (436, '192.168.195.164', 'dickens.com', '', '2014-07-08 01:24:53', '1982-01-04 07:46:59', '1971-10-27 19:54:17', 5, 2, NULL);
INSERT INTO logs VALUES (437, '192.168.46.177', 'oberbrunner.com', '', '2014-03-28 16:21:38', '1988-11-26 00:50:58', '2007-06-01 07:27:36', 1, 3, NULL);
INSERT INTO logs VALUES (438, '192.168.110.115', 'lebsack.net', '', '2014-06-04 09:19:48', '2004-01-08 06:16:51', '1983-06-20 07:44:15', 2, 5, NULL);
INSERT INTO logs VALUES (439, '192.168.31.73', 'osinskibartell.com', '', '2014-03-22 11:00:27', '1977-05-12 19:41:11', '1997-12-28 19:01:37', 3, 6, NULL);
INSERT INTO logs VALUES (440, '192.168.57.172', 'schillermayer.com', '', '2014-06-22 11:40:58', '2003-08-29 17:10:23', '1989-07-04 12:02:15', 6, 1, NULL);
INSERT INTO logs VALUES (441, '10.187.145.226', 'hintz.com', '', '2014-05-04 11:47:30', '1971-11-25 17:53:06', '1998-08-07 19:03:49', 3, 1, NULL);
INSERT INTO logs VALUES (442, '10.50.188.119', 'collierstamm.info', '', '2014-03-12 04:43:59', '1984-03-18 18:31:29', '1984-08-22 20:09:54', 6, 9, NULL);
INSERT INTO logs VALUES (443, '10.208.214.86', 'wilkinson.info', '', '2014-03-14 15:59:34', '1982-04-16 18:54:38', '2013-03-23 23:21:03', 4, 7, NULL);
INSERT INTO logs VALUES (444, '192.168.212.9', 'cremintreutel.com', '', '2014-06-25 12:35:49', '1984-10-28 04:21:52', '2013-12-09 10:24:58', 4, 1, NULL);
INSERT INTO logs VALUES (445, '192.168.100.216', 'kshlerin.com', '', '2014-04-04 01:33:44', '2005-05-30 08:38:05', '1994-01-28 13:28:06', 5, 9, NULL);
INSERT INTO logs VALUES (446, '192.168.45.90', 'eichmann.com', '', '2014-05-06 19:40:32', '1976-05-20 02:43:47', '1996-12-10 19:40:45', 6, 7, NULL);
INSERT INTO logs VALUES (447, '10.92.132.153', 'grimesmoore.biz', '', '2014-06-16 05:12:51', '1971-06-22 03:38:53', '1977-05-03 23:57:23', 4, 6, NULL);
INSERT INTO logs VALUES (448, '192.168.37.8', 'roobrice.com', '', '2014-07-01 03:16:35', '2010-01-20 22:58:33', '1997-11-08 05:31:11', 5, 1, NULL);
INSERT INTO logs VALUES (449, '192.168.116.78', 'kilbackbernhard.com', '', '2014-04-20 17:56:59', '2003-06-17 07:10:38', '1970-07-23 14:20:30', 4, 5, NULL);
INSERT INTO logs VALUES (450, '192.168.219.62', 'schaeferlangworth.com', '', '2014-04-27 22:51:14', '2005-10-11 07:12:23', '1984-05-17 01:13:40', 4, 4, NULL);
INSERT INTO logs VALUES (451, '192.168.172.16', 'batz.org', '', '2014-04-26 02:47:02', '2007-01-26 17:24:48', '2001-01-08 23:08:58', 3, 4, NULL);
INSERT INTO logs VALUES (452, '192.168.195.230', 'luettgen.net', '', '2014-06-26 12:57:23', '1973-08-19 12:17:27', '1995-01-31 09:25:38', 1, 4, NULL);
INSERT INTO logs VALUES (453, '192.168.212.72', 'koepphomenick.com', '', '2014-03-18 13:59:56', '1979-02-11 03:35:27', '1977-01-24 04:50:46', 4, 3, NULL);
INSERT INTO logs VALUES (454, '192.168.96.186', 'carterheaney.info', '', '2014-04-24 00:55:10', '1982-12-17 08:51:28', '2003-06-02 13:20:32', 3, 11, NULL);
INSERT INTO logs VALUES (455, '192.168.114.196', 'schuster.com', '', '2014-04-21 08:50:54', '1990-07-07 00:19:14', '2001-08-14 12:46:11', 6, 9, NULL);
INSERT INTO logs VALUES (456, '10.19.5.202', 'pfannerstillreichel.biz', '', '2014-07-06 11:31:26', '1991-01-28 07:28:11', '1986-01-31 12:05:25', 4, 6, NULL);
INSERT INTO logs VALUES (457, '192.168.185.167', 'hoeger.com', '', '2014-04-01 17:05:32', '1995-05-09 09:33:01', '1972-03-17 21:59:46', 6, 2, NULL);
INSERT INTO logs VALUES (458, '192.168.112.175', 'emardhauck.info', '', '2014-07-06 22:41:45', '1986-01-21 16:52:46', '1995-08-29 06:49:49', 5, 5, NULL);
INSERT INTO logs VALUES (459, '10.72.233.211', 'nikolauslabadie.org', '', '2014-05-18 15:09:21', '1978-10-17 14:16:55', '1989-12-30 05:51:44', 4, 1, NULL);
INSERT INTO logs VALUES (460, '10.84.121.242', 'langoconner.info', '', '2014-04-09 15:33:13', '1983-03-19 04:06:37', '1971-10-08 18:42:45', 2, 9, NULL);
INSERT INTO logs VALUES (461, '192.168.146.123', 'greenfelderrowe.org', '', '2014-03-14 08:13:44', '1971-12-05 10:32:02', '2006-04-15 14:20:22', 4, 6, NULL);
INSERT INTO logs VALUES (462, '192.168.199.49', 'abernathy.com', '', '2014-05-01 00:27:46', '1992-07-26 06:03:25', '1998-07-23 23:12:55', 4, 9, NULL);
INSERT INTO logs VALUES (463, '10.172.34.198', 'gerlach.net', '', '2014-06-16 01:27:37', '2010-02-05 10:46:15', '2008-06-03 15:13:32', 1, 2, NULL);
INSERT INTO logs VALUES (464, '192.168.30.48', 'pfannerstillconroy.com', '', '2014-03-19 06:51:21', '2007-07-22 06:12:31', '2012-04-03 18:59:42', 4, 8, NULL);
INSERT INTO logs VALUES (465, '192.168.176.248', 'ortiz.com', '', '2014-03-27 05:19:56', '2002-01-11 03:31:58', '1978-03-16 09:50:50', 1, 6, NULL);
INSERT INTO logs VALUES (466, '10.145.215.221', 'dareoreilly.info', '', '2014-06-18 02:18:12', '2001-01-19 09:38:53', '1982-03-09 19:00:25', 3, 7, NULL);
INSERT INTO logs VALUES (467, '192.168.175.76', 'russel.com', '', '2014-03-10 20:02:46', '2008-07-19 13:14:51', '2012-08-28 03:42:44', 5, 10, NULL);
INSERT INTO logs VALUES (468, '10.195.118.191', 'hodkiewicz.info', '', '2014-03-24 14:38:14', '2009-07-08 01:24:35', '1974-06-20 20:38:35', 1, 7, NULL);
INSERT INTO logs VALUES (469, '192.168.82.16', 'labadie.info', '', '2014-04-25 02:42:16', '2005-06-29 07:22:08', '1986-03-16 10:32:54', 3, 5, NULL);
INSERT INTO logs VALUES (470, '192.168.91.151', 'tremblayokeefe.com', '', '2014-06-21 20:46:14', '1992-05-29 18:33:49', '1999-06-29 00:52:15', 4, 2, NULL);
INSERT INTO logs VALUES (471, '10.36.99.189', 'hettingermedhurst.info', '', '2014-07-01 01:55:00', '1990-07-23 04:42:15', '1973-02-12 02:17:26', 4, 2, NULL);
INSERT INTO logs VALUES (472, '10.55.2.110', 'kirlin.biz', '', '2014-03-26 12:20:40', '1977-10-31 12:44:59', '2002-12-19 05:35:18', 4, 1, NULL);
INSERT INTO logs VALUES (473, '10.123.130.170', 'beahan.com', '', '2014-03-22 22:09:41', '2007-10-11 11:12:31', '1973-04-23 18:29:48', 1, 5, NULL);
INSERT INTO logs VALUES (474, '192.168.99.133', 'johnston.com', '', '2014-03-23 19:53:18', '1974-05-12 19:48:21', '1983-07-09 01:13:10', 2, 1, NULL);
INSERT INTO logs VALUES (475, '10.48.6.206', 'witting.com', '', '2014-03-19 08:22:19', '1989-07-15 03:09:22', '1979-04-28 08:41:55', 5, 11, NULL);
INSERT INTO logs VALUES (476, '192.168.108.163', 'sipes.net', '', '2014-05-04 13:30:38', '1987-05-15 08:20:21', '2011-04-11 15:46:20', 3, 6, NULL);
INSERT INTO logs VALUES (477, '192.168.195.83', 'schuster.com', '', '2014-03-25 02:04:06', '1997-11-04 14:41:14', '2000-12-07 23:31:06', 4, 2, NULL);
INSERT INTO logs VALUES (478, '10.38.216.166', 'yundt.com', '', '2014-04-14 22:43:09', '2009-11-23 06:25:18', '2007-04-11 08:33:47', 6, 5, NULL);
INSERT INTO logs VALUES (479, '192.168.244.137', 'kesslerbauch.com', '', '2014-05-13 14:47:31', '1989-06-21 04:36:08', '2005-09-24 21:55:10', 2, 6, NULL);
INSERT INTO logs VALUES (480, '10.15.22.52', 'dickens.info', '', '2014-04-21 16:08:54', '1993-03-05 20:00:30', '2006-09-17 09:30:28', 6, 5, NULL);
INSERT INTO logs VALUES (481, '192.168.54.193', 'herzognikolaus.com', '', '2014-03-31 21:24:22', '1975-08-25 04:25:40', '1981-03-17 21:07:29', 5, 9, NULL);
INSERT INTO logs VALUES (482, '10.255.183.209', 'kassulkekshlerin.biz', '', '2014-06-23 03:46:59', '1971-06-27 15:00:39', '1993-04-13 09:11:33', 6, 2, NULL);
INSERT INTO logs VALUES (483, '192.168.193.47', 'jenkins.com', '', '2014-06-09 08:02:31', '1990-01-30 01:29:57', '1973-05-14 20:22:03', 4, 7, NULL);
INSERT INTO logs VALUES (484, '10.119.24.202', 'miller.com', '', '2014-05-02 07:07:04', '1978-12-23 15:19:24', '1980-11-08 03:01:26', 3, 2, NULL);
INSERT INTO logs VALUES (485, '192.168.196.65', 'lueilwitz.net', '', '2014-06-05 06:48:57', '2013-02-16 00:35:35', '2010-01-18 02:56:12', 5, 3, NULL);
INSERT INTO logs VALUES (486, '192.168.109.144', 'ohara.net', '', '2014-06-26 12:24:59', '1991-08-13 07:51:12', '1995-07-06 22:18:39', 4, 6, NULL);
INSERT INTO logs VALUES (487, '10.11.214.151', 'pfeffer.com', '', '2014-03-25 01:03:52', '1974-09-23 19:07:09', '1971-06-18 12:59:48', 6, 6, NULL);
INSERT INTO logs VALUES (488, '10.192.62.159', 'veumdibbert.com', '', '2014-04-20 16:49:49', '1984-06-16 03:38:25', '1997-09-05 15:28:17', 4, 3, NULL);
INSERT INTO logs VALUES (489, '10.28.67.12', 'koelpin.com', '', '2014-04-12 22:22:36', '1984-09-08 16:48:27', '1980-09-06 07:20:34', 1, 5, NULL);
INSERT INTO logs VALUES (490, '10.255.95.145', 'carroll.com', '', '2014-05-12 17:13:11', '1976-10-30 11:08:46', '1982-01-18 16:53:51', 1, 4, NULL);
INSERT INTO logs VALUES (491, '192.168.48.233', 'predovic.com', '', '2014-06-04 19:42:22', '1986-03-06 05:23:57', '1976-03-03 10:35:45', 1, 5, NULL);
INSERT INTO logs VALUES (492, '10.228.200.46', 'schinner.com', '', '2014-05-29 17:46:54', '1979-09-10 17:49:55', '2000-06-04 03:18:50', 4, 6, NULL);
INSERT INTO logs VALUES (493, '10.205.151.171', 'kiehn.com', '', '2014-06-28 03:53:10', '1974-08-23 11:09:35', '2007-06-13 12:12:17', 4, 2, NULL);
INSERT INTO logs VALUES (494, '10.150.150.46', 'stiedemann.net', '', '2014-06-05 18:32:43', '1979-11-21 20:39:42', '1998-02-08 03:49:26', 2, 4, NULL);
INSERT INTO logs VALUES (495, '10.65.33.20', 'sipeskiehn.net', '', '2014-05-12 16:09:51', '1985-02-13 13:49:05', '2001-12-11 03:19:45', 5, 11, NULL);
INSERT INTO logs VALUES (496, '10.122.4.91', 'johns.info', '', '2014-03-16 22:34:26', '1987-06-13 03:36:15', '2002-03-04 20:51:54', 2, 2, NULL);
INSERT INTO logs VALUES (497, '192.168.175.132', 'schamberger.net', '', '2014-06-06 01:44:37', '1997-07-13 14:51:14', '2009-06-03 09:55:20', 4, 2, NULL);
INSERT INTO logs VALUES (498, '10.220.32.73', 'moen.biz', '', '2014-05-29 00:48:25', '2004-05-21 02:05:42', '1986-09-12 16:01:24', 4, 8, NULL);
INSERT INTO logs VALUES (499, '192.168.215.6', 'hudsondurgan.biz', '', '2014-03-24 15:07:22', '2004-05-07 08:09:58', '1992-12-06 19:33:12', 3, 2, NULL);
INSERT INTO logs VALUES (500, '10.40.117.12', 'labadie.biz', '', '2014-07-04 05:15:18', '1979-10-03 17:13:31', '1970-11-26 20:14:18', 4, 7, NULL);
INSERT INTO logs VALUES (501, '::1', 'http://localhost/project_nhc/sites/public', '', '2014-07-10 19:02:04', '2014-07-10 19:02:04', '2014-07-10 19:02:04', 1, 1, 1);
INSERT INTO logs VALUES (502, '::1', 'http://localhost/project_nhc/sites/public', '', '2014-07-12 09:49:54', '2014-07-12 09:49:54', '2014-07-12 09:49:54', 1, 6, 1);
INSERT INTO logs VALUES (503, '::1', 'http://localhost/project_nhc/sites/public', '', '2014-07-13 10:25:12', '2014-07-13 10:25:12', '2014-07-13 10:25:12', 1, 7, 1);
INSERT INTO logs VALUES (504, '::1', 'http://localhost/project/sites/public', '', '2014-07-13 11:47:13', '2014-07-13 11:47:13', '2014-07-13 11:47:13', 1, 8, 1);
INSERT INTO logs VALUES (505, '::1', 'http://localhost/project/sites/public', '', '2014-07-15 21:57:55', '2014-07-15 21:57:55', '2014-07-15 21:57:55', 1, 5, 1);
INSERT INTO logs VALUES (506, '::1', 'http://localhost/project/sites/public', '', '2014-07-16 21:52:34', '2014-07-16 21:52:34', '2014-07-16 21:52:34', 1, 9, 1);
INSERT INTO logs VALUES (507, '::1', 'http://localhost/project/sites/public', '', '2014-07-17 22:03:42', '2014-07-17 22:03:42', '2014-07-17 22:03:42', 1, 1, 1);
INSERT INTO logs VALUES (508, '::1', 'http://localhost/project/sites/public', '', '2014-07-26 18:41:00', '2014-07-26 18:41:00', '2014-07-26 18:41:00', 1, 9, 1);
INSERT INTO logs VALUES (509, '::1', 'http://localhost/project/sites/public', '', '2014-09-23 21:57:10', '2014-09-23 21:57:10', '2014-09-23 21:57:10', 1, 3, 1);
INSERT INTO logs VALUES (510, '::1', 'http://localhost/project/sites/public', '', '2014-09-23 22:00:13', '2014-09-23 22:00:13', '2014-09-23 22:00:13', 1, 6, 9);
INSERT INTO logs VALUES (511, '::1', 'http://localhost/project/sites/public', '', '2014-09-25 09:24:21', '2014-09-25 09:24:21', '2014-09-25 09:24:21', 1, 4, 9);
INSERT INTO logs VALUES (512, '::1', 'http://localhost/project/sites/public', '', '2014-09-28 10:45:43', '2014-09-28 10:45:43', '2014-09-28 10:45:43', 1, 3, 9);
INSERT INTO logs VALUES (513, '192.168.1.117', 'http://192.168.1.102/project/sites/public', '', '2014-10-02 21:59:27', '2014-10-02 21:59:27', '2014-10-02 21:59:27', 1, 5, 1);
INSERT INTO logs VALUES (514, '::1', 'http://localhost/project/sites/public', '', '2014-10-02 23:41:59', '2014-10-02 23:41:59', '2014-10-02 23:41:59', 1, 4, 1);
INSERT INTO logs VALUES (515, '::1', 'http://localhost/project/sites/public', '', '2014-10-04 00:48:52', '2014-10-04 00:48:52', '2014-10-04 00:48:52', 1, 2, 1);
INSERT INTO logs VALUES (516, '::1', 'http://localhost/project/sites/public', '', '2014-10-04 00:53:44', '2014-10-04 00:53:44', '2014-10-04 00:53:44', 1, 11, 1);
INSERT INTO logs VALUES (517, '::1', 'http://localhost/project/sites/public', '', '2014-10-13 09:25:24', '2014-10-13 09:25:24', '2014-10-13 09:25:24', 1, 2, 1);
INSERT INTO logs VALUES (518, '::1', 'http://localhost/project/sites/public', '', '2014-10-13 09:31:43', '2014-10-13 09:31:43', '2014-10-13 09:31:43', 1, 1, 9);
INSERT INTO logs VALUES (519, '::1', 'http://localhost/project/sites/public', '', '2014-10-13 09:32:14', '2014-10-13 09:32:14', '2014-10-13 09:32:14', 4, 5, 10);
INSERT INTO logs VALUES (520, '::1', 'http://localhost/project/sites/public', '', '2014-10-13 09:32:43', '2014-10-13 09:32:43', '2014-10-13 09:32:43', 5, 6, 11);
INSERT INTO logs VALUES (521, '::1', 'http://localhost/project/sites/public', '', '2014-10-13 09:33:21', '2014-10-13 09:33:21', '2014-10-13 09:33:21', 4, 2, 12);
INSERT INTO logs VALUES (522, '::1', 'http://localhost/project/sites/public', '', '2014-10-13 09:34:22', '2014-10-13 09:34:22', '2014-10-13 09:34:22', 1, 6, 1);
INSERT INTO logs VALUES (523, '::1', 'http://localhost/project/sites/public', '', '2014-10-13 09:34:51', '2014-10-13 09:34:51', '2014-10-13 09:34:51', 6, 2, 14);
INSERT INTO logs VALUES (524, '::1', 'http://localhost/project/sites/public', '', '2014-10-13 09:43:11', '2014-10-13 09:43:11', '2014-10-13 09:43:11', 1, 6, 1);
INSERT INTO logs VALUES (525, '::1', 'http://localhost/project/sites/public', '', '2014-10-13 09:43:29', '2014-10-13 09:43:29', '2014-10-13 09:43:29', 1, 11, 16);
INSERT INTO logs VALUES (526, '::1', 'http://localhost/project/sites/public', '', '2014-10-13 09:43:48', '2014-10-13 09:43:48', '2014-10-13 09:43:48', 3, 7, 12);
INSERT INTO logs VALUES (527, '::1', 'http://localhost/project/sites/public', '', '2014-10-13 12:47:49', '2014-10-13 12:47:49', '2014-10-13 12:47:49', 1, 9, 1);
INSERT INTO logs VALUES (528, '::1', 'http://localhost/project/sites/public', '', '2014-10-13 12:48:32', '2014-10-13 12:48:32', '2014-10-13 12:48:32', 1, 10, 9);
INSERT INTO logs VALUES (529, '::1', 'http://localhost/project/sites/public', '', '2014-10-13 12:48:53', '2014-10-13 12:48:53', '2014-10-13 12:48:53', 4, 3, 10);
INSERT INTO logs VALUES (530, '::1', 'http://localhost/project/sites/public', '', '2014-10-13 12:49:31', '2014-10-13 12:49:31', '2014-10-13 12:49:31', 1, 5, 11);
INSERT INTO logs VALUES (531, '::1', 'http://localhost/project/sites/public', '', '2014-10-13 12:49:54', '2014-10-13 12:49:54', '2014-10-13 12:49:54', 3, 4, 12);
INSERT INTO logs VALUES (532, '::1', 'http://localhost/project/sites/public', '', '2014-10-13 12:50:10', '2014-10-13 12:50:10', '2014-10-13 12:50:10', 1, 3, 14);
INSERT INTO logs VALUES (533, '::1', 'http://localhost/project/sites/public', '', '2014-10-13 12:50:27', '2014-10-13 12:50:27', '2014-10-13 12:50:27', 1, 1, 15);
INSERT INTO logs VALUES (534, '::1', 'http://localhost/project/sites/public', '', '2014-10-13 12:50:46', '2014-10-13 12:50:46', '2014-10-13 12:50:46', 2, 1, 16);
INSERT INTO logs VALUES (535, '::1', 'http://localhost/project/sites/public', '', '2014-10-13 21:29:47', '2014-10-13 21:29:47', '2014-10-13 21:29:47', 1, 6, 9);
INSERT INTO logs VALUES (536, '::1', 'http://localhost/project/sites/public', '', '2014-10-13 21:34:17', '2014-10-13 21:34:17', '2014-10-13 21:34:17', 1, 5, 1);
INSERT INTO logs VALUES (537, '::1', 'http://localhost/project/sites/public', '', '2014-10-14 10:09:11', '2014-10-14 10:09:11', '2014-10-14 10:09:11', 4, 6, 10);
INSERT INTO logs VALUES (538, '::1', 'http://localhost/project/sites/public', '', '2014-10-14 10:09:46', '2014-10-14 10:09:46', '2014-10-14 10:09:46', 1, 5, 1);
INSERT INTO logs VALUES (539, '::1', 'http://localhost/project/sites/public', '', '2014-10-14 10:10:44', '2014-10-14 10:10:44', '2014-10-14 10:10:44', 4, 11, 10);
INSERT INTO logs VALUES (540, '::1', 'http://localhost/project/sites/public', '', '2014-10-14 10:11:39', '2014-10-14 10:11:39', '2014-10-14 10:11:39', 1, 3, 1);
INSERT INTO logs VALUES (541, '::1', 'http://localhost/project/sites/public', '', '2014-10-14 10:20:30', '2014-10-14 10:20:30', '2014-10-14 10:20:30', 4, 1, 10);
INSERT INTO logs VALUES (542, '::1', 'http://localhost/project/sites/public', '', '2014-10-14 11:02:28', '2014-10-14 11:02:28', '2014-10-14 11:02:28', 1, 1, 11);
INSERT INTO logs VALUES (543, '::1', 'http://localhost/project/sites/public', '', '2014-10-14 11:05:13', '2014-10-14 11:05:13', '2014-10-14 11:05:13', 3, 1, 12);
INSERT INTO logs VALUES (544, '::1', 'http://localhost/project/sites/public', '', '2014-10-14 11:11:15', '2014-10-14 11:11:15', '2014-10-14 11:11:15', 1, 4, 14);
INSERT INTO logs VALUES (545, '::1', 'http://localhost/project/sites/public', '', '2014-10-14 11:11:48', '2014-10-14 11:11:48', '2014-10-14 11:11:48', 1, 4, 15);
INSERT INTO logs VALUES (546, '::1', 'http://localhost/project/sites/public', '', '2014-10-14 11:13:15', '2014-10-14 11:13:15', '2014-10-14 11:13:15', 2, 11, 16);
INSERT INTO logs VALUES (547, '::1', 'http://localhost/project/sites/public', '', '2014-10-14 21:28:10', '2014-10-14 21:28:10', '2014-10-14 21:28:10', 1, 4, 1);
INSERT INTO logs VALUES (548, '::1', 'http://localhost/project/sites/public', '', '2014-10-14 22:45:39', '2014-10-14 22:45:39', '2014-10-14 22:45:39', 1, 5, 9);
INSERT INTO logs VALUES (549, '::1', 'http://localhost/project/sites/public', '', '2014-10-14 22:51:10', '2014-10-14 22:51:10', '2014-10-14 22:51:10', 2, 6, 16);
INSERT INTO logs VALUES (550, '::1', 'http://localhost/project/sites/public', '', '2014-10-15 10:51:26', '2014-10-15 10:51:26', '2014-10-15 10:51:26', 1, 5, 1);
INSERT INTO logs VALUES (551, '::1', 'http://localhost/project/sites/public', '', '2014-10-15 22:40:56', '2014-10-15 22:40:56', '2014-10-15 22:40:56', 1, 2, 9);
INSERT INTO logs VALUES (552, '::1', 'http://localhost/project/sites/public', '', '2014-10-15 22:41:35', '2014-10-15 22:41:35', '2014-10-15 22:41:35', 1, 8, 15);
INSERT INTO logs VALUES (553, '::1', 'http://localhost/project/sites/public', '', '2014-10-15 22:43:33', '2014-10-15 22:43:33', '2014-10-15 22:43:33', 1, 10, 9);
INSERT INTO logs VALUES (554, '::1', 'http://localhost/project/sites/public', '', '2014-10-15 22:45:29', '2014-10-15 22:45:29', '2014-10-15 22:45:29', 1, 1, 15);
INSERT INTO logs VALUES (555, '::1', 'http://localhost/project/sites/public', '', '2014-10-15 22:46:47', '2014-10-15 22:46:47', '2014-10-15 22:46:47', 1, 6, 9);
INSERT INTO logs VALUES (556, '::1', 'http://localhost/project/sites/public', '', '2014-10-15 22:47:20', '2014-10-15 22:47:20', '2014-10-15 22:47:20', 1, 10, 9);
INSERT INTO logs VALUES (557, '::1', 'http://localhost/project/sites/public', '', '2014-12-04 14:44:19', '2014-12-04 14:44:19', '2014-12-04 14:44:19', 1, 6, 1);
INSERT INTO logs VALUES (558, '::1', 'http://localhost/project/sites/public', '', '2014-12-04 14:46:40', '2014-12-04 14:46:40', '2014-12-04 14:46:40', 1, 2, 9);
INSERT INTO logs VALUES (559, '::1', 'http://localhost/project/sites/public', '', '2014-12-04 14:49:40', '2014-12-04 14:49:40', '2014-12-04 14:49:40', 1, 2, 1);
INSERT INTO logs VALUES (560, '::1', 'http://localhost/project/sites/public', '', '2014-12-07 13:16:26', '2014-12-07 13:16:26', '2014-12-07 13:16:26', 1, 10, 1);
INSERT INTO logs VALUES (561, '127.0.0.1', 'http://localhost/project/sites/public', '', '2014-12-07 13:20:15', '2014-12-07 13:20:15', '2014-12-07 13:20:15', 1, 5, 9);
INSERT INTO logs VALUES (562, '127.0.0.1', 'http://localhost/project/sites/public', '', '2014-12-07 13:58:44', '2014-12-07 13:58:44', '2014-12-07 13:58:44', 1, 9, 9);
INSERT INTO logs VALUES (563, '127.0.0.1', 'http://localhost/project/sites/public', '', '2014-12-07 16:18:53', '2014-12-07 16:18:53', '2014-12-07 16:18:53', 1, 1, 1);
INSERT INTO logs VALUES (564, '127.0.0.1', 'http://localhost/project/sites/public', '', '2014-12-07 16:27:24', '2014-12-07 16:27:24', '2014-12-07 16:27:24', 4, 1, 10);
INSERT INTO logs VALUES (565, '::1', 'http://localhost/project/sites/public', '', '2014-12-07 16:27:55', '2014-12-07 16:27:55', '2014-12-07 16:27:55', 1, 10, 9);
INSERT INTO logs VALUES (566, '127.0.0.1', 'http://localhost/project/sites/public', '', '2014-12-08 05:39:33', '2014-12-08 05:39:33', '2014-12-08 05:39:33', 1, 7, 1);
INSERT INTO logs VALUES (567, '127.0.0.1', 'http://localhost/project/sites/public', '', '2014-12-08 05:50:06', '2014-12-08 05:50:06', '2014-12-08 05:50:06', 1, 10, 9);
INSERT INTO logs VALUES (568, '::1', 'http://localhost/project/sites/public', '', '2014-12-08 10:30:17', '2014-12-08 10:30:17', '2014-12-08 10:30:17', 1, 5, 9);
INSERT INTO logs VALUES (569, '::1', 'http://localhost/project/sites/public', '', '2015-07-13 19:46:11', '2015-07-13 19:46:11', '2015-07-13 19:46:11', 1, 9, 9);
INSERT INTO logs VALUES (570, '::1', 'http://localhost/project/sites/public', '', '2015-07-13 19:46:28', '2015-07-13 19:46:28', '2015-07-13 19:46:28', 1, 3, 1);
INSERT INTO logs VALUES (571, '::1', 'http://localhost/project/sites/public', '', '2015-07-14 11:21:06', '2015-07-14 11:21:06', '2015-07-14 11:21:06', 2, 3, 16);
INSERT INTO logs VALUES (572, '::1', 'http://localhost/project/sites/public', '', '2015-07-14 21:17:35', '2015-07-14 21:17:35', '2015-07-14 21:17:35', 1, 7, 1);
INSERT INTO logs VALUES (573, '::1', 'http://localhost/project/sites/public', '', '2015-07-14 21:19:56', '2015-07-14 21:19:56', '2015-07-14 21:19:56', 1, 3, 1);
INSERT INTO logs VALUES (574, '::1', 'http://localhost/project/sites/public', '', '2015-07-14 21:36:03', '2015-07-14 21:36:03', '2015-07-14 21:36:03', 1, 2, 9);


--
-- Data for Name: migrations; Type: TABLE DATA; Schema: public; Owner: moac
--

INSERT INTO migrations VALUES ('2013_09_11_150417_create_department_table', 1);
INSERT INTO migrations VALUES ('2013_09_11_151241_create_ministry_table', 1);
INSERT INTO migrations VALUES ('2013_09_11_152458_create_agency_table', 1);
INSERT INTO migrations VALUES ('2013_09_11_153120_add_code_to_agency_table', 1);
INSERT INTO migrations VALUES ('2013_09_11_153313_create_usernhc_table', 1);
INSERT INTO migrations VALUES ('2013_09_11_153736_create_usergroup_table', 1);
INSERT INTO migrations VALUES ('2013_09_14_020812_alter_password_to_usernhc_table', 2);
INSERT INTO migrations VALUES ('2013_09_14_080616_create_posts_role_user_table', 3);
INSERT INTO migrations VALUES ('2013_09_14_080949_create_role_table', 3);
INSERT INTO migrations VALUES ('2013_09_14_081131_create_role_policy_table', 3);
INSERT INTO migrations VALUES ('2013_09_14_081249_create_policy_table', 3);
INSERT INTO migrations VALUES ('2013_09_14_082121_create_condition_policy_table', 3);
INSERT INTO migrations VALUES ('2013_09_14_082226_create_obligation_policy_table', 3);
INSERT INTO migrations VALUES ('2013_09_14_082315_create_purpose_policy_table', 3);
INSERT INTO migrations VALUES ('2013_09_14_082406_create_action_table', 3);
INSERT INTO migrations VALUES ('2013_09_14_082628_create_frequencydata_table', 3);
INSERT INTO migrations VALUES ('2013_09_14_082729_create_data_table', 3);
INSERT INTO migrations VALUES ('2013_09_14_082906_create_data_policy_table', 3);
INSERT INTO migrations VALUES ('2013_09_14_083030_create_condition_table', 3);
INSERT INTO migrations VALUES ('2013_09_14_083149_create_obligation_table', 3);
INSERT INTO migrations VALUES ('2013_09_14_083242_create_purpose_table', 3);
INSERT INTO migrations VALUES ('2013_09_14_083433_create_discolse_table', 3);
INSERT INTO migrations VALUES ('2013_09_14_083646_create_transfer_table', 3);
INSERT INTO migrations VALUES ('2013_09_14_084404_create_frequency_table', 3);
INSERT INTO migrations VALUES ('2013_09_14_084650_create_source_tbl_table', 3);
INSERT INTO migrations VALUES ('2013_09_14_084818_create_source_field_table', 3);
INSERT INTO migrations VALUES ('2013_09_14_141838_create_privacy_table', 3);
INSERT INTO migrations VALUES ('2013_09_14_142227_create_retain_table', 3);
INSERT INTO migrations VALUES ('2013_09_14_142635_create_dispose_table', 3);
INSERT INTO migrations VALUES ('2013_09_14_142813_create_logs_table', 3);
INSERT INTO migrations VALUES ('2013_09_14_143223_create_user_training_table', 3);
INSERT INTO migrations VALUES ('2013_09_14_143350_create_training_table', 3);
INSERT INTO migrations VALUES ('2013_09_14_143555_create_schedule_table', 3);
INSERT INTO migrations VALUES ('2013_09_30_062426_add_timstamps_to_condition_table', 4);
INSERT INTO migrations VALUES ('2013_10_01_144935_create_srctable_table', 5);
INSERT INTO migrations VALUES ('2013_10_02_035900_alter_gep_description_to_usergroup', 6);
INSERT INTO migrations VALUES ('2013_10_02_061735_alter_dep_id_to_ministry_id_agency_table', 7);
INSERT INTO migrations VALUES ('2013_10_02_063317_add_minsitry_id_to_ministry_table', 8);
INSERT INTO migrations VALUES ('2013_10_02_071143_create_minsitry_table', 9);
INSERT INTO migrations VALUES ('2013_10_02_071651_create_ministry_table', 10);
INSERT INTO migrations VALUES ('2013_10_02_081409_create_password_reminders_table', 11);
INSERT INTO migrations VALUES ('2013_10_05_154518_del_active_column_usernhc_table', 12);
INSERT INTO migrations VALUES ('2013_10_06_070216_alter_action_table', 12);
INSERT INTO migrations VALUES ('2013_10_07_032147_create_action_policy_table', 13);
INSERT INTO migrations VALUES ('2013_10_07_063322_alter_data_policy_table', 14);
INSERT INTO migrations VALUES ('2013_10_07_063837_alter_obligation_policy_table', 15);
INSERT INTO migrations VALUES ('2013_10_10_024844_alter_privacy_table', 16);
INSERT INTO migrations VALUES ('2013_10_10_025018_create_data_privacy_table', 16);
INSERT INTO migrations VALUES ('2013_10_10_032517_add_column_privacy_table', 16);
INSERT INTO migrations VALUES ('2013_10_10_044244_alter_role_user_table', 16);
INSERT INTO migrations VALUES ('2013_10_10_053104_add_column_usergroup_table', 16);
INSERT INTO migrations VALUES ('2013_10_10_064401_add_column_data_table', 16);
INSERT INTO migrations VALUES ('2013_10_10_072841_rename_data_privacy_table', 16);
INSERT INTO migrations VALUES ('2013_10_10_160850_alter_data_privacy_table', 16);
INSERT INTO migrations VALUES ('2013_10_16_085936_create_retain_data_table', 17);
INSERT INTO migrations VALUES ('2013_10_16_095744_create_retain_data_table', 18);
INSERT INTO migrations VALUES ('2013_10_16_152747_alter_ratain_data_table', 19);
INSERT INTO migrations VALUES ('2013_10_17_152956_alter_actionv2_table', 19);
INSERT INTO migrations VALUES ('2013_10_22_030554_alter_condition_table', 20);
INSERT INTO migrations VALUES ('2013_11_04_084222_create_request_data_table', 21);
INSERT INTO migrations VALUES ('2013_11_04_090009_alter_request_data_table', 21);
INSERT INTO migrations VALUES ('2013_11_05_035845_alter_add_comment_request_data_table', 21);
INSERT INTO migrations VALUES ('2013_11_06_081905_alter_add_column_app_userid_request_data_table', 21);
INSERT INTO migrations VALUES ('2013_11_07_014323_alter_request_type_request_data_table', 21);
INSERT INTO migrations VALUES ('2013_11_07_014350_crate_request_type_data', 21);
INSERT INTO migrations VALUES ('2013_11_07_073237_alter_training_add_close_data_table', 21);
INSERT INTO migrations VALUES ('2013_11_08_164358_alter_add_column_user_training', 21);
INSERT INTO migrations VALUES ('2014_07_01_020919_create_init_privacy_table', 1);
INSERT INTO migrations VALUES ('2014_07_01_022741_create_privacy_type_table', 22);
INSERT INTO migrations VALUES ('2014_07_07_155530_create_policy_duty_table', 22);


--
-- Data for Name: ministry; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO ministry VALUES (1, 'สำนักนายกรัฐมนตรี', '', 'นร.', '01000', true, '2013-05-15 12:07:15.887798+07', NULL, '2013-05-15 12:07:15.887798+07', NULL);
INSERT INTO ministry VALUES (3, 'กระทรวงอุตสาหกรรม', '', 'อก.', '22000', true, '2013-05-15 12:07:15.887798+07', NULL, '2013-05-15 12:07:15.887798+07', NULL);
INSERT INTO ministry VALUES (4, 'กระทรวงสาธารณสุข', '', 'สธ.', '21000', true, '2013-05-15 12:07:15.887798+07', NULL, '2013-05-15 12:07:15.887798+07', NULL);
INSERT INTO ministry VALUES (5, 'กระทรวงศึกษาธิการ', '', 'ศธ.', '20000', true, '2013-05-15 12:07:15.887798+07', NULL, '2013-05-15 12:07:15.887798+07', NULL);
INSERT INTO ministry VALUES (6, 'กระทรวงวิทยาศาสตร์และเทคโนโลยี', '', 'วท.', '19000', true, '2013-05-15 12:07:15.887798+07', NULL, '2013-05-15 12:07:15.887798+07', NULL);
INSERT INTO ministry VALUES (7, 'กระทรวงวัฒนธรรม', '', 'วธ.', '18000', true, '2013-05-15 12:07:15.887798+07', NULL, '2013-05-15 12:07:15.887798+07', NULL);
INSERT INTO ministry VALUES (8, 'กระทรวงแรงงาน', '', 'รง.', '17000', true, '2013-05-15 12:07:15.887798+07', NULL, '2013-05-15 12:07:15.887798+07', NULL);
INSERT INTO ministry VALUES (9, 'กระทรวงยุติธรรม', '', 'ยธ.', '16000', true, '2013-05-15 12:07:15.887798+07', NULL, '2013-05-15 12:07:15.887798+07', NULL);
INSERT INTO ministry VALUES (10, 'กระทรวงมหาดไทย', '', 'มท.', '15000', true, '2013-05-15 12:07:15.887798+07', NULL, '2013-05-15 12:07:15.887798+07', NULL);
INSERT INTO ministry VALUES (11, 'กระทรวงพาณิชย์', '', 'พณ.', '13000', true, '2013-05-15 12:07:15.887798+07', NULL, '2013-05-15 12:07:15.887798+07', NULL);
INSERT INTO ministry VALUES (13, 'กระทรวงพลังงาน', '', 'พน.', '12000', true, '2013-05-15 12:07:15.887798+07', NULL, '2013-05-15 12:07:15.887798+07', NULL);
INSERT INTO ministry VALUES (14, 'กระทรวงเทคโนโลยีสารสนเทศและการสื่อสาร', '', 'ทก.', '11000', true, '2013-05-15 12:07:15.887798+07', NULL, '2013-05-15 12:07:15.887798+07', NULL);
INSERT INTO ministry VALUES (15, 'กระทรวงทรัพยากรธรรมชาติและสิ่งแวดล้อม', '', 'ทส.', '09000', true, '2013-05-15 12:07:15.887798+07', NULL, '2013-05-15 12:07:15.887798+07', NULL);
INSERT INTO ministry VALUES (16, 'กระทรวงคมนาคม', '', 'คค.', '08000', true, '2013-05-15 12:07:15.887798+07', NULL, '2013-05-15 12:07:15.887798+07', NULL);
INSERT INTO ministry VALUES (17, 'กระทรวงเกษตรและสหกรณ์', '', 'กษ.', '07000', true, '2013-05-15 12:07:15.887798+07', NULL, '2013-05-15 12:07:15.887798+07', NULL);
INSERT INTO ministry VALUES (18, 'กระทรวงการท่องเที่ยวและกีฬา', '', 'กก.', '05000', true, '2013-05-15 12:07:15.887798+07', NULL, '2013-05-15 12:07:15.887798+07', NULL);
INSERT INTO ministry VALUES (19, 'กระทรวงการคลัง', '', 'กค.', '03000', true, '2013-05-15 12:07:15.887798+07', NULL, '2013-05-15 12:07:15.887798+07', NULL);
INSERT INTO ministry VALUES (20, 'กระทรวงกลาโหม', '', 'กห.', '02000', true, '2013-05-15 12:07:15.887798+07', NULL, '2013-05-15 12:07:15.887798+07', NULL);
INSERT INTO ministry VALUES (12, 'กระทรวงการพัฒนาสังคมและความมั่นคงของมนุษย์', '', 'พม.', '06000', true, '2013-05-15 12:07:15.887798+07', NULL, '2013-05-15 12:07:15.887798+07', NULL);
INSERT INTO ministry VALUES (21, 'กระทรวงการต่างประเทศ', '', '', '04000', true, '2013-05-15 12:07:15.887798+07', NULL, '2013-05-15 12:07:15.887798+07', NULL);
INSERT INTO ministry VALUES (22, 'ส่วนราชการไม่สังกัดสำนักนายกรัฐมนตรี กระทรวงหรือทบวง', '', '', '25000', true, '2013-05-15 12:07:15.887798+07', NULL, '2013-05-15 12:07:15.887798+07', NULL);
INSERT INTO ministry VALUES (23, 'หน่วยงานของรัฐสภา', '', '', '', true, '2013-05-15 12:07:15.887798+07', NULL, '2013-05-15 12:07:15.887798+07', NULL);
INSERT INTO ministry VALUES (24, 'หน่วยงานของศาล', '', '', '', true, '2013-05-15 12:07:15.887798+07', NULL, '2013-05-15 12:07:15.887798+07', NULL);
INSERT INTO ministry VALUES (25, 'หน่วยงานอิสระตามรัฐธรรมนูญ', '', '', '26000', true, '2013-05-15 12:07:15.887798+07', NULL, '2013-05-15 12:07:15.887798+07', NULL);
INSERT INTO ministry VALUES (26, 'รัฐวิสาหกิจ', '', '', '50000', true, '2013-05-15 12:07:15.887798+07', NULL, '2013-05-15 12:07:15.887798+07', NULL);
INSERT INTO ministry VALUES (27, 'สภากาชาดไทย', '', '', '60001', true, '2013-05-15 12:07:15.887798+07', NULL, '2013-05-15 12:07:15.887798+07', NULL);
INSERT INTO ministry VALUES (2, 'ภาคเอกชน', '', '', 'A9999', true, '2013-06-10 16:00:58.489973+07', 'postgres', '2013-06-10 16:00:58.489973+07', '');


--
-- Data for Name: ministry2; Type: TABLE DATA; Schema: public; Owner: moac
--

INSERT INTO ministry2 VALUES (1, 26, 'รัฐวิสาหกิจ', '', '50000', '2013-10-02 07:17:21', '2013-10-02 07:17:21');
INSERT INTO ministry2 VALUES (2, 16, 'กระทรวงคมนาคม', 'คค.', '08000', '2013-10-02 07:17:21', '2013-10-02 07:17:21');
INSERT INTO ministry2 VALUES (3, 14, 'กระทรวงเทคโนโลยีสารสนเทศและการสื่อสาร', 'ทก.', '11000', '2013-10-02 07:17:21', '2013-10-02 07:17:21');
INSERT INTO ministry2 VALUES (4, 6, 'กระทรวงวิทยาศาสตร์และเทคโนโลยี', 'วท.', '19000', '2013-10-02 07:17:21', '2013-10-02 07:17:21');
INSERT INTO ministry2 VALUES (5, 15, 'กระทรวงทรัพยากรธรรมชาติและสิ่งแวดล้อม', 'ทส.', '09000', '2013-10-02 07:17:21', '2013-10-02 07:17:21');
INSERT INTO ministry2 VALUES (6, 17, 'กระทรวงเกษตรและสหกรณ์', 'กษ.', '07000', '2013-10-02 07:17:21', '2013-10-02 07:17:21');
INSERT INTO ministry2 VALUES (7, 20, 'กระทรวงกลาโหม', 'กห.', '50000', '2013-10-02 07:17:21', '2013-10-02 07:17:21');
INSERT INTO ministry2 VALUES (8, 10, 'กระทรวงมหาดไทย', 'มท.', '50000', '2013-10-02 07:17:21', '2013-10-02 07:17:21');


--
-- Data for Name: obligation; Type: TABLE DATA; Schema: public; Owner: moac
--

INSERT INTO obligation VALUES (1, 'เข้าสู่ระบบก่อน', '2013-10-28 03:33:46', '2013-10-28 03:33:46');
INSERT INTO obligation VALUES (2, 'บันทึกประวัติการใช้งานก่อนออกจากระบบ', '2013-10-28 03:33:46', '2013-10-28 03:33:46');
INSERT INTO obligation VALUES (5, 'สำหรับบุคคลทั่วไป', '2014-10-13 10:24:09', '2014-10-13 10:24:09');


--
-- Data for Name: obligation_policy; Type: TABLE DATA; Schema: public; Owner: moac
--

INSERT INTO obligation_policy VALUES (10, 1, 2);
INSERT INTO obligation_policy VALUES (11, 2, 2);
INSERT INTO obligation_policy VALUES (14, 1, 3);
INSERT INTO obligation_policy VALUES (15, 2, 3);
INSERT INTO obligation_policy VALUES (16, 2, 4);
INSERT INTO obligation_policy VALUES (17, 2, 5);
INSERT INTO obligation_policy VALUES (18, 5, 6);
INSERT INTO obligation_policy VALUES (19, 5, 8);
INSERT INTO obligation_policy VALUES (20, 2, 9);
INSERT INTO obligation_policy VALUES (21, 1, 10);
INSERT INTO obligation_policy VALUES (22, 5, 10);
INSERT INTO obligation_policy VALUES (24, 1, 1);


--
-- Data for Name: password_reminders; Type: TABLE DATA; Schema: public; Owner: moac
--

INSERT INTO password_reminders VALUES ('nattaphat@gmail.com', '11799eed808fc7204617126dbfa9b2b596b9911c', '2013-10-02 08:43:13');
INSERT INTO password_reminders VALUES ('yotsapon@haii.or.th', '008da2951b2873966efd3c9383bdf06a0ea3f843', '2013-10-02 08:47:37');
INSERT INTO password_reminders VALUES ('nattaphat@gmail.com', '6a767d7bd5a0bd10b2d98a985cf2a2688105bf76', '2013-10-03 02:17:41');
INSERT INTO password_reminders VALUES ('nattaphat@gmail.com', '0dcb9cb532fa6a064d7379e04e3a802055d87cf2', '2013-10-03 03:29:11');
INSERT INTO password_reminders VALUES ('nattaphat@gmail.com', 'e6b968b7a828306dd85935316183e64523f036fe', '2013-10-03 03:30:11');
INSERT INTO password_reminders VALUES ('nattaphat@gmail.com', '701603f779d65232442f4a224c48f7313e3aeebe', '2013-10-03 03:30:49');
INSERT INTO password_reminders VALUES ('nattaphat@gmail.com', 'ad3410527693b3e2fa22e6ecd0573f3dd9a167bd', '2013-10-04 08:48:24');
INSERT INTO password_reminders VALUES ('nattaphat@gmail.com', '2a697c0857560b7e253bd2b6c1f8019c87ec2db7', '2013-10-04 08:54:08');
INSERT INTO password_reminders VALUES ('nattaphat@gmail.com', 'e1e9ec8382f41e296e07f292ccafdef613b88439', '2013-10-04 09:00:12');
INSERT INTO password_reminders VALUES ('nattaphat@gmail.com', '4d8f7924fa0ec1be138bde783ec1654053dc1b87', '2013-10-04 09:00:39');
INSERT INTO password_reminders VALUES ('nattaphat@gmail.com', '9521cdc69d44a5897835f25d4f3b1152747fcae9', '2013-10-04 09:02:12');
INSERT INTO password_reminders VALUES ('yotsapon@haii.or.th', 'e438b159f774c614bb11a86e7b78d108fcf55fac', '2013-10-04 09:34:15');
INSERT INTO password_reminders VALUES ('yotsapon@haii.or.th', 'c8ea526a48aaf49f05fc5fef981aa76db2353bd5', '2013-10-04 09:35:27');
INSERT INTO password_reminders VALUES ('yotsapon@haii.or.th', '301eb8acd1b25ac8d25f67e73e050cee6d65a56b', '2013-10-04 09:37:06');
INSERT INTO password_reminders VALUES ('nattaphat@gmail.com', 'fb4b8d29bcd9dcd3eedced916cbbe560567a8e06', '2014-05-29 08:04:11');
INSERT INTO password_reminders VALUES ('nattaphat@gmail.com', '7463faafefe5aa1f425a98193d59ba0880ad7343', '2014-05-29 08:15:41');
INSERT INTO password_reminders VALUES ('nattaphat@gmail.com', '43bd00e52d4266dbb5406bc09803c9fc15d566e2', '2014-05-29 08:15:50');
INSERT INTO password_reminders VALUES ('nattaphat@gmail.com', 'fa698aa0949c7cc91a510c9c04154e654b0977f0', '2014-05-29 08:19:08');
INSERT INTO password_reminders VALUES ('nattaphat@gmail.com', '02007031fed91260170ee83222fd1936e79be46c', '2014-05-29 08:34:02');
INSERT INTO password_reminders VALUES ('nattaphat@gmail.com', '40d8d49453a46872798dd855ed28700af281c0d4', '2014-05-29 08:35:58');
INSERT INTO password_reminders VALUES ('nattaphat@gmail.com', 'a3714a3090c5bc7979b9e2acf386b08d9bd97a3b', '2014-05-29 08:37:28');
INSERT INTO password_reminders VALUES ('user5@haii.or.th', 'd97be63e3e6e3d3a8278552b94bcdca113c0af66', '2014-12-07 13:17:39');


--
-- Data for Name: policy; Type: TABLE DATA; Schema: public; Owner: moac
--

INSERT INTO policy VALUES (3, 'นักพัฒนาระบบสามารถเรียกดูข้อมูลเมื่อเข้าสู่ระบบก่อนและแจ้งกลับไปยังเจ้าหน้าที่ดูแลข้อมูลคลังข้อมูลแห่งชาติในกรณีข้อมูลไม่ถูกต้อง โดยสามารถเรียนกดูข้อมูลปริมาณน้ำฝนได้ดังนี้
  1.ข้อมูลปริมาณน้ำฝนราย 24 ชั่วโมง
  2.ข้อมูลปริมาณน้ำฝนวันนี้
  3.ข้อมูลปริมาณน้ำฝนวานนี้
  4.ข้อมูลปริมาณน้ำฝนย้องหลัง 3 วัน
  5.ข้อมูลปริมาณน้ำฝนย้อนหลัง 7 วัน  โดยมีวัตถุประสงค์เพื่อการพัฒนาระบบเท่านั้น 
หลังจากออกจากระบบ ระบบจะทำการบันทึกประวัติการเรียกดูข้อมูลดังกล่าว', 'เอกชัย บุญจาริยะ', true, '2013-10-28 03:33:44', '2014-12-07 07:37:30', 1);
INSERT INTO policy VALUES (4, 'นักพัฒนาระบบสามารถเรียกดูข้อมูลก่อนและแจ้งกลับไปยังเจ้าหน้าที่ดูแลข้อมูลคลังข้อมูลแห่งชาติในกรณีข้อมูลไม่ถูกต้อง โดยสามารถเรียนกดูข้อมูล ระดับน้ำ ข้อมูลเขื่อน ความเข้มแสง ความชื้น ควากดอากาศ อุณหภูมิ ระดับน้ำทะเล ตามความถี่ของข้อมูลต่อไปนี้
  1.ข้อมูลปัจจุบัน
  2.ข้อมูลราย 3 วัน
  3.ข้อมูลราย 7 วัน  โดยมีวัตถุประสงค์เพื่อการพัฒนาระบบเท่านั้น 
หลังจากที่ออกจากระบบ ระบบจะทำการบันทึกประวัติการเรียกดูข้อมูลดังกล่าว', 'เอกชัย บุญจาริยะ', true, '2013-10-28 03:33:44', '2014-12-07 07:37:53', 1);
INSERT INTO policy VALUES (5, 'ผู้ดูแลฐานข้อมูลสามารถเรียกดูข้อมูลเมื่อเข้าสู่ระบบก่อนและแจ้งกลับไปยังเจ้าหน้าที่ดูแลข้อมูลคลังข้อมูลแห่งชาติในกรณีข้อมูลไม่ถูกต้อง โดยสามารถเรียกดูข้อมูล ปริมาณน้ำฝน ระดับน้ำ ข้อมูลเขื่อน ความเข้มแสง ความชื้น ควากดอากาศ อุณหภูมิ ระดับน้ำทะเล ตามความถี่ของข้อมูลต่อไปนี้
  1.ข้อมูลปัจจุบัน ได้ 100 เรคคอร์ด
หลังจากที่ออกจากระบบ ระบบจะทำการบันทึกประวัติการเรียกดูข้อมูลดังกล่าว', 'เอกชัย บุญจาริยะ', true, '2013-10-28 03:33:44', '2014-12-07 07:38:14', 1);
INSERT INTO policy VALUES (6, 'บุคคลทั่วไปสามารถเรียกดูข้อมูล ปริมาณน้ำฝนตามความถี่ของข้อมูลได้ดังนี้
  1.ข้อมูลปริมาณน้ำฝนราย 24 ชั่วโมง
  2.ข้อมูลปริมาณน้ำฝนวันนี้
  3.ข้อมูลปริมาณน้ำฝนวานนี้
โดยมีวัตถุประสงค์เพื่อใช้กระกอบการตัดสินใจ
โดยสามารถดูข้อมูลได้ 20 อันดับสูงสุดเท่านั้น', 'เอกชัย บุญจาริยะ', true, '2013-10-28 03:33:44', '2014-12-07 07:38:34', 1);
INSERT INTO policy VALUES (7, 'บุคคลทั่วไปเจ้าหน้าที่ในคลังข้อมูลแห่งชาติสามารถเรียกดูข้อมูล ระดับน้ำ ข้อมูลเขื่อน ความเข้มแสง ความชื้น ควากดอากาศ อุณหภูมิ ระดับน้ำทะเล ตามความถี่ของข้อมูลต่อไปนี้
  1.ข้อมูลปัจจุบัน
โดยสามารถดูข้อมูลได้ 20 อันดับสูงสุดเท่านั้น', 'เอกชัย บุญจาริยะ', true, '2013-10-28 03:33:44', '2014-12-07 07:39:05', 1);
INSERT INTO policy VALUES (8, 'เจ้าหน้าที่ของแต่ละหน่วยงานที่ให้ข้อมูลกับคลังข้อมูลแห่งชาติสามารถเรียกดูข้อมูลได้ 200 เรคคอร์ด เมื่อเข้าสู่ระบบก่อนและขออนุญาตเปิดเผยข้อมูล ขออนุญาตส่งต่อข้อมูล ข้อมูลปริมาณน้ำฝน จะต้องได้รับการยินยอมจากหน่วยงานเจ้าของข้อมูลก่อน ตามความถี่ของข้อมูลต่อไปนี้
  1.ข้อมูลปัจจุบัน
  2.ข้อมูลปริมาณน้ำฝนย้องหลัง 3 วัน
  3.ข้อมูลปริมาณน้ำฝนย้อนหลัง 7 วัน โดยมีวัตถุประสงค์เพื่อใช้ข้อมูลในหน่วยงานเท่านั้น
หลังจากที่ออกจากระบบ ระบบจะทำการบันทึกประวัติการเรียกดูข้อมูลดังกล่าว', 'เอกชัย บุญจาริยะ', true, '2013-10-28 03:33:44', '2014-12-07 07:39:56', 1);
INSERT INTO policy VALUES (10, 'เจ้าหน้าที่ของคลังข้อมูลแห่งชาติจะต้องเข้าสู่ระบบก่อนจึงจะสามารถเรียกดู เพิ่มข้อมูล ปรับปรุง และลบข้อมูลออกจากคลังข้อมูลแห่งชาติ โดยสามารถกระทำได้กับข้อมูลปริมาณน้ำฝนความถี่ข้อมูลดังนี้
  1.ข้อมูลปริมาณน้ำฝนราย 24 ชั่วโมง
  2.ข้อมูลปริมาณน้ำฝนวันนี้
  3.ข้อมูลปริมาณน้ำฝนวานนี้
  4.ข้อมูลปริมาณน้ำฝนย้องหลัง 3 วัน
  5.ข้อมูลปริมาณน้ำฝนย้อนหลัง 7 วัน
ข้อมูลระดับน้ำ ข้อมูลเขื่อน ข้อมูลความเข้มแสง ข้อมูลความชื่น ข้อมูลความกดอากาศ ข้อมูลอุณภูมิ ข้อมูลระดับน้ำทะเล ความถี่ข้อมูลดังนี้
  1.ข้อมูลปัจจุบัน
  2.ข้อมูลปริมาณน้ำฝนย้องหลัง 3 วัน
  3.ข้อมูลปริมาณน้ำฝนย้อนหลัง 7 วัน โดยมีวัตถุประสงค์เพื่อการบริหารและดูแลคลังข้อมูลแห่งชาติเท่านั้น
หลังจากที่ออกจากระบบ ระบบจะทำการบันทึกประวัติการเรียกดูข้อมูลดังกล่าว', 'เอกชัย บุญจาริยะ', false, '2013-10-28 03:33:44', '2014-12-07 08:03:00', 1);
INSERT INTO policy VALUES (26, 'ทดสอบเพิ่ม นโยบายทดสอบเพิ่ม นโยบายทดสอบเพิ่ม นโยบายทดสอบเพิ่ม นโยบายทดสอบเพิ่ม นโยบายทดสอบเพิ่ม นโยบายทดสอบเพิ่ม นโยบายทดสอบเพิ่ม นโยบายทดสอบเพิ่ม นโยบายทดสอบเพิ่ม นโยบายทดสอบเพิ่ม นโยบาย', 'Super Admin Super', false, '2014-12-07 07:59:03', '2014-12-07 09:18:47', 2);
INSERT INTO policy VALUES (2, 'นักวิจัยสามารถเรียกดูข้อมูลเมื่อเข้าสู่ระบบก่อนและเรียกดูข้อมูลระดับน้ำ ข้อมูลเขื่อน ความเข้มแสง ความชื้น ควากดอากาศ อุณหภูมิ ระดับน้ำทะเล ตามความถี่ของข้อมูลต่อไปนี้
  1.ข้อมูลปัจจุบัน
  2.ข้อมูลราย 3 วัน
  3.ข้อมูลราย 7 วัน  โดยมีวัตถุประสงค์เพื่องานวิจัยข้อมูลเท่านั้น และเมื่อต้องการดาวน์โหลดข้อมูลจะต้องได้รับความยินยอมจากเจ้าหน้าที่คลังข้อมูลแห่งชาติก่อน
หลังจากที่ออกจากระบบ ระบบจะทำการบันทึกประวัติการเรียกดูข้อมูลดังกล่าว', 'เอกชัย บุญจาริยะ', true, '2013-10-28 03:33:44', '2014-12-07 07:36:55', 1);
INSERT INTO policy VALUES (9, 'เจ้าหน้าที่ของแต่ละหน่วยงานที่ให้ข้อมูลกับคลังข้อมูลแห่งชาติสามารถเรียกดูข้อมูลได้ 200 เรคคอร์ดเมื่อเข้าสู่ระบบก่อนและขออนุญาตเปิดเผยข้อมูล ขออนุญาตส่งต่อข้อมูล ข้อมูลระดับน้ำ ข้อมูลเขื่อน ความเข้มแสง ความชื้น ควากดอากาศ อุณหภูมิ ระดับน้ำทะเล จะต้องได้รับการยินยอมจากหน่วยงานเจ้าของข้อมูลก่อนตามความถี่ของข้อมูลต่อไปนี้
  1.ข้อมูลปัจจุบัน โดยมีวัตถุประสงค์เพื่อใช้ข้อมูลในหน่วยงานเท่านั้น
หลังจากที่ออกจากระบบ ระบบจะทำการบันทึกประวัติการเรียกดูข้อมูลดังกล่าว', 'เอกชัย บุญจาริยะ', true, '2013-10-28 03:33:44', '2014-12-07 07:40:15', 1);
INSERT INTO policy VALUES (1, 'นักวิจัยได้รับอนุญาตให้เรียกดูข้อมูล ปริมาณน้ำฝนโดยจะต้องเข้าสู่ระบบก่อนที่จะเรียกดูข้อมูลตามความถี่ของข้อมูลดังนี้
  1.ข้อมูลปริมาณน้ำฝนราย 24 ชั่วโมง
  2.ข้อมูลปริมาณน้ำฝนวันนี้
  3.ข้อมูลปริมาณน้ำฝนวานนี้
  4.ข้อมูลปริมาณน้ำฝนย้องหลัง 3 วัน
  5.ข้อมูลปริมาณน้ำฝนย้อนหลัง 7 วัน โดยมีวัตถุประสงค์เพื่องานวิจัยข้อมูลเท่านั้น และเมื่อต้องการดาวน์โหลดข้อมูลจะต้องได้รับความยินยอมจากเจ้าหน้าที่คลังข้อมูลแห่งชาติก่อนหลังจากออกจากระบบ ระบบจะทำการบันทึกประวัติการเรียกดูข้อมูลดังกล่าว', 'เอกชัย บุญจาริยะ', true, '2013-10-28 03:33:44', '2014-12-07 08:19:51', 1);


--
-- Data for Name: policy_duty; Type: TABLE DATA; Schema: public; Owner: moac
--

INSERT INTO policy_duty VALUES (3, 'อธิป', 'ปี่ทอง', 'หัวหน้ากลุ่มงานระบบคอมพิวเตอร์และระบบเครือข่าย', 'atip@haii.or.th', '02 647 7132 ต่อ 506', false, '2014-07-08 02:12:41', '2014-07-08 02:12:41', NULL);
INSERT INTO policy_duty VALUES (5, 'ยศพนธ์', 'เลิศ', 'ทดสอบ', 'yotsapon@haii.or.th', '02 647 7132 ต่อ 507', false, '2014-12-07 09:37:10', '2014-12-07 09:37:10', NULL);
INSERT INTO policy_duty VALUES (2, 'มโนรถ', 'ตั้งเสวีพันธ์', 'หัวหน้ากลุ่มงานพัฒนาระบบงาน', 'manorot@haii.or.th', '02 647 7132 ต่อ 510', true, '2014-07-08 02:12:00', '2015-07-14 21:00:46', 2);
INSERT INTO policy_duty VALUES (1, 'จารุมน', 'ลิ้มทิพย์ดารา', 'ผู้อำนวยการฝ่ายวิจัยและพัฒนา', 'jarumon@haii.or.th', '02 647 7132 ต่อ 501', true, '2014-07-08 02:11:10', '2015-07-14 21:01:14', 1);


--
-- Data for Name: policy_dutytype; Type: TABLE DATA; Schema: public; Owner: moac
--

INSERT INTO policy_dutytype VALUES (1, 'รับผิดชอบด้านนโยบาย', '');
INSERT INTO policy_dutytype VALUES (2, 'รับผิดชอบด้านไพรเวซีในองค์กร', '');
INSERT INTO policy_dutytype VALUES (3, 'รับผิดชอบด้านความมั่นคงในองค์กร', '');


--
-- Data for Name: privacy; Type: TABLE DATA; Schema: public; Owner: moac
--

INSERT INTO privacy VALUES (1, 1, false, false, false, false, false, false, false, '2013-10-28 03:33:46', '2013-10-28 03:33:46', true, false);
INSERT INTO privacy VALUES (2, 2, false, false, false, false, false, false, false, '2013-10-28 03:33:46', '2013-10-28 03:33:46', true, false);
INSERT INTO privacy VALUES (3, 3, false, false, false, false, false, false, false, '2013-10-28 03:33:46', '2013-10-28 03:33:46', true, false);
INSERT INTO privacy VALUES (4, 8, false, false, false, false, false, false, false, '2014-05-30 03:27:46', '2014-05-30 03:27:46', true, false);
INSERT INTO privacy VALUES (5, 9, false, false, false, false, false, false, false, '2014-06-10 03:22:59', '2014-06-10 03:22:59', true, false);
INSERT INTO privacy VALUES (6, 10, false, false, false, false, false, false, false, '2014-06-10 03:23:37', '2014-06-10 03:23:37', true, false);
INSERT INTO privacy VALUES (7, 11, false, false, false, false, false, false, false, '2014-06-10 03:25:16', '2014-06-10 03:25:16', true, false);
INSERT INTO privacy VALUES (8, 12, false, false, false, false, false, false, false, '2014-06-10 03:26:12', '2014-06-10 03:26:12', true, false);
INSERT INTO privacy VALUES (9, 13, false, false, false, false, false, false, false, '2014-06-10 03:42:20', '2014-06-10 03:42:20', true, false);
INSERT INTO privacy VALUES (10, 14, false, false, false, false, false, false, false, '2014-10-13 09:26:19', '2014-10-13 09:26:19', true, false);
INSERT INTO privacy VALUES (11, 15, false, false, false, false, false, false, false, '2014-10-13 09:27:10', '2014-10-13 09:27:10', true, false);
INSERT INTO privacy VALUES (12, 16, false, false, false, false, false, false, false, '2014-10-13 09:27:56', '2014-10-13 09:27:56', true, false);


--
-- Data for Name: privacy_init; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO privacy_init VALUES (1, 'fname', 'ชื่อผู้ใช้งาน', '1', false, '2014-07-01 04:06:43', '2014-07-01 04:06:43', true);
INSERT INTO privacy_init VALUES (8, 'ministry', 'กระทรวง', '1', false, '2014-07-01 07:42:56', '2014-07-01 07:42:56', false);
INSERT INTO privacy_init VALUES (6, 'agency', 'หน่วยงานสังกัด', '1', false, '2014-07-01 04:06:43', '2014-12-07 09:38:10', true);
INSERT INTO privacy_init VALUES (5, 'telno', 'เบอร์ติดต่อ', '1', false, '2014-07-01 04:06:43', '2014-07-01 04:06:43', false);
INSERT INTO privacy_init VALUES (3, 'role', 'บทบาท', '1', false, '2014-07-01 04:06:43', '2014-07-01 04:06:43', false);
INSERT INTO privacy_init VALUES (4, 'email', 'อีเมล์', '1', false, '2014-07-01 04:06:43', '2014-07-01 04:06:43', false);
INSERT INTO privacy_init VALUES (9, 'TEsting', 'ทดสอบ', '1', true, '2014-12-07 10:02:20', '2014-12-07 10:02:20', false);
INSERT INTO privacy_init VALUES (2, 'lname', 'นามสกุล', '1', false, '2014-07-01 04:06:43', '2014-12-07 13:13:29', true);


--
-- Data for Name: privacy_type; Type: TABLE DATA; Schema: public; Owner: moac
--



--
-- Data for Name: purpose; Type: TABLE DATA; Schema: public; Owner: moac
--

INSERT INTO purpose VALUES (1, 'เพื่องานวิจัย', '2013-10-28 03:33:45', '2013-10-28 03:33:45');
INSERT INTO purpose VALUES (2, 'เพื่อการพัฒนาระบบ', '2013-10-28 03:33:45', '2013-10-28 03:33:45');
INSERT INTO purpose VALUES (3, 'เพื่อใช้ในหน่วยงานเท่านั้น', '2013-10-28 03:33:45', '2013-10-28 03:33:45');
INSERT INTO purpose VALUES (4, 'เพื่อการบริหารและดูแลคลังข้อมูลเท่านั้น', '2013-10-28 03:33:45', '2013-10-28 03:33:45');
INSERT INTO purpose VALUES (7, 'ประกอบการตัดสินใจ', '2014-10-13 09:58:34', '2014-10-13 09:58:34');


--
-- Data for Name: purpose_policy; Type: TABLE DATA; Schema: public; Owner: moac
--

INSERT INTO purpose_policy VALUES (7, 1, 2);
INSERT INTO purpose_policy VALUES (9, 2, 3);
INSERT INTO purpose_policy VALUES (10, 2, 4);
INSERT INTO purpose_policy VALUES (11, 2, 5);
INSERT INTO purpose_policy VALUES (17, 7, 6);
INSERT INTO purpose_policy VALUES (18, 3, 8);
INSERT INTO purpose_policy VALUES (19, 3, 9);
INSERT INTO purpose_policy VALUES (20, 4, 10);
INSERT INTO purpose_policy VALUES (22, 1, 1);


--
-- Data for Name: request_data; Type: TABLE DATA; Schema: public; Owner: moac
--

INSERT INTO request_data VALUES (5, 5, 1, '07003', true, 9, 7, '2014-10-15 22:42:44', '2014-12-08 05:47:56', true, 'อนุญาตตามคำร้องขอ', 15, 1);
INSERT INTO request_data VALUES (6, 4, 1, '19012', true, 9, 7, '2014-12-07 16:20:41', '2014-12-08 10:14:31', true, 'รับทราบ', 10, 1);
INSERT INTO request_data VALUES (7, 5, 1, '07003', false, 9, 7, '2015-07-14 11:20:11', '2015-07-14 11:20:11', false, NULL, NULL, 2);


--
-- Data for Name: request_type_data; Type: TABLE DATA; Schema: public; Owner: moac
--

INSERT INTO request_type_data VALUES (1, 'ขออนุญาตเปิดเผยข้อมูล', '2013-11-21 04:07:26', '2013-11-21 04:07:26');
INSERT INTO request_type_data VALUES (2, 'ขออนุญาตส่งต่อข้อมูล', '2013-11-21 04:07:26', '2013-11-21 04:07:26');


--
-- Data for Name: retain; Type: TABLE DATA; Schema: public; Owner: moac
--



--
-- Data for Name: retain_data; Type: TABLE DATA; Schema: public; Owner: moac
--

INSERT INTO retain_data VALUES (33, 2, '2015-07-08 00:00:00', '1:year', '2014-07-08');
INSERT INTO retain_data VALUES (34, 3, '2015-07-08 00:00:00', '1:year', '2014-07-08');
INSERT INTO retain_data VALUES (35, 4, '2015-07-08 00:00:00', '1:year', '2014-07-08');
INSERT INTO retain_data VALUES (36, 5, '2017-07-08 00:00:00', '3:year', '2014-07-08');
INSERT INTO retain_data VALUES (37, 6, '2017-07-08 00:00:00', '3:year', '2014-07-08');
INSERT INTO retain_data VALUES (38, 7, '2017-07-08 00:00:00', '3:year', '2014-07-08');
INSERT INTO retain_data VALUES (39, 8, '2017-07-08 00:00:00', '3:year', '2014-07-08');
INSERT INTO retain_data VALUES (41, 10, '2019-07-08 00:00:00', '5:year', '2014-07-08');
INSERT INTO retain_data VALUES (42, 11, '2024-07-08 00:00:00', '10:year', '2014-07-08');
INSERT INTO retain_data VALUES (40, 9, '2021-07-08 00:00:00', '7:year', '2014-07-08');
INSERT INTO retain_data VALUES (32, 1, '2015-07-15 00:00:00', '1:day', '2015-07-14');


--
-- Data for Name: role_policy; Type: TABLE DATA; Schema: public; Owner: moac
--

INSERT INTO role_policy VALUES (23, 1, 2);
INSERT INTO role_policy VALUES (26, 2, 3);
INSERT INTO role_policy VALUES (27, 2, 4);
INSERT INTO role_policy VALUES (28, 3, 5);
INSERT INTO role_policy VALUES (40, 6, 6);
INSERT INTO role_policy VALUES (41, 4, 8);
INSERT INTO role_policy VALUES (42, 4, 9);
INSERT INTO role_policy VALUES (43, 5, 10);
INSERT INTO role_policy VALUES (46, 1, 1);


--
-- Data for Name: role_user; Type: TABLE DATA; Schema: public; Owner: moac
--

INSERT INTO role_user VALUES (2, 1, 1);
INSERT INTO role_user VALUES (3, 1, 1);
INSERT INTO role_user VALUES (4, 6, 3);
INSERT INTO role_user VALUES (5, 2, 8);
INSERT INTO role_user VALUES (1, 1, 2);
INSERT INTO role_user VALUES (10, 6, 13);
INSERT INTO role_user VALUES (6, 1, 9);
INSERT INTO role_user VALUES (7, 4, 10);
INSERT INTO role_user VALUES (8, 1, 11);
INSERT INTO role_user VALUES (9, 3, 12);
INSERT INTO role_user VALUES (11, 1, 14);
INSERT INTO role_user VALUES (12, 1, 15);
INSERT INTO role_user VALUES (13, 2, 16);


--
-- Data for Name: roles; Type: TABLE DATA; Schema: public; Owner: moac
--

INSERT INTO roles VALUES (1, 'นักวิจัย', '2013-10-28 03:33:45', '2013-10-28 03:33:45');
INSERT INTO roles VALUES (2, 'นักพัฒนาระบบ', '2013-10-28 03:33:45', '2013-10-28 03:33:45');
INSERT INTO roles VALUES (3, 'ผู้ดูแลฐานข้อมูล', '2013-10-28 03:33:45', '2013-10-28 03:33:45');
INSERT INTO roles VALUES (4, 'เจ้าหน้าที่ประจำหน่วยงาน', '2013-10-28 03:33:45', '2013-10-28 03:33:45');
INSERT INTO roles VALUES (5, 'เจ้าหน้าที่คลังข้อมูล', '2013-10-28 03:33:45', '2013-10-28 03:33:45');
INSERT INTO roles VALUES (6, 'บุคคลทั่วไป', '2013-10-28 03:33:45', '2013-10-28 03:33:45');


--
-- Data for Name: schedule; Type: TABLE DATA; Schema: public; Owner: moac
--



--
-- Data for Name: source_field; Type: TABLE DATA; Schema: public; Owner: moac
--



--
-- Data for Name: source_tbl; Type: TABLE DATA; Schema: public; Owner: moac
--



--
-- Data for Name: srctable; Type: TABLE DATA; Schema: public; Owner: moac
--

INSERT INTO srctable VALUES (1, 'v_sum_rainfall', 'ข้อมูลฝนทั้งหมด', '2013-10-28 03:33:44', '2013-10-28 03:33:44');
INSERT INTO srctable VALUES (2, 'v_dam_daily', 'ข้อมูลน้ำในเขื่อน', '2013-10-28 03:33:44', '2013-10-28 03:33:44');
INSERT INTO srctable VALUES (3, 'v_tele_met', 'ข้อมูลจากโทรมาตรทุกพารามิเตอร์', '2013-10-28 03:33:44', '2013-10-28 03:33:44');
INSERT INTO srctable VALUES (4, 'v_tele_water_level_168h', 'ข้อมูลระดับน้ำ', '2013-10-28 03:33:44', '2013-10-28 03:33:44');
INSERT INTO srctable VALUES (5, 'v_rainfall168h_lasted', 'ข้อมูลปริมาณฝนย้อนหลัง 3 วัน 7 วัน', '2013-10-28 03:33:44', '2013-10-28 03:33:44');


--
-- Data for Name: training; Type: TABLE DATA; Schema: public; Owner: moac
--

INSERT INTO training VALUES (4, 'การใช้งานเบื้องต้น คลังสารสนเทศกลาง ครั้งที่ 2', 'เนื้อหาการใช้งานเบื้องต้น คลังสารสนเทศกลางการใช้งานเบื่้องต้น คลังสารสนเทศกลางการใช้งานเบื่้องต้น คลังสารสนเทศกลางการใช้งานเบื่้องต้น คลังสารสนเทศกลางการใช้งานเบื่้องต้น คลังสารสนเทศกลาง', '1,2,3,4,5', true, '2014-10-15 22:49:22', '2014-10-15 22:49:22', '2014-12-25 08:00:00', '2014-10-15 08:00:00');
INSERT INTO training VALUES (2, 'การใช้งานเบื้องต้น คลังสารสนเทศกลาง', 'เนื้อหาการใช้งานเบื้องต้น คลังสารสนเทศกลางการใช้งานเบื่้องต้น คลังสารสนเทศกลางการใช้งานเบื่้องต้น คลังสารสนเทศกลางการใช้งานเบื่้องต้น คลังสารสนเทศกลางการใช้งานเบื่้องต้น คลังสารสนเทศกลาง', '1,2,4,5', false, '2014-06-11 07:30:37', '2014-10-15 22:58:11', '2014-07-31 11:30:00', '2014-07-08 08:30:00');


--
-- Data for Name: transfer; Type: TABLE DATA; Schema: public; Owner: moac
--



--
-- Data for Name: user_training; Type: TABLE DATA; Schema: public; Owner: moac
--

INSERT INTO user_training VALUES (3, 9, 2, true, NULL, '2014-07-10 19:04:35');
INSERT INTO user_training VALUES (4, 16, 4, true, NULL, '2014-10-15 23:43:58');
INSERT INTO user_training VALUES (5, 9, 4, true, NULL, '2014-10-15 23:44:31');
INSERT INTO user_training VALUES (6, 9, 5, true, NULL, '2014-12-07 16:01:19');


--
-- Data for Name: usergroup; Type: TABLE DATA; Schema: public; Owner: moac
--

INSERT INTO usergroup VALUES (1, 'SUPER ADMIN', 'super admin can do everything', '2013-10-28 03:33:45', '2013-10-28 03:33:45', 'superadmin');
INSERT INTO usergroup VALUES (2, 'ADMIN', 'admin can do by super admin assig', '2013-10-28 03:33:45', '2013-10-28 03:33:45', 'ผู้ดูแลระบบ ของหน่วยงาน');
INSERT INTO usergroup VALUES (3, 'USER', 'user use the basic right', '2013-10-28 03:33:45', '2013-10-28 03:33:45', 'ผู้ใช้งานทั่วไป ของหน่วยงาน');


--
-- Data for Name: usernhc; Type: TABLE DATA; Schema: public; Owner: moac
--

INSERT INTO usernhc VALUES (11, 4, 3, 'user3', '$2y$10$wSJOwgWExmV7NFczOqCpZuKelRzioChKp5g7dbVO287yWYVfX1xle', 'user3@haii.or.th', 'user3', 'User3', '', '2014-06-10 03:25:16', '2014-10-14 11:02:28', true, 'yes', 'FVSemKHEh2cIEyLbHhAhsHRsToRiNLo8eJMtXzMjSO86CnWDsNOPqKNrXsXN');
INSERT INTO usernhc VALUES (12, 11, 2, 'user4', '$2y$10$nROlE9a0HZn4oLvbM79LxuFCL22HHxzuA.VQm95D80SPXPFJ05GyS', 'user4@haii.or.th', 'user4', 'User4', '', '2014-06-10 03:26:12', '2014-10-14 11:05:13', true, 'yes', 'Vit7yaQaHNcGja5xdhK4zrQwyRqMkQhqPOY9rCgppfxbQpC6kb3Eo4D0Uilv');
INSERT INTO usernhc VALUES (14, 2, 2, 'user5', '$2y$10$6xJE5T0pnqqUCK.eWsToGutIeojoRc9xOASfD2.4jgDsb0KYYCc86', 'user5@haii.or.th', 'user5', 'user5', '', '2014-10-13 09:26:18', '2014-10-14 11:11:15', true, 'yes', 'MamffF73G36V6ZQ9Thvxtgn02cewUODhu24dV27mYIUbxttgKuI3pkFykduQ');
INSERT INTO usernhc VALUES (10, 4, 2, 'user2', '$2y$10$4r8m5nBabaV/5UX5zihIKezAKK9gYUPbVAWF/wZhZLN.g7VL6F.K.', 'user2@haii.or.th', 'user2', 'User2', '', '2014-06-10 03:23:37', '2014-12-07 16:27:24', true, 'yes', 'Ai03mWbleJZoyHl9RWiPT9ZBLqj2J1aEw1T34n5HE76DB9iyM0mLdSjHUJRC');
INSERT INTO usernhc VALUES (15, 1, 2, 'user6', '$2y$10$fNe8gX3tAiZzVtINeiehw.OgJy.HKIK1MfQ7NdDByNdr6Ra0yql5u', 'user6@haii.or.th', 'user6', 'user6', '', '2014-10-13 09:27:09', '2014-10-15 22:45:29', true, 'yes', 'W3LOHLsvIv47Bq2DrScclt2m5rgDq5m0fKikgm9IjIgIhDbvsfOSzZIJZ5d8');
INSERT INTO usernhc VALUES (16, 5, 2, 'user7', '$2y$10$sSOu.qWOLBNpeRgRYXPZ6ehWp/pGN7fB3CZqbG8hV.YcB.R1n8n.K', 'user7@haii.or.th', 'user7', 'user7', '', '2014-10-13 09:27:56', '2015-07-14 11:21:06', true, 'yes', 'HrTo9ZY6ZwCb4AqZ8UTrUiqmRMHlq5vkg46Aazt8z1d0lTj4o1S6waQ6q9Cg');
INSERT INTO usernhc VALUES (1, 1, 1, 'superadmin', '$2y$08$rpWPooqcGnYy6s.cQuoWguQYreNP2Kwhwm/dbePYDWCMVbm0fsX7S', 'yotsapon@haii.or.th', 'Super Admin', 'Super', '02-6427132', '2013-10-28 03:33:44', '2015-07-14 21:19:56', true, 'yes', '7PX3RfdQsRBTXtd56qf69ZuEfNEGGFgCwsbjoQPFGxtylb6cdroydPeHtQCl');
INSERT INTO usernhc VALUES (9, 7, 2, 'user1', '$2y$10$EqcbnsC5VmHthWixlO4LeOJrX6ZV.bGEEtn3byaQyRFAL3st3cUAG', 'user1@haii.or.th', 'user1', 'User1_test', '', '2014-06-10 03:22:59', '2015-07-14 21:36:03', true, 'yes', 'SZGAUfFWImFwWR6tmpYBMj158Zzz5lBmGrwDt5Fk2jWsoabHaBwLcCQiVrsh');


--
-- Name: action_action_name_unique; Type: CONSTRAINT; Schema: public; Owner: moac; Tablespace: 
--

ALTER TABLE ONLY action
    ADD CONSTRAINT action_action_name_unique UNIQUE (action_name);


--
-- Name: action_action_unique; Type: CONSTRAINT; Schema: public; Owner: moac; Tablespace: 
--

ALTER TABLE ONLY action
    ADD CONSTRAINT action_action_unique UNIQUE (action);


--
-- Name: action_pkey; Type: CONSTRAINT; Schema: public; Owner: moac; Tablespace: 
--

ALTER TABLE ONLY action
    ADD CONSTRAINT action_pkey PRIMARY KEY (id);


--
-- Name: action_policy_pkey; Type: CONSTRAINT; Schema: public; Owner: moac; Tablespace: 
--

ALTER TABLE ONLY action_policy
    ADD CONSTRAINT action_policy_pkey PRIMARY KEY (id);


--
-- Name: agency_data_pkey; Type: CONSTRAINT; Schema: public; Owner: moac; Tablespace: 
--

ALTER TABLE ONLY agency_data
    ADD CONSTRAINT agency_data_pkey PRIMARY KEY (id);


--
-- Name: agency_pkey; Type: CONSTRAINT; Schema: public; Owner: moac; Tablespace: 
--

ALTER TABLE ONLY agency
    ADD CONSTRAINT agency_pkey PRIMARY KEY (id);


--
-- Name: agency_tname_unique; Type: CONSTRAINT; Schema: public; Owner: moac; Tablespace: 
--

ALTER TABLE ONLY agency
    ADD CONSTRAINT agency_tname_unique UNIQUE (tname);


--
-- Name: condition_cond_name_unique; Type: CONSTRAINT; Schema: public; Owner: moac; Tablespace: 
--

ALTER TABLE ONLY condition
    ADD CONSTRAINT condition_cond_name_unique UNIQUE (cond_name);


--
-- Name: condition_pkey; Type: CONSTRAINT; Schema: public; Owner: moac; Tablespace: 
--

ALTER TABLE ONLY condition
    ADD CONSTRAINT condition_pkey PRIMARY KEY (id);


--
-- Name: condition_policy_pkey; Type: CONSTRAINT; Schema: public; Owner: moac; Tablespace: 
--

ALTER TABLE ONLY condition_policy
    ADD CONSTRAINT condition_policy_pkey PRIMARY KEY (id);


--
-- Name: data_data_name_unique; Type: CONSTRAINT; Schema: public; Owner: moac; Tablespace: 
--

ALTER TABLE ONLY data
    ADD CONSTRAINT data_data_name_unique UNIQUE (data_name);


--
-- Name: data_pkey; Type: CONSTRAINT; Schema: public; Owner: moac; Tablespace: 
--

ALTER TABLE ONLY data
    ADD CONSTRAINT data_pkey PRIMARY KEY (id);


--
-- Name: data_policy_pkey; Type: CONSTRAINT; Schema: public; Owner: moac; Tablespace: 
--

ALTER TABLE ONLY data_policy
    ADD CONSTRAINT data_policy_pkey PRIMARY KEY (id);


--
-- Name: data_privacy_pkey; Type: CONSTRAINT; Schema: public; Owner: moac; Tablespace: 
--

ALTER TABLE ONLY data_privacy
    ADD CONSTRAINT data_privacy_pkey PRIMARY KEY (id);


--
-- Name: data_table_name_unique; Type: CONSTRAINT; Schema: public; Owner: moac; Tablespace: 
--

ALTER TABLE ONLY data
    ADD CONSTRAINT data_table_name_unique UNIQUE (table_name);


--
-- Name: discolse_pkey; Type: CONSTRAINT; Schema: public; Owner: moac; Tablespace: 
--

ALTER TABLE ONLY discolse
    ADD CONSTRAINT discolse_pkey PRIMARY KEY (id);


--
-- Name: dispose_pkey; Type: CONSTRAINT; Schema: public; Owner: moac; Tablespace: 
--

ALTER TABLE ONLY dispose
    ADD CONSTRAINT dispose_pkey PRIMARY KEY (id);


--
-- Name: frequency_freq_name_unique; Type: CONSTRAINT; Schema: public; Owner: moac; Tablespace: 
--

ALTER TABLE ONLY frequency
    ADD CONSTRAINT frequency_freq_name_unique UNIQUE (freq_name);


--
-- Name: frequency_pkey; Type: CONSTRAINT; Schema: public; Owner: moac; Tablespace: 
--

ALTER TABLE ONLY frequency
    ADD CONSTRAINT frequency_pkey PRIMARY KEY (id);


--
-- Name: frequencydata_pkey; Type: CONSTRAINT; Schema: public; Owner: moac; Tablespace: 
--

ALTER TABLE ONLY frequencydata
    ADD CONSTRAINT frequencydata_pkey PRIMARY KEY (id);


--
-- Name: logs_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY logs
    ADD CONSTRAINT logs_pkey PRIMARY KEY (id);


--
-- Name: ministry_full_name_unique; Type: CONSTRAINT; Schema: public; Owner: moac; Tablespace: 
--

ALTER TABLE ONLY ministry2
    ADD CONSTRAINT ministry_full_name_unique UNIQUE (full_name);


--
-- Name: ministry_pkey; Type: CONSTRAINT; Schema: public; Owner: moac; Tablespace: 
--

ALTER TABLE ONLY ministry2
    ADD CONSTRAINT ministry_pkey PRIMARY KEY (id);


--
-- Name: obligation_obl_name_unique; Type: CONSTRAINT; Schema: public; Owner: moac; Tablespace: 
--

ALTER TABLE ONLY obligation
    ADD CONSTRAINT obligation_obl_name_unique UNIQUE (obl_name);


--
-- Name: obligation_pkey; Type: CONSTRAINT; Schema: public; Owner: moac; Tablespace: 
--

ALTER TABLE ONLY obligation
    ADD CONSTRAINT obligation_pkey PRIMARY KEY (id);


--
-- Name: obligation_policy_pkey; Type: CONSTRAINT; Schema: public; Owner: moac; Tablespace: 
--

ALTER TABLE ONLY obligation_policy
    ADD CONSTRAINT obligation_policy_pkey PRIMARY KEY (id);


--
-- Name: pk_dix_department; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY department
    ADD CONSTRAINT pk_dix_department PRIMARY KEY (department_id);


--
-- Name: policy_duty_email_unique; Type: CONSTRAINT; Schema: public; Owner: moac; Tablespace: 
--

ALTER TABLE ONLY policy_duty
    ADD CONSTRAINT policy_duty_email_unique UNIQUE (email);


--
-- Name: policy_duty_fname_unique; Type: CONSTRAINT; Schema: public; Owner: moac; Tablespace: 
--

ALTER TABLE ONLY policy_duty
    ADD CONSTRAINT policy_duty_fname_unique UNIQUE (fname);


--
-- Name: policy_duty_lastname_unique; Type: CONSTRAINT; Schema: public; Owner: moac; Tablespace: 
--

ALTER TABLE ONLY policy_duty
    ADD CONSTRAINT policy_duty_lastname_unique UNIQUE (lastname);


--
-- Name: policy_duty_pkey; Type: CONSTRAINT; Schema: public; Owner: moac; Tablespace: 
--

ALTER TABLE ONLY policy_duty
    ADD CONSTRAINT policy_duty_pkey PRIMARY KEY (id);


--
-- Name: policy_duty_position_unique; Type: CONSTRAINT; Schema: public; Owner: moac; Tablespace: 
--

ALTER TABLE ONLY policy_duty
    ADD CONSTRAINT policy_duty_position_unique UNIQUE ("position");


--
-- Name: policy_dutytype_pkey; Type: CONSTRAINT; Schema: public; Owner: moac; Tablespace: 
--

ALTER TABLE ONLY policy_dutytype
    ADD CONSTRAINT policy_dutytype_pkey PRIMARY KEY (id);


--
-- Name: policy_pkey; Type: CONSTRAINT; Schema: public; Owner: moac; Tablespace: 
--

ALTER TABLE ONLY policy
    ADD CONSTRAINT policy_pkey PRIMARY KEY (id);


--
-- Name: policy_policy_content_unique; Type: CONSTRAINT; Schema: public; Owner: moac; Tablespace: 
--

ALTER TABLE ONLY policy
    ADD CONSTRAINT policy_policy_content_unique UNIQUE (policy_content);


--
-- Name: privacy_init_name_en_unique; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY privacy_init
    ADD CONSTRAINT privacy_init_name_en_unique UNIQUE (name_en);


--
-- Name: privacy_init_name_th_unique; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY privacy_init
    ADD CONSTRAINT privacy_init_name_th_unique UNIQUE (name_th);


--
-- Name: privacy_init_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY privacy_init
    ADD CONSTRAINT privacy_init_pkey PRIMARY KEY (id);


--
-- Name: privacy_pkey; Type: CONSTRAINT; Schema: public; Owner: moac; Tablespace: 
--

ALTER TABLE ONLY privacy
    ADD CONSTRAINT privacy_pkey PRIMARY KEY (id);


--
-- Name: privacy_type_pkey; Type: CONSTRAINT; Schema: public; Owner: moac; Tablespace: 
--

ALTER TABLE ONLY privacy_type
    ADD CONSTRAINT privacy_type_pkey PRIMARY KEY (id);


--
-- Name: purpose_pkey; Type: CONSTRAINT; Schema: public; Owner: moac; Tablespace: 
--

ALTER TABLE ONLY purpose
    ADD CONSTRAINT purpose_pkey PRIMARY KEY (id);


--
-- Name: purpose_policy_pkey; Type: CONSTRAINT; Schema: public; Owner: moac; Tablespace: 
--

ALTER TABLE ONLY purpose_policy
    ADD CONSTRAINT purpose_policy_pkey PRIMARY KEY (id);


--
-- Name: purpose_purp_name_unique; Type: CONSTRAINT; Schema: public; Owner: moac; Tablespace: 
--

ALTER TABLE ONLY purpose
    ADD CONSTRAINT purpose_purp_name_unique UNIQUE (purp_name);


--
-- Name: request_data_pkey; Type: CONSTRAINT; Schema: public; Owner: moac; Tablespace: 
--

ALTER TABLE ONLY request_data
    ADD CONSTRAINT request_data_pkey PRIMARY KEY (id);


--
-- Name: request_type_data_pkey; Type: CONSTRAINT; Schema: public; Owner: moac; Tablespace: 
--

ALTER TABLE ONLY request_type_data
    ADD CONSTRAINT request_type_data_pkey PRIMARY KEY (id);


--
-- Name: request_type_data_type_name_unique; Type: CONSTRAINT; Schema: public; Owner: moac; Tablespace: 
--

ALTER TABLE ONLY request_type_data
    ADD CONSTRAINT request_type_data_type_name_unique UNIQUE (type_name);


--
-- Name: retain_data_data_id_unique; Type: CONSTRAINT; Schema: public; Owner: moac; Tablespace: 
--

ALTER TABLE ONLY retain_data
    ADD CONSTRAINT retain_data_data_id_unique UNIQUE (data_id);


--
-- Name: retain_data_pkey; Type: CONSTRAINT; Schema: public; Owner: moac; Tablespace: 
--

ALTER TABLE ONLY retain_data
    ADD CONSTRAINT retain_data_pkey PRIMARY KEY (id);


--
-- Name: retain_pkey; Type: CONSTRAINT; Schema: public; Owner: moac; Tablespace: 
--

ALTER TABLE ONLY retain
    ADD CONSTRAINT retain_pkey PRIMARY KEY (id);


--
-- Name: role_pkey; Type: CONSTRAINT; Schema: public; Owner: moac; Tablespace: 
--

ALTER TABLE ONLY roles
    ADD CONSTRAINT role_pkey PRIMARY KEY (id);


--
-- Name: role_policy_pkey; Type: CONSTRAINT; Schema: public; Owner: moac; Tablespace: 
--

ALTER TABLE ONLY role_policy
    ADD CONSTRAINT role_policy_pkey PRIMARY KEY (id);


--
-- Name: role_role_name_unique; Type: CONSTRAINT; Schema: public; Owner: moac; Tablespace: 
--

ALTER TABLE ONLY roles
    ADD CONSTRAINT role_role_name_unique UNIQUE (role_name);


--
-- Name: role_user_pkey; Type: CONSTRAINT; Schema: public; Owner: moac; Tablespace: 
--

ALTER TABLE ONLY role_user
    ADD CONSTRAINT role_user_pkey PRIMARY KEY (id);


--
-- Name: schedule_pkey; Type: CONSTRAINT; Schema: public; Owner: moac; Tablespace: 
--

ALTER TABLE ONLY schedule
    ADD CONSTRAINT schedule_pkey PRIMARY KEY (id);


--
-- Name: source_field_fld_name_unique; Type: CONSTRAINT; Schema: public; Owner: moac; Tablespace: 
--

ALTER TABLE ONLY source_field
    ADD CONSTRAINT source_field_fld_name_unique UNIQUE (fld_name);


--
-- Name: source_field_pkey; Type: CONSTRAINT; Schema: public; Owner: moac; Tablespace: 
--

ALTER TABLE ONLY source_field
    ADD CONSTRAINT source_field_pkey PRIMARY KEY (id);


--
-- Name: source_tbl_pkey; Type: CONSTRAINT; Schema: public; Owner: moac; Tablespace: 
--

ALTER TABLE ONLY source_tbl
    ADD CONSTRAINT source_tbl_pkey PRIMARY KEY (id);


--
-- Name: source_tbl_src_name_unique; Type: CONSTRAINT; Schema: public; Owner: moac; Tablespace: 
--

ALTER TABLE ONLY source_tbl
    ADD CONSTRAINT source_tbl_src_name_unique UNIQUE (src_name);


--
-- Name: srctable_pkey; Type: CONSTRAINT; Schema: public; Owner: moac; Tablespace: 
--

ALTER TABLE ONLY srctable
    ADD CONSTRAINT srctable_pkey PRIMARY KEY (id);


--
-- Name: srctable_src_name_unique; Type: CONSTRAINT; Schema: public; Owner: moac; Tablespace: 
--

ALTER TABLE ONLY srctable
    ADD CONSTRAINT srctable_src_name_unique UNIQUE (src_name);


--
-- Name: training_pkey; Type: CONSTRAINT; Schema: public; Owner: moac; Tablespace: 
--

ALTER TABLE ONLY training
    ADD CONSTRAINT training_pkey PRIMARY KEY (id);


--
-- Name: transfer_freqdata_id_unique; Type: CONSTRAINT; Schema: public; Owner: moac; Tablespace: 
--

ALTER TABLE ONLY transfer
    ADD CONSTRAINT transfer_freqdata_id_unique UNIQUE (freqdata_id);


--
-- Name: transfer_pkey; Type: CONSTRAINT; Schema: public; Owner: moac; Tablespace: 
--

ALTER TABLE ONLY transfer
    ADD CONSTRAINT transfer_pkey PRIMARY KEY (id);


--
-- Name: user_training_pkey; Type: CONSTRAINT; Schema: public; Owner: moac; Tablespace: 
--

ALTER TABLE ONLY user_training
    ADD CONSTRAINT user_training_pkey PRIMARY KEY (id);


--
-- Name: usergroup_pkey; Type: CONSTRAINT; Schema: public; Owner: moac; Tablespace: 
--

ALTER TABLE ONLY usergroup
    ADD CONSTRAINT usergroup_pkey PRIMARY KEY (id);


--
-- Name: usernhc_email_unique; Type: CONSTRAINT; Schema: public; Owner: moac; Tablespace: 
--

ALTER TABLE ONLY usernhc
    ADD CONSTRAINT usernhc_email_unique UNIQUE (email);


--
-- Name: usernhc_fname_unique; Type: CONSTRAINT; Schema: public; Owner: moac; Tablespace: 
--

ALTER TABLE ONLY usernhc
    ADD CONSTRAINT usernhc_fname_unique UNIQUE (fname);


--
-- Name: usernhc_password_unique; Type: CONSTRAINT; Schema: public; Owner: moac; Tablespace: 
--

ALTER TABLE ONLY usernhc
    ADD CONSTRAINT usernhc_password_unique UNIQUE (password);


--
-- Name: usernhc_pkey; Type: CONSTRAINT; Schema: public; Owner: moac; Tablespace: 
--

ALTER TABLE ONLY usernhc
    ADD CONSTRAINT usernhc_pkey PRIMARY KEY (id);


--
-- Name: usernhc_username_unique; Type: CONSTRAINT; Schema: public; Owner: moac; Tablespace: 
--

ALTER TABLE ONLY usernhc
    ADD CONSTRAINT usernhc_username_unique UNIQUE (username);


--
-- Name: policy_role; Type: RULE; Schema: public; Owner: moac
--

CREATE RULE policy_role AS ON DELETE TO policy DO DELETE FROM role_policy WHERE (old.id = role_policy.policy_id);


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

