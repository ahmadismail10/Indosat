--Sheet 1 Nomor 1
DROP TABLE IF EXISTS `growth_vlr`;
CREATE TABLE IF NOT EXISTS `growth_vlr` (
  `tanggal` date DEFAULT NULL,
  `vlr` int(11) DEFAULT NULL,
  `vlr_sebelumnya` int(11) DEFAULT NULL,
  `persentase` varchar(10) DEFAULT NULL,
  `keterangan` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
DELIMITER $$

CREATE OR REPLACE PROCEDURE delete_growth_vlr(IN keyword date)
	BEGIN
		DELETE FROM `growth_vlr` WHERE MONTH(`tanggal`) = MONTH(keyword) AND YEAR(`tanggal`) = YEAR(keyword);
	END$$
CREATE OR REPLACE PROCEDURE growth_vlr(IN keyword date) 
	BEGIN 
		DECLARE counter INT;
		DECLARE tanggal date; 
		DECLARE vlr INT;
		DECLARE vlr_sebelumnya INT;
		DECLARE keterangan varchar(20);
		DECLARE done INT DEFAULT 0; 
		DECLARE cur1 CURSOR FOR SELECT v.tanggal, MAX(v.vlr) AS vlr FROM vlr v WHERE MONTH(v.tanggal) = MONTH(keyword) AND YEAR(v.tanggal) = YEAR(keyword) AND v.MICRO_CLUSTER = 'mc-surabaya_1_1' GROUP BY v.TANGGAL; 
		DECLARE continue handler for not found set done=1; 
		SELECT COUNT(*) INTO counter FROM vlr v WHERE MONTH(v.tanggal) = MONTH(keyword) AND YEAR(v.tanggal) = YEAR(keyword) AND v.MICRO_CLUSTER = 'mc-surabaya_1_1';
		IF counter > 0 THEN
			CALL delete_growth_vlr(keyword);
			
			open cur1;
				looping:loop 
					fetch cur1 INTO tanggal, vlr; 
					IF done = 1 THEN 
						leave looping; 
					ELSE
						SELECT max(v.vlr) INTO vlr_sebelumnya FROM vlr v WHERE v.tanggal = DATE_SUB(tanggal, INTERVAL 1 MONTH) AND v.MICRO_CLUSTER = 'mc-surabaya_1_1';
						IF (vlr > vlr_sebelumnya OR vlr_sebelumnya IS NULL) THEN
							SET keterangan = 'naik';
						ELSE
							SET keterangan = 'turun';
						END IF;
						INSERT INTO growth_vlr VALUES(tanggal, vlr, vlr_sebelumnya, (concat(round(( abs(vlr-vlr_sebelumnya)/vlr_sebelumnya * 100 ),2),'%')), keterangan);
					END IF;
				end loop looping; 
			close cur1; 
			SELECT v.tanggal, v.vlr, v.vlr_sebelumnya, v.persentase, v.keterangan FROM (SELECT MAX(x.vlr) AS max FROM growth_vlr x WHERE MONTH(x.tanggal) = MONTH(keyword) AND YEAR(x.tanggal) = YEAR(keyword)) m, growth_vlr v WHERE MONTH(v.tanggal) = MONTH(keyword) AND YEAR(v.tanggal) = YEAR(keyword) AND v.vlr = m.max;
		END IF;
	END$$
	
--Sheet 2 Nomor 2
DROP TABLE IF EXISTS `GROWTH_TRAFIK`;
CREATE TABLE IF NOT EXISTS `GROWTH_TRAFIK` (
  `tanggal` date DEFAULT NULL,
  `TRAFIK` int(11) DEFAULT NULL,
  `TRAFIK_sebelumnya` int(11) DEFAULT NULL,
  `persentase` varchar(10) DEFAULT NULL,
  `keterangan` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
DELIMITER $$

CREATE OR REPLACE PROCEDURE delete_GROWTH_TRAFIK(IN keyword date)
	BEGIN
		DELETE FROM `GROWTH_TRAFIK` WHERE MONTH(`tanggal`) = MONTH(keyword) AND YEAR(`tanggal`) = YEAR(keyword);
	END$$
CREATE OR REPLACE PROCEDURE GROWTH_TRAFIK(IN keyword date) 
	BEGIN 
		DECLARE counter INT;
		DECLARE tanggal date; 
		DECLARE TRAFIK INT;
		DECLARE TRAFIK_sebelumnya INT;
		DECLARE keterangan varchar(20);
		DECLARE done INT DEFAULT 0; 
		DECLARE cur1 CURSOR FOR SELECT T.tanggal, MAX(T.TRAFIK) AS TRAFIK FROM TRAFIK T WHERE MONTH(T.tanggal) = MONTH(keyword) AND YEAR(T.tanggal) = YEAR(keyword) AND T.MICRO_CLUSTER = 'mc-surabaya_1_1' GROUP BY T.TANGGAL; 
		DECLARE continue handler for not found set done=1; 
		SELECT COUNT(*) INTO counter FROM TRAFIK T WHERE MONTH(T.tanggal) = MONTH(keyword) AND YEAR(T.tanggal) = YEAR(keyword) AND T.MICRO_CLUSTER = 'mc-surabaya_1_1';
		IF counter > 0 THEN
			CALL delete_GROWTH_TRAFIK(keyword);
			
			open cur1;
				looping:loop 
					fetch cur1 INTO tanggal, TRAFIK; 
					IF done = 1 THEN 
						leave looping; 
					ELSE
						SELECT max(T.TRAFIK) INTO TRAFIK_sebelumnya FROM TRAFIK T WHERE T.tanggal = DATE_SUB(tanggal, INTERVAL 1 MONTH) AND T.MICRO_CLUSTER = 'mc-surabaya_1_1';
						IF (TRAFIK > TRAFIK_sebelumnya OR TRAFIK_sebelumnya IS NULL) THEN
							SET keterangan = 'naik';
						ELSE
							SET keterangan = 'turun';
						END IF;
						INSERT INTO GROWTH_TRAFIK VALUES(tanggal, TRAFIK, TRAFIK_sebelumnya, (concat(round(( abs(TRAFIK-TRAFIK_sebelumnya)/TRAFIK_sebelumnya * 100 ),2),'%')), keterangan);
					END IF;
				end loop looping; 
			close cur1; 
			SELECT T.tanggal, T.TRAFIK, T.TRAFIK_sebelumnya, T.persentase, T.keterangan FROM (SELECT MAX(x.TRAFIK) AS max FROM GROWTH_TRAFIK x WHERE MONTH(x.tanggal) = MONTH(keyword) AND YEAR(x.tanggal) = YEAR(keyword)) m, GROWTH_TRAFIK T WHERE MONTH(T.tanggal) = MONTH(keyword) AND YEAR(T.tanggal) = YEAR(keyword) AND T.TRAFIK = m.max;
		END IF;
	END$$

--Sheet 2 Nomor 3
DROP TABLE IF EXISTS `GROWTH_REVENUE`;
CREATE TABLE IF NOT EXISTS `GROWTH_REVENUE` (
  `BULAN` date DEFAULT NULL,
  `REVENUE` int(11) DEFAULT NULL,
  `REVENUE_sebelumnya` int(11) DEFAULT NULL,
  `persentase` varchar(10) DEFAULT NULL,
  `keterangan` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
DELIMITER $$

CREATE OR REPLACE PROCEDURE delete_GROWTH_REVENUE(IN keyword date)
	BEGIN
		DELETE FROM `GROWTH_REVENUE` WHERE MONTH(`BULAN`) = MONTH(keyword) AND YEAR(`BULAN`) = YEAR(keyword);
	END$$
CREATE OR REPLACE PROCEDURE GROWTH_REVENUE(IN keyword date) 
	BEGIN 
		DECLARE counter INT;
		DECLARE BULAN date; 
		DECLARE REVENUE INT;
		DECLARE REVENUE_sebelumnya INT;
		DECLARE keterangan varchar(20);
		DECLARE done INT DEFAULT 0; 
		DECLARE cur1 CURSOR FOR SELECT R.BULAN, MAX(R.REVENUE) AS REVENUE FROM REVENUE R WHERE MONTH(R.BULAN) = MONTH(keyword) AND YEAR(R.BULAN) = YEAR(keyword) AND R.MICRO_CLUSTER = 'mc-surabaya_1_1' GROUP BY R.BULAN; 
		DECLARE continue handler for not found set done=1; 
		SELECT COUNT(*) INTO counter FROM REVENUE R WHERE MONTH(R.BULAN) = MONTH(keyword) AND YEAR(R.BULAN) = YEAR(keyword) AND R.MICRO_CLUSTER = 'mc-surabaya_1_1';
		IF counter > 0 THEN
			CALL delete_GROWTH_REVENUE(keyword);
			
			open cur1;
				looping:loop 
					fetch cur1 INTO BULAN, REVENUE; 
					IF done = 1 THEN 
						leave looping; 
					ELSE
						SELECT max(R.REVENUE) INTO REVENUE_sebelumnya FROM REVENUE R WHERE R.BULAN = DATE_SUB(BULAN, INTERVAL 1 MONTH) AND R.MICRO_CLUSTER = 'mc-surabaya_1_1';
						IF (REVENUE > REVENUE_sebelumnya OR REVENUE_sebelumnya IS NULL) THEN
							SET keterangan = 'naik';
						ELSE
							SET keterangan = 'turun';
						END IF;
						INSERT INTO GROWTH_REVENUE VALUES(BULAN, REVENUE, REVENUE_sebelumnya, (concat(round(( abs(REVENUE-REVENUE_sebelumnya)/REVENUE_sebelumnya * 100 ),2),'%')), keterangan);
					END IF;
				end loop looping; 
			close cur1; 
			SELECT R.BULAN, R.REVENUE, R.REVENUE_sebelumnya, R.persentase, R.keterangan FROM (SELECT MAX(x.REVENUE) AS max FROM GROWTH_REVENUE x WHERE MONTH(x.BULAN) = MONTH(keyword) AND YEAR(x.BULAN) = YEAR(keyword)) m, GROWTH_REVENUE R WHERE MONTH(R.BULAN) = MONTH(keyword) AND YEAR(R.BULAN) = YEAR(keyword) AND R.REVENUE = m.max;
		END IF;
	END$$

--Sheet 1 Nomor 5
SELECT ORGANIZATION_NAME
FROM `TRX_OUTLET` 
ORDER BY AMOUNT_DEBIT DESC
LIMIT 1;

--Sheet 1 Nomor 5.1
SELECT AMOUNT_DEBIT
FROM `TRX_OUTLET`
WHERE MONTH(TANGGAL)=CURRENT_DATE() AND YEAR(TANGGAL)=YEAR(CURRENT_DATE()
GROUP BY TANGGAL;

--Sheet 1 Nomor 5.2
SELECT AVG(AMOUNT_DEBIT)
FROM `TRX_OUTLET`
WHERE YEAR(TANGGAL)=YEAR(CURRENT_DATE())
GROUP BY MONTH(TANGGAL)

--Sheet 1 Nomor 7--
SELECT SITEID
FROM `UTILISASI_SA_SURABAYA` 
WHERE MICRO_CLUSTER='MC-Surabaya_1_1'
GROUP BY CELLID
ORDER BY HSDPA_USER_W36 ASC
LIMIT 5;

--Sheet 1 Nomor 8
SELECT ORGANIZATION_NAME
FROM `TRX_OUTLET` 
WHERE MONTH(TANGGAL)=MONTH(CURRENT_DATE())
GROUP BY ORGANIZATION_ID 
ORDER BY AVG(AMOUNT_DEBIT) ASC 
LIMIT 5;

--Sheet 2 Nomor 1
--DAILY
SELECT VLR
FROM `VLR`
WHERE MICRO_CLUSTER='MC-SURABAYA_1_1' AND MONTH(TANGGAL)=MONTH(CURRENT_DATE()) AND YEAR(TANGGAL)=YEAR(CURRENT_DATE()
ORDER BY TANGGAL;

--MONTHLY
SELECT VLR
FROM `VLR`
WHERE MICRO_CLUSTER='MC-SURABAYA_1_1' AND YEAR(TANGGAL)=YEAR(CURRENT_DATE())
ORDER BY MONTH(TANGGAL)=MONTH(CURRENT_DATE());

--Sheet 2 Nomor 1.1
SELECT NAMA_CSM, TANGGAL 
FROM `vlr` 
WHERE MICRO_CLUSTER='MC-SURABAYA_1_1' AND DAYNAME(TANGGAL)='WEDNESDAY'
GROUP BY TANGGAL;

--Sheet 2 Nomor 1.2 error
SELECT NAMA_CSM, TANGGAL 
	FROM `vlr` 
	WHERE MICRO_CLUSTER='MC-SURABAYA_1_1' 
	AND DAYNAME(TANGGAL)='WEDNESDAY' 
	AND DATE(TANGGAL)>='YEAR(TANGGAL)=YEAR(CURRENT_DATE())-(MONTH(TANGGAL)=MONTH(CURRENT_DATE())-1)-23' 
	AND DATE(TANGGAL)<='YEAR(TANGGAL)=YEAR(CURRENT_DATE())-MONTH(TANGGAL)=MONTH(CURRENT_DATE())-(1-7)'
	GROUP BY TANGGAL;

--Sheet 2 Nomor 2
--DAILY
SELECT TRAFIK
FROM `TRAFIK`
WHERE MICRO_CLUSTER='MC-SURABAYA_1_1' AND MONTH(TANGGAL)=MONTH(CURRENT_DATE()) AND YEAR(TANGGAL)=YEAR(CURRENT_DATE()
ORDER BY TANGGAL;

--MONTHLY
SELECT TRAFIK
FROM `TRAFIK`
WHERE MICRO_CLUSTER='MC-SURABAYA_1_1' AND YEAR(TANGGAL)=YEAR(CURRENT_DATE())
ORDER BY MONTH(TANGGAL)=MONTH(CURRENT_DATE());

--Sheet 2 Nomor 3
SELECT ACT/TARGET*100 AS PERCENTAGE, TARGET
FROM `REVENUE_SURABAYA`
WHERE BULAN='SEPTEMBER';
