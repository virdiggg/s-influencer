<div class="row">
    <div class="col-md-10 offset-md-1">
        <div class="row">
            <div class="col-12">
                <div class="form-group authorized-only">
                    <button type="button" class="btn btn-outline-success btn-block">
                        Select a category or enter keywords
                    </button>
                </div>
            </div>
            <div class="col-3">
                <div class="form-group authorized-only show-slider-follower">
                    <button type="button" class="btn btn-outline-success btn-block">
                        Followers
                    </button>
                </div>

                <div class="dropdown-row" style="display: none;">
                    <div class="row align-items-center">
                        <div class="col">
                            <div class="p-3 bg-white rounded border shadow-sm">
                                <div class="slider-green">
                                    <input type="text" id="slider-follower" class="slider form-control" />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-3">
                <div class="form-group authorized-only show-slider-engagement">
                    <button type="button" class="btn btn-outline-success btn-block">
                        Engagement
                    </button>
                </div>

                <div class="dropdown-row" style="display: none;">
                    <div class="row align-items-center">
                        <div class="col">
                            <div class="p-3 bg-white rounded border shadow-sm">
                                <div class="slider-green">
                                    <input type="text" id="slider-engagement" class="slider form-control" />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-3">
                <div class="form-group authorized-only">
                    <button type="button" class="btn btn-outline-success btn-block">
                        Area
                    </button>
                </div>
            </div>
            <div class="col-3">
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
                <div class="text-danger" id="message"></div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-success" id="btn-auth">Login</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
            </div>
        </form>
    </div>
</div>