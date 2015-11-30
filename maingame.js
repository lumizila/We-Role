
$(document).ready(function(){
	$('#texteditor').hide();
	$('#newpost').click(function() {
		$('#texteditor').show();
		
    });
    $('#submitpost').click(function(){
		var data = CKEDITOR.instances.editor1.getData();
		alert(data);
	});
});




