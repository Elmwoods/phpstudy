
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">


    <title>Title</title>
</head>
<body>
<form method="post" enctype="multipart/form-data" id="fm">
<input type="text" name="username" value="jiji"/>
<input type="text" name="password" value="ssa"/>
<input type="text" name="email" value="jisafji"/>
<button id="btn" type="button">确定</button>
</form>
<script src="./jquery.min.js" type="text/javascript"></script>
<script>
$('#btn').on('click',function () {
    var fm=$('#fm').serialize();
//    alert(fm);
//    alert($);
    $.ajax({
        data:fm,
        url:'./test1.php',
        type:'post',
        dataType:'json',
        success:function(data){
            alert(fm);
        },

        //不是传图片可以省略，否则会出错！
        //        cache:false,
        //        processData:false,
        //        contentType:false
    });

//    $.post("./test1.php",{username:'123',password:'456'},function(data){
//            alert('success!');
//    });
});
</script>
</body>
</html>





