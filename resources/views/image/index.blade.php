<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>
<form method="post" enctype="multipart/form-data" action="{{url('/file')}}" >
    {{csrf_field()}}
    <input type="file" name="picture">
    <button type="submit"> 提交 </button>
</form>
</body>
</html>