<?php

unset($_SESSION["loggedIn"]);

$response->redirect('/')->send();