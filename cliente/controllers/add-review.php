<?php 

require '../core.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST'){

    $item = clearGetData($_POST['item']);
    $user = clearGetData($userInfo['user_id']);
    $comment = clearGetData($_POST['comment']);
    $rating = clearGetData($_POST['rating']);

    $statement = $connect->prepare("SELECT * FROM reviews WHERE user = :user AND item = :item LIMIT 1");
    $statement->execute(array(':user' => $user, ':item' => $item));
    $result = $statement->fetch();
  
    if ($result != false) {
      
        echo "<div class='uk-text-danger uk-text-small uk-text-left uk-border-rounded uk-margin-small-top uk-flex uk-flex-middle'><i class='ti ti-x uk-margin-small-right'></i> ".$translation['tr_129']."</div>";
    
    }else{

        $statment = $connect->prepare("INSERT INTO reviews (id, item, user, comment, rating, created) VALUES (null, :item, :user, :comment, :rating, CURRENT_TIMESTAMP)");
    
            $statment->execute(array(
                ':item' => $item,
                ':user' => $user,
                ':comment' => $comment,
                ':rating' => $rating
                ));

        echo "<div class='uk-text-success uk-text-small uk-text-left uk-border-rounded uk-margin-small-top uk-flex uk-flex-middle'><i class='ti ti-circle-check uk-margin-small-right'></i> ".$translation['tr_128']."</div>";
    }

}


?>