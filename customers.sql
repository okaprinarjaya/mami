-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               5.6.21 - MySQL Community Server (GPL)
-- Server OS:                    Win32
-- HeidiSQL Version:             9.2.0.4947
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Dumping database structure for mami
CREATE DATABASE IF NOT EXISTS `mami` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `mami`;


-- Dumping structure for table mami.customers
CREATE TABLE IF NOT EXISTS `customers` (
  `CUSTOMER_ID` int(11) NOT NULL AUTO_INCREMENT,
  `CIF_NUM` varchar(32) DEFAULT NULL,
  `AGT_CD` varchar(8) DEFAULT NULL,
  `CLI_TYP` varchar(4) DEFAULT NULL,
  `CLI_SUB_TYP` varchar(8) DEFAULT NULL,
  `SID` int(32) DEFAULT NULL,
  `STATUS` char(1) DEFAULT NULL,
  `REMARKS` varchar(256) DEFAULT NULL,
  `CLI_NM` varchar(32) DEFAULT NULL,
  `MID_NM` varchar(32) DEFAULT NULL,
  `LAST_NM` varchar(16) DEFAULT NULL,
  `SEX_CODE` char(1) DEFAULT NULL,
  `EMPLOYEE_NUM` varchar(64) DEFAULT NULL,
  `NATION` tinyint(4) DEFAULT NULL,
  `COUNTRY_CD` varchar(4) DEFAULT NULL,
  `ID_TYP` tinyint(4) DEFAULT NULL,
  `ID_NUM` varchar(32) DEFAULT NULL,
  `ID_EXPIRY_DT` date DEFAULT NULL,
  `BIRTH_COUNTRY_CD` varchar(4) DEFAULT NULL,
  `PRIM_PHON_COUNTRY_CD` varchar(4) DEFAULT NULL,
  `MOBILE_COUNTRY_CD` varchar(4) DEFAULT NULL,
  `OTHR_PHON_COUNTRY_CD` varchar(4) DEFAULT NULL,
  `FAX_COUNTRY_CD` varchar(4) DEFAULT NULL,
  `OFFICE_PHON_COUNTRY_CD` varchar(4) DEFAULT NULL,
  `BIRTH_DT` date DEFAULT NULL,
  `BIRTH_PLACE` varchar(16) DEFAULT NULL,
  `PRIM_PHON_NUM` varchar(16) DEFAULT NULL,
  `MOBILE_NUM` varchar(16) DEFAULT NULL,
  `WEBSITE` varchar(64) DEFAULT NULL,
  `OTHER_PHON_NUM` varchar(16) DEFAULT NULL,
  `FAX_NUM` varchar(16) DEFAULT NULL,
  `OFFICE_PHON_NUM` varchar(16) DEFAULT NULL,
  `EXT` varchar(8) DEFAULT NULL,
  `CLI_NM_PERSON` varchar(128) DEFAULT NULL,
  `EXT_PERSON` varchar(32) DEFAULT NULL,
  `MOBILE_NUM_PERSON` varchar(32) DEFAULT NULL,
  `EMAIL_ADD_PERSON` varchar(32) DEFAULT NULL,
  `FAX_NUM_PERSON` varchar(32) DEFAULT NULL,
  `EMAIL_ADD` varchar(32) DEFAULT NULL,
  `RELIGION` tinyint(4) DEFAULT NULL,
  `MARITAL_STATUS` char(1) DEFAULT NULL,
  `RISK_SCORE` decimal(10,0) DEFAULT NULL,
  `OCCP_TYP` varchar(1) DEFAULT NULL,
  `OCCP_DESC` varchar(128) DEFAULT NULL,
  `BUS_NATURE` varchar(8) DEFAULT NULL,
  `ECHELON` varchar(16) DEFAULT NULL,
  `TAX_NUM` varchar(32) DEFAULT NULL,
  `TAX_REG_DT` date DEFAULT NULL,
  `ANNUAL_INCOME` decimal(10,0) DEFAULT NULL,
  `SPOUSE_NM` varchar(64) DEFAULT NULL,
  `SPOUSE_OCCP_CODE` varchar(16) DEFAULT NULL,
  `SPOUSE_ID_TYP` char(1) DEFAULT NULL,
  `SPOUSE_ID_NO` varchar(32) DEFAULT NULL,
  `SOURCE_FUND` char(1) DEFAULT NULL,
  `FND_TRXN_CD` varchar(128) DEFAULT NULL,
  `RED_FLAG` char(1) DEFAULT NULL,
  `ADDR_1` varchar(64) DEFAULT NULL,
  `ADDR_2` varchar(64) DEFAULT NULL,
  `ADDR_3` varchar(64) DEFAULT NULL,
  `CITY_CODE` varchar(64) DEFAULT NULL,
  `PROV_CODE` varchar(64) DEFAULT NULL,
  `ZIP_CODE` varchar(8) DEFAULT NULL,
  `ADDR_CODE` varchar(8) DEFAULT NULL,
  `ADDR_1_DEFAULT` varchar(64) DEFAULT NULL,
  `ADDR_2_DEFAULT` varchar(64) DEFAULT NULL,
  `ADDR_3_DEFAULT` varchar(64) DEFAULT NULL,
  `CITY_CODE_DEFAULT` varchar(8) DEFAULT NULL,
  `PROV_CODE_DEFAULT` varchar(8) DEFAULT NULL,
  `ZIP_CODE_DEFAULT` varchar(8) DEFAULT NULL,
  `ADDR_CODE_DEFAULT` varchar(8) DEFAULT NULL,
  `COUNTRY_CODE_DEFAULT` varchar(8) DEFAULT NULL,
  `KITAS` varchar(32) DEFAULT NULL,
  `KIMS` varchar(32) DEFAULT NULL,
  `KITAP` varchar(32) DEFAULT NULL,
  `RENEWAL_DATE` date DEFAULT NULL,
  `INDMTY_LETTER` varchar(4) DEFAULT NULL,
  `SPECIMEN_SIGN` varchar(4) DEFAULT NULL,
  `BANK_CD` varchar(16) DEFAULT NULL,
  `BANK_ACCT_NUM` varchar(64) DEFAULT NULL,
  `BANK_ACCT_NM` varchar(128) DEFAULT NULL,
  `BRANCH_NAME` varchar(256) DEFAULT NULL,
  `CLI_FATCA_STAT` varchar(4) DEFAULT NULL,
  `CLI_FATCA_STAT_OVR` char(1) DEFAULT NULL,
  `PRI_WAIVER` varchar(4) DEFAULT NULL,
  `SSN` varchar(16) DEFAULT NULL,
  `FATCA_SELF_CERT` varchar(4) DEFAULT NULL,
  `TIN` varchar(16) DEFAULT NULL,
  `W8_FORM` varchar(4) DEFAULT NULL,
  `W8_ADDL_DOC` varchar(4) DEFAULT NULL,
  `W9_FORM` varchar(4) DEFAULT NULL,
  `ENTITY_TYP` varchar(4) DEFAULT NULL,
  `CREATED_BY` int(11) DEFAULT NULL,
  `CREATED_BY_AGT` varchar(8) DEFAULT NULL,
  `CLI_NM_COMPANY` varchar(128) DEFAULT NULL,
  `CLI_NM_COMPANY_SHORT` varchar(128) DEFAULT NULL,
  `CORP_BIC_CODE` varchar(32) DEFAULT NULL,
  `ADDR_1_COMPANY` varchar(512) DEFAULT NULL,
  `ADDR_2_COMPANY` varchar(512) DEFAULT NULL,
  `ADDR_3_COMPANY` varchar(512) DEFAULT NULL,
  `ZIP_CODE_COMPANY` varchar(8) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`CUSTOMER_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- Dumping data for table mami.customers: ~1 rows (approximately)
/*!40000 ALTER TABLE `customers` DISABLE KEYS */;
INSERT INTO `customers` (`CUSTOMER_ID`, `CIF_NUM`, `AGT_CD`, `CLI_TYP`, `CLI_SUB_TYP`, `SID`, `STATUS`, `REMARKS`, `CLI_NM`, `MID_NM`, `LAST_NM`, `SEX_CODE`, `EMPLOYEE_NUM`, `NATION`, `COUNTRY_CD`, `ID_TYP`, `ID_NUM`, `ID_EXPIRY_DT`, `BIRTH_COUNTRY_CD`, `PRIM_PHON_COUNTRY_CD`, `MOBILE_COUNTRY_CD`, `OTHR_PHON_COUNTRY_CD`, `FAX_COUNTRY_CD`, `OFFICE_PHON_COUNTRY_CD`, `BIRTH_DT`, `BIRTH_PLACE`, `PRIM_PHON_NUM`, `MOBILE_NUM`, `WEBSITE`, `OTHER_PHON_NUM`, `FAX_NUM`, `OFFICE_PHON_NUM`, `EXT`, `CLI_NM_PERSON`, `EXT_PERSON`, `MOBILE_NUM_PERSON`, `EMAIL_ADD_PERSON`, `FAX_NUM_PERSON`, `EMAIL_ADD`, `RELIGION`, `MARITAL_STATUS`, `RISK_SCORE`, `OCCP_TYP`, `OCCP_DESC`, `BUS_NATURE`, `ECHELON`, `TAX_NUM`, `TAX_REG_DT`, `ANNUAL_INCOME`, `SPOUSE_NM`, `SPOUSE_OCCP_CODE`, `SPOUSE_ID_TYP`, `SPOUSE_ID_NO`, `SOURCE_FUND`, `FND_TRXN_CD`, `RED_FLAG`, `ADDR_1`, `ADDR_2`, `ADDR_3`, `CITY_CODE`, `PROV_CODE`, `ZIP_CODE`, `ADDR_CODE`, `ADDR_1_DEFAULT`, `ADDR_2_DEFAULT`, `ADDR_3_DEFAULT`, `CITY_CODE_DEFAULT`, `PROV_CODE_DEFAULT`, `ZIP_CODE_DEFAULT`, `ADDR_CODE_DEFAULT`, `COUNTRY_CODE_DEFAULT`, `KITAS`, `KIMS`, `KITAP`, `RENEWAL_DATE`, `INDMTY_LETTER`, `SPECIMEN_SIGN`, `BANK_CD`, `BANK_ACCT_NUM`, `BANK_ACCT_NM`, `BRANCH_NAME`, `CLI_FATCA_STAT`, `CLI_FATCA_STAT_OVR`, `PRI_WAIVER`, `SSN`, `FATCA_SELF_CERT`, `TIN`, `W8_FORM`, `W8_ADDL_DOC`, `W9_FORM`, `ENTITY_TYP`, `CREATED_BY`, `CREATED_BY_AGT`, `CLI_NM_COMPANY`, `CLI_NM_COMPANY_SHORT`, `CORP_BIC_CODE`, `ADDR_1_COMPANY`, `ADDR_2_COMPANY`, `ADDR_3_COMPANY`, `ZIP_CODE_COMPANY`, `created`, `modified`) VALUES
	(1, '', '', '2', '001', 1, '', '', 'Bung', 'Jonny', 'Lastri', 'M', '', NULL, '', NULL, '', NULL, '', '', '', '', '', '', NULL, '', '08174128301', '08174128301', 'TEST', '08174128301', '1', '08174128301', '112233', '1', '2', '3', '45', '5', 'bungjonny@yahoo.com', NULL, '', 23, '', '', '', '', '', NULL, NULL, '', '', '', '', '', '', '', '123', '4', '12', '123', '412', '12', '312', '213', '14', '123', '5', '123', '421', '3', NULL, '', '', '', NULL, '', '', '0140001', '111222333', 'Bung Jonny', 'B C A PINTU AIR  I', '', '', '', '', '', '', '', '', '', '', 1, NULL, 'TEST', 'TEST', 'TEST', 'TEST', 'TEST', 'TEST', 'TEST', '2016-03-30 03:35:00', '2016-04-12 15:07:59');
/*!40000 ALTER TABLE `customers` ENABLE KEYS */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
