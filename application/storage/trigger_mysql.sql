DELIMITER //

CREATE TRIGGER after_influencer_requests_insert
AFTER INSERT ON influencer_requests
FOR EACH ROW
BEGIN
    INSERT INTO influencer_request_logs (
        request_id, label, created_by, created_at
    ) VALUES (
        NEW.id, 'New Request', NEW.created_by, NEW.created_at
    );
END;
//

DELIMITER ;

DELIMITER //

CREATE TRIGGER after_influencer_requests_update
AFTER UPDATE ON influencer_requests
FOR EACH ROW
BEGIN
    DECLARE log_label VARCHAR(50);
    DECLARE actor VARCHAR(50);

    IF OLD.approved_at IS NULL AND NEW.approved_at IS NOT NULL THEN
        SET log_label = 'Approved';
        SET actor = NEW.approved_by;
    ELSEIF OLD.rejected_at IS NULL AND NEW.rejected_at IS NOT NULL THEN
        SET log_label = 'Rejected';
        SET actor = NEW.rejected_by;
    ELSEIF OLD.deleted_at IS NULL AND NEW.deleted_at IS NOT NULL THEN
        SET log_label = 'Deleted';
        SET actor = NEW.deleted_by;
    ELSEIF OLD.updated_at <> NEW.updated_at THEN
        SET log_label = 'Updated Request';
        SET actor = NEW.updated_by;
    ELSE
        SET log_label = 'Updated';
        SET actor = NEW.updated_by;
    END IF;

    INSERT INTO influencer_request_logs (
        request_id, label, created_by, created_at
    ) VALUES (
        NEW.id, log_label, actor, NOW()
    );
END;
//

DELIMITER ;