<section class="content">
    <div class="container-fluid">
        <h2 class="text-center display-4">Enhanced Search</h2>
        <div class="row">
            <div class="col-md-10 offset-md-1">
                <div class="row">
                    <div class="col-12">
                        <div class="form-group authorized-only">
                            <?php if ($this->session->has_userdata('username')) : ?>
                                <select id="category" class="form-control" placeholder="Select a category or enter keywords" style="width: 100%;"></select>
                            <?php else : ?>
                                <button type="button" class="btn btn-outline-success btn-block">
                                    Select a category or enter keywords
                                </button>
                            <?php endif; ?>
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
                            <?php if ($this->session->has_userdata('username')) : ?>
                                <select id="area" class="form-control" placeholder="Area" style="width: 100%;"></select>
                            <?php else : ?>
                                <button type="button" class="btn btn-outline-success btn-block">
                                    Area
                                </button>
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="col-3">
                        <button type="button" class="btn btn-primary btn-block authorized-only" id="btn-show">Show 1K Results</button>
                    </div>
                </div>
            </div>
        </div>
        <input type="hidden" value="0" id="startCounting" name="startCounting" required />

        <div class="timeline" id="show-logs-body"></div>
        <div class="text-center"><label id="loading"></label></div>
    </div>
</section>

<div class="modal fade" id="authModal" tabindex="-1" role="dialog" aria-labelledby="authModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <form action="<?= base_url('login') ?>" method="post" class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="authModalLabel">Login Required</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label for="username">Username</label>
                    <input type="text" class="form-control" name="username" id="username" required />
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" class="form-control" name="password" id="password" required />
                </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Login</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
            </div>
        </form>
    </div>
</div>