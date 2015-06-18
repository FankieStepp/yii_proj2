$(function(){
	
	var dropbox = $('#dropbox'),
		message = $('.message', dropbox);
	
	dropbox.filedrop({
		paramname:'pic',
		
		maxfiles: 1,
    	maxfilesize: 3,
		url: 'upload/post_file.php',
		
		uploadFinished:function(i,file,response){
			$.data(file).addClass('done');
			// $('#fname').val('files/'+file.name);
			$('#gonext').show();
		},
		
    	error: function(err, file) {
			switch(err) {
				case 'BrowserNotSupported':
					showMessage('Ваш Браузер не поддерживает HTML5!');
					break;
				case 'TooManyFiles':
					alert('Разрешено загружать только 1 изображение');
					break;
				case 'FileTooLarge':
					alert(file.name+' Слишком большой.Разрешена загрузка файлов не более 3мб.');
					break;
				default:
					break;
			}
		},

		beforeEach: function(file){
			if(!file.type.match(/^image\//)){
				alert('Разрешена загрузка только изображений!!!!');
				return false;
			}
		},
		
		uploadStarted:function(i, file, len){
			createImage(file);
		},
		
		progressUpdated: function(i, file, progress) {
			$.data(file).find('.progress').width(progress);
		}
    	 
	});
	
	var template = '<div class="preview">'+
						'<span class="imageHolder">'+
							'<img />'+
							'<span class="uploaded"></span>'+
						'</span>'+
						'<div class="progressHolder">'+
							'<div class="progress"></div>'+
						'</div>'+
					'</div>'; 
	
	
	function createImage(file){

		var preview = $(template), 
			image = $('img', preview);
			
		var reader = new FileReader();
		
		image.width = 140;
		image.height = 140;
		
		reader.onload = function(e){

			image.attr('src',e.target.result);
		};
		
		reader.readAsDataURL(file);
		
		message.hide();
		preview.appendTo(dropbox);
		
		$.data(file,preview);
	}

	function showMessage(msg){
		message.html(msg);
	}

});