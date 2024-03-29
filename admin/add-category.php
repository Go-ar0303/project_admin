<?php

include('includes/header.php');


?>
<h1>Welcome <span></span></h1>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>Add Category</h4>
                </div>
                <div class="card-body">
                    <form action="" method="post" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-md-6">
                                <label for="">Name</label>
                                <input type="text" class="form-control" name="name" placeholder="Enter category name">
                            </div>

                            <div class="col-md-6">
                                <label for="">Slug</label>
                                <input type="text" class="form-control" name="slug" placeholder="Enter Slug">
                            </div>

                            <div class="col-md-12">
                                <label for="">Description</label>
                                <textarea rows="3" class="form-control" name="description" placeholder="Enter Description"></textarea>
                            </div>

                            <div class="col-md-12">
                                <label for="">Upload Image</label>
                                <input type="filr" class="form-control" name="image">
                            </div>

                            <div class="col-md-6">
                                <label for="">Meta Title</label>
                                <input type="text" class="form-control" name="meta_title" placeholder="Enter meta title">
                            </div>

                            <div class="col-md-12">
                                <label for="">Meta Description</label>
                                <textarea rows="3" class="form-control" name="meta_description" placeholder="Enter Meta Description"></textarea>
                            </div>

                            <div class="col-md-6">
                                <label for="">Status</label>
                                <input type="checkbox" name="status">
                            </div>

                            <div class="col-md-6">
                                <label for="">Popular</label>
                                <input type="checkbox" name="popular">
                            </div>

                            <div class="col-md-12">
                                <button type="submit" class="btn btn-primary" name="add_category_btn">Save</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<?php include('includes/footer.php'); ?>