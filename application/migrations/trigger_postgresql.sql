CREATE OR REPLACE FUNCTION log_influencer_request_changes()
RETURNS TRIGGER AS $$
DECLARE
    log_label TEXT;
    actor TEXT;
BEGIN
    -- INSERT
    IF TG_OP = 'INSERT' THEN
        log_label := 'New Request';
        actor := NEW.created_by;

    -- UPDATE
    ELSIF TG_OP = 'UPDATE' THEN
        IF OLD.approved_at IS NULL AND NEW.approved_at IS NOT NULL THEN
            log_label := 'Approved';
            actor := NEW.approved_by;
        ELSIF OLD.rejected_at IS NULL AND NEW.rejected_at IS NOT NULL THEN
            log_label := 'Rejected';
            actor := NEW.rejected_by;
        ELSIF OLD.deleted_at IS NULL AND NEW.deleted_at IS NOT NULL THEN
            log_label := 'Deleted';
            actor := NEW.deleted_by;
        ELSIF OLD.updated_at IS DISTINCT FROM NEW.updated_at THEN
            log_label := 'Updated Request';
            actor := NEW.updated_by;
        ELSE
            log_label := 'Updated';
            actor := NEW.updated_by;
        END IF;
    END IF;

    INSERT INTO influencer_request_logs (
        request_id, label, created_by, created_at
    ) VALUES (
        NEW.id, log_label, actor, NOW()
    );

    RETURN NULL;
END;
$$ LANGUAGE plpgsql;

DROP TRIGGER IF EXISTS trg_log_influencer_request_changes ON influencer_requests;

CREATE TRIGGER trg_log_influencer_request_changes
AFTER INSERT OR UPDATE ON influencer_requests
FOR EACH ROW
EXECUTE FUNCTION log_influencer_request_changes();
