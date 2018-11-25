<?php include 'includes/config.php'?>
<?php get_header()?>
<?php

/* 
if day is passed via GET, show $day's coffee

if it's today, shows $today's coffee

place a link to show today's cofee (if on another day)

*/
    

    
if(isset($_GET['day'])){ //if day is passed via GET, show $day's coffee
    $today = $_GET['day'];
    
    if($today == 'Sunday'){
        $coffee = "Mocha";
        $pic = 'images/mocha.jpg';
        $alt = 'yummy mocha with topping...';
    }else if($today == 'Monday'){
        $coffee = "Cappuccino";
        $pic = 'images/cappuccino.jpg';
        $alt = 'yummy cappuccino...';
    }else if($today == 'Tuesday'){
        $coffee= "Caramel Macchiato";
        $pic = 'images/caramel-macchiato.jpg';
        $alt = 'delicious caramel macchiato...';
    }else if($today == 'Wednesday'){
        $coffee = "Hot Chocolate";
        $pic = 'images/hot-chocolate.jpg';
        $alt = 'yummy hot chocolate..';
    }else if($today == 'Thursday'){
        $coffee = "Frappuccino";
        $pic = 'images/frappuccino.jpg';
        $alt = 'yummy frappuccino with chocoloate syrup...';
    }else if ($today == 'Friday'){
        $coffee = "Americano";
        $pic = "images/americano.jpg";
        $alt = 'yummy americano...';
    }else{
        $coffee = "Pumpkin Spice";
        $pic = "images/pumpkin-spice-latte.jpg";
        $alt = 'yummy pupkin spice...';
    }
    
    
}else{ //if it's today, shows $today's coffee
    $today = date('l');
    
    if($today == 'Sunday'){
        $coffee = "Mocha";
        $pic = 'images/mocha.jpg';
        $alt = 'yummy mocha with topping...';
    }else if($today == 'Monday'){
        $coffee = "Cappuccino";
        $pic = 'images/cappuccino.jpg';
        $alt = 'yummy cappuccino...';
    }else if($today == 'Tuesday'){
        $coffee= "Caramel Macchiato";
        $pic = 'images/caramel-macchiato.jpg';
        $alt = 'delicious caramel macchiato...';
    }else if($today == 'Wednesday'){
        $coffee = "Hot Chocolate";
        $pic = 'images/hot-chocolate.jpg';
        $alt = 'yummy hot chocolate..';
    }else if($today == 'Thursday'){
        $coffee = "Frappuccino";
        $pic = 'images/frappuccino.jpg';
        $alt = 'yummy frappuccino with chocoloate syrup...';
    }else if ($today == 'Friday'){
        $coffee = "Americano";
        $pic = "images/americano.jpg";
        $alt = 'yummy americano...';
    }else{
        $coffee = "Pumpkin Spice";
        $pic = "images/pumpkin-spice-latte.jpg";
        $alt = 'yummy pupkin spice...';
    }
}
    
//$today = date('l');
//echo $today;

//die;
    
    
?>
<?php get_header()?>

<p><img src="<?=$pic?>" alt="<?$alt?>" id="coffee" /></p>
<p><?=$today?>'s special is <?=$coffee?>!</p> 

<p>Click below to find out what awesome flavors we have for each day of the week</p>
<p><a href="daily.php?day=Sunday">Sunday</a></p>
<p><a href="daily.php?day=Monday">Monday</a></p>
<p><a href="daily.php?day=Tuesday">Tuesday</a></p>
<p><a href="daily.php?day=Wednesday">Wednesday</a></p>
<p><a href="daily.php?day=Thursday">Thursday</a></p>
<p><a href="daily.php?day=Friday">Friday</a></p>
<p><a href="daily.php?day=Saturday">Saturday</a></p>



<?php get_footer()?>