<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <style>
            #slist{width:600px;height: 600px;position: absolute;z-index: 3;border: 1px blue solid;margin-left:300px;}
     #s2{margin-left:50px;}
         #s3{margin-left:100px;}
         span{color:red;}
        </style>
    </head>
    <body>
        <?php
include 'conn/conn.php';
?>
        <section id="s1">
        <?php
$sql="select * from content";
$pub_id=$conne->getFields($sql,'pub_id');
$pub_name=$conne->getFields($sql,'pub_name');
$pub=$conne->getFields($sql,'pub');
echo "<b>$pub_name</b><br>";
echo $pub;
        ?>
            </section>
        <section id="s2">
          <?php
$sql2="select * from reply";
$reply_name=$conne->getFields($sql2,'reply_name');
$reply=$conne->getFields($sql2,'reply');
echo "<b>$reply_name</b><br>";
echo $reply;
        ?>          
        </section>
        <section id="s3">
            <?php
                    $sql4="select * from rep2 where to_n='用户1'and from_n='用户2'or from_n='用户1' and to_n='用户2'";          
    $num=$conne->getRowNum($sql4);
          $sql0="select * from rep2";
$array=$conne->getRowsArray($sql0);
 
    foreach ($array as $key => $value) {
                       echo"<p>";
                       if($num>1&&$key==0){
                     echo $array[$key]['from_n']."回复".$array[$key]['to_n']."<br>";
    echo $array[$key]['rep2_content'];
    echo "<button id='list'>查看对话</button>";
                       }
    
    echo"</p>";} 

            ?>
        
        </section>
   
        <script>
    function $(id){
	return document.getElementById(id);
}
window.onload=function(){
     $('slist').style.display='none';
}
   $('list').onclick=function(){
    if(  $('slist').style.display==='none'){
     $('slist').style.display='block';   
     $('list').innerText="收起对话";
    }
 else{
    $('slist').style.display='none';    
     $('list').innerText="查看对话";
 }
}; 


        </script>
        <section id="slist">
            <?php
               echo"<span>共有".$num."条对话</span>";  
            ?>
            <?php
              
      foreach ($array as $key => $value) {
                       echo"<p>";
                
                                       echo $array[$key]['from_n']."回复".$array[$key]['to_n']."<br>";
    echo $array[$key]['rep2_content'];
    echo"</p>";}           
            ?>
        </section>
    </body>
</html>
