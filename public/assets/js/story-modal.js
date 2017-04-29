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

	//add story  button
	$('#trending-stories').on('click','#story-add-btn',
		function(e){
			e.preventDefault();
			//set modal to loading
			$('#storyModal > div').html(loadModal);
			//get chapter text to be edited			
	        $.ajax({
			    url: '/story/add_modal',
			    type: 'post',
			    headers: {
				    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
				},
			    success: function (data) {
					$('#storyModal > div').html(data);
					//find current story title and focus on it
					$('#story-title').focus();
			    }
			});	
		}
	);

	//edit story  button
	$('.story').on('click','.story-edit-btn',
		function(e){
			e.preventDefault();
			//set modal to loading
			$('#storyModal > div').html(loadModal);
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

	//delete story button
	$('#storyModal').on('click','#story-delete',
		function(e){
			if ($(this).hasClass('confirm-btn')) {
                e.preventDefault();
                	var url = $('#storyModal form').attr('action')
                						 .split('/update')[0]
                						 + '/delete_story';

	                $.ajax({
					    url: url,
					    type: 'post',
					    headers: {
						    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
						},
					    dataType: 'json',
					    success: function (data) {				        
			    			if (data.status == 'success') {
								//redirect to the first chapter
								window.location.replace(
									$(location).attr('href')
											   .split('#')[0]
								);
				    		}
				    		else {
				    			//handle ajax error
				    			console.log(data.status);
				    		}
					    }
					});


                e.preventDefault();
			}
			else {
				$(this)					
					.addClass('confirm-btn')
					.text("Are you sure?");			
			}
		}
	);

	$('#storyModal').on('keyup','#story-title',
		function(e){
			console.log($(this).val());
			$('#story-slug').val(
				slug($(this).val())
			);
		}
	);

});