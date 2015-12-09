
$(document).ready(function(){
	$('#texteditor').hide();
	$('#newpost').click(function(e) {
		$('#texteditor').show();
		//return false;
		e.preventDefault(); // same thing as above
    });
    $('#submitpost').click(function(){
		var data = CKEDITOR.instances.editor1.getData();
		alert(data);
	});
});




