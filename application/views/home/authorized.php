<div class="row">
    <div class="col-md-10 offset-md-1">
        <div class="row">
            <div class="col-12">
                <div class="form-group">
                    <select id="category" class="form-control" multiple placeholder="Select a category or enter keywords" style="width: 100%;"></select>
                </div>
            </div>

            <div class="col-5 col-sm-4">
                <div class="form-group show-slider" id="show-slider-follower">
                    <button type="button" class="btn btn-outline-success btn-block text-left">
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

            <div class="col-5 col-sm-4">
                <div class="form-group show-slider" id="show-slider-engagement">
                    <button type="button" class="btn btn-outline-success btn-block text-left">
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

            <div class="col-2">
                <div class="form-group">
                    <select id="area" class="form-control" multiple placeholder="Area" style="width: 100%;"></select>
                </div>
            </div>

            <div class="col-12 col-sm-2">
                <button type="button" class="btn btn-success btn-block" id="btn-show">Show Results</button>
            </div>
        </div>
    </div>
</div>