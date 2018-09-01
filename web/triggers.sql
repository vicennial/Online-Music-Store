

DROP TRIGGER if exists timestamp_on_insert_orders;
DELIMITER //
CREATE TRIGGER timestamp_on_insert_orders
BEFORE insert ON orders  
      FOR EACH ROW BEGIN  
        SET NEW.date = CURRENT_TIMESTAMP;   
END
//
 DELIMITER ;


DROP TRIGGER if exists timestamp_on_update_orders;
DELIMITER //
CREATE TRIGGER timestamp_on_update_orders
BEFORE update ON orders  
      FOR EACH ROW BEGIN  
        SET NEW.date = CURRENT_TIMESTAMP;   
END
//
 DELIMITER ;


DROP TRIGGER if exists timestamp_on_insert_album;
DELIMITER //
CREATE TRIGGER timestamp_on_insert_album
BEFORE insert ON album  
      FOR EACH ROW BEGIN  
        SET NEW.release_date =CURRENT_TIMESTAMP - INTERVAL FLOOR(RAND() * 1000) DAY; 
END
//
 DELIMITER ;


DROP TRIGGER if exists delete_track_on_album;
DELIMITER //
CREATE TRIGGER delete_track_on_album
AFTER delete ON track
      FOR EACH ROW 
      BEGIN  
      UPDATE album
      set album.number_of_songs=album.number_of_songs-1
      where album.album_id=(select album_id from compose where compose.track_id=old.track_id);

      if album.number_of_songs=0 THEN
      delete from album 
      where album.album_id=(select album_id from compose where compose.track_id=old.track_id);
      end if;

END
//
 DELIMITER ;


DROP TRIGGER if exists delete_track_on_categorisedby;
DELIMITER //
CREATE TRIGGER delete_track_on_categorisedby
BEFORE delete ON track
      FOR EACH ROW 
      BEGIN  
      delete from categorisedby
        where old.track_id=categorisedby.track_id;
END
//
 DELIMITER ;



DROP TRIGGER if exists delete_track_on_compose;
DELIMITER //
CREATE TRIGGER delete_track_on_compose
BEFORE delete ON track
      FOR EACH ROW 
      BEGIN  
      delete from compose
        where old.track_id=compose.track_id;
END
//
 DELIMITER ;


DROP TRIGGER if exists delete_track_on_sells;
DELIMITER //
CREATE TRIGGER delete_track_on_sells
BEFORE delete ON track
      FOR EACH ROW 
      BEGIN  
      delete from sells
        where old.track_id=sells.track_id;
END
//
 DELIMITER ;


DROP TRIGGER if exists delete_track_on_customer;
DELIMITER //
CREATE TRIGGER delete_track_on_customer
BEFORE delete ON track
      FOR EACH ROW 
      BEGIN  
      delete from customer
        where old.track_id=customer.track_id;
END
//
 DELIMITER ;


DROP TRIGGER if exists delete_artist_on_makes;
DELIMITER //
CREATE TRIGGER delete_artist_on_makes
BEFORE delete ON artist  
      FOR EACH ROW 
      BEGIN  
      delete from makes
        where old.artist_id=makes.artist_id;
END
//
 DELIMITER ;



DROP TRIGGER if exists delete_album_on_compose;
DELIMITER //
CREATE TRIGGER delete_album_on_compose
BEFORE delete ON album  
      FOR EACH ROW 
      BEGIN  
      delete from compose
        where old.album_id=compose.album_id;
END
//
 DELIMITER ;







DROP TRIGGER if exists delete_order_on_fulfilledby;
DELIMITER //
CREATE TRIGGER delete_order_on_fulfilledby
BEFORE delete ON orders  
      FOR EACH ROW 
      BEGIN  
      delete from fulfilledby
        where old.order_id=fulfilledby.order_id;
END
//
 DELIMITER ;



 