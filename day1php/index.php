<?php 

function sum($num1, $num2)
{
    return $num1+$num2;
}
$arr=array("hi","bye");
foreach($arr as $xz){
echo "$xz<br>";
}
echo "hi demo";
if(true)
echo "sum=".sum(2,3);
else
echo "hello world";
$x=5;
$y=8;
$xr=($x>$y?3:6);
echo $xr;
print "Print hi";
$x=2;
echo "the value of x=".$x;
echo $_SERVER['PHP_SELF'];
echo $_SERVER['SERVER_NAME'];
echo $_SERVER['HTTP_HOST'];
echo $_SERVER['HTTP_REFERER'];
echo $_SERVER['HTTP_USER_AGENT'];
echo $_SERVER['SCRIPT_NAME'];


$name=$_REQUEST['firsName'];
$name=$_POST['firsName'];
$name=$_GET['fistName']
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

</head>
<body>
    <form action="$_SERVER[PHP_SELF]" method="post">
        <input type="text" name="firstName">


    </form>
</body>
</html>