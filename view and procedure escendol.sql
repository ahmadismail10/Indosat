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
	
						
--Sheet 1 Nomor 5
SELECT ORGANIZATION_NAME, MAX(AMOUNT_DEBIT) 
FROM 'TRX_OUTLET';

--Sheet 1 Nomor 7
SELECT CELLID
FROM `UTILISASI_SA_SURABAYA` 
WHERE MICRO_CLUSTER='MC-Surabaya_1_1'
ORDER BY HSDPA_USER_W36 ASC
LIMIT 5;

--Sheet 1 Nomor 8
SELECT ORGANIZATION_ID, ORGANIZATION_NAME
FROM `TRX_OUTLET` 
WHERE MONTH(TANGGAL)=9 
GROUP BY ORGANIZATION_ID 
ORDER BY AVG(AMOUNT_DEBIT) ASC 
LIMIT 5;

--Sheet 2 Nomor 1.1
SELECT NAMA_CSM, TANGGAL 
FROM `vlr` 
WHERE MICRO_CLUSTER='MC-SURABAYA_1_1' AND DAYNAME(TANGGAL)='WEDNESDAY'
GROUP BY TANGGAL;
