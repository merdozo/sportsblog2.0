<?php       
function validateTopic($topic)
{
    $errors = array();

    if (empty($topic['name'])) {
        array_push($errors, 'Konu adı gerekli!');
    }
    
    $existingTopic = selectOne('topics', ['name' => $post['name']]);
    if ($existingTopic) {
        if (isset($post['update-topic']) && $existingTopic['id'] != $post['id']) {
            array_push($errors, 'Konu adı zaten mevcut!');
        }
        if (isset($post['add-topic'])) {
            array_push($errors, 'Konu adı zaten mevcut!');

        }
    }
    return $errors;
}