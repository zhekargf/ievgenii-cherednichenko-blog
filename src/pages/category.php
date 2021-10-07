<section title="Posts">
    <h1><?= $data['name'] ?></h1>
    <div class="post-list">
        <?php foreach (catalogGetCategoryPost($data['category_id']) as $post) : ?>
            <div class="post">
                <a href="/<?= $post['url'] ?>" title="<?= $post['name'] ?>">
                    <img src="/post-placeholder.png" alt="<?= $post['name'] ?>" width="200"/>
                </a>
                <a href="/<?= $post['url'] ?>" title="<?= $post['name'] ?>"><?= $post['name'] ?></a>
                <span>$<?= number_format($post['price'], 2) ?></span>
                <button type="button">Add To Cart</button>
            </div>
        <?php endforeach; ?>
    </div>
</section>