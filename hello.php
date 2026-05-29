<?php

use Labs\Class\Comment;
use Labs\Class\User;

require 'vendor/autoload.php';


$user1=new User(1,"Artem", "dsaj@gmail.com", "dahdjka");
$user2=new User(2,"Artem", "dsaj@gmail.com", "dahdjka");
echo $user1->creation_date->format('d/m/Y H:i').'<br>';
$date=new DateTime();
$user3=new User(3,"Artem", "dsaj@gmail.com", "dahdjka");
$user4=new User(4,"Artem", "dsaj@gmail.com", "dahdjka");
$comments=[
    new Comment($user1, "First"),
    new Comment($user2, "Second"),
    new Comment($user3, "Third"),
    new Comment($user4, "Fourth"),
];
foreach($comments as $comment){
    if ($comment->user->creation_date>$date){
        echo $comment->text.'<br>';
    }

}
$user5=new User(5,"Artem", "dsajgmail.com", "dahdjka");
