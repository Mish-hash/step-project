<?php
    function setSession($key, $value) {
        $_SESSION[$key] = $value;
    }

    function removeSession($key)
    {
        if (issetSession($key)) {
            unset($_SESSION[$key]);

        };
    }

    function issetSession($key) {
        return isset( $_SESSION[$key]);
    }

    function getSession($key) {
        return  $_SESSION[$key] ?? null;
    }

    function setMessage($text, $type = 'success') {
        setSession('message', compact('text', 'type')); //$text $type

    };

    function showMessage()
    {
        if (issetSession('message')) {
            extract(getSession('message'));
            if (is_array($text)) {
                $text = '<ul><li>' . join('</li><li>', $text) . '</li></ul>';
            }
            echo "<div class='alert alert-$type'>$text</div>";
        }
    }

function getError($name) {
    return ($_SESSION['message'] ?? null) ? (getSession('message')['text'][$name] ?? null) : null;
}

function clearMessage() {
        removeSession('message');
        removeSession('oldInput');
    }

//    $_SESSION['message'] = [
//        'text' => [
//            'email' => 'Email is required',
//            'message' => 'message is required',
//        ]
//        'type' => 'danger'
//    ]