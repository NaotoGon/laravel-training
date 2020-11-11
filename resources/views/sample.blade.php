<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>sample</title>
<script src="https://code.jquery.com/jquery-3.0.0.min.js"></script>
<script>
$(function(){
$('#button').click(
function() {
  $.ajax({
    type: 'GET',
    url: 'ajax2', 
    dataType: 'html',
  }).done(function (results) {
    $('#text').html(results);
  }).fail(function (err) {
    alert('ファイルの取得に失敗しました。');
  });
}
);
});
</script>
</head>
<body>
<input type="button" id="button" value="sample2取得" />
<br>
<div id="text"></div>
</body>
</html>
