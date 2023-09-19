<h1>BU product add</h1>

<?php
echo "hi";
?>
<div class="container">


    <form method="post">
        <div class="form-group row">
<!--            <h1>Yangi product </h1>-->
            <label for="inputProductName" class="col-sm-2 col-form-label">Product nomini kiriting</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="inputProductName" placeholder="product" name="productName">
            </div>
        </div>
        <div class="form-group row">
<!--            <h1>category nomi</h1>-->
            <label for="inputCategoryName" class="col-sm-2 col-form-label">Category nomini kiriting</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="inputCategoryName" placeholder="category" name="categoryName">
            </div>
        </div>
        <div class="form-group row">
<!--            <h1>product description</h1>-->
            <label for="inputProductDescription" class="col-sm-2 col-form-label">Product description</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="inputProductDescription" placeholder="description" name="productDescription">
            </div>
        </div>
        <div class="form-group row">
            <div class="col-sm-10">
                <button type="submit" class="btn btn-primary" name="ok">ADD</button>
            </div>
        </div>

    </form>

</div>