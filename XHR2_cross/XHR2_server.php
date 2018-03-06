<?php 


//XHR2实现的server端处理跨域请求
//

header("Content-Type:text/html;charset=utf-8");


//只需在服务器端设置下面两句即可 利用了html5的XHR2
header("Access-Control-Allow-Origin:*");
header("Access-Control-Allow-Methods:POST,GET");



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
                    $res='{
                        "success":true,
                        "msg":"查询成功",
                        "data":{
                            "name":"'.$st['name'].'",
                            "num":"'.$st['num'].'",
                            "sex":"'.$st['sex'].'"
                        }
                    } ';
                    
                    echo $res;
                }
                else{
                    echo '{
                        "success":false,
                        "msg":"查询失败",
                        "data":null
                    } ';
                }
            }    

    }
    else
    {
        echo '{"success":false,"msg":"参数错误", "data":null } ';
    }
}
elseif($_SERVER['REQUEST_METHOD']=="POST")
{

    if(
    (isset($_POST['name'])&&!empty($_POST['name']))&&
    (isset($_POST['num'])&&!empty($_POST['num']))&&
    (isset($_POST['sex'])&&!empty($_POST['sex'])))
    {

        echo '{
                        "success":true,
                        "msg":"保存成功",
                        "data":{
                            "name":"'.$_POST['name'].'",
                            "num":"'.$_POST['num'].'",
                            "sex":"'.$_POST['sex'].'"
                        }
                    } ';
       

    }
    else{
        
     echo '{"success":false,"msg":"参数错误", "data":null } ';
    }

}

else{
     echo '{"success":false,"msg":"未知请求", "data":null } ';
}


 ?>