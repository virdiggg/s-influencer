<div class="row">
    <div class="col-md-10 offset-md-1">
        <div class="row">
            <div class="col-12">
                <div class="form-group authorized-only">
                    <button type="button" class="btn btn-outline-success btn-block text-left">
                        Select a category or enter keywords
                    </button>
                </div>
            </div>

            <div class="col-5 col-sm-4">
                <div class="form-group authorized-only show-slider-follower">
                    <button type="button" class="btn btn-outline-success btn-block text-left">
                        Followers
                    </button>
                </div>
            </div>

            <div class="col-5 col-sm-4">
                <div class="form-group authorized-only show-slider-engagement">
                    <button type="button" class="btn btn-outline-success btn-block text-left">
                        Engagement Rate
                    </button>
                </div>
            </div>

            <div class="col-2">
                <div class="form-group authorized-only">
                    <button type="button" class="btn btn-outline-success btn-block text-left">
                        Area
                    </button>
                </div>
            </div>

            <div class="col-12 col-sm-2">
                <button type="button" class="btn btn-success btn-block authorized-only" id="btn-show">Show 1K Results</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="authModal" tabindex="-1" role="dialog" aria-labelledby="authModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <form id="form-auth" class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="authModalLabel">Login Required</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label for="username">Username</label>
                    <input type="text" class="form-control" placeholder="Username" name="username" id="username" required />
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" class="form-control" placeholder="Password" name="password" id="password" autocomplete="off" required />
                </div>
                <div class="form-group">
                    <div class="icheck-primary mr-1">
                        <input type="checkbox" class="view-password" id="view-password" />
                        <label for="view-password">Lihat Password</label>
                    </div>
                </div>
                <div class="text-danger" id="message"></div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-success" id="btn-auth">Login</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
            </div>
        </form>
    </div>
</div>