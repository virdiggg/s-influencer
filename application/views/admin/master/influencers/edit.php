<div class="card">
    <form id="form-edit" method="POST">
        <div class="card-header">
            <h3 class="card-title">Edit Master Influencer</h3>
        </div>
        <div class="card-body row">
            <div class="form-group col-12">
                <label for="username">Username <span class="text-danger">*</span></label>
                <input type="hidden" name="id" id="id" value="<?= $data->id ?>" />
                <input type="text" class="form-control" placeholder="Username" name="username" id="username" value="<?= $data->username_instagram ?>" required autofocus />
            </div>
            <div class="form-group col-12">
                <label for="name">Name <span class="text-danger">*</span></label>
                <input type="text" class="form-control" placeholder="Name" name="name" id="name" value="<?= $data->name ?>" required />
            </div>
            <div class="form-group col-12 col-md-6">
                <label for="engagement_rate">Engagement Rate <span class="text-danger">*</span></label>
                <input type="number" step="0.01" class="form-control" placeholder="Engagement Rate" name="engagement_rate" id="engagement_rate" value="<?= $data->engagement_rate ?>" min="0" required />
            </div>
            <div class="form-group col-12 col-md-6">
                <label for="followers">Followers <span class="text-danger">*</span></label>
                <input type="number" class="form-control" placeholder="Followers" name="followers" id="followers" value="<?= $data->followers ?>" min="0" required />
            </div>
            <div class="form-group col-12">
                <label for="category">Category <span class="text-danger">*</span></label>
                <select class="form-control" name="category" id="category" required></select>
            </div>
            <div class="form-group col-12">
                <label for="area">Area <span class="text-danger">*</span></label>
                <select class="form-control" name="area[]" id="area" required multiple></select>
            </div>
        </div>
        <div class="card-footer">
            <a class="btn btn-secondary" href="<?= base_url('admin/master/influencers') ?>" id="btn-back"><i class="fas fa-arrow-left"></i> Back</a>
            <button type="submit" class="btn btn-primary" id="btn-submit"><i class="fas fa-save"></i> Save</button>
        </div>
    </form>
</div>