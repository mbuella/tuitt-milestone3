$(document).ready(function(){
	var loadModal = $('#chapModal > div').html();

	//slugify from https://jsfiddle.net/lovromar/pZJR9/
	var slug = function(str) {
		var $slug = '';
		var trimmed = $.trim(str);
		$slug = trimmed.replace(/[^a-z0-9-]/gi, '-').
		replace(/-+/g, '-').
		replace(/^-|-$/g, '');
		return $slug.toLowerCase();
	}

		//edit chapter  button
	$('.story').on('click','.story-edit-btn',
		function(e){
			e.preventDefault();
			//set modal to loading
			$('#chapModal > div').html(loadModal);
			//get chapter text to be edited			
	        $.ajax({
			    url: $(this).siblings('a').attr('href')+'/update_modal',
			    type: 'post',
			    headers: {
				    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
				},
			    success: function (data) {
					$('#storyModal > div').html(data);
					//set current chapter and focus on it
					$('#story-title').focus();
			    }
			});	
		}
	);

	$('#story_title').blur(function(e){
		$('#story_slug').val(
			slug($(this).val())
		);
	});

});