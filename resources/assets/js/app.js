$(document).ready(function() {
	/*** GLOBAL VARIABLES ***/
	var submitIcon = $('.search-button');
	var inputBox = $('.search-box');
	var searchForm = $('.search-form');
	var isOpen = false;
	var loadModal = $('#chapModal > div').html();

	/*** LISTENERS/EVENTS ***/

	$(".story").hover(
		function(e){
			$(this).children(".prevw-btn").removeClass("hidden-md");
			$(this).children("a:first").children("div").removeClass("hidden-md");
		},
		function(e){
			$(this).children(".prevw-btn").addClass("hidden-md");
			$(this).children("a:first").children("div").addClass("hidden-md");
		}
	);

	//add chapter button
	$('#writer-tools').on('click','#add-chapter-btn',
		function(e){
			//set modal to loading
			$('#chapModal > div').html(loadModal);
			//get chapter text to be edited			
	        $.ajax({
			    url: $(location).attr('href').split('?')[0]+'/add',
			    type: 'post',
			    headers: {
				    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
				},
			    success: function (data) {
					$('#chapModal > div').html(data);
					//set current chapter and focus on it
					$('#chapter-title').focus();
			    }
			});	
		}
	);

	//edit chapter  button
	$('#writer-tools').on('click','#edit-chapter-btn',
		function(e){
			//set modal to loading
			$('#chapModal > div').html(loadModal);
			//get chapter text to be edited			
	        $.ajax({
			    url: $(location).attr('href').split('?')[0]+'/edit',
			    type: 'post',
			    headers: {
				    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
				},
			    success: function (data) {
					$('#chapModal > div').html(data);
					//set current chapter and focus on it
					$('#chapter-title').focus();
			    }
			});	
		}
	);
	
	//delete chapter button
	$('#writer-tools').on('click','#delete-chapter-btn',
		function(e){
			if ($('#delete-chapter-btn').hasClass('confirm-btn')) {

                e.preventDefault();
                
				//send the processed array to server

                $.ajax({
				    url: $(location).attr('href').split('?')[0]+'/delete',
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
										   .split('/chapter')[0]
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
					.children('span')
					.text("Are you sure?");			
			}
		}
	);

	//search box
	submitIcon.click(function(){
	    if(isOpen === false){
	        $('.search-form').css('display','inherit')
	        				 .animate({width: "500%"},400);
	        inputBox.focus();
	        isOpen = true;
	    } else {
	        $('.search-form').animate(
				{width: "0"},
				{
					duration: 400,
					complete: function(){
						$(this).css('display','none')
					}
				}
			  )
	        				 
	        inputBox.focusout();
	        isOpen = false;
	    }
	});


	/*** MAIN ***/

});
