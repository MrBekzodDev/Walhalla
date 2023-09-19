<h1>BU category list</h1>

<?php echo '<a href="/category/add" class="btn btn-primary">Create</a>';?>
<table class="table table-success table-striped">
    <thead>
        <tr>
            <th scope="col">Id</th>
            <th scope="col">name</th>
            <th scope="col">✒️</th>
            <th scope="col">🚮</th>

        </tr>
    </thead>
    <tbody>
    <?php
    foreach ($list as $item){
        echo "<tr>";
        echo "<td>".$item->id."</td>";
        echo "<td>".$item->name."</td>";
        echo '<td><a class="btn btn-primary" href="/category/update/'.$item->id.'">Edit</a></td>';
        echo '<td><a class="btn btn-danger" href="/category/delete/'.$item->id.'" onclick="return confirm(\'Are you sure you want to delete this Category?\');">Delete</a></td>';
        echo "</tr>";
    }
    ?>

    </tbody>
</table>
<nav aria-label="Page navigation example">
    <ul class="pagination">
        <li class="page-item">

            <a class="page-link" href="/category/list?page=<?=$currentPage-1?>" aria-label="previous">
                <span aria-hidden="true">&laquo;</span>
            </a>
        </li>
        <?php for ($page = 1; $page <= $pageCount; $page++) {?>
        <li class="page-item"><a class="page-link" href="/category/list?page=<?=$page?>"><?=$page?></a></li>
        <?php } ?>
        <li class="page-item">
            <a class="page-link" href="/category/list?page=<?=$currentPage+1?>" aria-label="Next">
                <span aria-hidden="true">&raquo;</span>
            </a>
        </li>
    </ul>
</nav>
