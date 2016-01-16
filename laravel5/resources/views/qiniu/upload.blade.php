<div class="container">

<form method="POST" action="http://upload.qiniu.com/" enctype="multipart/form-data">
  <input name="token" type="hidden" value="{{$upload_token}}">
  <input name="file" type="file" />
  <input type="submit" value="upload">
</form>

</div>