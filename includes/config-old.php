<?php
/*
	config.php
	Stores configuration data for our application

*/

ob_start(); //prevents header errors

define('DEBUG',TRUE); #we want to see all errors

include 'planets.php';

include 'credentials.php'; //database credentials
define('THIS_PAGE',basename($_SERVER['PHP_SELF']));

//here are the urls and the page names for our main navigation

$nav1['template.php'] = 'Home';
$nav1['compound.php'] = 'Form';
$nav1['daily.php'] = 'Daily';
$nav1['contact.php'] = 'Contact';
$nav1['db-test.php'] = 'DB Test';
$nav1['customer_list.php'] = 'Customers';
$nav1['bannedbooks_list.php'] = 'Banned Books';


/* Bellow is an array of images to be used on contact.php in the function named randomize()

*/

$heros[] = '<img src="images/coulson.png" />';
$heros[] = '<img src="images/fury.png" />';
$heros[] = '<img src="images/hulk.png" />';
$heros[] = '<img src="images/thor.png" />';
$heros[] = '<img src="images/black-widow.png" />';
$heros[] = '<img src="images/captain-america.png" />';
$heros[] = '<img src="images/machine.png" />';
$heros[] = '<img src="images/iron-man.png" />';
$heros[] = '<img src="images/loki.png" />';
$heros[] = '<img src="images/giant.png" />';
$heros[] = '<img src="images/hawkeye.png" />';



//default page values

$title = THIS_PAGE;
$siteName = 'Site Name';
$slogan = 'Whatever it is you do, we do it better.';
$pageHeader = 'The developer forgot to put a page pageHeader!';
$subHeader = 'The developer forgot to put a page subHeader!';
$sloganIcon = '';//will be replaced in contact.php and compound.php by hero icons
$motivational = '';//will be replaced in contact.php and compound.php by daily planet

switch(THIS_PAGE){
	case 'template.php':
		$title =  'My template page';
        $pageHeader = 'Daily Coffee Specials';
        $subHeader = 'All our coffee is special';
	break;
        
    case 'customer_list.php':
		$title =  'A list of customers';
        $pageHeader = 'Our customers';
        $subHeader = 'Don\'t sue us, because we\'re using celelbrity photos!';
	break;
        
     case 'compound.php':
		$title =  'Fill out the form';
        $pageHeader = 'Customer Experience Form';
        $subHeader = 'Thai form is used as a way to improve our coffee and clients experience';
        $sloganIcon = randomize($heros);
        $motivational = rotate($planets);
	break;
        
    case 'daily.php':
		$title =  'My daily page';
        $pageHeader = 'Coffee of the day';
        $subHeader = 'Here you can take a look at the daily coffee options!';
	break;
	
	case 'contact.php':
		$title =  'My contact page';
        $pageHeader = 'Please contact us';
        $subHeader = 'We appreciate your feedback';
        $sloganIcon = randomize($heros);
        $motivational = rotate($planets);
	break;
    
    case 'db-test.php':
		$title =  'Database test page';
        $pageHeader = 'Database test page';
        $subHeader = 'Check this page to see if your db credentials are correct.';
	break;
        
    case 'bannedbooks_list.php':
		$title =  'List of Banned Books';
        $pageHeader = 'List of Banned Books';
        $subHeader = 'You should read them though!';
	break;
    
    case 'bannedbooks_view.php':
        $pageHeader = 'List of Banned Books';
	break;
}


function myerror($myFile, $myLine, $errorMsg)
{
    if(defined('DEBUG') && DEBUG)
    {
       echo "Error in file: <b>" . $myFile . "</b> on line: <b>" . $myLine . "</b><br />";
       echo "Error Message: <b>" . $errorMsg . "</b><br />";
       die();
    }else{
		echo "I'm sorry, we have encountered an error.  Would you like to buy some socks?";
		die();
    }
}


/**
 * returns a random item from an array sent to it.
 *
 * Uses count of array to determine highest legal random number.
 *
 * Used to show random HTML segments in sidebar, etc.
 *
 * <code>
 * $arr[] = '<img src="mypic1.jpg" />';
 * $arr[] = '<img src="mypic2.jpg" />';
 * $arr[] = '<img src="mypic3.jpg" />';  
 * echo randomize($arr); #will show one of three random images
 * </code>
 *
 * @param array array of HTML strings to display randomly
 * @return string HTML at random index of array
 * @see rotate() 
 * @todo none
 */
function randomize ($arr)
{//randomize function is called in the right sidebar - an example of random (on page reload)
	if(is_array($arr))
	{//Generate random item from array and return it
		return $arr[mt_rand(0, count($arr) - 1)];
	}else{
		return $arr;
	}
}#end randomize()

/**
 * returns a daily item from an array sent to it.
 *
 * Uses count of array to determine highest legal rotated item.
 *
 * Uses day of month and modulus to rotate through daily items in sidebar, etc.
 *
 * <code>
 * $arr[] = '<img src="mypic1.jpg" />';
 * $arr[] = '<img src="mypic2.jpg" />';
 * $arr[] = '<img src="mypic3.jpg" />';  
 * echo rotate($arr); #will return a different image each day for three days
 * </code>
 * 
 * @param array array of HTML strings to display on a daily rotation
 * @return string HTML at specific index of array based on day of month
 * @see rotate() 
 * @todo none
 */
function rotate ($arr)
{//rotate function is called in the right sidebar - an example of rotation (on day of month)
	if(is_array($arr))
	{//Generate item in array using date and modulus of count of the array
		return $arr[((int)date("j")) % count($arr)];
	}else{
		return $arr;
	}
}#end rotate




/* 
makeLinks() will create navigation itens from an array

echo makeLinks($nav1);

*/

Function makeLinks($nav)
{
    
    $myReturn = '';
    foreach($nav as $key => $value){
        if(THIS_PAGE == $key)
        {//current page! add active class
           $myReturn .= '
            <li class="nav-item">
                  <a class="nav-link active" href="' . $key . '">' . $value . '</a>
            </li>';
            
        }else{
            $myReturn .= '
            <li class="nav-item">
                  <a class="nav-link" href="' . $key . '">' . $value . '</a>
            </li>';  
        }
    }
    
    return $myReturn;
    
    
}//end makeLinks
