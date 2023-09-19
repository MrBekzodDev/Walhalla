
<div class="container">


    <form method="post">
        <div class="form-group row">
            <h1>Yangi category update</h1>
            <label for="inputfullname" class="col-sm-2 col-form-label">Categoriya nomini kiriting</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="inputfullname" placeholder="category" name="categoryName" value="<?=$category->name?>">
            </div>
        </div>
        <div class="form-group row">
            <div class="col-sm-10">
                <button type="submit" class="btn btn-primary" name="ok">ADD</button>
            </div>
        </div>

    </form>

</div>