<style>
    .select2-selection {
        border-color: #28a745 !important;
        color: #28a745 !important;
    }

    /* Selected item in dropdown */
    .select2-container--bootstrap4 .select2-results__option--highlighted {
        background-color: #28a745 !important;
        /* Bootstrap success */
        color: #fff;
    }

    /* When selected (single) */
    .select2-container--bootstrap4.select2-container--focus .select2-selection {
        border-color: #28a745 !important;
        box-shadow: 0 0 0 0.2rem rgba(40, 167, 69, 0.25) !important;
    }

    /* Dropdown arrow when focused */
    .select2-container--bootstrap4 .select2-selection--single:focus {
        border-color: #28a745 !important;
    }

    /* Dropdown open state */
    .select2-container--bootstrap4.select2-container--open .select2-selection {
        border-color: #28a745 !important;
    }

    /* Multiple selected tags */
    .select2-container--bootstrap4 .select2-selection--multiple .select2-selection__choice {
        background-color: #28a745 !important;
        border-color: #28a745 !important;
        color: #fff;
    }

    /* Placeholder color and alignment */
    .select2-container--bootstrap4 .select2-selection--single .select2-selection__rendered {
        color: #28a745 !important;
        /* success green */
        text-align: center !important;
        /* center text */
        line-height: 38px !important;
        /* vertical centering (adjust if needed) */
    }

    /* Prevent overriding for selected value */
    .select2-container--bootstrap4 .select2-selection--single .select2-selection__rendered:not(:has(span)) {
        color: #28a745 !important;
    }

    /* Optional: Remove padding for better centering */
    .select2-container--bootstrap4 .select2-selection--single {
        padding-left: 0 !important;
        padding-right: 0 !important;
    }
</style>

<section class="content">
    <div class="container">
        <h2 class="text-center display-4"></h2>
        <?php
        if ($this->session->has_userdata('username')) {
            include_once 'authorized.php';
        } else {
            include_once 'unauthorized.php';
        }
        ?>
        <?php include_once 'tables.php'; ?>
        <input type="hidden" value="0" id="startCounting" name="startCounting" required />

        <div class="timeline" id="show-logs-body"></div>
        <div class="text-center"><label id="loading"></label></div>
    </div>
</section>

<div class="modal fade" id="addCreatorModal" tabindex="-1" role="dialog" aria-labelledby="addCreatorModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <form id="form-add-creator" class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addCreatorModalLabel">Add creators</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label for="note">Note <span class="text-danger">*</span></label>
                    <textarea class="form-control form-input" rows="3" placeholder="Note" name="note" id="note" required></textarea>
                    <input type="hidden" class="form-input" name="influencer_id" id="influencer_id" required />
                    <input type="hidden" class="form-input" name="username_instagram" id="submit-username_instagram" required />
                    <input type="hidden" class="form-input" name="followers" id="submit-followers" required />
                    <input type="hidden" class="form-input" name="engagement_rate" id="submit-engagement_rate" required />
                    <input type="hidden" class="form-input" name="name" id="submit-name" required />
                </div>
                <div class="text-danger" id="message"></div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn border-secondary" data-dismiss="modal">Cancel</button>
                <button type="submit" class="btn btn-success" id="btn-submit">Add Creator</button>
            </div>
        </form>
    </div>
</div>