<?php

declare(strict_types=1);

function catalogGetCategory(): array
{
    return [
        1 => [
            'category_id' => 1,
            'name'        => 'Apple',
            'url'         => 'apple',
            'posts'    => [1, 2, 3]
        ],
        2 => [
            'category_id' => 2,
            'name'        => 'Samsung',
            'url'         => 'samsung',
            'posts'    => [3, 4, 5]
        ],
        3 => [
            'category_id' => 3,
            'name'        => 'Xiaomi',
            'url'         => 'xiaomi',
            'posts'    => [2, 4, 6]
        ]
    ];
}

function catalogGetPost(): array
{
    return [
        1 => [
            'post_id'  => 1,
            'name'        => 'post 1',
            'url'         => 'post-1',
            'description' => 'post 1 Description',
            'price'       => 11.99
        ],
        2 => [
            'post_id'  => 2,
            'name'        => 'post 2',
            'url'         => 'post-2',
            'description' => 'post 2 Description',
            'price'       => 22.99
        ],
        3 => [
            'post_id'  => 3,
            'name'        => 'post 3',
            'url'         => 'post-3',
            'description' => 'post 3 Description',
            'price'       => 33.99
        ],
        4 => [
            'post_id'  => 4,
            'name'        => 'post 4',
            'url'         => 'post-4',
            'description' => 'post 4 Description',
            'price'       => 44.99
        ],
        5 => [
            'post_id'  => 5,
            'name'        => 'post 5',
            'url'         => 'post-5',
            'description' => 'post 5 Description',
            'price'       => 55.99
        ],
        6 => [
            'post_id'  => 6,
            'name'        => 'post 6',
            'url'         => 'post-6',
            'description' => 'post 6 Description',
            'price'       => 67.00
        ]
    ];
}

function catalogGetCategoryPost(int $categoryId): array
{
    $categories = catalogGetCategory();

    if (!isset($categories[$categoryId])) {
        throw new InvalidArgumentException("Category with ID $categoryId does not exist");
    }

    $postsForCategory = [];
    $posts = catalogGetPost();

    foreach ($categories[$categoryId]['posts'] as $postId) {
        if (!isset($posts[$postId])) {
            throw new InvalidArgumentException("post with ID $postId from category $categoryId does not exist");
        }

        $postsForCategory[] = $posts[$postId];
    }

    return $postsForCategory;
}

function catalogGetCategoryByUrl(string $url): ?array
{
    $data = array_filter(
        catalogGetCategory(),
        static function ($category) use ($url) {
            return $category['url'] === $url;
        }
    );

    return array_pop($data);
}

function catalogGetPostByUrl(string $url): ?array
{
    $data = array_filter(
        catalogGetpost(),
        static function ($post) use ($url) {
            return $post['url'] === $url;
        }
    );

    return array_pop($data);
}
