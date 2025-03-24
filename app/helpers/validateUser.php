<?php       
function validateUser($user)
{
    $errors = array();

    if (empty($user['username'])) {
        array_push($errors, 'Kullanıcı adı gerekli!');
    }

    if (empty($user['email'])) {
        array_push($errors, 'Email adı gerekli!');
    }
    
    if (empty($user['password'])) {
        array_push($errors, 'Şifre gerekli!');
    }

    if ($user['passwordConf'] !== $user['password']) {
        array_push($errors, 'Şifre eşleşmedi!');
    }

    //$existingUser = selectOne('users', ['email' => $user['email']]);
    //if ($existingUser) {
    //  array_push($errors, 'Email adresi zaten mevcut!');
    //}

    $existingUser = selectOne('users', ['email' => $user['email']]);
    if ($existingUser) {
        if (isset($user['update-user']) && $existingUser['id'] != $user['id']) {
            array_push($errors, 'Email adresi zaten mevcut!');
        }
        if (isset($user['create-admin'])) {
            array_push($errors, 'Email adresi zaten mevcut!');

        }
    }



    return $errors;
}

function validateLogin($user)
{
    $errors = array();

    if (empty($user['username'])) {
        array_push($errors, 'Kullanıcı adı gerekli!');
    }
  
    if (empty($user['password'])) {
        array_push($errors, 'Şifre gerekli!');
    }

    return $errors;
}