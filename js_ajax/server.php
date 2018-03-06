<?php 

header("Content-Type:text/html;charset=utf-8");
$staffs = array(
    array('name'=>'ZHL','num'=>'001','sex'=> 'male')
);


if($_SERVER['REQUEST_METHOD']=="GET")
{
    if(isset($_GET['num'])&&!empty($_GET['num']))
    {
        foreach ($staffs as $st) {
            //===
                if($st['num']===$_GET['num'])
                {
                    $res="查询成功：name=".$st['name'].",num=".$st['num'].",sex=".$st['sex'];
                    echo $res;
                }
                else{
                    echo "没有这个人";
                }
            }    

    }
    else
    {
        echo "参数错误";
    }
}
elseif($_SERVER['REQUEST_METHOD']=="POST")
{

    if(
    (isset($_POST['name'])&&!empty($_POST['name']))&&
    (isset($_POST['num'])&&!empty($_POST['num']))&&
    (isset($_POST['sex'])&&!empty($_POST['sex'])))
    {
     
        echo "保存成功：".$_POST['name'].'  '.$_POST['num'].'   '.$_POST['sex'];

    }
    else{
        echo "参数错误";

    }

}

else{
    echo "未知请求";
}


 ?>