<?php

function validatePost($post)
{
    $errors = array();

    if (empty($post['title'])) {
        array_push($errors, 'Başlık gerekli!');
    }

    if (empty($post['body'])) {
        array_push($errors, 'body gerekli!');
    }
    
    if (empty($post['topic_id'])) {
        array_push($errors, 'Lütfen Konu Seçiniz!');
    }

    $existingPost = selectOne('posts', ['title' => $post['title']]);
    if ($existingPost) {
        if (isset($post['update-post']) && $existingPost['id'] != $post['id']) {
            array_push($errors, 'Bu başlığa sahip gönderi zaten bulunmakta!');
        }
        if (isset($post['add-post'])) {
            array_push($errors, 'Bu başlığa sahip gönderi zaten bulunmakta!');

        }
    }
    return $errors;
}