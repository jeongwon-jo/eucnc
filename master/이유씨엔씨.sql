-- 회원 테이블 시작
CREATE TABLE member_info(
    `idx` INT NOT NULL AUTO_INCREMENT COMMENT 'PK',
    `member_type` VARCHAR(10) DEFAULT 'GEN' COMMENT '회원종류, AD: 최고관리자, PM: 관리자, GEN: 회원',
    `user_id` VARCHAR(80) NOT NULL COMMENT '회원 ID',
    `user_pwd` VARCHAR(100) NOT NULL COMMENT '회원 비밀번호',
    `user_name` VARCHAR(40) NOT NULL COMMENT '회원 이름',
    `wdate` DATETIME DEFAULT NULL COMMENT '등록일',
    PRIMARY KEY(`idx`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='회원 테이블';
-- 회원 테이블 종료

-- 회원 테이블 최고관리자 등록 시작
INSERT INTO member_info (`member_type`, `user_id`, `user_pwd`, `user_name`, `wdate`) VALUES ('AD', 'admin', '$2y$10$j639Z1hVftScRc2sjaukwO/iqN.90X6fzvgxiNySX4rGR9PUCkfGC', '최고관리자', NOW());
-- 회원 테이블 최고관리자 등록 종료

-- 이미지 슬라이드 테이블 시작
CREATE TABLE image_slide_info(
    `idx` INT NOT NULL AUTO_INCREMENT COMMENT 'PK',
    `file_org` VARCHAR(30) NOT NULL COMMENT '파일 원본명',
    `file_chg` VARCHAR(30) NOT NULL COMMENT '파일 서버명',
    `kor_txt_1` VARCHAR(50) DEFAULT NULL COMMENT '한글 텍스트1',
    `kor_txt_2_1` VARCHAR(50) DEFAULT NULL COMMENT '한글 텍스트2-1',
    `kor_txt_2_2` VARCHAR(50) DEFAULT NULL COMMENT '한글 텍스트2-2',
    `eng_txt_1` VARCHAR(50) DEFAULT NULL COMMENT '영문 텍스트1',
    `eng_txt_2_1` VARCHAR(50) DEFAULT NULL COMMENT '영문 텍스트2-1',
    `eng_txt_2_2` VARCHAR(50) DEFAULT NULL COMMENT '영문 텍스트2-2',
    PRIMARY KEY (`idx`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='이미지 슬라이드 테이블';
-- 이미지 슬라이드 테이블 종료

-- 이미지 슬라이드 등록 시작
INSERT INTO image_slide_info (`file_org`, `file_chg`, `kor_txt_1`, `kor_txt_2_1`, `kor_txt_2_2`, `eng_txt_1`, `eng_txt_2_1`, `eng_txt_2_2`) VALUES ('', '', '페인트의 게임체인저', '에너지 저감과 탄소중립을', '선도하는 친환경 단ㆍ차열 페인트', 'Game-changer in Paint industry', '영문 문구 text', '영문 문구 text');
INSERT INTO image_slide_info (`file_org`, `file_chg`, `kor_txt_1`, `kor_txt_2_1`, `kor_txt_2_2`, `eng_txt_1`, `eng_txt_2_1`, `eng_txt_2_2`) VALUES ('', '', '페인트의 게임체인저', '에너지 저감과 탄소중립을', '선도하는 친환경 단ㆍ차열 페인트', 'Game-changer in Paint industry', '영문 문구 text', '영문 문구 text');
INSERT INTO image_slide_info (`file_org`, `file_chg`, `kor_txt_1`, `kor_txt_2_1`, `kor_txt_2_2`, `eng_txt_1`, `eng_txt_2_1`, `eng_txt_2_2`) VALUES ('', '', '페인트의 게임체인저', '에너지 저감과 탄소중립을', '선도하는 친환경 단ㆍ차열 페인트', 'Game-changer in Paint industry', '영문 문구 text', '영문 문구 text');
-- 이미지 슬라이드 등록 종료

-- 특허 테이블 시작
CREATE TABLE patent_info(
    `idx` INT NOT NULL AUTO_INCREMENT COMMENT 'PK',
    `kor_subject_1` VARCHAR(50) NOT NULL COMMENT '한글 제목1',
    `kor_subject_2` VARCHAR(50) NOT NULL COMMENT '한글 제목2',
    `eng_subject_1` VARCHAR(50) NOT NULL COMMENT '영문 제목1',
    `eng_subject_2` VARCHAR(50) NOT NULL COMMENT '영문 제목2',
    `kor_desc_1` VARCHAR(50) NOT NULL COMMENT '한글 설명1',
    `kor_desc_2` VARCHAR(50) NOT NULL COMMENT '한글 설명2',
    `eng_desc_1` VARCHAR(50) NOT NULL COMMENT '영문 설명1',
    `eng_desc_2` VARCHAR(50) NOT NULL COMMENT '영문 설명2',
    `number` VARCHAR(70) NOT NULL COMMENT '번호',
    `file_org` VARCHAR(30) NOT NULL COMMENT '파일 원본명',
    `file_chg` VARCHAR(30) NOT NULL COMMENT '파일 서버명',
    PRIMARY KEY (`idx`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='특허 테이블';
-- 특허 테이블 종료

-- 인증서 테이블 시작
CREATE TABLE certification_info(
    `idx` INT NOT NULL AUTO_INCREMENT COMMENT 'PK',
    `kor_subject_1` VARCHAR(50) NOT NULL COMMENT '한글 제목1',
    `kor_subject_2` VARCHAR(50) NOT NULL COMMENT '한글 제목2',
    `eng_subject_1` VARCHAR(50) NOT NULL COMMENT '영문 제목1',
    `eng_subject_2` VARCHAR(50) NOT NULL COMMENT '영문 제목2',
    `kor_desc_1` VARCHAR(50) NOT NULL COMMENT '한글 설명1',
    `kor_desc_2` VARCHAR(50) NOT NULL COMMENT '한글 설명2',
    `eng_desc_1` VARCHAR(50) NOT NULL COMMENT '영문 설명1',
    `eng_desc_2` VARCHAR(50) NOT NULL COMMENT '영문 설명2',
    `file_org` VARCHAR(30) NOT NULL COMMENT '파일 원본명',
    `file_chg` VARCHAR(30) NOT NULL COMMENT '파일 서버명',
    PRIMARY KEY (`idx`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='인증서 테이블';
-- 인증서 테이블 종료

-- 수상내역 테이블 시작 (24/02/23 업데이트)
CREATE TABLE awards_info(
    `idx` INT NOT NULL AUTO_INCREMENT COMMENT 'PK',
    `file_org` VARCHAR(100) NOT NULL COMMENT '파일 원본명',
    `file_chg` VARCHAR(100) NOT NULL COMMENT '파일 서버명',
    `kor` TEXT NOT NULL COMMENT '국문',
    `eng` TEXT NOT NULL COMMENT '영문',
    `priority` INT DEFAULT 0 COMMENT '우선순위',
    `wdate` DATETIME NOT NULL COMMENT '등록일',
    PRIMARY KEY (`idx`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='수상내역 테이블';
-- 수상내역 테이블 종료

-- 시공현황 테이블 시작
CREATE TABLE construction_info(
    `idx` INT NOT NULL AUTO_INCREMENT COMMENT 'PK',
    `kor_subject_1` VARCHAR(50) NOT NULL COMMENT '한글 제목1',
    `kor_subject_2` VARCHAR(50) NOT NULL COMMENT '한글 제목2',
    `eng_subject_1` VARCHAR(50) NOT NULL COMMENT '영문 제목1',
    `eng_subject_2` VARCHAR(50) NOT NULL COMMENT '영문 제목2',
    `file_org` VARCHAR(30) NOT NULL COMMENT '파일 원본명',
    `file_chg` VARCHAR(30) NOT NULL COMMENT '파일 서버명',
    PRIMARY KEY (`idx`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='시공현황 테이블';
-- 시공현황 테이블 종료

-- 기사 자료 게시글 테이블 시작
CREATE TABLE news_info(
    `idx` INT NOT NULL AUTO_INCREMENT COMMENT 'PK',
    `subject` VARCHAR(70) NOT NULL COMMENT '제목',
    `content` LONGTEXT NOT NULL COMMENT '내용',
    `file_org` VARCHAR(30) NOT NULL COMMENT '파일 원본명',
    `file_chg` VARCHAR(30) NOT NULL COMMENT '파일 서버명',
    `wdate` DATETIME NOT NULL COMMENT '등록일',
    PRIMARY KEY (`idx`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='기사 자료 게시글 테이블';
-- 기사 자료 게시글 테이블 종료

-- 미디어 자료 테이블 시작
CREATE TABLE media_info(
    `idx` INT NOT NULL AUTO_INCREMENT COMMENT 'PK',
    `kor_subject_1` VARCHAR(50) NOT NULL COMMENT '한글 제목1',
    `kor_subject_2` VARCHAR(50) NOT NULL COMMENT '한글 제목2',
    `eng_subject_1` VARCHAR(50) NOT NULL COMMENT '영문 제목1',
    `eng_subject_2` VARCHAR(50) NOT NULL COMMENT '영문 제목2',
    `link` TEXT NOT NULL COMMENT '링크',
    `wdate` DATETIME NOT NULL COMMENT '등록일',
    PRIMARY KEY (`idx`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='미디어 자료 테이블';
-- 미디어 자료 테이블 종료

-- 온라인 문의 테이블 시작
CREATE TABLE inquiry_info(
    `idx` INT NOT NULL AUTO_INCREMENT COMMENT 'PK',
    `subject` VARCHAR(100) NOT NULL COMMENT '제목',
    `content` LONGTEXT NOT NULL COMMENT '내용',
    `answer` LONGTEXT NOT NULL COMMENT '답변',
    `writer` VARCHAR(30) NOT NULL COMMENT '작성자',
    `password` TEXT NOT NULL COMMENT '비밀번호',
    `file_org_q` VARCHAR(30) NOT NULL COMMENT '답변자 파일 원본명',
    `file_chg_q` VARCHAR(30) NOT NULL COMMENT '답변자 파일 서버명',
    `wdate` DATETIME NOT NULL COMMENT '등록일',
    `state` TINYINT(1) DEFAULT 0 COMMENT '답변 상태 (Y: 1/N: 0)',
    PRIMARY KEY (`idx`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='온라인 문의 테이블';
-- 온라인 문의 테이블 종료

-- 온라인 문의 파일 테이블 시작
CREATE TABLE inquiry_file_info(
    `idx` INT NOT NULL AUTO_INCREMENT COMMENT 'PK',
    `inquiry_idx` INT NOT NULL COMMENT '문의 PK',
    `file_org` VARCHAR(30) NOT NULL COMMENT '파일 원본명',
    `file_chg` VARCHAR(30) NOT NULL COMMENT '파일 서버명',
    PRIMARY KEY (`idx`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='온라인 파일 문의 테이블';
-- 온라인 문의 파일 테이블 종료

-- 사업연혁 년도 테이블 시작
CREATE TABLE company_timeline_list(
    `idx` INT NOT NULL AUTO_INCREMENT PRIMARY KEY COMMENT 'PK',
    `year` INT NOT NULL COMMENT '년도',
    `file_org` VARCHAR(100) NOT NULL COMMENT '파일 원본명',
    `file_chg` VARCHAR(100) NOT NULL COMMENT '파일 서버명',
    `priority` INT DEFAULT 0 COMMENT '우선순위',
    `wdate` DATETIME NOT NULL COMMENT '등록일'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='사업연혁 년도 테이블';
-- 사업연혁 년도 테이블 종료

-- 사업연혁 테이블 시작
CREATE TABLE company_timeline_info(
    `idx` INT NOT NULL AUTO_INCREMENT PRIMARY KEY COMMENT 'PK',
    `timeline_idx` INT NOT NULL COMMENT 'company_timeline_list PK',
    `month` INTNOT NULL COMMENT '월',
    `content_kor` TEXT NOT NULL COMMENT '국문 내용',
    `content_eng` TEXT NOT NULL COMMENT '영문 내용',
    `wdate` DATETIME NOT NULL COMMENT '등록일'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='사업연혁 테이블';
-- 사업연혁 테이블 종료

-- 기업행사 테이블 시작
CREATE TABLE festival_info(
    `idx` INT NOT NULL AUTO_INCREMENT PRIMARY KEY COMMENT 'PK',
    `file_org` VARCHAR(100) NOT NULL COMMENT '파일 원본명',
    `file_chg` VARCHAR(100) NOT NULL COMMENT '파일 서버명',
    `kor_subject` VARCHAR(200) NOT NULL COMMENT '제목(국문)',
    `eng_subject` VARCHAR(200) NOT NULL COMMENT '제목(영문)',
    `kor_content` VARCHAR(200) NOT NULL COMMENT '내용(국문)',
    `eng_content` VARCHAR(200) NOT NULL COMMENT '내용(영문)',
    `priority` INT DEFAULT 0 COMMENT '우선순위',
    `wdate` DATETIME NOT NULL COMMENT '등록일'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='기업행사 테이블';
-- 기업행사 테이블 종료

-- 다운로드 테이블 시작
CREATE TABLE download_info(
    `idx` INT NOT NULL AUTO_INCREMENT PRIMARY KEY COMMENT 'PK',
    `kor_subject` VARCHAR(200) NOT NULL COMMENT '제목(국문)',
    `eng_subject` VARCHAR(200) NOT NULL COMMENT '제목(영문)',
    `kor_content` LONGTEXT NOT NULL COMMENT '내용(국문)',
    `eng_content` LONGTEXT NOT NULL COMMENT '내용(영문)',
    `priority` INT DEFAULT 0 COMMENT '우선순위',
    `wdate` DATETIME NOT NULL COMMENT '등록일'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='다운로드 테이블';
-- 다운로드 테이블 종료

-- 다운로드 첨부파일 테이블 시작
CREATE TABLE download_file_info(
    `idx` INT NOT NULL AUTO_INCREMENT PRIMARY KEY COMMENT 'PK',
    `download_idx` INT NOT NULL COMMENT 'download_info PK',
    `file_org` VARCHAR(100) NOT NULL COMMENT '파일 원본명',
    `file_chg` VARCHAR(100) NOT NULL COMMENT '파일 서버명'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='다운로드 첨부파일 테이블';
-- 다운로드 첨부파일 테이블 종료

-- 제품소개 테이블 시작
CREATE TABLE item_promt_info(
    `idx` INT NOT NULL AUTO_INCREMENT PRIMARY KEY COMMENT 'PK',
    `type` INT NOT NULL COMMENT '구분 (1: 단차열도료/2: 방염도료/3: 불연도료/4: 방열도료)',
    `kor_img_org` VARCHAR(100) NOT NULL COMMENT '국문 이미지 원본명',
    `kor_img_chg` VARCHAR(100) NOT NULL COMMENT '국문 이미지 서버명',
    `eng_img_org` VARCHAR(100) NOT NULL COMMENT '영문 이미지 원본명',
    `eng_img_chg` VARCHAR(100) NOT NULL COMMENT '영문 이미지 서버명',
    `priority` INT NOT NULL COMMENT '우선순위',
    `wdate` DATETIME NOT NULL COMMENT '등록일'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='제품소개 테이블';
-- 제품소개 테이블 종료