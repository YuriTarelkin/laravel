<?php foreach($categoriesList as $categories): ?>
   <div class="categories">
        <h3>
            <a href="<?=route('category.show', ['id' => $categories['id']])?>">
                <?=$categories['title']?>
            </a>
        </h3>
        <img src="<?=$categories['image']?>">
        <br>
        <p>Статус: <em><?=$categories['status']?></em></p>        
        <p><?=$categories['description']?></p>
   </div>
   <hr>
<?php endforeach; ?>